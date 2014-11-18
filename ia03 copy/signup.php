<?php 
	$pageTitle='FloorFive Sign Up';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	include 'includes/google_analytics_tracking.js';
 
	error_reporting(E_ALL);
?>

		<div class="signinimage">
			<div id="clientcontent">
				<h2>Sign Up</h2>
				<div id="topbar">
    		 
    			<div id="textbox">
			        <form method="post" action="client.php">             
			            <input type="text" name="fname" placeholder="First Name" />
			            <input type="text" name="lname" placeholder="Last Name" />
			            <input type="text" name="address" placeholder="Address" />
			            <input type="text" name="city" placeholder="City" />
			            <input type="text" name="state" placeholder="State" />
			            <input type="text" name="zipcode" placeholder="Zip Code" />
			            <input type="text" name="email" placeholder="Email" />
			            <br/>
			            <input type="text" name="username" placeholder="User Name" />
			            <input type="text" name="password" placeholder="Create a Password" />
			           	<br/>
			            <input type="submit" name="action" value="Create Account" />
			        </form>
			 	</div>
			</div>
		</div>
	</div>
</div>

<?php 
	include 'includes/footer.php'; 
?>