<?php
	require_once "configuration.php";
	require_once $ROOT_PATH."administrator/utility/crud.php";
	
	require_once $ROOT_PATH."administrator/utility/idEncode.php";
	require_once "header.php";
	require_once "menu.php";
	//require_once "banner.php";
	
	require_once("dbcontroller.php");
	$allUserCategoryData = fetchRecord('usercategory');
	$allCNTypeData = fetchRecord('cntype');
	$db_handle = new DBController();
	$conn = $db_handle->connectDB();
	$query ="SELECT * FROM country";
	$results = $db_handle->runQuery($query,$conn);
	if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = "SELECT * FROM userdetails WHERE userID = $id;";
			//echo $sql;
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
		}
		?>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
	function getState(val) {
		$.ajax({
		type: "POST",
		url: "get_state.php",
		data:'countryID='+val,
		success: function(data){
			$("#state-list").html(data);
		}
		});
	}
	function getCity(val) {
		$.ajax({
		type: "POST",
		url: "get_city.php",
		data:'stateID='+val,
		success: function(data){
			$("#city-list").html(data);
		}
		});
	}

	function selectCountry(val) {
	$("#search-box").val(val);
	$("#suggesstion-box").hide();
	}
	</script>
	<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
	<SCRIPT type="text/javascript">
	<!--
	/*
	Credits: Bit Repository
	Source: http://www.bitrepository.com/web-programming/ajax/username-checker.html 
	*/

	pic1 = new Image(16, 16); 
	pic1.src = "images/loading.gif";

	$(document).ready(function(){

	$("#username").change(function() { 

	var usr = $("#username").val();

	if(usr.length >= 4)
	{
	$("#status").html('<img src="images/loading.gif" align="absmiddle">&nbsp;Checking availability...');

	    $.ajax({  
	    type: "POST",  
	    url: "check.php",  
	    data: "username="+ usr,  
	    success: function(msg){  
	   
	   $("#status").ajaxComplete(function(event, request, settings){ 

		if(msg == 'OK')
		{ 
	        $("#username").removeClass('object_error'); // if necessary
			$("#username").addClass("object_ok");
			$(this).html(msg);
		}  
		else  
		{  
			$("#username").removeClass('object_ok'); // if necessary
			$("#username").addClass("object_error");
			$(this).html(msg);
		}  
	   
	   });

	 } 
	   
	  }); 

	}
	else
		{
		$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		}

	});

	});

	//-->
	</SCRIPT>
	<section class="mtop">
		<section class="container-fluid container">
			<section class="row-fluid">
	<!-- Page Title -->

			<section id="donation_box">
				<section class="container container-fluid">
					<section class="row-fluid">
					<figure class="span12">
						<?php if(isset($_GET['id']))
										{?>
										<h2>Edit Profile</h2>	
										<?php
										}
										else
										{?>
										<h2>User Registration</h2>
										<?php
										}?>
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
						<?php
							if($ucid==2)
							{?>
							<li><a href="welcomeContributor.php">Contributor</a><span class="divider">/</span></li>
							<?php
							}
							elseif($ucid==3)
							{?>
							<li><a href="welcomeNecessitous.php">Necessitous</a><span class="divider">/</span></li>
							<?php
							}
							else{
							}?>
							<!--<li><a href="welcomeNecessitous.php">My Profile</a><span class="divider">/</span></li>-->
							<?php if(isset($_GET['id']))
							{?>
							<li class="active">Edit Profile</li>	
							<?php
							}
							else
							{?>
							<li class="active">User Registration</li>
							<?php
							}?>
						</ul>
						<div class="contact-form" align="">
									
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
					<!----start-contact---->
						<div class="contact">
							<div class="section group">				
								<div class="col span_2_of_3">
							  		<div class="recent-places">
									<div class="contact-form" align="">
									
										<?php
										if(array_key_exists('message',$_SESSION))
										{
											if($_SESSION['message']!="Thank You For Contacting. We'll Get Back To You Soon.")
											{?>
												<div>
													<?php if(isset($_SESSION['error'])){echo $_SESSION['error'];unset($_SESSION['error']);}?>
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
										
										<form method="post" action="processRegister1.php" enctype="multipart/form-data">
											<?php
											if(isset($_GET['id']))
											{?>
												<input type="hidden" name="hiddenAction" value="edit" />
												<input type="hidden" name="hiddenId" value="<?php echo $id;?>" />	
											<?php
											}
												if(!isset($_GET['id']))
												{?>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;User Category :</label></span>
												<span style="width:300px"><select name="cmbUserCatReq" id="product_size">
														<option value=""> Select User Category </option>
														<option value="2">Contributor</option>
														<option value="3">Necessitous</option>
												</select>
											</span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Select Type:</label></span>
												<span style="width:300px"><select name="cmbCNTypeReq" id="product_size">
													<option value=""> Select User Type</option>
														<?php
														foreach($allCNTypeData as $key => $value)
														{
														?>
														<option value="<?php echo $value['cnTypeID'];?>">
															<?php echo $value['cnTypeTitle'];
															$passstring1=$value['cnTypeID']*18869;
														$encrypted_string1=encrypt_decrypt($passstring1);
														$param1=urlencode($encrypted_string1);?>
														</option>
														<?php
														$cntypevalue = $value['cnTypeID'];}
														?>
														
												</select>
												</span>
											</div>
											<?php
											}?>	
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Name :</label></span>
												<span style="width:300px"><input type="text" name="txtName" <?php if(isset($_GET['id'])){?>value="<?php echo $row['name'];?>"<?php }?> /></span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Address:</label></span>
												<span style="width:300px"><input type="text" name="txtAddress" <?php if(isset($_GET['id'])){?>value="<?php echo $row['address'];?>"<?php }?> /></span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Country :</label></span>
												<span style="width:300px"><select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
														<option value="">Select Country</option>
														<?php
														foreach($results as $country) {
														?>
														<option value="<?php echo $country["countryID"]; ?>"><?php echo $country["countryName"]; ?></option>
														<?php
														}
														?>
														</select>
												</span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;State :</label></span>
												<span style="width:300px"><select name="state" id="state-list" onChange="getCity(this.value);" >
												<option value="">Select State</option>
												</select>
												</span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;City :</label></span>
												<span  style="width:300px"><select name="city" id="city-list">
												<option value="">Select City</option>
												</select>
												</span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Zipcode:</label></span>
												<span style="width:300px"><input type="text" name="txtZipcode" <?php if(isset($_GET['id'])){?>value="<?php echo $row['zipcode'];?>"<?php }?> /></span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Contact :</label></span>
												<span style="width:300px"><input type="text" name="txtContact" <?php if(isset($_GET['id'])){?>value="<?php echo $row['contactNo'];?>"<?php }?> /></span>
											</div>
											
											<div>
												<span><label>Website :</label></span>
												<span style="width:300px"><input type="text" name="txtWebsite" <?php if(isset($_GET['id'])){?>value="<?php echo $row['website'];?>"<?php }?> /></span>
											</div>
											<?php 
											if(isset($_GET['id']))
											{
												$sql2 = "SELECT email FROM user WHERE userID = $id;";
												//echo $sql;
												$result2 = mysqli_query($con,$sql2);
												$row2 = mysqli_fetch_array($result2);
											}
											?>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Email :</label></span>
												<span style="width:300px"><input type="text" name="txtEmail" <?php if(isset($_GET['id'])){?>value="<?php echo $row2['email'];?>"<?php }?> /></span>
												
											</div>
											<?php
											if(!isset($_GET['id']))
											{?>
												
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Username :</label></span>
												<span style="width:300px"><input id="username" type="text" name="username" /></span>
												<span id="status"></span>
											</div>
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Password :</label></span>
												<span style="width:300px"><input type="password" name="txtPassword" /></span>
												
											</div>
											
											<div>
												<span><label><font color="#FF0000">*</font>&nbsp;Confirm Password :</label></span>
												<span style="width:300px"><input type="password" name="txtCpassword" /></span>
											</div>
											<?php
											}?>
											
											<div>
												<span><label>Upload Proof(unique card for individual and digital certificate for organization):</label></span>
												<span style="width:300px"><input type="file" name="fileProof" ></span>
											</div>
											<br/>

											<div>
												<span style="width:300px"><input type="submit" value="Submit"  style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;"  /></span>
											</div>
											
										</form>
										
									</div>
									</div>
						</div>
						<!----End-contact---->
				</div>
	</div></div></figure></section></section></section>

	<?php
	require_once "footer.php";
	?>