<?php 
	$pageTitle='FloorFive About';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

		<div class="aboutimage">
			<div id="aboutcontent">
            
            	<div id="grouppic"><img src="img/andy_small.png" alt="rolled rugs"></div>
            
				<div id="whatnot"><h2>Andy Duong CEO</h2><br /><p>Floor Five Designs is the world's leading company in providing products to accent any interior. Our products have been utilized in any interior from corporate buildings including the Plaza in New York City to the homes of individuals such as Olivia Wilde and Robert Franklin. For over two decades we at Floor Five have dedicated our lives to providing you with the utmost quality rugs for your interior, and intend to continue doing so for many more.</p><br />                 
                <a href="img/andy_small.png" class="lightbox_trigger" id="andybutton">
                	View large
                </a>
                </div>

				<h2>Meet Our Team</h2>
				<div class="human">
					<img src="img/rachel_small.png" alt="two humans in a rug shop">
					<h4>Rachel Loveland</h4>
					<p>CEO, Graduated from the New York School of Carpet and Design. Likes to pretend he knows anything about rugs.</p>
                	<a href="img/rachel_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
				<div class="human">
					<img src="img/zahra_small.png" alt="what?">
					<h4>Zahra Kabrim</h4>
					<p>VP of Operations, Trecked to the Canadian wilds to master the woven badger knotting technique present in our fine woven rugs.</p>
                   	<a href="img/zahra_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
				<div class="human">
					<img src="img/keegan_small.png" alt="my precious...">
					<h4>Keegan Sanford</h4>
					<p>Chief Designer, she either designs or handpicks all products seen here or in Floor Five's storefronts. Obsessively.</p>
                   	<a href="img/keegan_small.png" class="lightbox_trigger">
                	View large
                	</a>
				</div>
				<div class="human">
					<img src="img/anna_small.png" alt="don't f with me brenda">
					<h4>Anna Kimball</h4>
					<p>VP of Sales and Finance, yells at those (cough, Anabella) who spend far too much of the company's money.</p>
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