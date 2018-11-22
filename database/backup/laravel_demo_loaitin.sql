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
-- Table structure for table `loaitin`
--

DROP TABLE IF EXISTS `loaitin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loaitin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idTheLoai` int(10) unsigned DEFAULT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaitin`
--

LOCK TABLES `loaitin` WRITE;
/*!40000 ALTER TABLE `loaitin` DISABLE KEYS */;
INSERT INTO `loaitin` VALUES (1,1,'Giáo Dục','Giao-Duc',NULL,NULL),(2,1,'Nhịp Điệu Trẻ','Nhip-Dieu-Tre',NULL,NULL),(3,1,'Du Lịch','Du-Lich',NULL,NULL),(4,1,'Du Học','Du-Hoc',NULL,NULL),(5,2,'Cuộc Sống Đó Đây','Cuoc-Song-Do-Day',NULL,NULL),(6,2,'Ảnh','Anh',NULL,NULL),(7,2,'Người Việt 5 Châu','Nguoi-Viet-5-Chau',NULL,NULL),(8,2,'Phân Tích','Phan-Tich',NULL,NULL),(9,3,'Chứng Khoán','Chung-Khoan',NULL,NULL),(10,3,'Bất Động Sản','Bat-Dong-San',NULL,NULL),(11,3,'Doanh Nhân','Doanh-Nhan',NULL,NULL),(12,3,'Quốc Tế','Quoc-Te',NULL,NULL),(13,3,'Mua Sắm','Mua-Sam',NULL,NULL),(14,3,'Doanh Nghiệp Viết','Doanh-Nghiep-Viet',NULL,NULL),(15,4,'Hoa Hậu','Hoa-Hau',NULL,NULL),(16,4,'Nghệ Sỹ','Nghe-Sy',NULL,NULL),(17,4,'Âm Nhạc','Am-Nhac',NULL,NULL),(18,4,'Thời Trang','Thoi-Trang',NULL,NULL),(19,4,'Điện Ảnh','Dien-Anh',NULL,NULL),(20,4,'Mỹ Thuật','My-Thuat',NULL,NULL),(21,5,'Bóng Đá','Bong-Da',NULL,NULL),(22,5,'Tennis','Tennis',NULL,NULL),(23,5,'Chân Dung','Chan-Dung',NULL,NULL),(24,5,'Ảnh','Anh-TT',NULL,NULL),(25,6,'Hình Sự','Hinh-Su',NULL,NULL);
/*!40000 ALTER TABLE `loaitin` ENABLE KEYS */;
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
