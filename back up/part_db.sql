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

/*Table structure for table `evaluation_critic_recommend` */

DROP TABLE IF EXISTS `evaluation_critic_recommend`;

CREATE TABLE `evaluation_critic_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `critic_recommend` text DEFAULT NULL,
  `id_header` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_header` (`id_header`),
  CONSTRAINT `evaluation_critic_recommend_ibfk_1` FOREIGN KEY (`id_header`) REFERENCES `header_evaluation` (`id_header`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation_critic_recommend` */

insert  into `evaluation_critic_recommend`(`id`,`critic_recommend`,`id_header`) values 
(1,'rewerewr',1),
(2,'rgrgerfeqfqfdqdsaasdsad',2),
(3,'dqwdwdwqddqw',3),
(4,'dasdsafdssdf',4);

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
(4,8,'2023-05-21',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

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
(40,133,95,'2023-05-22 11:01:51',1,4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
