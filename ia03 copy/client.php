<?php 
	$pageTitle='FloorFive Client';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);

	if(isset($_POST['action'])){
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
	}
?>

		<div class="clientimage">
			<div id="clientcontent">
				<h2>Your Account</h2>
				<hr>
				<div id="clientDesc">
					<?php
						$uname = $_REQUEST["username"];

						$myquery="SELECT * FROM `priv_users` WHERE `username` = $uname"; 

					    $result=$mysqli->query($myquery)
							or die ($mysqli->error);

						$fname = $_POST["fname"]; 
						$lname = $_POST["lname"];
						$address = $_POST["address"];
						$city = $_POST["city"];
						$state = $_POST["state"]; 
						$zip = $_POST["zipcode"];
						$email = $_POST["email"];
						$pword = $_POST["password"];
						$uname = $_POST["username"];


					?>
					<h4>Name</h4>
					<input class="fullline" type="text" value="<?php echo $fname." ".$lname; ?>">
					<h4>Address</h4>
					<input class="fullline" type="text" value="<?php echo $address; ?>">
					<input class="tinyline" type="text" value="<?php echo $city; ?>">
					<input class="tinyline" type="text" value="<?php echo $state; ?>">
					<input class="tinyline" type="text" value="<?php echo $zipcode; ?>">
					<h4>Email</h4>
					<input class="fullline" type="email" value="<?php echo $email; ?>">
					<button type="button">Edit Information</button>
					<button type="button">Sign Out</button>
					
				</div>
			</div>
		</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>