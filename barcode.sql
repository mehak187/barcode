-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 02:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(3, 'ytut', '1683013252_1.jpeg', '2023-05-02 02:40:52', '2023-05-02 02:40:52'),
(4, 'U8I', '1683029108_1 (1).png', '2023-05-02 07:05:08', '2023-05-02 07:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE `annoucements` (
  `id` int(10) UNSIGNED NOT NULL,
  `annoucement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gym_barcodes`
--

CREATE TABLE `gym_barcodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(11) NOT NULL,
  `branches` int(11) NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gym_barcodes`
--

INSERT INTO `gym_barcodes` (`id`, `gym_id`, `branches`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 2, 85, 1, 85, '2023-05-01 23:49:46', '2023-05-01 23:49:46'),
(2, 2, 45, 131, 175, '2023-05-02 01:18:03', '2023-05-02 01:18:03'),
(3, 2, 7, 1111, 1117, '2023-05-02 01:18:30', '2023-05-02 01:18:30'),
(4, 2, 19, 1118, 1136, '2023-05-02 01:18:56', '2023-05-02 01:18:56'),
(5, 2, 10, 1147, 1156, '2023-05-02 02:03:19', '2023-05-02 02:03:19'),
(6, 2, 10, 1137, 1146, '2023-05-02 02:03:37', '2023-05-02 02:03:37'),
(7, 3, 10, 11, 20, '2023-05-02 04:01:25', '2023-05-02 04:01:25'),
(8, 3, 10, 1, 10, '2023-05-02 04:01:46', '2023-05-02 04:01:46'),
(9, 3, 11, 41, 51, '2023-05-02 04:21:27', '2023-05-02 04:21:27'),
(10, 3, 17, 67, 83, '2023-05-02 05:06:13', '2023-05-02 05:06:13'),
(11, 2, 201, 4000, 4200, '2023-05-08 05:50:55', '2023-05-08 05:50:55'),
(12, 2, 10, 86, 95, '2023-05-08 23:51:16', '2023-05-08 23:51:16'),
(13, 2, 13, 500, 512, '2023-05-08 23:51:58', '2023-05-08 23:51:58'),
(14, 4, 250, 1, 250, '2023-05-09 06:24:29', '2023-05-09 06:24:29'),
(15, 4, 250, 251, 500, '2023-05-09 06:34:21', '2023-05-09 06:34:21'),
(16, 4, 250, 900, 1149, '2023-05-09 06:39:00', '2023-05-09 06:39:00'),
(17, 4, 250, 1200, 1449, '2023-05-09 07:12:16', '2023-05-09 07:12:16'),
(18, 4, 250, 1500, 1749, '2023-05-09 07:25:56', '2023-05-09 07:25:56'),
(19, 4, 250, 4500, 4749, '2023-05-09 07:34:22', '2023-05-09 07:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `mail_instructions`
--

CREATE TABLE `mail_instructions` (
  `id` int(10) UNSIGNED NOT NULL,
  `mailid` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_instructions`
--

INSERT INTO `mail_instructions` (`id`, `mailid`, `msg`, `gym_id`, `created_at`, `updated_at`) VALUES
(1, 'cykil@mailinator.com', 'Porro alias consequa', 2, '2023-05-02 00:01:59', '2023-05-04 01:31:53'),
(2, 'member@gmail.com', 'hk', 3, '2023-05-02 04:51:34', '2023-05-02 04:51:34'),
(3, 'boquhybyk@mailinator.com', 'Porro dolor consecte', 4, '2023-05-09 07:44:13', '2023-05-09 07:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `barcode` bigint(20) NOT NULL,
  `show_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `contact`, `address1`, `address2`, `city`, `state`, `zip`, `barcode`, `show_password`, `password`, `photo`, `created_at`, `updated_at`, `gym_id`) VALUES
(1, 'fgh', 'member@gmail.com', 'rteeeee', 'dg', 'ty', 'gr', 'dgf', 34, 5, '12345678', '$2y$10$pMf8PviVh4QK4V8zEgdy/Og1RKCAZ.Jz5XR0/rYqIuHc2jVgu4SsK', NULL, '2023-05-02 00:01:59', '2023-05-02 03:10:28', 2),
(2, 'fgh', 'member@gmail.com', 'rteeeee', 'dg', 'ty', 'gr', 'dgf', 34, 5, '12345678', '$2y$10$z.YGpx8rqQBeAYZH8gI.duJwVrZg9L91S1roCJ5QmvIYAZIGORVQC', NULL, '2023-05-02 00:02:48', '2023-05-02 02:48:42', 2),
(3, 'Member', 'member@gmail.com', '+1 (304) 599-4658', '13 South White Cowley Boulevard', 'Cillum minima ea sit', 'Consequatur nisi mo', 'Id necessitatibus e', 22779, 1, '12345678', '$2y$10$etB.fj2LZ5Kd5D9wcYRtGuazMk1DPjr.v/3HD.9/r39S9CXLW61We', NULL, '2023-05-02 00:55:35', '2023-05-02 00:55:35', 2),
(4, 'member', 'member@gmail.com', '+1 (304) 599-4658', '13 South White Cowley Boulevard', 'Cillum minima ea sit', 'Cumque proident dol', 'Non sequi pariatur', 63364, 11, '12345678', '$2y$10$pj5VRahIAVPXaPpUN2HejuwmDIBz62AGuQjwxsgKu9KxkDRfcTk7m', NULL, '2023-05-02 04:51:34', '2023-05-02 05:10:43', 3),
(5, 'Jamalia Moses', 'fadytizyc@mailinator.com', '+1 (672) 202-8668', '950 Cowley Court', 'Mollitia error eiusm', 'Fuga Nostrum harum', 'Reprehenderit in qui', 33471, 23, 'Pa$$w0rd!', '$2y$10$YPSNt/c6FwhTZGjA5FgWb.BPfxohmkcndfoxsW6.AExLONJW8DpGK', NULL, '2023-05-02 01:28:06', '2023-05-02 02:09:26', 2),
(6, 'Hanna Finley', 'zoziteni@mailinator.com', '+1 (782) 496-9314', '815 South New Lane', 'Qui eligendi laboris', 'Minus culpa volupta', 'Voluptatibus non lab', 42903, 7, 'Pa$$w0rd!', '$2y$10$q5GEXT/iAFpZ6zXumx1BnuM4MpuOyWjrn6VSu5Fixj6vzwbrVwpHi', NULL, '2023-05-02 02:07:31', '2023-05-02 02:07:31', 2),
(7, 'Idola Hodge', 'roredume@mailinator.com', '+1 (313) 913-2228', '292 Rocky Milton Drive', 'Ut cillum dolore eni', 'Voluptas vel volupta', 'Numquam fugit magna', 47591, 12, 'Pa$$w0rd!', '$2y$10$Frnb2HO.7eSamxGxwXNGteXNOnLOIKwsdLWFsN2jh7GzVubkNsgoK', NULL, '2023-05-02 02:08:52', '2023-05-02 02:15:48', 2),
(8, 'India Russell', 'ziwih@mailinator.com', '+1 (771) 381-8782', '43 Hague Court', 'Quae accusamus conse', 'Quidem sed fugiat as', 'Consequatur Qui rec', 14380, 1111, 'Pa$$w0rd!', '$2y$10$QE30DOVvylXUDnY0RcEfx.Lc9tDEvbfcWZQCD0jTVhilCeK.pOeLe', NULL, '2023-05-04 00:52:58', '2023-05-04 00:52:58', 2),
(9, 'Kuame Wright', 'vyzu@mailinator.com', '+1 (121) 468-6185', '96 White Fabien Extension', 'Consectetur id in vo', 'Est voluptatem Ut a', 'At dicta praesentium', 76480, 80, 'Pa$$w0rd!', '$2y$10$8UnHlXJ0SyzQhgYtNnY1/.HwRvDKXOnWA9T37/iTvBrunwz8HaqJW', NULL, '2023-05-04 01:02:14', '2023-05-04 01:02:14', 2),
(10, 'Axel Richmond', 'cykil@mailinator.com', '+1 (184) 203-1054', '62 North New Avenue', 'Nihil vel deleniti r', 'Omnis provident fug', 'Ad earum magna volup', 28783, 83, 'Pa$$w0rd!', '$2y$10$cxly5WPQfp5pIsaYUyjIhuV.qegA2qWwA2bgFRLQLzIU5DXHlVkWG', NULL, '2023-05-04 01:31:53', '2023-05-04 01:31:53', 2),
(11, 'Prescott Briggs', 'jiwak@mailinator.com', '+1 (926) 854-4792', '285 Rocky Fabien Drive', 'Eaque laboris ut con', 'Anim consequatur Cu', 'Harum temporibus rer', 65702, 20, '12345678', '$2y$10$1xYBxN07Y6uXScA8QKG70uCAitemfY/Ps9cJvInOnTvxh9l4r6hCa', NULL, '2023-05-09 07:44:13', '2023-05-09 07:48:30', 4),
(12, 'Grace Becker', 'boquhybyk@mailinator.com', '+1 (878) 569-3116', '404 White Clarendon Extension', 'In incidunt et aliq', 'Reprehenderit id sae', 'Dolores qui itaque a', 41945, 58, 'Pa$$w0rd!', '$2y$10$/NNLb.FY1X8JDtQ3BhQYsuXoCS4Sf2//wIN6Korx.ct.sAH.KDvma', NULL, '2023-05-09 07:46:24', '2023-05-09 07:46:24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_03_17_093123_create_gym_barcodes_table', 1),
(12, '2023_03_22_084927_create_members_table', 1),
(13, '2023_03_23_041837_add_gym_id_to_members', 1),
(14, '2023_03_23_071853_create_request_barcodes_table', 1),
(15, '2023_03_23_082231_create_annoucements_table', 1),
(16, '2023_03_23_093129_add_date_to_request_barcodes', 1),
(17, '2023_03_24_105234_create_schedules_table', 1),
(18, '2023_03_25_074136_create_mail_instructions_table', 1),
(19, '2023_03_25_083259_create_phone_instructions_table', 1),
(20, '2023_03_29_091029_add_gym_id_to_annoucements', 1),
(21, '2023_05_01_133335_create_ads_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_instructions`
--

CREATE TABLE `phone_instructions` (
  `id` int(10) UNSIGNED NOT NULL,
  `phoneid` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_instructions`
--

INSERT INTO `phone_instructions` (`id`, `phoneid`, `msg`, `gym_id`, `created_at`, `updated_at`) VALUES
(1, '+1 (459) 613-7332', 'Porro alias consequa', 2, '2023-05-02 00:02:05', '2023-05-04 01:31:59'),
(2, '+1 (304) 599-4658', 'hk', 3, '2023-05-02 04:51:42', '2023-05-02 04:51:42'),
(3, '+1 (249) 742-9987', 'Porro dolor consecte', 4, '2023-05-09 07:46:29', '2023-05-09 07:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `request_barcodes`
--

CREATE TABLE `request_barcodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(11) NOT NULL,
  `barcodes` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_barcodes`
--

INSERT INTO `request_barcodes` (`id`, `gym_id`, `barcodes`, `from`, `to`, `created_at`, `updated_at`, `date`) VALUES
(5, 2, 250, 1, 250, '2023-05-08 03:40:33', '2023-05-08 03:40:33', '05-08-2023'),
(7, 2, 250, 86, 90, '2023-05-08 04:04:06', '2023-05-08 04:04:06', '05-08-2023'),
(10, 2, 250, 1, 20, '2023-05-08 04:34:39', '2023-05-08 04:34:39', '05-08-2023'),
(11, 2, 250, 1, 250, '2023-05-08 04:36:14', '2023-05-08 04:36:14', '05-08-2023'),
(14, 2, 250, 1200, 1450, '2023-05-08 05:34:47', '2023-05-08 05:34:47', '05-08-2023'),
(15, 2, 250, 1300, 1400, '2023-05-08 05:36:44', '2023-05-08 05:36:44', '05-08-2023'),
(16, 2, 250, 3000, 3250, '2023-05-08 05:43:00', '2023-05-08 05:43:00', '05-08-2023'),
(17, 2, 250, 1400, 1450, '2023-05-08 05:47:10', '2023-05-08 05:47:10', '05-08-2023'),
(18, 2, 250, 4000, 4250, '2023-05-08 05:48:20', '2023-05-08 05:48:20', '05-08-2023'),
(24, 2, 250, 1, 10, '2023-05-08 06:14:12', '2023-05-08 06:14:12', '05-08-2023'),
(25, 2, 250, 4500, 4600, '2023-05-08 06:21:15', '2023-05-08 06:21:15', '05-08-2023'),
(26, 2, 250, 300, 549, '2023-05-09 02:29:34', '2023-05-09 02:29:34', '05-09-2023'),
(27, 2, 250, 4500, 4749, '2023-05-09 05:16:49', '2023-05-09 05:16:49', '05-09-2023'),
(28, 2, 250, 4500, 4749, '2023-05-09 05:18:40', '2023-05-09 05:18:40', '05-09-2023'),
(29, 2, 250, 4500, 4749, '2023-05-09 05:19:11', '2023-05-09 05:19:11', '05-09-2023'),
(36, 4, 250, 6000, 6249, '2023-05-09 07:34:37', '2023-05-09 07:34:37', '05-09-2023');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(11) NOT NULL,
  `mon_st_time` varchar(255) NOT NULL,
  `mon_end_time` varchar(255) NOT NULL,
  `mon_status` varchar(255) NOT NULL,
  `tue_st_time` varchar(255) NOT NULL,
  `tue_end_time` varchar(255) NOT NULL,
  `tue_status` varchar(255) NOT NULL,
  `wed_st_time` varchar(255) NOT NULL,
  `wed_end_time` varchar(255) NOT NULL,
  `wed_status` varchar(255) NOT NULL,
  `thur_st_time` varchar(255) NOT NULL,
  `thur_end_time` varchar(255) NOT NULL,
  `thur_status` varchar(255) NOT NULL,
  `fri_st_time` varchar(255) NOT NULL,
  `fri_end_time` varchar(255) NOT NULL,
  `fri_status` varchar(255) NOT NULL,
  `sat_st_time` varchar(255) NOT NULL,
  `sat_end_time` varchar(255) NOT NULL,
  `sat_status` varchar(255) NOT NULL,
  `sun_st_time` varchar(255) NOT NULL,
  `sun_end_time` varchar(255) NOT NULL,
  `sun_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `contact`, `address1`, `address2`, `city`, `state`, `zip`, `password`, `role`, `photo`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$29yGVSdBiUjv/90MOhHjveJiXeZTGCrynzZNqfQHNT.T0tqeXab3u', 0, NULL, NULL, NULL, '2023-05-01 23:34:05', '2023-05-01 23:34:05'),
(2, 'Muteeb', 'Herrod Mccarthy', 'Tiger Neal', 'customer@gmail.com', '003200202020200', 'fgh', 'tyr', 'ty', 'try', '33', '$2y$10$bD4MHmw2DqwYf5cvZuyYZ.8Jxn9a6Xs7sSEtqtryZPG81EEhV2/YG', 1, '1683002180_1.PNG', NULL, NULL, '2023-05-01 23:36:20', '2023-05-01 23:36:20'),
(3, 'gym 2', 'Byron Holden', 'Eleanor Sanford', 'gym2@gmail.com', '+1 (579) 271-9931', '80 New Parkway', 'Dolore voluptatibus', 'Velit doloribus aut', 'Corrupti duis error', '47378', '$2y$10$po2sRzVccI2qXqOctjgnEesDTZXQBwo2.Gyeesao3pW9t97MatB2W', 1, '1683015878_1.jpeg', NULL, NULL, '2023-05-02 03:24:38', '2023-05-02 03:24:38'),
(4, 'Mehak', 'Kylie', 'Mehak', 'mehakamir187@gmail.com', '14174141024', '57 Oak Street', 'Inventore magna eius', 'Et earum eos amet', 'Ipsum nisi nostrum', '35368', '$2y$10$9/WV5OJEzyDCFSUDXtB9AuibM0fjm749oB59a9PnbI.T3e52F5.Ty', 1, 'member.png', NULL, NULL, '2023-05-09 05:44:18', '2023-05-09 05:44:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annoucements`
--
ALTER TABLE `annoucements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gym_barcodes`
--
ALTER TABLE `gym_barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_instructions`
--
ALTER TABLE `mail_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_instructions`
--
ALTER TABLE `phone_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_barcodes`
--
ALTER TABLE `request_barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `annoucements`
--
ALTER TABLE `annoucements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym_barcodes`
--
ALTER TABLE `gym_barcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mail_instructions`
--
ALTER TABLE `mail_instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_instructions`
--
ALTER TABLE `phone_instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_barcodes`
--
ALTER TABLE `request_barcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
