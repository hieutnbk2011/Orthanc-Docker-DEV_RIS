# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Database: laravel
# Generation Time: 2021-01-05 21:05:12 +0000
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AET` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nginx_admin_url` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_url` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osimis_viewer_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osimis_viewer_check` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osimis_viewer_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_study_link` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_viewer` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orthanc_hosts` WRITE;
/*!40000 ALTER TABLE `orthanc_hosts` DISABLE KEYS */;

INSERT INTO `orthanc_hosts` (`id`, `AET`, `nginx_admin_url`, `api_url`, `osimis_viewer_link`, `osimis_viewer_check`, `server_name`, `osimis_viewer_name`, `upload_study_link`, `domain`, `stone_viewer`)
VALUES
	(1,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/osimis-viewer/app/index.html?','https://devpacs.medical.ky:8001/viewercheck.php','VPS_OSIMIS','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',0),
	(2,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://devpacs.medical.ky:8001/osimis/stone-webviewer/index.html?','https://devpacs.medical.ky:8001/viewercheck.php','VPS_STONE','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1),
	(3,'VPSORTHANC','https://devpacs.medical.ky:9443/admincurl.php','https://devpacs.medical.ky:8000/api/','https://local.medical.ky/Studies/stone_viewer/?','https://devpacs.medical.ky:8001/viewercheck.php','VPS_EMBEDDED','Osimis Viewer','https://devpacs.medical.ky:8002/','devpacs.medical.ky',1);

/*!40000 ALTER TABLE `orthanc_hosts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rateable_id` int(11) NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rater_id` int(11) DEFAULT NULL,
  `rater_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('0RYgmCI357LMFZ78SxPkYTrgwMIDpT7lJAJc5mcx',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibmI5WUdBSU5Eamh5ek9hVGJTekkwNFpTYTJncGNkcXBMeE5yVHYwNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608841836),
	('1fpkaba1GgdOHP3EoB6dXWN5tdsT6lDiYyrvC5LJ',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoieks0SUFteUQ2eFlmc3NxbUhsNE5YQ0NISFRzUjl0b0lzTnNMclJaMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1609172912),
	('1Zqf5TKi807YeBDDkkHTVcbR3RHZycYukXufvpzz',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnJSRnU4NDBoOVI1ODNFd2pXTjFVNEFaazhOZHFRSFhJS2VBWERjaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608772144),
	('4vaHmUg9to7xEiRiL87tYBgjdit8uj2sj4HUmDWd',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibURveVNmTktTN1E4cTlqQ1dVOFVIU3loN0pLVGFBdmtTUUJuRFd2dyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9kZXZwb3J0YWwubWVkaWNhbC5reS9wYXRpZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2RldnBvcnRhbC5tZWRpY2FsLmt5L3BhdGllbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608841836),
	('5PT60Jnd79QXdKr4r7OrNyh4TZhzJnAwUphmortP',2,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ2lLVVNmYVRISm9yRTl5cUpkRXRnaWZKZW80ZTBlVjZUM2lRbFlYWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvcGF0aWVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjt9',1608841355),
	('aAEV2yUrFiUIGYsCiPx17VBv258thGTr4fAsYIA8',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTN1eVkwZDhyQmZtVmZ4RDRBSHY2eGxFU2RJU2EyVjFqcXpXbUZHdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608902409),
	('bGSOl07cAuulJjDZ5PFNj8UhSN7VQwkrlkklwZ9m',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibEQwRXFTVXZ5ZnVteU9MeWxPNWZuV01VT3VUb3lRdEtsNnlVT1VnayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608772145),
	('CC5TBdjQfUSzX6QRxffAHIYdgtbJ2gUZ4tApbg1p',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUd6SWZRTWRvYlFvT084UVZjdGFVQkdPdEVSMkt4Z3l6N3A5WVE2NyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9kZXZwb3J0YWwubWVkaWNhbC5reS9wYXRpZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2RldnBvcnRhbC5tZWRpY2FsLmt5L3BhdGllbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608902409),
	('DBwhUJqg9aV4f3NQrnvklfx6Rv20PirJ5bVgVL5d',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoibUVSTlZWQWtKRkVncE12dnlrM1lvUWR2bDVrMU4zWHhnTjF4TzM1NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvcmVhZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4OFdVQVRaL1JFM3V5NHd6clpCQzguM3dBcFdEVnBrdHBCU0NzYkJmS2ZDLnY1eWxFanNmRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO30=',1609880283),
	('dhHTGNA9YXt2BHJZhbBzrSGDaRTZBjVA7cZdSS5y',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOU1CT1FtUXhQdGRlOU1YOWNxREQzU1R5bllWR1dZanQxOFBrTVJkYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608841836),
	('ElabXddbQ45IM71GO1YqQI1Vx35Fz2TlVKWHGyzb',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1RzbWJwV21pNzZVWnNNYkQzdDhOc0x3UmdGVHc0c2h2QWlIdGhjaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1609172912),
	('EY1szsgKtqSDQ2ikmAKg2HkmK3cMiKX1zdXE74XL',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVV1YzlKUU52M0JNM1BBRlh1S3JPTGJ1OXptUzEzRGtSMFpEcTRxYyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9kZXZwb3J0YWwubWVkaWNhbC5reS9wYXRpZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwczovL2RldnBvcnRhbC5tZWRpY2FsLmt5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1609173591),
	('HZgdtimMf7iJaQu0qZLFqJm8968Eo7iINHFFbzBQ',2,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiN3B3N3JzRWlVSXgxTmZQSmFUNGNlTnE2dHJudFJnTkxoZTVqVGZ3YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvcGF0aWVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkODhXVUFUWi9SRTN1eTR3enJaQkM4LjN3QXBXRFZwa3RwQlNDc2JCZktmQy52NXlsRWpzZkciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDg4V1VBVFovUkUzdXk0d3pyWkJDOC4zd0FwV0RWcGt0cEJTQ3NiQmZLZkMudjV5bEVqc2ZHIjt9',1608824454),
	('JZgX1eEbbS9S90dtYhsN5wTjXhcFOW80OhxpYdlM',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMlJzWDlGdzZUeWVDNlIyZkhPRk1GOXIzbndyV2lYWk1kOW1CUUhTQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608841328),
	('oJZjS9Xg8sK1NRk6neMtHdKPcca6hl1v2UyTTwGB',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibksyOHdKdWh4U1Fubzh2MnpVQ1dqaFdMZVJlM0pjSFZWVTFUVzFzNSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9kZXZwb3J0YWwubWVkaWNhbC5reS9wYXRpZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2RldnBvcnRhbC5tZWRpY2FsLmt5L3BhdGllbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608772144),
	('qcVmGm1Ku3btRhvwQRm4Ynvbaf8RxP6LKsKgt7GO',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU1VpOU9DTXROelYzcWc3Y1BRbGFBTHlGeVlWZDNXOGZVVmEyUzBuMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwczovL2RldnBvcnRhbC5tZWRpY2FsLmt5L3BhdGllbnRzIjt9fQ==',1608771912),
	('qpdYuqQdhmaIavQLe4yUG3mm9gey6uuP7QDXkDjc',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:84.0) Gecko/20100101 Firefox/84.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWE3TkZjcWt1SXZrMWYwV3VVT3duUThDSUdveU9nVWhOY1lEQ0NLTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZGV2cG9ydGFsLm1lZGljYWwua3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608766530),
	('ZA3jjOhCl2YQjjhUO0fshrIUpDMeRrt2hbE0Q2Ms',NULL,'::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:85.0) Gecko/20100101 Firefox/85.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnpLaVQ1VUtHcHpYckNiVjdaN3ZObkt6azBuVTJpVFlFdjhoOTd5SiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cHM6Ly9kZXZwb3J0YWwubWVkaWNhbC5reS9wYXRpZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2RldnBvcnRhbC5tZWRpY2FsLmt5L3BhdGllbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1609172912);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_user`;

CREATE TABLE `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `patientid` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reader_id` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_roles` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]' COMMENT 'user''s account type (basic, premium, etc)',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
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
	(1,'sscotti','Stephen',NULL,NULL,'sscotti@sscotti.org',NULL,'DEV0000002','0002','0002',0,'[]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,'E1IIc0HqnynkYh19cYM0eglx0wNPxJoiv6i70NGlMfEXzsO9jHvvDVk6Crgw','1','profile-photos/WfiXJEw0w3MDrJWxe0WagWlnH1vjxZhEOcbhB3wz.png','2020-09-12 20:52:56','2020-12-21 21:20:57'),
	(2,'Stephen D. Scotti',NULL,NULL,NULL,'sscotti@radimaging.net',NULL,'DEV0000001',NULL,NULL,1,'[1]',NULL,'$2y$10$88WUATZ/RE3uy4wzrZBC8.3wApWDVpktpBSCsbBfKfC.v5ylEjsfG',NULL,NULL,NULL,'2','profile-photos/49AYFE5aS3Rwq11nFOiIpiJbqWszKiLJRWlyd91V.png','2020-11-24 15:38:02','2020-11-24 16:02:04');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
