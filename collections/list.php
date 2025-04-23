<?php
include_once('../config/symbini.php');
include_once($SERVER_ROOT . '/classes/TaxonomyEditorManager.php');
include_once($SERVER_ROOT . '/classes/OccurrenceListManager.php');
if ($LANG_TAG != 'en' && file_exists($SERVER_ROOT . '/content/lang/collections/list.' . $LANG_TAG . '.php'))
	include_once($SERVER_ROOT . '/content/lang/collections/list.' . $LANG_TAG . '.php');
else include_once($SERVER_ROOT . '/content/lang/collections/list.en.php');
header("Content-Type: text/html; charset=" . $CHARSET);

$taxonFilter = array_key_exists('taxonfilter', $_REQUEST) ? filter_var($_REQUEST['taxonfilter'], FILTER_SANITIZE_NUMBER_INT) : 0;
$targetTid = array_key_exists('targettid', $_REQUEST) ? filter_var($_REQUEST['targettid'], FILTER_SANITIZE_NUMBER_INT) : '';
$tabIndex = array_key_exists('tabindex', $_REQUEST) ? filter_var($_REQUEST['tabindex'], FILTER_SANITIZE_NUMBER_INT) : 1;
$cntPerPage = array_key_exists('cntperpage', $_REQUEST) ? filter_var($_REQUEST['cntperpage'], FILTER_SANITIZE_NUMBER_INT) : 100;
$pageNumber = array_key_exists('page', $_REQUEST) ? filter_var($_REQUEST['page'], FILTER_SANITIZE_NUMBER_INT) : 1;
$datasetid = array_key_exists('datasetid', $_REQUEST) ? filter_var($_REQUEST['datasetid'], FILTER_SANITIZE_NUMBER_INT) : '';
$sortField1 = array_key_exists('sortfield1', $_REQUEST) ? $_REQUEST['sortfield1'] : '';
$sortField2 = array_key_exists('sortfield2', $_REQUEST) ? $_REQUEST['sortfield2'] : '';
$sortOrder = !empty($_REQUEST['sortorder']) ? 'desc' : '';
$comingFrom =  (array_key_exists('comingFrom', $_REQUEST) ? $_REQUEST['comingFrom'] : '');
if ($comingFrom != 'harvestparams' && $comingFrom != 'newsearch') {
	//If not set via a valid input variable, use setting set within symbini
	$comingFrom = !empty($SHOULD_USE_HARVESTPARAMS) ? 'harvestparams' : 'newsearch';
}

$_SESSION['datasetid'] = filter_var($datasetid, FILTER_SANITIZE_NUMBER_INT);

$collManager = new OccurrenceListManager();
$searchVar = $collManager->getQueryTermStr();
if ($targetTid && array_key_exists('mode', $_REQUEST)) $searchVar .= '&mode=voucher&targettid=' . $targetTid;
$searchVar .= '&comingFrom=' . $comingFrom;
if ($sortField1) {
	$searchVar .= '&sortfield1=' . htmlspecialchars($sortField1, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) . '&sortorder=' . $sortOrder;
	if ($sortField2) {
		$searchVar .= '&sortfield2=' . htmlspecialchars($sortField2, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE);
		$collManager->addSort($sortField2, $sortOrder);
	}
	$collManager->addSort($sortField1, $sortOrder);
}

$occurArr = $collManager->getSpecimenMap($pageNumber, $cntPerPage);

$_SESSION['citationvar'] = $searchVar;

