<?php 
	$pageTitle='FloorFive Cart';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

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

<?php 
	include 'includes/footer.php'; 
?>