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
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `mst_customer` */

insert  into `mst_customer`(`id`,`code`,`name`,`alias`,`customer_type`,`email`,`tlp`,`is_active`,`last_update`,`update_by`) values 
(1,'bca.0001','bank central asia','bca',1,'bca@gmail.com','089000000',1,'2023-03-31 05:43:39',1),
(2,'bri.0002','bank rakyat indonesia','bri',1,'brg@gmail.com','089966543',1,'2023-03-31 05:43:43',1),
(3,'bni.0003','Bank Negara Indonesia','bni',1,NULL,NULL,1,'2023-03-31 05:45:12',1),
(4,'bdn.0004','Bank Danamon','bdn',1,NULL,NULL,1,'2023-03-31 05:45:35',1),
(5,'bsi.0005','bank syariah indonesia','bsi',1,NULL,NULL,1,'2023-03-31 05:45:56',1),
(6,'ezca1.0006','ezc1','ezca1',2,NULL,NULL,1,'2023-03-31 15:56:48',5);

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
(1,'bnk.0001','bank',1,'2023-03-31 05:43:55',NULL),
(2,'rtl.0002','retail',1,'2023-03-31 05:44:00',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `mst_entity` */

insert  into `mst_entity`(`id`,`code`,`name`,`alias`,`email`,`owner`,`tlp`,`is_active`,`last_update`,`update_by`) values 
(1,'gcs-0001','guna cahaya','gcs','gcs@gmail.com','hendra','081233333333',1,'2023-03-25 09:13:07',1),
(2,'ati-0002','teknik intra','ATI','ati@gmail.com','Muhdi','089976543',1,'2023-03-25 14:57:10',1),
(3,'ez2-0003','ez1','ez2','ez3@gmail.com','ez','0812345678',1,'2023-03-31 15:47:17',1);

/*Table structure for table `mst_machine` */

DROP TABLE IF EXISTS `mst_machine`;

CREATE TABLE `mst_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wsid` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_adr` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
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

insert  into `mst_machine`(`id`,`wsid`,`serial_no`,`location_name`,`location_adr`,`customer_id`,`entity_id`,`lat_long`,`type_id`,`model_id`,`vendor_id`,`qr_code`,`is_active`,`last_update`,`update_by`) values 
(1,'ws.230331.0001','76.45.33.467','alfamidi asem','P23C+GC5, Jl. Asem Jaya, RT.001/RW.006, Mustika Jaya, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17158',1,1,'-6.2962074420925, 107.02114667308534',1,1,1,'qr.230331.0001',1,'2023-03-31 05:52:20',1);

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

/*Table structure for table `mst_service_base` */

DROP TABLE IF EXISTS `mst_service_base`;

CREATE TABLE `mst_service_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `mst_service_base` */

insert  into `mst_service_base`(`id`,`code`,`city`,`region`,`is_active`,`last_update`,`update_by`) values 
(1,'ach.0001','aceh','west',1,'2023-03-29 22:52:11',1),
(2,'bks.0002','bekasi','west',1,'2023-03-31 04:13:56',1),
(3,'jkt.0003','jakarta','west',1,'2023-03-31 04:14:09',1),
(4,'dpk.0004','depok','west',1,'2023-03-31 04:14:26',1);

/*Table structure for table `trx_formulir` */

DROP TABLE IF EXISTS `trx_formulir`;

CREATE TABLE `trx_formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `form` mediumtext DEFAULT NULL,
  `active_date` date DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `entity_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `trx_formulir` */

insert  into `trx_formulir`(`id`,`code`,`judul`,`form`,`active_date`,`user_id`,`role_id`,`entity_id`,`customer_id`,`is_active`,`last_update`,`update_by`) values 
(1,'frm.230330.0001','work service','[{\"ID\":1,\"TYPE\":\"\",\"QUESTION\":\"Pertanyaan 1 ?\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\": 2,\"TYPE\": \"CHOICE\",\"QUESTION\": \"Pertanyaan 2\",\"ANSWER\": \"\",\"CHOICE\": [{\"ID_CHOICE\": 1,\"CHOICE_CONTENT\": \"ada\"},{\"ID_CHOICE\": 2,\"CHOICE_CONTENT\": \"tidak\"}]},{\"ID\":3,\"TYPE\":\"\",\"QUESTION\":\"Pertanyaan 3\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\":4,\"TYPE\":\"ANSWER\",\"QUESTION\":\"Pertanyaan 4\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\":5,\"TYPE\":\"ANSWER\",\"QUESTION\":\"Pertanyaan 5\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\":6,\"TYPE\":\"ANSWER\",\"QUESTION\":\"dsfdsfdf\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\": 7,\"TYPE\": \"CHOICE\",\"QUESTION\": \"Tesss pilihan\",\"ANSWER\": \"\",\"CHOICE\": [{\"ID_CHOICE\": 1,\"CHOICE_CONTENT\": \"Pilih 1\"},{\"ID_CHOICE\": 2,\"CHOICE_CONTENT\": \"Pilih 2\"}]}]','2023-04-01','[\"1\",\"3\",\"4\"]','[\"3\",\"4\"]','[\"1\",\"2\"]','[\"1\",\"2\"]',1,'2023-04-03 20:45:02',1),
(2,'frm.230330.0002','change struk','[{\"ID\":1,\"TYPE\":\"ANSWER\",\"QUESTION\":\"Tesss pertanyaan 1\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\": 2,\"TYPE\": \"\",\"QUESTION\": \"Tess pertanyaan 2\",\"ANSWER\": \"\",\"CHOICE\": []}]','2023-04-01','[\"2\",\"3\",\"5\"]','[\"4\",\"5\"]','[\"1\",\"2\"]','[\"3\",\"4\",\"5\"]',1,'2023-04-03 04:53:09',1),
(3,'frm.230330.0003','change software','[{\"ID\":1,\"TYPE\":\"ANSWER\",\"QUESTION\":\"Versi aptra yang terinstall\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\":2,\"TYPE\":\"ANSWER\",\"QUESTION\":\"Software distribusi\",\"ANSWER\":\"\",\"CHOICE\": []},{\"ID\": 3,\"TYPE\": \"\",\"QUESTION\": \"Kondisi AC\",\"ANSWER\": \"\",\"CHOICE\": []}]','2023-04-01','[\"1\",\"2\",\"5\"]','[\"2\",\"3\",\"4\"]','[\"1\",\"2\"]','[\"1\",\"5\"]',1,'2023-04-03 04:57:32',1),
(4,'frm.230402.0004','maintenance service','[{\"ID\": 1,\"TYPE\": \"CHOICE\",\"QUESTION\": \"choice test\",\"ANSWER\": \"\",\"CHOICE\": [{\"ID_CHOICE\": 1,\"CHOICE_CONTENT\": \"c1\"},{\"ID_CHOICE\": 2,\"CHOICE_CONTENT\": \"c2\"},{\"ID_CHOICE\": 3,\"CHOICE_CONTENT\": \"c3\"}]},{\"ID\": 2,\"TYPE\": \"ANSWER\",\"QUESTION\": \"answer test\",\"ANSWER\": \"\",\"CHOICE\": []}]','2023-04-03','[\"1\",\"2\",\"7\",\"5\",\"6\"]','[\"4\"]','[\"2\",\"3\"]','[\"4\",\"5\"]',1,'2023-04-03 22:01:55',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL,
  `id_service_base` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`code`,`username`,`pass`,`password`,`name`,`alias`,`role_id`,`email`,`tlp`,`id_service_base`,`is_active`,`last_update`,`update_by`) values 
(1,'adm-0001','kgdr','1','$2y$10$XUvLMfGJPSkg5KzRGdc/t.f/Auw2xwQEPUburLlfInct9dDFCvm7q','Kang Dru','KGDR',1,'kangdru261199@gmail.com','081211159962',2,1,'2023-03-31 04:14:42',1),
(2,'se-0002','budy','1','$2y$10$.ObA.2TrTztiO6w9ztS7.emUN.sXQoeMXb4XclVjbYue69TARoUKO','budy','budy',2,'budy@gmail.com','0877658999',3,1,'2023-03-31 04:14:45',1),
(3,'se-0003','tono','1','$2y$10$ca69a1.7kjY1FdkbPT/GlulkTh/uuxRfcg62u2n7K1e.Jm9Cg5UnK','tono suryano','tono',2,'tono@gmail.com','08997654',3,1,'2023-03-31 04:14:46',1),
(4,'mgr-0004','rizky','1','$2y$10$fGgAthSFq83.xWnKvBaGZ.vJrx7cmXERb1z8kpwjYfvtHTypqT7pm','rizky sutarmin','rizky',4,'rizky@gmail.com','087654321',3,1,'2023-03-31 04:14:47',1),
(5,'adm-0005','elan','1','$2y$10$YZxr5K5XsUl3zlbT3OT0b.HyW6N.TFv8R2mL4rZH8aUTjJFFf/BZa','elan','elan',1,'elan@gmail.com','087654321',4,1,'2023-03-31 04:14:58',1),
(6,'se-0006','eze1','ez1','$2y$10$Alf9KeuXGKR864NCtlpORe5CY4BlD8WcOE60GjHDU20y4bzTQfryK','eze1','eze1',2,'ez@gmail.com','08123456789',NULL,1,'2023-03-31 15:52:33',5),
(7,'se-0007','rama','1','$2y$10$/njCsnA2kgNkqqKXBze74.rB8b5L.so4uud34qeYb1M8Hda9Bsjci','rama','rammm',2,'rama@gmail.com','0909090',3,1,'2023-03-31 15:59:15',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
