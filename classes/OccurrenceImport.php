<?php
include_once('UtilitiesFileImport.php');
include_once('ImageShared.php');
include_once('OmMaterialSample.php');
include_once('OmAssociations.php');
include_once('OmDeterminations.php');
include_once('OccurrenceMaintenance.php');
include_once('UuidFactory.php');

class OccurrenceImport extends UtilitiesFileImport{

	private $collid;
	private $collMetaArr = array();
	private $importType;
	private $createNewRecord = false;

	private $importManager = null;

	private const IMPORT_ASSOCIATIONS = 1;
	private const IMPORT_DETERMINATIONS = 2;
	private const IMPORT_IMAGE_MAP = 3;
	private const IMPORT_MATERIAL_SAMPLE = 4;

	function __construct() {
		parent::__construct(null, 'write');
		$this->setVerboseMode(2);
		set_time_limit(2000);
	}

	function __destruct(){
		parent::__destruct();
	}

	public function loadData($postArr){
		global $LANG;
		$status = false;
		if($this->fileName && isset($postArr['tf'])){
			$this->fieldMap = array_flip($postArr['tf']);
			if($this->setTargetPath()){
				if($this->getHeaderArr()){		// Advance past header row, set file handler, and define delimiter
					$cnt = 1;
					while($recordArr = $this->getRecordArr()){
						$identifierArr = array();
						if(isset($this->fieldMap['occurrenceid'])){
							if($recordArr[$this->fieldMap['occurrenceid']]) $identifierArr['occurrenceID'] = $recordArr[$this->fieldMap['occurrenceid']];
						}
						if(isset($this->fieldMap['catalognumber'])){
							if($recordArr[$this->fieldMap['catalognumber']]) $identifierArr['catalogNumber'] = $recordArr[$this->fieldMap['catalognumber']];
						}
						if(isset($this->fieldMap['othercatalognumbers'])){
							if($recordArr[$this->fieldMap['othercatalognumbers']]) $identifierArr['otherCatalogNumbers'] = $recordArr[$this->fieldMap['othercatalognumbers']];
						}
						$this->logOrEcho('#'.$cnt.': '.$LANG['PROCESSING_CATNUM'].': '.implode(', ', $identifierArr));
						if($occidArr = $this->getOccurrencePK($identifierArr)){
							$status = $this->insertRecord($recordArr, $occidArr, $postArr);
						}
						$cnt++;
					}
					$occurMain = new OccurrenceMaintenance($this->conn);
					$this->logOrEcho($LANG['VALUES_SET']);
					$this->logOrEcho($LANG['UPDATING_STATS'].'...');
					if(!$occurMain->updateCollectionStatsBasic($this->collid)){
						$errorArr = $occurMain->getErrorArr();
						foreach($errorArr as $errorStr){
							$this->logOrEcho($errorStr,1);
						}
					}
				}
				$this->deleteImportFile();
			}
		}
		return $status;
	}

