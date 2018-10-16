<?php
require_once "configuration.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "connect.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";

?>
<section class="mtop">
	<section class="container-fluid container">
		<section class="row-fluid">
			<section id="donation_box">
				<section class="container container-fluid">
					<section class="row-fluid">
					<div class="span8 first"> <h2> Services</h2> </div>
								
					</section>
				</section>
			</section>		<!-- end of Page Title -->
	</section>
 		<section class="row-fluid">
			<!-- BreadCrumbs -->
				<figure id="breadcrumbs" class="span12">
					<ul class="breadcrumb">
					<li><a href="index.php">Home</a> <span class="divider">/</span></li>
					<li><a href="help.php">Helping hand</a> <span class="divider">/</span></li>
					<li class="active">Services</li>
					</ul>
				</figure>
			<!-- End of breadcrumbs -->
		</section>
	</section>
</section>
<!-- End of Tile & Breadcrumbs -->
<!-- Page Content Container -->
<section id="content" class="mbtm product_grid">
	<section class="container-fluid container">
	
		<section class="row-fluid">
			
			<section class="span9 product_view" id="product_grid">  
					
					<figure class="span12 first" id="category_title">
							<div class="span10 first"> <h3> Featured Services </h3>	</div>
							<div class="span2"> 
								<ul id="view_switcher"> 
								
								</ul> 
							</div>
					</figure>
					
					<Section class="product_image_holder">
					
					<?php
						$sql = "SELECT * from services;";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result))
						{
						?>
							<figure class="span4 first" id="product"> 
						
						<div class="product_img">
								<img src="<?php echo $row["serviceImage"]; ?>" alt="Product Image" />
								
						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> <?php echo $row["serviceTitle"]; ?></a> </h3>
							<!--<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>99 <del> <sup>$</sup>120.50 </del></span>
							<a href="#" class="btn pull-right"> Add to Cart </a>-->
						</div>
					</figure>
						<?php
						}
						?>
						
					
<!--
					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store1.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Mug </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store3.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Cap </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<hr />
 					<figure class="span4 first" id="product"> 
						
						<div class="product_img">
								<img src="images/store2.jpg" alt="Product Image" />
								<span class="sale_icon"></span>
						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human T-shirt</a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>99 <del> <sup>$</sup>120.50 </del></span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store1.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Mug </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store3.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Cap </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<hr />
					<figure class="span4 first" id="product"> 
						
						<div class="product_img">
								<img src="images/store2.jpg" alt="Product Image" />
								<span class="sale_icon"></span>
						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human T-shirt</a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>99 <del> <sup>$</sup>120.50 </del></span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store1.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Mug </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store3.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Cap </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<hr />
					<figure class="span4 first" id="product"> 
						
						<div class="product_img">
								<img src="images/store2.jpg" alt="Product Image" />
								<span class="sale_icon"></span>
						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human T-shirt</a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>99 <del> <sup>$</sup>120.50 </del></span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store1.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Mug </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>

					<figure class="span4" id="product"> 
						
						<div class="product_img">
								<img src="images/store3.jpg" alt="Product Image" />
 						</div>
						
						<div class="first product_description">
							<h3> <a href="#"> Be-Human Cap </a> </h3>
							<p>?igh life ex whatever ironyc upidatat high life ethical reprehenderit elit...</p>
							<span class="price"> <sup>$</sup>120.99  </span>
							<a href="#" class="btn pull-right"> Add to Cart </a>
						</div>
						
						
						
					</figure>
-->
					<hr />
					
					
					</section>
					
				<!--<div class="pagination">  
                  <ul>  
                    <li><a href="#">Prev</a></li>  
                    <li class="active">  
                      <a href="#">1</a>  
                    </li>  
                    <li><a href="#">2</a></li>  
                    <li><a href="#">3</a></li>  
                    <li><a href="#">4</a></li>  
                    <li><a href="#">Next</a></li>  
                  </ul>  
                </div>	-->					
		
		</section>
			
				
			<section id="sidebar" class="span3">
							
							<!--<figure class="widget social_follow">
								
								<div id="social_follow">
									<span class="social_fb"> <i class="icon-facebook"></i> <em> 1453 Folowers </em> </span>
									<span class="social_twitter"> <i class="icon-twitter"></i> <em> 4785 Folowers</em> </span>
									
								</div>
									
							</figure>-->
							<figure class="widget slider_products">
							
								<h3> <i class="icon-pushpin"></i> Services Categries </h3>
								
								<ul id="slider_products">
								<?php
									$sql1 = "SELECT * from helpcategory;;";
									$result1 = mysqli_query($con,$sql1);
									while($rowHC = mysqli_fetch_array($result1))
									{
									?>
										<li> 
											<div class="product_img"> <img src="<?php echo $rowHC["helpCategoryImage"]; ?>" alt="Product Image" /> </div>
											<div class="bottom_sec">  <span> <a href="#"> <?php echo $rowHC["helpCategoryTitle"]; ?> </a>  </span> </div>
										</li>
									<?php
									}
									?>
									
								
								</ul>
								
							
							</figure>
<!--demo-->
		</section>	
		</section>
	</section>
</section>

					
<?php
require_once "footer.php";
?>