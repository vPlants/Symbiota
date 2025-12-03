<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE?>vPlants - County Map</title>
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
        <div  id="innertext">
            <h1>County Map for Chicago Region</h1>

            <div style="margin:20px;">
            	 <p>Map of the 24 counties included in the Chicago Region for vPlants. Please be aware when searching records that there is a Lake County in Illinois as well as a Lake County in Indiana.</p>

				 <img class="floatleft" src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/map_vplants.gif" width="490" height="484" alt="Map of the vPlants Chicago Region showing counties included">


				 <div class="floatleft">
				  <h3>Illinois</h3>
				  <ul>
				   <li>Boone</li>
				   <li>Cook</li>
				   <li>DeKalb</li>
				   <li>DuPage</li>
				   <li>Grundy</li>
				   <li>Kane</li>
				   <li>Kankakee</li>
				   <li>Kendall</li>
				   <li>Lake</li>
				   <li>McHenry</li>
				   <li>Will</li>
				  </ul>
				  <h3>Indiana</h3>
				  <ul>
				   <li>Jasper</li>
				   <li>Lake</li>
				   <li>LaPorte</li>
				   <li>Newton</li>
				   <li>Porter</li>
				   <li>Starke</li>
				   <li>St. Joseph</li>
				  </ul>
				  <h3>Michigan</h3>
				  <ul>
				   <li>Berrien</li>
				  </ul>
				  <h3>Wisconsin</h3>
				  <ul>
				   <li>Kenosha</li>
				   <li>Milwaukee</li>
				   <li>Racine</li>
				   <li>Walworth</li>
				   <li>Waukesha</li>
				  </ul>
				 </div>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>