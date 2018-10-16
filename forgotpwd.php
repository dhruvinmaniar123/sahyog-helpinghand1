<?php
session_start();
require_once "configuration.php";
require_once "connect.php";
require_once $ROOT_PATH."administrator/utility/crud.php";
require_once $ROOT_PATH."administrator/utility/idEncode.php";
require_once "header.php";
require_once "menu.php";
require_once "banner.php";	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sahyog</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

</head>

<body>
<section id="content" class="mbtm product_grid">
	<section class="container-fluid container">
	
		
		<section id="sidebar" class="span3">

	<figure class="widget tags">
	<div class="contact-form" align="">
									<h3> <i class="icon-sign-blank"></i> Password Recovery</h3>
									<div class="clear" align="center"> </div>
         </div>
         <span style="width:300px"><a href="login.php" class="forgot_pass">Return To Login</a></span> 

		<form name="frmForgotPassword" method="post" action="recoverPassword.php" >
		<?php
		if(array_key_exists('errors',$_SESSION))
		{?>
			<div class="error_box">				
				<?php
				echo $_SESSION['errors'];
				unset($_SESSION['errors']);
				?>
			</div>
		<?php
		}
		elseif(!array_key_exists('errors',$_SESSION) || !array_key_exists('emailsuccess',$_SESSION))
		{?>
        <fieldset>
        	<dl>
        		<dt><label for="email"><font color="#FF0000">*</font>&nbsp;Username:</label></dt>
        		<dd><span style="width:300px"><input type="text" name="txtUsername" size="54" /></span></dd>
        	</dl>
        	<dl>
        		<dt><label for="password"><font color="#FF0000">*</font>&nbsp;Registered Email:</label></dt>
        		<dd><span style="width:300px"><input type="text" name="txtEmail" size="54" /></span></dd>
        	</dl>
			<dl class="submit">
        		<input type="submit" id="submit" value="Recover" style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;" />&nbsp;
        		<input type="reset" id="submit" style=" border:1px solid #a5e7ea; background:#1cc3c9 !important;  padding:10px 40px !important; display:inline-block; color:#fff; border-radius:5px; -webkit-border-radius:5px; font-size:14px;" />
        	</dl>
        </fieldset>
		</form>
		<?php
		}
		elseif(array_key_exists('emailsuccess',$_SESSION))
		{
		?>
			<div class="valid_box">
				Your Password has been sent to your registered Email Address.
			</div>
		
			<a href="login.php">Return to Login</a>
		<?php
		unset($_SESSION['emailsuccess']);
		}?>
    </div>  
    </figure>
	</section>
	</section>
	</section>

	
</body>
<?php
require_once "footer.php";
?>
</html>
