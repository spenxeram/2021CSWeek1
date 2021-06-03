-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2021 at 01:16 AM
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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(7, 'i756', '6767o76', 1, '2021-05-18 18:07:23', '0000-00-00 00:00:00', 'images/Capture_60a39feb1315f.png'),
(8, 'test', 'y54', 1, '2021-05-18 18:09:11', '0000-00-00 00:00:00', 'images/15052021_60a3a05732f38.png'),
(9, 'jtrjtr', 'jtrjtr', 1, '2021-05-18 18:10:44', '0000-00-00 00:00:00', 'images/17052021_60a3a0b4b6a5b.png'),
(10, 'jtrjtr', 'jtrjtr', 1, '2021-05-18 18:12:43', '0000-00-00 00:00:00', 'images/17052021_60a3a12b278ad.png'),
(11, 'jtrjtr', 'jtrjtr', 1, '2021-05-18 18:14:50', '0000-00-00 00:00:00', 'images/17052021_60a3a1aacc41e.png'),
(12, 'jtrjtr', 'jtrjtr', 1, '2021-05-18 18:15:18', '0000-00-00 00:00:00', 'images/17052021_60a3a1c60f7e2.png'),
(13, 'jtrjtr', 'jtrjtr', 1, '2021-05-18 18:15:58', '0000-00-00 00:00:00', 'images/17052021_60a3a1ee2fc98.png'),
(14, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-18 18:16:42', '0000-00-00 00:00:00', 'images/13052021_60a3a21abee02.png'),
(15, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-18 18:19:30', '0000-00-00 00:00:00', 'images/13052021_60a3a2c224cdb.png'),
(16, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-18 18:34:08', '0000-00-00 00:00:00', 'images/13052021_60a3a630e2fa9.png'),
(17, 'Test100', 'errhrehre', 1, '2021-05-19 17:12:27', '0000-00-00 00:00:00', 'images/z2496181608229_4f1f21adffcfefa4f895995d1f7efd79_60a4e48bc551e.jpg'),
(18, 'Geo Legos', 'Geo playing with legos', 1, '2021-05-20 09:55:49', '0000-00-00 00:00:00', 'images/z2466769992378_c47fe5b685561b8a31a47d77cee60919_60a5cfb514558.jpg'),
(19, 'Nam playing with Legos', 'Nam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with Legos\r\nNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with Legos', 1, '2021-05-20 10:09:34', '0000-00-00 00:00:00', 'images/z2466770042114_36957a730c691ce2836633a2402e00b9_60a5d2ee8cf4b.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(9, 'Lanlanlan', 'lan@gmail.com', '$2y$10$mkaU.KrADYNMLN0L/la6v.VhPDQDcDZCcsBFmQAXtBHm610nyBGJC', '2021-05-14 15:30:00', 2, ''),
(10, 'admin444', 'austinma@hawaii.edu', '$2y$10$gc9oXn1mhk/NdnVA1R3M1uybhKCZVFkwYxGs1j9lHmcky9FSPVLJ2', '2021-05-16 15:48:28', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
