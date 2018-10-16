<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "connect.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";
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
					<h2> Welcome to Necessitous Page</h2>
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
					<li class="active">Necessitous</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
			<!-- Page Content Container -->
<section id="content" class="mbtm blog">
	<section class="container-fluid container">
	
		<section class="row-fluid">
			<section class="horizontal_tabs_wrapper span12 first mbtm2">
			<figure class="span3" id="horizontal_tabs">
				<ul  id="myTab">
				<?php
				$sql = "SELECT * From cntype";
			$result = mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result))
			{
			 ?>
				  <li class=""><a data-toggle="tab" href="#<?php echo $row['cnTypeID'];?>"> <?php echo $row['cnTypeTitle'];?></a></li>
				 <!-- <li class=""><a data-toggle="tab" href="#design"> Individual</a></li>
				  <li class="active"><a data-toggle="tab" href="#developer"> Research Institution</a></li>
				  <li class=""><a data-toggle="tab" href="#qa"> Content Writer</a></li>-->
				  <?php
				  }
				  ?>
				</ul>
			</figure>
			
			<figure class="span9" id="horizontal_tabs_content">
						
					<div class="tab-content" id="myTabContent">
					<div id="developer" class="tab-pane fade active in">
							  <h2> Contributors </h2>
								<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"> A contributor is someone who takes part in something or makes a contribution. Writers and people who donate things, services in particular are called contributors.</p>

								<strong style="font-size:14px;">Our contributors think and act in special ways: </strong>
									<ol style="font-size:14px;">
									<li style="font-size:14px;"><strong> They View Life as a Gift </strong> - When most of us are playing it safe, they view each of our days as a fleeting gift to be cherished - not something to be lived once the kids leave home or once we've retired.	 </li>
									<li style="font-size:14px;"><strong> They Live Consciously </strong> - They actively dream, decide, save, plan and then take the necessary action.</li>
									<li style="font-size:14px;"><strong> They Make and Act on Bold Decisions</strong> - They don't just think about it; they do it. They are not just going with the flow. </li>
									<li style="font-size:14px;"><strong>Their Lives are Not Without Difficulty</strong> - But they prioritize living and they work through the problems; they don't give into the challenges.</li>
									</ol>
									
									<!--<a class="donate_btn pull-right" href="#"> Apply Now </a>-->
							  </div>
					<?php
				$sql1 = "SELECT * From cntype";
			$result1 = mysqli_query($con,$sql1);
			while($row1 = mysqli_fetch_array($result1))
			{
				
			 ?>
							  <div id="<?php echo $row1['cnTypeID'];?>" class="tab-pane fade ">
							  <h2> <?php echo $row1['cnTypeTitle'];?></h2>
								<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"> <?php echo $row1['cnTypeDescription'];?></p>

								<?php
								$usid=2;
								$sql2 ="SELECT * FROM userdetails WHERE userID IN (SELECT userID from user WHERE cnTypeID = ". $row1["cnTypeID"]. " AND userCategoryID =".$usid.");";
								$result2 = mysqli_query($con,$sql2);
								while($row2 = mysqli_fetch_array($result2))
								{
								?> 
									
									<li style="font-family:Arial, Helvetica, sans-serif; font-size:18px;"> <?php echo $row2['name']; ?></li>
									<!--<li> - Have Experince in Digital Purchashing</li>
									<li> - Team Management </li>-->
								
									<?php
									}
									?>
 
									
							  </div>
							  <?php
							  
							  }
							  ?>
							 
							 </div>
			</figure>
			
			</section>
		</section>
		</section>
		</section>		
		
<!-- end of Page Title -->
			<!-- Start of Donation Box -->
	<section id="donation_box" class="mbtm">
	<section class="container container-fluid">
		<section class="row-fluid">
		<figure class="span8" id="blog">
			<h2 align="center"> Happy to help you....!!!</h2>
			
		</figure>
		<figure class="span2">
			<!--<form action=".php">
				<button  data-placement="top"  class=" btn btn-large" style="font-size:16px;">All Categories</button>
			</form>-->
			
		</figure>
		
		</section>
	</section>
</section>
<!-- End of Donation Box -->
	
		<!-- Start of Features Boxes -->
	<section id="ngo_features" class="mbtm">
		<section class="container-fluid container">
		<section class="row-fluid">
			<section id="offices_slider_warpper"	class="span12 first mbtm2">
					<h3 class="heading1 bg-div">
					<span class="inner">	<strong> Help Categories</strong>	<span class="bgr1"></span>	</span>
					</h3>
					
					<ul id="office_slider">
					<?php
									$sql1 = "SELECT * from helpcategory;;";
									$result1 = mysqli_query($con,$sql1);
									while($rowHC = mysqli_fetch_array($result1))
									{
									?>
										<li> 
											<div class="office_img"> <a href="#"> <img src="<?php echo $rowHC["helpCategoryImage"]; ?>" alt="office" /> </a> </div>	
											
										</li>
									<?php
									}
									?>
					</ul>
			</section>
	</section>
	</section>
	</section>
		
		<section id="donation_box" class="mbtm">
	<section class="container container-fluid">
		<section class="row-fluid">
		<figure class="span8">
			<h2 align="center">What do You Require??</h2>			
		</figure>
		<figure class="span2">
			<form action="wantProduct.php">
				<button  data-placement="top"  class=" btn btn-large" style="font-size:18px;">Product</button>
			</form>
			
		</figure>
		<figure class="span2">
			
			<form action="wantServices.php">
				<button  data-placement="top"  class=" btn btn-large" style="font-size:18px;">Services</button>
			</form>
		</figure>
		</section>
	</section>
</section>
		</section>
		
	</section>
	
</section>

<?php
require_once "footer.php";
}
else
{
	header("location:login.php");
}?>