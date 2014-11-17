<?php
	session_start();
	unset($_SESSION["clientuser"]); 
	unset($_SESSION["clientpass"]); 
	unset($_SESSION["id"]); 
	// setcookie($_COOKIE['clientuser'],'',time()-3600);
	// session_destroy();
	header('Location: ../signin.php');
	exit;

?>



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