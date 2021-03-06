# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.23)
# Database: laravel
# Generation Time: 2021-03-06 07:28:29 +0000
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
	(248,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 21:08:12'),
	(249,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 21:09:34'),
	(250,'1','sscotti','061eccc3-089857f8-e667d555-7ce7f0d5-45b20ada','1.2.276.0.50.192168001099.8252157.14547392.4','DEVACC00000002','2001-01-01','11:36:54','0001:SCOTTI^STEPHEN^D^^M.D','Cayman Medical Ltd.','CT Abdomen','DEV0000003','','Fall 2','1900-01-01','O','7','CT','2021-03-04 21:12:16'),
	(251,'1','sscotti','e6596260-fdf91aa9-0257a3c2-4778ebda-f2d56d1b','1.3.46.670589.11.0.1.1996021610440011','OutsideStudy','2020-04-23','15:26:10','','MM07R R4.3','SHOULDER','DEV0000003','DEV0000003|OutsideStudy|MM07R R4.3','Test^Patient','1970-01-01','','1','MR','2021-03-04 21:12:16'),
	(252,'1','sscotti','0481b781-6bb968a2-f387954f-45ef4906-56380937','1.3.76.2.1.1.4.1.2.5310.511611607','DEVACC00000005','2016-04-18','11:20:07','0002:SCOTTI^STEPHEN^D^^M.D','MR Open stehend','','DEV0000002','','G_Au_Brain_Meningeom^','2016-01-01','F','77','MR','2021-03-05 01:59:54');

/*!40000 ALTER TABLE `dicom_uploads` ENABLE KEYS */;
UNLOCK TABLES;


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
	(3,'DOCKER_HOME','https://imac.medical.ky/admincurl.php','https://imac.medical.ky/api/','https://imac.medical.ky/api/osimis-viewer/app/index.html?','https://imac.medical.ky/api/tools/now-local','OLDMAC_OSIMIS','Osimis Viewer','nginx-tls.medical.ky',0),
	(4,'DOCKER_HOME','https://imac.medical.ky/admincurl.php','https://imac.medical.ky/api/','https://imac.medical.ky/api/osimis-viewer/app/index.html?','https://imac.medical.ky/api/tools/now-local','OLDMAC_OSIMIS','Osimis Viewer','nginx-tls.medical.ky',0),
	(6,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/stone-webviewer/index.html?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_STONE','Stone Viewer','devpacs.medical.ky',1),
	(7,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://local.medical.ky/Studies/stone_viewer/?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_EMBEDDED','Stone Viewer','devpacs.medical.ky',1),
	(8,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/osimis-viewer/app/index.html?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_OSIMIS','Osimis Viewer','devpacs.medical.ky',0);

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
	('5AaYZHf7Qtkftop7AM5c3PTF4XqwagTsoGAKnBRd',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVWZjRjd4bXdjYnhtSGxVczNkSzBGcm9oR1d3bzJ4S2VwSmFBY0t3dSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615014016),
	('g5U0ilKqmatHc5bwO4oZPBx20lFxxlOJoGKBRH12',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3pXMXFvNHF5cDRlZHoxcTAzaDBPNDdBbGEwakk3VVBqUm1nbk9ITSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615014017),
	('Ho0XeRBmb33HV5OR1rY2muhbptRqanzs2K0cxBw1',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidUZFQkF5dTloYUxKejB0SXZFMnZjMWM3S0ljWFVCUkNiUVhkUGhPeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615001919),
	('IXonlsj0cTbkVOhamnO1XdAzu9vS0dkOeTOsznEj',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnBQbERFZEZSV0UxVUJMT3QxbTNubkFaWnpNUWFhU2VHNEdOVlhsRSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cHM6Ly9uZXdtYWNsYXJhdmVsLm1lZGljYWwua3kvZGV2dG9vbCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL25ld21hY2xhcmF2ZWwubWVkaWNhbC5reS9kZXZ0b29sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615014016),
	('jG4GnRMnGr9BGeb0jkjLEvQkuzxDADeGjeEwLVf6',1,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiWVkyVXBTYjhaZkpLZTVWOWxlVzY1RWNhNG9ma0JmdVhjTXg2MjdVQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L3BhdGllbnRzL3BhdGllbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEhPbzFHUmZCRFNiQzR5V2U1UHZ1QU9FY3c2WlBTMUVPUlVENTZ2aUNCdU9kQi81aGpvYUN1IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRIT28xR1JmQkRTYkM0eVdlNVB2dUFPRWN3NlpQUzFFT1JVRDU2dmlDQnVPZEIvNWhqb2FDdSI7czoxMjoib3J0aGFuY19ob3N0IjtpOjE7czo1OiJmbGFzaCI7YTowOnt9fQ==',1615014748),
	('KNcDMYxuJoCA42Th9FVWZct0ksmY3rz1sHGZdvEz',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzZ6RmVURHJRYzBkU2REdTFyWVp0c3hUTFpzYjYyZ3JVMFV5UW5pdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9fQ==',1615001907),
	('NcAyLQh1S48DH4VT7zvRDAFqihy6XuoCSJB6D1KX',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOW9Ha3hBdlJZY09nUkRuWElFTVVxUlpNcnZEWm1XT3FZNG9zT1pQSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615014018),
	('XC2xYFXTr1Xvwg2DSu0Ww3cIBWWPdTTxq8ljP1ob',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0tSVVBZMmJQT2R2cGxFQW5PV0hwTGRjbFRJRm1nSzh4R2c0NEpENCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615014017),
	('xuDoTFO4QUsOUm82T5B2uBr1QOaJ0Amyb7GQEWXc',NULL,'172.21.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFpsYWVSdGsyQ2tDZW5JcnNNWGlOQURaY0U3eGJKU0JJS1BKUVRaNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vbmV3bWFjbGFyYXZlbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1615014018);

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
	(1,'sscotti','Stephen',NULL,NULL,'sscotti@sscotti.org',NULL,'DEV0000002','0002','0002',0,'[]',NULL,'$2y$10$HOo1GRfBDSbC4yWe5PvuAOEcw6ZPS1EORUD56viCBuOdB/5hjoaCu',NULL,NULL,'m1yIUHQOdO9FPuBBDqzsbBIyJdtExeIWhxgdwplhyc9mFSG4CEft3vRbUktb','6','profile-photos/Hs8dT7lZft3s8pLQloPs6P66vEB5Da9g9YVGY28n.png','2020-09-12 20:52:56','2021-03-04 14:25:51'),
	(2,'Mani Sagar',NULL,NULL,NULL,'sagarmani1986@gmail.com',NULL,NULL,NULL,NULL,1,'[]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,NULL,'3',NULL,'2021-02-28 13:07:28','2021-02-28 13:07:29'),
	(3,'testuser','Test','User',NULL,'testuser@fakedomain.com',NULL,'DEV0000001','0003','0003',1,'[1,2,3,4,5,6,7,8]',NULL,'$2y$10$9SIrOMY0G4d7N5QqsyhADuO6ZPHGPCoA/hSn5EN27q1FGgBRGIDn.',NULL,NULL,'BKzJmysdSF44XV5RFcdkQngEzmhmvLkZh6RCE6vC90McgsBVnn1FxKO4JCqp','8','profile-photos/idExLa3iKx9yUYP9Z8DxgFF2fZ3OeXmJZ86GUyFh.png',NULL,'2021-03-04 14:28:30'),
	(4,'mhussain',NULL,NULL,NULL,'mhussain@techiemaestro.com',NULL,'DEV0000005','0004','0004',1,'[1,2,3,4,5,6,7,8]',NULL,'$2y$10$yzFVPJ8j8UWR6XSDJeCsveO8M/9EwOwILFqycpMAV8IboYcw9a2jy',NULL,NULL,NULL,'4',NULL,'2021-03-01 18:48:47','2021-03-01 18:48:48'),
	(5,'Test',NULL,NULL,NULL,'sscotti@icloud.com',NULL,NULL,NULL,NULL,0,'[]',NULL,'$2y$10$dKwBPyVuavQlaH3as5Jw7eGWHZtFlTKkN9LeCSAa4zFaI3lKXsr1e',NULL,NULL,NULL,NULL,NULL,'2021-03-02 22:27:47','2021-03-02 22:27:47');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
