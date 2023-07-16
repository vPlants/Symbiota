<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Coprinus</title>
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
            <h1>Guide to Coprinus</h1>

            <div style="margin:20px;">
            	<div class="floatimg"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/COPR3/COPR3COMA.po.jpg" width="250" height="303" alt=""></div>

				<p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<p>One species in Chicago Region, <i>Coprinus comatus</i>.</p>

				<p>For the other inky cap mushrooms formerly placed in <i>Coprinus</i> please see the Psathyrellaceae.</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>