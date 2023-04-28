/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.4.17-MariaDB : Database - alumni
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alumni_tracer` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `alumni_tracer`;

/*Table structure for table `addresses` */

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `address_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `country_boarding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_boarding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_boarding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_boarding` int(11) DEFAULT NULL,
  `brgy_boarding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode_boarding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_work` int(11) DEFAULT NULL,
  `brgy_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_perm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_perm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_perm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_perm` int(11) DEFAULT NULL,
  `brgy_perm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode_perm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `addresses_user_id_foreign` (`user_id`),
  CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `addresses` */

insert  into `addresses`(`address_id`,`user_id`,`country_boarding`,`province_boarding`,`city_boarding`,`district_boarding`,`brgy_boarding`,`zipcode_boarding`,`country_work`,`province_work`,`city_work`,`district_work`,`brgy_work`,`zipcode_work`,`country_perm`,`province_perm`,`city_perm`,`district_perm`,`brgy_perm`,`zipcode_perm`,`created_at`,`updated_at`) values 
(1,8,'Malaysia','Misamis Occidental','Tangub',1,'Maloro','7214','Philippines','Misamis Occidental','Tangub',1,'Maloro','7214','Philippines','Misamis Occidental','Tangub',1,'Maloro','7214','2021-05-30 07:43:14','2021-05-30 07:43:14'),
(2,2,'Philippines','Misamis Occidental','Clarin',12,'Maloro','7214','Philippines','Misamis Occidental','Clarin',3,'Maloro','7214','Philippines','Misamis Occidental','Tangub',1,'Maloro','7214','2021-05-30 07:45:48','2021-05-30 07:45:48'),
(3,4,'Malaysia','Misamis Occidental','Tangub',NULL,'Maloro','7214','Philippines','Misamis Occidental','Clarin',NULL,'Maloro','7214','Philippines','Misamis Occidental','Clarin',NULL,'Maloro','7214','2021-05-30 07:48:26','2021-05-30 07:48:26'),
(4,3,'Philippines','Misamis Occidental','Clarin',NULL,'Maloro','7214','Malaysia','Misamis Occidental','Tangub',NULL,'Maloro','7214','Malaysia','Misamis Occidental','Tangub',NULL,'Maloro','7215','2021-05-30 07:50:49','2021-05-30 07:50:49'),
(5,7,'Philippines','Misamis Occidental','Clarin',NULL,'Maloro','7214','Malaysia','Misamis Occidental','Tangub',NULL,'Maloro','7211','Malaysia','Misamis Occidental','Tangub',NULL,'Maloro','7211','2021-05-30 07:52:37','2021-05-30 07:52:37'),
(6,10,'Philippines','Misamis Occidental','Tangub',NULL,'Maloro','7214',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-30 10:42:49','2021-05-30 10:42:49');

/*Table structure for table `educations` */

DROP TABLE IF EXISTS `educations`;

CREATE TABLE `educations` (
  `education_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `year_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`education_id`),
  KEY `educations_user_id_foreign` (`user_id`),
  CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `educations` */

insert  into `educations`(`education_id`,`user_id`,`level`,`school_name`,`remark`,`unit`,`year_graduated`,`created_at`,`updated_at`) values 
(1,8,'POST GRADUATE','JRMSU','Cum Laude',6,'2019','2021-05-30 07:42:36','2021-05-30 07:42:36'),
(2,2,'VOCATIONAL','TESDA','NC 100 - Programming',1,'2020','2021-05-30 07:45:02','2021-05-30 07:45:02'),
(3,2,'POST GRADUATE','JRMSU','Master in Jack of All Trades',45,'2023','2021-05-30 07:45:02','2021-05-30 07:45:02'),
(4,4,'POST GRADUATE','MSU','Master in Vulcanizing',23,'2020','2021-05-30 07:48:01','2021-05-30 07:48:01'),
(5,3,'TERTIARY','Saint Paul Academy','Priest',44,'2020','2021-05-30 07:50:19','2021-05-30 07:50:19'),
(6,10,'POST GRADUATE','DUTERTE','Cum Laude',33,'2013','2021-05-30 10:43:18','2021-05-30 10:43:18');

/*Table structure for table `eligibilities` */

DROP TABLE IF EXISTS `eligibilities`;

CREATE TABLE `eligibilities` (
  `eligibility_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `eligible` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_acquired` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`eligibility_id`),
  KEY `eligibilities_user_id_foreign` (`user_id`),
  CONSTRAINT `eligibilities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `eligibilities` */

insert  into `eligibilities`(`eligibility_id`,`user_id`,`eligible`,`date_acquired`,`rating`,`license_id`,`created_at`,`updated_at`) values 
(1,8,'NPA','2019','99','NPA123','2021-05-30 07:42:57','2021-05-30 07:42:57'),
(2,2,'MILF','2020','99','MILF123','2021-05-30 07:45:23','2021-05-30 07:45:23'),
(3,4,'PRC','2020','99','123456','2021-05-30 07:48:14','2021-05-30 07:48:14'),
(4,3,'Priesthood','2020','77','PR123456','2021-05-30 07:50:37','2021-05-30 07:50:37'),
(5,7,'PRC','2020','99','123456AASD','2021-05-30 07:52:26','2021-05-30 07:52:26'),
(6,10,'NPA','2020','99','NPA1234','2021-05-30 10:43:34','2021-05-30 10:43:34');

