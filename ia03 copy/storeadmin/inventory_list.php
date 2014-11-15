<?php 
$pageTitle='FloorFive Admin Edit';
include '../includes/header_admin.php';
session_start();
if (!isset($_SESSION["manager"])) {
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
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../inventory_images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: inventory_list.php"); 
    exit();
}
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
  $product_name = mysql_real_escape_string($_POST['product_name']);
	$price = mysql_real_escape_string($_POST['price']);
	$category = mysql_real_escape_string($_POST['category']);
	$subcategory = mysql_real_escape_string($_POST['subcategory']);
	$details = mysql_real_escape_string($_POST['details']);
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("SELECT id FROM products WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysql_query("INSERT INTO products (product_name, price, details, category, subcategory, date_added) 
        VALUES('$product_name','$price','$details','$category','$subcategory',now())") or die (mysql_error());
     $pid = mysql_insert_id();
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../img/$newname");
	header("location: inventory_list.php"); 
    exit();
}
?>
<?php 
// This block grabs the whole list for viewing
$product_list = "";
$myquery = "SELECT * FROM products ORDER BY productid ASC";
$result=$mysqli->query($myquery)
  or die ($mysqli->error);
$productCount=$result->num_rows;
if ($productCount > 0) {
	while($row=$result->fetch_assoc()){ 
       $id = $row["productid"];
			 $product_name = $row["name"];
			 $price = $row["price"];
			 $product_list .= "$id - <strong>$product_name</strong> - $$price -  <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory_list.php?deleteid=$id'>delete</a><br />";
    }
} else {
	$product_list = "You have no products listed in your store yet";
}
?>

  <div class="cartimage">
		<div id="cartcontent">
    <a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a>
    <div align="left" style="margin-left:24px;">
      <h2>Inventory list</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Add New Inventory Item Form &darr;
    </h3>
    <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table>
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label><input name="product_name" type="text" id="product_name" size="64" /></label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Details</td>
        <td><label>
          <textarea name="details" id="details" cols="64" rows="3"></textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="file" name="fileField" id="fileField" />
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Add Item" />
        </label></td>
      </tr>
    </table>
    </form>
  </div>
  </div>
</div>
<?php include_once("../includes/footer.php");?>