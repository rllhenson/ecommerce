<?php 
	$pageTitle='FloorFive Client';
	// $loginclient==1;
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);

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

		<div class="clientimage">
			<div id="clientcontent">
				<h2>Your Account</h2>
				<hr>
				<div id="clientDesc">
					<h4>Name</h4>
					<input class="fullline" type="text" value="<?php echo $fname." ".$lname; ?>">
					<h4>Address</h4>
					<input class="fullline" type="text" value="<?php echo $address; ?>">
					<input class="tinyline" type="text" value="<?php echo $city; ?>">
					<input class="tinyline" type="text" value="<?php echo $state; ?>">
					<input class="tinyline" type="text" value="<?php echo $zip; ?>">
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