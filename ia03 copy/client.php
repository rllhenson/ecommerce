<?php 
	$pageTitle='FloorFive Client';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

		<div class="clientimage">
			<div id="clientcontent">
				<h2>Your Account</h2>
				<hr>
				<div id="clientDesc">
					<h4>Name</h4>
					<input class="fullline" type="text" value="Bill Murray">
					<h4>Address</h4>
					<input class="fullline" type="text" value="333 Continental Boulevard">
					<input class="tinyline" type="text" value="El Segundo">
					<input class="tinyline" type="text" value="California">
					<input class="tinyline" type="text" value="90245-5012">
					<h4>Email</h4>
					<input class="fullline" type="email" value="555puksatawnyman@gmail.com">
					<button type="button">Edit Information</button>
					<button type="button">Sign Out</button>
					
				</div>
			</div>
		</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>