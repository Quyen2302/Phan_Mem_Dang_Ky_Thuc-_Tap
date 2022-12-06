/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - sinh_vien
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sinh_vien` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sinh_vien`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2020_10_21_084534_create_permission_tables',1),(47,'2021_07_22_160207_create_nguon_tin_table',2),(48,'2021_07_22_160516_create_chuyen_muc_tin_table',2),(57,'2021_07_22_160617_create_the_loai_table',3),(65,'2021_07_24_130053_create_bai_viet_chi_tiet',4),(72,'2021_07_24_152120_create_bai_viet',5),(73,'2021_08_05_231302_create_table_ky_xuat_ban',5),(74,'2021_08_05_231556_create_table_ky_xuat_ban_chi_tiet',5),(75,'2021_08_09_145321_add_colom_da_thiet_ke_table_bai_viet',5),(76,'2021_08_09_170135_add_colum_xuong_in_chi_tiet',5),(77,'2021_08_09_221606_add_colum_xuong_in_tl',5),(78,'2021_10_08_162012_add_colum_bien_tap_id',6),(79,'2021_10_13_111500_add_colume_bt_chuyen',7),(80,'2021_11_24_195025_create_tuy_chon',8),(81,'2021_11_24_195120_create_gia_tien_bv',8),(82,'2021_11_24_195441_create_don_gia',8),(83,'2021_11_24_195951_add_colume_he_so_to_the_loai_tin',8),(84,'2021_11_30_134434_create_y_kien_xuat_ban',8),(85,'2021_11_30_140832_add_colume_parent_id',8),(86,'2021_12_01_202850_add_colume_lan_y_kien',8),(87,'2021_12_02_224719_add_colume_parenid_phien_ban',9),(88,'2021_12_21_171528_add_colume_the_loai_bao',10),(89,'2021_12_21_171613_create_the_loai_bao',10),(90,'2022_02_16_161226_create_to_chuc',11),(92,'2022_02_16_163753_add_colume_don_vi_id',12),(94,'2022_03_10_142610_create_the_loai_nhuan_but',13),(95,'2022_03_10_155204_add_colum_the_loai_nhuan_but',14),(97,'2022_03_21_143833_add_colume_mac_dinh',15),(98,'2022_04_07_154702_create_thong_ke_nhuan_but',16),(100,'2022_04_21_112411_add_colume_ke_toan',17),(107,'2022_04_21_160441_create_don_vi_quang_cao',18),(108,'2022_04_21_160629_create_goi_quang_cao',18),(110,'2022_04_21_160940_create_file_anh_quang_cao',19),(111,'2022_04_22_101843_create_anh_quang_cao_trong_ky',20);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `model_has_permissions` */

insert  into `model_has_permissions`(`permission_id`,`model_type`,`model_id`) values (1,'App\\User',1),(1,'App\\User',57),(1,'App\\User',58),(1,'App\\User',59),(2,'App\\User',1),(2,'App\\User',57),(2,'App\\User',58),(2,'App\\User',59),(3,'App\\User',1),(3,'App\\User',57),(3,'App\\User',58),(3,'App\\User',59),(4,'App\\User',57),(4,'App\\User',58),(4,'App\\User',59),(5,'App\\User',57),(5,'App\\User',58),(5,'App\\User',59),(6,'App\\User',25),(6,'App\\User',28),(6,'App\\User',30),(6,'App\\User',31),(6,'App\\User',57),(6,'App\\User',58),(6,'App\\User',59);

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\User',1),(1,'App\\User',57),(1,'App\\User',58),(1,'App\\User',59),(2,'App\\User',3),(2,'App\\User',4),(2,'App\\User',23),(2,'App\\User',36),(2,'App\\User',37),(2,'App\\User',38),(2,'App\\User',39),(2,'App\\User',40),(2,'App\\User',41),(2,'App\\User',42),(2,'App\\User',43),(2,'App\\User',44),(2,'App\\User',45),(2,'App\\User',47),(2,'App\\User',49),(2,'App\\User',50),(2,'App\\User',51),(2,'App\\User',52),(2,'App\\User',53),(2,'App\\User',54),(2,'App\\User',55),(3,'App\\user',5),(3,'App\\User',6),(3,'App\\User',33),(3,'App\\User',34),(3,'App\\User',35),(3,'App\\User',48),(4,'App\\User',7),(4,'App\\User',8),(4,'App\\User',13),(4,'App\\User',19),(4,'App\\User',25),(4,'App\\User',28),(4,'App\\User',30),(4,'App\\User',31),(5,'App\\User',9),(5,'App\\User',11),(5,'App\\User',20),(5,'App\\User',21),(5,'App\\User',22),(6,'App\\User',12),(6,'App\\User',46),(7,'App\\User',14),(7,'App\\User',18),(8,'App\\User',17),(9,'App\\User',15),(9,'App\\User',26),(9,'App\\User',27),(9,'App\\User',29),(10,'App\\User',10),(10,'App\\User',16),(10,'App\\User',24),(10,'App\\User',32),(11,'App\\User',56);

