CREATE DATABASE  IF NOT EXISTS `tdhome_vn` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `tdhome_vn`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tdhome_vn
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image_path` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `page_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_keywords` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_description` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `h1` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `view_count` int(11) DEFAULT '0',
  `like_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `share_count` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `is_hot` tinyint(1) DEFAULT '0',
  `position` smallint(4) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `long_description` text COLLATE utf8_unicode_ci,
  `published_at` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (2,'hehe','<p>fgffg<img alt=\"\" src=\"http://localhost/diemthilop10.info/frontend/web/images/2016/02/16/Gz/pkc3.png\" style=\"height:736px; width:588px\" /></p>\r\n','hehehe-haha','[{\"time\":1456453405,\"slug\":\"hehehe\"}]','','classic_hickory_stainless.jpeg','/2016/02/16/Gz/','','','','','',5,NULL,NULL,NULL,1455588641,1457085408,'quyettv','quyettv','',0,NULL,NULL,'<p><img alt=\"\" src=\"http://localhost/diemthilop10.info/frontend/web/images/2016/02/16/Gz/13-[-8].jpg\" style=\"height:593px; width:1000px\" /></p>\r\n',1455588540,1),(3,'xin chaof','<p>klklkl</p>\r\n','xin-chaof','','','','/2016/03/07/ro/','xin chaof','xin chaof','xin chaof','','xin chaof',5,0,0,0,1457321472,NULL,'quyettv',NULL,'',0,0,0,NULL,1457321458,1),(4,'fgfgfg','<p>fgfg</p>\r\n','fgfgfg','','','','/2016/03/09/Xt/','fgfgfg','fgfgfg','fgfgfg','','fgfgfg',0,0,0,0,1457499597,NULL,'quyettv',NULL,'',0,0,0,NULL,1457499586,1);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_category`
--

DROP TABLE IF EXISTS `article_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT '',
  `parent_id` int(11) DEFAULT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `long_description` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_description` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta_keywords` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `h1` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `banner` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  `is_hot` tinyint(1) DEFAULT '0',
  `position` smallint(4) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_parent_idx` (`parent_id`),
  CONSTRAINT `fk_parent` FOREIGN KEY (`parent_id`) REFERENCES `article_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_category`
--

