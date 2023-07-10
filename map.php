<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE?>vPlants - State Map</title>
	<link href="<?php echo $CLIENT_ROOT; ?>/css/base.css" type="text/css" rel="stylesheet" />
	<link href="css/main.css" type="text/css" rel="stylesheet" />
	<meta name='keywords' content='' />
	<script type="text/javascript">
		<?php include_once($SERVER_ROOT . '/includes/googleanalytics.php'); ?>
	</script>
</head>
<body>
	<?php
	$displayLeftMenu = "true";
	include($SERVER_ROOT . '/includes/header.php');
	?> 
        <!-- This is inner text! -->
        <div  id="innertext">
            <h1>State Map for Chicago Region</h1>

            <div style="margin:20px;">
            	<p>
				vPlants is centered on the Chicago Region at the southern end of Lake Michigan. The area covers southeastern Wisconsin, northeastern Illinois, northwestern Indiana, and the southwest corner of Michigan. 
				</p>
 
				<p><img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/map_grtlakes.jpg" width="550" height="608" alt="Map of the vPlants Region and western Great Lakes"></p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?> 

</body>
</html>