/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.24-MariaDB : Database - rater_area
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rater_area` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `rater_area`;

/*Table structure for table `dial_country` */

DROP TABLE IF EXISTS `dial_country`;

CREATE TABLE `dial_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(25) DEFAULT NULL,
  `dial_code` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4;

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

/*Table structure for table `evaluation1` */

DROP TABLE IF EXISTS `evaluation1`;

CREATE TABLE `evaluation1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(25) NOT NULL,
  `appraisal_date` date DEFAULT NULL,
  `sub_area_id` int(11) NOT NULL,
  `score` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation1` */

insert  into `evaluation1`(`id`,`project_code`,`appraisal_date`,`sub_area_id`,`score`,`created_at`,`created_by`) values 
(1,'BRIN20230426','2023-05-10',109,100,'2023-05-10 09:53:05',2),
(2,'BRIN20230426','2023-05-10',110,95,'2023-05-10 09:53:05',2),
(3,'BRIN20230426','2023-05-10',111,100,'2023-05-10 09:53:05',2),
(4,'BRIN20230426','2023-05-10',112,95,'2023-05-10 09:53:06',2),
(5,'BRIN20230426','2023-05-10',113,74,'2023-05-10 09:53:06',2),
(6,'BRIN20230426','2023-05-12',114,100,'2023-05-10 15:29:12',1),
(7,'BRIN20230426','2023-05-12',115,95,'2023-05-10 15:29:12',1),
(8,'BRIN20230426','2023-05-12',116,100,'2023-05-10 15:29:12',1),
(9,'BRIN20230426','2023-05-12',117,89,'2023-05-10 15:29:12',1),
(10,'BRIN20230426','2023-05-12',118,89,'2023-05-10 15:29:12',1),
(11,'BRIN20230426','2023-05-12',119,74,'2023-05-10 15:29:12',1),
(12,'BRIN20230426','2023-05-12',120,95,'2023-05-10 15:29:12',1),
(13,'BRIN20230426','2023-05-12',121,100,'2023-05-10 15:29:12',1),
(14,'BRIN20230426','2023-05-12',122,95,'2023-05-10 15:29:12',1),
(15,'BRIN20230426','2023-05-19',520,89,'2023-05-10 17:15:33',1),
(16,'BRIN20230426','2023-05-19',521,89,'2023-05-10 17:15:33',1),
(17,'BRIN20230426','2023-05-19',522,74,'2023-05-10 17:15:33',1),
(18,'BRIN20230426','2023-05-19',523,74,'2023-05-10 17:15:33',1),
(19,'BRIN20230426','2023-05-19',524,74,'2023-05-10 17:15:33',1),
(20,'BRIN20230426','2023-05-19',525,74,'2023-05-10 17:15:33',1),
(21,'BRIN20230426','2023-05-19',526,74,'2023-05-10 17:15:33',1),
(22,'BRIN20230426','2023-05-19',527,89,'2023-05-10 17:15:33',1),
(23,'BRIN20230426','2023-05-19',528,74,'2023-05-10 17:15:33',1),
(24,'BRIN20230426','2023-05-19',529,74,'2023-05-10 17:15:33',1),
(25,'BRIN20230426','2023-05-19',530,74,'2023-05-10 17:15:33',1),
(26,'BRIN20230426','2023-05-19',531,89,'2023-05-10 17:15:33',1),
(27,'BRIN20230426','2023-05-19',532,89,'2023-05-10 17:15:33',1),
(28,'BRIN20230426','2023-05-19',533,89,'2023-05-10 17:15:33',1),
(29,'BRIN20230426','2023-05-19',534,74,'2023-05-10 17:15:33',1),
(30,'BRIN20230426','2023-05-19',535,74,'2023-05-10 17:15:33',1),
(31,'BRIN20230426','2023-05-19',536,89,'2023-05-10 17:15:33',1),
(32,'BRIN20230426','2023-05-19',537,89,'2023-05-10 17:15:33',1),
(33,'BRIN20230426','2023-05-19',538,74,'2023-05-10 17:15:33',1),
(34,'BRIN20230426','2023-05-19',539,74,'2023-05-10 17:15:33',1),
(35,'BRIN20230426','2023-05-19',540,89,'2023-05-10 17:15:33',1),
(36,'BRIN20230426','2023-05-19',541,89,'2023-05-10 17:15:33',1),
(37,'BRIN20230426','2023-05-19',542,89,'2023-05-10 17:15:33',1),
(38,'BRIN20230426','2023-05-19',543,74,'2023-05-10 17:15:33',1),
(39,'BRIN20230426','2023-05-19',544,74,'2023-05-10 17:15:33',1),
(40,'BRIN20230426','2023-05-19',545,74,'2023-05-10 17:15:33',1),
(41,'BRIN20230426','2023-05-19',546,74,'2023-05-10 17:15:33',1),
(42,'BRIN20230426','2023-05-19',547,74,'2023-05-10 17:15:33',1),
(43,'BRIN20230426','2023-05-19',548,95,'2023-05-10 17:15:33',1),
(44,'BRIN20230426','2023-05-19',549,89,'2023-05-10 17:15:33',1),
(45,'BRIN20230426','2023-05-19',550,74,'2023-05-10 17:15:33',1),
(46,'BRIN20230426','2023-05-19',551,89,'2023-05-10 17:15:33',1),
(47,'BRIN20230426','2023-05-19',518,74,'2023-05-10 17:15:33',1),
(48,'BRIN20230426','2023-05-19',519,100,'2023-05-10 17:15:33',1),
(49,'BRIN20230426','2023-05-19',517,100,'2023-05-10 17:15:33',1),
(50,'BRIN20230426','2023-05-11',284,100,'2023-05-11 07:36:07',1),
(51,'BRIN20230426','2023-05-11',285,95,'2023-05-11 07:36:07',1),
(52,'BRIN20230426','2023-05-11',286,100,'2023-05-11 07:36:07',1),
(53,'BRIN20230426','2023-05-11',287,95,'2023-05-11 07:36:07',1),
(54,'BRIN20230426','2023-05-11',288,100,'2023-05-11 07:36:07',1),
(55,'BRIN20230426','2023-05-11',289,89,'2023-05-11 07:36:07',1),
(56,'BRIN20230426','2023-05-11',290,89,'2023-05-11 07:36:07',1),
(57,'BRIN20230426','2023-05-11',291,74,'2023-05-11 07:36:07',1),
(58,'BRIN20230426','2023-05-11',292,74,'2023-05-11 07:36:07',1),
(59,'BRIN20230426','2023-05-11',293,89,'2023-05-11 07:36:07',1),
(60,'BRIN20230426','2023-05-11',294,95,'2023-05-11 07:36:07',1),
(61,'BRIN20230426','2023-05-11',295,95,'2023-05-11 07:36:07',1),
(62,'BRIN20230426','2023-05-11',296,100,'2023-05-11 07:36:07',1),
(63,'BRIN20230426','2023-05-11',297,89,'2023-05-11 07:36:07',1),
(64,'BRIN20230426','2023-05-11',298,100,'2023-05-11 07:36:07',1),
(65,'BRIN20230426','2023-05-11',299,74,'2023-05-11 07:36:07',1),
(66,'BRIN20230426','2023-05-11',300,89,'2023-05-11 07:36:08',1),
(67,'BRIN20230426','2023-05-11',301,95,'2023-05-11 07:36:08',1),
(68,'BRIN20230426','2023-05-11',302,74,'2023-05-11 07:36:08',1),
(69,'BRIN20230426','2023-05-11',303,74,'2023-05-11 07:36:08',1),
(70,'BRIN20230426','2023-05-11',304,100,'2023-05-11 07:36:08',1),
(71,'BRIN20230426','2023-05-11',305,100,'2023-05-11 07:36:08',1),
(72,'BRIN20230426','2023-05-11',306,100,'2023-05-11 07:36:08',1),
(73,'BRIN20230426','2023-05-11',307,95,'2023-05-11 07:36:08',1),
(74,'BRIN20230426','2023-05-11',308,89,'2023-05-11 07:36:08',1),
(75,'BRIN20230426','2023-05-11',309,89,'2023-05-11 07:36:08',1),
(76,'BRIN20230426','2023-05-11',310,95,'2023-05-11 07:36:08',1),
(77,'BRIN20230426','2023-05-11',311,100,'2023-05-11 07:36:08',1),
(78,'BRIN20230426','2023-05-11',312,100,'2023-05-11 07:36:08',1),
(79,'BRIN20230426','2023-05-11',313,100,'2023-05-11 07:36:08',1),
(80,'BRIN20230426','2023-05-11',314,95,'2023-05-11 07:36:08',1),
(81,'BRIN20230426','2023-05-11',245,100,'2023-05-11 07:37:47',1),
(82,'BRIN20230426','2023-05-11',246,74,'2023-05-11 07:37:47',1),
(83,'BRIN20230426','2023-05-11',247,89,'2023-05-11 07:37:47',1),
(84,'BRIN20230426','2023-05-11',248,74,'2023-05-11 07:37:47',1),
(85,'BRIN20230426','2023-05-11',249,95,'2023-05-11 07:37:47',1),
(86,'BRIN20230426','2023-05-11',250,95,'2023-05-11 07:37:47',1),
(87,'BRIN20230426','2023-05-11',251,100,'2023-05-11 07:37:47',1),
(88,'BRIN20230426','2023-05-11',252,95,'2023-05-11 07:37:47',1),
(89,'BRIN20230426','2023-05-11',253,74,'2023-05-11 07:37:47',1),
(90,'BRIN20230426','2023-05-11',254,95,'2023-05-11 07:37:47',1),
(91,'BRIN20230426','2023-05-11',255,100,'2023-05-11 07:37:47',1),
(92,'BRIN20230426','2023-05-11',256,74,'2023-05-11 07:37:47',1),
(93,'BRIN20230426','2023-05-11',257,100,'2023-05-11 07:37:47',1),
(94,'BRIN20230426','2023-05-11',258,95,'2023-05-11 07:37:47',1),
(95,'BRIN20230426','2023-05-11',259,100,'2023-05-11 07:37:47',1),
(96,'BRIN20230426','2023-05-11',260,100,'2023-05-11 07:37:47',1),
(97,'BRIN20230426','2023-05-11',261,74,'2023-05-11 07:37:47',1),
(98,'BRIN20230426','2023-05-11',262,100,'2023-05-11 07:37:47',1),
(99,'BRIN20230426','2023-05-11',263,100,'2023-05-11 07:37:47',1),
(100,'BRIN20230426','2023-05-11',264,95,'2023-05-11 07:37:47',1),
(101,'BRIN20230426','2023-05-11',265,95,'2023-05-11 07:37:47',1),
(102,'BRIN20230426','2023-05-11',266,100,'2023-05-11 07:37:47',1),
(103,'BRIN20230426','2023-05-11',267,100,'2023-05-11 07:37:47',1),
(104,'BRIN20230426','2023-05-11',268,95,'2023-05-11 07:37:47',1),
(105,'BRIN20230426','2023-05-11',269,89,'2023-05-11 07:37:47',1),
(106,'BRIN20230426','2023-05-11',270,95,'2023-05-11 07:37:47',1),
(107,'BRIN20230426','2023-05-11',271,100,'2023-05-11 07:37:47',1),
(108,'BRIN20230426','2023-05-11',272,89,'2023-05-11 07:37:47',1),
(109,'BRIN20230426','2023-05-11',273,74,'2023-05-11 07:37:47',1),
(110,'BRIN20230426','2023-05-11',274,100,'2023-05-11 07:37:47',1),
(111,'BRIN20230426','2023-06-15',245,100,'2023-05-11 07:38:36',1),
(112,'BRIN20230426','2023-06-15',246,100,'2023-05-11 07:38:36',1),
(113,'BRIN20230426','2023-06-15',247,100,'2023-05-11 07:38:36',1),
(114,'BRIN20230426','2023-06-15',248,100,'2023-05-11 07:38:36',1),
(115,'BRIN20230426','2023-06-15',249,95,'2023-05-11 07:38:36',1),
(116,'BRIN20230426','2023-06-15',250,95,'2023-05-11 07:38:36',1),
(117,'BRIN20230426','2023-06-15',251,100,'2023-05-11 07:38:36',1),
(118,'BRIN20230426','2023-06-15',252,89,'2023-05-11 07:38:36',1),
(119,'BRIN20230426','2023-06-15',253,89,'2023-05-11 07:38:36',1),
(120,'BRIN20230426','2023-06-15',254,89,'2023-05-11 07:38:36',1),
(121,'BRIN20230426','2023-06-15',255,89,'2023-05-11 07:38:36',1),
(122,'BRIN20230426','2023-06-15',256,74,'2023-05-11 07:38:36',1),
(123,'BRIN20230426','2023-06-15',257,74,'2023-05-11 07:38:36',1),
(124,'BRIN20230426','2023-06-15',258,74,'2023-05-11 07:38:36',1),
(125,'BRIN20230426','2023-06-15',259,89,'2023-05-11 07:38:36',1),
(126,'BRIN20230426','2023-06-15',260,95,'2023-05-11 07:38:36',1),
(127,'BRIN20230426','2023-06-15',261,95,'2023-05-11 07:38:36',1),
(128,'BRIN20230426','2023-06-15',262,95,'2023-05-11 07:38:36',1),
(129,'BRIN20230426','2023-06-15',263,95,'2023-05-11 07:38:36',1),
(130,'BRIN20230426','2023-06-15',264,100,'2023-05-11 07:38:36',1),
(131,'BRIN20230426','2023-06-15',265,95,'2023-05-11 07:38:36',1),
(132,'BRIN20230426','2023-06-15',266,89,'2023-05-11 07:38:36',1),
(133,'BRIN20230426','2023-06-15',267,100,'2023-05-11 07:38:36',1),
(134,'BRIN20230426','2023-06-15',268,74,'2023-05-11 07:38:36',1),
(135,'BRIN20230426','2023-06-15',269,74,'2023-05-11 07:38:36',1),
(136,'BRIN20230426','2023-06-15',270,74,'2023-05-11 07:38:36',1),
(137,'BRIN20230426','2023-06-15',271,74,'2023-05-11 07:38:36',1),
(138,'BRIN20230426','2023-06-15',272,100,'2023-05-11 07:38:36',1),
(139,'BRIN20230426','2023-06-15',273,95,'2023-05-11 07:38:36',1),
(140,'BRIN20230426','2023-06-15',274,100,'2023-05-11 07:38:36',1),
(141,'BRIN20230426','2023-07-12',245,100,'2023-05-11 07:39:24',1),
(142,'BRIN20230426','2023-07-12',246,100,'2023-05-11 07:39:24',1),
(143,'BRIN20230426','2023-07-12',247,95,'2023-05-11 07:39:24',1),
(144,'BRIN20230426','2023-07-12',248,95,'2023-05-11 07:39:24',1),
(145,'BRIN20230426','2023-07-12',249,100,'2023-05-11 07:39:24',1),
(146,'BRIN20230426','2023-07-12',250,89,'2023-05-11 07:39:24',1),
(147,'BRIN20230426','2023-07-12',251,95,'2023-05-11 07:39:24',1),
(148,'BRIN20230426','2023-07-12',252,89,'2023-05-11 07:39:24',1),
(149,'BRIN20230426','2023-07-12',253,95,'2023-05-11 07:39:24',1),
(150,'BRIN20230426','2023-07-12',254,95,'2023-05-11 07:39:24',1),
(151,'BRIN20230426','2023-07-12',255,100,'2023-05-11 07:39:24',1),
(152,'BRIN20230426','2023-07-12',256,95,'2023-05-11 07:39:24',1),
(153,'BRIN20230426','2023-07-12',257,89,'2023-05-11 07:39:24',1),
(154,'BRIN20230426','2023-07-12',258,89,'2023-05-11 07:39:24',1),
(155,'BRIN20230426','2023-07-12',259,95,'2023-05-11 07:39:24',1),
(156,'BRIN20230426','2023-07-12',260,89,'2023-05-11 07:39:24',1),
(157,'BRIN20230426','2023-07-12',261,95,'2023-05-11 07:39:24',1),
(158,'BRIN20230426','2023-07-12',262,100,'2023-05-11 07:39:24',1),
(159,'BRIN20230426','2023-07-12',263,100,'2023-05-11 07:39:24',1),
(160,'BRIN20230426','2023-07-12',264,100,'2023-05-11 07:39:24',1),
(161,'BRIN20230426','2023-07-12',265,89,'2023-05-11 07:39:24',1),
(162,'BRIN20230426','2023-07-12',266,89,'2023-05-11 07:39:24',1),
(163,'BRIN20230426','2023-07-12',267,89,'2023-05-11 07:39:24',1),
(164,'BRIN20230426','2023-07-12',268,89,'2023-05-11 07:39:24',1),
(165,'BRIN20230426','2023-07-12',269,95,'2023-05-11 07:39:24',1),
(166,'BRIN20230426','2023-07-12',270,95,'2023-05-11 07:39:24',1),
(167,'BRIN20230426','2023-07-12',271,95,'2023-05-11 07:39:24',1),
(168,'BRIN20230426','2023-07-12',272,95,'2023-05-11 07:39:24',1),
(169,'BRIN20230426','2023-07-12',273,95,'2023-05-11 07:39:24',1),
(170,'BRIN20230426','2023-07-12',274,89,'2023-05-11 07:39:24',1),
(171,'BRIN20230426','2023-08-11',245,100,'2023-05-11 08:01:19',1),
(172,'BRIN20230426','2023-08-11',246,95,'2023-05-11 08:01:19',1),
(173,'BRIN20230426','2023-08-11',247,95,'2023-05-11 08:01:19',1),
(174,'BRIN20230426','2023-08-11',248,95,'2023-05-11 08:01:19',1),
(175,'BRIN20230426','2023-08-11',249,100,'2023-05-11 08:01:19',1),
(176,'BRIN20230426','2023-08-11',250,89,'2023-05-11 08:01:19',1),
(177,'BRIN20230426','2023-08-11',251,95,'2023-05-11 08:01:19',1),
(178,'BRIN20230426','2023-08-11',252,74,'2023-05-11 08:01:19',1),
(179,'BRIN20230426','2023-08-11',253,74,'2023-05-11 08:01:19',1),
(180,'BRIN20230426','2023-08-11',254,89,'2023-05-11 08:01:19',1),
(181,'BRIN20230426','2023-08-11',255,95,'2023-05-11 08:01:19',1),
(182,'BRIN20230426','2023-08-11',256,95,'2023-05-11 08:01:19',1),
(183,'BRIN20230426','2023-08-11',257,95,'2023-05-11 08:01:19',1),
(184,'BRIN20230426','2023-08-11',258,100,'2023-05-11 08:01:19',1),
(185,'BRIN20230426','2023-08-11',259,100,'2023-05-11 08:01:19',1),
(186,'BRIN20230426','2023-08-11',260,95,'2023-05-11 08:01:19',1),
(187,'BRIN20230426','2023-08-11',261,95,'2023-05-11 08:01:19',1),
(188,'BRIN20230426','2023-08-11',262,95,'2023-05-11 08:01:19',1),
(189,'BRIN20230426','2023-08-11',263,95,'2023-05-11 08:01:19',1),
(190,'BRIN20230426','2023-08-11',264,100,'2023-05-11 08:01:19',1),
(191,'BRIN20230426','2023-08-11',265,95,'2023-05-11 08:01:19',1),
(192,'BRIN20230426','2023-08-11',266,89,'2023-05-11 08:01:19',1),
(193,'BRIN20230426','2023-08-11',267,89,'2023-05-11 08:01:19',1),
(194,'BRIN20230426','2023-08-11',268,74,'2023-05-11 08:01:19',1),
(195,'BRIN20230426','2023-08-11',269,74,'2023-05-11 08:01:19',1),
(196,'BRIN20230426','2023-08-11',270,74,'2023-05-11 08:01:19',1),
(197,'BRIN20230426','2023-08-11',271,89,'2023-05-11 08:01:19',1),
(198,'BRIN20230426','2023-08-11',272,95,'2023-05-11 08:01:19',1),
(199,'BRIN20230426','2023-08-11',273,95,'2023-05-11 08:01:19',1),
(200,'BRIN20230426','2023-08-11',274,100,'2023-05-11 08:01:19',1);

