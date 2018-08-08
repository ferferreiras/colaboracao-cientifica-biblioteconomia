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
-- Temporary view structure for view `pessoasCred`
--

DROP TABLE IF EXISTS `pessoasCred`;
/*!50001 DROP VIEW IF EXISTS `pessoasCred`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `pessoasCred` AS SELECT 
 1 AS `idPessoa`,
 1 AS `nomeCompleto`,
 1 AS `nomeCitacao`,
 1 AS `docente`,
 1 AS `posLS`,
 1 AS `posSS`,
 1 AS `instituicao`,
 1 AS `pais`,
 1 AS `profissao`,
 1 AS `credenciado`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `pessoasCred`
--

/*!50001 DROP VIEW IF EXISTS `pessoasCred`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pessoasCred` AS select `p`.`idPessoa` AS `idPessoa`,`p`.`nomeCompleto` AS `nomeCompleto`,`p`.`nomeCitacao` AS `nomeCitacao`,`p`.`docente` AS `docente`,`p`.`posLS` AS `posLS`,`p`.`posSS` AS `posSS`,`p`.`instituicao` AS `instituicao`,`p`.`pais` AS `pais`,`p`.`profissao` AS `profissao`,`b`.`credenciado` AS `credenciado` from (`MFFScripts`.`pessoa` `p` left join (select `MFFScripts`.`pessoa`.`idPessoa` AS `idPessoa`,`MFFScripts`.`pessoa`.`nomeCompleto` AS `nomeCompleto`,`MFFScripts`.`pessoa`.`nomeCitacao` AS `nomeCitacao`,`MFFScripts`.`pessoa`.`docente` AS `docente`,`MFFScripts`.`pessoa`.`posLS` AS `posLS`,`MFFScripts`.`pessoa`.`posSS` AS `posSS`,`MFFScripts`.`pessoa`.`instituicao` AS `instituicao`,`MFFScripts`.`pessoa`.`pais` AS `pais`,`MFFScripts`.`pessoa`.`profissao` AS `profissao`,count(0) AS `credenciado` from `MFFScripts`.`pessoa` where ((`MFFScripts`.`pessoa`.`docente` = 1) and ((`MFFScripts`.`pessoa`.`posLS` is not null) or (`MFFScripts`.`pessoa`.`posSS` is not null))) group by `MFFScripts`.`pessoa`.`idPessoa`) `b` on((`b`.`idPessoa` = `p`.`idPessoa`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-08 11:25:17