/*Table structure for table `employments` */

DROP TABLE IF EXISTS `employments`;

CREATE TABLE `employments` (
  `employment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `is_employed` tinyint(1) DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_from` int(11) DEFAULT NULL,
  `year_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_job` tinyint(1) DEFAULT NULL,
  `employment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_first_job` tinyint(1) DEFAULT NULL,
  `work_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `take_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leaving_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `find_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satisfy_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `growth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_earned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`employment_id`),
  KEY `employments_user_id_foreign` (`user_id`),
  CONSTRAINT `employments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employments` */

insert  into `employments`(`employment_id`,`user_id`,`is_employed`,`organization`,`designation`,`year_from`,`year_to`,`current_job`,`employment_type`,`occupation_type`,`is_first_job`,`work_category`,`take_job`,`monthly_range`,`leaving_job`,`find_job`,`satisfy_job`,`growth`,`degree_earned`,`created_at`,`updated_at`) values 
(1,8,1,'GADTC','Instrctor 1',2020,'Present',1,'Contractual','Government',1,'Local','1 to 6 months','10,000 - 15,000',NULL,'Offered by an employer','4 - very highly','4 - very highly','4 - very highly','2021-05-30 07:43:49','2021-05-30 07:43:49'),
(2,2,1,'Tangub City Hall','Cashier',2020,'Present',0,'Contractual','Government',1,'Local','1 to 6 months','20,000 - 30,0000',NULL,'Recommended by the school alumni','3 - highly','3 - highly','3 - highly','2021-05-30 07:46:21','2021-05-30 07:46:21'),
(3,4,1,'Jomar Vulcanizing Shop','Proprietor',2020,'Present',0,'Regular','Non-Government',0,'Local','1 to 6 months','20,000 - 30,0000',NULL,'Information from friends','4 - very highly','4 - very highly','3 - highly','2021-05-30 07:49:08','2021-05-30 07:49:08'),
(4,3,0,NULL,NULL,NULL,NULL,0,NULL,NULL,1,'Local',NULL,NULL,NULL,NULL,NULL,'4 - very highly','4 - very highly','2021-05-30 07:51:20','2021-05-30 10:10:57'),
(5,7,0,NULL,'Housewife',NULL,NULL,NULL,NULL,NULL,0,'Local',NULL,NULL,NULL,NULL,NULL,'4 - very highly','4 - very highly','2021-05-30 07:52:52','2021-05-30 07:52:52'),
(6,5,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Local',NULL,NULL,NULL,NULL,NULL,'3 - highly','2 - fairly','2021-05-30 07:54:05','2021-05-30 07:54:05'),
(7,10,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'Local',NULL,NULL,NULL,NULL,NULL,'4 - very highly','4 - very highly','2021-05-30 10:43:52','2021-05-30 10:43:52');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(18,'2021_05_22_141635_create_courses_table',1),
(144,'2014_10_12_000000_create_users_table',2),
(145,'2014_10_12_100000_create_password_resets_table',2),
(146,'2019_08_19_000000_create_failed_jobs_table',2),
(147,'2021_05_09_015959_create_news_feeds_table',2),
(148,'2021_05_16_084624_create_educations_table',2),
(149,'2021_05_16_110449_create_eligibities_table',2),
(150,'2021_05_22_034134_create_addresses_table',2),
(151,'2021_05_22_074525_create_employments_table',2),
(152,'2021_05_22_141635_create_programs_table',2);

/*Table structure for table `news_feeds` */

DROP TABLE IF EXISTS `news_feeds`;

CREATE TABLE `news_feeds` (
  `news_feed_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`news_feed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `news_feeds` */

insert  into `news_feeds`(`news_feed_id`,`news`,`created_at`,`updated_at`) values 
(1,'this is no 1 sample news/events',NULL,NULL),
(2,'this is no 2 sample news/events',NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `programs` */

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `program_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `programs` */

insert  into `programs`(`program_id`,`program`,`program_desc`,`created_at`,`updated_at`) values 
(1,'BEED','Bachelor of Science in Elementary Education',NULL,NULL),
(2,'BSED-MATH','Bachelor of Science in Secondary Education Major in Mathematics',NULL,NULL),
(3,'BSCS','Bachelor of Science in Computer Science',NULL,NULL),
(4,'AB-POLSCI','BACHELOR OF ARTS IN POLITICAL SCIENCE','2021-05-30 07:23:19','2021-05-30 07:40:49'),
(5,'AB-ENGLISH','BACHELOR OF ARTS IN ENGLISH','2021-05-30 07:23:38','2021-05-30 07:40:55');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_graduated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`lname`,`fname`,`mname`,`sex`,`contact_number`,`email`,`role`,`program`,`year_graduated`,`profile_image`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','PENAS','BERNARD','SABALA','MALE','09123456789','penas@gmail.com','ADMIN','BSCS',NULL,NULL,NULL,'$2y$10$DgN7Wzg/ArfiH3rFUgZthOf17gj2b.lCVmDjFWXxJcrswDHMy9M7G',NULL,NULL,NULL),
(2,'alumni','CABASAG','MARITCHO','ANTIPUESTOSSS','MALE','09123456784','cabasag@gmail.com','ALUMNI','BSCS','2015','storage/profile_image/88ZCngG1CkJHUjWYNUPX0z6MgBBmTZGIzt1vOZI2.jpg',NULL,'$2y$10$JpxcDCRcxjCRk3CyIaMGSufYv3gBzjuiNpbJPbhuYvj3ZNUsXvd/C',NULL,NULL,'2021-05-30 01:00:26'),
(3,'cabrera','CABRERA','SIRFRED','GEE','MALE','123456789123','cabrera@gmail.com','ALUMNI','AB-POLSCI','2020','storage/profile_image/gXPxPXpRt4URICj58eyyIWZiisNr1ZTwhz6mgxne.jpg',NULL,'$2y$10$Blsk2koU6MZdwrGa3wEdoe3x4sGQDQg/2q2JSd55WUIT9.1w120ZW',NULL,'2021-05-30 07:14:58','2021-05-30 07:49:54'),
(4,'jomar','CALUNSAG','JOMAR','B','MALE','9988774455','jomar@gmail.com','ALUMNI','AB-POLSCI','2020','storage/profile_image/law9PBKUjJEUzIeGvO6zI8iidWrmoZWjqJJQcszI.jpg',NULL,'$2y$10$dE5Po3YvPUE253E6Xb0.zuwWqw3P3og.YEtqQ9BovCwgeTKD29Fji',NULL,'2021-05-30 07:17:23','2021-05-30 07:47:34'),
(5,'laranjo','LARANJO','DENLOYRN','B','FEMALE','4745561237','laranjo@gmail.com','ALUMNI','AB-POLSCI','2020','storage/profile_image/KChh39JnydbBpiwyrQZEreIbJBLa41qDgtBklJlq.jpg',NULL,'$2y$10$OFHWQv.XBeWMCLG7A1N7euURE3lQM5FKdNAm4G6H0kEm3AOLH/nJu',NULL,'2021-05-30 07:17:57','2021-05-30 07:53:44'),
(6,'alab','Alab','Marv','T','MALE','123456789','alab@gmail.com','ALUMNI',NULL,NULL,NULL,NULL,'$2y$10$qwkoQ5aHoctuZIHvoX2YaeoClZtCcJY2MZ7Foui0En/VLMLaoav1W',NULL,'2021-05-30 07:22:41','2021-05-30 07:22:41'),
(7,'duerme','DUERMA','CHELLA','R','FEMALE','12345678911','duerme@gmail.com','ALUMNI','BSED-MATH','2020','storage/profile_image/CvK7eouBzl2uaxU7KZpQB0lPIusTCotJgmrXcRhw.jpg',NULL,'$2y$10$A8fDjOr7vqaa.sFzSAgyeetX2XkuB.PKIE5gJ8tykf0WqVKp6nbGq',NULL,'2021-05-30 07:24:06','2021-05-30 07:52:05'),
(8,'canulo','CANULO','JC','S','MALE','123456789123','canulo@gmail.com','ALUMNI','BEED','2019','storage/profile_image/N5O0PObxMI8ShWRbfJRP6U42xS2coqcUAYaow6bL.jpg',NULL,'$2y$10$bcNEPXX42qNTaOMu1ZvYPOqKkO7qJ4jwOiU5P/uSknV2AzW1rC50C',NULL,'2021-05-30 07:25:29','2021-05-30 07:26:29'),
(9,'buhat','DUTERTE','RODRIGO','ROA','MALE','2134897489','rodrigo@gc','ALUMNI','BEED','2016','storage/profile_image/RkixvfjL1aE8rmFZ5WsLHrs4BQoWbxLgUQcwnbsr.jpg',NULL,'$2y$10$MpOrowQVeVf.H4vNVYUBl.KSpY5PKYQL.x6GFSg/4vpyQo7msxwWy',NULL,'2021-05-30 10:34:31','2021-05-30 10:37:53'),
(10,'leni','ROBREDO','LENI','SANTOS','FEMALE','31651112','leni@jc','ALUMNI','BSCS','2018','storage/profile_image/m3qfHc3hpT6xTeBJse8IRbTpAfNpU1BJ0gBrjrjJ.jpg',NULL,'$2y$10$0fHtWYnMJRljZPGqpV4.n.LPi.IUGXq.hZr7gd/aqUzesCgHKZ5Xi',NULL,'2021-05-30 10:39:24','2021-05-30 11:14:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
