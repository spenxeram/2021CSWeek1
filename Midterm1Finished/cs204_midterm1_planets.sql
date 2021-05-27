-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2021 at 01:08 AM
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
-- Database: `cs204_midterm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

DROP TABLE IF EXISTS `planets`;
CREATE TABLE IF NOT EXISTS `planets` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `moons` int NOT NULL,
  `position` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `imgurl` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`ID`, `name`, `moons`, `position`, `type`, `imgurl`, `date_created`) VALUES
(1, 'Mercury', 0, 1, 'terrestrial', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Mercury_in_color_-_Prockter07-edit1.jpg/1200px-Mercury_in_color_-_Prockter07-edit1.jpg', '2021-05-25 08:19:10'),
(2, 'Venus', 0, 2, 'terrestrial', 'http://cen.acs.org/content/dam/cen/99/11/WEB/09911-feature3-venus.jpg', '2021-05-25 08:20:03'),
(10, 'Earth', 1, 3, 'terrestrial', 'https://planetfacts.org/wp-content/uploads/2010/06/Earth.jpg', '2021-05-25 13:20:30'),
(4, 'Mars', 2, 4, 'terrestrial', 'https://evaspellman.files.wordpress.com/2013/06/images.jpg', '2021-05-25 11:01:14'),
(5, 'Jupiter', 79, 5, 'gaseous', 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Jupiter_and_its_shrunken_Great_Red_Spot.jpg', '2021-05-25 11:02:05'),
(6, 'Saturn', 82, 6, 'gaseous', 'https://scitechdaily.com/images/Saturn-Season-Transitions.gif', '2021-05-25 11:04:01'),
(7, 'Uranus', 27, 7, 'gaseous', 'https://i.pinimg.com/originals/50/92/3e/50923e1764ad4fdc3c6ff32e2aaa122d.gif', '2021-05-25 11:05:37'),
(9, 'Neptune', 17, 8, 'gaseous', 'https://i.pinimg.com/originals/15/0e/57/150e571009d45c5ea290ec66fc2bdb49.jpg', '2021-05-25 11:24:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
