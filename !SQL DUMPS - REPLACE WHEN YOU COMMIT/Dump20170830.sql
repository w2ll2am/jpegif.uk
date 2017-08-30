-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: jpegif
-- ------------------------------------------------------
-- Server version	5.6.34-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `commentsID` char(8) COLLATE latin1_general_cs NOT NULL,
  `commentsThreadID` char(8) CHARACTER SET latin1 NOT NULL,
  `commentsUser` char(8) CHARACTER SET latin1 NOT NULL,
  `commentsDate` datetime NOT NULL,
  `commentsContent` varchar(1024) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`commentsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES ('1Z036iHT','X1fTKFKR','aADM7iYG','2017-08-12 23:52:35','Thats cool'),('oXTgsipQ','X1fTKFKR','aADM7iYG','2017-08-12 23:50:39','test');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `threadsID` char(8) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `threadsDate` datetime NOT NULL,
  `threadsDescription` varchar(1024) NOT NULL,
  `threadsUserID` char(8) NOT NULL,
  `threadsTitle` varchar(1024) NOT NULL,
  `threadsReplies` int(11) NOT NULL,
  PRIMARY KEY (`threadsID`),
  UNIQUE KEY `threadsID_UNIQUE` (`threadsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES ('11223344','2017-08-06 16:54:20','This is a cat','s68RTGwn','My cat',1),('ao0i7M1W','2017-08-07 10:36:41','gfed','abababab','gfgdfg',5),('FRcSUUt5','2017-08-30 12:59:06','An annoyed bird!','aADM7iYG','Annoyed bird',0),('IKQkohuP','2017-08-07 10:37:20','does something','abababab','Tom scott',5),('i9iHCFBt','2017-08-30 13:03:36','A number of social media site logos','aADM7iYG','Social media',0),('k1EpsV26','2017-08-07 10:47:49','a microphone','abababab','mic',5),('kpQAmxeo','2017-08-07 10:47:11','quinitn','abababab','tarantino',5),('MBl3Plh3','2017-08-30 13:02:32','The flag of the UK','aADM7iYG','Union Jack',0),('O6XyA5eL','2017-08-07 10:45:15','another one','abababab','thumbs up',5),('WGmRHLoQ','2017-08-30 15:52:02','Some waving milk','aADM7iYG','Waving milk',0),('X1fTKFKR','2017-08-07 13:25:50','THis is a new thread','abababab','new post',5);
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` char(8) NOT NULL,
  `userUsername` varchar(45) NOT NULL,
  `userPassword` char(128) NOT NULL,
  `userDateCreated` datetime NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('aADM7iYG','jamie','e9a75486736a550af4fea861e2378305c4a555a05094dee1dca2f68afea49cc3a50e8de6ea131ea521311f4d6fb054a146e8282f8e35ff2e6368c1a62e909716','2017-08-07 18:00:32'),('QLnsxucN','testing','e9a75486736a550af4fea861e2378305c4a555a05094dee1dca2f68afea49cc3a50e8de6ea131ea521311f4d6fb054a146e8282f8e35ff2e6368c1a62e909716','2017-08-07 20:41:16');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-30 22:10:03
