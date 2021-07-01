-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2021 at 01:23 AM
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
-- Database: `final2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `classmates`
--

DROP TABLE IF EXISTS `classmates`;
CREATE TABLE IF NOT EXISTS `classmates` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `classmate_name` varchar(255) NOT NULL,
  `classmate_age` int NOT NULL,
  `classmate_gender` varchar(255) NOT NULL,
  `classmate_major` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classmates`
--

INSERT INTO `classmates` (`ID`, `classmate_name`, `classmate_age`, `classmate_gender`, `classmate_major`, `date_created`) VALUES
(1, 'Shinosuke', 7, 'male', 'Echi Studies', '2021-07-01 08:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `user_role` int NOT NULL DEFAULT '2',
  `gender` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `user_role`, `gender`, `date_created`) VALUES
(1, 'admin', 'sam@gmail.com', '$2y$10$QCPxeIfCuUYa4KtRjQeFA.owcdCSXuqiVu/GKgDM2N.xkHEjwcCVu', 1, 'male', '2021-06-25 13:44:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
