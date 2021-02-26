# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.23)
# Database: laravel
# Generation Time: 2021-02-26 06:39:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
	(1,'VPSORTHANC','https://nginx-tls.medical.ky/admin.php','http://pacs-1:8042/','https://nginx-tls.medical.ky/api/stone-webviewer/index.html?','https://nginx-tls.medical.ky/api/stone-webviewer/configuration.json','DOCKER_STONE','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1),
	(2,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','http://pacs-1:8042/','https://devpacs.medical.ky:8001/osimis/stone-webviewer/index.html?','https://devpacs.medical.ky:8001/viewercheck.php','VPS_STONE','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1),
	(3,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','http://pacs-1:8042/','https://local.medical.ky/Studies/stone_viewer/?','https://devpacs.medical.ky:8001/viewercheck.php','VPS_EMBEDDED','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1),
	(4,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','http://pacs-1:8042/','https://devpacs.medical.ky:8001/osimis/osimis-viewer/app/index.html?','https://devpacs.medical.ky:8001/viewercheck.php','VPS_OSIMIS','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',0);

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
	('sscotti@sscotti.org','$2y$10$gjo0kzw17qaacE33izAU6eJ79RN1IRZtbEVRoidRS1sl/d9JLE.w6','2020-12-21 16:03:51');

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
	('06p1YOSbHxvJD5ITm507ILiJRXHD5DwSJcHTBhIX',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1hKcXdlcllyQ2VnOVhselpRVlNobXRXcWVvUmJDWVdXczJVYkRGWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614313718),
	('0HP8d9Z3AXbnjy1PI0ryiqXziRhtm32To7ig1WVB',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMG9wNUtFQmdmdXQ5SkMzY01uWVBwTG9pemZST1JLNkFsVFkzdG5aYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614316115),
	('1tWy9p0CRxj39nl6mePLz0JxqxvZvclp7YOcJGEd',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHlPN2RVNUhmM2VvbTBuWGtqM2t3cmFIZlRHZFJhVVRQdVRVbHYzZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614315823),
	('3z3EkVttihL32RhWgl4NYFKFKnUzkMmeqLLx5Y6G',1,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiamhMaVBpQ0FybkFnMzBSSVpjZlNmeEpTeVFvWEhWemloVTNIOTZ4ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9yZWFkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7fQ==',1614313130),
	('4amaExzSt0DgyPQA8COTMqysopxIKxGfKp6pDGTz',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHAyeEppTkpZcVVrbE9LbmZnMm04aUJ1dDJjSXRqdm5Bb0sxd20zVSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614308924),
	('4ltvRMnaFPLq5mEd57OqpwFqaA2jp4NX0k8mOJsx',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWEdCbkNUNWhHY3MxWGJ5MjBCMUxGUFo1MlVtaGswRldOdGlLU2ZrQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L2RldnRvb2wiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L2RldnRvb2wiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614315813),
	('5rNEAr4s2XP1Q3qY5SBeI8uYRjvlsbADFpu7lF8r',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDJNcmZnbXV3WlRDMWd6MzIxWTYxaWxmVnByS1BNQTZqd2VOa0FObiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614313183),
	('ad3SrflrUrh1qDxcsEAMoYXDL27GgFwNMt4FCzWR',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmtTOXRHdllldHByV3diVkZRaHdXQVVmZjNNaGdkUnZaUk5nbUh3dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614311262),
	('HAmEQWvLoLZQg85cwtn3TRhMHEXbYv7izXD5Onf0',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiek5RcmJkUVBRUGRlS0dYWGNhNTRvMERuMzkwc243TVZ0ZWk2Vk1TZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614313182),
	('JjohSY44obshqocqNmVBxwkdXlwiTjNwkuI95EGH',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMldmWENhcnZKZXJlNVVxZDY5M1J2ZmI3TDV2VGhSbWFwSUUyenNoTiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614316113),
	('KbouTGXsJS3EuU7Quf65G22s9IkMZkEiOA5HXMrB',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSDcwOGROaGxQME1BbTFzQ1BwV0ZDQzNaVklQZ2pHSHVjaWtGS1pISSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614315514),
	('lVdiYqr9wPik2UcE0H1aaMtwuhCJqguLBBiuRlVd',1,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiS3hIWTJIYnRHSUU4a29BVU41QkRYWXBZMlVZNHBKdXc0OVpQSVBPTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwczovL3VwbG9hZGVyLm1lZGljYWwua3kvcmVhZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO30=',1614316760),
	('MeFDuyfNxplelcRC8vRQIYCekQTut4sN6HPPdAMb',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT1VBOVMxb0k1SFZxSXNGSE1hNVhTN1kyNk1rMUtKdzFlRHdHaVpGQSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614311258),
	('NdsNwx0TNFbTNGEHokpTpu7KKybCAZSASzmSWKud',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzFEME9SbnY1YXRncjB6eEVweWlFeHlOWWUzZzRIN0pmQjVVR2M5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614316114),
	('nGff42AfFxq0ywYkCCVD4HLadct4SqifTzhiXBQJ',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibXhVZW1Fa05CMmRHSzNPcDRBUVlMbjdLckFvN0ZIdktiUWFhNlNOUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614315823),
	('NJXlAg25eyEDFQmj7UDV4uapbHYXtweq3j9eWIMx',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDd6aUlTSEoxYzhUTFdoUmowekxxSmdnbjZtaEwxS0t0dzRXNUM4QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614308925),
	('OPyB061U7sXM8fRn1xSZYOEDEGgVBQg9uhpqlERf',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUpmZWpvbUh4R1htbnFYWExMRWEzWUJ1V1NBUklkOUhJREpmdG9xbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614315816),
	('steU8ciM6saIAVXp0rSx6cfPtgrZP4Vb9xT23t1R',1,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoibW02dUlFdFJQOHRheVdoYkpYWG81UE1wc0hqRU56MFlOT1lMZ0JXbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9yZWFkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7fQ==',1614313246),
	('TovG4qfYO62OwJow3zPStdNxybQmecrnJjhTim8t',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGhMcWZOT3ozOW0xMXh6djl4QUdGbEFsaWJBeUVFSzVNME56aXU0eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614311259),
	('Uc83XxjtCJcnSlGi9zPRwdox9PLLxL6WpyuScYME',1,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiR3RvMG9lM2ptaWdpSUROV0hKcmp4cnRlMVBLODhjYXFVTkIxRnlMRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwczovL3VwbG9hZGVyLm1lZGljYWwua3kvcmVhZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO30=',1614314786),
	('uSeFGo8a5TTPyD9oLxT3XhThjsL60NhQmHsqYkwC',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRFYxaTUzTnptNmdkQTV4TEdnd3JYazI3cUo5bzJXeTJlNXpBTkpSUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly91cGxvYWRlci5tZWRpY2FsLmt5L3JlYWRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1614315822),
	('WCO0jlqxuaX2UIIG4u40NiiwpR0GcJFO4loK2IbQ',NULL,'172.19.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoicE04YXhSbHBCRFZuM0tSaHA4NVhNdjNhNmFJdVAybWFya2tMMlBSdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vdXBsb2FkZXIubWVkaWNhbC5reS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1614315815);

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
	(2,2,'Stephen\'s Team',1,'2020-11-24 15:38:02','2020-11-24 15:38:02');

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
	(1,'sscotti','Stephen',NULL,NULL,'sscotti@sscotti.org',NULL,'DEV0000002','0002','0002',0,'[]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,'1lsJkLDSt01eLWjUXJGsmV5hBwEGJ5AbZ8xzSzkdhvC8Fobe6UwMZPYoDdol','1','profile-photos/WfiXJEw0w3MDrJWxe0WagWlnH1vjxZhEOcbhB3wz.png','2020-09-12 20:52:56','2020-12-21 21:20:57'),
	(2,'Stephen D. Scotti',NULL,NULL,NULL,'sscotti@radimaging.net',NULL,'DEV0000001','0001',NULL,1,'[1]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,NULL,'2','profile-photos/49AYFE5aS3Rwq11nFOiIpiJbqWszKiLJRWlyd91V.png','2020-11-24 15:38:02','2020-11-24 16:02:04');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
