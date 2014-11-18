<?php 
$pageTitle='FloorFive Admin Log In';
include '../includes/header_admin.php';
// session_start();
if (isset($_SESSION["adminuser"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$adminuser = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
  $password = preg_replace('#[^A-Za-z0-9^]#i', '', $_POST["password"]); 
  // Connect to the MySQL database  
  include "../includes/connect_to_mysql.php"; 
  $myquery = "SELECT id FROM admin WHERE username='$adminuser' AND password='$password' LIMIT 1";
  $result=$mysqli->query($myquery)
    or die ($mysqli->error);
  $count=$result->num_rows;
  if ($count == 1) { // evaluate the count
     while ($row=$result->fetch_assoc()) {
    $id = $row["id"];
  }
   $_SESSION["id"] = $id;
   $_SESSION["adminuser"] = $adminuser;
   $_SESSION["password"] = $password;
   header("location: index.php");
       exit();
  } else {
    echo '<div id="wrong"><p>That information is incorrect, try again <a href="index.php">Admin Login</a></p></div>';
    echo '</div>';
    include("../includes/footer_admin.php");
    exit();
  }
}
?>

  <div class="signinimage">
		<div id="clientcontent">
      <div class="topbar">
        <div class="titlebox">
			        <br><br>
			    	<h2>Admin Login</h2>
			    	<br>
			    </div>  
        <div class="textbox">
          <form method="post" action="admin_login.php">
            <input name="username" type="text" id="username" placeholder="Username"/>
            <input name="password" type="password" id="password" placeholder="Password" />
            <input type="submit" name="button" id="button" value="Admin Login" />
          </form>
        </div>
        <br />
        <br />
        <br />
      </div>
    </div>
  </div>
</div>
<?php include("../includes/footer_admin.php");?>