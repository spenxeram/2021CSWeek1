-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2021 at 03:59 AM
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
-- Database: `week6_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `caption`, `img`, `date_created`) VALUES
(9, 'textbook', 'images/60a5de2ed52388.56198368.jpg', '2021-05-20 10:57:34'),
(8, 'textbook', 'images/60a5dd7acbce01.05238278.jpg', '2021-05-20 10:54:34'),
(5, 'textbook', 'images/60a5db669215c2.14436943.jpg', '2021-05-20 10:45:42'),
(6, 'textbook', 'images/60a5dc59048830.48379493.jpg', '2021-05-20 10:49:45'),
(7, 'textbook', 'images/60a5dc6ea7ee13.35735491.jpg', '2021-05-20 10:50:06'),
(10, 'Taxess', 'images/60a5de466aa158.31825127.png', '2021-05-20 10:57:58'),
(11, 'taxes', 'images/60a5de6edb1717.01886441.png', '2021-05-20 10:58:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
