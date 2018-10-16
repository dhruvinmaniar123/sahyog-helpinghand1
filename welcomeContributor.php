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
					<h2> Welcome to Contributor Page</h2>
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
					<li class="active">Contributor</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
		</section>
	</section>
</section>
<!-- End of Tile & Breadcrumbs -->
		
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
							  <h2> Necessitous </h2>
								<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"> Necessitous means peoples who are poor enough to need help from others.Necessitous circumstances refers to needy circumstances or extreme want. It is the situation of one who is very poor. It implies the direct pressure of suffering. . Necessaries of life include things absolutely unavoidable to human existence. Necessaries are the things needed for a person left with no support.</p>

								<!--<strong> Requirements </strong>
									<ol>
									<li> - Be fluent in English	 </li>
									<li> - Have knowledge of Events </li>
									<li> - Team Player </li>
									</ol>-->
									
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
								$usid=3;
								$sql2 ="SELECT * FROM userdetails WHERE userID IN (SELECT userID from user WHERE cnTypeID = ". $row1["cnTypeID"]. " AND userCategoryID =".$usid.");";
								$result2 = mysqli_query($con,$sql2);
								while($row2 = mysqli_fetch_array($result2))
								{
								?> 
									
									<li style="font-family:Arial, Helvetica, sans-serif; font-size:18px;"><?php echo $row2['name']; ?></li>
									<!--<li> - Have Experince in Digital Purchashing</li>
									<li> - Team Management </li>-->
								
									<?php
									}
									?>
 
									
							  </div>
							  <?php
							  
							  }
							  ?>
							  <!--<div id="design" class="tab-pane fade">
							  <h3> Event Volunteers </h3>
								<p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>

								<strong> Requirements </strong>
									<ol>
									<li> - Be fluent in English	 </li>
									<li> - Have knowledge of Events </li>
									<li> - Team Player </li>
									</ol>
 
									<a class="donate_btn pull-right" href="#"> Apply Now </a>
							  </div>
							  <div id="developer" class="tab-pane fade active in">
							  <h3> Relationship Manager </h3>
								<p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>

								<strong> Requirements </strong>
									<ol>
									<li> - Be fluent in English	 </li>
									<li> - Have knowledge of Events </li>
									<li> - Team Player </li>
									</ol>
									
									<a class="donate_btn pull-right" href="#"> Apply Now </a>
							  </div>
							  <div id="qa" class="tab-pane fade">
							  <h3> Content Writer </h3>
								<p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>

								<strong> Requirements </strong>
									<ol>
									<li> - Be fluent in English	 </li>
									<li> - Have knowledge of Events </li>
									<li> - Team Player </li>
									</ol>
									
								<a class="donate_btn pull-right" href="#"> Apply Now </a>

							  </div>-->
							 
							 </div>
			</figure>
			
			</section>
		</section>
		</section>
		</section>		
		
<!-- end of Page Title -->
		<section class="row-fluid">
			
		<section id="blog_store" class="mbtm">
		<section class="container-fluid container">
			<section class="row-fluid">
			<figure class="span5" id="news_accordion">
			<h2 class="title"> Charity
				<span class="h-line"></span> 
				</h2>
			    <div class="accordion" id="accordion_news">
						
						<div class="accordion-group">
							<div class="accordion-heading">
							<a class="accordion-toggle inactive" data-toggle="collapse" data-parent="#accordion_news" href="#co">
								<span class="datem span3 first"> </span>
								<span class="title span8">Product
									<span class="location_date"> 
											<span class="location">	<i class="icon-gift"></i> </span>
											<span class="date"> 	 </span>
									</span>
								</span>
								<span class="span1" id="icon_toggle"> <i class="icon-plus"> </i></span>	
							</a>
							</div>
							
							<div id="co" class="accordion-body collapse">
							<div class="accordion-inner">
								<figure class="span3 img first">
									<img src="images/cp.jpg" alt="" />
								</figure>
								<figure class="span9">
								<?php
								$query = "SELECT * FROM helpsubcategory";
								$result = mysqli_query($con,$query);
								while($rec = mysqli_fetch_array($result))
								{
								?>
								<p> <?php echo $rec['helpSubCategoryTitle'];?></p>
								<?php
								}
								?>
								
								<a href="giveProduct.php"> Donate Product</a>
								</figure>
							</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
							<a class="accordion-toggle inactive" data-toggle="collapse" data-parent="#accordion_news" href="#c2">
								<span class="datem span3 first"> </span>
								<span class="title span8">Services
									<span class="location_date"> 
											<span class="location">	<i class="icon-star-half-empty"></i> </span>
											<span class="date"> 	 </span>
									</span>
								</span>
								<span class="span1" id="icon_toggle"> <i class="icon-plus"> </i></span>	
							</a>
							</div>
							
							<div id="c2" class="accordion-body collapse">
							<div class="accordion-inner">
								<figure class="span3 img first">
								<img src="images/cs.jpg" alt="" />	
								</figure>
								<figure class="span9">
								<?php
								$query1 = "SELECT * FROM helpservicesubcategory";
								$result1 = mysqli_query($con,$query1);
								while($row = mysqli_fetch_array($result1))
								{
								?>
								<p> <?php echo $row['helpServiceSubCategoryTitle'];?></p>
								<?php
								}
								?>
								<a href="giveServices.php"> Donate Services</a>
								</figure>
							</div>
							</div>
							</div>
							
 
						
				</div>
			</figure>
		
		<!-- Start of Blog & Store -->
	
				<!-- Start of from our Store -->
				<figure id="shop" class="span6">
				<h2 class="title"> Donation
				<span class="h-line"></span> 
				</h2>
				
				<div id="slider_shop">
						
					<ul id="shop_slider">
							<?php $sql4 = "SELECT * FROM userproduct WHERE userDetailsID IN (SELECT userDetailsID from userdetails WHERE userID = ". $_SESSION['userid'].");";
							$resultUP = mysqli_query($con,$sql4);
							while($rowUP = mysqli_fetch_array($resultUP))
							{//var_dump($rowU);?>
							<?php
							//var_dump($row);
							$sql5 = "SELECT * FROM product WHERE productID = ".$rowUP['productID'].";";
							$resultP = mysqli_query($con,$sql5);
							while($rowP = mysqli_fetch_array($resultP))
							{//var_dump($rowU);?>
							<li> 
								<img src="<?php echo $rowP['productImage'];?>" width="139px" height="116px"/>
								
							</li>
							<?php
							}
							}?>
							
						</ul>
				</div>
				
			</figure>
				<!-- End of from our Store -->
			</section>
		</section>
</section></section>
	<!--<section class="map" >
		<section class="container-fluid container">
			<section class="row-fluid">
				<figure id="blog" class="span12">
				<h2 class="title"> Necessitous : 
				<span class="h-line"></span> 
				</h2>	
						

						<?php
						$sql = "SELECT userDetailsID,name FROM userdetails WHERE userID IN (SELECT userID FROM user WHERE userCategoryID = 3);";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result))
						
						{
						?>
							<label style=" font-family:Geneva, Arial, Helvetica, sans-serif; font-size:20px; font-style:oblique; margin-left:20px;"><?php echo $row["name"]; ?></label>
							<?php
						}
						?>
					<br/><br/><br/>
			</figure>
			</section></section></section>-->
<!-- End of Blog & Store -->
	
</section></section>


					
<?php
require_once "footer.php";
}
else
{
	header("location:login.php");
}?>