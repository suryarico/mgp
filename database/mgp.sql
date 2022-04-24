-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mgp
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_pre_text` varchar(255) DEFAULT NULL,
  `title_post_text` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (3,'asdasd','asda','sdasd','20210910224333.png','asdasd','2021-09-10 17:13:33','2021-09-10 22:43:33'),(2,'asdasd','asda','sdasd','20210910224307.png','asdasd','2021-09-10 16:31:01','2021-09-10 22:43:07');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` varchar(50) DEFAULT NULL,
  `netprice` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,1,2,5,'1000','4000','2021-10-02 05:45:20','2022-01-29 15:16:21'),(3,2,2,4,'1000','4000','2021-10-02 05:50:22','2022-01-29 14:16:24');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_masters`
--

DROP TABLE IF EXISTS `category_masters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_masters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_masters`
--

LOCK TABLES `category_masters` WRITE;
/*!40000 ALTER TABLE `category_masters` DISABLE KEYS */;
INSERT INTO `category_masters` VALUES (1,'PLANTS','plants','1','2021-09-20 16:22:39','2021-09-20 16:22:39',NULL),(2,'POTS','pots','1','2021-09-20 16:22:57','2021-09-20 16:22:57',NULL);
/*!40000 ALTER TABLE `category_masters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color_master`
--

DROP TABLE IF EXISTS `color_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color_master`
--

LOCK TABLES `color_master` WRITE;
/*!40000 ALTER TABLE `color_master` DISABLE KEYS */;
INSERT INTO `color_master` VALUES (1,'RED','2021-09-04 17:53:08','1',NULL,NULL),(2,'GREEN','2021-09-04 17:53:08','1',NULL,NULL),(3,'BLACK','2021-09-04 17:53:08','1',NULL,NULL),(4,NULL,'2021-09-04 17:53:08','1',NULL,NULL);
/*!40000 ALTER TABLE `color_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_masters`
--

DROP TABLE IF EXISTS `material_masters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material_masters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_masters`
--

LOCK TABLES `material_masters` WRITE;
/*!40000 ALTER TABLE `material_masters` DISABLE KEYS */;
INSERT INTO `material_masters` VALUES (1,'testMaterial','2021-09-04 17:52:38','1',NULL,NULL);
/*!40000 ALTER TABLE `material_masters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_short_description` text,
  `product_description` text,
  `product_price` float DEFAULT NULL,
  `product_discounted_price` float DEFAULT NULL,
  `product_image` text,
  `product_weight` varchar(45) DEFAULT NULL,
  `product_tags` text,
  `product_care_instructions` varchar(45) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `shape_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `size_height` varchar(45) DEFAULT NULL,
  `size_width` varchar(45) DEFAULT NULL,
  `size_depth` varchar(45) DEFAULT NULL,
  `use_id` int(11) DEFAULT NULL,
  `product_view` varchar(45) DEFAULT NULL,
  `is_featured` int(11) DEFAULT '0',
  `is_bestseller` int(11) DEFAULT '0',
  `is_latest` int(11) DEFAULT '0',
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,8,'outdoor plantoutdoor plant update','outdoor plant update','outdoor plant update',1000,900,'20211118212030.jpg','2',NULL,NULL,1,1,1,1,'12','12','12',1,NULL,1,NULL,1,'1','2021-09-20 17:07:34','1','2021-11-18 15:50:30',1,'outdoor-plant'),(2,2,9,'Ceramic pots','Ceramic pots','Ceramic pots',1000,900,'20210921224031.jpg','4',NULL,NULL,1,1,1,1,'13','43','12',1,NULL,1,1,1,'1','2021-09-21 17:10:31',NULL,'2021-09-21 17:10:31',1,'ceramic-pots');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shape_master`
--

DROP TABLE IF EXISTS `shape_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shape_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shape` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shape_master`
--

