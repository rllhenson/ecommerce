<?php
	session_start();

	
	unset($_SESSION["adminuser"]); 
	unset($_SESSION["adminpassword"]); 
	unset($_SESSION["adminid"]); 
	// setcookie($_COOKIE['clientuser'],'',time()-3600);
	// session_destroy();
	header('Location: ../storeadmin/admin_login.php');
	exit;

?>