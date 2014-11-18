<?php 
	$pageTitle='FloorFive Contact';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';


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
							<form action="#" name="submitcontact" method="post">
							<textarea rows="4">We would love to hear from you. Please enter a question or comment here...</textarea>
							<button type="button" onClick="submitContactForm(this.submitcontact)">Send Message</button>
						</form>
					</div>
					<div id="contactsent">
						<p>Thank you, your message has been sent. We will be in touch with you within 48 hours.</p>
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
			<a href="img/cali_storemap.png" class="lightbox_trigger">
                	Get Directions
            </a>
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
			<a href="img/nyc_storemap.png" class="lightbox_trigger">
                	Get Directions
            </a>
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
			<a href="img/fla_storemap.png" class="lightbox_trigger">
                	Get Directions
            </a>
		</div>
	</div>

	
	<script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script src="js/lightbox_trigger.js"></script>


<?php 
	include 'includes/footer.php'; 
?>