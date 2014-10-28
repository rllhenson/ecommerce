<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Floor5 Fulfillment - Rachel Loveland</title>

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
  				<button type="button"><img src="img/search.png" alt="magnifying glass" width="26" height="26"/></button>
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

		<div class="fulfillimage">
			<div id="fulfillcontent">
				<h2>Checkout</h2>
				<hr>
				<div class="fulfillinfo">
					<h4 class="fulfillname">First Name</h4>
					<h4 class="fulfillname">Last Name</h4>
					<input class="nametext" type="text">
					<input class="nametext" type="text">
					<h4>Address Line One</h4>
					<input class="fulltext" type="text">
					<h4>Address Line Two</h4>
					<input class="fulltext" type="text">
					<h4 class="fulfilladdress">City, State</h4>
					<h4 class="fulfilladdress">Zip Code</h4>
					<h4 class="fulfilladdress">Country</h4>
					<input class="fulfillad" type="text">
					<input class="fulfillad" type="text">
					<input class="fulfillad" type="text">
					<h4 class="fulfillname">Phone Number</h4>
					<h4 class="fulfillname">Email</h4>
					<input class="nametext" type="text">
					<input class="nametext" type="text">

				</div>
				<div class="fulfillinfo">
					<h4 class="fulfillname">Card Type</h4>
					<h4 class="fulfillname">Card Number</h4>
					<input class="nametext" type="text">
					<input class="nametext" type="text">
					<h4 class="fulfillname">Name on Card</h4>
					<h4 class="fulfillname">Expiration Date</h4>
					<input class="fulfillad" type="text">
					<select class="fulfillad">
						<option>01</option>
						<option>02</option>
						<option>03</option>
						<option>04</option>
						<option>05</option>
						<option>06</option>
						<option>07</option>
						<option>08</option>
						<option>09</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
					</select>
					<select class="fulfillad">
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
					</select>
					<h4>Security Number</h4>
					<input type="text">
					<button type="button" disabled>Submit Payment</button>
					<h4>or</h4>
					<button type="button" disabled>Checkout Using Paypal</button>
				</div>
			</div>
			<div id="ordersummary">
				<h2>Order Summary</h2>
				<h2>Estimated Shipping</h2>
				<h2>Total Price</h2>
				<hr>
				<br/>
				<p>Blue Flower Rug (1) $50</p>
				<p>$5.99</p>
				<p>$55.99</p>
			</div>
		</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>