/*Table structure for table `nguon_tin` */

DROP TABLE IF EXISTS `nguon_tin`;

CREATE TABLE `nguon_tin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_nguon_tin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_nguon_tin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `nguon_tin` */

insert  into `nguon_tin`(`id`,`ten_nguon_tin`,`ma_nguon_tin`,`mo_ta`,`sort`,`status`,`created_at`,`updated_at`) values (1,'Tin sở hữu','00','a','1',1,'2021-09-14 04:16:39','2022-04-12 12:11:34'),(2,'Báo Đảng','01','a','a',1,'2021-12-04 02:04:30','2021-12-04 02:04:30'),(3,'Tạp chí kiểm tra','02','a','a',1,'2021-12-04 02:04:51','2021-12-04 02:04:51'),(4,'Tạp chí đối ngoại','03','a','a',1,'2021-12-04 02:05:06','2021-12-04 02:05:06');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`parent_id`,`guard_name`,`created_at`,`updated_at`) values (1,'thêm người dùng',4,'web','2021-07-22 06:42:49','2022-04-08 06:43:05'),(2,'sửa người dùng',4,'web','2021-07-22 06:42:49','2022-04-08 06:43:05'),(3,'xoá người dùng',4,'web','2021-07-22 06:42:49','2022-04-08 06:43:05'),(4,'Người dùng',NULL,'web','2021-07-22 06:43:13','2021-07-22 06:43:13'),(5,'Nhuận bút',NULL,'web','2022-04-08 06:43:05','2022-04-08 06:43:05'),(6,'Chấm nhuận bút',5,'web','2022-04-08 06:43:05','2022-04-08 06:43:05');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(6,4);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'quản trị hệ thống','web','2021-07-22 06:42:49','2021-07-22 06:42:49'),(12,'Nhân viên','web','2022-09-23 16:12:52','2022-09-23 16:12:52'),(13,'Sinh viên','web','2022-09-23 16:13:11','2022-09-23 16:13:11'),(14,'Cán bộ nhà trường','web','2022-09-23 16:13:38','2022-09-23 16:13:38');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=> hoat dong',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `don_vi_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap_xa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`fullname`,`birthday`,`role_id`,`avatar`,`status`,`deleted_at`,`remember_token`,`created_at`,`updated_at`,`don_vi_id`,`cap_xa`) values (1,'admin','admin@gmail.com','$2y$10$pzrYP9YAwjBDBb8DbGhFFeIpzZfP.bcllzJGiv91Ya/dYxst5bF/.','Vũ Hải Thanh','2021-07-20','1','uploads/nguoi-dung/2021_07_21_1626878410_370_fw__SN-TC_005.jpg',1,NULL,'kSB9GV6ifyfSm2t5kqp3nYnPN2KCzzrUgQFknAyabRMmpKgxXOdB5P3D6R4d',NULL,'2021-07-22 11:40:10',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
