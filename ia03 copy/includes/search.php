<?php
	function searchstuff($mysqli){

					//$sterms = (isset($_GET['submitsearch']) ? $_GET['submitsearch'] : null);

					// $firstname=$_POST['sitesearch'];	
					// print "The dude's first name is $firstname. <br />";	
					// $button=$_POST['submitsearch'];	
					// print "The button clicked= '$button'.";

					//$sterms = htmlspecialchars($_POST['sitesearch']);
					$stermsX = $_POST['sitesearch'];
					$sterms=$mysqli->real_escape_string($stermsX);

					//echo htmlspecialchars($_POST['sitesearch']);

					// echo $sterms;
					if(!(isset($sterms))){
						print "<p>Please type something to search.</p>";
					}

					else{

						$trimterm = trim($sterms);

						$myquery="SELECT name,price,productid,prodimg,size,stock FROM `products` 
						WHERE `description` LIKE '%{$trimterm}%' 
						OR `category` LIKE '%{$trimterm}%' 
						OR `name` LIKE '%{$trimterm}%' 
						OR `size` LIKE '%{$trimterm}%'";//this was last originally
						
					    $result=$mysqli->query($myquery)
							or die ($mysqli->error);

						if($result==NULL){
							echo "<p>I'm sorry, nothing has matched your search.</p>";
						}
						else{

							$count=$result->num_rows;
						
							print"<h2 class='catalog_header'>Search Results</h2><hr>";
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
									$stock=$row['stock'];

									if($stock<=5){
										$price=$price/2;
									}

									$num++;
									
									
									print "
							            <form method='post' action='cart1.php'>
											<div class='catalog_item'>
												<div class='catalog_img'>
													<img src='img/".$img."' alt='image of featured product'>
												</div>
												<div class='catalog_desc'>
													<img src='img/stars.png' alt='quality rating system'>
													<p class='name'>".$prodname."</p>
													<p>".$size."</p>
													<p>$".$price."</p>
													<input type='hidden' name='pid' id='pid' value='$id' />
													<input type='submit' value='ADD TO CART'>
												</div>
											</div>
										</form>";


								}
							}
						}
					}
				}
			//display featured
				function orderfloral($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size,stock FROM products WHERE category = 'floral'";//this was last originally
					
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Floral Rugs</h2><hr>";
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
							$stock=$row['stock'];

							if($stock<=5){
								$price=$price/2;
							}

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function ordermodern($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE category = 'modern'";//this was last originally
					
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Modern Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function ordertrad($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE category = 'traditional'";//this was last originally
					
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Traditional Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}

				function showfeatured($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE stock = 5";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Featured Rugs</h2><hr>";
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
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				
				function ordershag($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE category = 'shag'";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Shag Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}

				// order by color
				//WHERE   product_name RLIKE '^Bla[[:>::]]' AND product_name LIKE 'Bla%'
				function orderblue($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE (description LIKE '% blue %' OR description LIKE 'blue %' OR description LIKE '% blue')";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Blue Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function orderred($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE (description LIKE '% red %' OR description LIKE 'red %' OR description LIKE '% red')";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Red Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function orderorange($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE (description LIKE '% orange %' OR description LIKE 'orange %' OR description LIKE '% orange')";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Orange Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function orderyellow($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE (description LIKE '% yellow %' OR description LIKE 'yellow %' OR description LIKE '% yellow')";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Yellow Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function ordergreen($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE (description LIKE '% green %' OR description LIKE 'green %' OR description LIKE '% green')";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Green Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function orderpurple($mysqli){
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE (description LIKE '% purple %' OR description LIKE 'purple %' OR description LIKE '% purple')";//this was last originally
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Purple Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function ordersizefour($mysqli){
					$str= "4\' x 4\'";
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE size = '$str' ";
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Small Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function ordersizefive($mysqli){
					$str= "5\' x 5\'";
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE size = '$str' ";
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Medium Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}
				function ordersizesix($mysqli){
					$str= "6\' x 4\'";
					$myquery="SELECT productid,name,price,prodimg,size FROM products WHERE size = '$str' ";
				
				    $result=$mysqli->query($myquery)
						or die ($mysqli->error);

					$count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Large Rugs</h2><hr>";
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

							

							$num++;
							
							
							print "
					            <form method='post' action='cart1.php'>
									<div class='catalog_item'>
										<div class='catalog_img'>
											<img src='img/".$img."' alt='image of featured product'>
										</div>
										<div class='catalog_desc'>
											<img src='img/stars.png' alt='quality rating system'>
											<p class='name'>".$prodname."</p>
											<p>".$size."</p>
											<p>$".$price."</p>
											<input type='hidden' name='pid' id='pid' value='$id' />
											<input type='submit' value='ADD TO CART'>
										</div>
									</div>
								</form>";


						}
					}
				}

?>