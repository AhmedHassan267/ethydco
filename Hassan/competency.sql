-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 11:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competency`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(100) NOT NULL,
  `question_id` int(191) NOT NULL,
  `answer_text` text DEFAULT NULL,
  `right_answer` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `answer_text`, `right_answer`) VALUES
(157, 26, 'right', 1),
(158, 26, 'wrong', 0),
(159, 26, 'wrong', 0),
(160, 26, 'wrong', 0),
(169, 27, 'wrong', 0),
(170, 27, 'wrong', 0),
(171, 27, 'wrong', 0),
(172, 27, 'right', 1),
(173, 28, 'wrong', 0),
(174, 28, 'wrong', 0),
(175, 28, 'right', 1),
(176, 28, 'wrong', 0),
(197, 32, 'right', 1),
(198, 32, 'wrong', 0),
(199, 32, 'wrong', 0),
(200, 32, 'wrong', 0),
(209, 35, 'wrong', 0),
(210, 35, 'right', 1),
(211, 35, 'wrong', 0),
(212, 35, 'wrong', 0),
(213, 36, 'wrong', 0),
(214, 36, 'wrong', 0),
(215, 36, 'right', 1),
(216, 36, 'wrong', 0),
(217, 37, 'wrong', 0),
(218, 37, 'right', 1),
(219, 37, 'wrong', 0),
(220, 37, 'wrong', 0),
(221, 38, 'right', 1),
(222, 38, 'wrong', 0),
(223, 38, 'wrong', 0),
(224, 38, 'wrong', 0);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(191) NOT NULL,
  `role_id` int(191) NOT NULL,
  `role_specific_id` int(191) NOT NULL,
  `text` text DEFAULT NULL,
  `level` int(100) NOT NULL,
  `right_answer` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `role_id`, `role_specific_id`, `text`, `level`, `right_answer`) VALUES
(26, 1, 1, 'Identify UTILITY as supporting material for petrochemical product.', 1, 1),
(27, 1, 1, 'Identify the Commercial Routes to utility  Production and raw material ', 1, 4),
(28, 1, 1, 'State the utility derivatives.', 1, 3),
(32, 1, 1, 'Describe the main set of equipment for utilities production.', 2, 1),
(35, 1, 1, 'Describe the world wide change of feedstock', 2, 2),
(36, 1, 1, 'Explain the important products of the utility industry.', 2, 3),
(37, 1, 1, 'Demonstrate the fundamentals of utility value chain.', 3, 2),
(38, 1, 1, 'Verify environmental impact of the utility industry, and explain prevention methods.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(191) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Plants UTL', 'Explain the principle of Aromatics industry, source of Aromatics, composition, overall value chain and the environmental impact caused by the Aromatics industry.'),
(2, 'Rotating Equipment', 'Know the unit process description, main component, philosophy of operation and troubleshooting.'),
(3, 'Plants PE', 'Know the unit process description, main component, philosophy of operation and troubleshooting.'),
(4, 'Cultural Capabilities', 'Know the unit process description, main component, and philosophy of operation, troubleshooting and improvement opportunities.'),
(5, 'Laboratory', 'Know the unit process description, main component, and philosophy of operation, troubleshooting and improvement opportunities.'),
(6, 'Leadership Code', 'Know the unit process description, main component, philosophy of operation and troubleshooting.'),
(7, 'Plants EU', 'Know the unit process description, main component, philosophy of operation and troubleshooting.');

-- --------------------------------------------------------

--
-- Table structure for table `role_specific`
--

CREATE TABLE `role_specific` (
  `id` int(191) NOT NULL,
  `role_id` int(191) NOT NULL,
  `name` text DEFAULT NULL,
  `des` text NOT NULL,
  `state` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_specific`
--

