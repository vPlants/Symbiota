<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Agarics Gills Free Key 2</title>
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

            <div style="margin:20px;">
            	 <p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<table class="key blocks" cellpadding="0" cellspacing="10" border="0">
				<caption>Key to Mushroom Genera with Free Gills.<br> Step 2: Volva Presence</caption>
				<tbody>


				<tr>
				<td><div style=""><a href="volvariella.html" title="Go to Volvariella."><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/VOLV/VOLV_300_volva.jpg" width="300" height="222" alt=""></a></div>
				<p>
				Universal veil present, forming cup (volva) at stem base, look carefully. Growing on trees, woody debris, soil, or on other mushrooms.
				<br> Go to <a href="volvariella.html"><i class="genus">Volvariella</i></a>.
				</p>
				</td>
				<td><div style=""><a href="pluteus.html" title="Go to Pluteus."><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/PLUT/PLUT_300_novolva.jpg" width="300" height="222" alt=""></a></div>
				<p>
				Universal veil absent. Growing on wood, wood chips, occasionally on ground from buried wood.
				<br> Go to <a href="pluteus.html"><i class="genus">Pluteus</i></a>.
				</p>
				</td>
				</tr>


				</tbody>
				</table>

				<p class="small">All images by Patrick Leacock unless noted.</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>