<?php 
	$pageTitle='FloorFive Sign Up';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

		<div class="contactimage">
			<div id="clientcontent">
				<h2>Sign Up</h2>
				<div id="topbar">
    		 
    			<div id="textbox">
			        <form>                
			            <input type="text" name="fname" placeholder="First Name" />
			            <input type="text" name="lname" placeholder="Last Name" />
			            <input type="text" name="add" placeholder="Address" />
			            <input type="text" name="city" placeholder="City" />
			            <input type="text" name="state" placeholder="State" />
			            <input type="text" name="zip" placeholder="Zip Code" />
			            <input type="text" name="email" placeholder="Email" />
			            <input type="text" name="pass" placeholder="Create a Password" />
			           

			            <a href="#"><center><button type="button">Create Account</button></center></a>

			        </form>
			  </div>

		  
					</div>
				</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>