LOCK TABLES `shape_master` WRITE;
/*!40000 ALTER TABLE `shape_master` DISABLE KEYS */;
INSERT INTO `shape_master` VALUES (1,'square','2021-09-04 17:53:39','1',NULL,NULL),(2,'round','2021-09-04 17:53:39','1',NULL,NULL);
/*!40000 ALTER TABLE `shape_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_master`
--

DROP TABLE IF EXISTS `shipping_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(45) DEFAULT NULL,
  `chargers` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_master`
--

LOCK TABLES `shipping_master` WRITE;
/*!40000 ALTER TABLE `shipping_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size_master`
--

DROP TABLE IF EXISTS `size_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `size_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size_master`
--

LOCK TABLES `size_master` WRITE;
/*!40000 ALTER TABLE `size_master` DISABLE KEYS */;
INSERT INTO `size_master` VALUES (1,'Small','2021-09-04 17:54:04','1',NULL,NULL),(2,'Medium','2021-09-04 17:54:04','1',NULL,NULL),(3,'Large','2021-09-04 17:54:04','1',NULL,NULL);
/*!40000 ALTER TABLE `size_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state_master`
--

DROP TABLE IF EXISTS `state_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(45) DEFAULT NULL,
  `perkg_cost` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_master`
--

LOCK TABLES `state_master` WRITE;
/*!40000 ALTER TABLE `state_master` DISABLE KEYS */;
INSERT INTO `state_master` VALUES (1,'ANDAMAN AND NICOBAR ISLANDS','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(2,'ANDHRA PRADESH','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(3,'ARUNACHAL PRADESH','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(4,'ASSAM','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(5,'BIHAR','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(6,'CHANDIGARH','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(7,'CHHATTISGARH','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(8,'DADRA AND NAGAR HAVELI','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(9,'DAMAN AND DIU','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(10,'DELHI','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(11,'GOA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(12,'GUJARAT','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(13,'HARYANA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(14,'HIMACHAL PRADESH','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(15,'JAMMU AND KASHMIR','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(16,'JHARKHAND','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(17,'KARNATAKA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(18,'KERALA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(19,'LAKSHADWEEP','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(20,'MADHYA PRADESH','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(21,'MAHARASHTRA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(22,'MANIPUR','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(23,'MEGHALAYA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(24,'MIZORAM','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(25,'NAGALAND','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(26,'ODISHA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(27,'PUDUCHERRY','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(28,'PUNJAB','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(29,'RAJASTHAN','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(30,'SIKKIM','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(31,'TAMIL NADU','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(32,'TELANGANA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(33,'TRIPURA','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(34,'UTTARAKHAND','10','2021-11-10 04:30:00','2021-11-10 04:30:00'),(35,'UTTAR PRADESH','20','2021-11-10 04:30:00','2021-11-10 04:30:00'),(36,'WEST BENGAL','10','2021-11-10 04:30:00','2021-11-10 04:30:00');
/*!40000 ALTER TABLE `state_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category_master`
--

DROP TABLE IF EXISTS `sub_category_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_category_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(100) DEFAULT NULL,
  `sub_category_name` varchar(100) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sub_category_text` text,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category_master`
--

LOCK TABLES `sub_category_master` WRITE;
/*!40000 ALTER TABLE `sub_category_master` DISABLE KEYS */;
INSERT INTO `sub_category_master` VALUES (9,'2','Ceramic','ceramic',NULL,'1','2021-09-20 16:27:47','2021-09-20 16:27:47',NULL),(8,'1','Outdoor','outdoor',NULL,'1','2021-09-20 16:27:42','2021-09-20 16:27:42',NULL),(7,'1','INDOOR','indoor',NULL,'1','2021-09-20 16:27:33','2021-09-20 16:27:33',NULL),(10,'2','Fiber Ceramic','fiber-ceramic',NULL,'1','2021-09-20 16:27:52','2021-09-20 16:27:52',NULL);
/*!40000 ALTER TABLE `sub_category_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usename` varchar(45) DEFAULT NULL,
  `lastupdated` timestamp NULL DEFAULT NULL,
  `createddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `use_master`
--

DROP TABLE IF EXISTS `use_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `use_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `use_master`
--

LOCK TABLES `use_master` WRITE;
/*!40000 ALTER TABLE `use_master` DISABLE KEYS */;
INSERT INTO `use_master` VALUES (1,'indoor','2021-09-04 17:54:41','1',NULL,NULL),(2,'outdoor','2021-09-04 17:54:41','1',NULL,NULL);
/*!40000 ALTER TABLE `use_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `billing_state` int(11) DEFAULT NULL,
  `billing_city` varchar(45) DEFAULT NULL,
  `billing_address` text,
  `billing_address2` text,
  `billing_pincode` varchar(45) DEFAULT NULL,
  `shipping_state` int(11) DEFAULT NULL,
  `shipping_city` varchar(45) DEFAULT NULL,
  `shipping_address` text,
  `shipping_address2` text,
  `shipping_pincode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_address`
--

LOCK TABLES `user_address` WRITE;
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
INSERT INTO `user_address` VALUES (1,2,29,'kota','khundai kota',NULL,'324008',29,'kota','324008',NULL,'324008',NULL,NULL);
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_billing_address`
--

DROP TABLE IF EXISTS `user_billing_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_billing_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `billing_state` int(11) DEFAULT NULL,
  `billing_city` varchar(45) DEFAULT NULL,
  `billing_address` text,
  `billing_address2` text,
  `billing_pincode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_billing_address`
--

LOCK TABLES `user_billing_address` WRITE;
/*!40000 ALTER TABLE `user_billing_address` DISABLE KEYS */;
INSERT INTO `user_billing_address` VALUES (2,2,29,'kota','kota',NULL,'324008',NULL,NULL),(3,2,35,'noida','noida',NULL,'201305',NULL,NULL);
/*!40000 ALTER TABLE `user_billing_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_shipping_address`
--

DROP TABLE IF EXISTS `user_shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_shipping_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `shipping_state` int(11) DEFAULT NULL,
  `shipping_city` varchar(45) DEFAULT NULL,
  `shipping_address` text,
  `shipping_address2` text,
  `shipping_pincode` varchar(45) DEFAULT NULL,
  `is_default` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_shipping_address`
--

LOCK TABLES `user_shipping_address` WRITE;
/*!40000 ALTER TABLE `user_shipping_address` DISABLE KEYS */;
INSERT INTO `user_shipping_address` VALUES (2,2,29,'kota','kota',NULL,'324008',0,NULL,'2022-01-29 09:49:25'),(3,2,35,'noida','noida',NULL,'201305',1,NULL,'2022-01-29 09:49:25');
/*!40000 ALTER TABLE `user_shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,1,'$2y$10$CgTmjsTs3XRPPF/apSLB6uV3eV0INQ9y9qgRghhtKiG/0DGrrUaEm',NULL,'2021-08-26 10:32:09','2021-08-26 10:32:09'),(2,'User','user@user.com',NULL,0,'$2y$10$CgTmjsTs3XRPPF/apSLB6uV3eV0INQ9y9qgRghhtKiG/0DGrrUaEm',NULL,'2021-08-26 10:32:09','2021-08-26 10:32:09'),(3,'Test','test@test.com',NULL,1,'$2y$10$CgTmjsTs3XRPPF/apSLB6uV3eV0INQ9y9qgRghhtKiG/0DGrrUaEm',NULL,'2021-09-03 11:11:54','2021-09-03 11:11:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (1,2,2,'2021-09-30 11:27:43','2021-09-30 16:57:43'),(2,1,2,'2021-11-25 03:38:45','2021-11-25 09:08:45');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mgp'
--

--
-- Dumping routines for database 'mgp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-24 20:11:13
