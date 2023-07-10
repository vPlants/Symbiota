<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Contact Us</title>
	<link href="<?php echo $CLIENT_ROOT; ?>/css/base.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo $CLIENT_ROOT; ?>/css/main.css" type="text/css" rel="stylesheet" />
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
        <div  id="innervplantstext">
            <h1>Contact Us</h1>

            <div style="margin:20px;">
            	<p>
				Under construction.
				</p>

				<p>
				The primary contact is <a href="mailto:ahipp@mortonarb.org">Andrew Hipp</a>, The Morton Arboretum.</td>
				</p>

				<p>&nbsp;</p>
				<p>&nbsp;</p>
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