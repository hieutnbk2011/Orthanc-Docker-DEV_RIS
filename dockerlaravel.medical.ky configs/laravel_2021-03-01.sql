# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.23)
# Database: laravel
# Generation Time: 2021-03-01 13:05:27 +0000
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
	(228,'1','sscotti','ad1d247b-6e0a0a02-98880beb-460a2261-d25594b2','1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568','','2007-01-01','12:00:00','','','Knee (R)','a83db7f7-0b26-49c2-a92f-484c5c06bc98','a83db7f7-0b26-49c2-a92f-484c5c06bc98|1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568|1.2.276.0.7230010.3.1.2.2831156000.1.1499097860.742568','Anonymized1','1970-01-01','','1','MR','2021-03-01 12:47:31');

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
	(9,'2018_07_14_183253_ratings',2);

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
  `upload_study_link` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_viewer` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orthanc_hosts` WRITE;
/*!40000 ALTER TABLE `orthanc_hosts` DISABLE KEYS */;

INSERT INTO `orthanc_hosts` (`id`, `AET`, `nginx_admin_url`, `api_url`, `osimis_viewer_link`, `osimis_viewer_check`, `server_name`, `osimis_viewer_name`, `upload_study_link`, `domain`, `stone_viewer`)
VALUES
	(1,'DOCKER_HOME','https://nginx-tls.medical.ky/admincurl.php','http://pacs-1:8042/','https://nginx-tls.medical.ky/api/osimis-viewer/app/index.html?','http://pacs-1:8042/tools/now-local','DOCKER_OSIMIS','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',0),
	(2,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/stone-webviewer/index.html?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_STONE','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1),
	(3,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://local.medical.ky/Studies/stone_viewer/?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_EMBEDDED','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1),
	(4,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/osimis-viewer/app/index.html?','https://devpacs.medical.ky:8000/api/tools/now-local','VPS_OSIMIS','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',0);

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
	('sscotti@sscotti.org','$2y$10$633yK/SOBhHqj2Ums4IkxesOFYS435mYdgRyyPuL/uR9MY.NHgY9m','2021-02-28 13:05:37'),
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
	('06RdcDXcQ6eE4MGdnue0Q9qNeJGw4yEB8AYnuLsx',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YToxNDp7czo2OiJfdG9rZW4iO3M6NDA6ImpYTW56VWNxRkpCdThuaVVkYTF5NERMbG1HYm5sc0Z3cGpaVkRYejciO3M6MzoidXJsIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NjoiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L1N0dWRpZXMvdXBsb2FkX3N0dWR5P21ybj1tcm4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MTI6Im9ydGhhbmNfaG9zdCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTEtNDAtMDciO2E6MTp7aTowO2k6MTYxNDU5ODgwODt9czoyNDoiQUJPUlQyMDIxLTAzLTAxLTExLTQwLTA3IjtiOjA7czoyNDoiVVVJRFMyMDIxLTAzLTAxLTExLTQwLTA3IjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMS00Mi01MCI7YToxOntpOjA7aToxNjE0NTk4OTcxO31zOjI0OiJVVUlEUzIwMjEtMDMtMDEtMTEtNDItNTAiO2E6MTp7aTowO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjt9czoyNDoiQUJPUlQyMDIxLTAzLTAxLTExLTQyLTUwIjtiOjA7fQ==',1614598972),
	('0uQstNDfV355JK87t3I9Q6nhSGKAZLTbHmvko9tR',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozMTp7czo2OiJfdG9rZW4iO3M6NDA6IlU3SEF5c1ZrMVF5OExxb21TZ1FEYXpIUlZ0M2ZmajNUY2JoTzI5dDMiO3M6MzoidXJsIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NjoiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L1N0dWRpZXMvdXBsb2FkX3N0dWR5P21ybj1tcm4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjtzOjEyOiJvcnRoYW5jX2hvc3QiO2k6MTtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTItNDMtMDgiO2E6MTp7aTowO2Q6MTYxNDYwMjU4OC44NTA2MDI7fXM6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMi00My0wOCI7YToxOntpOjA7czo0NDoiYWQxZDI0N2ItNmUwYTBhMDItOTg4ODBiZWItNDYwYTIyNjEtZDI1NTk0YjIiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTItNDMtMDgiO2I6MDtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTItNDMtMjEiO2E6MTp7aTowO2Q6MTYxNDYwMjYwMi4wNDkwNzQ7fXM6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMi00My0yMSI7YToxOntpOjA7czo0NDoiYWQxZDI0N2ItNmUwYTBhMDItOTg4ODBiZWItNDYwYTIyNjEtZDI1NTk0YjIiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTItNDMtMjEiO2I6MDtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTItNDYtMDAiO2E6MTp7aTowO2Q6MTYxNDYwMjc2MS4yMzM3NzI7fXM6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMi00Ni0wMCI7YToxOntpOjA7czo0NDoiYWQxZDI0N2ItNmUwYTBhMDItOTg4ODBiZWItNDYwYTIyNjEtZDI1NTk0YjIiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTItNDYtMDAiO2I6MDtzOjI0OiJVVUlEUzIwMjEtMDMtMDEtMTItNDctMzAiO2E6MTp7aTowO3M6NDQ6ImFkMWQyNDdiLTZlMGEwYTAyLTk4ODgwYmViLTQ2MGEyMjYxLWQyNTU5NGIyIjt9czoyNDoiQUJPUlQyMDIxLTAzLTAxLTEyLTQ3LTMwIjtiOjA7czozMDoiRElDT01VUExPQUQyMDIxLTAzLTAxLTEyLTQ4LTUxIjthOjEyOntpOjA7ZDoxNjE0NjAyOTMzLjIzNjE0NDtpOjE7ZDoxNjE0NjAyOTM1LjA3NDE1MTtpOjI7ZDoxNjE0NjAyOTM3LjI2MzY4MztpOjM7ZDoxNjE0NjAyOTM5LjczNjc0OTtpOjQ7ZDoxNjE0NjAyOTQxLjA2NDA0NTtpOjU7ZDoxNjE0NjAyOTQzLjA1NDQxNjtpOjY7ZDoxNjE0NjAyOTQ0LjM2NTY0OTtpOjc7ZDoxNjE0NjAyOTQ2LjIzOTM2NjtpOjg7ZDoxNjE0NjAyOTQ3Ljk0MjE2OTtpOjk7ZDoxNjE0NjAyOTQ5LjczMDI5MztpOjEwO2Q6MTYxNDYwMjk1MS40OTAzOTQ7aToxMTtkOjE2MTQ2MDI5NTIuNjMzNzg4O31zOjI0OiJVVUlEUzIwMjEtMDMtMDEtMTItNDgtNTEiO2E6MTI6e2k6MDtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aToxO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjI7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6MztzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo0O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjU7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6NjtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo3O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjg7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6OTtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aToxMDtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aToxMTtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMi00OC01MSI7YjowO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMi01MS0yNiI7YToxMjp7aTowO2Q6MTYxNDYwMzA4OS41OTQyNTc7aToxO2Q6MTYxNDYwMzA5MC44Njg5NjU7aToyO2Q6MTYxNDYwMzA5My4wNjgxMDQ7aTozO2Q6MTYxNDYwMzA5NS4wODE2OTE7aTo0O2Q6MTYxNDYwMzA5Ni4zNDYzMTY7aTo1O2Q6MTYxNDYwMzA5OC4xNjgzMTQ7aTo2O2Q6MTYxNDYwMzA5OS42MDI3ODg7aTo3O2Q6MTYxNDYwMzEwMS4yMjAxODI7aTo4O2Q6MTYxNDYwMzEwMi43MzA3NDI7aTo5O2Q6MTYxNDYwMzEwNC41MzY3O2k6MTA7ZDoxNjE0NjAzMTA2LjA4NjYxOTtpOjExO2Q6MTYxNDYwMzEwNy4xNDI4ODM7fXM6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMi01MS0yNiI7YToxMjp7aTowO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjE7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6MjtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTozO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjQ7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6NTtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo2O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjc7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6ODtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo5O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjEwO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjExO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3Ijt9czoyNDoiQUJPUlQyMDIxLTAzLTAxLTEyLTUxLTI2IjtiOjA7czozMDoiRElDT01VUExPQUQyMDIxLTAzLTAxLTEyLTU0LTIzIjthOjExOntpOjA7ZDoxNjE0NjAzMjY4LjA2ODE4O2k6MTtkOjE2MTQ2MDMyNzAuNTMxOTk5O2k6MjtkOjE2MTQ2MDMyNzEuNTk4MTgzO2k6MztkOjE2MTQ2MDMyNzMuNzA5ODQ5O2k6NDtkOjE2MTQ2MDMyNzUuMDc3NDYxO2k6NTtkOjE2MTQ2MDMyNzguMTU4ODA1O2k6NjtkOjE2MTQ2MDMyODAuNzU0NTkxO2k6NztkOjE2MTQ2MDMyODEuODc4NDk1O2k6ODtkOjE2MTQ2MDMyODQuMzE3NDI7aTo5O2Q6MTYxNDYwMzI4NS44MDcyMjg7aToxMDtkOjE2MTQ2MDMyODYuNzE3MDg3O31zOjI0OiJVVUlEUzIwMjEtMDMtMDEtMTItNTQtMjMiO2E6MTE6e2k6MDtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aToxO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjI7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6MztzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo0O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjU7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6NjtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo3O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjg7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6OTtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aToxMDtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMi01NC0yMyI7YjowO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMi01Ny0wMCI7YToxOntpOjA7ZDoxNjE0NjAzNDIyLjM2MTY4Nzt9czoyNDoiVVVJRFMyMDIxLTAzLTAxLTEyLTU3LTAwIjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMi01Ny0wMCI7YjowO30=',1614603422),
	('34YsN1nyhMI9E0LtI8CC93lCrWWr6Lo4LwrEFUOw',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ1dPWndONGk4d2RheElxeGZ4dk1OejhsNDNsM2NPeTE4dFAwdjM5aSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L2RldnRvb2wiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L2RldnRvb2wiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614601270),
	('51EKgky2l7HwxKqgYcPXKeax2IJdKabXWzY1BU6i',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YToxNjp7czo2OiJfdG9rZW4iO3M6NDA6InhpSTNkNGJnUzhnbFdNQXdZd2ZValpHWlBSa0hLWU1LWlhSWkxoOXIiO3M6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU2OiJodHRwczovL3VwbG9hZGVyLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MTI6Im9ydGhhbmNfaG9zdCI7aToxO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMS0yNC01NiI7YToxOntpOjA7aToxNjE0NTk3ODk4O31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTEtMjQtNTYiO2I6MDtzOjI0OiJVVUlEUzIwMjEtMDMtMDEtMTEtMjQtNTYiO2E6MTp7aTowO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjt9czozMDoiRElDT01VUExPQUQyMDIxLTAzLTAxLTExLTM4LTAwIjthOjE6e2k6MDtpOjE2MTQ1OTg2ODM7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMS0zOC0wMCI7YjowO3M6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMS0zOC0wMCI7YToxOntpOjA7czo0NDoiMDYxZWNjYzMtMDg5ODU3ZjgtZTY2N2Q1NTUtN2NlN2YwZDUtNDViMjBhZGEiO31zOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTEtMzgtNTYiO2E6MTp7aTowO2k6MTYxNDU5ODczODt9czoyNDoiQUJPUlQyMDIxLTAzLTAxLTExLTM4LTU2IjtiOjA7czoyNDoiVVVJRFMyMDIxLTAzLTAxLTExLTM4LTU2IjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fX0=',1614598739),
	('AfRSBbpWZ8gQYFvQGEo1Zmt0lyFkM3t6uf17e4QV',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMUc4VVRuOHZTNUEwOEZwTlNGaUY5bFRwb2VGc2hkSW1jS05PSDJMRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9TdHVkaWVzL3VwbG9hZF9zdHVkeT9tcm49bXJuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoxMjoib3J0aGFuY19ob3N0IjtpOjE7fQ==',1614600628),
	('azRirHqATELnPzXzSZZe8vfvPBMqTFNOLA0mzuT1',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXNaMU9KSmFUVlNObExkQXcwMXNLczc5NmQyTkhsRlZURTZ5MFozZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614601271),
	('bFqih1UMJqJup8YldD5nyV3Ti1LQkBhVuk9qAEE0',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFpWenpydWNZREo2ZXJ1NlVSM3VtdU1VeHYyZUFxZDRoclFJbFFPOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614600973),
	('BzlZbaRRBMa0LfwZvfxJJJB2yhUSqX3W1BBzgZBV',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo4OntzOjY6Il90b2tlbiI7czo0MDoiRE1DUEtQVlBDWVdLaGtTWlNKUjNnYjlYUDI2OUZ2eDdQMzczd25QeiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU2OiJodHRwczovL3VwbG9hZGVyLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoxMjoib3J0aGFuY19ob3N0IjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO30=',1614600528),
	('FlHP9cHXodohaCOU5yW242VTlbVQSwxKBfDbboZz',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoieWxiczFFT2xtNW9ZZ1laWWhJcDBpRmprNDFVeHpveGNUam8wbzJYbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614600973),
	('Meza0rFgfAiYi6L7erG9pAI35HFRdzRD09eil6DM',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36','YToxMzp7czo2OiJfdG9rZW4iO3M6NDA6ImowclJCUk5zQkg5V0ltWU9sUWV5RVhGdDcwVzdTcGJMbEhWU3c2NmQiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU2OiJodHRwczovL3VwbG9hZGVyLm1lZGljYWwua3kvU3R1ZGllcy91cGxvYWRfc3R1ZHk/bXJuPW1ybiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MTI6Im9ydGhhbmNfaG9zdCI7aToxO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMi0yOC0xMyI7YToxOntpOjA7ZDoxNjE0NjAxNjkzLjc1NDMxNjt9czoyNDoiVVVJRFMyMDIxLTAzLTAxLTEyLTI4LTEzIjthOjE6e2k6MDtzOjQ0OiJlNjU5NjI2MC1mZGY5MWFhOS0wMjU3YTNjMi00Nzc4ZWJkYS1mMmQ1NmQxYiI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMi0yOC0xMyI7YjowO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMi0zMC00MyI7YToxMjp7aTowO2Q6MTYxNDYwMTg0NS41NDEyNDI7aToxO2Q6MTYxNDYwMTg0Ny40NDU3NDE7aToyO2Q6MTYxNDYwMTg0OS42OTAxMjM7aTozO2Q6MTYxNDYwMTg1MS4wMjk2NjtpOjQ7ZDoxNjE0NjAxODUzLjE1NzQwMjtpOjU7ZDoxNjE0NjAxODU0LjYxNzI3O2k6NjtkOjE2MTQ2MDE4NTYuODQyNTcyO2k6NztkOjE2MTQ2MDE4NTguNzA2MjI2O2k6ODtkOjE2MTQ2MDE4NjAuNzQ0Mzk7aTo5O2Q6MTYxNDYwMTg2Mi4yNTc5OTI7aToxMDtkOjE2MTQ2MDE4NjQuOTM2ODM1O2k6MTE7ZDoxNjE0NjAxODY2LjM3MzUzMzt9czoyNDoiVVVJRFMyMDIxLTAzLTAxLTEyLTMwLTQzIjthOjEyOntpOjA7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6MTtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aToyO3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjM7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6NDtzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo1O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjY7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6NztzOjQ0OiIwNDgxYjc4MS02YmI5NjhhMi1mMzg3OTU0Zi00NWVmNDkwNi01NjM4MDkzNyI7aTo4O3M6NDQ6IjA0ODFiNzgxLTZiYjk2OGEyLWYzODc5NTRmLTQ1ZWY0OTA2LTU2MzgwOTM3IjtpOjk7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6MTA7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO2k6MTE7czo0NDoiMDQ4MWI3ODEtNmJiOTY4YTItZjM4Nzk1NGYtNDVlZjQ5MDYtNTYzODA5MzciO31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTItMzAtNDMiO2I6MDt9',1614601866),
	('MzJUlVceBP9T40fjfWNh9RY1aLQ90dRoVVi0VxZy',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXJFZ2xkbXhMQkxwNk9YQ0NwTWVHUVhhaTRDZXJNR1pvYlRDV25kVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614600972),
	('NTSziRpRUtmhTQwnMiWUxMuY9T4Xf05uAyZinNfR',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidThOVldXaHhUNzl5WTU1ZHdVWGw2OUNaYWowdFl6WlhHY1pOUDZnYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614601270),
	('ZFkqihFPH0gAy7M4SNISoSRifgpHCtzlDR0wUPEI',NULL,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOERtTmk1RllSZnBJUGpxdnZEMEJZNW5sYVRpaGJyMEZ2c256NHJlRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L2RldnRvb2wiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L2RldnRvb2wiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614600971),
	('ZTcu8I3ZjJr1rTzJWu10gs1Zy42E1zzmL2QzZdSq',1,'172.18.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:86.0) Gecko/20100101 Firefox/86.0','YToyNjp7czo2OiJfdG9rZW4iO3M6NDA6IlB3UXBoaER1REExNkRMdmVYOTNyOW5kN1VVbVVUY09Ya2VHMGtpbmgiO3M6MzoidXJsIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NjoiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L1N0dWRpZXMvdXBsb2FkX3N0dWR5P21ybj1tcm4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YToyOntpOjA7czozMDoiRElDT01VUExPQUQyMDIxLTAzLTAxLTEyLTAwLTE4IjtpOjE7czo0ODoiVVVJRFMyMDIxLTAzLTAxLTEyLTAwLTE4QUJPUlQyMDIxLTAzLTAxLTEyLTAwLTE4Ijt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MTI6Im9ydGhhbmNfaG9zdCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTEtNDQtMjIiO2E6MTp7aTowO2k6MTYxNDU5OTA2Mzt9czoyNDoiVVVJRFMyMDIxLTAzLTAxLTExLTQ0LTIyIjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMS00NC0yMiI7YjowO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMS00OS0xMiI7YToxOntpOjA7aToxNjE0NTk5MzU0O31zOjI0OiJVVUlEUzIwMjEtMDMtMDEtMTEtNDktMTIiO2E6MTp7aTowO3M6NDQ6IjA2MWVjY2MzLTA4OTg1N2Y4LWU2NjdkNTU1LTdjZTdmMGQ1LTQ1YjIwYWRhIjt9czoyNDoiQUJPUlQyMDIxLTAzLTAxLTExLTQ5LTEyIjtiOjA7czozMDoiRElDT01VUExPQUQyMDIxLTAzLTAxLTExLTUzLTAyIjthOjE6e2k6MDtpOjE2MTQ1OTk1ODM7fXM6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMS01My0wMiI7YToxOntpOjA7czo0NDoiMDYxZWNjYzMtMDg5ODU3ZjgtZTY2N2Q1NTUtN2NlN2YwZDUtNDViMjBhZGEiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTEtNTMtMDIiO2I6MDtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTEtNTQtMzUiO2E6MTp7aTowO3M6MjE6IjAuMTYwMzU1MDAgMTYxNDU5OTY3NyI7fXM6MjQ6IlVVSURTMjAyMS0wMy0wMS0xMS01NC0zNSI7YToxOntpOjA7czo0NDoiMDYxZWNjYzMtMDg5ODU3ZjgtZTY2N2Q1NTUtN2NlN2YwZDUtNDViMjBhZGEiO31zOjI0OiJBQk9SVDIwMjEtMDMtMDEtMTEtNTQtMzUiO2I6MDtzOjMwOiJESUNPTVVQTE9BRDIwMjEtMDMtMDEtMTEtNTYtNDgiO2E6MTp7aTowO2Q6MTYxNDU5OTgxMC41NzE5ODt9czoyNDoiVVVJRFMyMDIxLTAzLTAxLTExLTU2LTQ4IjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMS01Ni00OCI7YjowO3M6MzA6IkRJQ09NVVBMT0FEMjAyMS0wMy0wMS0xMi0wMC0xOCI7YToxOntpOjA7ZDoxNjE0NjAwMDIwLjM5NjQzMTt9czoyNDoiVVVJRFMyMDIxLTAzLTAxLTEyLTAwLTE4IjthOjE6e2k6MDtzOjQ0OiIwNjFlY2NjMy0wODk4NTdmOC1lNjY3ZDU1NS03Y2U3ZjBkNS00NWIyMGFkYSI7fXM6MjQ6IkFCT1JUMjAyMS0wMy0wMS0xMi0wMC0xOCI7YjowO30=',1614600021);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


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
	(3,3,'Mani\'s Team',1,'2021-02-28 13:07:28','2021-02-28 13:07:28');

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
	(1,'sscotti','Stephen',NULL,NULL,'sscotti@sscotti.org',NULL,'DEV0000002','0002','0002',0,'[]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,'6SzUhQF3lVqQmJborCg2KuPKrDApfJhMRk7sWQ2VzvVPw97jvZdOlwkCx3Vl','1','profile-photos/WfiXJEw0w3MDrJWxe0WagWlnH1vjxZhEOcbhB3wz.png','2020-09-12 20:52:56','2020-12-21 21:20:57'),
	(3,'Mani Sagar',NULL,NULL,NULL,'sagarmani1986@gmail.com',NULL,NULL,NULL,NULL,1,'[]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,NULL,'3',NULL,'2021-02-28 13:07:28','2021-02-28 13:07:29');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
