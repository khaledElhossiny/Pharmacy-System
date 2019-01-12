-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2019 at 07:05 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_ID` int(11) NOT NULL,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Img_Path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Category_ID`, `Name`, `Amount`, `Price`, `Description`, `Img_Path`) VALUES
(39, 3, 'zantac 3.4mg', 342, 134, 'fjdjshfjf', '3.jpg'),
(35, 2, 'DETOL', 150, 102, 'hand Sanitizer and detergent 99.9% Free virus', '4.png'),
(36, 1, 'moov cream', 180, 15, 'muscle cream', '4.png'),
(34, 3, 'zantac', 150, 15, 'cold & flu', '3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
