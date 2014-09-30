<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Floor5 Cart - Rachel Loveland</title>

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/edit.css"/>
</head>

<body>

		<div class="gutter"></div>
	<div class="header">
		<div class="logo">
			<img src="img/logo1.png" alt="Floor Five Interior Designs"/>
		</div>

		<div class="space_between_logo">
			<!-- <p>&nbsp;</p> -->
		</div>

		<div class="log_search">
			<div class="log">
				<a href="http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/client.php"><h4>view account</h4></a><p>/</p><a href="http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/cart.php"><h4>view cart</h4></a>
			</div>
			<div class="search">
			<!-- eventually this will be in a form -->
				<input type="text" name="sitesearch">
				<!-- for button I'll need form=form id of the form search is in -->
  				<button type="submit"><img src="img/search.png" alt="magnifying glass" width="26" height="26"/></button>
			</div>
		</div>
	</div>
	<div class="gutter"></div>


	<div class="content">

		<div class="nav">
			<ul>
				<li><a href="http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/home.php">home</a></li>
				<li><a href="http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/about.html">about</a></li>
				<li><a href="http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/catalog.php">catalog</a></li>
				<li class="contact" ><a href="http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/contact.html">contact</a></li>
			</ul>

		</div>

		<div class="cartimage">
			<div id="cartcontent">
				<div class="tablehead">
					<h2>Your Cart</h2>
					<!-- <h4>Price</h4>
					<h4>Quantity</h4> -->
				</div>
				<hr>
				<div class="cartitem">
					<img src="img/bl_white_clover_circle.jpg" alt="an item in the cart">
					<div class="cartdesc">
						<p>Blue Quatrefoil Rug</p>
						<p>5' x 5'</p>
					</div>
					<p class="priceitem">$80</p>
					
					<select>
						<?php
						 // at some point, I need to take the number from the stock and make that the avaiable values
						    for ($i=1; $i<=100; $i++)
						    {
						        
						        print '<option value="'.$i.'">'.$i.'</option>';
						        
						    }
						?>
					</select>
				</div>
				<div class="cartitem">
					<img src="img/orange_persian_square.jpg" alt="an item in the cart">
					<div class="cartdesc">
						<p>Orange Persian Rug</p>
						<p>5' x 5'</p>
					</div>
					<p class="priceitem">$90</p>
					<select>
						<?php
						 // at some point, I need to take the number from the stock and make that the avaiable values
						    for ($i=1; $i<=100; $i++)
						    {
						        
						        print '<option value="'.$i.'">'.$i.'</option>';
						        
						    }
						?>
					</select>
				</div>
				<div class="total">
					<p>Total Quanitity: 2</p>
					<p>Total Price: $170</p>
				</div>
				<button type="button" onclick="location.href='http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/admin.php'">Sign In and Check Out</button>
				<button type="button" onclick="location.href='http://sulley.cah.ucf.edu/~ra072140/dig4530c/assignments/ia03/fulfillment.php'">Check Out as Guest</button>
			</div>
		</div>

	</div>


	<div class="sitelink">
		<h4>terms and conditions</h4>
	</div>


	<div class="footer">
		<p>This site is not official and is an assignment for a UCF Digital Media Course.</p>
		<p>Designed by Rachel Loveland</p>
	</div>


	

</body>

</html>