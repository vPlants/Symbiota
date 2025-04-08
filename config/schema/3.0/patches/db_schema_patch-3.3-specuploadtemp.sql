
ALTER TABLE `uploadspectemp` 
  CHANGE COLUMN `labelProject` `labelProject` varchar(250) DEFAULT NULL,
  CHANGE COLUMN `taxonRemarks` `taxonRemarks` text,
  CHANGE COLUMN `identificationReferences` `identificationReferences` text,
  CHANGE COLUMN `identificationRemarks` `identificationRemarks` text,
  CHANGE COLUMN `eventID` `eventID` varchar(150) DEFAULT NULL,
  CHANGE COLUMN `georeferenceRemarks` `georeferenceRemarks` varchar(500) DEFAULT NULL,
  CHANGE COLUMN `recordNumber` `recordNumber` varchar(45) DEFAULT NULL COMMENT 'Collector Number',
  CHANGE COLUMN `waterBody` `waterBody` varchar(75) DEFAULT NULL;

ALTER TABLE `omoccurdeterminations`
  CHANGE COLUMN `taxonRemarks` `taxonRemarks` text;
  CHANGE COLUMN `identificationReferences` `identificationReferences` text,
  CHANGE COLUMN `identificationRemarks` `identificationRemarks` text;

ALTER TABLE `uploaddetermtemp`
  CHANGE COLUMN `taxonRemarks` `taxonRemarks` text,
  CHANGE COLUMN `identificationReferences` `identificationReferences` text,
  CHANGE COLUMN `identificationRemarks` `identificationRemarks` text;

  