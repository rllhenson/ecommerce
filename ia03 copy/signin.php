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
			<div class="topbar">
    			<div class="titlebox">
        			<h2>Admin Login</h2>
        			<br>
    			</div>    
    			<div class="textbox">
			        <form action="admin.php">                
			            <input type="text" name="adminname" placeholder="Username" />
			            <input type="password" name="adminpass" placeholder="Password" />
			            <input type="submit" name="signaction" value="Admin Login"/>    
			        </form>
			  	</div>
			 </div>

	    	<div class="topbar">
			    <div class="titlebox">
			        <br><br>
			    	<h2>Customer Login</h2>
			    	<br>
			    </div>    
	    		<div class="textbox">
			        <form action="client.php">             
			            <input type="text" name="user" placeholder="Username" />
			            <input type="password" name="pass" placeholder="Password" />  
			            <input type="submit" name="signaction" value="Customer Login"/>  
			        </form>

	    		</div> 
			</div>

		</div>
	</div>
</div>

 
<?php

	include 'includes/footer.php'; 
?>