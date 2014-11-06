<?php 
$pageTitle='FloorFive Contact';
include 'header.php'; 

?>
<?php
//Grab 1 item from products
if (isset($_GET['id'])) {
include 'includes/connect_to_mysql.php';
$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
$myquery = "SELECT * FROM products WHERE productid='$id' LIMIT 1";
$result=$mysqli->query($myquery)
  or die ($mysqli->error);
$count=$result->num_rows;
    
  if($count > 0){
    while ($row=$result->fetch_assoc()) {
      $product_name = $row["name"];
      $price = $row["price"];
      $details = $row["description"];
      $img = $row["prodimg"];
      $weight = $row["weight"];
      $size = $row["size"];
    }
  } else {
  echo "That item does not exist.";
    exit();
	}
} else {
	echo "Page is missing data.";
	exit();
}
?> 

<?php
//Pull all reviews where id matches product
//Grab 1 item from products
if (isset($_GET['id'])) {
include 'includes/connect_to_mysql.php';
$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
$myquery = "SELECT * FROM reviews WHERE reviewsid='$id'";
$result=$mysqli->query($myquery)
  or die ($mysqli->error);
$count=$result->num_rows;
    
  if($count > 0){
    while ($row=$result->fetch_assoc()) {
      $reviewsname = $row["reviewsname"];
      $reviewsimg = $row["reviewsimg"];
      $reviewspost = $row["reviewspost"];
    }
  } else {
  echo "There's no reviews yet for this product.";
    exit();
	}
} else {
	echo "Page is missing data.";
	exit();
}
?>
      <!--continuing content div-->
			<div class="contactimage">
				<div id="contactcontent">
					<img src="img/<?php echo $img; ?>" alt="red telephone box rug">
					<div id="soveryclose">
            <p><?php echo $product_name; ?></p>
            <p><?php echo $details; ?></p>
            <p><?php echo $weight; ?>kg.</p>
            <p>$<?php echo $price.' per '. $size; ?>m. sq.</p>
            <p></p>
            <form id="form1" name="form1" method="post" action="cart1.php">
              <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
              <input type="submit" name="button" id="button" value="Add to Cart" />
            </form>
          </div>
				</div>
			</div>
      
      <div class="customerreview">
        <p>Customer Reviews</p>
        <p class="reviewtitle"><?php echo $reviewsname; ?></p>
        <p class="reviewtitle">Rating:</p>
        <img src="img/<?php echo $reviewsimg; ?>" alt="Rating" />
        <p class="reviewtitle"><?php echo $reviewspost; ?></p>
      </div>
      <div id="review">
					<p>Write a review</p>
					<div class="rating">
						<span onclick="star1()">☆</span>
						<span onclick="star2()">☆</span>
						<span onclick="star3()">☆</span>
						<span onclick="star4()">☆</span>
					</div>
					<form action="#" name="submitreview" method="post">
						<textarea name="writereview" placeholder="Write your review here">
						</textarea>
						<input type="submit" id="submitreview"></input>
					</form>
				</div>
				<div id="reviewsent">
					<p>Thank you, your review has been submitted. It will be posted after approval.</p>
				</div>
		</div><!--end of content div-->

<?php 
include 'footer.php'; 
?>