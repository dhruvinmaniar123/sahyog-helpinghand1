<?php
session_start();
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
$productData = fetchRecord('product');
//var_dump($servicesData);
require_once "header.php";
require_once "menu.php";
require_once("connect.php");
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
 
$mail->Username = "sahyog435@gmail.com";
$mail->Password = "sahyog123456789";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.	
if($_SESSION['loginValidate'])
{;
?>
<!-- Title & BreadCrumbs -->
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2> Product Details</h2>
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
					<li class=""><a href="wantProduct.php"> Require Product</a><span class="divider">/</span></li>
					<li class="active">Product Details</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
			<div><?php
									if(array_key_exists('message',$_SESSION))
									{
										?>	<h3>
											<?php 
											
											echo $_SESSION['message'];unset($_SESSION['message']);?>
											</h3><br /><br />
										<?php
										}
									?></div>
    <?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	else
	{
		$id = NULL;
	}
	
	$sql = "SELECT * FROM product WHERE productID = ".$id.";";
	$result = mysqli_query($con,$sql);
	$myquery = "SELECT * FROM user WHERE username ='".$_SESSION['uname']."';";
							$myresult = mysqli_query($con,$myquery);
							$myrow = mysqli_fetch_array($myresult);
							
							$myquery2 = "SELECT * FROM userdetails WHERE userID = ".$myrow['userID'].";";
							$myresult2 = mysqli_query($con,$myquery2);
							$myrow2= mysqli_fetch_array($myresult2);
	?>
	 <Section class="product_image_holder">
		<ul>  
	<?php
		if($result)
		{
			$row = mysqli_fetch_array($result);?>  
			<figure class="span4 first" id="product"> 
				<li>
				<div class="product_img"><img src="<?php echo ''.$row['productImage'];?>" width="136" height="83" /></a></div>
				 <div class="first product_description">Name: <span><?php echo $row['productTitle'];?></span><br /></div>
			</figure>
			<figure class= "span4">
			<?php $sql2 = "SELECT * FROM userproduct WHERE productID = ".$id." ORDER BY 'postedDate' DESC;";
							$resultProduct = mysqli_query($con,$sql2);?>
			       
							<?php
							if(isset($resultProduct))
							{
							while($rowProduct = mysqli_fetch_array($resultProduct))
							{// var_dump($rowProduct);
							?>
					
				 <table class="span12">
    				<thead>
    					<tr>
        					
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;"><b>Contributor Name</b></th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; color:#333333;">&nbsp;</th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;"><b>User Type</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;"><b>Quantity</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">Unit</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
		
					
					
							<?php
							//var_dump($row);
							$sql3 = "SELECT * FROM userdetails WHERE userDetailsID = ".$rowProduct['userDetailsID'].";";
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
							//var_dump($rowcnt)?>
							<tr>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $rowUP['name'];?></td><td>&nbsp;</td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $rowcnt['cnTypeTitle'];?></td><td>&nbsp;</td>
							<td align="center" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $rowProduct['quantity'];?></td>
							<td>&nbsp;</td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $rowunit['title'];?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><form action="viewProductDetail.php?id=<?php echo $rowProduct['userDetailsID'];?>" method="post">
									<input type="submit" style=" border:1px solid #a5e7ea; background:#0066CC !important;  padding:05px 20px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;" value="View More" />
									
								</form></td>
							
							<?php
							}
							}
							}
						
							?>
						      
						</tbody>
					</table>
					<?php
					}
					else
					{
					?><div> no Records related to this product is available.</div>
					<?php
					}
					?>		
				</li>
			</figure>
								<?php
								}?>
							  </ul>
							 
							  <hr />
					</section>
					
				</section></section></section>
	<?php
	}
	else
	{?>
		&nbsp;	
	<?php
	}?>
<?php require_once 'footer.php';?>