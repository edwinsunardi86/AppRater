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

/*Table structure for table `detail_pinalty` */

DROP TABLE IF EXISTS `detail_pinalty`;

CREATE TABLE `detail_pinalty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `percent_pinalty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_header` (`id_header`),
  CONSTRAINT `detail_pinalty_ibfk_1` FOREIGN KEY (`id_header`) REFERENCES `header_pinalty` (`id_header`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_pinalty` */

insert  into `detail_pinalty`(`id`,`id_header`,`score`,`percent_pinalty`) values 
(45,1,95,12),
(46,1,89,36),
(47,1,74,21),
(48,1,74,67);

/*Table structure for table `header_pinalty` */

DROP TABLE IF EXISTS `header_pinalty`;

CREATE TABLE `header_pinalty` (
  `id_header` int(11) NOT NULL,
  `id_header_set_score` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `header_pinalty` */

insert  into `header_pinalty`(`id_header`,`id_header_set_score`,`start_date`,`finish_date`,`description`) values 
(1,1,'2023-07-01','2023-07-31',NULL);

/*Table structure for table `management_fee` */

DROP TABLE IF EXISTS `management_fee`;

CREATE TABLE `management_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_header_pinalty` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `management_fee` */

insert  into `management_fee`(`id`,`id_header_pinalty`,`location_id`,`fee`,`start_date`,`finish_date`) values 
(1,1,1,15000,'2023-08-01','2023-08-31');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
