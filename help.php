<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";
//session_start();
$galleryData = fetchRecord('product');
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
					<h2> Help </h2>
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
					<li class="active">Help</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
		</section>
	</section>
</section>
<!-- End of Tile & Breadcrumbs -->
<!-- Start of Blog & Store -->
	<section id="blog_store" class="mbtm">
		<section class="container-fluid container">
			<section class="row-fluid">
				<!-- Start of  Latest from our blog  -->
				<figure id="blog" class="span6 first">
				<h2 class="title"> Product 
				<span class="h-line"></span> 
				</h2>
				<div id="slider_blog">
				
						<div class="img span5"> <img src="images/charityProduct.jpg" alt="" /></div>
						<div class="content span7">
							<div class="post_excerpt">
								<h4> <a href="#"> Product</a> </h4>
								<p>Product is to give (food, clothes, etc.) in order to help a person or organization, and it also includes to give to a hospital .so that it can be given to someone who needs it.</p>
								<a href="viewProduct.php"> <button style=" border:1px solid #a5e7ea; background:#CCFFFF !important;  padding:5px 20px !important; display:inline-block; color:#00CCFF; border-radius:5px; -webkit-border-radius:5px; font-size:12px;" >View</button></a>
										
									&nbsp;
									&nbsp;
									<a href="login.php">  <button onclick="login.php" style=" border:1px solid #a5e7ea; background:#CCFFFF !important;  padding:5px 20px !important; display:inline-block; color:#00CCFF; border-radius:5px; -webkit-border-radius:5px; font-size:12px;" >To know More<i class="icon-signin"></i></button> </a>
							</div>
						</div>
				</div>
				
			</figure>
				<!-- End of  Latest from our blog  -->
				<!-- Start of from our Store -->
				<figure id="service" class="span6">
				<h2 class="title"> Services  
				<span class="h-line"></span> 
				</h2>
				<div id="slider_blog">
				
						<div class="img span5"> <img src="images/charityService.jpg" alt="" /></div>
						<div class="content span7">
							<div class="post_excerpt">
								<h4> <a href="#"> Services</a> </h4>
								<p> Services is to give as a way of helping people for supplying a public need such as serving food ,medical checkup , or utilities such as electricity and water.</p>
								<a href="viewServices.php">  <button style=" border:1px solid #a5e7ea; background:#CCFFFF !important;  padding:5px 20px !important; display:inline-block; color:#00CCFF; border-radius:5px; -webkit-border-radius:5px; font-size:12px;" >View</button> </a>
										
									&nbsp;
									&nbsp;
									<a href="login.php">  <button style=" border:1px solid #a5e7ea; background:#CCFFFF !important;  padding:5px 20px !important; display:inline-block; color:#00CCFF; border-radius:5px; -webkit-border-radius:5px; font-size:12px;" >To know More<i class="icon-signin"></i></button> </a>
							</div>
						</div>
				</div>
				
			</figure>
				<!-- End of from our Store -->
			</section>
		</section>
</section>
<!-- End of Blog & Store -->
<?php
require_once "footer.php";
?>