	private function insertRecord($recordArr, $occidArr, $postArr){
		global $LANG;
		$status = false;
		if($this->importType == self::IMPORT_IMAGE_MAP){
			$importManager = new ImageShared($this->conn);
			if(!isset($this->fieldMap['originalurl']) || !$recordArr[$this->fieldMap['originalurl']]){
				$this->errorMessage = 'large url (originalUrl) is null (required)';
				return false;
			}
			foreach($occidArr as $occid){
				$importManager->setOccid($occid);
				//$importManager->setTid($tid);
				$importManager->setImgLgUrl($recordArr[$this->fieldMap['originalurl']]);
				if(isset($this->fieldMap['url']) && $recordArr[$this->fieldMap['url']]) $importManager->setImgWebUrl($recordArr[$this->fieldMap['url']]);
				if(isset($this->fieldMap['thumbnailurl']) && $recordArr[$this->fieldMap['thumbnailurl']]) $importManager->setImgTnUrl($recordArr[$this->fieldMap['thumbnailurl']]);
				if(isset($this->fieldMap['archiveurl']) && $recordArr[$this->fieldMap['archiveurl']]) $importManager->setArchiveUrl($recordArr[$this->fieldMap['archiveurl']]);
				if(isset($this->fieldMap['referenceurl']) && $recordArr[$this->fieldMap['referenceurl']]) $importManager->setReferenceUrl($recordArr[$this->fieldMap['referenceurl']]);
				if(isset($this->fieldMap['photographer']) && $recordArr[$this->fieldMap['photographer']]) $importManager->setPhotographer($recordArr[$this->fieldMap['photographer']]);
				if(isset($this->fieldMap['photographeruid']) && $recordArr[$this->fieldMap['photographeruid']]) $importManager->setPhotographerUid($recordArr[$this->fieldMap['photographeruid']]);
				if(isset($this->fieldMap['caption']) && $recordArr[$this->fieldMap['caption']]) $importManager->setCaption($recordArr[$this->fieldMap['caption']]);
				if(isset($this->fieldMap['owner']) && $recordArr[$this->fieldMap['owner']]) $importManager->setOwner($recordArr[$this->fieldMap['owner']]);
				if(isset($this->fieldMap['anatomy']) && $recordArr[$this->fieldMap['anatomy']]) $importManager->setAnatomy($recordArr[$this->fieldMap['anatomy']]);
				if(isset($this->fieldMap['notes']) && $recordArr[$this->fieldMap['notes']]) $importManager->setNotes($recordArr[$this->fieldMap['notes']]);
				if(isset($this->fieldMap['format']) && $recordArr[$this->fieldMap['format']]) $importManager->setFormat($recordArr[$this->fieldMap['format']]);
				if(isset($this->fieldMap['sourceidentifier']) && $recordArr[$this->fieldMap['sourceidentifier']]) $importManager->setSourceIdentifier($recordArr[$this->fieldMap['sourceidentifier']]);
				if(isset($this->fieldMap['hashfunction']) && $recordArr[$this->fieldMap['hashfunction']]) $importManager->setHashFunction($recordArr[$this->fieldMap['hashfunction']]);
				if(isset($this->fieldMap['hashvalue']) && $recordArr[$this->fieldMap['hashvalue']]) $importManager->setHashValue($recordArr[$this->fieldMap['hashvalue']]);
				if(isset($this->fieldMap['mediamd5']) && $recordArr[$this->fieldMap['mediamd5']]) $importManager->setMediaMD5($recordArr[$this->fieldMap['mediamd5']]);
				if(isset($this->fieldMap['copyright']) && $recordArr[$this->fieldMap['copyright']]) $importManager->setCopyright($recordArr[$this->fieldMap['copyright']]);
				if(isset($this->fieldMap['accessrights']) && $recordArr[$this->fieldMap['accessrights']]) $importManager->setAccessRights($recordArr[$this->fieldMap['accessrights']]);
				if(isset($this->fieldMap['rights']) && $recordArr[$this->fieldMap['rights']]) $importManager->setRights($recordArr[$this->fieldMap['rights']]);
				if(isset($this->fieldMap['sortoccurrence']) && $recordArr[$this->fieldMap['sortoccurrence']]) $importManager->setSortOccurrence($recordArr[$this->fieldMap['sortoccurrence']]);
				if($importManager->insertImage()){
					$this->logOrEcho($LANG['IMAGE_LOADED'].': <a href="../editor/occurrenceeditor.php?occid='.$occid.'" target="_blank">'.$occid.'</a>', 1);
					$status = true;
				}
				else{
					$this->logOrEcho('ERROR loading image: '.$importManager->getErrStr(), 1);
				}
				$importManager->reset();
			}
		}
		elseif($this->importType == self::IMPORT_DETERMINATIONS){
			$detManager = new OmDeterminations($this->conn);
			foreach($occidArr as $occid){
				$detManager->setOccid($occid);
				$fieldArr = array_keys($detManager->getSchemaMap());
				$detArr = array();
				foreach($fieldArr as $field){
					$fieldLower = strtolower($field);
					if(isset($this->fieldMap[$fieldLower]) && !empty($recordArr[$this->fieldMap[$fieldLower]])) $detArr[$field] = $recordArr[$this->fieldMap[$fieldLower]];
				}
				if (empty($detArr['sciname'])) {
					$this->logOrEcho ('ERROR loading determination: Scientific name is empty.', 1);
					continue;
				}
				if (empty($detArr['identifiedBy'])) {
					$paramArr['identifiedBy'] = 'unknown';
				}
				if (empty($detArr['dateIdentified'])) {
					$paramArr['dateIdentified'] = 's.d.';
				}
				if($detManager->insertDetermination($detArr)){
					$this->logOrEcho($LANG['DETERMINATION_ADDED'].': <a href="../editor/occurrenceeditor.php?occid='.$occid.'" target="_blank">'.$occid.'</a>', 1);
					$status = true;
				}
				else{
					$this->logOrEcho('ERROR loading determination: '.$detManager->getErrorMessage(), 1);
				}
			}
		}
		elseif($this->importType == self::IMPORT_ASSOCIATIONS){
			$importManager = new OmAssociations($this->conn);
			foreach($occidArr as $occid){
				$importManager->setOccid($occid);
				$fieldArr = array_keys($importManager->getSchemaMap());
				$fieldArr[] = 'object-occurrenceID';
				$fieldArr[] = 'object-catalogNumber';
				$assocArr = array();
				foreach($fieldArr as $field){
					$fieldLower = strtolower($field);
					if(isset($this->fieldMap[$fieldLower])) $assocArr[$field] = $recordArr[$this->fieldMap[$fieldLower]];
				}
				if($assocArr){
					if(!empty($postArr['associationType']) && !empty($postArr['relationship'])){
						$assocArr['associationType'] = $postArr['associationType'];
						$assocArr['relationship'] = $postArr['relationship'];
						if(isset($postArr['subType']) && empty($assocArr['subType'])) $assocArr['subType'] = $postArr['subType'];
						if(!empty($postArr['replace'])){
							$existingAssociation = null;
							if(!empty($assocArr['instanceID'])){
								$existingAssociation = $importManager->getAssociationArr(array('associationType' => $assocArr['associationType'], 'recordID' => $assocArr['instanceID']));
								if($existingAssociation){
									//instanceID is recordID, thus don't add to instanceID
									unset($assocArr['instanceID']);
								}
								if(!$existingAssociation){
									$existingAssociation = $importManager->getAssociationArr(array('associationType' => $assocArr['associationType'], 'instanceID' => $assocArr['instanceID']));
								}
							}
							if(!$existingAssociation && !empty($assocArr['resourceUrl'])){
								$existingAssociation = $importManager->getAssociationArr(array('associationType' => $assocArr['associationType'], 'resourceUrl' => $assocArr['resourceUrl']));
							}
							if(!$existingAssociation && !empty($assocArr['objectID'])){
								$existingAssociation = $importManager->getAssociationArr(array('associationType' => $assocArr['associationType'], 'objectID' => $assocArr['objectID']));
							}
							if($existingAssociation){
								if($assocID = key($existingAssociation)){
									$importManager->setAssocID($assocID);
									if($assocArr['relationship'] == 'DELETE'){
										if($importManager->deleteAssociation()){
											$this->logOrEcho($LANG['ASSOC_DELETED'].': <a href="../editor/occurrenceeditor.php?occid='.$occid.'" target="_blank">'.$occid.'</a>', 1);
										}
										else{
											$this->logOrEcho($LANG['ERROR_DELETING'] . ': '.$importManager->getErrorMessage(), 1);
										}
									}
									else{
										if($importManager->updateAssociation($assocArr)){
											$this->logOrEcho($LANG['ASSOC_UPDATED'].': <a href="../editor/occurrenceeditor.php?occid='.$occid.'" target="_blank">'.$occid.'</a>', 1);
											$status = true;
										}
										else{
											$this->logOrEcho($LANG['ERROR_UPDATING'] . ': '.$importManager->getErrorMessage(), 1);
										}
									}
								}
							}
							else{
								$this->logOrEcho($LANG['TARGET_NOT_FOUND'], 1);
							}
						}
						elseif($importManager->insertAssociation($assocArr)){
							$this->logOrEcho($LANG['ASSOC_ADDED'].': <a href="../editor/occurrenceeditor.php?occid='.$occid.'" target="_blank">'.$occid.'</a>', 1);
							$status = true;
						}
						else{
							$this->logOrEcho($LANG['ERROR_ADDING'] . ': '.$importManager->getErrorMessage(), 1);
						}
					}
				}
			}
		}
		elseif($this->importType == self::IMPORT_MATERIAL_SAMPLE){
			$importManager = new OmMaterialSample($this->conn);
			foreach($occidArr as $occid){
				$importManager->setOccid($occid);
				$fieldArr = array_keys($importManager->getSchemaMap());
				$msArr = array();
				foreach($fieldArr as $field){
					$fieldLower = strtolower($field);
					if(isset($this->fieldMap[$fieldLower]) && !empty($recordArr[$this->fieldMap[$fieldLower]])) $msArr[$field] = $recordArr[$this->fieldMap[$fieldLower]];
				}
				if(isset($msArr['ms_catalogNumber']) && $msArr['ms_catalogNumber']){
					$msArr['catalogNumber'] = $msArr['ms_catalogNumber'];
					unset($msArr['ms_catalogNumber']);
				}
				if($importManager->insertMaterialSample($msArr)){
					$this->logOrEcho($LANG['MAT_SAMPLE_ADDED'].': <a href="../editor/occurrenceeditor.php?occid='.$occid.'" target="_blank">'.$occid.'</a>', 1);
					$status = true;
				}
				else{
					$this->logOrEcho('ERROR loading Material Sample: '.$importManager->getErrorMessage(), 1);
				}
			}
		}
		return $status;
	}

