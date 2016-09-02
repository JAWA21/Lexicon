# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: ci_news
# Generation Time: 2014-01-20 06:57:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cart`;

CREATE TABLE `Cart` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) unsigned DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table CartDetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `CartDetail`;

CREATE TABLE `CartDetail` (
  `CID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photoID` int(11) unsigned DEFAULT NULL,
  `itemPrice` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`CID`),
  KEY `photoID` (`photoID`),
  CONSTRAINT `CartDetail_ibfk_1` FOREIGN KEY (`photoID`) REFERENCES `photos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`)
VALUES
	('131ae5598f79f2ce088a9c3a702d153f','::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:26.0) Gecko/20100101 Firefox/26.0',1390200632,'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"4\";s:9:\"user_name\";s:7:\"john123\";s:10:\"user_email\";s:21:\"jMathis@leftovers.com\";s:9:\"logged_in\";b:1;}');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Comment`;

CREATE TABLE `Comment` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photoID` int(11) unsigned DEFAULT NULL,
  `userID` int(11) unsigned DEFAULT NULL,
  `text` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `photos` (`ID`),
  CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `slug`, `text`)
VALUES
	(1,'VW vs Chevy','','Chevy falls way behind in the race'),
	(2,'This is a news site people!','','Do you not know what I am talking about? Get it together!'),
	(3,'Morning classes','','Not my favorite?, prefer 1-9pm!'),
	(4,'Ps4 VS Xbox One','ps4-vs-xbox-one','This is a real test with real people');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Order`;

CREATE TABLE `Order` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) unsigned DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `numItems` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `userID` (`userID`),
  CONSTRAINT `Order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table OrderDetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `OrderDetail`;

CREATE TABLE `OrderDetail` (
  `OID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photoID` int(11) unsigned DEFAULT NULL,
  `itemPrice` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`OID`),
  KEY `photoID` (`photoID`),
  CONSTRAINT `OrderDetail_ibfk_1` FOREIGN KEY (`photoID`) REFERENCES `photos` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) unsigned DEFAULT NULL,
  `pTitle` varchar(128) DEFAULT NULL,
  `pDesc` varchar(255) DEFAULT NULL,
  `iso_speed` varchar(50) DEFAULT NULL,
  `f_number` varchar(50) DEFAULT NULL,
  `exposure_time` varchar(50) DEFAULT NULL,
  `modified` tinyint(1) DEFAULT NULL,
  `orig_name` varchar(255) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `userID` (`userID`),
  CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;

INSERT INTO `photos` (`ID`, `userID`, `pTitle`, `pDesc`, `iso_speed`, `f_number`, `exposure_time`, `modified`, `orig_name`, `make`, `model`, `date_time`, `price`)
VALUES
	(9,4,'lols',NULL,'500','12/5','1/15',NULL,'IMG_0549.jpg','Apple','iPhone 5',NULL,5.1),
	(10,NULL,'test',NULL,'500','12/5','1/15',NULL,'IMG_0549.jpg','Apple','iPhone 5',NULL,5.9),
	(11,4,'Desk','This is inside a desk drawer','500','12/5','1/15',NULL,'IMG_0549.jpg','Apple','iPhone 5',NULL,5.89),
	(12,NULL,'Title','desc','500','12/5','1/15',NULL,'IMG_0549.jpg','Apple','iPhone 5',NULL,4.2),
	(13,4,'Tybee Island Light','2.00','168','49/10','1/60',NULL,'IMG_8506.jpg','Canon','Canon PowerShot SD400',NULL,4),
	(14,NULL,'Hosta Flower','2.00','50','28/5','1/320',NULL,'IMG_8079.jpg','Canon','Canon PowerShot SD400',NULL,NULL),
	(15,NULL,'Hosta Flower','2.00','50','28/5','1/320',NULL,'IMG_8079.jpg','Canon','Canon PowerShot SD400',NULL,NULL),
	(16,NULL,'Hosta Flower','2.00','50','28/5','1/320',NULL,'IMG_8079.jpg','Canon','Canon PowerShot SD400',NULL,NULL),
	(17,NULL,'Hosta Flower','2.00','50','28/5','1/320',NULL,'IMG_8079.jpg','Canon','Canon PowerShot SD400',NULL,NULL);

/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `ID` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `addressSt` varchar(255) DEFAULT NULL,
  `addressCity` varchar(255) DEFAULT NULL,
  `addressState` varchar(255) DEFAULT NULL,
  `addressZip` int(5) DEFAULT NULL,
  `fname` varchar(11) DEFAULT NULL,
  `lname` varchar(11) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`ID`, `username`, `password`, `addressSt`, `addressCity`, `addressState`, `addressZip`, `fname`, `lname`, `type`, `email`)
VALUES
	(1,'bob','9a618248b64db62d15b300a07b00580b',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,'lol','1234',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,'0','81dc9bdb52d04dc20036dbd8313ed055',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0'),
	(4,'john123','81dc9bdb52d04dc20036dbd8313ed055','123 Newbury St','Boston','MA',2310,'John','Mathis','1','jMathis@leftovers.com'),
	(5,'johnnyboi','81dc9bdb52d04dc20036dbd8313ed055',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'crackerjack@leftover.com'),
	(6,'johnnies','81dc9bdb52d04dc20036dbd8313ed055',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'johnn12@me.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
