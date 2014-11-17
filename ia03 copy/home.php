<?php 
	$pageTitle='FloorFive Home';

	include 'includes/connect_to_mysql.php';
	include 'includes/header.php';

	error_reporting(E_ALL);
?>

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
				$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE stock <= 5";//this was last originally
			
			    $result=$mysqli->query($myquery)
					or die ($mysqli->error);

				$count=$result->num_rows;
			
				
				if($count > 0)
				{	
					$rownumber=0;
					$num=0;
					while ($row=$result->fetch_assoc())
					{	

						$id=$row['productid'];
						$prodname=$row['name'];
						$price=$row['price'];
						$img=$row['prodimg'];
						$size=$row['size'];

						$price=$price/2;

						$num++;
						
						print "
					            
							<form method='post' action='cart1.php'>
								<div class='featured_item'>
									<div class='featured_img'><img src='img/".$img."' alt='image of featured product'></div>
									<div class='featured_desc'><p class='name'><a href='product.php?id=$id'>".$prodname."</a></p><p>$".$price."</p><p>".$size."</p>
									<input type='hidden' name='pid' id='pid' value='$id' />
									<input type='submit' value='ADD TO CART'>
									</div>
								</div>
							</form>";

					}
				}
			}

			showfeatured($mysqli);

			$mysqli->close();
		?>
	</div>


<?php 
	include 'includes/footer.php'; 
?>