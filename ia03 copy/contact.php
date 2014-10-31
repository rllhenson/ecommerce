<?php 
	$pageTitle='FloorFive Contact';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

			<div class="contactimage">
				<div id="contactcontent">
					<img src="img/header_rug.jpg" alt="contact header image">
					<div id="soveryclose">
						<h4>Name</h4>
						<input type="text">
						<h4>Return Email</h4>
						<input type="text">
						<h4>Subject</h4>
						<input type="text">
						<h4>Message</h4>
						<!-- make this a superbig text box -->
						<textarea rows="4" name="whatevs">We would love to hear from you. Please enter a question or comment here...</textarea>
						<button type="button">Send Message</button>
					</div>
				</div>
			</div>
		</div>

	<div class="diflocations">
		<h2>Our Locations</h2>
		<hr>
		<div class="onelocation">
			<h4>California Location</h4>
			<hr>
			<p>1657 Riverside Drive,<br/>Redding, CA 96001</p>
			<br/>
			<p>Mon-Fri<br/>8am-5pm</p>
			<br/>
			<p>(310) 576-6466</p>
			<img src="img/cali_store.jpg" alt="California location's storefront">
			<button type="button">Get Directions</button>
		</div>
		<div class="onelocation">
			<h4>New York Location</h4>
			<hr>
			<p>228 Park Ave S,<br/>New York, NY 10003-1502</p>
			<br/>
			<p>Mon-Sat<br/>9am-4pm</p>
			<br/>
			<p>(646) 467-6665</p>
			<img src="img/storefront_ny.jpg" alt="New York location's storefront">
			<button type="button">Get Directions</button>
		</div>
		<div class="onelocation">
			<h4>Florida Location</h4>
			<hr>
			<p>4000 Central Florida Blvd,<br/>Orlando, FL 32816</p>
			<br/>
			<p>Mon-Fri<br/>11am-7pm</p>
			<br/>
			<p>(407) 823-2000</p>
			<img src="img/florida_store.jpg" alt="Orlando location's storefront">
			<button type="button">Get Directions</button>
		</div>
	</div>

	

<?php 
	include 'includes/footer.php'; 
?>