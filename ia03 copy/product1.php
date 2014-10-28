<?php 
	$pageTitle='FloorFive Product Page';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

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
				<div class="review">
					<p>Write a review</p>
					<div class="rating">
						<span onclick="star1()">☆</span>
						<span onclick="star2()">☆</span>
						<span onclick="star3()">☆</span>
						<span onclick="star4()">☆</span>
					</div>
					<form action="none" name="review">
						<textarea name="writereview" placeholder="Write your review here">
						</textarea>
					</form>
				</div>
				<button class="reviewbutton" type="button" onclick="">Submit</button>
			</div>
		</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>