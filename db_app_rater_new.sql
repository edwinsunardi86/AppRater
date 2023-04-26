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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `evaluation` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `m_client` */

insert  into `m_client`(`id`,`client_name`,`address`,`contact1`,`contact2`,`dial_code_mobile`,`mobile`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Badan Riset Dan Inovasi Nasional (BRIN)','Gedung B.J. Habibie, Jl. M.H. Thamrin No. 8, Jakarta Pusat 10340',NULL,NULL,62,'81119333639',NULL,'2023-04-26 15:00:28',NULL,NULL,NULL);

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

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent_id` smallint(6) DEFAULT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `font_icon` varchar(50) NOT NULL,
  `path` varchar(200) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_nama_menu_unique` (`nama_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `menu` */

insert  into `menu`(`id`,`menu_parent_id`,`nama_menu`,`font_icon`,`path`,`sort`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,0,'Setting','fas fa-solid fa-wrench','javascript::',15,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(2,1,'Users','fas fa-solid fa-users','users',16,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(3,0,'Master','fas fa-solid fa-book','javascript::',3,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(4,3,'Client','fas fa-solid fa-building','client',4,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(5,0,'Setup Project','fas fa-solid fa-diagram-project','javascript::',9,'2023-04-03 15:51:29','','0000-00-00 00:00:00','\r'),
(6,5,'Project','fas fa-solid fa-diagram-project','project',0,'2023-04-03 15:51:48','','0000-00-00 00:00:00','\r'),
(7,5,'Region','fas fa-solid fa-map','region',5,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(8,5,'Location','fas fa-solid fa-map','location',6,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(9,5,'Area','fas fa-solid fa-map','area',7,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(10,5,'Sub Area','fas fa-solid fa-map','sub_area',8,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(11,0,'Evaluation','fas fa-solid fa-star','javascript::',11,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(12,11,'Form Evalution','fas fa-solid fa-star','evaluation/form_evaluation',12,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(13,0,'Dashboard','fas fa-solid fa-gauge-simple','javascript::',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(14,13,'Dashboard 1','fas fa-solid fa-gauge-simple','dashboard_v1',2,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(15,0,'Report','fas fa-solid fa-list-ul','javascript::',13,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(16,15,'Report Weekly','fas fa-solid fa-list-ul','report/report_weekly',14,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r');

/*Table structure for table `setup_area` */

DROP TABLE IF EXISTS `setup_area`;

CREATE TABLE `setup_area` (
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
  KEY `location_id` (`location_id`),
  CONSTRAINT `setup_area_ibfk_1` FOREIGN KEY (`service_code`) REFERENCES `m_service` (`service_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `setup_area_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `setup_location` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_area` */

/*Table structure for table `setup_location` */

DROP TABLE IF EXISTS `setup_location`;

CREATE TABLE `setup_location` (
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
  CONSTRAINT `setup_location_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `setup_region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_location` */

insert  into `setup_location`(`id`,`location_name`,`region_id`,`address`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Arkenas Balar Bali',1,NULL,NULL,'2023-04-26 15:35:59',NULL,NULL,NULL),
(2,'Denpasar Bali',1,NULL,NULL,'2023-04-26 15:35:59',NULL,NULL,NULL),
(3,'BRIN Ibun',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(4,'BRIN Kota Sukabumi',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(5,'BRIN Sumedang',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(6,'Bandung Cinunuk',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(7,'Bandung Dago Pojok',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(8,'Bandung Gd. Arsip Cikutra',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(9,'Bandung Mess Hegarmanah',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(10,'Bandung Tubagus Ismail',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(11,'Kab. Bandung Ciater',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(12,'Kab. Bandung PLTP Ibun Kamojan',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(13,'Subang',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(14,'Sumedang Ex. Lapan',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL);

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
  UNIQUE KEY `project_code` (`project_code`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `setup_project_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `m_client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_project` */

insert  into `setup_project`(`project_code`,`project_name`,`client_id`,`contract_start`,`contract_finish`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
('BRIN20230426','BRIN',1,'2023-04-27 00:00:00','2023-04-27 00:00:00','2023-04-26 15:01:11',1,NULL,NULL);

/*Table structure for table `setup_region` */

DROP TABLE IF EXISTS `setup_region`;

CREATE TABLE `setup_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(50) DEFAULT NULL,
  `project_code` varchar(25) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `region_name` (`region_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_region` */

insert  into `setup_region`(`id`,`region_name`,`project_code`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Bali','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(2,'Jawa Barat','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(3,'Jawa Tengah','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(4,'Jawa Timur','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(5,'Kalimantan','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(6,'Kupang','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(7,'Lampung','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(8,'Metro','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(9,'Sumapa','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(10,'Sumatera Barat','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(11,'Sumatera Selatan','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL),
(12,'Sumatera Utara','BRIN20230426',NULL,'2023-04-26 15:30:53',NULL,NULL,NULL);

/*Table structure for table `setup_sub_area` */

DROP TABLE IF EXISTS `setup_sub_area`;

CREATE TABLE `setup_sub_area` (
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
  CONSTRAINT `setup_sub_area_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `setup_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_sub_area` */

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
(1,'itsupport','itsupport@sos.co.id',NULL,'$2y$10$oMbfteqiYFh4KVwHakzeruVXgA7fjmss06yelT2xIqJR9zNBhSmJi','IT Support',1,'1',NULL,NULL,NULL,NULL,0,NULL,NULL,'2023-03-13 14:50:46',NULL,'2023-04-01 02:29:30',NULL),
(2,'edwin_sunardi','edwin.sunardi@sos.co.id',NULL,'$2y$10$oILEUYsj2bpjNUzWiML4xuFQ4sQzF7xUuDAOZVxjRnd0dNqZYlBja','Edwin Budiyanto Sunardi',2,'3',NULL,NULL,NULL,NULL,0,NULL,NULL,'2023-03-22 08:03:00',NULL,'2023-04-01 02:17:13',NULL);

/*Table structure for table `usersauthority` */

DROP TABLE IF EXISTS `usersauthority`;

CREATE TABLE `usersauthority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usersauthority` */

insert  into `usersauthority`(`id`,`user_id`,`location_id`,`created_by`,`created_at`) values 
(71,2,6,1,'0000-00-00 00:00:00');

/*Table structure for table `usersprivilege` */

DROP TABLE IF EXISTS `usersprivilege`;

CREATE TABLE `usersprivilege` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `create` tinyint(4) DEFAULT NULL,
  `update` tinyint(4) DEFAULT NULL,
  `delete` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usersprivilege` */

insert  into `usersprivilege`(`id`,`user_id`,`menu_id`,`create`,`update`,`delete`,`created_by`,`created_at`,`updated_by`,`updated_at`) values 
(111,1,2,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(112,1,4,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(113,1,6,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(114,1,7,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(115,1,8,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(116,1,9,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(117,1,10,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(118,1,12,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(119,1,14,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(120,1,16,1,1,1,1,'2023-04-03 08:04:27',NULL,NULL),
(181,2,12,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(182,2,14,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(183,2,16,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL);

/* Function  structure for function  `getDateFromWeek` */

/*!50003 DROP FUNCTION IF EXISTS `getDateFromWeek` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `getDateFromWeek`(eno INT(11)) RETURNS varchar(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
    DECLARE manager_name VARCHAR(250);
    SELECT NAME INTO manager_name FROM employees WHERE id = eno;
    RETURN manager_name;
END */$$
DELIMITER ;

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
	DECLARE v_max INT UNSIGNED DEFAULT 500;
	DECLARE v_counter INT UNSIGNED DEFAULT 1;
	START TRANSACTION;
	WHILE v_counter < v_max DO
		INSERT INTO evaluation(project_code,appraisal_date,sub_area_id,score) VALUES('testnama20230412',DATE_ADD("2023-04-12", INTERVAL v_counter DAY),(ROUND(RAND() * 9)+1),ROUND(74+RAND() * 26));
		SET v_counter = v_counter+1;
	END WHILE;
	
	
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