?>
<!DOCTYPE html>
<html lang="<?php echo $LANG_TAG ?>">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $CHARSET; ?>">
	<title><?php echo $DEFAULT_TITLE . ' ' . $LANG['PAGE_TITLE']; ?></title>
	<?php
	include_once($SERVER_ROOT . '/includes/head.php');
	include_once($SERVER_ROOT . '/includes/googleanalytics.php');
	?>
	<link href="<?= $CSS_BASE_PATH; ?>/symbiota/collections/list.css?ver=1" type="text/css" rel="stylesheet" />
	<link href="<?php echo $CSS_BASE_PATH; ?>/jquery-ui.min.css" type="text/css" rel="stylesheet">
	<script src="<?php echo $CLIENT_ROOT; ?>/js/jquery-3.7.1.min.js" type="text/javascript"></script>
	<script src="<?php echo $CLIENT_ROOT; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		let urlQueryStr = "<?php if ($searchVar) echo $searchVar . '&page=' . $pageNumber; ?>";

		$(document).ready(function() {
			<?php
			if ($searchVar) {
			?>
				sessionStorage.querystr = "<?php echo $searchVar; ?>";
			<?php
			}
			?>

			$('#tabs').tabs({
				active: <?= $tabIndex; ?>,
				beforeLoad: function(event, ui) {
					$(ui.panel).html("<p>Loading...</p>");
				}
			});
		});

		function validateOccurListForm(f) {
			if (f.targetdatasetid.value == "") {
				alert("<?= $LANG['SELECT_DATASET'] ?>");
				return false;
			}
			return true;
		}

		function hasSelectedOccid(f) {
			var isSelected = false;
			for (var h = 0; h < f.length; h++) {
				if (f.elements[h].name == "occid[]" && f.elements[h].checked) {
					isSelected = true;
					break;
				}
			}
			if (!isSelected) {
				alert("<?= $LANG['SELECT_OCCURRENCE'] ?>");
				return false;
			}
			return true;
		}

		function displayDatasetTools() {
			$('.dataset-div').toggle();
			document.getElementById("dataset-tools").scrollIntoView({
				behavior: 'smooth'
			});
		}
	</script>
	<script src="../js/symb/collections.list.js?ver=5" type="text/javascript"></script>
	<script src="../js/symb/shared.js?ver=1" type="text/javascript"></script>
</head>

