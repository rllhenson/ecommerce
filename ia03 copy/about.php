<?php 
	$pageTitle='FloorFive About';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

		<div class="aboutimage">
			<div id="aboutcontent">
				<div id="whatnot">Floor Five Designs is the world's leading company in providing products to accent any interior. Our products have been utilized in any interior from corporate buildings including the Plaza in New York City to the homes of individuals such as Olivia Wilde and Robert Franklin. For over two decades we at Floor Five have dedicated our lives to providing you with the utmost quality rugs for your interior, and intend to continue doing so for many more.</div>
				<div id="grouppic"><img src="img/rolleduprugs.png" alt="rolled rugs"></div>
				<h2>Meet Our Team</h2>
				<div class="human">
					<img src="img/two_people_rugshop.jpg" alt="two humans in a rug shop">
					<h4>Syndey Mikelson</h4>
					<p>CEO, Graduated from the New York School of Carpet and Design. Likes to pretend he knows anything about rugs.</p>
					
				</div>
				<div class="human">
					<img src="img/braidingman.jpg" alt="what?">
					<h4>Gustave Allard</h4>
					<p>VP of Operations, Trecked to the Canadian wilds to master the woven badger knotting technique present in our fine woven rugs.</p>
				
				</div>
				<div class="human">
					<img src="img/lady_rugshop.jpg" alt="my precious...">
					<h4>Anabella Grier</h4>
					<p>Chief Designer, she either designs or handpicks all products seen here or in Floor Five's storefronts. Obsessively.</p>
					
				</div>
				<div class="human">
					<img src="img/twoladies_rug.gif" alt="don't f with me brenda">
					<h4>Margaret Mathews</h4>
					<p>VP of Sales and Finance, yells at those (cough, Anabella) who spend far too much of the company's money.</p>
					
				</div>
			</div>
		</div>

	</div>



<?php 
	include 'includes/footer.php'; 
?>