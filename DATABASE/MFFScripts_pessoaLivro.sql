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
-- Table structure for table `pessoaLivro`
--

DROP TABLE IF EXISTS `pessoaLivro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoaLivro` (
  `idPessoa` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa`,`idLivro`),
  KEY `idLivro` (`idLivro`),
  CONSTRAINT `pessoaLivro_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`),
  CONSTRAINT `pessoaLivro_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `livro` (`idLivro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoaLivro`
--

LOCK TABLES `pessoaLivro` WRITE;
/*!40000 ALTER TABLE `pessoaLivro` DISABLE KEYS */;
INSERT INTO `pessoaLivro` VALUES (16,1),(16,2),(16,3),(16,4),(16,5),(11,6),(1094,6),(1095,6),(11,7),(12,7),(13,7),(11,8),(12,8),(13,8),(1094,8),(1096,8),(1097,8),(1098,8),(1099,8),(11,9),(11,10),(2,11),(5,11),(888,11),(1100,11),(1101,11),(1102,11),(1103,11),(1104,11),(1105,11),(1106,11),(1107,11),(11,12),(12,12),(13,12),(1,13),(1,14),(2,15),(5,15),(888,15),(1108,15),(11,16),(26,17),(838,17),(32,18),(24,19),(1109,19),(52,20),(1047,20),(1110,20),(1111,20),(1112,20),(1113,20),(1114,20),(1115,20),(1116,20),(1117,20),(1118,20),(1119,20),(1120,20),(1121,20),(52,21),(1122,21),(1123,21),(1124,21),(1125,21),(1126,21),(1127,21),(1128,21),(1129,21),(1130,21),(1131,21),(1132,21),(1133,21),(24,22),(24,23),(1134,23),(1135,23),(22,24),(72,25),(76,26),(76,27),(84,27),(905,27),(906,27),(63,28),(1136,28),(1137,28),(1138,28),(1139,29),(72,30),(1140,30),(167,31),(121,32),(308,32),(130,33),(131,33),(176,33),(1141,33),(147,34),(168,34),(108,35),(147,35),(965,35),(966,35),(967,35),(130,36),(176,36),(1142,36),(147,37),(952,37),(147,38),(952,38),(111,39),(121,39),(130,39),(121,40),(685,40),(121,41),(130,41),(603,41),(119,42),(120,42),(121,42),(119,43),(120,43),(121,43),(119,44),(121,44),(1143,44),(121,45),(250,45),(310,45),(121,46),(109,47),(111,47),(146,47),(147,47),(109,48),(111,48),(146,48),(147,48),(146,49),(818,49),(971,49),(146,50),(818,50),(146,51),(146,52),(146,53),(146,54),(146,55),(102,56),(135,56),(136,56),(102,57),(135,57),(130,58),(288,58),(1143,58),(146,59),(1144,59),(244,60),(147,61),(149,61),(765,61),(154,62),(147,63),(159,63),(1145,63),(147,64),(952,64),(146,65),(146,66),(818,66),(971,66),(146,67),(818,67),(130,68),(267,68),(1146,68),(1147,68),(441,69),(345,70),(431,70),(193,71),(193,72),(193,73),(193,74),(193,75),(193,76),(403,76),(1148,76),(193,77),(1149,77),(1150,77),(193,78),(1151,78),(353,79),(325,80),(1152,80),(1153,80),(1154,80),(1155,80),(1156,80),(325,81),(1152,81),(1153,81),(1154,81),(1155,81),(1156,81),(123,82),(977,82),(978,82),(979,82),(1157,82),(1158,82),(1159,82),(1160,82),(1161,82),(138,83),(277,83),(147,84),(149,84),(765,84),(345,85),(477,85),(986,85),(345,86),(476,86),(477,86),(977,87),(977,88),(359,89),(365,89),(424,89),(345,90),(1162,90),(437,91),(1163,91),(1164,91),(1165,91),(1166,91),(1167,91),(345,92),(393,92),(394,92),(359,93),(359,94),(348,95),(1168,95),(348,96),(1168,96),(149,97),(400,97),(149,98),(393,99),(348,100),(1168,100),(345,101),(477,101),(986,101),(372,102),(372,103),(1169,103),(345,104),(569,104),(484,105),(1067,105),(1170,105),(1171,105),(1172,105),(1173,105),(1174,105),(1175,105),(193,106),(523,106),(998,106),(138,107),(343,107),(331,108),(331,109),(193,110),(977,111),(193,112),(484,113),(193,114),(484,115),(1176,115),(193,116),(991,116),(1177,116),(1178,116),(1179,116),(348,117),(417,117),(1168,117),(193,118),(149,119),(193,120),(149,121),(457,121),(1180,121),(344,122),(345,122),(591,123),(591,124),(591,125),(591,126),(584,127),(611,128),(654,129),(718,129),(1181,129),(1182,129),(1183,129),(610,130),(1057,130),(419,131),(610,131),(654,132),(1184,132),(617,133),(1185,133),(121,134),(130,134),(603,134),(607,135),(630,136),(1186,136),(1187,136),(1188,136),(630,137),(1186,137),(1187,137),(1188,137),(676,138),(1189,138),(1190,138),(1191,138),(1192,138),(1193,138),(1194,138),(676,139),(677,139),(1195,139),(646,140),(647,140),(646,141),(647,141),(646,142),(1196,142),(1197,142),(646,143),(1198,143),(1199,143),(600,144),(642,144),(600,145),(642,145),(600,146),(642,146),(600,147),(642,147),(600,148),(642,148),(34,149),(1200,149),(1201,149),(646,150),(1202,150),(611,151),(34,152),(654,152),(617,153),(676,153),(1203,153),(1204,153),(1205,153),(1206,153),(1207,153),(1208,153),(1209,153),(1210,153),(28,154),(1067,154),(765,155),(1211,155),(765,156),(783,156),(132,157),(357,157),(775,157),(765,158),(765,159),(765,160),(787,160),(765,161),(787,161),(765,162),(766,162),(787,162),(147,163),(149,163),(765,163),(763,164),(765,164),(795,164),(796,164),(797,164),(775,165),(132,166),(357,166),(775,166),(765,167),(784,167),(1078,167),(765,168),(795,168),(1212,168),(1213,168),(169,169),(765,169),(765,170),(781,170),(787,170),(792,170),(795,170),(1085,170),(815,171),(769,172),(769,173),(775,173),(776,174),(765,175),(776,175),(776,176),(1089,176),(765,177),(1090,177),(760,178),(765,179),(794,179),(1090,179),(765,180),(767,180),(765,181),(767,181),(775,182),(802,182),(687,183),(989,183);
/*!40000 ALTER TABLE `pessoaLivro` ENABLE KEYS */;
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
