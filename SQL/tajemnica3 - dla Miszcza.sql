-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2019 at 01:12 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tajemnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ikona` varchar(255) DEFAULT '''NULL''',
  `kat_id` int(3) NOT NULL,
  `kolejnosc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `description`, `ikona`, `kat_id`, `kolejnosc`) VALUES
(14, '1', '', '', 3, 2),
(15, '2', '', '', 11, 2),
(16, '3', '', '', 3, 3),
(17, '4', '', '', 11, 1),
(18, '5', '', '', 3, 1),
(19, 'Forum name', 'FORUM DESC', '', 12, 1),
(20, 'forum 1', 'opis', '', 25, 2),
(21, '2', 'opis dlugi', '', 25, 3),
(22, '1', '', '', 24, 1),
(23, '', '', '<div class=\'icon-stack\'> <i class=\"base base-7 icon-stack-3x opacity-100 color-primary-500\"></i> <i class=\"base base-7 icon-stack-2x opacity-100 color-primary-300\"></i> <i class=\"fal fa-car icon-stack-1x opacity-100 color-white\"></i> </div>', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

CREATE TABLE `forum_category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `kolejnosc` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_category`
--

INSERT INTO `forum_category` (`id`, `name`, `opis`, `kolejnosc`) VALUES
(24, '2', '', 2),
(25, '1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `secretKey` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `validUntile` datetime NOT NULL,
  `dateUsed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `userID`, `secretKey`, `validUntile`, `dateUsed`) VALUES
(1, 2, 'cce330cc4b71478f53b08c09c92451a4e560650d', '2019-09-30 19:57:24', NULL),
(2, 2, 'f15aa6008388b192e7a1a748661f3c431afbde39', '2019-09-30 23:08:10', NULL),
(3, 2, '4ec68130e9d1fb9430df7f7bf15a7779c631ae24', '2019-09-30 23:10:23', NULL),
(4, 2, 'b1d837973ec149c376e246cb4db532a453952d7c', '2019-09-30 23:19:45', NULL),
(5, 2, '8fdfa805d704ec68880d027ca0b442c797dacf9b', '2019-09-30 23:20:31', NULL),
(6, 2, 'dcb792668222cf66fd1a8ae567e0e030a411de63', '2019-09-30 23:20:41', NULL),
(7, 10, '54c65d7f295a6d938afcd1ec665f5f100cc591c8', '2019-09-30 23:30:27', NULL),
(8, 2, '729a1526341f7c613b254bb43223cf5586aef0fc', '2019-09-30 23:30:44', NULL),
(9, 2, '60168462d34f4473960e74ad947aed2a167e9b54', '2019-09-30 23:31:11', NULL),
(10, 10, '3066039125ada2deb76367d49e4bb369ed14118c', '2019-09-30 23:33:28', NULL),
(11, 2, 'f24049d7ef36480e543a9e32b4cc2ce36bbdded6', '2019-09-30 23:33:36', NULL),
(12, 2, '4395eef50498b002264bfcc3cbbdb9cc0f5529c2', '2019-09-30 23:36:42', NULL),
(13, 2, '28943adc03e906a049de3be68eb4c706d893bbff', '2019-09-30 23:53:58', NULL),
(14, 2, '9fedde0b363cbc92ee9e110d64d7d8d59caa8c24', '2019-10-01 00:08:42', NULL),
(15, 2, 'f0b811af89f201b56636d3c0db48e84b35385590', '2019-10-01 00:10:57', '2019-09-30 23:42:07'),
(16, 28, '9c9dfa34407cde35067fa77f6507b7b3724a9922', '2019-10-02 01:35:31', '2019-10-02 01:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PayPal` int(11) DEFAULT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imie` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `miasto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `RoleID` int(11) NOT NULL DEFAULT 0,
  `newsletter` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `banned_until` timestamp(3) NULL DEFAULT NULL,
  `is_activated` varchar(3) COLLATE utf8mb4_unicode_520_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `PayPal`, `password`, `imie`, `nazwisko`, `miasto`, `country`, `date_created`, `RoleID`, `newsletter`, `banned_until`, `is_activated`) VALUES
(28, 'Skorpiono', 'hjkasgasdyjgf', NULL, '$2y$12$lDjSV/bYYcjZLkJyEW3poeE0qLwfOvoH2i06MY2KsqCJAGWiooe6e', 'Szymon', 'Zachariasz', NULL, NULL, '2019-10-01 18:33:09', 1, 'yes', NULL, 'yes'),
(29, 'Skorpiono2', 'skorpss2@gmail.com', NULL, '$2y$12$76dy/JmbT3YaF1k8SLhju.LsAqkMj6hNl8q6UVlwgx/9M3R7hLwAS', 'Szymon', 'Zachariasz', NULL, NULL, '2019-10-01 19:03:36', 0, 'no', '0000-00-00 00:00:00.000', 'yes'),
(31, 'Skorpiono4', 'skorpss4@gmail.com', NULL, '$2y$12$QKPxpcd5hIEcSUGV08illu6Zjt/JpRiL89rRacsqxDbmOfvF.fI7q', 'Krystyna', 'Zobczynska', NULL, NULL, '2019-10-04 16:19:07', 0, 'no', '0000-00-00 00:00:00.000', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_activation`
--

CREATE TABLE `user_activation` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `activation_hash` varchar(64) NOT NULL,
  `date_used` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activation`
--

INSERT INTO `user_activation` (`id`, `username`, `activation_hash`, `date_used`) VALUES
(16, 'Skorpiono4', '09b3cf3bf1c9fe4f0a43696e26ac327f97fdc5db17b46cc639d51fa7b94ea6fe', '2019-10-04 16:25:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activation`
--
ALTER TABLE `user_activation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
