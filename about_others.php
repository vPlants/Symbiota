<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants | Other Links</title>
	<link href="<?php echo $CLIENT_ROOT; ?>/css/base.css" type="text/css" rel="stylesheet" />
	<link href="css/main.css" type="text/css" rel="stylesheet" />
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
        <div  id="innervplantstext">
            <h1>Other Links</h1>

            <div style="margin:20px;">
            	<a href="http://plants.usda.gov/">USDA PLANTS National Database</a><br></br>
				<a href="http://www.ipni.org/">The International Plant Names Index</a><br></br>
				<a href="http://www.bonap.org/">The Biota of North America Program</a><br></br>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?> 

</body>
</html>