INSERT INTO `role_specific` (`id`, `role_id`, `name`, `des`, `state`) VALUES
(1, 1, 'Utility Industry', 'Explain the principle of Aromatics industry, source of Aromatics, composition, overall value chain and the environmental impact caused by the Aromatics industry.', 0),
(2, 1, 'UTL: Plant Air and Instrument Air (Operations) ', 'Know the unit process description, main component, philosophy of operation and troubleshooting.', 1),
(3, 1, 'UTL: Plant Air and Instrument Air (Engineer) ', 'Know the unit process description, main component, philosophy of operation and troubleshooting.', 2),
(4, 1, 'UTL: Plant Air and Instrument Air (IE) ', 'Know the unit process description, main component, and philosophy of operation, troubleshooting and improvement opportunities.', 0),
(5, 1, 'UTL: Plant Air and Instrument Air (TID) \r\n', 'Know the unit process description, main component, and philosophy of operation, troubleshooting and improvement opportunities.\r\n', 3),
(6, 1, 'UTL: Air Separation Plant ASP (Operations) \r\n', 'Know the unit process description, main component, philosophy of operation and troubleshooting.\r\n', 2),
(7, 1, 'UTL: Air Separation Plant ASP (Engineer) \r\n', 'Know the unit process description, main component, philosophy of operation and troubleshooting.\r\n', 2),
(8, 1, 'UTL: Air Separation Plant ASP (IE)\r\n', 'Know the unit process description, main component, philosophy of operation, troubleshooting and improvement opportunities\r\n', 1),
(9, 1, 'UTL: Air Separation Plant ASP (TID)\r\n', 'Know the unit process description, main component, philosophy of operation, troubleshooting and improvement opportunities\r\n', 1),
(10, 1, 'UTL: De-mineralized Water (Operations) \r\n', 'Know the unit process description, main component, philosophy of operation and troubleshooting.\r\n', 0),
(11, 1, 'UTL: De-mineralized Water (Engineer) \r\n', 'Know the unit process description, main component, philosophy of operation and troubleshooting.\r\n', 0),
(12, 1, 'UTL: De-mineralized Water (IE)\r\n', 'Know the unit process description, main component, philosophy of operation, troubleshooting and improvement opportunities\r\n', 0),
(13, 1, 'UTL: De-mineralized Water (TID)\r\n', 'Know the unit process description, main component, philosophy of operation, troubleshooting and improvement opportunities\r\n', 0),
(14, 1, 'UTL: BFW System (Operations) \r\n', 'Know the unit process description, main component, philosophy of operation and trouble shooting.\r\n', 0),
(15, 1, 'UTL: BFW System (Engineer) \r\n', 'Know the unit process description, main component, philosophy of operation and trouble shooting.\r\n', 0),
(16, 1, 'UTL: BFW System (IE)\r\n', 'Know the unit process description, main component, philosophy of operation, troubleshooting and improvement opportunities\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(191) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT 'uploads/user.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(191) NOT NULL DEFAULT 1,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `phone`, `profile_pic`, `email`, `role_id`, `location`, `email_verified_at`, `password`, `education`, `skills`, `notes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'male', '01141780322', 'uploads/1655541802-avatar2.png', 'a@y.c', 1, 'Alexandria - Egypt - Miamii', NULL, '$2y$10$/hXLaipmZOaqDkDStbiSM.nZJUtKC/KKbwLklU2DdGYfBXLkdYKCm', 'Faculty Of Engineering SSP CCE', 'PHP Laravel Framework , JS , C# , .NET', 'I don\'t have any notes to say', NULL, '2022-06-13 15:25:20', '2022-07-03 08:09:33'),
(2, 'User', 'male', '0530051319', 'uploads/1655542759-avatar.png', 'b@y.c', 1, 'Smouha - Alexandria - Egypt', NULL, '$2y$10$loYul7WvxjTquUOB4o0r6eapJ0hVzDCnaii/kcA/Nh0vptteb0H2q', 'Faculty Of Commerce', 'PHP , Node.js', 'Nothing totally', NULL, '2022-06-13 15:29:21', '2022-06-18 06:59:19'),
(3, 'Another User', 'male', '01288814313', 'uploads/1655850980-user7-128x128.jpg', 'c@y.c', 1, '45 - Alexandria - Egypt', NULL, '$2y$10$nUf8TSauaulMjcdDJraYXO3Xpif.pBN3YBAAnTZ00yzdNhroOqviq', 'Faculty Of Education And Technology', '0 skillss', 'Nothing', NULL, '2022-06-13 15:33:26', '2022-06-26 00:35:48'),
(4, 'Domain', 'male', '01098973328', 'uploads/1655556705-avatar3.png', 'd@y.c', 2, 'Miami - Alexandria - Egypt', NULL, '$2y$10$lIBlMxY32LFFsG671H3LGOSaLAA94Q5fmkOHKD1.o6oRAlZzdkcx2', 'Information Techno', NULL, NULL, NULL, '2022-06-13 17:43:29', '2022-06-18 10:51:45'),
(5, 'Email', 'male', '01141857233', 'uploads/user.png', 'e@y.c', 2, 'Sedi beshr - Alexandria - Egypt', NULL, '$2y$10$aqwGg5GQrxQk8nUPNs6QfeW72lC2pKbXEJGo3C.DCrPMdQ5j/BaTO', 'Medicine & Translation', NULL, NULL, NULL, '2022-06-13 18:10:06', '2022-06-13 18:10:06'),
(6, 'Test', 'male', '01248994210', 'uploads/1655556678-user5-128x128.jpg', 't@y.c', 1, NULL, NULL, '$2y$10$prsuvhxEKUUkoR4FbGxvKuZeveBMSFlXV6JUweT0lORXP2Dhi8FJS', 'Faculty Of Law', NULL, NULL, NULL, '2022-06-18 06:38:59', '2022-06-18 10:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `level` int(10) NOT NULL,
  `answer` int(11) NOT NULL,
  `right_answer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `user_id`, `question_id`, `level`, `answer`, `right_answer`) VALUES
(87, 3, 26, 1, 1, 1),
(88, 3, 27, 1, 4, 4),
(89, 3, 28, 1, 3, 3),
(90, 3, 32, 2, 1, 1),
(91, 3, 35, 2, 2, 2),
(92, 3, 36, 2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE `user_test` (
  `id` int(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `role_id` int(191) NOT NULL,
  `level` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `go_next` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_test`
--

INSERT INTO `user_test` (`id`, `user_id`, `role_id`, `level`, `mark`, `full_mark`, `go_next`) VALUES
(24, 3, 1, 1, 3, 3, 1),
(25, 3, 1, 2, 3, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_specific`
--
ALTER TABLE `role_specific`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_specific`
--
ALTER TABLE `role_specific`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_test`
--
ALTER TABLE `user_test`
  ADD CONSTRAINT `user_test_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_test_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
