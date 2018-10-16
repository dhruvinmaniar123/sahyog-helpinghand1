<?php
	session_start();
	require_once "configuration.php";
	//require_once "header.php";
	require_once $ROOT_PATH."administrator/utility/crud.php";
	require_once $ROOT_PATH."administrator/utility/idEncode.php";
	$serviceid = $_POST['cmbGServicesReq'];
	$uid = $_SESSION['userid'];
	$description = $_POST['txtSDESC'];
	$date = date('Y-m-d');
	$finalDate = $_POST['MyDate'];
	
		  if($_GET['action']=='delete')
			{
					deleteRecord('userservices',$_GET['id']);
				
				header("location: giveServices.php");
			}
			else if(!$serviceid || !$finalDate)
			{
				$_SESSION['message'] = "Please fill up all the fields";
				header("location:giveServices.php");	
			}
			else if($finalDate  < $date)
			{
			    $_SESSION['message'] = "Please enter valid date";
				header("location:giveServices.php");	
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
				$sql = "INSERT INTO userservices(userDetailsID,servicesID,date,userServiceDescription,postedDate) VALUES($ucID,$serviceid,'$finalDate','$description','$date');";
				echo $sql;
				if(!mysqli_query($con,$sql))
				{
					mysqli_close($con);
					
			  		$_SESSION['message'] = $_SESSION['userDeatailsID'];
					header("location:giveServices.php");
				}
				else
				{	
						mysqli_close($con);
	
						$_SESSION['message'] = "Thank you for providing service..:)";
						header("location:giveServices.php");				
						
				}
					
			}
		
	
?>