-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2023 at 08:52 AM
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
-- Table structure for table `rc_propertylist`
--

DROP TABLE IF EXISTS `rc_propertylist`;
CREATE TABLE IF NOT EXISTS `rc_propertylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_bed` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '2bhk',
  `p_bath` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '2toilet',
  `p_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'office space,residential,villla etc',
  `p_price` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'bsp',
  `p_sell_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'listing',
  `p_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'property image',
  `latitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rc_propertylist`
--

INSERT INTO `rc_propertylist` (`id`, `title`, `address`, `p_area`, `p_bed`, `p_bath`, `p_type`, `p_price`, `p_sell_type`, `p_img`, `latitude`, `longitude`, `created`, `modified`, `status`) VALUES
(1, 'Urab AVenues', 'Noida  sector 62', '80000', '3', '2', 'Office Space', '123000', 'Buy', 'urban_AVenues.jpg', '28.61838015338867', '77.37118441287662', '2023-05-13 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Shri Satyanarayan Mandir', 'H6GC+RMJ, Aliganj, Kotla Mubarakpur, New Delhi, Delhi 110003', '20000', '3', '2', 'Residential', '123999', 'Rent', 'Shri_Satyanarayan_Mandir.jpg', '28.57724079509229', '77.22094369935085', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Cleo Count', 'Noida Sector 121', '11000', '4', '3', 'Residential', '1200', 'Sell', 'cleo-county.jpg', '28.59862029965422', '77.39135351965567', '2023-05-14 00:00:00', '2023-05-14 00:00:00', 1),
(4, 'Godrej Woods', 'Noida, Sector 43', '15000', '', '', 'Residential', '4000', 'Sell', 'godrej-woods.jpg', '28.563988471653843', '77.35044009106639', '2023-05-14 00:00:00', '2023-05-14 00:00:00', 1),
(5, 'Harmony Apartments', 'Sector 62 Noida', '1000', '2', '2', 'Appartment', '12000', 'Buy', 'Harmony_Apartments.jpg', '28.61398590759691', '77.37100457829614', '2023-05-19 00:00:00', '2023-05-19 00:00:00', 1),
(7, 'Panchvati Apartment', 'Sector 62 Noida', '1200', '3', '2', 'Appartment', '3000', 'Sell', 'Panchvati_Apartment.jpg', '28.62351325901282', '77.37029850182789', '2023-05-19 00:00:00', '2023-05-19 00:00:00', 1),
(8, 'Indian Oil Society', 'Sector 62 Noida', '1100', '4', '3', 'Office Space', '6000', 'Sell', 'Indian_Oil_Society.jpg', '28.614697990309335', '77.37055599388489', '2023-05-19 00:00:00', '2023-05-19 00:00:00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
