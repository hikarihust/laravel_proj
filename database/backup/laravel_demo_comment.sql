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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idUser` int(10) unsigned DEFAULT NULL,
  `idTinTuc` int(10) unsigned DEFAULT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,7,33,'Hay quá trời','2018-11-05 06:53:09',NULL),(2,3,73,'Không thích bài viết này','2018-11-05 06:53:09',NULL),(3,10,76,'Hay quá trời','2018-11-05 06:53:09',NULL),(4,4,74,'Hay quá trời','2018-11-05 06:53:09',NULL),(5,7,39,'Bài viết này chưa được hay lắm','2018-11-05 06:53:09',NULL),(6,8,13,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(7,8,77,'Không thích bài viết này','2018-11-05 06:53:09',NULL),(8,9,37,'Hay quá trời','2018-11-05 06:53:09',NULL),(9,9,86,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(10,6,86,'Bài viết này chưa được hay lắm','2018-11-05 06:53:09',NULL),(11,7,17,'Tôi rất thích bài viết này','2018-11-05 06:53:09',NULL),(12,7,85,'Hay quá trời','2018-11-05 06:53:09',NULL),(13,8,66,'Tôi sẽ học thèo bài viết này','2018-11-05 06:53:09',NULL),(14,9,42,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(15,1,58,'Tôi sẽ học thèo bài viết này','2018-11-05 06:53:09',NULL),(16,9,69,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:09',NULL),(17,7,88,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(18,6,33,'Không thích bài viết này','2018-11-05 06:53:09',NULL),(19,2,4,'Bài viết này chưa được hay lắm','2018-11-05 06:53:09',NULL),(20,6,76,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(21,9,25,'Bài viết này được','2018-11-05 06:53:09',NULL),(22,3,82,'Hay quá trời','2018-11-05 06:53:09',NULL),(23,3,31,'Bài viết này được','2018-11-05 06:53:09',NULL),(24,8,22,'Hay quá trời','2018-11-05 06:53:09',NULL),(25,5,56,'Hay quá trời','2018-11-05 06:53:09',NULL),(26,4,55,'Bài viết này chưa được hay lắm','2018-11-05 06:53:09',NULL),(27,6,10,'Bài viết này được','2018-11-05 06:53:09',NULL),(28,10,70,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(29,9,19,'Không thích bài viết này','2018-11-05 06:53:09',NULL),(30,7,19,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(31,5,90,'Hay quá trời','2018-11-05 06:53:09',NULL),(32,9,17,'Hay quá trời','2018-11-05 06:53:09',NULL),(33,2,80,'Tôi sẽ học thèo bài viết này','2018-11-05 06:53:09',NULL),(34,8,48,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:09',NULL),(35,2,92,'Bài viết này được','2018-11-05 06:53:09',NULL),(36,8,43,'Hay quá trời','2018-11-05 06:53:09',NULL),(37,6,53,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:09',NULL),(38,9,28,'Bài viết này được','2018-11-05 06:53:09',NULL),(39,1,9,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(40,4,84,'Bài viết này chưa được hay lắm','2018-11-05 06:53:09',NULL),(41,3,69,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(42,5,27,'Không thích bài viết này','2018-11-05 06:53:09',NULL),(43,1,56,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(44,4,21,'Hay quá trời','2018-11-05 06:53:09',NULL),(45,1,50,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(46,8,89,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(47,4,48,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(48,3,73,'Bài viết này được','2018-11-05 06:53:09',NULL),(49,10,9,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(50,7,29,'Bài viết này được','2018-11-05 06:53:09',NULL),(51,1,54,'Bài viết này được','2018-11-05 06:53:09',NULL),(52,3,44,'Tôi rất thích bài viết này','2018-11-05 06:53:09',NULL),(53,2,74,'Hay quá trời','2018-11-05 06:53:09',NULL),(54,9,97,'Bài viết này được','2018-11-05 06:53:09',NULL),(55,9,82,'Bài viết này được','2018-11-05 06:53:09',NULL),(56,4,91,'Tôi rất thích bài viết này','2018-11-05 06:53:09',NULL),(57,7,85,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(58,9,40,'Tôi rất thích bài viết này','2018-11-05 06:53:09',NULL),(59,10,50,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(60,3,43,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(61,4,76,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:09',NULL),(62,9,38,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:09',NULL),(63,5,27,'Tôi sẽ học thèo bài viết này','2018-11-05 06:53:09',NULL),(64,5,65,'Bài viết này được','2018-11-05 06:53:09',NULL),(65,2,98,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(66,2,74,'Tôi chưa có ý kiến gì','2018-11-05 06:53:09',NULL),(67,3,41,'Bài viết này chưa được hay lắm','2018-11-05 06:53:09',NULL),(68,4,79,'Hay quá trời','2018-11-05 06:53:09',NULL),(69,3,72,'Không thích bài viết này','2018-11-05 06:53:09',NULL),(70,5,67,'Hay quá trời','2018-11-05 06:53:09',NULL),(71,4,67,'Bài viết này được','2018-11-05 06:53:09',NULL),(72,7,29,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(73,10,28,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(74,3,7,'Tôi rất thích bài viết này','2018-11-05 06:53:09',NULL),(75,4,28,'Tôi rất thích bài viết này','2018-11-05 06:53:09',NULL),(76,7,70,'Bài viết này tạm ổn','2018-11-05 06:53:09',NULL),(77,5,84,'Bài viết rất hay','2018-11-05 06:53:09',NULL),(78,7,49,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:09',NULL),(79,7,58,'Bài viết này được','2018-11-05 06:53:09',NULL),(80,2,24,'Bài viết này chưa được hay lắm','2018-11-05 06:53:10',NULL),(81,6,87,'Tôi sẽ học thèo bài viết này','2018-11-05 06:53:10',NULL),(82,8,99,'Bài viết này được','2018-11-05 06:53:10',NULL),(83,2,15,'Bài viết này chưa được hay lắm','2018-11-05 06:53:10',NULL),(84,1,57,'Bài viết này tạm ổn','2018-11-05 06:53:10',NULL),(85,2,51,'Tôi sẽ học thèo bài viết này','2018-11-05 06:53:10',NULL),(86,4,25,'Bài viết này tạm ổn','2018-11-05 06:53:10',NULL),(87,6,38,'Bài viết này chưa được hay lắm','2018-11-05 06:53:10',NULL),(88,1,55,'Bài viết này chưa được hay lắm','2018-11-05 06:53:10',NULL),(89,1,68,'Tôi chưa có ý kiến gì','2018-11-05 06:53:10',NULL),(90,1,4,'Bài viết rất hay','2018-11-05 06:53:10',NULL),(91,7,52,'Tôi rất thích bài viết này','2018-11-05 06:53:10',NULL),(92,5,34,'Hay quá trời','2018-11-05 06:53:10',NULL),(93,10,6,'Hay quá trời','2018-11-05 06:53:10',NULL),(94,3,33,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:10',NULL),(95,6,16,'Ý kiến của tôi khác so với bài này','2018-11-05 06:53:10',NULL),(96,2,76,'Tôi rất thích bài viết này','2018-11-05 06:53:10',NULL),(97,5,50,'Bài viết rất hay','2018-11-05 06:53:10',NULL),(98,8,64,'Bài viết này chưa được hay lắm','2018-11-05 06:53:10',NULL),(99,3,31,'Bài viết rất hay','2018-11-05 06:53:10',NULL),(100,10,88,'Bài viết này tạm ổn','2018-11-05 06:53:10',NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-22 13:18:55
