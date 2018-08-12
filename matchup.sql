-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 07:09 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchup`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmessages`
--

CREATE TABLE `adminmessages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminmessages`
--

INSERT INTO `adminmessages` (`id`, `user_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 27, 5, '2018-07-15 03:21:36', '2018-07-15 03:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `role`, `image`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Mr. Admin', 'Superadmin', 'admin/upload\\admin.png', 'admin@matchup.com', NULL, '$2y$10$FNR6zwoGuB8nLLC96rIssueZ/KLgUYr5nCTjkUdQK9j93wQ350jly', 'iCFzFYPMusZUDwfPzDyXhAG4i4qpAKeqvgxlnMTkzl4MZZOY85EodLNHSgGw', NULL, '2018-07-14 10:13:55'),
(6, 'Tawfiquzzaman Opu', 'Editor', NULL, 'opu.cse32@gmail.com', NULL, '$2y$10$0.vsKj.WHX7LI6T1cN4GbeqEhWM5bwW3f.v5i2hoJCEc3pBC92GGi', 'qy9QU40OLneIf3IHwvxSi4kJuj7hxtaLFocICLZLDOdGM7hVQINlvOU4EaPa', '2018-07-14 17:19:24', '2018-07-14 17:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `blocklists`
--

CREATE TABLE `blocklists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `block_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `degree_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `degree_name`, `institution`, `passing_year`, `result`, `created_at`, `updated_at`) VALUES
(5, 21, 'Phd/Doctorate', 'ty', '77', NULL, '2018-07-03 14:52:22', '2018-07-03 14:52:22'),
(6, 21, 'Masters', 'tyc', '778', NULL, '2018-07-03 14:52:22', '2018-07-03 14:52:22'),
(7, 26, 'Diploma', 'Mymensingh Polytechnique Institute', '2017', NULL, '2018-07-09 19:22:41', '2018-07-09 19:22:41'),
(8, 45, 'Masters', 'Rangpur University College', '2013', NULL, '2018-07-10 16:53:42', '2018-07-10 16:53:42'),
(9, 46, 'Masters', 'MC College, Sylhet', '2018', NULL, '2018-07-12 17:30:48', '2018-07-12 17:30:48'),
(10, 47, 'Masters', 'Dhaka College, Dhaka', '2015', NULL, '2018-07-13 16:38:48', '2018-07-13 16:38:48'),
(11, 48, 'HSC', 'Sylhet Modal College, Sylhet', '2013', NULL, '2018-07-13 16:48:34', '2018-07-13 16:48:34'),
(12, 49, 'MBA', 'Metropolitan University, Sylhet', '2018', NULL, '2018-07-13 16:57:36', '2018-07-13 16:57:36'),
(13, 50, 'Bachelor', 'Metropolitan University, Sylhet', '2018', NULL, '2018-07-14 07:46:46', '2018-07-14 07:46:46'),
(14, 51, 'Bachelor', 'Jalalabad Ragib Rabeya Medical College, Sylhet', '2018', NULL, '2018-07-14 07:55:29', '2018-07-14 07:55:29'),
(15, 52, 'Bachelor', 'MC College, Sylhet', '2017', NULL, '2018-07-14 08:02:10', '2018-07-14 08:02:10'),
(16, 53, 'Bachelor', 'Metropolitan University, Sylhet', '2017', NULL, '2018-07-14 08:16:51', '2018-07-14 08:16:51'),
(17, 53, 'HSC', 'Sylhet Govt. College, Sylhet', '2013', NULL, '2018-07-14 08:16:51', '2018-07-14 08:16:51'),
(18, 54, 'Bachelor', 'National University', '2016', NULL, '2018-07-14 08:31:34', '2018-07-14 08:31:34'),
(19, 20, 'SSC', 'Badaghat Public High School', '2015', NULL, '2018-07-14 08:35:13', '2018-07-14 08:35:13'),
(20, 40, 'Bachelor', 'University Of Chittagong', '2016', NULL, '2018-07-14 15:12:26', '2018-07-14 15:12:26'),
(21, 55, 'Bachelor', 'National University', '2016', NULL, '2018-07-14 15:25:57', '2018-07-14 15:25:57'),
(22, 56, 'Bachelor', 'East West University, Dhaka', '2017', NULL, '2018-07-14 16:23:07', '2018-07-14 16:23:07'),
(23, 57, 'Bachelor', 'Shahjalal University of Science & Technology', '2017', NULL, '2018-07-18 16:16:50', '2018-07-18 16:16:50'),
(24, 58, 'Bachelor', 'Metropolitan University, Sylhet', '2017', NULL, '2018-07-18 16:27:14', '2018-07-18 16:27:14'),
(25, 35, 'Masters', 'Chittagong University', '2012', NULL, '2018-07-18 16:42:31', '2018-07-18 16:42:31'),
(26, 59, 'Bachelor', 'BUET', '1972', NULL, '2018-07-18 18:20:09', '2018-07-18 18:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(34, 34, 'gallery\\34-1.jpg', '2018-06-28 00:12:37', '2018-06-28 00:12:37'),
(35, 34, 'gallery\\34-2.jpg', '2018-06-28 00:12:37', '2018-06-28 00:12:37'),
(36, 34, 'gallery\\34-3.jpg', '2018-06-28 00:12:37', '2018-06-28 00:12:37'),
(39, 22, 'gallery\\22-1.jpg', '2018-06-28 00:56:32', '2018-06-28 00:56:32'),
(40, 22, 'gallery\\22-2.jpg', '2018-06-28 00:56:32', '2018-06-28 00:56:32'),
(41, 21, 'gallery\\21-1.jpg', '2018-06-28 00:57:33', '2018-06-28 00:57:33'),
(42, 21, 'gallery\\21-2.png', '2018-06-28 00:57:33', '2018-06-28 00:57:33'),
(43, 23, 'gallery\\23-1.jpg', '2018-06-28 00:58:19', '2018-06-28 00:58:19'),
(44, 23, 'gallery\\23-2.jpg', '2018-06-28 00:58:19', '2018-06-28 00:58:19'),
(45, 23, 'gallery\\23-3.jpg', '2018-06-28 00:58:19', '2018-06-28 00:58:19'),
(46, 24, 'gallery\\24-1.png', '2018-06-28 00:59:28', '2018-06-28 00:59:28'),
(47, 24, 'gallery\\24-2.jpg', '2018-06-28 00:59:28', '2018-06-28 00:59:28'),
(48, 25, 'gallery\\25-1.jpg', '2018-06-28 01:00:23', '2018-06-28 01:00:23'),
(49, 25, 'gallery\\25-2.jpg', '2018-06-28 01:00:23', '2018-06-28 01:00:23'),
(50, 25, 'gallery\\25-3.jpg', '2018-06-28 01:00:23', '2018-06-28 01:00:23'),
(51, 26, 'gallery\\26-1.jpg', '2018-06-28 01:01:22', '2018-06-28 01:01:22'),
(52, 27, 'gallery\\27-1.png', '2018-06-28 01:02:11', '2018-06-28 01:02:11'),
(53, 27, 'gallery\\27-2.png', '2018-06-28 01:02:11', '2018-06-28 01:02:11'),
(54, 28, 'gallery\\28-1.png', '2018-06-28 01:03:03', '2018-06-28 01:03:03'),
(55, 28, 'gallery\\28-2.jpg', '2018-06-28 01:03:03', '2018-06-28 01:03:03'),
(56, 29, 'gallery\\29-1.jpg', '2018-06-28 01:03:52', '2018-06-28 01:03:52'),
(57, 29, 'gallery\\29-2.jpg', '2018-06-28 01:03:52', '2018-06-28 01:03:52'),
(58, 29, 'gallery\\29-3.jpg', '2018-06-28 01:03:52', '2018-06-28 01:03:52'),
(59, 31, 'gallery\\31-1.jpg', '2018-06-28 01:05:31', '2018-06-28 01:05:31'),
(60, 31, 'gallery\\31-2.jpg', '2018-06-28 01:05:31', '2018-06-28 01:05:31'),
(61, 32, 'gallery\\32-1.jpg', '2018-06-28 01:06:55', '2018-06-28 01:06:55'),
(62, 33, 'gallery\\33-1.jpg', '2018-06-28 01:07:55', '2018-06-28 01:07:55'),
(63, 33, 'gallery\\33-2.jpg', '2018-06-28 01:07:55', '2018-06-28 01:07:55'),
(64, 35, 'gallery\\35-1.jpg', '2018-06-28 01:14:08', '2018-06-28 01:14:08'),
(65, 35, 'gallery\\35-2.jpg', '2018-06-28 01:14:08', '2018-06-28 01:14:08'),
(66, 36, 'gallery\\36-1.jpg', '2018-06-28 01:19:58', '2018-06-28 01:19:58'),
(67, 38, 'gallery\\38-1.jpg', '2018-06-28 01:56:54', '2018-06-28 01:56:54'),
(68, 38, 'gallery\\38-2.jpg', '2018-06-28 01:56:54', '2018-06-28 01:56:54'),
(69, 38, 'gallery\\38-3.jpg', '2018-06-28 01:56:55', '2018-06-28 01:56:55'),
(71, 39, 'gallery\\39-2.jpg', '2018-06-28 02:02:28', '2018-06-28 02:02:28'),
(72, 42, 'gallery\\42-1.jpg', '2018-06-28 03:21:43', '2018-06-28 03:21:43'),
(73, 42, 'gallery\\42-2.jpg', '2018-06-28 03:21:43', '2018-06-28 03:21:43'),
(74, 42, 'gallery\\42-3.jpg', '2018-06-28 03:21:43', '2018-06-28 03:21:43'),
(75, 20, 'gallery\\20-1.jpg', '2018-06-28 03:29:08', '2018-06-28 03:29:08'),
(76, 46, 'gallery\\13247800_1130473430350314_6840731912193003306_o.jpg', '2018-07-12 17:32:13', '2018-07-12 17:32:13'),
(77, 46, 'gallery\\14712853_1241172039280452_7715110378748772835_o.jpg', '2018-07-12 17:32:13', '2018-07-12 17:32:13'),
(78, 46, 'gallery\\22528621_1602610816469904_5886317656346627090_o.jpg', '2018-07-12 17:32:13', '2018-07-12 17:32:13'),
(79, 46, 'gallery\\25542558_1664728513591467_5783537776378765413_o.jpg', '2018-07-12 17:32:13', '2018-07-12 17:32:13'),
(80, 47, 'gallery\\14925533_1213236232075829_1762394103065616301_n.jpg', '2018-07-13 16:39:19', '2018-07-13 16:39:19'),
(81, 47, 'gallery\\18077299_1407732092626241_203770489617866514_o.jpg', '2018-07-13 16:39:19', '2018-07-13 16:39:19'),
(82, 47, 'gallery\\18209132_1423537667712350_7562679196378727773_o.jpg', '2018-07-13 16:39:19', '2018-07-13 16:39:19'),
(83, 48, 'gallery\\20616911_1201884653256447_2797906247083064153_o.jpg', '2018-07-13 16:49:12', '2018-07-13 16:49:12'),
(84, 48, 'gallery\\26171184_1327004444077800_2024404363229707025_o.jpg', '2018-07-13 16:49:12', '2018-07-13 16:49:12'),
(85, 49, 'gallery\\17309861_10210699592504328_6433801990520423419_n.jpg', '2018-07-13 16:58:01', '2018-07-13 16:58:01'),
(86, 49, 'gallery\\19884286_10211804190358584_1916777571480412659_n.jpg', '2018-07-13 16:58:01', '2018-07-13 16:58:01'),
(87, 49, 'gallery\\25659995_10213167760646989_6572974088476437919_n.jpg', '2018-07-13 16:58:01', '2018-07-13 16:58:01'),
(88, 49, 'gallery\\28576107_10213708204157739_2713696601661315720_n.jpg', '2018-07-13 16:58:02', '2018-07-13 16:58:02'),
(89, 50, 'gallery\\26841214_1474673075964982_6085744235534148890_o.jpg', '2018-07-14 07:47:06', '2018-07-14 07:47:06'),
(90, 50, 'gallery\\28423726_1515049061927383_5594644307569519772_o.jpg', '2018-07-14 07:47:06', '2018-07-14 07:47:06'),
(91, 50, 'gallery\\35488021_1622741724491449_8455771779451846656_o.jpg', '2018-07-14 07:47:06', '2018-07-14 07:47:06'),
(92, 51, 'gallery\\30706634_2531545040405047_5923182534555860992_o.jpg', '2018-07-14 07:55:44', '2018-07-14 07:55:44'),
(93, 51, 'gallery\\31948244_2546435322249352_7655341212945088512_o.jpg', '2018-07-14 07:55:44', '2018-07-14 07:55:44'),
(94, 52, 'gallery\\24131843_1231319803635646_390637840928204080_o.jpg', '2018-07-14 08:02:39', '2018-07-14 08:02:39'),
(95, 52, 'gallery\\33121557_1382080498559575_710154842185662464_o.jpg', '2018-07-14 08:02:39', '2018-07-14 08:02:39'),
(96, 52, 'gallery\\36582362_1429490927151865_5722018133405859840_n.jpg', '2018-07-14 08:02:39', '2018-07-14 08:02:39'),
(97, 53, 'gallery\\20545508_1305028372949573_1943568167053787815_o.jpg', '2018-07-14 08:17:14', '2018-07-14 08:17:14'),
(98, 53, 'gallery\\27788159_1472794602839615_5922835398709946005_o.jpg', '2018-07-14 08:17:14', '2018-07-14 08:17:14'),
(99, 54, 'gallery\\14203187_1033232286797318_8905975956446691416_n.jpg', '2018-07-14 08:31:52', '2018-07-14 08:31:52'),
(100, 54, 'gallery\\15873311_1161923047261574_5442560624768010383_n.jpg', '2018-07-14 08:31:52', '2018-07-14 08:31:52'),
(101, 54, 'gallery\\26172741_1510463465740862_7191165878796302334_o.jpg', '2018-07-14 08:31:52', '2018-07-14 08:31:52'),
(102, 20, 'gallery\\25637293_163439624413398_1642960061_o.jpg', '2018-07-14 08:35:43', '2018-07-14 08:35:43'),
(103, 20, 'gallery\\27983514_192446751512685_3109124212112134947_o.jpg', '2018-07-14 08:35:43', '2018-07-14 08:35:43'),
(104, 55, 'gallery\\15873121_1407899525910511_1391769170921674021_n.jpg', '2018-07-14 15:26:17', '2018-07-14 15:26:17'),
(105, 55, 'gallery\\23800202_1780970375270089_6433967109632748655_o.jpg', '2018-07-14 15:26:17', '2018-07-14 15:26:17'),
(106, 55, 'gallery\\32695470_1979053158795142_2142426152210268160_o.jpg', '2018-07-14 15:26:17', '2018-07-14 15:26:17'),
(107, 56, 'gallery\\18739124_1380595515310761_1088318971337068625_o.jpg', '2018-07-14 16:23:35', '2018-07-14 16:23:35'),
(108, 56, 'gallery\\22137251_1497666886936956_9010422109839444332_o.jpg', '2018-07-14 16:23:35', '2018-07-14 16:23:35'),
(109, 56, 'gallery\\30740942_1686263734743936_909055301649432576_o.jpg', '2018-07-14 16:23:35', '2018-07-14 16:23:35'),
(110, 59, 'gallery\\31e.jpg', '2018-07-18 18:20:25', '2018-07-18 18:20:25'),
(111, 59, 'gallery\\7386170_ori.jpg', '2018-07-18 18:20:25', '2018-07-18 18:20:25'),
(112, 59, 'gallery\\Abul-Hayat-1.jpg', '2018-07-18 18:20:25', '2018-07-18 18:20:25'),
(113, 59, 'gallery\\MV5BZmU2ZDY1ZDgtODE5OC00N2UzLWFhNDctNzhjZjEyNzE5ZDEwL2ltYWdlXkEyXkFqcGdeQXVyNDI3NjcxMDA@._V1_SY1000_CR0,0,1427,1000_AL_.jpg', '2018-07-18 18:20:25', '2018-07-18 18:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `guestmessages`
--

CREATE TABLE `guestmessages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guestmessages`
--

INSERT INTO `guestmessages` (`id`, `title`, `relation`, `message`, `facebook`, `twitter`, `googleplus`, `created_at`, `updated_at`) VALUES
(8, 'But I Must Explain', 'Friend', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', NULL, NULL, NULL, '2018-07-10 06:33:17', '2018-07-10 06:33:17'),
(9, 'Yes You Must Explain', 'Cousin', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', NULL, NULL, NULL, '2018-07-10 06:34:02', '2018-07-10 09:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `user_id`, `name`, `profile_id`, `phone`, `date`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 19, 'mahbub', '131', '01759034666', '2018-06-14', 'Message', '0', '2018-06-29 15:48:25', '2018-06-30 10:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `membershiplevels`
--

CREATE TABLE `membershiplevels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membershiplevels`
--

INSERT INTO `membershiplevels` (`id`, `level`, `price`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Bronze', '1000.00', '30', NULL, '2018-06-28 19:05:22'),
(2, 'Silver', '2200.00', '90', NULL, NULL),
(3, 'Gold', '3000.00', '180', NULL, NULL),
(4, 'Platinum', '4500.00', '365', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(2555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membershiplevel_id` int(10) UNSIGNED NOT NULL,
  `status` enum('Pending','Approved','Canceled','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `payment_option`, `transaction_id`, `bank_slip`, `membershiplevel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, 'bKash', '88', NULL, 2, 'Approved', '2018-06-28 08:02:13', '2018-07-18 18:36:55'),
(2, 19, 'bKash', '123456', NULL, 2, 'Canceled', '2018-06-28 08:02:13', '2018-06-28 19:25:01'),
(3, 21, 'bank', NULL, 'payment/bank\\DgzdcEBWkAEw-hO.jpg', 1, 'Approved', '2018-07-09 18:37:58', '2018-07-18 18:36:50'),
(4, 20, 'bKash', '1345234567', NULL, 3, 'Approved', '2018-07-17 05:57:58', '2018-07-17 05:58:51'),
(5, 50, 'bKash', '9856784324', NULL, 3, 'Approved', '2018-07-18 16:35:55', '2018-07-18 16:36:46'),
(6, 59, 'bKash', '1345634567', NULL, 4, 'Approved', '2018-07-18 18:24:26', '2018-07-18 18:24:37'),
(7, 60, 'bKash', '1234567897654', NULL, 4, 'Approved', '2018-07-19 07:29:52', '2018-07-19 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `admin_id`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(46, 19, NULL, 'ios', '1', '2018-07-09 06:59:15', '2018-07-09 07:01:18'),
(47, 19, NULL, 'ass', '1', '2018-07-09 07:01:33', '2018-07-09 07:53:03'),
(48, 19, 5, 'java', '1', '2018-07-09 07:01:38', '2018-07-09 15:26:12'),
(49, 19, 5, 'ok', '1', '2018-07-09 15:26:48', '2018-07-09 15:26:48'),
(50, 19, 5, 'ka', '1', '2018-07-09 15:29:05', '2018-07-09 15:29:05'),
(51, 19, 5, 'a', '1', '2018-07-09 15:29:22', '2018-07-09 15:29:22'),
(52, 19, 5, 'ui', '1', '2018-07-09 15:29:42', '2018-07-09 15:29:42'),
(53, 19, 5, 'vs', '1', '2018-07-09 15:29:48', '2018-07-09 15:29:48'),
(54, 19, 5, 'cs', '1', '2018-07-09 15:30:08', '2018-07-09 15:30:09'),
(55, 19, 5, 'o', '1', '2018-07-09 15:30:51', '2018-07-09 15:30:51'),
(56, 19, NULL, 'csc', '1', '2018-07-09 15:31:24', '2018-07-09 15:31:24'),
(57, 19, NULL, 'ok', '1', '2018-07-09 15:33:06', '2018-07-09 15:33:07'),
(58, 19, NULL, 'cs', '1', '2018-07-09 15:33:18', '2018-07-09 15:33:18'),
(59, 19, 5, 'xsa', '1', '2018-07-09 15:33:31', '2018-07-09 15:33:32'),
(60, 19, NULL, 'h', '1', '2018-07-09 15:34:27', '2018-07-09 15:34:28'),
(61, 19, 5, 'p', '1', '2018-07-09 15:34:34', '2018-07-09 15:34:34'),
(62, 39, NULL, 'Hello Admin.', '1', '2018-07-10 10:09:44', '2018-07-10 10:10:02'),
(63, 39, 5, 'Hy', '1', '2018-07-10 10:10:15', '2018-07-10 10:10:15'),
(64, 39, NULL, 'Whats up ?', '1', '2018-07-10 10:10:24', '2018-07-10 10:10:25'),
(65, 39, 5, 'Nothing else.', '1', '2018-07-10 10:10:43', '2018-07-10 10:10:44'),
(66, 27, NULL, 'Hello', '1', '2018-07-15 03:19:55', '2018-07-15 03:20:07'),
(67, 27, 5, 'Hy', '1', '2018-07-15 03:20:15', '2018-07-15 03:20:16');

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
(1, '2018_04_27_090416_create_education_table', 1),
(2, '2018_04_27_084844_create_contacts_table', 2),
(3, '2018_04_27_084852_create_faqs_table', 2),
(4, '2018_04_27_084905_create_subscribers_table', 3),
(5, '2018_04_27_084916_create_stories_table', 4),
(6, '2018_04_27_084947_create_guestmessages_table', 4),
(7, '2018_04_27_085003_create_membershipbenefits_table', 4),
(8, '2018_04_27_085016_create_payments_table', 4),
(9, '2018_04_27_085101_create_countries_table', 4),
(10, '2018_04_27_085127_create_admins_table', 4),
(11, '2018_04_27_093403_create_galleries_table', 4),
(12, '2018_04_27_084832_create_memberships_table', 5),
(13, '2018_06_08_170618_create_userinfos_table', 6),
(14, '2016_09_12_99999_create_visitlogs_table', 7),
(15, '2018_06_14_140701_create_blocklists_table', 8),
(16, '2018_06_25_162828_create_profilevisitors_table', 9),
(17, '2018_06_28_123948_create_membershiplevels_table', 10),
(18, '2018_04_27_085030_create_meetings_table', 11),
(19, '2015_10_05_110608_create_messages_table', 12),
(20, '2015_10_05_110622_create_conversations_table', 12),
(21, '2018_07_09_013054_create_messages_table', 13),
(22, '2018_07_09_131651_create_adminmessages_table', 14),
(23, '2018_07_15_161216_create_userchats_table', 15);

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
-- Table structure for table `profilevisitors`
--

CREATE TABLE `profilevisitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profilevisitors`
--

INSERT INTO `profilevisitors` (`id`, `user_id`, `visitor_id`, `created_at`, `updated_at`) VALUES
(1, 2, 19, '2018-06-25 10:34:24', '2018-06-29 13:42:05'),
(3, 21, 19, '2018-06-29 17:46:37', '2018-07-05 16:18:11'),
(4, 22, 19, '2018-06-29 17:46:48', '2018-07-09 08:30:12'),
(5, 24, 19, '2018-06-29 17:46:51', '2018-06-29 17:46:51'),
(6, 26, 19, '2018-06-29 17:49:36', '2018-07-15 10:59:27'),
(7, 36, 19, '2018-06-29 17:49:45', '2018-06-29 17:49:45'),
(8, 38, 19, '2018-07-03 15:00:23', '2018-07-03 15:00:23'),
(9, 30, 19, '2018-07-09 08:30:24', '2018-07-09 08:30:24'),
(10, 35, 19, '2018-07-09 08:30:35', '2018-07-09 08:30:35'),
(11, 31, 49, '2018-07-13 17:00:54', '2018-07-13 17:00:54'),
(12, 24, 27, '2018-07-15 03:07:53', '2018-07-15 03:07:53'),
(13, 23, 27, '2018-07-15 03:26:46', '2018-07-15 03:26:46'),
(14, 21, 27, '2018-07-15 03:28:31', '2018-07-15 03:28:31'),
(15, 33, 19, '2018-07-15 10:59:36', '2018-07-15 12:43:55'),
(16, 19, 33, '2018-07-15 12:39:42', '2018-07-15 12:43:33'),
(17, 19, 38, '2018-07-15 13:17:39', '2018-07-15 13:17:39'),
(18, 20, 33, '2018-07-17 06:02:26', '2018-07-17 06:34:24'),
(19, 22, 54, '2018-07-17 18:00:43', '2018-07-17 18:00:43'),
(20, 39, 58, '2018-07-18 16:29:08', '2018-07-18 16:29:08'),
(21, 41, 58, '2018-07-18 16:29:28', '2018-07-18 16:29:28'),
(22, 37, 58, '2018-07-18 16:29:39', '2018-07-18 16:29:39'),
(23, 19, 58, '2018-07-18 16:29:44', '2018-07-18 16:29:44'),
(24, 38, 58, '2018-07-18 16:29:54', '2018-07-18 16:29:54'),
(25, 48, 58, '2018-07-18 16:30:42', '2018-07-18 16:30:42'),
(26, 53, 58, '2018-07-18 16:30:56', '2018-07-18 16:30:56'),
(27, 49, 58, '2018-07-18 16:31:09', '2018-07-18 16:31:09'),
(28, 58, 50, '2018-07-18 16:33:45', '2018-07-18 16:33:45'),
(29, 50, 35, '2018-07-18 16:39:32', '2018-07-19 06:16:06'),
(30, 35, 50, '2018-07-18 16:42:38', '2018-07-18 16:42:50'),
(31, 25, 50, '2018-07-19 06:30:21', '2018-07-19 06:30:21'),
(32, 59, 35, '2018-07-19 06:50:21', '2018-07-19 06:50:21'),
(33, 50, 60, '2018-07-19 07:31:43', '2018-07-19 07:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Nazib Ahmed Mukit & Mimi Chowdhury', 'I got an interest in my matchup.com profile from her. Then I got called by her family. Later on we noticed that we are from same hometown. Its love marriage arranged by matchup.com.', 'stories\\sanjoy-shubro-263901_Fotor.jpg', '2018-07-10 06:44:19', '2018-07-10 15:52:26'),
(3, 'Animesh Dev & Prapti Ghosh', '\"Just another day, we were looking at your recommendation and suddenly her profile come across. As it is very well said, It all starts with a humble \'Hi\'.. So it all started and rest is a lovely story\".', 'stories\\3c2339dda0d35491190c4e555b3ae4b0_Fotor.jpg', '2018-07-10 06:47:26', '2018-07-10 15:53:53'),
(4, 'Samrat & Megha', 'It was a kind of astonishment for me that I found my significant other on MATCHup.com within a week of making my profile on the site. We exchanged our contact numbers and emails on MATCHup.com itself.', 'stories\\Sanjoy Shubro photography-449701-S.jpg', '2018-07-10 06:49:02', '2018-07-17 15:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'mahbub.shuvo10@gmail.com', '2018-06-14 11:58:51', '2018-06-14 11:58:51'),
(5, 'Manis1931@armyspy.com', '2018-07-10 09:12:43', '2018-07-10 09:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `userchats`
--

CREATE TABLE `userchats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userchats`
--

INSERT INTO `userchats` (`id`, `user_id`, `destination_id`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(7, 19, 33, 'Kemon aso', 1, '2018-07-15 11:45:51', '2018-07-15 11:45:51'),
(8, 33, 19, 'Valo', 1, '2018-07-15 11:46:12', '2018-07-15 11:46:12'),
(9, 19, 33, 'ki koro', 1, '2018-07-15 11:46:32', '2018-07-15 11:46:32'),
(10, 33, 19, 'kichu na', 1, '2018-07-15 11:47:05', '2018-07-15 11:47:05'),
(12, 19, 33, 'csc', 1, '2018-07-15 12:13:14', '2018-07-15 12:13:14'),
(13, 19, 33, 'aibe ni', 1, '2018-07-15 12:14:08', '2018-07-15 12:14:08'),
(15, 33, 19, 'oy', 1, '2018-07-15 12:27:36', '2018-07-15 12:27:36'),
(16, 33, 19, 'ase', 1, '2018-07-15 12:27:43', '2018-07-15 12:27:43'),
(17, 33, 19, 'tumi', 1, '2018-07-15 12:28:04', '2018-07-15 12:28:05'),
(18, 19, 33, 'kila', 1, '2018-07-15 12:28:28', '2018-07-15 12:28:29'),
(19, 33, 19, 'jani na', 1, '2018-07-15 12:29:03', '2018-07-15 13:15:32'),
(21, 38, 19, 'hlq', 1, '2018-07-15 13:21:26', '2018-07-15 13:39:48'),
(22, 19, 38, 'hi', 1, '2018-07-15 13:39:55', '2018-07-15 13:39:55'),
(23, 38, 19, 'kita kobhor', 1, '2018-07-15 13:40:08', '2018-07-15 13:40:09'),
(24, 19, 38, 'vala', 1, '2018-07-15 13:40:12', '2018-07-15 13:40:13'),
(25, 38, 19, 'kjit', 1, '2018-07-15 13:40:32', '2018-07-15 13:46:17'),
(28, 33, 20, 'hlw', 1, '2018-07-17 06:02:34', '2018-07-17 06:02:49'),
(29, 20, 33, 'hi', 1, '2018-07-17 06:02:53', '2018-07-17 06:02:54'),
(30, 33, 20, 'what\'s app', 1, '2018-07-17 06:03:01', '2018-07-17 06:03:02'),
(31, 33, 20, 'Im fine', 1, '2018-07-17 06:34:36', '2018-07-17 06:34:53'),
(32, 20, 33, 'I also', 1, '2018-07-17 06:34:58', '2018-07-17 06:34:59'),
(33, 35, 50, 'Hello Mr.', 1, '2018-07-18 16:39:47', '2018-07-18 16:40:00'),
(34, 50, 35, 'Hy', 1, '2018-07-18 16:40:05', '2018-07-18 16:40:05'),
(35, 35, 50, 'Where u from ???', 1, '2018-07-18 16:40:17', '2018-07-18 16:40:17'),
(36, 50, 35, 'Im from Hobiganj, Sylhet', 1, '2018-07-18 16:40:34', '2018-07-18 16:40:35'),
(37, 50, 35, 'U ?', 1, '2018-07-18 16:40:37', '2018-07-18 16:40:38'),
(38, 35, 50, 'U pom Gana ?', 1, '2018-07-19 06:16:33', '2018-07-19 06:16:55'),
(39, 50, 35, 'I m pom Mansister', 1, '2018-07-19 06:17:05', '2018-07-19 06:17:05'),
(40, 60, 50, 'Hy', 1, '2018-07-19 07:31:55', '2018-07-19 07:32:14'),
(41, 50, 60, 'Hello', 1, '2018-07-19 07:32:20', '2018-07-19 07:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `userinfos`
--

CREATE TABLE `userinfos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merital_status` enum('Single','Divorced','Widowed','Separated','Unmarried') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` enum('Islam','Hinduism','Buddhist','Christian','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_level` enum('Registered','Silver','Bronze','Gold','Platinum') COLLATE utf8mb4_unicode_ci DEFAULT 'Registered',
  `annual_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-','Don''t Know') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` enum('Slim','Average','Fat','Any') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drink` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoke` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brothers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisters` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `children` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_tongue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_values` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residential_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_create` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfos`
--

INSERT INTO `userinfos` (`id`, `user_id`, `gender`, `merital_status`, `age`, `religion`, `state`, `about`, `occupation`, `weight`, `height`, `user_level`, `annual_income`, `blood_group`, `body_type`, `date_of_birth`, `drink`, `smoke`, `fathers_occupation`, `mothers_occupation`, `brothers`, `sisters`, `children`, `mother_tongue`, `family_values`, `address`, `division`, `district`, `country`, `residential_status`, `profile_create`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 19, 'male', 'Divorced', '21', 'Islam', NULL, 'csc', 'Advocate', '5', '4ft 5in - 134cm', 'Silver', '10000', 'A+', 'Slim', '2018-06-01', 'No', 'No', NULL, 'Housewife', NULL, NULL, NULL, NULL, NULL, 'csc', 'Dhaka', NULL, 'sc', 'Owner', 'Self', '2018-06-12 14:09:22', '2018-07-20 00:01:18'),
(5, 20, 'male', 'Unmarried', '19', 'Islam', NULL, 'Hello...', 'Government Employee', '55KG', '5ft 8in - 172cm', 'Gold', '300000', 'Don\'t Know', 'Average', '1998-06-20', 'No', 'No', 'Business', 'Housewife', '2', '0', 'No', 'Bangla', 'Religious', 'jhffgdgdgd', 'Khulna', 'Khulna', 'Bangladesh', 'Owner', 'Sibling', '2018-06-22 05:21:26', '2018-07-17 05:58:51'),
(6, 21, 'female', 'Unmarried', '24', 'Islam', NULL, 'Message', 'Accountant', '55KG', '5ft 3in - 160cm', 'Bronze', '200000', 'A+', 'Slim', '1997-04-15', 'No', 'No', 'Retired Person', 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'bajdjjd kdjksjdlk djdujf', 'Sylhet', 'Sylhet', 'Bangladesh', 'Owner', 'Self', '2018-06-26 21:15:09', '2018-07-18 18:36:50'),
(7, 22, 'female', 'Unmarried', '21', 'Islam', NULL, 'I am a good girl', NULL, '50KG', NULL, 'Registered', '100000', 'A+', 'Slim', '1996-02-14', 'No', 'No', 'Banker', 'Housewife', '1', '0', 'No', 'Bangla', 'Traditional', 'kj jgjhf jgjfj\r\nbkjg', 'Barishal', NULL, 'Bangladesh', 'Owner', 'Self', '2018-06-26 22:13:57', '2018-06-28 00:56:21'),
(8, 23, 'female', 'Unmarried', '27', 'Islam', NULL, 'good girl.', NULL, '55KG', '5ft 2in - 157cm', 'Registered', '200000', 'A+', 'Average', '1995-06-20', 'No', 'No', NULL, 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'fghjoij jjiuui', 'Dhaka', 'Dhaka', 'Bangladesh', 'Owner', 'Self', '2018-06-26 22:22:56', '2018-06-26 22:28:08'),
(9, 24, 'female', 'Unmarried', '18', 'Islam', NULL, 'dvvdcvc', NULL, '50KG', '5ft 1in - 154cm', 'Registered', '100000', 'B+', 'Average', '1998-08-29', 'No', 'No', NULL, NULL, '0', '1', 'No', 'Bangla', NULL, 'xcvcxvcvv', 'Chattagram', NULL, 'Bangladesh', 'Owner', 'Self', '2018-06-26 22:31:31', '2018-06-28 00:59:14'),
(10, 25, 'female', 'Unmarried', '26', 'Islam', NULL, 'Message', NULL, '55KG', NULL, 'Registered', '300000', 'AB+', 'Average', '1994-05-15', 'No', 'No', 'Advocate', NULL, '1', '1', 'No', 'Bangla', 'Traditional', 'mnkhjk kjhkkyk', 'Khulna', NULL, 'Bangladesh', 'Rental', 'Self', '2018-06-26 22:40:41', '2018-06-28 01:00:04'),
(11, 26, 'female', 'Unmarried', '22', 'Islam', NULL, 'efddfgfd', 'Designer', '60KG', '5ft 6in - 167cm', 'Registered', '300000', 'B-', 'Average', '1997-10-10', 'No', 'No', 'Accountant', 'Advocate', '1', '1', 'No', 'Bangla', 'Traditional', 'sfdfdvv', 'Mymensingh', 'Mymensingh', 'Bangladesh', 'Owner', 'Self', '2018-06-27 03:12:00', '2018-07-09 19:22:41'),
(12, 27, 'female', 'Unmarried', '29', 'Islam', NULL, 'dfdfdfd', NULL, '50KG', '5ft 2in - 157cm', 'Registered', '200000', 'A-', 'Slim', '1999-01-14', 'No', 'No', NULL, 'Housewife', '2', '1', 'No', 'Bangla', 'Traditional', 'asdsfs', 'Rajshahi', NULL, 'Bangladesh', 'Rental', 'Sibling', '2018-06-27 03:19:57', '2018-06-27 03:24:56'),
(13, 28, 'female', 'Unmarried', '31', 'Islam', NULL, 'dfdffdgfdg', NULL, '55KG', '5ft 3in - 160cm', 'Registered', '150000', 'AB+', 'Average', '1996-07-25', 'No', 'No', NULL, 'Housewife', '1', '1', 'No', 'Bangla', 'Traditional', 'fdfdgfdg', 'Rangpur', NULL, 'Bangladesh', 'Owner', 'Self', '2018-06-27 03:28:53', '2018-06-27 03:33:54'),
(14, 29, 'female', 'Unmarried', '28', 'Hinduism', NULL, 'vfdvcvcv', NULL, '50KG', '5ft - 152cm', 'Registered', '100000', 'B+', 'Slim', '1998-06-20', 'No', 'No', NULL, NULL, '2', '0', 'No', 'Bangla', 'Traditional', 'xcsfvdcv', 'Dhaka', 'Narshingdi', 'Bangladesh', 'Owner', 'Friend', '2018-06-27 17:47:17', '2018-06-27 17:52:01'),
(15, 30, 'female', 'Divorced', '24', 'Hinduism', NULL, 'dfdfdsfs', 'Beautician', '67KG', '5ft 1in - 154cm', 'Registered', '200000', 'A+', 'Average', '1988-03-22', 'No', 'No', 'Retired Person', NULL, '0', '2', 'Yes, Living together', 'Bangla', NULL, 'sdfdsdvc', 'Sylhet', NULL, 'Bangladesh', 'Rental', 'Parent', '2018-06-27 17:56:39', '2018-06-28 01:04:37'),
(16, 31, 'female', 'Unmarried', '21', 'Christian', NULL, 'Message', NULL, '55KG', '5ft 2in - 157cm', 'Registered', '350000', 'AB+', 'Average', '1991-06-15', 'No', 'No', NULL, 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'dfdsf', 'Chattagram', NULL, 'Bangladesh', 'Owner', 'Self', '2018-06-27 18:11:48', '2018-06-28 01:05:17'),
(17, 32, 'female', 'Separated', '27', 'Buddhist', NULL, 'Message', NULL, '60KG', '5ft 1in - 154cm', 'Registered', '250000', 'AB-', 'Average', '1992-02-15', 'No', 'No', 'Advocate', 'Advocate', '2', '1', 'Yes, Living together', 'Bangla', 'Traditional', 'sdsdsd', 'Mymensingh', NULL, 'Bangladesh', 'Owner', 'Self', '2018-06-27 19:01:44', '2018-06-27 19:06:38'),
(18, 33, 'female', 'Unmarried', '19', 'Hinduism', NULL, 'kjkhjkhjkhkj', NULL, '55KG', '5ft 1in - 154cm', 'Silver', '0', NULL, 'Slim', '1998-05-05', 'No', 'No', NULL, 'Banker', '1', '1', 'No', 'Bangla', 'Traditional', 'jgjjj', 'Sylhet', 'Habiganj', 'Bangladesh', 'Owner', 'Sibling', '2018-06-27 23:54:27', '2018-06-28 01:07:39'),
(19, 34, 'female', 'Widowed', '25', 'Islam', NULL, 'sassadas', NULL, '60KG', '5ft 3in - 160cm', 'Registered', '200000', 'A+', 'Average', '1990-06-19', 'No', 'No', 'Architect', 'Housewife', '1', '2', 'Yes, Living together', 'Bangla', 'Moderate', 'sdsda', 'Dhaka', 'Gazipur', 'Bangladesh', 'Owner', 'Self', '2018-06-28 00:07:11', '2018-06-28 00:12:21'),
(20, 35, 'female', 'Divorced', '30', 'Islam', NULL, 'Hello...', 'Executive', '60KG', '5ft 2in - 157cm', 'Platinum', '200000', 'A-', 'Average', '1988-07-20', 'No', 'No', 'Accountant', 'Housewife', '2', '1', 'Yes, Living together', 'Bangla', 'Traditional', 'dsdssd', 'Chattagram', 'Coxs Bazar', 'Bangladesh', 'Owner', 'Self', '2018-06-28 01:11:21', '2018-07-18 16:42:31'),
(21, 36, 'female', 'Unmarried', '23', 'Islam', NULL, 'asdsda', NULL, '55KG', '5ft 1in - 154cm', 'Registered', '0', 'Don\'t Know', 'Average', '1997-01-01', 'No', 'No', NULL, NULL, '1', '1', 'No', 'Bangla', 'Religious', 'sdsdsd', 'Rajshahi', NULL, 'Bangladesh', 'Owner', 'Parent', '2018-06-28 01:16:53', '2018-06-28 01:19:49'),
(22, 37, 'male', 'Divorced', '36', 'Islam', NULL, 'asdsadsad', NULL, '60KG', '5ft 5in - 165cm', 'Registered', '0', 'A+', 'Average', '1991-06-20', 'No', 'No', NULL, 'Housewife', '1', '1', 'No', 'Bangla', 'Traditional', 'asadasd', 'Sylhet', 'Maulvibazar', 'Bangladesh', 'Owner', NULL, '2018-06-28 01:25:09', '2018-06-28 01:28:25'),
(23, 38, 'male', 'Unmarried', '23', 'Islam', NULL, 'asdsadsd', NULL, '55KG', '5ft 5in - 165cm', 'Gold', '400000', 'Don\'t Know', 'Average', '1993-06-25', 'No', 'No', NULL, 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'sdsdasd', 'Dhaka', 'Narshingdi', 'Bangladesh', 'Owner', 'Sibling', '2018-06-28 01:52:38', '2018-06-28 01:56:41'),
(24, 39, 'male', 'Unmarried', '26', 'Islam', NULL, 'Thanks.', NULL, '60KG', '5ft 6in - 167cm', 'Registered', '400000', NULL, 'Average', '1991-12-28', 'No', 'No', NULL, 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'adsadas', 'Dhaka', 'Narshingdi', 'Bangladesh', 'Owner', 'Sibling', '2018-06-28 01:58:58', '2018-07-10 09:15:36'),
(25, 40, 'male', 'Unmarried', '28', 'Islam', NULL, 'Hello...', 'Executive', '60KG', '5ft 6in - 167cm', 'Gold', '200000', 'A+', 'Average', '1990-09-15', 'No', 'No', 'Architect', 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'adasdd', 'Mymensingh', 'Mymensingh', 'Bangladesh', 'Owner', 'Self', '2018-06-28 02:06:48', '2018-07-14 15:12:26'),
(26, 41, 'male', 'Unmarried', '21', 'Islam', NULL, 'asdsadasdas', NULL, '55KG', '5ft 4in - 162cm', 'Registered', '0', 'Don\'t Know', 'Average', '1993-04-18', 'No', 'No', NULL, 'Housewife', '2', '1', 'No', 'Bangla', 'Religious', 'asdsadsa', 'Chattagram', NULL, 'Bangladesh', 'Rental', NULL, '2018-06-28 02:15:15', '2018-06-28 02:18:28'),
(27, 42, 'male', 'Unmarried', NULL, 'Islam', NULL, 'dfgfdgdfg', NULL, '55KG', '5ft 6in - 167cm', 'Registered', '0', 'A+', 'Average', '1994-08-29', 'No', 'No', NULL, 'Housewife', '2', '0', 'No', 'Bangla', 'Religious', 'xcvfdgfdg', 'Sylhet', 'Sunamganj', 'Bangladesh', 'Owner', 'Self', '2018-06-28 03:02:38', '2018-06-28 03:19:30'),
(28, 43, 'male', 'Widowed', NULL, 'Hinduism', NULL, 'asdsaaa', NULL, '67KG', '5ft 6in - 167cm', 'Registered', '200000', 'A+', 'Average', '1990-07-17', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adsadad', 'Barishal', NULL, 'Bangladesh', NULL, 'Sibling', '2018-06-28 03:31:53', '2018-06-28 03:34:42'),
(29, 44, 'male', NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, 'Registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-03 17:53:23', '2018-07-03 17:53:23'),
(30, 45, 'female', 'Divorced', '29', 'Islam', NULL, 'asdsd', 'Sales Professional', '73KG', '5ft 3in - 160cm', 'Registered', '300000', 'AB+', 'Fat', '1989-09-25', 'No', 'No', 'Dentist', 'Advocate', '1', '1', 'No', 'Bangla', 'Traditional', 'adsad', 'Rangpur', 'Nilphamari', 'Bangladesh', 'Owner', NULL, '2018-07-10 16:45:33', '2018-07-10 16:53:42'),
(31, 46, 'male', 'Unmarried', '28', 'Hinduism', NULL, 'jlklkjlkk', 'Business', '78KG', '5ft 9in - 175cm', 'Registered', '500000', NULL, 'Fat', '1990-05-20', 'No', 'No', 'Retired Person', 'Housewife', '3', '2', 'No', 'Bangla', 'Traditional', 'jhgjj', 'Sylhet', 'Sunamganj', 'Bangladesh', 'Owner', 'Sibling', '2018-07-12 17:26:01', '2018-07-12 17:31:53'),
(32, 47, 'male', 'Separated', '29', 'Christian', NULL, 'Hello', 'Psychologist', '70KG', '5ft 7in - 170cm', 'Registered', '300000', 'AB+', 'Average', '1989-04-14', 'No', 'Yes', 'Government Employee', 'Government Employee', '1', '1', 'No', 'Bangla', 'Traditional', 'asdsadsa', 'Dhaka', 'Gopalganj', 'Bangladesh', 'Owner', 'Parent', '2018-07-13 16:29:42', '2018-07-13 16:38:48'),
(33, 48, 'male', 'Unmarried', '24', 'Islam', NULL, 'Hello', 'Business', '65KG', '5ft 6in - 167cm', 'Registered', '500000', 'B+', 'Average', '1994-09-22', 'No', 'No', 'Other', 'Housewife', '1', '4', 'No', 'Bangla', 'Religious', 'asdada', 'Sylhet', 'Sunamganj', 'Bangladesh', 'Owner', 'Friend', '2018-07-13 16:43:06', '2018-07-13 16:48:34'),
(34, 49, 'male', 'Unmarried', '28', 'Islam', NULL, 'Hello', 'Business', '67KG', '5ft 6in - 167cm', 'Registered', '400000', 'AB+', 'Average', '1990-08-25', 'No', 'No', 'Retired Person', 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'add', 'Chattagram', 'Brahmanbaria', 'Bangladesh', 'Owner', 'Self', '2018-07-13 16:52:12', '2018-07-13 16:57:36'),
(35, 50, 'male', 'Unmarried', '24', 'Islam', NULL, 'Hello', 'Merchandiser', '70KG', '5ft 7in - 170cm', 'Gold', '300000', 'O+', 'Fat', '1994-09-20', 'No', 'No', 'Business', 'Housewife', '2', '1', 'No', 'Bangla', 'Religious', 'sdd', 'Sylhet', 'Habiganj', 'Bangladesh', 'Owner', 'Self', '2018-07-14 07:39:43', '2018-07-18 16:36:46'),
(36, 51, 'male', 'Unmarried', '23', 'Hinduism', NULL, 'Hello', 'Doctor', '55KG', '5ft 4in - 162cm', 'Registered', '500000', 'B-', 'Average', '1995-06-20', 'No', 'No', 'Business', 'Housewife', '1', '1', 'No', 'Bangla', 'Traditional', 'dsdad', 'Sylhet', 'Maulvibazar', 'Bangladesh', 'Owner', 'Sibling', '2018-07-14 07:51:30', '2018-07-14 07:55:29'),
(37, 52, 'male', 'Unmarried', '25', 'Islam', NULL, 'Hello...', 'Teacher', '67KG', '5ft 5in - 165cm', 'Registered', '200000', 'O-', 'Average', '1993-07-25', 'No', 'No', 'Other', 'Housewife', '3', '2', 'No', 'Bangla', 'Religious', 'adsa', 'Barishal', 'Barishal', 'Bangladesh', 'Owner', 'Self', '2018-07-14 07:58:28', '2018-07-14 08:02:10'),
(38, 53, 'male', 'Unmarried', '24', 'Hinduism', NULL, 'Hello...', 'Engineer', '70KG', '5ft 7in - 170cm', 'Registered', '300000', 'O+', 'Average', '1994-06-27', 'No', 'No', 'Teacher', 'Government Employee', '2', '0', 'No', 'Bangla', 'Religious', 'drrrtrt', 'Sylhet', 'Sunamganj', 'Bangladesh', 'Owner', 'Friend', '2018-07-14 08:08:18', '2018-07-14 08:16:51'),
(39, 54, 'male', 'Unmarried', '26', 'Hinduism', NULL, 'Hello...', 'Business', '67KG', '5ft 5in - 165cm', 'Registered', '400000', 'A-', 'Average', '1992-05-25', 'No', 'Yes', 'Business', 'Housewife', '2', '2', 'No', 'Bangla', 'Traditional', 'sdsad', 'Khulna', 'Bagerhat', 'Bangladesh', 'Owner', NULL, '2018-07-14 08:28:00', '2018-07-14 08:31:34'),
(40, 55, 'male', 'Unmarried', '29', 'Hinduism', NULL, 'Hello...', 'Business', '70KG', '5ft 6in - 167cm', 'Registered', '300000', 'A+', 'Average', '1989-06-25', 'No', 'No', 'No Job', 'Housewife', '2', '2', 'No', 'Bangla', 'Traditional', 'asddad', 'Rangpur', 'Dinajpur', 'Bangladesh', 'Owner', 'Sibling', '2018-07-14 15:17:44', '2018-07-14 15:25:57'),
(41, 56, 'male', 'Unmarried', '26', 'Islam', NULL, 'Hello...', 'Accountant', '70KG', '5ft 8in - 172cm', 'Registered', '350000', 'O+', 'Average', '1992-11-02', 'No', 'No', 'Business', 'Housewife', '2', '0', 'No', 'Bangla', 'Traditional', 'sada', 'Sylhet', 'Sunamganj', 'Bangladesh', 'Owner', 'Friend', '2018-07-14 16:17:37', '2018-07-14 16:23:07'),
(42, 57, 'female', 'Unmarried', '24', 'Islam', NULL, 'Hello...', 'Banker', '67KG', '5ft 5in - 165cm', 'Registered', '350000', 'AB+', 'Average', '1994-05-05', 'No', 'No', 'Business', 'Housewife', '1', '1', 'No', 'Bangla', 'Religious', 'dadad', 'Sylhet', 'Sylhet', 'Bangladesh', 'Owner', 'Self', '2018-07-18 16:08:41', '2018-07-18 16:16:50'),
(43, 58, 'female', 'Unmarried', '23', 'Islam', NULL, 'Hello...', 'Customer Support Professional', '65KG', '5ft 4in - 162cm', 'Registered', '200000', 'B-', 'Average', '1995-08-29', 'No', 'No', 'Accountant', 'Advocate', '2', '1', 'No', 'Bangla', 'Traditional', 'sdsa', 'Sylhet', 'Maulvibazar', 'Bangladesh', 'Owner', 'Sibling', '2018-07-18 16:18:12', '2018-07-18 16:27:14'),
(44, 59, 'male', 'Divorced', '70', 'Islam', NULL, 'I am a popular Bangladeshi Film and TV actor. He is also a writer, civil engineer.', 'Engineer', '60KG', '5ft 6in - 167cm', 'Platinum', '500000', 'AB+', 'Average', '1948-09-07', 'No', 'No', 'Business', 'Housewife', '1', '1', 'Yes, Living together', 'Bangla', 'Traditional', 'Address', 'Dhaka', 'Dhaka', 'Bangladesh', 'Owner', 'Self', '2018-07-18 17:58:05', '2018-07-18 18:24:37'),
(45, 60, 'male', NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, 'Platinum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-19 07:19:27', '2018-07-19 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_type` enum('Public','Private') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Public',
  `profile_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `seen` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_type`, `profile_id`, `name`, `email`, `image`, `phone`, `token`, `verified`, `status`, `seen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Public', '131', 'Tawfiquzzaman Opu', 'opu.cse32@gmail.com', NULL, NULL, NULL, '0', '1', '1', '$2y$10$4YrR8vTB/pZU40dwKI0xjuw1KB3gsXoFXC28Vd/DfQ5GpLleqajla', 'KmfOxrpro2zvPlxDbRWtf56NzZTuY1E6nztZZ4Wb1mYlaENxDYQqsIBkAS3o', '2018-04-27 04:58:17', '2018-07-14 10:36:47'),
(2, 'Public', '4141', 'Tasnim Suma', 'kakalisuma22@gmail.com', NULL, NULL, NULL, '0', '0', '1', '$2y$10$8Q6Fq4.bbbpg3FC6bLMFSOmaGIwsbLB7mrv2EYJTleyXGKKnYdb6K', 'FTxQszvJfp0FabpeYiETRTa1Y6shAqC4uTjL6iweQq6StOA2Om99kMr67CLe', '2018-04-27 08:05:22', '2018-04-27 08:05:22'),
(19, 'Private', '765', 'Mahbub', 'mahbub.shuvo10@gmail.com', 'Profile\\imageedit_2_7813962239.jpg', '123456789', NULL, '1', '1', '0', '$2y$10$B33H.qYkRACtCmwWiD1fuOmOaH8I1OQ0jE22eX7xgyP3Gt6kEYXpG', 'n9PxsyVzDJ91GJ2J1uld64TfvldwA5Jqm2Yr1tPCTJ1Ze2UH73w6nTTy6DC8', '2018-06-12 14:09:22', '2018-07-20 05:01:58'),
(20, 'Public', '766', 'Tuhin Reza Rifat', 'Gibea1986@fleckens.hu', 'Profile\\27983514_192446751512685_3109124212112134947_o.jpg', '01738811869', NULL, '1', '1', '0', '$2y$10$7bippZanvEqdT3qyMRpSee.JHJWU/x0zeiLcf5Za4j2tDbQrUp9lq', 'tQXZwluFMpSgwVLgj5HB637lesVqaTLz3qI3XzkfgAntWoeyMTGdmVvkceSi', '2018-06-22 05:21:25', '2018-07-14 08:35:13'),
(21, 'Public', '767', 'Tamanna Rahman', 'Whatife1958@teleworm.us', 'Profile\\21.png', '01912136035', NULL, '1', '1', '0', '$2y$10$u8RFfCqU6eiQrAIc9tJgQebxBztzQ.2Is77WkUK6o4UBrXyW7ObwG', 'Le6mKU4iaGzzmIF3FoNXtvSIXwb6Di2MiFmZWtj165rkQnmEQLlpBnPPwDXE', '2018-06-26 21:15:09', '2018-06-28 00:57:22'),
(22, 'Public', '768', 'Tasnuva Promi', 'Eashe1942@superrito.com', 'Profile\\22.jpg', '01921122334', NULL, '1', '1', '0', '$2y$10$XNEVGgC54j6AQ5ebnN9Z3enhNTK220N1utmhGYIvyOLjzXHMBgA9K', 'GtNzYpvXrKW9jlZqzwE839ANzfhNi0wQ9ws6jWh6LewkpdlYYWaimfy36sxQ', '2018-06-26 22:13:57', '2018-06-28 00:56:21'),
(23, 'Public', '769', 'Sinthia Aishy', 'Thesen27@rhyta.com', 'Profile\\23.jpg', '01723456543', NULL, '1', '1', '0', '$2y$10$JJ7nUa3U.CxQpRLGNzXlCO2wH17YCEaFW1yumXqjq1HIl.FDTUJTO', 'NzfBw1R60d8QUMXdZIpmEYi4LtriMqHlnQJbQFx3bnMTrYEB6rySrvPlEPpk', '2018-06-26 22:22:56', '2018-06-28 00:58:30'),
(24, 'Public', '770', 'Fabiha Upoma', 'Whimor1963@jourrapide.com', 'Profile\\24.png', '01821129890', NULL, '1', '1', '0', '$2y$10$ojhKtVhJxSb9LCESMCbjV.7yOKgOmiNnHBLOkj5IFxavXfoqjNy1m', 'vCOo08R2uCGxkilo9sfg08WVdm9wNHs0V86mYotYVWOmBuKPVGpLvxhEVnVT', '2018-06-26 22:31:31', '2018-06-28 00:59:14'),
(25, 'Public', '771', 'Fahmina Rahman Munmun', 'Butc1947@jourrapide.com', 'Profile\\25.png', '01632457656', NULL, '1', '1', '0', '$2y$10$CY8q1KBXkNBX2XBsoR6JOeIfxOsZGQjDRB805W9Yj9HixdRxWKTZ2', 'rJaOmcTK0GTuwpvKZhu5gZH9az722TyA1Fug9v6Fab6yzOWqQvCsTpsYEs0a', '2018-06-26 22:40:41', '2018-06-28 01:00:04'),
(26, 'Public', '772', 'Zareen Tasnim Prapti', 'Kinary1959@einrot.com', 'Profile\\26.jpg', '01678324098', NULL, '1', '1', '0', '$2y$10$6MGboNQwl/oIkotjwFMPLuZsk0yPRNmqG3iXh1xJBgGUv6gXyqhAi', '2HRKPp8fBLfbBAtnhMX3HWfTtyq5AvWTP29tGXYBXJJQ3YSAn67fpnkaPA8y', '2018-06-27 03:12:00', '2018-06-28 01:01:05'),
(27, 'Public', '774', 'Rubi Chowdhury', 'Untes1972@rhyta.com', 'Profile\\27.png', '01770789979', NULL, '1', '1', '0', '$2y$10$.VolKF9ylWDu0iyELwQcz.7gPfRiIFmQL7l4Hy0EUBJv99FtuLV0G', 'OIMnVknS92z9cWi2BwkttVYROZBZZyyx24dCBnAagWtzEWln7rtSY0XjdnqV', '2018-06-27 03:19:56', '2018-06-28 01:01:56'),
(28, 'Public', '775', 'Samiha Tahsin', 'Actum1979@einrot.com', 'Profile\\28.png', '01725346788', NULL, '1', '1', '0', '$2y$10$mjaJDY0gcHRQvtFke4TPoui/oIxDzHNqB8aGqrLZLxNRsaTG6/KOi', '6JB3vrSjLsNGe8rb25pbxuXbYQkiHoZluL9zXHjNLl4wNGHJphB6CsMoqvYn', '2018-06-27 03:28:53', '2018-06-28 01:02:47'),
(29, 'Public', '777', 'Ankita Datta', 'Geon1965@einrot.com', 'Profile\\29.jpg', '01734542354', NULL, '1', '1', '0', '$2y$10$d7ac11TU.Wrymf6vE7R8nu6Z8q.IO/JHpH6NzsllnvR.RGUzyaxT6', 'Cx97mpAQsYEI2TozVFUDoadbTBUKRw5CLLEy8XUl6qa1kHSfKgX6DSspTySR', '2018-06-27 17:47:17', '2018-06-28 01:03:35'),
(30, 'Public', '778', 'Nobonita Barman', 'Royague32@einrot.com', 'Profile\\30.jpg', '01612907898', NULL, '1', '1', '0', '$2y$10$Rnyet4sD23EdcmhiYLdjaef3y4Np3W1NDQh79cZ12EdmJ7HxqS07.', 'ZJMPhsIxNBuXceLTN6rGzZodUXlpONdMTLIbVTbgcfotgIsa5ftpcue33wrs', '2018-06-27 17:56:39', '2018-06-28 01:04:37'),
(31, 'Public', '779', 'Monika D\'Costa', 'Oplace63@teleworm.us', 'Profile\\31.jpg', '01932345465', NULL, '1', '1', '0', '$2y$10$5.QGJYVSO9sr3Cbnnury9uAOMZf.U4Mfv8iLPyFeL.94avHr7qega', 'LoeyGmSWSVPgVGEiuoJ9HURT4FuOv1qeNnkXo0Dtv0rI6l3L72NPFxNYAWdJ', '2018-06-27 18:11:48', '2018-06-28 01:05:17'),
(32, 'Public', '870', 'Janeefar Thapa', 'Nosty1963@armyspy.com', 'Profile\\32.jpg', '01956231545', NULL, '1', '1', '0', '$2y$10$8G9pTUh8J1mLMG3SvsF4F.v5gDxNTpYKpZB.ypV.n4/lO7/C415hK', 'cUpb4kZeFiJU5a01sXw8fdxYjgDbN28GTriCg7bCzAWv8KqZ15uNVmiAQGLW', '2018-06-27 19:01:44', '2018-06-28 01:06:14'),
(33, 'Public', '667', 'Lucky Talukder', 'Indesur@superrito.com', 'Profile\\33.jpg', '01772255001', NULL, '1', '1', '0', '$2y$10$QnHS4o6NxKgTrXcBnl79TeQHPS7xC6pquhIdmk2pv6mjGqmrQlxCG', 'YSGYgpeZYDDV75d2Trt9YFzJNEVdOgARwR7rAoWqNcDI6hYT1jng9Yk56fum', '2018-06-27 23:54:27', '2018-06-28 01:07:39'),
(34, 'Public', '668', 'Nishat Tanjum Roxy', 'Yonge1989@superrito.com', 'Profile\\34.jpg', '01725426353', NULL, '1', '1', '0', '$2y$10$uFgjN.9g6WaKTqkQIie8U.Qss3sjTJSyz3qJCoFT2wd2tSWamIa6y', 'ab2lig3a1a2un9RnQK92XDZwWWhFPcyuJZB7RJLz8q6z2fQNzJaa3O5ZKbM5', '2018-06-28 00:07:11', '2018-06-28 00:12:21'),
(35, 'Public', '6699', 'Nusrat Farzana', 'Contiong1987@einrot.com', 'Profile\\35.jpg', '01812346545', NULL, '1', '1', '0', '$2y$10$WQkW29KQVsyd97dYmcNdK./q8DsLr6krcSohCkmxKsW3.Kbw07GG.', 'eoINJ1wN1w9EQugTnA9WkRDxPobrfhcrWCiAlq5sQnAO6UjPr0eyncEl4djF', '2018-06-28 01:11:21', '2018-06-28 01:13:55'),
(36, 'Public', '1121', 'Tahmina Tammu', 'Shap1993@cuvox.de', 'Profile\\36.jpg', '01521625243', NULL, '1', '1', '0', '$2y$10$NmtlNw5x.ihiXYrg4I.Coe.FVU4zk9Vi9jVZI5gW9Mc98BYEXN.my', 'VszN9Z6nsNnfUoEakgPwemYQz7CZcyqH7ZNFPsf0lrV0zEzPuTYfj5d8W8aQ', '2018-06-28 01:16:53', '2018-06-28 01:19:49'),
(37, 'Public', '7654', 'Nayeem Haque', 'Capt1976@superrito.com', 'Profile\\37.jpg', '01976234532', NULL, '1', '1', '0', '$2y$10$4PazFqTPtGYs3LBRS2/wUOxBB5xKnZMKJcTcK6EsjgLScPBMOO/gC', 'ojNBYXfOjaUQM0kk47se9D3UAauinNEiUrK9ZlbpD4QcQWiMpU0FGWBepf5j', '2018-06-28 01:25:09', '2018-06-28 01:28:25'),
(38, 'Public', '5555', 'Munshi Fahim Sadi', 'Spown1947@rhyta.com', 'Profile\\38.jpg', '01672462268', NULL, '1', '1', '1', '$2y$10$XyWpApWCFqmg0k0pTrNIjeX.yIqPXUKaFqPFj/siaE.KMpYTiPvyS', 'jNjUGQ31qy5rb4XDCTbxzT1QO0XEf79Wz2J2zzoxKnp5jR0I8zyByNPGh9ep', '2018-06-28 01:52:38', '2018-06-30 10:16:47'),
(39, 'Public', '121', 'Akhlak Uzzaman Ashik', 'Ditach1990@gustr.com', 'Profile\\39.jpg', '01721234132', NULL, '1', '1', '0', '$2y$10$Stg0OgOiGaupL0Tx3rZSTeOnn4L/U4cGzv4TRvjzIHRJ/IW2Q5G9q', 'DNWjfH8pf3HwAk7ZVuDlxmGceZzuLCwID8eL6AdiVCkhFJXjHocr2JLujHlU', '2018-06-28 01:58:57', '2018-06-28 02:02:09'),
(40, 'Public', '7778', 'Pavel Mahmud', 'Lottly1932@einrot.com', 'Profile\\14.jpg', '01675234565', NULL, '1', '1', '0', '$2y$10$HeYAwlf0rBzIsDH.r0Cg6.dC0Nmy9TxcFlNOiSiiSS3pPMiqxnLOq', 'bSCygM2ygnmrhhTeO0cKMPzT47NV9sUlTOUkewnWtiPAv4PdXALOurZpNo7j', '2018-06-28 02:06:48', '2018-07-14 15:12:26'),
(41, 'Public', '8999', 'Ashraf Hossan Shovo', 'Stioneve33@cuvox.de', 'Profile\\41.JPG', '01744879817', NULL, '1', '1', '0', '$2y$10$AlGvIv8xSruBcaN2yxRLs.Ii27i.qU/4AmquRKyFXBQChFJS0GvUi', 'ibrDVcdNv47Nre3qarCy7JZ7TXCrk9PBGoGIolRfWVrqJDUxlWHEvvwxdeEr', '2018-06-28 02:15:15', '2018-06-28 02:18:27'),
(42, 'Public', '', 'Tawfiquzzaman Opu', 'opu.cse32@gmail.com', 'Profile\\42.jpg', '01714252870', NULL, '1', '1', '1', '$2y$10$6e9wosfzj2R3K1SGkyWHgOAXeNEg2uMqUtHu8T1nsYG60dU00OvPS', 'hoGW3tM2F5Nxi0wcxKjSRvYcze2TqmfpATyow2BiBZGaYtbVnuzrY83svEmO', '2018-06-28 03:02:38', '2018-06-30 10:16:39'),
(43, 'Public', '', 'Amitav Devnath', 'Manis1931@armyspy.com', 'Profile\\43.JPG', '01993309878', NULL, '1', '1', '1', '$2y$10$madTMsfnJ6FBwWxs8lBVZ.l6zs32wADLaFpGvj7vzg6FkEf9F/4Ki', 'LpxhThETPV1S68WpcRPwRx20QOrWNkDmd0mjfMBfQPDQIkotccqgp0OXauja', '2018-06-28 03:31:53', '2018-07-14 17:18:55'),
(44, 'Public', 'Y0mZLHfgKz', 'mahbub', 'mahbub.rahman180@gmail.com', 'img/male.png', '01777777777', '2PCKGP65CR', '0', '1', '0', '$2y$10$mqyji96fodB5kWDEWApFwunbssytrO5mTQhFmrk4KLE40cNoITB3u', NULL, '2018-07-03 17:53:22', '2018-07-03 17:53:22'),
(45, 'Public', 'k6VO3SB1aO', 'Sabiha Sultana Muna', 'Ovelf1950@teleworm.us', 'Profile\\sabiha-sultana 21.jpg', '01743256789', NULL, '1', '1', '0', '$2y$10$kw8.Ku6e1dN/wm2jx1mBAuvGtIPKx2BMFnn0GGlFfnfEOvxMNwEYa', 'mZfNKk6vVQ7kZdVcsl6qfubChcJx7MJHcFlZKM1ETbecVvp6zMCrKn0JZvCR', '2018-07-10 16:45:33', '2018-07-10 16:53:42'),
(46, 'Public', 'EZy7Z72LnE', 'Biplab Kanti Das', 'Sonce1929@armyspy.com', 'Profile\\12466216_1040788709318787_8001500303639154203_o.jpg', '01719190743', NULL, '1', '1', '0', '$2y$10$cXoGvvCz2O888m4yFKGXkepWYV/yGiCgdDAw2P0T9m31T5EawDPOG', '9b1mIb27CPTalEBWmbH1970oLLHyjA6BrGuUVopiLaj5aDr6mXLOd31v9ufJ', '2018-07-12 17:26:01', '2018-07-12 17:31:53'),
(47, 'Public', 'FiKF2f2y5p', 'Evan Rozario', 'Messled1970@einrot.com', 'Profile\\15420765_1258462167553235_7372718733570838271_n.jpg', '01876543456', NULL, '1', '1', '0', '$2y$10$DvSGqqYGhOsh5hGhPGnWo.ZOfIf2bR8YDmBTfUCSwZ3SOlbcMTVp6', 'uFBTbeUTrrGIhGyBjg04tcL3mg6Iu6KMBBSS8pERrajfXWB9YBRj71bZxhEz', '2018-07-13 16:29:42', '2018-07-13 16:38:48'),
(48, 'Public', 'VuSk3Chg9B', 'Avy Abir', 'Fille1990@superrito.com', 'Profile\\27356421_1353949568049954_386044709346677156_o.jpg', '01717092910', NULL, '1', '1', '0', '$2y$10$D1PvIvYKzeiezXTni52xj.wbC9Mni5DsCrLzZudwS5xJp.xuaDeiS', 'oPQt7Gn4qrrMOl82os4uRKiprSV7gNSe6VFqMfMmKwJEcqTWPpzHN6VHZhfJ', '2018-07-13 16:43:06', '2018-07-13 16:48:34'),
(49, 'Public', 'VwExh26pR2', 'Anwar Hossen', 'Wilthe1931@superrito.com', 'Profile\\15220143_10209698150908914_1728863387653249534_n.jpg', '01543667545', NULL, '1', '1', '0', '$2y$10$Wihme3F06FXwkkaZQmJ2G.Wy0XkJ/dzPsx1/j8mjXU50b3PeAUSOa', 'TMJxQHiUkiRUkas7kY6UGVNNxVd8oTadaMLcsqHYfWus5izWK8533DmSbVy4', '2018-07-13 16:52:11', '2018-07-13 16:57:36'),
(50, 'Public', 'ar2S571dHd', 'Emdadul Haque', 'Shous1930@jourrapide.com', 'Profile\\17390536_1203255716440054_2690064348676130786_o.jpg', '01718283259', NULL, '1', '1', '0', '$2y$10$jSBgpt5GGpXlQ2zj1O1S3e3VwSqId7Dr5cP1OqSPWbYbdMV17ky4a', '6i5BqBohF9wEyEarev7tWsPpe1mvBaMCybWIggYl7zk1Sx0r4HZyeMYTRacI', '2018-07-14 07:39:43', '2018-07-18 16:45:00'),
(51, 'Public', 'CJYFZCmnEu', 'Shoumik Das Dip', 'Hirtire91@superrito.com', 'Profile\\16195826_2229944070565147_2078032733907268970_n.jpg', '01654789645', NULL, '1', '1', '0', '$2y$10$CxMfJw5t307/mj0nqsLl3OLJJyiwf7nc2tNc1IxZCDj41fhG4Ktvi', 'RSQlgmizvkr7hjIyc8bHXIPyU8UFb32D5g3lqP3SOPQ9KyCcOwTfKyllMZ3r', '2018-07-14 07:51:30', '2018-07-14 07:55:29'),
(52, 'Public', 'eDRBZIiRq3', 'Anamul Haque Bijoy', 'Undidesix1949@gustr.com', 'Profile\\25394842_1244465892321037_6752774847782718349_o.jpg', '01746733769', NULL, '1', '1', '0', '$2y$10$kv.KNd0mUlH.Xhqp8HCuu.IdBQFpQWeFiiaUulS8s6qeCOqKzf7L.', 'a6iNLg5g0lp24enjvrowOsyCqhjp1e5ymbGrQAOIcdN6XcZVTrAIKh80DmRB', '2018-07-14 07:58:28', '2018-07-14 08:02:09'),
(53, 'Public', 'XTyie9eLXg', 'Kongkon Purkayestha', 'Ofeen1965@armyspy.com', 'Profile\\33524973_1577344109051330_2856718568320401408_o.jpg', '01764279381', NULL, '1', '1', '0', '$2y$10$WVHgx.xFAPOuRJRe03mvVuCmAZATFhtffAzhXjx3ZYPTCB3.sz6N6', 'nsCCCykne2wsWJj31NvH8seIsBveb0vG88jZvDgdiVwVyJjLfqHQZBDi30Ah', '2018-07-14 08:08:18', '2018-07-14 08:16:51'),
(54, 'Public', 'aQ0KV3vPQy', 'Sumon Datta', 'Usety1938@cuvox.de', 'Profile\\29542479_1602477729872768_2767784011598650700_n.jpg', '01654349876', NULL, '1', '1', '0', '$2y$10$qlu8Gh0vAL/lKl8HXqgx7e9wc8feGKAQn76JZhXHxeRz/WuL/rTUi', '16lEMNXtTc55kRWMOm7GhhhxEmkIgLQyC5tZhovwCAyBlFup10Nqz3Kb6CTT', '2018-07-14 08:28:00', '2018-07-14 08:31:34'),
(55, 'Public', 'fjAOPylt6U', 'Anup Dev', 'Mith1985@jourrapide.com', 'Profile\\1928747_1133234616710338_1049837213023368304_n.jpg', '01765897654', NULL, '1', '1', '1', '$2y$10$/sNza8vl.cEywnn4XG1qW.fK/VuIfFtYrDfZwH1jnqZA90xU1MzvS', 'kR7FejKiMuFTMofoYWPNVfxoFfJyopdMGA4VpnEAA3WfqTD2ZeRjf0mBMZkZ', '2018-07-14 15:17:44', '2018-07-17 10:30:49'),
(56, 'Public', 'ly6JqHy3T2', 'Nawroz Morshed Evan', 'Faceink75@superrito.com', 'Profile\\36882690_1776602759043366_6015762367097339904_o.jpg', '01710933069', NULL, '1', '1', '1', '$2y$10$XaQ874VOklkp9Z6oVfsHWenaiyv6wUi3MLOu827xtLzqn1GHCtxt2', 'KZdkkAGzqspIFbEX6FGIMwPGCm81jUGenVFmDBgXl5UI5MMiEpuqTrYlIbxx', '2018-07-14 16:17:37', '2018-07-14 17:19:01'),
(57, 'Public', 'BHmI1JUq5d', 'Nilanjona Neela', 'Mond1974@superrito.com', 'Profile\\6.jpg', '01654347834', NULL, '1', '1', '0', '$2y$10$unOX/4X/CRPWxiltktXymOxom1I6gRxvwYcylgwMdfVowvfmroN6W', 'iuFI1CmF0lMPf5IxhY91uHXUH7h3lOOmhgodUjGEGhhhWstTygDJ2jevqj19', '2018-07-18 16:08:41', '2018-07-18 16:16:50'),
(58, 'Public', 'Gx4P6mjC7A', 'Tamanna Tanjila Lisa', 'Whoss1978@einrot.com', 'Profile\\5.jpg', '01765438965', NULL, '1', '1', '0', '$2y$10$DEWhIX54DX2g5xXv0TDdauJHh.vqLNcZTk3xHShremyHYVI1jQSmS', 'y7eaaeJb19elcjP0a7WXLyhUWO0g2LoVpfJrRZKCoZDiFOGiRGZJag9uaDg5', '2018-07-18 16:18:11', '2018-07-18 16:27:14'),
(59, 'Public', 'ONa27Y88cl', 'Abul Hayat', 'Awassome34@superrito.com', 'Profile\\Abul-Hayat-2.gif', '01767897645', NULL, '1', '1', '0', '$2y$10$nOHetuY35/szEC0FHPQiu.9y0EZt4Lv.8fIN0FDq2ftN1/SSC03/6', 'EYeSbWDwO4CSz9Ph56xhA1GBCrFFA9A7E80ES1r1l1nPiMURuG9Uol4WeZ0J', '2018-07-18 17:58:05', '2018-07-18 18:20:09'),
(60, 'Public', 'I95xZeME0w', 'Ashraf Hossan', 'Reast1931@dayrep.com', 'img/male.png', '01765678765', NULL, '1', '1', '0', '$2y$10$STYJkJln8fKdqiaXD.hefet.IFqmWGwj./Ufw3afwkgNPP3an720W', NULL, '2018-07-19 07:19:27', '2018-07-19 07:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `visitlogs`
--

CREATE TABLE `visitlogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitlogs`
--

INSERT INTO `visitlogs` (`id`, `ip`, `browser`, `os`, `user_id`, `user_name`, `country_code`, `country_name`, `region_name`, `city`, `zip_code`, `time_zone`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Firefox (61.0)', 'Windows', '0', 'Guest', '', '', '', '', '', '', '0', '0', '2018-06-30 10:03:08', '2018-07-20 05:09:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmessages`
--
ALTER TABLE `adminmessages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminmessages_user_id_foreign` (`user_id`),
  ADD KEY `adminmessages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `blocklists`
--
ALTER TABLE `blocklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_user_id_foreign` (`user_id`);

--
-- Indexes for table `guestmessages`
--
ALTER TABLE `guestmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_user_id_foreign` (`user_id`);

--
-- Indexes for table `membershiplevels`
--
ALTER TABLE `membershiplevels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_user_id_foreign` (`user_id`),
  ADD KEY `membershiplevel_id` (`membershiplevel_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilevisitors`
--
ALTER TABLE `profilevisitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profilevisitors_user_id_foreign` (`user_id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userchats`
--
ALTER TABLE `userchats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfos`
--
ALTER TABLE `userinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userinfos_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitlogs`
--
ALTER TABLE `visitlogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmessages`
--
ALTER TABLE `adminmessages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blocklists`
--
ALTER TABLE `blocklists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `guestmessages`
--
ALTER TABLE `guestmessages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membershiplevels`
--
ALTER TABLE `membershiplevels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profilevisitors`
--
ALTER TABLE `profilevisitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userchats`
--
ALTER TABLE `userchats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `userinfos`
--
ALTER TABLE `userinfos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `visitlogs`
--
ALTER TABLE `visitlogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmessages`
--
ALTER TABLE `adminmessages`
  ADD CONSTRAINT `adminmessages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adminmessages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blocklists`
--
ALTER TABLE `blocklists`
  ADD CONSTRAINT `blocklists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`membershiplevel_id`) REFERENCES `membershiplevels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profilevisitors`
--
ALTER TABLE `profilevisitors`
  ADD CONSTRAINT `profilevisitors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `userinfos`
--
ALTER TABLE `userinfos`
  ADD CONSTRAINT `userinfos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
