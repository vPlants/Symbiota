<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> vPlants - Help Guide</title>
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
        <div  id="innervplantstext">
            <h1>Help Guide</h1>

            <div style="margin:20px;">
            	<p>
				Use the links on this page for help with certain features.
				</p>

				<h3>What is vPlants?</h3>

				<p>
				Please see <a href="/about/" 
				 title="About vPlants and its partners">About Us</a>.
				</p>

				<h3>Why the Chicago area?</h3>
				<p>
				Please see <a href="/chicago.html" title="Why the Chicago Region?">Why focus on the Chicago Region?</a>
				</p>

				<h3>What plants are included?</h3>
				<p>
				Please see <a href="/plants/" 
				 title="Plants start page.">Plants of the Chicago Region</a>.
				</p>

				<h3>What fungi are included?</h3>
				<p>
				Please see <a href="/fungi/" 
				 title="Fungi start page.">Fungi of the Chicago Region</a>.
				</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?> 

</body>
</html>