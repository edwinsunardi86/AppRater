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

/*Table structure for table `score_evaluation` */

DROP TABLE IF EXISTS `score_evaluation`;

CREATE TABLE `score_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_area_id` int(11) NOT NULL,
  `score` smallint(6) DEFAULT NULL,
  `critic_recommend` text DEFAULT NULL,
  `id_header` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_header` (`id_header`),
  CONSTRAINT `score_evaluation_ibfk_1` FOREIGN KEY (`id_header`) REFERENCES `header_evaluation` (`id_header`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

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
		    inner join new_project_temp e on d.project_code = e.project_code AND a.sub_area_name = e.sub_area_name and b.area_name = e.area_name and c.location_name = e.location_name 
		    and d.region_name = e.region_name
		    where d.project_code = new.project_code AND a.sub_area_name = new.sub_area_name AND b.area_name = new.area_name AND c.location_name = new.location_name 
		    AND d.region_name = new.region_name);
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

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report_summary_monthly_per_location` AS select `rater_area`.`m_service`.`service_code` AS `service_code`,`rater_area`.`m_service`.`service_name` AS `service_name`,`rater_area`.`setup_sub_area`.`id` AS `sub_area_id`,`rater_area`.`setup_sub_area`.`sub_area_name` AS `sub_area_name`,`rater_area`.`setup_area`.`id` AS `area_id`,`rater_area`.`setup_area`.`area_name` AS `area_name`,`rater_area`.`setup_location`.`id` AS `location_id`,`rater_area`.`setup_location`.`location_name` AS `location_name`,`rater_area`.`setup_region`.`id` AS `region_id`,`rater_area`.`setup_region`.`region_name` AS `region_name`,`rater_area`.`setup_project`.`project_code` AS `project_code`,`rater_area`.`setup_project`.`project_name` AS `project_name`,`rater_area`.`m_client`.`id` AS `client_id`,`rater_area`.`m_client`.`client_name` AS `client_name`,avg(`rater_area`.`score_evaluation`.`score`) AS `score`,date_format(`rater_area`.`header_evaluation`.`appraisal_date`,'%b') AS `MONTH`,date_format(`rater_area`.`header_evaluation`.`appraisal_date`,'%Y') AS `YEAR`,`rater_area`.`detail_set_score_per_project`.`initial` AS `initial` from ((((((((((`rater_area`.`score_evaluation` join `rater_area`.`header_evaluation` on(`rater_area`.`header_evaluation`.`id_header` = `rater_area`.`score_evaluation`.`id_header`)) join `rater_area`.`setup_sub_area` on(`rater_area`.`setup_sub_area`.`id` = `rater_area`.`score_evaluation`.`sub_area_id`)) join `rater_area`.`setup_area` on(`rater_area`.`setup_area`.`id` = `rater_area`.`setup_sub_area`.`area_id`)) join `rater_area`.`setup_location` on(`rater_area`.`setup_area`.`location_id` = `rater_area`.`setup_location`.`id`)) join `rater_area`.`setup_region` on(`rater_area`.`setup_location`.`region_id` = `rater_area`.`setup_region`.`id`)) join `rater_area`.`setup_project` on(`rater_area`.`setup_project`.`project_code` = `rater_area`.`setup_region`.`project_code`)) join `rater_area`.`m_service` on(`rater_area`.`m_service`.`service_code` = `rater_area`.`setup_area`.`service_code`)) join `rater_area`.`m_client` on(`rater_area`.`m_client`.`id` = `rater_area`.`setup_project`.`client_id`)) join (select `rater_area`.`header_set_score`.`id_header` AS `id_header`,`rater_area`.`header_set_score`.`project_code` AS `project_code`,`rater_area`.`header_set_score`.`period_date` AS `period_date`,`rater_area`.`header_set_score`.`is_current_active` AS `is_current_active`,`rater_area`.`header_set_score`.`created_by` AS `created_by`,`rater_area`.`header_set_score`.`created_at` AS `created_at` from `rater_area`.`header_set_score` where `rater_area`.`header_set_score`.`period_date` in (select max(`rater_area`.`header_set_score`.`period_date`) from `rater_area`.`header_set_score` group by `rater_area`.`header_set_score`.`project_code`,date_format(`rater_area`.`header_set_score`.`period_date`,'%m'))) `a` on(`a`.`project_code` = `rater_area`.`setup_project`.`project_code`)) join `rater_area`.`detail_set_score_per_project` on(`rater_area`.`detail_set_score_per_project`.`id_header` = `a`.`id_header` and `rater_area`.`detail_set_score_per_project`.`score` = `rater_area`.`score_evaluation`.`score`)) group by `rater_area`.`setup_sub_area`.`id`,date_format(`rater_area`.`header_evaluation`.`appraisal_date`,'%m') */;

/*View structure for view report_summary_per_location */

/*!50001 DROP TABLE IF EXISTS `report_summary_per_location` */;
/*!50001 DROP VIEW IF EXISTS `report_summary_per_location` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `report_summary_per_location` AS select `g`.`id` AS `client_id`,`g`.`client_name` AS `client_name`,`f`.`project_code` AS `project_code`,`f`.`project_name` AS `project_name`,`e`.`id` AS `region_id`,`e`.`region_name` AS `region_name`,`d`.`id` AS `location_id`,`d`.`location_name` AS `location_name`,avg(`a`.`score`) AS `score`,`h`.`service_code` AS `service_code`,`h`.`service_name` AS `service_name`,date_format(`i`.`appraisal_date`,'%b') AS `month`,date_format(`i`.`appraisal_date`,'%Y') AS `year` from ((((((((`score_evaluation` `a` join `setup_sub_area` `b` on(`a`.`sub_area_id` = `b`.`id`)) join `setup_area` `c` on(`c`.`id` = `b`.`area_id`)) join `setup_location` `d` on(`d`.`id` = `c`.`location_id`)) join `setup_region` `e` on(`e`.`id` = `d`.`region_id`)) join `setup_project` `f` on(`f`.`project_code` = `e`.`project_code`)) join `m_client` `g` on(`g`.`id` = `f`.`client_id`)) join `m_service` `h` on(`h`.`service_code` = `c`.`service_code`)) join `header_evaluation` `i` on(`i`.`id_header` = `a`.`id_header`)) group by `h`.`service_code`,`d`.`id`,date_format(`i`.`appraisal_date`,'%m') order by `d`.`id`,`h`.`service_code`,date_format(`i`.`appraisal_date`,'%m') */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
