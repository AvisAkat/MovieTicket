-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 06:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movietickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Accra', '0245675432', 1, '2023-10-19 02:48:27', '2023-10-19 02:48:27'),
(2, 'Kumasi', '05832453532', 2, '2023-10-19 02:48:27', '2023-10-19 02:48:27');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_17_183728_movie', 1),
(6, '2023_10_17_183738_showing', 1),
(7, '2023_10_17_183927_ticket', 1),
(8, '2023_10_18_193203_create_contact_table', 2),
(10, '2023_10_24_175738_edit_ticket_table', 3),
(11, '2023_10_26_005132_edit_showing_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `description`, `poster`, `created_at`, `updated_at`) VALUES
(1, 'Avatar', 'Action, Adventure, Fantasy', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjEyOTYyMzUxNl5BMl5BanBnXkFtZTcwNTg0MTUzNA@@._V1_SX1500_CR0,0,1500,999_AL_.jpg', '2023-10-19 01:06:12', '2023-10-19 01:06:12'),
(2, '300', 'Action, Drama, Fantasy', 'King Leonidas of Sparta and a force of 300 men fight the Persians at Thermopylae in 480 B.C.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTMwNTg5MzMwMV5BMl5BanBnXkFtZTcwMzA2NTIyMw@@._V1_SX1777_CR0,0,1777,937_AL_.jpg', '2023-10-19 01:06:12', '2023-10-19 01:06:12'),
(3, 'Narcos', 'Biography, Crime, Drama', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTk2MDMzMTc0MF5BMl5BanBnXkFtZTgwMTAyMzA1OTE@._V1_SX1500_CR0,0,1500,999_AL_.jpg', '2023-10-19 01:06:12', '2023-10-19 01:06:12'),
(4, 'Breaking Bad', 'Crime, Drama, Thriller', 'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his familys financial future.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTgyMzI5NDc5Nl5BMl5BanBnXkFtZTgwMjM0MTI2MDE@._V1_SY1000_CR0,0,1498,1000_AL_.jpg', '2023-10-19 01:06:12', '2023-10-19 01:06:12'),
(6, 'Avatar', 'Action, Adventure, Fantasy', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjEyOTYyMzUxNl5BMl5BanBnXkFtZTcwNTg0MTUzNA@@._V1_SX1500_CR0,0,1500,999_AL_.jpg', '2023-10-26 08:01:51', '2023-10-26 08:01:51'),
(7, '300', 'Action, Drama, Fantasy', 'King Leonidas of Sparta and a force of 300 men fight the Persians at Thermopylae in 480 B.C.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTMwNTg5MzMwMV5BMl5BanBnXkFtZTcwMzA2NTIyMw@@._V1_SX1777_CR0,0,1777,937_AL_.jpg', '2023-10-26 08:01:51', '2023-10-26 08:01:51'),
(8, 'Narcos', 'Biography, Crime, Drama', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTk2MDMzMTc0MF5BMl5BanBnXkFtZTgwMTAyMzA1OTE@._V1_SX1500_CR0,0,1500,999_AL_.jpg', '2023-10-26 08:01:51', '2023-10-26 08:01:51');

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
-- Table structure for table `showings`
--

CREATE TABLE `showings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showing_datetime` datetime NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `limit` int(11) NOT NULL DEFAULT 50,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showings`
--

INSERT INTO `showings` (`id`, `showing_datetime`, `movie_id`, `price`, `rooms`, `limit`, `created_at`, `updated_at`) VALUES
(1, '2023-10-16 17:00:00', 1, 30, '7', 30, '2023-10-19 01:09:14', '2023-10-19 01:09:14'),
(2, '2023-10-20 09:00:00', 1, 70, '9', 100, '2023-10-19 01:09:14', '2023-10-19 01:09:14'),
(3, '2023-10-21 17:00:00', 1, 20, '8', 30, '2023-10-19 01:09:14', '2023-10-19 01:09:14'),
(4, '2023-10-22 12:00:00', 1, 60, '9', 150, '2023-10-19 01:09:14', '2023-10-19 01:09:14'),
(5, '2023-10-23 12:00:00', 1, 30, '7', 150, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(6, '2023-10-19 09:00:00', 2, 60, '6', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(7, '2023-10-20 17:00:00', 2, 60, '3', 150, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(8, '2023-10-21 09:00:00', 2, 60, '5', 50, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(9, '2023-10-22 12:00:00', 2, 30, '2', 50, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(10, '2023-10-23 09:00:00', 2, 60, '7', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(11, '2023-10-19 12:00:00', 3, 70, '7', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(12, '2023-10-20 17:00:00', 3, 80, '7', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(13, '2023-10-21 17:00:00', 3, 90, '9', 150, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(14, '2023-10-22 12:00:00', 3, 60, '4', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(15, '2023-10-23 12:00:00', 3, 80, '4', 150, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(16, '2023-10-19 19:00:00', 4, 50, '2', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(17, '2023-10-20 12:00:00', 4, 10, '4', 50, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(18, '2023-10-21 19:00:00', 4, 80, '1', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(19, '2023-10-22 12:00:00', 4, 80, '1', 30, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(20, '2023-10-23 17:00:00', 4, 10, '4', 100, '2023-10-19 01:09:15', '2023-10-19 01:09:15'),
(26, '2023-10-24 12:00:00', 1, 10, '8', 150, '2023-10-24 02:02:52', '2023-10-24 02:02:52'),
(27, '2023-10-25 19:00:00', 1, 80, '4', 30, '2023-10-24 02:02:52', '2023-10-24 02:02:52'),
(28, '2023-10-26 19:00:00', 1, 50, '4', 100, '2023-10-24 02:02:52', '2023-10-24 02:02:52'),
(29, '2023-10-27 12:00:00', 1, 60, '4', 30, '2023-10-24 02:02:52', '2023-10-24 02:02:52'),
(30, '2023-10-28 12:00:00', 1, 70, '2', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(31, '2023-10-24 09:00:00', 2, 60, '4', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(32, '2023-10-25 09:00:00', 2, 70, '7', 150, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(33, '2023-10-26 12:00:00', 2, 70, '9', 150, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(34, '2023-10-27 12:00:00', 2, 40, '6', 30, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(35, '2023-10-28 12:00:00', 2, 20, '6', 100, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(36, '2023-10-24 17:00:00', 3, 20, '8', 30, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(37, '2023-10-25 09:00:00', 3, 10, '3', 150, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(38, '2023-10-26 12:00:00', 3, 10, '3', 30, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(39, '2023-10-27 09:00:00', 3, 10, '5', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(40, '2023-10-28 12:00:00', 3, 50, '6', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(41, '2023-10-24 19:00:00', 4, 10, '8', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(42, '2023-10-25 12:00:00', 4, 10, '9', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(43, '2023-10-26 17:00:00', 4, 30, '4', 100, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(44, '2023-10-27 17:00:00', 4, 40, '9', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53'),
(45, '2023-10-28 12:00:00', 4, 40, '2', 50, '2023-10-24 02:02:53', '2023-10-24 02:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `showing_id` bigint(20) UNSIGNED NOT NULL,
  `purchased_at` datetime NOT NULL DEFAULT current_timestamp(),
  `used_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `showing_id`, `purchased_at`, `used_at`) VALUES
('9a72a942-462b-4916-ba18-df8e2b1fcb4a', 21, 37, '2023-10-24 11:36:06', NULL),
('9a72aa31-c523-4992-960e-e6ccbf6a1ce7', 21, 37, '2023-10-24 11:38:43', NULL),
('9a72b5b8-74f5-4ba5-bdc6-fc98bee9f17b', 21, 32, '2023-10-24 12:10:57', NULL),
('9a72b64e-0624-4f81-9e03-98c31b72977f', 21, 27, '2023-10-24 12:12:35', NULL),
('9a72b7b1-067a-4c39-8707-60e61cedad48', 19, 43, '2023-10-24 12:16:27', NULL),
('9a72b7bd-9a8e-4d61-871f-a0a97a589679', 19, 43, '2023-10-24 12:16:36', NULL),
('9a72b7be-2ade-48a0-a943-eea6fcf576cb', 19, 43, '2023-10-24 12:16:36', NULL),
('9a72b7be-ceaf-40b3-95e0-dac8f310aab1', 19, 43, '2023-10-24 12:16:36', NULL),
('9a72b7be-ed9b-4ca0-a318-32631c4f069f', 19, 43, '2023-10-24 12:16:36', NULL),
('9a72b7bf-059d-4a0b-a808-270cd9e82576', 19, 43, '2023-10-24 12:16:36', NULL),
('9a72b7bf-1095-497b-b423-96c3c1778942', 19, 43, '2023-10-24 12:16:37', NULL),
('9a72c594-6d61-4655-8c3e-9a23325b3c18', 19, 32, '2023-10-24 12:55:17', NULL),
('9a72c594-8c1f-4c1b-85eb-9a29d641d5ff', 19, 32, '2023-10-24 12:55:17', NULL),
('9a72c594-a31f-454b-a9cd-a67eadeded11', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c594-e2e5-469a-ba7f-5128b49bfbc2', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c595-147b-4fcc-b5b5-8fb098891ed5', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c595-26aa-413b-b90d-21f7b9acb2a1', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c595-3226-402d-ad2f-71f259913788', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c595-483b-4ca0-b428-e0c8781975e8', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c595-5a7f-4d3b-a094-70430d802f5c', 19, 32, '2023-10-24 12:55:18', NULL),
('9a72c59f-81e1-4dc0-a0ed-31683fc97dce', 19, 32, '2023-10-24 12:55:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin1', 'admin1@example.com', '2023-10-19 01:06:12', '$2y$10$4Vv.ss3jYjfF71.nDLFghuAGv9QfJ3vIB1qz5teYCtxb8q82MjlqW', NULL, '2023-10-19 01:06:12', '2023-10-19 01:06:12', 'admin'),
(2, 'user1', 'user1@example.com', '2023-10-19 01:06:12', '$2y$10$/ReJMYD/uUVhVJtRjATVnub.U480woXMoBj4E4jh8BpPoq.dYfm7m', NULL, '2023-10-19 01:06:12', '2023-10-19 01:06:12', 'user'),
(16, 'user2', 'user2@user.com', NULL, '$2y$10$UNvoWeDJJZzQsF2DwTpVQ.oxvT3haJf9UYhXfBIgrfXuWd2YUkDnC', NULL, '2023-10-24 02:00:29', '2023-10-24 02:00:29', 'user'),
(19, 'user3', 'user3@user.com', NULL, '$2y$10$GcKCXz.hVxRKuVemv1c7pupKFenFujjVhU9SflTNHQmenMDEl2FkG', NULL, '2023-10-24 02:06:23', '2023-10-24 02:06:23', 'user'),
(20, 'Davis', 'davis@gmail.com', NULL, '$2y$10$sIB8jjUH0iIN.Eq9vdDd..gm/EgI97cmzS/HZzsLtDRgzVGHwb1Ae', NULL, '2023-10-24 02:15:56', '2023-10-24 02:15:56', 'user'),
(21, 'user5', 'user5@gmail.com', NULL, '$2y$10$M6FYyBS5eHMiQXM480gcrOHCiRfrV0RRGBEFsBZlz2plHbX5G4pWW', NULL, '2023-10-24 23:20:05', '2023-10-24 23:20:05', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

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
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showings_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_showing_id_foreign` (`showing_id`);

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showings`
--
ALTER TABLE `showings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `showings`
--
ALTER TABLE `showings`
  ADD CONSTRAINT `showings_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_showing_id_foreign` FOREIGN KEY (`showing_id`) REFERENCES `showings` (`id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
