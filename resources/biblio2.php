<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE?>vPlants - Plant References</title>
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
            <h1>Plant References</h1>

            <div style="margin:20px;">
            	<h2>References Commonly Used for vPlants</h2>
				<p>
				This is a partial list of published bibliographic references that are commonly used and cited on the vPlants website.  Often, much of the specific information on the Species Description pages has been written with the aid of these sources.  Less commonly used, or other specific sources, are cited on the individual Species Description pages.
				</p>

				<dl>

				<dt>Deam, C. C. 1940.</dt>
				<dd><i>Flora of Indiana.</i> Indianapolis: Department of Conservation, Division of Forestry.</dd>

				<dt>Fernald, M. L. 1950.</dt>
				<dd><i>Gray's manual of botany: A handbook of the flowering plants and ferns of the central and northeastern United States and adjacent Canada.</i> 8th ed. New York: American Book Company.</dd>

				<dt>Gleason, H. A. and A. Cronquist. 1991.</dt>
				<dd><i>Manual of vascular plants of northeastern United States and adjacent Canada.</i> 2nd ed. New York: The New York Botanical Garden.</dd>

				<dt>Mohlenbrock, R. H. 1986.</dt>
				<dd><i>Guide to the vascular flora of Illinois.</i> revised and enlarged ed. Carbondale, IL: Southern Illinois University Press.</dd>

				<dt>Swink, F. and G. Wilhelm. 1994.</dt>
				<dd><i>Plants of the Chicago region.</i> 4th ed. Indianapolis: Indiana Academy of Science.</dd>

				<dt>Voss, E. G. 1972 - 1996.</dt>
				<dd><i>Michigan flora: A guide to the identification and occurrence of the native and naturalized seed-plants of the state.</i> 3 vols. Bloomfield Hills, MI: Cranbrook Institute of Science.</dd>

				</dl>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>