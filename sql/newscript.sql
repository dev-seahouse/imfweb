CREATE DATABASE  IF NOT EXISTS `fyp_imf` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fyp_imf`;
-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: fyp_imf
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.13.10.1

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
-- Table structure for table `category_t`
--

DROP TABLE IF EXISTS `category_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_t` (
  `CategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryID`),
  UNIQUE KEY `CategoryID_UNIQUE` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_t`
--

LOCK TABLES `category_t` WRITE;
/*!40000 ALTER TABLE `category_t` DISABLE KEYS */;
INSERT INTO `category_t` VALUES (1,'Waiter'),(2,'Cleaner');
/*!40000 ALTER TABLE `category_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_t`
--

DROP TABLE IF EXISTS `hotel_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_t` (
  `HotelID` int(10) NOT NULL AUTO_INCREMENT,
  `HotelName` varchar(100) NOT NULL,
  `HotelAddress` varchar(100) NOT NULL,
  `HotelContactNo` int(10) NOT NULL,
  `HotelLatitude` varchar(100) NOT NULL,
  `HotelLongitude` varchar(100) NOT NULL,
  `HotelCardinal` varchar(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  PRIMARY KEY (`HotelID`),
  UNIQUE KEY `HotelID_UNIQUE` (`HotelID`),
  KEY `fk_hotel_t_1_idx` (`UserID`),
  CONSTRAINT `fk_hotel_t_1` FOREIGN KEY (`UserID`) REFERENCES `user_t` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_t`
--

LOCK TABLES `hotel_t` WRITE;
/*!40000 ALTER TABLE `hotel_t` DISABLE KEYS */;
INSERT INTO `hotel_t` VALUES (1,'Regent Hotel','10811 Ashton Avenue #213',2147483647,'1.234343','1.234343','-',1);
/*!40000 ALTER TABLE `hotel_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_t`
--

DROP TABLE IF EXISTS `job_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_t` (
  `JobID` int(10) NOT NULL AUTO_INCREMENT,
  `HotelID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `ScopeID` int(10) NOT NULL,
  `JobDate` date NOT NULL,
  `JobStartTime` datetime NOT NULL,
  `JobEndTime` datetime NOT NULL,
  `JobEstHours` int(10) NOT NULL,
  `JobSlotVacancy` int(10) NOT NULL,
  `JobSlotVacLeft` int(10) NOT NULL,
  `JobRate` varchar(10) NOT NULL,
  `JobMinEBRHours` varchar(100) DEFAULT NULL,
  `JobEBR` varchar(10) DEFAULT NULL,
  `OverRunEndDateTime` datetime DEFAULT NULL,
  `OverRunEstHours` varchar(10) DEFAULT NULL,
  `JobStatus` int(1) NOT NULL,
  PRIMARY KEY (`JobID`),
  UNIQUE KEY `JobID_UNIQUE` (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_t`
--

LOCK TABLES `job_t` WRITE;
/*!40000 ALTER TABLE `job_t` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobapplicant_t`
--

DROP TABLE IF EXISTS `jobapplicant_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobapplicant_t` (
  `JobAppID` int(10) NOT NULL AUTO_INCREMENT,
  `JobID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `MarkAsPresent` char(1) NOT NULL,
  `ExpHours` int(10) NOT NULL,
  `FeedbackRating` int(1) DEFAULT NULL,
  `FeedbackComment` varchar(1000) DEFAULT NULL,
  `CancelReason` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`JobAppID`),
  UNIQUE KEY `JobAppID_UNIQUE` (`JobAppID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobapplicant_t`
--

LOCK TABLES `jobapplicant_t` WRITE;
/*!40000 ALTER TABLE `jobapplicant_t` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobapplicant_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mobilesession_t`
--

DROP TABLE IF EXISTS `mobilesession_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mobilesession_t` (
  `MobileSessionID` int(10) NOT NULL AUTO_INCREMENT,
  `UserID` int(10) NOT NULL,
  `IMFToken` varchar(100) NOT NULL,
  PRIMARY KEY (`MobileSessionID`),
  UNIQUE KEY `MobileSessionID_UNIQUE` (`MobileSessionID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobilesession_t`
--

LOCK TABLES `mobilesession_t` WRITE;
/*!40000 ALTER TABLE `mobilesession_t` DISABLE KEYS */;
/*!40000 ALTER TABLE `mobilesession_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_t`
--

DROP TABLE IF EXISTS `role_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_t` (
  `RoleID` int(10) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(100) NOT NULL,
  PRIMARY KEY (`RoleID`),
  UNIQUE KEY `RoleID_UNIQUE` (`RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_t`
--

LOCK TABLES `role_t` WRITE;
/*!40000 ALTER TABLE `role_t` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scope_t`
--

DROP TABLE IF EXISTS `scope_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scope_t` (
  `ScopeID` int(10) NOT NULL AUTO_INCREMENT,
  `ScopeName` varchar(100) NOT NULL,
  `ScopeDesc` varchar(10000) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  PRIMARY KEY (`ScopeID`),
  UNIQUE KEY `ScopeID_UNIQUE` (`ScopeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scope_t`
--

LOCK TABLES `scope_t` WRITE;
/*!40000 ALTER TABLE `scope_t` DISABLE KEYS */;
/*!40000 ALTER TABLE `scope_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_t`
--

DROP TABLE IF EXISTS `user_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_t` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `RoleID` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Gender` char(1) NOT NULL,
  `NRIC` varchar(10) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `MobileNo` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `IMFPin` int(10) NOT NULL,
  `SpokenLang` varchar(100) DEFAULT NULL,
  `SpokenLangOther` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_t`
--

LOCK TABLES `user_t` WRITE;
/*!40000 ALTER TABLE `user_t` DISABLE KEYS */;
INSERT INTO `user_t` VALUES (1,3,'kenan','-','-','-','-','2014-01-27',0,'xinkenan.11@hotmail.com','$2y$10$dAtVVDjcdInXlAld0/ZiTeDL6A3wLuxvDT6BezfZziUowfqrc09G.',0,NULL,NULL);
/*!40000 ALTER TABLE `user_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'fyp_imf'
--
/*!50003 DROP PROCEDURE IF EXISTS `regUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `regUser`(
IN user_name varchar(50),
IN password varchar(255),
IN email varchar(50),
IN company_name varchar(50),
IN company_address varchar(64),
IN company_contact int(10),
-- company_random is placeholder for nric field, to be removed after spliting company & user account table
IN company_random varchar(10),
IN company_lat varchar(100),
IN company_long varchar(100)

)
BEGIN

insert into user_t (RoleID,Username,Password,Email,Firstname, Lastname, Gender, NRIC, DateOfBirth, MobileNo,IMFpin)
values (3,user_name,password,email,'-','-','-',company_random,curdate(),'000000',0000);

IF ROW_COUNT()>0
THEN insert into hotel_t (UserID,HotelName,HotelAddress,HotelContactNo,HotelLatitude,HotelLongitude,HotelCardinal)
values(LAST_INSERT_ID(),company_name,company_address,company_contact,company_lat,company_long,"-");
END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-31  4:16:58
