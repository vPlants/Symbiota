<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Chicago Regions Plants of Concern List</title>
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
            <h1>Chicago Region Plants of Concern List</h1>
			<div style="margin:20px;">
            	<p class="large">Download, file format is Excel XLS:<br /> <a href="plants_of_concern.xls">Plants of Concern, 2006 version, 2006-10-17 (153 KB)</a>
				</p>
				<p>
				A compiled list of taxa in the Chicago Region that are listed in Illinois, Indiana, Michigan, Wisconsin, and the Federal lists.  This compilation was originally created in July 2004 from the most current lists available at that time.  Taxa are listed alphabetically by family and genus according to the vPlants accepted name (marked by a Y in the second column).  The list includes both the vPlants accepted name (always listed first within a synonymy group) and the exact name that appears on the individual source lists (always listed below the vPlants accepted name).  For the most current and updated listings, please see the links to the individual state and federal lists linked at the right.
				</p>

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