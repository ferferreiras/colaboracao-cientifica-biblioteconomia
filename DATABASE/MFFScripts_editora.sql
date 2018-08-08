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
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editora` (
  `idEditora` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idEditora`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Gráfica e Editora Santa Teresa'),(2,'Lighthouse'),(3,'CCTA'),(4,'Instituto Santa Teresa'),(5,'Estação das Letras e Cores Editora'),(6,'Jornal O Lince'),(7,'Springer International Publishing'),(8,'Editora Sociologia e Política'),(9,'Sulina'),(10,'Bristol; Intellect Books'),(11,'Edições Cine-Club de Avanca'),(12,'Congresso Ibero-Americano de Comunicação'),(13,'Altamira Editorial'),(14,'Bonilla Artigas Editores'),(15,'EDUFPE'),(16,'Annablume'),(17,'Governo do Estado de São Paulo; Fundação Escola de Sociologia e Política de São Paulo'),(18,'Editora Livraria da Física'),(19,'Editora a lápis'),(20,'Rizoma Editorial'),(21,'Universidade Federal do ABC'),(22,'UNICAMP/PRDU'),(23,'Paco Editorial'),(24,'Global Editora e Distribuidora Ltda'),(25,'Prismas'),(26,'Alameda Casa Editorial'),(27,'EDUFSCar'),(28,'Elsevier'),(29,'Pedro e João Editores'),(30,'Editora Alínea'),(31,'Hucitec Editora'),(32,'Cultura Acadêmica'),(33,'Colegio de Traductores Públicos de la Ciudad de Buenos Aires'),(34,'UFMS'),(35,'FAPESP'),(36,'E-papers'),(37,'Junqueira e Marin'),(38,'IBICT'),(39,'Compacta'),(40,'EDUEPB'),(41,'Universitá de Alcalá'),(42,'Oficina Universitária'),(43,'UNAM'),(44,'ECI/UFMG'),(45,'Compacta Gráfica e Editora'),(46,'Rowman & Littlefield Publishers'),(47,'AAB'),(48,'Editora UFC'),(49,'Editora da UFPB'),(50,'ABECIN'),(51,'Thesaurus'),(52,'FUNDEPE'),(53,'Interciência'),(54,'EDUFBA'),(55,'EDUFF'),(56,'Universidad Complutense de Madrid'),(57,'Eduel'),(58,'Nova Terra'),(59,'IGI Global'),(60,'FCI/UnB'),(61,'Usina de Letras'),(62,'Uni-FACEF'),(63,'FUESPI'),(64,'ARQ-SP'),(65,'AAB/MAST'),(66,'Fundação Casa de Rui Barbosa'),(67,'Editorial Universitaria Ramón Areces'),(68,'Cultura Ecônomica'),(69,'Prof. P. Ranasinghe Foundation'),(70,'Enriched Publications Pvt.Ltd'),(71,'Creapress servicios integrales S.L. Valdemoro'),(72,'A. K. Publications'),(73,'Pinacoteca'),(74,'Canal 6'),(75,'Idea'),(76,'Editora UnB'),(77,'MAST'),(78,'Museu de Astronomia e Ciências Afins'),(79,'Prensas Universitarias de Zaragoza'),(80,'ECA/USP'),(81,'UNESP'),(82,'CICEES Ediciones'),(83,'Faculdade de Letras da Universidade do Porto'),(84,'USP'),(85,'Idéia'),(86,'Pontes Editores'),(87,'CCE/UFSC'),(88,'PPGCI - ECA/USP'),(89,'USP-PRCEU; TUSP; LIM CAC'),(90,'Academia'),(91,'Uninove - CAPES'),(92,'Conselho Federal de Biblioteconomia'),(93,'Ateliê Editorial'),(94,'Apple arts centre'),(95,'UNINOVE'),(96,'Intech'),(97,'Ática'),(98,'Alphabeto'),(99,'ACERP/TV Escola'),(100,'UEPG/PROEX'),(101,'Senac'),(102,'Mais Projetos Gestão e Capacitação Socioambiental'),(103,'Edgard Blucher'),(104,'Fundação casa de Rui Barbosa/Itaú Cultural'),(105,'Cultura Médica'),(106,'Edição dos Autores'),(107,'Cris Correa Editorial Ltda'),(108,'alameda'),(109,'Beco do Azougue Editorial Ltda'),(110,'Hedra'),(111,'Alfagrama'),(112,'NÉCTAR'),(113,'Livre Expressão'),(114,'Imprensa Oficial'),(115,'Ministério da educação. Secretaria de Educação Básica'),(116,'São Mateus em Movimento'),(117,'Barbatana'),(118,'Editora PD'),(119,'Cultor de Livros'),(120,'FFLCH/USP'),(121,'CRV'),(122,'DCI-UFSCAR'),(123,'Todas as musas'),(124,'Lambert Lucas'),(125,'NUPILL'),(126,'FFCLRP-USP'),(127,'Cirkula'),(128,'Universidade do Porto'),(129,'Editora da UFRGS'),(130,'7Letras'),(131,'Editora CBV'),(132,'Mercado de Letras'),(133,'Edunioeste'),(134,'Editora Unesp'),(135,'Editora Universidade Estácio'),(136,'Editora da Unifran'),(137,'Universidade de Antalya'),(138,'Saint Paul Editora Ltda'),(139,'LTC'),(140,'ADAFA'),(141,'SBOP'),(142,'FEBAB'),(143,'EDUEM'),(144,'Akademika'),(145,'Editora Contexto'),(146,'Verbis'),(147,'Editora Compacta'),(148,'Cortez'),(149,'ABCiber; Instituto Itaú Cultural'),(150,'Cabedalis'),(151,'Cabral - Editora e Livraria Universitária'),(152,'Editora Casa'),(153,'EDUC'),(154,'Editora e Distribuidora Educacional S.A.'),(155,'Barauna'),(156,'EDITORA EME LTDA'),(157,'Átomo & Alínea'),(158,'LTC - GEN'),(159,'Novas Edições Acadêmicas'),(160,'Associação de Arquivistas de São Paulo'),(161,'Intertexto'),(162,'Dublin Core Metadata Initiative - ASIS&T'),(163,'Ciência Moderna'),(164,'IBPEX'),(165,'IFHC'),(166,'Arquivo Nacional/CUT'),(167,'Ergon-Verlag'),(168,'Edicon'),(169,'Clube dos Autores'),(170,'Portal da Rede Sirius de Bibliotecas da Universidade do Estado do Rio de Janeiro'),(171,'Editorial Académica Española'),(172,'Editora Eletrônica da FSP/USP'),(173,'Digital Publish & Print/Faculdade de Saúde Pública'),(174,'Secretaria Municipal de Cultura de São Paulo'),(175,'Secretaria de Educação de São Bernardo do Campo'),(176,'Escola do Futuro - USP'),(177,'Fundação Telefônica'),(178,'Secretaria de Educação'),(179,'UFSM'),(180,'Editora Coruja'),(181,'Holos Editora');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-08 11:25:17
