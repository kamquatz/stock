DROP TABLE IF EXISTS `debts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `debts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_category` (`date`,`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `debts_categories`
--

DROP TABLE IF EXISTS `debts_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `debts_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` varchar(8) DEFAULT 'IN',
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debts_categories`
--

LOCK TABLES `debts_categories` WRITE;
/*!40000 ALTER TABLE `debts_categories` DISABLE KEYS */;
INSERT INTO `debts_categories` VALUES (1,'PAID','IN',1,1,NULL,1,'2019-12-10 14:00:10'),(2,'NEW','OUT',1,1,NULL,1,'2019-12-10 14:00:10');
/*!40000 ALTER TABLE `debts_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_categories`
--

DROP TABLE IF EXISTS `item_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_categories`
--

LOCK TABLES `item_categories` WRITE;
/*!40000 ALTER TABLE `item_categories` DISABLE KEYS */;
INSERT INTO `item_categories` VALUES (1,'BEERS',1,1,'2019-12-08 10:32:52',1,'2019-12-08 07:32:52'),(2,'CANS',1,1,'2019-12-08 10:34:49',1,'2019-12-08 07:34:49'),(3,'QUARTERS',1,1,'2019-12-08 10:34:49',1,'2019-12-09 07:28:24'),(4,'NUSU',1,1,'2019-12-08 10:34:49',1,'2019-12-08 07:34:49'),(5,'MIZINGA',1,1,'2019-12-08 10:34:50',1,'2019-12-09 07:28:35'),(6,'WINES',1,1,'2019-12-08 10:34:50',1,'2019-12-09 07:28:24'),(7,'SOFT DRINKS',1,1,'2019-12-08 10:34:51',1,'2019-12-09 07:28:24'),(8,'KEG',1,1,'2019-12-10 14:38:39',1,'2019-12-10 11:38:53');
/*!40000 ALTER TABLE `item_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `buying_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_category` (`category_id`,`name`,`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'BALOZI',146,200,0,1,1,1,'2019-12-08 10:47:01',1,'2019-12-08 07:47:01'),(2,'TUSKER',153,200,0,1,1,1,'2019-12-08 10:49:17',1,'2019-12-16 09:55:59'),(3,'WHITE CAP',166,220,0,1,1,1,'2019-12-08 10:49:17',1,'2019-12-11 10:37:56'),(4,'GK',176,220,0,1,1,1,'2019-12-08 10:49:17',1,'2019-12-15 14:11:39'),(5,'GK SMOOTH',153,220,0,1,1,1,'2019-12-08 10:49:17',1,'2019-12-21 10:27:28'),(6,'HUNTERS',230,300,0,3,1,1,'2019-12-08 10:49:17',1,'2019-12-21 10:28:03'),(7,'HUNTERS CHOICE',350,500,0,4,1,1,'2019-12-08 10:49:17',1,'2019-12-16 09:51:27'),(8,'TUSKER CIDAR',162,220,0,1,1,1,NULL,1,'2019-12-16 09:56:03'),(9,'TUSKER LITE',153,200,0,1,1,1,NULL,1,'2019-12-21 10:27:11'),(10,'TUSKER MALT',153,200,0,1,1,1,NULL,1,'2019-12-21 10:27:14'),(11,'FAXE',175,220,0,2,1,1,NULL,1,'2019-12-09 06:37:19'),(12,'GUARANA',140,200,0,2,1,1,NULL,1,'2019-12-16 09:51:16'),(13,'GUINNESS CAN',180,220,0,2,1,1,NULL,1,'2019-12-09 06:37:35'),(14,'REDBULL',135,200,0,2,1,1,NULL,1,'2019-12-09 06:37:36'),(15,'MONSTER',165,200,0,2,1,1,NULL,1,'2019-12-09 06:37:43'),(16,'TUSKER CAN',165,200,0,2,1,1,NULL,1,'2019-12-09 06:37:45'),(17,'CIDAR CAN',180,220,0,2,1,1,NULL,1,'2019-12-09 06:37:46'),(18,'WHITE CAP CAN',180,220,0,2,1,1,NULL,1,'2019-12-11 10:37:56'),(19,'PILSNER CAN',165,200,0,2,1,1,NULL,1,'2019-12-09 06:37:54'),(20,'RICHOT',450,700,0,4,1,1,NULL,1,'2019-12-09 06:45:00'),(21,'KIBAO',330,450,0,4,1,1,NULL,1,'2019-12-09 06:45:01'),(22,'KC',350,500,0,4,1,1,NULL,1,'2019-12-09 06:45:02'),(23,'VICEROY',450,700,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-09 06:45:03'),(24,'VAT 69',700,1000,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-15 14:01:52'),(25,'GILBEYS',450,700,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-09 06:45:04'),(26,'SMIRNOFF',450,700,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-09 06:45:04'),(27,'BLACK & WHITE',380,600,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-09 06:45:04'),(28,'BLACK LABEL',900,1200,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-09 06:45:05'),(29,'WILLIAM LAWSON',600,800,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-15 14:01:52'),(30,'ALL SEASONS',370,550,0,4,1,1,'0000-00-00 00:00:00',1,'2019-12-09 06:45:05'),(31,'KC',580,900,0,5,1,1,NULL,1,'2019-12-16 09:55:33'),(32,'KIBAO',450,800,0,5,1,1,NULL,1,'2019-12-09 06:53:29'),(33,'NAPS',450,700,0,5,1,1,NULL,1,'2019-12-09 06:53:29'),(34,'CAPTAIN MORGAN',713,1100,0,5,1,1,NULL,1,'2019-12-16 05:54:23'),(35,'ALL SEASON',650,1000,0,5,1,1,NULL,1,'2019-12-09 06:53:30'),(36,'V&A',650,900,0,5,1,1,NULL,1,'2019-12-09 06:53:31'),(37,'VAT 69',1600,2000,0,5,1,1,NULL,1,'2019-12-15 14:02:11'),(38,'VICEROY',1100,1500,0,5,1,1,NULL,1,'2019-12-09 06:53:32'),(39,'GRANTS',1100,1500,0,5,1,1,NULL,1,'2019-12-09 06:53:32'),(40,'SMIRNOFF',1100,1500,0,5,1,1,NULL,1,'2019-12-09 06:53:32'),(41,'GILBEYS',1100,1500,0,5,1,1,NULL,1,'2019-12-09 06:53:33'),(42,'BLACK & WHITE',900,1200,0,5,1,1,NULL,1,'2019-12-09 06:53:33'),(43,'WILLIAM LAWSON',1100,1500,0,5,1,1,NULL,1,'2019-12-15 14:01:10'),(44,'BLACK LABEL',1600,2000,0,5,1,1,NULL,1,'2019-12-09 06:53:34'),(45,'JAMESON',2400,3000,0,5,1,1,NULL,1,'2019-12-09 06:53:34'),(46,'BAILEYS',2400,3000,0,5,1,1,NULL,1,'2019-12-09 06:53:35'),(47,'FOUR COUSIN',700,950,0,6,1,1,NULL,1,'2019-12-09 06:56:34'),(48,'CELLAR CASK',700,950,0,6,1,1,NULL,1,'2019-12-09 06:56:35'),(49,'4TH STREET',700,950,0,6,1,1,NULL,1,'2019-12-09 06:56:35'),(50,'CAPRICE',650,800,0,6,1,1,NULL,1,'2019-12-09 06:56:36'),(51,'PENASOL',650,800,0,6,1,1,NULL,1,'2019-12-09 06:56:36'),(52,'DEL MONTE',190,300,0,7,1,1,NULL,1,'2019-12-11 10:37:57'),(53,'PEEK N PEEL',190,300,0,7,1,1,NULL,1,'2019-12-09 06:59:48'),(54,'SODA',25,50,0,7,1,1,NULL,1,'2019-12-09 06:59:49'),(55,'MIRINDA',25,50,0,7,1,1,NULL,1,'2019-12-09 06:59:49'),(56,'WATER 1.5L',20,100,0,7,1,1,NULL,1,'2019-12-09 06:59:49'),(57,'WATER 1L',25,100,0,7,1,1,NULL,1,'2019-12-09 06:59:50'),(58,'WATER 0.5L',13,50,0,7,1,1,NULL,1,'2019-12-09 06:59:50'),(59,'WHITE PEARL',137,200,0,3,1,1,NULL,1,'2019-12-21 10:26:55'),(60,'CLUBMAN',230,300,0,3,1,1,NULL,1,'2019-12-09 07:04:51'),(61,'NAPS',140,200,0,3,1,1,NULL,1,'2019-12-09 07:04:51'),(62,'KK',146,200,0,3,1,1,NULL,1,'2019-12-16 09:51:03'),(63,'CHROME',180,250,0,3,1,1,NULL,1,'2019-12-16 09:50:24'),(64,'KC',218,300,0,3,1,1,NULL,1,'2019-12-16 05:52:35'),(65,'KIBAO',165,250,0,3,1,1,NULL,1,'2019-12-16 09:50:13'),(66,'VICEROY',350,500,0,3,1,1,NULL,1,'2019-12-09 07:04:53'),(67,'SMIRNOFF',350,500,0,3,1,1,NULL,1,'2019-12-09 07:04:54'),(68,'GILBEYS',350,500,0,3,1,1,NULL,1,'2019-12-09 07:04:54'),(69,'CAPTAIN MORGAN',254,350,0,3,1,1,NULL,1,'2019-12-16 05:52:58'),(70,'RICHOT',350,500,0,3,1,1,NULL,1,'2019-12-09 07:04:55'),(71,'V&A',220,300,0,3,1,1,NULL,1,'2019-12-09 07:04:55'),(72,'RED LABEL',350,500,0,3,1,1,NULL,1,'2019-12-09 07:04:55'),(73,'BEST',253,350,0,3,1,1,NULL,1,'2019-12-09 07:05:39'),(74,'HUNTERS CHOICE',665,900,0,5,1,1,NULL,1,'2019-12-16 09:53:02'),(75,'RED NORMAL',4160,5400,0,8,1,1,NULL,1,'2019-12-10 11:41:19'),(76,'DARK EXTRA',4610,6400,0,8,1,1,NULL,1,'2019-12-10 11:41:19'),(80,'RICHOT',1100,1500,0,5,1,1,NULL,1,'2019-12-12 08:49:30'),(81,'CHROME',484,800,0,5,1,1,NULL,1,'2019-12-16 05:53:40'),(82,'PILSNER',156,200,0,1,1,1,NULL,1,'2019-12-12 08:51:30'),(83,'HEINEKEN',160,200,0,1,1,1,NULL,1,'2019-12-12 08:51:30'),(92,'KONYAGI',168,250,0,3,1,1,NULL,1,'2019-12-16 09:50:16'),(93,'SHARK',140,200,0,2,1,1,NULL,1,'2019-12-23 12:15:06'),(94,'SWITCH',145,200,0,2,1,1,NULL,1,'2019-12-23 12:15:06'),(95,'ORIJIN',194,250,0,3,1,1,NULL,1,'2019-12-23 12:15:06');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `money_categories`
--

DROP TABLE IF EXISTS `money_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `money_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` varchar(8) NOT NULL DEFAULT 'in',
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_type` (`name`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `money_categories`
--

LOCK TABLES `money_categories` WRITE;
/*!40000 ALTER TABLE `money_categories` DISABLE KEYS */;
INSERT INTO `money_categories` VALUES (1,'CASH','IN',1,1,NULL,1,'2019-12-10 12:17:25'),(2,'M-PESA','IN',1,1,NULL,1,'2019-12-11 13:20:22'),(3,'TILL WITHDRAW','OUT',1,1,NULL,1,'2019-12-10 12:17:26'),(4,'CHAMA','OUT',1,1,NULL,1,'2019-12-10 12:17:26'),(5,'PRE-STOCK PAYMENTS','OUT',1,1,NULL,1,'2019-12-10 12:17:27'),(6,'EMPLOYEES SALARY','OUT',1,1,NULL,1,'2019-12-12 09:40:37'),(7,'FOOD','OUT',1,1,NULL,1,'2019-12-10 12:17:28'),(8,'MISC PURCHASES','OUT',1,1,NULL,1,'2019-12-10 12:17:28'),(9,'OTHERS','OUT',1,1,NULL,1,'2019-12-10 12:17:28'),(10,'TRANSPORT PORK','OUT',1,1,NULL,1,'2019-12-10 12:50:43'),(11,'TRANSPORT KEG','OUT',1,1,NULL,1,'2019-12-10 12:50:44'),(12,'TRANSPORT SODA','OUT',1,1,NULL,1,'2019-12-10 12:50:44'),(13,'TRANSPORT BEER','OUT',1,1,NULL,1,'2019-12-10 12:50:44'),(14,'POLICE','OUT',1,1,NULL,1,'2019-12-10 12:50:45'),(15,'CLEANING','OUT',1,1,NULL,1,'2019-12-10 19:58:23'),(16,'REPAIRS','OUT',1,1,NULL,1,'2019-12-10 19:58:24'),(17,'KEG FINISHED','IN',1,1,NULL,1,'2019-12-12 17:05:41'),(19,'BANK/CARD SWIPE','IN',1,1,NULL,1,'2019-12-15 12:31:15');
/*!40000 ALTER TABLE `money_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monies`
--

DROP TABLE IF EXISTS `monies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_category` (`date`,`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=749 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `privs`
--

DROP TABLE IF EXISTS `privs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `desc` varchar(256) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privs`
--

LOCK TABLES `privs` WRITE;
/*!40000 ALTER TABLE `privs` DISABLE KEYS */;
INSERT INTO `privs` VALUES (1,'admin','Add/update and delete users',1,1,'2019-12-08 10:44:14',1,'2019-12-08 07:44:14'),(2,'manager','Add/update and delete users',1,1,'2019-12-08 10:44:14',1,'2019-12-08 07:44:14'),(3,'supervisor','Add/update and delete items',1,1,'2019-12-08 10:44:14',1,'2019-12-08 07:44:14'),(4,'counter','Add/update stock',1,1,'2019-12-08 10:44:14',1,'2019-12-08 07:44:14');
/*!40000 ALTER TABLE `privs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `desc` varchar(256) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Add/update and delete users',1,1,'2019-12-08 10:45:03',1,'2019-12-08 07:45:03'),(2,'manager','Add/update and delete users',1,1,'2019-12-08 10:45:03',1,'2019-12-08 07:45:03'),(3,'supervisor','Add/update and delete items',1,1,'2019-12-08 10:45:03',1,'2019-12-08 07:45:03'),(4,'counter','Add/update stock',1,1,'2019-12-08 10:45:03',1,'2019-12-08 07:45:03');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `opening` int(11) DEFAULT NULL,
  `purchases` int(11) DEFAULT NULL,
  `additions` int(11) DEFAULT NULL,
  `closing` int(11) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_date` (`date`,`item_id`,`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2280 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `privs_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