	//Identifier and occid functions
	protected function getOccurrencePK($identifierArr){
		$retArr = array();
		$sql = 'SELECT DISTINCT o.occid FROM omoccurrences o ';
		$sqlConditionArr = array();
		if(isset($identifierArr['occurrenceID'])){
			$occurrenceID = $this->cleanInStr($identifierArr['occurrenceID']);
			$sqlConditionArr[] = '(o.occurrenceID = "'.$occurrenceID.'" OR o.recordID = "'.$occurrenceID.'")';
		}
		if(isset($identifierArr['catalogNumber'])){
			$sqlConditionArr[] = '(o.catalogNumber = "'.$this->cleanInStr($identifierArr['catalogNumber']).'")';
		}
		if(isset($identifierArr['otherCatalogNumbers'])){
			$otherCatalogNumbers = $this->cleanInStr($identifierArr['otherCatalogNumbers']);
			$sqlConditionArr[] = '(o.othercatalognumbers = "'.$otherCatalogNumbers.'" OR i.identifierValue = "'.$otherCatalogNumbers.'")';
			$sql .= 'LEFT JOIN omoccuridentifiers i ON o.occid = i.occid ';
		}
		if($sqlConditionArr){
			$sql .= 'WHERE (o.collid = '.$this->collid.') AND ('.implode(' OR ', $sqlConditionArr).') ';
			$rs = $this->conn->query($sql);
			while($r = $rs->fetch_object()){
				$retArr[] = $r->occid;
			}
			$rs->free();
		}
		if(!$retArr){
			if($this->createNewRecord){
				$newOccid = $this->insertNewOccurrence($identifierArr);
				if($newOccid) $retArr[] = $newOccid;
			}
			else $this->logOrEcho('SKIPPED: Unable to find record matching identifier: '.implode(', ', $identifierArr), 1);
		}

		return $retArr;
	}

