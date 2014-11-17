<?php 
	$pageTitle='FloorFive Client';
	include 'includes/connect_to_mysql.php';
	include 'includes/valid.php';
	include 'includes/header.php';
	session_start(); 
	error_reporting(E_ALL);

?>
		<div class="clientimage">
			<div id="clientcontent">
				<h2>Your Account</h2>
				<hr>
				<div id="clientDesc">
					<h4>Name</h4>
					<!--<input class="fullline" type="text" value="<?php //echo $fname." ".$lname; ?>" /> -->
					<p class="fullline"><?php echo $fname." ".$lname; ?></p>
					<h4>Address</h4>
					<!--
					<input class="fullline" type="text" value="<?php //echo $address; ?>" />
					<input class="tinyline" type="text" value="<?php //echo $city; ?>" />
					<input class="tinyline" type="text" value="<?php //echo $state; ?>" />
					<input class="tinyline" type="text" value="<?php //echo $zip; ?>" />
					-->
					<p class="fullline"><?php echo $address; ?></p>
					<p class="tinyline"><?php echo $city; ?></p>
					<p class="tinyline"><?php echo $state; ?></p>
					<p class="tinyline"><?php echo $zip; ?></p>
					<h4>Email</h4>
					<!--<input class="fullline" type="email" value="<?php //echo $email; ?>" />-->
					<p class="fullline"><?php echo $email; ?></p>
					<button type="button">Edit Information</button>
					<button type="button">Sign Out</button>
					
				</div>
			</div>
		</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>