<?php
//error_reporting(E_ALL);
include_once("../../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Guide to Strobilomyces</title>
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
            <h1>Guide to Strobilomyces</h1>

            <div style="margin:20px;">
            	 <div class="floatimg"><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/STRO1/STRO1.po.jpg" width="250" height="279" alt=""></div>

				<p class="small">This guide applies to the Chicago Region and is not complete for other regions. <span class="noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></span></p>


				<p>The genus <i class="genus">Strobilomyces</i> is unmistakable. These boletes have dark scaly caps and stems giving them the common names of old-man-of-the-woods and pine-cone fungus. The flesh stains reddish then slowly black. However, reliably separating the two very similar species of the midwest requires using a microscope to check the ornamentation on the spores.</p>

				<p>This photo appears to be <i class="genus">Strobilomyces</i> <i class="epithet">confusus</i> because of the small numerous scales on the cap, but checking the spores will confirm a correct identification.</p>


				<table class="key" cellpadding="3" cellspacing="0" border="0">
				<caption>Key to Species</caption>
				<thead>
				<tr ><th colspan="3">Key Choice</th><th >Go&nbsp;to&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
				</thead>
				<tbody>

				<tr class="keychoice">
				<td >1a. Spores spiny and reticulate, the spines with cross-connections forming a network. Cap scales often shaggy, large and soft.</td>
				<td ><!-- image --><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/STRO1/STRO1FLOC_spore.gif" width="125" height="100" alt="reticulate spore"></td>
				<td ><!-- image --><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/STRO1/STRO1FLOC_cap.jpg" width="125" height="100" alt="shaggy cap surface"></td>
				<td ><span class="taxon"><a href="/fungi/species/species.jsp?gid=4005">
				 <i class="genus">Strobilomyces</i>
				 <i class="epithet">floccopus</i></a>
					</span></td>
				</tr><tr >
				<td >1b. Spores spiny but not reticulate. Cap scales are often smaller and more numerous.</td>
				<td ><!-- image --><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/STRO1/STRO1CONF_spore.gif" width="125" height="100" alt="spiny spore"></td>
				<td ><!-- image --><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/fungi/guide/STRO1/STRO1CONF_cap.jpg" width="125" height="100" alt="scaly cap surface"></td>
				<td ><span class="taxon"><a href="/fungi/species/species.jsp?gid=11578">
				 <i class="genus">Strobilomyces</i>
				 <i class="epithet">confusus</i></a>
					</span></td>

				</tr><tr >
				<td ></td>
				<td colspan="2">Note: Spores need to be checked when the caps have scales intermediate between the two extremes pictured here.</td>
				<td ><span class="taxon"></span></td>
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