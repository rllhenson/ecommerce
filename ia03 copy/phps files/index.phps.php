<?php 
$pageTitle='FloorFive Admin Log In';
include '../includes/header_admin.php';
// session_start();
if (!isset($_SESSION["adminuser"])) {
    header("location: admin_login.php"); 
    exit();
}
// Be sure to check that this adminuser SESSION value is in fact in the database
$adminuserID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
$adminuser = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["adminuser"]);
$password = preg_replace('#[^A-Za-z0-9^]#i', '', $_SESSION["password"]); 
include "../includes/connect_to_mysql.php"; 
$myquery = "SELECT * FROM admin WHERE id='$adminuserID' AND username='$adminuser' AND password='$password' LIMIT 1";
$result=$mysqli->query($myquery)
  or die ($mysqli->error);
$count=$result->num_rows;
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
if ($count == 0) {
	 echo "Your login session data is not on record in the database.";
     exit();
}

if(isset($_GET['logout'])) {
unset($_SESSION["adminsuser"]); 
setcookie($_COOKIE['adminuser'],'',time()-3600);
session_destroy();
header('Location: ../home.php');
exit;
}
?>

  <div class="adminimage">
		<div id="admincontent"><br />
      <div align="left" style="margin-left:24px;">
        <h2>Hello Admin, MANAGE YOUR INVENTORY</h2>
        <p><a href="inventory_list.php">Manage Inventory</a></p>
      </div>
    <br />
    </div>
  </div>
</div>
<?php include_once("../includes/footer_admin.php");?>