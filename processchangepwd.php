<?php 
	session_start();
	if($_SESSION['loginValidate'])
	{			
		$opwd = $_POST['txtOpwd'];
		$npwd = $_POST['txtNpwd'];
		$cnpwd = $_POST['txtCnpwd'];
		
		if(!$opwd || !$npwd || !$cnpwd)
		{
			$_SESSION['error'] = "Please fill up all the fields";
			header("location:changepwd.php");
		}
		else
		{
			require_once("connect.php");	
			$sql = "SELECT * FROM user WHERE userID=".$_SESSION['userid'];
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			//var_dump($_SESSION['userid']);
			$pwdequal = strcmp($row['password'],$opwd);
			var_dump($pwdequal);
			if($pwdequal==0)
			{
				$pwdequal = strcmp($npwd,$cnpwd);
				if($pwdequal==0)
				{
					$sql = "UPDATE user SET password = '".$npwd."' WHERE userID=".$_SESSION['userid'];
					if(mysqli_query($con,$sql))
					{
						$_SESSION['error'] = "Password was changed successfully";
						header("location:changepwd.php");
					}
					else
					{
						$_SESSION['error'] = "Unable to change password";
						header("location:changepwd.php");
					}
				}
				else
				{
					$_SESSION['error'] = "Passwords Mismatch";
					header("location:changepwd.php");
				}	
			}
			else
			{
				$_SESSION['error'] = "Current password does not match";
				header("location:changepwd.php");
			}
		}
	}	
	else
	{
		$sql = "SELECT userCategoryID FROM user WHERE userID = '".$userid."';";
		$res = mysqli_query($con,$sql);	
		$rec = mysqli_fetch_array($res);
		$ucid = $rec['userCategoryID'];	
					if($ucid==2)
					{
					header("location:welcomeContributor.php");
					}
					else
					{
					header("location:welcomeNecessitous.php");
					}			
		
	}	
?>