<?php
	//session_start();
	require_once "configuration.php";
	require_once $ROOT_PATH."administrator/utility/crud.php";
	require_once "header.php";
	require_once "menu.php";
	require_once "banner.php";
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
					<h2> LOGIN </h2>
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
					<li class="active">Log in</li>
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

					<!----start-contact---->
					
									<h4>LOGIN <br /><br /><span><a href="register1.php" style="margin-left: 0px; text-decoration:none; font-size:14px;">Yet not Registered??</a></span></h4><h5 style="margin:10px 0px; padding:0px; float:left; width:100%"></h5>
									
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
											<?php echo $_SESSION['message'];unset($_SESSION['message']);?>
											</h3><br /><br />
										<?php
										}
									}?>
									
									
									
									<form method="post" action="loginSubmit.php">
										<div>
											<span><label>Username :</label></span>
											<span style="width:300px"><input type="text" name="txtUsername"/></span>
										</div>
										<div>
											<span><label>Password :</label></span>
											<span style="width:300px"><input type="password" name="txtPassword"/></span>
										</div>
								
										<h5><input type="submit" value="Submit" style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:12px;" /><br />
											<a href="forgotPassword.php" class="forgot_pass" style="font-size:15px;">Forgot password?</a> &nbsp; &nbsp; &nbsp; &nbsp;
											<!--<a href="forgotpwd.php" style="margin-left: 20px; text-decoration:none; font-size:14px;">Forgot Password?</a></h5>--> 
									
										
									</form>
								
				</figure>
				</section>
				</section>
				</section>
	<?php
	require_once "footer.php";
?>