-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 07:07 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `casterly_rock`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `emailaddress` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `adminid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`emailaddress`, `password`, `adminid`) VALUES
('mwirigimichael@gmail.com', '123456', '1'),
('tole@gmail.com', '123456', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `productid` int(11) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `date-added` date DEFAULT NULL,
  `delivery_location` varchar(45) DEFAULT NULL,
`cartid` int(11) NOT NULL,
  `Customerid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productid`, `quantity`, `price`, `date-added`, `delivery_location`, `cartid`, `Customerid`) VALUES
(NULL, NULL, NULL, NULL, NULL, 8, 3),
(2, '15', NULL, NULL, 'madaraka', 9, 3),
(3, '5', NULL, NULL, 'cbd', 10, 3),
(NULL, NULL, NULL, NULL, NULL, 11, 2),
(1, '5', NULL, NULL, 'cbd', 14, 5),
(2, '15', NULL, NULL, 'westlands', 15, 5),
(NULL, NULL, NULL, NULL, NULL, 16, 1),
(NULL, NULL, NULL, NULL, NULL, 18, 1),
(1, '15', NULL, NULL, 'westlands', 25, 1),
(3, '10', NULL, NULL, 'westlands', 26, 8),
(3, '10', NULL, NULL, 'westlands', 28, 9),
(2, '10', NULL, NULL, 'cbd', 29, 9),
(0, '', NULL, NULL, '', 30, 13),
(3, '10', NULL, NULL, 'cbd', 31, 2),
(2, '15', NULL, NULL, 'cbd', 32, 2),
(NULL, NULL, NULL, NULL, NULL, 33, 1),
(3, '10', NULL, NULL, 'cbd', 34, 1),
(2, '10', NULL, NULL, 'cbd', 35, 0),
(2, '10', NULL, NULL, 'cbd', 36, 0),
(3, '15', NULL, NULL, 'westlands', 37, 18),
(1, '10', NULL, NULL, 'westlands', 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`Custid` int(11) NOT NULL,
  `CName` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `TelNo` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `titleid` varchar(45) NOT NULL,
  `status` tinytext
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Custid`, `CName`, `emailAddress`, `TelNo`, `Password`, `titleid`, `status`) VALUES
(1, 'MICHAEL M MUTHAMIA', 'mwirigimichael@gmail.com', '+254714861673', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(2, 'Rading', 'r@gmail.com', '123456789', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(3, 'ashi', 'a@gmail.com', '12345678', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(5, 'james', 'james@gmail.com', '0722785386', '6562c5c1f33db6e05a082a88cddab5ea', '', NULL),
(8, 'susan', 's@gmail.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(13, 'robin', 'ro@gmail.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(14, 'micah', 'micah@gmail.coom', '123456789', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(15, NULL, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '', NULL),
(16, 'nicole', 'kidman', '0712345678', 'e10adc3949ba59abbe56e057f20f883e', '', NULL),
(17, '', '', '', '202cb962ac59075b964b07152d234b70', '', NULL),
(18, 'robin', 'robinmigwi@gmail.com', '0725359390', '5850c02d38486d945888516faa078eef', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderid` int(11) NOT NULL,
  `Customer_Custid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Productid` int(11) NOT NULL,
  `ProdName` varchar(45) DEFAULT NULL,
  `ImageAddr` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `description` varchar(250) NOT NULL,
  `category` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'active/not active',
  `waiting_time` float NOT NULL DEFAULT '0' COMMENT 'waiting time in minutes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Productid`, `ProdName`, `ImageAddr`, `price`, `description`, `category`, `status`, `waiting_time`) VALUES
(1, 'chicken wings', 'images/chicken_wings.jpg', '500', '', 'chicken', 0, 3000),
(2, 'Drum Sticks', 'images/drum_sticks.jpg', '300', '', 'chicken', 0, 0),
(3, 'Pork Chops', 'images/pork.jpe', '1500', '', 'pork', 0, 3500),
(4, 'Chicken Burger', 'images/chicken_burger.jpg', '300', 'Our juicy chicken burger with crispy lettuce,crunchy red onins and zippy tahini sauce will make you cry..trust us', 'burger', 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `titleid` int(11) NOT NULL,
  `titlenamel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`titleid`, `titlenamel`) VALUES
(1, 'Mr'),
(2, 'Mrs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`Custid`,`titleid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`orderid`,`Customer_Custid`), ADD KEY `fk_Order_Customer_idx` (`Customer_Custid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`Productid`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
 ADD PRIMARY KEY (`titleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `Custid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