	protected function insertNewOccurrence($identifierArr){
		$newOccid = 0;
		if(isset($identifierArr['occurrenceID'])){
			$this->logOrEcho('SKIPPED: Unable to create new record based on occurrenceID', 1);
			return false;
		}
		$catNum = null;
		if(isset($identifierArr['catalogNumber'])) $catNum = $identifierArr['catalogNumber'];
		$sql = 'INSERT INTO omoccurrences(collid, catalogNumber, recordID, processingstatus, recordEnteredBy, dateentered) VALUES(?, ?, ?, "unprocessed", ?, now())';
		if($stmt = $this->conn->prepare($sql)){
			$recordID = UuidFactory::getUuidV4();
			$stmt->bind_param('isss', $this->collid, $catNum, $recordID, $GLOBALS['USERNAME']);
			$stmt->execute();
			$newOccid = $stmt->insert_id;
			$stmt->close();
		}
		if($newOccid){
			if(isset($identifierArr['otherCatalogNumbers'])) $this->insertAdditionalIdentifier($newOccid, $identifierArr['otherCatalogNumbers']);
			$this->logOrEcho('Unable to find record with matching '.implode(',', $identifierArr).'; new occurrence record created',1);
		}
		return $newOccid;
	}

	protected function insertAdditionalIdentifier($occid, $identifierValue){
		$status = false;
		$sql = 'INSERT INTO omoccuridentifiers(occid, identifierValue, modifiedUid) VALUES(?, ?, ?) ';
		if($stmt = $this->conn->prepare($sql)) {
			$stmt->bind_param('iss', $occid, $identifierValue, $GLOBALS['SYMB_UID']);
			$stmt->execute();
			if($stmt->affected_rows || !$stmt->error) $status = true;
			else $this->errorMessage = 'ERROR inserting additional identifier: '.$stmt->error;
			$stmt->close();
		}
		else $this->errorMessage = 'ERROR preparing statement for inserting additional identifier: '.$this->conn->error;
		return $status;
	}

