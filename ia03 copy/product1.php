
<?php 
	$pageTitle='FloorFive Product Page';
	include 'header.php';
	include 'includes/connect_to_mysql.php';
	include 'includes/google_analytics_tracking.js';
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
				<div id="review">
					<p>Write a review</p>
					<div class="rating">
						<form action="#">
							<input type="checkbox" name="1star" value="Hated it"><img src="img/stars1.png" alt="Hated it" /> Hated It<br>
							<input type="checkbox" name="2star"><img src="img/stars2.png" alt="Disliked it" /> Disliked it<br>
							<input type="checkbox" name="3star"><img src="img/stars3.png" alt="Liked it" /> Liked it<br>
							<input type="checkbox" name="4star"><img src="img/stars4.png" alt="Loved it" /> Loved it<br>
						</form>
					</div>
					<form action="#" name="submitreview" method="post">
						<textarea name="writereview" placeholder="Write your review here">
						</textarea>
						<button type="button" onClick="submitForm(this.submitreview)">Submit</button>
					</form>
				</div>
				<div id="reviewsent">
					<p>Thank you, your review has been submitted. We are currently processing your review and it will be posted after approval.</p>
				</div>
			</div>
		</div>

	</div>


<?php 
	include 'includes/footer.php'; 
?>

