<?php 
	$pageTitle='FloorFive About';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	include 'includes/google_analytics_tracking.js';
	
	error_reporting(E_ALL);
?>

		<div class="aboutimage">
			<div id="aboutcontent">
            
            	<div id="grouppic"><img src="img/andy_small.png" alt="rolled rugs"></div>
            
				<div id="whatnot"><h2>Andy Duong CEO</h2><br /><p>Floor Five Designs is the world's leading company in providing products to accent any interior. Our products have been utilized in any interior from corporate buildings including the Plaza in New York City to the homes of individuals all over the world. Over two decades ago, Andy Duong the company's CEO, decided to dedicate his his to provide all customers ith the utmost quality rugs of all sizes and types. He and his phenomenal team have and will  be availible to satisfy all your rug and carpet needs!</p><br />                 
                <a href="img/andy_small.png" class="lightbox_trigger" id="andybutton">
                	View large
                </a>
                </div>

				<h2>Meet Our Team</h2>
				<div class="human">
					<img src="img/rachel_small.png" alt="two humans in a rug shop">
					<h4>Rachel Loveland</h4>
					<p>CTO, Graduated from the New York School of Carpet and Design, handles any and all things about the company that involve technology.</p>
                	<a href="img/rachel_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
				<div class="human">
					<img src="img/zahra_small.png" alt="what?">
					<h4>Zahra Karim</h4>
					<p>VP of Operations, organized and focused; she makes sure everything to do with operations and orders run smoothly</p>
                   	<a href="img/zahra_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
				<div class="human">
					<img src="img/keegan_small.png" alt="my precious...">
					<h4>Keegan Sanford</h4>
					<p>Chief Designer, he either designs or handpicks all products seen here or in Floor Five's storefronts.</p>
                   	<a href="img/keegan_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
				<div class="human">
					<img src="img/anna_small.png" alt="don't f with me brenda">
					<h4>Anna Kimball</h4>
					<p>VP of Sales and Finance, handles all things money and makes sure that sales are smooth and successful.</p>
                   	<a href="img/anna_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
			</div>
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script src="js/lightbox_trigger.js"></script>


<?php 
	include 'includes/footer.php'; 
?>