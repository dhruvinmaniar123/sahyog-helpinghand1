<?php
session_start();
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";

if(!$_POST['txtUsername'] || !$_POST['txtPassword'])
{
	$_SESSION['message'] = "Username and Password required";
	header("Location: ".$SITE_PATH."login.php");
}
else
{
	$searchKey['username'] = $_POST['txtUsername'];
	$searchKey['password'] = $_POST['txtPassword'];
	
	$userdata = fetchRecord('user',$searchKey);
	$userid = userAuthenticate($userdata);
	if(!$userid)
	{
		$_SESSION['message'] = "Invalid Username or Password";
		header("Location: ".$SITE_PATH."login.php");
	}
	else
	{
		$_SESSION['loginValidate'] = TRUE;
		$_SESSION['uname'] = $_POST['txtUsername'];
		$_SESSION['userid'] = $userid;
		require_once("connect.php");
		$sql = "SELECT userCategoryID FROM user WHERE userID = '".$userid."';";
		$res = mysqli_query($con,$sql);	
		$rec = mysqli_fetch_array($res);
		$ucid = $rec['userCategoryID'];	
		$sql = "SELECT userDetailsID FROM userDetails WHERE userID = '".$userid."';";
						$res = mysqli_query($con,$sql);
						$rec = mysqli_fetch_array($res);
						
						$_SESSION['userDeatailsID'] = $rec['userDetailsID'];
		
		if(isset($ucid))
		{
			if($ucid==2)
			{
			header("Location: ".$SITE_PATH."welcomeContributor.php");
			}
			elseif($ucid==3)
			{
			header("Location: ".$SITE_PATH."welcomeNecessitous.php");
			}
			else
			{}
			
		}
		else
		{
			header("Location: ".$SITE_PATH."index.php");
			
		}
	}
}
?>