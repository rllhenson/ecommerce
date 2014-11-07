<?php
	$pageTitle='FloorFive Admin';
	include 'includes/header.php';
	include 'includes/connect_to_mysql.php';
	session_start(); 
	error_reporting(E_ALL);

?>
			<div class="adminimage">
				<div id="admincontent">
					<h2>Stock</h2>
					<hr>
					<div id="stockstuff">
					<?php
					function  showlist($mysqli){
						$myquery="SELECT * FROM products ORDER BY productid";//added order by productid
					
					    $result=$mysqli->query($myquery)
							or die ($mysqli->error); 
					
						$count=$result->num_rows;
					
						if($count > 0)
						{	$output="<table><tr>
							<th><input type='submit' name='action' value='ID'></th>
							<th><input type='submit' name='action' value='Name'></th>
							<th><input type='submit' name='action' value='Description'></th>
							<th><input type='submit' name='action' value='Category'></th>
							<th><input type='submit' name='action' value='SKU'></th>
							<th><input type='submit' name='action' value='Stock'></th>
							<th><input type='submit' name='action' value='Cost'></th>
							<th><input type='submit' name='action' value='Price'></th>
							<th><input type='submit' name='action' value='Image'></th>
							<th><input type='submit' name='action' value='Weight'></th>
							<th><input type='submit' name='action' value='Size'></th></tr>";
							$rownumber=0;
							$num=0;
							//$numfind[$idnum] = array(); 
							while ($row=$result->fetch_assoc())
							{	
								$idnum=$row['productid'];
								$prodname=$row['name'];
								$proddesc=$row['description'];
								$cat=$row['category'];
								$sku=$row['sku'];
								$stock=$row['stock'];
								$cost=$row['cost'];
								$price=$row['price'];
								$img=$row['image'];
								$weight=$row['weight'];
								$size=$row['size'];

								$num++;
								$output.= "<tr>
								<td>$idnum</td>
								<td>$prodname</td>
								<td>$proddesc</td>
								<td>$cat</td>
								<td>$sku</td>
								<td>$stock</td>
								<td>$cost</td>
								<td>$price</td>
								<td>$img</td>
								<td>$weight</td>
								<td>$size</td>
								</tr>";
								//array_push($numfind[$idnum],$num);
							}
							$output.= "</table> <br />";
							print $output;
						} #count
						else print "There is no rug info in the database.<br />";
					} #showlist
					
					

					showlist($mysqli);
					?>

					</div>
					
				</div>
			</div>

		</div>
		


<?php 
	include 'includes/footer.php'; 
?>