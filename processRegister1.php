<?php
session_start();
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once $ROOT_PATH."administrator/utility/validation.php";
//require_once $ROOT_PATH."administrator/utility/fileupload.php";
require_once("connect.php");
//var_dump((isset($_POST['hiddenAction'])));
$fname = $_POST['txtName'];
$address = $_POST['txtAddress'];
$website = $_POST['txtWebsite'];
$contact = $_POST['txtContact'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip = $_POST['txtZipcode'];
$username = $_POST['username'];
$pwd = $_POST['txtPassword'];
$cpwd = $_POST['txtCpassword'];
$userCatID = $_POST['cmbUserCatReq'];
$userTypeID = $_POST['cmbCNTypeReq'];
$email = $_POST['txtEmail'];
$date = date('Y-m-d');
//var_dump($_FILES);

//echo $date
		
		
		if(isset($_POST['hiddenAction']))
		{
			if(!$fname || !$address )
			{
				
				//$_SESSION['error'] = "Please fill up all the fields";
				//header("location:register1.php");	
			}
			else
			{
				if(!issset($_FILES))
				{
				 $_SESSION['error'] = "Please upload verification proof";
							
					header("location:register1.php");	 
					}

				if($_FILES)
				{
					$fileName=$_FILES["fileProof"]["name"];
					$fileSize=$_FILES["fileProof"]["size"]/1024;
					$fileType=$_FILES["fileProof"]["type"];
					$fileTmpName=$_FILES["fileProof"]["tmp_name"];  

					if($fileType=="application/pdf")
					{
					     
						if($fileSize<=1024)
						{

							//New file name
							$name=$_SESSION['uname'];
							$newFileName=$name;
							
							$extension = ".pdf";
							//File upload path
							$uploadPath="documents/".$newFileName.$extension;

							//function for upload file
							if(move_uploaded_file($fileTmpName,$uploadPath))
							{
							  $proofDocument=$uploadPath;
							}
						}
						else
						{
							  $_SESSION['error'] = "Maximum upload file size limit is 1 MB";
							
					header("location:register1.php");	 
						}
					}
					else
					{
					 $_SESSION['error'] = "You can only upload a PDF file.";
					header("location:register1.php");	 
					}  

					$sql = "UPDATE userdetails SET name = '".$fname."',address = '".$address."',website = '".$website."',contactNo = '".$contact."',countryID = '".$country."',stateID = '".$state."',cityID = '".$city."',zipcode = '".$zip."',doc_proof = '".$uploadPath."'
					 WHERE userID=".$_POST['hiddenId'];
				}
				else
				{
					$sql = "UPDATE userdetails SET name = '".$fname."',address = '".$address."',website = '".$website."',contactNo = '".$contact."',countryID = '".$country."',stateID = '".$state."',cityID = '".$city."',zipcode = '".$zip."' WHERE userID=".$_POST['hiddenId'];
				}
				//echo $sql;
				if(!mysqli_query($con,$sql))
				{
					//mysqli_close($con);
					//var_dump($sql);
			  		$_SESSION['error'] = "Unable to perform action";
					header("location:register1.php");
				}
				else
				{
					mysqli_close($con);
					//var_dump($sql);
			  		$_SESSION['error'] = "Action performed successfully";
					header("location:index.php");				
				}	
			}
		}	
		else 
		{
			//var_dump($_POST);
			

			if(!$fname || !$email || !$username || !$pwd || !$cpwd || !$country || !$state || !$city || !$userCatID ||!$userTypeID)
			{
				$_SESSION['message'] = "Please fill up all given the fields";
				header("location:register1.php");	
			}
			
			else if(strcmp($pwd != $cpwd)!=0)
			{					
				$_SESSION['message'] = "Passwords do not match";
				header("location:register1.php");
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{					
				$_SESSION['message'] = "Please enter valid email";
				header("location:register1.php");
			}
			else if(preg_match('/^\d{10}$/',$contact)==0)
			{
				$_SESSION['message'] = "Please Enter Valid Contact";
				header("location:register1.php");
			}
			
			else if($_FILES['fileProof']['type'] != "application/pdf")
			{
				$_SESSION['message'] = "You can only upload pdf file";
				header("location:register1.php");
			}	 
			else
			{
				
				require_once("connect.php");
				$sql = "INSERT INTO user(userCategoryID,username,password,cnTypeID,email) VALUES($userCatID,'$username','$pwd',$userTypeID,'$email');";
				if(!mysqli_query($con,$sql))
				{
					mysqli_close($con);
			  		$_SESSION['message'] = "Unable to perform action";
					header("location:register1.php");
				}
				else
				{
					//require_once("connect.php");
					$sql = "SELECT userID FROM user WHERE username = '".$username."';";
					//echo $sql;
					$res = mysqli_query($con,$sql);
					$rec = mysqli_fetch_array($res);
					$latestid = $rec['userID'];
					//$latestid = (int)$latestid;
					//var_dump($latestid);



					if($_FILES)
					{
						$fileName=$_FILES["fileProof"]["name"];
						$fileSize=$_FILES["fileProof"]["size"]/1024;
						$fileType=$_FILES["fileProof"]["type"];
						$fileTmpName=$_FILES["fileProof"]["tmp_name"];  

						if($fileType=="application/pdf")
						{
							if($fileSize<=1024)
							{

								//New file name
								$name=$_POST['username'];
								$newFileName=$name;

								//File upload path
								$uploadPath="documents/".$newFileName.".pdf";

								//function for upload file
								if(move_uploaded_file($fileTmpName,$uploadPath))
								{
								  $proofDocument=$uploadPath;
								}
							}
							else
							{
								echo "Maximum upload file size limit is 1 MB";
							}
						}
						else
						{
						    $_SESSION['message']="Please upload verification proof.";
						    header("location:register1.php");
						
							
						}  
	
						$sql = "INSERT INTO userdetails(userID,name,address,website,countryID,stateID,cityID,contactNo,zipcode,registrationDate,doc_proof) VALUES($latestid,'$fname','$address','$website','$country','$state','$city',$contact,$zip,'$date','$uploadPath');";

					}
					else
					{
						$sql = "INSERT INTO userdetails(userID,name,address,website,countryID,stateID,cityID,contactNo,zipcode,registrationDate) VALUES($latestid,'$fname','$address','$website','$country','$state','$city',$contact,$zip,'$date');";
					}

					echo $sql;
					if(!mysqli_query($con,$sql))
					{
						//mysqli_close($con);
						var_dump($sql);
				  		//$_SESSION['message'] = "Unable to perform action".$sql;
						//header("location:register1.php");
					}
					else
					{
						mysqli_close($con);
	
						$_SESSION['message'] = "User registration successful";
						header("location:login.php");				
						
					}
				}	
			}
		}
	//}
?>