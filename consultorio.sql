-- MySQL dump 10.13  Distrib 5.6.35, for osx10.9 (x86_64)
--
-- Host: localhost    Database: consultorio
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id_cita` int(3) NOT NULL AUTO_INCREMENT,
  `fechayhora` datetime DEFAULT NULL,
  `concretada` tinyint(1) DEFAULT NULL,
  `id_medico` int(3) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cita`),
  UNIQUE KEY `fechayhora` (`fechayhora`),
  KEY `fk_Citas_id_medico` (`id_medico`),
  KEY `fk_Citas_id_paciente` (`id_paciente`),
  CONSTRAINT `fk_Citas_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  CONSTRAINT `fk_Citas_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger nueva_cita
after insert on citas
for each row
begin 
insert into diagnostico (id_cita, receta, diagnostico)values (new.id_cita, 'N/A', 'N/A');
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger eliminando_citas before delete on citas for each row begin delete from diagnostico where id_cita = old.id_cita; end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `id_pais` char(3) NOT NULL,
  `id_estado` char(3) NOT NULL,
  `id_ciudad` char(3) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pais`,`id_estado`,`id_ciudad`),
  CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`id_pais`, `id_estado`) REFERENCES `estados` (`id_pais`, `id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `colonias`
--

DROP TABLE IF EXISTS `colonias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colonias` (
  `id_pais` char(3) NOT NULL,
  `id_estado` char(3) NOT NULL,
  `id_ciudad` char(3) NOT NULL,
  `id_colonia` char(3) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`),
  CONSTRAINT `colonias_ibfk_1` FOREIGN KEY (`id_pais`, `id_estado`, `id_ciudad`) REFERENCES `ciudades` (`id_pais`, `id_estado`, `id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnostico` (
  `id_diagnostico` int(3) NOT NULL AUTO_INCREMENT,
  `id_cita` int(3) DEFAULT NULL,
  `receta` varchar(300) DEFAULT NULL,
  `diagnostico` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id_diagnostico`),
  KEY `fk_id_cita` (`id_cita`),
  CONSTRAINT `fk_id_cita` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `directorio`
--

