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
 `sub_area_name` varchar(100) ,
 `area_id` int(11) ,
 `area_name` varchar(100) ,
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
 `YEAR` varchar(4) ,
 `initial` char(25) 
)*/;

/*View structure for view report_summary_monthly_per_location */

/*!50001 DROP TABLE IF EXISTS `report_summary_monthly_per_location` */;
/*!50001 DROP VIEW IF EXISTS `report_summary_monthly_per_location` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report_summary_monthly_per_location` AS select `rater_area`.`m_service`.`service_code` AS `service_code`,`rater_area`.`m_service`.`service_name` AS `service_name`,`rater_area`.`setup_sub_area`.`id` AS `sub_area_id`,`rater_area`.`setup_sub_area`.`sub_area_name` AS `sub_area_name`,`rater_area`.`setup_area`.`id` AS `area_id`,`rater_area`.`setup_area`.`area_name` AS `area_name`,`rater_area`.`setup_location`.`id` AS `location_id`,`rater_area`.`setup_location`.`location_name` AS `location_name`,`rater_area`.`setup_region`.`id` AS `region_id`,`rater_area`.`setup_region`.`region_name` AS `region_name`,`rater_area`.`setup_project`.`project_code` AS `project_code`,`rater_area`.`setup_project`.`project_name` AS `project_name`,`rater_area`.`m_client`.`id` AS `client_id`,`rater_area`.`m_client`.`client_name` AS `client_name`,avg(`rater_area`.`score_evaluation`.`score`) AS `score`,date_format(`rater_area`.`header_evaluation`.`appraisal_date`,'%b') AS `MONTH`,date_format(`rater_area`.`header_evaluation`.`appraisal_date`,'%Y') AS `YEAR`,`rater_area`.`detail_set_score_per_project`.`initial` AS `initial` from ((((((((((`rater_area`.`score_evaluation` join `rater_area`.`header_evaluation` on(`rater_area`.`header_evaluation`.`id_header` = `rater_area`.`score_evaluation`.`id_header`)) join `rater_area`.`setup_sub_area` on(`rater_area`.`setup_sub_area`.`id` = `rater_area`.`score_evaluation`.`sub_area_id`)) join `rater_area`.`setup_area` on(`rater_area`.`setup_area`.`id` = `rater_area`.`setup_sub_area`.`area_id`)) join `rater_area`.`setup_location` on(`rater_area`.`setup_area`.`location_id` = `rater_area`.`setup_location`.`id`)) join `rater_area`.`setup_region` on(`rater_area`.`setup_location`.`region_id` = `rater_area`.`setup_region`.`id`)) join `rater_area`.`setup_project` on(`rater_area`.`setup_project`.`project_code` = `rater_area`.`setup_region`.`project_code`)) join `rater_area`.`m_service` on(`rater_area`.`m_service`.`service_code` = `rater_area`.`setup_area`.`service_code`)) join `rater_area`.`m_client` on(`rater_area`.`m_client`.`id` = `rater_area`.`setup_project`.`client_id`)) join (select `rater_area`.`header_set_score`.`id_header` AS `id_header`,`rater_area`.`header_set_score`.`project_code` AS `project_code`,`rater_area`.`header_set_score`.`period_date` AS `period_date`,`rater_area`.`header_set_score`.`is_current_active` AS `is_current_active`,`rater_area`.`header_set_score`.`created_by` AS `created_by`,`rater_area`.`header_set_score`.`created_at` AS `created_at` from `rater_area`.`header_set_score` where `rater_area`.`header_set_score`.`period_date` in (select max(`rater_area`.`header_set_score`.`period_date`) from `rater_area`.`header_set_score` group by `rater_area`.`header_set_score`.`project_code`,date_format(`rater_area`.`header_set_score`.`period_date`,'%m'))) `a` on(`a`.`project_code` = `rater_area`.`setup_project`.`project_code`)) join `rater_area`.`detail_set_score_per_project` on(`rater_area`.`detail_set_score_per_project`.`id_header` = `a`.`id_header` and `rater_area`.`detail_set_score_per_project`.`score` = `rater_area`.`score_evaluation`.`score`)) group by `rater_area`.`setup_sub_area`.`id`,date_format(`rater_area`.`header_evaluation`.`appraisal_date`,'%m') */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
