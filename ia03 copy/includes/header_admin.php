<?php
//session_start();
if(isset($_SESSION["adminuser"])){
          $inorout= '<a href="?logout"><h4>logout</h4></a>';
        }
        else {
          $inorout= '<a href="admin_login.php"><h4>signin</h4></a>';
        }
        ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title><?php print $pageTitle; ?></title>

	<link rel="stylesheet" href="../css/reset.css"/>
	<link rel="stylesheet" href="../css/styles.css"/>
</head>

<body>

	<div class="gutter"></div>
	<div class="header">
		<div class="logo">
			<a href="../home.php"><img src="../img/logo1.png" alt="Floor Five Interior Designs"/></a>
		</div>

		<div class="space_between_logo">
			<!-- <p>&nbsp;</p> -->
		</div>

		<div class="log_search">
			<div class="log">

        <?php echo $inorout;?>

			</div>
		</div>
	</div>
	
	<div class="gutter"></div>
  
  	<div class="content">

		<div class="nav">
			<ul>
				<li><a href="../home.php">home</a></li>
				<li><a href="../about.php">about</a></li>
				<li><a href="../catalog.php">catalog</a></li>
				<li class="contact" ><a href="../contact.php">contact</a></li>
			</ul>

		</div>