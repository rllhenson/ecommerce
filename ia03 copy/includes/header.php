<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title><?php $pageTitle ?></title>

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/edit.css"/>

</head>

<body>

	<div class="gutter"></div>
	<div class="header">
		

		

		<form  action='catalog.php' method='post'>
        <div class="logo">
			<img src="img/logo1.png" alt="Floor Five Interior Designs"/>
		</div>
        
        <div class="space_between_logo">
		</div>
        
			<div class="log_search">
				<div class="log">
					<a href="signin.php"><h4>sign in</h4></a><p>/</p><a href="cart1.php"><h4>view cart</h4></a>
				</div>
				<div class="search">
					<input type="text" name="sitesearch" autocomplete="off" placeholder="search products">
	  				<input type='submit' name='action' value='Search'>
	  				<!--<button type="button"><img src="img/search.png" alt="magnifying glass" width="26" height="26"/></button>
			 -->
				</div>
			</div>
		</form>
	</div>
	<div class="gutter"></div>
  
  	<div class="content">

		<div class="nav">
			<ul>
				<li><a href="home.php">home</a></li>
				<li><a href="about.php">about</a></li>
				<li><a href="catalog.php">catalog</a></li>
				<li class="contact" ><a href="contact.php">contact</a></li>
			</ul>

		</div>