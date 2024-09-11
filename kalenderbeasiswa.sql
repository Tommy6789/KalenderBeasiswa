-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kalenderbeasiswa
CREATE DATABASE IF NOT EXISTS `kalenderbeasiswa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kalenderbeasiswa`;

-- Dumping structure for table kalenderbeasiswa.benuas
CREATE TABLE IF NOT EXISTS `benuas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.benuas: ~5 rows (approximately)
DELETE FROM `benuas`;
INSERT INTO `benuas` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Asia', NULL, NULL, NULL),
	(2, 'Africa', NULL, NULL, NULL),
	(3, 'America', NULL, NULL, NULL),
	(4, 'Europe', NULL, NULL, NULL),
	(5, 'Australia', NULL, NULL, NULL);

-- Dumping structure for table kalenderbeasiswa.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table kalenderbeasiswa.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table kalenderbeasiswa.kalender_beasiswas
CREATE TABLE IF NOT EXISTS `kalender_beasiswas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_knegara` bigint unsigned DEFAULT NULL,
  `id_ktingkat_studi` bigint unsigned DEFAULT NULL,
  `tanggal_registrasi` date NOT NULL,
  `deadline` date NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_beasiswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keuntungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tes_english` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tes_bahasa_lain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tes_standard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lainnya` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_tampil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_knegara` (`id_knegara`),
  KEY `id_ktingkat_studi` (`id_ktingkat_studi`),
  CONSTRAINT `id_knegara` FOREIGN KEY (`id_knegara`) REFERENCES `knegaras` (`id`),
  CONSTRAINT `id_ktingkat_studi` FOREIGN KEY (`id_ktingkat_studi`) REFERENCES `ktingkat_studis` (`id`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.kalender_beasiswas: ~0 rows (approximately)
DELETE FROM `kalender_beasiswas`;

-- Dumping structure for table kalenderbeasiswa.knegaras
CREATE TABLE IF NOT EXISTS `knegaras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kbeasiswa` bigint unsigned NOT NULL,
  `id_negara` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `knegaras_id_kbeasiswa_foreign` (`id_kbeasiswa`),
  KEY `knegaras_id_negara_foreign` (`id_negara`),
  CONSTRAINT `knegaras_id_kbeasiswa_foreign` FOREIGN KEY (`id_kbeasiswa`) REFERENCES `kalender_beasiswas` (`id`),
  CONSTRAINT `knegaras_id_negara_foreign` FOREIGN KEY (`id_negara`) REFERENCES `negaras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.knegaras: ~0 rows (approximately)
DELETE FROM `knegaras`;

-- Dumping structure for table kalenderbeasiswa.ktingkat_studis
CREATE TABLE IF NOT EXISTS `ktingkat_studis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kbeasiswa` bigint unsigned NOT NULL,
  `id_tingkat_studi` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ktingkat_studis_id_kbeasiswa_foreign` (`id_kbeasiswa`),
  KEY `ktingkat_studis_id_tingkat_studi_foreign` (`id_tingkat_studi`),
  CONSTRAINT `ktingkat_studis_id_kbeasiswa_foreign` FOREIGN KEY (`id_kbeasiswa`) REFERENCES `kalender_beasiswas` (`id`),
  CONSTRAINT `ktingkat_studis_id_tingkat_studi_foreign` FOREIGN KEY (`id_tingkat_studi`) REFERENCES `tingkat_studis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.ktingkat_studis: ~0 rows (approximately)
DELETE FROM `ktingkat_studis`;

-- Dumping structure for table kalenderbeasiswa.level_users
CREATE TABLE IF NOT EXISTS `level_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.level_users: ~3 rows (approximately)
DELETE FROM `level_users`;
INSERT INTO `level_users` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Amin', NULL, '2024-08-04 18:21:51', '2024-08-04 18:21:51'),
	(2, 'Editor', NULL, NULL, NULL),
	(3, 'Subcriber', NULL, '2024-08-05 20:59:23', NULL);

-- Dumping structure for table kalenderbeasiswa.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.migrations: ~13 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_07_02_041314_create_level_users_table', 1),
	(6, '2024_07_02_041549_create_benuas_table', 1),
	(7, '2024_07_02_041648_create_negaras_table', 1),
	(8, '2024_07_02_041657_create_tingkat_studis_table', 1),
	(9, '2024_07_02_041755_create_kategoris_table', 1),
	(10, '2024_07_02_043132_create_kalender_beasiswas_table', 1),
	(13, '2024_07_08_024326_create_ktingkat_studis_table', 2),
	(14, '2024_07_08_025236_create_knegaras_table', 2),
	(16, '2024_07_29_014321_create_wishlists_table', 3);

-- Dumping structure for table kalenderbeasiswa.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.model_has_permissions: ~0 rows (approximately)
DELETE FROM `model_has_permissions`;

-- Dumping structure for table kalenderbeasiswa.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.model_has_roles: ~0 rows (approximately)
DELETE FROM `model_has_roles`;

-- Dumping structure for table kalenderbeasiswa.negaras
CREATE TABLE IF NOT EXISTS `negaras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_benua` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_benua` (`id_benua`),
  CONSTRAINT `id_benua` FOREIGN KEY (`id_benua`) REFERENCES `benuas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.negaras: ~194 rows (approximately)
DELETE FROM `negaras`;
INSERT INTO `negaras` (`id`, `id_benua`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Afghanistan', NULL, NULL, NULL),
	(2, 4, 'Albania', NULL, '2024-08-05 21:48:23', NULL),
	(3, 2, 'Algeria', NULL, NULL, NULL),
	(4, 4, 'Andorra', NULL, NULL, NULL),
	(5, 2, 'Angola', NULL, NULL, NULL),
	(6, 3, 'Antigua and Barbuda', NULL, NULL, NULL),
	(7, 3, 'Argentina', NULL, '2024-08-05 21:57:52', NULL),
	(9, 5, 'Australia', NULL, NULL, NULL),
	(10, 4, 'Austria', NULL, NULL, NULL),
	(11, 1, 'Azerbaijan', NULL, NULL, NULL),
	(12, 3, 'Bahamas', NULL, NULL, NULL),
	(13, 1, 'Bahrain', NULL, NULL, NULL),
	(14, 1, 'Bangladesh', NULL, NULL, NULL),
	(15, 3, 'Barbados', NULL, NULL, NULL),
	(16, 4, 'Belarus', NULL, NULL, NULL),
	(17, 4, 'Belgium', NULL, NULL, NULL),
	(18, 3, 'Belize', NULL, NULL, NULL),
	(19, 2, 'Benin', NULL, NULL, NULL),
	(20, 1, 'Bhutan', NULL, NULL, NULL),
	(21, 3, 'Bolivia', NULL, NULL, NULL),
	(22, 4, 'Bosnia and Herzegovina', NULL, NULL, NULL),
	(23, 2, 'Botswana', NULL, NULL, NULL),
	(24, 3, 'Brazil', NULL, NULL, NULL),
	(25, 1, 'Brunei', NULL, NULL, NULL),
	(26, 4, 'Bulgaria', NULL, NULL, NULL),
	(27, 2, 'Burkina Faso', NULL, NULL, NULL),
	(28, 2, 'Burundi', NULL, NULL, NULL),
	(29, 1, 'Cambodia', NULL, NULL, NULL),
	(30, 2, 'Cameroon', NULL, NULL, NULL),
	(31, 3, 'Canada', NULL, NULL, NULL),
	(32, 2, 'Cape Verde', NULL, NULL, NULL),
	(33, 2, 'Central African Republic', NULL, NULL, NULL),
	(34, 2, 'Chad', NULL, NULL, NULL),
	(35, 3, 'Chile', NULL, NULL, NULL),
	(36, 1, 'China', NULL, NULL, NULL),
	(37, 3, 'Colombia', NULL, NULL, NULL),
	(38, 2, 'Comoros', NULL, NULL, NULL),
	(39, 3, 'Costa Rica', NULL, NULL, NULL),
	(40, 4, 'Croatia', NULL, '2024-08-05 21:57:59', NULL),
	(41, 3, 'Cuba', NULL, NULL, NULL),
	(42, 4, 'Cyprus', NULL, NULL, NULL),
	(43, 4, 'Czech Republic', NULL, NULL, NULL),
	(44, 2, 'Democratic Republic of the Congo', NULL, NULL, NULL),
	(45, 4, 'Denmark', NULL, NULL, NULL),
	(46, 2, 'Djibouti', NULL, NULL, NULL),
	(47, 3, 'Dominica', NULL, NULL, NULL),
	(48, 3, 'Dominican Republic', NULL, NULL, NULL),
	(49, 1, 'East Timor', NULL, NULL, NULL),
	(50, 3, 'Ecuador', NULL, NULL, NULL),
	(51, 1, 'Egypt', NULL, NULL, NULL),
	(52, 3, 'El Salvador', NULL, NULL, NULL),
	(53, 2, 'Equatorial Guinea', NULL, NULL, NULL),
	(54, 2, 'Eritrea', NULL, NULL, NULL),
	(55, 4, 'Estonia', NULL, NULL, NULL),
	(56, 2, 'Eswatini', NULL, NULL, NULL),
	(57, 2, 'Ethiopia', NULL, NULL, NULL),
	(58, 5, 'Fiji', NULL, NULL, NULL),
	(59, 4, 'Finland', NULL, NULL, NULL),
	(60, 4, 'France', NULL, NULL, NULL),
	(61, 2, 'Gabon', NULL, NULL, NULL),
	(62, 2, 'Gambia', NULL, NULL, NULL),
	(63, 1, 'Georgia', NULL, NULL, NULL),
	(64, 4, 'Germany', NULL, NULL, NULL),
	(65, 2, 'Ghana', NULL, NULL, NULL),
	(66, 4, 'Greece', NULL, NULL, NULL),
	(67, 3, 'Grenada', NULL, NULL, NULL),
	(68, 3, 'Guatemala', NULL, NULL, NULL),
	(69, 2, 'Guinea', NULL, NULL, NULL),
	(70, 2, 'Guinea-Bissau', NULL, NULL, NULL),
	(71, 3, 'Guyana', NULL, NULL, NULL),
	(72, 3, 'Haiti', NULL, NULL, NULL),
	(73, 3, 'Honduras', NULL, NULL, NULL),
	(74, 4, 'Hungary', NULL, NULL, NULL),
	(75, 4, 'Iceland', NULL, NULL, NULL),
	(76, 1, 'India', NULL, NULL, NULL),
	(77, 1, 'Indonesia', NULL, NULL, NULL),
	(78, 1, 'Iran', NULL, NULL, NULL),
	(79, 1, 'Iraq', NULL, NULL, NULL),
	(80, 4, 'Ireland', NULL, NULL, NULL),
	(81, 1, 'Israel', NULL, NULL, NULL),
	(82, 4, 'Italy', NULL, NULL, NULL),
	(83, 2, 'Ivory Coast', NULL, NULL, NULL),
	(84, 3, 'Jamaica', NULL, NULL, NULL),
	(85, 1, 'Japan', NULL, NULL, NULL),
	(86, 1, 'Jordan', NULL, NULL, NULL),
	(87, 1, 'Kazakhstan', NULL, NULL, NULL),
	(88, 2, 'Kenya', NULL, NULL, NULL),
	(89, 5, 'Kiribati', NULL, NULL, NULL),
	(90, 1, 'Kuwait', NULL, NULL, NULL),
	(91, 1, 'Kyrgyzstan', NULL, NULL, NULL),
	(92, 1, 'Laos', NULL, NULL, NULL),
	(93, 4, 'Latvia', NULL, NULL, NULL),
	(94, 1, 'Lebanon', NULL, NULL, NULL),
	(95, 2, 'Lesotho', NULL, NULL, NULL),
	(96, 2, 'Liberia', NULL, NULL, NULL),
	(97, 2, 'Libya', NULL, NULL, NULL),
	(98, 4, 'Liechtenstein', NULL, NULL, NULL),
	(99, 4, 'Lithuania', NULL, NULL, NULL),
	(100, 4, 'Luxembourg', NULL, NULL, NULL),
	(101, 2, 'Madagascar', NULL, NULL, NULL),
	(102, 2, 'Malawi', NULL, NULL, NULL),
	(103, 1, 'Malaysia', NULL, NULL, NULL),
	(104, 1, 'Maldives', NULL, NULL, NULL),
	(105, 2, 'Mali', NULL, NULL, NULL),
	(106, 4, 'Malta', NULL, NULL, NULL),
	(107, 5, 'Marshall Islands', NULL, NULL, NULL),
	(108, 2, 'Mauritania', NULL, NULL, NULL),
	(109, 2, 'Mauritius', NULL, NULL, NULL),
	(110, 3, 'Mexico', NULL, NULL, NULL),
	(111, 5, 'Micronesia', NULL, NULL, NULL),
	(112, 4, 'Moldova', NULL, NULL, NULL),
	(113, 4, 'Monaco', NULL, NULL, NULL),
	(114, 1, 'Mongolia', NULL, NULL, NULL),
	(115, 4, 'Montenegro', NULL, NULL, NULL),
	(116, 2, 'Morocco', NULL, NULL, NULL),
	(117, 2, 'Mozambique', NULL, NULL, NULL),
	(118, 1, 'Myanmar', NULL, NULL, NULL),
	(119, 2, 'Namibia', NULL, NULL, NULL),
	(120, 5, 'Nauru', NULL, NULL, NULL),
	(121, 1, 'Nepal', NULL, NULL, NULL),
	(122, 4, 'Netherlands', NULL, NULL, NULL),
	(123, 5, 'New Zealand', NULL, NULL, NULL),
	(124, 3, 'Nicaragua', NULL, NULL, NULL),
	(125, 2, 'Niger', NULL, NULL, NULL),
	(126, 2, 'Nigeria', NULL, NULL, NULL),
	(127, 1, 'North Korea', NULL, NULL, NULL),
	(128, 4, 'North Macedonia', NULL, NULL, NULL),
	(129, 4, 'Norway', NULL, NULL, NULL),
	(130, 1, 'Oman', NULL, NULL, NULL),
	(131, 1, 'Pakistan', NULL, NULL, NULL),
	(132, 5, 'Palau', NULL, NULL, NULL),
	(133, 1, 'Palestine', NULL, NULL, NULL),
	(134, 3, 'Panama', NULL, NULL, NULL),
	(135, 5, 'Papua New Guinea', NULL, NULL, NULL),
	(136, 3, 'Paraguay', NULL, NULL, NULL),
	(137, 3, 'Peru', NULL, NULL, NULL),
	(138, 1, 'Philippines', NULL, NULL, NULL),
	(139, 4, 'Poland', NULL, NULL, NULL),
	(140, 4, 'Portugal', NULL, NULL, NULL),
	(141, 1, 'Qatar', NULL, NULL, NULL),
	(142, 2, 'Republic of the Congo', NULL, NULL, NULL),
	(143, 4, 'Romania', NULL, NULL, NULL),
	(144, 1, 'Russia', NULL, NULL, NULL),
	(145, 2, 'Rwanda', NULL, NULL, NULL),
	(146, 3, 'Saint Kitts and Nevis', NULL, NULL, NULL),
	(147, 3, 'Saint Lucia', NULL, NULL, NULL),
	(148, 3, 'Saint Vincent and the Grenadines', NULL, NULL, NULL),
	(149, 5, 'Samoa', NULL, NULL, NULL),
	(150, 4, 'San Marino', NULL, NULL, NULL),
	(151, 2, 'Sao Tome and Principe', NULL, NULL, NULL),
	(152, 1, 'Saudi Arabia', NULL, NULL, NULL),
	(153, 2, 'Senegal', NULL, NULL, NULL),
	(154, 4, 'Serbia', NULL, NULL, NULL),
	(155, 2, 'Seychelles', NULL, NULL, NULL),
	(156, 2, 'Sierra Leone', NULL, NULL, NULL),
	(157, 1, 'Singapore', NULL, NULL, NULL),
	(158, 4, 'Slovakia', NULL, NULL, NULL),
	(159, 4, 'Slovenia', NULL, NULL, NULL),
	(160, 5, 'Solomon Islands', NULL, NULL, NULL),
	(161, 2, 'Somalia', NULL, NULL, NULL),
	(162, 2, 'South Africa', NULL, NULL, NULL),
	(163, 1, 'South Korea', NULL, NULL, NULL),
	(164, 2, 'South Sudan', NULL, NULL, NULL),
	(165, 4, 'Spain', NULL, NULL, NULL),
	(166, 1, 'Sri Lanka', NULL, NULL, NULL),
	(167, 2, 'Sudan', NULL, NULL, NULL),
	(168, 3, 'Suriname', NULL, NULL, NULL),
	(169, 4, 'Sweden', NULL, NULL, NULL),
	(170, 4, 'Switzerland', NULL, NULL, NULL),
	(171, 1, 'Syria', NULL, NULL, NULL),
	(172, 1, 'Tajikistan', NULL, NULL, NULL),
	(173, 2, 'Tanzania', NULL, NULL, NULL),
	(174, 1, 'Thailand', NULL, NULL, NULL),
	(175, 2, 'Togo', NULL, NULL, NULL),
	(176, 5, 'Tonga', NULL, NULL, NULL),
	(177, 3, 'Trinidad and Tobago', NULL, NULL, NULL),
	(178, 2, 'Tunisia', NULL, NULL, NULL),
	(179, 1, 'Turkey', NULL, NULL, NULL),
	(180, 1, 'Turkmenistan', NULL, NULL, NULL),
	(181, 5, 'Tuvalu', NULL, NULL, NULL),
	(182, 2, 'Uganda', NULL, NULL, NULL),
	(183, 4, 'Ukraine', NULL, NULL, NULL),
	(184, 1, 'United Arab Emirates', NULL, NULL, NULL),
	(185, 4, 'United Kingdom', NULL, NULL, NULL),
	(186, 3, 'United States', NULL, NULL, NULL),
	(187, 3, 'Uruguay', NULL, NULL, NULL),
	(188, 1, 'Uzbekistan', NULL, NULL, NULL),
	(189, 5, 'Vanuatu', NULL, NULL, NULL),
	(190, 4, 'Vatican City', NULL, NULL, NULL),
	(191, 3, 'Venezuela', NULL, NULL, NULL),
	(192, 1, 'Vietnam', NULL, NULL, NULL),
	(193, 1, 'Yemen', NULL, NULL, NULL),
	(194, 2, 'Zambia', NULL, NULL, NULL),
	(195, 2, 'Zimbabwe', NULL, NULL, NULL);

-- Dumping structure for table kalenderbeasiswa.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table kalenderbeasiswa.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.permissions: ~0 rows (approximately)
DELETE FROM `permissions`;

-- Dumping structure for table kalenderbeasiswa.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table kalenderbeasiswa.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.roles: ~0 rows (approximately)
DELETE FROM `roles`;

-- Dumping structure for table kalenderbeasiswa.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.role_has_permissions: ~0 rows (approximately)
DELETE FROM `role_has_permissions`;

-- Dumping structure for table kalenderbeasiswa.tingkat_studis
CREATE TABLE IF NOT EXISTS `tingkat_studis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tingkat_studis_nama_unique` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.tingkat_studis: ~4 rows (approximately)
DELETE FROM `tingkat_studis`;
INSERT INTO `tingkat_studis` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'S1', NULL, '2024-08-05 21:46:16', NULL),
	(2, 'S2', NULL, '2024-08-07 18:48:28', NULL),
	(3, 'S3', NULL, '2024-08-04 21:18:01', NULL),
	(4, 'Diploma', NULL, NULL, NULL);

-- Dumping structure for table kalenderbeasiswa.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_level_user` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomer_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `id_level_user` (`id_level_user`),
  CONSTRAINT `id_level_user` FOREIGN KEY (`id_level_user`) REFERENCES `level_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `id_level_user`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `nomer_telepon`, `alamat`, `tanggal_lahir`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 'Admin', 'Admin789@gmail.com', NULL, '$2y$12$G92Kth8HPeyrIESTLygHG.Uo3ZwAfNFPxtp2DdbMcXluzKnNVp3SO', NULL, '081223334455', 'Kediri', '2024-09-09', '2024-09-09 00:00:51', '2024-09-09 00:00:51', NULL);

