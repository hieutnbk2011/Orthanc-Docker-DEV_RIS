# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.23)
# Database: laravel
# Generation Time: 2021-03-04 04:18:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dicom_uploads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dicom_uploads`;

CREATE TABLE `dicom_uploads` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uploader_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploader_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orthanc_uuid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StudyInstanceUID` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `AccessionNumber` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StudyDate` date DEFAULT NULL,
  `StudyTime` time DEFAULT NULL,
  `ReferringPhysicianName` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `InstitutionName` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `StudyDescription` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `PatientID` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `OtherPatientIDs` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `PatientName` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `PatientBirthDate` date DEFAULT NULL,
  `PatientSex` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ImagesInAcquisition` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Modality` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `dicom_uploads` WRITE;
/*!40000 ALTER TABLE `dicom_uploads` DISABLE KEYS */;

INSERT INTO `dicom_uploads` (`id`, `uploader_id`, `uploader_name`, `orthanc_uuid`, `StudyInstanceUID`, `AccessionNumber`, `StudyDate`, `StudyTime`, `ReferringPhysicianName`, `InstitutionName`, `StudyDescription`, `PatientID`, `OtherPatientIDs`, `PatientName`, `PatientBirthDate`, `PatientSex`, `ImagesInAcquisition`, `Modality`, `upload_datetime`)
VALUES
	(228,'1','sscotti','ad1d247b-6e0a0a02-98880beb-460a2261-d25594b2','1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568','','2007-01-01','12:00:00','','','Knee (R)','a83db7f7-0b26-49c2-a92f-484c5c06bc98','a83db7f7-0b26-49c2-a92f-484c5c06bc98|1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568|1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568','Anonymized1','1970-01-01','','1','MR','2021-03-01 12:47:31'),
	(229,'1','sscotti','d9b6b774-e207cfaf-08130898-4b852ffe-5143b603','1.3.46.670589.11.0.1.1996082307380006','DEVACC00000010','2020-09-24','00:00:00','0002:SCOTTI^STEPHEN^D^^M.D','','','DEV0000004','DEV0000004|DEVACC00000010|1.3.46.670589.11.0.1.1996082307380006','Annular Pancreas','1901-01-01','','1','OT','2021-03-02 17:04:08'),
	(230,'1','sscotti','ad1d247b-6e0a0a02-98880beb-460a2261-d25594b2','1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568','','2007-01-01','12:00:00','','','Knee (R)','a83db7f7-0b26-49c2-a92f-484c5c06bc98','a83db7f7-0b26-49c2-a92f-484c5c06bc98|1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568|1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568','Anonymized1','1970-01-01','','1','MR','2021-03-02 17:04:08'),
	(231,'1','sscotti','46d287d6-3f7f988f-18eca55f-7078bdf9-028e9a0b','1.2.276.0.7230010.3.1.2.2831156000.1.1499097864.742572','','2007-01-01','12:00:00','','','Knee (R)','72bbacac-96b8-48b0-884e-35a48e1f6dd7','','Anonymized2','1970-01-01','','1','MR','2021-03-02 17:04:08'),
	(232,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-02 17:04:08'),
	(233,'1','sscotti','e96166c9-5d3d2c44-05cc2f7b-9e3c1946-3cf04632','1.2.276.0.50.192168001092.11156604.14547392.4','DEVACC00000003','2001-01-01','10:22:33','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','MRT Oberbauch','DEV0000003','','Fall 3','1900-01-01','O','7','MR','2021-03-02 17:04:08'),
	(234,'1','sscotti','bf0707f1-f5e38732-3ca330c1-be99efef-9afed18e','1.2.276.0.50.192168001099.8687553.14547392.4','DEVACC00000004','2001-01-01','11:42:44','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','MRT Schädel','DEV0000003','','Fall 4','1900-01-01','O','30','MR','2021-03-02 17:04:08'),
	(235,'1','sscotti','0481b781-6bb968a2-f387954f-45ef4906-56380937','1.3.76.2.1.1.4.1.2.5310.511611607','DEVACC00000005','2016-04-18','11:20:07','0002:SCOTTI^STEPHEN^D^^M.D','MR Open stehend','','DEV0000002','','G_Au_Brain_Meningeom^','2016-01-01','F','77','MR','2021-03-02 17:04:08'),
	(236,'1','sscotti','013cf8c2-c32e3628-67eb9cbf-9b704655-1fe39f8c','1.3.76.2.1.1.4.1.2.5310.512380500','DEVACC00000006','2016-04-27','08:55:10','0002:SCOTTI^STEPHEN^D^^M.D','MR Open stehend','','DEV0000002','','G_Au_Brain_MS^','2016-01-01','F','255','MR','2021-03-02 17:04:08'),
	(237,'1','sscotti','b9c08539-26f93bde-c81ab0d7-bffaf2cb-a4d0bdd0','1.2.840.113619.2.176.2025.1499492.7391.1171285944.390','','2007-01-01','12:00:00','1','0ECJ52puWpVIjTuhnBA0um','Knee (R)','ozp00SjY2xG','','KNIX','1970-01-01','','26','MR,OT','2021-03-02 17:04:08'),
	(238,'1','sscotti','e6596260-fdf91aa9-0257a3c2-4778ebda-f2d56d1b','1.3.46.670589.11.0.1.1996021610440011','OutsideStudy','2020-04-23','15:26:10','','MM07R R4.3','SHOULDER','DEV0000003','DEV0000003|OutsideStudy|MM07R R4.3','Test^Patient','1970-01-01','','1','MR','2021-03-02 17:04:08'),
	(239,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-02 17:06:40'),
	(240,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-02 17:09:02'),
	(241,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 00:24:36'),
	(242,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 00:24:50'),
	(243,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 02:42:35'),
	(244,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 02:44:04'),
	(245,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 02:44:21');

/*!40000 ALTER TABLE `dicom_uploads` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dicom_uploads_temp
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dicom_uploads_temp`;

CREATE TABLE `dicom_uploads_temp` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uploader_id` int unsigned DEFAULT NULL,
  `uploader_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_index` int DEFAULT NULL,
  `aborted_flag` tinyint DEFAULT NULL,
  `utc_hit_json` json DEFAULT NULL,
  `study_uuid_json` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
	(4,'2019_08_19_000000_create_failed_jobs_table',1),
	(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(6,'2020_05_21_100000_create_teams_table',1),
	(7,'2020_05_21_200000_create_team_user_table',1),
	(8,'2020_09_11_145344_create_sessions_table',1),
	(9,'2018_07_14_183253_ratings',2),
	(10,'2021_03_02_051327_create_team_invitations_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orthanc_hosts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orthanc_hosts`;

CREATE TABLE `orthanc_hosts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `AET` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nginx_admin_url` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_url` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osimis_viewer_link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osimis_viewer_check` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osimis_viewer_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_viewer` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orthanc_hosts` WRITE;
/*!40000 ALTER TABLE `orthanc_hosts` DISABLE KEYS */;

INSERT INTO `orthanc_hosts` (`id`, `AET`, `nginx_admin_url`, `api_url`, `osimis_viewer_link`, `osimis_viewer_check`, `server_name`, `osimis_viewer_name`, `domain`, `stone_viewer`)
VALUES
	(1,'DOCKER_HOME','https://newmac.medical.ky/admincurl.php','http://pacs-1:8042/','https://newmac.medical.ky/api/osimis-viewer/app/index.html?','https://newmac.medical.ky/api/tools/now-local','DOCKER_OSIMIS','Osimis Viewer','nginx-tls.medical.ky',0),
	(2,'DOCKER_HOME','https://newmac.medical.ky/admincurl.php','http://pacs-1:8042/','https://newmac.medical.ky/api/stone-webviewer/index.html?','https://newmac.medical.ky/api/tools/now-local','DOCKER_STONE','Osimis Viewer','nginx-tls.medical.ky',1),
	(3,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://local.medical.ky/Studies/stone_viewer/?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_EMBEDDED','Stone Viewer','devpacs.medical.ky',1),
	(4,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/stone-webviewer/index.html?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_STONE','Stone Viewer','devpacs.medical.ky',1),
	(6,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/osimis-viewer/app/index.html?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_OSIMIS','Osimis Viewer','devpacs.medical.ky',0);

/*!40000 ALTER TABLE `orthanc_hosts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;

INSERT INTO `password_resets` (`email`, `token`, `created_at`)
VALUES
	('sagarmani1986@gmail.com','$2y$10$aXxnWy.0EC6SvPx12TJoh.H6z1TmysFIqr5vPKXKb.bBN/aJrMg5a','2021-02-28 13:09:40');

/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Models\\User',1,'orthanc','18cdc5fc5f6b81b6376722ee14a45bd0b49e883c7cdf22179daee62f937d1086','[\"read\",\"delete\",\"create\",\"update\"]','2020-12-17 22:42:17','2020-12-17 22:03:47','2020-12-17 22:42:17');

/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ratings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rateable_id` int NOT NULL,
  `rateable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rater_id` int DEFAULT NULL,
  `rater_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('3nywJajiMNCOjtjU9VxbpkQRhznBKDbhdlZKwpuh',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkxSRnRTbnFZekRUWWN3OFJ2bG8wTVZ5aHN5elhRQzFONVpZUUNMciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824425),
	('4rB35NuhQTRKeF2uK8HlHxZZhmaZzkjtTPcpZ8WM',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1BzT2ZqOTNwV05VNzRQWmhxM0Y1eWZzRkZORjlVeXJUczBkR1FLNyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614817995),
	('6FPbcP1kOt11qJWhHgFWfcnAHHXW7lV0YhRD2Q6h',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVFOMGc3ekhFR3FxQUtaZ201dEx1OHo4ZmF0RGlta1JKVkZOdnluaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614818150),
	('7trOLx4IWReDC3xqpOZ0w8QpL9JYSc0nBTsOR5OI',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS3JaMEMxVFBwR3lBaVhuWDZEYm1qM3UxNnlXblhqOWtGWlFtdEowaSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MToiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9TdHVkaWVzL3VwbG9hZF9zdHVkeT9tcm49bXJuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614821725),
	('9d1FY2tR0ns2HPWxptxj9josB7HsZDEyRPn40kV7',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVIyRXBKdEY0NkhMdmxPTkYyVEZDQmMwZWR2dGFGemUyYlR0Z2h1biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824426),
	('bSTgbnLfkyrHrkPXw0pg73mN4tBEt0nr13Q3x178',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2lUUzhBVDlqVGZPakxxeFR5NmhpaGF2N2l3UlpEVjBsaWVvN2ZSQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824445),
	('d5Q2oFmhDeewxbetPd4mNHd721CM0h1vO5Iuv8dV',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOWJPS085eHlhM0dkOHhYM2tGV250WkNaM21SazhqY3lwdFl2Nk1vbyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MToiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9TdHVkaWVzL3VwbG9hZF9zdHVkeT9tcm49bXJuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824423),
	('ddOsXUBxlMKbr6tLHbCNkD5TxP8EzSvdAAr5ZB4P',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2xQUTN3UzhkR3EyT2NkZHN5cHE1SWdITDhGTkxEVUROdWJwNnM4MSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614818149),
	('DGkThqJC6Ap9B7IiSPqC343WQCtFvRN06m6HshN6',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXoxOWdRcTBmcWxZQzh1WnYxajJQRHFWdVFaWUtlcFZFbnJHc0J4SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614819617),
	('eGMWBZgQsDSsxK3sxKgRP5osYxYBOGyASQPxlR1G',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHBuY1lZM2NjTGpoTlI4Qm16TENxR0lTNDJyYVFNZnFEWG5oN2hGaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614823401),
	('eNU0AjU6DnJIlFyumbkSckKb7l5ugTUdqFEYvbBW',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUFkZ0xEY242YUZqelBhZlljVUd0NjNEYXN0RUxVOGhrZlFGbXo2MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614822382),
	('FDfxhkRAdc5PvaceIXS2bQkYMQOGWS3yUlOmy9Z3',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYk1FYmdPbkl4bW5TTFljbUtBYmc2Z1ZHSWpiYmpGZElNZlFjbENaeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614822383),
	('fdmZFRNLTlZGkO9b6yzCC36Gil2HhYKEWgr3S4FT',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnN1SmFrUGFuNmF4dWVZd2tlV2dId0IzNmlWS3JrQVc1YW52Y0liUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614817995),
	('FGsvmg8eY05uqJvnanff3mP5HRsv2DuL8WT5aOtf',1,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YToyNDp7czo2OiJfdG9rZW4iO3M6NDA6IlBDanpLTHdEa1hGVmEzbDgxcTFpbVFvMXNkZXdISDZtV0lUbVhremYiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEhPbzFHUmZCRFNiQzR5V2U1UHZ1QU9FY3c2WlBTMUVPUlVENTZ2aUNCdU9kQi81aGpvYUN1IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRIT28xR1JmQkRTYkM0eVdlNVB2dUFPRWN3NlpQUzFFT1JVRDU2dmlDQnVPZEIvNWhqb2FDdSI7czoxMjoib3J0aGFuY19ob3N0IjtzOjE6IjEiO3M6NToiZmxhc2giO2E6MDp7fXM6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wNC0wMS0zNS00NiI7YTozOntpOjA7ZDoxNjE0ODIxNzQ4Ljg3ODc1MztpOjE7ZDoxNjE0ODIxNzUwLjc0OTgxNDtpOjI7ZDoxNjE0ODIxODEyLjQ0NzMyNTt9czoyNDoiVVVJRFMyMDIxLTAzLTA0LTAxLTM1LTQ2IjthOjI6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7aToxO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjt9czoyNDoiQUJPUlQyMDIxLTAzLTA0LTAxLTM1LTQ2IjtiOjA7czoyNjoiQ09VTlRFUjIwMjEtMDMtMDQtMDEtMzUtNDYiO2k6MztzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDQtMDEtMzctMTQiO2E6Mzp7aTowO2Q6MTYxNDgyMTgzNy41MDg2OTI7aToxO2Q6MTYxNDgyMTg5OS4wODIwODM7aToyO2Q6MTYxNDgyMTkwMi41MjkxNDQ7fXM6MjQ6IlVVSURTMjAyMS0wMy0wNC0wMS0zNy0xNCI7YToyOntpOjA7czo0NDoiMDYxZWNjYzMtMDg5ODU3ZjgtZTY2N2Q1NTUtN2NlN2YwZDUtNDViMjBhZGEiO2k6MTtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wNC0wMS0zNy0xNCI7YjowO3M6MjY6IkNPVU5URVIyMDIxLTAzLTA0LTAxLTM3LTE0IjtpOjM7czozMDoiRElDT01VUExPQUQyMDIxLTAzLTA0LTAxLTQxLTQ5IjthOjI6e2k6MDtkOjE2MTQ4MjIxMTMuNTgyNzQ1O2k6MTtkOjE2MTQ4MjIxMTUuMjc3ODU4O31zOjI0OiJVVUlEUzIwMjEtMDMtMDQtMDEtNDEtNDkiO2E6Mjp7aTowO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjtpOjE7czo0NDoiMDYxZWNjYzMtMDg5ODU3ZjgtZTY2N2Q1NTUtN2NlN2YwZDUtNDViMjBhZGEiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDQtMDEtNDEtNDkiO2I6MDtzOjI2OiJDT1VOVEVSMjAyMS0wMy0wNC0wMS00MS00OSI7aToyO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wNC0wMS00NC0zMyI7YToyOntpOjA7ZDoxNjE0ODIyMjc2LjQ2MTU4MztpOjE7ZDoxNjE0ODIyMzM3Ljk4NzQ2NDt9czoyNDoiVVVJRFMyMDIxLTAzLTA0LTAxLTQ0LTMzIjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wNC0wMS00NC0zMyI7YjowO3M6MjY6IkNPVU5URVIyMDIxLTAzLTA0LTAxLTQ0LTMzIjtpOjI7fQ==',1614822338),
	('flsMYGWQgwGvMejdH3i0y5TOBWJ1TWupXeh3432N',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVms5eUFsdjBOUHJ0TTRaSEpaOEdWckZ3ZmpDTE5VU3ZFa2dyZjFMRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MToiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9TdHVkaWVzL3VwbG9hZF9zdHVkeT9tcm49bXJuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614822381),
	('gOnryONAvSE4WqFBlbAZEl8HYN43aXQET3vocL78',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoick5rTGJPbVJuM2RyMFZWdDh4cXlPb21XWHZodWJSZTNnTEdTYkd1ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614818150),
	('hs2q0kMI94eJZLA0Qa6tjh52jOwJ5i8C155ojWDN',1,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiVmcydVd4T3BMQ3M3RWFTTEdQakljUksyZlRWcU12VUc2c21oR1hrciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L1N0dWRpZXMvdXBsb2FkX3N0dWR5P21ybj1tcm4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSE9vMUdSZkJEU2JDNHlXZTVQdnVBT0VjdzZaUFMxRU9SVUQ1NnZpQ0J1T2RCLzVoam9hQ3UiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEhPbzFHUmZCRFNiQzR5V2U1UHZ1QU9FY3c2WlBTMUVPUlVENTZ2aUNCdU9kQi81aGpvYUN1IjtzOjEyOiJvcnRoYW5jX2hvc3QiO3M6MToiMSI7czo1OiJmbGFzaCI7YTowOnt9fQ==',1614829014),
	('jHsItOGKini3ntiAD5bemG8Kprz4NHQFPo9JFZ1q',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibGxLalJjREVIZ0ZtSkFRZDJpa3Zna1d6bHhJT1hNTE9ISE55UUhVciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614821059),
	('JtjITsRgqf6OQA1k2apLMMc5avbWlqXVC76hP1Ej',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWmpkRTdkUElxUEJvaGp4UFlBaWs0WWIzUnN2SXZpcDZwSFBvS1B4ZyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614822381),
	('kpNFLpMrHuhXwzowUYTEA8aVczkyJRBbUkNmqOLH',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTHM4b0VoUW9hQ1JGQ3FtUm16WUhnbTIwVnhqT1lLdjZ1bmlMQ3hlVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614819615),
	('lKKIOt7rDxtkT5m1dbCAQHzqCaJSqNnCDwjWovqK',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDlqOFE5VlBFZTRYMTd2NXlFNHhsVjZVV0NPem1kT2JTZmxQNU9xeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614821726),
	('MDSGbEFYsoDjmXkOYBWQeX28lhP6JplIZK4sENX2',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYk56a2g3Nzd2czdNRWNTT3NFeHU5MUI4THJFbkJ5NlpOTTFpVHpXbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824424),
	('MNezCIqnD8qXHt6qOXkoCDHH6YoVVaQ0X8aiiXZt',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGlNWFNGQzJLSlgyRmJ1d1JBN1JNYWJwWVM1cUlmMVZ6SklTUmJWViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614820062),
	('NJyzk7slvWKQLKPu7HGa5KuFEK0WY20Xkx50U9yY',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUEpLTTdKNnRUUFl1WFlnVVVCQkVCQUI1THNiNzZiRVF1S1lkUkVoSSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MToiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9TdHVkaWVzL3VwbG9hZF9zdHVkeT9tcm49bXJuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824444),
	('nliYL6CLv6XVU8qJBOkSAC8zgpzZEKLfHB8JLWZX',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoicGJXZ3NETk9XV05GbkJxdWIyUHRxZVF1ZlNMaTJsN005dExIbWp4USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614819616),
	('omWvSvijU436EcmtRYaPNlznV1g1CVrpSEYK2FA5',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT1E0alBuNXhOUTlpRlpTM2FyRXR0WlQxbW14QmNwRDJ5dmRUMmJqZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614820060),
	('PHETiUG9JnLd7kwxVX9jwwLCdK3yZ222PN700tHl',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzQ0Qm1yZnFsV3k5THZlQmhtOEt4ZnRSdnFVZGp1SGppWFdRS2FxOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824426),
	('qDOeoE3TmimXMFEcGfYI8KpR8DjIEUKKk2VEplPf',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibWZCYkhSNFFkT2wwOG9oZVc4MTVSU1NkSWFEWjU0Y3dYeUo3MFdrTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824425),
	('rrT1GUGc6xlO2m6dppRS6lDDYX5saWCdTZRXKbaP',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoib2RkajhHWDl3dmhIMHV2SExwTnJqUXRkeEdkczdBTUtRVm0wZnRmYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614821059),
	('RsfgwAgv3TQyFDzIOe21wu8eNV0f7BiZibaOkQaX',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3dEN2JIdk82c0p0V2lXZmtndTdxcmZuTklLVkowRVZCY0Q5OVlpZSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvcmVhZGVycyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9yZWFkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614821058),
	('uQnkRl94ueOehyW5XbsNLG7UHbxZKyYqj53N9C5p',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiM21UOG9Mc1RaTUNvU0x6bEdHZXJnSDk4eUdiWWRBdnFmblRQc2ZUTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614817996),
	('vZggU6MiQZoBAf4JtSZ8xIYj6Yp8oXTkbq3tRYhe',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTF5aXhEQktHVWZhRE9EVnhYSHlEOEg1N2lxc2xuamFpNlZYOXZCQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614820940),
	('WBny34kIhtoDlcbzhFPjvIykEHm2uDRpNIim4AV1',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGVlWWxkOHg0UWtPMHlMQVNZYWNJRXExcTV0V244T0hOcFBYMG14QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614820941),
	('WJNzJy2yncky1ZQVXbNmDX2dqwKMojHthcazUHfe',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkNXSjkycGpLVUdYbVg3bVVMSW5WSkgzZE84UWw3bjRYWXROaERGciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614821726),
	('wjQc5vrMoG337Kb3gfh5eS2Zkx4C457z1LIARNbB',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkFZaGtXcGdxR0lSSjV1b1pDUmRxbUlKSjMzZjI5dFAxUHpPYUpPdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614820941),
	('XD0IIbfjwslXZfIOg7empfBY79RMobalGXotGgVU',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0lpN0d0S21BalRNR1VKU2h5c2M1dDhZRW44UkNCYUg5V0hvUnkyaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614822383),
	('xnVv9FoYRQ9DbiG7COwsLbClx0fxY4YQyX7qEjCC',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUFzN1lNckZiSktMaXBrQ0FsN2N2QXBtY2xKTGZLQWc2RVNGam52SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614822382),
	('YKWhLe3VuBj2CX1IT6UxJISb23JEM1o5LRX2L8tA',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTRiNkU5QkxRczI5a3ZDME5uMXlZSnVETm1GZlowV2w4WmNzaUdIRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614820061),
	('zPRfNHoswwKMHTdSQL55YTG5HXO2ApnkF7HFdlKn',1,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YToyMDp7czo2OiJfdG9rZW4iO3M6NDA6InlIZVNqaGVyRmdmdFpsQXNsUFZBWTZndExxS1ZQTEFrbGJvT3g4ZTIiO3M6MzoidXJsIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2MToiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRIT28xR1JmQkRTYkM0eVdlNVB2dUFPRWN3NlpQUzFFT1JVRDU2dmlDQnVPZEIvNWhqb2FDdSI7czoxMjoib3J0aGFuY19ob3N0IjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSE9vMUdSZkJEU2JDNHlXZTVQdnVBT0VjdzZaUFMxRU9SVUQ1NnZpQ0J1T2RCLzVoam9hQ3UiO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wNC0wMS00Ni0zMyI7YTozOntpOjA7ZDoxNjE0ODIyMzk2LjM2NjY4OTtpOjE7ZDoxNjE0ODIyNDU4LjA1NTI1OTtpOjI7ZDoxNjE0ODIyNDYxLjU2MjQ2Mjt9czoyNDoiVVVJRFMyMDIxLTAzLTA0LTAxLTQ2LTMzIjthOjI6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7aToxO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjt9czoyNDoiQUJPUlQyMDIxLTAzLTA0LTAxLTQ2LTMzIjtiOjA7czoyNjoiQ09VTlRFUjIwMjEtMDMtMDQtMDEtNDYtMzMiO2k6MztzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDQtMDEtNTMtMDYiO2E6Mzp7aTowO2Q6MTYxNDgyMjc4OS43MTA0MztpOjE7ZDoxNjE0ODIyODUyLjY2ODcyO2k6MjtkOjE2MTQ4MjI4NTUuNDQyNTc3O31zOjI0OiJVVUlEUzIwMjEtMDMtMDQtMDEtNTMtMDYiO2E6Mjp7aTowO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjtpOjE7czo0NDoiMDYxZWNjYzMtMDg5ODU3ZjgtZTY2N2Q1NTUtN2NlN2YwZDUtNDViMjBhZGEiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDQtMDEtNTMtMDYiO2I6MDtzOjI2OiJDT1VOVEVSMjAyMS0wMy0wNC0wMS01My0wNiI7aTozO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wNC0wMS01Ny00NyI7YTozOntpOjA7ZDoxNjE0ODIzMDcxLjE0MjEyOTtpOjE7ZDoxNjE0ODIzMTMxLjczMDM0NztpOjI7ZDoxNjE0ODIzMTM1LjQ0Mjg3ODt9czoyNDoiVVVJRFMyMDIxLTAzLTA0LTAxLTU3LTQ3IjthOjI6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7aToxO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjt9czoyNDoiQUJPUlQyMDIxLTAzLTA0LTAxLTU3LTQ3IjtiOjA7czoyNjoiQ09VTlRFUjIwMjEtMDMtMDQtMDEtNTctNDciO2k6Mzt9',1614824066),
	('zt8WLVlwIqar65xIb7Dx9Y25d4hx8FgrksvYVGfH',NULL,'172.20.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiM25lVEtLZW15OUJHUHpRcnNPODFWTzFRelYzRzVKSG9XUFFHanpOeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1614824445);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team_invitations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_invitations`;

CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_email_unique` (`email`),
  KEY `team_invitations_team_id_foreign` (`team_id`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table team_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_user`;

CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`)
VALUES
	(1,1,'sscotti\'s Team',1,'2020-09-12 20:52:56','2020-09-12 20:52:56'),
	(2,2,'Stephen\'s Team',1,'2020-11-24 15:38:02','2020-11-24 15:38:02'),
	(3,3,'Mani\'s Team',1,'2021-02-28 13:07:28','2021-02-28 13:07:28'),
	(4,1,'READERS',0,'2021-03-03 04:34:30','2021-03-03 04:34:30'),
	(5,1,'PATIENTS',0,'2021-03-03 04:35:21','2021-03-03 04:35:21'),
	(6,1,'REFERRING PHYSICIANS',0,'2021-03-03 04:35:48','2021-03-03 04:35:48');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `patientid` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reader_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_active` tinyint NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_roles` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]' COMMENT 'user''s account type (basic, premium, etc)',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `patientid` (`patientid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `mname`, `email`, `dob`, `patientid`, `doctor_id`, `reader_id`, `user_active`, `user_roles`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`)
VALUES
	(1,'sscotti','Stephen',NULL,NULL,'sscotti@sscotti.org',NULL,'DEV0000002','0002','0002',0,'[]',NULL,'$2y$10$HOo1GRfBDSbC4yWe5PvuAOEcw6ZPS1EORUD56viCBuOdB/5hjoaCu',NULL,NULL,'Ywnwl4Rab15Jh6GOpbtm7oUV4eYVUnAprNEs7Qb7KcWngrNpgn5dcjJZVpKg','1','profile-photos/Hs8dT7lZft3s8pLQloPs6P66vEB5Da9g9YVGY28n.png','2020-09-12 20:52:56','2021-03-03 13:43:18'),
	(3,'Mani Sagar',NULL,NULL,NULL,'sagarmani1986@gmail.com',NULL,NULL,NULL,NULL,1,'[]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,NULL,'3',NULL,'2021-02-28 13:07:28','2021-02-28 13:07:29');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