LOCK TABLES `article_category` WRITE;
/*!40000 ALTER TABLE `article_category` DISABLE KEYS */;
INSERT INTO `article_category` VALUES (1,'Tin tức','tin-tuc','',NULL,'Tin tức','<p><img alt=\"\" src=\"http://localhost/diemthilop10.info/frontend/web/images/2016/02/15/Gp/8-3-3.jpg\" style=\"height:313px; width:500px\" /></p>\r\n','Tin tức','Tin tức','Tin tức','Tin tức','fgfg','K7UvoRUFIe.jpg','','/2016/02/15/Gp/',NULL,0,NULL,1455511746,1457499605,'quyettv','quyettv',1);
/*!40000 ALTER TABLE `article_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_to_article_category`
--

DROP TABLE IF EXISTS `article_to_article_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_to_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`article_id`,`article_category_id`),
  KEY `fk_article_category_id_idx` (`article_category_id`),
  CONSTRAINT `fk_article_category_id` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_to_article_category`
--

LOCK TABLES `article_to_article_category` WRITE;
/*!40000 ALTER TABLE `article_to_article_category` DISABLE KEYS */;
INSERT INTO `article_to_article_category` VALUES (1,2,1),(2,3,1),(3,4,1);
/*!40000 ALTER TABLE `article_to_article_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_to_tag`
--

DROP TABLE IF EXISTS `article_to_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`article_id`,`tag_id`),
  KEY `fk_tag_id_idx` (`tag_id`),
  CONSTRAINT `fk2_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_to_tag`
--

LOCK TABLES `article_to_tag` WRITE;
/*!40000 ALTER TABLE `article_to_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_to_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('ADMIN','1',1452756262);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/*',2,NULL,NULL,NULL,1452681631,1452681631),('/admin/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/assignment/*',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/assignment/assign',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/assignment/index',2,NULL,NULL,NULL,1452755712,1452755712),('/admin/assignment/search',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/assignment/view',2,NULL,NULL,NULL,1452756200,1452756200),('/admin/default/*',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/default/index',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/*',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/create',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/delete',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/index',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/update',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/menu/view',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/permission/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/assign',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/create',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/permission/delete',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/index',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/permission/search',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/update',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/permission/view',2,NULL,NULL,NULL,1452756219,1452756219),('/admin/role/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/assign',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/create',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/delete',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/index',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/search',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/update',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/role/view',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/assign',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/create',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/index',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/route/search',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/*',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/create',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/delete',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/index',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/update',2,NULL,NULL,NULL,1452756220,1452756220),('/admin/rule/view',2,NULL,NULL,NULL,1452756220,1452756220),('/article/*',2,NULL,NULL,NULL,1452762763,1452762763),('/article/create',2,NULL,NULL,NULL,1452762763,1452762763),('/article/delete',2,NULL,NULL,NULL,1452762763,1452762763),('/article/index',2,NULL,NULL,NULL,1452762763,1452762763),('/article/update',2,NULL,NULL,NULL,1452762763,1452762763),('/article/view',2,NULL,NULL,NULL,1452762763,1452762763),('/base/*',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/*',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/*',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/db-explain',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/download-mail',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/index',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/toolbar',2,NULL,NULL,NULL,1452756221,1452756221),('/debug/default/view',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/*',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/*',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/action',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/diff',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/index',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/preview',2,NULL,NULL,NULL,1452756221,1452756221),('/gii/default/view',2,NULL,NULL,NULL,1452756221,1452756221),('/site/*',2,NULL,NULL,NULL,1452756221,1452756221),('/site/error',2,NULL,NULL,NULL,1452756221,1452756221),('/site/index',2,NULL,NULL,NULL,1452756221,1452756221),('/site/login',2,NULL,NULL,NULL,1452756221,1452756221),('/site/logout',2,NULL,NULL,NULL,1452756221,1452756221),('/user-action-log/*',2,NULL,NULL,NULL,1452756221,1452756221),('/user-action-log/create',2,NULL,NULL,NULL,1452756221,1452756221),('/user-action-log/delete',2,NULL,NULL,NULL,1452756221,1452756221),('/user-action-log/index',2,NULL,NULL,NULL,1452756221,1452756221),('/user-action-log/update',2,NULL,NULL,NULL,1452756221,1452756221),('/user-action-log/view',2,NULL,NULL,NULL,1452756221,1452756221),('/user/*',2,NULL,NULL,NULL,1452756221,1452756221),('/user/create',2,NULL,NULL,NULL,1452756221,1452756221),('/user/delete',2,NULL,NULL,NULL,1452756221,1452756221),('/user/index',2,NULL,NULL,NULL,1452756221,1452756221),('/user/update',2,NULL,NULL,NULL,1452756221,1452756221),('/user/view',2,NULL,NULL,NULL,1452756221,1452756221),('ADMIN',2,NULL,NULL,NULL,1452681715,1452762771);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('ADMIN','/*'),('ADMIN','/admin/*'),('ADMIN','/admin/assignment/*'),('ADMIN','/admin/assignment/assign'),('ADMIN','/admin/assignment/index'),('ADMIN','/admin/assignment/search'),('ADMIN','/admin/assignment/view'),('ADMIN','/admin/default/*'),('ADMIN','/admin/default/index'),('ADMIN','/admin/menu/*'),('ADMIN','/admin/menu/create'),('ADMIN','/admin/menu/delete'),('ADMIN','/admin/menu/index'),('ADMIN','/admin/menu/update'),('ADMIN','/admin/menu/view'),('ADMIN','/admin/permission/*'),('ADMIN','/admin/permission/assign'),('ADMIN','/admin/permission/create'),('ADMIN','/admin/permission/delete'),('ADMIN','/admin/permission/index'),('ADMIN','/admin/permission/search'),('ADMIN','/admin/permission/update'),('ADMIN','/admin/permission/view'),('ADMIN','/admin/role/*'),('ADMIN','/admin/role/assign'),('ADMIN','/admin/role/create'),('ADMIN','/admin/role/delete'),('ADMIN','/admin/role/index'),('ADMIN','/admin/role/search'),('ADMIN','/admin/role/update'),('ADMIN','/admin/role/view'),('ADMIN','/admin/route/*'),('ADMIN','/admin/route/assign'),('ADMIN','/admin/route/create'),('ADMIN','/admin/route/index'),('ADMIN','/admin/route/search'),('ADMIN','/admin/rule/*'),('ADMIN','/admin/rule/create'),('ADMIN','/admin/rule/delete'),('ADMIN','/admin/rule/index'),('ADMIN','/admin/rule/update'),('ADMIN','/admin/rule/view'),('ADMIN','/article/*'),('ADMIN','/article/create'),('ADMIN','/article/delete'),('ADMIN','/article/index'),('ADMIN','/article/update'),('ADMIN','/article/view'),('ADMIN','/base/*'),('ADMIN','/debug/*'),('ADMIN','/debug/default/*'),('ADMIN','/debug/default/db-explain'),('ADMIN','/debug/default/download-mail'),('ADMIN','/debug/default/index'),('ADMIN','/debug/default/toolbar'),('ADMIN','/debug/default/view'),('ADMIN','/gii/*'),('ADMIN','/gii/default/*'),('ADMIN','/gii/default/action'),('ADMIN','/gii/default/diff'),('ADMIN','/gii/default/index'),('ADMIN','/gii/default/preview'),('ADMIN','/gii/default/view'),('ADMIN','/site/*'),('ADMIN','/site/error'),('ADMIN','/site/index'),('ADMIN','/site/login'),('ADMIN','/site/logout'),('ADMIN','/user-action-log/*'),('ADMIN','/user-action-log/create'),('ADMIN','/user-action-log/delete'),('ADMIN','/user-action-log/index'),('ADMIN','/user-action-log/update'),('ADMIN','/user-action-log/view'),('ADMIN','/user/*'),('ADMIN','/user/create'),('ADMIN','/user/delete'),('ADMIN','/user/index'),('ADMIN','/user/update'),('ADMIN','/user/view');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1452583193),('m130524_201442_init',1452583674);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `original_price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `details` text COLLATE utf8_unicode_ci,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `status` smallint(2) DEFAULT '0',
  `position` smallint(6) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `like_count` int(11) DEFAULT '0',
  `share_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `published_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_quantity` int(11) DEFAULT '0',
  `order_quantity` int(11) DEFAULT '0',
  `sold_quantity` int(11) DEFAULT '0',
  `total_quantity` int(11) DEFAULT '0',
  `total_revenue` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'đồ gỗ mỹ nghệ','dgmn','do-go-my-nghe',NULL,500000,600000,'10-[2].jpg','12825497_10153970457889609_1189245057_n.jpg','/2016/03/14/QD/','<p>fgfgfg<img alt=\"\" src=\"http://localhost/tdhome.vn/frontend/web/images/2016/03/14/QD/13-[--8].jpg\" style=\"height:593px; width:1000px\" /></p>\r\n','đồ gỗ mỹ nghệ','<p>ffgfggf</p>\r\n','đồ gỗ mỹ nghệ','đồ gỗ mỹ nghệ','đồ gỗ mỹ nghệ','đồ gỗ mỹ nghệ','đồ gỗ mỹ nghệ, do go my nghe',0,1,NULL,NULL,NULL,NULL,NULL,NULL,1457945172,1457945266,NULL,'quyettv',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `is_hot` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `status` smallint(2) DEFAULT '0',
  `position` smallint(6) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk2_parent_idx` (`parent_id`),
  CONSTRAINT `fk2_parent` FOREIGN KEY (`parent_id`) REFERENCES `product_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_id_idx` (`product_id`),
  CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (9,1,'11.jpg','/2016/03/14/BL/','#ff9900'),(10,1,'14.jpg','/2016/03/14/wM/','#ff9900'),(11,1,'10-[2].jpg','/2016/03/14/Ug/','#ff0000');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_to_product_category`
--

DROP TABLE IF EXISTS `product_to_product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_to_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`product_category_id`,`product_id`),
  KEY `fk_product_category_id_idx` (`product_category_id`),
  KEY `fk2_product_id_idx` (`product_id`),
  CONSTRAINT `fk2_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_to_product_category`
--

LOCK TABLES `product_to_product_category` WRITE;
/*!40000 ALTER TABLE `product_to_product_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_to_product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redirect_url`
--

DROP TABLE IF EXISTS `redirect_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redirect_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_urls` text COLLATE utf8_unicode_ci NOT NULL,
  `to_url` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `status` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redirect_url`
--

LOCK TABLES `redirect_url` WRITE;
/*!40000 ALTER TABLE `redirect_url` DISABLE KEYS */;
/*!40000 ALTER TABLE `redirect_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo_info`
--

DROP TABLE IF EXISTS `seo_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `image` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `image_path` varchar(511) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo_info`
--

LOCK TABLES `seo_info` WRITE;
/*!40000 ALTER TABLE `seo_info` DISABLE KEYS */;
INSERT INTO `seo_info` VALUES (3,'/tin-tuc',1,1,'ewewe','ewwe','weew','eweew','eeeewew','','15.jpg','/2016/02/17/ev/',1455673730,'quyettv',1455674057,'quyettv'),(4,'hggh',1,0,'ghghg','ghgh','ghgh','ghgh','ghgh','<p>ghghffg</p>\r\n','','/2016/03/07/Ji/',1457322382,'quyettv',1457322393,'quyettv'),(5,' http://localhost/diemthilop10.info/frontend/web/tin-tuc',1,0,'gfg','gfg','fggf','gfg','gfg','','','/2016/03/09/ZK/',1457330804,'quyettv',1457499614,'quyettv');
/*!40000 ALTER TABLE `seo_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshow_item`
--

DROP TABLE IF EXISTS `slideshow_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshow_item`
--

LOCK TABLES `slideshow_item` WRITE;
/*!40000 ALTER TABLE `slideshow_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshow_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_slugs` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(511) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` smallint(4) DEFAULT NULL,
  `long_description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `status` smallint(2) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'ehehe','ehehe',NULL,'ehehe','ehehe','ehehe','','ehehe','',NULL,'','15.jpg','/2016/03/14/vu/',0,0,NULL,1457926941,'quyettv',NULL,NULL);
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'quyettv','wlho-VRNjNyJbPA1OeITK-AxMa_X3rcx','$2y$13$gvo7VgiMIeC.Z7KXu8L5uuQaaad/fLraOQHwbrFz4upGay5VbhpGO',NULL,'quyettv@hdcgroup.vn',10,0,1455758218,'Quyết','',748130400,'',0,'13.jpg','/2016/02/16/Dk/');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL,
  `is_success` tinyint(1) DEFAULT '0',
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `object_pk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_username` (`username`),
  CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_log`
--

LOCK TABLES `user_log` WRITE;
/*!40000 ALTER TABLE `user_log` DISABLE KEYS */;
INSERT INTO `user_log` VALUES (1,'quyettv','Create Product , id = 1',0,127,'',0),(2,'quyettv','Update Product , id = 1',0,127,'',0),(3,'quyettv','Update Product , id = 1',0,127,'',0),(4,'quyettv','Update Product , id = 1',0,127,'',0),(5,'quyettv','Create ProductTranslation , id = 1',0,127,'',0),(6,'quyettv','Update ProductTranslation , id = 1',0,127,'',0),(7,'quyettv','Update Product , id = 1',0,127,'',0),(8,'quyettv','Create Product , id = 2',0,127,'',0),(9,'quyettv','Create Product , id = 3',0,127,'',0),(10,'quyettv','Update Product , id = 3',0,127,'',0),(11,'quyettv','Update Product , id = 1',0,127,'',0),(12,'quyettv','Update Product , id = 1',0,127,'',0),(13,'quyettv','Update Product , id = 2',0,127,'',0),(14,'quyettv','Create Language , id = 1',0,127,'',0),(15,'quyettv','Delete Language , id = 1',0,127,'',0),(16,'quyettv','Delete Product , id = 3',0,127,'',0),(17,'quyettv','Update Product , id = 2',0,127,'',0),(18,'quyettv','Create Language , id = 2',0,127,'',0),(19,'quyettv','Delete Language , id = 2',0,127,'',0),(20,'quyettv','Create Language , id = 3',0,127,'',0),(21,'quyettv','Delete Language , id = 3',0,127,'',0),(22,'quyettv','Create Language , id = 4',0,127,'',0),(23,'quyettv','Delete Language , id = 4',0,127,'',0),(24,'quyettv','Create Language , id = 5',0,127,'',0),(25,'quyettv','Delete Language , id = 5',0,127,'',0),(26,'quyettv','Create Language , id = 6',0,127,'',0),(27,'quyettv','Delete Language , id = 6',0,127,'',0),(28,'quyettv','Create Language , id = 7',0,127,'',0),(29,'quyettv','Delete Language , id = 7',0,127,'',0),(30,'quyettv','Update Product , id = 1',0,127,'',0),(31,'quyettv','Update Product , id = 2',0,127,'',0),(32,'quyettv','Delete Product , id = 2',0,127,'',0),(33,'quyettv','Delete Product , id = 1',0,127,'',0),(34,'quyettv','Create Product , id = 4',0,127,'',0),(35,'quyettv','Create Product , id = 5',0,127,'',0),(36,'quyettv','Create Product , id = 6',0,127,'',0),(37,'quyettv','Update Product , id = 6',0,127,'',0),(38,'quyettv','Update Product , id = 6',0,127,'',0),(39,'quyettv','Update Product , id = 6',0,127,'',0),(40,'quyettv','Delete Product , id = 6',0,127,'',0),(41,'quyettv','Delete Product , id = 5',0,127,'',0),(42,'quyettv','Delete Product , id = 4',0,127,'',0),(43,'quyettv','Create Language , id = 1',0,127,'',0),(44,'quyettv','Update Language , id = 1',0,127,'',0),(45,'quyettv','Update Language , id = 1',0,127,'',0),(46,'quyettv','Create Product , id = 1',0,127,'',0),(47,'quyettv','Update Product , id = 1',0,127,'',0),(48,'quyettv','Create Currency , id = 1',0,127,'',0),(49,'quyettv','Update Product , id = 1',0,127,'',0),(50,'quyettv','Delete Product , id = 1',0,127,'',0),(51,'quyettv','Create Language , id = 2',0,127,'',0),(52,'quyettv','Delete Language , id = 2',0,127,'',0),(53,'quyettv','Create Product , id = 2',0,127,'',0),(54,'quyettv','Update Product , id = 2',0,127,'',0),(55,'quyettv','Update Product , id = 2',0,127,'',0),(56,'quyettv','Update Product , id = 2',0,127,'',0),(57,'quyettv','Update Product , id = 2',0,127,'',0),(58,'quyettv','Update Product , id = 2',0,127,'',0),(59,'quyettv','Update Product , id = 2',0,127,'',0),(60,'quyettv','Update Product , id = 2',0,127,'',0),(61,'quyettv','Update Product , id = 2',0,127,'',0),(62,'quyettv','Update Product , id = 2',0,127,'',0),(63,'quyettv','Update Product , id = 2',0,127,'',0),(64,'quyettv','Update Product , id = 2',0,127,'',0),(65,'quyettv','Update Product , id = 2',0,127,'',0),(66,'quyettv','Update Product , id = 2',0,127,'',0),(67,'quyettv','Update Product , id = 2',0,127,'',0),(68,'quyettv','Update Product , id = 2',0,127,'',0),(69,'quyettv','Update Product , id = 2',0,127,'',0),(70,'quyettv','Update Product , id = 2',0,127,'',0),(71,'quyettv','Update Product , id = 2',0,127,'',0),(72,'quyettv','Update Product , id = 2',0,127,'',0),(73,'quyettv','Update Product , id = 2',0,127,'',0),(74,'quyettv','Delete Product , id = 2',0,127,'',0),(75,'quyettv','Create Product, id = 3',0,127,'',0),(76,'quyettv','Create Product, id = 4',0,127,'',0),(77,'quyettv','Create Product, id = 5',0,127,'',0),(78,'quyettv','Update Product, id = 5',0,127,'',0),(79,'quyettv','Create Product, id = 6',0,127,'',0),(80,'quyettv','Create Product, id = 7',0,127,'',0),(81,'quyettv','Update Product, id = 7',0,127,'',0),(82,'quyettv','Update Product, id = 7',0,127,'',0),(83,'quyettv','Update Product, id = 7',0,127,'',0),(84,'quyettv','Update Product, id = 7',0,127,'',0),(85,'quyettv','Delete Product, id = 3',0,127,'',0),(86,'quyettv','Create Language, id = 3',0,127,'',0),(87,'quyettv','Create ProductTranslation, id = 3',0,127,'',0),(88,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(89,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(90,'quyettv','Create Product, id = 8',0,127,'',0),(91,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(92,'quyettv','Create ProductTranslation, id = 4',0,127,'',0),(93,'quyettv','Update ProductTranslation, id = 4',0,127,'',0),(94,'quyettv','Create Product, id = 9',0,127,'',0),(95,'quyettv','Create ProductTranslation, id = 5',0,127,'',0),(96,'quyettv','Create Product, id = 10',0,127,'',0),(97,'quyettv','Create ProductImage, id = 1',0,127,'',0),(98,'quyettv','Update ProductImage, id = 1',0,127,'',0),(99,'quyettv','Update ProductImage, id = 1',0,127,'',0),(100,'quyettv','Update ProductImage, id = 1',0,127,'',0),(101,'quyettv','Update ProductImage, id = 1',0,127,'',0),(102,'quyettv','Update ProductImage, id = 1',0,127,'',0),(103,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(104,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(105,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(106,'quyettv','Update ProductTranslation, id = 3',0,127,'',0),(107,'quyettv','Create ProductTranslation, id = 6',0,127,'',0),(108,'quyettv','Update ProductTranslation, id = 6',0,127,'',0),(109,'quyettv','Update ProductTranslation, id = 6',0,127,'',0),(110,'quyettv','Create ProductImage, id = 2',0,127,'',0),(111,'quyettv','Update Language, id = 3',0,127,'',0),(112,'quyettv','Update Language, id = 3',0,127,'',0),(113,'quyettv','Update Language, id = 3',0,127,'',0),(114,'quyettv','Update Currency, id = 1',0,127,'',0),(115,'quyettv','Create ArticleCategory, id = 1',1455511746,1,'',0),(116,'quyettv','Create Article, id = 1',1455511833,1,'',0),(117,'quyettv','Create Article, id = 2',1455588641,1,'',0),(118,'quyettv','Update Article, id = 2',1455589664,1,'',0),(119,'quyettv','Create ArticleToArticleCategory, id = 1',1455589665,1,'',0),(120,'quyettv','Update Article, id = 1',1455589678,1,'',0),(121,'quyettv','Create ArticleToArticleCategory, id = 2',1455589678,1,'',0),(122,'quyettv','Create ArticleCategory, id = 2',1455589725,1,'',0),(123,'quyettv','Update Article, id = 1',1455589736,1,'',0),(124,'quyettv','Create ArticleToArticleCategory, id = 3',1455589736,1,'',0),(125,'quyettv','Delete ArticleToArticleCategory, id = 2',1455589737,1,'',0),(126,'quyettv','Update ArticleCategory, id = 2',1455590677,1,'',0),(127,'quyettv','Create SeoInfo, id = 1',1455591310,1,'',0),(128,'quyettv','Delete ArticleToArticleCategory, id = 3',1455591391,1,'',0),(129,'quyettv','Delete ArticleCategory, id = 2',1455591392,1,'',0),(130,'quyettv','Create SeoInfo, id = 2',1455602395,1,'',0),(131,'quyettv','Update User, id = 1',1455620438,0,'',0),(132,'quyettv','Update User, id = 1',1455620442,0,'',0),(133,'quyettv','Update User, id = 1',1455620527,0,'',0),(134,'quyettv','Update User, id = 1',1455620757,0,'',0),(135,'quyettv','Update User, id = 1',1455620855,0,'',0),(136,'quyettv','Update User, id = 1',1455620863,1,'',0),(137,'quyettv','Update User, id = 1',1455620886,1,'',0),(138,'quyettv','Update User, id = 1',1455620990,1,'',0),(139,'quyettv','Update User, id = 1',1455622765,1,'',0),(140,'quyettv','Update SeoInfo, id = 2',1455673688,1,'',0),(141,'quyettv','Delete SeoInfo, id = 2',1455673711,1,'',0),(142,'quyettv','Create SeoInfo, id = 3',1455673730,1,'',0),(143,'quyettv','Update SeoInfo, id = 3',1455674032,1,'',0),(144,'quyettv','Update SeoInfo, id = 3',1455674057,1,'',0),(145,'quyettv','Update Article, id = 2',1455683503,1,'',0),(146,'quyettv','Update Article, id = 1',1455685406,1,'',0),(147,'quyettv','Create ArticleToArticleCategory, id = 2',1455685406,1,'',0),(148,'quyettv','Update User, id = 1',1455705144,0,'',0),(149,'quyettv','Update User, id = 1',1455705164,1,'',0),(150,'quyettv','Update User, id = 1',1455705178,1,'',0),(151,'quyettv','Update User, id = 1',1455705267,1,'',0),(152,'quyettv','Update User, id = 1',1455705442,1,'',0),(153,'quyettv','Update User, id = 1',1455705717,1,'',0),(154,'quyettv','Update User, id = 1',1455758217,1,'',0),(155,'quyettv','Update Article, id = 2',1456453405,1,'',0),(156,'quyettv','Create ArticleToArticleCategory, id = 1',1456453405,1,'',0),(157,'quyettv','Update Article, id = 2',1456914598,1,'',0),(158,'quyettv','Update Article, id = 2',1456917055,1,'',0),(159,'quyettv','Update Article, id = 2',1456996614,1,'',0),(160,'quyettv','Update ArticleCategory, id = 1',1456998084,1,'',0),(161,'quyettv','Update Article, id = 2',1457085093,1,'',0),(162,'quyettv','Update Article, id = 2',1457085408,1,'',0),(163,'quyettv','Create',1457321472,1,'Article',3),(164,'quyettv','Create',1457321472,1,'ArticleToArticleCategory',2),(165,'quyettv','Create',1457322382,1,'SeoInfo',4),(166,'quyettv','Update',1457322407,1,'ArticleCategory',1),(167,'quyettv','Create',1457330804,1,'SeoInfo',5),(168,'quyettv','Create',1457499597,1,'Article',4),(169,'quyettv','Create',1457499597,1,'ArticleToArticleCategory',3),(170,'quyettv','Update',1457499605,1,'ArticleCategory',1),(171,'quyettv','Update',1457499614,1,'SeoInfo',5),(172,'quyettv','Create',1457510676,1,'Article',5),(173,'quyettv','Create',1457510676,1,'ArticleToArticleCategory',4),(174,'quyettv','Delete',1457510693,1,'Article',1),(175,'quyettv','Delete',1457510763,1,'ArticleToArticleCategory',4),(176,'quyettv','Delete',1457510763,1,'Article',5),(177,'quyettv','Create',1457926941,1,'Tag',1),(178,'quyettv','Create',1457945266,1,'Product',1),(179,'quyettv','Create',1457945622,1,'ProductImage',9),(180,'quyettv','Create',1457945647,1,'ProductImage',10),(181,'quyettv','Create',1457945686,1,'ProductImage',11);
/*!40000 ALTER TABLE `user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tdhome_vn'
--

--
-- Dumping routines for database 'tdhome_vn'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-14 17:41:24
