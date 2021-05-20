-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2021 at 01:07 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `date_created`, `user_role`, `user_img`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$7307yoVY7Tv36nU20PO6WOX8jBFlxxieXDid41KreFh/CPw6mq1zO', '2021-05-13 15:21:19', 1, ''),
(2, 'sammy', 'spenceraustinmartin@gmail.com', '$2y$10$WvU2ZpRw4D89mI4T5gP94uWAlCtQAS4DEKaletM4EbSVXXIv62xLG', '2021-05-13 15:52:01', 2, ''),
(3, 'itecsam', 'itec@gmail.com', '$2y$10$SorJT/f0POgxherI65T.m.6LBMj8h79C4O6g3D9/aPRVDTei5d4Lq', '2021-05-13 15:56:31', 2, ''),
(4, 'sammy5', 'itec@gmail.com', '$2y$10$Nvne/vpMGf346RrfqrMU2uelb808MXU9Xd1brliUr0Vi0G2NGxE..', '2021-05-13 16:02:09', 2, ''),
(5, 'lanlan', 'lan@gmail.com', '$2y$10$5wboupRIFbCFzSQ6qrIGzeICVWgkJ7ZWMsbLRzvmoUsnDCw21rgXa', '2021-05-13 16:14:34', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
