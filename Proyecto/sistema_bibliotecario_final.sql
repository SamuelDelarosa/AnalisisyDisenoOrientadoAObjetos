-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_bibliotecario_final
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Current Database: `sistema_bibliotecario_final`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sistema_bibliotecario_final` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sistema_bibliotecario_final`;

--
-- Table structure for table `a_aceptacion`
--

DROP TABLE IF EXISTS `a_aceptacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_aceptacion` (
  `idA_aceptacion` int(11) NOT NULL AUTO_INCREMENT,
  `idApeticion` int(11) DEFAULT NULL,
  `ID_bibliotecario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idA_aceptacion`),
  KEY `idApeticion` (`idApeticion`),
  KEY `ID_bibliotecario` (`ID_bibliotecario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_aceptacion`
--

LOCK TABLES `a_aceptacion` WRITE;
/*!40000 ALTER TABLE `a_aceptacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_aceptacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_peticion`
--

DROP TABLE IF EXISTS `a_peticion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_peticion` (
  `idApeticion` int(11) NOT NULL AUTO_INCREMENT,
  `boleta` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idApeticion`),
  KEY `boleta` (`boleta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_peticion`
--

LOCK TABLES `a_peticion` WRITE;
/*!40000 ALTER TABLE `a_peticion` DISABLE KEYS */;
INSERT INTO `a_peticion` VALUES (1,20140313,0),(2,2014030328,1);
/*!40000 ALTER TABLE `a_peticion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apPaterno` varchar(30) DEFAULT NULL,
  `apMaterno` varchar(30) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasena` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Jordy','Muñoz','Balderas','rep14@gmail.com','55-40-28-82-18','JMBr1418'),(2,'Samuel','De la rosa','Hernandez','de.la.rosa.samuel9@gmail.com','55-77-66-47-20','oriana-dcpg');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_aceptacion`
--

DROP TABLE IF EXISTS `b_aceptacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_aceptacion` (
  `idA_aceptacion` int(11) NOT NULL AUTO_INCREMENT,
  `idBpeticion` int(11) DEFAULT NULL,
  `ID_administrador` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idA_aceptacion`),
  KEY `idBpeticion` (`idBpeticion`),
  KEY `ID_administrador` (`ID_administrador`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_aceptacion`
--

LOCK TABLES `b_aceptacion` WRITE;
/*!40000 ALTER TABLE `b_aceptacion` DISABLE KEYS */;
INSERT INTO `b_aceptacion` VALUES (1,2,2,'2019-05-26 12:26:40'),(2,3,2,'2019-05-26 16:51:26'),(3,4,2,'2019-05-26 16:53:11'),(4,1,2,'2019-05-26 16:53:50'),(5,1,2,'2019-05-26 16:54:35'),(6,3,2,'2019-05-26 17:05:02');
/*!40000 ALTER TABLE `b_aceptacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_peticion`
--

DROP TABLE IF EXISTS `b_peticion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_peticion` (
  `idBpeticion` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idBpeticion`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_peticion`
--

LOCK TABLES `b_peticion` WRITE;
/*!40000 ALTER TABLE `b_peticion` DISABLE KEYS */;
INSERT INTO `b_peticion` VALUES (1,103,1),(2,101,1),(3,100,1),(4,102,0);
/*!40000 ALTER TABLE `b_peticion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bibliotecario`
--

DROP TABLE IF EXISTS `bibliotecario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bibliotecario` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apPaterno` varchar(30) DEFAULT NULL,
  `apMaterno` varchar(30) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasena` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bibliotecario`
--

LOCK TABLES `bibliotecario` WRITE;
/*!40000 ALTER TABLE `bibliotecario` DISABLE KEYS */;
INSERT INTO `bibliotecario` VALUES (100,'Paola','prueba','prueba','prueba@gmail.com','55-89-78-98-65','sam'),(102,'prueba','prueba','prueba','prueba','prueba','prueba');
/*!40000 ALTER TABLE `bibliotecario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cd`
--

DROP TABLE IF EXISTS `cd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd` (
  `id_CD` int(17) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_CD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd`
--

LOCK TABLES `cd` WRITE;
/*!40000 ALTER TABLE `cd` DISABLE KEYS */;
/*!40000 ALTER TABLE `cd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `idLibro` int(17) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `Editorial` varchar(30) DEFAULT NULL,
  `Autor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLibro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (77076896,'Big data: Analisis de grandes columenes de datos en organizaciones','Alfaomega','luis Joyanes Aguilar'),(1466568709,'Big data, mining, and analytics : Components of strategic decision making','CRC Press','Stephan kudyda');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multa_l`
--

DROP TABLE IF EXISTS `multa_l`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multa_l` (
  `id_multa` int(11) NOT NULL AUTO_INCREMENT,
  `idrl` int(11) DEFAULT NULL,
  `fecha_b` datetime DEFAULT NULL,
  PRIMARY KEY (`id_multa`),
  KEY `idrl` (`idrl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multa_l`
--

LOCK TABLES `multa_l` WRITE;
/*!40000 ALTER TABLE `multa_l` DISABLE KEYS */;
/*!40000 ALTER TABLE `multa_l` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservacion_cd`
--

DROP TABLE IF EXISTS `reservacion_cd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservacion_cd` (
  `idRcd` int(11) NOT NULL,
  `boleta` int(11) DEFAULT NULL,
  `idcd` int(11) DEFAULT NULL,
  `fecha_r` datetime DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idRcd`),
  KEY `boleta` (`boleta`),
  KEY `idcd` (`idcd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservacion_cd`
--

LOCK TABLES `reservacion_cd` WRITE;
/*!40000 ALTER TABLE `reservacion_cd` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservacion_cd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservacion_l`
--

DROP TABLE IF EXISTS `reservacion_l`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservacion_l` (
  `idRL` int(11) NOT NULL,
  `boleta` int(11) DEFAULT NULL,
  `idlibro` int(11) DEFAULT NULL,
  `fecha_r` datetime DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idRL`),
  KEY `boleta` (`boleta`),
  KEY `idlibro` (`idlibro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservacion_l`
--

LOCK TABLES `reservacion_l` WRITE;
/*!40000 ALTER TABLE `reservacion_l` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservacion_l` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservacion_tt`
--

DROP TABLE IF EXISTS `reservacion_tt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservacion_tt` (
  `idRtt` int(11) NOT NULL,
  `boleta` int(11) DEFAULT NULL,
  `idtt` int(11) DEFAULT NULL,
  `fecha_r` datetime DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idRtt`),
  KEY `boleta` (`boleta`),
  KEY `idtt` (`idtt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservacion_tt`
--

LOCK TABLES `reservacion_tt` WRITE;
/*!40000 ALTER TABLE `reservacion_tt` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservacion_tt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt`
--

DROP TABLE IF EXISTS `tt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt` (
  `id_TT` int(17) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `nom_corto` varchar(200) DEFAULT NULL,
  `Autor` varchar(60) DEFAULT NULL,
  `Director` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_TT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt`
--

LOCK TABLES `tt` WRITE;
/*!40000 ALTER TABLE `tt` DISABLE KEYS */;
INSERT INTO `tt` VALUES (20080072,'Sistema de mandos por voz','mando por voz','Samuel Gonzalez Hernandez','Victor Hugo Garcia Ortega'),(20100149,'Sistema para la deteccion y reconocimiento de rostros en imagenes para la identificaciob de personas','reconocimiento de rostro en imagenes','Martinez Cruz Maritza','Jose David Ortega Pacheco');
/*!40000 ALTER TABLE `tt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `boleta` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apPaterno` varchar(30) DEFAULT NULL,
  `apMaterno` varchar(30) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasena` varchar(30) DEFAULT NULL,
  `ID_TU` int(11) DEFAULT NULL,
  PRIMARY KEY (`boleta`),
  KEY `ID_TU` (`ID_TU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2014030328,'Samuel','De la rosa','Hernandez','de.la.rosa.samuel9@gmail.com','55-77-66-47-20','oriana-dcpg',1),(2014030329,'Paola','De la rosa','Hernandez','de.la.rosa.Paola@gmail.com','55-77-66-47-21','oriana-dcpg',2),(20140303,'prueba','prueba','prueba','prueba','prueba','prueba',2),(20140312,'prueba','prueba','prueba','prueba','prueba','prueba',1),(20140313,'prueba','prueba','prueba','prueba','prueba','prueba',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utipo`
--

DROP TABLE IF EXISTS `utipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utipo` (
  `ID_TU` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_TU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utipo`
--

LOCK TABLES `utipo` WRITE;
/*!40000 ALTER TABLE `utipo` DISABLE KEYS */;
INSERT INTO `utipo` VALUES (1,'Alumno'),(2,'Profesor');
/*!40000 ALTER TABLE `utipo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-27 11:10:21
