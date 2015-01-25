-- MySQL dump 10.14  Distrib 5.5.38-MariaDB, for Linux (armv7l)
--
-- Host: localhost    Database: spas
-- ------------------------------------------------------
-- Server version	5.5.38-MariaDB

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
-- Table structure for table `hot_tub_models`
--

DROP TABLE IF EXISTS `hot_tub_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hot_tub_models` (
  `hot_tub_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hot_tub_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`hot_tub_model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hot_tubs_to_trailer_loads`
--

DROP TABLE IF EXISTS `hot_tubs_to_trailer_loads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hot_tubs_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `hot_tub_model_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`index_number`),
  KEY `fk_trailer_load_id` (`trailer_load_id`),
  KEY `fk_hot_tub_model_id` (`hot_tub_model_id`),
  CONSTRAINT `fk_hot_tub_model_id` FOREIGN KEY (`hot_tub_model_id`) REFERENCES `hot_tub_models` (`hot_tub_model_id`),
  CONSTRAINT `fk_trailer_load_id` FOREIGN KEY (`trailer_load_id`) REFERENCES `trailer_load` (`trailer_load_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `swim_spa_models`
--

DROP TABLE IF EXISTS `swim_spa_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `swim_spa_models` (
  `swim_spa_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `swim_spa_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`swim_spa_model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `swim_spas_to_trailer_loads`
--

DROP TABLE IF EXISTS `swim_spas_to_trailer_loads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `swim_spas_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `swim_spa_model_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`index_number`),
  KEY `fk_swim_spa_model_id` (`swim_spa_model_id`),
  KEY `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` (`trailer_load_id`),
  CONSTRAINT `fk_swim_spa_model_id` FOREIGN KEY (`swim_spa_model_id`) REFERENCES `swim_spa_models` (`swim_spa_model_id`),
  CONSTRAINT `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` FOREIGN KEY (`trailer_load_id`) REFERENCES `trailer_load` (`trailer_load_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trailer_load`
--

DROP TABLE IF EXISTS `trailer_load`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trailer_load` (
  `trailer_load_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_date` varchar(255) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `dealer` varchar(255) DEFAULT NULL,
  `number_of_spas` int(11) DEFAULT NULL,
  `number_of_swimspas` int(11) DEFAULT NULL,
  `shipper` varchar(55) DEFAULT NULL,
  `trailer_type` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `processed` bit(1) DEFAULT NULL,
  PRIMARY KEY (`trailer_load_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` char(64) NOT NULL COMMENT 'Salted SHA-256',
  `authKey` text,
  `accessToken` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-24 21:38:44
