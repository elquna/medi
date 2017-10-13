-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: pact
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Future` text,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','MTIzNDU2',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cases` (
  `caseId` int(11) NOT NULL AUTO_INCREMENT,
  `PendingStatus` varchar(6) DEFAULT '0' COMMENT '0 for not started, 1 for not completed, 2 for completed',
  `Date` varchar(11) DEFAULT NULL,
  `EmergencyStatus` int(1) DEFAULT NULL,
  `HospitalNo` varchar(45) DEFAULT NULL,
  `temperature` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `bp` varchar(45) DEFAULT NULL,
  `ailment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`caseId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cases`
--

LOCK TABLES `cases` WRITE;
/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` VALUES (1,'1','21-08-2017',NULL,'HMS01','36','165','29','94/65',NULL),(2,'1','21-08-2017',NULL,'HMS02','30','125','34','193/81',NULL),(3,'1','23-08-2017',NULL,'HMS01','30','165','29','96/54',NULL),(4,'1','23-08-2017',NULL,'HMS04','56','156','29','122/7',NULL),(5,'1','24-08-2017',NULL,'HMS01','38','165','29','99/70',NULL),(6,'1','24-08-2017',NULL,'HMS02','70','125','34','100/75',NULL),(7,'1','24-08-2017',NULL,'HMS04','40','156','29','180/15',NULL),(8,'1','24-08-2017',NULL,'HMS04','89','156','29','158/19',NULL),(9,'1','25-08-2017',NULL,'HMS03','40','145','30','184/140',NULL),(10,'1','25-08-2017',NULL,'HMS03','38','145','30','170/65',NULL),(11,'1','13-10-2017',NULL,'HMS01','30','165','29','190/199',NULL),(12,'1','13-10-2017',NULL,'HMS01','30','165','29','190/199',NULL),(13,'0','13-10-2017',NULL,'HMS04','38','156','29','60/90',NULL);
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cough`
--

DROP TABLE IF EXISTS `cough`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cough` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `caseId` int(11) DEFAULT NULL,
  `bp` varchar(45) DEFAULT NULL,
  `dbw` varchar(45) DEFAULT NULL,
  `rdb` varchar(45) DEFAULT NULL,
  `rr` varchar(45) DEFAULT NULL,
  `ca` varchar(45) DEFAULT NULL,
  `brw` varchar(45) DEFAULT NULL,
  `cu` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cough`
--

LOCK TABLES `cough` WRITE;
/*!40000 ALTER TABLE `cough` DISABLE KEYS */;
INSERT INTO `cough` VALUES (1,1,'94/65','yes','yes','yes','yes','yes','yes'),(2,3,'96/54','yes','yes','yes','yes','yes','yes'),(3,2,'193/81','yes','yes','yes','yes','yes','yes'),(4,9,'184/140','yes','yes','yes','yes','yes','yes'),(5,10,'170/65','yes','yes','yes','yes','yes','yes');
/*!40000 ALTER TABLE `cough` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fevertests`
--

DROP TABLE IF EXISTS `fevertests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fevertests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospitalno` varchar(11) DEFAULT NULL,
  `dca` varchar(45) DEFAULT NULL COMMENT 'drowsiness, confusion or agitation',
  `bp` varchar(45) DEFAULT NULL,
  `rdu` varchar(45) DEFAULT NULL COMMENT 'reduced and dark urine',
  `nsm` varchar(45) DEFAULT NULL COMMENT 'neck stiffness megnism',
  `sap` varchar(45) DEFAULT NULL COMMENT 'severe abdominal pain',
  `ebb` varchar(45) DEFAULT NULL COMMENT 'easy bleeding or bruising',
  `jaundice` varchar(45) DEFAULT NULL,
  `db` varchar(45) DEFAULT NULL COMMENT 'difficulty in breathing and rate less than 25',
  `uts` varchar(45) DEFAULT NULL COMMENT 'unable to sit or walk',
  `caseid` int(11) DEFAULT NULL,
  `temperature` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fevertests`
--

LOCK TABLES `fevertests` WRITE;
/*!40000 ALTER TABLE `fevertests` DISABLE KEYS */;
INSERT INTO `fevertests` VALUES (1,'HMS04','yes','122/7','yes','yes','yes','yes','yes','yes','yes',4,'56'),(2,'HMS01','yes','94/65','yes','yes','yes','yes','yes','yes','yes',1,'36'),(3,'HMS01',NULL,'99/70',NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'38'),(4,'HMS02','no','100/75','no','no','no','no','no','no','no',6,'70'),(5,'HMS04','yes','180/15','yes','yes','yes','yes','yes','yes','yes',7,'40'),(6,'HMS04','no','158/19','no','no','no','no','no','no','no',8,'89'),(7,'HMS03','no','184/140','no','no','no','no','no','no','no',9,'40'),(8,'HMS03','no','170/65','no','no','no','no','no','no','no',10,'38'),(9,'HMS01',NULL,'190/199',NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,'30'),(10,'HMS01','yes','190/199','yes','no','no','yes','yes','no','no',11,'30');
/*!40000 ALTER TABLE `fevertests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `PatientId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `HospitalNo` varchar(10) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` text,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `Genotype` varchar(10) DEFAULT NULL,
  `Passport` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `BirthDate` varchar(20) DEFAULT NULL,
  `StateOfOrigin` varchar(30) DEFAULT NULL,
  `Lga` varchar(30) DEFAULT NULL,
  `Nationality` varchar(30) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PatientId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'Deborah','Cox','HMS01','081297231839','12 southern California road, Usa','O','A+',NULL,'Female','29','Califonia','Areus','USA','123456','165'),(2,'Patrick','Simon','HMS02','080392319089','77  umuhia road calabar','AB','a+',NULL,'male','34','Edo','Esan South','Nigerian','123456','125'),(3,'Patrick','Onen','HMS03','070392219259','12 Ekpo abasi street calabar','o','A',NULL,'Male','30','Cross River','Obudu','Nigerian','1234','145'),(4,'Emem','James','HMS04','080323222332','90 Marian calabar','O','AB',NULL,'Female','29','Akwa ibom','ikot ekpene','Nigerian','123456','156');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendingcases`
--

DROP TABLE IF EXISTS `pendingcases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendingcases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caseid` int(11) DEFAULT NULL,
  `treatment` text,
  `level` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL COMMENT '0 for pending, 1 for closed',
  `ailment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendingcases`
--

LOCK TABLES `pendingcases` WRITE;
/*!40000 ALTER TABLE `pendingcases` DISABLE KEYS */;
INSERT INTO `pendingcases` VALUES (3,3,'Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens',2,'1','cough'),(4,3,'Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens',2,'1','cough'),(5,3,'Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens',2,'1','cough'),(6,4,'Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens',2,'1','fever'),(7,4,'Give soduim chloride 0.9% 500mL IV 6 hourly . Stop if breathing worsens',2,'1','fever'),(8,4,'give ampicillin 2g IV',2,'1','fever'),(9,4,'Give 250mL of Glucose 10% IV. Repeat if glucose still',2,'1','fever'),(10,3,'	Insert lubricated ribbon guaze or guaze soaked in 1mg of adrenaline diluted in 200ml saline into bleeding nostril(s)',4,'1','Runny/blocked nose'),(11,9,'	Insert lubricated ribbon guaze or guaze soaked in 1mg of adrenaline diluted in 200ml saline into bleeding nostril(s)',4,'1','Runny/blocked nose'),(12,10,'	Insert lubricated ribbon guaze or guaze soaked in 1mg of adrenaline diluted in 200ml saline into bleeding nostril(s)',4,'1','Runny/blocked nose'),(13,11,'	Insert lubricated ribbon guaze or guaze soaked in 1mg of adrenaline diluted in 200ml saline into bleeding nostril(s)',4,'1','Runny/blocked nose');
/*!40000 ALTER TABLE `pendingcases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `StaffId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `StaffType` varchar(20) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` text,
  `Status` varchar(20) DEFAULT 'Active',
  `Level` int(11) NOT NULL,
  PRIMARY KEY (`StaffId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Mende','Paul','Doc','123456','MEDICAL-OFFICER','08065519717','78 umo orok street calabar','Active',4),(2,'Ruth','James','nur','123456','NURSE','07039201829','11 moore road calabar','Active',3),(3,'Sarah','Ajah','mid','123456','MID-WIFE','07039201678','88 Umuahia road Aba','Active',3),(4,'Patrick','Sunday','cho','123456','CHO','07039201856','9 Palace road , calabar','Active',3),(5,'Uduak','Eyo','chew','123456','CHEW','07039201567','112 old odukpani road clabar','Active',2),(6,'Emene','Paul','jchew','123456','JCHEW','07039102923','90 Ikpa road uyo','Active',1);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pact'
--

--
-- Dumping routines for database 'pact'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-13 13:04:51
