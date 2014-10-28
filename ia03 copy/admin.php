<?php

		$pageTitle='FloorFive Admin';
		include 'includes/header.php';
		include 'includes/connect_to_mysql.php';
		session_start(); 
		error_reporting(E_ALL);

?>
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

		</div>;
		


<?php 
	include 'includes/footer.php'; 
?>