-- Dumping structure for table kalenderbeasiswa.wishlists
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kbeasiswa` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kbeasiswa` (`id_kbeasiswa`),
  CONSTRAINT `id_kbeasiswa` FOREIGN KEY (`id_kbeasiswa`) REFERENCES `kalender_beasiswas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalenderbeasiswa.wishlists: ~9 rows (approximately)
DELETE FROM `wishlists`;
INSERT INTO `wishlists` (`id`, `id_kbeasiswa`, `created_at`, `updated_at`) VALUES
	(27, 15, '2024-08-04 18:19:28', '2024-08-04 18:19:28'),
	(31, 11, '2024-08-05 05:13:28', '2024-08-05 05:13:28'),
	(32, 11, '2024-08-05 17:49:47', '2024-08-05 17:49:47'),
	(33, 11, '2024-08-05 23:05:51', '2024-08-05 23:05:51'),
	(36, 16, '2024-08-05 23:13:55', '2024-08-05 23:13:55'),
	(37, 16, '2024-08-05 23:16:43', '2024-08-05 23:16:43'),
	(44, 28, '2024-08-08 01:33:57', '2024-08-08 01:33:57'),
	(45, 28, '2024-08-08 01:34:05', '2024-08-08 01:34:05'),
	(46, 28, '2024-08-08 01:34:43', '2024-08-08 01:34:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
