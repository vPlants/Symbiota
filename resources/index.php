<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Resources</title>
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
						<h1>Resources</h1>

						<div style="margin:20px;">
							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/resources/regionherbaria.php">Region Herbaria</a></div>
							<div class="indexdescription"><p>List of herbaria in the Chicago area and the upper Midwest.</p></div>

							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/resources/docs.php">Documents</a></div>
							<div class="indexdescription">Links to web pages and documents. These are reference documents used by the vPlants partners, but may also be of use to the public.</div>

							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/resources/biblio.php">References</a></div>
							<div class="indexdescription">This is a partial list of published bibliographic references that are commonly used and cited on the vPlants website.</div>

							<div class="indexheading"><a href="<?php echo $CLIENT_ROOT; ?>/resources/links.php">Links</a></div>
							<div class="indexdescription">External links relating to plants and natural history education.</div>

						</div>
					</div><!-- end of #content1 -->
					</div><!-- end of #content1wrap -->


					<div id="content2">


						<p class="small">Information provided on this page applies to the Chicago Region and may not be relevant or complete for other regions.</p><p class="small noprint"><a href="/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></p>

					</div><!-- end of #content2 -->
				</div><!-- end of #wrapper1 -->
			</div><!-- end of #bodywrap -->
		</div><!-- end of #innervplantstext -->

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>