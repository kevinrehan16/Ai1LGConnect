/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.51 : Database - dms
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `audittrails` */

insert  into `audittrails`(`id`,`auditID`,`action_type`,`table_name`,`record_id`,`old_data`,`new_data`,`changed_byID`,`changed_byName`,`change_timestamp`) values (1,'GCF-AUDIT-0000001','INSERT','members','GCF-M-0000001','','{\"memberid\":\"GCF-M-0000001\",\"lastname\":\"Macandog\",\"firstname\":\"Kevin\",\"middlename\":\"Francisco\",\"nickname\":\"Kevs\",\"gender\":\"Male\",\"emailaddress\":\"kevinrehan16@gmail.com\",\"birthday\":\"1995-07-06\",\"age\":\"30\",\"lifestage\":\"Single\",\"facebookname\":\"Kevin Godnacam\",\"spousename\":\"\",\"fathername\":\"Eler Macandog\",\"mothername\":\"Rowena Francisco\",\"receivedJesus\":\"2015-04-15\",\"baptizedImmersion\":\"Yes\",\"baptizeddate\":\"2015-04-15\",\"spiritualgift\":\"Teaching, Encouragement\",\"mobilenumber\":\"(+63) 915-316-9518\",\"contactdetails\":\"C-0000002\",\"homeaddress\":\"#343 Zone 2 Sitio Pagkakaisa\",\"country\":\"Philippines\",\"region\":\"National Capital Region\",\"city\":\"Muntinlupa City\",\"barangay\":\"Sucat\",\"occupation\":\"Senior Software Developer\",\"industry\":\"Software Industry\",\"collegeschool\":\"Pamantasan Ng Lungsod Ng Muntinlupa\",\"collegedegree\":\"Bachelor Degree\",\"highschool\":\"Pedro E. Diaz\",\"purposereg\":\"Membership\",\"picture\":\"GCF-M-0000001.jpg\",\"prevchurch\":\"Tunasan Word Of Truth Church\",\"churchaffiliation\":\"Penticostal\",\"memberstatus\":\"Active\",\"interviewby\":\"Elder Jun Espiritu\",\"membershipdate\":\"2025-09-17\",\"recForBaptism\":\"No\",\"recForMembership\":\"Yes\",\"comment\":\"Two years na sya active sa church and ministry.\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 10:15:01'),(2,'GCF-AUDIT-0000002','INSERT','members','GCF-M-0000002','','{\"memberid\":\"GCF-M-0000002\",\"lastname\":\"Macandog\",\"firstname\":\"Sean Carlo\",\"middlename\":\"Francisco\",\"nickname\":\"Shan\",\"gender\":\"Male\",\"emailaddress\":\"shan@gmail.com\",\"birthday\":\"1997-01-24\",\"age\":\"28\",\"lifestage\":\"Married\",\"facebookname\":\"Shan Macandog\",\"spousename\":\"Marielle Macandog\",\"fathername\":\"Eler Macandog\",\"mothername\":\"Rowena Francisco\",\"receivedJesus\":\"2015-04-15\",\"baptizedImmersion\":\"Yes\",\"baptizeddate\":\"2015-04-15\",\"spiritualgift\":\"Teaching, Encouragement\",\"mobilenumber\":\"(+63) 915-316-9518\",\"contactdetails\":\"C-0000002\",\"homeaddress\":\"#343 Zone 2 Sitio Pagkakaisa\",\"country\":\"Philippines\",\"region\":\"National Capital Region\",\"city\":\"Muntinlupa City\",\"barangay\":\"Sucat\",\"occupation\":\"Administrative Assistant V\",\"industry\":\"Government Industry\",\"collegeschool\":\"Pamantasan Ng Lungsod Ng Muntinlupa\",\"collegedegree\":\"Bachelor Degree\",\"highschool\":\"Pedro E. Diaz\",\"purposereg\":\"Membership\",\"picture\":\"GCF-M-0000002.jpg\",\"prevchurch\":\"Tunasan Word Of Truth Church\",\"churchaffiliation\":\"Penticostal\",\"memberstatus\":\"Active\",\"interviewby\":\"Elder Jun Espiritu\",\"membershipdate\":\"2025-09-17\",\"recForBaptism\":\"Yes\",\"recForMembership\":\"Yes\",\"comment\":\"Bunsong kapatid ni Kevin Macandog\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 10:17:46'),(3,'GCF-AUDIT-0000003','UPDATE','members','GCF-M-0000002','{\"lifestage\":\"Married\",\"spousename\":\"Marielle Macandog\"}','{\"lifestage\":\"LiveIn\",\"spousename\":\"Marielle Rojo\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 10:26:36'),(4,'GCF-AUDIT-0000004','INSERT','members','GCF-M-0000003','','{\"memberid\":\"GCF-M-0000003\",\"lastname\":\"Macandog\",\"firstname\":\"Mico\",\"middlename\":\"\",\"nickname\":\"Mic\",\"gender\":\"Male\",\"emailaddress\":\"mico@gmail.com\",\"birthday\":\"1996-12-23\",\"age\":\"28\",\"lifestage\":\"Married\",\"facebookname\":\"Mico Macandog\",\"spousename\":\"Jynelle Macandog - Natad\",\"fathername\":\"\",\"mothername\":\"\",\"receivedJesus\":\"\",\"baptizedImmersion\":\"Yes\",\"baptizeddate\":\"2019-04-01\",\"spiritualgift\":\"\",\"mobilenumber\":\"(+63) 918-559-6799\",\"contactdetails\":\"C-0000002\",\"homeaddress\":\"\",\"country\":\"\",\"region\":\"\",\"city\":\"\",\"barangay\":\"\",\"occupation\":\"\",\"industry\":\"\",\"collegeschool\":\"\",\"collegedegree\":\"\",\"highschool\":\"\",\"purposereg\":\"\",\"picture\":\"GCF-M-0000003.jpg\",\"prevchurch\":\"\",\"churchaffiliation\":\"\",\"memberstatus\":\"Active\",\"interviewby\":\"\",\"membershipdate\":\"2025-09-17\",\"recForBaptism\":\"No\",\"recForMembership\":\"Yes\",\"comment\":\"\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 11:13:41'),(5,'GCF-AUDIT-0000005','UPDATE','members','GCF-M-0000003','{\"middlename\":\"\",\"fathername\":\"\",\"mothername\":\"\",\"receivedJesus\":\"0000-00-00\",\"spiritualgift\":\"\",\"homeaddress\":\"\",\"country\":\"\",\"region\":\"\",\"city\":\"\",\"barangay\":\"\",\"occupation\":\"\",\"industry\":\"\",\"collegeschool\":\"\",\"collegedegree\":\"\",\"highschool\":\"\",\"purposereg\":\"\",\"prevchurch\":\"\",\"churchaffiliation\":\"\",\"interviewby\":\"\",\"comment\":\"\"}','{\"middlename\":\"Francisco\",\"fathername\":\"Eler Macandog\",\"mothername\":\"Rowena Francisco\",\"receivedJesus\":\"2018-02-25\",\"spiritualgift\":\"Singing\",\"homeaddress\":\"#343 Zone 2 Sitio Pagkakaisa \",\"country\":\"Philippines\",\"region\":\"National Capital Region\",\"city\":\"Muntinlupa City\",\"barangay\":\"Sucat\",\"occupation\":\"Data Analyst\",\"industry\":\"IT Industry\",\"collegeschool\":\"Pamantasan Ng Lungsod Ng Muntinlupa\",\"collegedegree\":\"Bachelor Degree\",\"highschool\":\"Pedro E Diaz\",\"purposereg\":\"Membership\",\"prevchurch\":\"Tunasan Word Of Truth Church\",\"churchaffiliation\":\"Penticostal\",\"interviewby\":\"Elder Jun Espiritu\",\"comment\":\"Kapatid ni Kevin and Shan\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 11:17:09'),(6,'GCF-AUDIT-0000006','INSERT','members','GCF-M-0000004','','{\"memberid\":\"GCF-M-0000004\",\"lastname\":\"Villoria\",\"firstname\":\"Lito\",\"middlename\":\"\",\"nickname\":\"Lito\",\"gender\":\"Male\",\"emailaddress\":\"lito.villoria@gmail.com\",\"birthday\":\"1970-05-17\",\"age\":\"55\",\"lifestage\":\"Married\",\"facebookname\":\"Lito Villoria\",\"spousename\":\"Linda Villoria\",\"fathername\":\"Father Villoria\",\"mothername\":\"Mother Villoria\",\"receivedJesus\":\"1996-06-15\",\"baptizedImmersion\":\"Yes\",\"baptizeddate\":\"1998-02-15\",\"spiritualgift\":\"Teaching, Administration, Encouragement, Prayer\",\"mobilenumber\":\"(+63) 912-428-9941\",\"contactdetails\":\"C-0000002\",\"homeaddress\":\"Ortigas\",\"country\":\"Philippines\",\"region\":\"National Capita Region\",\"city\":\"Muntinlupa City\",\"barangay\":\"Sucat\",\"occupation\":\"Senior Pastor\",\"industry\":\"Christian\",\"collegeschool\":\"De La Salle University\",\"collegedegree\":\"Bachelor Degree\",\"highschool\":\"Pasig High School\",\"purposereg\":\"Membership\",\"picture\":\"GCF-M-0000004.jpg\",\"prevchurch\":\"GCF Ortigas\",\"churchaffiliation\":\"Baptist\",\"memberstatus\":\"Active\",\"interviewby\":\"Elder Jun Espiritu\",\"membershipdate\":\"2025-09-17\",\"recForBaptism\":\"No\",\"recForMembership\":\"Yes\",\"comment\":\"Our beloved senior pastor.\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 11:26:54'),(7,'GCF-AUDIT-0000007','INSERT','pastors','GCF-M-0000004','','{\"pastorid\":\"GCF-PASTOR-0000001\",\"pastorlevel\":\"Senior Pastor\",\"memberid\":\"GCF-M-0000004\",\"churchid\":\"GCF-CHURCH-0000001\",\"satellitesid\":\"GCF-SATELLITE-0000001\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 11:38:29'),(8,'GCF-AUDIT-0000008','INSERT','pastors','GCF-M-0000004','','{\"pastorid\":\"GCF-PASTOR-0000001\",\"pastorlevel\":\"Senior Pastor\",\"memberid\":\"GCF-M-0000004\",\"churchid\":\"GCF-CHURCH-0000001\",\"satellitesid\":\"GCF-SATELLITE-0000001\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 11:44:08'),(9,'GCF-AUDIT-0000009','INSERT','members','GCF-M-0000005','','{\"memberid\":\"GCF-M-0000005\",\"lastname\":\"Magangat\",\"firstname\":\"Mark\",\"middlename\":\"\",\"nickname\":\"Macky\",\"gender\":\"Male\",\"emailaddress\":\"macky@gmail.com\",\"birthday\":\"1990-07-13\",\"age\":\"35\",\"lifestage\":\"Married\",\"facebookname\":\"Macky Magz\",\"spousename\":\"Olyn Magangat\",\"fathername\":\"Father Magangat\",\"mothername\":\"Mother Magangat\",\"receivedJesus\":\"2010-03-15\",\"baptizedImmersion\":\"Yes\",\"baptizeddate\":\"2012-02-15\",\"spiritualgift\":\"Teaching, music, encouragement, prayer\",\"mobilenumber\":\"(+63) 915-634-8654\",\"contactdetails\":\"C-0000002\",\"homeaddress\":\"Katar-katar\",\"country\":\"Philippines\",\"region\":\"National Capital Region\",\"city\":\"Muntinlupa City\",\"barangay\":\"Katarungan\",\"occupation\":\"Pastor\",\"industry\":\"Christian\",\"collegeschool\":\"De La Salle\",\"collegedegree\":\"Bachelor Degree\",\"highschool\":\"Baguio High School\",\"purposereg\":\"Membership\",\"picture\":\"\",\"prevchurch\":\"GCF Baguio\",\"churchaffiliation\":\"Baptist\",\"memberstatus\":\"Active\",\"interviewby\":\"Elder Jun Espiritu\",\"membershipdate\":\"2025-09-17\",\"recForBaptism\":\"No\",\"recForMembership\":\"Yes\",\"comment\":\"Senior Pastor of Bacoor\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 11:55:57'),(10,'GCF-AUDIT-0000010','INSERT','members','GCF-M-0000006','','{\"memberid\":\"GCF-M-0000006\",\"lastname\":\"Duco\",\"firstname\":\"Mike\",\"middlename\":\"\",\"nickname\":\"Mike\",\"gender\":\"Male\",\"emailaddress\":\"mikeduco@gmail.com\",\"birthday\":\"1992-05-01\",\"age\":\"33\",\"lifestage\":\"Married\",\"facebookname\":\"Mike Duco\",\"spousename\":\"Marianne Duco - Cena\",\"fathername\":\"Father Duco\",\"mothername\":\"Mother Duco\",\"receivedJesus\":\"2008-04-05\",\"baptizedImmersion\":\"Yes\",\"baptizeddate\":\"2010-09-17\",\"spiritualgift\":\"Teaching, music, encouragement, discipleship\",\"mobilenumber\":\"(+63) (+63) 965-45\",\"contactdetails\":\"C-0000002\",\"homeaddress\":\"Blk 1 Lot 2\",\"country\":\"Philippines\",\"region\":\"CALABARZON\",\"city\":\"Cavite\",\"barangay\":\"Bacoor\",\"occupation\":\"Pastor\",\"industry\":\"Christian\",\"collegeschool\":\"UP Diliman\",\"collegedegree\":\"Bachelor Degree\",\"highschool\":\"Bacoor High School\",\"purposereg\":\"Membership\",\"picture\":\"\",\"prevchurch\":\"GCF Bacoor\",\"churchaffiliation\":\"Baptist\",\"memberstatus\":\"Active\",\"interviewby\":\"Elder Jun Espiritu\",\"membershipdate\":\"2025-09-17\",\"recForBaptism\":\"No\",\"recForMembership\":\"Yes\",\"comment\":\"Previous Senior Pastor of Bacoor before Pastor Macky.\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 12:03:41'),(11,'GCF-AUDIT-0000011','INSERT','pastors','GCF-M-0000005','','{\"pastorid\":\"GCF-PASTOR-0000002\",\"pastorlevel\":\"Pastor\",\"memberid\":\"GCF-M-0000005\",\"churchid\":\"GCF-CHURCH-0000001\",\"satellitesid\":\"GCF-SATELLITE-0000001\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 12:25:50'),(12,'GCF-AUDIT-0000012','INSERT','pastors','GCF-M-0000006','','{\"pastorid\":\"GCF-PASTOR-0000003\",\"pastorlevel\":\"Pastor\",\"memberid\":\"GCF-M-0000006\",\"churchid\":\"GCF-CHURCH-0000001\",\"satellitesid\":\"GCF-SATELLITE-0000001\"}','GCF-U-0000002','Kevin Macandog','2025-09-17 12:27:18');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clustermembers` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `deacons` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `elders` */

insert  into `elders`(`id`,`elderid`,`memberid`,`churchid`,`satellitesid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`elderstatus`) values (1,'GCF-BOE-0000001','GCF-M-0000001','','','2025-11-25 23:20:14','',NULL,'','Active');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ggmembers` */

insert  into `ggmembers`(`id`,`ggMid`,`growthgroupid`,`ggmemberid`,`ggMtype`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-GGM-0000001','GCF-GG-0000002','GCF-M-0000001','','2025-09-17 13:15:34','',NULL,''),(2,'GCF-GGM-0000002','GCF-GG-0000001','GCF-M-0000003','','2025-09-17 13:15:49','',NULL,''),(3,'GCF-GGM-0000003','GCF-GG-0000001','GCF-M-0000002','','2025-11-25 23:21:45','',NULL,''),(4,'GCF-GGM-0000004','GCF-GG-0000003','GCF-M-0000002','','2026-02-02 11:16:53','',NULL,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `growthgroups` */

insert  into `growthgroups`(`id`,`growthgroupid`,`growthgroupname`,`growthgroupshortname`,`growthgroupleaderid`,`churchid`,`satelliteid`,`schedtype`,`dayschedule`,`timeschedule`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-GG-0000001','Charis','CGG','GCF-M-0000006','','','','Tuesday','19:00','2025-09-17 12:42:28','',NULL,''),(2,'GCF-GG-0000002','God First','GFGG','GCF-M-0000006','','','','Monday','19:00','2025-09-17 13:02:07','',NULL,'');

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

insert  into `idrecords`(`id`,`tablename`,`tablefield`,`tableid`,`dateadded`) values (1,'members','memberid','GCF-M-0000006','2024-09-18 10:14:11'),(2,'churches','churchid','GCF-CHURCH-0000001','2024-09-18 12:19:01'),(5,'satellites','satellitesid','GCF-SATELLITE-0000001','2024-09-18 13:34:01'),(6,'pastors','pastorid','GCF-PASTOR-0000003','2024-09-20 10:55:35'),(7,'memberchildren','childID','GCF-MC-0000008','2025-01-03 13:03:03'),(8,'elders','elderID','GCF-BOE-0000001','2025-01-07 11:02:01'),(9,'deacons','deaconID','GCF-BOD-0000000','2025-01-07 14:21:56'),(13,'clusters','clusterid','GCF-CLUSTER-0000000','2025-01-15 13:17:07'),(16,'growthgroups','growthgroupid','GCF-GG-0000015','2025-02-10 23:38:40'),(17,'usersaccounts','userid','GCF-U-0000002','2025-02-21 13:04:19'),(19,'ggmembers','ggMid','GCF-GGM-0000004','2025-03-18 12:43:34'),(20,'audittrails','auditID','GCF-AUDIT-0000012','2025-04-01 18:39:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `memberchildren` */

insert  into `memberchildren`(`id`,`childID`,`memberid`,`childname`,`childage`,`dateadded`,`useradded`,`dateupdated`,`userupdated`) values (1,'GCF-MC-0000001','GCF-M-0000002','Killua Macandog',1,'2025-09-17 10:17:46','',NULL,''),(2,'GCF-MC-0000002','GCF-M-0000003','Mic Isabel Macandog',4,'2025-09-17 11:17:09','',NULL,''),(3,'GCF-MC-0000003','GCF-M-0000003','JynMic Macandog',2,'2025-09-17 11:17:09','',NULL,''),(4,'GCF-MC-0000004','GCF-M-0000003','Aizel Macandog',1,'2025-09-17 11:17:09','',NULL,''),(5,'GCF-MC-0000005','GCF-M-0000004','Martin Villoria',30,'2025-09-17 11:26:54','',NULL,''),(6,'GCF-MC-0000006','GCF-M-0000004','Ryan Villoria',30,'2025-09-17 11:26:54','',NULL,''),(7,'GCF-MC-0000007','GCF-M-0000005','Marcus Magangat',16,'2025-09-17 11:55:57','',NULL,''),(8,'GCF-MC-0000008','GCF-M-0000005','Caleb Magangat',13,'2025-09-17 11:55:57','',NULL,'');

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
  `ggLeader` char(3) NOT NULL DEFAULT '' COMMENT 'Yes - if True',
  `ggTimothy` char(3) NOT NULL DEFAULT '' COMMENT 'Yes - if True',
  `ggMember` char(3) NOT NULL DEFAULT '' COMMENT 'Yes - if True',
  `memberLevel` varchar(8) DEFAULT 'Level 5' COMMENT 'Level 1-5',
  `memberLvlTitle` varchar(15) DEFAULT 'Non-GG Member' COMMENT 'Level 1(Senior Pastor), Level 2(Pastor, Elder, Deacon), Level 3(GG Leader & Cluster Leader), Level 4(GG Member), Level 5(Non-Member & Non-GG Member)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`id`,`memberid`,`nickname`,`lastname`,`firstname`,`middlename`,`username`,`password`,`emailaddress`,`spousename`,`fathername`,`mothername`,`facebookname`,`gender`,`birthday`,`age`,`lifestage`,`mobilenumber`,`contactdetails`,`homeaddress`,`country`,`region`,`city`,`barangay`,`occupation`,`industry`,`collegeschool`,`collegedegree`,`highschool`,`receivedJesus`,`baptizedImmersion`,`baptizeddate`,`spiritualgift`,`picture`,`purposereg`,`prevchurch`,`churchaffiliation`,`satelliteid`,`memberposition`,`memberstatus`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`interviewby`,`membershipdate`,`recForBaptism`,`recForMembership`,`comment`,`ggLeader`,`ggTimothy`,`ggMember`,`memberLevel`,`memberLvlTitle`) values (1,'GCF-M-0000001','Kevs','Macandog','Kevin','Francisco','','','kevinrehan16@gmail.com','','Eler Macandog','Rowena Francisco','Kevin Godnacam','Male','1995-07-06',30,'Single','(+63) 915-316-9518','C-0000002','#343 Zone 2 Sitio Pagkakaisa','Philippines','National Capital Region','Muntinlupa City','Sucat','Senior Software Developer','Software Industry','Pamantasan Ng Lungsod Ng Muntinlupa','Bachelor Degree','Pedro E. Diaz','2015-04-15','Yes','2015-04-15','Teaching, Encouragement','GCF-M-0000001.jpg','Membership','Tunasan Word Of Truth Church','Penticostal','','','Active','2025-09-17 10:15:01','','0000-00-00 00:00:00','','Elder Jun Espiritu','2025-09-17','No','Yes','Two years na sya active sa church and ministry.','','','Yes','Level 2','Elder'),(2,'GCF-M-0000002','Shan','Macandog','Sean Carlo','Francisco','','','shan@gmail.com','Marielle Rojo','Eler Macandog','Rowena Francisco','Shan Macandog','Male','1997-01-24',28,'LiveIn','(+63) 915-316-9518','C-0000002','#343 Zone 2 Sitio Pagkakaisa','Philippines','National Capital Region','Muntinlupa City','Sucat','Administrative Assistant V','Government Industry','Pamantasan Ng Lungsod Ng Muntinlupa','Bachelor Degree','Pedro E. Diaz','2015-04-15','Yes','2015-04-15','Teaching, Encouragement','GCF-M-0000002.jpg','Membership','Tunasan Word Of Truth Church','Penticostal','','','Active','2025-09-17 10:17:46','','0000-00-00 00:00:00','','Elder Jun Espiritu','2025-09-17','Yes','Yes','Bunsong kapatid ni Kevin Macandog','','','Yes','Level 4','GG Member'),(3,'GCF-M-0000003','Mic','Macandog','Mico','Francisco','','','mico@gmail.com','Jynelle Macandog - Natad','Eler Macandog','Rowena Francisco','Mico Macandog','Male','1996-12-23',28,'Married','(+63) 918-559-6799','C-0000002','#343 Zone 2 Sitio Pagkakaisa ','Philippines','National Capital Region','Muntinlupa City','Sucat','Data Analyst','IT Industry','Pamantasan Ng Lungsod Ng Muntinlupa','Bachelor Degree','Pedro E Diaz','2018-02-25','Yes','2019-04-01','Singing','GCF-M-0000003.jpg','Membership','Tunasan Word Of Truth Church','Penticostal','','','Active','2025-09-17 11:13:41','','0000-00-00 00:00:00','','Elder Jun Espiritu','2025-09-17','No','Yes','Kapatid ni Kevin and Shan','','','Yes','Level 4','GG Member'),(4,'GCF-M-0000004','Lito','Villoria','Lito','','','','lito.villoria@gmail.com','Linda Villoria','Father Villoria','Mother Villoria','Lito Villoria','Male','1970-05-17',55,'Married','(+63) 912-428-9941','C-0000002','Ortigas','Philippines','National Capita Region','Muntinlupa City','Sucat','Senior Pastor','Christian','De La Salle University','Bachelor Degree','Pasig High School','1996-06-15','Yes','1998-02-15','Teaching, Administration, Encouragement, Prayer','GCF-M-0000004.jpg','Membership','GCF Ortigas','Baptist','','','Active','2025-09-17 11:26:54','','0000-00-00 00:00:00','','Elder Jun Espiritu','2025-09-17','No','Yes','Our beloved senior pastor.','','','','Level 1','Senior Pastor'),(5,'GCF-M-0000005','Macky','Magangat','Mark','','','','macky@gmail.com','Olyn Magangat','Father Magangat','Mother Magangat','Macky Magz','Male','1990-07-13',35,'Married','(+63) 915-634-8654','C-0000002','Katar-katar','Philippines','National Capital Region','Muntinlupa City','Katarungan','Pastor','Christian','De La Salle','Bachelor Degree','Baguio High School','2010-03-15','Yes','2012-02-15','Teaching, music, encouragement, prayer','GCF-M-0000005.jpg','Membership','GCF Baguio','Baptist','','','Active','2025-09-17 11:55:57','','0000-00-00 00:00:00','','Elder Jun Espiritu','2025-09-17','No','Yes','Senior Pastor of Bacoor','Yes','','','Level 2','Pastor'),(6,'GCF-M-0000006','Mike','Duco','Mike','','','','mikeduco@gmail.com','Marianne Duco - Cena','Father Duco','Mother Duco','Mike Duco','Male','1992-05-01',33,'Married','(+63) 978-965-4578','C-0000002','Blk 1 Lot 2','Philippines','CALABARZON','Cavite','Bacoor','Pastor','Christian','UP Diliman','Bachelor Degree','Bacoor High School','2008-04-05','Yes','2010-09-17','Teaching, music, encouragement, discipleship','GCF-M-0000006.jpg','Membership','GCF Bacoor','Baptist','','','Active','2025-09-17 12:03:40','','0000-00-00 00:00:00','','Elder Jun Espiritu','2025-09-17','No','Yes','Previous Senior Pastor of Bacoor before Pastor Macky.','Yes','','','Level 2','Pastor');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pastors` */

insert  into `pastors`(`id`,`pastorid`,`pastorlevel`,`memberid`,`churchid`,`satellitesid`,`dateadded`,`useradded`,`dateupdated`,`userupdated`,`pastorstatus`) values (1,'GCF-PASTOR-0000001','Senior Pastor','GCF-M-0000004','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2025-09-17 11:44:08','',NULL,'','Active'),(2,'GCF-PASTOR-0000002','Pastor','GCF-M-0000005','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2025-09-17 12:25:50','',NULL,'','Active'),(3,'GCF-PASTOR-0000003','Pastor','GCF-M-0000006','GCF-CHURCH-0000001','GCF-SATELLITE-0000001','2025-09-17 12:27:18','',NULL,'','Active');

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
