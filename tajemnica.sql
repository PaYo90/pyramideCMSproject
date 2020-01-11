-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 09:22 PM
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
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `title_image` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` int(14) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `description`, `title_image`, `user_id`, `creation_date`, `last_update`) VALUES
(1, 'Nowy album', 'Wszystkie moje prywatne zdjęcia!', '290', 28, '2019-12-08 20:01:32', NULL),
(6, 'album', 'opis', '307', 28, '2019-12-26 18:20:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `id` int(11) NOT NULL,
  `genre` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `main_page_views` int(13) NOT NULL DEFAULT 0,
  `author_id` int(13) NOT NULL,
  `style` int(1) NOT NULL,
  `releasedate` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `inicjaly` varchar(8) DEFAULT NULL,
  `cover_file_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`id`, `genre`, `name`, `main_page_views`, `author_id`, `style`, `releasedate`, `inicjaly`, `cover_file_name`) VALUES
(5, 'ROMANS', '123123', 0, 28, 1, '11/23/2019', '11/23/20', 'okladka.png'),
(6, 'ROMANS', '34243243', 0, 28, 1, '11/23/2019', '11/23/20', 'okladka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comic_pages`
--

CREATE TABLE `comic_pages` (
  `id` int(11) NOT NULL,
  `chapter_id` int(12) NOT NULL,
  `comic_id` int(12) NOT NULL,
  `page_nr` int(3) NOT NULL,
  `extention` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `subject` varchar(180) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author_id` int(12) NOT NULL,
  `author_name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `adresat_name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `adresat_id` int(12) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `ifnew_sender` int(1) NOT NULL DEFAULT 0,
  `ifnew_odbiorca` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `subject`, `author_id`, `author_name`, `adresat_name`, `adresat_id`, `last_update`, `ifnew_sender`, `ifnew_odbiorca`) VALUES
(2, '', 28, 'Skorpiono', 'Szymon', 0, '2020-01-02 01:44:12', 0, 1),
(3, '', 28, 'Skorpiono', 'Berbeka', 0, '2020-01-02 01:44:12', 0, 1),
(4, '', 28, 'Skorpiono', 'Bekarz', 0, '2020-01-02 01:44:12', 0, 1),
(5, '', 28, 'Skorpiono', 'Ciamajda', 0, '2020-01-02 01:44:12', 0, 1),
(6, 'Test', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-02 01:45:04', 0, 1),
(7, 'temat 2', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:09:07', 0, 1),
(8, 'Temat 3', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:10:52', 0, 1),
(9, 'Temat 4', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:28:19', 0, 1),
(10, 'Temat 5', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:33:01', 0, 1),
(11, 'Temat 6', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:33:23', 0, 1),
(12, 'Temat 7', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:38:00', 0, 1),
(13, 'Temat8', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:39:46', 0, 1),
(14, 'Sprawdzamy znaki html', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-04 22:40:46', 0, 1),
(15, 'apo', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-05 18:29:17', 0, 1),
(16, 'asdasd', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-05 18:34:25', 0, 1),
(17, 'asdasda', 28, 'Skorpiono', 'asdasd', 0, '2020-01-05 18:45:14', 0, 1),
(18, 'asdasd', 28, 'Skorpiono', 'Skorpiono', 0, '2020-01-05 18:54:11', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diary_comments`
--

CREATE TABLE `diary_comments` (
  `id` int(13) NOT NULL,
  `author_id` int(12) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `made_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(6) NOT NULL DEFAULT 0,
  `diary_post_id` int(13) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `diary_comments`
--

INSERT INTO `diary_comments` (`id`, `author_id`, `content`, `made_date`, `likes`, `diary_post_id`) VALUES
(36, 28, 'odp', '2019-11-06 14:17:23', 0, 13),
(37, 28, 'komentarz', '2019-11-07 11:27:12', 0, 14),
(38, 28, '\r\n\r\n\r\n\r\n\r\n\r\n\r\nadasda', '2019-11-07 11:27:59', 0, 14),
(39, 28, 'test\r\nentera', '2019-11-07 11:36:04', 0, 14),
(40, 28, 'asd', '2019-11-07 11:36:18', 0, 14),
(41, 28, 'test<br />\r\nnr<br />\r\n2', '2019-11-07 11:38:47', 0, 14),
(42, 28, '<br />\r\n<br />\r\nsdfsdfsd', '2019-11-07 16:32:46', 0, 15),
(43, 28, 'sdf<br />\r\nzxfsd', '2019-11-07 16:32:51', 0, 15),
(44, 28, 'test.pl wp.pl <a href=\"//www.test.pl\" style=\"font-weight: normal;\" target=\"_blank\" title=\"www.test.pl\">www.test.pl</a>', '2019-11-10 18:21:27', 0, 20),
(45, 28, '<a href=\"http://www.wp.pl\" style=\"font-weight: normal;\" target=\"_blank\" title=\"http://www.wp.pl\">http://www.wp.pl</a>', '2019-11-10 18:22:01', 0, 20),
(46, 28, '[b]SIEMA[/b]', '2019-12-02 15:11:12', 0, 33),
(47, 28, 'www.wp.pl', '2019-12-02 15:12:07', 0, 33),
(48, 28, 'jyuft', '2019-12-17 12:36:04', 0, 40),
(49, 28, 'jytfjfjg ', '2019-12-23 19:20:09', 0, 40),
(50, 28, '[color: red] fsdfsdf [/color]', '2019-12-23 19:20:22', 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `diary_comments_to_comments`
--

CREATE TABLE `diary_comments_to_comments` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `madedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL DEFAULT 0,
  `sm_comment_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diary_posts`
--

CREATE TABLE `diary_posts` (
  `id` int(11) NOT NULL,
  `desired_profile_id` int(12) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author_id` int(12) NOT NULL,
  `made_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `diary_posts`
--

INSERT INTO `diary_posts` (`id`, `desired_profile_id`, `content`, `author_id`, `made_date`, `likes`) VALUES
(10, 28, 'test', 28, '2019-11-05 16:44:06', 0),
(11, 28, 'test 4', 28, '2019-11-05 16:44:26', 0),
(12, 28, 'test mojego facebooka', 28, '2019-11-06 00:33:21', 0),
(13, 28, 'nowy', 28, '2019-11-06 14:17:17', 0),
(14, 28, 'NOWY WPIS DLA PRZEMA :D', 28, '2019-11-07 11:27:06', 0),
(15, 28, 'chuj<br />\r\ndupa<br />\r\nkurwa<br />\r\ncipa', 28, '2019-11-07 16:32:34', 0),
(16, 28, '', 28, '2019-11-08 17:08:38', 0),
(17, 28, 'dfdf<br />\r\n<br />\r\n<br />\r\n<br />\r\ndf', 28, '2019-11-08 17:08:52', 0),
(18, 28, 'spr czy dziala <a href=\"//www.wp.pl\" style=\"font-weight: normal;\" target=\"_blank\" title=\"www.wp.pl\">www.wp.pl</a> <a href=\"http://wp.pl\" style=\"font-weight: normal;\" target=\"_blank\" title=\"http://wp.pl\">http://wp.pl</a> <a href=\"http://www.wp.pl\" style=\"font-weight: normal;\" target=\"_blank\" title=\"http://www.wp.pl\">http://www.wp.pl</a> <a href=\"mailto:skorpss@gmail.com\" style=\"font-weight: normal;\" target=\"_blank\" title=\"skorpss@gmail.com\">skorpss@gmail.com</a><br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\nef', 28, '2019-11-08 17:27:27', 0),
(19, 28, '<a href=\"//wp.pl\" style=\"font-weight: normal;\" target=\"_blank\" title=\"wp.pl\">wp.pl</a>', 28, '2019-11-08 17:28:15', 0),
(20, 28, 'cos <a href=\"//tam.Pies\" style=\"font-weight: normal;\" target=\"_blank\" title=\"tam.Pies\">tam.Pies</a> nowe zdanie', 28, '2019-11-08 17:28:36', 0),
(21, 28, 'zmeczony', 28, '2019-11-10 17:34:02', 0),
(22, 28, 'tworze aplikacje do wyswietlania comiksow, chwalac sie przy tym na moim własnym facebooku!<br />\r\n<br />\r\nAlez to bedzie kombajn!', 28, '2019-11-11 15:24:55', 0),
(23, 28, 'tekst zwykly<br />\r\n<b>tekst pogrubiony</b><br />\r\n<u>tekst podkreslony</u><br />\r\n<i>tekst pochylony</i><br />\r\n<br />\r\n<span style=\'color:red\'>]</span>', 28, '2019-11-27 16:27:48', 0),
(24, 28, '<span style=\'color:maroon\'><b>czerwony ciemny pogrubiony</b></span>', 28, '2019-11-27 16:29:19', 0),
(26, 28, '<p class=\'text-center\'> to jest tekst wycentrowany</p><br />\r\nasdasdasdas asfs sdfgdgf dfgfd', 28, '2019-11-27 16:48:26', 0),
(27, 28, '<span class=\'text-center\'> test span center</span>', 28, '2019-11-27 18:00:44', 0),
(28, 28, '<p class=\'text-center my-0 py-0\'>py-0 my-0 center p</p>', 28, '2019-11-27 18:01:51', 0),
(29, 28, '<p class=\'text-center my-0 py-0\'>py-0 my-0 center p</p>sdfsdff<br />\r\nisugefiugsfuggss g sdg s td', 28, '2019-11-27 18:02:12', 0),
(30, 28, 'skugfkshgkdogjdoigjofijodijgoid ogjo iog god or g<br />\r\n<p class=\'text-center my-0 py-0 my-2 pb-2\'>py-0 my-0 center p pb-2 my-2</p><br />\r\nisdfiu iui uisu fiduhgiudfgiu dgiu diug digf gudiug dig id', 28, '2019-11-27 18:03:42', 0),
(31, 28, 'sdfsdf', 28, '2019-12-02 15:09:15', 0),
(32, 28, 'wp.pl', 28, '2019-12-02 15:09:22', 0),
(33, 28, 'www.wp.pl', 28, '2019-12-02 15:09:27', 0),
(34, 28, '[b]www.wp.pl[/b]', 28, '2019-12-02 15:13:36', 0),
(35, 28, 'www.wp.pl', 28, '2019-12-02 15:13:55', 0),
(36, 28, '[b] www.wp.pl [/b]', 28, '2019-12-02 15:14:10', 0),
(37, 28, '[color:red]siema tiger[/color]', 28, '2019-12-08 10:51:29', 0),
(38, 28, '[color: red]siema tiger[/color]', 28, '2019-12-08 10:51:44', 0),
(39, 28, '[color=red]siema tiger[/color]', 28, '2019-12-08 10:51:55', 0),
(40, 28, '[color: RED]czerwien[/color]', 28, '2019-12-08 19:37:50', 0),
(41, 28, 'siema', 28, '2019-12-26 17:10:31', 0),
(42, 28, '[center][color=blue]Siemanko Ania[/color][/center]', 28, '2019-12-26 17:25:10', 0),
(43, 28, 'werwerwer', 28, '2020-01-06 10:11:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ikona` varchar(500) NOT NULL DEFAULT '''NULL''',
  `kat_id` int(3) NOT NULL,
  `kolejnosc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `description`, `ikona`, `kat_id`, `kolejnosc`) VALUES
(90, '2', '', '', 36, 1),
(91, 'pierwsze forum zmiana', 'opis zmiana', '', 38, 1),
(92, '2', '2', '', 37, 1),
(93, 'test', 'bla bla BLA', '', 37, 2);

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
(37, 'Regulamin', 'opis', 1),
(38, 'druga', '', 2),
(39, 'nowa kategoria', 'opis', 3),
(40, 'Arek siema ', 'opis', 4);

-- --------------------------------------------------------

--
-- Table structure for table `f_posts`
--

CREATE TABLE `f_posts` (
  `id` int(11) NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text DEFAULT NULL,
  `made_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thread_id` int(10) NOT NULL,
  `forum_id` int(12) NOT NULL,
  `likes` int(6) NOT NULL DEFAULT 0,
  `last_edit_date` timestamp NULL DEFAULT NULL,
  `edit_numbers` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_posts`
--

INSERT INTO `f_posts` (`id`, `author`, `content`, `made_date`, `thread_id`, `forum_id`, `likes`, `last_edit_date`, `edit_numbers`) VALUES
(38, 'Skorpiono', 'Testowy post bsdofsialdufiosaufiusadfapo', '2019-11-26 17:00:53', 13, 92, 0, NULL, 0),
(39, 'Skorpiono', '2', '2019-11-26 17:22:58', 13, 92, 0, NULL, 0),
(40, 'Skorpiono', 'nowy post', '2019-12-04 13:44:32', 13, 92, 0, NULL, 0),
(41, 'Skorpiono', 'nowy postsdfsdf s<b>df g df</b>', '2019-12-14 16:49:31', 14, 91, 0, NULL, 0),
(42, 'Skorpiono', 'jgujgyiky', '2019-12-26 17:12:56', 13, 92, 1, NULL, 0),
(43, 'Skorpiono', 'xfdvxcvxcvxcvxcv', '2020-01-05 21:06:16', 13, 92, 0, NULL, 0),
(44, 'Skorpiono', NULL, '2020-01-06 22:54:43', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_rangs`
--

CREATE TABLE `f_rangs` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_amount_needed` int(10) DEFAULT NULL,
  `special` varchar(3) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `f_rangs`
--

INSERT INTO `f_rangs` (`id`, `nazwa`, `image`, `post_amount_needed`, `special`) VALUES
(13, 'test', '001.jpg', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` int(14) NOT NULL,
  `album_id` int(12) DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `upload_time` datetime NOT NULL DEFAULT current_timestamp(),
  `deletehash` int(4) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `user_id`, `album_id`, `alt`, `description`, `upload_time`, `deletehash`, `size`) VALUES
(280, '0001.jpg', 28, NULL, '', '', '2019-12-17 01:24:59', 2063, 857907),
(281, '8233.jpg', 28, NULL, '', '', '2019-12-17 01:24:59', 2063, 10216),
(282, '12029820_468167153308315_7098344963989506742_o.jpg', 28, NULL, '', '', '2019-12-17 01:24:59', 2063, 292008),
(283, '12487303_1694997144102978_4826810125335222876_o.jpg', 28, NULL, '', '', '2019-12-17 01:25:00', 2063, 163957),
(284, '36002957_1017113065080385_4706201760232898560_o.jpg', 28, NULL, '', '', '2019-12-17 01:25:00', 2063, 71926),
(285, '56485698_1239330319560845_2136144169834381312_o.jpg', 28, 1, '', '', '2019-12-17 01:25:07', 5507, 69408),
(286, '43787791_1148091608649196_3772300386308718592_o.jpg', 28, 1, '', '', '2019-12-17 01:25:08', 5507, 89948),
(287, '74234776_1286012431782238_6856916318856151040_n.jpg', 28, 1, '', '', '2019-12-17 01:25:08', 5507, 56984),
(288, '74267307_982800698728703_6466383953472258048_n.jpg', 28, 1, '', '', '2019-12-17 01:25:08', 5507, 46694),
(290, 'sdfs.jpg', 28, 1, '', '', '2019-12-17 01:25:08', 5507, 377559),
(291, '0001_1.jpg', 28, NULL, '', '', '2019-12-23 02:49:18', 1954, 857907),
(292, '8233_1.jpg', 28, NULL, '', '', '2019-12-23 02:49:18', 1954, 10216),
(293, '12029820_468167153308315_7098344963989506742_o_1.jpg', 28, NULL, '', '', '2019-12-23 02:49:19', 1954, 292008),
(294, '12029820_468167153308315_7098344963989506742_o_2.jpg', 28, NULL, '', '', '2019-12-23 02:49:50', 1954, 292008),
(295, '12487303_1694997144102978_4826810125335222876_o_1.jpg', 28, NULL, '', '', '2019-12-23 02:49:50', 1954, 163957),
(296, '79322307_10219153490099401_164152095274958848_n.jpg', 28, NULL, '', '', '2019-12-23 02:50:59', 7427, 60832),
(297, '79367031_2533588636964283_943833859458334720_n.jpg', 28, NULL, '', '', '2019-12-23 02:51:00', 7427, 40900),
(298, '79909541_2637483509672780_3199693770153000960_o.jpg', 28, NULL, '', '', '2019-12-23 02:51:00', 7427, 47265),
(299, '79956391_3279971745364928_7040087976721776640_n.jpg', 28, NULL, '', '', '2019-12-23 02:51:00', 7427, 38964),
(300, '80716841_10157257147672203_2786300023996940288_n.jpg', 28, NULL, '', '', '2019-12-23 02:51:00', 7427, 64931),
(301, '67687883_2413015715643119_5745185646561984512_n.jpg', 28, 6, '', '', '2019-12-26 18:21:31', 6662, 216830),
(302, '67812040_2608934285807052_7287083329642299392_n.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 80426),
(303, '68587626_2422046721361558_4390575183564374016_n.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 52833),
(304, '68884764_1367782836708365_8369840680838627328_n.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 97558),
(305, '72193340_2131611413605174_4694001665110441984_n.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 128217),
(306, '78589383_565083697558098_5431972953182961664_o.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 70051),
(307, '96a2396f8b2ce655f932fbc9e1325b7f.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 238540),
(308, '65848468_1121477008051902_7120321221396267008_n.jpg', 28, 6, '', '', '2019-12-26 18:21:32', 6662, 132450),
(309, '67299109_2176314905799412_2322260448688209920_n.jpg', 28, 6, '', '', '2019-12-26 18:21:33', 6662, 65270),
(310, '67682927_2413657632200467_1649285244303441920_o.jpg', 28, 6, '', '', '2019-12-26 18:21:33', 6662, 125973);

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `post_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `dla` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`id`, `post_id`, `user_id`, `dla`) VALUES
(35, 5, 28, 1),
(38, 4, 28, 1),
(45, 24, 28, 1),
(47, 1, 28, 0),
(48, 33, 28, 0),
(49, 42, 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pw`
--

CREATE TABLE `pw` (
  `id` int(11) NOT NULL,
  `conversation_id` int(12) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` int(12) NOT NULL,
  `made_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ifread` int(1) NOT NULL,
  `adresat_name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci COMMENT='made_date';

--
-- Dumping data for table `pw`
--

INSERT INTO `pw` (`id`, `conversation_id`, `content`, `user_id`, `made_date`, `ifread`, `adresat_name`) VALUES
(1, 11, '\r\n                            tresc 6&lt;br&gt;\r\n                            &lt;br&gt;\r\n                            &lt;div class=&amp;quot;d-flex d-column align-items-start mb-3&amp;quot;&gt;\r\n                                &lt;img src=&amp;quot;img/logo.png&amp;quot; alt=&amp;quot;SmartAdmin WebApp&amp;quot; class=&amp;quot;mr-3 mt-1&amp;quot;&gt;\r\n                                &lt;div class=&amp;quot;border-left pl-3&amp;quot;&gt;\r\n                                    &lt;span class=&amp;quot;fw-500 fs-lg d-block l-h-n&amp;quot;&gt;Szymon Zachariasz&lt;/span&gt;\r\n                                    &lt;span class=&amp;quot;fw-400 fs-nano d-block l-h-n mb-1&amp;quot;&gt;Informatyk&lt;/span&gt;\r\n                                                                        &lt;span class=&amp;quot;fw-400 fs-nano d-block l-h-n mb-1&amp;quot; style=&amp;quot;color: darkred&amp;quot;&gt;Administrator&lt;/span&gt;\r\n                                                                                                            &lt;a href=&amp;quot;#&amp;quot; class=&amp;quot;mr-1 fs-xl&amp;quot; style=&amp;quot;color:#3b5998&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-facebook-square&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;#&amp;quot; class=&amp;quot;mr-1 fs-xl&amp;quot; style=&amp;quot;color:#38A1F3&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-twitter-square&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;#&amp;quot; class=&amp;quot;mr-1 fs-xl&amp;quot; style=&amp;quot;color:#0077B5&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-linkedin&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color:#000000&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-reddit-alien&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color:#00AFF0&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-skype&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color:#0063DC&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-flickr&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color: #833ab4&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-instagram&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color: #c4302b&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-youtube-square&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                    &lt;/div&gt;\r\n                            &lt;/div&gt;\r\n                        ', 28, '2020-01-04 22:33:23', 0, 'Skorpiono'),
(2, 12, '\r\n                            tresc 7&lt;br&gt;\r\n                            &lt;br&gt;\r\n                            &lt;div class=&amp;quot;d-flex d-column align-items-start mb-3&amp;quot;&gt;\r\n                                &lt;img src=&amp;quot;img/logo.png&amp;quot; alt=&amp;quot;SmartAdmin WebApp&amp;quot; class=&amp;quot;mr-3 mt-1&amp;quot;&gt;\r\n                                &lt;div class=&amp;quot;border-left pl-3&amp;quot;&gt;\r\n                                    &lt;span class=&amp;quot;fw-500 fs-lg d-block l-h-n&amp;quot;&gt;Szymon Zachariasz&lt;/span&gt;\r\n                                    &lt;span class=&amp;quot;fw-400 fs-nano d-block l-h-n mb-1&amp;quot;&gt;Informatyk&lt;/span&gt;\r\n                                                                        &lt;span class=&amp;quot;fw-400 fs-nano d-block l-h-n mb-1&amp;quot; style=&amp;quot;color: darkred&amp;quot;&gt;Administrator&lt;/span&gt;\r\n                                                                                                            &lt;a href=&amp;quot;#&amp;quot; class=&amp;quot;mr-1 fs-xl&amp;quot; style=&amp;quot;color:#3b5998&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-facebook-square&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;#&amp;quot; class=&amp;quot;mr-1 fs-xl&amp;quot; style=&amp;quot;color:#38A1F3&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-twitter-square&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;#&amp;quot; class=&amp;quot;mr-1 fs-xl&amp;quot; style=&amp;quot;color:#0077B5&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-linkedin&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color:#000000&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-reddit-alien&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color:#00AFF0&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-skype&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color:#0063DC&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-flickr&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color: #833ab4&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-instagram&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                                                            &lt;a href=&amp;quot;javascript:void(0);&amp;quot; class=&amp;quot;fs-xl&amp;quot; style=&amp;quot;color: #c4302b&amp;quot;&gt;&lt;i class=&amp;quot;fab fa-youtube-square&amp;quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                                                                    &lt;/div&gt;\r\n                            &lt;/div&gt;\r\n                        ', 28, '2020-01-04 22:38:00', 0, 'Skorpiono'),
(3, 14, '\r\n                            przykladowa tresc<br>\r\n                            <br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-04 22:40:46', 0, 'Skorpiono'),
(4, 15, '\r\n                            apo<br>\r\n                            <br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-05 18:29:17', 0, 'Skorpiono'),
(5, 16, '\r\n                            asdasasd<br>\r\n                            <br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-05 18:34:25', 0, 'Skorpiono'),
(6, 17, '\r\n                            asdasd<br>\r\n                            <br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;http://app.localhost/img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-05 18:45:14', 0, 'asdasd'),
(7, 18, '\r\n                            <br>\r\n                            asdas<br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;http://app.localhost/img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-05 18:54:11', 1, 'Skorpiono'),
(8, 0, '\r\n                            sdfsdf<br>\r\n                            <br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;http://app.localhost/img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-08 15:46:15', 1, 'Skorpiono'),
(9, 0, '\r\n                            dfg<br>\r\n                            <br>\r\n                            <div class=&quot;d-flex d-column align-items-start mb-3&quot;>\r\n                                <img src=&quot;http://app.localhost/img/logo.png&quot; alt=&quot;SmartAdmin WebApp&quot; class=&quot;mr-3 mt-1&quot;>\r\n                                <div class=&quot;border-left pl-3&quot;>\r\n                                    <span class=&quot;fw-500 fs-lg d-block l-h-n&quot;>Szymon Zachariasz</span>\r\n                                    <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot;>Informatyk</span>\r\n                                                                        <span class=&quot;fw-400 fs-nano d-block l-h-n mb-1&quot; style=&quot;color: darkred&quot;>Administrator</span>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#3b5998&quot;><i class=&quot;fab fa-facebook-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#38A1F3&quot;><i class=&quot;fab fa-twitter-square&quot;></i></a>\r\n                                                                                                            <a href=&quot;#&quot; class=&quot;mr-1 fs-xl&quot; style=&quot;color:#0077B5&quot;><i class=&quot;fab fa-linkedin&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#000000&quot;><i class=&quot;fab fa-reddit-alien&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#00AFF0&quot;><i class=&quot;fab fa-skype&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color:#0063DC&quot;><i class=&quot;fab fa-flickr&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #833ab4&quot;><i class=&quot;fab fa-instagram&quot;></i></a>\r\n                                                                                                            <a href=&quot;javascript:void(0);&quot; class=&quot;fs-xl&quot; style=&quot;color: #c4302b&quot;><i class=&quot;fab fa-youtube-square&quot;></i></a>\r\n                                                                    </div>\r\n                            </div>\r\n                        ', 28, '2020-01-08 15:47:06', 1, 'Skorpiono'),
(10, 18, 'erterterertetrtertert', 28, '2020-01-08 20:25:03', 1, 'Skorpiono'),
(11, 18, '11111111111111111111111111sdfaa', 28, '2020-01-08 20:37:29', 1, 'Skorpiono'),
(12, 18, 'fsdfsdf', 28, '2020-01-08 20:39:36', 1, 'Skorpiono'),
(13, 18, 'asdasd', 28, '2020-01-08 20:39:39', 1, 'Skorpiono'),
(14, 18, 'asdasd', 28, '2020-01-08 20:39:41', 1, 'Skorpiono'),
(15, 18, 'asdasd', 28, '2020-01-08 20:39:45', 1, 'Skorpiono'),
(16, 18, 'asdasda', 28, '2020-01-08 20:39:51', 1, 'Skorpiono'),
(17, 18, 'sdfsd', 28, '2020-01-08 20:40:04', 1, 'Skorpiono'),
(18, 18, 'sdfsdf', 28, '2020-01-08 20:40:29', 1, 'Skorpiono'),
(19, 18, 'asdasd', 28, '2020-01-08 20:40:38', 1, 'Skorpiono'),
(20, 18, 'sdfsdfsd', 28, '2020-01-08 20:41:01', 1, 'Skorpiono'),
(21, 18, 'vxcxcv', 28, '2020-01-08 20:41:35', 1, 'Skorpiono'),
(22, 18, '', 28, '2020-01-10 19:36:29', 1, 'Skorpiono'),
(23, 18, '', 28, '2020-01-10 19:36:52', 1, 'Skorpiono'),
(24, 18, '', 28, '2020-01-11 15:26:52', 1, 'Skorpiono'),
(25, 18, '<p>zesrałem się i śmierdzi xDDDDDDDDDDDDDDDD</p>', 28, '2020-01-11 15:27:45', 1, 'Skorpiono');

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
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `onoff_option` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
(13, 'Testowy temat', 92, '2019-11-26 17:00:53', 0, 'Skorpiono', 0, 28, 0, 0, 1),
(14, 'sdfsdfs', 91, '2019-12-14 16:49:31', 0, 'Skorpiono', 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `PayPal` int(11) DEFAULT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imie` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `miasto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profesja` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `country` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_online` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `RoleID` int(11) NOT NULL DEFAULT 0,
  `newsletter` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `banned_until` timestamp(3) NULL DEFAULT NULL,
  `is_activated` varchar(3) COLLATE utf8mb4_unicode_520_ci DEFAULT 'no',
  `diary_perm` int(1) NOT NULL DEFAULT 1,
  `facebook` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `twitter` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `linkedin` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `reddit` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `skype` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flickr` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `instagram` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `youtube` varchar(180) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `avatar`, `PayPal`, `password`, `imie`, `nazwisko`, `miasto`, `profesja`, `country`, `last_online`, `date_created`, `RoleID`, `newsletter`, `banned_until`, `is_activated`, `diary_perm`, `facebook`, `twitter`, `linkedin`, `reddit`, `skype`, `flickr`, `instagram`, `youtube`) VALUES
(28, 'Skorpiono', 'skorpss@gmail.com', 'gif', NULL, '$2y$12$RhU.oxVTi6iQAo/Qq9UOb.D.5G0yVlfM5oZXk7Lmz9pOUCxieOt0W', 'Szymon', 'Zachariasz', 'Elbląg', 'Informatyk', 'PL', '2020-01-11 20:21:54', '2019-10-01 18:33:09', 1, 'yes', NULL, 'yes', 0, 'asdasdsd', 'dggf', 'dfg', 'dfgdf', 'gdfgdf', 'gfdg', 'dfgdfg', 'df'),
(29, 'Skorpiono2', 'skorpss2@gmail.com', NULL, NULL, '$2y$12$76dy/JmbT3YaF1k8SLhju.LsAqkMj6hNl8q6UVlwgx/9M3R7hLwAS', 'Szymon', 'Zachariasz', NULL, NULL, NULL, '2019-11-26 17:49:10', '2019-10-01 19:03:36', 0, 'no', '0000-00-00 00:00:00.000', 'yes', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Skorpiono4', 'skorpss4@gmail.com', NULL, NULL, '$2y$12$QKPxpcd5hIEcSUGV08illu6Zjt/JpRiL89rRacsqxDbmOfvF.fI7q', 'Krystyna', 'Zobczynska', NULL, NULL, NULL, '2019-11-26 17:49:10', '2019-10-04 16:19:07', 0, 'no', '0000-00-00 00:00:00.000', 'yes', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Priboi', 'bulrafi@gmail.com', NULL, NULL, '$2y$12$maCSEDrs0dpVnf08T8ahJu0lua21XYqAxNEfDm2eXJW/qsLl3K36S', 'Marcin', 'Kubik', NULL, NULL, NULL, '2019-11-26 17:49:10', '2019-10-19 13:31:43', 0, 'no', NULL, 'yes', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Skorpionopl', 'asdas@o2.pl', NULL, NULL, '$2y$12$i/NtBS9nB1DzNgTSOya2g.apiNgDiRPhVZLa9dQZQmg2K1EFPAaoy', 'Szymon', 'Zachariasz', NULL, NULL, NULL, '2019-11-26 17:49:10', '2019-11-12 21:04:54', 0, 'no', NULL, 'yes', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(17, 'Priboi', 'a6813c91b949d8da8bfc5dfb8c23f6d38e1051bb073ef865abe5062b8ab0ab13', '2019-10-19 13:32:16'),
(18, 'Skorpionopl', '57a14979fd1b1a55bae38e8d48a19c9e7b2442f23ed9a65c5442533a5f8f908b', '2019-11-12 21:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(13) NOT NULL,
  `facebook` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `twitter` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `linkedin` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `reddit` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `skype` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flickr` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `instagram` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `youtube` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(14) NOT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`id`, `user_id`, `setting_name`, `content`) VALUES
(1, 28, 'SYGNATURA', 'hgjgjhgjg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comic_pages`
--
ALTER TABLE `comic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diary_comments`
--
ALTER TABLE `diary_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diary_comments_to_comments`
--
ALTER TABLE `diary_comments_to_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diary_posts`
--
ALTER TABLE `diary_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_posts`
--
ALTER TABLE `f_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_rangs`
--
ALTER TABLE `f_rangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pw`
--
ALTER TABLE `pw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD UNIQUE KEY `ID` (`ID`);

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
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comic_pages`
--
ALTER TABLE `comic_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `diary_comments`
--
ALTER TABLE `diary_comments`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `diary_comments_to_comments`
--
ALTER TABLE `diary_comments_to_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diary_posts`
--
ALTER TABLE `diary_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `f_posts`
--
ALTER TABLE `f_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `f_rangs`
--
ALTER TABLE `f_rangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pw`
--
ALTER TABLE `pw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
