<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Gyrodon</title>
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
            <h1>Guide to Gyrodon</h1>

            <div style="margin:20px;">
            	<div class="floatimg"></div>

				<p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<p>To date we only have <i>Gyrodon merulioides</i> recorded for the Chicago area. This species has an unusual association with scale insects on the roots of ash trees (<i>Fraxinus</i>).</p>



				<table class="key" cellpadding="3" cellspacing="0" border="0">
				<caption>Key to Species</caption>
				<thead>
				<tr ><th colspan="3">Key Choice</th><th >Go to</th></tr>
				</thead>
				<tbody>

				<tr class="keychoice">
				<td id="k1">1a. Cap broadly convex to flat, may be irregular in outline, moderate to dark brown. Stem usually off-center. Pores yellowish, radially elongated, often with cross-veins. Found on the ground near ash trees.</td>
				<td ><!-- image --></td>
				<td ><!-- image --></td>
				<td ><a href="/fungi/species/species.jsp?gid=4231"><i class="genus">Gyrodon</i> <i class="epithet">merulioides</i></a></td>
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