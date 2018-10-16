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
			<section id="donation_box">
				<section class="container container-fluid">
					<section class="row-fluid">
					<div class="span8 first"> <h2> Contact Us</h2> </div>
						<div class="span4 title_right">
 
				<div class="dropdown" id="cart_dropdown">
 				<a data-toggle="dropdown" class="dropdown-toggle" role="button" id="dd_title" href="#">
				<i class="icon-user"></i>
 				Support
				</a>
				
				<figure class="dropdown-menu hidden_layer" aria-labelledby="dd_title" role="menu" id="title_dropdown">
						<div class="inner">
							<div class="span2 first">
								<span class="icon_alert"> i </span>
							</div>
							<div class="span10"> 
							<h3> Still looking for answers?  </h3>
							<p> One of our professionals can probably help you out. You can contact them with the button below.</p>
							<a href="#" class="btns pull-left"> Contact Us </a>
							</div>
						</div>
				</figure>
		</div>

			</div>
		
		</section>
				</section>
			</section>		<!-- end of Page Title -->
	</section>
 		<section class="row-fluid">
			<!-- BreadCrumbs -->
				<figure id="breadcrumbs" class="span12">
					<ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li class="active">Contact Us</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
		</section>
	</section>
</section>
<!-- End of Tile & Breadcrumbs -->

<!-- Page Content Container -->
<section id="content" class="mbtm contact_us">
	<section class="container-fluid container">
	
		<section class="row-fluid">
			
			<figure class="span12 mbtm2" id="map_holder"> 	
			<iframe width="100%" height="300" scrolling="no" frameborder="0" class="map-border" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.5287972268!2d72.43965426720494!3d23.020600121736702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat%2C+India!5e0!3m2!1sen!2s!4v1452164249723" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</figure>
		</section>
	</section>
	<section class="container-fluid container">
			<section class="row-fluid">
			
			<section id="contact_form" class="span6 form">
			<h3> Contact Form </h3>
			<p> Thank you for visiting our website. Please fill out the following form to request information about our products or to provide feedback about our site. When you are finished, click the 'Submit' button to send us your message. </p>
			
			<form method="post" action="contact.php">
				<input type="text" value="Enter Your Name" name="name" required/>
				<input type="text" value="Email Address" name="email" required />
				<textarea name="comments" cols="10" rows="10" required> Enter your Comment</textarea>
				<input type="submit" class="btns" value="Submit" name="submit" />
			</form>
			</section>
		
			<section id="contact_info" class="span6 contact_info">
			<h3> Contact Information </h3>
			
			<figure class="span12 first"> <i class="icon-envelope-alt"></i> info@sahyog.com</figure>
			
			<figure class="span12 first"> <i class="icon-mobile-phone"></i>+(91)8511677172</figure>
				
				<figure class="span12 first"> 
				<div class="span6 fisrt">
				<i class="icon-map-marker"></i> 
				Ahmedabad,Gujarat,India <br />
 				</div>
				</figure>
 

				<figure id="n_social" class="span12 first"> 
				
					<a href="#"> <i class="icon-facebook"></i> </a> 
					<a href="#"> <i class="icon-twitter"></i> </a> 
					<a href="#"> <i class="icon-google-plus"></i> </a> 
				
				</figure>
				
			</section>
		
			</section>
		</section>
	
	</section>

 <!-- Page Content Container -->
<?php
	require_once "footer.php";
?>