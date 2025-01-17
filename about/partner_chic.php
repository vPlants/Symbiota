<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Partners: Chicago Botanic Garden</title>
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
            <h1>Partners: <a href="http://www.chicagobotanic.org/">Chicago Botanic Garden</a></h1>
			<div style="margin:20px;">
            	 <p>Since its founding more than 30 years ago, the Chicago Botanic Garden has become a world-class cultural landmark. Owned by the Forest Preserve District of Cook County and managed by the Chicago Horticultural Society, the Garden spans 385 acres, features 23 garden areas, and serves over 700,000 visitors each year. The Garden's Skokie River restoration project is a permanent study site for streambank stabilization techniques, and Mary Mix McDonald Woods, a wet savanna and open oak woodland, is a nearly 100-acre restoration management project.</p>
				 <p>
				  Chicago Botanic Garden,
				  1000 Lake-Cook Road,
				  P.O. Box 400,
				  Glencoe, IL   60022,
				  (847) 835-5440,
				  www.chicagobotanic.org
				 </p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>