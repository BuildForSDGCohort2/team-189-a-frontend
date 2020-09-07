
USE `chama_ussd`;


/*Table structure for table `chama_ussd_sessions` */

CREATE TABLE `chama_ussd_sessions` (
  `sessionId` char(255) NOT NULL,
  `msisdn` char(12) DEFAULT NULL,
  `UssdCode` char(10) DEFAULT NULL,
  `UssdString` varchar(9999) DEFAULT NULL,
  `UssdStringPrefix` varchar(9999) DEFAULT NULL,
  `UssdProcessString` char(255) DEFAULT NULL,
  `previousFeedbackType` char(50) DEFAULT NULL,
  `currentFeedbackString` char(255) DEFAULT NULL,
  `currentFeedbackType` char(50) DEFAULT NULL,
  `startTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userParams` text,
  PRIMARY KEY (`sessionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

