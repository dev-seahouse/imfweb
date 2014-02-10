CREATE DATABASE  IF NOT EXISTS `fyp_imf` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fyp_imf`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: fyp_imf
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_t`
--

LOCK TABLES `category_t` WRITE;
/*!40000 ALTER TABLE `category_t` DISABLE KEYS */;
INSERT INTO `category_t` VALUES (1,'Waiter'),(2,'Bartender'),(3,'Cleaner'),(4,'Administrator');
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
  KEY `fk_hotel_t_1` (`UserID`),
  CONSTRAINT `fk_hotel_t_1` FOREIGN KEY (`UserID`) REFERENCES `user_t` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_t`
--

LOCK TABLES `hotel_t` WRITE;
/*!40000 ALTER TABLE `hotel_t` DISABLE KEYS */;
INSERT INTO `hotel_t` VALUES (1,'Total Recycling Pte Ltd','blk 311 jurong east street 32 #07-327',64426898,'1.234343','1.234343','-',1),(2,'something','213',987743,'1.234343','1.234343','-',4),(3,'Regent Hotel','blk 311 jurong east street 32 #07-327',64426898,'1.234343','1.234343','-',5),(4,'Some name','no address ',34334,'1.347998','103.72947999999997','',10),(5,'dfsdf','dfdsf',3242353,'1.347696','103.73287099999993','',11),(6,'company','dsfd',0,'1.2863936','103.82704710000007','Central',12);
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
  `JobRequirement` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`JobID`),
  UNIQUE KEY `JobID_UNIQUE` (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_t`
--

