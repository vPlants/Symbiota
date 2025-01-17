<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - About Us</title>
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
            <h1>About Us: The vPlants Project</h1>

            <div style="margin:20px;">
            	<p>The Morton Arboretum, the Field Museum of Natural History, and the Chicago Botanic Garden developed vPlants (“virtual Plants”) as an online, searchable database to provide free web access to data and digital images of plant specimens collected in the Chicago Region. The project began in January 2001 and was initially funded by the Institute of Museum and Library Services. Chicago Wilderness and the Newman Family Fund also provided support for the project.
				</p>
				<p>vPlants was built using XML-based software that allowed these three founding institutions to pool data from their disparate hardware and database systems. Information housed at each institution was transferred, using XML, into a single web-searchable database at the vPlants portal. At the time it was a nifty system.
				</p>
				<p>In the ensuing years, some of the elements of the vPlants system did not age well. Although the XML-based elements continued to provide very fast database searches, some of the software pieces that connected the system to the web could not be upgraded. This frustrated our users, who found our search engine increasingly unresponsive over time.
				</p>
				<p>In 2015, we moved the vPlants data and static pages to the well tested Symbiota platform  (Gries et al. 2014).
				</p>
				<p>The original vPlants data pool allowed users to search data from 80,000 plant specimens housed in the herbaria of each of the three founding institutions. The data pool also contained digital images for almost 50,000 of those specimens. By associating ourselves with the much larger network of herbaria that use Symbiota and contribute data via SEINet, users of our new and improved vPlants web portal can search data from over 120,000 plant specimens and have access to new tools.
				</p>
				<p>We hope that our participation in this Symbiota-based network is a significant step towards building a larger online portal for plants found throughout the Western Great Lakes Region.
				</p>
            </div>
        </div>

		<div id="content2"><!-- start of side content -->
			<p class="hide">
			<a id="secondary" name="secondary"></a>
			<a href="#sitemenu">Skip to site menu.</a>
			</p>

			<!-- image width is 250 pixels -->

			<img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/feature/south_herb.jpg" width="250" height="225" alt="Older gray metal herbarium cabinets, placed end to end in rows." />
			<div class="box">
			<p>
			Cabinets in the old south herbarium of the Field Museum.
			</p>
			</div>

			<div class="box">
			<h3>Related Pages</h3>

			<p>
			<a href="/pr/species/"
			 title="See prototype description pages and more.">Features in production</a>
			</p>

			<p><!-- Link to acknowledgements, page authors -->

			</p>

			<p>
			<a href="/pr/species/"
			 title="See prototype description pages and more."><img src="<?php echo $CLIENT_ROOT; ?>/images.vplants/feature/prototype_210.jpg" width="210" height="291" alt="Thumbnail image of prototype description page." /></a>
			</p>
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