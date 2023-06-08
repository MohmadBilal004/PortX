-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 09, 2023 at 07:44 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankd`
--

DROP TABLE IF EXISTS `bankd`;
CREATE TABLE IF NOT EXISTS `bankd` (
  `Account_No` int(11) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Bank_Name` varchar(50) NOT NULL,
  `Account_holder` varchar(80) NOT NULL,
  `Bank_Statement` varchar(100) NOT NULL,
  PRIMARY KEY (`Account_No`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivertbl`
--

DROP TABLE IF EXISTS `drivertbl`;
CREATE TABLE IF NOT EXISTS `drivertbl` (
  `Fname` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `NICno` varchar(12) NOT NULL,
  `Licsense` varchar(12) NOT NULL,
  `Location` varchar(655) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Photo` varchar(600) NOT NULL,
  `Jobs` int(11) NOT NULL,
  `Kilometers` float NOT NULL DEFAULT '0',
  `Commission` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Licsense` (`Licsense`),
  UNIQUE KEY `NICno` (`NICno`),
  UNIQUE KEY `Phone` (`Phone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivertbl`
--

INSERT INTO `drivertbl` (`Fname`, `LName`, `NICno`, `Licsense`, `Location`, `Email`, `Phone`, `Gender`, `Photo`, `Jobs`, `Kilometers`, `Commission`) VALUES
('sahid', 'amhr', '12312313232', '323232', 'Colombo 02', 'sahidamhr@gmail.com', 1231232131, 'Male', 'uploads/Sahid.jpg', 0, 0, 0),
('Jess', 'Rebecca', '1234231231', '56201b45', 'Colombo 03', 'Watchdogs@gmail.com', 256341789, 'Female', 'uploads/JessRebecca.jpg', 0, 0, 0),
('Abdullah', 'Fayyaz', '2323232323', '12313213', 'Colombo 04', 'abdullafayyaz@gmail.com', 775206851, 'Male', 'uploads/', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

DROP TABLE IF EXISTS `ordertbl`;
CREATE TABLE IF NOT EXISTS `ordertbl` (
  `OrdeID` int(11) NOT NULL AUTO_INCREMENT,
  `Bid` varchar(4) NOT NULL,
  `DriverName` varchar(110) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Delivereddate` datetime NOT NULL,
  `Package` varchar(30) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Weight` float NOT NULL,
  `Status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'placed',
  `Payment_Method` varchar(30) NOT NULL,
  PRIMARY KEY (`OrdeID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`OrdeID`, `Bid`, `DriverName`, `OrderDate`, `Delivereddate`, `Package`, `Price`, `Weight`, `Status`, `Payment_Method`) VALUES
(1, '1', '', '2023-05-03 21:53:36', '0000-00-00 00:00:00', 'test', '977644.00', 78, 'placed', 'test'),
(2, '1', 'sahid', '2023-05-09 00:00:01', '2023-05-11 00:00:00', 'test', '977644.00', 78, 'Delivered', 'test'),
(3, '1', 'sahid', '2023-04-20 00:00:00', '2023-05-01 00:00:00', 'test', '977644.00', 78, 'Delivered', 'test'),
(4, '2', '', '2023-05-09 22:06:38', '0000-00-00 00:00:00', 'test', '9776447.00', 78, 'placed', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `SellerID` int(11) NOT NULL,
  `Sellername` varchar(50) NOT NULL,
  `Phone_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ownerNIC` int(11) NOT NULL,
  `Businessregistration_no` int(11) NOT NULL,
  `warehouse_address` varchar(100) NOT NULL,
  `New Password` varchar(8) NOT NULL,
  `ShopLink` varchar(500) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Zone` varchar(30) NOT NULL,
  PRIMARY KEY (`SellerID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerID`, `Sellername`, `Phone_no`, `email`, `ownerNIC`, `Businessregistration_no`, `warehouse_address`, `New Password`, `ShopLink`, `Address`, `Zone`) VALUES
(1, 'abc', 775206851, 'abc@gmail.com', 2001204026, 147258, 'abc road Colombo ', '123', '', 'cba road,Colombo ', 'Colombo 02'),
(2, 'xyz', 773606852, 'xyz@gmail.com', 200141526, 1478569, 'dfg road Colombo ', '456', '', 'alles road, Colombo ', 'Colombo 04');

-- --------------------------------------------------------

--
-- Table structure for table `stock_tbl`
--

DROP TABLE IF EXISTS `stock_tbl`;
CREATE TABLE IF NOT EXISTS `stock_tbl` (
  `StockID` varchar(4) NOT NULL,
  `OrderID` varchar(4) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Qty` int(11) NOT NULL,
  `StockType` varchar(50) NOT NULL,
  `product_Description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`StockID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock_tbl`
--

INSERT INTO `stock_tbl` (`StockID`, `OrderID`, `Price`, `Qty`, `StockType`, `product_Description`) VALUES
('1005', '0005', '250.00', 5, 'Electrical', '  \r\n    kkkkk\r\n'),
('1234', ' 432', '123.00', 2, 'Electronic', 'nmkjnm,'),
('1256', ' 856', '456.00', 8, 'Electronic', 'nmkjnm,'),
('0000', ' 000', '0.00', 0, 'Medicine', '00000'),
('5968', ' 143', '85.00', 1, 'Food', 'kkk'),
('0001', ' 112', '250.00', 5, 'Electronic', 'dthdg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
