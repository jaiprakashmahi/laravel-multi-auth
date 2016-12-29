-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:15 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DpcDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `taluka_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `administrators_taluka_id_foreign` (`taluka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `post`, `office_address`, `district`, `pin`, `status`, `taluka_id`, `created_at`, `updated_at`) VALUES
(1, 'sdczxc', 'xcxcv', 'cxvcv', '1', '344334', 1, 1, '2016-12-20 02:46:50', '2016-12-20 02:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin  ', 'admin@aeonlogiciel.com', '$2y$10$.NEu0a97TL0RxQ3mCv58uukSXV49CI.v5XHSTNe89u/o.T3kOCRtu', 'k4Ur6KnNutobRYv3xvbh3Mle9Q8zRMgVM3yarkCdInVcJUvYn4cg3YZXeQuV', '2016-12-23 06:19:12', '2016-12-23 00:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE IF NOT EXISTS `allusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no_opt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'palghar', 1, '2016-12-20 08:15:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `final_officers`
--

CREATE TABLE IF NOT EXISTS `final_officers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `taluka_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `final_officers_taluka_id_foreign` (`taluka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `final_officers`
--

INSERT INTO `final_officers` (`id`, `name`, `post`, `office_address`, `district`, `pin`, `status`, `taluka_id`, `created_at`, `updated_at`) VALUES
(1, 'demo1', 'ASAA', 'A-102, mitrangan , ', '1', '232323', 1, 1, '2016-12-20 08:17:23', '2016-12-20 02:47:23'),
(2, 'xcv  ', 'xcvxcv', 'fdfd', '1', '454554', 1, 1, '2016-12-20 02:47:09', '2016-12-20 02:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

CREATE TABLE IF NOT EXISTS `financial_years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `years_from` int(11) NOT NULL,
  `years_to` int(11) NOT NULL,
  `start_month` int(11) NOT NULL,
  `end_month` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`id`, `years_from`, `years_to`, `start_month`, `end_month`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 2014, 2016, 10, 11, 0, 1, '2016-12-21 08:58:45', '2016-12-21 03:28:45');

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
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_12_000000_create_users_tables', 1),
('2016_12_01_070210_create_planes_table', 1),
('2016_12_01_071440_create_talukas_table', 1),
('2016_12_01_071441_create_final_officers_table', 1),
('2016_12_01_071517_create_sectors_table', 2),
('2016_12_01_071548_create_subsectors_table', 2),
('2016_12_01_071632_create_villages_table', 2),
('2016_12_01_071816_create_worktypes_table', 2),
('2016_12_01_085245_create_officers_table', 2),
('2016_12_02_064110_create_financial_years_table', 2),
('2016_12_06_095027_create_schemes_table', 2),
('2016_12_07_071924_create_districts_table', 2),
('2016_12_09_065653_administrators', 2),
('2016_12_10_052245_create_allusers_table', 2),
('2016_12_12_071833_create_works_table', 2),
('2016_12_20_121508_create_work_progresses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE IF NOT EXISTS `officers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `taluka_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `officers_taluka_id_foreign` (`taluka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `post`, `office_address`, `district`, `pin`, `status`, `taluka_id`, `created_at`, `updated_at`) VALUES
(1, 'fg', 'dff', 'dsdsd', '1', '343434', 1, 1, '2016-12-20 02:46:22', '2016-12-20 02:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id`, `name`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'demo', 1, 1, '2016-12-19 03:59:11', '2016-12-19 03:59:11'),
(2, 'DPA6', 1, 1, '2016-12-22 11:02:58', '2016-12-22 05:32:58'),
(3, 'asa', 1, 1, '2016-12-22 05:32:39', '2016-12-22 05:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE IF NOT EXISTS `schemes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `actual_cost` double NOT NULL,
  `sub_sector_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `schemes_sub_sector_id_foreign` (`sub_sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `name`, `created_by`, `actual_cost`, `sub_sector_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'demo', 1, 12323, 1, 1, '2016-12-20 02:44:37', '2016-12-20 02:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plane_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sectors_plane_id_foreign` (`plane_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `plane_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'demo', 1, 1, '2016-12-20 02:44:02', '2016-12-20 02:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `subsectors`
--

CREATE TABLE IF NOT EXISTS `subsectors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sector_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `subsectors_sector_id_foreign` (`sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subsectors`
--

INSERT INTO `subsectors` (`id`, `name`, `status`, `sector_id`, `created_at`, `updated_at`) VALUES
(1, 'demo', 1, 1, '2016-12-20 02:44:17', '2016-12-20 02:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `talukas`
--

CREATE TABLE IF NOT EXISTS `talukas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `talukas`
--

INSERT INTO `talukas` (`id`, `name`, `district`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'demo', '1', 1, 1, '2016-12-19 04:01:36', '2016-12-19 04:01:36'),
(2, 'dfdf', '1', 1, 1, '2016-12-21 07:37:24', '2016-12-21 07:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `designation`, `mobile`, `address`, `city`, `state`, `pin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'DPCUSER', 'dpc@aeonlogiciel.com', '$2y$10$QT9HhVL.6L/Rm.aEx7n2GutlW29KTKjAxBS6mR4xJSCe.gdyWuuP.', 'DPC', '', '5467895467', 'Aeon 102', 'PUNE', 'MH', '456789', 1, 'XufyT6EPEM1csXC7fmXrgFcvbGpO7v4ZVPuwXmHmnCzaTK6xHdcdoMuOxYlC', '2016-12-23 13:27:44', '2016-12-23 07:57:44'),
(4, 'DPC', 'raj.33r@gmail.com', '$2y$10$CVOy/rtOYIpnINy8HVAy5uKj1mEhmb1bXD6qtRWwlDXvPoQV5c32C', 'DPC', '', '8446669600', 'A-102,', 'Palghar', 'Maharastra', '411045', 1, 'lqIpcXWPgWbgRe9rpvhxVU00hazF9DYvsPwCbGtjRbh1h2AvI4i9wvHBvaJk', '2016-12-17 02:47:39', '2016-12-17 02:47:39'),
(5, 'AgencyThree', 'ag@gmail.com', '$2y$10$UaPimhfu9NsMbpiwqt1cbO/8Dd/JBMhBnfVaBf.35RK9ABZn6YCie', 'AGENCY', '', '9860632737', 'A-103', 'Pune', 'maharastra', '411045', 1, '7lQkPsCheQZkr5vQtL8cFdHcEC5jj086c1jFfjFbASphWge8wKVgEwWy4jGn', '2016-12-14 08:05:51', '2016-12-14 08:05:51'),
(6, 'DemoAgency', 'demo@agency.com', '$2y$10$sWTFnTLYgxxfMvz1vtaZWeaVvmDD.KKYLlm7bTmBbxOrtM5naG00K', 'AGENCY', '', '3456789054', 'xzx', 'Pune', 'MH', '344354', 1, 'UT5bMVuuIuIRHLMAyQXxyBeOu99IeYARogwgqIdECY2Hk9Pbs9CeAZgH3uLT', '2016-12-23 13:22:52', '2016-12-23 07:52:52'),
(7, 'Aditya', 'admin@aeonlogiciel.com', '$2y$10$Wk2OkHJueDroSDO9GvILpOGMmWL0Y6s9QfkxNHnjRGIK9joiYTACy', 'DPC', '', '9769299537', 'Andheri', 'Mumbai', 'Maharashtra', '400053', 1, 'WcOy176Vr2jIgsqg8dTZIeFLt4mvmrx8cJdFDN4ONJOdelexeMznkHgrQi1F', '2016-12-22 11:09:05', '2016-12-22 05:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `taluka_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `villages_taluka_id_foreign` (`taluka_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `name`, `status`, `taluka_id`, `created_at`, `updated_at`) VALUES
(1, 'demo', 1, 1, '2016-12-20 04:13:13', '2016-12-20 04:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `technical_sanction_date` date NOT NULL,
  `technical_sanction_approval_number` double NOT NULL,
  `officer_id` int(10) unsigned NOT NULL,
  `administrator_id` int(10) unsigned NOT NULL,
  `administrator_approval_date` date NOT NULL,
  `administrator_approval_number` double NOT NULL,
  `final_officer_id` int(10) unsigned NOT NULL,
  `final_officer_approval_date` date NOT NULL,
  `final_officer_approval_number` double NOT NULL,
  `estimated_compilation_date` datetime NOT NULL,
  `estimated_cost` double NOT NULL,
  `scheme_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dpc_work_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `release_type` tinyint(4) NOT NULL,
  `work_status_dpc` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `agency_id` int(10) unsigned NOT NULL,
  `work_type_id` int(10) unsigned NOT NULL,
  `financial_year_id` int(10) unsigned NOT NULL,
  `plane_id` int(10) unsigned NOT NULL,
  `sector_id` int(10) unsigned NOT NULL,
  `sub_sector_id` int(10) unsigned NOT NULL,
  `scheme_id` int(10) unsigned NOT NULL,
  `district_id` int(10) unsigned NOT NULL,
  `taluka_id` int(10) unsigned NOT NULL,
  `village_id` int(10) unsigned NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `tender_start_date` date NOT NULL,
  `tender_end_date` date NOT NULL,
  `tender_call_date` date NOT NULL,
  `tender_open_date` date NOT NULL,
  `tender_selected_date` date NOT NULL,
  `work_order_date` date NOT NULL,
  `tender_value` double NOT NULL,
  `agency_work_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `work_status_agency` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `released_total_amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `works_officer_id_foreign` (`officer_id`),
  KEY `works_administrator_id_foreign` (`administrator_id`),
  KEY `works_final_officer_id_foreign` (`final_officer_id`),
  KEY `works_agency_id_foreign` (`agency_id`),
  KEY `works_work_type_id_foreign` (`work_type_id`),
  KEY `works_financial_year_id_foreign` (`financial_year_id`),
  KEY `works_plane_id_foreign` (`plane_id`),
  KEY `works_sector_id_foreign` (`sector_id`),
  KEY `works_sub_sector_id_foreign` (`sub_sector_id`),
  KEY `works_scheme_id_foreign` (`scheme_id`),
  KEY `works_district_id_foreign` (`district_id`),
  KEY `works_taluka_id_foreign` (`taluka_id`),
  KEY `works_village_id_foreign` (`village_id`),
  KEY `works_created_by_foreign` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `name`, `technical_sanction_date`, `technical_sanction_approval_number`, `officer_id`, `administrator_id`, `administrator_approval_date`, `administrator_approval_number`, `final_officer_id`, `final_officer_approval_date`, `final_officer_approval_number`, `estimated_compilation_date`, `estimated_cost`, `scheme_for`, `dpc_work_remarks`, `release_type`, `work_status_dpc`, `agency_id`, `work_type_id`, `financial_year_id`, `plane_id`, `sector_id`, `sub_sector_id`, `scheme_id`, `district_id`, `taluka_id`, `village_id`, `created_by`, `tender_start_date`, `tender_end_date`, `tender_call_date`, `tender_open_date`, `tender_selected_date`, `work_order_date`, `tender_value`, `agency_work_remarks`, `work_status_agency`, `released_total_amount`, `created_at`, `updated_at`) VALUES
(7, 'Demo', '2016-12-23', 67, 1, 1, '2016-12-23', 67, 1, '2016-12-23', 67, '0000-00-00 00:00:00', 120, '2', 'Dpc remark', 0, '2', 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, '2016-12-23', '2016-12-24', '2016-12-23', '2016-12-23', '2016-12-23', '2016-12-23', 456, 'sdsd', '1', 60, '2016-12-23 13:33:22', '2016-12-23 08:03:22'),
(8, 'testwork', '2016-12-23', 6767, 1, 1, '2016-12-23', 78, 1, '2016-12-23', 89, '0000-00-00 00:00:00', 150, '1', 'sdsd', 0, '3', 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, '2016-12-23', '2016-12-24', '2016-12-23', '2016-12-23', '2016-12-23', '2016-12-23', 545, 'sdsd', '1', 150, '2016-12-23 13:38:28', '2016-12-23 08:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `worktypes`
--

CREATE TABLE IF NOT EXISTS `worktypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `worktypes`
--

INSERT INTO `worktypes` (`id`, `name`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Work Type', 1, 1, '2016-12-20 04:11:36', '2016-12-20 04:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `work_progresses`
--

CREATE TABLE IF NOT EXISTS `work_progresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` date NOT NULL,
  `release_fund` double NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `bill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spent` double NOT NULL,
  `release_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `measurement_book` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `progress_percent` double DEFAULT NULL,
  `progress_status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `work_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `work_progresses_work_id_foreign` (`work_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `work_progresses`
--

INSERT INTO `work_progresses` (`id`, `entry_date`, `release_fund`, `remarks`, `created_by`, `bill`, `spent`, `release_type`, `work_photo`, `measurement_book`, `progress_percent`, `progress_status`, `work_id`, `created_at`, `updated_at`) VALUES
(48, '2016-12-23', 60, '', 3, '', 0, '2', '', '', NULL, '0', 7, '2016-12-23 07:56:52', '2016-12-23 07:56:52'),
(49, '2016-12-23', 150, '', 3, '', 0, '3', '', '', NULL, '0', 8, '2016-12-23 07:57:32', '2016-12-23 07:57:32'),
(50, '0000-00-00', 0, '', 6, '', 0, '', '', '', NULL, '1', 7, '2016-12-23 08:03:22', '2016-12-23 08:03:22'),
(51, '0000-00-00', 0, '', 6, '', 0, '', '', 'measurement_book/133616https___www.irctc.co.in_eticketing_printTicket.pdf', NULL, '1', 7, '2016-12-23 08:06:16', '2016-12-23 08:06:16'),
(52, '0000-00-00', 0, '', 6, '', 0, '', 'work_photo/133616logo.png', '', 20, '1', 7, '2016-12-23 08:06:16', '2016-12-23 08:06:16'),
(53, '0000-00-00', 0, '', 6, '', 0, '', 'work_photo/133617brand-logo-50x50.png', '', 20, '1', 7, '2016-12-23 08:06:17', '2016-12-23 08:06:17'),
(54, '0000-00-00', 0, '', 6, '', 0, '', '', '', NULL, '1', 8, '2016-12-23 08:08:28', '2016-12-23 08:08:28'),
(55, '0000-00-00', 0, '', 6, '', 0, '', '', 'measurement_book/141624https___www.irctc.co.in_eticketing_printTicket.pdf', NULL, '1', 8, '2016-12-23 08:46:24', '2016-12-23 08:46:24'),
(56, '0000-00-00', 0, '', 6, '', 0, '', 'work_photo/141624logo.png', '', 70, '1', 8, '2016-12-23 08:46:24', '2016-12-23 08:46:24'),
(57, '0000-00-00', 0, '', 6, '', 0, '', 'work_photo/141624brand-logo-50x50.png', '', 70, '1', 8, '2016-12-23 08:46:24', '2016-12-23 08:46:24'),
(58, '0000-00-00', 0, '', 6, '', 0, '', '', 'measurement_book/142839https___www.irctc.co.in_eticketing_printTicket.pdf', NULL, '1', 8, '2016-12-23 08:58:39', '2016-12-23 08:58:39'),
(59, '0000-00-00', 0, '', 6, '', 0, '', 'work_photo/142839logo.png', '', 100, '1', 8, '2016-12-23 08:58:39', '2016-12-23 08:58:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `administrators_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `final_officers`
--
ALTER TABLE `final_officers`
  ADD CONSTRAINT `final_officers_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schemes`
--
ALTER TABLE `schemes`
  ADD CONSTRAINT `schemes_sub_sector_id_foreign` FOREIGN KEY (`sub_sector_id`) REFERENCES `subsectors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_plane_id_foreign` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subsectors`
--
ALTER TABLE `subsectors`
  ADD CONSTRAINT `subsectors_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_administrator_id_foreign` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_final_officer_id_foreign` FOREIGN KEY (`final_officer_id`) REFERENCES `final_officers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_financial_year_id_foreign` FOREIGN KEY (`financial_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_officer_id_foreign` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_plane_id_foreign` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_scheme_id_foreign` FOREIGN KEY (`scheme_id`) REFERENCES `schemes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_sub_sector_id_foreign` FOREIGN KEY (`sub_sector_id`) REFERENCES `subsectors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_taluka_id_foreign` FOREIGN KEY (`taluka_id`) REFERENCES `talukas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_work_type_id_foreign` FOREIGN KEY (`work_type_id`) REFERENCES `worktypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_progresses`
--
ALTER TABLE `work_progresses`
  ADD CONSTRAINT `work_progresses_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
