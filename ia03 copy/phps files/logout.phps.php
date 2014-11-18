<?php
	session_start();

	
	unset($_SESSION["clientuser"]); 
	unset($_SESSION["clientpass"]); 
	unset($_SESSION["clientid"]); 
	// setcookie($_COOKIE['clientuser'],'',time()-3600);
	// session_destroy();
	header('Location: ../signin.php');
	exit;

?>


