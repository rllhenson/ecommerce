<?php 
$pageTitle='FloorFive Admin Edit';
include '../includes/header_admin.php';
session_start();
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
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
  $id_to_delete = $_GET['yesdelete'];
  $myquery = "DELETE FROM products WHERE productid='$id_to_delete' LIMIT 1";
  $result=$mysqli->query($myquery)
    or die ($mysqli->error);
	// remove item from system and delete its picture
	// delete from database
  /*
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../img/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: inventory_list.php"); 
    exit();*/
}
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
  $product_name = mysql_real_escape_string($_POST['product_name']);
  $description = mysql_real_escape_string($_POST['description']);
  $category = mysql_real_escape_string($_POST['category']);
  $sku = mysql_real_escape_string($_POST['sku']);
  $stock = mysql_real_escape_string($_POST['stock']);
	$cost = mysql_real_escape_string($_POST['cost']);
  $price = mysql_real_escape_string($_POST['price']);
	$weight = mysql_real_escape_string($_POST['weight']);
  $size = mysql_real_escape_string($_POST['size']);
	// Check to see if product exists
  $myquery = "SELECT productid FROM products WHERE name='$product_name' LIMIT 1";
  $result=$mysqli->query($myquery)
    or die ($mysqli->error);
  $productMatch=$result->num_rows;
  if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
		exit();
	}
  //See if product image can be uploaded.
  
  $uploadOk = 1;
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileField"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $check = getimagesize($_FILES["fileField"]["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  if ($_FILES["fileField"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "jpeg") {
      exit();
      $uploadOk = 0;
  }
  if ($uploadOk == 0)
    exit();
  else {
    if (move_uploaded_file($_FILES["fileField"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileField"]["name"]). " has been uploaded.";
    }
  }
  $prodimg=basename( $_FILES["fileField"]["name"]);
  //Finally, upload all data to database
  $myquery = "INSERT INTO products (productid,name, description, category, sku, stock, cost, price, prodimg, weight, size) VALUES ('NULL','$product_name', '$description', '$category', '$sku', '$stock', '$cost','$price', '$prodimg', '$weight', '$size')";
  $result=$mysqli->query($myquery)
    or die ($mysqli->error);
  
}
  /*
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
}*/
?>
<?php 
// This block grabs the whole list for viewing
$product_list = "";
$myquery = "SELECT * FROM products ORDER BY productid ASC";
$result=$mysqli->query($myquery)
  or die ($mysqli->error);
$productCount=$result->num_rows;

if ($productCount > 0) {
  $product_list.="<table>";
  $product_list.="<tr>
          <td>ID</td><td>NAME</td><td>PRICE</td><td>EDIT &nbsp;</td><td>DELETE</td>
         </tr>";
	while($row=$result->fetch_assoc()){ 
       $id = $row["productid"];
			 $product_name = $row["name"];
			 $price = $row["price"];
			 $product_list .= "
         <tr>
          <td>$id</td><td>$product_name</td><td>$$price</td><td><a href='inventory_edit.php?pid=$id'>edit</a></td><td><a href='inventory_list.php?deleteid=$id'>delete</a><br /></td>
         </tr>";
    }
    $product_list.="</table>";
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
    <h2>&darr; Add New Inventory Item Form &darr;</h2>
      <form id="addProduct" action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
      <table>
        <tr>
          <td>Name</td>
          <td><input name="product_name" type="text" id="product_name"/></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="description" id="description" cols="32" rows="3"></textarea></td>
        </tr>
        <tr>
          <td>Category</td>
          <td><input name="category" type="text" id="category"/></td>
        </tr>
        <tr>
          <td>SKU</td>
          <td><input name="sku" type="text" id="sku"/></td>
        </tr>
        <tr>
          <td>Stock</td>
          <td><input name="stock" type="text" id="stock"/></td>
        </tr>
        <tr>
          <td>Cost</td>
          <td><input name="cost" type="number" id="cost"/></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input name="price" type="number" id="price"/></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" name="fileField" id="fileField" /></td>
        </tr>
        <tr>
          <td>Weight</td>
          <td><input name="weight" type="text" id="weight" /></td>
        </tr>
        <tr>
          <td>Size</td>
          <td><input name="size" type="text" id="size" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="button" id="button" value="Add Item" /></td>
        </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php include_once("../includes/footer.php");?>