<?php 
$pageTitle='FloorFive Admin Log In';
include '../includes/header_admin.php';
// session_start();
if (!isset($_SESSION["adminuser"])) {
    header("location: admin_login.php"); 
    exit();
}
// Be sure to check that this adminuser SESSION value is in fact in the database
$adminuserID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
$adminuser = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["adminuser"]);
$password = preg_replace('#[^A-Za-z0-9^]#i', '', $_SESSION["password"]); 
include "../includes/connect_to_mysql.php"; 
$myquery = "SELECT * FROM admin WHERE id='$adminuserID' AND username='$adminuser' AND password='$password' LIMIT 1";
$result=$mysqli->query($myquery)
  or die ($mysqli->error);
$count=$result->num_rows;
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
if ($count == 0) {
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?php 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
  $pid = mysql_real_escape_string($_POST['thisID']);
  $product_name = mysql_real_escape_string($_POST['product_name']);
  $description = mysql_real_escape_string($_POST['description']);
  $category = mysql_real_escape_string($_POST['category']);
  $sku = mysql_real_escape_string($_POST['sku']);
  $stock = mysql_real_escape_string($_POST['stock']);
	$cost = mysql_real_escape_string($_POST['cost']);
  $price = mysql_real_escape_string($_POST['price']);
	$weight = mysql_real_escape_string($_POST['weight']);
  $size = mysql_real_escape_string($_POST['size']);
  
  if ($_FILES['fileField']['tmp_name'] != "") {
	    // Place image in the folder 
	    $newname = basename( $_FILES["fileField"]["tmp_name"]);
	    move_uploaded_file($_FILES['fileField']['tmp_name'], "../img/$newname");
	}
  $prodimg=basename( $_FILES["fileField"]["tmp_name"]);
  $myquery = "UPDATE products SET name='$product_name', description='$description', category='$category', sku='$sku', stock='$stock', cost='$cost', price='$price', prodimg='$prodimg', weight='$weight', size='$size' WHERE productid='$pid'";
  $result=$mysqli->query($myquery)
    or die ($mysqli->error);
    
  header("location: inventory_list.php"); 
    exit();
}
?>
<?php 
// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
  $targetID = $_GET['pid'];
  $myquery = "SELECT * FROM products WHERE productid='$targetID' LIMIT 1";
  $result=$mysqli->query($myquery)
    or die ($mysqli->error);
  $productCount=$result->num_rows;
  if ($productCount > 0) {
    while($row=$result->fetch_assoc()){ 
      $product_name = $row['name'];
      $description = $row['description'];
      $category = $row['category'];
      $sku = $row['sku'];
      $stock = $row['stock'];
      $cost = $row['cost'];
      $price = $row['price'];
      $prodimg = $row['prodimg'];
      $weight = $row['weight'];
      $size = $row['size'];
    }
  }
  else {
    exit();
  }
}

if(isset($_GET['logout'])) {
unset($_SESSION["adminsuser"]); 
setcookie($_COOKIE['adminuser'],'',time()-3600);
// session_destroy();
header('Location: ../home.php');
exit;
}
?>

  <div class="adminimage">
		<div id="admincontent">
    <h2>Add New Inventory Item Form</h2>
      <div align="right" style="margin-right:32px;"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
      <hr />
      <a name="inventoryForm" id="inventoryForm"></a>
      <div id="stockstuff">
        <form id="addProduct" action="inventory_edit.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
        <table>
        <tr>
            <td>Name</td>
            <td><input name="product_name" type="text" id="product_name" value="<?php echo $product_name; ?>"/></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><textarea name="description" id="description" cols="32" rows="3"><?php echo $description; ?></textarea></td>
          </tr>
          <tr>
            <td>Category</td>
            <td>
            <select name="category" id="category">
              <option value="<?php echo $category; ?>"></option>
              <option value="shag">Shag</option>
              <option value="modern">Modern</option>
              <option value="floral">Floral</option>
              <option value="traditional">Traditional</option>
              <option value="woven">Woven</option>
            </select></td>
          </tr>
          <tr>
            <td>SKU</td>
            <td><input name="sku" type="text" id="sku" value="<?php echo $sku; ?>"/></td>
          </tr>
          <tr>
            <td>Stock</td>
            <td><input name="stock" type="text" id="stock" value="<?php echo $stock; ?>"/></td>
          </tr>
          <tr>
            <td>Cost</td>
            <td><input name="cost" type="number" id="cost" value="<?php echo $cost; ?>"/></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><input name="price" type="number" id="price" value="<?php echo $price; ?>"/></td>
          </tr>
          <tr>
            <td>Image</td>
            <td><input type="file" name="fileField" id="fileField" value="<?php echo $prodimg; ?>"/></td>
          </tr>
          <tr>
            <td>Weight</td>
            <td><input name="weight" type="text" id="weight" value="<?php echo $weight; ?>"/></td>
          </tr>
          <tr>
            <td>Size</td>
            <td><input name="size" type="text" id="size" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
            <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
            <input type="submit" name="button" id="button" value="Update Item" /></td>
          </tr>
        
        </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once("../includes/footer_admin.php");?>