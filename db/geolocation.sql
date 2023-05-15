-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2023 at 10:15 AM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geolocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `title`, `address`, `latitude`, `longitude`, `created`, `modified`, `status`) VALUES
(1, 'Urab AVenues', 'Noida  sector 62', '28.61838015338867', '77.37118441287662', '2023-05-13 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Shri Satyanarayan Mandir', 'H6GC+RMJ, Aliganj, Kotla Mubarakpur, New Delhi, Delhi 110003', '28.57724079509229', '77.22094369935085', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Cleo Count', 'Noida Sector 121', '28.59862029965422', '77.39135351965567', '2023-05-14 00:00:00', '2023-05-14 00:00:00', 1),
(4, 'Godrej Woods', 'Noida, Sector 43', '28.563988471653843', '77.35044009106639', '2023-05-14 00:00:00', '2023-05-14 00:00:00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
