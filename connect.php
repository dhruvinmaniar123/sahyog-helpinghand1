<?php
$con = mysqli_connect("localhost","root","","sahyog");

// Check connection
if (!$con)
{
	$_SESSION['error'] = "Failed to connect to MySQL";
	header("location:login.php");
}
