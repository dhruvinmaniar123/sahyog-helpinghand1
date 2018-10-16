<?php
session_start();
require_once "configuration.php";
require_once "connect.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";	
$allServicesData = fetchRecord('services');
	$sql1 = "SELECT * FROM userservices WHERE userDetailsID = ".$_SESSION['userDeatailsID'].";";
	$result1 = mysqli_query($con,$sql1);
if($_SESSION['loginValidate'])
{;	
?>
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2>Donate Service</h2>
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
					<li><a href="index.php">Home</a> <span class="divider">/</span></li>
					<li><a href="welcomeContributor.php">Contributor</a><span class="divider">/</span></li>
					<li class="active">Donate Services</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
		</section>
	</section>
</section>
<!-- End of Tile & Breadcrumbs -->
		
<section id="content" class="mbtm product_grid">
	<section class="container-fluid container">
	
		
		<section id="sidebar" class="span3">

	<figure class="widget tags">
	<div class="contact-form" align="">
									<h3> <i class="icon-star-half-empty"></i> Services</h3>
									<div class="clear" align="center"> </div>
									<?php
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
									}?>
									</div>
		
		<form action="processGiveServices.php" method="post">
					<figure>
					<label><font color="#FF0000">*</font>&nbsp;Select Services:</label>
					<span style="width:300px"><select name="cmbGServicesReq" id="product_size">
					<option value=""> Select Services</option>
							<?php
							foreach($allServicesData as $key => $value)
							{
							?>
							<option value="<?php echo $value['servicesID'];?>">
							<?php echo $value['serviceTitle'];
							$passstring1=$value['servicesID']*18869;
							$encrypted_string1=encrypt_decrypt($passstring1);
							$param1=urlencode($encrypted_string1);?>
							</option>
							<?php
							$servicesvalue = $value['servicesID'];}
							?>
				
							</select>
						</span>
						<label><font color="#FF0000">*</font>&nbsp;Date</label>
						<span style="width:300px"><input type="date" name="MyDate" class="datepicker"/></span>
						<label>Service Description:</label>
						<span style="width:300px"><textarea name="txtSDESC" /></textarea></span>
						<div>
						
						<input type="submit" value="Submit" style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;" /></div>
						</figure>
			
		</form>
	</figure>
</section>
		<section class="row-fluid">
			<section class="span9 product_view" id="product_grid">  
 
					
					<figure class="span12 first" id="category_title">
						<div class="span10 first"> <h3> Services </h3>	</div>
					</figure>
					<figure class="span9">
				<table>
    				<thead>
    					<tr>
        					
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b>Services</b></th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b>Date</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b>Description</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b> Delete </b></th>
						</tr>
					</thead>
					<tbody>
				 <?php
			    while($row = mysqli_fetch_array($result1))
			    {?>     
							<?php
							//var_dump($row);
							$sql2 = "SELECT * FROM services WHERE servicesID = ".$row['servicesID'].";";
							$resultServices = mysqli_query($con,$sql2);
							$rowService= mysqli_fetch_array($resultServices);
							?>
						 <tr>
						 	
						<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:16px; color:#999999;" ><?php echo $rowService['serviceTitle'];?></td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>	
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $row['date'];?></td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>	
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>	
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $row['userServiceDescription'];?></td>	
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;" align="center">
							<a href="processGiveServices.php?action=delete&&id=<?php echo $row['userServicesID'];?>" >
							<i class="icon-trash"></i>		</a></td>
						</tr>        
						<?php
						}
						?>
						</tbody>			
					</table>
											
					
					<hr />
					</figure>
				</section>
		
		</section>
</section>	
</section>		
<?php
	require_once("footer.php"); 
}
else
{
	header("location:login.php");
}?>