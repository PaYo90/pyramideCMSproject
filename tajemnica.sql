-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 12:58 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imie` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `miasto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `RoleID` int(11) NOT NULL DEFAULT 0,
  `newsletter` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_banned` bit(1) NOT NULL,
  `is_activated` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `imie`, `nazwisko`, `miasto`, `country`, `date_created`, `RoleID`, `newsletter`, `is_banned`, `is_activated`) VALUES
(28, 'Skorpiono', 'skorpss@gmail.com', '$2y$12$lDjSV/bYYcjZLkJyEW3poeE0qLwfOvoH2i06MY2KsqCJAGWiooe6e', 'Szymon', 'Zachariasz', NULL, NULL, '2019-10-01 18:33:09', 0, 'yes', b'0', b'1'),
(29, 'Skorpiono2', 'skorpss2@gmail.com', '$2y$12$76dy/JmbT3YaF1k8SLhju.LsAqkMj6hNl8q6UVlwgx/9M3R7hLwAS', 'Szymon', 'Zachariasz', NULL, NULL, '2019-10-01 19:03:36', 0, 'no', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_activation`
--

CREATE TABLE `user_activation` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `activation_hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
