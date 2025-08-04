/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.17 : Database - dms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dms`;

/*Table structure for table `audittrails` */

DROP TABLE IF EXISTS `audittrails`;

CREATE TABLE `audittrails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auditID` varchar(30) NOT NULL,
  `action_type` enum('INSERT','UPDATE','DELETE') NOT NULL,
  `table_name` varchar(25) NOT NULL,
  `record_id` varchar(25) NOT NULL,
  `old_data` text,
  `new_data` text,
  `changed_byID` varchar(30) NOT NULL,
  `changed_byName` varchar(30) NOT NULL,
  `change_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `audittrails` */

insert  into `audittrails`(`id`,`auditID`,`action_type`,`table_name`,`record_id`,`old_data`,`new_data`,`changed_byID`,`changed_byName`,`change_timestamp`) values (41,'GCF-AUDIT-0000041','UPDATE','members','GCF-M-0000035','{\"middlename\":\"Nyek\",\"nickname\":\"Hanz\",\"baptizeddate\":\"2000-05-05\",\"recForMembership\":\"Yes\"}','{\"middlename\":\"Fidel\",\"nickname\":\"Hans\",\"baptizeddate\":\"\",\"recForMembership\":\"No\"}','GCF-U-0000002','Kevin Macandog','2025-07-24 16:50:53'),(42,'GCF-AUDIT-0000042','UPDATE','members','GCF-M-0000033','{\"firstname\":\"Mir\",\"baptizeddate\":\"2018-02-05\"}','{\"firstname\":\"Mirah\",\"baptizeddate\":\"\"}','GCF-U-0000002','Kevin Macandog','2025-07-24 18:04:34');

/*Table structure for table `churches` */

DROP TABLE IF EXISTS `churches`;

CREATE TABLE `churches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `churchname` varchar(100) NOT NULL DEFAULT '',
  `shortname` varchar(10) NOT NULL DEFAULT '',
  `churchlogo` varchar(50) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `churches` */

insert  into `churches`(`id`,`churchid`,`churchname`,`shortname`,`churchlogo`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-CHURCH-0000001','Greenhills Christian Fellowship','GCF','','2024-12-19 11:12:26','',NULL,'');

/*Table structure for table `clustermembers` */

DROP TABLE IF EXISTS `clustermembers`;

CREATE TABLE `clustermembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clusterMID` varchar(30) DEFAULT '',
  `clusterID` varchar(30) DEFAULT '',
  `memberID` varchar(30) DEFAULT '',
  `clusterMType` varchar(15) DEFAULT '' COMMENT 'Assistant, Member = Empty',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `clustermembers` */

insert  into `clustermembers`(`id`,`clusterMID`,`clusterID`,`memberID`,`clusterMType`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-CM-0000001','GCF-CLUSTER-0000001','GCF-M-0000012','','2025-02-10 12:13:19','',NULL,''),(2,'GCF-CM-0000002','GCF-CLUSTER-0000001','GCF-M-0000011','','2025-02-10 12:18:16','',NULL,''),(3,'GCF-CM-0000003','GCF-CLUSTER-0000001','GCF-M-0000010','','2025-02-10 12:18:29','',NULL,''),(4,'GCF-CM-0000004','GCF-CLUSTER-0000001','GCF-M-0000001','','2025-02-10 12:18:55','',NULL,''),(5,'GCF-CM-0000005','GCF-CLUSTER-0000001','GCF-M-0000009','','2025-02-10 12:20:05','',NULL,''),(6,'GCF-CM-0000006','GCF-CLUSTER-0000001','GCF-M-0000005','','2025-02-10 12:36:08','',NULL,''),(7,'GCF-CM-0000007','GCF-CLUSTER-0000001','GCF-M-0000004','','2025-02-10 12:38:32','',NULL,''),(8,'GCF-CM-0000008','GCF-GG-0000001','GCF-M-0000006','','2025-02-10 12:39:07','',NULL,'');

/*Table structure for table `clusters` */

DROP TABLE IF EXISTS `clusters`;

CREATE TABLE `clusters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clusterid` varchar(30) NOT NULL DEFAULT '',
  `clustername` varchar(60) NOT NULL DEFAULT '',
  `clusterleaderid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satelliteid` varchar(300) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `clusters` */

insert  into `clusters`(`id`,`clusterid`,`clustername`,`clusterleaderid`,`churchid`,`satelliteid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-CLUSTER-0000001','Muntinlupa Cluster','GCF-M-0000007','','','2025-01-15 13:17:07','',NULL,''),(2,'GCF-CLUSTER-0000002','Taguig Cluster','GCF-M-0000022','','','2025-01-15 13:17:42','',NULL,'');

/*Table structure for table `deacons` */

DROP TABLE IF EXISTS `deacons`;

CREATE TABLE `deacons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deaconid` varchar(30) NOT NULL DEFAULT '',
  `memberid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satellitesid` varchar(30) NOT NULL DEFAULT '',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  `deaconstatus` varchar(10) NOT NULL DEFAULT 'Active' COMMENT 'Active, Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `deacons` */

insert  into `deacons`(`id`,`deaconid`,`memberid`,`churchid`,`satellitesid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`deaconstatus`) values (1,'GCF-BOD-0000001','GCF-M-0000008','','','2025-01-07 14:23:30','',NULL,'','Active'),(2,'GCF-BOD-0000002','GCF-M-0000010','','','2025-01-07 14:25:35','',NULL,'','Active'),(3,'GCF-BOD-0000003','GCF-M-0000012','','','2025-04-01 18:39:52','',NULL,'','Active'),(4,'GCF-BOD-0000004','GCF-M-0000029','','','2025-06-03 14:48:47','',NULL,'','Active'),(5,'GCF-BOD-0000005','GCF-M-0000030','','','2025-06-03 14:49:00','',NULL,'','Active'),(6,'GCF-BOD-0000006','GCF-M-0000010','','','2025-06-03 14:49:11','',NULL,'','Active'),(7,'GCF-BOD-0000007','GCF-M-0000029','','','2025-06-03 16:29:06','',NULL,'','Active');

/*Table structure for table `elders` */

DROP TABLE IF EXISTS `elders`;

CREATE TABLE `elders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elderid` varchar(30) NOT NULL DEFAULT '',
  `memberid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satellitesid` varchar(30) NOT NULL DEFAULT '',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  `elderstatus` varchar(10) NOT NULL DEFAULT 'Active' COMMENT 'Active, Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `elders` */

insert  into `elders`(`id`,`elderid`,`memberid`,`churchid`,`satellitesid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`elderstatus`) values (1,'GCF-BOE-0000001','GCF-M-0000001','','','2025-01-07 11:28:07','',NULL,'','Active'),(2,'GCF-BOE-0000002','GCF-M-0000004','','','2025-01-15 13:05:55','',NULL,'','Active'),(3,'GCF-BOE-0000003','GCF-M-0000001','','','2025-02-11 00:02:54','',NULL,'','Active'),(4,'GCF-BOE-0000004','GCF-M-0000001','','','2025-06-03 16:01:14','',NULL,'','Active');

