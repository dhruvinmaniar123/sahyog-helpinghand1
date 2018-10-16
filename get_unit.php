<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
	$conn = $db_handle->connectDB();
if(!empty($_POST["productID"])) {
	$query ="SELECT * FROM unit WHERE helpSubCategoryID IN (SELECT helpSubCategoryID from product WHERE productID = ". $_POST["productID"].");";
	$results = $db_handle->runQuery($query,$conn);
?>
	<option value="">Select Unit</option>
<?php
	foreach($results as $unit) {
?>
	<option value="<?php echo $unit["unitID"]; ?>"><?php echo $unit["title"]; ?></option>
<?php
	}
}
?>