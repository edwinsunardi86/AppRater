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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rater_area` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;

USE `rater_area`;

/*Table structure for table `detail_management_fee` */

DROP TABLE IF EXISTS `detail_management_fee`;

CREATE TABLE `detail_management_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` int(11) DEFAULT NULL,
  `service_code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_header` (`id_header`),
  CONSTRAINT `detail_management_fee_ibfk_1` FOREIGN KEY (`id_header`) REFERENCES `header_management_fee` (`id_header`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `detail_management_fee` */

insert  into `detail_management_fee`(`id`,`id_header`,`service_code`,`amount`) values 
(1,1,'cls',651425.655),
(2,1,'las',513054.7553),
(3,1,'ses',517554.7553),
(4,2,'cls',958729.9724),
(5,2,'ses',1566164.266),
(6,3,'las',163208.2051),
(7,4,'cls',432035.7444),
(8,4,'ses',1163498.037),
(9,5,'cls',216017.8722),
(10,5,'ses',698098.8219),
(11,6,'cls',216017.8722),
(12,6,'ses',698098.8219),
(13,7,'cls',660325.9566),
(14,7,'ses',944298.4292),
(15,8,'cls',432035.7444),
(16,8,'las',2543195.527),
(17,8,'ses',698098.8219),
(18,9,'las',205656.8499),
(19,10,'cls',1123548.98),
(20,10,'ses',1411606.683),
(21,11,'cls',186351.0003),
(22,12,'cls',588934.5603),
(23,12,'las',126064.9757),
(24,12,'ses',778889.8543),
(25,13,'cls',632499.1983),
(26,13,'las',132763.2798),
(27,13,'ses',1221869.518),
(28,14,'cls',107565.8329),
(29,14,'ses',349876.6911),
(30,15,'cls',668327.9454),
(31,15,'las',128729.9411),
(32,15,'ses',711163.1904),
(33,16,'cls',242525.6234),
(34,16,'ses',410987.8848),
(35,17,'cls',115227.6265),
(36,17,'las',135658.4104),
(37,17,'ses',477399.7695),
(38,18,'cls',477399.7695),
(39,18,'las',127737.8558),
(40,18,'ses',788927.1347),
(41,19,'cls',609396.3742),
(42,19,'las',130444.9497),
(43,19,'ses',805169.6984),
(44,20,'cls',115107.6127),
(45,20,'ses',374092.1683),
(46,21,'cls',240366.4247),
(47,21,'ses',776278.1571),
(48,22,'cls',1216864.724),
(49,22,'las',284285.1768),
(50,22,'ses',2607002.262),
(51,23,'cls',570729.2803),
(52,23,'las',407226.7543),
(53,23,'ses',1244180.263),
(54,24,'cls',1160254.129),
(55,24,'las',413932.2615),
(56,24,'ses',1472762.915),
(57,25,'cls',147103.8974),
(58,25,'ses',158419.9267),
(59,26,'cls',504229.5784),
(60,26,'las',359777.8872),
(61,26,'ses',920444.7181),
(62,27,'cls',1333192.103),
(63,27,'las',471251.4269),
(64,27,'ses',1757921.553),
(65,28,'cls',618637.3475),
(66,28,'las',441410.1183),
(67,28,'ses',1124525.296),
(68,29,'cls',448207.2),
(69,29,'las',319804.8),
(70,29,'ses',820512),
(71,30,'cls',941550.199),
(72,30,'las',403088.9371),
(73,30,'ses',1434811.28),
(74,31,'cls',743810.52),
(75,31,'las',398042.76),
(76,31,'ses',1417149.66),
(77,32,'cls',159509.1522),
(78,32,'ses',516658.3554),
(79,33,'cls',218276.8536),
(80,33,'ses',705352.0496),
(81,34,'cls',1046200.551),
(82,34,'ses',2532886.922),
(83,35,'cls',261550.1377),
(85,36,'cls',4732447.158),
(86,36,'ses',6205001.364),
(87,37,'cls',15732930.82),
(88,37,'las',38462641.41),
(89,37,'ses',14489579.89),
(90,38,'cls',523100.2754),
(91,38,'ses',844295.6406),
(92,39,'cls',2028455.039),
(93,39,'las',1616186.058),
(94,39,'ses',2425036.802),
(95,40,'cls',1700598.737),
(96,40,'las',9034909.456),
(97,40,'ses',2350262.531),
(98,41,'ses',601564.14),
(99,42,'cls',583469.73),
(100,42,'las',124895.196),
(101,42,'ses',1390347.156),
(111,43,'cls',4197074.543),
(112,43,'las',0),
(113,43,'ses',3109250.682),
(114,44,'cls',523100.2754),
(115,44,'las',0),
(116,44,'ses',844295.6406),
(117,45,'cls',261550.1377),
(118,45,'las',923775.2389),
(119,46,'cls',319224.8372),
(120,46,'ses',516989.936),
(121,47,'cls',8570403.846),
(122,47,'las',6862001.384),
(123,47,'ses',11873647.67),
(124,48,'cls',3169404.532),
(125,48,'ses',3934864.555),
(126,49,'cls',186351.0003),
(127,49,'ses',803790.991),
(128,50,'cls',261550.1377),
(129,50,'ses',562863.7604);

/*Table structure for table `header_management_fee` */

DROP TABLE IF EXISTS `header_management_fee`;

CREATE TABLE `header_management_fee` (
  `id_header` int(11) NOT NULL,
  `id_header_pinalty` int(11) DEFAULT NULL,
  `id_header_template` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `header_management_fee` */

insert  into `header_management_fee`(`id_header`,`id_header_pinalty`,`id_header_template`,`start_date`,`finish_date`) values 
(1,1,1,'2023-01-01','2023-12-31'),
(2,1,2,'2023-01-01','2023-12-31'),
(3,1,3,'2023-01-01','2023-12-31'),
(4,1,5,'2023-01-01','2023-12-31'),
(5,1,6,'2023-01-01','2023-12-31'),
(6,1,7,'2023-01-01','2023-12-31'),
(7,1,8,'2023-01-01','2023-12-31'),
(8,1,51,'2023-01-01','2023-12-31'),
(9,1,12,'2023-01-01','2023-12-31'),
(10,1,13,'2023-01-01','2023-12-31'),
(11,1,10,'2023-01-01','2023-12-31'),
(12,1,21,'2023-01-01','2023-12-31'),
(13,1,14,'2023-01-01','2023-12-31'),
(14,1,15,'2023-01-01','2023-12-31'),
(15,1,16,'2023-01-01','2023-12-31'),
(16,1,17,'2023-01-01','2023-12-31'),
(17,1,18,'2023-01-01','2023-12-31'),
(18,1,19,'2023-01-01','2023-12-31'),
(19,1,20,'2023-01-01','2023-12-31'),
(20,1,22,'2023-01-01','2023-12-31'),
(21,1,23,'2023-01-01','2023-12-31'),
(22,1,24,'2023-01-01','2023-12-31'),
(23,1,48,'2023-01-01','2023-12-31'),
(24,1,49,'2023-01-01','2023-12-31'),
(25,1,4,'2023-01-01','2023-12-31'),
(26,1,25,'2023-01-01','2023-12-31'),
(27,1,26,'2023-01-01','2023-12-31'),
(28,1,43,'2023-01-01','2023-12-31'),
(29,1,42,'2023-01-01','2023-12-31'),
(30,1,45,'2023-08-01','2023-12-31'),
(31,1,44,'2023-08-01','2023-12-31'),
(32,1,50,'2023-01-01','2023-12-31'),
(33,1,29,'2023-01-01','2023-12-31'),
(34,1,30,'2023-01-01','2023-12-31'),
(35,1,47,'2023-01-01','2023-12-31'),
(36,1,32,'2023-01-01','2023-12-31'),
(37,1,35,'2023-01-01','2023-12-31'),
(38,1,33,'2023-01-01','2023-12-31'),
(39,1,38,'2023-01-01','2023-12-31'),
(40,1,37,'2023-01-01','2023-12-31'),
(41,1,46,'2023-01-01','2023-12-31'),
(42,1,27,'2023-01-01','2023-12-31'),
(43,1,34,'2023-01-01','2023-12-31'),
(44,1,41,'2023-01-01','2023-12-31'),
(45,1,36,'2023-01-01','2023-12-31'),
(46,1,28,'2023-01-01','2023-12-31'),
(47,1,40,'2023-01-01','2023-12-31'),
(48,1,39,'2023-01-01','2023-12-31'),
(49,1,11,'2023-01-01','2023-12-31'),
(50,1,31,'2023-01-01','2023-12-31');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
