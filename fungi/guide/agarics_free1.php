<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Agarics Gills Free Key 1</title>
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
				<caption>Key to Mushroom Genera with Free Gills.<br> Step 1: Spore Print Color</caption>
				<tbody>


				<tr>
				<td><div style="background: #f9f9f9;"><a href="agarics_free3.html"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/img/spore300.gif" width="300" height="222" alt=""></a></div>
				<p>
				<a href="agarics_free3.html">White.</a> Ring present or absent.
				</p>
				</td>
				<td><div style="background: #e48c61;"><a href="agarics_free2.html"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/img/spore300.gif" width="300" height="222" alt=""></a></div>
				<p>
				<a href="agarics_free2.html">Pinkish to salmon.</a> No ring on stem.
				</p>
				</td>
				</tr>


				<tr>
				<td><div style="background: #7da086;"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/img/spore300.gif" width="300" height="222" alt=""></div>
				<p>
				Greenish to olive gray.
				<br> Go to <a href="chlorophyllum.html"><i class="genus">Chlorophyllum</i></a>
				</p>
				</td>
				<td><div style="background: #a0413e;"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/img/spore300.gif" width="300" height="222" alt=""></div>
				<p>
				Reddish when fresh, drying darker.
				<br> Go to <a href="melanophyllum.html"><i class="genus">Melanophyllum</i></a>
				</p>
				</td>
				</tr>

				<tr>
				<td><div style="background: #000000;"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/img/spore300.gif" width="300" height="222" alt=""></div>
				<p>
				Black, inky.
				<br> Go to <a href="coprinus.html"><i class="genus">Coprinus</i></a>
				</p>
				</td>
				<td><div style="background: #604030;"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/img/spore300.gif" width="300" height="222" alt=""></div>
				<p>
				Chocolate brown.
				<br> Go to <a href="agaricus.html"><i class="genus">Agaricus</i></a>
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