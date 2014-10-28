<?php 
	$pageTitle='FloorFive Catalog';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);
?>

		
			<div class='catalogcontent'>
				<div id='catalog'>
					<form method="post" action="">
						<div class='orderby'><h2>Order by Category</h2><hr><input type='submit' name='action' value='floral'><input type='submit' name='action' value='modern'><input type='submit' name='action' value='traditional'><input type='submit' name='action' value='shag'></div>
						<div class='orderby'><h2>Order by Color</h2><hr><input type='submit' name='action' value='red'><input type='submit' name='action' value='orange'><input type='submit' name='action' value='yellow'><input type='submit' name='action' value='green'><input type='submit' name='action' value='blue'><input type='submit' name='action' value='purple'></div>
						<div class='orderby'><h2>Order by Size</h2><hr><input type='submit' name='action' value="4' x 4'"><input type='submit' name='action' value="5' x 5'"><input type='submit' name='action' value="6' x 4'"></div>
					</form>
				</div>
			</div>
			

		</div>

		<div class="productscentered">
		

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
					$myquery="SELECT name,price,prodimg,size,stock FROM products WHERE category = 'floral'";//this was last originally
					
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
					                  <img src='img/".$img."' alt='image of featured product'></div>
					                  <div class='catalog_desc'>
					                  <img src='img/stars.png' alt='quality rating system'>
					                  <p class='name'>".$prodname."</p>
					                  <p>".$size."</p>
					                  <p>$".$price."</p>
					                  <input type='hidden' name='pid' id='pid' value='$id' />
					                  <input type='submit' value='ADD TO CART' />
					                </div>
					              </div>
					            </form>";
							// <div class='catalog_item'>
							// 			<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
							// 			<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
							// 			<button type='button' disabled>ADD TO CART</button>
							// 			</div>
							// 		</div>";


						}
					}
				}
				function ordermodern($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE category = 'modern'";//this was last originally
					
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function ordertrad($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE category = 'traditional'";//this was last originally
					
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}

				function showfeatured($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE stock = 5";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							$price=$price/2;

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				
				function ordershag($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE category = 'shag'";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}

				// order by color
				//WHERE   product_name RLIKE '^Bla[[:>::]]' AND product_name LIKE 'Bla%'
				function orderblue($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE (description LIKE '% blue %' OR description LIKE 'blue %' OR description LIKE '% blue')";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function orderred($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE (description LIKE '% red %' OR description LIKE 'red %' OR description LIKE '% red')";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function orderorange($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE (description LIKE '% orange %' OR description LIKE 'orange %' OR description LIKE '% orange')";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function orderyellow($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE (description LIKE '% yellow %' OR description LIKE 'yellow %' OR description LIKE '% yellow')";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function ordergreen($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE (description LIKE '% green %' OR description LIKE 'green %' OR description LIKE '% green')";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function orderpurple($mysqli){
					$myquery="SELECT name,price,prodimg,size FROM products WHERE (description LIKE '% purple %' OR description LIKE 'purple %' OR description LIKE '% purple')";//this was last originally
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function ordersizefour($mysqli){
					$str= "4\' x 4\'";
					$myquery="SELECT name,price,prodimg,size FROM products WHERE size = '$str' ";
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function ordersizefive($mysqli){
					$str= "5\' x 5\'";
					$myquery="SELECT name,price,prodimg,size FROM products WHERE size = '$str' ";
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
										<button type='button' disabled>ADD TO CART</button>
										</div>
									</div>";


						}
					}
				}
				function ordersizesix($mysqli){
					$str= "6\' x 4\'";
					$myquery="SELECT name,price,prodimg,size FROM products WHERE size = '$str' ";
				
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

							$prodname=$row['name'];
							$price=$row['price'];
							$img=$row['prodimg'];
							$size=$row['size'];

							

							$num++;
							
							
							print "<div class='catalog_item'>
										<div class='catalog_img'><img src='img/".$img."' alt='image of featured product'></div>
										<div class='catalog_desc'><img src='img/stars.png' alt='quality rating system'><p class='name'>".$prodname."</p><p>".$size."</p><p>$".$price."</p>
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

				



				

				if(!isset($_POST['action'])){
					showfeatured($mysqli);
				}else{
					$act=$_POST['action'];

					if ($act=='Search'){
						//$sterms=$_POST['submitsearch'];
						searchstuff($mysqli);
					}


					

					else if ($act=='floral'){

						orderfloral($mysqli);	

					}else if ($act=='modern'){

						ordermodern($mysqli);

					}else if ($act=='traditional'){
						
						ordertrad($mysqli);

					}else if ($act=='shag'){
						
						ordershag($mysqli);
						
					}else if ($act=='red'){
						
						orderred($mysqli);
						
					}else if ($act=='orange'){
						
						orderorange($mysqli);
						
					}else if ($act=='yellow'){
						
						orderyellow($mysqli);
						
					}else if ($act=='green'){
						
						ordergreen($mysqli);
						
					}else if ($act=='blue'){
						
						orderblue($mysqli);
						
					}else if ($act=='purple'){
						
						orderpurple($mysqli);

					}else if ($act=="4' x 4'"){
						
						ordersizefour($mysqli);

					}else if ($act=="5' x 5'"){
						
						ordersizefive($mysqli);

					}else if ($act=="6' x 4'"){
						
						ordersizesix($mysqli);

					}else{
						showfeatured($mysqli);
					}	
				}
			?>
		</div>
<?php 
	include 'includes/footer.php'; 
?>