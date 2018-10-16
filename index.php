<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";

$searchKey['isMostPopular'] = 1;
$searchKey['isFuturePackage'] = 0;
$productData = fetchRecord('product',$searchKey);
unset($searchKey);
//var_dump($productData);
require_once "header.php";
require_once "menu.php";
require_once "banner.php";
?>

<!-- Title & BreadCrumbs -->
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
<!-- Page Title -->

		<section id="donation_box" class="mbtm">
			<section class="container container-fluid">
				<section class="row-fluid">
				<figure class="span12">
					<h2> What Sahyog do??</h2>
				</figure>
				</section>
			</section>
		</section>
</section>
</section>
</section>
<!-- Start of Features Boxes -->
	<section id="ngo_features" class="mbtm">
		<section class="container-fluid container">
		<section class="row-fluid">
			<!-- Start of Features Box 1 -->
			<figure class="span3 feature">
			<div class="ftr_img f-img-1"> 
				<span class="img"> Food & Water </span>
			</div>
			<div class="ftr_txt">
			<strong> Food & Water</strong>
			<p> Food and water are obvious fundamental needs to keep the body alive, because body needs nutrients and water to work properly.  </p>
			</div>
		</figure>
			<!-- End of Features Boxes 1 -->
			
			<!-- Start of Features Box 2 -->
			<figure class="span3 feature">
			<div class="ftr_img f-img-2"> 
				<span class="img"> Shelter</span>
			</div>
			<div class="ftr_txt">
			<strong> Shelter </strong>
			<p> Shelter  is needed for warmth, privacy, resting and sleeping, preparing and eating food, storing basic personal items etc..</p>
			</div>
		</figure>
			<!-- End of Features Boxes 2 -->
			
			<!-- Start of Features Box 3 --> 
			<figure class="span3 feature">
			<div class="ftr_img f-img-3"> 
				<span class="img"> Health Care </span>
			</div>
			<div class="ftr_txt">
			<strong> Health Care </strong>
			<p> Preventive health care is important to sustain healthy society. Health education and its implementation is crucial for life. </p>
			</div>
		</figure>
			<!-- End of Features Boxes 3 -->
			
			<!-- Start of Features Box 4 -->		
			<figure class="span3 feature">
			<div class="ftr_img f-img-4"> 
				<span class="img"> Education </span>
			</div>
			<div class="ftr_txt">
			<strong> Education </strong>
			<p> Education is needed to acquire basic knowledge that will help us to live healthy and be balanced with self, each other. </p>
			</div>
		</figure>
 			<!-- End of Features Boxes 4 -->
	</section>
	</section>
	</section>
<!-- End of Features Boxes -->
<!-- Start of Donation Box -->
	<section id="donation_box" class="mbtm">
	<section class="container container-fluid">
		<section class="row-fluid">
		<figure class="span10">
			<h2>"When <strong> we </strong> give cheerfully and accept gratefully, <strong> everyone is blessed</strong>".</h2> 
			
		</figure>
		<figure class="span2">
			<form action="contact_us.php">
				<button  data-placement="top"  class=" btn btn-large">Support Now</button>
			</form>
		</figure>
		</section>
	</section>
</section>
<!-- End of Donation Box -->

		
<?php
require_once "footer.php";
?>