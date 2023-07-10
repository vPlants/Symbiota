<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Partners: The Morton Arboretum</title>
	<link href="../css/base.css" type="text/css" rel="stylesheet" />
	<link href="../css/main.css" type="text/css" rel="stylesheet" />
	<meta name='keywords' content='' />
	<script type="text/javascript">
		<?php include_once($SERVER_ROOT . '/includes/googleanalytics.php'); ?>
	</script>
</head>
<body>
	<?php
	$displayLeftMenu = true;
	include($SERVER_ROOT . '/includes/header.php');
	?>
	<!-- This is inner text! -->
	<div id="innervplantstext">
		<div id="bodywrap">
			<div id="wrapper1"><!-- for navigation and content -->
				<h1>Partners: <a href="http://www.mortonarb.org/">The Morton Arboretum</a></h1>
				<div style="margin:20px;">
					 <p>
						The Morton Arboretum, a 1,700-acre botanical garden of trees and other plants, displays more than 3,300 kinds of plants from throughout the north temperate zone. These living collections are combined with 700 acres of oak woodland, reconstructed prairie, rare species habitat, and wetlands, presenting a showcase of horticultural and native plant diversity. The Arboretum and its staff are actively involved in regional, national and international conservation efforts.
					</p>
					<p>The Morton Arboretum,
					  4100 IL Route 53,
					  Lisle, IL   60532-4293,
					  (630) 968-0074,
					  www.mortonarb.org
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>
</html>