-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 07:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zohra`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-02-28 12:44:15', '2020-02-28 12:44:15'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-02-28 12:44:15', '2020-02-28 12:44:15'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2020-02-28 12:44:15', '2020-02-28 12:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `post_id`, `author_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'posts/gallery/1/5e5964d943528/1067502.jpg', '2020-02-28 13:07:05', '2020-02-28 13:07:05'),
(2, 2, 1, 'posts/gallery/1/5e5964d9dd5f5/1067502.jpg', '2020-02-28 13:07:06', '2020-02-28 13:07:06'),
(3, 3, 1, 'posts/gallery/1/3/5e596bde0882b/1065877.jpg', '2020-02-28 13:37:02', '2020-02-28 13:37:02'),
(4, 3, 1, 'posts/gallery/1/3/5e596bde8c9c3/1065877.jpg', '2020-02-28 13:37:03', '2020-02-28 13:37:03'),
(5, 3, 1, 'posts/gallery/1/3/5e596bdf1a58a/1065877.jpg', '2020-02-28 13:37:03', '2020-02-28 13:37:03'),
(6, 4, 1, 'posts/gallery/1/4/5e59d97c709aa/1067083.jpg', '2020-02-28 21:24:44', '2020-02-28 21:24:44'),
(7, 4, 1, 'posts/gallery/1/4/5e59d97ce7915/1067110.png', '2020-02-28 21:24:45', '2020-02-28 21:24:45'),
(8, 4, 1, 'posts/gallery/1/4/5e59d97e0c5e6/1067502.jpg', '2020-02-28 21:24:46', '2020-02-28 21:24:46'),
(9, 7, 1, 'posts/gallery/1/7/5e59db6dc0df3/1065877.jpg', '2020-02-28 21:33:02', '2020-02-28 21:33:02'),
(10, 7, 1, 'posts/gallery/1/7/5e59db6e5c556/1067083.jpg', '2020-02-28 21:33:02', '2020-02-28 21:33:02'),
(11, 7, 1, 'posts/gallery/1/7/5e59db6eee8d1/1067502.jpg', '2020-02-28 21:33:03', '2020-02-28 21:33:03'),
(12, 8, 2, 'posts/gallery/2/8/5e5b5b7316e43/121634.jpg', '2020-03-01 00:51:31', '2020-03-01 00:51:31'),
(13, 8, 2, 'posts/gallery/2/8/5e5b5b73b0c49/1010832.jpg', '2020-03-01 00:51:32', '2020-03-01 00:51:32'),
(14, 8, 2, 'posts/gallery/2/8/5e5b5b742e559/1065877.jpg', '2020-03-01 00:51:32', '2020-03-01 00:51:32'),
(15, 8, 2, 'posts/gallery/2/8/5e5b5b74b8e7c/1067083.jpg', '2020-03-01 00:51:33', '2020-03-01 00:51:33'),
(16, 8, 2, 'posts/gallery/2/8/5e5b5b756ceff/1067106.jpg', '2020-03-01 00:51:34', '2020-03-01 00:51:34'),
(17, 8, 2, 'posts/gallery/2/8/5e5b5b76bc531/1067110.png', '2020-03-01 00:51:36', '2020-03-01 00:51:36'),
(18, 8, 2, 'posts/gallery/2/8/5e5b5b78a2f36/1067502.jpg', '2020-03-01 00:51:37', '2020-03-01 00:51:37'),
(19, 9, 4, 'posts/gallery/4/9/5e5b6c5d0b637/1010832.jpg', '2020-03-01 02:03:41', '2020-03-01 02:03:41'),
(20, 9, 4, 'posts/gallery/4/9/5e5b6c5d89f1f/1065877.jpg', '2020-03-01 02:03:42', '2020-03-01 02:03:42'),
(21, 9, 4, 'posts/gallery/4/9/5e5b6c5e17b3f/1067083.jpg', '2020-03-01 02:03:42', '2020-03-01 02:03:42'),
(22, 9, 4, 'posts/gallery/4/9/5e5b6c5ee64b9/1067106.jpg', '2020-03-01 02:03:44', '2020-03-01 02:03:44'),
(23, 9, 4, 'posts/gallery/4/9/5e5b6c6064df3/1067110.png', '2020-03-01 02:03:46', '2020-03-01 02:03:46'),
(24, 9, 4, 'posts/gallery/4/9/5e5b6c627453e/1067495.png', '2020-03-01 02:03:48', '2020-03-01 02:03:48'),
(25, 9, 4, 'posts/gallery/4/9/5e5b6c6453d39/1067502.jpg', '2020-03-01 02:03:48', '2020-03-01 02:03:48'),
(26, 11, 4, 'posts/gallery/4/11/5e5b901c16ab0/1065877.jpg', '2020-03-01 04:36:12', '2020-03-01 04:36:12'),
(27, 11, 4, 'posts/gallery/4/11/5e5b901c8d9f7/1067083.jpg', '2020-03-01 04:36:13', '2020-03-01 04:36:13'),
(28, 11, 4, 'posts/gallery/4/11/5e5b901d29efd/1067106.jpg', '2020-03-01 04:36:14', '2020-03-01 04:36:14'),
(29, 11, 4, 'posts/gallery/4/11/5e5b901e62125/1067110.png', '2020-03-01 04:36:16', '2020-03-01 04:36:16'),
(30, 14, 5, 'posts/gallery/5/14/5e5c9b3c89494/1067495.png', '2020-03-01 23:35:59', '2020-03-01 23:35:59'),
(31, 14, 5, 'posts/gallery/5/14/5e5c9b3f88d63/1067106.jpg', '2020-03-01 23:36:01', '2020-03-01 23:36:01'),
(32, 14, 5, 'posts/gallery/5/14/5e5c9b41a5afa/1067110.png', '2020-03-01 23:36:05', '2020-03-01 23:36:05'),
(33, 15, 6, 'posts/gallery/6/15/5e5d170e9ff10/1067106.jpg', '2020-03-02 08:24:15', '2020-03-02 08:24:15'),
(34, 18, 7, 'posts/gallery/7/18/5e5ddc494144c/p2.jpg', '2020-03-02 22:25:45', '2020-03-02 22:25:45'),
(35, 18, 7, 'posts/gallery/7/18/5e5ddc49903a1/p3.jpg', '2020-03-02 22:25:45', '2020-03-02 22:25:45'),
(36, 19, 9, 'posts/gallery/9/19/5e5e06999df3e/p5.jpg', '2020-03-03 01:26:18', '2020-03-03 01:26:18'),
(37, 19, 9, 'posts/gallery/9/19/5e5e069a37c93/pic02.jpg', '2020-03-03 01:26:18', '2020-03-03 01:26:18'),
(38, 20, 8, 'posts/gallery/8/20/5e5e5cce058c8/p11.jpg', '2020-03-03 07:34:06', '2020-03-03 07:34:06'),
(39, 20, 8, 'posts/gallery/8/20/5e5e5cce869e7/p12.jpg', '2020-03-03 07:34:06', '2020-03-03 07:34:06'),
(40, 21, 10, 'posts/gallery/10/21/5e5f0ba6b6fa7/p12.jpg', '2020-03-03 20:00:07', '2020-03-03 20:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `gmaps_geocache`
--

CREATE TABLE `gmaps_geocache` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `division`, `district`, `city`, `partial`, `ward`, `created_at`, `updated_at`) VALUES
(429, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'City Corporation', '26', NULL, NULL),
(430, '', '', 'Rajshahi', 'Thana', '01', NULL, NULL),
(431, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Thana', '01', NULL, NULL),
(432, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Thana', '02', NULL, NULL),
(433, 'Rajshahi', 'naogaonn', 'naogaon', 'naogaon city corporation', '01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-02-28 12:44:16', '2020-02-28 12:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-02-28 12:44:16', '2020-02-28 12:44:16', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2020-02-28 12:44:16', '2020-02-28 12:44:16', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2020-02-28 12:44:17', '2020-02-28 12:44:17', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2020-02-28 12:44:17', '2020-02-28 12:44:17', 'voyager.settings.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_100000_create_password_resets_table', 1),
(63, '2016_01_01_000000_add_voyager_user_fields', 1),
(64, '2016_01_01_000000_create_data_types_table', 1),
(65, '2016_01_01_000000_create_pages_table', 1),
(66, '2016_01_01_000000_create_posts_table', 1),
(67, '2016_02_15_204651_create_categories_table', 1),
(68, '2016_05_19_173453_create_menu_table', 1),
(69, '2016_10_21_190000_create_roles_table', 1),
(70, '2016_10_21_190000_create_settings_table', 1),
(71, '2016_11_30_135954_create_permission_table', 1),
(72, '2016_11_30_141208_create_permission_role_table', 1),
(73, '2016_12_26_201236_data_types__add__server_side', 1),
(74, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(75, '2017_01_14_005015_create_translations_table', 1),
(76, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(77, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(78, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(79, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(80, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(81, '2017_08_05_000000_add_group_to_settings_table', 1),
(82, '2017_11_26_013050_add_user_role_relationship', 1),
(83, '2017_11_26_015000_create_user_roles_table', 1),
(84, '2018_03_11_000000_add_user_settings', 1),
(85, '2018_03_14_000000_add_details_to_data_types_table', 1),
(86, '2018_03_16_000000_make_settings_value_nullable', 1),
(87, '2020_02_26_185442_create_gmaps_geocache_table', 1),
(88, '2020_02_28_061928_add_info_to_users', 1),
(89, '2020_02_28_143700_create_locations_table', 1),
(90, '2020_02_28_151401_add_info_to_posts_table', 1),
(91, '2020_02_28_190031_create_galleries_table', 2),
(92, '2020_03_01_101813_gmap_col_length_update_to_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-02-28 12:44:17', '2020-02-28 12:44:17'),
(2, 'browse_bread', NULL, '2020-02-28 12:44:17', '2020-02-28 12:44:17'),
(3, 'browse_database', NULL, '2020-02-28 12:44:17', '2020-02-28 12:44:17'),
(4, 'browse_media', NULL, '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(5, 'browse_compass', NULL, '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(6, 'browse_menus', 'menus', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(7, 'read_menus', 'menus', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(8, 'edit_menus', 'menus', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(9, 'add_menus', 'menus', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(10, 'delete_menus', 'menus', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(11, 'browse_roles', 'roles', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(12, 'read_roles', 'roles', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(13, 'edit_roles', 'roles', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(14, 'add_roles', 'roles', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(15, 'delete_roles', 'roles', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(16, 'browse_users', 'users', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(17, 'read_users', 'users', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(18, 'edit_users', 'users', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(19, 'add_users', 'users', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(20, 'delete_users', 'users', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(21, 'browse_settings', 'settings', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(22, 'read_settings', 'settings', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(23, 'edit_settings', 'settings', '2020-02-28 12:44:18', '2020-02-28 12:44:18'),
(24, 'add_settings', 'settings', '2020-02-28 12:44:19', '2020-02-28 12:44:19'),
(25, 'delete_settings', 'settings', '2020-02-28 12:44:19', '2020-02-28 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_flag` tinyint(1) DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corridor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drawing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dining` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  `availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(8,6) DEFAULT NULL,
  `longitude` double(8,6) DEFAULT NULL,
  `map_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `category_id`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `option`, `category`, `price_flag`, `price`, `area`, `road`, `location_flag`, `division`, `district`, `city`, `partial`, `ward`, `url`, `bedroom`, `bathroom`, `corridor`, `kitchen`, `floor`, `parking`, `drawing`, `dining`, `advance`, `availability`, `validity`, `address`, `seat_type`, `latitude`, `longitude`, `map_status`) VALUES
(18, 7, '', NULL, NULL, NULL, 'main house from distrct', 'posts/7/5e5ddc48a7d96/p6.jpg', 'Demo9', NULL, NULL, 'PUBLISHED', 0, '2020-03-02 22:25:45', '2020-03-02 22:25:45', 'Sell', 'Independent House', '1', 200000, '56', '23', 1, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'City Corporation', '26', NULL, '2', '2', '1', '1', '5', '2', '2', '2', 2000, '2020-03-04', '2020-04-02 04:25:45', '22', NULL, NULL, NULL, 1),
(19, 9, 'Demo1', NULL, NULL, NULL, 'main home', 'posts/9/5e5e069911186/p2.jpg', 'Demo1', NULL, NULL, 'PUBLISHED', 0, '2020-03-03 01:26:17', '2020-03-03 01:26:17', 'Sell', 'Independent House', '1', 4000000, '45', '12', 1, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Thana', '01', NULL, '2', '2', '2', '1', '3', '1', '2', '3', 3, '2020-03-04', '2020-04-02 07:26:17', '20', NULL, NULL, NULL, 1),
(20, 8, 'Demo 2', NULL, NULL, NULL, 'Beautiful girls hostel..', 'posts/8/5e5e5ccd5da3d/p2.jpg', 'Demo 2', NULL, NULL, 'PUBLISHED', 0, '2020-03-03 07:34:05', '2020-03-03 07:34:05', 'Rent', 'Girls Hostel', '1', 3000, '50', '20', 1, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Thana', '02', NULL, NULL, '2', NULL, NULL, NULL, NULL, '1', '1', 1000, '2020-03-03', '2020-04-02 13:34:05', '25', '3', NULL, NULL, 1),
(21, 10, 'demo 3', NULL, NULL, NULL, 'beautiful apartment', 'posts/10/5e5f0ba645ce4/p15.jpg', 'demo 3', NULL, NULL, 'PUBLISHED', 0, '2020-03-03 20:00:06', '2020-03-03 20:00:06', 'Sell', 'Apartment', '1', 200000, '30', '30', 1, 'Rajshahi', 'Rajshahi', 'Rajshahi', 'City Corporation', '26', NULL, '2', '2', '2', '1', '3', '1', '2', '1', 10000, '2020-03-05', '2020-04-03 02:00:06', '10', NULL, 24.360507, 88.615817, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-02-28 12:44:17', '2020-02-28 12:44:17'),
(2, 'user', 'Normal User', '2020-02-28 12:44:17', '2020-02-28 12:44:17'),
(3, 'master', 'Master', '2020-02-29 04:10:24', '2020-02-29 04:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `contact`, `category`, `address`, `status`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$yHpQjlo6LBmI3v8Adqr3NOYjWrGqDNRGwMcu3.0KUql7u/I6mmdXO', NULL, NULL, '2020-02-28 12:44:32', '2020-02-28 23:07:54', NULL, NULL, NULL, '1'),
(8, 3, 'zohra khatun', 'zohra.cse@gmail.com', 'users/5e5dfca1247d9/p10.jpg', NULL, '$2y$10$OYIQDN//f9vXJ2SQ6QhbjuISbeKK6Yhfpnw0FbNFeysDXtLsu4QpO', NULL, '{\"locale\":\"en\"}', '2020-03-03 00:43:46', '2020-03-03 07:34:06', '01787763512', 'Owner', 'Rajshahi', '1'),
(9, 2, 'sumi', 'sumi@gmail.com', 'users/5e5e5fc654833/p33.png', NULL, '$2y$10$Y1LnWcIo8I96kiE/CPzr4epv9rAY2tlZ.w5zekFyUHF.0S/L8t9Ru', NULL, NULL, '2020-03-03 01:23:17', '2020-03-03 07:46:46', '01303048362', 'Representator', 'Rajshahi', '1'),
(10, 2, 'jui', 'jui@gmail.com', 'users/5e5f0acb8b54d/p40.jpg', NULL, '$2y$10$AfyFfJjdp.WA6q4Wr56oeOGo17UQem7qmQNax2Gs1uV9Nq/.tB.Ji', NULL, NULL, '2020-03-03 19:56:28', '2020-03-03 20:00:07', '01345678443', 'Representator', 'rajshahi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
