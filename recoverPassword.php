<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";

$searchKey['username'] = $_POST['txtUsername'];
$userdata = fetchRecord('user',$searchKey);
recoverPassword($userdata);
header("Location: forgotpwd.php");


if(recoverPassword($userdata))
{
	$to = $_POST['txtEmail'];
	/*$subject = 'Sahyog : Password Recovery Email';
	$message = "Your Password for logging in to Sahyog is ".$userdata[0]['password']."<br><a href='".$SITE_PATH."/login.php' target='_blank'>Click here</a> to go 
	to Sahyog";
	//$headers = 'From: parikhkrishna9@gmail.com';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	if(!mail($to,$subject,$message,$headers))
	{
		$_SESSION['errors'] = "Unable to send Email";
	}
	else
	{
		$_SESSION['emailsuccess'] = TRUE;
	}
}
else
{
	$_SESSION['errors'] = "Invalid Username or Email";
}*/
         $subject = "This is subject";
         
         $message = "<b>Your Password for logging in to Sahyog is ".$userdata[0]['password']."<br><a href='".$SITE_PATH."/login.php'          target='_blank'>Click here</a> to go 
	       to Sahyog</b>";	
       
         
         $header = "From:patelmitanshu451@gmail.com \r\n";
          $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$message,$header);
         
         if( $retval == true ) 
		 {
           $_SESSION['emailsuccess'] = TRUE;
         }
		 else
		  {
            $_SESSION['errors'] = "Unable to send Email";
          }
		 }
		 else
{
	$_SESSION['errors'] = "Invalid Username or Email";
}
		 
header("location: forgotpwd.php");

?>