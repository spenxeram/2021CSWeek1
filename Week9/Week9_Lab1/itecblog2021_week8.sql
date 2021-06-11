-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2021 at 06:11 AM
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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment_text`, `comment_user`, `comment_post`, `date_created`, `comment_parent`) VALUES
(1, 'this is a test comment', 11, 7, '2021-05-28 14:53:03', NULL),
(17, 'Hello Everyone', 1, 7, '2021-05-28 19:53:08', NULL),
(3, 'test', 11, 7, '2021-05-28 14:54:41', NULL),
(4, 'test 3', 1, 7, '2021-05-28 14:54:49', NULL),
(5, 'We can comment', 11, 7, '2021-05-28 14:56:11', NULL),
(6, 'We can comment', 1, 7, '2021-05-28 15:04:26', NULL),
(7, 'htrhtr', 1, 7, '2021-05-28 15:04:31', NULL),
(8, 'Konichi wa', 11, 7, '2021-05-28 15:05:10', NULL),
(9, 'ter', 1, 7, '2021-05-28 15:08:19', NULL),
(10, 'Hio everyone\n', 1, 7, '2021-05-28 15:13:19', NULL),
(11, 'Hi everone', 11, 7, '2021-05-28 15:13:26', NULL),
(12, 'Tesy 123', 1, 7, '2021-05-28 15:21:34', NULL),
(13, 'Wow this actually works?!', 11, 7, '2021-05-28 15:22:04', NULL),
(14, 'Here is another comment~', 1, 7, '2021-05-28 15:22:18', NULL),
(15, 'Here is another comment~', 1, 7, '2021-05-28 15:45:57', NULL),
(16, 'WTF are my comments!\n', 11, 7, '2021-05-28 16:17:22', NULL),
(18, 'Tesy', 1, 1, '2021-05-31 16:57:40', NULL),
(19, 'hre', 1, 2, '2021-05-31 17:45:49', NULL),
(20, 'HI there', 1, 2, '2021-06-01 15:14:21', NULL),
(21, 'Hello Wor;d!', 1, 2, '2021-06-01 15:23:27', NULL),
(22, 'coudin kerrt', 1, 2, '2021-06-01 15:28:33', NULL),
(23, 'baka', 11, 2, '2021-06-01 16:30:22', NULL),
(24, 'test', 1, 2, '2021-06-02 11:19:05', NULL),
(25, 'Hello everyone', 11, 7, '2021-06-03 08:10:34', NULL),
(26, 'Hello', 1, 4, '2021-06-03 10:45:07', NULL),
(27, 'Hello 2', 1, 4, '2021-06-03 10:50:10', NULL),
(28, 'test', 1, 7, '2021-06-03 10:51:19', NULL),
(29, 'test', 1, 7, '2021-06-03 10:51:55', NULL),
(30, 'test', 1, 7, '2021-06-03 10:52:21', NULL),
(31, 'hrthtr', 1, 7, '2021-06-03 10:53:41', NULL),
(32, 'test', 1, 7, '2021-06-03 10:54:02', NULL),
(33, 'Hi there', 1, 2, '2021-06-03 13:11:25', NULL),
(34, 'tes test etst', 1, 7, '2021-06-03 13:11:39', NULL),
(35, 'fgre', 1, 4, '2021-06-03 16:51:53', NULL),
(36, 'test', 1, 4, '2021-06-03 18:35:25', NULL),
(37, 'ty34', 1, 0, '2021-06-03 18:46:31', NULL),
(38, 'htr', 1, 0, '2021-06-03 18:46:41', NULL),
(39, 'htrt65j', 1, 0, '2021-06-03 18:50:37', NULL),
(40, 'hgrt', 1, 0, '2021-06-03 18:50:49', NULL),
(41, 'jyt', 1, 0, '2021-06-03 18:51:45', NULL),
(42, 'yjty', 1, 0, '2021-06-03 20:51:32', NULL),
(43, '10 million', 1, 0, '2021-06-03 21:51:50', NULL),
(44, 'xin test', 1, 4, '2021-06-03 21:57:23', NULL),
(45, 'we', 1, 2, '2021-06-04 08:02:21', NULL),
(46, 'fgbdhd', 11, 2, '2021-06-04 10:04:28', NULL),
(47, 'Helo 모두 무슨 일이야', 11, 2, '2021-06-04 10:05:25', NULL),
(48, 'This is a test', 11, 2, '2021-06-04 10:11:47', NULL),
(49, 'this is a test', 11, 2, '2021-06-04 10:12:04', NULL),
(50, 'This is troll man', 11, 2, '2021-06-04 10:19:24', NULL),
(51, 'This is troll man', 11, 2, '2021-06-04 10:20:04', NULL),
(52, 'Is this actually working?', 11, 2, '2021-06-04 10:20:27', NULL),
(53, 'Hey suckas\n', 11, 2, '2021-06-04 13:07:13', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(10, 'admin444', 'austinma@hawaii.edu', '$2y$10$gc9oXn1mhk/NdnVA1R3M1uybhKCZVFkwYxGs1j9lHmcky9FSPVLJ2', '2021-05-16 15:48:28', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
