<?php
include_once('config/symbini.php');
header('Content-Type: text/html; charset='.$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE?>vPlants - Chicago Region</title>
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
	<div  id="innervplantstext">
		<div id="bodywrap">
			<div id="wrapper1"><!-- for navigation and content -->

				<!-- PAGE CONTENT STARTS -->

				<div id="content1wrap"><!--  for content1 only -->
					<div id="content1"><!-- start of primary content -->
						<h1>Why focus on the Chicago Region?</h1>

						<div style="margin:20px;">
							 <p>
							  The Chicago Region, as defined by the vPlants Project, encompasses
							  <a href="map_county.php" title="See County Map for Chicago Region">twenty-four counties</a>
							  from
							  <a href="map.php" title="See State Map for Chicago Region">four states</a> (Illinois, Indiana, Michigan, Wisconsin) surrounding the southern tip of Lake Michigan in the western Great Lakes region of the north central United States.  This area shares a unique set of physiographic (relating to physical geography) and floristic (relating to plant life) features that were defined in many ways by the glacial history of the area.  The watersheds and river systems also play an important role in linking this region together.  In addition to the physical and biologic features of the Chicago Region, this is a key area to focus on due to the existence of the <a href="http://www.chiwild.org/"
							   title="external link.">Chicago Wilderness consortium (external link)</a>.  This unique organization of groups strives to promote, protect, and preserve the rich biota and flora of this same area surrounding the city of Chicago.  One of the standing goals of vPlants is to provide quality data about the plants and fungi that occur in the Chicago Wilderness area at a central location.
							 </p>
							 <p>
							  The geographic and geologic features of the Chicago Region support a diversity of <a href="plants/diversity.php" title="Plant Diversity.">plants</a>, <a href="fungi/diversity.php" title="Fungus Diversity.">fungi</a>, and animals.  The climate effects of Lake Michigan have a huge impact on the natural plant communities, but historic geologic features and events, such as the glaciers, played an even bigger part.  Just as the glaciers played a critical role in the overall development of the physiographic features of the entire Great Lakes region, their influence on the land surrounding the southern tip of Lake Michigan was profound.  An early predecessor to Lake Michigan, Glacial Lake Chicago (14,000 to 12,400 years ago), had complex marshes and drainage systems associated with it that were comparable in size to the Florida Everglades.  Today, the sands deposited by historic dune complexes at that time (the Glenwood Beach / Dunes) and those from the later and larger Lake Algonquin (almost 12,000 years ago, Calumet Beach / Dunes) are striking features in terms of inland topography and soil type relative to today&#39;s lakeshore and current active beach and dunes.  Similarly, the clayey glacial till deposits that remain in the Tinley and Valparaiso Moraine systems (originally created about 15,000 years ago), which skirt the Chicago Region have shaped the area&#39;s flora and biota.  The Chicago Region meshes different floristic zones from the north, east, and west, and is also part of major bird and butterfly migration routes.  <cite title="Plants of the Chicago region. 4th ed. Indianapolis: Indiana Academy of Science.">Swink and Wilhelm (1994)</cite> put it elegantly when they said &#8220;it would be difficult to circumscribe another area of the North Temperate Zone with such geologic and physiographic diversity&#8221; and &#8220;our native flora reflects this.&#8221;
							 </p>
							 <p>
							  Learn more about <a href="plants/diversity.php"
							   title="Plant Directory.">Chicago Region plants</a>.
							 </p>

							 <p>
							  Learn more about <a href="fungi/diversity.php"
							   title="Fungus Directory.">Chicago Region fungi</a>.
							 </p>

							 <div id="gomenu">Next &#187; <a href="map.php"
							  title="See State Map for Chicago Region.">State Map</a></div>
						</div>
					</div>
				</div><!-- end of #content1wrap -->

				<div id="content2"><!-- start of side content -->
					<!-- any image width should be 250 pixels -->

					<div class="box">
						<h3>Chicago Region</h3>
					 	<p><img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/map_na.gif" width="210" height="210" alt="Map of North America showing location of Chicago Region." title="Map of North America showing location of Chicago Region."></p>
						<p>
							<img class="float" src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/map_color_box.gif" width="20" height="20" alt="Green Box"> Region covered by vPlants
						</p>
					</div>

					<a href="map.php" title="See State Map for Chicago Region."><img class="border" src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/map_grtlakes_250.jpg" width="250" height="212"
					  alt="The vPlants Region is located within four states at the south end of Lake Michigan."></a>

					<div class="box">
						<h3>Related Web Sites</h3>
						<h4>Encyclopedia of Chicago</h4>
						<ul>
							<li><a href="http://www.encyclopedia.chicagohistory.org/pages/410.php">Ecosystem Evolution</a></li>
							<li><a href="http://www.encyclopedia.chicagohistory.org/pages/974.php">Plant Communities</a></li>
							<li><a href="http://www.encyclopedia.chicagohistory.org/pages/516.php">Glaciation</a></li>
							<li><a href="http://www.encyclopedia.chicagohistory.org/pages/394.php">Dune System</a></li>
							<li><a href="http://www.encyclopedia.chicagohistory.org/pages/1260.php">Topography</a></li>
							<li><a href="http://www.encyclopedia.chicagohistory.org/pages/722.php">Landscape</a></li>
						</ul>
						<h4>The Great Lakes</h4>
						<ul>
							<li><a href="http://www.great-lakes.net/">Great Lakes Information Network</a></li>
							<li><a href="http://www.ucsusa.org/greatlakes/">Great Lakes and Global Warming</a></li>
							<li><a href="http://www.greatlakes.org/">Alliance for the Great Lakes</a></li>
						</ul>
						<h4>Chicago Wilderness</h4>
						<ul>
							<li><a href="http://www.chiwild.org/">Chicago Wilderness Consortium</a></li>
							<li><a href="http://chicagowildernessmag.org/">Chicago Wilderness Magazine</a></li>
							<li><a href="http://www.plantsofconcern.org/">Plants of Concern, NE IL</a></li>
						</ul>
					</div>

					<p class="small">Information provided on this page applies to the Chicago Region and may not be relevant or complete for other regions.</p><p class="small noprint"><a href="disclaimer.php" title="Read Disclaimer.">Disclaimer</a></p>

				</div><!-- end of #content2 -->
			</div><!-- end of #wrapper1 -->
		</div><!-- end of #bodywrap -->
	</div><!-- end of #innervplantstext -->
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>
</html>