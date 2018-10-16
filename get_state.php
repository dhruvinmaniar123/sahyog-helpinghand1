<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
	$conn = $db_handle->connectDB();
if(!empty($_POST["countryID"])) {
	$query ="SELECT * FROM state WHERE countryID = '" . $_POST["countryID"] . "'";
	$results = $db_handle->runQuery($query,$conn);
?>
	<option value="">Select State</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["stateID"]; ?>"><?php echo $state["stateName"]; ?></option>
<?php
	}
}
?>