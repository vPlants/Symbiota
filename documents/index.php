<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Documents and Downloads</title>
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
        <div  id="innervplantstext">
            <h1>Documents and Downloads</h1>
			<div style="margin:20px;">
            	<p>Links to web pages and documents. Many of these are reference documents used by the vPlants partners, but are also of use to the public.</p>

				<h3><a href="p_docs.html"
				title="Plant Documents.">Plant Documents</a></h3>
				<ul><li>
				1. <a href="p_checklist.html"
				title="Scientific Name Checklist.">Taxon Checklist</a>
				</li><li>
				2. <a href="p_concern.html"
				title="Chicago Region Plants of Concern.">Plants of Concern</a>
				</li><li>
				3. <a href="p_invasive.html"
				title="Chicago Region Invasive Plants.">Invasive Plants</a>
				</li><li>
				4. <a href="p_terms.html"
				title="vPlants Accepted Plant Terms.">Accepted Plant Terms</a>
				</li></ul>


				<h3>Fungus Documents</h3>
				<ul><li>
				Under construction
				</li></ul>

				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>

				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>