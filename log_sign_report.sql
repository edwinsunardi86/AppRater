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

/*Table structure for table `log_sign_report` */

DROP TABLE IF EXISTS `log_sign_report`;

CREATE TABLE `log_sign_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) DEFAULT NULL,
  `period` char(15) DEFAULT NULL,
  `service_code` char(10) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `log_sign_report` */

insert  into `log_sign_report`(`id`,`location_id`,`period`,`service_code`,`filename`,`created_by`,`created_at`) values 
(1,6,'04-2023','cls','ReportScoreMonthly04-2023_KPP DAGO POJOK Bandung.pdf',1,'2023-07-18 13:11:24'),
(2,28,'05-2023','cls','ReportScoreMonthly05-2023_KKB Rajabasa Bandar Lampung.pdf',40,'2023-07-18 14:50:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
