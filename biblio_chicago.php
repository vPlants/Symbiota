<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Chicago References</title>
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
            <h1>Chicago References</h1>

            <div style="margin:20px;">
            	<p>
				Under construction
				</p>

				<!--

				<p>
				 list of published bibliographic references
				</p>
				<dl>

				<dt>Author, a. b. 1900.</dt>
				<dd><em>book.</em> pub.</dd>

				</dl>
				 -->
				<p>&nbsp;</p>
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

		<div id="content2"><!-- start of side content -->
			<p class="hide">
			<a id="secondary" name="secondary"></a>
			<a href="#sitemenu">Skip to site menu.</a>
			</p>

			<!-- image width is 250 pixels -->
			<div class="box">

			<p>A father said to his son, <br />
			<q>When Abe Lincoln was your age, he was
			studying books by the light of the fireplace.</q>
			</p><p>
			The son replied, <br />
			<q>When Lincoln was your age, <br />
			he was President.</q></p>
			</div>


			<p class="small">
			Information provided on this page applies to the Chicago Region and may not be relevant or complete for other regions.</p>
			<p class="small">
			<a class="popup" href="/disclaimer.html"
			title="Read Disclaimer [opens new window]."
			onclick="window.open(this.href, 'disclaimer',
			'width=500,height=350,resizable,top=100,left=100');
			return false;"
			onkeypress="window.open(this.href, 'disclaimer',
			'width=500,height=350,resizable,top=100,left=100');
			return false;">Disclaimer</a>
			</p>

		</div><!-- end of #content2 -->

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>