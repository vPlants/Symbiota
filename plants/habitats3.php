<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Topics - Grasslands</title>
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
						<h1>Grasslands of the Chicago Region</h1>

						<div style="margin:20px;">
							<!-- Chicago Wilderness definitions -->
							<p>Under construction. This page will contain information on the grasslands of the Chicago region.</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
						</div>
					</div><!-- end of #content1 -->
					</div><!-- end of #content1wrap -->

					<div id="content2">

						<div class="box">
							<h3>Habitats of the Chicago Region</h3>
							<ul>
								<li><a href="habitats.php">Habitats Main</a></li>
								<li><a href="habitats2.php">Woodlands</a></li>
								<li><strong>Grasslands</strong></li>
								<li><a href="habitats4.php">Wetlands</a></li>
								<li><a href="habitats5.php">Urban Areas</a></li>
							</ul>
						</div>

						<div class="box external">
						<h3>....</h3>
						<ul>
						<li>
						....
						</li>
						</ul>
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