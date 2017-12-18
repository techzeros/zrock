-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 06:32 PM
-- Server version: 5.7.14-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitcoinwallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `pin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abanum Chux', 'oilmone@ovi.com', '6654', '$2y$10$.3XAa1kEp35Sz6RbMIN4QOwhMWvtEgUklFqp.ZRo3Kivor0pYsB6O', 'qxnzT8tbNYS3c37aP5djArZG42Kp7RYRAqDeHh2Z5U2Vefx8QEoKGMlgme9H', '2017-12-15 20:51:49', '2017-12-18 00:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `admins_password_resets`
--

CREATE TABLE `admins_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_two` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_one_valid` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `id_two_valid` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_histories`
--

CREATE TABLE `login_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` tinyint(1) DEFAULT NULL COMMENT '0 for User; 1 for Admin',
  `user_agent` json NOT NULL,
  `geoip` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_histories`
--

INSERT INTO `login_histories` (`id`, `user_id`, `ip_address`, `user_type`, `user_agent`, `geoip`, `created_at`, `updated_at`) VALUES
(1, 4, '127.0.0.1', 0, 'null', 'null', '2017-12-18 11:28:08', '2017-12-18 11:28:08'),
(2, 1, '127.0.0.1', 1, 'null', 'null', '2017-12-18 11:28:43', '2017-12-18 11:28:43'),
(3, 4, '127.0.0.1', 0, '{"isIE": false, "isBot": false, "isOpera": false, "isChrome": true, "isMobile": false, "isSafari": false, "isTablet": false, "isDesktop": true, "isFirefox": false, "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36", "browserName": "Chrome 62.0.3202", "deviceModel": "", "mobileGrade": "", "deviceFamily": "Unknown", "platformName": "Windows 10", "browserFamily": "Chrome", "browserVersion": "62.0.3202", "platformFamily": "Windows", "platformVersion": "10", "browserVersionMajor": 62, "browserVersionMinor": 0, "browserVersionPatch": 3202, "platformVersionMajor": 10, "platformVersionMinor": 0, "platformVersionPatch": 0}', 'null', '2017-12-18 12:23:31', '2017-12-18 12:23:31'),
(4, 4, '127.0.0.1', 0, '{"isIE": false, "isBot": false, "isOpera": false, "isChrome": true, "isMobile": false, "isSafari": false, "isTablet": false, "isDesktop": true, "isFirefox": false, "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36", "browserName": "Chrome 62.0.3202", "deviceModel": "", "mobileGrade": "", "deviceFamily": "Unknown", "platformName": "Windows 10", "browserFamily": "Chrome", "browserVersion": "62.0.3202", "platformFamily": "Windows", "platformVersion": "10", "browserVersionMajor": 62, "browserVersionMinor": 0, "browserVersionPatch": 3202, "platformVersionMajor": 10, "platformVersionMinor": 0, "platformVersionPatch": 0}', 'null', '2017-12-18 13:55:28', '2017-12-18 13:55:28'),
(5, 4, '127.0.0.1', 0, '{"isIE": false, "isBot": false, "isOpera": false, "isChrome": true, "isMobile": false, "isSafari": false, "isTablet": false, "isDesktop": true, "isFirefox": false, "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36", "browserName": "Chrome 62.0.3202", "deviceModel": "", "mobileGrade": "", "deviceFamily": "Unknown", "platformName": "Windows 10", "browserFamily": "Chrome", "browserVersion": "62.0.3202", "platformFamily": "Windows", "platformVersion": "10", "browserVersionMajor": 62, "browserVersionMinor": 0, "browserVersionPatch": 3202, "platformVersionMajor": 10, "platformVersionMinor": 0, "platformVersionPatch": 0}', '{}', '2017-12-18 14:45:30', '2017-12-18 14:45:30'),
(6, 4, '127.0.0.1', 0, '{"isIE": false, "isBot": false, "isOpera": false, "isChrome": true, "isMobile": false, "isSafari": false, "isTablet": false, "isDesktop": true, "isFirefox": false, "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36", "browserName": "Chrome 62.0.3202", "deviceModel": "", "mobileGrade": "", "deviceFamily": "Unknown", "platformName": "Windows 10", "browserFamily": "Chrome", "browserVersion": "62.0.3202", "platformFamily": "Windows", "platformVersion": "10", "browserVersionMajor": 62, "browserVersionMinor": 0, "browserVersionPatch": 3202, "platformVersionMajor": 10, "platformVersionMinor": 0, "platformVersionPatch": 0}', '{}', '2017-12-18 14:53:42', '2017-12-18 14:53:42'),
(7, 4, '127.0.0.1', 0, '{"isIE": false, "isBot": false, "isOpera": false, "isChrome": true, "isMobile": false, "isSafari": false, "isTablet": false, "isDesktop": true, "isFirefox": false, "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36", "browserName": "Chrome 62.0.3202", "deviceModel": "", "mobileGrade": "", "deviceFamily": "Unknown", "platformName": "Windows 10", "browserFamily": "Chrome", "browserVersion": "62.0.3202", "platformFamily": "Windows", "platformVersion": "10", "browserVersionMajor": 62, "browserVersionMinor": 0, "browserVersionPatch": 3202, "platformVersionMajor": 10, "platformVersionMinor": 0, "platformVersionPatch": 0}', '{}', '2017-12-18 16:06:28', '2017-12-18 16:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_133751_create_admins_table', 1),
(4, '2017_12_16_000437_create_credentials_table', 2),
(5, '2017_12_17_225048_create_admins_password_resets_table', 3),
(6, '2017_12_18_015618_create_login_histories_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `email_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `activated`, `email_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@gmail.com', '$2y$10$dXx3oK6hmFyj0vescgmFheuJi7RLe8C.u1Su2n85ibm7uFekxf10K', 0, NULL, 'IDjQI8XBxohey75KPPlKLG0HI2ZywOMk9DkNTDW3sAqxzqH0aOS0yfOtEm8k', '2017-12-15 20:27:55', '2017-12-15 20:27:55'),
(2, 'Medi Ndudi', 'medi@ovi.com', '$2y$10$jH0pwNFznEhBse8rHcml1.uUuGYsjKRKAwiQeAeN1U2xvZnzsbYLG', 1, NULL, NULL, '2017-12-16 00:19:54', '2017-12-16 00:20:54'),
(4, 'Chiedu VIctor', 'victor@gmail.com', '$2y$10$KvmmE.QNxcVnHIN5k5/N7Ox5lQZ49hexRW4Qg0i83pOl2AO3/3Cwi', 1, NULL, '6jrF9UMULs1MKWPM1vwWeCDwNBu41MjRayjzdmRjFKs7eOZAKc5ROYMlzNS9', '2017-12-16 01:07:32', '2017-12-16 01:12:36'),
(5, 'Usama Daniel', 'usama@ovi.com', '$2y$10$7RS1OBSF5COjzWsyBHuj9uw9fjTg4LVhle0j215RN5/1yfFx/5NdG', 0, 'FidmHW1ozr', NULL, '2017-12-16 01:15:43', '2017-12-16 01:15:43'),
(6, 'PeterDiei', 'peter@gmail.com', '$2y$10$pV46mukSxr5pF/kj16NtguQ3bJNuxicYHlzPkf2T8.4u.WH9VfYqe', 1, NULL, '200sa9gPGF20Rp72E4rh4zqgoFiyk0iXXz3XrkAMtyYe6jKgE2tiI57TdwwS', '2017-12-16 01:25:09', '2017-12-16 01:27:18'),
(7, 'Jim Reeves', 'jim@ovi.com', '$2y$10$dozfne2QOxNEo2USGsBx..Cvf35eL9DuEmNrRtDanH.ABhnOyEvja', 1, NULL, '4ob9cfmO0wAxQ41eTBJDkyA0CWK4KODYgL6vYaKuCTJ6GrEqMk99lcJeGxui', '2017-12-16 01:26:03', '2017-12-16 01:26:26'),
(8, 'Celine Dion', 'celine@gmail.com', '$2y$10$r/nD.0d.8x.AQHlJE8eSduOjJ5V/O9sYWkinKmswlpHiz/8P.rjvS', 1, NULL, 'TL6Wx38UcRHNmF852ZX3ovBhJEcgzlN2AuPthecn3msZCChxdUA9x4jOo1XR', '2017-12-17 21:29:38', '2017-12-17 21:29:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_password_resets`
--
ALTER TABLE `admins_password_resets`
  ADD KEY `admins_password_resets_email_index` (`email`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_histories`
--
ALTER TABLE `login_histories`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
