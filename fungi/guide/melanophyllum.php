<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Melanophyllum</title>
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
            <h1>Guide to Melanophyllum</h1>

            <div style="margin:20px;">
            	<p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<p>One rare species in the Chicago Region: <a href="http://www.nahuby.sk/obrazok_detail.php?obrazok_id=983">Melanophyllum echinatum</a>.</p>


				<p>&nbsp;</p>


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