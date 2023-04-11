-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2023 at 11:05 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u664450317_barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE `annoucements` (
  `id` int(10) UNSIGNED NOT NULL,
  `annoucement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annoucements`
--

INSERT INTO `annoucements` (`id`, `annoucement`, `created_at`, `updated_at`, `gym_id`) VALUES
(1, 'Gym will remain closed on Sunday', '2023-03-30 07:31:41', '2023-03-30 07:31:41', 3),
(2, 'Gym will remain closed on Sunday', '2023-03-31 06:22:09', '2023-03-31 06:40:09', 2),
(3, 'sugKDdKDasgdlS', '2023-04-03 11:48:16', '2023-04-03 11:48:16', 5),
(4, 'hello gym will remain open on monday', '2023-04-06 05:21:24', '2023-04-11 07:28:20', 4),
(5, 'wgduqgdgqwldgwlkdlask/ oiqw roiqw oiqwyoir qwyor yw fy', '2023-04-06 12:08:42', '2023-04-06 12:08:50', 8),
(6, 'utukglglkglk', '2023-04-10 05:30:16', '2023-04-10 05:30:16', 9),
(7, 'gym will remain closed on sunday', '2023-04-10 16:11:57', '2023-04-10 16:11:57', 10),
(8, 'Hello', '2023-04-10 16:33:18', '2023-04-10 16:33:18', 11);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 2, 50, 1, 50, '2023-03-29 06:39:05', '2023-03-29 06:39:05'),
(2, 3, 100, 51, 150, '2023-03-30 07:28:48', '2023-03-30 07:28:48'),
(3, 4, 100, 151, 250, '2023-04-01 14:16:20', '2023-04-01 14:16:20'),
(4, 5, 10, 251, 260, '2023-04-03 11:44:39', '2023-04-03 11:44:39'),
(5, 7, 10, 261, 270, '2023-04-06 10:41:32', '2023-04-06 10:41:32'),
(6, 8, 40, 271, 310, '2023-04-06 12:07:04', '2023-04-06 12:07:04'),
(7, 9, 50, 311, 360, '2023-04-10 05:27:02', '2023-04-10 05:27:02'),
(8, 10, 250, 361, 610, '2023-04-10 16:10:36', '2023-04-10 16:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `mail_instructions`
--

CREATE TABLE `mail_instructions` (
  `id` int(10) UNSIGNED NOT NULL,
  `mailid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_instructions`
--

INSERT INTO `mail_instructions` (`id`, `mailid`, `msg`, `created_at`, `updated_at`, `gym_id`) VALUES
(2, 'fomuqanit@mailinator.com', 'In veniam reprehend', '2023-04-04 06:27:36', '2023-04-10 15:53:17', 4),
(3, 'camohocex@mailinator.com', 'Vel mollit proident', '2023-04-04 06:29:21', '2023-04-04 06:30:04', 3),
(4, 'member@gmail.com', 'gaAGKJGAGka', '2023-04-06 12:08:17', '2023-04-06 12:08:17', 8),
(5, 'fab1@gmail.com', 'uygjfgkjfjjkjffkf', '2023-04-10 05:29:39', '2023-04-10 05:38:30', 9),
(6, 'fabulousmember@gmail.com', 'Voluptas ad itaque q', '2023-04-10 16:11:16', '2023-04-10 16:11:16', 10);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `barcode` bigint(20) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `contact`, `address1`, `address2`, `city`, `state`, `zip`, `barcode`, `password`, `show_password`, `photo`, `created_at`, `updated_at`, `gym_id`) VALUES
(2, 'Chantale Aguirre', 'basude@mailinator.com', '+1 (956) 635-9188', '78 Cowley Extension', 'Aspernatur alias mag', 'Nobis praesentium re', 'Sint alias impedit', 55975, 126, '$2y$10$J8YO2ndsfkBABXoMMtww4.JJ1U66IH7ZgIqiOJnf8AlxzUVxOQXIK', 'Fit.1516', NULL, '2023-04-01 13:43:26', '2023-04-01 13:43:26', 3),
(3, 'Jennifer', 'fyvoz@mailinator.com', '+1 (813) 223-4481', '97 West Fabien Road', 'Fugit exercitation', 'Esse amet et nisi q', 'Magni quis aut adipi', 92902, 56, '$2y$10$rIMNDWPlQxKw4evi8nnEOOYYVzXTCckltbN5BpTIGmmjAMgZznuJW', 'Fit.123', NULL, '2023-04-01 13:43:54', '2023-04-01 13:46:16', 3),
(4, 'dummy@gmail.com', 'dummymem@gmail.com', '123456', 'Street 1', 'trhyr', 'dsgrte', 'du', 233, 151, '$2y$10$0HwmSrPqjrE/QIiT0FTnPe0yiFodJhPjIoHpJHKphaVQZbALgT6F.', '12345678', NULL, '2023-04-01 14:17:00', '2023-04-01 14:17:00', 4),
(5, 'qamar', 'qamarnazir56@gmail.com', '+923182448398', 'rehmat pura', 'sjdhajsd', 'sialkot', 'hgvh', 51310, 252, '$2y$10$oBvs/A0QMw.ZPRFvev6d3.YIiMoKJzLIAZjZ8fFpnqlti5Bgc06Gy', '12345678', NULL, '2023-04-03 11:46:14', '2023-04-03 11:46:14', 5),
(6, 'Amal Warner', 'bikycywihi@mailinator.com', '+1 (969) 504-4278', '97 Oak Avenue', 'Facere ipsum nihil p', 'Tempore in et occae', 'Cum cupiditate hic d', 44998, 221, '$2y$10$nYWnqCpo7TafX/LC3UVeYO5k.hoBqh0zIsrwConz.9ydTEWLXayke', '12345678', NULL, '2023-04-03 12:46:17', '2023-04-03 12:46:17', 4),
(7, 'Zephr Dodson', 'dud@mailinator.com', '+1 (932) 831-9383', '509 West Nobel Court', 'Nisi quia deserunt v', 'Duis ut voluptas dol', 'Saepe odit nostrud d', 19617, 164, '$2y$10$gOtzPjK.edzG5Qvej0eeMOjJCwznEBvWAg07J3M4x4zfbmy0Q6a8q', '12345678', NULL, '2023-04-04 06:27:36', '2023-04-04 06:27:36', 4),
(8, 'Bert Finch', 'jiverawoco@mailinator.com', '+1 (606) 791-2448', '57 East White Hague Road', 'Incidunt et blandit', 'Quod eum veniam sun', 'Exercitationem aliqu', 56070, 143, '$2y$10$0tbBuFFhr/1YKtfO58H/selo8gVYDGZAPL2o6SIEj1sluGEo4WQeq', 'Pa$$w0rd!', NULL, '2023-04-04 06:29:21', '2023-04-04 06:29:21', 3),
(9, 'Lara Trevino', 'camohocex@mailinator.com', '+1 (184) 821-6564', '471 Rocky Clarendon Drive', 'Dolor architecto dol', 'In incidunt magni s', 'Quibusdam provident', 94673, 68, '$2y$10$6fLHaH5sItEmBFPJbMDzm.jljwreoYeFkWn/1codXM./B4Y/1nLzy', '12345678', NULL, '2023-04-04 06:30:04', '2023-04-04 06:44:32', 3),
(10, 'Catherine Scott', 'kecev@mailinator.com', '+1 (178) 993-2818', '20 West Oak Street', 'Eius sed sequi sit', 'Dignissimos et praes', 'Odit ipsam mollitia', 15519, 193, '$2y$10$eVxPuDDZkvHOO85VIBqe6.J83D2XgFgR0jv7QQYi31CTtZK9kUGNm', 'Pa$$w0rd!', NULL, '2023-04-04 06:32:31', '2023-04-04 06:32:31', 4),
(11, 'Test member', 'test@gmail.com', '+1 (787) 819-8122', '127 North White New Avenue', 'Earum ab consequatur', 'Beatae eum illo temp', 'Ut quos aute ad qui', 79778, 211, '$2y$10$hTJt2vhzgyjD7b/Isp8Ul.0iw1IC6dObxoRWZAOFnXuPgwuFsL/8G', '12345678', NULL, '2023-04-06 05:22:34', '2023-04-06 05:22:34', 4),
(12, 'member 1', 'member@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', 51310, 272, '$2y$10$IzcSplKWIgFIJrtWDn1iMuo3a75kb4OPveBJcgkOBgzsBnJOLrpyK', '12345678', NULL, '2023-04-06 12:08:17', '2023-04-06 12:08:17', 8),
(13, 'qamar', 'qam@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'oak', 51310, 313, '$2y$10$LuZEVyBAIcFnmvrQjH/9aeK5/8AJABXUDv2UtEsrF9bi/Y07kd5Rm', '12345678', NULL, '2023-04-10 05:29:39', '2023-04-10 05:29:39', 9),
(14, 'fav', 'fab1@gmail.com', '776767676', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', 51310, 316, '$2y$10$OGI4UhoVknLcqMl4A7HfP.nAx4Ojg64FUkUa0dYOY5VDu8iWQQV2e', '123456', NULL, '2023-04-10 05:38:30', '2023-04-10 05:38:30', 9),
(15, 'Forrest Brown', 'update@gmail.com', '+1 (474) 191-3044', '25 South Second Avenue', 'Laboriosam ex unde', 'Sed doloremque numqu', 'Sed aut vel assumend', 41388, 175, '$2y$10$RSMulTbZJFebw62r4a9lOumXRMrVfFIQ.meEqWx1C3.FgY3iB7PrK', '12345678', NULL, '2023-04-10 06:00:44', '2023-04-10 06:00:44', 4),
(16, 'Hiroko Wall', 'fuxi@mailinator.com', '+1 (805) 657-5857', '812 North White Clarendon Court', 'Impedit autem proid', 'Sit dolorem aliqua', 'Sunt veritatis ut l', 70945, 152, '$2y$10$3tGwFS6V3vGtICbqRczxH.H/.Tr39oh./XzQX4zwohIkhm5bgaS.O', 'Pa$$w0rd!', NULL, '2023-04-10 06:20:59', '2023-04-10 06:20:59', 4),
(17, 'Alana Frye', 'qesuz@mailinator.com', '+1 (797) 547-5811', '598 East Nobel Road', 'Consequatur Volupta', 'Est anim labore sit', 'Qui et et ex sint re', 36740, 167, '$2y$10$vIzvRdhxVox8l8tGEDptEeP8qqwpTzrfu/NqgOz2JDn.7wD9lx1sK', 'Pa$$w0rd!', NULL, '2023-04-10 06:28:31', '2023-04-10 06:28:31', 4),
(18, 'Kylie Good', 'fomuqanit@mailinator.com', '+1 (774) 668-8572', '75 Green Nobel Road', 'Est sed dicta aut i', 'Enim dolor sit nihil', 'Veniam facere nostr', 18288, 165, '$2y$10$5d.gT/cw2RKNcpH1StZbhuo7snYoTNPgd6qudcUD5ozMhnQ9XIuMi', 'Pa$$w0rd!', NULL, '2023-04-10 15:53:17', '2023-04-10 15:53:17', 4),
(19, 'Dominique Hester', 'fabulousmember@gmail.com', '+1 (588) 962-4256', '708 First Extension', 'Dolores cupidatat es', 'Dolorem facilis sed', 'Placeat sint reicie', 22651, 575, '$2y$10$BUO0n51uGtPEIBIO4LHT0.amjib1j/VrzjJBQQegxWhUhcUZwvcRy', '12345678', '1681143293_Screenshot_20230410-202127.png', '2023-04-10 16:11:16', '2023-04-10 16:14:53', 10);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_17_093123_create_gym_barcodes_table', 1),
(7, '2023_03_22_084927_create_members_table', 1),
(8, '2023_03_23_041837_add_gym_id_to_members', 1),
(9, '2023_03_23_071853_create_request_barcodes_table', 1),
(10, '2023_03_23_082231_create_annoucements_table', 1),
(11, '2023_03_23_093129_add_date_to_request_barcodes', 1),
(12, '2023_03_24_105234_create_schedules_table', 1),
(13, '2023_03_25_074136_create_mail_instructions_table', 1),
(14, '2023_03_25_083259_create_phone_instructions_table', 1),
(15, '2023_03_29_091029_add_gym_id_to_annoucements', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', '8099de02a6859a77b28ba16998f4c2b8b5d85bd20f7dff6b1fa617c063bc6e18', '[\"*\"]', NULL, NULL, '2023-03-29 07:36:53', '2023-03-29 07:36:53'),
(2, 'App\\Models\\User', 1, 'MyApp', '7bc40da8358000ca8f90dd8021a962344d5574fa2d5d3e8572c6ae039ecaa88d', '[\"*\"]', NULL, NULL, '2023-03-29 08:43:35', '2023-03-29 08:43:35'),
(3, 'App\\Models\\User', 1, 'MyApp', 'd51393bbbe0b281878bd900bf89733c410d91630b68c073126fded72d87c6d01', '[\"*\"]', NULL, NULL, '2023-03-29 08:52:02', '2023-03-29 08:52:02'),
(4, 'App\\Models\\User', 1, 'MyApp', '8d732fea5b3315b45ecb8f6be9a0708d42f04d5f6473ec296ccb92230714f586', '[\"*\"]', NULL, NULL, '2023-03-29 08:53:54', '2023-03-29 08:53:54'),
(5, 'App\\Models\\Member', 1, 'MyApp', '557edd58268a8d2447e53b5736e4879b89a257b93602f0ad23327bc2c4044ec9', '[\"*\"]', NULL, NULL, '2023-03-29 09:01:05', '2023-03-29 09:01:05'),
(6, 'App\\Models\\Member', 1, 'MyApp', '7f2e47befe6abe541859ce47d1d73d554e8c588025afba009167f5d720aea306', '[\"*\"]', NULL, NULL, '2023-03-29 09:02:16', '2023-03-29 09:02:16'),
(7, 'App\\Models\\Member', 1, 'MyApp', '13ac303b1a91990e11fb7203d14494884f159975365ed65abec5b8578dbf54c1', '[\"*\"]', NULL, NULL, '2023-03-29 09:06:51', '2023-03-29 09:06:51'),
(8, 'App\\Models\\Member', 1, 'MyApp', '3e3cb8d013bbb2e1b413b6c1409421aea815cea7ae62e685ac33bf0fef74e9b4', '[\"*\"]', NULL, NULL, '2023-03-29 09:06:57', '2023-03-29 09:06:57'),
(9, 'App\\Models\\Member', 1, 'MyApp', '2a88bfaf91e74ee03076f953d52d1b1813fe1e77a90083dbe8c47c248deddc6a', '[\"*\"]', NULL, NULL, '2023-03-29 09:08:21', '2023-03-29 09:08:21'),
(10, 'App\\Models\\Member', 1, 'MyApp', '3d3dd95ec8c64043a0a7fd562f40cedb3c124781b690f387b02d351071aec0aa', '[\"*\"]', NULL, NULL, '2023-03-29 09:08:41', '2023-03-29 09:08:41'),
(11, 'App\\Models\\Member', 1, 'MyApp', '6bd11589e413448cd8123ee94cc08c173ac10f63d004a22da7676a0b81d72f29', '[\"*\"]', NULL, NULL, '2023-03-30 07:16:41', '2023-03-30 07:16:41'),
(12, 'App\\Models\\Member', 2, 'MyApp', 'ee61131bc1eb43a89083a7bd4770c759979572a27e18c0fc1bf6ffc320bf4f32', '[\"*\"]', NULL, NULL, '2023-03-30 07:33:11', '2023-03-30 07:33:11'),
(13, 'App\\Models\\Member', 1, 'MyApp', '300e41635a4ab08ec3024321bc2060e0ffadac10ba388e4e561d43e2f5310621', '[\"*\"]', NULL, NULL, '2023-03-30 08:12:02', '2023-03-30 08:12:02'),
(14, 'App\\Models\\Member', 2, 'MyApp', '3a11b6fdbf1f0a9477bb6c075f80900959553654c7f9386a6c3268df2460b8ea', '[\"*\"]', NULL, NULL, '2023-03-30 08:15:39', '2023-03-30 08:15:39'),
(15, 'App\\Models\\Member', 1, 'MyApp', 'b4aeda5c09c9305f47c10a1f1e0f631c5ef89def9af5a54d96bfffda3966e2d2', '[\"*\"]', NULL, NULL, '2023-03-30 09:19:06', '2023-03-30 09:19:06'),
(16, 'App\\Models\\Member', 1, 'MyApp', '9febc052b9aca465572e82869c8fa7bebe48730d1b2b63ed2dcf989c2ed6c51f', '[\"*\"]', NULL, NULL, '2023-03-30 09:35:37', '2023-03-30 09:35:37'),
(17, 'App\\Models\\Member', 1, 'MyApp', 'b36e819bae9fff0b5482396849c8199ae569421d9a9a16411915330f4f756d36', '[\"*\"]', NULL, NULL, '2023-03-30 09:47:10', '2023-03-30 09:47:10'),
(18, 'App\\Models\\Member', 1, 'MyApp', '9fa2355b5973e9e4ce7955c4faf2ced90a9b0e87bdad4b7bf562a20fbfb77da7', '[\"*\"]', NULL, NULL, '2023-03-30 11:16:05', '2023-03-30 11:16:05'),
(19, 'App\\Models\\Member', 1, 'MyApp', '7d3d130592da3b6971982231c57dbdfbced09139caa4df5382deb76bbf0143fb', '[\"*\"]', NULL, NULL, '2023-03-30 11:17:39', '2023-03-30 11:17:39'),
(20, 'App\\Models\\Member', 3, 'MyApp', 'af944435e2d12b48b5bb72b0d277169d3595f52614bb11355fa60a73d30edf32', '[\"*\"]', NULL, NULL, '2023-03-30 11:20:13', '2023-03-30 11:20:13'),
(21, 'App\\Models\\Member', 3, 'MyApp', '59555667ed60f54d4798e48cded044f709a42ef95994f3060ca06a289e20b013', '[\"*\"]', NULL, NULL, '2023-03-30 11:21:33', '2023-03-30 11:21:33'),
(22, 'App\\Models\\Member', 3, 'MyApp', '3771dbe5c8749694cd73aa22664fb39ac622d961ce86661fd7db448fca2628c2', '[\"*\"]', NULL, NULL, '2023-03-30 11:38:18', '2023-03-30 11:38:18'),
(23, 'App\\Models\\Member', 3, 'MyApp', '2feae9991d7b3d50c7fdd7c78b3adb8c2582742f7e3080cdd7fd76db17f5080b', '[\"*\"]', NULL, NULL, '2023-03-31 06:21:27', '2023-03-31 06:21:27'),
(24, 'App\\Models\\Member', 3, 'MyApp', 'dffb66e84a0e482457f552946787afb0ad0a440591328aa77cb024986a863044', '[\"*\"]', NULL, NULL, '2023-03-31 06:23:37', '2023-03-31 06:23:37'),
(25, 'App\\Models\\Member', 3, 'MyApp', '54395aa13dd0317451dc6e6a3a3e4193ef22ec3fcf99aa81e9135ea6084f4d0b', '[\"*\"]', NULL, NULL, '2023-03-31 06:23:52', '2023-03-31 06:23:52'),
(26, 'App\\Models\\Member', 4, 'MyApp', '85ab0dab11f77933ca9015ae56585fb71954f2cc44940975997465e2e503e28d', '[\"*\"]', NULL, NULL, '2023-03-31 06:26:25', '2023-03-31 06:26:25'),
(27, 'App\\Models\\Member', 4, 'MyApp', '4c6f2bcde2dab688ee6c996d76f81fee695fdf99db72db15b91cd2cf85c43f9c', '[\"*\"]', NULL, NULL, '2023-03-31 06:26:42', '2023-03-31 06:26:42'),
(28, 'App\\Models\\Member', 4, 'MyApp', '2e5852e10d61fb0996e99cd67a3dd8b3e0e087c41ba1a64aa63f0652adf3d56b', '[\"*\"]', NULL, NULL, '2023-03-31 06:27:21', '2023-03-31 06:27:21'),
(29, 'App\\Models\\Member', 4, 'MyApp', 'ad355496bfa01842fb274efce156a2694d7dfe1ada37228b8320ca6ff65be45d', '[\"*\"]', NULL, NULL, '2023-03-31 06:29:26', '2023-03-31 06:29:26'),
(30, 'App\\Models\\Member', 3, 'MyApp', '0dc39f5a676ac09c2d6ba377cc85dfecdae35dc73c673c496098ee13167f5c2b', '[\"*\"]', NULL, NULL, '2023-03-31 07:32:10', '2023-03-31 07:32:10'),
(31, 'App\\Models\\Member', 3, 'MyApp', '286e3f984882c45b03ab74b985cd1267dd7dbd74a1aafb8b4ccc680da88bc123', '[\"*\"]', NULL, NULL, '2023-04-01 10:39:36', '2023-04-01 10:39:36'),
(32, 'App\\Models\\Member', 1, 'MyApp', '384d2299f85a94a2ff1f72676c989ebf816f2a4baaee8aa37ff107d2bdbaeb47', '[\"*\"]', NULL, NULL, '2023-04-01 13:38:24', '2023-04-01 13:38:24'),
(33, 'App\\Models\\Member', 3, 'MyApp', '10eb32a3b136ef30258e75ab99ee2260124d901b8868dc4ce03b1fc036576f24', '[\"*\"]', NULL, NULL, '2023-04-01 13:45:08', '2023-04-01 13:45:08'),
(34, 'App\\Models\\Member', 5, 'MyApp', '819b64cf495750663787cc632a651b53f69b5002f1e213be60dd8b51a693f1bf', '[\"*\"]', NULL, NULL, '2023-04-03 11:50:21', '2023-04-03 11:50:21'),
(35, 'App\\Models\\Member', 5, 'MyApp', '7beaa8c9cf39e89fe7b66ec95f2b34ac12f82d55d77b8c67d1ad9276cce45e9d', '[\"*\"]', NULL, NULL, '2023-04-03 11:51:24', '2023-04-03 11:51:24'),
(36, 'App\\Models\\Member', 5, 'MyApp', 'ae9fdc83c69a5664ac31e86a0da3adb213feaad9fc01221fc5483a7f4e63ee17', '[\"*\"]', NULL, NULL, '2023-04-03 11:57:54', '2023-04-03 11:57:54'),
(37, 'App\\Models\\Member', 1, 'MyApp', '9d7823f68a3ad121a61245d8fc6314a48ac963a7da5488298efb6aae6eb6a659', '[\"*\"]', NULL, NULL, '2023-04-06 05:24:17', '2023-04-06 05:24:17'),
(38, 'App\\Models\\Member', 1, 'MyApp', '9dfe73f5838f98145bad9821caedd8c77f7a72469a6bd02d27e3caa8161677c7', '[\"*\"]', NULL, NULL, '2023-04-06 05:25:43', '2023-04-06 05:25:43'),
(39, 'App\\Models\\Member', 1, 'MyApp', '527ac3e9c2c79496bdae6c9869adc3e9e30e72aed09d36868d9c781b9bcd5393', '[\"*\"]', NULL, NULL, '2023-04-06 06:02:03', '2023-04-06 06:02:03'),
(40, 'App\\Models\\Member', 12, 'MyApp', 'ea3a921205577e297d24c9c48bf7e3ee5764c2959af8ea56796bff924bfb4328', '[\"*\"]', NULL, NULL, '2023-04-06 12:11:30', '2023-04-06 12:11:30'),
(41, 'App\\Models\\Member', 12, 'MyApp', '6faede9bd69dca151ae41ba569e2bcd0db70e716fde809c0297fb07164af2d91', '[\"*\"]', NULL, NULL, '2023-04-06 12:12:46', '2023-04-06 12:12:46'),
(42, 'App\\Models\\Member', 12, 'MyApp', '01502e64c10978f8ed462c9fcf05df002cb812a498b5a3686a89669799d2113f', '[\"*\"]', NULL, NULL, '2023-04-06 12:15:55', '2023-04-06 12:15:55'),
(43, 'App\\Models\\Member', 12, 'MyApp', '28c4c08d4f58fa370d82dc185e29f060eced393562e93c2478548b0107a42062', '[\"*\"]', NULL, NULL, '2023-04-06 12:16:37', '2023-04-06 12:16:37'),
(44, 'App\\Models\\Member', 12, 'MyApp', 'bbba9be1005bca4de7a760552f157d16c16c14db596c8e31df1d48bbca6a0d69', '[\"*\"]', NULL, NULL, '2023-04-06 12:49:22', '2023-04-06 12:49:22'),
(45, 'App\\Models\\Member', 13, 'MyApp', '05bc51ce61687442ba685ea5ff20b36baf46e21c4c5b04dbe9870627872d7565', '[\"*\"]', NULL, NULL, '2023-04-10 05:31:00', '2023-04-10 05:31:00'),
(46, 'App\\Models\\Member', 14, 'MyApp', '82fd3a92592865f3d89e8fb6f0f84a3aa9c5bd5e040080f734953bcadc6be811', '[\"*\"]', NULL, NULL, '2023-04-10 05:38:48', '2023-04-10 05:38:48'),
(47, 'App\\Models\\Member', 1, 'MyApp', '2ea947fe93f2f3d467629fe130b65b64077ac4668a0d3debb28b26633d81458c', '[\"*\"]', NULL, NULL, '2023-04-10 05:43:40', '2023-04-10 05:43:40'),
(48, 'App\\Models\\Member', 1, 'MyApp', '7589fd8669c347c3657df7a92813aa6f29bb6d97f23fe48d2c56ce936a29c773', '[\"*\"]', NULL, NULL, '2023-04-10 05:43:50', '2023-04-10 05:43:50'),
(49, 'App\\Models\\Member', 1, 'MyApp', '8e593b330f0de183eafa995162ff119b7617c39ce892101088993d6e53d6f510', '[\"*\"]', NULL, NULL, '2023-04-10 05:51:18', '2023-04-10 05:51:18'),
(50, 'App\\Models\\Member', 1, 'MyApp', '0e792be3b1ca3abb1942910c53a032fc43bb9c84f8570adf335fb19a313aed2c', '[\"*\"]', NULL, NULL, '2023-04-10 05:53:50', '2023-04-10 05:53:50'),
(51, 'App\\Models\\Member', 15, 'MyApp', '287ad2c58aca646f757c29ba1ccab7743fe14d74ad620348cc684b47085ec1ed', '[\"*\"]', NULL, NULL, '2023-04-10 06:01:48', '2023-04-10 06:01:48'),
(52, 'App\\Models\\Member', 15, 'MyApp', 'd2528e98d196a563e68c1083833613c7c5303f565558b24b74d362b0ac1048f0', '[\"*\"]', NULL, NULL, '2023-04-10 06:02:16', '2023-04-10 06:02:16'),
(53, 'App\\Models\\Member', 15, 'MyApp', '9aae9aba6a0a9c476bcfd41c2981691afcd702fbcb42c53f0a9de902543faeef', '[\"*\"]', NULL, NULL, '2023-04-10 06:03:57', '2023-04-10 06:03:57'),
(54, 'App\\Models\\Member', 15, 'MyApp', '9ece8d4a6834118e4721e24ea2d10bfb5d48cef165e3d4b8c7ddbaecfe1af2c7', '[\"*\"]', NULL, NULL, '2023-04-10 06:04:26', '2023-04-10 06:04:26'),
(55, 'App\\Models\\Member', 15, 'MyApp', '5e695c0616c7f8b90368f12952ac727e4f7c49e08be86a38735914c077bc5c35', '[\"*\"]', NULL, NULL, '2023-04-10 06:05:54', '2023-04-10 06:05:54'),
(56, 'App\\Models\\Member', 11, 'MyApp', '827f7cdc6594bf48defddffee756943c4ee6beb1e1167d2d271901a541518723', '[\"*\"]', NULL, NULL, '2023-04-10 06:13:44', '2023-04-10 06:13:44'),
(57, 'App\\Models\\Member', 19, 'MyApp', 'cdeb740c271c5f865b21e435742db3707b8c1b1c15ca8fb0bbf3dc122da1d688', '[\"*\"]', NULL, NULL, '2023-04-10 16:13:38', '2023-04-10 16:13:38'),
(58, 'App\\Models\\Member', 19, 'MyApp', '2243cfb408539fc933f258d76bdd809e74ab0773e389bab63199885cb7b9996f', '[\"*\"]', NULL, NULL, '2023-04-11 05:23:19', '2023-04-11 05:23:19'),
(59, 'App\\Models\\Member', 19, 'MyApp', 'a5eb4a304b87c689515a793fb6b83f8d4c0edf18e1071239decd25852aabcabb', '[\"*\"]', NULL, NULL, '2023-04-11 05:25:39', '2023-04-11 05:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `phone_instructions`
--

CREATE TABLE `phone_instructions` (
  `id` int(10) UNSIGNED NOT NULL,
  `phoneid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_instructions`
--

INSERT INTO `phone_instructions` (`id`, `phoneid`, `msg`, `created_at`, `updated_at`, `gym_id`) VALUES
(2, '+1 (417) 414-1024', 'In veniam reprehend', '2023-04-04 06:27:40', '2023-04-10 15:53:21', 4),
(3, '+1 (486) 518-1018', 'Vel mollit proident', '2023-04-04 06:29:24', '2023-04-04 06:30:07', 3),
(4, '3494262947', 'gaAGKJGAGka', '2023-04-06 12:08:20', '2023-04-06 12:08:20', 8),
(5, '7667677', 'uygjfgkjfjjkjffkf', '2023-04-10 05:29:43', '2023-04-10 05:38:33', 9),
(6, '+1 (793) 646-6245', 'Voluptas ad itaque q', '2023-04-10 16:11:19', '2023-04-10 16:11:19', 10);

-- --------------------------------------------------------

--
-- Table structure for table `request_barcodes`
--

CREATE TABLE `request_barcodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(11) NOT NULL,
  `barcodes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_barcodes`
--

INSERT INTO `request_barcodes` (`id`, `gym_id`, `barcodes`, `created_at`, `updated_at`, `date`) VALUES
(1, 2, 50, '2023-03-29 06:38:46', '2023-03-29 06:38:46', '03-29-2023'),
(2, 3, 100, '2023-03-30 07:28:13', '2023-03-30 07:28:13', '03-30-2023'),
(3, 4, 100, '2023-04-01 14:15:43', '2023-04-01 14:15:43', '04-01-2023'),
(4, 5, 10, '2023-04-03 11:44:01', '2023-04-03 11:44:01', '04-03-2023'),
(5, 7, 10, '2023-04-06 10:38:18', '2023-04-06 10:38:18', '04-06-2023'),
(6, 8, 10, '2023-04-06 12:04:55', '2023-04-06 12:04:55', '04-06-2023'),
(7, 8, 10, '2023-04-06 12:05:18', '2023-04-06 12:05:18', '04-06-2023'),
(8, 8, 10, '2023-04-06 12:06:07', '2023-04-06 12:06:07', '04-06-2023'),
(9, 8, 10, '2023-04-06 12:06:20', '2023-04-06 12:06:20', '04-06-2023'),
(10, 4, 10, '2023-04-06 12:06:49', '2023-04-06 12:06:49', '04-06-2023'),
(11, 4, 50, '2023-04-06 12:07:04', '2023-04-06 12:07:04', '04-06-2023'),
(12, 4, 10, '2023-04-06 12:07:32', '2023-04-06 12:07:32', '04-06-2023'),
(13, 9, 50, '2023-04-10 05:25:06', '2023-04-10 05:25:06', '04-10-2023'),
(14, 4, 100, '2023-04-10 06:15:50', '2023-04-10 06:15:50', '04-10-2023'),
(15, 4, 250, '2023-04-10 06:29:43', '2023-04-10 06:29:43', '04-10-2023'),
(16, 10, 250, '2023-04-10 16:10:11', '2023-04-10 16:10:11', '04-10-2023');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(11) NOT NULL,
  `mon_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mon_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tue_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wed_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thur_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thur_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thur_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sat_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sat_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sat_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sun_st_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sun_end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sun_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `gym_id`, `mon_st_time`, `mon_end_time`, `mon_status`, `tue_st_time`, `tue_end_time`, `tue_status`, `wed_st_time`, `wed_end_time`, `wed_status`, `thur_st_time`, `thur_end_time`, `thur_status`, `fri_st_time`, `fri_end_time`, `fri_status`, `sat_st_time`, `sat_end_time`, `sat_status`, `sun_st_time`, `sun_end_time`, `sun_status`, `created_at`, `updated_at`) VALUES
(1, 4, '09:00', '17:00', 'open', '09:00', '17:00', 'closed', '09:00', '17:00', 'closed', '09:00', '17:00', 'closed', '09:00', '17:00', 'closed', '09:00', '17:00', 'closed', '09:00', '17:00', 'closed', '2023-03-30 07:31:51', '2023-04-11 07:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `contact`, `address1`, `address2`, `city`, `state`, `zip`, `password`, `role`, `photo`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2AeZ0vuD/PLq1tzS/hkjGu4rjqKKGTl12NSzzrc9ySlerQU.RII5u', 0, NULL, NULL, 'uxbJpM0iUrNiATKzT8n2wahbcrqffMRyM6Ww4G0UjwL1aHl4sz15RKx1U5da', '2023-03-29 06:36:51', '2023-03-29 06:36:51'),
(2, 'Henry Macdonald', NULL, NULL, 'abc@gmail.com', '+1 (304) 599-4658', '957 Rocky Old Freeway', 'Unde mollit ex qui e', 'Consequatur nisi mo', 'Quae qui consequatur', '19011', '$2y$10$1JPpkS2OIY0yuU9J4HKiiOPYlFnNubk6mH0TovGqmsnD0Mal/VKHy', 1, 'member.png', NULL, NULL, '2023-03-29 06:37:34', '2023-03-29 06:37:34'),
(3, 'fabtech', NULL, NULL, 'fabtech@gmail.com', '+1 (915) 336-6325', '379 South Cowley Boulevard', 'Repellendus Repelle', 'Sint beatae anim vol', 'Voluptatibus distinc', '66594', '$2y$10$HMbk9zZ8tCs.7GTQly6hOe6K27.ouI6UiftiDkZLAnmu5lk8esY8K', 1, 'member.png', NULL, NULL, '2023-03-30 07:27:21', '2023-03-30 07:27:21'),
(4, 'dummy', NULL, NULL, 'dummy@gmail.com', '123456', 'Street 1', 'trhyr', 'dsgrte', 'du', '233', '$2y$10$ESl79bwGFo09nFxYXBQ6ce2hWcsXZ5ciRfjk.nM6DQWk/BFFnQGIa', 1, 'member.png', NULL, NULL, '2023-04-01 14:13:41', '2023-04-01 14:13:41'),
(5, 'qamar', NULL, NULL, 'qamarnazir535@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', '51310', '$2y$10$gzPEKkqw75eT5BMCXOx3Iu46l5Qxf1ni327h0QCERcy7CvAzeVxFy', 1, '1680522186_instagram-circle-logo-transparent-hd-png-download-1024x1024-instagram-circle-png-840_880.jpg', NULL, NULL, '2023-04-03 11:43:06', '2023-04-03 11:43:06'),
(6, 'Gym 1', NULL, NULL, 'qamarnazir56@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', '51310', '$2y$10$81kGuFeeXpyEjAtklFrmj.jh2rgqw3046HrFOjJZ9N5A7oBfiJAtu', 1, '1680721055_mky-moody-AUF6Gl4wwzA-unsplash.jpg', NULL, NULL, '2023-04-05 18:57:35', '2023-04-05 18:57:35'),
(7, 'yoga club', NULL, NULL, 'yogaclub@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', '51310', '$2y$10$I0mGoPi1XZkcI9XgQwByMeXv8FweA08e15IawRG9v.UVFfa5w2mAW', 1, '1680777455_johnny-briggs-JuWTGYVC5UI-unsplash.jpg', NULL, NULL, '2023-04-06 10:37:35', '2023-04-06 10:37:35'),
(8, 'ofc new', NULL, NULL, 'ofc@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', '51310', '$2y$10$UD.WPNUFmH6kzVaxr8odC.DHCVQvY8Bn7AOzcH6KKrVQPL0uFrroq', 1, 'member.png', NULL, NULL, '2023-04-06 11:50:14', '2023-04-06 11:50:14'),
(9, 'fabulous gym', NULL, NULL, 'fab@gmail.com', '3494262947', 'sjsahdsa', 'sjdhajsd', 'sialkot', 'hgvh', '51310', '$2y$10$I8/PMGL3qJekp4m2pF8PIO9hKzfq7YRpc5l1E/2pNoR/PelEnCJ32', 1, 'member.png', NULL, NULL, '2023-04-10 05:23:40', '2023-04-10 05:23:40'),
(10, 'Kitra Pitts', NULL, NULL, 'fabgym@gmail.com', '+1 (873) 723-5016', '602 South Old Parkway', 'Hic sint exercitatio', 'Ab enim eligendi ill', 'Iste nemo dolor quod', '23475', '$2y$10$FdIXP5GDUkuYhFusG5WOd.rNn1FC0eeKKyeRpHU/6JhYUCG.uxxRS', 1, 'member.png', NULL, '0gMN7Gk7KvlKbuc0nDsoU15Lw5MgfOrhFGZDOkmnsFvBHZgZTT09NN2W0fOm', '2023-04-10 16:08:24', '2023-04-10 16:08:24'),
(11, 'Fabtech', NULL, NULL, 'braunbarski@gmail.com', '03320045589', '159', 'islampura', 'Sialkot', 'Punjab', '51310', '$2y$10$vNLVGyQdR9dKAfn0nCZ9Cec8RQg1L3Sz9kDvPaTMka6b7iK0RNn6m', 1, 'member.png', NULL, NULL, '2023-04-10 16:28:08', '2023-04-10 16:28:08'),
(12, 'Lenore Hensley', 'Aidan Mcneil', 'Sandra Wood', 'zozum@mailinator.com', '+1 (171) 305-9051', '764 North Nobel Court', 'Amet dignissimos cu', 'Eum qui excepturi vo', 'Quaerat ut voluptas', '35119', '$2y$10$sPIMxQdIGDbiXaGgJbGaqeGkcLDGPQvqz3a7jDCZT7OYLjvnDxQjC', 1, 'member.png', NULL, NULL, '2023-04-11 07:27:06', '2023-04-11 07:27:06');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `annoucements`
--
ALTER TABLE `annoucements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym_barcodes`
--
ALTER TABLE `gym_barcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mail_instructions`
--
ALTER TABLE `mail_instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `phone_instructions`
--
ALTER TABLE `phone_instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_barcodes`
--
ALTER TABLE `request_barcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
