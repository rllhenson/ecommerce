<?php 
	$pageTitle='FloorFive Catalog';
	include 'includes/header.php';
	include 'includes/search.php';
	include 'includes/connect_to_mysql.php';

	error_reporting(E_ALL);
?>

		
			<div class='catalogcontent'>
				<form method="post" action="#">
					<div id='catalog'>
						<div class='orderby'><h2>Order by Category</h2><hr><input type='submit' name='action' value='floral'><input type='submit' name='action' value='modern'><input type='submit' name='action' value='traditional'><input type='submit' name='action' value='shag'></div>
						<div class='orderby'><h2>Order by Color</h2><hr><input type='submit' name='action' value='red'><input type='submit' name='action' value='orange'><input type='submit' name='action' value='yellow'><input type='submit' name='action' value='green'><input type='submit' name='action' value='blue'><input type='submit' name='action' value='purple'></div>
						<div class='orderby'><h2>Order by Size</h2><hr><input type='submit' name='action' value="4' x 4'"><input type='submit' name='action' value="5' x 5'"><input type='submit' name='action' value="6' x 4'"></div>
					</div>
				</form>
			</div>
			

		</div>
		<div class="productscentered">
			<?php
			//search function

				

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