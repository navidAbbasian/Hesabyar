-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2023 at 09:09 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hesabyar_apiato`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `account_number` bigint DEFAULT NULL,
  `cart_number` bigint NOT NULL,
  `shaba_number` bigint NOT NULL,
  `pos_number` bigint DEFAULT NULL,
  `account_owner` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `inventory` bigint DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `branch`, `account_number`, `cart_number`, `shaba_number`, `pos_number`, `account_owner`, `inventory`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tejarat', 'main', 1, 1, 1, 1, 'ali', 1009979, 1, 'some text', '2023-06-28 09:33:52', '2023-07-03 05:27:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_name_lists`
--

DROP TABLE IF EXISTS `bank_name_lists`;
CREATE TABLE IF NOT EXISTS `bank_name_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buy_product_factors`
--

DROP TABLE IF EXISTS `buy_product_factors`;
CREATE TABLE IF NOT EXISTS `buy_product_factors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reverse` tinyint NOT NULL DEFAULT '0',
  `factor_number` bigint NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `discount_type` tinyint NOT NULL,
  `discount` int NOT NULL,
  `tax` int NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sum_total_factor` bigint NOT NULL DEFAULT '0',
  `person_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buy_product_factors_person_id_foreign` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy_product_factors`
--

INSERT INTO `buy_product_factors` (`id`, `reverse`, `factor_number`, `title`, `date`, `discount_type`, `discount`, `tax`, `description`, `sum_total_factor`, `person_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 0, 1, '1', '2023-05-31', 1, 1, 1, '1', 1922, 1, '2023-07-01 02:01:34', '2023-07-01 06:08:40', NULL),
(3, 0, 2, '1', '2023-05-31', 1, 1, 1, '1', 1274, 1, '2023-07-01 02:01:35', '2023-07-01 02:01:35', NULL),
(4, 0, 3, '1', '2023-05-31', 1, 1, 1, '1', 1274, 1, '2023-07-01 02:01:37', '2023-07-01 02:01:37', NULL),
(5, 0, 4, '1', '2023-05-31', 1, 1, 1, '1', 1274, 1, '2023-07-01 02:01:38', '2023-07-01 02:01:38', NULL),
(6, 0, 5, '1', '2023-05-31', 1, 1, 1, '1', 1274, 1, '2023-07-01 09:20:48', '2023-07-01 09:20:48', NULL),
(7, 0, 6, '1', '2023-05-31', 1, 1, 1, '1', 1274, 1, '2023-07-01 10:41:23', '2023-07-01 10:41:23', NULL),
(8, 0, 7, '1', '2023-05-31', 1, 1, 1, '1', 1078, 1, '2023-07-01 10:42:39', '2023-07-01 10:42:39', NULL),
(9, 0, 8, '1', '2023-05-31', 1, 1, 1, '1', 1921, 1, '2023-07-02 07:35:32', '2023-07-02 07:35:53', NULL),
(10, 0, 9, '1', '2023-05-31', 1, 1, 1, '1', 1274, 1, '2023-07-02 09:44:30', '2023-07-02 09:44:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buy_product_factor_items`
--

DROP TABLE IF EXISTS `buy_product_factor_items`;
CREATE TABLE IF NOT EXISTS `buy_product_factor_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `factor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `buy_product_factor_items_factor_id_foreign` (`factor_id`),
  KEY `buy_product_factor_items_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy_product_factor_items`
--

INSERT INTO `buy_product_factor_items` (`id`, `quantity`, `product_id`, `factor_id`, `created_at`, `updated_at`) VALUES
(4, 1160, 1, 2, '2023-07-01 02:01:34', '2023-07-01 06:08:40'),
(5, 800, 2, 2, '2023-07-01 02:01:34', '2023-07-01 06:08:18'),
(6, 1, 3, 2, '2023-07-01 02:01:34', '2023-07-01 05:38:52'),
(7, 300, 1, 3, '2023-07-01 02:01:35', '2023-07-01 02:01:35'),
(8, 500, 2, 3, '2023-07-01 02:01:35', '2023-07-01 02:01:35'),
(9, 500, 3, 3, '2023-07-01 02:01:35', '2023-07-01 02:01:35'),
(10, 300, 1, 4, '2023-07-01 02:01:37', '2023-07-01 02:01:37'),
(11, 500, 2, 4, '2023-07-01 02:01:37', '2023-07-01 02:01:37'),
(12, 500, 3, 4, '2023-07-01 02:01:37', '2023-07-01 02:01:37'),
(13, 300, 1, 5, '2023-07-01 02:01:38', '2023-07-01 02:01:38'),
(14, 500, 2, 5, '2023-07-01 02:01:38', '2023-07-01 02:01:38'),
(15, 500, 3, 5, '2023-07-01 02:01:38', '2023-07-01 02:01:38'),
(16, 300, 1, 6, '2023-07-01 09:20:48', '2023-07-01 09:20:48'),
(17, 500, 2, 6, '2023-07-01 09:20:48', '2023-07-01 09:20:48'),
(18, 500, 3, 6, '2023-07-01 09:20:48', '2023-07-01 09:20:48'),
(19, 300, 1, 7, '2023-07-01 10:41:23', '2023-07-01 10:41:23'),
(20, 500, 2, 7, '2023-07-01 10:41:23', '2023-07-01 10:41:23'),
(21, 500, 3, 7, '2023-07-01 10:41:23', '2023-07-01 10:41:23'),
(22, 300, 1, 8, '2023-07-01 10:42:39', '2023-07-01 10:42:39'),
(23, 300, 2, 8, '2023-07-01 10:42:39', '2023-07-01 10:42:39'),
(24, 500, 3, 8, '2023-07-01 10:42:39', '2023-07-01 10:42:39'),
(25, 1160, 1, 9, '2023-07-02 07:35:32', '2023-07-02 07:35:42'),
(26, 800, 2, 9, '2023-07-02 07:35:32', '2023-07-02 07:35:42'),
(27, 1, 3, 9, '2023-07-02 07:35:32', '2023-07-02 07:35:42'),
(28, 300, 1, 10, '2023-07-02 09:44:30', '2023-07-02 09:44:30'),
(29, 500, 2, 10, '2023-07-02 09:44:30', '2023-07-02 09:44:30'),
(30, 500, 3, 10, '2023-07-02 09:44:30', '2023-07-02 09:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_payments`
--

DROP TABLE IF EXISTS `cheque_payments`;
CREATE TABLE IF NOT EXISTS `cheque_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` bigint NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `person_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cheque_payments_person_id_foreign` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cheque_payments`
--

INSERT INTO `cheque_payments` (`id`, `date`, `bank_name`, `branch_name`, `amount`, `description`, `status`, `person_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-05-30', '1', '1', 1, '1', 1, 1, '2023-06-28 09:35:28', '2023-06-28 09:35:28', NULL),
(2, '2023-05-30', '1', '1', 1, '1', 1, 1, '2023-06-28 09:35:30', '2023-06-28 09:35:30', NULL),
(3, '2023-05-30', '1', '1', 1, '1', 1, 1, '2023-07-02 10:05:08', '2023-07-03 01:53:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cheque_receiveds`
--

DROP TABLE IF EXISTS `cheque_receiveds`;
CREATE TABLE IF NOT EXISTS `cheque_receiveds` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` bigint NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cheque_image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `person_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cheque_receiveds_person_id_foreign` (`person_id`),
  KEY `cheque_receiveds_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cheque_receiveds`
--

INSERT INTO `cheque_receiveds` (`id`, `date`, `bank_name`, `branch_name`, `amount`, `description`, `cheque_image`, `status`, `person_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-05-30', '1', '1', 30, '1', NULL, 1, 1, NULL, '2023-06-28 09:34:20', '2023-06-28 09:34:20', NULL),
(2, '2023-05-30', '1', '1', 30, '1', NULL, 1, 1, NULL, '2023-06-28 09:34:49', '2023-06-28 09:34:49', NULL),
(3, '2023-05-30', '1', '1', 30, '1', NULL, 1, 1, NULL, '2023-06-28 09:35:11', '2023-07-03 02:07:02', NULL),
(4, '2023-05-30', '1', '1', 30, '1', NULL, 1, 1, 2, '2023-07-01 07:12:44', '2023-07-01 07:12:44', NULL),
(5, '2023-05-30', '1', '1', 3000, '1', NULL, 1, 1, 2, '2023-07-01 07:13:09', '2023-07-01 07:13:09', NULL),
(6, '2023-05-30', '1', '1', 3000, '1', NULL, 3, 1, 2, '2023-07-01 07:14:52', '2023-07-01 07:14:52', NULL),
(7, '2023-05-30', '1', '1', 3000, '1', NULL, 1, 1, 2, '2023-07-01 07:14:56', '2023-07-01 07:14:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `economic_code` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

DROP TABLE IF EXISTS `dashboards`;
CREATE TABLE IF NOT EXISTS `dashboards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_reports`
--

DROP TABLE IF EXISTS `financial_reports`;
CREATE TABLE IF NOT EXISTS `financial_reports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

DROP TABLE IF EXISTS `funds`;
CREATE TABLE IF NOT EXISTS `funds` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `inventory` varchar(191) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `title`, `inventory`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '20061', '1', '1', '2023-07-03 04:59:08', '2023-07-03 05:20:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2000_01_01_000001_create_users_table', 1),
(2, '2000_01_01_000002_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2016_12_29_201047_create_permission_tables', 1),
(9, '2017_04_22_122453_add_extra_fields_to_permissions_tale', 1),
(10, '2017_04_22_122522_add_extra_fields_to_roles_table', 1),
(11, '2017_09_12_174826_create_notifications_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2021_03_01_150940_create_jobs_table', 1),
(14, '2023_05_24_170441_create_person_categories_table', 1),
(15, '2023_05_26_104549_create_companies_table', 1),
(16, '2023_05_27_165016_create_persons_table', 1),
(17, '2023_05_28_113903_create_cheque_payments_table', 1),
(18, '2023_05_28_145620_create_banks_table', 1),
(19, '2023_05_29_054905_create_side_income_categories_table', 1),
(20, '2023_05_29_055412_create_side_cost_categories_table', 1),
(21, '2023_05_29_061844_create_funds_table', 1),
(22, '2023_05_29_072037_create_product_categories_table', 1),
(23, '2023_05_29_125138_create_cheque_receiveds_table', 1),
(24, '2023_05_29_130453_create_suppliers_table', 1),
(25, '2023_05_29_131603_create_side_incomes_table', 1),
(26, '2023_05_29_133548_create_units_table', 1),
(27, '2023_05_30_055936_create_side_costs_table', 1),
(28, '2023_05_30_070024_create_stockholders_table', 1),
(29, '2023_05_30_080927_create_products_table', 1),
(30, '2023_05_30_085845_create_sell_product_factors_table', 1),
(31, '2023_05_31_064030_create_buy_product_factors_table', 1),
(32, '2023_06_01_062655_create_transactions_table', 1),
(33, '2023_06_01_063946_create_buy_product_factor_items_table', 1),
(34, '2023_06_01_085805_create_sell_product_factor_items_table', 1),
(35, '2023_06_03_070537_create_bank_name_lists_table', 1),
(36, '2023_06_07_080252_create_financial_reports_table', 1),
(37, '2023_06_22_092815_create_dashboards_table', 1),
(38, '2023_07_01_113946_add_type_to_transactions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Containers\\AppSection\\User\\Models\\User', 1),
(2, 'App\\Containers\\AppSection\\User\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_general_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_general_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2c38f356a37aac77ae9b6d7a1728d7c9add8184ecb1d96149f84ad47ed71334a42ad4bf736202d01', 1, 2, NULL, '[]', 0, '2023-07-02 03:16:51', '2023-07-02 03:16:51', '2023-07-03 06:46:51'),
('957ad1954a526edb29213265cd4a379e3ce1b8c554872d6bf903231b7d4cc7f6b06f7f108ccaa30d', 1, 2, NULL, '[]', 0, '2023-06-28 09:33:29', '2023-06-28 09:33:29', '2023-06-29 13:03:29'),
('de6d2efc89ec4eae91160e2559dad7dd6779010683b862c31727fc21bfe7a05ce957353b33369725', 1, 2, NULL, '[]', 0, '2023-07-01 01:53:39', '2023-07-01 01:53:39', '2023-07-02 05:23:39'),
('f76e8ed5acef905bda59644cbc36e104c79a7ff9a733bd94a3f4f98eb841599219af5efab6b25bd4', 1, 2, NULL, '[]', 0, '2023-07-03 03:28:32', '2023-07-03 03:28:32', '2023-07-04 06:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_general_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_general_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'apiato Personal Access Client', 'OLGI0yyEA0pnE7HJBDTRi27YbgT7DPboIO4WBQtB', NULL, 'http://localhost', 1, 0, 0, '2023-06-28 09:32:52', '2023-06-28 09:32:52'),
(2, NULL, 'apiato Password Grant Client', '1dqqbHOgjscgq2ow9t4xTBKYP95xDQehkxQTccKY', 'users', 'http://localhost', 0, 1, 0, '2023-06-28 09:32:52', '2023-06-28 09:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-28 09:32:52', '2023-06-28 09:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('07ff3395f824c23dc2243cd26d5139116d072bf02a9708f8864b02f4ecca38e4d0630e1d8e46b3a7', '2c38f356a37aac77ae9b6d7a1728d7c9add8184ecb1d96149f84ad47ed71334a42ad4bf736202d01', 0, '2023-08-01 06:46:51'),
('8381749e64c6092cafcd2cf3283ea706c5c8a5da7185f9af7b0a0cfa2d8021e683d1e5d3dc70cc93', '957ad1954a526edb29213265cd4a379e3ce1b8c554872d6bf903231b7d4cc7f6b06f7f108ccaa30d', 0, '2023-07-28 13:03:29'),
('9adde7292a460817a78b0b8f5996fa6dc2ce4d6af185c84d1a066aa54e34c6bcbabf5980255cf69e', 'f76e8ed5acef905bda59644cbc36e104c79a7ff9a733bd94a3f4f98eb841599219af5efab6b25bd4', 0, '2023-08-02 06:58:32'),
('d60b30dceb736b670e5c333113a878de59b287cf0bec54c8c4746efa583039fdd11a95a85b31dafd', 'de6d2efc89ec4eae91160e2559dad7dd6779010683b862c31727fc21bfe7a05ce957353b33369725', 0, '2023-07-31 05:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `display_name`, `description`) VALUES
(1, 'manage-roles', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create, Update, Delete, Get All, Attach/detach permissions to Roles and Get All Permissions.'),
(2, 'manage-permissions', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create, Update, Delete, Get All, Attach/detach permissions to User.'),
(3, 'create-admins', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create new Users (Admins) from the dashboard.'),
(4, 'manage-admins-access', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Assign users to Roles.'),
(5, 'access-dashboard', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Access the admins dashboard.'),
(6, 'access-private-docs', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Access the private docs.'),
(7, 'manage-roles', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create, Update, Delete, Get All, Attach/detach permissions to Roles and Get All Permissions.'),
(8, 'manage-permissions', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create, Update, Delete, Get All, Attach/detach permissions to User.'),
(9, 'create-admins', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create new Users (Admins) from the dashboard.'),
(10, 'manage-admins-access', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Assign users to Roles.'),
(11, 'access-dashboard', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Access the admins dashboard.'),
(12, 'access-private-docs', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Access the private docs.'),
(13, 'search-users', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Find a User in the DB.'),
(14, 'list-users', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Get All Users.'),
(15, 'update-users', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Update a User.'),
(16, 'delete-users', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Delete a User.'),
(17, 'refresh-users', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Refresh User data.'),
(18, 'create-users', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create User data.'),
(19, 'search-users', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Find a User in the DB.'),
(20, 'list-users', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Get All Users.'),
(21, 'update-users', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Update a User.'),
(22, 'delete-users', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Delete a User.'),
(23, 'refresh-users', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Refresh User data.'),
(24, 'create-users', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', NULL, 'Create User data.'),
(25, 'search-banks', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Bank in the DB.'),
(26, 'list-banks', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Bank.'),
(27, 'update-banks', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Bank.'),
(28, 'delete-banks', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Bank.'),
(29, 'create-banks', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Bank data.'),
(30, 'search-banks', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Bank in the DB.'),
(31, 'list-banks', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Bank.'),
(32, 'update-banks', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Bank.'),
(33, 'delete-banks', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Bank.'),
(34, 'create-banks', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Bank data.'),
(35, 'search-buyproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a BuyProductFactor in the DB.'),
(36, 'list-buyproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All BuyProductFactor.'),
(37, 'update-buyproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a BuyProductFactor.'),
(38, 'delete-buyproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a BuyProductFactor.'),
(39, 'create-buyproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create BuyProductFactor data.'),
(40, 'search-buyproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a BuyProductFactor in the DB.'),
(41, 'list-buyproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All BuyProductFactor.'),
(42, 'update-buyproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a BuyProductFactor.'),
(43, 'delete-buyproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a BuyProductFactor.'),
(44, 'create-buyproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create BuyProductFactor data.'),
(45, 'search-chequepayment', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a ChequePayment in the DB.'),
(46, 'list-chequepayment', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All ChequePayment.'),
(47, 'update-chequepayment', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a ChequePayment.'),
(48, 'delete-chequepayment', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a ChequePayment.'),
(49, 'create-chequepayment', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create ChequePayment data.'),
(50, 'search-chequepayment', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a ChequePayment in the DB.'),
(51, 'list-chequepayment', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All ChequePayment.'),
(52, 'update-chequepayment', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a ChequePayment.'),
(53, 'delete-chequepayment', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a ChequePayment.'),
(54, 'create-chequepayment', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create ChequePayment data.'),
(55, 'search-chequereceived', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a ChequeReceived in the DB.'),
(56, 'list-chequereceived', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All ChequeReceived.'),
(57, 'update-chequereceived', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a ChequeReceived.'),
(58, 'delete-chequereceived', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a ChequeReceived.'),
(59, 'create-chequereceived', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create ChequeReceived data.'),
(60, 'search-chequereceived', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a ChequeReceived in the DB.'),
(61, 'list-chequereceived', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All ChequeReceived.'),
(62, 'update-chequereceived', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a ChequeReceived.'),
(63, 'delete-chequereceived', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a ChequeReceived.'),
(64, 'create-chequereceived', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create ChequeReceived data.'),
(65, 'search-companies', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Company in the DB.'),
(66, 'list-companies', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Company.'),
(67, 'update-companies', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Company.'),
(68, 'delete-companies', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Company.'),
(69, 'create-companies', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Company data.'),
(70, 'search-companies', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Company in the DB.'),
(71, 'list-companies', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Company.'),
(72, 'update-companies', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Company.'),
(73, 'delete-companies', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Company.'),
(74, 'create-companies', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Company data.'),
(75, 'search-funds', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Fund in the DB.'),
(76, 'list-funds', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Fund.'),
(77, 'update-funds', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Fund.'),
(78, 'delete-funds', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Fund.'),
(79, 'create-funds', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Fund data.'),
(80, 'search-funds', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Fund in the DB.'),
(81, 'list-funds', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Fund.'),
(82, 'update-funds', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Fund.'),
(83, 'delete-funds', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Fund.'),
(84, 'create-funds', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Fund data.'),
(85, 'search-persons', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Person in the DB.'),
(86, 'list-persons', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Person.'),
(87, 'update-persons', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Person.'),
(88, 'delete-persons', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Person.'),
(89, 'create-persons', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Person data.'),
(90, 'search-persons', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Person in the DB.'),
(91, 'list-persons', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Person.'),
(92, 'update-persons', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Person.'),
(93, 'delete-persons', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Person.'),
(94, 'create-persons', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Person data.'),
(95, 'search-personcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a PersonCategory in the DB.'),
(96, 'list-personcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All PersonCategory.'),
(97, 'update-personcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a PersonCategory.'),
(98, 'delete-personcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a PersonCategory.'),
(99, 'create-personcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create PersonCategory data.'),
(100, 'search-personcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a PersonCategory in the DB.'),
(101, 'list-personcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All PersonCategory.'),
(102, 'update-personcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a PersonCategory.'),
(103, 'delete-personcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a PersonCategory.'),
(104, 'create-personcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create PersonCategory data.'),
(105, 'search-products', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Product in the DB.'),
(106, 'list-products', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Product.'),
(107, 'update-products', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Product.'),
(108, 'delete-products', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Product.'),
(109, 'create-products', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Product data.'),
(110, 'search-products', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Product in the DB.'),
(111, 'list-products', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Product.'),
(112, 'update-products', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Product.'),
(113, 'delete-products', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Product.'),
(114, 'create-products', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Product data.'),
(115, 'search-productcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a ProductCategory in the DB.'),
(116, 'list-productcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All ProductCategory.'),
(117, 'update-productcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a ProductCategory.'),
(118, 'delete-productcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a ProductCategory.'),
(119, 'create-productcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create ProductCategory data.'),
(120, 'search-productcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a ProductCategory in the DB.'),
(121, 'list-productcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All ProductCategory.'),
(122, 'update-productcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a ProductCategory.'),
(123, 'delete-productcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a ProductCategory.'),
(124, 'create-productcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create ProductCategory data.'),
(125, 'search-sellproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SellProductFactor in the DB.'),
(126, 'list-sellproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SellProductFactor.'),
(127, 'update-sellproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SellProductFactor.'),
(128, 'delete-sellproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SellProductFactor.'),
(129, 'create-sellproductfactor', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SellProductFactor data.'),
(130, 'search-sellproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SellProductFactor in the DB.'),
(131, 'list-sellproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SellProductFactor.'),
(132, 'update-sellproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SellProductFactor.'),
(133, 'delete-sellproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SellProductFactor.'),
(134, 'create-sellproductfactor', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SellProductFactor data.'),
(135, 'search-sellers', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Seller in the DB.'),
(136, 'list-sellers', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Seller.'),
(137, 'update-sellers', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Seller.'),
(138, 'delete-sellers', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Seller.'),
(139, 'create-sellers', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Seller data.'),
(140, 'search-sellers', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Seller in the DB.'),
(141, 'list-sellers', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Seller.'),
(142, 'update-sellers', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Seller.'),
(143, 'delete-sellers', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Seller.'),
(144, 'create-sellers', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Seller data.'),
(145, 'search-sidecost', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideCost in the DB.'),
(146, 'list-sidecost', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideCost.'),
(147, 'update-sidecost', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideCost.'),
(148, 'delete-sidecost', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideCost.'),
(149, 'create-sidecost', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideCost data.'),
(150, 'search-sidecost', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideCost in the DB.'),
(151, 'list-sidecost', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideCost.'),
(152, 'update-sidecost', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideCost.'),
(153, 'delete-sidecost', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideCost.'),
(154, 'create-sidecost', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideCost data.'),
(155, 'search-sidecostcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideCostCategory in the DB.'),
(156, 'list-sidecostcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideCostCategory.'),
(157, 'update-sidecostcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideCostCategory.'),
(158, 'delete-sidecostcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideCostCategory.'),
(159, 'create-sidecostcategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideCostCategory data.'),
(160, 'search-sidecostcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideCostCategory in the DB.'),
(161, 'list-sidecostcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideCostCategory.'),
(162, 'update-sidecostcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideCostCategory.'),
(163, 'delete-sidecostcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideCostCategory.'),
(164, 'create-sidecostcategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideCostCategory data.'),
(165, 'search-sideincome', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideIncome in the DB.'),
(166, 'list-sideincome', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideIncome.'),
(167, 'update-sideincome', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideIncome.'),
(168, 'delete-sideincome', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideIncome.'),
(169, 'create-sideincome', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideIncome data.'),
(170, 'search-sideincome', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideIncome in the DB.'),
(171, 'list-sideincome', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideIncome.'),
(172, 'update-sideincome', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideIncome.'),
(173, 'delete-sideincome', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideIncome.'),
(174, 'create-sideincome', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideIncome data.'),
(175, 'search-sideincomecategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideIncomeCategory in the DB.'),
(176, 'list-sideincomecategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideIncomeCategory.'),
(177, 'update-sideincomecategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideIncomeCategory.'),
(178, 'delete-sideincomecategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideIncomeCategory.'),
(179, 'create-sideincomecategory', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideIncomeCategory data.'),
(180, 'search-sideincomecategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a SideIncomeCategory in the DB.'),
(181, 'list-sideincomecategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All SideIncomeCategory.'),
(182, 'update-sideincomecategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a SideIncomeCategory.'),
(183, 'delete-sideincomecategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a SideIncomeCategory.'),
(184, 'create-sideincomecategory', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create SideIncomeCategory data.'),
(185, 'search-stockholder', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a stockholder in the DB.'),
(186, 'list-stockholder', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All stockholder.'),
(187, 'update-stockholder', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a stockholder.'),
(188, 'delete-stockholder', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a stockholder.'),
(189, 'create-stockholder', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create stockholder data.'),
(190, 'search-stockholder', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a stockholder in the DB.'),
(191, 'list-stockholder', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All stockholder.'),
(192, 'update-stockholder', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a stockholder.'),
(193, 'delete-stockholder', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a stockholder.'),
(194, 'create-stockholder', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create stockholder data.'),
(195, 'search-supplier', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Supplier in the DB.'),
(196, 'list-supplier', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Supplier.'),
(197, 'update-supplier', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Supplier.'),
(198, 'delete-supplier', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Supplier.'),
(199, 'create-supplier', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Supplier data.'),
(200, 'search-supplier', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Supplier in the DB.'),
(201, 'list-supplier', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Supplier.'),
(202, 'update-supplier', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Supplier.'),
(203, 'delete-supplier', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Supplier.'),
(204, 'create-supplier', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Supplier data.'),
(205, 'search-transactions', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Transactions in the DB.'),
(206, 'list-transactions', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Transactions.'),
(207, 'update-transactions', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Transactions.'),
(208, 'delete-transactions', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Transactions.'),
(209, 'create-transactions', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Transactions data.'),
(210, 'search-transactions', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Transactions in the DB.'),
(211, 'list-transactions', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Transactions.'),
(212, 'update-transactions', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Transactions.'),
(213, 'delete-transactions', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Transactions.'),
(214, 'create-transactions', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Transactions data.'),
(215, 'search-units', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Unit in the DB.'),
(216, 'list-units', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Unit.'),
(217, 'update-units', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Unit.'),
(218, 'delete-units', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Unit.'),
(219, 'create-units', 'web', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Unit data.'),
(220, 'search-units', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Find a Unit in the DB.'),
(221, 'list-units', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Get All Unit.'),
(222, 'update-units', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Update a Unit.'),
(223, 'delete-units', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Delete a Unit.'),
(224, 'create-units', 'api', '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL, 'Create Unit data.');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `family` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` bigint DEFAULT NULL,
  `telephone_number` bigint DEFAULT NULL,
  `fax_number` bigint DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `person_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persons_company_id_foreign` (`company_id`),
  KEY `persons_person_category_id_foreign` (`person_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `family`, `image`, `description`, `country`, `province`, `city`, `address`, `postal_code`, `phone_number`, `telephone_number`, `fax_number`, `email`, `website`, `company_id`, `person_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', NULL, '1', '1', '1', '1', '1', '1', 1, 1, 1, '1@2.com', 'http://www.111.com', NULL, 1, '2023-06-28 09:34:04', '2023-06-28 09:34:04', NULL),
(2, '1', '1', NULL, '1', '1', '1', '1', '1', '1', 1, 1, 1, '1@2.com', 'http://www.111.com', NULL, 1, '2023-07-02 09:34:09', '2023-07-02 09:34:09', NULL),
(3, '1', '1', NULL, '1', '1', '1', '1', '1', '1', 1, 1, 1, '1@2.com', 'http://www.111.com', NULL, 1, '2023-07-02 09:43:02', '2023-07-02 09:43:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person_categories`
--

DROP TABLE IF EXISTS `person_categories`;
CREATE TABLE IF NOT EXISTS `person_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person_categories`
--

INSERT INTO `person_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '2023-06-28 09:33:59', '2023-06-28 09:33:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code` bigint NOT NULL,
  `buy_price` bigint NOT NULL,
  `sale_price` bigint NOT NULL,
  `quantity` bigint NOT NULL,
  `type` tinyint NOT NULL COMMENT '0 => buy price 1 => Cost of production',
  `status` tinyint NOT NULL DEFAULT '0',
  `description` mediumtext COLLATE utf8mb4_general_ci,
  `total_working_hours` int DEFAULT NULL,
  `direct_working_rate` int DEFAULT NULL,
  `continuous_material_rate` int DEFAULT NULL,
  `total_materials_used` int DEFAULT NULL,
  `indirect_cost_of_work` int DEFAULT NULL,
  `indirect_cost_of_material` int DEFAULT NULL,
  `other_costs` int DEFAULT NULL,
  `product_category_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_unit_id_foreign` (`unit_id`),
  KEY `products_product_category_id_foreign` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `code`, `buy_price`, `sale_price`, `quantity`, `type`, `status`, `description`, `total_working_hours`, `direct_working_rate`, `continuous_material_rate`, `total_materials_used`, `indirect_cost_of_work`, `indirect_cost_of_material`, `other_costs`, `product_category_id`, `unit_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', NULL, 1, 5, 1, 3299, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-01 02:01:24', '2023-07-02 09:44:30', NULL),
(2, '1', NULL, 1, 5, 1, 1999, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-01 02:01:26', '2023-07-02 09:44:30', NULL),
(3, '1', NULL, 1, 5, 1, 103494, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-01 02:01:28', '2023-07-02 09:44:30', NULL),
(4, '1', NULL, 1, 5, 1, 1, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-02 07:36:37', '2023-07-02 07:36:37', NULL),
(5, '1', NULL, 1, 5, 1, 1, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-02 07:40:57', '2023-07-02 07:40:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '2023-07-01 02:01:21', '2023-07-01 02:01:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `display_name`, `description`) VALUES
(1, 'admin', 'web', '2023-06-28 09:32:47', '2023-06-28 09:32:47', 'Administrator Role', 'Administrator'),
(2, 'admin', 'api', '2023-06-28 09:32:47', '2023-06-28 09:32:47', 'Administrator Role', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sell_product_factors`
--

DROP TABLE IF EXISTS `sell_product_factors`;
CREATE TABLE IF NOT EXISTS `sell_product_factors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `factor_number` bigint NOT NULL,
  `reverse` tinyint NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `due_date` date NOT NULL,
  `sell_date` date NOT NULL,
  `discount_type` tinyint NOT NULL,
  `discount` int NOT NULL,
  `tax` int NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profit` bigint NOT NULL DEFAULT '0',
  `sum_total_factor` bigint NOT NULL DEFAULT '0',
  `person_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sell_product_factors_person_id_foreign` (`person_id`),
  KEY `sell_product_factors_user_id_foreign` (`user_id`),
  KEY `sell_product_factors_supplier_id_foreign` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_product_factors`
--

INSERT INTO `sell_product_factors` (`id`, `factor_number`, `reverse`, `title`, `due_date`, `sell_date`, `discount_type`, `discount`, `tax`, `description`, `profit`, `sum_total_factor`, `person_id`, `user_id`, `supplier_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -406, 99, 1, 2, 1, '2023-07-01 02:02:01', '2023-07-01 02:02:01', NULL),
(2, 2, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -406, 99, 1, 2, 1, '2023-07-01 02:02:03', '2023-07-01 02:02:03', NULL),
(3, 3, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -406, 99, 1, 2, 1, '2023-07-01 02:02:04', '2023-07-01 02:02:04', NULL),
(4, 4, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -406, 99, 1, 2, 1, '2023-07-01 02:03:37', '2023-07-01 02:03:37', NULL),
(5, 5, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -8040, 1960, 1, 2, 1, '2023-07-01 04:28:41', '2023-07-01 04:28:41', NULL),
(6, 6, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -804000, 196000, 1, 2, 1, '2023-07-01 04:28:49', '2023-07-01 04:28:49', NULL),
(7, 7, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -804000, 196000, 1, 2, 1, '2023-07-01 04:28:55', '2023-07-01 04:28:55', NULL),
(8, 8, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -406, 99, 1, 2, 1, '2023-07-01 05:16:33', '2023-07-01 05:16:33', NULL),
(9, 9, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -402004, 98001, 1, 2, 1, '2023-07-01 05:16:49', '2023-07-01 05:16:49', NULL),
(11, 10, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -4020004, 980001, 1, 2, 1, '2023-07-01 05:17:01', '2023-07-01 05:17:01', NULL),
(12, 11, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -4020004, 980001, 1, 2, 1, '2023-07-01 05:17:07', '2023-07-01 05:17:07', NULL),
(13, 12, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -4020004, 980001, 1, 2, 1, '2023-07-01 05:17:11', '2023-07-01 05:17:11', NULL),
(15, 13, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -4020004, 980001, 1, 2, 1, '2023-07-01 05:17:24', '2023-07-01 05:17:24', NULL),
(16, 14, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -20100004, 4900001, 1, 2, 1, '2023-07-01 05:17:53', '2023-07-01 05:17:53', NULL),
(18, 15, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -2010004, 490001, 1, 2, 1, '2023-07-01 05:18:06', '2023-07-01 05:18:06', NULL),
(20, 16, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -201004, 49001, 1, 2, 1, '2023-07-01 05:18:13', '2023-07-01 05:18:13', NULL),
(21, 17, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -201004, 49001, 1, 2, 1, '2023-07-01 05:18:19', '2023-07-01 05:18:19', NULL),
(22, 18, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -201004, 49001, 1, 2, 1, '2023-07-01 05:18:22', '2023-07-01 05:18:22', NULL),
(23, 19, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -201004, 49001, 1, 2, 1, '2023-07-01 05:19:04', '2023-07-01 05:19:04', NULL),
(26, 20, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -2014, 491, 1, 2, 1, '2023-07-01 06:08:45', '2023-07-01 06:08:45', NULL),
(30, 21, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -406, 78154503, 1, 2, 1, '2023-07-01 06:09:22', '2023-07-01 06:15:14', NULL),
(31, 22, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -320592765, 78154455, 1, 2, 1, '2023-07-01 06:14:53', '2023-07-01 06:14:53', NULL),
(32, 23, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -320592765, 78154455, 1, 2, 1, '2023-07-01 06:15:20', '2023-07-01 06:15:20', NULL),
(33, 24, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -320592765, 78900524, 1, 2, 1, '2023-07-01 06:15:24', '2023-07-01 06:16:36', NULL),
(37, 25, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -8, 2, 1, 2, 1, '2023-07-01 08:54:24', '2023-07-01 08:54:24', NULL),
(38, 26, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -8, 2, 1, 5, 1, '2023-07-01 09:21:05', '2023-07-01 09:21:05', NULL),
(39, 27, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -804, 196, 1, 5, 1, '2023-07-01 09:21:21', '2023-07-01 09:21:21', NULL),
(40, 28, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -804, 196, 1, 5, 1, '2023-07-01 09:24:50', '2023-07-01 09:24:50', NULL),
(41, 29, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -804, 196, 1, 5, 1, '2023-07-01 09:25:25', '2023-07-01 09:25:25', NULL),
(42, 30, 0, '111111', '2023-05-31', '2023-05-31', 1, 1, 1, '1', -804, 196, 1, 5, 1, '2023-07-01 10:41:29', '2023-07-01 10:41:29', NULL),
(43, 31, 0, '111111', '2023-05-31', '2023-05-31', 1, 5, 9, '1', -828, 172, 1, 5, 1, '2023-07-01 10:42:53', '2023-07-01 10:42:54', NULL),
(44, 32, 0, '111111', '2023-05-31', '2023-05-31', 1, 5, 9, '1', -828, 172, 1, 5, 1, '2023-07-02 04:17:42', '2023-07-02 04:17:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sell_product_factor_items`
--

DROP TABLE IF EXISTS `sell_product_factor_items`;
CREATE TABLE IF NOT EXISTS `sell_product_factor_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `factor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sell_product_factor_items_factor_id_foreign` (`factor_id`),
  KEY `sell_product_factor_items_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_product_factor_items`
--

INSERT INTO `sell_product_factor_items` (`id`, `quantity`, `product_id`, `factor_id`, `created_at`, `updated_at`) VALUES
(1, 100, 2, 1, '2023-07-01 02:02:01', '2023-07-01 02:02:01'),
(2, 1, 1, 1, '2023-07-01 02:02:01', '2023-07-01 02:02:01'),
(3, 100, 2, 2, '2023-07-01 02:02:03', '2023-07-01 02:02:03'),
(4, 1, 1, 2, '2023-07-01 02:02:03', '2023-07-01 02:02:03'),
(5, 100, 2, 3, '2023-07-01 02:02:04', '2023-07-01 02:02:04'),
(6, 1, 1, 3, '2023-07-01 02:02:04', '2023-07-01 02:02:04'),
(7, 100, 2, 4, '2023-07-01 02:03:37', '2023-07-01 02:03:37'),
(8, 1, 1, 4, '2023-07-01 02:03:37', '2023-07-01 02:03:37'),
(9, 1000, 2, 5, '2023-07-01 04:28:41', '2023-07-01 04:28:41'),
(10, 1000, 1, 5, '2023-07-01 04:28:41', '2023-07-01 04:28:41'),
(11, 100000, 2, 6, '2023-07-01 04:28:49', '2023-07-01 04:28:49'),
(12, 100000, 1, 6, '2023-07-01 04:28:49', '2023-07-01 04:28:49'),
(13, 100000, 2, 7, '2023-07-01 04:28:55', '2023-07-01 04:28:55'),
(14, 100000, 1, 7, '2023-07-01 04:28:55', '2023-07-01 04:28:55'),
(15, 100, 2, 8, '2023-07-01 05:16:33', '2023-07-01 05:16:33'),
(16, 1, 1, 8, '2023-07-01 05:16:33', '2023-07-01 05:16:33'),
(17, 100000, 2, 9, '2023-07-01 05:16:49', '2023-07-01 05:16:49'),
(18, 1, 1, 9, '2023-07-01 05:16:49', '2023-07-01 05:16:49'),
(21, 1000000, 2, 11, '2023-07-01 05:17:01', '2023-07-01 05:17:01'),
(22, 1, 1, 11, '2023-07-01 05:17:01', '2023-07-01 05:17:01'),
(23, 1000000, 2, 12, '2023-07-01 05:17:07', '2023-07-01 05:17:07'),
(24, 1, 1, 12, '2023-07-01 05:17:07', '2023-07-01 05:17:07'),
(25, 1000000, 2, 13, '2023-07-01 05:17:11', '2023-07-01 05:17:11'),
(26, 1, 1, 13, '2023-07-01 05:17:11', '2023-07-01 05:17:11'),
(29, 1000000, 2, 15, '2023-07-01 05:17:24', '2023-07-01 05:17:24'),
(30, 1, 1, 15, '2023-07-01 05:17:24', '2023-07-01 05:17:24'),
(31, 5000000, 2, 16, '2023-07-01 05:17:53', '2023-07-01 05:17:53'),
(32, 1, 1, 16, '2023-07-01 05:17:53', '2023-07-01 05:17:53'),
(35, 500000, 2, 18, '2023-07-01 05:18:06', '2023-07-01 05:18:06'),
(36, 1, 1, 18, '2023-07-01 05:18:06', '2023-07-01 05:18:06'),
(39, 50000, 2, 20, '2023-07-01 05:18:13', '2023-07-01 05:18:13'),
(40, 1, 1, 20, '2023-07-01 05:18:13', '2023-07-01 05:18:13'),
(41, 50000, 2, 21, '2023-07-01 05:18:19', '2023-07-01 05:18:19'),
(42, 1, 1, 21, '2023-07-01 05:18:19', '2023-07-01 05:18:19'),
(43, 50000, 2, 22, '2023-07-01 05:18:22', '2023-07-01 05:18:22'),
(44, 1, 1, 22, '2023-07-01 05:18:22', '2023-07-01 05:18:22'),
(45, 50000, 2, 23, '2023-07-01 05:19:04', '2023-07-01 05:19:04'),
(46, 1, 1, 23, '2023-07-01 05:19:04', '2023-07-01 05:19:04'),
(51, 500, 2, 26, '2023-07-01 06:08:45', '2023-07-01 06:08:45'),
(52, 1, 1, 26, '2023-07-01 06:08:45', '2023-07-01 06:08:45'),
(59, 79749443, 2, 30, '2023-07-01 06:09:22', '2023-07-01 06:15:14'),
(60, 50, 1, 30, '2023-07-01 06:09:22', '2023-07-01 06:09:56'),
(61, 79749443, 2, 31, '2023-07-01 06:14:53', '2023-07-01 06:14:53'),
(62, 1, 1, 31, '2023-07-01 06:14:53', '2023-07-01 06:14:53'),
(63, 79749443, 2, 32, '2023-07-01 06:15:20', '2023-07-01 06:15:20'),
(64, 1, 1, 32, '2023-07-01 06:15:20', '2023-07-01 06:15:20'),
(65, 80510689, 2, 33, '2023-07-01 06:15:24', '2023-07-01 06:16:36'),
(66, 50, 1, 33, '2023-07-01 06:15:24', '2023-07-01 06:15:34'),
(73, 1, 2, 37, '2023-07-01 08:54:24', '2023-07-01 08:54:24'),
(74, 1, 1, 37, '2023-07-01 08:54:24', '2023-07-01 08:54:24'),
(75, 1, 2, 38, '2023-07-01 09:21:05', '2023-07-01 09:21:05'),
(76, 1, 1, 38, '2023-07-01 09:21:05', '2023-07-01 09:21:05'),
(77, 100, 2, 39, '2023-07-01 09:21:21', '2023-07-01 09:21:21'),
(78, 100, 1, 39, '2023-07-01 09:21:21', '2023-07-01 09:21:21'),
(79, 100, 2, 40, '2023-07-01 09:24:50', '2023-07-01 09:24:50'),
(80, 100, 1, 40, '2023-07-01 09:24:50', '2023-07-01 09:24:50'),
(81, 100, 2, 41, '2023-07-01 09:25:25', '2023-07-01 09:25:25'),
(82, 100, 1, 41, '2023-07-01 09:25:25', '2023-07-01 09:25:25'),
(83, 100, 2, 42, '2023-07-01 10:41:29', '2023-07-01 10:41:29'),
(84, 100, 1, 42, '2023-07-01 10:41:29', '2023-07-01 10:41:29'),
(85, 100, 2, 43, '2023-07-01 10:42:53', '2023-07-01 10:42:53'),
(86, 100, 1, 43, '2023-07-01 10:42:53', '2023-07-01 10:42:53'),
(87, 100, 2, 44, '2023-07-02 04:17:42', '2023-07-02 04:17:42'),
(88, 100, 1, 44, '2023-07-02 04:17:42', '2023-07-02 04:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `side_costs`
--

DROP TABLE IF EXISTS `side_costs`;
CREATE TABLE IF NOT EXISTS `side_costs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL,
  `payment_method` tinyint DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` bigint NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` timestamp NOT NULL,
  `side_cost_category_id` bigint UNSIGNED DEFAULT NULL,
  `person_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `bank_id` bigint UNSIGNED DEFAULT NULL,
  `fund_id` bigint UNSIGNED DEFAULT NULL,
  `cheque_payment_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `side_costs_person_id_foreign` (`person_id`),
  KEY `side_costs_user_id_foreign` (`user_id`),
  KEY `side_costs_bank_id_foreign` (`bank_id`),
  KEY `side_costs_fund_id_foreign` (`fund_id`),
  KEY `side_costs_cheque_payment_id_foreign` (`cheque_payment_id`),
  KEY `side_costs_side_cost_category_id_foreign` (`side_cost_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `side_costs`
--

INSERT INTO `side_costs` (`id`, `type`, `payment_method`, `title`, `amount`, `description`, `date`, `side_cost_category_id`, `person_id`, `user_id`, `bank_id`, `fund_id`, `cheque_payment_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'hgfg', 10, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, NULL, '2023-07-01 02:32:16', '2023-07-01 02:32:16', NULL),
(2, 1, 1, 'hgfg', 10, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, NULL, '2023-07-01 02:32:19', '2023-07-01 02:32:19', NULL),
(3, 1, 1, 'hgfg', 10, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, NULL, '2023-07-01 02:35:18', '2023-07-01 02:35:18', NULL),
(4, 1, 1, 'hgfg', 10, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, NULL, '2023-07-03 05:23:20', '2023-07-03 05:23:20', NULL),
(5, 1, 1, 'hgfg', 11, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, NULL, '2023-07-03 05:27:00', '2023-07-03 05:27:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `side_cost_categories`
--

DROP TABLE IF EXISTS `side_cost_categories`;
CREATE TABLE IF NOT EXISTS `side_cost_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `side_cost_categories`
--

INSERT INTO `side_cost_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hgfg', NULL, '2023-07-01 02:32:13', '2023-07-01 02:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `side_incomes`
--

DROP TABLE IF EXISTS `side_incomes`;
CREATE TABLE IF NOT EXISTS `side_incomes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL,
  `payment_method` tinyint DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` bigint NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` timestamp NOT NULL,
  `side_income_category_id` bigint UNSIGNED DEFAULT NULL,
  `person_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `bank_id` bigint UNSIGNED DEFAULT NULL,
  `fund_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `side_incomes_person_id_foreign` (`person_id`),
  KEY `side_incomes_user_id_foreign` (`user_id`),
  KEY `side_incomes_bank_id_foreign` (`bank_id`),
  KEY `side_incomes_fund_id_foreign` (`fund_id`),
  KEY `side_incomes_side_income_category_id_foreign` (`side_income_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `side_incomes`
--

INSERT INTO `side_incomes` (`id`, `type`, `payment_method`, `title`, `amount`, `description`, `date`, `side_income_category_id`, `person_id`, `user_id`, `bank_id`, `fund_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-01 02:11:15', '2023-07-01 02:11:15', NULL),
(2, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-01 02:28:56', '2023-07-01 02:28:56', NULL),
(3, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 5, 1, NULL, '2023-07-01 09:20:30', '2023-07-01 09:20:30', NULL),
(4, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 5, 1, NULL, '2023-07-02 04:38:05', '2023-07-02 04:38:05', NULL),
(5, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 5, 1, NULL, '2023-07-02 05:52:36', '2023-07-02 05:52:36', NULL),
(6, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 5, 1, NULL, '2023-07-02 05:52:54', '2023-07-02 05:52:54', NULL),
(7, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 5, 1, NULL, '2023-07-02 05:53:05', '2023-07-02 05:53:05', NULL),
(8, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, '2023-07-02 06:09:55', '2023-07-02 06:09:55', NULL),
(9, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, '2023-07-02 06:12:53', '2023-07-02 06:12:53', NULL),
(10, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 2, 1, NULL, '2023-07-02 06:13:03', '2023-07-02 06:13:03', NULL),
(11, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-02 06:58:05', '2023-07-02 06:58:05', NULL),
(12, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-02 06:58:18', '2023-07-02 06:58:18', NULL),
(13, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-02 06:59:04', '2023-07-02 06:59:04', NULL),
(14, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-02 06:59:52', '2023-07-02 06:59:52', NULL),
(15, 1, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, 1, NULL, '2023-07-03 04:56:11', '2023-07-03 04:56:11', NULL),
(16, 2, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, NULL, 1, '2023-07-03 04:59:19', '2023-07-03 04:59:19', NULL),
(17, 2, 1, 'hgfg', 10000, NULL, '2023-05-29 09:28:30', 1, 1, 3, NULL, 1, '2023-07-03 05:04:02', '2023-07-03 05:04:02', NULL),
(18, 2, 1, 'hgfg', 60, NULL, '2023-05-29 09:28:30', 1, 1, 3, NULL, 1, '2023-07-03 05:20:20', '2023-07-03 05:20:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `side_income_categories`
--

DROP TABLE IF EXISTS `side_income_categories`;
CREATE TABLE IF NOT EXISTS `side_income_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `side_income_categories`
--

INSERT INTO `side_income_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hgfg', '12213213213', '2023-07-01 02:11:12', '2023-07-01 02:11:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stockholders`
--

DROP TABLE IF EXISTS `stockholders`;
CREATE TABLE IF NOT EXISTS `stockholders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `family` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `economic_code` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` bigint NOT NULL,
  `telephone_number` bigint NOT NULL,
  `fax_number` bigint DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `logo`, `registration_number`, `country`, `province`, `city`, `phone`, `email`, `website`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', NULL, '1', '1', '1', '1', '1', 'test@test.com', 'http://www.1.com', '2023-07-01 02:01:57', '2023-07-01 02:01:57', NULL),
(2, '1', NULL, '1', '1', '1', '1', '1', 'test@test.com', 'http://www.1.com', '2023-07-01 02:01:59', '2023-07-01 02:01:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` bigint NOT NULL,
  `is_deposit` tinyint(1) NOT NULL,
  `person_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `bank_id` bigint UNSIGNED DEFAULT NULL,
  `fund_id` bigint UNSIGNED DEFAULT NULL,
  `cheque_receive_id` bigint UNSIGNED DEFAULT NULL,
  `cheque_payment_id` bigint UNSIGNED DEFAULT NULL,
  `sell_product_factor_id` bigint UNSIGNED DEFAULT NULL,
  `buy_product_factor_id` bigint UNSIGNED DEFAULT NULL,
  `side_income_id` bigint UNSIGNED DEFAULT NULL,
  `side_cost_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_person_id_foreign` (`person_id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_bank_id_foreign` (`bank_id`),
  KEY `transactions_fund_id_foreign` (`fund_id`),
  KEY `transactions_cheque_receive_id_foreign` (`cheque_receive_id`),
  KEY `transactions_cheque_payment_id_foreign` (`cheque_payment_id`),
  KEY `transactions_sell_product_factor_id_foreign` (`sell_product_factor_id`),
  KEY `transactions_buy_product_factor_id_foreign` (`buy_product_factor_id`),
  KEY `transactions_side_income_id_foreign` (`side_income_id`),
  KEY `transactions_side_cost_id_foreign` (`side_cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `is_deposit`, `person_id`, `user_id`, `bank_id`, `fund_id`, `cheque_receive_id`, `cheque_payment_id`, `sell_product_factor_id`, `buy_product_factor_id`, `side_income_id`, `side_cost_id`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
(1, 30, 1, 1, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, '2023-06-28 09:34:49', '2023-06-28 09:34:49', NULL, 0),
(2, 30, 1, 1, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2023-06-28 09:35:11', '2023-06-28 09:35:11', NULL, 0),
(3, 1, 0, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-28 09:35:28', '2023-06-28 09:35:28', NULL, 0),
(4, 1, 0, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2023-06-28 09:35:30', '2023-06-28 09:35:30', NULL, 0),
(5, 1922, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2023-07-01 02:01:34', '2023-07-01 06:08:40', NULL, 0),
(6, 1274, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2023-07-01 02:01:35', '2023-07-01 02:01:35', NULL, 0),
(7, 1274, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2023-07-01 02:01:37', '2023-07-01 02:01:37', NULL, 0),
(8, 1274, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, '2023-07-01 02:01:38', '2023-07-01 02:01:38', NULL, 0),
(9, 199, 1, 1, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-07-01 02:02:01', '2023-07-01 02:02:01', NULL, 0),
(10, 12, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 02:02:01', '2023-07-01 02:02:01', NULL, 7),
(11, 99, 1, 1, 2, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-07-01 02:02:03', '2023-07-01 02:02:03', NULL, 0),
(12, 12, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 02:02:03', '2023-07-01 02:02:03', NULL, 7),
(13, 99, 1, 1, 2, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2023-07-01 02:02:04', '2023-07-01 02:02:04', NULL, 0),
(14, 12, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 02:02:04', '2023-07-01 02:02:04', NULL, 7),
(15, 99, 1, 1, 2, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, '2023-07-01 02:03:37', '2023-07-01 02:03:37', NULL, 0),
(16, 12, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 02:03:37', '2023-07-01 02:03:37', NULL, 7),
(17, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-07-01 02:11:15', '2023-07-01 02:11:15', NULL, 0),
(18, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2023-07-01 02:28:56', '2023-07-01 02:28:56', NULL, 0),
(19, 10, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-01 02:32:16', '2023-07-01 02:32:16', NULL, 0),
(20, 10, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-07-01 02:32:19', '2023-07-01 02:32:19', NULL, 0),
(21, 10, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-07-01 02:35:18', '2023-07-01 02:35:18', NULL, 0),
(22, 1960, 1, 1, 2, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, '2023-07-01 04:28:41', '2023-07-01 04:28:41', NULL, 0),
(23, 235, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 04:28:41', '2023-07-01 04:28:41', NULL, 0),
(24, 196000, 1, 1, 2, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '2023-07-01 04:28:49', '2023-07-01 04:28:49', NULL, 0),
(25, 23520, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 04:28:49', '2023-07-01 04:28:49', NULL, 0),
(26, 196000, 1, 1, 2, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, '2023-07-01 04:28:55', '2023-07-01 04:28:55', NULL, 0),
(27, 23520, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 04:28:55', '2023-07-01 04:28:55', NULL, 0),
(28, 99, 1, 1, 2, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, '2023-07-01 05:16:33', '2023-07-01 05:16:33', NULL, 0),
(29, 12, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:16:33', '2023-07-01 05:16:33', NULL, 7),
(30, 98001, 1, 1, 2, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, '2023-07-01 05:16:49', '2023-07-01 05:16:49', NULL, 0),
(31, 11760, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:16:49', '2023-07-01 05:16:49', NULL, 0),
(32, 980001, 1, 1, 2, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '2023-07-01 05:17:01', '2023-07-01 05:17:01', NULL, 0),
(33, 117600, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:17:01', '2023-07-01 05:17:01', NULL, 0),
(34, 980001, 1, 1, 2, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '2023-07-01 05:17:07', '2023-07-01 05:17:07', NULL, 0),
(35, 117600, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:17:07', '2023-07-01 05:17:07', NULL, 0),
(36, 980001, 1, 1, 2, NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '2023-07-01 05:17:11', '2023-07-01 05:17:11', NULL, 0),
(37, 117600, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:17:11', '2023-07-01 05:17:11', NULL, 0),
(38, 980001, 1, 1, 2, NULL, NULL, NULL, NULL, 15, NULL, NULL, NULL, '2023-07-01 05:17:24', '2023-07-01 05:17:24', NULL, 0),
(39, 117600, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:17:24', '2023-07-01 05:17:24', NULL, 0),
(40, 4900001, 1, 1, 2, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '2023-07-01 05:17:53', '2023-07-01 05:17:53', NULL, 0),
(41, 588000, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:17:53', '2023-07-01 05:17:53', NULL, 0),
(42, 490001, 1, 1, 2, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '2023-07-01 05:18:06', '2023-07-01 05:18:06', NULL, 0),
(43, 58800, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:18:06', '2023-07-01 05:18:06', NULL, 0),
(44, 49001, 1, 1, 2, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, '2023-07-01 05:18:13', '2023-07-01 05:18:13', NULL, 0),
(45, 5880, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:18:13', '2023-07-01 05:18:13', NULL, 0),
(46, 49001, 1, 1, 2, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, '2023-07-01 05:18:19', '2023-07-01 05:18:19', NULL, 0),
(47, 5880, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:18:19', '2023-07-01 05:18:19', NULL, 0),
(48, 49001, 1, 1, 2, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '2023-07-01 05:18:22', '2023-07-01 05:18:22', NULL, 0),
(49, 5880, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:18:22', '2023-07-01 05:18:22', NULL, 0),
(50, 49001, 1, 1, 2, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, '2023-07-01 05:19:04', '2023-07-01 05:19:04', NULL, 0),
(51, 5880, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 05:19:04', '2023-07-01 05:19:04', NULL, 0),
(52, 491, 1, 1, 2, NULL, NULL, NULL, NULL, 26, NULL, NULL, NULL, '2023-07-01 06:08:45', '2023-07-01 06:08:45', NULL, 0),
(53, 59, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:08:45', '2023-07-01 06:08:45', NULL, 0),
(54, 78154503, 1, 1, 2, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '2023-07-01 06:09:22', '2023-07-01 06:15:14', NULL, 0),
(55, 12, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:09:22', '2023-07-01 06:09:22', NULL, 7),
(56, 78154455, 1, 1, 2, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '2023-07-01 06:14:53', '2023-07-01 06:14:53', NULL, 0),
(57, 9378535, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:14:53', '2023-07-01 06:14:53', NULL, 0),
(58, 78154455, 1, 1, 2, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '2023-07-01 06:15:20', '2023-07-01 06:15:20', NULL, 0),
(59, 9378535, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:15:20', '2023-07-01 06:15:20', NULL, 0),
(60, 78900524, 1, 1, 2, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, '2023-07-01 06:15:24', '2023-07-01 06:16:36', NULL, 0),
(61, 9378535, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:15:24', '2023-07-01 06:15:24', NULL, 0),
(62, 30, 1, 1, 2, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, '2023-07-01 07:12:44', '2023-07-01 07:12:44', NULL, 0),
(63, 3000, 1, 1, 2, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, '2023-07-01 07:13:09', '2023-07-01 07:13:09', NULL, 0),
(64, 3000, 1, 1, 2, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, '2023-07-01 07:14:52', '2023-07-01 07:14:52', NULL, 0),
(65, 3000, 1, 1, 2, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, '2023-07-01 07:14:56', '2023-07-01 07:14:56', NULL, 0),
(66, 2, 1, 1, 2, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, '2023-07-01 08:54:24', '2023-07-01 08:54:24', NULL, 1),
(67, 0, 0, NULL, 2, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, '2023-07-01 08:54:24', '2023-07-01 08:54:24', NULL, 7),
(68, 19, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-01 09:14:59', '2023-07-01 09:14:59', NULL, 0),
(69, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2023-07-01 09:20:30', '2023-07-01 09:20:30', NULL, 5),
(70, 1274, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, '2023-07-01 09:20:48', '2023-07-01 09:20:48', NULL, 2),
(71, 2, 1, 1, 5, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, '2023-07-01 09:21:05', '2023-07-01 09:21:05', NULL, 1),
(72, 0, 0, NULL, 5, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, '2023-07-01 09:21:05', '2023-07-01 09:21:05', NULL, 7),
(73, 0, 0, NULL, 2, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, '2023-07-01 09:21:05', '2023-07-01 09:21:05', NULL, 8),
(74, 196, 1, 1, 5, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, '2023-07-01 09:21:21', '2023-07-01 09:21:21', NULL, 1),
(75, 24, 0, NULL, 5, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, '2023-07-01 09:21:21', '2023-07-01 09:21:21', NULL, 7),
(76, 0, 0, NULL, 2, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, '2023-07-01 09:21:21', '2023-07-01 09:21:21', NULL, 8),
(77, 196, 1, 1, 5, NULL, NULL, NULL, NULL, 40, NULL, NULL, NULL, '2023-07-01 09:24:50', '2023-07-01 09:24:50', NULL, 1),
(78, 24, 0, NULL, 5, NULL, NULL, NULL, NULL, 40, NULL, NULL, NULL, '2023-07-01 09:24:50', '2023-07-01 09:24:50', NULL, 7),
(79, 0, 0, NULL, 2, NULL, NULL, NULL, NULL, 40, NULL, NULL, NULL, '2023-07-01 09:24:50', '2023-07-01 09:24:50', NULL, 8),
(80, 196, 1, 1, 5, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, '2023-07-01 09:25:25', '2023-07-01 09:25:25', NULL, 1),
(81, 24, 0, NULL, 5, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, '2023-07-01 09:25:25', '2023-07-01 09:25:25', NULL, 7),
(82, 6, 0, NULL, 2, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, '2023-07-01 09:25:25', '2023-07-01 09:25:25', NULL, 8),
(83, 1274, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, '2023-07-01 10:41:23', '2023-07-01 10:41:23', NULL, 2),
(84, 196, 1, 1, 5, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, '2023-07-01 10:41:29', '2023-07-01 10:41:29', NULL, 1),
(85, 24, 0, NULL, 5, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, '2023-07-01 10:41:29', '2023-07-01 10:41:29', NULL, 7),
(86, 6, 0, NULL, 2, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, '2023-07-01 10:41:29', '2023-07-01 10:41:29', NULL, 8),
(87, 1078, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, '2023-07-01 10:42:39', '2023-07-01 10:42:39', NULL, 2),
(88, 172, 1, 1, 5, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, '2023-07-01 10:42:53', '2023-07-01 10:42:53', NULL, 1),
(89, 21, 0, NULL, 5, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, '2023-07-01 10:42:54', '2023-07-01 10:42:54', NULL, 7),
(90, 5, 0, NULL, 2, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, '2023-07-01 10:42:54', '2023-07-01 10:42:54', NULL, 8),
(91, 172, 1, 1, 5, NULL, NULL, NULL, NULL, 44, NULL, NULL, NULL, '2023-07-02 04:17:42', '2023-07-02 04:17:42', NULL, 1),
(92, 21, 0, NULL, 5, NULL, NULL, NULL, NULL, 44, NULL, NULL, NULL, '2023-07-02 04:17:42', '2023-07-02 04:17:42', NULL, 7),
(93, 5, 0, NULL, 2, NULL, NULL, NULL, NULL, 44, NULL, NULL, NULL, '2023-07-02 04:17:42', '2023-07-02 04:17:42', NULL, 8),
(94, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2023-07-02 04:38:05', '2023-07-02 04:38:05', NULL, 5),
(95, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2023-07-02 05:52:36', '2023-07-02 05:52:36', NULL, 5),
(96, 1200, 0, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2023-07-02 05:52:36', '2023-07-02 05:52:36', NULL, 7),
(97, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2023-07-02 05:52:36', '2023-07-02 05:52:36', NULL, 8),
(98, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2023-07-02 05:52:54', '2023-07-02 05:52:54', NULL, 5),
(99, 1200, 0, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2023-07-02 05:52:54', '2023-07-02 05:52:54', NULL, 7),
(100, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2023-07-02 05:52:54', '2023-07-02 05:52:54', NULL, 8),
(101, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 7, NULL, '2023-07-02 05:53:05', '2023-07-02 05:53:05', NULL, 5),
(102, 1200, 0, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, '2023-07-02 05:53:05', '2023-07-02 05:53:05', NULL, 7),
(103, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, '2023-07-02 05:53:05', '2023-07-02 05:53:05', NULL, 8),
(104, 10000, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 8, NULL, '2023-07-02 06:09:55', '2023-07-02 06:09:55', NULL, 5),
(105, 1200, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, '2023-07-02 06:09:55', '2023-07-02 06:09:55', NULL, 7),
(106, 10000, 1, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 9, NULL, '2023-07-02 06:12:53', '2023-07-02 06:12:53', NULL, 5),
(107, 1200, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, '2023-07-02 06:12:53', '2023-07-02 06:12:53', NULL, 7),
(108, 10000, 1, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 10, NULL, '2023-07-02 06:13:03', '2023-07-02 06:13:03', NULL, 5),
(109, 1200, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, '2023-07-02 06:13:03', '2023-07-02 06:13:03', NULL, 7),
(110, 10000, 1, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 11, NULL, '2023-07-02 06:58:05', '2023-07-02 06:58:05', NULL, 5),
(111, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, '2023-07-02 06:58:05', '2023-07-02 06:58:05', NULL, 7),
(112, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, '2023-07-02 06:58:05', '2023-07-02 06:58:05', NULL, 8),
(113, 10000, 1, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 12, NULL, '2023-07-02 06:58:18', '2023-07-02 06:58:18', NULL, 5),
(114, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, '2023-07-02 06:58:18', '2023-07-02 06:58:18', NULL, 7),
(115, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, '2023-07-02 06:58:18', '2023-07-02 06:58:18', NULL, 8),
(116, 10000, 1, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 13, NULL, '2023-07-02 06:59:04', '2023-07-02 06:59:04', NULL, 5),
(117, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, '2023-07-02 06:59:04', '2023-07-02 06:59:04', NULL, 7),
(118, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, '2023-07-02 06:59:04', '2023-07-02 06:59:04', NULL, 8),
(119, 10000, 1, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 14, NULL, '2023-07-02 06:59:52', '2023-07-02 06:59:52', NULL, 5),
(120, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 14, NULL, '2023-07-02 06:59:52', '2023-07-02 06:59:52', NULL, 7),
(121, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 14, NULL, '2023-07-02 06:59:52', '2023-07-02 06:59:52', NULL, 8),
(122, 1921, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, '2023-07-02 07:35:32', '2023-07-02 07:35:53', NULL, 2),
(123, 1274, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, '2023-07-02 09:44:30', '2023-07-02 09:44:30', NULL, 2),
(124, 1, 0, 1, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '2023-07-02 10:05:08', '2023-07-02 10:05:08', NULL, 4),
(125, 10000, 1, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 15, NULL, '2023-07-03 04:56:11', '2023-07-03 04:56:11', NULL, 5),
(126, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, '2023-07-03 04:56:11', '2023-07-03 04:56:11', NULL, 7),
(127, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, '2023-07-03 04:56:11', '2023-07-03 04:56:11', NULL, 8),
(128, 10000, 1, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, 16, NULL, '2023-07-03 04:59:19', '2023-07-03 04:59:19', NULL, 5),
(129, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, '2023-07-03 04:59:19', '2023-07-03 04:59:19', NULL, 7),
(130, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, '2023-07-03 04:59:19', '2023-07-03 04:59:19', NULL, 8),
(131, 10000, 1, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, 17, NULL, '2023-07-03 05:04:02', '2023-07-03 05:04:02', NULL, 5),
(132, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, '2023-07-03 05:04:03', '2023-07-03 05:04:03', NULL, 7),
(133, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, '2023-07-03 05:04:03', '2023-07-03 05:04:03', NULL, 8),
(134, 60, 1, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, 18, NULL, '2023-07-03 05:20:20', '2023-07-03 05:20:49', NULL, 5),
(135, 1200, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, '2023-07-03 05:20:20', '2023-07-03 05:20:20', NULL, 7),
(136, 300, 0, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, '2023-07-03 05:20:20', '2023-07-03 05:20:20', NULL, 8),
(137, 10, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-07-03 05:23:20', '2023-07-03 05:23:20', NULL, 6),
(138, 11, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2023-07-03 05:27:00', '2023-07-03 05:27:16', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` int NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `amount`, `unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '3', '2023-07-01 02:01:15', '2023-07-01 02:01:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` tinyint NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `commission` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sub_commission` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `image`, `email`, `email_verified_at`, `password`, `gender`, `birth`, `parent_id`, `commission`, `sub_commission`, `description`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 0, NULL, 'admin@admin.com', '2023-06-28 09:32:48', '$2y$10$4iRKJLEZ19w99OQ0X3Zp8.WQEO2NDnHO1ei8O1TIzn1DVqjKouNK6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-28 09:32:48', '2023-06-28 09:32:48', NULL),
(2, 'akbar', 1, NULL, '6@admin.com', NULL, '$2y$10$lTXHQzuSUOz7AESxjIzXN.FVGBHA2VXawQ6og.vz0cqRSP7olXReW', NULL, NULL, NULL, '12', '3', NULL, NULL, '2023-06-28 09:36:32', '2023-06-28 09:36:32', NULL),
(3, 'heshmat', 1, NULL, '666@admin.com', NULL, '$2y$10$pdDFLrrSpjVCTGagMT/3neQjrcDRBjRHCSGYBvaysp6yelOcHjD96', NULL, NULL, 2, '12', '3', NULL, NULL, '2023-06-28 09:36:50', '2023-06-28 09:36:50', NULL),
(4, 'akbar', 1, NULL, '6666@admin.com', NULL, '$2y$10$MitLOhFwh6wV.3y7YIGFDuaJBQ.TLcg0jy6T0yz9G40yOnBV062Li', NULL, NULL, NULL, '12', '3', NULL, NULL, '2023-07-01 04:22:20', '2023-07-01 04:22:20', NULL),
(5, 'asghar', 1, NULL, '999@admin.com', NULL, '$2y$10$cvqXmZ22PSvBEhfYKUPDZu7pJHsaN2ucZWA9Pj/EIZ2.9eFkSYsDy', NULL, NULL, 2, '12', '3', NULL, NULL, '2023-07-01 09:20:10', '2023-07-01 09:20:10', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy_product_factors`
--
ALTER TABLE `buy_product_factors`
  ADD CONSTRAINT `buy_product_factors_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`);

--
-- Constraints for table `buy_product_factor_items`
--
ALTER TABLE `buy_product_factor_items`
  ADD CONSTRAINT `buy_product_factor_items_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `buy_product_factors` (`id`),
  ADD CONSTRAINT `buy_product_factor_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `cheque_payments`
--
ALTER TABLE `cheque_payments`
  ADD CONSTRAINT `cheque_payments_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`);

--
-- Constraints for table `cheque_receiveds`
--
ALTER TABLE `cheque_receiveds`
  ADD CONSTRAINT `cheque_receiveds_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `cheque_receiveds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `persons_person_category_id_foreign` FOREIGN KEY (`person_category_id`) REFERENCES `person_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sell_product_factors`
--
ALTER TABLE `sell_product_factors`
  ADD CONSTRAINT `sell_product_factors_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `sell_product_factors_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `sell_product_factors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sell_product_factor_items`
--
ALTER TABLE `sell_product_factor_items`
  ADD CONSTRAINT `sell_product_factor_items_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `sell_product_factors` (`id`),
  ADD CONSTRAINT `sell_product_factor_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `side_costs`
--
ALTER TABLE `side_costs`
  ADD CONSTRAINT `side_costs_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `side_costs_cheque_payment_id_foreign` FOREIGN KEY (`cheque_payment_id`) REFERENCES `cheque_payments` (`id`),
  ADD CONSTRAINT `side_costs_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`),
  ADD CONSTRAINT `side_costs_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `side_costs_side_cost_category_id_foreign` FOREIGN KEY (`side_cost_category_id`) REFERENCES `side_cost_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `side_costs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `side_incomes`
--
ALTER TABLE `side_incomes`
  ADD CONSTRAINT `side_incomes_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `side_incomes_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`),
  ADD CONSTRAINT `side_incomes_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `side_incomes_side_income_category_id_foreign` FOREIGN KEY (`side_income_category_id`) REFERENCES `side_income_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `side_incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `transactions_buy_product_factor_id_foreign` FOREIGN KEY (`buy_product_factor_id`) REFERENCES `buy_product_factors` (`id`),
  ADD CONSTRAINT `transactions_cheque_payment_id_foreign` FOREIGN KEY (`cheque_payment_id`) REFERENCES `cheque_payments` (`id`),
  ADD CONSTRAINT `transactions_cheque_receive_id_foreign` FOREIGN KEY (`cheque_receive_id`) REFERENCES `cheque_receiveds` (`id`),
  ADD CONSTRAINT `transactions_fund_id_foreign` FOREIGN KEY (`fund_id`) REFERENCES `funds` (`id`),
  ADD CONSTRAINT `transactions_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `transactions_sell_product_factor_id_foreign` FOREIGN KEY (`sell_product_factor_id`) REFERENCES `sell_product_factors` (`id`),
  ADD CONSTRAINT `transactions_side_cost_id_foreign` FOREIGN KEY (`side_cost_id`) REFERENCES `side_costs` (`id`),
  ADD CONSTRAINT `transactions_side_income_id_foreign` FOREIGN KEY (`side_income_id`) REFERENCES `side_incomes` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
