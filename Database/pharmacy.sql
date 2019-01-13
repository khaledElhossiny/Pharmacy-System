-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 10:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `TotalPrice` double NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `TotalPrice`, `User_ID`, `Status`) VALUES
(2, 35, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `ID` int(11) NOT NULL,
  `Cart_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`ID`, `Cart_ID`, `Product_ID`, `Quantity`, `TotalPrice`) VALUES
(1, 2, 39, 1, 134),
(2, 2, 42, 1, 20),
(3, 2, 34, 1, 15),
(4, 2, 36, 1, 15),
(5, 2, 42, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `URL` varchar(256) NOT NULL,
  `FriendlyName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `URL`, `FriendlyName`) VALUES
(1, 'Register.php', 'Register'),
(2, 'Login.php', 'Login'),
(3, 'DeleteUser.php', 'User Panel'),
(4, 'Ay7aga', 'Ay7aga');

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `ID` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`ID`, `Phone`, `User_ID`) VALUES
(15, 12145252, 21);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Img_Path` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Category_ID`, `Name`, `Amount`, `Price`, `Description`, `Img_Path`) VALUES
(39, 3, 'zantac 3.4mg', 342, 134, 'fjdjshfjf', '3.jpg'),
(42, 0, 'Panadol', 30, 20, 'aaaa', 'C:UsersmohamDesktopCapture.PNG'),
(36, 1, 'moov cream', 180, 15, 'muscle cream', '4.png'),
(34, 3, 'zantac', 150, 15, 'cold & flu', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(256) NOT NULL,
  `Lastname` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Usertype_ID` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Gender` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Firstname`, `Lastname`, `Email`, `Username`, `Password`, `Usertype_ID`, `DOB`, `Address`, `Gender`) VALUES
(21, 'Admin', 'Admin', 'Admin@gmail.com', 'Admin2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2018-12-14', 'giza', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `ID` int(11) NOT NULL,
  `Type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID`, `Type`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `usertypepages`
--

CREATE TABLE `usertypepages` (
  `ID` int(11) NOT NULL,
  `Usertype_ID` int(11) NOT NULL,
  `Pages_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypepages`
--

INSERT INTO `usertypepages` (`ID`, `Usertype_ID`, `Pages_ID`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 1, 2),
(4, 1, 1),
(5, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cart_ID` (`Cart_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Usertype_ID` (`Usertype_ID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usertypepages`
--
ALTER TABLE `usertypepages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Usertype_ID` (`Usertype_ID`),
  ADD KEY `Pages_ID` (`Pages_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertypepages`
--
ALTER TABLE `usertypepages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Usertype_ID`) REFERENCES `usertype` (`ID`);

--
-- Constraints for table `usertypepages`
--
ALTER TABLE `usertypepages`
  ADD CONSTRAINT `usertypepages_ibfk_1` FOREIGN KEY (`Usertype_ID`) REFERENCES `usertype` (`ID`),
  ADD CONSTRAINT `usertypepages_ibfk_2` FOREIGN KEY (`Pages_ID`) REFERENCES `pages` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
