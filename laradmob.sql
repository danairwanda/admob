-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2016 at 08:58 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laradmob`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_units`
--

CREATE TABLE IF NOT EXISTS `ad_units` (
  `id` int(10) unsigned NOT NULL,
  `adUnit_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_app` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_units`
--

INSERT INTO `ad_units` (`id`, `adUnit_id`, `name`, `fk_app`, `created_at`, `updated_at`) VALUES
(9, 'unit1', 'b1', 2, '2016-12-02 02:25:21', '2016-12-02 02:25:21'),
(11, 'unit2', 'b2', 2, '2016-12-02 06:10:21', '2016-12-02 06:10:21'),
(13, 'unit3', 'b3', 11, '2016-12-15 22:28:59', '2016-12-15 22:28:59'),
(14, 'unit4', 'banner1', 13, '2016-12-20 12:20:20', '2016-12-20 12:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(10) unsigned NOT NULL,
  `app_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `app_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'app1', 'Japan Radio', '2016-12-01 01:36:29', '2016-12-10 02:35:50'),
(3, 'app2', 'Radio Thailand', '2016-12-01 01:37:12', '2016-12-01 01:37:12'),
(4, 'app3', 'Radio Myanmar', '2016-12-01 01:37:33', '2016-12-01 01:37:33'),
(5, 'app4', 'Radio Kolombia', '2016-12-01 02:10:08', '2016-12-01 02:10:08'),
(8, 'app5', 'Radio Albania', '2016-12-10 02:19:45', '2016-12-10 02:19:45'),
(9, 'app6', 'Radio Indonesia', '2016-12-15 22:25:39', '2016-12-15 22:25:39'),
(10, 'app7', 'Radio Vietnam', '2016-12-15 22:26:33', '2016-12-15 22:26:33'),
(11, 'app8', 'Radio Philipina', '2016-12-15 22:28:21', '2016-12-15 22:28:21'),
(12, 'app9', 'Wifi Admin', '2016-12-20 12:17:38', '2016-12-20 12:17:41'),
(13, 'app10', 'banner1', '2016-12-20 12:19:02', '2016-12-20 12:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_30_121706_create_applications_table', 2),
('2016_12_01_071355_create_ad_units_table', 2),
('2016_12_02_134419_create_projects_table', 3),
('2016_12_02_225728_add_fk_app_to_projects_table', 3),
('2016_12_11_050955_create_reports_table', 4),
('2016_12_16_025330_add_image_to_users_table', 5),
('2016_12_16_070750_add_date_to_projects_table', 5),
('2016_12_16_084247_add_fk_report_to_projects_table', 6),
('2016_12_17_014226_add_name_adunit_and_apps_to_projects_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL,
  `fk_user` int(10) unsigned NOT NULL,
  `fk_app` int(10) unsigned NOT NULL,
  `name_apps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_adunit` int(10) unsigned NOT NULL,
  `name_adunit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `fk_user`, `fk_app`, `name_apps`, `fk_adunit`, `name_adunit`, `share`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 'japan Radio', 11, 'b1', '80', '2016-12-17 02:39:47', '2016-12-19 18:27:30'),
