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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_area` */

insert  into `setup_area`(`id`,`area_name`,`location_id`,`service_code`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Security',2,'ses',NULL,'2023-04-26 22:21:31',1,NULL,NULL),
(2,'Gedung Administrasi Lt.1',2,'cls',NULL,'2023-04-26 22:21:31',1,NULL,NULL),
(3,'Gedung Laboratorium Lt.1',2,'cls',NULL,'2023-04-26 22:57:14',1,NULL,NULL),
(4,'Gedung Laboratorium Lt.2',2,'cls',NULL,'2023-04-26 22:57:51',1,NULL,NULL),
(5,'Gedung Laboratorium Lt.3',2,'cls',NULL,'2023-04-26 22:59:19',1,NULL,NULL),
(6,'Gedung Produksi Lt.1',2,'cls',NULL,'2023-04-26 22:59:19',1,NULL,NULL),
(7,'Gedung Asrama Lt.1',2,'cls',NULL,'2023-04-26 22:59:19',1,NULL,NULL),
(8,'Rumah Dinas',2,'cls',NULL,'2023-04-26 22:59:19',1,NULL,NULL),
(9,'Security',1,'ses',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(10,'Driver',1,'las',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(11,'Gedung Utama Lt.1',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(12,'Gedung Utama Lt.2',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(13,'Gedung Blok Barat Lt.1',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(14,'Gedung Blok Barat Lt.2',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(15,'Gedung Pameran',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(16,'Gedung Perpustakaan Lt.1',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(17,'Gedung Perpustakaan Lt.2',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(18,'Halaman',1,'cls',NULL,'2023-04-26 23:11:15',1,NULL,NULL),
(19,'Driver',51,'las',NULL,'2023-04-27 07:42:36',1,NULL,NULL),
(20,'Gedung Asrama',5,'cls',NULL,'2023-04-27 07:48:14',1,NULL,NULL),
(21,'Halaman',5,'cls',NULL,'2023-04-27 07:48:14',1,NULL,NULL),
(22,'Security',6,'ses',NULL,'2023-04-27 08:05:03',1,NULL,NULL),
(23,'Gedung',6,'cls',NULL,'2023-04-27 08:05:03',1,NULL,NULL),
(24,'Security',7,'ses',NULL,'2023-04-27 08:12:45',1,NULL,NULL),
(25,'Gedung',7,'cls',NULL,'2023-04-27 08:12:45',1,NULL,NULL),
(26,'Security',8,'ses',NULL,'2023-04-27 08:25:40',1,NULL,NULL),
(27,'Gedung',8,'cls',NULL,'2023-04-27 08:25:40',1,NULL,NULL),
(28,'Security',9,'ses',NULL,'2023-04-27 08:36:52',1,NULL,NULL),
(29,'Gedung',9,'cls',NULL,'2023-04-27 08:36:52',1,NULL,NULL),
(30,'Gedung Asrama',10,'cls',NULL,'2023-04-27 08:50:31',1,NULL,NULL),
(31,'Halaman',10,'cls',NULL,'2023-04-27 08:50:31',1,NULL,NULL),
(32,'Security',11,'ses',NULL,'2023-04-27 08:59:07',1,NULL,NULL),
(33,'Halaman',11,'cls',NULL,'2023-04-27 08:59:07',1,NULL,NULL),
(34,'Lantai 1',11,'cls',NULL,'2023-04-27 08:59:07',1,NULL,NULL),
(35,'Lantai 2',11,'cls',NULL,'2023-04-27 08:59:07',1,NULL,NULL),
(36,'Security',4,'ses',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(37,'Pos Security',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(38,'Gedung PPID',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(39,'Gedung Phoenix',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(40,'Gedung Centaurus',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(41,'Gedung Administrasi',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(42,'Gedung Mushola',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(43,'Gedung Antariksa 1',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(44,'Gedung Meteor',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(45,'Gedung Antariksa 2',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(46,'Gedung Guest House',4,'cls',NULL,'2023-04-27 09:33:52',1,NULL,NULL),
(47,'Security',3,'ses',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(48,'Halaman',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(49,'Ruang Workshop',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(50,'Gudang',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(51,'Mess',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(52,'Ruang Tata Usaha',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(53,'Laboratorium',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(54,'Ruang Kepala dan Ruang Diseminasi',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(55,'Ruang Aula',3,'cls',NULL,'2023-04-27 10:33:18',1,NULL,NULL),
(56,'Driver',12,'las',NULL,'2023-04-27 11:13:44',1,NULL,NULL),
(57,'Security',14,'ses',NULL,'2023-04-27 11:36:10',1,NULL,NULL),
(58,'Driver',14,'las',NULL,'2023-04-27 11:36:10',1,NULL,NULL),
(59,'Lantai 1',14,'cls',NULL,'2023-04-27 11:36:10',1,NULL,NULL),
(60,'Lantai 2',14,'cls',NULL,'2023-04-27 11:36:10',1,NULL,NULL),
(61,'Halaman',14,'cls',NULL,'2023-04-27 11:36:10',1,NULL,NULL),
(62,'Security',15,'ses',NULL,'2023-04-27 11:54:40',1,NULL,NULL),
(63,'Gedung',15,'cls',NULL,'2023-04-27 11:54:40',1,NULL,NULL),
(64,'Halaman',15,'cls',NULL,'2023-04-27 11:54:40',1,NULL,NULL),
(65,'Security',16,'ses',NULL,'2023-04-27 13:25:10',1,NULL,NULL),
(66,'Driver',16,'las',NULL,'2023-04-27 13:25:11',1,NULL,NULL),
(67,'Lantai 1',16,'cls',NULL,'2023-04-27 13:25:11',1,NULL,NULL),
(68,'Lokasi Luar Gedung Utama',16,'cls',NULL,'2023-04-27 13:25:11',1,NULL,NULL),
(69,'Outdoor',16,'cls',NULL,'2023-04-27 13:25:11',1,NULL,NULL),
(70,'Security',17,'ses',NULL,'2023-04-27 14:23:32',1,NULL,NULL),
(71,'Lantai 1',17,'cls',NULL,'2023-04-27 14:23:32',1,NULL,NULL),
(72,'Halaman',17,'cls',NULL,'2023-04-27 14:23:32',1,NULL,NULL),
(73,'Wisma',17,'cls',NULL,'2023-04-27 14:23:32',1,NULL,NULL),
(74,'Halaman Wisma',17,'cls',NULL,'2023-04-27 14:23:32',1,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_location` */

