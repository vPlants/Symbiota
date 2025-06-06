<?php
date_default_timezone_set('America/Phoenix');

require_once('ImageBatchConf.php');
if(file_exists('../../../config/symbini.php')){
	include_once('../../../config/symbini.php');
	require_once($SERVER_ROOT.'/classes/ImageBatchProcessor.php');
	if(!$SERVER_ROOT) $SERVER_ROOT = $SERVER_ROOT;
}
elseif(isset($SERVER_ROOT) && $SERVER_ROOT){
	include_once($SERVER_ROOT.'/config/symbini.php');
	@include_once($SERVER_ROOT.'/collections/specprocessor/standalone_scripts/ImageBatchConnectionFactory.php');
	require_once($SERVER_ROOT.'/classes/ImageBatchProcessor.php');
}
else{
	@include_once('ImageBatchConnectionFactory.php');
	require_once('ImageBatchProcessor.php');
}

//-------------------------------------------------------------------------------------------//
$imageProcessor = new ImageBatchProcessor();

//Initiate log file
if(isset($silent) && $silent) $logMode = 2;
$imageProcessor->setLogMode($logMode);
if(!$logProcessorPath && $LOG_PATH) $logProcessorPath = $LOG_PATH;
$imageProcessor->setLogPath($logProcessorPath);

//Set remaining variables
$imageProcessor->setDbMetadata($dbMetadata);
$imageProcessor->setSourcePathBase($sourcePathBase);
$imageProcessor->setTargetPathBase($targetPathBase);
$imageProcessor->setImgUrlBase($imgUrlBase);
$imageProcessor->setServerRoot($SERVER_ROOT);
if($webPixWidth) $imageProcessor->setWebPixWidth($webPixWidth);
if($tnPixWidth) $imageProcessor->setTnPixWidth($tnPixWidth);
if($lgPixWidth) $imageProcessor->setLgPixWidth($lgPixWidth);
if($webFileSizeLimit) $imageProcessor->setWebFileSizeLimit($webFileSizeLimit);
if($lgFileSizeLimit) $imageProcessor->setLgFileSizeLimit($lgFileSizeLimit);
$imageProcessor->setJpgQuality($jpgQuality);

if(isset($webImg) && $webImg) $imageProcessor->setMedProcessingCode($webImg);
if(isset($tnImg) && $tnImg) $imageProcessor->setTnProcessingCode($tnImg);
if(isset($lgImg) && $lgImg) $imageProcessor->setLgProcessingCode($lgImg);
$imageProcessor->setKeepOrig($keepOrig);
$imageProcessor->setCreateNewRec($createNewRec);
if(isset($imgExists)) $imageProcessor->setImgExists($imgExists);
elseif(isset($copyOverImg)) $imageProcessor->setCopyOverImg($copyOverImg);
if(isset($matchOtherCatalogNumbers)) $imageProcessor->setMatchOtherCatalogNumbers($matchOtherCatalogNumbers);

$imageProcessor->initProcessor($logTitle);
$imageProcessor->setCollArr($collArr);

//Run process
$imageProcessor->batchLoadSpecimenImages();
?>