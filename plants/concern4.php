<?php
//error_reporting(E_ALL);
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Topics - Protection</title>
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
            <h1>Protection</h1>

            <div style="margin:20px;">
            	<!-- Laws and preserves -->
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
            </div>
        </div>

		<div id="content2">

			<div class="box document">
			<h3>....</h3>
			<ul><li>
			....
			</li></ul>
			</div>

			<div class="box external">
			<h3>....</h3>
			<ul>
			<li>
			....
			</li>
			</ul>
			</div>

			<p class="small">Information provided on this page applies to the Chicago Region and may not be relevant or complete for other regions.</p><p class="small noprint"><a href="<?php echo $CLIENT_ROOT; ?>/disclaimer.php" title="Read Disclaimer.">Disclaimer</a></p>

		</div><!-- end of #content2 -->

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>