<?php
session_start();
require_once "configuration.php";
//require_once "header.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
$productid = $_POST['product'];
$quantity = $_POST['txtQuantity'];
$uid = $_SESSION['userid'];
$unit = $_POST['unit'];
$description = $_POST['txtDESC'];
$date = date('Y-m-d');
	
			if(!$productid || !$quantity)
			{
				
				$_SESSION['message'] = "Please fill up all the fields";
				header("location:wantProduct.php");	
			}
			else if($quantity<0)
			{
			     $_SESSION['message'] = "Negative values are not accepted";
				  	header("location:wantProduct.php");	
			}
			
		
		else
			{
				require_once("connect.php");
				$sql = "SELECT userDetailsID FROM userdetails WHERE userID = '".$_SESSION['userid']."';";
						//echo $sql;
						$res = mysqli_query($con,$sql);
						$rec = mysqli_fetch_array($res);
						$ucID = $rec['userDetailsID'];
						$_SESSION['userDeatailsID'] = $ucID;
				$sql = "INSERT INTO needyproduct(userDetailsID,productID,quantity,unitID,needyProductDescription,postedDate) VALUES($ucID,$productid,$quantity,$unit,'$description','$date');";
				if(!mysqli_query($con,$sql))
				{
					mysqli_close($con);
				var_dump($sql);
			  		$_SESSION['message'] = $_SESSION['userDeatailsID'];
					//header("location:wantProduct.php");
				}
				else
				{	
						mysqli_close($con);
	
						//$_SESSION['message'] = "Product added Successfully";
					
						header("Location: productDetail.php?id=".$_POST['product']);
						//header("location: productDetail.php?id= echo $row['productID'");				
						
				}
					
			}
		
	
?>