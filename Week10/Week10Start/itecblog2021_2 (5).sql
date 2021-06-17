-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2021 at 10:05 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itecblog2021_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `comment_text` text NOT NULL,
  `comment_user` int NOT NULL,
  `comment_post` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_parent` int DEFAULT NULL,
  `reply_to_user` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment_text`, `comment_user`, `comment_post`, `date_created`, `comment_parent`, `reply_to_user`) VALUES
(155, 'veer', 1, 7, '2021-06-09 21:46:38', 3, 11),
(79, 'gwegw', 1, 7, '2021-06-04 20:50:15', NULL, NULL),
(3, 'test', 11, 7, '2021-05-28 14:54:41', NULL, NULL),
(66, 'fg34g3', 1, 7, '2021-06-04 20:18:06', NULL, NULL),
(5, 'We can comment', 11, 7, '2021-05-28 14:56:11', NULL, NULL),
(65, 'hello world\n', 1, 7, '2021-06-04 19:17:09', NULL, NULL),
(133, 'fewfewf', 1, 7, '2021-06-08 00:14:44', 66, 1),
(8, 'Konichi wa', 11, 7, '2021-05-28 15:05:10', NULL, NULL),
(67, 'vgre', 1, 7, '2021-06-04 20:32:52', NULL, NULL),
(11, 'Hi everone', 11, 7, '2021-05-28 15:13:26', NULL, NULL),
(71, 'fewgrew', 1, 4, '2021-06-04 20:36:54', NULL, NULL),
(73, 'regerg', 1, 7, '2021-06-04 20:38:20', NULL, NULL),
(74, 'Another test', 1, 7, '2021-06-04 20:39:54', NULL, NULL),
(18, 'Tesy', 1, 1, '2021-05-31 16:57:40', NULL, NULL),
(64, 'You so baaka', 1, 2, '2021-06-04 15:54:55', NULL, NULL),
(78, 'gegrewfewgwe', 1, 7, '2021-06-04 20:42:21', NULL, NULL),
(23, 'baka', 11, 2, '2021-06-01 16:30:22', NULL, NULL),
(24, 'test', 1, 2, '2021-06-02 11:19:05', NULL, NULL),
(26, 'Hello', 1, 4, '2021-06-03 10:45:07', NULL, NULL),
(27, 'Hello 2', 1, 4, '2021-06-03 10:50:10', NULL, NULL),
(77, 'gewegewrse', 1, 7, '2021-06-04 20:41:59', NULL, NULL),
(75, '', 1, 7, '2021-06-04 20:39:56', NULL, NULL),
(72, 'vvwevew', 1, 7, '2021-06-04 20:37:44', NULL, NULL),
(68, 'vewgwer', 1, 4, '2021-06-04 20:34:20', NULL, NULL),
(33, 'Hi there', 1, 2, '2021-06-03 13:11:25', NULL, NULL),
(111, 'fewfwegwe', 12, 0, '2021-06-05 22:20:02', 66, 1),
(35, 'fgre', 1, 4, '2021-06-03 16:51:53', NULL, NULL),
(36, 'test', 1, 4, '2021-06-03 18:35:25', NULL, NULL),
(37, 'ty34', 1, 0, '2021-06-03 18:46:31', NULL, NULL),
(38, 'htr', 1, 0, '2021-06-03 18:46:41', NULL, NULL),
(39, 'htrt65j', 1, 0, '2021-06-03 18:50:37', NULL, NULL),
(40, 'hgrt', 1, 0, '2021-06-03 18:50:49', NULL, NULL),
(41, 'jyt', 1, 0, '2021-06-03 18:51:45', NULL, NULL),
(42, 'yjty', 1, 0, '2021-06-03 20:51:32', NULL, NULL),
(43, '10 million', 1, 0, '2021-06-03 21:51:50', NULL, NULL),
(44, 'xin test', 1, 4, '2021-06-03 21:57:23', NULL, NULL),
(46, 'fgbdhd', 11, 2, '2021-06-04 10:04:28', NULL, NULL),
(47, 'Helo 모두 무슨 일이야', 11, 2, '2021-06-04 10:05:25', NULL, NULL),
(48, 'This is a test', 11, 2, '2021-06-04 10:11:47', NULL, NULL),
(49, 'this is a test', 11, 2, '2021-06-04 10:12:04', NULL, NULL),
(50, 'This is troll man', 11, 2, '2021-06-04 10:19:24', NULL, NULL),
(51, 'This is troll man', 11, 2, '2021-06-04 10:20:04', NULL, NULL),
(52, 'Is this actually working?', 11, 2, '2021-06-04 10:20:27', NULL, NULL),
(53, 'Hey suckas\n', 11, 2, '2021-06-04 13:07:13', NULL, NULL),
(54, 'The is written using SQL', 1, 1, '2021-06-04 14:40:45', NULL, NULL),
(55, 'ghrhere', 11, 2, '2021-06-04 14:45:52', NULL, NULL),
(56, 'Everythign is working fine!', 11, 2, '2021-06-04 14:46:20', NULL, NULL),
(69, 'g3g3\n', 1, 4, '2021-06-04 20:34:33', NULL, NULL),
(70, '43lt3\n', 1, 4, '2021-06-04 20:35:29', NULL, NULL),
(59, 'jyjyttj', 11, 2, '2021-06-04 14:54:02', NULL, NULL),
(60, 'nrthjtrj', 11, 2, '2021-06-04 14:54:20', NULL, NULL),
(61, 'Finaly it workl eureka', 11, 2, '2021-06-04 15:01:41', NULL, NULL),
(62, 'Eureka', 1, 7, '2021-06-04 15:02:25', NULL, NULL),
(63, 'Finally it works!', 1, 7, '2021-06-04 15:03:26', NULL, NULL),
(84, 'fgm[mg4eg', 1, 7, '2021-06-04 20:56:53', NULL, NULL),
(124, 'test 23333\n', 12, 7, '2021-06-07 15:33:59', 99, 1),
(136, 'jkrjkry', 1, 4, '2021-06-09 17:24:25', 27, 1),
(135, 'jt6j6', 1, 4, '2021-06-09 17:17:35', 44, 1),
(137, 'jjtyjyjkty', 1, 4, '2021-06-09 17:31:23', 27, 1),
(93, 'ewfewfwe', 1, 7, '2021-06-04 21:07:24', NULL, NULL),
(99, 'admin | 2021-06-04 21:08:57\ngg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt5', 1, 7, '2021-06-04 21:09:25', NULL, NULL),
(98, 'gg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geggg3w4gt54;5h\'54hl; g re geg', 1, 7, '2021-06-04 21:08:57', NULL, NULL),
(103, 'Trolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the river', 11, 7, '2021-06-05 14:20:38', NULL, NULL),
(112, 'vdsbvs', 12, 0, '2021-06-05 22:22:25', 65, 1),
(113, 'This is a real response to a comment!', 12, 0, '2021-06-05 22:26:18', 3, 11),
(123, 'baka', 12, 7, '2021-06-07 15:23:44', 122, 12),
(115, 'fewfwe', 12, 0, '2021-06-05 22:29:46', 99, 1),
(116, 'vsdasvdsdcs', 12, 7, '2021-06-05 22:41:49', 11, 11),
(117, 'Heloe baka baka baka', 12, 7, '2021-06-05 22:47:47', 11, 11),
(118, 'post check', 12, 7, '2021-06-05 22:53:40', 72, 1),
(119, 'come here baka', 12, 7, '2021-06-05 23:16:40', 116, 12),
(120, 'Admin is a loser!', 12, 7, '2021-06-05 23:17:44', 9, 1),
(121, 'fewgewgewvcw', 1, 7, '2021-06-06 00:14:10', 92, 1),
(138, 'Helloo 2 you 2', 1, 4, '2021-06-09 17:36:06', 26, 1),
(126, 'erbqbq', 12, 7, '2021-06-07 15:51:21', 66, 1),
(127, 'fmgl;erge', 12, 7, '2021-06-07 16:18:45', 9, 1),
(176, 'rtwe', 1, 1, '2021-06-10 11:28:12', 127, 12),
(129, '33333333333333333', 1, 7, '2021-06-07 16:30:03', 124, 12),
(134, 'Tezgt 1000million', 12, 7, '2021-06-09 15:23:30', NULL, NULL),
(132, 'what do tiy wabt?', 1, 7, '2021-06-07 16:32:05', 131, 1),
(139, 'Well aren\'t you handsome admin', 1, 4, '2021-06-09 17:36:45', 26, 1),
(140, 'What aer you teting', 1, 7, '2021-06-09 17:37:51', 1, 11),
(141, 'anthre test', 1, 7, '2021-06-09 17:49:53', 1, 11),
(142, 'jtrjt', 1, 7, '2021-06-09 17:50:16', 1, 11),
(143, 'tykytkyt', 1, 7, '2021-06-09 17:50:47', 1, 11),
(144, 'ju5ruj5', 1, 7, '2021-06-09 17:52:14', 8, 11),
(145, 'hrehre', 1, 7, '2021-06-09 17:53:13', 8, 11),
(146, 'another comment', 1, 7, '2021-06-09 18:04:09', 134, 12),
(147, 'whcha testing?', 1, 7, '2021-06-09 19:23:46', 134, 12),
(148, 'test onemillion', 1, 7, '2021-06-09 19:24:57', 134, 12),
(149, 'can i try', 1, 7, '2021-06-09 19:26:19', 134, 12),
(150, 'CID', 1, 7, '2021-06-09 19:27:21', 103, 11),
(151, 'No Cid', 1, 7, '2021-06-09 19:27:51', 103, 11),
(152, 'Can I troll?', 1, 7, '2021-06-09 19:30:18', 103, 11),
(153, 'Anyeong', 1, 7, '2021-06-09 21:40:45', 8, 11),
(154, '<script>alert(\"Antong\");</script>', 1, 7, '2021-06-09 21:42:30', 14, 1),
(166, 'hhrtht', 1, 1, '2021-06-10 11:03:58', 155, 1),
(157, 'gregre', 1, 7, '2021-06-09 21:46:50', 3, 11),
(173, 'rthher', 1, 1, '2021-06-10 11:21:15', 157, 1),
(159, 'f3', 1, 7, '2021-06-09 21:52:51', 158, 1),
(160, 'f32f32', 1, 7, '2021-06-09 21:53:01', 158, 1),
(161, '', 12, 7, '2021-06-10 08:20:12', NULL, NULL),
(162, 'This a new comment', 12, 7, '2021-06-10 08:20:20', NULL, NULL),
(182, 'Anyeong 2', 1, 0, '2021-06-10 15:44:03', 153, 1),
(183, 'No!', 1, 0, '2021-06-10 15:53:16', 152, 1),
(167, 'Encode this', 1, 1, '2021-06-10 11:06:16', 154, 1),
(168, 'Encode this for real', 1, 1, '2021-06-10 11:06:41', 154, 1),
(169, 'Encode this for real', 1, 1, '2021-06-10 11:08:09', 154, 1),
(170, 'Encode this for real', 1, 1, '2021-06-10 11:11:22', 154, 1),
(171, 'trolling sux', 1, 1, '2021-06-10 11:11:35', 134, 12),
(172, 'ghrthr', 1, 1, '2021-06-10 11:14:14', 161, 12),
(174, 'work plz', 1, 1, '2021-06-10 11:21:42', 154, 1),
(175, 'gwregwe', 1, 1, '2021-06-10 11:27:18', 129, 1),
(177, 'no you are bala', 1, 1, '2021-06-10 11:28:47', 123, 12),
(179, 'Outpuut comment here', 1, 1, '2021-06-10 13:10:33', 132, 1),
(180, 'Hi there', 1, 4, '2021-06-10 13:11:08', 71, 1),
(181, 'This is a comment, I need coffee', 1, 4, '2021-06-10 13:47:26', NULL, NULL),
(184, 'u56u54', 1, 0, '2021-06-10 15:54:57', 150, 1),
(185, 'hrthtr', 1, 0, '2021-06-10 15:58:15', 134, 12),
(186, '4444', 1, 0, '2021-06-10 16:05:36', 129, 1),
(187, 'ntr', 1, 0, '2021-06-10 16:07:35', 127, 12),
(188, 'reh3434', 1, 0, '2021-06-10 16:09:43', 126, 12),
(189, 'hrth4th34', 1, 0, '2021-06-10 16:09:51', 188, 1),
(190, 'htrhtr', 1, 7, '2021-06-11 08:11:16', 162, 12),
(191, 'htrhtr', 1, 7, '2021-06-11 08:11:17', 162, 12),
(192, 'htrhtr', 1, 7, '2021-06-11 08:11:18', 162, 12),
(193, 'htrhtr', 1, 7, '2021-06-11 08:11:18', 162, 12),
(194, 'hhrthtr', 1, 1, '2021-06-11 08:16:13', 193, 1),
(195, 'htrhtrh', 1, 7, '2021-06-11 08:17:24', NULL, NULL),
(196, 'jyt', 1, 7, '2021-06-11 08:18:16', NULL, NULL),
(199, 'Hey how ya doin', 1, 7, '2021-06-11 13:15:11', 196, 1),
(198, 'htrhtr', 1, 7, '2021-06-11 08:19:35', 99, 1),
(200, 'Sup yo!', 12, 7, '2021-06-11 16:02:15', 11, 11),
(201, 'No likes?', 1, 7, '2021-06-11 17:00:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_body` text NOT NULL,
  `post_author` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL,
  `post_img` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_post_author` (`post_author`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `post_title`, `post_body`, `post_author`, `date_created`, `date_modified`, `post_img`) VALUES
(1, 'Test 1', 'ffgwfgwe', 1, '2021-05-14 15:15:52', '0000-00-00 00:00:00', ''),
(2, 'Konichi Wa World', 'This iis hello in Japanese', 1, '2021-05-14 15:16:16', '0000-00-00 00:00:00', ''),
(3, 'Anyeong World', 'This is hello in Korean', 1, '2021-05-14 15:19:53', '0000-00-00 00:00:00', ''),
(4, 'Xin Chao World', 'This hello in Vietnamese', 1, '2021-05-14 15:27:56', '0000-00-00 00:00:00', ''),
(5, 'LanLan post', 'Lans post', 9, '2021-05-14 15:30:12', '0000-00-00 00:00:00', ''),
(6, 'Lorem ipsum', 'Something Somwthing', 1, '2021-05-14 15:57:26', '0000-00-00 00:00:00', ''),
(7, 'A very interesting post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, '2021-05-18 18:07:23', '0000-00-00 00:00:00', 'images/Capture_60a39feb1315f.png'),
(15, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-18 18:19:30', '0000-00-00 00:00:00', 'images/13052021_60a3a2c224cdb.png'),
(16, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-18 18:34:08', '0000-00-00 00:00:00', 'images/13052021_60a3a630e2fa9.png'),
(17, 'Test100', 'errhrehre', 1, '2021-05-19 17:12:27', '0000-00-00 00:00:00', 'images/z2496181608229_4f1f21adffcfefa4f895995d1f7efd79_60a4e48bc551e.jpg'),
(18, 'Geo Legos', 'Geo playing with legos', 1, '2021-05-20 09:55:49', '0000-00-00 00:00:00', 'images/z2466769992378_c47fe5b685561b8a31a47d77cee60919_60a5cfb514558.jpg'),
(19, 'Nam playing with Legos', 'Nam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with Legos\r\nNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with Legos', 1, '2021-05-20 10:09:34', '0000-00-00 00:00:00', 'images/z2466770042114_36957a730c691ce2836633a2402e00b9_60a5d2ee8cf4b.jpg'),
(20, ' Broadcast 24', 'greregrre', 1, '2021-05-21 09:59:38', '0000-00-00 00:00:00', 'images2/60a7221a80daf6.97186624.jpeg'),
(21, 'Final test', 'bhtrhtrhrthrt', 1, '2021-05-21 10:02:17', '0000-00-00 00:00:00', 'images2/60a722b96ea1c7.79700945.jpeg'),
(23, 'Geometric Post', 'BREAKTIME [0920-0930]\r\nToday\'s Topic:\r\n\r\n---------------------------------------------------------\r\n-Create a post with an image\r\n-Create a checkPost() function that will handle the post\r\nvalidation as well as file validation.\r\n-Then hand of the post content and img path to a\r\ncreatePost() function\r\n-Validate the file upload with a function validateFile()\r\nwhich returns either an error or the path file for the image \r\n\r\n\r\n\r\n\r\n\r\n\r\nBREAK TIME [1430-1455]\r\n\r\nToday\'s Topic:\r\n---------------------------------------------------------\r\n-$_FILES superglobal and managing file uploads\r\n-Validating file uploads [extentions, size, errors]\r\n-Moving files from \'temp\' directory to project directory\r\n-Writing file locations to the DB\r\n-Refactoring PRODCEDURAL code into FUNCTIONAL code\r\n---------------------------------------------------------\r\n\r\nActivity: \r\n-Convert ITEC Blog from PROCEDURAL to FUNCTIONAL code\r\n-Add blog image uploading', 1, '2021-05-21 10:28:23', '0000-00-00 00:00:00', 'images2/60a728d7ae0ac5.85947678.png'),
(24, 'My kids', 'Tghem playing', 1, '2021-05-21 13:09:00', '0000-00-00 00:00:00', 'images2/60a74e7ca2f8d8.17369237.jpeg'),
(25, ' Broadcast 24', 'gregre', 1, '2021-05-21 14:51:19', '0000-00-00 00:00:00', 'images2/60a76677e8976.jpeg'),
(26, 'Purple Geometry', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-05-21 15:00:30', '0000-00-00 00:00:00', 'images2/60a7689ea3a44.jpeg'),
(27, 'Nam and Geo ', 'They ar eplaying with Legoos. BREAKTIME [1415-1428];\r\nToday\'s Topic:\r\n\r\n---------------------------------------------------------\r\n-Create a post with an image\r\n-Create a checkPost() function that will handle the post\r\nvalidation as well as file validation.\r\n-Then hand of the post content and img path to a\r\ncreatePost() function\r\n-Validate the file upload with a function validateFile()\r\nwhich returns either an error or the path file for the image \r\n\r\n\r\n\r\n\r\n\r\n\r\nBREAK TIME [1430-1455]\r\n\r\nToday\'s Topic:\r\n---------------------------------------------------------\r\n-$_FILES superglobal and managing file uploads\r\n-Validating file uploads [extentions, size, errors]\r\n-Moving files from \'temp\' directory to project directory\r\n-Writing file locations to the DB\r\n-Refactoring PRODCEDURAL code into FUNCTIONAL code\r\n---------------------------------------------------------\r\n\r\nActivity: \r\n-Convert ITEC Blog from PROCEDURAL to FUNCTIONAL code\r\n-Add blog image uploading', 1, '2021-05-21 15:18:47', '0000-00-00 00:00:00', 'images2/60a76ce7e44fb.jpeg'),
(28, ' Broadcast 24', 'ghher', 1, '2021-05-28 08:08:21', '0000-00-00 00:00:00', 'images2/60b04285b09c67.06262054.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `review_value` int NOT NULL,
  `review_type` varchar(255) NOT NULL DEFAULT 'thumb',
  `user_id` int NOT NULL,
  `comment_id` int DEFAULT NULL,
  `post_id` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `review_value`, `review_type`, `user_id`, `comment_id`, `post_id`, `date_created`) VALUES
(1, 2, 'thumb', 1, 196, 7, '2021-06-11 14:06:39'),
(2, 2, 'thumb', 1, 103, 7, '2021-06-11 14:11:45'),
(3, 1, 'thumb', 1, 84, 7, '2021-06-11 14:11:48'),
(4, 2, 'thumb', 1, 78, 7, '2021-06-11 14:11:50'),
(5, 1, 'thumb', 1, 75, 7, '2021-06-11 14:11:51'),
(6, 2, 'thumb', 1, 74, 7, '2021-06-11 14:11:53'),
(7, 2, 'thumb', 1, 73, 7, '2021-06-11 14:11:54'),
(8, 1, 'thumb', 1, 195, 7, '2021-06-11 14:36:21'),
(9, 1, 'thumb', 1, 162, 7, '2021-06-11 14:36:46'),
(10, 1, 'thumb', 1, 148, 7, '2021-06-11 14:43:09'),
(11, 2, 'thumb', 1, 150, 7, '2021-06-11 14:45:53'),
(12, 2, 'thumb', 1, 151, 7, '2021-06-11 14:46:00'),
(13, 2, 'thumb', 1, 152, 7, '2021-06-11 14:46:15'),
(14, 1, 'thumb', 1, 14, 7, '2021-06-11 14:50:30'),
(15, 2, 'thumb', 1, 99, 7, '2021-06-11 14:50:58'),
(16, 1, 'thumb', 1, 77, 7, '2021-06-11 14:51:41'),
(17, 1, 'thumb', 1, 72, 7, '2021-06-11 14:53:25'),
(18, 1, 'thumb', 1, 66, 7, '2021-06-11 14:54:42'),
(19, 1, 'thumb', 1, 65, 7, '2021-06-11 14:55:03'),
(20, 1, 'thumb', 1, 93, 7, '2021-06-11 14:56:31'),
(21, 2, 'thumb', 1, 199, 7, '2021-06-11 15:13:50'),
(22, 2, 'thumb', 1, 134, 7, '2021-06-11 15:24:31'),
(23, 1, 'thumb', 11, 196, 7, '2021-06-11 15:26:37'),
(24, 2, 'thumb', 11, 199, 7, '2021-06-11 15:26:40'),
(25, 2, 'thumb', 11, 195, 7, '2021-06-11 15:26:42'),
(26, 1, 'thumb', 11, 162, 7, '2021-06-11 15:26:43'),
(27, 2, 'thumb', 11, 190, 7, '2021-06-11 15:26:44'),
(28, 2, 'thumb', 11, 193, 7, '2021-06-11 15:26:47'),
(29, 2, 'thumb', 11, 134, 7, '2021-06-11 15:26:49'),
(30, 2, 'thumb', 11, 161, 7, '2021-06-11 15:27:58'),
(31, 1, 'thumb', 11, 148, 7, '2021-06-11 15:36:21'),
(32, 2, 'thumb', 11, 103, 7, '2021-06-11 15:36:24'),
(33, 1, 'thumb', 11, 150, 7, '2021-06-11 15:36:27'),
(34, 2, 'thumb', 11, 152, 7, '2021-06-11 15:36:29'),
(35, 1, 'thumb', 11, 99, 7, '2021-06-11 15:36:30'),
(36, 1, 'thumb', 11, 198, 7, '2021-06-11 15:36:31'),
(37, 1, 'thumb', 11, 124, 7, '2021-06-11 15:36:32'),
(38, 2, 'thumb', 11, 149, 7, '2021-06-11 15:44:54'),
(39, 1, 'thumb', 11, 98, 7, '2021-06-11 15:45:58'),
(40, 2, 'thumb', 11, 93, 7, '2021-06-11 15:46:02'),
(41, 1, 'thumb', 11, 84, 7, '2021-06-11 15:46:03'),
(42, 2, 'thumb', 11, 78, 7, '2021-06-11 15:46:06'),
(43, 2, 'thumb', 11, 79, 7, '2021-06-11 15:46:07'),
(44, 1, 'thumb', 11, 75, 7, '2021-06-11 15:46:10'),
(45, 2, 'thumb', 11, 74, 7, '2021-06-11 15:52:26'),
(46, 2, 'thumb', 12, 199, 7, '2021-06-11 15:56:01'),
(47, 2, 'thumb', 12, 195, 7, '2021-06-11 15:56:08'),
(48, 2, 'thumb', 12, 162, 7, '2021-06-11 15:56:10'),
(49, 2, 'thumb', 12, 190, 7, '2021-06-11 15:56:32'),
(50, 2, 'thumb', 12, 191, 7, '2021-06-11 15:56:36'),
(51, 2, 'thumb', 12, 193, 7, '2021-06-11 15:56:38'),
(52, 2, 'thumb', 12, 134, 7, '2021-06-11 15:56:39'),
(53, 1, 'thumb', 12, 147, 7, '2021-06-11 15:56:41'),
(54, 1, 'thumb', 12, 149, 7, '2021-06-11 15:56:42'),
(55, 2, 'thumb', 12, 103, 7, '2021-06-11 15:56:44'),
(56, 2, 'thumb', 12, 150, 7, '2021-06-11 15:56:45'),
(57, 2, 'thumb', 12, 151, 7, '2021-06-11 15:56:46'),
(58, 1, 'thumb', 12, 99, 7, '2021-06-11 15:56:48'),
(59, 1, 'thumb', 12, 198, 7, '2021-06-11 15:56:49'),
(60, 1, 'thumb', 12, 72, 7, '2021-06-11 15:59:29'),
(61, 1, 'thumb', 12, 118, 7, '2021-06-11 15:59:34'),
(62, 1, 'thumb', 12, 66, 7, '2021-06-11 15:59:36'),
(63, 2, 'thumb', 12, 126, 7, '2021-06-11 15:59:39'),
(64, 2, 'thumb', 12, 133, 7, '2021-06-11 15:59:40'),
(65, 2, 'thumb', 12, 65, 7, '2021-06-11 15:59:42'),
(66, 1, 'thumb', 12, 8, 7, '2021-06-11 15:59:45'),
(67, 1, 'thumb', 12, 192, 7, '2021-06-11 15:59:54'),
(68, 2, 'thumb', 12, 11, 7, '2021-06-11 16:02:01'),
(69, 2, 'thumb', 12, 200, 7, '2021-06-11 16:06:53'),
(70, 2, 'thumb', 12, 78, 7, '2021-06-11 16:07:06'),
(71, 1, 'thumb', 12, 79, 7, '2021-06-11 16:07:09'),
(72, 2, 'thumb', 12, 98, 7, '2021-06-11 16:07:11'),
(73, 2, 'thumb', 12, 196, 7, '2021-06-11 16:07:25'),
(74, 2, 'thumb', 12, 73, 7, '2021-06-11 16:53:50'),
(75, 2, 'thumb', 12, 152, 7, '2021-06-11 16:54:02'),
(76, 2, 'thumb', 1, 5, 7, '2021-06-11 17:00:59'),
(77, 2, 'thumb', 1, 124, 7, '2021-06-11 17:03:13'),
(78, 2, 'thumb', 1, 198, 7, '2021-06-11 17:03:18'),
(79, 1, 'thumb', 1, 133, 7, '2021-06-11 17:03:26'),
(80, 2, 'thumb', 1, 154, 7, '2021-06-11 17:03:28'),
(81, 1, 'thumb', 1, 155, 7, '2021-06-11 17:03:42'),
(82, 2, 'thumb', 1, 157, 7, '2021-06-11 17:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role` int NOT NULL DEFAULT '2',
  `user_img` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `date_created`, `user_role`, `user_img`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$GVDIQlbrdhvHz/uvCnjVfOrviyJlXw82y0GThSBnnku/3hCv8cmE2', '2021-05-13 15:21:19', 1, ''),
(2, 'sammy', 'spenceraustinmartin@gmail.com', '$2y$10$WvU2ZpRw4D89mI4T5gP94uWAlCtQAS4DEKaletM4EbSVXXIv62xLG', '2021-05-13 15:52:01', 2, ''),
(3, 'itecsam', 'itec@gmail.com', '$2y$10$SorJT/f0POgxherI65T.m.6LBMj8h79C4O6g3D9/aPRVDTei5d4Lq', '2021-05-13 15:56:31', 2, ''),
(4, 'sammy5', 'itec@gmail.com', '$2y$10$Nvne/vpMGf346RrfqrMU2uelb808MXU9Xd1brliUr0Vi0G2NGxE..', '2021-05-13 16:02:09', 2, ''),
(5, 'lanlan', 'lan@gmail.com', '$2y$10$5wboupRIFbCFzSQ6qrIGzeICVWgkJ7ZWMsbLRzvmoUsnDCw21rgXa', '2021-05-13 16:14:34', 2, ''),
(6, 'lanlan2', 'spenceraustinmartin@gmail.com', '$2y$10$5fSkqGXIT1.apsTicHQbwOAlZd8wkB0vSn3aEcTHgQ0driTysUJ62', '2021-05-14 13:52:32', 2, ''),
(7, 'lanlan22', 'spenceraustinmartin@gmail.com', '$2y$10$aKZKm1kvq1CHMqsjaR2LG.xyvgPCTrNUVxz9kqJ1ft1GwjlM7.XPW', '2021-05-14 13:58:14', 2, ''),
(8, 'admin10', 'austinma@hawaii.edu', '$2y$10$zHtcMUf9Vmgu7oFB/22Dbe4KtbAdZEX6omLCaR55/D3C97KFqAu1y', '2021-05-14 14:38:10', 2, ''),
(11, 'Troll2021', 'austinma@hawaii.edu', '$2y$10$FGYkfzXIyhdZ0cz9s9LmOOYQfn7Xsp61yzYe9Q3iZ3thDCR3BDELa', '2021-06-04 09:04:53', 2, ''),
(10, 'admin444', 'austinma@hawaii.edu', '$2y$10$gc9oXn1mhk/NdnVA1R3M1uybhKCZVFkwYxGs1j9lHmcky9FSPVLJ2', '2021-05-16 15:48:28', 2, ''),
(12, 'TrollMaster', 'austinma@hawaii.edu', '$2y$10$J4E5Z5MtCvI5YgPtLx8J1OZHpQXv/J1ZDYlDgE6JB6PfB872xrY6K', '2021-06-05 15:04:42', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
