<?php
include_once('../config/symbini.php');
include_once($SERVER_ROOT.'/classes/ChecklistManager.php');
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/checklists/clgmap.' . $LANG_TAG . '.php')) include_once($SERVER_ROOT . '/content/lang/checklists/clgmap.en.php');
else include_once($SERVER_ROOT.'/content/lang/checklists/clgmap.' . $LANG_TAG . '.php');
header("Content-Type: text/html; charset=".$CHARSET);

$pid = filter_var($_REQUEST['pid'], FILTER_SANITIZE_NUMBER_INT);

$clManager = new ChecklistManager();
$clManager->setProj($pid);

$shouldUseMinimalMapHeader = $SHOULD_USE_MINIMAL_MAP_HEADER ?? false;
?>
<!DOCTYPE html>
<html lang="<?php echo $LANG_TAG ?>">
   <head>
		<?php
		include_once($SERVER_ROOT.'/includes/leafletMap.php');
		include_once($SERVER_ROOT.'/includes/googleMap.php');
		?>
		<title><?= $DEFAULT_TITLE . ' - ' . $LANG['TITLE'] ?></title>

		<script type="text/javascript">

         let infoWins = new Array();
         let checklists;
         let pid;

         function navigateToCheckList(clid, pid) {
            window.location.href = `../ident/key.php?clid=${clid}&pid=${pid}&taxon=All+Species`;
         }

         function leafletInit() {
            let map = new LeafletMap('map_canvas');
            const markers = [];

            for(let checklistId of Object.keys(checklists)) {
               const checklist = checklists[checklistId];
               const latlng = [parseFloat(checklist.lat), parseFloat(checklist.lng)];
               markers.push(L.marker(latlng)
                  .bindTooltip(checklist.name)
                  .bindPopup(`<div style=\'width:300px;\'>
                     <b>${checklist.name}</b><br/><?= $LANG['DOUBLE_CLICK'] ?>
                     </div>`)
                  .on('dblclick', () => navigateToCheckList(checklistId, pid)));
            }
            const markerGroup = L.featureGroup(markers).addTo(map.mapLayer);
            map.mapLayer.fitBounds(markerGroup.getBounds());
         }

         function googleInit() {

            let map = new GoogleMap('map_canvas');
		      let bounds = new google.maps.LatLngBounds();
            let infoWins = new Array();

			   function closeAllInfoWins(){
				   for(let w = 0; w < infoWins.length; w++ ) {
					   let win = infoWins[w];
					   win.close();
				   }
			   }

            for(let checklistId of Object.keys(checklists)) {
               const checklist = checklists[checklistId];
               let coord = new google.maps.LatLng(parseFloat(checklist.lat), parseFloat(checklist.lng));
               bounds.extend(coord);

               let m = new google.maps.Marker({
                  position: coord,
                  map: map.mapLayer,
                  title: checklist.name,
               })
               const infoWin = new google.maps.InfoWindow({
                  content: `<div style=\'width:300px;\'>
                     <b>${checklist.name}</b><br/><?= $LANG['DOUBLE_CLICK'] ?>
                  </div>`
               });

               infoWins.push(infoWin);

               google.maps.event.addListener(m, 'click', function(e){
                  closeAllInfoWins();
                  infoWin.open(map.mapLayer, m);
               });

               google.maps.event.addListener(m, "dblclick", function(){
                 closeAllInfoWins();
                 m.setAnimation(google.maps.Animation.BOUNCE);
                 navigateToCheckList(checklistId, pid);
               });
            }

            map.mapLayer.fitBounds(bounds);
         }

			function initialize(){
            //Try to Load Server Data from HTML Data Attributes
            try {
               const data = document.getElementById('service-container');
               pid = data.getAttribute('data-pid');
               checklists = JSON.parse(data.getAttribute('data-checklists'));
            } catch (err) {
               alert("<?= $LANG['FAILED_TO_LOAD'] ?>");
            }

            <?php if(empty($GOOGLE_MAP_KEY)) { ?>
               leafletInit();
            <?php } else { ?>
               googleInit();
            <?php } ?>
			}
		</script>
		<style>
			html, body, #map_canvas {
				width: 100%;
				height: 100%;
				margin: 0;
				padding: 0;
			}
			.screen-reader-only {
				position: absolute;
				left: -10000px;
			}
		</style>
	</head>
	<body style="background-color:#ffffff;" onload="initialize()">
		<?php
		// if($shouldUseMinimalMapHeader) include_once($SERVER_ROOT . '/includes/minimalheader.php');
		?>
		<h1 class="page-heading screen-reader-only" style="margin-top:30px;">Checklist Map</h1>
		<div id="map_canvas"></div>
		<div id="service-container"
			class="service-container"
			data-checklists="<?= htmlspecialchars(json_encode($clManager->getResearchPoints()))?>"
			data-pid="<?= $pid ?>"></div>
	</body>
</html>
