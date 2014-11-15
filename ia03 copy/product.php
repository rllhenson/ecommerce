<?php 
$pageTitle='FloorFive Contact';
include 'includes/header.php'; 

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
			<div class="productimage">
				<div id="contactcontent">
					<img src="img/<?php echo $img; ?>" alt="red telephone box rug">
					<div id="soveryclose">
            <p class="producttitle"><?php echo $product_name; ?></p>
            <p class="productdetail">Description: <?php echo $details; ?></p>
            <p class="productdetail">Weight: <?php echo $weight; ?>kg.</p>
            <p class="productdetail">$<?php echo $price.' per '. $size; ?>m. sq.</p>
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
        <p class="reviewtitle">Name:</p>
		<p class="reviewpull"><?php echo $reviewsname; ?></p><br>
        <p class="reviewtitle">Rating:</p>
        <img src="img/<?php echo $reviewsimg; ?>" alt="Rating" /><br>
        <p class="reviewtitle">Review:</p>
		<p class="reviewpull"><?php echo $reviewspost; ?></p>
      </div>
	  <hr id="reviewhr">
      <div id="review">
			<p>Write a review</p>
			<div class="rating">
				<form action="#">
					<input class="reviewcheck" type="radio" name="star" /><img src="img/stars1.png" alt="Hated it" class="ratingimg" />Hated it<br />
					<input class="reviewcheck" type="radio" name="star" /><img src="img/stars2.png" alt="Disliked it" class="ratingimg" />Disliked it<br />
					<input class="reviewcheck" type="radio" name="star" /><img src="img/stars3.png" alt="Liked it" class="ratingimg" />Liked it<br />
					<input class="reviewcheck" type="radio" name="star" /><img src="img/stars4.png" alt="Loved it" class="ratingimg" />Loved it<br />
				</form>
			</div>
			<form action="#" name="submitreview" method="post">
				<textarea name="writereview" placeholder="Write your review here">
				</textarea><br /><br />
				<button type="button" onClick="submitForm(this.submitreview)">Submit</button>
			</form>
		</div>			
			<div id="reviewsent">
				<p>Thank you, your review has been submitted. It will be posted after approval.</p>
			</div>
	</div>
    
    <!--end of content div-->

<?php 
include 'footer.php'; 
?>