(2, 7, 2, 'china Radio', 13, 'b1', '75', '2016-12-17 02:41:24', '2016-12-17 02:41:21'),
(3, 17, 4, 'haiti radio', 11, 'b2', '80', '2016-12-17 04:05:11', '2016-12-19 21:16:11'),
(4, 19, 8, 'albania radio', 9, 'b1', '10', '2016-12-17 10:16:52', '2016-12-19 18:30:30'),
(8, 6, 2, 'denmark radio', 11, 'b2', '60', '2016-12-18 20:10:29', '2016-12-18 20:10:29'),
(9, 17, 4, 'Radio Myanmar', 11, 'b2', '80', '2016-12-19 18:16:01', '2016-12-19 18:16:01'),
(14, 18, 2, 'Radio Malaysia', 9, 'b1', '95', '2016-12-19 21:08:22', '2016-12-19 21:08:22'),
(15, 6, 13, 'Wifi Admin', 13, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `app` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ad_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admob_network_requests` int(11) DEFAULT NULL,
  `matched_requests` int(11) DEFAULT NULL,
  `match_rate_persen` double(8,2) DEFAULT NULL,
  `impressions` int(11) DEFAULT NULL,
  `show_rate_persen` double(8,2) DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL,
  `impressions_ctr_persen` double(8,2) DEFAULT NULL,
  `admob_network_request_rpm_idr` double(8,2) DEFAULT NULL,
  `impression_rpm_idr` double(8,2) DEFAULT NULL,
  `estimated_earnings_idr` double(8,2) DEFAULT NULL,
  `active_view_eligible_impressions` int(11) DEFAULT NULL,
  `measurable_impressions` int(11) DEFAULT NULL,
  `viewable_impressions` int(11) DEFAULT NULL,
  `measurable_impressions_persen` double(8,2) NOT NULL DEFAULT '0.00',
  `viewable_impressions_persen` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `app`, `ad_unit`, `admob_network_requests`, `matched_requests`, `match_rate_persen`, `impressions`, `show_rate_persen`, `clicks`, `impressions_ctr_persen`, `admob_network_request_rpm_idr`, `impression_rpm_idr`, `estimated_earnings_idr`, `active_view_eligible_impressions`, `measurable_impressions`, `viewable_impressions`, `measurable_impressions_persen`, `viewable_impressions_persen`, `created_at`, `updated_at`) VALUES
(1, '2016-12-10', 'Japan Radio', 'b1', 19, 19, 1.00, 14, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 14, 14, 14, 14.00, 14.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(2, '2016-11-10', 'china radio', 'b1', 2, 2, 1.00, 2, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 2, 2, 2, 2.00, 2.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(3, '2016-12-10', 'dominican republic radio', 'b1', 16, 16, 1.00, 16, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 16, 16, 16, 16.00, 16.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(4, '2016-12-10', 'haiti radio', 'b2', 9, 9, 1.00, 9, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 9, 9, 8, 9.00, 8.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(5, '2016-12-10', 'albania radio', 'b1', 8, 8, 1.00, 7, 0.88, 3, 0.43, 23479.05, 26833.20, 187.83, 7, 7, 7, 7.00, 7.00, '2016-12-16 02:30:17', '2016-12-16 02:31:00'),
(6, '2016-12-10', 'hongaria radio', 'b2', 4, 4, 1.00, 4, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 4, 4, 4, 4.00, 4.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(7, '2016-12-10', 'siprus radio', 'b2', 1, 1, 1.00, 1, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 1, 1, 1, 1.00, 1.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(8, '2016-12-10', 'england radio', 'b2', 1, 1, 1.00, 1, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 1, 1, 1, 1.00, 1.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(9, '2016-12-10', 'portugal radio', 'b2', 2, 2, 1.00, 2, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 2, 2, 2, 2.00, 2.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(10, '2016-12-10', 'denmark radio', 'b2', 11, 11, 1.00, 11, 1.00, 1, 0.09, 103078.39, 103078.39, 1133.86, 11, 11, 11, 11.00, 11.00, '2016-12-16 02:30:17', '2016-12-16 02:31:00'),
(11, '2016-12-10', 'haiti radio', 'i1', 4, 4, 1.00, 1, 0.25, 0, 0.00, 0.00, 0.00, 0.00, 1, 1, 1, 1.00, 1.00, '2016-12-16 02:30:17', '2016-12-16 02:30:17'),
(12, '2016-12-10', 'Wifi Admin', 'banner 1', 312, 299, 0.96, 296, 0.99, 2, 0.01, 1218.29, 1284.14, 380.11, 293, 293, 192, 293.00, 192.00, '2016-12-16 02:30:17', '2016-12-16 02:31:00'),
(13, '2016-12-10', 'Indonesia radio', 'i1', 1, 1, 1.00, 0, 0.00, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(14, '2016-12-10', 'china radio', 'i1', 2, 2, 1.00, 0, 0.00, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(15, '2016-12-10', 'Japan Radio', 'i1', 9, 9, 1.00, 7, 0.78, 0, 0.00, 0.00, 0.00, 0.00, 7, 7, 7, 7.00, 7.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(16, '2016-12-10', 'dominican republic radio', 'i1', 6, 6, 1.00, 0, 0.00, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(17, '2016-12-10', 'england radio', 'i1', 1, 1, 1.00, 0, 0.00, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(18, '2016-12-10', 'taiwan radio', 'i2', 5, 5, 1.00, 1, 0.20, 0, 0.00, 0.00, 0.00, 0.00, 1, 1, 1, 1.00, 1.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(19, '2016-12-10', 'hongaria radio', 'i2', 1, 1, 1.00, 0, 0.00, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(20, '2016-12-10', 'siprus radio', 'i2', 1, 1, 1.00, 1, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 1, 1, 1, 1.00, 1.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(21, '2016-12-10', 'albania radio', 'i2', 3, 0, 0.00, 0, NULL, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:00', '2016-12-16 02:31:00'),
(22, '2016-12-10', 'romania radio', 'i2', 1, 0, 0.00, 0, NULL, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:01', '2016-12-16 02:31:01'),
(23, '2016-12-10', 'portugal radio', 'i2', 1, 1, 1.00, 1, 1.00, 2, 2.00, 999999.99, 999999.99, 2843.11, 1, 1, 1, 1.00, 1.00, '2016-12-16 02:31:01', '2016-12-16 02:31:01'),
(24, '2016-12-10', 'denmark radio', 'i2', 4, 4, 1.00, 0, 0.00, 0, NULL, 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0.00, '2016-12-16 02:31:01', '2016-12-16 02:31:01'),
(25, '2016-12-10', 'Wifi Admin', 'i', 270, 258, 0.96, 103, 0.40, 2, 0.02, 9220.25, 24169.59, 2489.47, 103, 103, 89, 103.00, 89.00, '2016-12-16 02:31:01', '2016-12-16 02:31:01'),
(26, '2016-12-10', 'taiwan radio', 'b1', 6, 6, 1.00, 6, 1.00, 0, 0.00, 0.00, 0.00, 0.00, 5, 5, 4, 5.00, 4.00, '2016-12-16 02:31:01', '2016-12-16 02:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`, `isadmin`) VALUES
(6, 'Zulfatul Afifah', 'zulfa@gmail.com', '', '$2y$10$pYazZB.xgwDrfz2tqK2OYeoXnSOMExDTntcegN0p9hrAeZGYBAkWu', 'zJgcz83DdeFOFacBBCrDATQtu9khNNob2iNivZn8RQjHilapv5NcbFke72oU', '2016-11-30 00:12:14', '2016-12-20 20:01:05', 0),
(7, 'Fikriansyah', 'fikri@gmail.com', '', '$2y$10$PqZiBTzWmZX3TKw5Fwkyo.L2Q5kXL69YjWKexn6bC12wOaxdE.w5C', 'wvj1j3r8BSJATHRWYDAUZMn29iaGfmdZdfQciOIkcxSK40kHGJ93yLfAgrwJ', '2016-11-30 00:12:37', '2016-12-21 01:32:55', 0),
(14, 'Putra Prima', 'putraprima16@gmail.com', '', '$2y$10$hCLxL.6OTkmisted3XYtxunOPPm0WvHwGJhjDmu3VGyLPVdBnNMDq', 'HUzDPZQvSdVMqVKbTeD6sTuBD3wow1C5VmVta0YFMvDVFTN52UVEyWQ3fSlT', '2016-11-30 15:46:56', '2016-12-21 07:50:03', 1),
(17, 'Lukman Zaenur', 'lukman93@gmail.com', '', '$2y$10$LPOVNrqjXG98tVIJiRrqueDqVMYHAUPKa4hriPw7NNClb5PT/0Dr.', NULL, '2016-11-30 20:55:01', '2016-11-30 20:55:01', 0),
(18, 'Ahmad Dahlan', 'ahmad@gmail.com', '', '$2y$10$i5gsN3sitq3LVZOz/Mal/.4hSU.inZ1.jZr3bQlFFXhAazbbyX5Mi', NULL, '2016-12-09 06:34:26', '2016-12-09 06:35:16', 0),
(19, 'Selvya Novianti', 'selvya@gmail.com', '', '$2y$10$KieM4bpDDnkiO5uMrFgsLO3QZdHGp/EAeRVJgJxXJ.Bxk3xbFQ4T6', '2hArPDub6sm5Gi7pvIhx0QkdEeUffOMWpCJflcXFumDgZpGFJThR2qxyJHP3', '2016-12-10 01:49:47', '2016-12-20 05:12:47', 0),
(20, 'Dana Irwanda', 'danaekairwanda@gmail.com', '', '$2y$10$GJvqg2FiYz92NviRZ30dgOHncPT7vhvErUP.OBMYpAYASrQQOo87S', 'zI4rftlyT8v6pdaRLgjVmN9HhEy3qHdUtnL8LwrZswSI6ujQd1pFEnuPR2mU', '2016-12-10 01:52:24', '2016-12-15 04:27:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_units`
--
ALTER TABLE `ad_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_units_fk_app_foreign` (`fk_app`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_fk_adunit_foreign` (`fk_adunit`),
  ADD KEY `projects_fk_app_foreign` (`fk_app`),
  ADD KEY `projects_fk_user_foreign` (`fk_user`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ad_units`
--
ALTER TABLE `ad_units`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_units`
--
ALTER TABLE `ad_units`
  ADD CONSTRAINT `ad_units_fk_app_foreign` FOREIGN KEY (`fk_app`) REFERENCES `applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_fk_adunit_foreign` FOREIGN KEY (`fk_adunit`) REFERENCES `ad_units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_fk_app_foreign` FOREIGN KEY (`fk_app`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_fk_user_foreign` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
