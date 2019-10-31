-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 02:42 PM
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
  `ikona` varchar(500) NOT NULL DEFAULT '''NULL''',
  `kat_id` int(3) NOT NULL,
  `kolejnosc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `description`, `ikona`, `kat_id`, `kolejnosc`) VALUES
(90, '2', '', '', 36, 1),
(91, 'pierwsze forum zmiana', 'opis zmiana', '', 38, 1),
(92, '2', '2', '', 37, 1);

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
(37, 'Nowa kategoria', 'opis', 1),
(38, 'druga', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `post_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`id`, `post_id`, `user_id`) VALUES
(35, 5, 28),
(38, 4, 28);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text DEFAULT NULL,
  `made_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thread_id` int(10) NOT NULL,
  `likes` int(6) NOT NULL DEFAULT 0,
  `last_edit_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `made_date`, `thread_id`, `likes`, `last_edit_date`) VALUES
(1, 'Skorpiono', 'tresc', '2019-10-28 20:12:15', 1, 0, NULL),
(2, 'Skorpiono', NULL, '2019-10-22 18:41:02', 2, 0, NULL),
(3, 'Skorpiono', NULL, '2019-10-22 20:28:58', 3, 0, NULL),
(4, 'Skorpiono', '<blockquote class=&quot;blockquote&quot;>some thread content 2 i troszke ponad to</blockquote>', '2019-10-28 20:16:42', 4, 1, NULL),
(5, 'Skorpiono', '<blockquote class=&quot;blockquote&quot;><h6>benis :DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD</h6></blockquote>', '2019-10-28 20:13:58', 5, 1, NULL);

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
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `name` varchar(160) NOT NULL,
  `forum_id` int(6) NOT NULL,
  `made_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  `author` varchar(32) NOT NULL,
  `replies` int(10) NOT NULL DEFAULT 0,
  `views` int(10) NOT NULL DEFAULT 0,
  `sticky` tinyint(1) NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `pages` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `name`, `forum_id`, `made_date`, `closed`, `author`, `replies`, `views`, `sticky`, `disabled`, `pages`) VALUES
(1, 'test', 92, '2019-10-22 18:37:39', 0, 'Skorpiono', 0, 0, 1, 0, 1),
(2, '2', 92, '2019-10-22 18:41:02', 0, 'Skorpiono', 0, 0, 0, 0, 1),
(3, 'new thread', 92, '2019-10-22 20:28:58', 0, 'Skorpiono', 0, 0, 0, 0, 1),
(4, 'new thread 2 ', 92, '2019-10-22 20:31:45', 0, 'Skorpiono', 0, 0, 0, 0, 7),
(5, 'benis', 92, '2019-10-26 16:19:23', 0, 'Skorpiono', 0, 0, 0, 0, 1);

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
(28, 'Skorpiono', 'uikyhiyh', NULL, '$2y$12$lDjSV/bYYcjZLkJyEW3poeE0qLwfOvoH2i06MY2KsqCJAGWiooe6e', 'Szymon', 'Zachariasz', NULL, NULL, '2019-10-01 18:33:09', 1, 'yes', NULL, 'yes'),
(29, 'Skorpiono2', 'skorpss2@gmail.com', NULL, '$2y$12$76dy/JmbT3YaF1k8SLhju.LsAqkMj6hNl8q6UVlwgx/9M3R7hLwAS', 'Szymon', 'Zachariasz', NULL, NULL, '2019-10-01 19:03:36', 0, 'no', '0000-00-00 00:00:00.000', 'yes'),
(31, 'Skorpiono4', 'skorpss4@gmail.com', NULL, '$2y$12$QKPxpcd5hIEcSUGV08illu6Zjt/JpRiL89rRacsqxDbmOfvF.fI7q', 'Krystyna', 'Zobczynska', NULL, NULL, '2019-10-04 16:19:07', 0, 'no', '0000-00-00 00:00:00.000', 'yes'),
(32, 'Priboi', 'bulrafi@gmail.com', NULL, '$2y$12$maCSEDrs0dpVnf08T8ahJu0lua21XYqAxNEfDm2eXJW/qsLl3K36S', 'Marcin', 'Kubik', NULL, NULL, '2019-10-19 13:31:43', 0, 'no', NULL, 'yes');

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
(16, 'Skorpiono4', '09b3cf3bf1c9fe4f0a43696e26ac327f97fdc5db17b46cc639d51fa7b94ea6fe', '2019-10-04 16:25:34'),
(17, 'Priboi', 'a6813c91b949d8da8bfc5dfb8c23f6d38e1051bb073ef865abe5062b8ab0ab13', '2019-10-19 13:32:16');

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
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