LOCK TABLES `job_t` WRITE;
/*!40000 ALTER TABLE `job_t` DISABLE KEYS */;
INSERT INTO `job_t` VALUES (1,1,4,8,'2014-02-08','2014-02-20 22:11:00','2014-02-21 02:50:00',279,2,2,'2.00','','2.00',NULL,NULL,2,'requiremetns here'),(2,1,4,8,'2014-02-08','2014-02-20 22:11:00','2014-02-21 02:50:00',279,2,2,'2.00','','2.00',NULL,NULL,2,'requiremetns here'),(3,1,4,8,'2014-02-08','2014-02-20 22:11:00','2014-02-21 02:50:00',279,2,2,'2.00','','2.00',NULL,NULL,2,'requiremetns here'),(4,1,4,8,'2014-02-20','2014-02-20 22:40:00','2014-02-21 22:40:00',1440,2,2,'2.00','2','2.00',NULL,NULL,3,'dfd'),(5,1,4,8,'2014-02-07','2014-02-07 22:50:00','2014-02-07 22:50:00',0,2,2,'2.00','2','2.00',NULL,NULL,2,'df'),(6,1,4,8,'2014-02-11','2014-02-11 20:25:00','2014-02-09 20:35:00',-2870,5,5,'5.50','2','6.00',NULL,NULL,0,'Some test requirmeents'),(7,1,4,8,'2014-02-12','2014-02-12 20:24:00','2014-02-13 20:40:00',1456,4,4,'4.00','','0.00',NULL,NULL,0,'dfd'),(8,1,4,8,'2014-02-14','2014-02-14 20:26:00','2014-02-09 20:45:00',-7181,4,4,'4.00','3','5.00',NULL,NULL,0,'test test ');
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
  `CheckIn` datetime DEFAULT NULL,
  `CheckOut` datetime DEFAULT NULL,
  `Pay` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`JobAppID`),
  UNIQUE KEY `JobAppID_UNIQUE` (`JobAppID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobapplicant_t`
--

LOCK TABLES `jobapplicant_t` WRITE;
/*!40000 ALTER TABLE `jobapplicant_t` DISABLE KEYS */;
INSERT INTO `jobapplicant_t` VALUES (1,3,6,'T',3,NULL,NULL,NULL,'2014-02-09 20:56:35','2014-02-09 21:00:24','25'),(2,2,7,'T',3,NULL,NULL,NULL,'2014-02-09 20:56:35','2014-02-09 21:00:26','0.10'),(3,1,4,'A',3,NULL,NULL,NULL,'2014-02-09 20:56:36','2014-02-09 21:00:22','50'),(4,4,5,'A',352,NULL,NULL,NULL,NULL,NULL,NULL),(5,5,6,'F',0,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,7,'C',0,NULL,NULL,NULL,'2014-02-09 21:52:02','2014-02-09 21:52:06','0.00'),(7,2,8,'T',0,NULL,NULL,NULL,'2014-02-09 21:52:03','2014-02-09 21:52:09','0.00'),(8,3,9,'T',0,NULL,NULL,NULL,'2014-02-09 21:58:49','2014-02-09 21:58:54','0.00');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scope_t`
--

LOCK TABLES `scope_t` WRITE;
/*!40000 ALTER TABLE `scope_t` DISABLE KEYS */;
INSERT INTO `scope_t` VALUES (1,'VIP Waiter','Serve VIP room',1),(2,'Normal waiter','Serve normal guests',1),(3,'VIP Bartender','VIP bar tender',2),(4,'Front counter bartender ','Serve drinks at front counter',2),(5,'Room Cleaner','Room Cleaner',3),(6,'Kicken cleaner','Cleans kichen',3),(7,'Sales Assistant','Assit Sales Department in various administration tasks',4),(8,'Logistics helper','Assist counting stock',4);
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
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  UNIQUE KEY `NRIC_UNIQUE` (`NRIC`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_t`
--

LOCK TABLES `user_t` WRITE;
/*!40000 ALTER TABLE `user_t` DISABLE KEYS */;
INSERT INTO `user_t` VALUES (1,3,'kenan','-','-','-','-','2014-01-30',0,'xinkenan.11@hotmail.com','$2y$10$2ahGQJV6ZXIJ5n9MDgDoReEv0mXjfKL8Aebk5jX4U39VbUfjBE5WC',0,NULL,NULL),(4,3,'kenan1','-','-','-','f4355e131d','2014-01-30',0,'souless88@hotmail.com','$2y$10$u57Jvuug7kQ5uJ0touI8pOrp8rLREh6CIAJajzXNrUZf8mtQbeoL6',0,NULL,NULL),(5,3,'regent','-','-','-','d266adda16','2014-02-01',0,'xinkenan2@hotmail.com','$2y$10$VbHXplWulRBtbtKYh2QHZudXq/AvE4Wb9hwM6SIstVrCbzkllPR62',0,NULL,NULL),(6,2,'test','kenan','xin','M','s8847411i','0000-00-00',92335137,'xinkenan@hotmail.com','110110',0,'english',NULL),(7,2,'test1','kenan1','ke','M','s7876543i','1988-04-17',98765678,'sinegubt@git,cin','1111',0,'enligsh',NULL),(8,2,'user3','user','three','f','s1235678b','1977-05-19',98341234,'xcfd@dfd','111111',444,'english',NULL),(9,2,'user4','user','four','f','s1234567j','0000-00-00',34234234,'dfdfddfd@dfdf','111111',444,'english',NULL),(10,3,'testuser2','-','-','-','fcdee01694','2014-02-10',0,'souer@hotmailc.com','$2y$10$J1sXhUJSQSIjpjPngQnc..7tLnJaJUFT8oqsTjFSWWGxjm4Q9C616',0,NULL,NULL),(11,3,'testsdfd','-','-','-','3fa5eacd80','2014-02-10',0,'somemail@hotmailc.om','$2y$10$hsTNqT9PqmFAiyzcsd4RFeiJvKjq05W8aRxOHNW284Jawc9WJ9rWy',0,NULL,NULL),(12,3,'sdfdsf','-','-','-','ccb29ef557','2014-02-10',0,'email@hotmail.com','$2y$10$AeBvHIGlqx/v7ARmSrO14.xRlkKaDmmCdu9fzzs18OZTa/F7Zd3Y2',0,NULL,NULL);
/*!40000 ALTER TABLE `user_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'fyp_imf'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `updateJobStatus` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8 */ ;;
/*!50003 SET character_set_results = utf8 */ ;;
/*!50003 SET collation_connection  = utf8_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`root`@`localhost`*/ /*!50106 EVENT `updateJobStatus` ON SCHEDULE EVERY 1 DAY STARTS '2014-02-08 15:41:20' ON COMPLETION NOT PRESERVE ENABLE DO -- Run automatically daily, set jobstatus=2 closed for application(cannot be cancelled by employer and applicants cannot quit) for jobs where 2 day before job start.
 UPDATE job_t SET JobStatus=2 WHERE JobDate < DATE_SUB(NOW(), INTERVAL 2 DAY) AND JobStatus!=3 */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'fyp_imf'
--
/*!50003 DROP PROCEDURE IF EXISTS `checkout` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkout`(
in app_id int)
BEGIN
UPDATE jobapplicant_t SET CheckOut=NOW(),MarkAsPresent='T',ExpHours=TIMESTAMPDIFF(MINUTE, CheckIn, NOW()) WHERE JobAppID=app_id;

-- set safe update off before it can be ran
-- This function is called during checkout, it checks job ids where job date < yesterday and mark all absentees as absent.
SET SQL_SAFE_UPDATES=0;
UPDATE jobapplicant_t join job_t ON jobapplicant_t.JobID = job_t.JobID SET 
    MarkAsPresent = 'F',
    ExpHours = 0
where
    JobDate <  DATE_SUB(CURDATE(),INTERVAL 1 DAY)
        AND MarkAsPresent = 'A'
        AND CheckIn IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `createJob` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `createJob`(
IN company_id int(10),
IN job_cat_id int(10),
IN job_scope_id int(10),
IN job_date varchar(100),
IN job_start_time varchar(100),
IN job_end_time varchar(100),
IN job_est_hours int(10),
IN vacancy int(10),
IN vacancy_left int(10),
IN standard_pay varchar(10),
IN min_exp_hours varchar (100),
IN bonus_pay varchar(10),
IN job_requirement varchar(300)
)
BEGIN
-- call create job (?,?,?,?,?,?,?,?,?,?,?,?,?) --
-- Total 14 parameters , 13 are passed in, 1 is default (JobStatus)
-- 0 pending -- 1.fufilled (all slots taken) 2.closed(applicants cannot cancell) 3.canclled. (cancelled by employee)
INSERT INTO job_t (
HotelID,CategoryID,ScopeID,JobDate,JobStartTime,JobEndTime,JobEstHours,JobSlotVacancy,JobSlotVacLeft,JobRate,JobMinEBRHours,JobEBR,JobStatus,JobRequirement)
VALUES (company_id, job_cat_id,job_scope_id,STR_TO_DATE(job_date,'%d-%M-%Y'),STR_TO_DATE(job_start_time,'%d-%M-%Y %k:%i'),STR_TO_DATE(job_end_time,'%d-%M-%Y %k:%i'),job_est_hours,vacancy,vacancy,standard_pay,min_exp_hours,bonus_pay,0,job_requirement);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_pay_average` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pay_average`(
IN company_id INT(10),
OUT weekly VARCHAR(100),
OUT monthly VARCHAR(100),
OUT quarterly varchar(100),
out yearly varchar(100)
)
BEGIN
select avg(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 Week) AND job_t.HotelID=company_id 
AND jobapplicant_t.MarkAsPresent='T' into weekly;
select avg(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 Month) AND job_t.HotelID=company_id 
AND jobapplicant_t.MarkAsPresent='T' into monthly;
select avg(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 quarter) AND job_t.HotelID=company_id 
AND jobapplicant_t.MarkAsPresent='T' into quarterly;
select avg(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 year) AND job_t.HotelID=company_id 
AND jobapplicant_t.MarkAsPresent='T' into yearly;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_pay_sum` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pay_sum`(
IN company_id INT(10),
OUT weekly VARCHAR(100),
OUT monthly VARCHAR(100),
OUT quarterly varchar(100),
out yearly varchar(100)
)
BEGIN

select sum(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 Week) AND job_t.HotelID=company_id into weekly;
select sum(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 Month) AND job_t.HotelID=company_id into monthly;
select sum(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 quarter) AND job_t.HotelID=company_id into quarterly;
select sum(pay) from jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID
where job_t.JobDate>=date_sub(curdate(),INTERVAL 1 year) AND job_t.HotelID=company_id into yearly;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `regUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `regUser`(
IN user_name varchar(50),
IN password varchar(255),
IN email varchar(50),
IN company_name varchar(50),
IN company_address varchar(64),
In user_random varchar(10),
IN company_contact int(10),
IN company_lat varchar(100),
IN company_long varchar(100),
In cardinal varchar(10)

)
BEGIN

insert into user_t (RoleID,Username,Password,Email,Firstname, Lastname, Gender, NRIC, DateOfBirth, MobileNo,IMFpin)
values (3,user_name,password,email,'-','-','-',user_random,curdate(),'000000',0000);

IF ROW_COUNT()>0
THEN insert into hotel_t (UserID,HotelName,HotelAddress,HotelContactNo,HotelLatitude,HotelLongitude,HotelCardinal)
values(LAST_INSERT_ID(),company_name,company_address,company_contact,company_lat,company_long,cardinal);
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

-- Dump completed on 2014-02-11  2:35:52