/*Table structure for table `evaluation_critic_recommend` */

DROP TABLE IF EXISTS `evaluation_critic_recommend`;

CREATE TABLE `evaluation_critic_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `critic_recommend` text DEFAULT NULL,
  `id_header` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_header` (`id_header`),
  CONSTRAINT `evaluation_critic_recommend_ibfk_1` FOREIGN KEY (`id_header`) REFERENCES `header_evaluation` (`id_header`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation_critic_recommend` */

insert  into `evaluation_critic_recommend`(`id`,`critic_recommend`,`id_header`) values 
(1,'rewerewr',1),
(2,'rgrgerfeqfqfdqdsaasdsad',2),
(3,'dqwdwdwqddqw',3),
(4,'dasdsafdssdf',4),
(5,'vsdgsgfsdfsdfdsf',5);

/*Table structure for table `header_evaluation` */

DROP TABLE IF EXISTS `header_evaluation`;

CREATE TABLE `header_evaluation` (
  `id_header` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `appraisal_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `header_evaluation` */

insert  into `header_evaluation`(`id_header`,`location_id`,`appraisal_date`,`created_by`,`created_date`) values 
(1,3,'2023-05-11',NULL,NULL),
(2,5,'2023-05-19',NULL,NULL),
(3,6,'2023-05-17',NULL,NULL),
(4,8,'2023-05-21',1,NULL),
(5,22,'2023-05-19',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `m_client` */

insert  into `m_client`(`id`,`client_name`,`address`,`contact1`,`contact2`,`dial_code_mobile`,`mobile`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Badan Riset Dan Inovasi Nasional (BRIN)','Gedung B.J. Habibie, Jl. M.H. Thamrin No. 8, Jakarta Pusat 10340',NULL,NULL,62,'81119333639',NULL,'2023-04-26 15:00:28',NULL,NULL,NULL),
(3,'PT. ABC Coklat','-','(123) 213-2132','(341) 412-3123',62,'123123213213','3r32r32r32r3','2023-05-15 08:07:33',NULL,NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama_menu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_nama_menu_unique` (`nama_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
(16,15,'Report Weekly','fas fa-solid fa-list-ul','report/report_weekly',14,'0000-00-00 00:00:00','','0000-00-00 00:00:00','\r'),
(17,15,'Score Monthly Per Location','fas fa-solid fa-list-ul','report/reportScoreMonthlyPerLocation',15,'2023-05-19 08:42:35',NULL,NULL,NULL),
(18,0,'Sign','fas fa-solid fa-signature','javascript::',16,'2023-05-08 14:58:46',NULL,NULL,NULL),
(19,18,'Signature Digital','fas fa-solid fa-signature','sign/signature_digital',17,'2023-05-08 14:59:54',NULL,NULL,NULL),
(20,5,'Upload New Project','fas fa-solid fa-diagram-project','project/upload_project',NULL,'2023-05-24 16:03:38',NULL,NULL,NULL),
(21,NULL,'','','',NULL,'2023-05-24 14:11:25',NULL,NULL,NULL);

/*Table structure for table `new_project_temp` */

DROP TABLE IF EXISTS `new_project_temp`;

CREATE TABLE `new_project_temp` (
  `project_code` varchar(100) DEFAULT NULL,
  `region_name` varchar(100) DEFAULT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `sub_area_name` varchar(100) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `new_project_temp` */

insert  into `new_project_temp`(`project_code`,`region_name`,`location_name`,`area_name`,`sub_area_name`,`service_name`) values 
('BRIN20230529','Bali','Arkenas Balar Bali','Security','Security Functions','Security Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Driver','Attendance','Labor Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Driver','Driving Safety','Labor Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','Co Working Space','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','Gudang 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','Gudang 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','R Dokumentasi','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','R Penggambaran','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','Ruang perlengkapan','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','Toilet Pria & Wanita 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.1','Toilet Pria & Wanita 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Ruang Peneliti 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Ruang Peneliti 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Ruang Peneliti 3','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Ruang Rapat Besar','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Ruang Redaksi','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Toilet Pria & Wanita 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Blok Barat Lt.2','Toilet Pria & Wanita','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Pameran','Ruang Mess','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Pameran','Ruang Pameran','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Pameran','Toilet Pria / Wanita','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Perpustakaan Lt.1','Ruang Laboratorium','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Perpustakaan Lt.1','Toilet Pria & Wanita 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Perpustakaan Lt.1','Toilet Pria & Wanita 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Perpustakaan Lt.2','Ruang Perpustakaan','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Perpustakaan Lt.2','Toilet Pria & Wanita','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','Lobby','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','Pantry','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','R Kasubag','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','R Keuangan','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','R Tata Usaha','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','Toilet Pria & Wanita 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.1','Toilet Pria & Wanita 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','Co Working Space','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','Pantry','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Kepala','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Peneliti 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Peneliti 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Peneliti 3','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Peneliti 4','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Rapat Kecil 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','R Rapat Kecil 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','Toilet Pria & Wanita 1','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Gedung Utama Lt.2','Toilet Pria & Wanita 2','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Halaman','Parkir Mobil','Cleaning Service'),
('BRIN20230529','Bali','Arkenas Balar Bali','Halaman','Taman','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Security','Security Functions','Security Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Area Parkir','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Gallery','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Lobby Gedung Administrasi','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Lorong Administrasi','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Pantry','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Pimpinan (Ka.BTIKK)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Staff (Desain)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Staff (KPJT. 1)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Staff (KPJT. 2)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Staff (Pengelola Keuangan)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Staff (PPT)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Staff (Sekretaris)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Kerja Sub.Kordinator TU dan Staff TU','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Ruang Rapat','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Toilet (Pria)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Administrasi Lt.1','Toilet (Wanita)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Kamar Asrama Putra 1','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Kamar Asrama Putra 2','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Kamar Asrama Putri 1','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Kamar Asrama Putri 2','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Lobby Asrama Putra','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Lobby Asrama Putri','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Toilet 1','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Asrama Lt.1','Toilet 2','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Gudang Bahan Kimia','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Lobby Gedung Laboratorium','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Ruang Kerja Staff Laboratorium','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Ruang Kontrol Rapat','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Ruang Laboratorium','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Ruang Rapat','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Toilet (Pria)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Toilet (Wanita)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.1','Toilet VIP','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Ruang Arsip','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Ruang CWS 1','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Ruang CWS 2','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Ruang Tamu','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Tempat Ibadah (Mushola)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Toilet (Pria)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.2','Toilet (Wanita)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Laboratorium Lt.3','Ruang Kerja INA TWS','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Pembentukan dan Kriya ukir)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Area Parkir 1 (roda 2)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Area Parkir 2 (roda 4)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Area Parkir 3 (roda 4)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Gudang Bahan Baku','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Gudang Produksi','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Pencetakan','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Ruang Kerja Produksi (Kriya lukis)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Ruang Kerja Produksi (Pembakaran','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Ruang Kerja Produksi (Pengolahan bahan baku)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Ruang Kontrol Panel Listrik','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Ruang Training Center','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Toilet (Pria)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Gedung Produksi Lt.1','Toilet (Wanita)','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Rumah Dinas','Halaman 1','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Rumah Dinas','Halaman 2','Cleaning Service'),
('BRIN20230529','Bali','Denpasar Bali','Rumah Dinas','Rumah Dinas Pimpinan','Cleaning Service'),
('BRIN20230529','Bali','Mataram','Security','Security Functions','Security Service'),
('BRIN20230529','Bali','Mataram','Driver','Driving Safety','Labor Service'),
('BRIN20230529','Bali','Mataram','Driver','Attendance','Labor Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Gudang','Ruang Penyimpanan','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Halaman','Taman Depan','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Laboratorium','Ruang Peneliti dan Ruang Laboratorium','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Mess','Kamar Tidur 6 Ruang','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Mess','Ruang Tamu','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Mess','Toilet Pria / Wanita','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Aula','Ruang Rapat','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Aula','Toilet Pria/ Wanita','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Kepala dan Ruang Diseminasi','Dapur','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Kepala dan Ruang Diseminasi','Ruang Makan','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Kepala dan Ruang Diseminasi','Toilet Pria/ Wanita','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Tata Usaha','Ruang Kerja','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Tata Usaha','Ruang Server','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sukabumi','Ruang Workshop','Ruang Mesin','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Kolidor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Lantai 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','lantai 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Ruang kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Ruangan kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Ruangan perpustakaan','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Tangga','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Toilet pria','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Cinunuk','Gedung','Toilet wanita','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Kamar 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Kamar 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Kamar 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Kamar 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Kolidor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Pentri','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Dago Pojok','Gedung','Toilet','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Gd. Arsip Nasional','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Bandung Gd. Arsip Nasional','Gedung','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Gd. Arsip Nasional','Gedung','lantai 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Gd. Arsip Nasional','Gedung','lantai 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Gd. Arsip Nasional','Gedung','Tangga','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Gd. Arsip Nasional','Gedung','Toilet','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Kamar 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Kamar 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Kamar 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Kamar 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Kamar 5','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Koridor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Pantry','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Ruang kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Mess Hegarmanah','Gedung','Toilet','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 5','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 6','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 7','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 8','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kamar 9','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Kolidor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Pantry','Cleaning Service'),
('BRIN20230529','Jawa Barat','Bandung Tubagus Ismail','Gedung','Toilet','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung Ciater','Gedung Asrama','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung Ciater','Gedung Asrama','Ruang','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung Ciater','Gedung Asrama','Toilet','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung Ciater','Halaman','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung Ciater','Halaman','Ruang Lantai','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Halaman','Outdor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 1','Koridor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 1','Mushola','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 1','Pentri','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 1','Ruang kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 1','Tangga','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 1','Toilet','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 2','Koridor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 2','Ruang kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Kab. Bandung PLTP Ibun Kamojang','Lantai 2','Ruang meeting','Cleaning Service'),
('BRIN20230529','Jawa Barat','Subang','Driver','Driving Safety','Labor Service'),
('BRIN20230529','Jawa Barat','Subang','Driver','Attendance','Labor Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Security','Security Functions','Security Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Koridor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Lobby','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Pentri','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Ruang Kantor 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Ruang Kantor 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Ruang Kantor 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Ruang Kantor 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Ruang Meeting','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Toilet 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Administrasi','Toilet 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Pentri','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Ruang Galery','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Toilet 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Toilet 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Toilet 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Toilet 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Toilet 5','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 1','Toilet 6','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Ruang Arsip','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Ruang Aula','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Ruang Kantor 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Ruang Kantor 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Toilet 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Toilet 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Toilet 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Antariksa 2','Toilet 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Centaurus','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Centaurus','Koridor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Centaurus','Pantry','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Centaurus','Ruang Kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Area Parkir','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 3','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 4','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 5','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 6','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 7','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Kamar 8','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Koridor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Lobby','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Pantry','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Ruang Meeting','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Guest House','Toilet 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Meteo','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Meteo','Ruang Kantor 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Meteo','Toilet 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Mushola','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Mushola','Ruang Sembahyang','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Mushola','Tempat Wudlu','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Phoenix','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Phoenix','Ruang Kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Phoenix','Toilet 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung Phoenix','Toilet 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung PPID','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Gedung PPID','Ruang Kantor','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Pos Security','Halaman','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Pos Security','Ruang 1','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Pos Security','Ruang 2','Cleaning Service'),
('BRIN20230529','Jawa Barat','Sumedang Ex. Lapan','Pos Security','Toilet','Cleaning Service');

/*Table structure for table `score_evaluation` */

DROP TABLE IF EXISTS `score_evaluation`;

CREATE TABLE `score_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_area_id` int(11) NOT NULL,
  `score` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(25) DEFAULT NULL,
  `id_header` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_header` (`id_header`),
  CONSTRAINT `score_evaluation_ibfk_1` FOREIGN KEY (`id_header`) REFERENCES `header_evaluation` (`id_header`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `score_evaluation` */

insert  into `score_evaluation`(`id`,`sub_area_id`,`score`,`created_at`,`created_by`,`id_header`) values 
(1,229,100,'2023-05-22 10:46:14',1,1),
(2,230,95,'2023-05-22 10:46:14',1,1),
(3,231,89,'2023-05-22 10:46:14',1,1),
(4,232,95,'2023-05-22 10:46:14',1,1),
(5,233,95,'2023-05-22 10:46:14',1,1),
(6,234,95,'2023-05-22 10:46:14',1,1),
(7,235,89,'2023-05-22 10:46:14',1,1),
(8,236,95,'2023-05-22 10:46:14',1,1),
(9,237,100,'2023-05-22 10:46:14',1,1),
(10,238,100,'2023-05-22 10:46:14',1,1),
(11,239,95,'2023-05-22 10:46:14',1,1),
(12,240,95,'2023-05-22 10:46:14',1,1),
(13,241,74,'2023-05-22 10:46:14',1,1),
(14,242,74,'2023-05-22 10:46:14',1,1),
(15,228,95,'2023-05-22 10:46:14',1,1),
(16,109,89,'2023-05-22 10:48:10',1,2),
(17,110,74,'2023-05-22 10:48:10',1,2),
(18,111,100,'2023-05-22 10:48:10',1,2),
(19,112,95,'2023-05-22 10:48:10',1,2),
(20,113,100,'2023-05-22 10:48:10',1,2),
(21,114,100,'2023-05-22 10:59:40',1,3),
(22,115,95,'2023-05-22 10:59:40',1,3),
(23,116,89,'2023-05-22 10:59:40',1,3),
(24,117,100,'2023-05-22 10:59:40',1,3),
(25,118,95,'2023-05-22 10:59:40',1,3),
(26,119,95,'2023-05-22 10:59:40',1,3),
(27,120,100,'2023-05-22 10:59:41',1,3),
(28,121,100,'2023-05-22 10:59:41',1,3),
(29,122,89,'2023-05-22 10:59:41',1,3),
(30,123,100,'2023-05-22 11:01:51',1,4),
(31,124,95,'2023-05-22 11:01:51',1,4),
(32,125,95,'2023-05-22 11:01:51',1,4),
(33,126,100,'2023-05-22 11:01:51',1,4),
(34,127,100,'2023-05-22 11:01:51',1,4),
(35,128,89,'2023-05-22 11:01:51',1,4),
(36,129,95,'2023-05-22 11:01:51',1,4),
(37,130,89,'2023-05-22 11:01:51',1,4),
(38,131,89,'2023-05-22 11:01:51',1,4),
(39,132,89,'2023-05-22 11:01:51',1,4),
(40,133,95,'2023-05-22 11:01:51',1,4),
(41,445,89,'2023-05-22 14:13:55',1,5),
(42,446,89,'2023-05-22 14:13:55',1,5),
(43,447,89,'2023-05-22 14:13:55',1,5),
(44,448,100,'2023-05-22 14:13:55',1,5),
(45,449,100,'2023-05-22 14:13:55',1,5),
(46,450,95,'2023-05-22 14:13:55',1,5),
(47,451,95,'2023-05-22 14:13:55',1,5),
(48,452,100,'2023-05-22 14:13:55',1,5),
(49,453,74,'2023-05-22 14:13:55',1,5);

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setup_area` */

insert  into `setup_area`(`id`,`area_name`,`location_id`,`service_code`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Security',1,'ses',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(2,'Driver',1,'las',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(3,'Gedung Blok Barat Lt.1',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(4,'Gedung Blok Barat Lt.2',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(5,'Gedung Pameran',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(6,'Gedung Perpustakaan Lt.1',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(7,'Gedung Perpustakaan Lt.2',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(8,'Gedung Utama Lt.1',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(9,'Gedung Utama Lt.2',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(10,'Halaman',1,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(11,'Security',2,'ses',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(12,'Gedung Administrasi Lt.1',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(13,'Gedung Asrama Lt.1',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(14,'Gedung Laboratorium Lt.1',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(15,'Gedung Laboratorium Lt.2',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(16,'Gedung Laboratorium Lt.3',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(17,'Gedung Produksi Lt.1',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(18,'Rumah Dinas',2,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(19,'Security',3,'ses',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(20,'Driver',3,'las',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(21,'Security',4,'ses',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(22,'Gudang',4,'cls',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(23,'Halaman',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(24,'Laboratorium',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(25,'Mess',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(26,'Ruang Aula',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(27,'Ruang Kepala dan Ruang Diseminasi',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(28,'Ruang Tata Usaha',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(29,'Ruang Workshop',4,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(30,'Security',5,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(31,'Gedung',5,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(32,'Security',6,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(33,'Gedung',6,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(34,'Security',7,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(35,'Gedung',7,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(36,'Security',8,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(37,'Gedung',8,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(38,'Security',9,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(39,'Gedung',9,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(40,'Gedung Asrama',10,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(41,'Halaman',10,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(42,'Security',11,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(43,'Halaman',11,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(44,'Lantai 1',11,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(45,'Lantai 2',11,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(46,'Driver',12,'las',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(47,'Security',13,'ses',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(48,'Gedung Administrasi',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(49,'Gedung Antariksa 1',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(50,'Gedung Antariksa 2',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(51,'Gedung Centaurus',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(52,'Gedung Guest House',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(53,'Gedung Meteo',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(54,'Gedung Mushola',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(55,'Gedung Phoenix',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(56,'Gedung PPID',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(57,'Pos Security',13,'cls',NULL,'2023-05-29 17:14:04',NULL,NULL,NULL);

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
  KEY `region_id` (`region_id`),
  CONSTRAINT `setup_location_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `setup_region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setup_location` */

insert  into `setup_location`(`id`,`location_name`,`region_id`,`address`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Arkenas Balar Bali',1,NULL,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(2,'Denpasar Bali',1,NULL,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(3,'Mataram',1,NULL,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(4,'Sukabumi',2,NULL,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(5,'Bandung Cinunuk',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(6,'Bandung Dago Pojok',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(7,'Bandung Gd. Arsip Nasional',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(8,'Bandung Mess Hegarmanah',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(9,'Bandung Tubagus Ismail',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(10,'Kab. Bandung Ciater',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(11,'Kab. Bandung PLTP Ibun Kamojang',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(12,'Subang',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(13,'Sumedang Ex. Lapan',2,NULL,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `setup_project` */

insert  into `setup_project`(`project_code`,`project_name`,`client_id`,`contract_start`,`contract_finish`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
('BRIN20230529','BRIN',1,'2023-05-30 00:00:00','2023-05-31 00:00:00','2023-05-29 14:07:10',1,NULL,NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setup_region` */

insert  into `setup_region`(`id`,`region_name`,`project_code`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Bali','BRIN20230529',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(2,'Jawa Barat','BRIN20230529',NULL,'2023-05-29 17:14:03',NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setup_sub_area` */

insert  into `setup_sub_area`(`id`,`sub_area_name`,`area_id`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Area Parkir',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(2,'Area Parkir 1 (roda 2)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(3,'Area Parkir 2 (roda 4)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(4,'Area Parkir 3 (roda 4)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(5,'Gallery',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(6,'Gudang Bahan Baku',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(7,'Gudang Bahan Kimia',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(8,'Gudang Produksi',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(9,'Halaman 1',4,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(10,'Halaman 2',4,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(11,'Kamar Asrama Putra 1',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(12,'Kamar Asrama Putra 2',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(13,'Kamar Asrama Putri 1',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(14,'Kamar Asrama Putri 2',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(15,'Lobby Asrama Putra',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(16,'Lobby Asrama Putri',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(17,'Lobby Gedung Administrasi',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(18,'Lobby Gedung Laboratorium',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(19,'Lorong Administrasi',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(20,'Pantry',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(21,'Pembentukan dan Kriya ukir',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(22,'Pencetakan',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(23,'Ruang Arsip',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(24,'Ruang CWS 1',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(25,'Ruang CWS 2',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(26,'Ruang Kerja INA TWS',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(27,'Ruang Kerja Pimpinan (Ka.BTIKK)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(28,'Ruang Kerja Produksi (Kriya lukis)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(29,'Ruang Kerja Produksi (Pembakaran]',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(30,'Ruang Kerja Produksi (Pengolahan bahan baku)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(31,'Ruang Kerja Staff (Desain)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(32,'Ruang Kerja Staff (KPJT. 1)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(33,'Ruang Kerja Staff (KPJT. 2)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(34,'Ruang Kerja Staff (Pengelola Keuangan)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(35,'Ruang Kerja Staff (PPT)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(36,'Ruang Kerja Staff (Sekretaris)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(37,'Ruang Kerja Staff Laboratorium',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(38,'Ruang Kerja Sub.Kordinator TU dan Staff TU',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(39,'Ruang Kontrol Panel Listrik',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(40,'Ruang Kontrol Rapat',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(41,'Ruang Laboratorium',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(42,'Ruang Rapat',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(43,'Ruang Rapat',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(44,'Ruang Tamu',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(45,'Ruang Training Center',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(46,'Rumah Dinas Pimpinan',4,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(47,'Security Function',7,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(48,'Tempat Ibadah (Mushola)',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(49,'Toilet (Pria)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(50,'Toilet (Pria)',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(51,'Toilet (Pria)',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(52,'Toilet (Pria)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(53,'Toilet (Wanita)',1,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(54,'Toilet (Wanita)',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(55,'Toilet (Wanita)',6,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(56,'Toilet (Wanita)',2,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(57,'Toilet 1',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(58,'Toilet 2',5,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(59,'Toilet VIP',3,NULL,'2023-05-29 15:55:17',NULL,NULL,NULL),
(60,'Security Functions',1,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(61,'Attendance',2,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(62,'Driving Safety',2,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(63,'Co Working Space',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(64,'Gudang 1',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(65,'Gudang 2',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(66,'R Dokumentasi',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(67,'R Penggambaran',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(68,'Ruang perlengkapan',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(69,'Toilet Pria & Wanita 1',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(70,'Toilet Pria & Wanita 2',3,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(71,'Ruang Peneliti 1',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(72,'Ruang Peneliti 2',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(73,'Ruang Peneliti 3',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(74,'Ruang Rapat Besar',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(75,'Ruang Redaksi',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(76,'Toilet Pria & Wanita 2',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(77,'Toilet Pria & Wanita',4,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(78,'Ruang Mess',5,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(79,'Ruang Pameran',5,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(80,'Toilet Pria / Wanita',5,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(81,'Ruang Laboratorium',6,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(82,'Toilet Pria & Wanita 1',6,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(83,'Toilet Pria & Wanita 2',6,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(84,'Ruang Perpustakaan',7,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(85,'Toilet Pria & Wanita',7,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(86,'Lobby',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(87,'Pantry',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(88,'R Kasubag',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(89,'R Keuangan',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(90,'R Tata Usaha',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(91,'Toilet Pria & Wanita 1',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(92,'Toilet Pria & Wanita 2',8,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(93,'Co Working Space',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(94,'Pantry',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(95,'R Kepala',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(96,'R Peneliti 1',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(97,'R Peneliti 2',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(98,'R Peneliti 3',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(99,'R Peneliti 4',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(100,'R Rapat Kecil 2',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(101,'R Rapat Kecil 1',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(102,'Toilet Pria & Wanita 1',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(103,'Toilet Pria & Wanita 2',9,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(104,'Parkir Mobil',10,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(105,'Taman',10,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(106,'Security Functions',11,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(107,'Area Parkir',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(108,'Gallery',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(109,'Lobby Gedung Administrasi',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(110,'Lorong Administrasi',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(111,'Pantry',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(112,'Ruang Kerja Pimpinan (Ka.BTIKK)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(113,'Ruang Kerja Staff (Desain)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(114,'Ruang Kerja Staff (KPJT. 1)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(115,'Ruang Kerja Staff (KPJT. 2)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(116,'Ruang Kerja Staff (Pengelola Keuangan)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(117,'Ruang Kerja Staff (PPT)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(118,'Ruang Kerja Staff (Sekretaris)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(119,'Ruang Kerja Sub.Kordinator TU dan Staff TU',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(120,'Ruang Rapat',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(121,'Toilet (Pria)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(122,'Toilet (Wanita)',12,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(123,'Kamar Asrama Putra 1',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(124,'Kamar Asrama Putra 2',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(125,'Kamar Asrama Putri 1',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(126,'Kamar Asrama Putri 2',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(127,'Lobby Asrama Putra',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(128,'Lobby Asrama Putri',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(129,'Toilet 1',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(130,'Toilet 2',13,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(131,'Gudang Bahan Kimia',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(132,'Lobby Gedung Laboratorium',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(133,'Ruang Kerja Staff Laboratorium',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(134,'Ruang Kontrol Rapat',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(135,'Ruang Laboratorium',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(136,'Ruang Rapat',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(137,'Toilet (Pria)',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(138,'Toilet (Wanita)',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(139,'Toilet VIP',14,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(140,'Ruang Arsip',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(141,'Ruang CWS 1',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(142,'Ruang CWS 2',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(143,'Ruang Tamu',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(144,'Tempat Ibadah (Mushola)',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(145,'Toilet (Pria)',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(146,'Toilet (Wanita)',15,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(147,'Ruang Kerja INA TWS',16,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(148,'Pembentukan dan Kriya ukir)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(149,'Area Parkir 1 (roda 2)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(150,'Area Parkir 2 (roda 4)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(151,'Area Parkir 3 (roda 4)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(152,'Gudang Bahan Baku',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(153,'Gudang Produksi',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(154,'Pencetakan',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(155,'Ruang Kerja Produksi (Kriya lukis)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(156,'Ruang Kerja Produksi (Pembakaran',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(157,'Ruang Kerja Produksi (Pengolahan bahan baku)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(158,'Ruang Kontrol Panel Listrik',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(159,'Ruang Training Center',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(160,'Toilet (Pria)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(161,'Toilet (Wanita)',17,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(162,'Halaman 1',18,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(163,'Halaman 2',18,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(164,'Rumah Dinas Pimpinan',18,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(165,'Security Functions',19,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(166,'Driving Safety',20,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(167,'Attendance',20,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(168,'Security Functions',21,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(169,'Ruang Penyimpanan',22,NULL,'2023-05-29 17:14:03',NULL,NULL,NULL),
(170,'Taman Depan',23,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(171,'Ruang Peneliti dan Ruang Laboratorium',24,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(172,'Kamar Tidur 6 Ruang',25,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(173,'Ruang Tamu',25,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(174,'Toilet Pria / Wanita',25,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(175,'Ruang Rapat',26,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(176,'Toilet Pria/ Wanita',26,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(177,'Dapur',27,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(178,'Ruang Makan',27,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(179,'Toilet Pria/ Wanita',27,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(180,'Ruang Kerja',28,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(181,'Ruang Server',28,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(182,'Ruang Mesin',29,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(183,'Security Functions',30,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(184,'Halaman',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(185,'Kolidor',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(186,'Lantai 1',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(187,'lantai 2',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(188,'Ruang kantor',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(189,'Ruangan kantor',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(190,'Ruangan perpustakaan',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(191,'Tangga',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(192,'Toilet pria',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(193,'Toilet wanita',31,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(194,'Security Functions',32,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(195,'Halaman',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(196,'Kamar 1',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(197,'Kamar 2',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(198,'Kamar 3',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(199,'Kamar 4',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(200,'Kolidor',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(201,'Pentri',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(202,'Toilet',33,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(203,'Security Functions',34,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(204,'Halaman',35,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(205,'lantai 1',35,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(206,'lantai 2',35,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(207,'Tangga',35,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(208,'Toilet',35,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(209,'Security Functions',36,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(210,'Halaman',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(211,'Kamar 1',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(212,'Kamar 2',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(213,'Kamar 3',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(214,'Kamar 4',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(215,'Kamar 5',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(216,'Koridor',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(217,'Pantry',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(218,'Ruang kantor',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(219,'Toilet',37,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(220,'Security Functions',38,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(221,'Halaman',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(222,'Kamar 1',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(223,'Kamar 2',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(224,'Kamar 3',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(225,'Kamar 4',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(226,'Kamar 5',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(227,'Kamar 6',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(228,'Kamar 7',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(229,'Kamar 8',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(230,'Kamar 9',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(231,'Kolidor',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(232,'Pantry',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(233,'Toilet',39,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(234,'Halaman',40,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(235,'Ruang',40,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(236,'Toilet',40,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(237,'Halaman',41,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(238,'Ruang Lantai',41,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(239,'Security Functions',42,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(240,'Outdor',43,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(241,'Koridor',44,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(242,'Mushola',44,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(243,'Pentri',44,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(244,'Ruang kantor',44,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(245,'Tangga',44,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(246,'Toilet',44,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(247,'Koridor',45,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(248,'Ruang kantor',45,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(249,'Ruang meeting',45,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(250,'Driving Safety',46,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(251,'Attendance',46,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(252,'Security Functions',47,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(253,'Halaman',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(254,'Koridor',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(255,'Lobby',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(256,'Pentri',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(257,'Ruang Kantor 1',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(258,'Ruang Kantor 2',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(259,'Ruang Kantor 3',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(260,'Ruang Kantor 4',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(261,'Ruang Meeting',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(262,'Toilet 1',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(263,'Toilet 2',48,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(264,'Halaman',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(265,'Pentri',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(266,'Ruang Galery',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(267,'Toilet 1',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(268,'Toilet 2',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(269,'Toilet 3',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(270,'Toilet 4',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(271,'Toilet 5',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(272,'Toilet 6',49,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(273,'Halaman',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(274,'Ruang Arsip',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(275,'Ruang Aula',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(276,'Ruang Kantor 1',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(277,'Ruang Kantor 2',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(278,'Toilet 1',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(279,'Toilet 2',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(280,'Toilet 3',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(281,'Toilet 4',50,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(282,'Halaman',51,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(283,'Koridor',51,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(284,'Pantry',51,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(285,'Ruang Kantor',51,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(286,'Area Parkir',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(287,'Halaman',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(288,'Kamar 1',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(289,'Kamar 2',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(290,'Kamar 3',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(291,'Kamar 4',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(292,'Kamar 5',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(293,'Kamar 6',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(294,'Kamar 7',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(295,'Kamar 8',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(296,'Koridor',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(297,'Lobby',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(298,'Pantry',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(299,'Ruang Meeting',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(300,'Toilet 1',52,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(301,'Halaman',53,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(302,'Ruang Kantor 1',53,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(303,'Toilet 1',53,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(304,'Halaman',54,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(305,'Ruang Sembahyang',54,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(306,'Tempat Wudlu',54,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(307,'Halaman',55,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(308,'Ruang Kantor',55,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(309,'Toilet 1',55,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(310,'Toilet 2',55,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(311,'Halaman',56,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(312,'Ruang Kantor',56,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(313,'Halaman',57,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(314,'Ruang 1',57,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(315,'Ruang 2',57,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL),
(316,'Toilet',57,NULL,'2023-05-29 17:14:04',NULL,NULL,NULL);

/*Table structure for table `sign_approval` */

DROP TABLE IF EXISTS `sign_approval`;

CREATE TABLE `sign_approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` int(11) DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `period_project` varchar(15) DEFAULT NULL,
  `sign_date_client` datetime DEFAULT current_timestamp(),
  `sign_date_pic` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sign_approval` */

insert  into `sign_approval`(`id`,`pic`,`client`,`location_id`,`period_project`,`sign_date_client`,`sign_date_pic`) values 
(1,NULL,2,5,'05-2023','2023-05-10 02:56:40',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `role` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `no_ktp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_handphone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `company_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_binary` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`email_verified_at`,`password`,`fullname`,`client_id`,`role`,`no_ktp`,`no_handphone`,`alamat`,`filename`,`is_blocked`,`company_id`,`remember_token`,`sign_binary`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'itsupport','itsupport@sos.co.id',NULL,'$2y$10$oMbfteqiYFh4KVwHakzeruVXgA7fjmss06yelT2xIqJR9zNBhSmJi','IT Support',1,'1',NULL,NULL,NULL,NULL,0,NULL,NULL,'data:image/png;base64,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','2023-03-13 14:50:46',NULL,'2023-05-22 00:40:20',NULL),
(2,'edwin_sunardi','edwin.sunardi@sos.co.id',NULL,'$2y$10$IG32VUaj24ms5OvHQXL1XuKb.jID9kyXXHhjFoZCt9eRVeWBcIHWu','Edwin Budiyanto Sunardi',2,'3',NULL,NULL,NULL,NULL,0,NULL,'RhG21KpsbUVjoYxf2cbYOTRSVB58hmczjrwkEvDkcVcZ0uuERvWOJXCjaESL','data:image/png;base64,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','2023-03-22 08:03:00',NULL,'2023-04-01 02:17:13',NULL);

/*Table structure for table `usersauthority` */

DROP TABLE IF EXISTS `usersauthority`;

CREATE TABLE `usersauthority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usersauthority` */

insert  into `usersauthority`(`id`,`user_id`,`location_id`,`created_by`,`created_at`) values 
(72,2,5,1,'0000-00-00 00:00:00'),
(73,2,8,1,'0000-00-00 00:00:00'),
(74,2,17,1,'0000-00-00 00:00:00'),
(75,2,20,1,'0000-00-00 00:00:00'),
(76,2,47,1,'0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `usersprivilege` */

insert  into `usersprivilege`(`id`,`user_id`,`menu_id`,`create`,`update`,`delete`,`created_by`,`created_at`,`updated_by`,`updated_at`) values 
(211,2,12,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(212,2,14,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(213,2,16,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(214,2,17,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(215,2,19,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(216,1,2,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(217,1,4,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(218,1,6,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(219,1,7,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(220,1,8,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(221,1,9,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(222,1,10,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(223,1,20,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(224,1,12,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(225,1,14,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(226,1,16,1,1,1,NULL,'0000-00-00 00:00:00',NULL,NULL),
(227,1,17,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL),
(228,1,19,0,0,0,NULL,'0000-00-00 00:00:00',NULL,NULL);

/* Trigger structure for table `new_project_temp` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `new_project_insert` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `new_project_insert` AFTER INSERT ON `new_project_temp` FOR EACH ROW BEGIN
	    declare get_service_code varchar(25);
	    DECLARE new_project_code VARCHAR(50);
	    DECLARE check_count_project_code VARCHAR(25);
	    DECLARE check_count_region SMALLINT(5);
	    DECLARE check_count_location SMALLINT(5);
	    DECLARE check_count_area SMALLINT(5);
	    declare check_count_sub_area smallint(5);
	    DECLARE get_project_code_in_setup_project VARCHAR(25); 
	    DECLARE get_region_id_in_setup_location INT;
	    DECLARE get_location_id_in_setup_area INT;
	    declare get_area_id_in_setup_sub_area INT;
	    SET new_project_code = new.project_code;
	    
	    SET check_count_project_code = (SELECT COUNT(*) FROM setup_project WHERE project_code = new_project_code);
	    IF(check_count_project_code = 1) THEN
		SET check_count_region = (SELECT COUNT(*) FROM setup_region WHERE project_code = new_project_code AND region_name = new.region_name);
		    IF(check_count_region = 0) THEN
			INSERT INTO setup_region(region_name,project_code) VALUES (new.region_name,new.project_code);
	            END IF;
	            
	            SET check_count_location = (SELECT COUNT(*) FROM setup_location a 
		    INNER JOIN setup_region b ON a.region_id = b.id 
		    WHERE project_code = new_project_code AND a.location_name = new.location_name and b.region_name = new.region_name);
		    SET get_region_id_in_setup_location = (SELECT DISTINCT a.id FROM setup_region a 
		    INNER JOIN new_project_temp b ON a.region_name = b.region_name AND a.project_code = b.project_code
		    WHERE b.project_code = new.project_code and a.region_name = new.region_name 
		    GROUP BY a.region_name);
	            IF(check_count_location = 0) THEN
			INSERT INTO setup_location(location_name,region_id) VALUES (new.location_name,get_region_id_in_setup_location);
		    END IF;
		     
		    SET get_location_id_in_setup_area = (SELECT DISTINCT a.id FROM setup_location a 
		    INNER JOIN setup_region b ON a.region_id = b.id
		    INNER JOIN new_project_temp c ON c.project_code = b.project_code AND c.region_name = b.region_name AND c.location_name = a.location_name 
		    WHERE a.location_name = new.location_name AND b.region_name = new.region_name AND c.project_code = new.project_code);
		    SET check_count_area = (SELECT COUNT(*) FROM setup_area a 
		    INNER JOIN setup_location b ON a.location_id = b.id 
		    INNER JOIN setup_region c ON b.region_id = c.id 
		    INNER JOIN new_project_temp d ON c.project_code = d.project_code AND a.area_name = d.area_name AND b.location_name = d.location_name AND c.region_name = d.region_name
		    WHERE a.area_name = new.area_name AND b.location_name = new.location_name AND c.region_name = new.region_name AND c.project_code = new.project_code);
		    IF(check_count_area = 0) THEN
			set get_service_code = (SELECT service_code from m_service where service_name = new.service_name);
			INSERT INTO setup_area(area_name,location_id,service_code) VALUES (new.area_name,get_location_id_in_setup_area,get_service_code);
		    END IF;
		     
		    set get_area_id_in_setup_sub_area = (SELECT DISTINCT a.id FROM setup_area a
                    INNER JOIN setup_location b ON a.location_id = b.id
                    INNER JOIN setup_region c ON b.region_id = c.id
		    INNER JOIN new_project_temp d ON d.project_code = c.project_code AND a.area_name = d.area_name AND b.location_name = d.location_name 
		    AND c.region_name = d.region_name AND c.project_code = d.project_code
		    WHERE d.project_code = new.project_code AND a.area_name = new.area_name AND b.location_name = new.location_name AND c.region_name = new.region_name);
		    set check_count_sub_area = (select count(*) from setup_sub_area a
		    inner join setup_area b on a.area_id = b.id
		    inner join setup_location c on b.location_id = c.id
		    inner join setup_region d on c.region_id = d.id
		    inner join new_project_temp e on d.project_code = e.project_code AND a.sub_area_name = e.sub_area_name and b.area_name = e.area_name and c.location_name = e.location_name and d.region_name = e.location_name
		    where d.project_code = new.project_code AND a.sub_area_name = new.sub_area_name AND b.area_name = new.area_name AND c.location_name = new.location_name AND d.region_name = new.location_name);
		    if(check_count_sub_area = 0) then
			insert into setup_sub_area(sub_area_name,area_id) values (new.sub_area_name,get_area_id_in_setup_sub_area);
	            end if;
	            
	       END IF;
	    END */$$


DELIMITER ;

/*Table structure for table `report_summary_monthly_per_location` */

DROP TABLE IF EXISTS `report_summary_monthly_per_location`;

/*!50001 DROP VIEW IF EXISTS `report_summary_monthly_per_location` */;
/*!50001 DROP TABLE IF EXISTS `report_summary_monthly_per_location` */;

/*!50001 CREATE TABLE  `report_summary_monthly_per_location`(
 `service_code` char(10) ,
 `service_name` varchar(50) ,
 `sub_area_id` int(11) ,
 `sub_area_name` varchar(50) ,
 `area_id` int(11) ,
 `area_name` varchar(50) ,
 `location_id` int(11) ,
 `location_name` varchar(50) ,
 `region_id` int(11) ,
 `region_name` varchar(50) ,
 `project_code` varchar(50) ,
 `project_name` varchar(50) ,
 `client_id` int(11) ,
 `client_name` varchar(75) ,
 `score` decimal(9,4) ,
 `MONTH` varchar(32) ,
 `YEAR` varchar(4) 
)*/;

/*Table structure for table `report_summary_per_location` */

DROP TABLE IF EXISTS `report_summary_per_location`;

/*!50001 DROP VIEW IF EXISTS `report_summary_per_location` */;
/*!50001 DROP TABLE IF EXISTS `report_summary_per_location` */;

/*!50001 CREATE TABLE  `report_summary_per_location`(
 `client_id` int(11) ,
 `client_name` varchar(75) ,
 `project_code` varchar(50) ,
 `project_name` varchar(50) ,
 `region_id` int(11) ,
 `region_name` varchar(50) ,
 `location_id` int(11) ,
 `location_name` varchar(50) ,
 `score` decimal(9,4) ,
 `service_code` char(10) ,
 `service_name` varchar(50) ,
 `month` varchar(32) ,
 `year` varchar(4) 
)*/;

/*View structure for view report_summary_monthly_per_location */

/*!50001 DROP TABLE IF EXISTS `report_summary_monthly_per_location` */;
/*!50001 DROP VIEW IF EXISTS `report_summary_monthly_per_location` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report_summary_monthly_per_location` AS select `m_service`.`service_code` AS `service_code`,`m_service`.`service_name` AS `service_name`,`setup_sub_area`.`id` AS `sub_area_id`,`setup_sub_area`.`sub_area_name` AS `sub_area_name`,`setup_area`.`id` AS `area_id`,`setup_area`.`area_name` AS `area_name`,`setup_location`.`id` AS `location_id`,`setup_location`.`location_name` AS `location_name`,`setup_region`.`id` AS `region_id`,`setup_region`.`region_name` AS `region_name`,`setup_project`.`project_code` AS `project_code`,`setup_project`.`project_name` AS `project_name`,`m_client`.`id` AS `client_id`,`m_client`.`client_name` AS `client_name`,avg(`score_evaluation`.`score`) AS `score`,date_format(`header_evaluation`.`appraisal_date`,'%b') AS `MONTH`,date_format(`header_evaluation`.`appraisal_date`,'%Y') AS `YEAR` from ((((((((`score_evaluation` join `header_evaluation` on(`header_evaluation`.`id_header` = `score_evaluation`.`id_header`)) join `setup_sub_area` on(`setup_sub_area`.`id` = `score_evaluation`.`sub_area_id`)) join `setup_area` on(`setup_area`.`id` = `setup_sub_area`.`area_id`)) join `setup_location` on(`setup_area`.`location_id` = `setup_location`.`id`)) join `setup_region` on(`setup_location`.`region_id` = `setup_region`.`id`)) join `setup_project` on(`setup_project`.`project_code` = `setup_region`.`project_code`)) join `m_service` on(`m_service`.`service_code` = `setup_area`.`service_code`)) join `m_client` on(`m_client`.`id` = `setup_project`.`client_id`)) group by `setup_sub_area`.`id`,date_format(`header_evaluation`.`appraisal_date`,'%m') */;

/*View structure for view report_summary_per_location */

/*!50001 DROP TABLE IF EXISTS `report_summary_per_location` */;
/*!50001 DROP VIEW IF EXISTS `report_summary_per_location` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report_summary_per_location` AS select `g`.`id` AS `client_id`,`g`.`client_name` AS `client_name`,`f`.`project_code` AS `project_code`,`f`.`project_name` AS `project_name`,`e`.`id` AS `region_id`,`e`.`region_name` AS `region_name`,`d`.`id` AS `location_id`,`d`.`location_name` AS `location_name`,avg(`a`.`score`) AS `score`,`h`.`service_code` AS `service_code`,`h`.`service_name` AS `service_name`,date_format(`i`.`appraisal_date`,'%b') AS `month`,date_format(`i`.`appraisal_date`,'%Y') AS `year` from ((((((((`score_evaluation` `a` join `setup_sub_area` `b` on(`a`.`sub_area_id` = `b`.`id`)) join `setup_area` `c` on(`c`.`id` = `b`.`area_id`)) join `setup_location` `d` on(`d`.`id` = `c`.`location_id`)) join `setup_region` `e` on(`e`.`id` = `d`.`region_id`)) join `setup_project` `f` on(`f`.`project_code` = `e`.`project_code`)) join `m_client` `g` on(`g`.`id` = `f`.`client_id`)) join `m_service` `h` on(`h`.`service_code` = `c`.`service_code`)) join `header_evaluation` `i` on(`i`.`id_header` = `a`.`id_header`)) group by `h`.`service_code`,`d`.`id`,date_format(`i`.`appraisal_date`,'%m') order by `d`.`id`,`h`.`service_code`,date_format(`i`.`appraisal_date`,'%m') */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
