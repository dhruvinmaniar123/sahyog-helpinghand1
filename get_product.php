<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
	$conn = $db_handle->connectDB();
if(!empty($_POST["helpSubCategoryID"])) {
	$query ="SELECT * FROM product WHERE helpSubCategoryID = ". $_POST["helpSubCategoryID"].";";
	$results = $db_handle->runQuery($query,$conn);
	?>
	<option value="">Select Product</option>
<?php
	foreach($results as $product) {
?>
	<option value="<?php echo $product["productID"]; ?>"><?php echo $product["productTitle"]; ?></option>
<?php
	}
}
?>