<body>
	<?php
	$displayLeftMenu = (isset($collections_listMenu) ? $collections_listMenu : false);
	include($SERVER_ROOT . '/includes/header.php');
	if (isset($collections_listCrumbs)) {
		if ($collections_listCrumbs) {
			echo '<div class="navpath">';
			echo '<a href="../index.php">' . $LANG['NAV_HOME'] . '</a> &gt;&gt; ';
			echo $collections_listCrumbs . ' &gt;&gt; ';
			echo '<b>' . $LANG['NAV_SPECIMEN_LIST'] . '</b>';
			echo '</div>';
		}
	} else {
		echo '<div class="navpath">';
		echo '<a href="../index.php">' . $LANG['NAV_HOME'] . '</a> &gt;&gt; ';
		if ($comingFrom == 'harvestparams') {
			echo '<a href="index.php">' . $LANG['NAV_COLLECTIONS'] . '</a> &gt;&gt; ';
			echo '<a href="' . $CLIENT_ROOT . '/collections/harvestparams.php">' . $LANG['NAV_SEARCH'] . '</a> &gt;&gt; ';
		} else {
			echo '<a href="' . $CLIENT_ROOT . '/collections/search/index.php">' . $LANG['NAV_SEARCH'] . '</a> &gt;&gt; ';
		}
		echo '<b>' . $LANG['NAV_SPECIMEN_LIST'] . '</b>';
		echo '</div>';
	}
	?>
	<!-- This is inner text! -->
	<div role="main" id="innertext">
		<h1 class="page-heading screen-reader-only"><?php echo $LANG['SEARCH_RES_LIST']; ?></h1>
		<div id="tabs" class="top-breathing-room-rel" style="margin-bottom: 1rem">
			<ul>
				<li>
					<a id="taxatablink" href="<?= 'checklist.php?' . $searchVar . '&taxonfilter=' . $taxonFilter ?>">
						<span><?php echo $LANG['TAB_CHECKLIST']; ?></span>
					</a>
				</li>
				<li>
					<a href="#speclist">
						<span><?php echo $LANG['TAB_OCCURRENCES']; ?></span>
					</a>
				</li>
				<li>
					<a href="#maps">
						<span><?php echo $LANG['TAB_MAP']; ?></span>
					</a>
				</li>
			</ul>
			<div id="speclist">
				<div id="queryrecords">
					<div style="float:right;">
						<?php
						if ($SYMB_UID) {
						?>
							<span>
								<button class="icon-button" onclick="displayDatasetTools()" aria-label="<?= $LANG['DATASET_MANAGEMENT'] ?>" title="<?= $LANG['DATASET_MANAGEMENT'] ?>">
									<svg style="width:1.3em;height:1.3em;" alt="<?php echo $LANG['IMG_DATASET_MANAGEMENT']; ?>" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
										<path d="M280-280h160v-160H280v160Zm240 0h160v-160H520v160ZM280-520h160v-160H280v160Zm240 0h160v-160H520v160ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
									</svg>
								</button>
							</span>
						<?php
						}
						?>
						<span>
							<button class="icon-button" onclick="toggleElement('#sort-div', 'block')" title="<?= $LANG['DISPLAY_SORT'] ?>" aria-label="<?= $LANG['DISPLAY_SORT'] ?>">
								<img src="<?= $CLIENT_ROOT ?>/images/sort-cream.svg" style="width:1.3em;height:1.3em" alt="<?= $LANG['DISPLAY_SORT'] ?>">
							</button>
						</span>
						<span>
							<form class="button-form" action="listtabledisplay.php" method="post">
								<input name="comingFrom" type="hidden" value="<?= $comingFrom; ?>" />
								<input name="sortfield1" type="hidden" value="<?= htmlspecialchars($sortField1, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE); ?>" />
								<input name="sortfield2" type="hidden" value="<?= htmlspecialchars($sortField2, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE); ?>" />
								<input name="sortorder" type="hidden" value="<?= $sortOrder ?>" />
								<input name="searchvar" type="hidden" value="<?php echo $searchVar ?>" />
								<button class="icon-button" aria-label="<?= $LANG['TABLE_DISPLAY'] ?>" title="<?= $LANG['TABLE_DISPLAY'] ?>">
									<svg style="width:1.3em;height:1.3em" alt="<?= $LANG['IMG_TABLE_DISPLAY'] ?>" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
										<path d="M120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200Zm80-400h560v-160H200v160Zm213 200h134v-120H413v120Zm0 200h134v-120H413v120ZM200-400h133v-120H200v120Zm427 0h133v-120H627v120ZM200-200h133v-120H200v120Zm427 0h133v-120H627v120Z" />
									</svg>
								</button>
							</form>
						</span>
						<span>
							<form class="button-form" action="download/index.php" method="post" onsubmit="targetPopup(this)">
								<button class="icon-button" aria-label="<?= $LANG['DOWNLOAD_SPECIMEN_DATA'] ?>" title="<?= $LANG['DOWNLOAD_SPECIMEN_DATA'] ?>">
									<svg style="width:1.3em;height:1.3em" alt="<?= $LANG['IMG_DWNL_DATA'] ?>" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
										<path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
									</svg>
								</button>
								<input name="searchvar" type="hidden" value="<?= $searchVar ?>" />
								<input name="dltype" type="hidden" value="specimen" />
							</form>
						</span>
						<span>
							<button class="icon-button" onclick="copyUrl()" aria-label="<?= $LANG['COPY_TO_CLIPBOARD'] ?>" title="<?= $LANG['COPY_TO_CLIPBOARD'] ?>">
								<svg style="width:1.3em;height:1.3em" alt="<?= $LANG['IMG_COPY']; ?>" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
									<path d="M440-280H280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680h160v80H280q-50 0-85 35t-35 85q0 50 35 85t85 35h160v80ZM320-440v-80h320v80H320Zm200 160v-80h160q50 0 85-35t35-85q0-50-35-85t-85-35H520v-80h160q83 0 141.5 58.5T880-480q0 83-58.5 141.5T680-280H520Z" />
								</svg>
							</button>
						</span>
					</div>
					<div style="margin:5px;">
						<?php
						$collSearchStr = $collManager->getCollectionSearchStr();
						if (strlen($collSearchStr) > 100) {
							$collSearchArr = explode('; ', $collSearchStr);
							$collSearchStr = '';
							$cnt = 0;
							while ($collElem = array_shift($collSearchArr)) {
								$collSearchStr .= $collElem . '; ';
								if ($cnt == 10 && $collSearchArr) {
									$collSearchStr = trim($collSearchStr, '; ') . '<span class="inst-span">... (<a href="#" onclick="$(\'.inst-span\').toggle();return false;">' . $LANG['SHOW_ALL'] . '</a>)</span><span class="inst-span" style="display:none">; ';
								}
								$cnt++;
							}
							if ($cnt > 11) $collSearchStr .= '</span>';
						}
						echo '<div><b>' . $LANG['DATASET'] . ':</b> ' . $collSearchStr . '</div>';
						if ($taxaSearchStr = $collManager->getTaxaSearchStr()) {
							if (strlen($taxaSearchStr) > 300) $taxaSearchStr = substr($taxaSearchStr, 0, 300) . '<span class="taxa-span">... (<a href="#" onclick="$(\'.taxa-span\').toggle();return false;">' . $LANG['SHOW_ALL'] . '</a>)</span><span class="taxa-span" style="display:none;">' . substr($taxaSearchStr, 300) . '</span>';
							echo '<div><b>' . $LANG['TAXA'] . ':</b> ' . $taxaSearchStr . '</div>';
						}
						if ($associationSearchStr = $collManager->getAssociationSearchStr()) {
							if (strlen($associationSearchStr) > 300) $associationSearchStr = substr($associationSearchStr, 0, 300) . '<span class="taxa-span">... (<a href="#" onclick="$(\'.association-span\').toggle();return false;">' . $LANG['SHOW_ALL'] . '</a>)</span><span class="association-span" style="display:none;">' . substr($taxaSearchStr, 300) . '</span>'; // @TODO wouldn't this truncate in either case?
							echo '<div><b>' . $LANG['ASSOCIATIONS'] . ':</b> ' . $associationSearchStr . '</div>';
						}
						if ($localSearchStr = $collManager->getLocalSearchStr()) {
							echo '<div><b>' . $LANG['SEARCH_CRITERIA'] . ':</b> ' . $localSearchStr . '</div>';
							$_SESSION['datasetName'] = $localSearchStr;
						}
						?>
					</div>
					<div id="sort-div" style="display:<?= ($sortField1 ? 'block' : 'none') ?>">
						<section class="fieldset-like">
							<h3><span><?= $LANG['SORT'] ?></span></h3>
							<form name="sortform" action="list.php" method="post">
								<div id="sort-inner-div">
									<div>
										<label for="sortfield1"><?= $LANG['SORT_BY'] ?>:</label>
										<select name="sortfield1" id="sortfield1">
											<option value=""></option>
											<?php
											$sortFields = array(
												'c.collectionname' => $LANG['COLLECTION'],
												'o.catalogNumber' => $LANG['CATALOG_NUMBER'],
												'o.family' => $LANG['FAMILY'],
												'o.sciname' => $LANG['SCINAME'],
												'o.recordedBy' => $LANG['COLLECTOR'],
												'o.recordNumber' => $LANG['NUMBER'],
												'o.eventDate' => $LANG['EVENT_DATE'],
												'o.country' => $LANG['COUNTRY'],
												'o.StateProvince' => $LANG['STATE_PROVINCE'],
												'o.county' => $LANG['COUNTY'],
												'o.minimumElevationInMeters' => $LANG['ELEVATION']
											);
											foreach ($sortFields as $k => $v) {
												echo '<option value="' . $k . '" ' . ($k == $sortField1 ? 'SELECTED' : '') . '>' . $v . '</option>';
											}
											?>
										</select>
									</div>
									<div>
										<label for="sortfield2"><?= $LANG['SORT_THEN_BY'] ?>:</label>
										<select name="sortfield2" id="sortfield2">
											<option value=""></option>
											<?php
											foreach ($sortFields as $k => $v) {
												echo '<option value="' . $k . '" ' . ($k == $sortField2 ? 'SELECTED' : '') . '>' . $v . '</option>';
											}
											?>
										</select>
									</div>
									<div>
										<label for="sortorder"> <?= $LANG['SORT_ORDER'] ?>: </label>
										<select id="sortorder" name="sortorder">
											<option value=""><?= $LANG['SORT_ASCENDING'] ?></option>
											<option value="desc" <?= ($sortOrder == "desc" ? 'SELECTED' : ''); ?>><?= $LANG['SORT_DESCENDING'] ?></option>
										</select>
									</div>
									<div>
										<input name="searchvar" type="hidden" value="<?= $searchVar ?>">
										<button name="formsubmit" type="submit"><?= $LANG['SORT'] ?></button>
									</div>
								</div>
							</form>
						</section>
					</div>
					<div style="clear:both;"></div>
					<?php
					$paginationStr = '<div><div style="clear:both;"><hr/></div><div style="float:left;margin:5px;">';
					$lastPage = (int)($collManager->getRecordCnt() / $cntPerPage) + 1;
					$startPage = ($pageNumber > 5 ? $pageNumber - 5 : 1);
					$endPage = ($lastPage > $startPage + 10 ? $startPage + 10 : $lastPage);
					$pageBar = '';
					if ($startPage > 1) {
						$pageBar .= '<span class="pagination" style="margin-right:5px;"><a href="list.php?' . $searchVar . '" >' . $LANG['PAGINATION_FIRST'] . '</a></span>';
						$pageBar .= '<span class="pagination" style="margin-right:5px;"><a href="list.php?' . $searchVar . '&page=' . (($pageNumber - 10) < 1 ? 1 : $pageNumber - 10) . '">&lt;&lt;</a></span>';
					}
					for ($x = $startPage; $x <= $endPage; $x++) {
						if ($pageNumber != $x) {
							$pageBar .= '<span class="pagination" style="margin-right:3px;margin-right:3px;"><a href="list.php?' . $searchVar . '&page=' . $x . '">' . $x . '</a></span>';
						} else {
							$pageBar .= '<span class="pagination" style="margin-right:3px;margin-right:3px;font-weight:bold;">' . $x . '</span>';
						}
					}
					if (($lastPage - $startPage) >= 10) {
						$pageBar .= '<span class="pagination" style="margin-left:5px;"><a href="list.php?' . $searchVar . '&page=' . (($pageNumber + 10) > $lastPage ? $lastPage : ($pageNumber + 10)) . '">&gt;&gt;</a></span>';
						$pageBar .= '<span class="pagination" style="margin-left:5px;"><a href="list.php?' . $searchVar . '&page=' . $lastPage . '">Last</a></span>';
					}
					$pageBar .= '</div><div style="float:right;margin:5px;">';
					$beginNum = ($pageNumber - 1) * $cntPerPage + 1;
					$endNum = $beginNum + $cntPerPage - 1;
					if ($endNum > $collManager->getRecordCnt()) $endNum = $collManager->getRecordCnt();
					$pageBar .= $LANG['PAGINATION_PAGE'] . ' ' . $pageNumber . ', ' . $LANG['PAGINATION_RECORDS'] . ' ' . $beginNum . '-' . $endNum . ' ' . $LANG['PAGINATION_OF'] . ' ' . $collManager->getRecordCnt();
					$paginationStr .= $pageBar;
					$paginationStr .= '</div><div style="clear:both;"><hr/></div></div>';
					echo $paginationStr;

					//Add search return
					if ($occurArr) {
					?>
						<form name="occurListForm" method="post" action="datasets/datasetHandler.php" onsubmit="return validateOccurListForm(this)" target="_blank">
							<?php include('datasetinclude.php'); ?>
							<table id="omlisttable">
								<?php
								$permissionArr = array();
								if (array_key_exists('CollAdmin', $USER_RIGHTS)) $permissionArr = $USER_RIGHTS['CollAdmin'];
								if (array_key_exists('CollEditor', $USER_RIGHTS)) $permissionArr = array_merge($permissionArr, $USER_RIGHTS['CollEditor']);
								foreach ($occurArr as $occid => $fieldArr) {
									$collId = $fieldArr['collid'];
									$taxonEditorObj = new TaxonomyEditorManager();
									$taxonEditorObj->setTid($fieldArr['tid']);
									$taxonEditorObj->setTaxon();
									$splitSciname = $taxonEditorObj->splitSciname();
									$author = !empty($splitSciname['author']) ? ($splitSciname['author'] . ' ') : '';
									$cultivarEpithet = !empty($splitSciname['cultivarEpithet']) ? ($taxonEditorObj->standardizeCultivarEpithet($splitSciname['cultivarEpithet'])) . ' ' : '';
									$tradeName = !empty($splitSciname['tradeName']) ? ($taxonEditorObj->standardizeTradeName($splitSciname['tradeName']) . ' ') : '';
									$nonItalicizedScinameComponent = $author . $cultivarEpithet . $tradeName;
									echo '<tr><td width="60" valign="top" align="center">';
									echo '<a href="misc/collprofiles.php?collid=' . $fieldArr['collid'] . '">';
									if ($fieldArr["icon"]) {
										$icon = (substr($fieldArr["icon"], 0, 6) == 'images' ? '../' : '') . $fieldArr["icon"];
										echo '<img align="bottom" src="' . $icon . '" style="width:35px;border:0px;" />';
									}
									echo '</a>';
									echo '<div style="font-weight:bold;font-size:75%;">';
									$instCode = $fieldArr["instcode"];
									if ($fieldArr["collcode"]) $instCode .= ":" . $fieldArr["collcode"];
									echo $instCode;
									echo '</div>';
									echo '<div style="margin-top:10px"><span class="dataset-div checkbox-elem" style="display:none;"><input name="occid[]" type="checkbox" value="' . $occid . '" /></span></div>';
									echo '</td><td>';
									if ($IS_ADMIN || in_array($fieldArr['collid'], $permissionArr) || ($SYMB_UID && $SYMB_UID == $fieldArr['obsuid'])) {
										echo '<div style="float:right;" title="' . $LANG['OCCUR_EDIT_TITLE'] . '">';
										echo '<a href="editor/occurrenceeditor.php?occid=' . $occid . '" target="_blank">';
										echo '<img src="../images/edit.png" style="width:1.3em" alt="' . $LANG['IMG_EDIT_OCC'] . '" /></a></div>';
									}
									if (isset($fieldArr['has_audio']) && $fieldArr['has_audio']) {
										echo '<div style="float:right; padding-right: 0.5rem"><img style="width:1.3rem; border: 0" src="' . $CLIENT_ROOT . '/images/speaker_thumbnail.png' . '"/></div>';
									}
									$targetClid = $collManager->getSearchTerm("targetclid");
									if (isset($fieldArr['has_image']) && $fieldArr['has_image']) {
										echo '<div style="float:right;margin:5px 25px;">';
										echo '<a href="#" onclick="return openIndPU(' . $occid . ',' . ($targetClid ? $targetClid : "0") . ');">';
										echo '<img src="' . $fieldArr['media']['thumbnail'] . '" style="height:70px" alt="' . (isset($LANG['IMG_OCC']) ? $LANG['IMG_OCC'] : 'Image Associated With the Occurence') . '"/></a></div>';
									}
									if ($collManager->getClName() && $targetTid && array_key_exists('mode', $_REQUEST)) {
										echo '<div style="float:right;" >';
										echo '<a href="#" onclick="addVoucherToCl(' . $occid . ',' . $targetClid . ',' . $targetTid . ');return false" title="' . $LANG['VOUCHER_LINK_TITLE'] . ' ' . $collManager->getClName() . ';">';
										echo '<img src="../images/voucheradd.png" style="border:solid 1px gray;height:1.3em;margin-right:5px;" alt="' . $LANG['IMG_ADD_VOUCHER'] . '"/></a></div>';
									}
									if (isset($fieldArr['media']) && isset($fieldArr['media']['thumbnailurl'])) {
										echo '<div style="float:right;margin:5px 25px;">';
										echo '<a href="#" onclick="return openIndPU(' . $occid . ',' . ($targetClid ? $targetClid : "0") . ');">';
										echo '<img src="' . $fieldArr['media']['thumbnailurl'] . '" style="height:70px" alt="' . $LANG['IMG_OCC'] . '"/></a></div>';
									}
									echo '<div style="margin:4px;">';


									if (isset($fieldArr['sciname'])) {
										$sciStr = '<span style="font-style:italic;">' . $fieldArr['sciname'] . '</span>';
										if (isset($fieldArr['author']) && $fieldArr['author']) $sciStr .= ' ' . $fieldArr['author'];
										if (isset($fieldArr['tid']) && $fieldArr['tid']) {
											$sciStr = '<a target="_blank" href="../taxa/index.php?tid=' . strip_tags($fieldArr['tid']) . '">'
												. '<i> ' . strip_tags($splitSciname['base']) . '</i>'
												. (!empty($nonItalicizedScinameComponent) ? (' ' . $nonItalicizedScinameComponent) : '') . '</a>';
										}
										echo $sciStr;
									} elseif ($fieldArr['localitysecurity'] > 1) {
										echo (isset($LANG['ID_PROTECTED']) ? $LANG['ID_PROTECTED'] : 'Identification Protected');;
									}
									echo '</div>';
									echo '<div style="margin:4px">';
									echo '<span style="width:150px;">' . $fieldArr["catnum"] . '</span>';
									echo '<span style="width:200px;margin-left:30px;">' . $fieldArr["collector"] . '&nbsp;&nbsp;&nbsp;' . (isset($fieldArr["collnum"]) ? $fieldArr["collnum"] : '') . '</span>';
									if (isset($fieldArr["date"])) echo '<span style="margin-left:30px;">' . $fieldArr["date"] . '</span>';
									echo '</div><div style="margin:4px">';
									$localStr = '';
									if ($fieldArr["country"]) $localStr .= $fieldArr["country"];
									if ($fieldArr["state"]) $localStr .= ', ' . $fieldArr["state"];
									if ($fieldArr["county"]) $localStr .= ', ' . $fieldArr["county"];
									if ($fieldArr['locality'] == 'PROTECTED') {
										$localStr .= ', <span style="color:red;">' . $LANG['PROTECTED'] . '</span>';
									} else {
										if ($fieldArr['locality']) $localStr .= ', ' . $fieldArr['locality'];
										if ($fieldArr['declat']) $localStr .= ', ' . $fieldArr['declat'] . ' ' . $fieldArr['declong'];
										if (isset($fieldArr['elev']) && $fieldArr['elev']) $localStr .= ', ' . $fieldArr['elev'] . 'm';
									}
									$localStr = trim($localStr, ' ,');
									echo $localStr;
									echo '</div><div style="margin:4px">';
									echo '<b><a href="#" onclick="return openIndPU(' . $occid . ',' . ($targetClid ? $targetClid : "0") . ');">' . $LANG['FULL_DETAILS'] . '</a></b>';
									echo '</div></td></tr><tr><td colspan="2"><hr/></td></tr>';
								}
								?>
							</table>
						</form>
					<?php
						echo $paginationStr;
						echo '<hr/>';
					} else {
						echo '<div><h3>' . $LANG['NO_RESULTS'] . '</h3>';
						$tn = $collManager->getTaxaSearchStr();
						if ($p = strpos($tn, ';')) {
							$tn = substr($tn, 0, $p);
						}
						if ($p = strpos($tn, '=>')) {
							$tn = substr($tn, $p + 2);
						}
						if ($p = strpos($tn, '(')) {
							$tn = substr($tn, 0, $p);
						}
						if ($closeArr = $collManager->getCloseTaxaMatch($tn)) {
							echo '<div style="margin: 40px 0px 200px 20px;font-weight:bold;">';
							echo $LANG['PERHAPS_LOOKING_FOR'] . ' ';
							$outStr = '';
							$actionPage = $comingFrom === 'newsearch' ? 'search/index' : 'harvestparams';
							foreach ($closeArr as $v) {
								$outStr .= '<a href="' . $actionPage  . '.php?taxa=' . $v . '">' . $v . '</a>, ';
							}
							echo trim($outStr, ' ,');
							echo '</div>';
						}
						echo '</div>';
					}
					?>
				</div>
			</div>
			<div id="maps" style="min-height:400px;margin-bottom:10px;">
				<form action="download/index.php" method="post" style="float:right" onsubmit="targetPopup(this)">
					<button class="icon-button" aria-label="<?= $LANG['DOWNLOAD_SPECIMEN_DATA'] ?>" title="<?= $LANG['DOWNLOAD_SPECIMEN_DATA'] ?>">
						<svg style="width:1.3em" alt="<?= $LANG['IMG_DWNL_DATA']; ?>" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
							<path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
						</svg>
					</button>
					<input name="searchvar" type="hidden" value="<?php echo $searchVar; ?>" />
					<input name="dltype" type="hidden" value="georef" />
				</form>

				<div style='margin-top:10px;'>
					<h2><?php echo $LANG['MAP_HEADER']; ?></h2>
				</div>
				<div>
					<?php echo $LANG['MAP_DESCRIPTION']; ?>
				</div>
				<div style='margin-top:10px;'>
						<button onclick="openMapPU('<?= $searchVar ?>');">
						<?php echo $LANG['MAP_DISPLAY']; ?>
					</button>
				</div>
				<div style='margin-top:10px;'>
					<h2><?php echo $LANG['KML_HEADER']; ?></h2>
				</div>
				<form name="kmlform" action="map/kmlhandler.php" method="post">
					<div>
						<?php echo $LANG['KML_DESCRIPTION']; ?>
					</div>
					<div style="margin:10px 0;">
						<input name="searchvar" type="hidden" value="<?php echo $searchVar; ?>" />
						<button name="formsubmit" type="submit" value="createKML"><?php echo $LANG['CREATE_KML']; ?></button>
					</div>
					<div>
						<a href="#" onclick="toggleFieldBox('fieldBox');">
							<?php echo $LANG['KML_EXTRA']; ?>
						</a>
					</div>
					<div id="fieldBox" style="display:none;">
						<fieldset>
							<?php
							$occFieldArr = array(
								'occurrenceid',
								'identifiedby',
								'dateidentified',
								'identificationreferences',
								'identificationremarks',
								'taxonremarks',
								'recordedby',
								'recordnumber',
								'associatedcollectors',
								'eventdate',
								'year',
								'month',
								'day',
								'verbatimeventdate',
								'habitat',
								'substrate',
								'occurrenceremarks',
								'associatedtaxa',
								'verbatimattributes',
								'reproductivecondition',
								'cultivationstatus',
								'establishmentmeans',
								'lifestage',
								'sex',
								'individualcount',
								'samplingprotocol',
								'preparations',
								'country',
								'stateprovince',
								'county',
								'municipality',
								'locality',
								'locationremarks',
								'coordinateuncertaintyinmeters',
								'verbatimcoordinates',
								'georeferencedby',
								'georeferenceprotocol',
								'georeferencesources',
								'georeferenceverificationstatus',
								'georeferenceremarks',
								'minimumelevationinmeters',
								'maximumelevationinmeters',
								'verbatimelevation'
							);
							foreach ($occFieldArr as $k => $v) {
								echo '<div style="float:left;margin-right:5px;">';
								echo '<input type="checkbox" name="kmlFields[]" value="' . $v . '" />' . $v . '</div>';
							}
							?>
						</fieldset>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>

</html>
