<?php

require_once("dbcontroller.php");
$db_handle = new DBController();
	$conn = $db_handle->connectDB();			
											if(!empty($_POST["stateID"])) {
												$query1 ="SELECT * FROM city WHERE stateID = '" . $_POST["stateID"] . "'";
												$results1 = $db_handle->runQuery($query1,$conn);
												?>
												<option value="">Select City</option>
												<?php
														foreach($results1 as $city) {
													?>
														<option value="<?php echo $city["cityID"]; ?>"><?php echo $city["cityName"]; ?></option>
													<?php
														}
													}
													?>