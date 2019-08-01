-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 02:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tedxmanaratalfaroukschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`id`, `name`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, '2017/2018', 0, '2019-07-12 17:54:52', '2019-07-12 17:54:52'),
(2, '2018/2019', 0, '2019-07-12 17:54:52', '2019-07-12 17:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `parentId`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 'Egypt', 0, 0, '2019-07-12 17:51:56', '2019-07-12 17:51:56'),
(2, 'USA', 0, 0, '2019-07-12 17:51:56', '2019-07-12 17:51:56'),
(3, 'Cairo', 1, 0, '2019-07-13 16:23:56', '2019-07-13 16:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `openingDate` date NOT NULL,
  `closingDate` date NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `name`, `academicYearId`, `openingDate`, `closingDate`, `isdeleted`, `updated_at`, `created_at`, `description`, `image`) VALUES
(1, 'tedxsalon2019', 1, '2019-07-12', '2019-07-30', 0, '2019-07-31 11:58:30', '2019-07-12 18:04:14', '<p>description</p>', 'maxresdefault_1564581510.jpg'),
(2, 'tedx2018', 1, '2018-11-05', '2018-12-31', 0, '2019-07-12 18:04:14', '2019-07-12 18:04:14', '', ''),
(3, 'Event Registration Form', 1, '1212-12-12', '2019-02-02', 0, '2019-07-31 20:25:30', '2019-07-31 20:25:30', '<p>sdsd</p>', 'maxresdefault_1564611930.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactnumber`
--

CREATE TABLE `contactnumber` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contactNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactTypeId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacttype`
--

CREATE TABLE `contacttype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messege` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversionValue` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datatypes`
--

CREATE TABLE `datatypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datatypes`
--

INSERT INTO `datatypes` (`id`, `name`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 'checkbox', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(2, 'color', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(3, 'date', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(4, 'datetime-local', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(5, 'email', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(6, 'file', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(7, 'image', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(8, 'month', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(9, 'number', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(10, 'radio', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(11, 'range', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(12, 'reset', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(13, 'tel', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(14, 'text', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(15, 'time', 0, '2019-07-22 18:42:37', '2019-07-22 18:42:37'),
(16, 'url', 0, '2019-07-22 18:42:38', '2019-07-22 18:42:38'),
(17, 'week', 0, '2019-07-22 18:42:38', '2019-07-22 18:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `datepurchase`
--

CREATE TABLE `datepurchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateTime` date NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobDescribtion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `board_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `jobDescribtion`, `isdeleted`, `updated_at`, `created_at`, `board_id`, `image`) VALUES
(1, 'marketing', 'marketing describtion', 1, '2019-07-31 20:41:04', '2019-07-17 01:59:39', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `departmentform`
--

CREATE TABLE `departmentform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departmentId` int(11) NOT NULL,
  `registrationFormId` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `eventStart` time NOT NULL,
  `eventEnd` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `boardId` int(11) NOT NULL,
  `isRegisterationOpened` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coverImage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GPSURL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebookURL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date`, `eventStart`, `eventEnd`, `description`, `academicYearId`, `boardId`, `isRegisterationOpened`, `isdeleted`, `updated_at`, `created_at`, `coverImage`, `address`, `GPSURL`, `facebookURL`) VALUES
(1, 'tedxmfis-dimensions', '2019-07-16', '12:00:00', '19:00:00', 'dimensions is where we belong', 1, 1, 1, 1, '2019-07-31 18:18:07', '2019-07-13 15:43:05', 'maxresdefault_1564062530.jpg', '', '', ''),
(2, 'tedxhazem', '2019-07-08', '16:00:00', '34:00:00', 'descriptionnnnn', 1, 1, 1, 1, '2019-07-31 18:18:00', '2019-07-18 23:19:40', 'levi_s_one_and_only__levi_x_reader__by_aenafarooq-d9x1cur_1564060883.png', 'manarat Alfarouk Islamic Language School , First Settlement ,Cairo ,Egypt ', '', ''),
(3, 'wqqwqw', '1212-12-21', '00:12:00', '00:12:00', 'asasas', 2, 1, 1, 1, '2019-07-31 11:28:50', '2019-07-22 21:26:32', 'noimage.jpg', '1212asas', '', ''),
(4, 'Event Registration Form', '1222-02-12', '14:11:00', '00:12:00', 'asasasas', 2, 1, 1, 1, '2019-07-31 18:17:57', '2019-07-22 21:29:11', 'aot_1563838151.png', 'asas', '', ''),
(5, 'tedx Event 2019', '2019-12-10', '09:01:00', '22:00:00', 'event description', 2, 1, 1, 1, '2019-07-31 18:17:51', '2019-07-25 11:21:23', 'levi_s_one_and_only__levi_x_reader__by_aenafarooq-d9x1cur_1564060883.png', 'Manarat Alfarouk School, first Settlement, Cairo', '', ''),
(6, 'tedx', '2019-12-12', '02:12:00', '00:12:00', '<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ante ipsum primis in faucibus orci luctu</p>', 2, 1, 1, 1, '2019-07-31 18:17:46', '2019-07-31 09:17:44', 'aot_1564579582.png', 'mohamed house', 'https://goo.gl/maps/2qzY7E6Cda3vWkpQA', ''),
(7, 'salon', '2211-12-12', '00:12:00', '14:11:00', '<p>description</p>', 1, 1, 1, 0, '2019-07-31 21:09:39', '2019-07-31 18:14:17', 'maxresdefault_1564604057.jpg', 'dddd', 'https://goo.gl/maps/XLqLWqm2XThjS2GJ9', ''),
(8, 'nourhan eventy', '2222-12-12', '00:00:00', '00:12:00', '<p>Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt.</p>\r\n\r\n<p>Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>\r\n\r\n<p>Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada.</p>\r\n\r\n<p>Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh.</p>', 1, 1, 1, 0, '2019-07-31 22:17:36', '2019-07-31 21:15:58', 'tedx_1564615388.jpg', '3afroto', 'https://goo.gl/maps/2qzY7E6Cda3vWkpQA', 'https://www.facebook.com/events/2381559635498480/');

-- --------------------------------------------------------

--
-- Table structure for table `eventform`
--

CREATE TABLE `eventform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `registeration_form_id` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventform`
--

INSERT INTO `eventform` (`id`, `event_id`, `registeration_form_id`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 1, 21, 0, '2019-07-22 02:38:09', '2019-07-22 02:38:09'),
(2, 1, 22, 0, '2019-07-22 02:38:16', '2019-07-22 02:38:16'),
(3, 1, 23, 0, '2019-07-22 02:41:42', '2019-07-22 02:41:42'),
(4, 1, 24, 0, '2019-07-22 02:43:57', '2019-07-22 02:43:57'),
(5, 1, 25, 0, '2019-07-24 12:39:56', '2019-07-24 12:39:56'),
(6, 1, 26, 0, '2019-07-25 13:50:48', '2019-07-25 13:50:48'),
(7, 1, 1, 0, '2019-07-26 14:03:43', '2019-07-26 14:03:43'),
(8, 1, 2, 0, '2019-07-26 14:10:12', '2019-07-26 14:10:12'),
(9, 1, 3, 0, '2019-07-26 14:11:53', '2019-07-26 14:11:53'),
(10, 1, 4, 0, '2019-07-26 14:12:44', '2019-07-26 14:12:44'),
(11, 1, 5, 0, '2019-07-26 14:18:08', '2019-07-26 14:18:08'),
(12, 1, 6, 0, '2019-07-26 14:18:16', '2019-07-26 14:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `physicalName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friendlyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `htmlCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressId` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturecontactinfo`
--

CREATE TABLE `manufacturecontactinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufactureId` int(11) NOT NULL,
  `contactNumberId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageTemplate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageTypeId` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messagetype`
--

CREATE TABLE `messagetype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messageuser`
--

CREATE TABLE `messageuser` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `messageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_05_183649_add_all_tables', 1),
(4, '2019_07_05_192727_change_user_table_name_to_users', 1),
(5, '2019_07_17_014215_rename_board_id', 2),
(7, '2019_07_17_092949_create_posts_table', 3),
(16, '2019_07_19_015149_add_cover_image_to_event', 4),
(17, '2019_07_22_004045_edit_eventform_table', 5),
(26, '2019_07_22_010016_event_registeration_form', 6),
(27, '2019_07_22_022523_rename_regop_cols', 7),
(28, '2019_07_22_023622_readd_table_users', 8),
(29, '2019_07_22_024000_readd_table_regop', 9),
(30, '2019_07_22_221146_event_address_id_to_address', 10),
(31, '2019_07_26_194630_registration_forms_options_id', 11),
(32, '2019_07_27_231602_user_type_permissions', 12),
(33, '2019_07_28_094014_permission_user_type', 13),
(34, '2019_07_18_153721_addcolboard', 14),
(35, '2019_07_18_234133_departmentatt', 14),
(36, '2019_07_29_224058_contactus', 14),
(37, '2019_07_31_195212_add_event__g_p_s_url', 15),
(38, '2019_08_01_000458_add_event_facebook_url', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favorite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isReaded` tinyint(1) NOT NULL DEFAULT '0',
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataTypeId` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `dataTypeId`, `isDeleted`, `updated_at`, `created_at`) VALUES
(1, 'what is your favourite color?', 14, 0, '2019-07-26 17:13:42', '2019-07-26 17:13:42'),
(2, 'what is your secret?', 14, 0, '2019-07-26 17:13:42', '2019-07-26 17:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodoptions`
--

CREATE TABLE `paymentmethodoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `paymentOptionId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodoptionvalue`
--

CREATE TABLE `paymentmethodoptionvalue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentMethodOptionId` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 'add UserType', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(2, 'update UserType', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(3, 'delete UserType', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(4, 'show UserType', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(5, 'add User', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(6, 'update User', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(7, 'delete User', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(8, 'show User', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(9, 'add Permission', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(10, 'update Permission', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(11, 'delete Permission', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(12, 'show Permissions', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(13, 'add post', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(14, 'update post', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(15, 'delete post', 0, '2019-07-28 07:52:21', '2019-07-28 07:52:21'),
(16, 'show post', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(17, 'add event', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(18, 'update event', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(19, 'delete event', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(20, 'show event', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(21, 'add board', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(22, 'update board', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(23, 'delete board', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(24, 'show board', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(25, 'add department', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(26, 'update department', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(27, 'delete department', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(28, 'show department', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(29, 'add registrationFormTypes', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(30, 'update registrationFormTypes', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(31, 'delete registrationFormTypes', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(32, 'show registrationFormTypes', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(33, 'add registrationForm', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(34, 'update registrationForm', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(35, 'delete registrationForm', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(36, 'show registrationForm', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(37, 'add registrationFormValues', 0, '2019-07-28 07:52:22', '2019-07-28 07:52:22'),
(38, 'update registrationFormValues', 0, '2019-07-28 07:52:23', '2019-07-28 07:52:23'),
(39, 'delete registrationFormValues', 0, '2019-07-28 07:52:23', '2019-07-28 07:52:23'),
(40, 'show registrationFormValues', 0, '2019-07-28 07:52:23', '2019-07-28 07:52:23'),
(41, 'update about Page', 0, '2019-07-28 07:52:23', '2019-07-28 07:52:23'),
(42, 'update contact Page', 0, '2019-07-28 07:52:23', '2019-07-28 07:52:23'),
(43, 'attach permission', 0, '2019-07-29 20:54:58', '2019-07-29 20:54:58'),
(44, 'detach permission', 0, '2019-07-29 20:54:58', '2019-07-29 20:54:58'),
(45, 'attach user Type', 0, '2019-07-29 20:54:58', '2019-07-29 20:54:58'),
(46, 'detach user Type', 0, '2019-07-29 20:54:58', '2019-07-29 20:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user_type`
--

CREATE TABLE `permission_user_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user_type`
--

INSERT INTO `permission_user_type` (`id`, `user_type_id`, `permission_id`, `isdeleted`, `updated_at`, `created_at`) VALUES
(2, 5, 2, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(3, 5, 3, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(4, 5, 4, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(5, 5, 5, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(6, 5, 6, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(7, 5, 7, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(8, 5, 8, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(9, 5, 9, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(10, 5, 10, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(11, 5, 11, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(12, 5, 12, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(13, 5, 13, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(14, 5, 14, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(15, 5, 15, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(16, 5, 16, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(17, 5, 17, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(18, 5, 18, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(19, 5, 19, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(20, 5, 20, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(21, 5, 21, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(22, 5, 22, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(23, 5, 23, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(24, 5, 24, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(25, 5, 25, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(26, 5, 26, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(27, 5, 27, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(28, 5, 28, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(29, 5, 29, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(30, 5, 30, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(31, 5, 31, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(32, 5, 32, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(33, 5, 33, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(34, 5, 34, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(35, 5, 35, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(36, 5, 36, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(37, 5, 37, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(38, 5, 38, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(39, 5, 39, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(40, 5, 40, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(41, 5, 41, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(42, 5, 42, 0, '2019-07-28 10:06:25', '2019-07-28 10:06:25'),
(44, 5, 1, 0, '2019-07-29 23:09:22', '2019-07-29 23:09:22'),
(45, 5, 43, 0, '2019-07-29 23:09:30', '2019-07-29 23:09:30'),
(46, 5, 44, 0, '2019-07-29 23:09:34', '2019-07-29 23:09:34'),
(47, 5, 45, 0, '2019-07-29 23:09:37', '2019-07-29 23:09:37'),
(48, 5, 46, 0, '2019-07-29 23:09:40', '2019-07-29 23:09:40'),
(49, 2, 1, 0, '2019-07-29 23:10:16', '2019-07-29 23:10:16'),
(50, 2, 2, 0, '2019-07-29 23:10:21', '2019-07-29 23:10:21'),
(51, 4, 20, 0, '2019-07-30 08:36:20', '2019-07-30 08:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_Image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `cover_Image`, `isdeleted`, `updated_at`, `created_at`) VALUES
(2, 'Second Post', 'post body', 1, 'public/cover_images', 1, '2019-07-18 09:44:18', '2019-07-17 09:41:18'),
(3, 'mohamed post', '<p>sdsd;klsd;klsd</p>', 1, 'noimage.jpg', 1, '2019-07-19 11:27:29', '2019-07-17 11:32:02'),
(5, 'zahaby', '<p>sdsdsd</p>', 1, 'coverImageesss_1563469639.jpg', 1, '2019-07-31 20:47:51', '2019-07-18 15:07:19'),
(6, 'hazem', '<p>vvv</p>', 1, 'sunset_dreamcatcher-200x300_1563494515.png', 1, '2019-07-19 11:27:17', '2019-07-18 22:01:55'),
(7, 'zahaby', '<p>post description</p>', 1, 'download_1563543092.jpg', 0, '2019-07-19 11:31:32', '2019-07-19 11:31:32'),
(8, 'mrs.asmaa', '<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\r\n\r\n<p>Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada.</p>\r\n\r\n<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada.</p>', 1, '665356_1563554204.png', 0, '2019-07-31 21:34:15', '2019-07-19 14:36:44'),
(9, 'zahabyy', '<p>Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Proin eget tortor risus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat.</p>\r\n\r\n<p>Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. <strong>Lorem ipsum dolor sit amet, consectet</strong>ur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n\r\n<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec so<s>llicitudin molestie malesuada. C</s>urabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Sed porttitor lectus nibh. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', 1, 'levi_s_one_and_only__levi_x_reader__by_aenafarooq-d9x1cur_1564061706.png', 0, '2019-07-25 11:35:06', '2019-07-25 11:35:06'),
(10, 'samy', '<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>\r\n\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, <strong>auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque in ipsum id orci porta dapibus.</strong></p>\r\n\r\n<p>Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur aliquet quam id dui posuere blandit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p>\r\n\r\n<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur aliquet quam id dui posuere blandit.</p>', 1, 'maxresdefault_1564062530.jpg', 0, '2019-07-25 11:48:50', '2019-07-25 11:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `currencyId` int(11) NOT NULL DEFAULT '1',
  `productTypeId` int(11) NOT NULL DEFAULT '0',
  `isDeleted` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productoptionsvalue`
--

CREATE TABLE `productoptionsvalue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSelectedOptionsId` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productselectedoptions`
--

CREATE TABLE `productselectedoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `optionsId` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentId` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `name`, `parentId`, `isDeleted`, `updated_at`, `created_at`) VALUES
(1, 'tickets', 0, 0, '2019-07-14 18:16:10', '2019-07-14 18:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `datePurchaseId` int(11) NOT NULL,
  `manufactureId` int(11) NOT NULL,
  `deliveryPersonId` int(11) NOT NULL,
  `PaymentMethodId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE `registeration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `academicYearId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`id`, `userId`, `academicYearId`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 0, '2019-07-26 17:13:59', '2019-07-26 17:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `registerationdetails`
--

CREATE TABLE `registerationdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registerationId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `registrationFormId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `boardId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registerationdetails`
--

INSERT INTO `registerationdetails` (`id`, `registerationId`, `statusId`, `registrationFormId`, `isdeleted`, `updated_at`, `created_at`, `boardId`) VALUES
(1, 1, 1, 1, 0, '2019-07-26 17:13:59', '2019-07-26 17:13:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registerationform`
--

CREATE TABLE `registerationform` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrationFormTypeId` int(11) NOT NULL,
  `registerAs` int(11) NOT NULL,
  `isRegistrationClosed` tinyint(1) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registerationform`
--

INSERT INTO `registerationform` (`id`, `name`, `registrationFormTypeId`, `registerAs`, `isRegistrationClosed`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 'zahaby form', 1, 4, 0, 0, '2019-07-27 10:57:45', '2019-07-26 17:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `registrationformoptions`
--

CREATE TABLE `registrationformoptions` (
  `rid` bigint(20) UNSIGNED NOT NULL,
  `registeration_form_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrationformoptions`
--

INSERT INTO `registrationformoptions` (`rid`, `registeration_form_id`, `options_id`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 0, '2019-07-26 19:13:42', '2019-07-26 19:13:42'),
(2, 1, 2, 0, '2019-07-26 19:13:42', '2019-07-26 19:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `registrationformoptionsvalue`
--

CREATE TABLE `registrationformoptionsvalue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrationDetailsId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registration_forms_options_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrationformoptionsvalue`
--

INSERT INTO `registrationformoptionsvalue` (`id`, `value`, `registrationDetailsId`, `isdeleted`, `updated_at`, `created_at`, `registration_forms_options_id`) VALUES
(1, 'red', 1, 0, '2019-07-26 17:13:59', '2019-07-26 17:13:59', 1),
(2, 'i love tedx', 1, 0, '2019-07-26 17:13:59', '2019-07-26 17:13:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registrationformtype`
--

CREATE TABLE `registrationformtype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isForEvent` tinyint(1) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrationformtype`
--

INSERT INTO `registrationformtype` (`id`, `name`, `isForEvent`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 'Event Registration Form', 1, 0, '2019-07-26 12:02:40', '2019-07-26 12:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usercontactinfo`
--

CREATE TABLE `usercontactinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `contactNumberId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinterests`
--

CREATE TABLE `userinterests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `interestsId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `ismale` tinyint(1) NOT NULL DEFAULT '0',
  `birthDate` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `userTypeId`, `ismale`, `birthDate`, `remember_token`, `updated_at`, `created_at`, `isdeleted`) VALUES
(1, 'mohamed', 'alzahaby', 'mohamedazahaby@gmail.com', NULL, '$2y$10$t.SXFyOt5qw.R5.KmoKhsuGLfr3mJ5suhRVrK.DNjJpS0pRsBIGrO', 6, 1, '1997-07-08', 'T0YCkZ46yIzSp0ZAGJPysP6D8XZb9v5oBwWRldkrsvwuKhHk0rR7i8A4ylRt', '2019-07-30 09:03:24', '2019-07-22 00:44:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersnotifications`
--

CREATE TABLE `usersnotifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `notificationId` int(11) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`, `parentId`, `isdeleted`, `updated_at`, `created_at`) VALUES
(1, 'guest', 0, 0, '2019-07-16 13:18:54', '2019-07-16 13:18:54'),
(2, 'participant', 0, 0, '2019-07-16 13:18:54', '2019-07-16 13:18:54'),
(3, 'member', 2, 0, '2019-07-16 13:18:54', '2019-07-16 13:18:54'),
(4, 'attendee', 1, 0, '2019-07-30 06:26:53', '2019-07-16 13:18:54'),
(5, 'admin', 2, 0, '2019-07-28 09:59:05', '2019-07-28 09:59:05'),
(6, 'website guest', 1, 0, '2019-07-30 07:18:51', '2019-07-30 07:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `usertypelinks`
--

CREATE TABLE `usertypelinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `linkId` int(11) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactnumber`
--
ALTER TABLE `contactnumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacttype`
--
ALTER TABLE `contacttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatypes`
--
ALTER TABLE `datatypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datepurchase`
--
ALTER TABLE `datepurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmentform`
--
ALTER TABLE `departmentform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventform`
--
ALTER TABLE `eventform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturecontactinfo`
--
ALTER TABLE `manufacturecontactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagetype`
--
ALTER TABLE `messagetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageuser`
--
ALTER TABLE `messageuser`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethodoptionvalue`
--
ALTER TABLE `paymentmethodoptionvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_user_type`
--
ALTER TABLE `permission_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productoptionsvalue`
--
ALTER TABLE `productoptionsvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productselectedoptions`
--
ALTER TABLE `productselectedoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerationdetails`
--
ALTER TABLE `registerationdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerationform`
--
ALTER TABLE `registerationform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrationformoptions`
--
ALTER TABLE `registrationformoptions`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `registrationformoptionsvalue`
--
ALTER TABLE `registrationformoptionsvalue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrationformtype`
--
ALTER TABLE `registrationformtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercontactinfo`
--
ALTER TABLE `usercontactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinterests`
--
ALTER TABLE `userinterests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersnotifications`
--
ALTER TABLE `usersnotifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactnumber`
--
ALTER TABLE `contactnumber`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacttype`
--
ALTER TABLE `contacttype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datatypes`
--
ALTER TABLE `datatypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `datepurchase`
--
ALTER TABLE `datepurchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departmentform`
--
ALTER TABLE `departmentform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eventform`
--
ALTER TABLE `eventform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturecontactinfo`
--
ALTER TABLE `manufacturecontactinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagetype`
--
ALTER TABLE `messagetype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messageuser`
--
ALTER TABLE `messageuser`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethodoptionvalue`
--
ALTER TABLE `paymentmethodoptionvalue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permission_user_type`
--
ALTER TABLE `permission_user_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productoptionsvalue`
--
ALTER TABLE `productoptionsvalue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productselectedoptions`
--
ALTER TABLE `productselectedoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registeration`
--
ALTER TABLE `registeration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registerationdetails`
--
ALTER TABLE `registerationdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registerationform`
--
ALTER TABLE `registerationform`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrationformoptions`
--
ALTER TABLE `registrationformoptions`
  MODIFY `rid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrationformoptionsvalue`
--
ALTER TABLE `registrationformoptionsvalue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrationformtype`
--
ALTER TABLE `registrationformtype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usercontactinfo`
--
ALTER TABLE `usercontactinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userinterests`
--
ALTER TABLE `userinterests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usersnotifications`
--
ALTER TABLE `usersnotifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertypelinks`
--
ALTER TABLE `usertypelinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