	//Mapping functions
	public function setTargetFieldArr($associationType = null){
		$this->targetFieldMap['catalognumber'] = 'subject identifier: catalogNumber';
		$this->targetFieldMap['othercatalognumbers'] = 'subject identifier: otherCatalogNumbers';
		$this->targetFieldMap['occurrenceid'] = 'subject identifier: occurrenceID';
		$this->targetFieldMap[''] = '------------------------------------';
		$fieldArr = array();
		if($this->importType == self::IMPORT_IMAGE_MAP){
			$fieldArr = array('url', 'originalUrl', 'thumbnailUrl', 'archiveUrl', 'referenceUrl', 'photographer', 'photographerUid', 'caption', 'owner', 'anatomy', 'notes',
				'format', 'sourceIdentifier', 'hashFunction', 'hashValue', 'mediaMD5', 'copyright', 'rights', 'accessRights', 'sortOccurrence');
		}
		elseif($this->importType == self::IMPORT_ASSOCIATIONS){
			$fieldArr = array('relationshipID', 'objectID', 'basisOfRecord', 'establishedDate', 'notes', 'accordingTo');
			if($associationType == 'resource'){
				$fieldArr[] = 'resourceUrl';
			}
			elseif($associationType == 'internalOccurrence'){
				$this->targetFieldMap['object-catalognumber'] = 'object identifier: catalogNumber';
				$this->targetFieldMap['object-occurrenceid'] = 'object identifier: occurrenceID';
				$this->targetFieldMap['occidassociate'] = 'object identifier: occid';
				$this->targetFieldMap['0'] = '------------------------------------';
			}
			elseif($associationType == 'externalOccurrence'){
				$fieldArr[] = 'verbatimSciname';
				$fieldArr[] = 'resourceUrl';
			}
			elseif($associationType == 'observational'){
				$fieldArr[] = 'verbatimSciname';
			}
		}
		elseif($this->importType == self::IMPORT_DETERMINATIONS){
			$detManager = new OmDeterminations($this->conn);
			$schemaMap = $detManager->getSchemaMap();
			unset($schemaMap['appliedStatus']);
			unset($schemaMap['detType']);
			$fieldArr = array_keys($schemaMap);
		}
		elseif($this->importType == self::IMPORT_MATERIAL_SAMPLE){
			$fieldArr = array('sampleType', 'ms_catalogNumber', 'guid', 'sampleCondition', 'disposition', 'preservationType', 'preparationDetails', 'preparationDate',
				'preparedByUid', 'individualCount', 'sampleSize', 'storageLocation', 'remarks');
		}
		sort($fieldArr);
		foreach($fieldArr as $field){
			$this->targetFieldMap[strtolower($field)] = $field;
		}
	}

