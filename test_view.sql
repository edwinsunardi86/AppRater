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
