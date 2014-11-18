<?php 
	$pageTitle='FloorFive Client';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	// include 'includes/valid.php';
	// $clientuser=$_SESSION['clientuser'];
	
	// session_start(); 
	// include 'includes/google_analytics_tracking.js';

	error_reporting(E_ALL);

?>
		<div class="clientimage">
			<div id="clientcontent">
				<h2>Your Account</h2>
				<hr>
				<div id="clientDesc">
					<?php

					// print_r($_SESSION);

					if(!isset($_POST['edit_client'])){
						$myquery = "SELECT * FROM priv_users WHERE userid=".$_SESSION['clientid']."";
					  	$result=$mysqli->query($myquery)
					    	or die ($mysqli->error);
						while($row=$result->fetch_assoc()){
							$id = $row["userid"];
							$fname = $row["fname"]; 
							$lname = $row["lname"];
							$address = $row["address"];
							$city = $row["city"];
							$state = $row["state"]; 
							$zip = $row["zipcode"];
							$email = $row["email"];
						}
					?>
					<?php echo "<h4>Name</h4>
								<p class='fullline'>$fname $lname</p>
								<h4>Address</h4>
								<p class='fullline'>$address</p>
								<p class='tinyline'>$city</p>
								<p class='tinyline'>$state</p>
								<p class='tinyline'>$zip</p>
								<h4>Email</h4>
								<p class='fullline'>".$email."</p>";
					?>
					<form method="post" action="client.php">
						<input type="submit" name="edit_client" value="Edit Information">
					</form>
					<a href="includes/logout.php"><button type="button" id="logout_client">Logout</button></a>
					<?php
					}else if($_POST['edit_client']=='Edit Information'){
						$myquery = "SELECT * FROM priv_users WHERE userid=".$_SESSION['clientid']."";
					  	$result=$mysqli->query($myquery)
					    	or die ($mysqli->error);
						while($row=$result->fetch_assoc()){
							$id = $row["userid"];
							$fname = $row["fname"]; 
							$lname = $row["lname"];
							$address = $row["address"];
							$city = $row["city"];
							$state = $row["state"]; 
							$zip = $row["zipcode"];
							$email = $row["email"];
						}
						
						echo '
						<form method="post" action="client.php">
							<h4>Name</h4>
							<input class="tinyline" type="text" name="fname" value="'.$fname.'" />
							<input class="tinyline" type="text" name="lname" value="'.$lname.'" />
							<h4>Address</h4>
							
							<input class="fullline" type="text" name="address" value="'.$address.'" />
							<input class="tinyline" type="text" name="city" value="'.$city.'" />
							<input class="tinyline" type="text" name="state" value="'.$state.'" />
							<input class="tinyline" type="text" name="zip" value="'.$zip.'" />
							
							<h4>Email</h4>
							<input class="fullline" type="email" name="email" value="'.$email.'" />
		
							<input type="submit" name="edit_client" value="Save" />
							<input type="submit" name="edit_client" value="Cancel"/>
						</form>';
							
					}else if ($_POST['edit_client']=='Save'){
						$fnameX=$_POST['fname'];
						$lnameX=$_POST['lname'];
						$addressX=$_POST['address'];
						$cityX=$_POST['city'];
						$stateX=$_POST['state'];
						$zipX=$_POST['zip'];
						$emailX=$_POST['email'];
						
						// ESSENTIAL cleaning to avoid SQL Injectin Attack
						$fname=$mysqli->real_escape_string($fnameX);
						$lname=$mysqli->real_escape_string($lnameX);
						$address=$mysqli->real_escape_string($addressX);
						$city=$mysqli->real_escape_string($cityX);
						$state=$mysqli->real_escape_string($stateX);
						$zip=$mysqli->real_escape_string($zipX);
						$email=$mysqli->real_escape_string($emailX);

						// The 'null' in the VALUES list allows the auto-incrementing idnumber to work
						$query="UPDATE priv_users SET fname='$fname', lname='$lname', address='$address', city='$city', state='$state', zipcode='$zip', email='$email' WHERE userid=".$_SESSION['clientid']."";
						//WHERE course LIKE '$courses%

						$result=$mysqli->query($query)
							or die ($mysqli->error); 


						echo "<h4>Name</h4>
							<p class='fullline'>$fname $lname</p>
							<h4>Address</h4>
							<p class='fullline'>$address</p>
							<p class='tinyline'>$city</p>
							<p class='tinyline'>$state</p>
							<p class='tinyline'>$zip</p>
							<h4>Email</h4>
							<p class='fullline'>".$email."</p>";
					?>

						<form method="post" action="client.php">
							<input type="submit" name="edit_client" value="Edit Information">
						</form>
						<!-- <a href="includes/logout.php"><button type="button" id="logout_client">Logout</button></a> -->
						<button type="button" id="logout_client" onclick="location.href='http://http://sulley.cah.ucf.edu/~ra072140/dig4530c_group04/A/includes/logout.php'">Logout</button>


					<?php
					}else if ($_POST['edit_client']=='Cancel'){

						$myquery = "SELECT * FROM priv_users WHERE userid=".$_SESSION['clientid']."";
					  	$result=$mysqli->query($myquery)
					    	or die ($mysqli->error);
						while($row=$result->fetch_assoc()){
							$id = $row["userid"];
							$fname = $row["fname"]; 
							$lname = $row["lname"];
							$address = $row["address"];
							$city = $row["city"];
							$state = $row["state"]; 
							$zip = $row["zipcode"];
							$email = $row["email"];
						}

						echo "<h4>Name</h4>
							<p class='fullline'>$fname $lname</p>
							<h4>Address</h4>
							<p class='fullline'>$address</p>
							<p class='tinyline'>$city</p>
							<p class='tinyline'>$state</p>
							<p class='tinyline'>$zip</p>
							<h4>Email</h4>
							<p class='fullline'>".$email."</p>";

					?>		
						<form method="post" action="client.php">
							<input type="submit" name="edit_client" value="Edit Information">
						</form>
						<!-- <a href="includes/logout.php"><button type="button" id="logout_client">Logout</button></a> -->
						<button type="button" id="logout_client" onclick="location.href='http://http://sulley.cah.ucf.edu/~ra072140/dig4530c_group04/A/includes/logout.php'">Logout</button>
					

					<?php
					}
						
					?>

				</div>
			</div>
		</div>
	</div>


<?php 
	include 'includes/footer.php'; 
?>