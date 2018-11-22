-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel_demo
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quyen` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User_1','user_1@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(2,'User_2','user_2@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(3,'User_3','user_3@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(4,'User_4','user_4@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(5,'User_5','user_5@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(6,'User_6','user_6@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(7,'User_7','user_7@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(8,'User_8','user_8@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(9,'User_9','user_9@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL),(10,'User_10','user_10@mymail.com','$2y$10$UEahc2TlTIloLacI1a2eBev4k4sQAf9T1n69K6hIoXgEnro22wVKO',0,NULL,'2018-11-05 13:17:17',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-22 13:18:56
