<?php
// validating login stuff



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

		$mysqli->query("INSERT INTO priv_users (fname, lname, address, city, state, zipcode, email, password, username) 
			VALUES ('$fname', '$lname', '$address', '$city', '$state', '$zip', '$email', '$pword', '$uname')")/* insert the data to the food_menu table*/
		    or die ("Could not add the data to table");//error message

	}else if(isset($_POST['signaction'])&&$_POST['signaction']=='Customer Login'){
		$uname = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];


		$myquery="SELECT * FROM `priv_users` WHERE `username` = '$uname'"; 

	    $result=$mysqli->query($myquery)
			or die ($mysqli->error);

		while($row=$result->fetch_assoc()){
			$fname = $row["fname"]; 
			$lname = $row["lname"];
			$address = $row["address"];
			$city = $row["city"];
			$state = $row["state"]; 
			$zip = $row["zipcode"];
			$email = $row["email"];
		}
		// $pword = $_POST["password"];
		// $uname = $_POST["username"];
	}
?>