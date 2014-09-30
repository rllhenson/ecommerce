<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Floor5 Home - Rachel Loveland</title>

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/edit.css"/>
</head>

<body>

<!-- 	<div class="container">
		<div class="one">1</div>
		<div class="one">2</div>
		<div class="one">3</div>
	</div>
 -->
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

		<div class="imageslider">
			<!-- <img src="img/header_rugs.jpg"/> -->
			<h2>BRING THE OUTSIDE IN</h2>
		</div>

	</div>

	<div class='featured'>
		<h2>Featured Products</h2>
		<hr>
		<?php
			//display featured
			function showfeatured($mysqli){
				$myquery="SELECT name,price,prodimg,size FROM products WHERE stock <= 5";//this was last originally
			
			    $result=$mysqli->query($myquery)
					or die ($mysqli->error);

				$count=$result->num_rows;
			
				
				if($count > 0)
				{	
					$rownumber=0;
					$num=0;
					while ($row=$result->fetch_assoc())
					{	

						$prodname=$row['name'];
						$price=$row['price'];
						$img=$row['prodimg'];
						$size=$row['size'];

						$price=$price/2;

						$num++;
						
						print "<div class='featured_item'>
									<div class='featured_img'><img src='img/".$img."' alt='image of featured product'></div>
									<div class='featured_desc'><p class='name'>".$prodname."</p><p>$".$price."</p><p>".$size."</p>
									<button type='button' disabled>ADD TO CART</button>
									</div>
								</div>";

					}
				}
			}

			$mysqli = new mysqli("sulley.cah.ucf.edu", 'ra072140', 'amilu91', 'ra072140');

			$errnum=mysqli_connect_errno();
			if ($errnum) 
			{
		     	$errmsg=mysqli_connect_error();
				print "Connect failed. error number=$errnum<br />
		        		error message=$errmsg";    
				exit();
			}
			

			showfeatured($mysqli);

			$mysqli->close();
		?>
	</div>


	<div class="sitelink">
		<h4>terms and conditions</h4>
	</div>


	<div class="footer">
		<p>This site is not official and is an assignment for a UCF Digital Media Course.</p>
		<p>Designed by Rachel Loveland</p>
	</div>


	

</body>

</html>