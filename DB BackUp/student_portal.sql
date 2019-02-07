-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 07:27 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departmentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`, `departmentName`, `departmentCode`) VALUES
(1, '2018-09-13 13:58:06', '2018-09-13 13:58:06', 'dept 1', 'dept 1'),
(2, '2018-09-13 13:58:24', '2018-09-13 13:58:40', 'dept 2', 'dept 2');

-- --------------------------------------------------------

--
-- Table structure for table `department_announcements`
--

CREATE TABLE `department_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_announcements`
--

INSERT INTO `department_announcements` (`id`, `created_at`, `updated_at`, `department_id`, `title`, `description`, `file`) VALUES
(1, '2018-09-19 16:03:39', '2018-09-19 16:03:39', 1, 'dept 1 announcement 1', '<b>dept 1</b> announcement <b>1</b>', NULL),
(2, '2018-09-19 16:03:39', '2018-09-19 16:03:39', 1, 'dept 1 announcement 2', '<b>dept 1</b> announcement <b>2</b>', NULL),
(3, '2018-09-15 16:03:39', '2018-09-17 16:03:39', 1, 'dept 1 announcement 3', '<b>dept 1</b> announcement <b>3</b>', NULL),
(4, '2018-09-15 16:03:39', '2018-09-17 16:03:39', 2, 'dept 2 announcement 1', '<b>dept 2</b> announcement <b>1</b>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_type` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_type` int(11) NOT NULL,
  `message_type` int(11) NOT NULL,
  `replied_to_message_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_status` int(11) NOT NULL DEFAULT '0',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
(3, '2018_07_06_064903_create_departments_table', 1),
(4, '2018_07_06_065012_create_societies_table', 1),
(5, '2018_07_06_065925_create_departmentAnnouncements_table', 1),
(6, '2018_07_06_070344_create_societies_users_table', 1),
(7, '2019_07_06_065935_create_SocietyAnnouncements_table', 1),
(8, '2018_07_14_113256_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `society_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `societyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societyCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `created_at`, `updated_at`, `societyName`, `societyCode`) VALUES
(1, '2018-09-13 14:06:21', '2018-09-13 14:06:21', 'soc 1', 'soc 1'),
(2, '2018-09-13 14:06:34', '2018-09-13 14:06:34', 'soc 2', 'soc 2'),
(3, '2019-01-04 06:20:28', '2019-01-04 06:20:28', 'cc', 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `society_announcements`
--

CREATE TABLE `society_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `society_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `society_announcements`
--

INSERT INTO `society_announcements` (`id`, `created_at`, `updated_at`, `society_id`, `title`, `description`, `file`) VALUES
(1, '2018-09-12 19:00:00', '2018-09-18 19:00:00', 1, 'soc 1 announcement 1', 'soc 1 announcement 1', NULL),
(2, '2018-09-18 19:00:00', '2018-09-18 19:00:00', 1, 'soc 1 announcement 2', 'soc 1 announcement 2', NULL),
(3, '2018-09-18 19:00:00', '2018-09-18 19:00:00', 2, 'soc 2 announcement 1', 'soc 2 announcement 1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `society_user`
--

CREATE TABLE `society_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `society_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `society_user`
--

INSERT INTO `society_user` (`id`, `user_id`, `society_id`, `created_at`, `updated_at`) VALUES
(1, '4', '1', '2018-09-13 14:07:51', '2018-09-13 14:07:51'),
(2, '5', '2', '2018-09-13 14:08:27', '2018-09-13 14:08:27'),
(8, '6', '2', '2018-09-19 14:07:37', '2018-09-19 14:07:37'),
(9, '8', '3', '2019-01-04 06:25:14', '2019-01-04 06:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` int(11) NOT NULL,
  `registration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `society_id`, `name`, `userType`, `registration`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, NULL, NULL, 'Super Admin', 0, '', 'superadmin@gmail.com', '$2y$10$GlPthKyRGtkzycUUWFq16uvE4BYJR2C9Af8uzKMr1YYaAuovYDNkC', '2018-07-13 19:00:00', '2018-07-13 19:00:00', 'qltuVD5e7S5CezKTZwPdNpadUbxfOA35tgF2QjkkDTs8EFwoScNoQTf9w3XL'),
(2, 1, NULL, 'dept 1 admin', 1, 'dept1admin', 'dept1admin@gmail.com', '$2y$10$NAaLmHk7caeE4bRC.Za7L.O672iWoSigI7Bb6JFHXgxk5EA1J9ngm', '2018-09-13 14:04:40', '2018-09-13 14:04:40', 'araP7CNbQut7sFpQ5chnl84czg0yvgMOBBYdkUYJmWdmfiTmE7XkhfrkBcEJ'),
(3, 2, NULL, 'dept 2 admin', 1, 'dept2admin', 'dept2admin@gmail.com', '$2y$10$77wlheRKOQKX5mbGiuml6./wwXslHHZDPNx5wn4soteKm8ey30MPK', '2018-09-13 14:05:45', '2018-09-13 14:05:45', NULL),
(4, NULL, NULL, 'soc 1 admin', 2, 'soc1admin', 'soc1admin@gmail.com', '$2y$10$SIvrx5rhKSjk5jF04HoXOup3Dp.slmoJ7vJMcW09nVS88OBzb0k4O', '2018-09-13 14:07:51', '2018-09-13 14:07:51', 'ZTu5LGUEUB1HezEz9s9USzV1vettYOArs59qVWsNeDkmdoSvlfIg2ChPnk9t'),
(5, NULL, NULL, 'soc 2 admin', 2, 'soc2admin', 'soc2admin@gmail.com', '$2y$10$NjbMElFNHH1oNNx9DsTj1ugzYjpC5xYod3KEYYtsjZ1dMfyjIIjjq', '2018-09-13 14:08:27', '2018-09-13 14:08:27', NULL),
(6, 1, NULL, 'student 1', 3, 'student1', 'student1@gmail.com', '$2y$10$ZlPi7Fz1C4GQk2rDZ3aEdutreVjzqYf2BTjg79YxYVmCi2V4CcbHC', '2018-09-13 14:40:16', '2018-09-13 14:40:16', '8Q8kGKIw30xVmN3vAN7zqZSHvh5GVug11YtHjI4cpl8pF2uMdcQNlEYTsGJl'),
(7, 2, NULL, 'student 2', 3, 'student2', 'student2@gmail.com', '$2y$10$E41OzK9AG4JArXC5Ci6gM.tupLEiTZjIR5FHd3HRF/6XlBkB7NrPm', '2018-09-13 14:40:53', '2018-09-13 14:40:53', NULL),
(8, NULL, 3, 'cc', 2, 'cc', 'cc@gmail.com', '$2y$10$i1DJy.IMwuOi0mXNb0CdSuvPNM.FOrTI8ny2.odQWk9pKO67.NtX.', '2019-01-04 06:25:14', '2019-01-04 06:26:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_announcements`
--
ALTER TABLE `department_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `society_announcements`
--
ALTER TABLE `society_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `society_user`
--
ALTER TABLE `society_user`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_announcements`
--
ALTER TABLE `department_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `society_announcements`
--
ALTER TABLE `society_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `society_user`
--
ALTER TABLE `society_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
