<?php
session_start();
require_once "configuration.php";
require_once "connect.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";	
$allProductData = fetchRecord('product');
$sql = "SELECT userDetailsID FROM userDetails WHERE userID = '".$_SESSION['userid']."';";
$res = mysqli_query($con,$sql);
$rec = mysqli_fetch_array($res);	
$_SESSION['userDeatailsID'] = $rec['userDetailsID'];
	$sql1 = "SELECT * FROM needyproduct WHERE userDetailsID = ".$_SESSION['userDeatailsID'].";";
	$result1 = mysqli_query($con,$sql1);
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$conn = $db_handle->connectDB();
$query ="SELECT * FROM helpsubcategory";
$results = $db_handle->runQuery($query,$conn);
if($_SESSION['loginValidate'])
{;
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getProduct(val) {
	$.ajax({
	type: "POST",
	url: "get_product.php",
	data:'helpSubCategoryID='+val,
	success: function(data){
		$("#product-list").html(data);
	}
	});
}
function getUnit(val) {
	$.ajax({
	type: "POST",
	url: "get_unit.php",
	data:'productID='+val,
	success: function(data){
		$("#unit-list").html(data);
	}
	});
}

function selectHelpSubCategory(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2>Need Product </h2>
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
					<li ><a href="welcomeNecessitous.php">Necessitous</a><span class="divider">/</span></li>
					<li class="active">Need Product</li>
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
									<h3> <i class="icon-gift"></i> Product </h3>
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
		
		<form action="processWantProduct.php" method="post">
					<figure>
					<label><font color="#FF0000">*</font>&nbsp;Category:</label>
											<span style="width:300px"><select name="helpsubcategory" id="helpsubcategory-list" class="demoInputBox" onChange="getProduct(this.value);">
													<option value="">Select Category</option>
													<?php
													foreach($results as $helpsubcategory) {
													?>
													<option value="<?php echo $helpsubcategory["helpSubCategoryID"]; ?>"><?php echo $helpsubcategory["helpSubCategoryTitle"]; ?></option>
													<?php
													}
													?>
													</select>
											</span>
										
										<label>Product:</label>
											<span style="width:300px"><select name="product" id="product-list" onChange="getUnit(this.value);" >
											<option value="">Select Product</option>
											</select>
											</span>
						<label>Quantity</label>
						<span style="width:300px"><input type="number"  name="txtQuantity"/></span>
						<label><font color="#FF0000">*</font>&nbsp;Unit :</label>
											<span  style="width:300px"><select name="unit" id="unit-list">
											<option value="">Select Unit</option>
											</select>
											</span>
											<label>Product Description:</label>
						<span style="width:300px"><textarea name="txtDESC" /></textarea></span>
						<div>
						
						<input type="submit" value="Submit" style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;" /></div>
						</figure>
			
		</form>
	</figure>
</section>
	
 	<section class="row-fluid">
			<section class="span9 product_view" id="product_grid">  
					<figure class="span12 first" id="category_title">
						<div class="span10 first"> <h3> Product </h3>	</div>
					</figure>
					<figure class="span4">
					
					
				<table>
    				<thead>
    					<tr>
        					
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b>Product</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">Quantity</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
            				<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b>Unit</b></th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;">&nbsp;</th>
							<th scope="col" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:18px; color:#333333;"><b>Description</b></th>
						</tr>
					</thead>
					<tbody>
				
				 <?php
			    while($row = mysqli_fetch_array($result1))
			    {?>     
					
							 
							<?php
							//var_dump($row);
							$sql2 = "SELECT * FROM product WHERE productID = ".$row['productID'].";";
							$resultProduct = mysqli_query($con,$sql2);
							$rowProduct = mysqli_fetch_array($resultProduct)?>
							
							<tr>
							
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;" ><?php echo $rowProduct['productTitle'];?></td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>
							<td align="center" style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;" ><?php echo $row['quantity'];?></td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>
							<?php 
							$sql3 = "SELECT * FROM unit WHERE unitID = ".$row['unitID'].";";
							$resultUnit = mysqli_query($con,$sql3);
							$rowUnit = mysqli_fetch_array($resultUnit)?>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $rowUnit['title'];?></td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;">&nbsp;</td>
							<td style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:14px; color:#999999;"><?php echo $row['needyProductDescription'];?></td>
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
<?php
	require_once("footer.php"); 
}
else
{
	header("location:login.php");
}?>