<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> About Us</title>
	<link href="../css/base.css" type="text/css" rel="stylesheet" />
	<link href="../css/main.css" type="text/css" rel="stylesheet" />
	<meta name='keywords' content='' />
	<script type="text/javascript">
		<?php include_once($SERVER_ROOT . '/includes/googleanalytics.php'); ?>
	</script>
</head>
<body>
	<?php
	$displayLeftMenu = true;
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
					
						<h1>About Us</h1>
						<div style="margin:20px;">
							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/about/vplants.php">The vPlants Project</a></div>
							<div class="indexdescription"><p>Three major botanical institutions, <a href="http://www.mortonarb.org/">The Morton Arboretum</a>, the <a href="http://www.fieldmuseum.org/">Field Museum of Natural History</a>, 
							 and the <a href="http://www.chicagobotanic.org/">Chicago Botanic Garden</a>, have developed the online, searchable database vPlants (&#8220;virtual Plants&#8221;) that provides 
							 free plant specimen data and digital images of specimens to anyone with internet access. The project began in January 2001. <a href="<?php echo $CLIENT_ROOT; ?>/about/vplants.php">Learn more</a>
							</p></div>
							
							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/about/chicago.php">Chicago Region</a></div>
							<div class="indexdescription"><p>The Chicago Region, as defined by the vPlants Project, encompasses <a href="map_county.php" title="See County Map for Chicago Region">twenty-four counties</a>
							 from <a href="map.php" title="See State Map for Chicago Region">four states</a> (Illinois, Indiana, Michigan, Wisconsin) surrounding the southern tip of Lake Michigan in the western Great Lakes region of the north central United States.  
							 This area shares a unique set of physiographic (relating to physical geography) and floristic (relating to plant life) features that were defined in many ways by the glacial history of the area. <a href="<?php echo $CLIENT_ROOT; ?>/about/chicago.php">Learn more</a>
							</p></div>
							
							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/about/partnership.php">vPlants Partnership</a></div>
							<div class="indexdescription"><p>Add description here...<a href="<?php echo $CLIENT_ROOT; ?>/about/partnership.php">Learn more</a></p></div>
							
							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/about/contact.php">Contact Us</a></div>
							
							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/about/credits.php">Credits</a></div>
						</div>
					</div><!-- end of #content1 -->
					</div><!-- end of #content1wrap -->
					
					<!-- start of side content -->
					<div id="content2">
						<!-- any image width should be 250 pixels -->
				
						<!--image here?-->
							
						<div class="box">
						 <h3></h3>
						 <p>
						  ...
						 </p>
						<ul><li>

						</li></ul>
						</div>

						<p class="small">Information provided on this page applies to the Chicago Region and may not be relevant or complete for other regions.</p><p class="small noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></p>

					</div>
				</div><!-- end of #wrapper1 -->
			</div><!-- end of #bodywrap -->
		</div><!-- end of #innervplantstext -->

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?> 

</body>
</html>