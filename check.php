<?php

/*if(isSet($_POST['username']))
{
$usernames = array('john','michael','terry', 'steve', 'donald');

$username = $_POST['username'];

if(in_array($username, $usernames))
	{
	echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
	}
	else
	{
	echo 'OK';
	}
}
*/

// This is a sample code in case you wish to check the username from a mysql db table

if(isSet($_POST['username']))
{
$username = $_POST['username'];

$dbHost = 'localhost'; // usually localhost
$dbUsername = 'root';
$dbPassword = '';
$dbDatabase = 'sahyog';

$db = mysqli_connect($dbHost, $dbUsername, $dbPassword,$dbDatabase) or die ("Unable to connect to Database Server.");
$sql_check = mysqli_query($db,"select userID from user where username='".$username."'") or die(mysql_error());

if(mysqli_num_rows($sql_check))
{
echo '<font color="red">This username <STRONG>'.$username.'</STRONG> is already in use.</font>';
}
else
{
echo '<font color="green"><STRONG>OK</STRONG></font>';
}

}
?>	