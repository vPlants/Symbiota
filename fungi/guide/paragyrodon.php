<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Paragyrodon</title>
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
            <h1>Guide to Paragyrodon</h1>

            <div style="margin:20px;">
            	<div class="floatimg"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/PARA1/PARA1SPHA.po.jpg" width="250" height="290" alt=""></div>

				<p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<p>The leather-neck or large-veiled <i>Paragyrodon</i> is endemic to the Midwest of the United States and Canada.</p>



				<table class="key" cellpadding="3" cellspacing="0" border="0">
				<caption>Key to Species</caption>
				<thead>
				<tr ><th colspan="3">Key Choice</th><th >Go to</th></tr>
				</thead>
				<tbody>

				<tr class="keychoice">
				<td id="k1">1a. Cap large, viscid to dry (tacky). Partial veil well-developed, a large membrane joining cap edge with lower stem. Found in the Midwest with oak.</td>
				<td ><!-- image --></td>
				<td ><!-- image --></td>
				<td ><a href="/fungi/species/species.jsp?gid=8268"><i class="genus">Paragyrodon</i> <i class="epithet">sphaerosporus</i></a></td>
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