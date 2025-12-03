<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Feedback</title>
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
            <h1><Add header text, if any, here.></h1>
			<div style="margin:20px;">
            	<h1>Feedback Form</h1>
					<p>
					The Feedback form is disabled until we get it fixed.
					</p>
					<p>
					Please e-mail any suggestions or questions to <a href="http://systematics.mortonarb.org/lab">Andrew Hipp</a>, The Morton Arboretum.
					</p>

					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>
					<p>&nbsp; </p>

			</div>
		</div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>