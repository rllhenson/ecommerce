<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Floor5 Blue Flower Rug - Floor 5</title>

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/edit.css"/>
	<script type="text/javascript" src="js/process_form.js"></script>
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

		<div class="productimage">
			<div id="productcontent">
				<div class="tablehead">
					<!-- Pull from Database -->
					<h2>
						<?php 
																								
							$con=mysqli_connect("sulley.cah.ucf.edu", 'ra072140', 'amilu91', 'ra072140');
							// Check connection
							if (mysqli_connect_errno()) {
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
																
							$result = mysqli_query($con,"SELECT * FROM products");
							
							while($row = mysqli_fetch_array($result)) {
								if ($row['productid']=="3"){
									echo $row['name']; 
								  
								}
								else {
								}
							}
						?>
					</h2>				
					
				</div>
				<hr>
				<div class="product">
					
					<!-- Pull from database -->
					<?php 
						$result = mysqli_query($con,"SELECT * FROM products");
						
						while($row = mysqli_fetch_array($result)) {
							if ($row['productid']=="3"){
					?>
								<img class="productimg" src="img/<?php echo $row['prodimg'] ?>" alt="Blue Flower Rug" />
								<?php
							}
							else {
							}
						}
								?>
					
					<div class="productdesc">
						
						<!-- Pull Product, Size, Price, Rating from Database -->
						<p>
							<?php 
																									
								$result = mysqli_query($con,"SELECT * FROM products");
						
								while($row = mysqli_fetch_array($result)) {
									if ($row['productid']=="3"){
									echo $row['size']; 
							  
									}
									else {
									}
								}
							?>
						</p>
						<p id="priceitem">$
							<?php 
																									
								$result = mysqli_query($con,"SELECT * FROM products");
						
								while($row = mysqli_fetch_array($result)) {
									if ($row['productid']=="3"){
									echo $row['price']; 
							  
									}
									else {
									}
								}
							?>
						</p>
						<div class="stars">
							<img src="img/stars3.png" alt="Rating" />
						</div>
					</div>
					<button type='button' disabled>ADD TO CART</button>							
					
				</div>
				<div class="customerreview">
				<!-- Reviews need to be pulled from Review Database -->
					<p>Customer Reviews</p>
					<p class="reviewtitle">Name:</p>
					<!-- Pull name -->
					<p class="reviewpull">
						<?php 
																								
							$con=mysqli_connect("sulley.cah.ucf.edu", 'an840579', 'Hatsuharu1!', 'an840579');
							// Check connection
							if (mysqli_connect_errno()) {
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
																
							$result = mysqli_query($con,"SELECT * FROM reviews");
							
							while($row = mysqli_fetch_array($result)) {
								if ($row['reviewsid']=="1"){
									echo $row['reviewsname']; 
								  
								}
								else {
								}
							}
						?>
					</p><br />
					<p class="reviewtitle">Rating:</p>
					<!-- Pull Img -->
						<?php 
						$result = mysqli_query($con,"SELECT * FROM reviews");
						
						while($row = mysqli_fetch_array($result)) {
							if ($row['reviewsid']=="1"){
					?>
								<img src="img/<?php echo $row['reviewsimg'] ?>" alt="Rating" />
								<?php
							}
							else {
							}
						}
								?>
					<br />
					<p class="reviewtitle">Review:</p>
					<!-- Pull Review -->
					<p class="reviewpull">
						<?php 
																									
								$result = mysqli_query($con,"SELECT * FROM reviews");
						
								while($row = mysqli_fetch_array($result)) {
									if ($row['reviewsid']=="1"){
									echo $row['reviewspost']; 
							  
									}
									else {
									}
								}
							?>
					</p>
					<hr>
					<p class="reviewtitle">Name:</p>
					<!-- Pull name -->
					<p class="reviewpull">
						<?php 
																								
							$con=mysqli_connect("sulley.cah.ucf.edu", 'an840579', 'Hatsuharu1!', 'an840579');
							// Check connection
							if (mysqli_connect_errno()) {
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
																
							$result = mysqli_query($con,"SELECT * FROM reviews");
							
							while($row = mysqli_fetch_array($result)) {
								if ($row['reviewsid']=="2"){
									echo $row['reviewsname']; 
								  
								}
								else {
								}
							}
						?>
					</p><br />
					<p class="reviewtitle">Rating:</p>
					<!-- Pull Img -->
						<?php 
						$result = mysqli_query($con,"SELECT * FROM reviews");
						
						while($row = mysqli_fetch_array($result)) {
							if ($row['reviewsid']=="2"){
					?>
								<img src="img/<?php echo $row['reviewsimg'] ?>" alt="Rating" />
								<?php
							}
							else {
							}
						}
								?>
					<br />
					<p class="reviewtitle">Review:</p>
					<!-- Pull Review -->
					<p class="reviewpull">
						<?php 
																									
								$result = mysqli_query($con,"SELECT * FROM reviews");
						
								while($row = mysqli_fetch_array($result)) {
									if ($row['reviewsid']=="2"){
									echo $row['reviewspost']; 
							  
									}
									else {
									}
								}
							?>
					</p>
				</div>
				<div id="review">
					<p>Write a review</p>
					<div class="rating">
						<span onclick="star1()">☆</span>
						<span onclick="star2()">☆</span>
						<span onclick="star3()">☆</span>
						<span onclick="star4()">☆</span>
					</div>
					<form action="#" name="submitreview" method="post">
						<textarea name="writereview" placeholder="Write your review here">
						</textarea>
						<button type="button" onClick="submitForm(this.submitreview)">Submit</button>
					</form>
				</div>
				<div id="reviewsent">
					<p>Thank you, your review has been submitted. It will be posted after approval.</p>
				</div>
			</div>
		</div>

	</div>


	<div class="sitelink">
		<h4><a href="policy.php">terms and conditions</a></h4>
	</div>


	<div class="footer">
		<p>This site is not official and is an assignment for a UCF Digital Media Course.</p>
		<p>Designed by Floor 5</p>
	</div>


	

</body>

</html>