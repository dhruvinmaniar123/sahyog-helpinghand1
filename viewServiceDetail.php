<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
$servicesData = fetchRecord('services',$searchKey);
//var_dump($servicesData);
require_once "header.php";
require_once "menu.php";
require_once("connect.php");
session_start();
include_once 'connect.php'; 
require_once("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port =465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
 
$mail->Username = "sahyog435@gmail.com";
$mail->Password = "sahyog123456789";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.	
$id = $_GET['id'];	
if($_SESSION['loginValidate'])
{;

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Contributor Details</title>
    <style type="text/css">
    .formLayout
    {
        background-color: #f3f3f3;
        border: solid 1px #a1a1a1;
        padding: 10px;
        width: 300px;
    }
    
    .formLayout label, .formLayout input
    {
        display: block;
        width: 120px;
        float: left;
        margin-bottom: 10px;
    }

    .formLayout label
    {
        text-align: right;
        padding-right: 20px;
    }
    .pop_up_form{clear:both;}

    br
    {
        clear: left;
    }
    </style>
</head>
<!-- Title & BreadCrumbs -->
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2> Contributor Details</h2>
				</figure>
				</section>
			</section>
		</section>
		
		
		
<!-- end of Page Title -->
		</section>
		<section class="row-fluid">
			<!-- BreadCrumbs -->
				<figure id="breadcrumbs" class="span12">
					<ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li class=""><a href="welcomeNecessitous.php">Necessitous</a><span class="divider">/</span></li>
					<li class=""><a href="help.php"> Require Help</a><span class="divider">/</span></li>
					<li class="active">Contributor Details</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
<?php
$sql3 = "SELECT * FROM userdetails WHERE userDetailsID = ".$id .";";












							$resultUP = mysqli_query($con,$sql3);
							while($rowUP = mysqli_fetch_array($resultUP))
							{//var_dump($rowUP);?>
							<?php
							//var_dump($row);
							$sql4 = "SELECT * FROM user WHERE userID = ".$rowUP['userID'].";";
							$resultU = mysqli_query($con,$sql4);
							while($rowU = mysqli_fetch_array($resultU))
							{//var_dump($rowU);?>
							<?php
							//var_dump($row);
							$sql5 = "SELECT cnTypeTitle FROM cntype WHERE cnTypeID = ".$rowU['cnTypeID'].";";
							$resultcnt = mysqli_query($con,$sql5);
							$rowcnt = mysqli_fetch_array($resultcnt);
							$query3 = "SELECT * from unit WHERE unitID =".$rowProduct['unitID'].";";
							$resultunit = mysqli_query($con,$query3);
							$rowunit = mysqli_fetch_array($resultunit);
							$query2 = "SELECT * from city WHERE cityID =".$rowUP['cityID'].";";
							$resultcity = mysqli_query($con,$query2);
							$rowcity = mysqli_fetch_array($resultcity);
							$query1 = "SELECT * from state WHERE stateID =".$rowUP['stateID'].";";
							$resultstate = mysqli_query($con,$query1);
							$rowstate = mysqli_fetch_array($resultstate);
							$query4 = "SELECT * from country WHERE countryID =".$rowUP['countryID'].";";
							$resultcountry = mysqli_query($con,$query4);
							$rowcountry = mysqli_fetch_array($resultcountry);
							?>
  
         <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Name:&nbsp; <?php echo $rowUP['name']; ?></label>
       
         <br>
         <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Address:&nbsp; <?php echo $rowUP['address']; ?></label>
        <br/> 
		 <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">City:&nbsp;<?php echo $rowcity['cityName']; ?></label>
        <br>
		 
		 <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">State:&nbsp;<?php echo $rowstate['stateName']; ?></label>
        
		 <br>
		 
		 <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Country:&nbsp;<?php echo $rowcountry['countryName']; ?></label>
         <br>
		 
		 <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Zip:&nbsp;<?php echo $rowUP['zipcode']; ?></label>
         <br>
         
         <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Contact No.:&nbsp;<?php echo $rowUP['contactNo']; ?></label>
         <br>
         
         <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Email:&nbsp;<?php echo $rowU['email'];?></label>
        <br>
       
		<label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">WebSite:&nbsp;<?php echo $rowUP['website'];?></label>
         <br>
       
           <a href="welcomeNecessitous.php"><button style=" border:1px solid #a5e7ea; background:#3399FF !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:24px;">Back </button></a>
		   
		   <table align="right"><tr><td><b>To:</b></td><td><?php echo $rowU['email']; ?></td></tr>
		   <tr> <form action="" method="post">		                             
		                           <td><b>Enter message:</b></td><td><textarea name="txtdesc" required></textarea></td><tr>
									<td colspan="2"><p align="center"><input type="submit" style=" border:1px solid #a5e7ea; background:#0066CC !important;  padding:05px 20px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:18px;" value="Send Mail" />
									
								<input type="hidden" name="button_pressed" value="1" /></p></td></tr>
								
								</form>
								</table>
							<?php
							            $sql9="SELECT * FROM user WHERE username = '".$_SESSION['uname']."';";
$result9 = mysqli_query($con,$sql9);
$row9 = mysqli_fetch_array($result9);

$sql10="SELECT * FROM userdetails WHERE userID = ".$row9['userID'].";";
$result10 = mysqli_query($con,$sql10);
$row10 = mysqli_fetch_array($result10);



							
							
							
							              if(isset($_POST['button_pressed']))
										  {
										
										$mailto=$rowU['email'];
										$mail->From = "sahyog435@gmail.com";
                                         
										$mail->FromName = "Sahyog";
										
										$mail->addAddress("$mailto","User 1");
										$msg1="<br>Following are neccessitous' details:-";
										$msg2="<br><br><b>Name:-</b>".$row10['name']."<br><br><b>Contact No:-</b>".$row10['contactNo']."                                       <br><br><b>Email Id:-</b>".$row9['email'];                               
										$msg3=$_POST['txtdesc'];
										$mail->Subject = "Someone Really Need Your Help";
                                        $mail->Body = $msg1.$msg2."<br><br><b>Message:-</b>".$msg3;
 
                                    if(!$mail->Send())
                                    {
									   $_SESSION['message'] = "Email not sent";
									   header("Location:wantServices.php");
                                   }
								    else
                                     {
                                    								
										   $_SESSION['message'] = "Email send Successfully";
										      header("Location:wantServices.php");
										} }
									?>
								
        </div>   
           <?php
		}
		}?>       
    </div>
   
</body>
</html>
<?php
	}
	else
	{?>
		&nbsp;	
	<?php
	}?>
<?php require_once 'footer.php';?>