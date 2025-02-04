<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Partners: The Field Museum</title>
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
            <h1>Partners: <a href="http://www.fieldmuseum.org/">The Field Museum</a></h1>
			<div style="margin:20px;">
            	 <p>Using collections-based research and self-directed learning through exhibits and education programs, The Field Museum promotes greater public understanding and appreciation of the world in which we live. The Museum's expanding programs on the region's biological diversity help integrate natural riches into everyday life and culture. Regional inventory and population monitoring programs focus on species of conservation concern, or those that serve as sensitive indicators of the health of an ecological community.
				 </p>
				 <p>
				  The Field Museum of Natural History,
				  1400 S. Lake Shore Drive,
				  Chicago, IL   60605,
				  (312) 922-9410,
				  www.fieldmuseum.org
				</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>