/*Table structure for table `ggmembers` */

DROP TABLE IF EXISTS `ggmembers`;

CREATE TABLE `ggmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ggMid` varchar(30) NOT NULL DEFAULT '',
  `growthgroupid` varchar(30) NOT NULL DEFAULT '',
  `ggmemberid` varchar(30) NOT NULL DEFAULT '',
  `ggMtype` varchar(15) NOT NULL DEFAULT '' COMMENT 'Leader, Assistant',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `ggmembers` */

insert  into `ggmembers`(`id`,`ggMid`,`growthgroupid`,`ggmemberid`,`ggMtype`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-GGM-0000001','GCF-GG-0000002','GCF-M-0000005','','2025-03-18 12:43:34','',NULL,''),(2,'GCF-GGM-0000002','GCF-GG-0000001','GCF-M-0000006','','2025-03-18 21:29:07','',NULL,''),(3,'GCF-GGM-0000003','GCF-GG-0000002','GCF-M-0000010','','2025-04-01 19:24:57','',NULL,''),(4,'GCF-GGM-0000004','GCF-GG-0000002','GCF-M-0000024','','2025-04-02 18:15:36','',NULL,''),(5,'GCF-GGM-0000005','GCF-GG-0000002','GCF-M-0000004','','2025-05-02 15:22:44','',NULL,''),(6,'GCF-GGM-0000006','GCF-GG-0000003','GCF-M-0000030','','2025-06-03 15:57:11','',NULL,''),(7,'GCF-GGM-0000007','GCF-GG-0000003','GCF-M-0000029','','2025-06-03 15:57:15','',NULL,''),(8,'GCF-GGM-0000008','GCF-GG-0000003','GCF-M-0000003','','2025-06-03 15:57:26','',NULL,''),(9,'GCF-GGM-0000009','GCF-GG-0000003','GCF-M-0000002','','2025-06-03 15:57:32','',NULL,''),(10,'GCF-GGM-0000010','GCF-GG-0000004','GCF-M-0000033','','2025-06-03 16:27:29','',NULL,''),(12,'GCF-GGM-0000012','GCF-GG-0000004','GCF-M-0000029','','2025-06-03 16:27:39','',NULL,''),(13,'GCF-GGM-0000013','GCF-GG-0000005','GCF-M-0000021','','2025-06-03 16:28:24','',NULL,''),(14,'GCF-GGM-0000014','GCF-GG-0000005','GCF-M-0000002','','2025-06-03 16:28:34','',NULL,''),(15,'GCF-GGM-0000015','GCF-GG-0000003','GCF-M-0000022','','2025-07-11 14:59:30','',NULL,''),(16,'GCF-GGM-0000016','GCF-GG-0000006','GCF-M-0000051','','2025-07-11 15:01:08','',NULL,''),(17,'GCF-GGM-0000017','GCF-GG-0000006','GCF-M-0000043','','2025-07-11 15:01:16','',NULL,''),(19,'GCF-GGM-0000018','GCF-GG-0000006','GCF-M-0000031','','2025-07-11 15:23:06','',NULL,''),(20,'GCF-GGM-0000019','GCF-GG-0000004','GCF-M-0000031','','2025-07-11 15:23:14','',NULL,'');

/*Table structure for table `growthgroups` */

DROP TABLE IF EXISTS `growthgroups`;

CREATE TABLE `growthgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `growthgroupid` varchar(30) NOT NULL DEFAULT '',
  `growthgroupname` varchar(60) NOT NULL DEFAULT '',
  `growthgroupshortname` varchar(6) NOT NULL DEFAULT '',
  `growthgroupleaderid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satelliteid` varchar(300) NOT NULL DEFAULT '',
  `schedtype` varchar(20) DEFAULT '' COMMENT 'Every, Every Other, Once a Month',
  `dayschedule` varchar(10) DEFAULT '',
  `timeschedule` varchar(10) NOT NULL DEFAULT '',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `growthgroups` */

insert  into `growthgroups`(`id`,`growthgroupid`,`growthgroupname`,`growthgroupshortname`,`growthgroupleaderid`,`churchid`,`satelliteid`,`schedtype`,`dayschedule`,`timeschedule`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-GG-0000001','God First','GFGG','GCF-M-0000004','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','','Tuesday','06:30','2024-09-24 10:15:43','',NULL,''),(2,'GCF-GG-0000002','No Girlfriend Since Birth','NGSB','GCF-M-0000001','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','','Friday','10:00','2024-09-24 10:15:43','',NULL,''),(3,'GCF-GG-0000003','Prettyful Growth Group','PGG','GCF-M-0000031','','','','Tuesday','20:00','2025-06-03 15:56:58','',NULL,''),(4,'GCF-GG-0000004','Cutest','CGG','GCF-M-0000032','','','','Wednesday','07:00','2025-06-03 16:26:55','',NULL,''),(5,'GCF-GG-0000005','Xandra','XGG','GCF-M-0000029','','','','Friday','20:00','2025-06-03 16:28:05','',NULL,''),(6,'GCF-GG-0000006','Mothers','MGG','GCF-M-0000022','','','','Wednesday','19:00','2025-07-11 15:00:29','',NULL,'');

/*Table structure for table `idrecords` */

DROP TABLE IF EXISTS `idrecords`;

CREATE TABLE `idrecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(20) NOT NULL DEFAULT '',
  `tablefield` varchar(15) NOT NULL DEFAULT '',
  `tableid` varchar(30) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `idrecords` */

insert  into `idrecords`(`id`,`tablename`,`tablefield`,`tableid`,`dateadded`) values (1,'members','memberid','GCF-M-0000035','2024-09-18 10:14:11'),(2,'churches','churchid','GCF-CHURCH-0000001','2024-09-18 12:19:01'),(5,'satellites','satellitesid','GCF-SATELLITE-0000001','2024-09-18 13:34:01'),(6,'pastors','pastorid','GCF-PASTOR-0000011','2024-09-20 10:55:35'),(7,'memberchildren','childID','GCF-MC-0000011','2025-01-03 13:03:03'),(8,'elders','elderID','GCF-BOE-0000004','2025-01-07 11:02:01'),(9,'deacons','deaconID','GCF-BOD-0000007','2025-01-07 14:21:56'),(13,'clusters','clusterid','GCF-CLUSTER-0000002','2025-01-15 13:17:07'),(16,'growthgroups','growthgroupid','GCF-GG-0000006','2025-02-10 23:38:40'),(17,'usersaccounts','userid','GCF-U-0000002','2025-02-21 13:04:19'),(19,'ggmembers','ggMid','GCF-GGM-0000019','2025-03-18 12:43:34'),(20,'audittrails','auditID','GCF-AUDIT-0000042','2025-04-01 18:39:52');

/*Table structure for table `memberchildren` */

DROP TABLE IF EXISTS `memberchildren`;

CREATE TABLE `memberchildren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `childID` varchar(30) NOT NULL DEFAULT '',
  `memberid` varchar(30) DEFAULT '',
  `childname` varchar(100) DEFAULT '',
  `childage` int(3) DEFAULT '0',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `memberchildren` */

insert  into `memberchildren`(`id`,`childID`,`memberid`,`childname`,`childage`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-MC-0000001','GCF-M-0000022','Monica Mica Macandog',31,'2025-01-03 13:03:03','',NULL,''),(2,'GCF-MC-0000002','GCF-M-0000022','Kevin Macandog',29,'2025-01-03 13:03:03','',NULL,''),(3,'GCF-MC-0000003','GCF-M-0000022','Mico Macandog',27,'2025-01-03 13:03:03','',NULL,''),(4,'GCF-MC-0000004','GCF-M-0000022','Sean Carlo Macandog',26,'2025-01-03 13:03:03','',NULL,''),(5,'GCF-MC-0000005','GCF-M-0000023','Nate Syyap',23,'2025-01-07 01:07:56','',NULL,''),(6,'GCF-MC-0000006','GCF-M-0000024','Daughter Ramos',12,'2025-04-02 13:00:43','',NULL,''),(7,'GCF-MC-0000007','GCF-M-0000025','Son Besana',12,'2025-04-02 13:56:48','',NULL,''),(8,'GCF-MC-0000008','GCF-M-0000025','Daughter Besana',15,'2025-04-02 13:56:48','',NULL,''),(9,'GCF-MC-0000009','GCF-M-0000028','Child Navarro 1',12,'2025-04-09 19:09:06','',NULL,''),(10,'GCF-MC-0000010','GCF-M-0000028','Child Navarro 2',23,'2025-07-08 10:44:35','',NULL,''),(11,'GCF-MC-0000011','GCF-M-0000028','Child Navarro 3',2,'2025-07-08 10:44:35','',NULL,'');

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(20) NOT NULL DEFAULT '',
  `nickname` varchar(30) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `middlename` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `emailaddress` varchar(60) NOT NULL DEFAULT '',
  `spousename` varchar(60) NOT NULL DEFAULT '',
  `fathername` varchar(60) NOT NULL DEFAULT '',
  `mothername` varchar(60) NOT NULL DEFAULT '',
  `facebookname` varchar(60) NOT NULL DEFAULT '',
  `gender` varchar(8) NOT NULL DEFAULT '',
  `birthday` date NOT NULL,
  `age` tinyint(3) NOT NULL,
  `lifestage` varchar(20) NOT NULL DEFAULT '',
  `mobilenumber` varchar(20) NOT NULL DEFAULT '',
  `contactdetails` varchar(100) NOT NULL DEFAULT '',
  `homeaddress` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(30) NOT NULL DEFAULT '',
  `region` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `barangay` varchar(30) NOT NULL DEFAULT '',
  `occupation` varchar(50) NOT NULL DEFAULT '',
  `industry` varchar(50) NOT NULL DEFAULT '',
  `collegeschool` varchar(150) NOT NULL DEFAULT '',
  `collegedegree` varchar(60) NOT NULL DEFAULT '',
  `highschool` varchar(150) NOT NULL DEFAULT '',
  `receivedJesus` date DEFAULT NULL,
  `baptizedImmersion` varchar(3) DEFAULT 'No' COMMENT 'Yes, No',
  `baptizeddate` date DEFAULT NULL,
  `spiritualgift` text NOT NULL,
  `picture` varchar(20) NOT NULL DEFAULT '',
  `purposereg` varchar(200) NOT NULL DEFAULT '',
  `prevchurch` varchar(50) NOT NULL DEFAULT '',
  `churchaffiliation` varchar(60) NOT NULL DEFAULT '',
  `satelliteid` varchar(30) NOT NULL DEFAULT '',
  `memberposition` varchar(30) NOT NULL DEFAULT '' COMMENT 'Pastors, Elders, Deacon',
  `memberstatus` varchar(20) NOT NULL DEFAULT 'Active',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(20) NOT NULL DEFAULT '',
  `dateupdated` datetime NOT NULL,
  `userupdated` varchar(20) NOT NULL DEFAULT '',
  `interviewby` varchar(30) NOT NULL DEFAULT '',
  `membershipdate` date DEFAULT NULL,
  `recForBaptism` varchar(5) NOT NULL DEFAULT 'No' COMMENT 'Yes, No',
  `recForMembership` varchar(5) DEFAULT 'No' COMMENT 'Yes, No',
  `comment` text NOT NULL,
  `ggLeader` varchar(255) NOT NULL DEFAULT '',
  `ggTimothy` varchar(255) NOT NULL DEFAULT '',
  `ggMember` varchar(255) NOT NULL DEFAULT '',
  `memberLevel` varchar(8) DEFAULT 'Level 5' COMMENT 'Level 1-5',
  `memberLvlTitle` varchar(15) DEFAULT 'Non-GG Member' COMMENT 'Level 1(Senior Pastor), Level 2(Pastor, Elder, Deacon), Level 3(GG Leader & Cluster Leader), Level 4(GG Member), Level 5(Non-Member & Non-GG Member)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`id`,`memberid`,`nickname`,`lastname`,`firstname`,`middlename`,`username`,`password`,`emailaddress`,`spousename`,`fathername`,`mothername`,`facebookname`,`gender`,`birthday`,`age`,`lifestage`,`mobilenumber`,`contactdetails`,`homeaddress`,`country`,`region`,`city`,`barangay`,`occupation`,`industry`,`collegeschool`,`collegedegree`,`highschool`,`receivedJesus`,`baptizedImmersion`,`baptizeddate`,`spiritualgift`,`picture`,`purposereg`,`prevchurch`,`churchaffiliation`,`satelliteid`,`memberposition`,`memberstatus`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`interviewby`,`membershipdate`,`recForBaptism`,`recForMembership`,`comment`,`ggLeader`,`ggTimothy`,`ggMember`,`memberLevel`,`memberLvlTitle`) values (1,'GCF-M-0000001','Kevs','Macandog','Kevin','Francisco','kevin','kevin','kevin@gmail.com','','','','Kevin Godnacam','Male','1995-07-06',29,'Single','(+63) 9153-169-518','C-0000002','','','','','','Software Engineer','IT','PLMun','BSCS','PEDHS','0000-00-00','No','0000-00-00','','GCF-M-0000001.jpg','','','','','Pastor','Active','2023-09-19 18:56:12','','0000-00-00 00:00:00','','','2025-01-16','Yes','No','','GG-0000003','GG-0000005','GG-0000004','Level 2','Elder'),(2,'GCF-M-0000002','Pretty','Cruz','Wisdom','Bacosa','','','wisdom@gmail.com','','','','','Female','2004-06-20',20,'Single','(+63) 9127-187-364','C-0000001','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Makati','San Lorezon','Sales Accountant','Accounting','','','',NULL,'No',NULL,'','','','Christ Commission Fellowship','','','','Active','2024-09-17 14:28:37','','0000-00-00 00:00:00','','','2025-06-04','Yes','No','Transfering in this church','','','','Level 4','GG Member'),(3,'GCF-M-0000003','Vivi','De Guzman','Ivy','Lazo','','','ivy@gmail.com','','','','','Female','1997-06-06',23,'Single','(+63) 918 559-6799 ','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Muntinlupa City','Alabang','Doctor','Health','','','',NULL,'No',NULL,'','','','None','','','','Active','2024-09-17 15:28:45','','0000-00-00 00:00:00','','','2025-07-18','Yes','No','A new member','','','','Level 4','GG Member'),(4,'GCF-M-0000004','Jeff','Dominguez','Jefferson','Prof','','','jeff@gmail.com','','','','','Male','1997-06-06',34,'Single','(+63) 918 559-6799 ','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Region 4','Muntinlupa City','Alabang','Doctor','Health','','','',NULL,'No',NULL,'','','','None','','','','Inactive','2024-09-17 15:28:45','','0000-00-00 00:00:00','','','2025-05-03','Yes','No','A new member','','','GG-0000005','Level 4','GG Member'),(5,'GCF-M-0000005','Bing','cabisuelas','Bing','Lambing','','','bing@gmail.com','','','','','Male','1991-02-07',33,'Single','(+63) 965-587-5646','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Laguna','San Pedro','Graphic Designer','IT','','','',NULL,'No',NULL,'','','','San Pedro','','','','Active','2024-12-13 22:54:00','','0000-00-00 00:00:00','','','2025-02-19','No','No','Membership info','','','GG-0000005','Level 4','GG Member'),(6,'GCF-M-0000006','Jai','Solleza','Jaime','Study','','','jaime@gmail.com','','','','','Male','1996-03-15',28,'Single','(+63) 965-465-4644','C-0000002','Zone 2 Sitio Pagkakaisa','Phillipines','NCR','Cavite','Bacoor','Audi Visual','Technical','','','',NULL,'No',NULL,'','','','asfa','','','','Active','2024-12-13 22:59:01','','0000-00-00 00:00:00','','','2025-12-17','No','No','Membership','','','GG-0000005','Level 4','GG Member'),(7,'GCF-M-0000007','Mak','Magz','Macky','Cluster','','','macky@gmail.com','','','','','Male','1987-05-08',37,'Married','(+63) 956-456-4545','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Muntinlupa','Katarungan','Pastor','Pastor','','','',NULL,'No',NULL,'','GCF-M-0000007.jpg','','GCF baguio','','','','Active','2024-12-13 23:04:20','','0000-00-00 00:00:00','','','2020-06-03','No','No','Membership','GG-0000005','','GG-0000005','Level 2','Pastor'),(8,'GCF-M-0000008','Mico','Berras','Melwric','Abby','','','mico@gmail.com','','','','','Male','1995-05-05',29,'Single','(+63) 956-464-6541','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Cavite','Bacoor','Accountant','Accounting','','','',NULL,'No',NULL,'','','','fsaas','','','','Active','2024-12-13 23:07:44','','0000-00-00 00:00:00','','','2024-06-03','No','No','Fasf','','','GG-0000005','Level 2','Deacon'),(9,'GCF-M-0000009','Nate','Syyap','Nathan','Sy','','','nate@gmail.com','','','','','Male','1998-12-05',26,'Single','(+63) 845-454-6554','C-0000002','Zone 2 Sitio Pagkakaisa','Philipiines','NCR','Cavite','Bacoor','Graphic Artist','IT','','','',NULL,'No',NULL,'','','','Previous Church','','','','Active','2024-12-13 23:16:14','','0000-00-00 00:00:00','','','2021-10-20','No','No','Purpose of Registration','','','GG-0000005','Level 5','Non-GG Member'),(10,'GCF-M-0000010','Rayms','Regalado','Rimer','Kapekape','','','rimer@gmail.com','','','','','Male','1995-12-01',29,'Single','(+63) 915-655-4645','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Bacoor','Cavite','Pilot','Plane','','','',NULL,'No',NULL,'','','','Prev Church','','','','Active','2024-12-13 23:21:49','','0000-00-00 00:00:00','','','2022-11-03','No','No','Membership ','','','GG-0000005','Level 2','Deacon'),(11,'GCF-M-0000011','James','Simeon','Felix III','SF','','','jame@gmail.com','','','','','Male','1999-05-06',25,'Single','(+63) 945-646-5445','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Bacoor','Cavite','Mechanical Engineer','Engineering','','','',NULL,'No',NULL,'','','','prev church','','','','Active','2024-12-13 23:25:42','','0000-00-00 00:00:00','','','2024-12-17','No','No','Membership form','','','GG-0000005','Level 5','Non-GG Member'),(12,'GCF-M-0000012','Zy','Takano','Zyron','emokid','','','zy@gmail.com','','','','','Male','1999-08-12',25,'Single','(+63) 914-515-6546','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Muntinlupa','Alabang','IT Technician','IT','','','',NULL,'No',NULL,'','','','prev church','','','','Active','2024-12-13 23:30:03','','0000-00-00 00:00:00','','','2023-03-21','No','No','Fasdfa','','','','Level 2','Deacon'),(13,'GCF-M-0000013','Lito','Villoria','Lito','Rolex','','','litov@gmail.com','','','','','Male','1975-04-30',49,'Married','(+63) 956-456-5456','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','NCR','Muntinlupa City','Alabang','Senior Pastor','pastoral','','','',NULL,'No',NULL,'','GCF-M-0000013.jpg','','gCF Ortigas','','','','Active','2024-12-19 11:58:57','','0000-00-00 00:00:00','','','2022-07-21','No','No','Membership','','','','Level 1','Senior Pastor'),(14,'GCF-M-0000014','Don','Guico','Don Andrew','Don','','','pdon@gmail.com','','','','','Male','1965-04-16',59,'Single','(+63) 918-439-8743','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Metro Manila','Cavite','Bacoor','pastor','christianity','','','',NULL,'No',NULL,'','GCF-M-0000014.jpg','','GCF Ortigas','','','','Active','2024-12-26 18:04:11','','0000-00-00 00:00:00','','','2024-10-17','No','No','Membership','','','','Level 2','Pastor'),(15,'GCF-M-0000015','Dong','Villatito','Dong','Villa','','','dongv@gmail.com','','','','','Male','1970-12-05',54,'Married','(+63) 915-390-4829','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Metro Manila','Muntinlupa','Alabang','Pastor','christianity','','','',NULL,'No',NULL,'','','','CCF Madrigal','','','','Inactive','2024-12-26 18:13:47','','0000-00-00 00:00:00','','','2024-11-07','Yes','No','Purpose of Registration','','','','Level 2','Pastor'),(16,'GCF-M-0000016','Shan','Fuerte','Sean','Shan','','','seanf@gmail.com','','','','','Male','1980-12-15',44,'Married','(+63) 974-389-2892','C-0000002','Zone 2 Sitio Pagkakaisa','Philippines','Metro Manila','Muntinlup','Tunasan','Pastor','Christianity','','','',NULL,'No',NULL,'','','','CCF Muntinlupa','','','','Active','2024-12-26 18:20:16','','0000-00-00 00:00:00','','','2025-02-27','Yes','No','Purpose of Registration','','','','Level 2','Pastor'),(17,'GCF-M-0000017','Parkin','Young','Parkin','Park','','','parkin@gmail.com','Bernice Young','Parken Young','Parkun Young','Parkin Young','Male','1980-05-15',44,'Married','(+63) 934-374-3478','C-0000002','Blk 16 Lot 17','Philippines','Metro Manila','Las pinas','Daang hari','pastor','christianity','','','','0000-00-00','Yes','2002-12-20','Preaching','','','gCF ortigas','','','','Active','2024-12-26 19:21:17','','0000-00-00 00:00:00','','e. waldy','2001-01-15','Yes','Yes','Comments','','','','Level 2','Pastor'),(18,'GCF-M-0000018','Mike','Duco','Mike','Mic','','','mikeduco@gmail.com','NA','NA','NA','Mike Duco','Male','1986-05-15',38,'Married','(+63) 934-374-3478','C-0000002','Blk 17 Lot 18','Philippines','Metro Manila','Las pinas','Daang hari','pastor','christianity','Political University of the Philippines','','','0000-00-00','Yes','2002-12-20','Preaching','','','gCF ortigas','','','','Active','2024-12-26 19:29:22','','0000-00-00 00:00:00','','e. waldy','2001-01-15','Yes','Yes','Comments','','','','Level 2','Pastor'),(19,'GCF-M-0000019','Jonar','Garcia','Jonar','Garsy','','','jonar@gmail.com','Grace Ann Garcia','Jon Garcia','Jen Garcia','Jonar Garcia','Male','1979-05-01',45,'Married','(+63) 915-656-6156','C-0000002','Blk 18 Lot 19','Philippines','Metro Manila','Las Pinas','Pena','pastor','christianity','Pamantasan ng Lungsod ng Las pinas','bachelor of science in education','pedro e. diaz','2003-02-15','Yes','2005-02-05','Preaching','GCF-M-0000019.png','','CCF Alabang','baptist','','','Active','2024-12-26 20:50:00','','0000-00-00 00:00:00','','E. mike','2004-02-15','No','Yes','Comments here...','','','','Level 4','GG Member'),(20,'GCF-M-0000020','Rex','Vasallo','Rex','Exie','','','rexv@gmail.com','Spouse Name','Father Name','Mother Name','rex vasallo','Male','1970-06-05',54,'Married','(+63) 923-434-3434','C-0000002','Home Address','Philippines','NCR','Muntinlupa','Tunasan','Pastor','christianity','College School Name','Degree','High School','2001-06-15','Yes','2002-05-15','Preaching','GCF-M-0000020.png','','Previous Church','Baptist','','','Inactive','2025-01-02 10:21:32','','0000-00-00 00:00:00','','E. Jun','2003-03-20','Yes','Yes','Comments','','','','Level 2','Pastor'),(21,'GCF-M-0000021','Andi','Estrella','Andrea','Paredes','','','andiestrella@gmail.com','NA','Anton Estrella','Ninch Estrella','Andrea Estrella','Female','2001-11-12',23,'Single','(+63) 915-665-1321','C-0000002','Home Address','philippines','Metro Manila','Muntinlupa','Ayala Alabang','Accountant','Accounting','Lassalle','bachelor of science in political science','greenhills christian fellowship school','2005-12-15','Yes','2008-02-15','Teaching Children','GCF-M-0000021.jpg','','Previous Church','baptist','','','Active','2025-01-02 10:50:50','','0000-00-00 00:00:00','','E. Nono','2005-12-12','No','Yes','My comments','','','','Level 4','GG Member'),(22,'GCF-M-0000022','Weng','Macandog','Rowena','Gajopo','','','weng@gmail.com','Eler Macandog','Francisco Francisco','Nila Francisco','Rowena Francisco','Female','1984-04-29',40,'Married','(+63) 923-894-7378','C-0000002','#343 Sitio Pagkakaisa Sucat Muntinlupa City','Philippines','Metron Manila','Muntinlupa City','Sucat','NA','NA','NA','NA','NA','2018-06-15','No','0001-01-01','NA','GCF-M-0000022.png','','Muntinlupa Word Of Truth Church','Penticostal','','','Active','2025-01-03 13:03:03','','0000-00-00 00:00:00','','E. Jun','2025-12-02','Yes','Yes','Comments','','','','Level 3','GG Leader'),(23,'GCF-M-0000023','Vins','Syyap','Vince','Yap','','','vincesyyap@gmail.com','Venice Syyap','Father Syyap','Mother Syyap','Vince Syyap','Male','1970-05-05',54,'Married','(+63) 978-234-6782','C-0000002','Home Address','Philippines','Metro Manila','Muntinlupa','Ayala Alabang','Pastor','Industry','College School Name','Degree','High School Name','2001-05-15','Yes','2002-05-15','Preaching','GCF-M-0000023.png','Wala lang.','Previous Church','Church Affiliation','','','Active','2025-01-07 01:07:56','','0000-00-00 00:00:00','','E. Jun','2025-01-06','Yes','No','Comments','','','','Level 3','GG Leader'),(24,'GCF-M-0000024','Nik','Ramos','Nikkie','O','','','nikkie@gmail.com','Moey Ramos','Father Ramos','Mother Ramos','Nikkie Ramos','Male','1990-04-05',34,'Married','(+63) 956-484-5615','C-0000002','Blk 1 Lot 2','Philippines','NCR','Carmona','Caremona','HR Manager','IT Industry','UP Diliman','BSBA','PEDHS','2015-05-06','Yes','2017-05-06','Preaching','GCF-M-0000024.jpg','To become an official member of the GCFSouthMetro church','TWOT','Christianity','','','Active','2025-04-02 13:00:43','','0000-00-00 00:00:00','','E.Jun','2025-04-02','Yes','Yes','Okay na yan.','','','','Level 4','GG Member'),(25,'GCF-M-0000025','Jaime','Besana','Jaime','H','','','jaime@gmail.com','Wife Besana','Papa Besana','Mama Besana','Jaime Besana','Male','1975-04-05',49,'Married','(+63) 914-654-6465','C-0000002','Blk 1 Lot 3','Philippines','NCR','Las Pinas','Mangyan','Software Engineer','Software Industry','STI','BSCS','MNHS','2008-03-31','No',NULL,'Preaching, Administration','GCF-M-0000025.jpg','For baptism and membership','MCGI','Christianity','','','Active','2025-04-02 13:56:48','','0000-00-00 00:00:00','','E. Nono','2025-04-02','No','Yes','Pwede na yan.','','','','Level 5','Non-GG Member'),(26,'GCF-M-0000026','Bobot','Andalis','Herac','B','','','bobot@gmail.com','Spouse','Father','Mother','Herac Andalis','Male','1970-03-24',55,'Married','(+63) 965-465-4656','C-0000002','Home Address','Country','Region','City','Barangay','Occupation','Industry','College ','Degree','High School ','2017-06-23','No','0000-00-00','Preaching','GCF-M-0000026.jpg','Purpose of Registration','Previous Church','Church Affiliation','','','Active','2025-04-02 14:01:33','','0000-00-00 00:00:00','','E. Gilbert','2025-04-02','Yes','Yes','Comments','','','','Level 5','Non-GG Member'),(27,'GCF-M-0000027','Pits','Masangkay','Peter','P','','','peter@gmail.com','Karla Masangkay','Father Masangkay','Mother Masangkay','Peter Paul Masangkay','Male','1991-12-04',33,'Married','(+63) 918-516-5156','C-0000002','Home Address','Country','Region','City','Barangay','Occupation','Industry','College ','Degree',' Degree High School','2020-02-04','Yes','2022-09-28','Preaching','','Purpose of Registration','Previous Church','Church Affiliation','','','Active','2025-04-02 14:31:03','','0000-00-00 00:00:00','','E. Rey','2025-04-02','No','Yes','Comments','','','','Level 5','Non-GG Member'),(28,'GCF-M-0000028','Jong','Navarro','Jong','Ong','','','jong@gmail.com','Arlene Navarro','F Navarro','M Navarro','Jong Navarro','Male','1979-01-19',46,'Married','(+63) 984-896-5456','C-0000002','Blk 2 Lot 2, Zone 2 Sitio Pagkakaisa','Philippines','NCR','Muntinlupa City','Sucat','Occupation','Industry','College ','Degree','High ','2014-12-15','Yes','2016-04-25','Preaching, mission, administration, Evangelism, prayer, encouragement','GCF-M-0000028.jpg','Purpose of Registration','Previous Church','Church Affiliation','','','Active','2025-04-09 19:09:06','','0000-00-00 00:00:00','','E. Rey','2025-04-09','Yes','Yes','Comments','','','','Level 5','Non-GG Member'),(29,'GCF-M-0000029','Nics','Estrella','Nicole','Middle ','','','nicole@gmail.com','NA','Anton','Ninch','Nicole Estrella','Female','1998-11-16',26,'Single','(+63) 941-964-6545','C-0000002','Alabang ','Country','Region','Muntinlupa','Alabang','Occupation','Industry','College ','Degree','High School','2000-10-27','Yes','2019-10-31','Evangelizing','GCF-M-0000029.jpg','Purpose of Registration','NA','NA','','','Active','2025-06-03 11:04:57','','0000-00-00 00:00:00','','E. Nono','2025-06-03','Yes','Yes','Comments Comments Comments','','','','Level 2','Deacon'),(30,'GCF-M-0000030','Niz','Sanchez','Denise','Aleca','','','denise@gmail.com','NA','Reymund','Lora','Nicole Estrella','Female','1998-11-16',26,'Single','(+63) 941-964-6545','C-0000002','Alabang ','Country','Region','Muntinlupa','Alabang','Occupation','Industry','College ','Degree','High School','2000-10-27','Yes','2019-10-31','Evangelizing','GCF-M-0000030.jpg','Purpose of Registration','NA','NA','','','Active','2025-06-03 11:06:15','','0000-00-00 00:00:00','','E. Nono','2025-06-03','Yes','Yes','Comments Comments Comments','','','','Level 2','Deacon'),(31,'GCF-M-0000031','Karen','Monroy','Karen','Middle ','','','karen@gmail.com','NA','Jun','Ella','Nicole Estrella','Female','1998-11-16',26,'Single','(+63) 941-964-6545','C-0000002','Alabang ','Country','Region','Muntinlupa','Alabang','Occupation','Industry','College ','Degree','High School','2000-10-27','Yes','2019-10-31','Evangelizing','GCF-M-0000031.jpg','Purpose of Registration','NA','NA','','','Active','2025-06-03 11:07:25','','0000-00-00 00:00:00','','E. Nono','2025-06-03','Yes','Yes','Comments Comments Comments','','','','Level 2','Pastor'),(32,'GCF-M-0000032','Carol','Teach','Carolyn','Mae','','','carol@gmail.com','NA','Jun','Ella','Carolyn Mae','Female','1998-11-16',26,'Single','(+63) 941-964-6545','C-0000002','Alabang ','Country','Region','Muntinlupa','Alabang','Occupation','Industry','College ','Degree','High School','2000-10-27','Yes','2019-10-31','Evangelizing','GCF-M-0000032.jpg','Purpose of Registration','NA','NA','','','Active','2025-06-03 11:08:43','','0000-00-00 00:00:00','','E. Nono','2025-06-03','Yes','Yes','Comments Comments Comments','','','','Level 2','Pastor'),(33,'GCF-M-0000033','Mir','Monroy','Mirah','Patrick','','','mir@gmail.com','Patrick','Jun','Ella','Mir Monroy','Female','1990-03-15',35,'Married','(+63) 965-456-5544','C-0000002','fsadf','Sadf','Asfd','sadf','Safd','Asfd','Sadf','Fsad','Safd','Asfd','2015-06-15','Yes','0000-00-00','Teaching','','Fsadf','Asfda','Afsad','','','Active','2025-06-03 11:14:56','','0000-00-00 00:00:00','','Fdas','2025-06-03','Yes','Yes','fsafsafas safsdafa','','','','Level 2','Pastor'),(34,'GCF-M-0000034','Fatsy','Royo','Fatima','Lopez','','','fatsy@gmail.com','NA','Daddy Royo','Mommy Royo','Fatsy Royo','Female','1991-06-05',34,'Single','(+63) 915-852-1564','C-0000002','Blk 18 Lot 20','Philippines','Metro Manila','Las Pinas','Siopao','Children\'s Director','Christian','College ','Degree','High School','2015-06-15','Yes','2016-05-18','Teaching','GCF-M-0000034.jpg','No purpose','PrevChurch','Affiliation','','','Active','2025-06-10 20:51:03','','0000-00-00 00:00:00','','E. Waldy','2025-06-10','Yes',NULL,'Comments.','','','','Level 5','Non-GG Member'),(36,'GCF-M-0000035','Hans','Ragos','Hannah','Fidel','','','hannah@gmail.com','Husband Ragos','Father','Mother','','Female','1990-04-23',35,'Married','(+63) 918-556-4464','C-0000002','fsaf','Asf','Safd','Sadf','Sadf','Fsad','Saf','Safd','Asfd','Asf','2000-05-18','Yes','0000-00-00','sdafafafa','','Fsadf','Af','Asfd','','','Active','2025-06-10 21:12:26','','0000-00-00 00:00:00','','Safd','2025-06-10','Yes','No','fsafaf','','','','Level 5','Non-GG Member');

/*Table structure for table `pastors` */

DROP TABLE IF EXISTS `pastors`;

CREATE TABLE `pastors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pastorid` varchar(30) NOT NULL DEFAULT '',
  `pastorlevel` varchar(50) NOT NULL DEFAULT '',
  `memberid` varchar(30) NOT NULL DEFAULT '',
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satellitesid` varchar(30) NOT NULL DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(30) NOT NULL DEFAULT '',
  `pastorstatus` varchar(10) NOT NULL DEFAULT 'Active' COMMENT 'Active, Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `pastors` */

insert  into `pastors`(`id`,`pastorid`,`pastorlevel`,`memberid`,`churchid`,`satellitesid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`pastorstatus`) values (1,'GCF-PASTOR-0000001','Pastor','GCF-M-0000007','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-19 11:14:11','',NULL,'','Active'),(2,'GCF-PASTOR-0000002','Senior Pastor','GCF-M-0000013','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 17:55:04','',NULL,'','Active'),(3,'GCF-PASTOR-0000003','Pastor','GCF-M-0000014','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 18:14:34','',NULL,'','Active'),(4,'GCF-PASTOR-0000004','Pastor','GCF-M-0000015','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 18:28:13','',NULL,'','Active'),(5,'GCF-PASTOR-0000005','Pastor','GCF-M-0000016','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 18:28:21','',NULL,'','Active'),(6,'GCF-PASTOR-0000006','Pastor','GCF-M-0000017','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 19:35:08','',NULL,'','Active'),(7,'GCF-PASTOR-0000007','Pastor','GCF-M-0000018','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 22:54:11','',NULL,'','Active'),(8,'GCF-PASTOR-0000008','Pastor','GCF-M-0000019','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2024-12-26 22:54:22','',NULL,'','Active'),(9,'GCF-PASTOR-0000009','Pastor','GCF-M-0000023','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2025-01-07 01:08:32','',NULL,'','Active'),(23,'GCF-PASTOR-0000010','Pastor','GCF-M-0000031','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2025-06-03 15:54:40','',NULL,'','Active'),(24,'GCF-PASTOR-0000011','Pastor','GCF-M-0000032','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2025-06-03 15:55:10','',NULL,'','Active');

/*Table structure for table `satellites` */

DROP TABLE IF EXISTS `satellites`;

CREATE TABLE `satellites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `churchid` varchar(30) NOT NULL DEFAULT '',
  `satellitesid` varchar(30) NOT NULL DEFAULT '',
  `satellitesname` varchar(60) NOT NULL DEFAULT '',
  `worshipday` varchar(12) NOT NULL DEFAULT '',
  `worshiptime` varchar(12) NOT NULL DEFAULT '',
  `areapastorid` varchar(30) NOT NULL DEFAULT '',
  `areapastor` varchar(60) NOT NULL DEFAULT '',
  `satellitelocation` varchar(100) DEFAULT '',
  `registeredsince` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(60) NOT NULL DEFAULT '',
  `dateupdated` datetime DEFAULT NULL,
  `userupdated` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `satellites` */

insert  into `satellites`(`id`,`churchid`,`satellitesid`,`satellitesname`,`worshipday`,`worshiptime`,`areapastorid`,`areapastor`,`satellitelocation`,`registeredsince`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-CHURCH-0000001','GCF-SATELLITE-0000001','GCFSouthMetro','Sunday','08:00','GCF-PASTOR-0000001','Macky Magz','Daanghari Las Pinas City','2024-12-19 11:12:26','2024-12-19 11:12:26','',NULL,'');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(20) NOT NULL DEFAULT '',
  `firstName` varchar(40) NOT NULL DEFAULT '',
  `lastName` varchar(40) NOT NULL DEFAULT '',
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` varchar(8) NOT NULL DEFAULT '',
  `schooId` varchar(20) NOT NULL DEFAULT '',
  `rank` varchar(20) NOT NULL DEFAULT '' COMMENT 'It is the position of the user e.g Admin, Student, Teacher',
  `emailAddress` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `USERID` (`userId`),
  KEY `FIRSTNAME` (`firstName`),
  KEY `LASTNAME` (`lastName`),
  KEY `DATEADDED` (`dateAdded`),
  KEY `GENDER` (`gender`),
  KEY `SCHOOLID` (`schooId`),
  KEY `RANK` (`rank`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`userId`,`firstName`,`lastName`,`dateAdded`,`gender`,`schooId`,`rank`,`emailAddress`,`password`) values (1,'U-0000001','Xandra Nicole','Estrella','2024-09-14 15:04:12','Female','S-0000001','Student','',''),(2,'U-0000002','Kevin','Macandog','2024-09-14 15:04:24','Male','S-0000002','Teacher','',''),(4,'U-0000003','Andrea','Estrella','2024-09-16 20:44:01','Female','S-0000003','teacher','',''),(5,'U-0000003','Adriane','Estrella','2024-09-16 20:50:06','Female','S-0000003','admin','diane143@gmail.com','$2y$10$cKC1z8FXSGKmSvCyUXTuUO6P7Z3osvQQDPjnrzL7rlMSFiBrhkW/a');

/*Table structure for table `usersaccounts` */

DROP TABLE IF EXISTS `usersaccounts`;

CREATE TABLE `usersaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) DEFAULT '',
  `memberid` varchar(30) DEFAULT '',
  `username` varchar(60) DEFAULT '',
  `password` varchar(60) DEFAULT '',
  `roleid` varchar(30) DEFAULT '',
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `useradded` varchar(30) DEFAULT '',
  `dateupdated` varchar(30) DEFAULT '',
  `userupdated` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usersaccounts` */

insert  into `usersaccounts`(`id`,`userid`,`memberid`,`username`,`password`,`roleid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-U-0000001','GCF-M-0000021','andiestrella@gmail.com','$2y$10$kaq7A4BAdsKoL9SdZeBdle.DRZIP0hnxEVgz8FhH8wX/M7hOOBd..','','2025-02-21 13:07:52','','',''),(2,'GCF-U-0000002','GCF-M-0000001','kevin@gmail.com','$2y$10$.YEpxlRZyVzBJyUDdP4s7..eNOYL8Vol/GRZb7dI3QMPSkQxxZFA.','n?0AoNnM','2025-02-21 13:38:20','','','');

/*Table structure for table `growthgroupmembers_information` */

DROP TABLE IF EXISTS `growthgroupmembers_information`;

/*!50001 DROP VIEW IF EXISTS `growthgroupmembers_information` */;
/*!50001 DROP TABLE IF EXISTS `growthgroupmembers_information` */;

/*!50001 CREATE TABLE  `growthgroupmembers_information`(
 `growthgroupleaderid` varchar(30) ,
 `growthgroupid` varchar(30) ,
 `growthgroupname` varchar(60) ,
 `growthgroupshortname` varchar(6) ,
 `leaderName` varchar(101) ,
 `firstname` varchar(50) ,
 `lastname` varchar(50) ,
 `picture` varchar(20) ,
 `churchid` varchar(30) ,
 `satelliteid` varchar(300) ,
 `schedtype` varchar(20) ,
 `dayschedule` varchar(10) ,
 `timeschedule` varchar(10) 
)*/;

/*Table structure for table `pastors_information` */

DROP TABLE IF EXISTS `pastors_information`;

/*!50001 DROP VIEW IF EXISTS `pastors_information` */;
/*!50001 DROP TABLE IF EXISTS `pastors_information` */;

/*!50001 CREATE TABLE  `pastors_information`(
 `id` int(11) ,
 `pastorid` varchar(30) ,
 `pastorlevel` varchar(50) ,
 `memberid` varchar(30) ,
 `fullname` varchar(101) ,
 `nickname` varchar(30) ,
 `gender` varchar(8) ,
 `lifestage` varchar(20) ,
 `birthday` date ,
 `emailaddress` varchar(60) ,
 `picture` varchar(20) ,
 `churchname` varchar(100) ,
 `satellitesname` varchar(60) ,
 `pastorstatus` varchar(10) 
)*/;

/*View structure for view growthgroupmembers_information */

/*!50001 DROP TABLE IF EXISTS `growthgroupmembers_information` */;
/*!50001 DROP VIEW IF EXISTS `growthgroupmembers_information` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`::1` SQL SECURITY DEFINER VIEW `growthgroupmembers_information` AS (select `gg`.`growthgroupleaderid` AS `growthgroupleaderid`,`gg`.`growthgroupid` AS `growthgroupid`,`gg`.`growthgroupname` AS `growthgroupname`,`gg`.`growthgroupshortname` AS `growthgroupshortname`,concat(`mem`.`firstname`,' ',`mem`.`lastname`) AS `leaderName`,`mem`.`firstname` AS `firstname`,`mem`.`lastname` AS `lastname`,`mem`.`picture` AS `picture`,`gg`.`churchid` AS `churchid`,`gg`.`satelliteid` AS `satelliteid`,`gg`.`schedtype` AS `schedtype`,`gg`.`dayschedule` AS `dayschedule`,`gg`.`timeschedule` AS `timeschedule` from (`growthgroups` `gg` left join `members` `mem` on((`gg`.`growthgroupleaderid` = `mem`.`memberid`)))) */;

/*View structure for view pastors_information */

/*!50001 DROP TABLE IF EXISTS `pastors_information` */;
/*!50001 DROP VIEW IF EXISTS `pastors_information` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`::1` SQL SECURITY DEFINER VIEW `pastors_information` AS (select `p`.`id` AS `id`,`p`.`pastorid` AS `pastorid`,`p`.`pastorlevel` AS `pastorlevel`,`p`.`memberid` AS `memberid`,concat(`m`.`firstname`,' ',`m`.`lastname`) AS `fullname`,`m`.`nickname` AS `nickname`,`m`.`gender` AS `gender`,`m`.`lifestage` AS `lifestage`,`m`.`birthday` AS `birthday`,`m`.`emailaddress` AS `emailaddress`,`m`.`picture` AS `picture`,`c`.`churchname` AS `churchname`,`s`.`satellitesname` AS `satellitesname`,`p`.`pastorstatus` AS `pastorstatus` from (((`pastors` `p` left join `members` `m` on((`p`.`memberid` = `m`.`memberid`))) left join `churches` `c` on((`p`.`churchid` = `c`.`churchid`))) left join `satellites` `s` on((`p`.`satellitesid` = `s`.`satellitesid`))) order by `p`.`pastorid` desc) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
