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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rater_area` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;

USE `rater_area`;

/*Table structure for table `header_management_fee` */

DROP TABLE IF EXISTS `header_management_fee`;

CREATE TABLE `header_management_fee` (
  `id_header` int(11) NOT NULL,
  `id_header_pinalty` int(11) DEFAULT NULL,
  `id_header_template` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  PRIMARY KEY (`id_header`),
  KEY `id_header_pinalty` (`id_header_pinalty`),
  KEY `id_header_template` (`id_header_template`),
  CONSTRAINT `header_management_fee_ibfk_1` FOREIGN KEY (`id_header_pinalty`) REFERENCES `header_pinalty` (`id_header`),
  CONSTRAINT `header_management_fee_ibfk_2` FOREIGN KEY (`id_header_template`) REFERENCES `header_template` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `header_management_fee` */

insert  into `header_management_fee`(`id_header`,`id_header_pinalty`,`id_header_template`,`start_date`,`finish_date`) values 
(51,2,3,'2023-01-01','2023-12-31'),
(52,2,1,'2023-01-01','2023-12-31'),
(53,2,2,'2023-01-01','2023-12-31'),
(54,2,51,'2023-01-01','2023-12-31'),
(55,2,5,'2023-01-01','2023-12-31'),
(56,2,6,'2023-01-01','2023-12-31'),
(57,2,7,'2023-01-01','2023-12-31'),
(58,2,8,'2023-01-01','2023-12-31'),
(59,2,13,'2023-01-01','2023-12-31'),
(60,2,12,'2023-01-01','2023-12-31'),
(61,2,15,'2023-01-01','2023-12-31'),
(62,2,10,'2023-01-01','2023-12-31'),
(63,2,14,'2023-01-01','2023-12-31'),
(64,2,21,'2023-01-01','2023-12-31'),
(65,2,22,'2023-01-01','2023-05-31'),
(66,2,16,'2023-01-01','2023-05-31'),
(67,2,17,'2023-01-01','2023-05-31'),
(68,2,19,'2023-01-01','2023-05-31'),
(69,2,20,'2023-01-01','2023-05-31'),
(70,2,4,'2023-01-01','2023-12-31'),
(71,2,23,'2023-01-01','2023-12-31'),
(72,2,48,'2023-01-01','2023-12-31'),
(73,2,49,'2023-01-01','2023-12-31'),
(74,2,45,'2023-01-01','2023-12-31'),
(75,2,25,'2023-01-01','2023-12-31'),
(76,2,26,'2023-01-01','2023-12-31'),
(77,2,42,'2023-01-01','2023-12-31'),
(78,2,43,'2023-01-01','2023-12-31'),
(79,2,29,'2023-01-01','2023-12-31'),
(80,2,44,'2023-01-01','2023-12-31'),
(81,2,50,'2023-01-01','2023-12-31'),
(82,2,32,'2023-01-01','2023-05-31'),
(83,2,30,'2023-01-01','2023-12-31'),
(84,2,47,'2023-01-01','2023-12-31'),
(85,2,37,'2023-01-01','2023-12-31'),
(86,2,33,'2023-01-01','2023-12-31'),
(87,2,35,'2023-01-01','2023-12-31'),
(88,2,38,'2023-01-01','2023-12-31'),
(89,2,36,'2023-01-01','2023-12-31'),
(90,2,27,'2023-01-01','2023-12-31'),
(91,2,34,'2023-01-01','2023-12-31'),
(92,2,41,'2023-01-01','2023-12-31'),
(93,2,46,'2023-01-01','2023-12-31'),
(94,2,31,'2023-01-01','2023-12-31'),
(95,2,11,'2023-01-01','2023-12-31'),
(96,2,28,'2023-01-01','2023-12-31'),
(97,2,39,'2023-01-01','2023-12-31'),
(98,2,40,'2023-01-01','2023-12-31'),
(99,2,18,'2023-01-01','2023-12-31'),
(100,2,54,'2023-06-01','2023-12-31'),
(101,2,55,'2023-06-01','2023-12-31'),
(102,2,53,'2023-06-01','2023-12-31'),
(103,2,52,'2023-06-01','2023-12-31'),
(104,2,57,'2023-07-01','2023-12-31');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