DROP TABLE IF EXISTS `directorio`;
/*!50001 DROP VIEW IF EXISTS `directorio`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `directorio` AS SELECT 
 1 AS `id_pais`,
 1 AS `pais`,
 1 AS `id_estado`,
 1 AS `estado`,
 1 AS `id_ciudad`,
 1 AS `ciudad`,
 1 AS `id_colonia`,
 1 AS `colonia`,
 1 AS `clave`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id_pais` char(3) NOT NULL,
  `id_estado` char(3) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pais`,`id_estado`),
  CONSTRAINT `estados_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `listado_general`
--

DROP TABLE IF EXISTS `listado_general`;
/*!50001 DROP VIEW IF EXISTS `listado_general`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `listado_general` AS SELECT 
 1 AS `id_paciente`,
 1 AS `nombre_pac`,
 1 AS `paterno_pac`,
 1 AS `materno_pac`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicos` (
  `id_medico` int(3) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `paterno` varchar(40) NOT NULL,
  `materno` varchar(40) DEFAULT '',
  `telefono` varchar(15) DEFAULT NULL,
  `id_pais` char(3) NOT NULL,
  `id_estado` char(3) NOT NULL,
  `id_ciudad` char(3) NOT NULL,
  `id_colonia` char(3) NOT NULL,
  PRIMARY KEY (`id_medico`),
  KEY `paterno` (`paterno`),
  KEY `fk_Medicos_Domicilio` (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`),
  CONSTRAINT `fk_Medicos_Domicilio` FOREIGN KEY (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`) REFERENCES `colonias` (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `paterno` varchar(30) NOT NULL,
  `materno` varchar(40) DEFAULT '',
  `telefono` varchar(15) NOT NULL,
  `id_medico` int(3) DEFAULT NULL,
  `id_pais` char(3) NOT NULL,
  `id_estado` char(3) NOT NULL,
  `id_ciudad` char(3) NOT NULL,
  `id_colonia` char(3) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `fk_Pacientes_domicilio` (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`),
  KEY `fk_Pacientes_id_medico` (`id_medico`),
  KEY `paterno` (`paterno`,`materno`,`nombre`),
  CONSTRAINT `fk_Pacientes_domicilio` FOREIGN KEY (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`) REFERENCES `colonias` (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`),
  CONSTRAINT `fk_Pacientes_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `id_pais` char(3) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `porfecha`
--

DROP TABLE IF EXISTS `porfecha`;
/*!50001 DROP VIEW IF EXISTS `porfecha`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `porfecha` AS SELECT 
 1 AS `id_paciente`,
 1 AS `nombre_pac`,
 1 AS `paterno_pac`,
 1 AS `materno_pac`,
 1 AS `nombre_doc`,
 1 AS `paterno_doc`,
 1 AS `materno_doc`,
 1 AS `fecha_consulta`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `porgenero`
--

DROP TABLE IF EXISTS `porgenero`;
/*!50001 DROP VIEW IF EXISTS `porgenero`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `porgenero` AS SELECT 
 1 AS `id_paciente`,
 1 AS `nombre_pac`,
 1 AS `paterno_pac`,
 1 AS `materno_pac`,
 1 AS `sexo_pac`,
 1 AS `nombre_doc`,
 1 AS `paterno_doc`,
 1 AS `materno_doc`,
 1 AS `fecha_consulta`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `recepcionistas`
--

DROP TABLE IF EXISTS `recepcionistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recepcionistas` (
  `id_recepcionista` int(1) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `paterno` varchar(40) DEFAULT NULL,
  `materno` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `vista_citas`
--

DROP TABLE IF EXISTS `vista_citas`;
/*!50001 DROP VIEW IF EXISTS `vista_citas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_citas` AS SELECT 
 1 AS `id_cita`,
 1 AS `nombre_doc`,
 1 AS `nombre_pac`,
 1 AS `fecha_cita`,
 1 AS `id_diag`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `directorio`
--

/*!50001 DROP VIEW IF EXISTS `directorio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `directorio` AS select `p`.`id_pais` AS `id_pais`,`p`.`nombre` AS `pais`,`e`.`id_estado` AS `id_estado`,`e`.`nombre` AS `estado`,`c`.`id_ciudad` AS `id_ciudad`,`c`.`nombre` AS `ciudad`,`cc`.`id_colonia` AS `id_colonia`,`cc`.`nombre` AS `colonia`,concat(`cc`.`id_pais`,',',`cc`.`id_estado`,',',`cc`.`id_ciudad`,',',`cc`.`id_colonia`) AS `clave` from (((`paises` `p` join `estados` `e`) join `ciudades` `c`) join `colonias` `cc`) where ((`p`.`id_pais` = `e`.`id_pais`) and (`e`.`id_estado` = `c`.`id_estado`) and (`c`.`id_ciudad` = `cc`.`id_ciudad`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `listado_general`
--

/*!50001 DROP VIEW IF EXISTS `listado_general`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `listado_general` AS select `p`.`id_paciente` AS `id_paciente`,`p`.`nombre` AS `nombre_pac`,`p`.`paterno` AS `paterno_pac`,`p`.`materno` AS `materno_pac` from `pacientes` `p` order by `p`.`paterno` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `porfecha`
--

/*!50001 DROP VIEW IF EXISTS `porfecha`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `porfecha` AS select `p`.`id_paciente` AS `id_paciente`,`p`.`nombre` AS `nombre_pac`,`p`.`paterno` AS `paterno_pac`,`p`.`materno` AS `materno_pac`,`m`.`nombre` AS `nombre_doc`,`m`.`paterno` AS `paterno_doc`,`m`.`materno` AS `materno_doc`,`c`.`fechayhora` AS `fecha_consulta` from ((`pacientes` `p` join `medicos` `m`) join `citas` `c`) where ((`m`.`id_medico` = `p`.`id_medico`) and (`c`.`id_medico` = `m`.`id_medico`) and (`c`.`id_paciente` = `p`.`id_paciente`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `porgenero`
--

/*!50001 DROP VIEW IF EXISTS `porgenero`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `porgenero` AS select `p`.`id_paciente` AS `id_paciente`,`p`.`nombre` AS `nombre_pac`,`p`.`paterno` AS `paterno_pac`,`p`.`materno` AS `materno_pac`,`p`.`sexo` AS `sexo_pac`,`m`.`nombre` AS `nombre_doc`,`m`.`paterno` AS `paterno_doc`,`m`.`materno` AS `materno_doc`,`c`.`fechayhora` AS `fecha_consulta` from ((`pacientes` `p` join `medicos` `m`) join `citas` `c`) where ((`c`.`id_medico` = `m`.`id_medico`) and (`c`.`id_paciente` = `p`.`id_paciente`)) order by `p`.`sexo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_citas`
--

/*!50001 DROP VIEW IF EXISTS `vista_citas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_citas` AS select `c`.`id_cita` AS `id_cita`,concat(`m`.`nombre`,' ',`m`.`paterno`,' ',`m`.`materno`) AS `nombre_doc`,concat(`p`.`nombre`,' ',`p`.`paterno`,' ',`p`.`materno`) AS `nombre_pac`,`c`.`fechayhora` AS `fecha_cita`,`d`.`id_diagnostico` AS `id_diag` from (((`citas` `c` join `medicos` `m`) join `pacientes` `p`) join `diagnostico` `d`) where ((`c`.`id_medico` = `m`.`id_medico`) and (`c`.`id_paciente` = `p`.`id_paciente`) and (`d`.`id_cita` = `c`.`id_cita`)) */;
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

-- Dump completed on 2017-11-30 21:20:31
