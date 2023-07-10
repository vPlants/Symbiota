<?php
// Used by /trunk/collections/specprocessor/standalone_scripts/ImageBatchHandler.php
// If running as standalone scripts outside of the Symbiota file structure, you must include ImageLocalProcessor class (ImageLocalProcessor.php)
if(isset($SERVER_ROOT) && $SERVER_ROOT){
	include_once($SERVER_ROOT.'/classes/ImageLocalProcessor.php');
	@include_once($SERVER_ROOT.'/classes/SpecProcessorGPI.php');
	@include_once($SERVER_ROOT.'/classes/SpecProcessorNEVP.php');
}
elseif(isset($SERVER_ROOT) && $SERVER_ROOT){
	if(file_exists($SERVER_ROOT.'/config/dbconnection.php')){ 
		include_once($SERVER_ROOT.'/config/dbconnection.php');
	}
	else{
		include_once('ImageBatchConnectionFactory.php');
	}
	if (file_exists($SERVER_ROOT.'/classes/ImageLocalProcessor.php')) { 
		@require_once($SERVER_ROOT.'/classes/ImageLocalProcessor.php');
	}
	// Check for the symbiota class files used herein for parsing
	// batch files of xml formatted strucutured data.
	// Fail gracefully if they aren't available.
	// Note also that class_exists() is checked for before
	// invocation of these parsers in processFolder().
	if (file_exists($SERVER_ROOT.'/classes/SpecProcessorGPI.php')) {
		@require_once($SERVER_ROOT.'/classes/SpecProcessorGPI.php');
	}
	if (file_exists($SERVER_ROOT.'/classes/SpecProcessorNEVP.php')) {
		@require_once($SERVER_ROOT.'/classes/SpecProcessorNEVP.php');
	}
}
else{
	//Files reside in same folder and script is run from within the folder
	if(file_exists('ImageLocalProcessor.php')) { 
		@require_once('ImageLocalProcessor.php');
	}
	if(file_exists('SpecProcessorGPI.php')) { 
		@require_once('SpecProcessorGPI.php');
	}
	if (file_exists('SpecProcessorNEVP.php')) {  
		@require_once('SpecProcessorNEVP.php');
	}
}

class ImageBatchProcessor extends ImageLocalProcessor {

	function __construct(){
		parent::__construct();
	}

	function __destruct(){
		parent::__destruct();
	}
}
?>