insert  into `setup_location`(`id`,`location_name`,`region_id`,`address`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Arkenas Balar Bali',1,NULL,NULL,'2023-04-26 15:35:59',NULL,NULL,NULL),
(2,'Denpasar Bali',1,NULL,NULL,'2023-04-26 15:35:59',NULL,NULL,NULL),
(3,'Sukabumi',2,NULL,NULL,'2023-04-27 07:46:23',NULL,NULL,NULL),
(4,'Sumedang',2,NULL,NULL,'2023-04-27 07:45:57',NULL,NULL,NULL),
(5,'Bandung Cinunuk',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(6,'Bandung Dago Pojok',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(7,'Bandung Gd. Arsip Cikutra',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(8,'Bandung Mess Hegarmanah',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(9,'Bandung Tubagus Ismail',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(10,'Kab. Bandung Ciater',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(11,'Kab. Bandung PLTP Ibun Kamojan',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(12,'Subang',2,NULL,NULL,'2023-04-26 17:03:18',NULL,NULL,NULL),
(14,'Arkenas Balar DIY',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(15,'Arkenas Gd. Artefak Rembang',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(16,'Gunung Kidul DIY',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(17,'Jepara',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(18,'Kalasan',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(19,'Magelang',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(20,'Salatiga',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(21,'Tawangmangu',3,NULL,NULL,'2023-04-26 21:20:13',NULL,NULL,NULL),
(22,'Arkenas Gd. Artefak Punung',4,NULL,NULL,'2023-04-26 21:27:54',NULL,NULL,NULL),
(23,'Arkenas Gd. Artefak Trowulan',4,NULL,NULL,'2023-04-26 21:27:54',NULL,NULL,NULL),
(24,'Pasuruhan Jawa Timur',4,NULL,NULL,'2023-04-26 21:27:55',NULL,NULL,NULL),
(25,'Arkenas Balar Kalsel',5,NULL,NULL,'2023-04-26 21:30:48',NULL,NULL,NULL),
(26,'Pontianak',5,NULL,NULL,'2023-04-26 21:30:48',NULL,NULL,NULL),
(27,'Kupang',6,NULL,NULL,'2023-04-26 21:32:42',NULL,NULL,NULL),
(28,'Rajabasa DBL',7,NULL,NULL,'2023-04-26 21:33:32',NULL,NULL,NULL),
(29,'DKI Jakarta Cikini + Raden Saleh',8,NULL,NULL,'2023-04-26 21:40:19',NULL,NULL,NULL),
(30,'DKI Jakarta Jalan Bandung',8,NULL,NULL,'2023-04-26 21:40:19',NULL,NULL,NULL),
(31,'DKI Jakarta Mess Gatsu',8,NULL,NULL,'2023-04-26 21:40:19',NULL,NULL,NULL),
(32,'DKI Jakarta Pekayon',8,NULL,NULL,'2023-04-26 21:40:19',NULL,NULL,NULL),
(33,'DKI Jakarta Permata Hijau',8,NULL,NULL,'2023-04-26 21:40:19',NULL,NULL,NULL),
(34,'DKI Jakarta Rawamangun',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(35,'DKI Jakarta Thamrin',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(36,'DKI Mess Jakarta Ancol',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(37,'Kab. Bogor Rusun Cibinong',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(38,'Kota Bogor Kusnoto',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(39,'Tangerang Gunung Sindur',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(40,'Tangerang Puspitek',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(41,'Arkenas Gd. Artefak Banten',8,NULL,NULL,'2023-04-26 21:40:20',NULL,NULL,NULL),
(42,'Arkenas Balar Maluku',9,NULL,NULL,'2023-04-26 21:43:05',NULL,NULL,NULL),
(43,'Arkenas Balar Papua',9,NULL,NULL,'2023-04-26 21:43:05',NULL,NULL,NULL),
(44,'Arkenas Balar Sulut',9,NULL,NULL,'2023-04-26 21:43:05',NULL,NULL,NULL),
(45,'Arkenas Sulsel',9,NULL,NULL,'2023-04-26 21:43:05',NULL,NULL,NULL),
(46,'Lahendong - Tomohon',9,NULL,NULL,'2023-04-26 21:43:05',NULL,NULL,NULL),
(47,'Bukit Tinggi Sumbar',10,NULL,NULL,'2023-04-26 21:44:11',NULL,NULL,NULL),
(48,'Arkenas Balar Sumsel',11,NULL,NULL,'2023-04-26 21:44:59',NULL,NULL,NULL),
(49,'Arkenas Balar Sumut',12,NULL,NULL,'2023-04-26 21:46:10',NULL,NULL,NULL),
(50,'Arkenas Gd. Artefak Barus',12,NULL,NULL,'2023-04-26 21:46:10',NULL,NULL,NULL),
(51,'Mataram',1,NULL,NULL,'2023-04-26 21:55:11',NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setup_sub_area` */

insert  into `setup_sub_area`(`id`,`sub_area_name`,`area_id`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Security Functions',1,NULL,'2023-04-26 23:27:01',NULL,NULL,NULL),
(2,'Lobby Gedung Administrasi',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(3,'Ruang Rapat',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(4,'Ruang Kerja Pimpinan (Ka.BTIKK)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(5,'Gallery',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(6,'Ruang Kerja Staff (Sekretaris)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(7,'Ruang Kerja Staff (Desain)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(8,'Ruang Kerja Staff (Pengelola Keuangan)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(9,'Ruang Kerja Staff (KPJT. 1)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(10,'Ruang Kerja Staff (KPJT. 2)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(11,'Ruang Kerja Staff (PPT)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(12,'Ruang Kerja Sub.Kordinator TU dan Staff TU',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(13,'Toilet (Pria)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(14,'Toilet (Wanita)',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(15,'Pantry',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(16,'Lorong Administrasi',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(17,'Area Parkir',2,NULL,'2023-04-26 23:40:50',NULL,NULL,NULL),
(18,'Lobby Gedung Laboratorium',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(19,'Ruang Rapat',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(20,'Ruang Kontrol Rapat',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(21,'Ruang Laboratorium',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(22,'Ruang Kerja Staff Laboratorium',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(23,'Gudang Bahan Kimia',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(24,'Toilet VIP',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(25,'Toilet (Pria)',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(26,'Toilet (Wanita)',3,NULL,'2023-04-26 23:44:02',NULL,NULL,NULL),
(27,'Ruang Tamu',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(28,'Ruang CWS 1',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(29,'Ruang CWS 2',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(30,'Ruang Arsip',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(31,'Tempat Ibadah (Mushola)',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(32,'Toilet (Pria)',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(33,'Toilet (Wanita)',4,NULL,'2023-04-26 23:48:45',NULL,NULL,NULL),
(34,'Ruang Kerja INA TWS',5,NULL,'2023-04-26 23:50:17',NULL,NULL,NULL),
(35,'Ruang Kerja Produksi (Pembakaran)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(36,'Pencetakan',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(37,'Pembentukan dan Kriya ukir',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(38,'Ruang Kerja Produksi (Kriya lukis)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(39,'Ruang Kontrol Panel Listrik',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(40,'Toilet (Pria)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(41,'Toilet (Wanita)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(42,'Gudang Produksi',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(43,'Ruang Kerja Produksi (Pengolahan bahan baku)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(44,'Gudang Bahan Baku',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(45,'Area Parkir 1 (roda 2)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(46,'Area Parkir 2 (roda 4)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(47,'Area Parkir 3 (roda 4)',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(48,'Ruang Training Center',6,NULL,'2023-04-26 23:56:34',NULL,NULL,NULL),
(49,'Lobby Asrama Putri',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(50,'Kamar Asrama Putri 1',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(51,'Kamar Asrama Putri 2',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(52,'Toilet Wanita1',7,NULL,'2023-04-27 00:05:10',NULL,NULL,NULL),
(53,'Toilet  Wanita2',7,NULL,'2023-04-27 00:06:02',NULL,NULL,NULL),
(54,'Lobby Asrama Putra',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(55,'Kamar Asrama Putra 1',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(56,'Kamar Asrama Putra 2',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(57,'Toilet Pria 1',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(58,'Toilet Pria 2',7,NULL,'2023-04-27 00:01:39',NULL,NULL,NULL),
(59,'Rumah Dinas Pimpinan',8,NULL,'2023-04-27 00:07:21',NULL,NULL,NULL),
(60,'Halaman 1',8,NULL,'2023-04-27 00:07:21',NULL,NULL,NULL),
(61,'Halaman 2',8,NULL,'2023-04-27 00:07:21',NULL,NULL,NULL),
(62,'Security Functions',9,NULL,'2023-04-27 00:16:20',NULL,NULL,NULL),
(63,'Attendance',10,NULL,'2023-04-27 00:17:57',NULL,NULL,NULL),
(64,'Driving Safety',10,NULL,'2023-04-27 00:17:57',NULL,NULL,NULL),
(65,'Lobby',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(66,'R Kasubag',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(67,'R Tata Usaha',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(68,'R Keuangan',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(69,'Pantry',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(70,'Toilet Pria & Wanita 1',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(71,'Toilet Pria & Wanita 2',11,NULL,'2023-04-27 00:21:35',NULL,NULL,NULL),
(72,'R Kepala',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(73,'R Peneliti 1',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(74,'R Peneliti 3',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(75,'R Peneliti 4',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(76,'Pantry',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(77,'R Rapat Kecil 1',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(78,'R Rapat Kecil  2',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(79,'Co Working Space',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(80,'Toilet Pria & Wanita 1',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(81,'Toilet Pria & Wanita 2',12,NULL,'2023-04-27 00:26:19',NULL,NULL,NULL),
(82,'Ruang perlengkapan',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(83,'R Dokumentasi',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(84,'R Penggambaran',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(85,'Gudang 1',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(86,'Gudang 2',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(87,'Co Working Space',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(88,'Toilet Pria & Wanita 1',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(89,'Toilet Pria & Wanita 2',13,NULL,'2023-04-27 00:30:37',NULL,NULL,NULL),
(90,'Ruang Rapat Besar',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(91,'Ruang Redaksi',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(92,'Ruang Peneliti 1',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(93,'Ruang Peneliti 2',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(94,'Ruang Peneliti 3',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(95,'Toilet Pria & Wanita',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(96,'Toilet Pria & Wanita 2',14,NULL,'2023-04-27 00:32:46',NULL,NULL,NULL),
(97,'Ruang Pameran',15,NULL,'2023-04-27 00:34:22',NULL,NULL,NULL),
(98,'Ruang Mess',15,NULL,'2023-04-27 00:34:22',NULL,NULL,NULL),
(99,'Toilet Pria / Wanita',15,NULL,'2023-04-27 00:34:22',NULL,NULL,NULL),
(100,'Ruang Laboratorium',16,NULL,'2023-04-27 00:36:50',NULL,NULL,NULL),
(101,'Toilet Pria & Wanita 1',16,NULL,'2023-04-27 00:36:50',NULL,NULL,NULL),
(102,'Toilet Pria & Wanita 2',16,NULL,'2023-04-27 00:36:50',NULL,NULL,NULL),
(103,'Ruang Perpustakaan',17,NULL,'2023-04-27 00:38:08',NULL,NULL,NULL),
(104,'Toilet Pria & Wanita',17,NULL,'2023-04-27 00:38:08',NULL,NULL,NULL),
(105,'Taman',18,NULL,'2023-04-27 00:38:53',NULL,NULL,NULL),
(106,'Parkir Mobil',18,NULL,'2023-04-27 00:38:53',NULL,NULL,NULL),
(107,'Driving Safety',19,NULL,'2023-04-27 00:41:42',NULL,NULL,NULL),
(108,'Attendance',19,NULL,'2023-04-27 00:41:42',NULL,NULL,NULL),
(109,'Halaman',20,NULL,'2023-04-27 07:50:14',NULL,NULL,NULL),
(110,'Ruang',20,NULL,'2023-04-27 07:50:14',NULL,NULL,NULL),
(111,'Toilet',20,NULL,'2023-04-27 07:51:53',NULL,NULL,NULL),
(112,'Halaman',21,NULL,'2023-04-27 07:52:34',NULL,NULL,NULL),
(113,'Ruang Lantai',21,NULL,'2023-04-27 07:52:34',NULL,NULL,NULL),
(114,'Security Functions',22,NULL,'2023-04-27 08:05:53',NULL,NULL,NULL),
(115,'Halaman',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(116,'Kamar 1',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(117,'Kamar 2',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(118,'Kamar 3',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(119,'Kamar 4',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(120,'Koridor',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(121,'Pantry',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(122,'Toilet',23,NULL,'2023-04-27 08:08:50',NULL,NULL,NULL),
(123,'Security Functions',26,NULL,'2023-04-27 08:28:13',NULL,NULL,NULL),
(124,'Halaman',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(125,'Kamar 1',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(126,'Kamar 2',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(127,'Kamar 3',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(128,'Kamar 4',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(129,'Kamar 5',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(130,'Koridor',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(131,'Ruang Kantor',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(132,'Toilet',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(133,'Pantry',27,NULL,'2023-04-27 08:30:55',NULL,NULL,NULL),
(134,'Security Functions',28,NULL,'2023-04-27 08:40:28',NULL,NULL,NULL),
(135,'Halaman',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(136,'Kamar 1',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(137,'Kamar 2',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(138,'Kamar 3',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(139,'Kamar 4',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(140,'Kamar 5',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(141,'Kamar 6',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(142,'Kamar 7',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(143,'Kamar 8',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(144,'Kamar 9',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(145,'Koridor',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(146,'Toilet',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(147,'Pantry',29,NULL,'2023-04-27 08:42:50',NULL,NULL,NULL),
(148,'Halaman',30,NULL,'2023-04-27 08:51:26',NULL,NULL,NULL),
(149,'Ruang',30,NULL,'2023-04-27 08:51:26',NULL,NULL,NULL),
(150,'Toilet',30,NULL,'2023-04-27 08:51:26',NULL,NULL,NULL),
(151,'Halaman',31,NULL,'2023-04-27 08:52:48',NULL,NULL,NULL),
(152,'Ruang Lantai',31,NULL,'2023-04-27 08:52:48',NULL,NULL,NULL),
(153,'Security Functions',32,NULL,'2023-04-27 08:59:54',NULL,NULL,NULL),
(154,'Outdoor',33,NULL,'2023-04-27 09:01:05',NULL,NULL,NULL),
(155,'Tangga',34,NULL,'2023-04-27 09:18:28',NULL,NULL,NULL),
(156,'Ruang Kantor',34,NULL,'2023-04-27 09:18:28',NULL,NULL,NULL),
(157,'Mushola',34,NULL,'2023-04-27 09:18:28',NULL,NULL,NULL),
(158,'Pantry',34,NULL,'2023-04-27 09:18:28',NULL,NULL,NULL),
(159,'Koridor',34,NULL,'2023-04-27 09:18:28',NULL,NULL,NULL),
(160,'Toilet',34,NULL,'2023-04-27 09:18:28',NULL,NULL,NULL),
(161,'Ruang Kantor',35,NULL,'2023-04-27 09:20:59',NULL,NULL,NULL),
(162,'Ruang Meeting',35,NULL,'2023-04-27 09:20:59',NULL,NULL,NULL),
(163,'Koridor',35,NULL,'2023-04-27 09:20:59',NULL,NULL,NULL),
(164,'Security Functions',36,NULL,'2023-04-27 09:47:36',NULL,NULL,NULL),
(165,'Ruang 1',37,NULL,'2023-04-27 09:49:13',NULL,NULL,NULL),
(166,'Ruang 2',37,NULL,'2023-04-27 09:49:13',NULL,NULL,NULL),
(167,'Toilet',37,NULL,'2023-04-27 09:49:13',NULL,NULL,NULL),
(168,'Halaman',38,NULL,'2023-04-27 09:50:57',NULL,NULL,NULL),
(169,'Ruang Kantor',38,NULL,'2023-04-27 09:50:57',NULL,NULL,NULL),
(170,'Halaman',39,NULL,'2023-04-27 09:52:24',NULL,NULL,NULL),
(171,'Ruang Kantor',39,NULL,'2023-04-27 09:52:24',NULL,NULL,NULL),
(172,'Toilet 1',39,NULL,'2023-04-27 09:52:24',NULL,NULL,NULL),
(173,'Toilet 2',39,NULL,'2023-04-27 09:52:24',NULL,NULL,NULL),
(174,'Halaman',40,NULL,'2023-04-27 09:55:37',NULL,NULL,NULL),
(175,'Ruang Kantor',40,NULL,'2023-04-27 09:55:37',NULL,NULL,NULL),
(176,'Koridor',40,NULL,'2023-04-27 09:55:37',NULL,NULL,NULL),
(177,'Pantry',40,NULL,'2023-04-27 09:55:37',NULL,NULL,NULL),
(178,'Halaman',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(179,'Ruang Kantor 1',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(180,'Ruang Kantor 2',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(181,'Ruang Kantor 3',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(182,'Ruang Kantor 4',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(183,'Koridor',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(184,'Ruang Meeting',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(185,'Lobby',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(186,'Pantry',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(187,'Toilet 1',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(188,'Toilet 2',41,NULL,'2023-04-27 10:01:26',NULL,NULL,NULL),
(189,'Halaman',42,NULL,'2023-04-27 10:06:17',NULL,NULL,NULL),
(190,'Tempat Wudhu',42,NULL,'2023-04-27 10:06:17',NULL,NULL,NULL),
(191,'Ruang Sembahyang',42,NULL,'2023-04-27 10:06:17',NULL,NULL,NULL),
(192,'Halaman',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(193,'Ruang Galery',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(194,'Pantry',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(195,'Toilet 1',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(196,'Toilet 2',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(197,'Toilet 3',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(198,'Toilet 4',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(199,'Toilet 5',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(200,'Toilet 6',43,NULL,'2023-04-27 10:10:14',NULL,NULL,NULL),
(201,'Halaman',44,NULL,'2023-04-27 10:12:16',NULL,NULL,NULL),
(202,'Ruang Kantor 1',44,NULL,'2023-04-27 10:12:16',NULL,NULL,NULL),
(203,'Toilet 1',44,NULL,'2023-04-27 10:12:16',NULL,NULL,NULL),
(204,'Halaman',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(205,'Ruang Aula',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(206,'Ruang Kantor 1',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(207,'Ruang Kantor 2',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(208,'Ruang Arsip',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(209,'Toilet 1',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(210,'Toilet 2',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(211,'Toilet 3',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(212,'Toilet 4',45,NULL,'2023-04-27 10:20:28',NULL,NULL,NULL),
(213,'Halaman',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(214,'Area Parkir',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(215,'Kamar 1',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(216,'Kamar 2',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(217,'Kamar 3',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(218,'Kamar 4',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(219,'Kamar 5',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(220,'Kamar 6',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(221,'Kamar 7',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(222,'Kamar 8',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(223,'Ruang Meeting',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(224,'Koridor',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(225,'Lobby',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(226,'Toilet 1',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(227,'Pantry',46,NULL,'2023-04-27 10:25:37',NULL,NULL,NULL),
(228,'Security Functions',47,NULL,'2023-04-27 10:46:44',NULL,NULL,NULL),
(229,'Taman Depan',48,NULL,'2023-04-27 10:47:25',NULL,NULL,NULL),
(230,'Ruang Mesin',49,NULL,'2023-04-27 10:48:38',NULL,NULL,NULL),
(231,'Ruang Penyimpanan',50,NULL,'2023-04-27 10:49:17',NULL,NULL,NULL),
(232,'Ruang Tamu',51,NULL,'2023-04-27 10:54:23',NULL,NULL,NULL),
(233,'Kamar Tidur 6 Ruang',51,NULL,'2023-04-27 11:00:33',NULL,NULL,NULL),
(234,'Toilet Pria / Wanita',51,NULL,'2023-04-27 11:00:33',NULL,NULL,NULL),
(235,'Ruang Kerja',52,NULL,'2023-04-27 11:02:45',NULL,NULL,NULL),
(236,'Ruang Server',52,NULL,'2023-04-27 11:02:45',NULL,NULL,NULL),
(237,'Ruang Peneliti dan Ruang Laboratorium',53,NULL,'2023-04-27 11:03:08',NULL,NULL,NULL),
(238,'Ruang Makan',54,NULL,'2023-04-27 11:04:47',NULL,NULL,NULL),
(239,'Dapur',54,NULL,'2023-04-27 11:04:47',NULL,NULL,NULL),
(240,'Toilet Pria/ Wanita',54,NULL,'2023-04-27 11:04:47',NULL,NULL,NULL),
(241,'Ruang Rapat',55,NULL,'2023-04-27 11:05:24',NULL,NULL,NULL),
(242,'Toilet Pria/ Wanita',55,NULL,'2023-04-27 11:05:24',NULL,NULL,NULL),
(243,'Driving Safety',56,NULL,'2023-04-27 11:14:41',NULL,NULL,NULL),
(244,'Attendance',56,NULL,'2023-04-27 11:14:41',NULL,NULL,NULL),
(245,'Security Functions',57,NULL,'2023-04-27 11:39:40',NULL,NULL,NULL),
(246,'Driving Safety',58,NULL,'2023-04-27 11:41:02',NULL,NULL,NULL),
(247,'Attendance',58,NULL,'2023-04-27 11:41:02',NULL,NULL,NULL),
(248,'Pintu Barat & Timur',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(249,'Mushola',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(250,'Pantry',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(251,'Ruang Rapat',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(252,'Ruang Penelitian',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(253,'Ruang Kepegawaian',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(254,'Ruang Kerja',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(255,'Mess',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(256,'Koridor',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(257,'Toilet Pria / Wanita',59,NULL,'2023-04-27 11:45:58',NULL,NULL,NULL),
(258,'Tangga Exit Barat',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(259,'& Timur',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(260,'Ruang Tamu',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(261,'Pantry',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(262,'Ruang Rapat',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(263,'Ruang Kerja',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(264,'Ruang Perpustakaan',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(265,'Ruang Pimpinan',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(266,'Koridor',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(267,'Toilet Pria / Wanita',60,NULL,'2023-04-27 11:50:23',NULL,NULL,NULL),
(268,'Taman',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(269,'Parkir Motor',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(270,'Parkir Mobil',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(271,'Smoking Area',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(272,'Pos Satpam',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(273,'[Halaman depan samping dan belakang',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(274,'TPS',61,NULL,'2023-04-27 11:52:34',NULL,NULL,NULL),
(275,'Security Functions',62,NULL,'2023-04-27 11:55:54',NULL,NULL,NULL),
(276,'Ruang Pameran',63,NULL,'2023-04-27 11:57:28',NULL,NULL,NULL),
(277,'Gedung Artefak',63,NULL,'2023-04-27 11:57:28',NULL,NULL,NULL),
(278,'Gedung Serbaguna',63,NULL,'2023-04-27 11:57:28',NULL,NULL,NULL),
(279,'Toilet',63,NULL,'2023-04-27 11:57:28',NULL,NULL,NULL),
(280,'Taman',64,NULL,'2023-04-27 11:58:28',NULL,NULL,NULL),
(281,'Halaman Utama Depan',64,NULL,'2023-04-27 11:58:28',NULL,NULL,NULL),
(282,'Halaman samping dan belakang',64,NULL,'2023-04-27 11:58:28',NULL,NULL,NULL),
(283,'TPS',64,NULL,'2023-04-27 11:58:28',NULL,NULL,NULL),
(284,'Security Functions',65,NULL,'2023-04-27 13:32:34',NULL,NULL,NULL),
(285,'Driving Safety',66,NULL,'2023-04-27 13:34:29',NULL,NULL,NULL),
(286,'Attendance',66,NULL,'2023-04-27 13:34:29',NULL,NULL,NULL),
(287,'Pintu Masuk',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(288,'Ruang Kontrol',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(289,'Pantry',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(290,'Ruang Admin',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(291,'Ruang Batre',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(292,'Ruang Tamu',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(293,'Kanopi Outdoor',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(294,'Koridor',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(295,'Toilet Pria / Wanita',67,NULL,'2023-04-27 13:38:06',NULL,NULL,NULL),
(296,'Multimedia',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(297,'Mess',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(298,'Desalinasi',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(299,'Genset',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(300,'Biofuel',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(301,'Komposit',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(302,'Toilet Wisata Depan',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(303,'Toilet Wisata Belakang',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(304,'Musholla',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(305,'Pos Satpam',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(306,'Gazebo',68,NULL,'2023-04-27 13:40:43',NULL,NULL,NULL),
(307,'Taman',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(308,'Parkir Utama',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(309,'Ampititer',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(310,'Area Jam Matahari',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(311,'Kincir/PLTB 5 KWH',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(312,'Ice Maker',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(313,'Technocamp',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(314,'TPS',69,NULL,'2023-04-27 13:45:32',NULL,NULL,NULL),
(315,'Security Functions',70,NULL,'2023-04-27 14:24:23',NULL,NULL,NULL),
(316,'Pantry',71,NULL,'2023-04-27 14:42:37',NULL,NULL,NULL),
(317,'Kamar Depan',71,NULL,'2023-04-27 14:42:37',NULL,NULL,NULL),
(318,'Kamar Belakang',71,NULL,'2023-04-27 14:42:37',NULL,NULL,NULL),
(319,'Ruang Tamu',71,NULL,'2023-04-27 14:42:37',NULL,NULL,NULL),
(320,'Toilet Pria / Wanita',71,NULL,'2023-04-27 14:42:37',NULL,NULL,NULL);

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
