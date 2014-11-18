<?php
// validating login stuff
$pageTitle='FloorFive Customer Log In';
session_start();
include "connect_to_mysql.php"; 

	
	// sign up stuff
	if(isset($_POST['action'])&&$_POST['action']=='Create Account'){
		$fname = $_REQUEST["fname"]; 
		$lname = $_REQUEST["lname"];
		$address = $_REQUEST["address"];
		$city = $_REQUEST["city"];
		$state = $_REQUEST["state"]; 
		$zip = $_REQUEST["zipcode"];
		$email = $_REQUEST["email"];
		$pword = $_REQUEST["password"];
		$uname = $_REQUEST["username"];

		$myquery = "SELECT * FROM priv_users";
		$result=$mysqli->query($myquery)
	    	or die ($mysqli->error);
	    $count=$result->num_rows;
	    while ($row=$result->fetch_assoc()) {
	    	$newid = $row["userid"];
	    	
	    }
	    $newid=$newid + 1;

// 	    ($link,"INSERT INTO web_formitem (`ID`, `formID`, `caption`, `key`, `sortorder`, `type`, `enabled`, `mandatory`, `data`)
// VALUES (105, 7, 'Tip izdelka (6)', 'producttype_6', 42, 5, 1, 0, 0)")

	    mysqli_query($mysqli,"INSERT INTO priv_users (fname, lname, address, city, state, zipcode, email, password, username) 
			VALUES ('$fname', '$lname', '$address', '$city', '$state', '$zip', '$email', '$pword', '$uname')")
		or die(mysqli_error($mysqli));

		// $mysqli->query("INSERT INTO priv_users (fname, lname, address, city, state, zipcode, email, password, username) 
		// 	VALUES ('$newid', $fname', '$lname', '$address', '$city', '$state', '$zip', '$email', '$pword', '$uname')")/* insert the data to the food_menu table*/
		//     or die ("Could not add the data to table");//error message

	   	$_SESSION["clientid"] = $newid;
	   	$_SESSION["clientuser"] = $uname;
	   	$_SESSION["clientpass"] = $pword;
	   	header("location: ../client.php");
	    exit();

	}else if(isset($_POST['signaction'])&&$_POST['signaction']=='Customer Login'){
	// else if (isset($_POST["user"]) && isset($_POST["pass"])) {

		// $clientuser = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user"]);
	  	// $clientpass = preg_replace('#[^A-Za-z0-9^]#i', '', $_POST["pass"]); 
  		$clientuserX = $_REQUEST['user'];
		$clientpassX = $_REQUEST['pass'];
		$clientuser=$mysqli->real_escape_string($clientuserX);
		$clientpass=$mysqli->real_escape_string($clientpassX);

	  	$myquery = "SELECT * FROM priv_users WHERE username='$clientuser' AND password='$clientpass'";
	  	$result=$mysqli->query($myquery)
	    	or die ($mysqli->error);
	    $count=$result->num_rows;
	   	if ($count == 1) { // evaluate the count
     		while ($row=$result->fetch_assoc()) {
		    	$id = $row["userid"];
				$fname = $row["fname"]; 
				$lname = $row["lname"];
				$address = $row["address"];
				$city = $row["city"];
				$state = $row["state"]; 
				$zip = $row["zipcode"];
				$email = $row["email"];
		  	}

		   	$_SESSION["clientid"] = $id;
		   	$_SESSION["clientuser"] = $clientuser;
		   	$_SESSION["clientpass"] = $clientpass;
		   	header("location: ../client.php");
		    exit();
		} else {
			include("../includes/header_client.php");
		    echo "<div id='wrong'><p>That is the incorrect username or password, try again here <a href='../signin.php'>Customer Login</a>,
		    or if you don't have an account, you can <a href='../signup.php'>Sign Up</a></p></div>";
		    echo '</div>';
		    include("../includes/footer.php");
		    exit();
		}
	}
	


?>