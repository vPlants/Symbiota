<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Suillaceae</title>
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
            <h1>Guide to Suillacae</h1>

            <div style="margin:20px;">
            	 <div class="floatimg"></div>

				<p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<p><!-- why separate from Boletaceae? -->

				</p>


				<table class="key" cellpadding="3" cellspacing="0" border="0">
				<caption>Key to Genera</caption>
				<thead>
				<tr ><th colspan="3">Key Choice</th><th >Go to</th></tr>
				</thead>
				<tbody>

				<tr class="keychoice">
				<td id="k1">1a. Cap slimy, viscid, tacky, or dry. Pores often decurrent on stem. Partial veil present or absent, if present may leave a ring, band, or zone on stem.</td>
				<td ><!-- image --></td>
				<td ><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/SUIL/SUILBREV.key_situ.jpg" width="125" height="100" alt=""></td>
				<td ><a href="suillus.html"><i class="genus">Suillus</i></a></td>
				</tr><tr >
				<td ></td>
				<td ><!-- image --></td>
				<td ><!-- image --></td>
				<td ></td>
				</tr>

				</tbody>
				</table>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>