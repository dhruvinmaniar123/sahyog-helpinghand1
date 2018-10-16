<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "connect.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";
if($_SESSION['loginValidate'])
{;?>
   <section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2> Change Password</h2>
				</figure>
				</section>
			</section>
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
					<li class="active">Change Password</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
			<!-- End of breadcrumbs -->
		</section>
		<section>
		<figure>
		<span style="margin-left: 210px"><font color="#FF0000"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];unset($_SESSION['error']);}?></font></span>
		<form action="processchangepwd.php" method="post" class="basic-grey">
		    <label>
		        <span>Old Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		        <input class="input-large"  type="password" name="txtOpwd" placeholder=".input-large" />
		    </label>
		    
		    <label>
		        <span>New Password : &nbsp;&nbsp;&nbsp;&nbsp;</span>
		        <input class="input-large" id="name" type="password" name="txtNpwd" placeholder=".input-large" />
		    </label>
		    
		    <label>
		        <span>Confirm Password :</span>
		        <input class="input-large" id="name" type="password" name="txtCnpwd" placeholder=".input-large" />
		    </label>

		     <label>
		        <span>&nbsp;</span> 
		        <input type="submit" class="button" value="Change Password" style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#3333FF; border-radius:5px; -webkit-border-radius:5px; font-size:14px;"  /> 
		    </label>    
		    
		</form>
		</figure>
		</section>
		</section>
		</section>
	
<?php require_once 'footer.php';
}
else
{
	header("location:login.php");
	
}?>
