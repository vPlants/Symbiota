<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Search</title>
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
					<h1>Search</h1>
					<div style="margin:20px;">
						<!-- add in chicago region search link using search tool but with pre-chosen parameters -->
						<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/collections/index.php" >Search Chicago Region</a> - not working yet</div>
						<div class="indexdescription"><p>Search only the Chicago region.</p></div>

						<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/collections/index.php" >Search Collections</a></div>
						<div class="indexdescription"><p>Search all collections.</p></div>

						<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/collections/map/mapinterface.php" target="_blank" >Map Search</a></div>
						<div class="indexdescription"><p>Search with a map.</p></div>

						<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/imagelib/imgsearch.php" >Image Search</a></div>
						<div class="indexdescription"><p>Search the images.</p></div>
					</div>
					</div><!-- end of #content1 -->
					</div><!-- end of #content1wrap -->

					<div id="content2"><!-- start of side content -->
						<!-- any image width should be 250 pixels -->

						<div class="box document">
						<h3>....</h3>
						<ul><li>
						<!-- add content -->
						</li></ul>
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