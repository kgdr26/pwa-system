/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.5.16-MariaDB : Database - db_pwa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pwa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_pwa`;

/*Table structure for table `mst_customer` */

DROP TABLE IF EXISTS `mst_customer`;

CREATE TABLE `mst_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `customer_type` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_customer` */

insert  into `mst_customer`(`id`,`code`,`name`,`alias`,`customer_type`,`email`,`tlp`,`entity_id`,`is_active`,`last_update`,`update_by`) values 
(1,'bca-0001','bank central asia','bca',1,'bca@gmail.com','089000000',1,1,'2023-03-25 09:49:57',1),
(2,'bri-0002','bank rakyat indonesia','bri',1,'brg@gmail.com','089966543',1,1,'2023-03-25 09:26:53',1);

/*Table structure for table `mst_customer_type` */

DROP TABLE IF EXISTS `mst_customer_type`;

CREATE TABLE `mst_customer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_customer_type` */

insert  into `mst_customer_type`(`id`,`code`,`name`,`is_active`,`last_update`,`update_by`) values 
(1,'bnk-0001','bank',1,'2023-03-25 09:59:50',NULL),
(2,'rtl-0002','retail',1,'2023-03-25 10:01:53',1);

/*Table structure for table `mst_entity` */

DROP TABLE IF EXISTS `mst_entity`;

CREATE TABLE `mst_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_entity` */

insert  into `mst_entity`(`id`,`code`,`name`,`alias`,`email`,`owner`,`tlp`,`is_active`,`last_update`,`update_by`) values 
(1,'gcs-0001','guna cahaya','gcs','gcs@gmail.com','hendra','081233333333',1,'2023-03-25 09:13:07',1),
(2,'ati-0002','teknik intra','ATI','ati@gmail.com','Muhdi','089976543',1,'2023-03-25 14:57:10',1);

/*Table structure for table `mst_machine` */

DROP TABLE IF EXISTS `mst_machine`;

CREATE TABLE `mst_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ws_id` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_adr` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `lat_long` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `mst_machine` */

insert  into `mst_machine`(`id`,`ws_id`,`serial_no`,`location_name`,`location_adr`,`customer_id`,`lat_long`,`type_id`,`model_id`,`vendor_id`,`qr_code`,`is_active`,`last_update`,`update_by`) values 
(1,'WS.0001.2303','0101213026','alfamidi mustika jaya','P22J+X67, RT.001/RW.020, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158',1,'-6.297495775845039, 107.03055037875446',1,2,2,'MCH.0001.2303.01.02.02.01',1,'2023-03-25 13:50:41',1);

/*Table structure for table `mst_machine_model` */

DROP TABLE IF EXISTS `mst_machine_model`;

CREATE TABLE `mst_machine_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_machine_model` */

insert  into `mst_machine_model`(`id`,`code`,`name`,`is_active`,`last_update`,`update_by`) values 
(1,'rg770001','oki rg77',1,'2023-03-25 10:22:14',1),
(2,'ss22e0002','ncr ss22e',1,'2023-03-25 10:25:19',1);

/*Table structure for table `mst_machine_type` */

DROP TABLE IF EXISTS `mst_machine_type`;

CREATE TABLE `mst_machine_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_machine_type` */

insert  into `mst_machine_type`(`id`,`code`,`name`,`is_active`,`last_update`,`update_by`) values 
(1,'crm0001','deposit machine',1,'2023-03-25 10:21:02',1),
(2,'atm0002','dispense machine',1,'2023-03-25 10:21:20',1);

/*Table structure for table `mst_machine_vendor` */

DROP TABLE IF EXISTS `mst_machine_vendor`;

CREATE TABLE `mst_machine_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_machine_vendor` */

insert  into `mst_machine_vendor`(`id`,`code`,`name`,`is_active`,`last_update`,`update_by`) values 
(1,'oki0001','oki',1,'2023-03-25 10:21:55',1),
(2,'ncr0002','ncr',1,'2023-03-25 10:25:45',1);

/*Table structure for table `mst_project` */

DROP TABLE IF EXISTS `mst_project`;

CREATE TABLE `mst_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `mst_project` */

insert  into `mst_project`(`id`,`code`,`name`,`customer_id`,`is_active`,`last_update`,`update_by`) values 
(1,'bca.cl.0001','check list',1,1,'2023-03-25 15:54:38',1),
(2,'bri.cl.0002','check list',2,1,'2023-03-25 15:55:08',1);

/*Table structure for table `mst_role` */

DROP TABLE IF EXISTS `mst_role`;

CREATE TABLE `mst_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `mst_role` */

insert  into `mst_role`(`id`,`code`,`name`,`is_active`,`last_update`,`update_by`) values 
(1,'adm','ADMIN',1,'2023-03-14 22:34:00',1),
(2,'se','SERVICE ENGINEERING',1,'2023-03-14 22:49:11',1),
(3,'spv','SUPERVISOR',1,'2023-03-14 22:49:49',1),
(4,'mgr','MANAGER',1,'2023-03-14 22:50:11',1),
(5,'log','LOGISTIC STAF',1,'2023-03-14 22:50:35',1);

/*Table structure for table `trx_formulir` */

DROP TABLE IF EXISTS `trx_formulir`;

CREATE TABLE `trx_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `form` mediumtext DEFAULT NULL,
  `date_start_active` date DEFAULT NULL,
  `date_end_active` date DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `trx_formulir` */

insert  into `trx_formulir`(`id`,`code`,`judul`,`project_id`,`form`,`date_start_active`,`date_end_active`,`is_active`,`last_update`,`update_by`) values 
(1,'frm.cl.0001.230326','service report',1,NULL,'2023-03-27','2023-03-31',1,'2023-03-26 12:13:19',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`code`,`username`,`password`,`pass`,`name`,`alias`,`role_id`,`email`,`tlp`,`is_active`,`last_update`,`update_by`) values 
(1,'adm-0001','kgdr','1','$2y$10$XUvLMfGJPSkg5KzRGdc/t.f/Auw2xwQEPUburLlfInct9dDFCvm7q','Kang Dru','KGDR',1,'kangdru261199@gmail.com','081211159962',1,'2023-03-25 05:17:21',1),
(2,'se-0002','budy','1','$2y$10$.ObA.2TrTztiO6w9ztS7.emUN.sXQoeMXb4XclVjbYue69TARoUKO','budy','budy',2,'budy@gmail.com','0877658999',1,'2023-03-25 14:08:22',1),
(3,'se-0003','tono','1','$2y$10$ca69a1.7kjY1FdkbPT/GlulkTh/uuxRfcg62u2n7K1e.Jm9Cg5UnK','tono suryano','tono',2,'tono@gmail.com','08997654',1,'2023-03-25 14:16:46',1),
(4,'mgr-0004','rizky','1','$2y$10$fGgAthSFq83.xWnKvBaGZ.vJrx7cmXERb1z8kpwjYfvtHTypqT7pm','rizky sutarmin','rizky',4,'rizky@gmail.com','087654321',1,'2023-03-25 14:17:42',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
