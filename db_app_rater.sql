/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.27-MariaDB : Database - rater_area
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rater_area` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `rater_area`;

/*Table structure for table `dial_country` */

DROP TABLE IF EXISTS `dial_country`;

CREATE TABLE `dial_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(25) DEFAULT NULL,
  `dial_code` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dial_country` */

insert  into `dial_country`(`id`,`country`,`dial_code`) values 
(1,'Afganistan','93'),
(2,'Afrika Selatan','27'),
(3,'Afrika Tengah','236'),
(4,'Albania','355'),
(5,'Algeria','213'),
(6,'Amerika Serikat','1'),
(7,'Andorra','376'),
(8,'Angola','244'),
(9,'Antigua & Barbuda','1-268'),
(10,'Arab Saudi','966'),
(11,'Argentina','54'),
(12,'Armenia','374'),
(13,'Australia','61'),
(14,'Austria','43'),
(15,'Azerbaijan','994'),
(16,'Bahama','1-242'),
(17,'Bahrain','973'),
(18,'Bangladesh','880'),
(19,'Barbados','1-246'),
(20,'Belanda','31'),
(21,'Belarus','375'),
(22,'Belgia','32'),
(23,'Belize','501'),
(24,'Benin','229'),
(25,'Bhutan','975'),
(26,'Bolivia','591'),
(27,'Bosnia & Herzegovina','387'),
(28,'Botswana','267'),
(29,'Brasil','55'),
(30,'Britania Raya (Inggris)','44'),
(31,'Brunei Darussalam','673'),
(32,'Bulgaria','359'),
(33,'Burkina Faso','226'),
(34,'Burundi','257'),
(35,'Ceko','420'),
(36,'Chad','235'),
(37,'Chili','56'),
(38,'China','86'),
(39,'Denmark','45'),
(40,'Djibouti','253'),
(41,'Domikia','1-767'),
(42,'Ekuador','593'),
(43,'El Salvador','503'),
(44,'Eritrea','291'),
(45,'Estonia','372'),
(46,'Ethiopia','251'),
(47,'Fiji','679'),
(48,'Filipina','63'),
(49,'Finlandia','358'),
(50,'Gabon','241'),
(51,'Gambia','220'),
(52,'Georgia','995'),
(53,'Ghana','233'),
(54,'Grenada','1-473'),
(55,'Guatemala','502'),
(56,'Guinea','224'),
(57,'Guinea Bissau','245'),
(58,'Guinea Khatulistiwa','240'),
(59,'Guyana','592'),
(60,'Haiti','509'),
(61,'Honduras','504'),
(62,'Hongaria','36'),
(63,'Hongkong','852'),
(64,'India','91'),
(65,'Indonesia','62'),
(66,'Irak','964'),
(67,'Iran','98'),
(68,'Irlandia','353'),
(69,'Islandia','354'),
(70,'Israel','972'),
(71,'Italia','39'),
(72,'Jamaika','1-876'),
(73,'Jepang','81'),
(74,'Jerman','49'),
(75,'Jordan','962'),
(76,'Kamboja','855'),
(77,'Kamerun','237'),
(78,'Kanada','1'),
(79,'Kazakhstan','7'),
(80,'Kenya','254'),
(81,'Kirgizstan','996'),
(82,'Kiribati','686'),
(83,'Kolombia','57'),
(84,'Komoro','269'),
(85,'Republik Kongo','243'),
(86,'Korea Selatan','82'),
(87,'Korea Utara','850'),
(88,'Kosta Rika','506'),
(89,'Kroasia','385'),
(90,'Kuba','53'),
(91,'Kuwait','965'),
(92,'Laos','856'),
(93,'Latvia','371'),
(94,'Lebanon','961'),
(95,'Lesotho','266'),
(96,'Liberia','231'),
(97,'Libya','218'),
(98,'Liechtenstein','423'),
(99,'Lituania','370'),
(100,'Luksemburg','352'),
(101,'Madagaskar','261'),
(102,'Makao','853'),
(103,'Makedonia','389'),
(104,'Maladewa','960'),
(105,'Malawi','265'),
(106,'Malaysia','60'),
(107,'Mali','223'),
(108,'Malta','356'),
(109,'Maroko','212'),
(110,'Marshall (Kep.)','692'),
(111,'Mauritania','222'),
(112,'Mauritius','230'),
(113,'Meksiko','52'),
(114,'Mesir','20'),
(115,'Mikronesia (Kep.)','691'),
(116,'Moldova','373'),
(117,'Monako','377'),
(118,'Mongolia','976'),
(119,'Montenegro','382'),
(120,'Mozambik','258'),
(121,'Myanmar','95'),
(122,'Namibia','264'),
(123,'Nauru','674'),
(124,'Nepal','977'),
(125,'Niger','227'),
(126,'Nigeria','234'),
(127,'Nikaragua','505'),
(128,'Norwegia','47'),
(129,'Oman','968'),
(130,'Pakistan','92'),
(131,'Palau','680'),
(132,'Panama','507'),
(133,'Pantai Gading','225'),
(134,'Papua Nugini','675'),
(135,'Paraguay','595'),
(136,'Perancis','33'),
(137,'Peru','51'),
(138,'Polandia','48'),
(139,'Portugal','351'),
(140,'Qatar','974'),
(141,'Rep. Dem. Kongo','242'),
(142,'Republik Dominika','1-809; 1-8'),
(143,'Rumania','40'),
(144,'Rusia','7'),
(145,'Rwanda','250'),
(146,'Saint Kitts and Nevis','1-869'),
(147,'Saint Lucia','1-758'),
(148,'Saint Vincent & the Grena','1-784'),
(149,'Samoa','685'),
(150,'San Marino','378'),
(151,'Sao Tome & Principe','239'),
(152,'Selandia Baru','64'),
(153,'Senegal','221'),
(154,'Serbia','381'),
(155,'Seychelles','248'),
(156,'Sierra Leone','232'),
(157,'Singapura','65'),
(158,'Siprus','357'),
(159,'Slovenia','386'),
(160,'Slowakia','421'),
(161,'Solomon (Kep.)','677'),
(162,'Somalia','252'),
(163,'Spanyol','34'),
(164,'Sri Lanka','94'),
(165,'Sudan','249'),
(166,'Sudan Selatan','211'),
(167,'Suriah','963'),
(168,'Suriname','597'),
(169,'Swaziland','268'),
(170,'Swedia','46'),
(171,'Swiss','41'),
(172,'Tajikistan','992'),
(173,'Tanjung Verde','238'),
(174,'Tanzania','255'),
(175,'Taiwan','886'),
(176,'Thailand','66'),
(177,'Timor Leste','670'),
(178,'Togo','228'),
(179,'Tonga','676'),
(180,'Trinidad & Tobago','1-868'),
(181,'Tunisia','216'),
(182,'Turki','90'),
(183,'Turkmenistan','993'),
(184,'Tuvalu','688'),
(185,'Uganda','256'),
(186,'Ukraina','380'),
(187,'Uni Emirat Arab','971'),
(188,'Uruguay','598'),
(189,'Uzbekistan','998'),
(190,'Vanuatu','678'),
(191,'Venezuela','58'),
(192,'Vietnam','84'),
(193,'Yaman','967'),
(194,'Yunani','30'),
(195,'Zambia','260'),
(196,'Zimbabwe','263');

/*Table structure for table `evaluation` */

DROP TABLE IF EXISTS `evaluation`;

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(25) NOT NULL,
  `appraisal_date` date DEFAULT NULL,
  `sub_area_id` int(11) NOT NULL,
  `score` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `evaluation` */

/*Table structure for table `m_area` */

DROP TABLE IF EXISTS `m_area`;

CREATE TABLE `m_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `service_code` char(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_code` (`service_code`),
  CONSTRAINT `m_area_ibfk_1` FOREIGN KEY (`service_code`) REFERENCES `m_service` (`service_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_area` */

insert  into `m_area`(`id`,`area_name`,`location_id`,`service_code`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Security',1,'ses','mantap','2023-03-28 13:23:55',NULL,NULL,NULL),
(2,'Driver',1,'las','jhgjh','2023-03-28 15:51:59',1,NULL,NULL),
(3,'Gedung Pameran',1,'cls','gedung pameran','2023-03-28 11:17:33',1,NULL,NULL),
(4,'Gedung Utama',1,'cls','sdsadsad','2023-03-28 15:48:07',1,NULL,NULL);

/*Table structure for table `m_client` */

DROP TABLE IF EXISTS `m_client`;

CREATE TABLE `m_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(75) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact1` varchar(25) DEFAULT NULL,
  `contact2` varchar(25) DEFAULT NULL,
  `dial_code_mobile` int(2) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `client_name` (`client_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_client` */

insert  into `m_client`(`id`,`client_name`,`address`,`contact1`,`contact2`,`dial_code_mobile`,`mobile`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(2,'Edwin Budiyanto Sunardi','test address','(452) 523-4324','(324) 324-3244',62,'45345423432','trewd','2023-03-15 10:39:39',NULL,NULL,NULL),
(3,'Dewa Permata','Bogor','(346) 563-5435','(454) 353-4535',91,'45345345435','test aja ayah','2023-03-20 17:15:56',NULL,NULL,NULL);

/*Table structure for table `m_location` */

DROP TABLE IF EXISTS `m_location`;

CREATE TABLE `m_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_name` (`location_name`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `m_location_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `m_region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_location` */

insert  into `m_location`(`id`,`location_name`,`region_id`,`address`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Gedung Artefak Punung',1,'-','test saja1','2023-03-28 09:30:02',NULL,NULL,NULL);

/*Table structure for table `m_region` */

DROP TABLE IF EXISTS `m_region`;

CREATE TABLE `m_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `region_name` (`region_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_region` */

insert  into `m_region`(`id`,`region_name`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Jawa Timur','- Arkenas Gedung Artefak Punung','2023-03-27 15:37:39',NULL,NULL,NULL);

/*Table structure for table `m_service` */

DROP TABLE IF EXISTS `m_service`;

CREATE TABLE `m_service` (
  `service_code` char(10) NOT NULL,
  `service_name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`service_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_service` */

insert  into `m_service`(`service_code`,`service_name`,`description`,`created_by`,`created_at`,`updated_by`,`updated_at`) values 
('cls','Cleaning Service',NULL,NULL,'2023-03-22 08:19:59',NULL,NULL),
('las','Labor Service',NULL,NULL,'2023-03-22 08:20:04',NULL,NULL),
('ses','Security Service',NULL,NULL,'2023-03-22 08:20:09',NULL,NULL);

/*Table structure for table `m_sub_area` */

DROP TABLE IF EXISTS `m_sub_area`;

CREATE TABLE `m_sub_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_area_name` varchar(50) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`),
  CONSTRAINT `m_sub_area_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `m_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_sub_area` */

insert  into `m_sub_area`(`id`,`sub_area_name`,`area_id`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Security Function',1,'test','2023-03-29 08:31:25',NULL,NULL,NULL),
(2,'Driving Safety',2,NULL,'2023-03-29 07:30:14',NULL,NULL,NULL),
(3,'Attendance',2,NULL,'2023-03-29 07:30:14',NULL,NULL,NULL),
(4,'Ruangan',3,NULL,'2023-03-29 07:32:52',NULL,NULL,NULL),
(5,'Toilet',3,NULL,'2023-03-29 07:32:52',NULL,NULL,NULL),
(6,'Halaman',3,NULL,'2023-03-29 07:32:52',NULL,NULL,NULL),
(7,'Ruang Penyimpanan Artefak',4,NULL,'2023-03-29 07:35:22',NULL,NULL,NULL),
(8,'Toilet',4,NULL,'2023-03-29 07:35:52',NULL,NULL,NULL),
(9,'Halaman',4,'test','2023-03-29 08:53:36',NULL,NULL,NULL);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent_id` smallint(6) DEFAULT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `font_icon` varchar(50) NOT NULL,
  `path` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_nama_menu_unique` (`nama_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `menu` */

insert  into `menu`(`id`,`menu_parent_id`,`nama_menu`,`font_icon`,`path`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,0,'Setting','fas fa-solid fa-wrench','javascript::','2023-03-06 17:24:41',NULL,NULL,NULL),
(2,1,'Users','fas fa-solid fa-users','users','2023-03-06 17:34:37',NULL,NULL,NULL),
(3,0,'Master','fas fa-solid fa-book','javascript::','2023-03-14 07:31:13',NULL,NULL,NULL),
(4,3,'Client','fas fa-solid fa-building','client','2023-03-14 08:25:44',NULL,NULL,NULL),
(5,0,'Project','fas fa-solid fa-diagram-project','javascript::','2023-03-21 23:04:20',NULL,NULL,NULL),
(6,3,'Region','fas fa-solid fa-map','region','2023-03-15 10:35:56',NULL,NULL,NULL),
(7,3,'Location','fas fa-solid fa-map','location','2023-03-16 14:28:32',NULL,NULL,NULL),
(8,3,'Area','fas fa-solid fa-map','area','2023-03-20 11:15:14',NULL,NULL,NULL),
(9,3,'Sub Area','fas fa-solid fa-map','sub_area','2023-03-21 03:10:34',NULL,NULL,NULL),
(10,5,'Setup Project','fas fa-solid fa-diagram-project','setup_project','2023-03-21 23:24:55',NULL,NULL,NULL),
(11,0,'Evaluation','fas fa-solid fa-star','javascript::','2023-03-24 10:14:59',NULL,NULL,NULL),
(12,11,'Form Evalution','fas fa-solid fa-star','evaluation','2023-03-24 10:33:32',NULL,NULL,NULL),
(13,0,'Dashboard','fas fa-solid fa-gauge-simple','javascript::','2023-03-29 13:50:36',NULL,NULL,NULL),
(14,13,'Dashboard 1','fas fa-solid fa-gauge-simple','dashboard','2023-03-29 13:50:39',NULL,NULL,NULL);

/*Table structure for table `setup_project` */

DROP TABLE IF EXISTS `setup_project`;

CREATE TABLE `setup_project` (
  `project_code` varchar(50) NOT NULL,
  `project_name` varchar(50) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `contract_start` datetime DEFAULT NULL,
  `contract_finish` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_code`),
  UNIQUE KEY `project_code` (`project_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_project` */

insert  into `setup_project`(`project_code`,`project_name`,`client_id`,`contract_start`,`contract_finish`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
('Samantha20230329','Samantha',2,'2023-03-30 00:00:00','2023-04-15 00:00:00','2023-03-29 09:20:52',1,NULL,NULL),
('sddwqdwq20230324','sddwqdwq',2,'2023-03-24 00:00:00','2023-03-24 00:00:00','2023-03-24 14:20:25',1,NULL,NULL);

/*Table structure for table `setup_project_detail` */

DROP TABLE IF EXISTS `setup_project_detail`;

CREATE TABLE `setup_project_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(25) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `sub_area_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_project_detail` */

insert  into `setup_project_detail`(`id`,`project_code`,`region_id`,`location_id`,`area_id`,`sub_area_id`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'sddwqdwq20230324',2,2,1,1,'2023-03-24 14:20:25',1,NULL,NULL),
(2,'sddwqdwq20230324',2,2,1,2,'2023-03-24 14:20:25',1,NULL,NULL),
(3,'sddwqdwq20230324',2,2,1,3,'2023-03-24 14:20:25',1,NULL,NULL),
(4,'Samantha20230329',1,1,1,1,'2023-03-29 09:20:52',1,NULL,NULL),
(5,'Samantha20230329',1,1,2,2,'2023-03-29 09:20:52',1,NULL,NULL),
(6,'Samantha20230329',1,1,2,3,'2023-03-29 09:20:52',1,NULL,NULL),
(7,'Samantha20230329',1,1,3,4,'2023-03-29 09:20:52',1,NULL,NULL),
(8,'Samantha20230329',1,1,3,5,'2023-03-29 09:20:52',1,NULL,NULL),
(9,'Samantha20230329',1,1,3,6,'2023-03-29 09:20:52',1,NULL,NULL),
(10,'Samantha20230329',1,1,4,7,'2023-03-29 09:20:52',1,NULL,NULL),
(11,'Samantha20230329',1,1,4,8,'2023-03-29 09:20:52',1,NULL,NULL),
(12,'Samantha20230329',1,1,4,9,'2023-03-29 09:20:52',1,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `role` enum('1','2','3') NOT NULL DEFAULT '3',
  `no_ktp` varchar(20) DEFAULT NULL,
  `no_handphone` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `company_id` varchar(10) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`email_verified_at`,`password`,`fullname`,`client_id`,`role`,`no_ktp`,`no_handphone`,`alamat`,`filename`,`is_blocked`,`company_id`,`remember_token`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'itsupport','itsupport@sos.co.id',NULL,'$2y$10$lIPaf0Rk0ATRRjQKFBS5Qu5sq7EJ6w/DJU9ApPPRYmXAUxYon2Tpu','IT Support',NULL,'1',NULL,NULL,NULL,NULL,0,NULL,NULL,'2023-03-13 14:50:46',NULL,'2023-03-22 00:36:49',NULL),
(2,'edwin_sunardi','edwinsunardi@sos.co.id',NULL,'$2y$10$BFSf2GxFnTChcO/j0yxKq.CyUqlIepcg7zOV03EvitYZlxYd8vlA2','Edwin Budiyanto Sunardi',2,'2',NULL,NULL,NULL,NULL,0,NULL,NULL,'2023-03-22 08:03:00',NULL,NULL,NULL);

/*Table structure for table `usersauthority` */

DROP TABLE IF EXISTS `usersauthority`;

CREATE TABLE `usersauthority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usersauthority` */

insert  into `usersauthority`(`id`,`user_id`,`company_name`,`created_by`,`created_at`) values 
(1,1,'PT HUMAN RESOURCES PROVIDER',1,'2023-03-07 07:08:27'),
(2,6,',PT HUMAN RESOURCES PROVIDER',1,'2023-03-07 04:31:28'),
(3,0,NULL,1,'2023-03-07 02:26:23'),
(4,2,NULL,1,'2023-03-07 02:42:49');

/*Table structure for table `usersprivilege` */

DROP TABLE IF EXISTS `usersprivilege`;

CREATE TABLE `usersprivilege` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usersprivilege` */

insert  into `usersprivilege`(`id`,`user_id`,`menu_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values 
(56,1,2,1,'2023-03-29 06:03:15',NULL,NULL),
(57,1,4,1,'2023-03-29 06:03:15',NULL,NULL),
(58,1,6,1,'2023-03-29 06:03:15',NULL,NULL),
(59,1,7,1,'2023-03-29 06:03:15',NULL,NULL),
(60,1,8,1,'2023-03-29 06:03:15',NULL,NULL),
(61,1,9,1,'2023-03-29 06:03:15',NULL,NULL),
(62,1,10,1,'2023-03-29 06:03:15',NULL,NULL),
(63,1,12,1,'2023-03-29 06:03:15',NULL,NULL),
(64,1,14,1,'2023-03-29 06:03:15',NULL,NULL),
(65,2,14,1,'2023-03-29 06:03:46',NULL,NULL);

/* Procedure structure for procedure `genSetupProject` */

/*!50003 DROP PROCEDURE IF EXISTS  `genSetupProject` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `genSetupProject`(IN projectCode VARCHAR(25),IN regionId VARCHAR(25),IN userId INTEGER)
BEGIN
	DECLARE finished INTEGER DEFAULT 0;
	declare region_id integer;
	declare location_id integer;
	declare area_id integer;
	DECLARE sub_area_id INTEGER;
	DECLARE setupProjectCursor CURSOR FOR SELECT a.id,b.id,c.id,d.id FROM m_region a 
	INNER JOIN m_location b ON a.id = b.region_id INNER JOIN m_area c ON c.location_id = b.id INNER JOIN m_sub_area d ON d.area_id = c.id 
	WHERE a.id = regionId;
	DECLARE CONTINUE  HANDLER FOR NOT FOUND SET finished = 1;
	OPEN setupProjectCursor;
	addDetail:LOOP
	FETCH setupProjectCursor INTO region_id, location_id, area_id, sub_area_id;
	IF finished = 1 THEN
		LEAVE addDetail;
	END IF;
	INSERT INTO setup_project_detail(project_code,region_id, location_id, area_id, sub_area_id,created_by) VALUES (projectCode, region_id, location_id, area_id, sub_area_id,userId);
	END LOOP addDetail;
	CLOSE setupProjectCursor;
END */$$
DELIMITER ;

/* Procedure structure for procedure `instantInsert` */

/*!50003 DROP PROCEDURE IF EXISTS  `instantInsert` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `instantInsert`()
BEGIN
	DECLARE v_max INT UNSIGNED DEFAULT 200;
	DECLARE v_counter INT UNSIGNED DEFAULT 1;
	START TRANSACTION;
	WHILE v_counter < v_max DO
		INSERT INTO evaluation(project_code,appraisal_date,sub_area_id,score) VALUES('Samantha20230329',DATE_ADD("2023-03-29", INTERVAL v_counter DAY),(ROUND(RAND() * 9)+1),ROUND(74+RAND() * 26));
		SET v_counter = v_counter+1;
	END WHILE;
	
	
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
