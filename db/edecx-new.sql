-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 11:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edecx-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` text NOT NULL,
  `card_type` int(11) NOT NULL,
  `billing_street` varchar(255) NOT NULL,
  `billing_town` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classtype`
--

DROP TABLE IF EXISTS `classtype`;
CREATE TABLE `classtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classtype`
--

INSERT INTO `classtype` (`id`, `classtype`, `created_at`, `updated_at`) VALUES
(1, 'Online', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(2, 'Tutor&#8217s Place', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(3, 'My Place', '2021-01-01 06:46:39', '2021-01-01 06:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fname`, `phone_no`, `contact_email`, `age`, `address`, `hobbies`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', '123456798', 'test@gmail.com', '10', '123456', '123456', 'adfasdf', '2021-01-08 04:41:44', '2021-01-08 04:41:44'),
(2, 'Dishant', '123456789', 'dishant@gmail.com', '12', 'test', 'test', 'test', '2021-01-08 05:00:59', '2021-01-08 05:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`, `created_at`, `updated_at`) VALUES
(1, 'SUNDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57'),
(2, 'MONDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57'),
(3, 'TUESDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57'),
(4, 'WEDNESDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57'),
(5, 'THURSDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57'),
(6, 'FRIDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57'),
(7, 'SATURDAY', '2021-01-07 05:57:57', '2021-01-07 05:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `edecx_admins`
--

DROP TABLE IF EXISTS `edecx_admins`;
CREATE TABLE `edecx_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_dob` date DEFAULT NULL,
  `login_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_sideimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edecx_admins`
--

INSERT INTO `edecx_admins` (`id`, `fname`, `lname`, `email`, `profile_image`, `admin_dob`, `login_logo`, `login_sideimage`, `email_verified_at`, `password`, `price`, `facebook`, `twitter`, `instagram`, `youtube`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '2021-01-01', NULL, '', NULL, '$2y$10$ieqyuqwdyqUf83BK3DqxAOSISGsvSRw/liCi2uGvNgNosC2gPRKMO', 50, 'www.facebook.com/edecx', 'www.twitter.com/edecx', 'www.instagram.com/edecx', 'www.youtube.com/edecx', NULL, '2021-01-01 06:46:39', '2021-01-27 23:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `faq_question`, `faq_answer`, `student_tutor`, `created_at`, `updated_at`) VALUES
(8, 'test', '<p>est</p>', '0', '2021-01-22 04:56:25', '2021-01-22 04:56:25'),
(9, 'test', '<p>testt</p>', '0', '2021-01-28 00:06:32', '2021-01-28 00:06:32'),
(10, 'test', '<p>test</p>', '1', '2021-01-28 00:06:45', '2021-01-28 00:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `fcontactus`
--

DROP TABLE IF EXISTS `fcontactus`;
CREATE TABLE `fcontactus` (
  `id` int(11) NOT NULL,
  `contactno` int(11) NOT NULL,
  `emailid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maplink` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fcontactus`
--

INSERT INTO `fcontactus` (`id`, `contactno`, `emailid`, `address`, `maplink`, `fabout`, `created_at`, `updated_at`) VALUES
(1, 1234567891, 'info@edecx.com', 'test test trest test', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55665.02408888988!2d47.9717239!3d29.3097981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb851064e55d229e8!2sReborn%20Kids%20Education%20Academy%20-%20Al%20Siddiq!5e0!3m2!1sen!2sin!4v1611811684811!5m2!1sen!2sin', 'test test test', NULL, '2021-01-27 23:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Primary', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(3, 'Mid School', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(4, 'High School', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(5, 'University', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(6, 'IB', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(7, 'GCSE', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(14, 'test', '2021-01-28 02:49:04', '2021-01-28 02:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `area_code`, `created_at`, `updated_at`) VALUES
(1, 'Bayān', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(2, 'Bi\'da', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(3, 'Hawally', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(4, 'Hittin', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(5, 'Jabriya', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(6, 'Maidan Hawalli', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(7, 'Mishrif', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(8, 'Mubarak Al-Jabir', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(9, 'Nigra', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(10, 'Rumaithiya', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(11, 'Salam', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(12, 'Salmiya', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(13, 'Salwa', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(14, 'Sha\'ab', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(15, 'Shuhada', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(16, 'Siddiq', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(17, 'South Surra', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(18, 'Zahra', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(19, 'Anjafa', 'Hawalli Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(20, 'Kuwait City', 'Capital Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(21, 'Abdullah as-Salim', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(22, 'Adiliya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(23, 'Any', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(24, 'Bneid il-Gār', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(25, 'Da\'iya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(26, 'Dasma', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(27, 'Dasmān', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(28, 'Doha', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(29, 'Doha Port', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(30, 'Faiha\'', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(31, 'Failaka', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(32, 'Granada', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(33, 'Jaber Al-Ahmad City', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(34, 'Jibla', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(35, 'Kaifan', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(36, 'Khaldiya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(37, 'Mansūriya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(38, 'Mirgab', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(39, 'Nahdha', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(40, 'North West Sulaibikhat', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(41, 'Nuzha', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(42, 'Qadsiya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(43, 'Qurtuba', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(44, 'Rawda', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(45, 'Salhiya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(46, 'Sawābir', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(47, 'Shamiya', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(48, 'Sharq', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(49, 'Shuwaikh', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(50, 'Shuwaikh Industrial Area', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(51, 'Shuwaikh Port', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(52, 'Sulaibikhat', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(53, 'Surra', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(54, 'Umm an Namil Island', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(55, 'Yarmūk', 'Capital  Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(56, 'Abu Futaira', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(57, 'Adān', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(58, 'Al Qurain', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(59, 'Al-Qusour', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(60, 'Fintās', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(61, 'Funaitīs', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(62, 'Misīla', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(63, 'Mubarak Al-Kabeer', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(64, 'Sabah Al-Salem', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(65, 'Sabhān', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(66, 'South Wista', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(67, 'Wista', 'Mubarak Al-Kabeer Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(68, 'Abu Al Hasaniya', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(69, 'Abu Halifa', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(70, 'Abdullah Port', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(71, 'Ahmadi', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(72, 'Ali As-Salim', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(73, 'Aqila', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(74, 'Bar Al Ahmadi', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(75, 'Bneidar', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(76, 'Dhaher', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(77, 'Fahaheel', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(78, 'Fahad Al-Ahmad', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(79, 'Hadiya', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(80, 'Jaber Al-Ali', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(81, 'Jawaher Al Wafra', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(82, 'Jilei\\a', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(83, 'Khairan', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(84, 'Mahbula', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(85, 'Miqwa\'', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(86, 'New Khairan City', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(87, 'New Wafra', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(88, 'Nuwaiseeb', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(89, 'Riqqa', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(90, 'Sabah Al-Ahmad City', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(91, 'Sabah Al-Ahmad Nautical City', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(92, 'Sabahiya', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(93, 'Shu\'aiba (North & South)', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(94, 'South Sabahiya', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(95, 'Wafra', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(96, 'Zoor', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(97, 'Zuhar', 'Ahmadi Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(98, 'Abdullah Al-Mubarak', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(99, 'Airport Distric', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(100, 'Andalous', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(101, 'Ardiya', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(102, 'Ardiya Herafiya', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(103, 'Ardiya Industrial Area', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(104, 'Ashbelya', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(105, 'Dhajeej', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(106, 'Farwaniya', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(107, 'Fordous', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(108, 'Jleeb Al-Shuyoukh', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(109, 'Khaitan', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(110, 'Omariya', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(111, 'Rabiya', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(112, 'Rai', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(113, 'Riggae', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(114, 'Rihab', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(115, 'Sabah Al-Nasser', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(116, 'Sabaq Al Hajan', 'Farwaniya Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(117, 'Abdali', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(118, 'Al Nahda / East Sulaibikhat', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(119, 'Amghara', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(120, 'Bar Jahra', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(121, 'Jahra', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(122, 'Jahra Industrial Area', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(123, 'Kabad', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(124, 'Naeem', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(125, 'Nasseem', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(126, 'Oyoun', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(127, 'Qasr', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(128, 'Saad Al Abdullah City', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(129, 'Salmi', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(130, 'Sikrab', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(131, 'South Doha / Qairawān', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(132, 'Sulaibiya', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(133, 'Sulaibiya Agricultural Area', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(134, 'Taima', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(135, 'Waha', 'Jahra Governorate', '2021-01-01 06:46:39', '2021-01-01 06:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_11_10_092306_create_subjects_table', 1),
(9, '2020_11_10_093022_create_levels_table', 1),
(10, '2020_11_10_093450_create_locations_table', 1),
(11, '2020_11_23_124930_create_terms_table', 1),
(12, '2020_11_24_102428_create_policies_table', 1),
(13, '2020_11_25_072934_create_edecx_admins_table', 1),
(14, '2020_11_30_081709_create_faq_table', 1),
(15, '2020_12_04_101717_create_students_table', 1),
(16, '2020_12_07_123108_create_tutors_table', 1),
(17, '2020_12_31_044322_create_classtype_table', 1),
(18, '2020_12_31_044431_contact_us_table', 1),
(19, '2020_12_31_044509_fcontactus_table', 1),
(20, '2020_12_31_044551_std_otp_table', 1),
(21, '2020_12_31_044737_tutor_details_table', 1),
(22, '2021_01_07_053458_create_review_table', 2),
(23, '2014_10_12_100000_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_text` text COLLATE utf8_unicode_ci NOT NULL,
  `notification_type` int(11) NOT NULL,
  `notification_to` int(11) NOT NULL COMMENT 'for particular user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_text`, `notification_type`, `notification_to`, `created_at`, `updated_at`) VALUES
(1, 'this is notification for tutor', 1, 1, '2021-01-25 17:29:39', '0000-00-00 00:00:00'),
(2, 'this is notification test for student', 2, 1, '2021-01-25 17:30:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02f5d43989fb391eef42ddb142e18a65252b32b96bd21f5b3cc805d8bb659c569fb043f7c97247f3', 8, 3, 'Website Token', '[]', 0, '2021-01-11 07:12:53', '2021-01-11 07:12:53', '2022-01-11 12:42:53'),
('0e6658a4cfff7cf8f95edbd99831f164563c017e6c00e814dbdfb6663cbaef539bc0a3e5309fa942', 1, 3, 'Website Token', '[]', 0, '2021-01-18 05:50:31', '2021-01-18 05:50:31', '2022-01-18 11:20:31'),
('110662c023c8d0daccce5721418dc3beb7f96bf5404185e28f46054d7c650b8554d4ea40b1449db4', 1, 3, 'Website Token', '[]', 0, '2021-01-08 07:13:53', '2021-01-08 07:13:53', '2022-01-08 12:43:53'),
('35ef8228eacbb0442f3fc4544c7c177faaa1f21663eb6ec5d0828ecdce96edf25577f59048150f6f', 1, 3, 'Website Token', '[]', 0, '2021-01-22 00:00:50', '2021-01-22 00:00:50', '2022-01-22 05:30:50'),
('3757fb8328f844505b6fee47f89ca98d54a8a3124c0ef3ef1cf746d2bc85b810aa6b4f846760ed99', 1, 3, 'Website Token', '[]', 0, '2021-01-08 07:08:41', '2021-01-08 07:08:41', '2022-01-08 12:38:41'),
('39aed383411beaa08028d2bb80c0afa8b125d7a6422493297ce58f4c530f8cfef7f97b22604d3143', 12, 3, 'Website Token', '[]', 0, '2021-01-08 07:21:47', '2021-01-08 07:21:47', '2022-01-08 12:51:47'),
('3b5869b903a00d4e8c13028ec2c733c7cbdfb8f716e3d30340a58a69f6e4cc1576566632e21c9b6c', 1, 3, 'Website Token', '[]', 0, '2021-01-18 00:24:08', '2021-01-18 00:24:08', '2022-01-18 05:54:08'),
('487cc92891cdd26cd99923eb157c7f6a8afb89ec24acef0d2b06390e82b92688a3cf80570f754155', 1, 3, 'Website Token', '[]', 0, '2021-01-11 06:08:37', '2021-01-11 06:08:37', '2022-01-11 11:38:37'),
('4999730fd6fbb70c9fdc8f115a077b793f37896f100b18fa5f4dff21da85f64230f1e907d94dbee0', 6, 3, 'Website Token', '[]', 0, '2021-01-08 06:49:28', '2021-01-08 06:49:28', '2022-01-08 12:19:28'),
('5172f9dc8ab09ae1aeb413c7f73bc49378e78734723026dcc227587dda16c99c089a172952ba2a2b', 13, 3, 'Website Token', '[]', 0, '2021-01-12 23:45:32', '2021-01-12 23:45:32', '2022-01-13 05:15:32'),
('60b9e39bb24aa9a87564b7cfab72f304a225709a887dbaf9451f11715000d66085905780bd2bdaf9', 4, 3, 'Website Token', '[]', 0, '2021-01-08 06:41:34', '2021-01-08 06:41:34', '2022-01-08 12:11:34'),
('71194e7a2fba18ad0474c251dd0a99a27c13c4cc9f863a116ab04aef2ffd8f58736e464880de6453', 1, 3, 'Website Token', '[]', 0, '2021-01-21 06:55:48', '2021-01-21 06:55:48', '2022-01-21 12:25:48'),
('7f914d8e6bb75773090cdbd687b5139cc69cc39eea90519e61e251a92d9a892d664b35cb63ae60c4', 6, 3, 'Website Token', '[]', 0, '2021-01-08 06:49:20', '2021-01-08 06:49:20', '2022-01-08 12:19:20'),
('81f5aed25ee1d7692cbe3f2d4189cca59a77f04381d94c038c2452712c773024baf94731bb7f141e', 8, 3, 'Website Token', '[]', 0, '2021-01-11 06:43:18', '2021-01-11 06:43:18', '2022-01-11 12:13:18'),
('822f0ae65277d80ce298bf6f35feeb01831181007c95c3a27fa354a8c61c6dcd72ecb18af284ab9a', 5, 3, 'Website Token', '[]', 0, '2021-01-08 06:43:54', '2021-01-08 06:43:54', '2022-01-08 12:13:54'),
('8bc41cc2e2085b4cdf15a09a4c1caa4fd3050b78460334c94002b8b549db6d4275a860d78f10acae', 8, 3, 'Website Token', '[]', 0, '2021-01-11 06:44:56', '2021-01-11 06:44:56', '2022-01-11 12:14:56'),
('8ce29ff338e870ad4b78abad0812954acb200f181e284a48c999fa3032b71528bc8dfeff6514545b', 1, 3, 'Website Token', '[]', 0, '2021-01-08 07:16:34', '2021-01-08 07:16:34', '2022-01-08 12:46:34'),
('a204dceda573589e66b347d5db21b85787daa2896ede32a75988e34dd42ee36db15620ac85d91ccb', 1, 3, 'Website Token', '[]', 0, '2021-01-21 06:31:21', '2021-01-21 06:31:21', '2022-01-21 12:01:21'),
('b1d585c89b582ba775b2a37f79c15b35433e6c80f61c351fc80c9dc6fa75d6840a5e569f7b3997a0', 1, 3, 'Website Token', '[]', 0, '2021-01-18 04:41:00', '2021-01-18 04:41:00', '2022-01-18 10:11:00'),
('b4195c0e886bb92d23837675ec7c56ff51fd0bacf08df32cebeb2e9f73e9323d3dbe07f5aa243df0', 1, 3, 'Website Token', '[]', 0, '2021-01-08 07:09:37', '2021-01-08 07:09:37', '2022-01-08 12:39:37'),
('b91824482e707d21d04f60f28d34f4372e6d074c2c8dfad820cbf4b7632f9123788491eb18245416', 1, 3, 'Website Token', '[]', 0, '2021-01-13 03:02:59', '2021-01-13 03:02:59', '2022-01-13 08:32:59'),
('c103af79fcb343d2c3e3b43572c237c2757cb1250b6c576d2b98e4f3de401d2e6faca577339589ff', 7, 3, 'Website Token', '[]', 0, '2021-01-08 06:52:09', '2021-01-08 06:52:09', '2022-01-08 12:22:09'),
('c932d32376438f5376a2820ffcbbad94b80e4509687e1b0dea6b2051e10a8570097007edb1c34f61', 14, 3, 'Website Token', '[]', 0, '2021-01-12 23:47:13', '2021-01-12 23:47:13', '2022-01-13 05:17:13'),
('ce823b017414800bce461b49c53d6096f83d618068bff28a35a3da15657fef767f2d1a110c0139de', 1, 3, 'Website Token', '[]', 0, '2021-01-08 07:15:50', '2021-01-08 07:15:50', '2022-01-08 12:45:50'),
('d5dcc67b58df9ae23edadc0062f30b7a6df1d066a613ac264e944d900b231b9eb3276ebebf461b81', 7, 3, 'Website Token', '[]', 0, '2021-01-08 06:51:51', '2021-01-08 06:51:51', '2022-01-08 12:21:51'),
('da6acda180d10865da4c439c8a669dd5448722044d61e500cfe4be3806e34178dcb0c176ccb0c0fc', 1, 3, 'Website Token', '[]', 0, '2021-01-21 01:10:52', '2021-01-21 01:10:52', '2022-01-21 06:40:52'),
('dd0f411800df2e70210f6aa05230331f8787079a97ca6fd7abf01916f4a36d5abf7c0017b7e9ac17', 1, 3, 'Website Token', '[]', 0, '2021-01-11 04:13:53', '2021-01-11 04:13:53', '2022-01-11 09:43:53'),
('e2044639176bee2b71672feb286fb0f31c7266ee808cfeba8fdbf2846dade4c7ba70041fa9c5ee1e', 5, 3, 'Website Token', '[]', 0, '2021-01-08 06:44:04', '2021-01-08 06:44:04', '2022-01-08 12:14:04'),
('ed5c7e451eeb209d948fbfb41508e98cae6f8ad265175088f24f6f4c0c6fabf542fa64b3a18ce8e3', 1, 3, 'Website Token', '[]', 0, '2021-01-18 00:24:40', '2021-01-18 00:24:40', '2022-01-18 05:54:40'),
('f468be065388b00ead188dc5a74e4f26c949d508da4fc542e9db0ba10ac585ebbe93b95f1a9ad051', 12, 3, 'Website Token', '[]', 0, '2021-01-08 07:19:40', '2021-01-08 07:19:40', '2022-01-08 12:49:40'),
('f88ca10af6192f08c54c6c5853e44e83cbb64819d5fff80c0136780c812d0cc8c95900c4e3e5009c', 8, 3, 'Website Token', '[]', 0, '2021-01-11 07:13:38', '2021-01-11 07:13:38', '2022-01-11 12:43:38'),
('ff1d0a42f97a36630af50ba78925a8c6264e351711729d25b2d5ce0d9d4c82eb32664a205f39e40e', 1, 3, 'Website Token', '[]', 0, '2021-01-08 07:14:47', '2021-01-08 07:14:47', '2022-01-08 12:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'gNNU6E87sVG7L86AjU370MfbCaquIOlWYlyHB5Dw', 'http://localhost', 1, 0, 0, '2021-01-06 00:13:42', '2021-01-06 00:13:42'),
(2, NULL, 'Laravel Password Grant Client', 'p2NUBswUkEpOlaNGonaTDh7k5taiVS4YVmhio4QB', 'http://localhost', 0, 1, 0, '2021-01-06 00:13:42', '2021-01-06 00:13:42'),
(3, NULL, 'Laravel Personal Access Client', 'ArPYrikwfzwVoEyqlidL0XO71W2na0In4eFsBvbZ', 'http://localhost', 1, 0, 0, '2021-01-06 01:37:37', '2021-01-06 01:37:37'),
(4, NULL, 'Laravel Password Grant Client', 'C1qnTHJLWjsyq6sN4A3BZFd2AOQ4zkcmQVGUhC88', 'http://localhost', 0, 1, 0, '2021-01-06 01:37:37', '2021-01-06 01:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-06 00:13:42', '2021-01-06 00:13:42'),
(2, 3, '2021-01-06 01:37:37', '2021-01-06 01:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `version`, `policy`, `created_at`, `updated_at`) VALUES
(5, 'test', '<p>test</p>', '2021-01-19 23:13:51', '2021-01-19 23:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `order_id`, `tutor_id`, `student_id`, `rating`, `review_description`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, '', 'test review', NULL, NULL),
(2, 1, 1, 5, '3', 'test review2', NULL, NULL),
(13, 1, 1, 4, '5', 'test review 5', '2021-01-22 01:52:51', '2021-01-22 01:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address_line2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `middle_name`, `lname`, `student_dob`, `gender`, `address`, `street_address`, `street_address_line2`, `city`, `state`, `zipcode`, `email`, `mobile_no`, `phone_no`, `work_no`, `password`, `subject`, `level`, `otp`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test5', 'test5', '2021-01-01', 0, 'test5', 'test5', 'test5', 'test5', 'test5', '123456', 'test@gmail.com', '123456798', '123456789', '123456789', '$2y$10$s9gEC7Eua9GEooE/kNXrd.Ph35Oe3dXKOu40BpYIpcgs.MGMZz/fO', '1,2,3,4,5,6,7,8', '2,3,4,5,6,7', NULL, '2021-01-01 01:35:15', '2021-01-28 06:39:03'),
(25, 'test', 'test', 'test', '2021-01-01', 0, 'test', 'test', 'test', 'test', 'test', '123456', 'test1@gmail.com', '12314564789', '1234156789', '123456798', '$2y$10$SL0PWPfnzYSdIJumh3rle.7hT3jge3gaSxZNrFPXj.K.g2/3e0ouG', '2', '2', NULL, '2021-01-28 02:38:51', '2021-01-28 02:38:51'),
(26, 'test', 'test', 'test', '2021-01-01', 0, 'test', 'test', 'test', 'test', 'test', '123456', 'test3@gmail.com', '1234566789', '123456789', '123456798', '$2y$10$aiuAyACT1e9BrPL22pZyOOYUiIORBA2UFApRXvXaHMMyMGIYTbkxa', '1', '2', NULL, '2021-01-28 03:59:25', '2021-01-28 03:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `classid` int(11) DEFAULT NULL,
  `aboutme` text DEFAULT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `remail_noti` int(5) NOT NULL DEFAULT 1,
  `rupcoming_noti` int(5) NOT NULL DEFAULT 1,
  `rupdates_noti` int(5) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `sid`, `classid`, `aboutme`, `student_image`, `latitude`, `longitude`, `remail_noti`, `rupcoming_noti`, `rupdates_noti`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>', '1611830701.png', NULL, NULL, 1, 1, 1, '2021-01-04 06:23:15', '2021-01-28 05:15:01'),
(4, 25, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2021-01-28 02:38:51', '2021-01-28 02:38:51'),
(5, 26, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2021-01-28 03:59:25', '2021-01-28 03:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_app_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_web_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_app_icon`, `subject_web_icon`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, '1606128568.jpeg', '1606128568.jpeg', 'Math', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(2, '1606128722.jpeg', '1606128568.jpeg', 'Science', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(3, '1606128961.jpeg', '1606128568.jpeg', 'English', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(4, '1606129036.jpeg', '1606128568.jpeg', 'French', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(5, '1606129070.jpeg', '1606128568.jpeg', 'Chemistry', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(6, '1606129142.jpeg', '1606128568.jpeg', 'Physics', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(7, '1606129185.jpeg', '1606128568.jpeg', 'Biology', '2021-01-01 06:46:39', '2021-01-01 06:46:39'),
(8, '1606129293.jpeg', '1606128568.jpeg', 'Arabic', '2021-01-01 06:46:39', '2021-01-01 06:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '09:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(2, '09:00:00', '10:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(3, '10:00:00', '11:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(4, '11:00:00', '12:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(5, '12:00:00', '13:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(6, '13:00:00', '14:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(7, '14:00:00', '15:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(8, '15:00:00', '16:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(9, '16:00:00', '17:00:00', '2021-01-07 06:28:07', '2021-01-07 06:28:07'),
(10, '17:00:00', '18:00:00', '2021-01-07 06:29:10', '2021-01-07 06:29:10'),
(11, '18:00:00', '19:00:00', '2021-01-07 06:29:10', '2021-01-07 06:29:10'),
(12, '19:00:00', '20:00:00', '2021-01-07 06:29:10', '2021-01-07 06:29:10'),
(13, '20:00:00', '21:00:00', '2021-01-07 06:29:10', '2021-01-07 06:29:10'),
(14, '21:00:00', '22:00:00', '2021-01-07 06:29:10', '2021-01-07 06:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
CREATE TABLE `tutors` (
  `id` int(11) UNSIGNED NOT NULL,
  `tutors_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tutors_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tutor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `tutors_fname`, `tutors_lname`, `tutor_email`, `password`, `contact_no`, `address`, `resume`, `status`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'test new', 'test n', 'test@gmail.com', '$2y$10$9kb2RUZfZL3gG64epDti/uJSyON5y77OhCP2MH7opoCSZecZXieuW', '123456789', 'asdf', 'test resume', '0', NULL, '2021-01-03 23:22:53', '2021-01-28 06:48:20'),
(10, 'test', 'test', 'test1@gmail.com', '$2y$10$e1Ed0wHSMxKmFtsufBYBbu5XJWJk2QjVJdcXHRPGH1BzMMnjDgR.e', '123456', '123456', '1611821375.docx', '1', NULL, '2021-01-28 02:39:35', '2021-01-29 05:16:44'),
(11, 'test', 'test', 'test10@gmail.com', '$2y$10$ln/aa93Ih67ZGGVcAkQtjuGTE3Lio0hJt1x0kDQCI2p7apSEbsos.', '123456', '123456', '1611915685.docx', '2', NULL, '2021-01-29 04:51:25', '2021-01-29 04:54:05'),
(12, 'test', 'test', 'test9@gmail.com', '$2y$10$g56BXWwf3tZU3.kd.qOjuOCzaZoaMgk4opS/wG3cds9Eqyok0mrO.', '123456', '123456', '1611917098.docx', '0', NULL, '2021-01-29 05:14:58', '2021-01-29 05:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_details`
--

DROP TABLE IF EXISTS `tutor_details`;
CREATE TABLE `tutor_details` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutor_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `tutor_dob` date DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ugra_college` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gra_college` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ugra_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gra_major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typedegree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrprice` int(11) DEFAULT NULL,
  `urearning` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remail_noti` int(5) NOT NULL DEFAULT 1,
  `rupcoming_noti` int(5) NOT NULL DEFAULT 1,
  `rupdates_noti` int(5) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutor_details`
--

INSERT INTO `tutor_details` (`id`, `tid`, `sid`, `lid`, `classid`, `tutor_image`, `gender`, `tutor_dob`, `experience`, `description`, `ugra_college`, `gra_college`, `ugra_major`, `gra_major`, `typedegree`, `city`, `hrprice`, `urearning`, `latitude`, `longitude`, `remail_noti`, `rupcoming_noti`, `rupdates_noti`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '5', '1', '1610968842.png', 0, '2021-11-01', 10, '<p>sdasd</p>', 'sdfa', 'asdfasdf', 'asdf', 'sadfasdf', 'asdf', 'asdf', 100, 90, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-01-18 05:50:42'),
(6, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2021-01-29 05:16:35', '2021-01-29 05:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_time`
--

DROP TABLE IF EXISTS `tutor_time`;
CREATE TABLE `tutor_time` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `days_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_time`
--

INSERT INTO `tutor_time` (`id`, `tutor_id`, `days_id`, `time_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-01-07 10:05:36', '2021-01-07 10:05:36'),
(3, 1, 2, 1, '2021-01-07 05:51:31', '2021-01-07 05:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classtype`
--
ALTER TABLE `classtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edecx_admins`
--
ALTER TABLE `edecx_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcontactus`
--
ALTER TABLE `fcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

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
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor_details`
--
ALTER TABLE `tutor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor_time`
--
ALTER TABLE `tutor_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classtype`
--
ALTER TABLE `classtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `edecx_admins`
--
ALTER TABLE `edecx_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tutor_details`
--
ALTER TABLE `tutor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tutor_time`
--
ALTER TABLE `tutor_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
