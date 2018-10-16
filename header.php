<?php
session_start();
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sahyog-Always with you </title>
<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/mq.js"></script>
<![endif]-->
<!--modal-->

<!--end modal-->
<meta http-equiv="cache-control" content="no-cache">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width">
<!-- Css Files Start -->
<link href="css/style.css" rel="stylesheet" type="text/css" /><!-- All css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" /><!-- Bootstrap Css -->
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/customIE.css" /><![endif]-->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" /><!-- Font Awesome Css -->
<link href="css/font-awesome-ie7.css" rel="stylesheet" type="text/css" /><!-- Font Awesome iE7 Css -->
<!-- Css Files End -->
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
		
		<!--lightbox gallery code-->
		<script src="lightbox2/js/jquery-1.11.0.min.js"></script>
		<script src="lightbox2/js/lightbox.min.js"></script>
		<link href="lightbox2/css/lightbox.css" rel="stylesheet" />
	
	  	<script src="js/jquery-1.9.1.js"></script>
	   	<script src="js/jquery-ui.js"></script>
	
		<script>
			$(function() {
		  	$( "input[name^=MyDate]" ).datepicker({
		    changeMonth:true,
		    changeYear:true,
		    yearRange:"-100:+0",
		    dateFormat:"dd MM yy"
		  	});
		  	});
		  </script>	
<!-- JS Files Start -->
<script type="text/javascript" src="js/lib-1-9-1.js"></script><!-- lib Js -->
<script type="text/javascript" src="js/lib-1-7-1.js"></script><!-- lib Js -->
<script type="text/javascript" src="js/modernizr.js"></script><!-- Modernizr -->
<script type="text/javascript" src="js/easing.js"></script><!-- Easing js -->
<script type="text/javascript" src="js/bootstrap.js"></script><!-- Bootstrap -->
<script type="text/javascript" src="js/bxslider.js"></script><!-- BX Slider -->
<script type="text/javascript" src="js/fitvids.js"></script><!-- fIt Video -->
<script type="text/javascript" src="js/clearInput.js"></script><!-- Input Clear -->
<script type="text/javascript" src="js/smooth-scroll.js"></script><!-- smooth Scroll -->
<script type="text/javascript" src="js/prettyPhoto.js"></script><!-- Pretty Photo -->
<script type="text/javascript" src="js/social.js"></script><!-- Social Media Hover Effect -->
<script type="text/javascript" src="js/countdown.js"></script><!-- Event Counter -->

<script type="text/javascript" src="js/custom.js"></script><!-- Custom / Functions -->
<!--[if IE 8]>
     <script src="js/ie8_fix_maxwidth.js" type="text/javascript"></script>
<![endif]-->
<!-- Social Icons no JS -->
<noscript>
		<link rel="stylesheet" type="text/css" href="css/nj.css" />
</noscript>
<!-- Social Icons no JS -->
<script type="text/javascript" src="js/csc.js"></script>
</head>
<body>
<!-- Start Main Wrapper -->
<div class="wrapper">
<!-- Start of Header -->
	<header>
  <!-- Start Main Header -->
  <section class="top_bar">
	<section class="container-fluid container">
		<section class="row-fluid">
			<article class="span6">
				<ul class="details">
					<li><i class="icon-map-marker"> </i> Ahmedabad, Gujarat, India</li>
					<li><i class="icon-mobile-phone"> </i>+(91)8511677172</li>
					<li><i class="icon-envelope-alt"> </i> info@sahyog.com</li>
				</ul>
			</article>
			<article class="span4 offset2"> 		
				<ul class="social">
					<li> <a href="#" class="s7"> Youtube</a> </li>
					
					<li> <a href="#" class="s5"> Twitter</a> </li>
			
					<li> <a href="#" class="s1"> Facebook</a> </li>
				</ul>
			</article>
		</section>
	</section>	
  </section>

  <section class="logo_container">
		  <section class="container-fluid container">
				<section class="row-fluid">
					  <section class="span4">
							<h1 id="logo">
								<a href="index.php">
									<img src="images/logo.png">
								</a>
							</h1>
							
						</section>	
				</section>
				<h4 align="right">
					 <?php 
					 if(isset($_SESSION['loginValidate']))
					  { ?>
					 <p>Hi, &nbsp;<?php echo $_SESSION['uname'];?></p>
					 <?php
					  }
					  else
					  {}
					  ?>
				</h4>
			</section>
  </section>