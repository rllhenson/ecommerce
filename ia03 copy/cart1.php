<?php 
$pageTitle='FloorFive Cart';
include 'includes/header.php';
include 'includes/connect_to_mysql.php';
session_start(); 
error_reporting(E_ALL);
?>
<?php
//Remove items from cart
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>
<?php 
//Change items from cart
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
  //if quantity > than amount in mysql, print error
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
}
?>
<?php 
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
      $i++;
      while (list($key, $value) = each($each_item)) {
      if ($key == "item_id" && $value == $pid) {
        // That item is in cart already so let's adjust its quantity using array_splice()
        array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
        $wasFound = true;
      } // close if condition
      } // close while loop
     } // close foreach loop
   if ($wasFound == false) {
     array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
   }
	}
}
?>
<?php
// Render Cart
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
	// Start PayPal Checkout Button
	$pp_checkout_btn .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="you@youremail.com">';
	// Start the For Each loop
	$i = 0; 
  foreach ($_SESSION["cart_array"] as $each_item) {
		$item_id = $each_item['item_id'];
		//$sql = mysql_query("SELECT * FROM products WHERE productid='$item_id' LIMIT 1");
	    //$row = mysql_fetch_array($sql) is inside thie while()
	    $myquery = "SELECT * FROM products WHERE productid='$item_id' LIMIT 1";
	    $result=$mysqli->query($myquery)
	      or die ($mysqli->error);
	    $count=$result->num_rows;
	    
	    //if($count > 0){
	      //while ($row=$result->fetch_assoc()) {
	      	$row=$result->fetch_assoc();
	        $product_name = $row["name"];
	        $price = $row["price"];
	        $details = $row["description"];
	        $img = $row["prodimg"];
	    //   }
	    // }
    
		$pricetotal = $price * $each_item['quantity'];
		$cartTotal = $pricetotal + $cartTotal;
		setlocale(LC_MONETARY, "en_US");
        $pricetotal = number_format($pricetotal, 2);
        //money_format("%10.2n", $pricetotal);
		// Dynamic Checkout Btn Assembly
		$x = $i + 1;
		$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
		// Create the product array variable
		$product_id_array .= "$item_id-".$each_item['quantity'].","; 
		// Dynamic table row assembly
		$cartOutput .= "<tr>";
		$cartOutput .= '<td><a href="product.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="img/'. $img .'" alt="' . $product_name. '" width="52" height="52" border="1" /></td>';
		$cartOutput .= '<td>' . $details . '</td>';
		$cartOutput .= '<td>$' . $price . '</td>';
		$cartOutput .= '<td><form action="cart1.php" method="post">
		<input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<input name="adjustBtn' . $item_id . '" type="submit" value="change" />
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$cartOutput .= '<td>' . $pricetotal . '</td>';
		$cartOutput .= '<td><form action="cart1.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .= '</tr>';
		$i++; 
    }
	setlocale(LC_MONETARY, "en_US");
    $cartTotal = number_format($cartTotal, 2);
	$cartTotal = "<div>Cart Total : ".$cartTotal." USD</div>";
    // Finish the Paypal Checkout Btn
	$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
	<input type="hidden" name="notify_url" value="https://www.yoursite.com/storescripts/my_ipn.php">
	<input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="cbt" value="Return to The Store">
	<input type="hidden" name="cancel_return" value="https://www.yoursite.com/paypal_cancel.php">
	<input type="hidden" name="lc" value="US">
	<input type="hidden" name="currency_code" value="USD">
	<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
	</form>';
}
?>
    <!--continuing content div-->
		<div class="cartimage">
			<div id="cartcontent">
				<div class="tablehead">
					<h2>Your Cart</h2>
				</div>
				<hr>
        <?php //echo "$pid"; ?>
        <table>
          <tr>
            <td width="20%">Product</td>
            <td width="30%">Product Description</td>
            <td width="20%">Unit Price</td>
            <td width="10%">Quantity</td>
            <td width="10%">Total</td>
            <td width="10%">Remove</td>
          </tr>
          <?php echo $cartOutput; ?>
        </table>
        
        <br />
        
				<div class="total">
          <?php echo $cartTotal; ?>
					<!--<p>Total Quanitity: 2</p>
					<p>Total Price: $170</p>-->
				</div>
				<?php echo $pp_checkout_btn; ?>
				<!-- <button type="button" onclick="location.href='admin.php'">Sign In and Check Out</button> -->
				<!-- <button type="button" onclick="location.href='fulfillment.php'">Check Out as Guest</button> -->
			</div>
		</div>
	</div><!--end of content div-->


<?php 
include 'includes/footer.php'; 
?>