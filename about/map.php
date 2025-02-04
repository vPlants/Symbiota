<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> About Us - Chicago Region - State Map</title>
	<meta name='keywords' content='' />
	<?php
	include_once($SERVER_ROOT . '/includes/head.php');
	include_once($SERVER_ROOT . '/includes/googleanalytics.php');
	?>
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
						<h1>State Map for Chicago Region</h1>

						<div style="margin:20px;">
							<p>
							vPlants is centered on the Chicago Region at the southern end of Lake Michigan. The area covers southeastern Wisconsin, northeastern Illinois, northwestern Indiana, and the southwest corner of Michigan.
							</p>

							<p><img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/map_grtlakes.jpg" width="550" height="608" alt="Map of the vPlants Region and western Great Lakes"></p>
						</div>
					</div><!-- end of #content1 -->
					</div><!-- end of #content1wrap -->

					<div id="content2">

						<div class="box">
							<h3>Chicago Region Maps</h3>
							<ul>
								<li><a href="chicago.php">Chicago Region Main</a></li>
								<li><strong>State Map</strong></li>
								<li><a href="map_county.php">County Map</a></li>
							</ul>
						</div>

					</div><!-- end of #content2 -->

				</div><!-- end of #wrapper1 -->
			</div><!-- end of #bodywrap -->
		</div><!-- end of #innervplantstext -->


	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>