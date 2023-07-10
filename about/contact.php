<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> About Us - Contact</title>
	<link href="../css/base.css" type="text/css" rel="stylesheet" />
	<link href="../css/main.css" type="text/css" rel="stylesheet" />
	<meta name='keywords' content='' />
	<script type="text/javascript">
		<?php include_once($SERVER_ROOT . '/includes/googleanalytics.php'); ?>
	</script>
</head>
<body>
	<?php
	$displayLeftMenu = "true";
	include($SERVER_ROOT . '/includes/header.php');
	?> 
	    <!-- This is inner text! -->
		<!-- start of inner text and right side content -->
		<div  id="innervplantstext">
			<div id="bodywrap">
				<div id="wrapper1"><!-- for navigation and content -->

					<!-- PAGE CONTENT STARTS -->

					<div id="content1wrap"><!--  for content1 only -->

					<div id="content1"><!-- start of primary content --><a id="pagecontent" name="pagecontent"></a>
					<h1>Contact Us</h1>

					<h2>Under construction</h2>

					<div style="margin:20px;">
						<p>Excuse the dust.  We are moving and adding new content.</p>
						
						<p>The primary contact is <a href="http://systematics.mortonarb.org/lab">Andrew Hipp</a>, The Morton Arboretum.</p>

						<p>We welcome suggestions on how to improve this site and to 
							correct errors! And, we are always looking for new partners, volunteers, 
							and supporters!</p>

						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>
					</div><!-- end of #content1 -->
					</div><!-- end of #content1wrap -->
				
					<!-- start of side content -->
					<div id="content2">
						<!-- any image width should be 250 pixels -->

						<div class="box">
						<h3>vPlants is growing</h3>
						<p ><img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/250_prairie.jpg" width="210" height="291" alt="Prairie near Chicago."></p>
						</div>

						<p class="small">Information provided on this page applies to the Chicago Region and may not be relevant or complete for other regions.</p><p class="small noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></p>

					</div><!-- end of #content2 -->
				</div><!-- end of #wrapper1 -->
			</div><!-- end of #bodywrap -->
		</div><!-- end of #innervplantstext -->

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?> 

</body>
</html>