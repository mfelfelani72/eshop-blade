-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: eshopblade
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('enable','disable','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (11,'empty','cat1','empty','1','empty','disable',NULL,'2024-05-11 05:00:24'),(12,'empty','cat2','empty','1','empty','deleted',NULL,NULL),(13,'empty','cat3','empty','1','empty','enable',NULL,NULL),(14,'empty','cat4','empty','1','empty','enable',NULL,NULL),(16,'code10','cat10','des10','1','empty','enable','2024-05-11 07:29:42','2024-05-11 07:31:29'),(17,'empty','shoes','empty','1','empty','enable',NULL,NULL),(18,'empty','nike','empty','1','empty','enable',NULL,NULL),(19,'empty','new','empty','1','empty','enable',NULL,NULL),(20,'empty','adidas','empty','1','empty','enable',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(6,'2024_04_28_152744_primary_slider',2),(8,'2024_04_30_185138_primary_banner',3),(9,'2024_05_06_100832_products',4),(10,'2024_05_06_102108_product_images',5),(16,'2024_05_06_173454_categories',6),(17,'2024_05_06_173609_product_categories',6),(18,'2024_05_11_171157_product_trend',7),(19,'2024_05_12_100758_product_featured',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_product_id_index` (`product_id`),
  KEY `product_categories_category_id_index` (`category_id`),
  CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (65,101,17,NULL,NULL),(66,101,18,NULL,NULL),(67,101,19,NULL,NULL),(68,103,19,NULL,NULL),(69,104,20,NULL,NULL),(70,105,19,NULL,NULL),(71,105,20,NULL,NULL),(72,106,18,NULL,NULL),(73,107,17,NULL,NULL),(74,107,19,NULL,NULL),(75,108,18,NULL,NULL),(76,109,14,NULL,NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_featured`
--

DROP TABLE IF EXISTS `product_featured`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_featured` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('enable','disable','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_featured_product_id_index` (`product_id`),
  CONSTRAINT `product_featured_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_featured`
--

LOCK TABLES `product_featured` WRITE;
/*!40000 ALTER TABLE `product_featured` DISABLE KEYS */;
INSERT INTO `product_featured` VALUES (4,101,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(5,103,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(6,104,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(7,105,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(8,106,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(9,107,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(10,108,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02'),(11,109,'empty','2024-05-12','empty','1','empty','enable','2024-05-12 07:25:02','2024-05-12 07:25:02');
/*!40000 ALTER TABLE `product_featured` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('enable','disable','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_index` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (47,101,'17155130620.jpg','empty','empty','enable',NULL,NULL),(48,101,'17155130621.jpg','empty','empty','enable',NULL,NULL),(49,101,'17155130622.jpg','empty','empty','enable',NULL,NULL),(50,101,'17155130623.jpg','empty','empty','enable',NULL,NULL),(51,103,'17155321450.jpg','empty','empty','enable',NULL,NULL),(52,103,'17155321451.jpg','empty','empty','enable',NULL,NULL),(53,103,'17155321452.jpg','empty','empty','enable',NULL,NULL),(54,103,'17155321453.jpg','empty','empty','enable',NULL,NULL),(55,104,'17155326260.jpg','empty','empty','enable',NULL,NULL),(56,104,'17155326261.jpg','empty','empty','enable',NULL,NULL),(57,104,'17155326262.jpg','empty','empty','enable',NULL,NULL),(58,104,'17155326263.jpg','empty','empty','enable',NULL,NULL),(59,105,'17155328591.jpg','empty','empty','enable',NULL,NULL),(60,105,'17155328590.jpg','empty','empty','enable',NULL,NULL),(61,105,'17155328592.jpg','empty','empty','enable',NULL,NULL),(62,105,'17155328593.jpg','empty','empty','enable',NULL,NULL),(63,106,'17155330770.jpg','empty','empty','enable',NULL,NULL),(64,106,'17155330771.jpg','empty','empty','enable',NULL,NULL),(65,106,'17155330772.jpg','empty','empty','enable',NULL,NULL),(66,106,'17155330773.jpg','empty','empty','enable',NULL,NULL),(67,107,'17155334980.jpg','empty','empty','enable',NULL,NULL),(68,107,'17155334981.jpg','empty','empty','enable',NULL,NULL),(69,107,'17155334982.jpg','empty','empty','enable',NULL,NULL),(70,107,'17155334983.jpg','empty','empty','enable',NULL,NULL),(71,108,'17155336800.jpg','empty','empty','enable',NULL,NULL),(72,108,'17155336801.jpg','empty','empty','enable',NULL,NULL),(73,108,'17155336802.jpg','empty','empty','enable',NULL,NULL),(74,108,'17155336803.jpg','empty','empty','enable',NULL,NULL),(75,109,'17155338770.jpg','empty','empty','enable',NULL,NULL),(76,109,'17155338771.jpg','empty','empty','enable',NULL,NULL),(77,109,'17155338772.jpg','empty','empty','enable',NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_trend`
--

DROP TABLE IF EXISTS `product_trend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_trend` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('enable','disable','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_trend_product_id_index` (`product_id`),
  CONSTRAINT `product_trend_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_trend`
--

LOCK TABLES `product_trend` WRITE;
/*!40000 ALTER TABLE `product_trend` DISABLE KEYS */;
INSERT INTO `product_trend` VALUES (7,101,'empty','empty','1','empty','enable','2024-05-12 07:24:58','2024-05-12 07:24:58'),(8,103,'empty','empty','1','empty','enable','2024-05-12 12:42:38','2024-05-12 12:42:38'),(9,104,'empty','empty','1','empty','enable','2024-05-12 12:50:58','2024-05-12 12:50:58'),(10,105,'empty','empty','1','empty','enable','2024-05-12 12:54:43','2024-05-12 12:54:43'),(11,106,'empty','empty','1','empty','enable','2024-05-12 12:58:06','2024-05-12 12:58:06'),(12,107,'empty','empty','1','empty','enable','2024-05-12 13:05:06','2024-05-12 13:05:06'),(13,108,'empty','empty','1','empty','enable','2024-05-12 13:08:24','2024-05-12 13:08:24'),(14,109,'empty','empty','1','empty','enable','2024-05-12 13:11:23','2024-05-12 13:11:23');
/*!40000 ALTER TABLE `product_trend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informations` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_off` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('enable','disable','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (101,'Men Slip On Shoes Casual with Arch Support Insoles','shoes-nike','{\"BRANDS\":\"Nike\",\"ACTIVITY\":\"Running\",\"MATERIAL\":\"Fleece\",\"GENDER\":\"Men\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','119.90','80.90','1','empty','disable','2024-05-12 07:24:22','2024-05-12 07:24:22'),(103,'Black Women\'s Coat Dress','dress-black','{\"MATERIAL\":\"good\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','189.99','129.99','1','empty','disable','2024-05-12 12:42:25','2024-05-12 12:42:25'),(104,'Vonanda Velvet Sofa Couch','mobl','{\"BRANDS\":\"adidas\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','469.21','420.00','1','empty','disable','2024-05-12 12:50:26','2024-05-12 12:50:26'),(105,'Wireless Hedphones','hands','{\"BRANDS\":\"jbl\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','128','99','1','empty','disable','2024-05-12 12:54:19','2024-05-12 12:54:19'),(106,'Under Armour Men\'s Tech','black','{\"ACTIVITY\":\"Running\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','56','46','1','empty','disable','2024-05-12 12:57:57','2024-05-12 12:57:57'),(107,'Women\'s Lightweight','women','{\"GENDER\":\"Female\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','85','66','1','empty','disable','2024-05-12 13:04:58','2024-05-12 13:04:58'),(108,'Dimmable Ceiling Light Modern','lamp','{\"MATERIAL\":\"Fleece\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','256','215','1','empty','disable','2024-05-12 13:08:00','2024-05-12 13:08:00'),(109,'Modern Srorage Cabinet','code','{\"GENDER\":\"male\"}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam accusantium aliquid, autem velit fuga praesentium nisi adipisci tenetur corrupti reprehenderit sint nesciunt vitae consequatur nulla libero aperiam. Repudiandae, quo eveniet!','desc','251','199','1','empty','disable','2024-05-12 13:11:17','2024-05-12 13:11:17');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-12 21:34:37
