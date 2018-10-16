<?php
	session_start();
	require_once "configuration.php";
	//require_once "header.php";
	require_once $ROOT_PATH."administrator/utility/crud.php";
	require_once $ROOT_PATH."administrator/utility/idEncode.php";
	$serviceid = $_POST['cmbWServicesReq'];
	$uid = $_SESSION['userid'];
	$description = $_POST['txtWSDESC'];
	$date = date('Y-m-d');
	$finalDate = $_POST['MyDate1'];
	
	
			if(!$serviceid || !$finalDate)
			{
				$_SESSION['message'] = "Please fill up all the fields";
				header("location:wantServices.php");	
			}
			else if($finalDate<$date)
			{
			   $_SESSION['message'] = "Please enter valid date";
				header("location:wantServices.php");	
				}
			
		
		else
			{
				require_once("connect.php");
				$sql = "SELECT userDetailsID FROM userdetails WHERE userID = '".$uid."';";
						//echo $sql;
						$res = mysqli_query($con,$sql);
						$rec = mysqli_fetch_array($res);
						$ucID = $rec['userDetailsID'];
						$_SESSION['userDeatailsID'] = $ucID;
				$sql = "INSERT INTO needyservices(userDetailsID,servicesID,date,needyServiceDescription,postedDate) VALUES($ucID,$serviceid,'$finalDate','$description','$date');";
				echo $sql;
				if(!mysqli_query($con,$sql))
				{
					mysqli_close($con);
					
			  		$_SESSION['message'] = $_SESSION['userDeatailsID'];
					header("location:wantServices.php");
				}
				else
				{	
						mysqli_close($con);
	
						//$_SESSION['message'] = "Thank you for providing service..:)";
						//header("location:wantServices.php");	
						header("Location: serviceDetail.php?id=".$_POST['cmbWServicesReq']);			
						
				}
					
			}
		
	
?>