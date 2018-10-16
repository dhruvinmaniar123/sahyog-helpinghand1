<?php
	session_start();
	require_once "configuration.php";
	require_once "header.php";
	require_once "menu.php";
	//require_once "banner.php"
$sql = "SELECT userCategoryID FROM user WHERE userID = '".$userid."';";
	$res = mysqli_query($con,$sql);	
	$rec = mysqli_fetch_array($res);
	$ucid = $rec['userCategoryID'];	
	?>
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2> My Profile</h2>
				</figure>
				</section>
			</section>
		</section>
		
		
		
<!-- end of Page Title -->
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
					<li class="active">My Profile</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
			<section id="blog_store" class="mbtm">
		<section class="container-fluid container">
			<section class="row-fluid">
			<figure id="blog" class="span12">
									 <?php
									 
									$sql = "SELECT * FROM userdetails WHERE userID = '".$_SESSION['userid']."';";
									$res = mysqli_query($con,$sql);
									while($rec = mysqli_fetch_array($res))
									//var_dump($rec);
									{
										?>
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Name: &nbsp; <?php echo $rec['name'];?></label>
											</span>
										</div>
										<br/>
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Address: &nbsp;<?php echo $rec['address'];?></label></span>
											
										</div>
										<br/>
										<?php 
										$sql4 = "SELECT countryName from country WHERE countryID =".$rec['countryID'].";";
										$resultcountry = mysqli_query($con,$sql4);
										$rowcountry = mysqli_fetch_array($resultcountry);
										?>
										
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Country: &nbsp;<?php echo $rowcountry['countryName'];?></label></span>
										</div>
										<br/>
										<?php 
										$sql5 = "SELECT stateName from state WHERE stateID =".$rec['stateID'].";";
										$resultstate = mysqli_query($con,$sql5);
										$rowstate = mysqli_fetch_array($resultstate);
										?>
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">State: &nbsp;<?php echo $rowstate['stateName'];?> </label></span>
										</div>
										<br/>
										<?php 
										$sql6 = "SELECT cityName from city WHERE cityID =".$rec['cityID'].";";
										$resultcity = mysqli_query($con,$sql6);
										$rowcity = mysqli_fetch_array($resultcity);
										?>
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">City: &nbsp;<?php echo $rowcity['cityName'];?></label></span>
										</div>
										<br/>
										<div>
						<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Zipcode: &nbsp<?php echo $rec['zipcode'];?></label></span>
										</div>
										<br/>
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Contact:&nbsp; <?php echo $rec['contactNo'];?></label></span>
										</div>
										<br/>
										<?php
										if(isset($row['website']))
										{?>
										<div>
										<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Website:&nbsp;<?php echo $rec['website'];?></label></span>
										</div>
										<br/>
										<?php
										}
										else
										{
										}?>
										
										<?php 
										$sql7 = "SELECT email from user WHERE userID =".$rec['userID'].";";
										$resultem = mysqli_query($con,$sql7);
										$rowem = mysqli_fetch_array($resultem);?>
										<div>
											<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Email: &nbsp;<?php echo $rowem['email'];?></label></span>
										</div>
										<br/>
										<div>
										<span><label style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#666666;">Document:&nbsp;<?php //var_dump($rec['proofDocument']);
											if($rec['doc_proof'])
											{?>
												<a href="<?php echo $rec['doc_proof'];?>" target="_blank"/>Show</a>
											<?php
											}
											elseif(!$rec['doc_proof'])
											{?>
												FILE NOT SET
											<?php
											}
											else
											{?>
												&nbsp;
											<?php
											}?></label>								
										</span>
										</div>
										<br/>
									<?php
										}
										?>
										
											<form method="post" action="register1.php?id=<?php echo $_SESSION['userid'];?>">
										<div>
										<span style="width:300px"><input type="submit" value="Edit"  style=" border:1px solid #a5e7ea; background:#0066CC !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:24px;"  /></span>
										</div>
										
									</form>
									
								</figure>
								</section>
							</section>
							</section>
						</section>
					</section>
				</section>
			</section>
		

					
<?php
require_once "footer.php";
?>