CREATE DATABASE  IF NOT EXISTS `MFFScripts` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `MFFScripts`;
-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: MFFScripts
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `capituloLivro`
--

DROP TABLE IF EXISTS `capituloLivro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capituloLivro` (
  `idCapituloLivro` int(11) NOT NULL AUTO_INCREMENT,
  `idEditora` int(11) DEFAULT NULL,
  `ano` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idCapituloLivro`),
  KEY `idEditora` (`idEditora`),
  CONSTRAINT `capituloLivro_ibfk_1` FOREIGN KEY (`idEditora`) REFERENCES `editora` (`idEditora`)
) ENGINE=InnoDB AUTO_INCREMENT=494 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capituloLivro`
--

LOCK TABLES `capituloLivro` WRITE;
/*!40000 ALTER TABLE `capituloLivro` DISABLE KEYS */;
INSERT INTO `capituloLivro` VALUES (1,1,2012),(2,1,2012),(3,2,2015),(4,2,2015),(5,1,2012),(6,2,2015),(7,3,2014),(8,1,2012),(9,4,2014),(10,4,2014),(11,5,2013),(12,4,2014),(13,5,2013),(14,6,2012),(15,7,2016),(16,4,2016),(17,8,2015),(18,8,2011),(19,9,2015),(20,9,2013),(21,10,2013),(22,10,2013),(23,10,2013),(24,10,2013),(25,11,2012),(26,10,2013),(27,10,2013),(28,12,2015),(29,13,2012),(30,14,2014),(31,11,2011),(32,15,2014),(33,16,2015),(34,17,2014),(35,18,2014),(36,19,2012),(37,19,2016),(38,20,2011),(39,16,2012),(40,21,2014),(41,22,2012),(42,23,2016),(43,24,2010),(44,25,2016),(45,26,2016),(46,27,2011),(47,28,2014),(48,29,2013),(49,27,2011),(50,30,2015),(51,30,2015),(52,30,2012),(53,31,2012),(54,32,2015),(55,29,2013),(56,29,2013),(57,31,2012),(58,29,2013),(59,33,2012),(60,29,2015),(61,29,2012),(62,29,2013),(63,27,2011),(64,27,2011),(65,34,2013),(66,35,2011),(67,36,2015),(68,29,2013),(69,30,2015),(70,30,2015),(71,29,2013),(72,29,2013),(73,29,2013),(74,29,2014),(75,27,2011),(76,21,2014),(77,30,2012),(78,27,2011),(79,37,2013),(80,38,2015),(81,30,2011),(82,32,2014),(83,39,2013),(84,36,2012),(85,27,2014),(86,21,2013),(87,29,2013),(88,27,2011),(89,30,2012),(90,40,2011),(91,30,2014),(92,41,2014),(93,29,2013),(94,42,2015),(95,27,2011),(96,29,2012),(97,32,2014),(98,29,2013),(99,29,2013),(100,29,2013),(101,29,2013),(102,27,2011),(103,29,2013),(104,29,2013),(105,29,2013),(106,29,2013),(107,30,2015),(108,29,2013),(109,40,2011),(110,30,2014),(111,21,2013),(112,29,2013),(113,29,2015),(114,29,2013),(115,43,2014),(116,33,2012),(117,29,2014),(118,27,2011),(119,29,2015),(120,27,2011),(121,30,2011),(122,36,2012),(123,29,2013),(124,40,2011),(125,32,2014),(126,29,2012),(127,29,2015),(128,29,2015),(129,30,2011),(130,29,2010),(131,29,2010),(132,29,2010),(133,29,2010),(134,29,2010),(135,44,2016),(136,29,2010),(137,29,2010),(138,37,2016),(139,37,2016),(140,45,2016),(141,46,2016),(142,29,2010),(143,29,2010),(144,29,2010),(145,29,2016),(146,26,2012),(147,47,2013),(148,48,2013),(149,49,2013),(150,50,2015),(151,51,2014),(152,52,2014),(153,53,2014),(154,32,2012),(155,54,2014),(156,52,2014),(157,51,2014),(158,52,2014),(159,52,2014),(160,55,2013),(161,52,2014),(162,56,2015),(163,57,2013),(164,58,2015),(165,48,2015),(166,48,2014),(167,48,2012),(168,32,2015),(169,59,2015),(170,60,2015),(171,32,2012),(172,61,2011),(173,60,2015),(174,62,2015),(175,32,2012),(176,63,2015),(177,64,2012),(178,32,2012),(179,65,2013),(180,66,2015),(181,63,2015),(182,66,2015),(183,60,2015),(184,67,2013),(185,48,2012),(186,48,2015),(187,29,2013),(188,68,2013),(189,32,2014),(190,32,2014),(191,32,2014),(192,66,2015),(193,32,2012),(194,62,2015),(195,48,2012),(196,48,2014),(197,69,2014),(198,70,2015),(199,71,2013),(200,72,2014),(201,26,2012),(202,32,2012),(203,73,2011),(204,54,2015),(205,74,2015),(206,62,2015),(207,62,2015),(208,32,2015),(209,49,2015),(210,52,2014),(211,54,2013),(212,43,2011),(213,32,2012),(214,75,2011),(215,53,2015),(216,32,2012),(217,49,2015),(218,30,2011),(219,32,2012),(220,32,2012),(221,32,2015),(222,32,2014),(223,32,2012),(224,76,2015),(225,32,2013),(226,50,2015),(227,48,2012),(228,51,2014),(229,57,2012),(230,48,2015),(231,48,2015),(232,48,2012),(233,32,2012),(234,32,2011),(235,32,2011),(236,32,2014),(237,33,2012),(238,32,2014),(239,32,2015),(240,76,2015),(241,32,2014),(242,33,2012),(243,77,2012),(244,32,2012),(245,78,2014),(246,51,2011),(247,66,2015),(248,60,2015),(249,49,2015),(250,76,2015),(251,29,2013),(252,60,2015),(253,53,2015),(254,51,2011),(255,48,2012),(256,79,2011),(257,54,2016),(258,32,2010),(259,32,2010),(260,32,2010),(261,32,2010),(262,80,2010),(263,32,2010),(264,32,2010),(265,32,2010),(266,32,2010),(267,32,2010),(268,32,2010),(269,32,2010),(270,32,2010),(271,32,2010),(272,32,2010),(273,32,2010),(274,64,2016),(275,32,2010),(276,62,2016),(277,32,2010),(278,62,2016),(279,81,2016),(280,62,2016),(281,53,2016),(282,82,2016),(283,32,2916),(284,81,2016),(285,83,2016),(286,45,2010),(287,32,2016),(288,32,2016),(289,84,2016),(290,32,2016),(291,32,2016),(292,85,2010),(293,81,2016),(294,57,2016),(295,80,2010),(296,49,2016),(297,86,2015),(298,87,2012),(299,88,2015),(300,89,2015),(301,90,2016),(302,86,2016),(303,91,2012),(304,51,2015),(305,51,2015),(306,51,2015),(307,92,2015),(308,51,2015),(309,93,2011),(310,94,2013),(311,8,2011),(312,95,2014),(313,96,2012),(314,91,2012),(315,80,2015),(316,97,2011),(317,98,2011),(318,99,2013),(319,100,2015),(320,59,2015),(321,101,2014),(322,59,2015),(323,59,2013),(324,91,2012),(325,102,2011),(326,103,2012),(327,104,2012),(328,93,2011),(329,29,2013),(330,105,2015),(331,106,2011),(332,51,2015),(333,93,2012),(334,8,2011),(335,80,2015),(336,107,2012),(337,80,2015),(338,93,2011),(339,108,2012),(340,51,2011),(341,109,2014),(342,110,2011),(343,80,2015),(344,7,2016),(345,111,2010),(346,7,2016),(347,101,2010),(348,112,2010),(349,101,2010),(350,101,2010),(351,101,2010),(352,101,2010),(353,101,2010),(354,80,2016),(355,113,2016),(356,80,2016),(357,114,2016),(358,115,2016),(359,80,2016),(360,80,2016),(361,116,2016),(362,117,2016),(363,118,2010),(364,119,2016),(365,80,2010),(366,120,2010),(367,55,2010),(368,80,2016),(369,80,2016),(370,121,2016),(371,80,2016),(372,122,2012),(373,98,2011),(374,27,2011),(375,7,2015),(376,7,2015),(377,32,2014),(378,123,2013),(379,29,2013),(380,49,2015),(381,36,2012),(382,36,2011),(383,124,2015),(384,36,2012),(385,125,2014),(386,30,2011),(387,126,2014),(388,127,2014),(389,123,2013),(390,29,2014),(391,123,2014),(392,29,2012),(393,128,2015),(394,29,2012),(395,29,2011),(396,129,2011),(397,86,2015),(398,130,2012),(399,130,2012),(400,131,2011),(401,36,2012),(402,29,2011),(403,130,2012),(404,132,2013),(405,133,2015),(406,30,2011),(407,30,2012),(408,29,2014),(409,29,2014),(410,36,2013),(411,130,2012),(412,29,2014),(413,32,2014),(414,36,2012),(415,49,2015),(416,36,2012),(417,36,2012),(418,134,2012),(419,30,2011),(420,98,2011),(421,135,2013),(422,111,2011),(423,98,2011),(424,123,2013),(425,29,2011),(426,136,2013),(427,53,2014),(428,49,2015),(429,98,2011),(430,137,2014),(431,137,2014),(432,98,2011),(433,138,2012),(434,139,2011),(435,30,2012),(436,36,2012),(437,57,2012),(438,30,2011),(439,140,2013),(440,32,2014),(441,123,2013),(442,141,2015),(443,36,2012),(444,76,2015),(445,49,2015),(446,29,2011),(447,30,2012),(448,8,2011),(449,30,2011),(450,98,2011),(451,123,2013),(452,123,2014),(453,123,2013),(454,29,2012),(455,27,2014),(456,27,2014),(457,7,2015),(458,48,2012),(459,49,2014),(460,30,2012),(461,36,2012),(462,123,2013),(463,142,2016),(464,54,0),(465,143,2016),(466,39,2010),(467,39,2010),(468,144,2010),(469,86,2016),(470,29,2016),(471,145,2010),(472,98,2010),(473,98,2010),(474,29,2010),(475,9,2016),(476,146,2010),(477,32,2010),(478,147,2010),(479,30,2010),(480,30,2010),(481,30,2010),(482,30,2010),(483,30,2010),(484,30,2010),(485,30,2010),(486,148,2010),(487,148,2010),(488,30,2010),(489,101,2010),(490,101,2010),(491,111,2010),(492,149,2010),(493,101,2010);
/*!40000 ALTER TABLE `capituloLivro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-08 11:25:16