	private function defineTranslationMap(){
		if($this->translationMap === null){
			if($this->importType == self::IMPORT_IMAGE_MAP){
				$this->translationMap = array('web' => 'url', 'webviewoptional' => 'url', 'thumbnail' => 'thumbnailurl','thumbnailoptional' => 'thumbnailurl',
					'largejpg' => 'originalurl', 'large' => 'originalurl', 'imageurl' => 'url', 'accessuri' => 'url');
			}
			elseif($this->importType == self::IMPORT_ASSOCIATIONS){
				$this->translationMap = array();
			}
			elseif($this->importType == self::IMPORT_DETERMINATIONS){
				$this->translationMap = array('identificationid' => 'sourceIdentifier');
			}
			elseif($this->importType == self::IMPORT_MATERIAL_SAMPLE){
				$this->translationMap = array();
			}
		}
	}

	//Data set functions
	private function setCollMetaArr(){
		$sql = 'SELECT institutionCode, collectionCode, collectionName, dynamicProperties FROM omcollections WHERE collid = '.$this->collid;
		$rs = $this->conn->query($sql);
		while($r = $rs->fetch_object()){
			$this->collMetaArr['instCode'] = $r->institutionCode;
			$this->collMetaArr['collCode'] = $r->collectionCode;
			$this->collMetaArr['collName'] = $r->collectionName;
			if($r->dynamicProperties){
				if(strpos($r->dynamicProperties , '"matSample":{"status":1')) $this->collMetaArr['materialSample'] = 1;
			}
		}
		$rs->free();
	}

	public function materialSampleModuleActive(){
		if(!$this->collMetaArr) $this->setCollMetaArr();
		if(isset($this->collMetaArr['matsample'])) return true;
		return false;
	}

	public function getControlledVocabulary($tableName, $fieldName, $filterVariable = ''){
		$retArr = array();
		$sql = 'SELECT t.term, t.termDisplay
			FROM ctcontrolvocab v INNER JOIN ctcontrolvocabterm t ON v.cvID = t.cvID
			WHERE tableName = ? AND fieldName = ? AND filterVariable = ?';
		if($stmt = $this->conn->prepare($sql)){
			$stmt->bind_param('sss', $tableName, $fieldName, $filterVariable);
			$stmt->execute();
			$term = ''; $termDisplay = '';
			$stmt->bind_result($term, $termDisplay);
			while ($stmt->fetch()) {
				if(!$termDisplay) $termDisplay = $term;
				$retArr[$term] = $termDisplay;
			}
			$stmt->close();
		}
		asort($retArr);
		return $retArr;
	}

	//Basic setters and getters
	public function setCollid($id){
		if(is_numeric($id)) $this->collid = $id;
	}

	public function getCollid(){
		return $this->collid;
	}

	public function getCollMeta($field){
		$fieldValue = '';
		if(!$this->collMetaArr) $this->setCollMetaArr();
		if(isset($this->collMetaArr[$field])) return $this->collMetaArr[$field];
		return $fieldValue;
	}

	public function setCreateNewRecord($b){
		if($b) $this->createNewRecord = true;
		else $this->createNewRecord = false;
	}

	public function setImportType($importType){
		if(is_numeric($importType)) $this->importType = $importType;
		$this->defineTranslationMap();
	}
}
?>