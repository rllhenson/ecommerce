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

            $myreview="SELECT *
            FROM products
            RIGHT JOIN reviews
            ON 'products.productid'='reviews.reviewsid'";
						
					    $result=$mysqli->query($myquery)
							or die ($mysqli->error);

              $result1=$mysqli->query($myreview)
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

                 $row1=$result1->fetch_assoc();
                 $reviewsimg=$row1['reviewsimg'];

									
									// <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
									// <!-- Identify your business so that you can collect the payments. -->
									// <input type="hidden" name="business" value="floor.five@gmail.com">
									// <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
									// <input type="hidden" name="cmd" value="_cart">
									// <input type="hidden" name="add" value="1">
									// <!-- Specify details about the item that buyers will purchase. -->
									// <input type="hidden" name="item_name" value="Birthday - Cake and Candle">
									// <input type="hidden" name="amount" value="3.95">
									// <input type="hidden" name="currency_code" value="USD">
									// <!-- Display the payment button. -->
									// <input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_cart_LG.gif" alt="PayPal - The safer, easier way to pay online">
									// <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" >
									// </form> 

                  // <img src='img/stars.png' alt='quality rating system'>
									print "
                    <div class='catalog_item'>
                      <div class='catalog_img'>
                        <img src='img/".$img."' alt='image of featured product'>
                      </div>
                      <div class='catalog_desc'>
                        <img src='img/".$reviewsimg."' alt='Rating' /><br>
                        
                        <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                        <p>".$size."</p>
                        <p>$".$price."</p>
                        <form method='post' action='cart1.php'>
                        <input type='hidden' name='pid' class='pid' value='$id' />
                        <input type='submit' value='ADD TO CART' /></form>
                      </div>
                    </div>";
                  
								}
							}
						}
					}
				}
			//display featured
			function showfeatured($mysqli){
        $myquery="SELECT * FROM products WHERE stock = 5";//this was last originally

        $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
        $result=$mysqli->query($myquery)
        or die ($mysqli->error);

        $result1=$mysqli->query($myreview)
        or die ($mysqli->error);

        $count=$result->num_rows;
      
        print"<h2 class='catalog_header'>Featured Rugs</h2><hr>";
        if($count > 0)
        {	
          $num=0;
          while ($row=$result->fetch_assoc())
          {	
            $prodname=$row['name'];
            $price=$row['price'];
            $img=$row['prodimg'];
            $size=$row['size'];
            $id=$row['productid'];

            $price=$price/2;

            $num++;

            $row1=$result1->fetch_assoc();
            $reviewsimg=$row1['reviewsimg'];
            print "
              <div class='catalog_item'>
                <div class='catalog_img'>
                  <img src='img/".$img."' alt='image of featured product'>
                </div>
                <div class='catalog_desc'>
                  <img src='img/".$reviewsimg."' alt='quality rating system'>
                  <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                  <p>".$size."</p>
                  <p>$".$price."</p>
                  <form method='post' action='cart1.php'>
                  <input type='hidden' name='pid' class='pid' value='$id' />
                  <input type='submit' value='ADD TO CART' /></form>
                </div>
              </div>";
          }
        }
      }
      
				function orderfloral($mysqli){
					$myquery="SELECT * FROM products WHERE category = 'floral'";//this was last originally
					
				  $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Floral Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

               // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function ordermodern($mysqli){
					$myquery="SELECT * FROM products WHERE category = 'modern'";//this was last originally
					
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Modern Rugs</h2><hr>";
					if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function ordertrad($mysqli){
					$myquery="SELECT * FROM products WHERE category = 'traditional'";//this was last originally
					
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Traditional Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				
				function ordershag($mysqli){
					$myquery="SELECT * FROM products WHERE category = 'shag'";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Shag Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }

				// order by color
				//WHERE   product_name RLIKE '^Bla[[:>::]]' AND product_name LIKE 'Bla%'
				function orderblue($mysqli){
					$myquery="SELECT * FROM products WHERE (description LIKE '% blue %' OR description LIKE 'blue %' OR description LIKE '% blue')";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Blue Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function orderred($mysqli){
					$myquery="SELECT * FROM products WHERE (description LIKE '% red %' OR description LIKE 'red %' OR description LIKE '% red')";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Red Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function orderorange($mysqli){
					$myquery="SELECT * FROM products WHERE (description LIKE '% orange %' OR description LIKE 'orange %' OR description LIKE '% orange')";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Orange Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function orderyellow($mysqli){
					$myquery="SELECT * FROM products WHERE (description LIKE '% yellow %' OR description LIKE 'yellow %' OR description LIKE '% yellow')";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Yellow Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function ordergreen($mysqli){
					$myquery="SELECT * FROM products WHERE (description LIKE '% green %' OR description LIKE 'green %' OR description LIKE '% green')";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Green Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function orderpurple($mysqli){
					$myquery="SELECT * FROM products WHERE (description LIKE '% purple %' OR description LIKE 'purple %' OR description LIKE '% purple')";//this was last originally
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Purple Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function ordersizefour($mysqli){
					$str= "4\' x 4\'";
					$myquery="SELECT * FROM products WHERE size = '$str' ";
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Small Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function ordersizefive($mysqli){
					$str= "5\' x 5\'";
					$myquery="SELECT * FROM products WHERE size = '$str' ";
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Medium Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }
				function ordersizesix($mysqli){
					$str= "6\' x 4\'";
					$myquery="SELECT * FROM products WHERE size = '$str' ";
				
          $myreview="SELECT * FROM products RIGHT JOIN reviews ON 'products.productid'='reviews.reviewsid'";
            
          $result=$mysqli->query($myquery)
          or die ($mysqli->error);

          $result1=$mysqli->query($myreview)
          or die ($mysqli->error);

          $count=$result->num_rows;
				
					print"<h2 class='catalog_header'>Large Rugs</h2><hr>";
          if($count > 0)
          { 
            $num=0;
            while ($row=$result->fetch_assoc())
            { 
              $prodname=$row['name'];
              $price=$row['price'];
              $img=$row['prodimg'];
              $size=$row['size'];
              $id=$row['productid'];

              // $price=$price/2;

              $num++;

              $row1=$result1->fetch_assoc();
              $reviewsimg=$row1['reviewsimg'];
              print "
                <div class='catalog_item'>
                  <div class='catalog_img'>
                    <img src='img/".$img."' alt='image of featured product'>
                  </div>
                  <div class='catalog_desc'>
                    <img src='img/".$reviewsimg."' alt='quality rating system'>
                    <p class='name'><a href='product.php?id=$id'>".$prodname."</a></p>
                    <p>".$size."</p>
                    <p>$".$price."</p>
                    <form method='post' action='cart1.php'>
                    <input type='hidden' name='pid' class='pid' value='$id' />
                    <input type='submit' value='ADD TO CART' /></form>
                  </div>
                </div>";
            }
          }
        }

?>