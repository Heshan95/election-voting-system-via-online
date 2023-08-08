-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: general_election
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','1234','developer1@gmail.com'),(2,'abc','1234','user@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `district` (
  `iddistrict` int NOT NULL AUTO_INCREMENT,
  `district` varchar(45) NOT NULL,
  `population` int DEFAULT NULL,
  `province_idprovince` int NOT NULL,
  PRIMARY KEY (`iddistrict`),
  KEY `fk_district_province1_idx` (`province_idprovince`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_idprovince`) REFERENCES `province` (`idprovince`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'Kandy (Mahanuwara)',40,1),(2,'Matale',30,1),(3,'Nuwara Eliya',30,1),(4,'Ampara (Digamadulla)',30,2),(5,'Batticaloa',40,2),(6,'Trincomalee',30,2),(7,'Jaffna ',50,3),(8,'Wanni',50,3),(9,'Anuradhapura',60,7),(10,'Polonnaruwa',40,7),(11,'Kurunegala',70,6),(12,'Puttalama',30,6),(13,'Kegalle',60,9),(14,'Ratnepura',40,9),(15,'Galle',30,4),(16,'Hambantota',30,4),(17,'Matara',40,4),(18,'Badulla',60,8),(19,'Monaragala',40,8),(20,'Colombo',70,5),(21,'Gampaha',50,5),(22,'Kalutara',30,5);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `division` (
  `iddivision` int NOT NULL AUTO_INCREMENT,
  `division` varchar(45) NOT NULL,
  `population` int DEFAULT NULL,
  `district_iddistrict` int NOT NULL,
  PRIMARY KEY (`iddivision`),
  KEY `fk_division_district1_idx` (`district_iddistrict`),
  CONSTRAINT `fk_division_district1` FOREIGN KEY (`district_iddistrict`) REFERENCES `district` (`iddistrict`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division`
--

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` VALUES (1,'Galagedara',8,1),(2,'Gampola',8,1),(3,'Harispattuwa',8,1),(4,'Hewaheta',8,1),(5,'Kandy',8,1),(6,'Akmeemana',5,15),(7,'Ambalangoda',5,15),(8,'Baddegama',5,15),(9,'Balapitiya',5,15),(10,'Bentara Elpitiya',5,15),(11,'Galle',5,15),(12,'Avissawella',10,20),(13,'Borella',10,20),(14,'Colombo - Central',10,20),(15,'Colombo - East',10,20),(16,'Colombo - North',10,20),(17,'Colombo - West',10,20),(18,'Dehiwala',10,20),(19,'Homagama',10,20),(20,'Kaduwela',10,20),(21,'Kesbewa',10,20),(22,'Agalawatta',5,22),(23,'Bandaragama',5,22),(24,'Bulatsinhala',5,22),(25,'Beruwala',5,22),(26,'Horana',5,22),(27,'Mathugama',5,22);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `election_year`
--

DROP TABLE IF EXISTS `election_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `election_year` (
  `idelection_year` int NOT NULL AUTO_INCREMENT,
  `year` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idelection_year`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `election_year`
--

LOCK TABLES `election_year` WRITE;
/*!40000 ALTER TABLE `election_year` DISABLE KEYS */;
INSERT INTO `election_year` VALUES (1,'2021 - General Election');
/*!40000 ALTER TABLE `election_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `electors`
--

DROP TABLE IF EXISTS `electors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `electors` (
  `idelectors` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `parties_idparties` int NOT NULL,
  `district` int DEFAULT NULL,
  PRIMARY KEY (`idelectors`),
  KEY `fk_electors_parties1_idx` (`parties_idparties`),
  KEY `fk` (`district`),
  CONSTRAINT `fk` FOREIGN KEY (`district`) REFERENCES `district` (`iddistrict`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_electors_parties1` FOREIGN KEY (`parties_idparties`) REFERENCES `parties` (`idparties`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `electors`
--

LOCK TABLES `electors` WRITE;
/*!40000 ALTER TABLE `electors` DISABLE KEYS */;
INSERT INTO `electors` VALUES (1,'Amal Santha Bandara','politician 3.png',1,20),(2,'Santha Kasturiarachchi','politician 1.png',1,20),(3,'Vipula Guneratne','politician 2.png',1,20),(4,'Nishantha Perera','politician 5.png',1,20),(5,'Kamala Haris','politician 4.png',4,20),(6,'Rejinold Koore','politician 7.png',4,20),(7,'Damith Weerasinghe','politician 8.png',4,20),(8,'Gamini Thilakesiri','politician 3.png',4,20),(9,'Nishantha Fernando','politician 1.png',2,20),(10,'Wasantha Yapa','politician 2.png',2,20),(11,'Namal Perera','politician 5.png',2,20),(12,'Santha Bandara','politician 7.png',2,20),(13,'Nimanthi Perera','politician 8.png',3,20),(14,'Deshan Perera','politician 5.png',3,20),(15,'Kamal Perera','politician 7.png',3,20),(16,'Wimal Perea','politician 3.png',3,20),(17,'Deshan de Silva','politician 5.png',1,22),(18,'Kamal Rajapaksha','politician 7.png',1,22),(19,'Nayana Nethu','politician 3.png',1,22),(20,'Gayan Silva','politician 1.png',1,22),(21,'Tilan Fernando','politician 5.png',2,22),(22,'Chandima Wsy','voter1.png',2,22),(23,'Saman Kumara','politician 8.png',2,22),(24,'Nimal SIripala','politician 4.png',2,22),(25,'Ajith P. Perera','politician 6.png',3,22),(26,'Kapila Perera','politician 7.png',3,22),(27,'Nalin Perera','politician 2.png',3,22),(28,'Nilan Singhe','politician 8.png',3,22),(29,'Sumana Gomes','voter1.png',4,22),(30,'Kumudu Pradeepa','politician 8.png',4,22),(31,'Nihal Silva','politician 5.png',4,22),(32,'Deshan Kumara','politician 2.png',4,22);
/*!40000 ALTER TABLE `electors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gramaniladari_division`
--

DROP TABLE IF EXISTS `gramaniladari_division`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gramaniladari_division` (
  `idgramaniladari_division` int NOT NULL AUTO_INCREMENT,
  `gn_division` varchar(45) NOT NULL,
  `population` int DEFAULT NULL,
  `division_iddivision` int NOT NULL,
  PRIMARY KEY (`idgramaniladari_division`),
  KEY `fk_gramaniladari_division_division1_idx` (`division_iddivision`),
  CONSTRAINT `fk_gramaniladari_division_division1` FOREIGN KEY (`division_iddivision`) REFERENCES `division` (`iddivision`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gramaniladari_division`
--

LOCK TABLES `gramaniladari_division` WRITE;
/*!40000 ALTER TABLE `gramaniladari_division` DISABLE KEYS */;
INSERT INTO `gramaniladari_division` VALUES (1,'Colombo A',5,14),(2,'Colombo B',5,15),(3,'Colombo C',5,17),(4,'Colombo D',5,16),(5,'Dehiwala A',5,18),(6,'Homagama A',5,19),(7,'Horana A',5,23),(8,'Mathugama A',5,27),(9,'Gangawata Korale A',5,5),(10,'Kundasale A',5,3),(11,'Kundasale B',5,4),(12,'Kumbalwella South',5,11),(13,'Mahamodara',5,25),(14,'Galwadugoda',5,6);
/*!40000 ALTER TABLE `gramaniladari_division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parties`
--

DROP TABLE IF EXISTS `parties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parties` (
  `idparties` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `logo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `colour` varchar(45) NOT NULL,
  PRIMARY KEY (`idparties`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parties`
--

LOCK TABLES `parties` WRITE;
/*!40000 ALTER TABLE `parties` DISABLE KEYS */;
INSERT INTO `parties` VALUES (1,'Sri Lanka Podujana Peramuna','slpp.png','maroon'),(2,'United National Party','unp.png','green'),(3,'Jathika Jana balawegaya','jjb.png','purple'),(4,'Sri Lanka Freedom Party','slfp.png','blue');
/*!40000 ALTER TABLE `parties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `idprovince` int NOT NULL AUTO_INCREMENT,
  `province` varchar(45) NOT NULL,
  `population` int DEFAULT NULL,
  PRIMARY KEY (`idprovince`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Central Province ',100),(2,'Eastern Province ',100),(3,'Northern Province ',100),(4,'Southern Province',100),(5,'Western Province',150),(6,'North Western Province',100),(7,'North Central Province ',100),(8,'Uva Province',100),(9,'Sabaragamuwa Province',100);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vote` (
  `idvote` int NOT NULL AUTO_INCREMENT,
  `elector1` int DEFAULT NULL,
  `elector2` int DEFAULT NULL,
  `elector3` int DEFAULT NULL,
  `province_idprovince` int NOT NULL,
  `district_iddistrict` int NOT NULL,
  `division_iddivision` int NOT NULL,
  `gramaniladari_division_idgramaniladari_division` int NOT NULL,
  `party` int NOT NULL,
  PRIMARY KEY (`idvote`),
  KEY `fk_vote_province1_idx` (`province_idprovince`),
  KEY `fk_vote_district1_idx` (`district_iddistrict`),
  KEY `fk_vote_division1_idx` (`division_iddivision`),
  KEY `fk_vote_gramaniladari_division1_idx` (`gramaniladari_division_idgramaniladari_division`),
  KEY `party` (`party`),
  CONSTRAINT `FK_vote_district` FOREIGN KEY (`district_iddistrict`) REFERENCES `district` (`iddistrict`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vote_division` FOREIGN KEY (`division_iddivision`) REFERENCES `division` (`iddivision`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vote_gramaniladari_division` FOREIGN KEY (`gramaniladari_division_idgramaniladari_division`) REFERENCES `gramaniladari_division` (`idgramaniladari_division`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vote_parties` FOREIGN KEY (`party`) REFERENCES `parties` (`idparties`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_vote_province` FOREIGN KEY (`province_idprovince`) REFERENCES `province` (`idprovince`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (1,1,2,3,1,22,10,5,4),(2,1,2,4,5,22,23,7,1),(3,2,1,3,5,22,23,7,1),(4,11,21,23,5,22,23,7,2),(5,25,26,27,5,22,26,7,3);
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voter_registration`
--

DROP TABLE IF EXISTS `voter_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voter_registration` (
  `idvoter_registration` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '',
  `province_idprovince` int NOT NULL,
  `district_iddistrict` int NOT NULL,
  `division_iddivision` int NOT NULL,
  `gn_division` int NOT NULL,
  PRIMARY KEY (`idvoter_registration`),
  UNIQUE KEY `nic_UNIQUE` (`nic`),
  KEY `fk_voter_registration_province_idx` (`province_idprovince`),
  KEY `fk_voter_registration_district1_idx` (`district_iddistrict`),
  KEY `fk_voter_registration_division1_idx` (`division_iddivision`),
  KEY `Ffk` (`gn_division`),
  CONSTRAINT `Ffk` FOREIGN KEY (`gn_division`) REFERENCES `gramaniladari_division` (`idgramaniladari_division`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_voter_registration_district1` FOREIGN KEY (`district_iddistrict`) REFERENCES `district` (`iddistrict`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_voter_registration_division1` FOREIGN KEY (`division_iddivision`) REFERENCES `division` (`iddivision`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_voter_registration_province` FOREIGN KEY (`province_idprovince`) REFERENCES `province` (`idprovince`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voter_registration`
--

LOCK TABLES `voter_registration` WRITE;
/*!40000 ALTER TABLE `voter_registration` DISABLE KEYS */;
INSERT INTO `voter_registration` VALUES (1,'Damith Priyan','950551151V','NO: 03, Halapitiya, Welmilla','voter 8.png',5,22,23,7),(2,'Deepika Angel','960551151V','No: 14/7, High Level Rd, Wellawatta','voter1.png',5,20,13,5);
/*!40000 ALTER TABLE `voter_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'general_election'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-30 16:53:47
