<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Partners</title>
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
            <h1>Partners of The vPlants Project</h1>

            <div style="margin:20px;">
            	<p>
				page under construction
				</p>

				<h3><a id="morton" name="morton"
				 href="http://www.mortonarb.org"
				title="Go to this partner web site">The Morton Arboretum</a></h3>
				<p>The Morton Arboretum</p>

				<p>&nbsp;</p>

				<h3><a id="field" name="field"
				 href="http://www.fieldmuseum.org"
				title="Go to this partner web site">The Field Museum</a></h3>
				<p>The Field Museum</p>

				<p>&nbsp;</p>

				<h3><a id="botanic" name="botanic"
				 href="http://www.chicagobotanic.org"
				title="Go to this partner web site">Chicago Botanic Garden</a></h3>
				<p>Chicago Botanic Garden</p>

				<p>&nbsp;</p>

				<h3><a id="additional" name="additional"></a>Additional Partners</h3>

				<h4><a id="inhs" name="inhs"
				 href="http://www.inhs.uiuc.edu"
				title="Go to this partner web site">Illinois Natural History Survey</a></h4>
				<p>Illinois Natural History Survey</p>

				<p>&nbsp;</p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>