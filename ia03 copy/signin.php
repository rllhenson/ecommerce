<?php 
	$pageTitle='FloorFive Sign In';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

		<div class="signinimage">
			<div id="clientcontent">
				<h2>Sign In</h2>
				<br>
				<h4>Don't have an account? <a href="signup.php">Sign Up</a>.</h4>
				<br><br>
				<div id="topbar">
	    			<div id="titlebox">
	        			<h2>Admin Login</h2>
	        			<br>
	    			</div>    
	    			<div id="textbox">
				        <form action="admin.php">                
				            <input type="text" name="adminname" placeholder="Username" />
				            <input type="password" name="adminpass" nameplaceholder="Password" />
				            <input type="submit" value="Sign In"/>    
				        </form>
				  	</div>
				 </div>

		    	<div id="topbar">
				    <div id="titlebox">
				        <br><br>
				    	<h2>Customer Login<h2>
				    	<br>
				    </div>    
		    		<div id="textbox">
				        <form action="client.php">             
				            <input type="text" name="user" placeholder="Username" />
				            <input type="password" name="pass" placeholder="Password" />  
				            <input type="submit" value="Sign In"/>  
				        </form>
	
		    		</div> 
				</div>

			</div>

<?php 
	include 'includes/footer.php'; 
?>