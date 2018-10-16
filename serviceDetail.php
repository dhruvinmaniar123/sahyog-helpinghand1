<?php
session_start();
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
$servicesData = fetchRecord('services');
//var_dump($servicesData);
require_once "header.php";
require_once "menu.php";
require_once("connect.php");
require_once("class.phpmailer.php");

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
					<h2> Service Details</h2>
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
					<li class=""><a href="wantProduct.php"> Require Service</a><span class="divider">/</span></li>
					<li class="active">Service Details</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
			<div><?php
									if(array_key_exists('message',$_SESSION))
									{
										if($_SESSION['message']!="Thank You For Contacting. We'll Get Back To You Soon.")
										{?>
											<div>
												<span style="width:300px"><?php echo $_SESSION['message'];unset($_SESSION['message']);?></span>
											</div>
										<?php
										}
										else
										{?>
											<h3>
											<?php 
											
											echo $_SESSION['message'];unset($_SESSION['message']);?>
											</h3><br /><br />
										<?php
										}
									}?></div>
    <?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	else
	{
		$id = NULL;
	}
	
	$query = "SELECT * FROM services WHERE servicesID = ".$id.";";
	$result = mysqli_query($con,$query);
	
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
				<div class="product_img"><img src="<?php echo ''.$row['serviceImage'];?>" width="136" height="83" /></a></div>
				 <div class="first product_description">Name: <span><?php echo $row['serviceTitle'];?></span><br /></div>
			</figure>
			<figure class= "span6" >
				 
				 <table>
    				<thead>
    					<tr>
        					
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;"><b>Contributor Name</b></th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">&nbsp;</th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;"><b>User Type</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#333333;"><b>Date</b></th>
						</tr>
					</thead>
					<tbody>
					<?php $query2 = "SELECT * FROM userservices WHERE servicesID = ".$id." ORDER BY postedDate DESC ;";
							$resultServices = mysqli_query($con,$query2);?>
							<?php
							while($rowServices = mysqli_fetch_array($resultServices))
							{//var_dump($rowServices);?>
					
							<?php
							//var_dump($row);
							$query3 = "SELECT * FROM userdetails WHERE userDetailsID = ".$rowServices['userDetailsID'].";";
							$resultUS = mysqli_query($con,$query3);
							
							
							while($rowUS = mysqli_fetch_array($resultUS))
							{//var_dump($rowUP);?>
							<?php
							//var_dump($row);
							$query4 = "SELECT * FROM user WHERE userID = ".$rowUS['userID'].";";
							$resultU = mysqli_query($con,$query4);
							while($rowU = mysqli_fetch_array($resultU))
							{//var_dump($rowU);?>
							<?php
							//var_dump($row);
							$query5 = "SELECT cnTypeTitle FROM cntype WHERE cnTypeID = ".$rowU['cnTypeID'].";";
							$resultcnt = mysqli_query($con,$query5);
							$rowcnt = mysqli_fetch_array($resultcnt);
							//var_dump($rowcnt)?>
							<tr>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;" ><?php echo $rowUS['name'];?></td>
							<td>&nbsp;</td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $rowcnt['cnTypeTitle'];?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td align="center" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;" ><?php echo $rowServices['date'];?></td>
							<td><form action="viewServiceDetail.php?id=<?php echo $rowServices['userDetailsID'];?>" method="post">
									<input type="submit" style=" border:1px solid #a5e7ea; background:#0066CC !important;  padding:05px 20px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;" value="View More" />
									
								</form></td>
							
							</tr>
							<?php
							}
							}
							}
							?>
						      
						</tbody>
					</table>
							
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