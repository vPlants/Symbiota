<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Agaricus</title>
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
            <h1>Guide to Agaricus</h1>

            <div style="margin:20px;">
            	 <div class="floatimg"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/AGAR/AGARBITO_250_whole.jpg" width="250" height="278" alt=""></div>

				 <p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>

				 <p>...</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>