<?php
/*
** Style sheets are determined by $CSS_BASE_PATH set within config/symbini.php
** Customization can be made by modifying css files, $CSS_BASE_PATH, adding new css files below
*/
?>
<!-- Responsive viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Symbiota styles -->
<link href="<?= $CSS_BASE_PATH ?>/symbiota/header.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<link href="<?= $CSS_BASE_PATH ?>/symbiota/footer.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<link href="<?= $CSS_BASE_PATH ?>/symbiota/main.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<link href="<?= $CSS_BASE_PATH ?>/symbiota/customizations.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet">
<?php
if($ACCESSIBILITY_ACTIVE){
	?>
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/accessibility-compliant.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" >
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/condensed.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" disabled >
	<?php
} else{
	?>
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/accessibility-compliant.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" disabled >
	<link href="<?= $CSS_BASE_PATH ?>/symbiota/condensed.css?ver=<?= $CSS_VERSION ?>" type="text/css" rel="stylesheet" data-accessibility-link="accessibility-css-link" >
	<?php
}
?>

<script src="<?= $CLIENT_ROOT ?>/js/symb/lang.js" type="text/javascript"></script>
