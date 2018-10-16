<?php
//session_start();
if(isset($_SESSION['userid']))
{
	$userid = $_SESSION['userid'];
	require_once("connect.php");
	$sql = "SELECT userCategoryID FROM user WHERE userID = '".$userid."';";
	$res = mysqli_query($con,$sql);	
	$rec = mysqli_fetch_array($res);
	$ucid = $rec['userCategoryID'];	
}
?>
<!-- Main Nav Bar -->
			<nav id="nav">
				<section class="container-fluid container">
					<section class="row-fluid">
			  <div class="navbar navbar-inverse">
				<div class="navbar-inner">
				  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				  <div class="nav-collapse collapse">
					<ul class="nav">
        			 <li class=""> <a href="index.php"> Home </a> </li>
					 <li class="dropdown"> <a href="about_us.php">  About </a> </li>
          			 <li class="dropdown"> <?php
					  if(isset($_SESSION['loginValidate']))
					  {
					  		if(isset($_SESSION['loginValidate']))
					  		{
								if($ucid==2)
								{?>
								<a class="dropdown" href="help.php">Charity<b class="caret"></b></a>
								
								<ul class="dropdown-menu">
								
								<li><a href="giveProduct.php">Product</a></li>
								<li><a href="giveServices.php">Services</a></li>
							  </ul>
								<?php
								}
								elseif($ucid==3)
								{?>
								<a class="dropdown" href="help.php">Need<b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li><a href="wantProduct.php">Product</a></li>
								<li><a href="wantServices.php">Services</a></li>
							  </ul>
							  <?php
								}
					  		}
					   }
					   else
					   {
					   ?>
					   <a class"ropdown-toggle" href="help.php">Helping Hand</a>
					   <?php
					   }
					   ?>
					 
					  </li>
					 
					  <?php
					  if(isset($_SESSION['loginValidate']))
					  {?>
						  
					  <?php
					  }
					  else
					  {?>
						  <li><a href="login.php">Login</a></li>
						  <li><a href="register1.php">New User Registration</a></li>
					  <?php
					  }
					  if(isset($_SESSION['loginValidate']))
					  {?>
						 <li><a href="showMyProfile.php">My Profile</a></li>
						  <li><a href="contact_us.php">Contact</a></li>
						  <li><a href="changepwd.php">Change Password</a></li>
						  <li class="last"><a href="logout.php">Log Out</a></li>
					  <?php
					  }
					  else
					  {?>
					 <li> <a href="contact_us.php"> Contact </a> </li>
					  <?php
					  }?>
					</ul>
				
				  </div>
				  <!--/.nav-collapse -->
				</div>
				<!-- /.navbar-inner -->
			  </div>
			 
			  <!-- /.navbar -->
					</section>
				</section>
			</nav>
	<!-- End Main Nav Bar -->	 
	 </header>
<!-- End of Header -->