<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Floor5 Admin - Rachel Loveland</title>

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

		<div class="adminimage">
			<div id="admincontent">
				<h2>Recent Orders</h2>
				<hr>
				<div id="orders">
					<table><tr>
					<th>order number</th><th>name</th><th>quantity</th><th>price</th><th>order date</th></tr>
					
					<tr><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td></tr>
					
					<tr><td>123456</td><td>Blue Flower Rug</td><td>1</td><td>sale</td><td>10/02/2014</td></tr>
					<tr><td>123457</td><td>Red Ombre Rug</td><td>2</td><td>full</td><td>10/02/2014</td></tr>
					<tr><td>123458</td><td>Purple Dyed Rug</td><td>1</td><td>full</td><td>10/06/2014</td></tr>
					</table>
					<button type="button">Review All</button>
				</div>
				<h2>Out of Stock</h2>
				<hr>
				<div id="stockstuff">
					<p>Orange Persian Rug</p><p>RUG-OR-5-5-SQ</p><button type="button">Order More</button>
					<p>Red Shag Rug</p><p>RUG-RD-4-4-CRL</p><button type="button">Order More</button>
					<p>Yellow Foral Rug</p><p>RUG-YL-6-4-RCT</p><button type="button">Order More</button>
				</div>
				<h2>Current Sales</h2>
				<hr>
				<div id="salestuff">
					<table><tr>
					<th>name</th><th>seller</th><th>stock</th><th>price</th></tr>
					<tr><td><hr></td><td><hr></td><td><hr></td><td><hr></td></tr>
					
					<tr><td>Blue Flower Rug</td><td>seller</td><td>2</td><td>50%</td></tr>
					<tr><td>Blue Mum Rug</td><td>seller</td><td>3</td><td>50%</td></tr>
					<tr><td>Blue Peony Rug</td><td>seller</td><td>1</td><td>50%</td></tr>
					</table>
					<button type="button">Change Sales</button>
				</div>
				<button type="button">View Accounts</button>
				<button type="button">View Inventory</button>
				<button type="button">View Sellers</button>
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