-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 09:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellness`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('Admin@Admin.com', '25d55ad283aa400af464c76d713c07ad\r\n'),
('Admin@uk.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `Time` time NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_ID`, `S_ID`, `DATE`, `Time`, `C_ID`) VALUES
(8, 3, '2019-06-12', '12:00:00', 8),
(9, 2, '2019-06-12', '01:59:00', 10),
(10, 2, '2019-06-26', '13:59:00', 10),
(11, 2, '2019-06-26', '13:59:00', 10),
(12, 2, '2019-06-26', '13:59:00', 10),
(13, 2, '2019-06-26', '13:59:00', 10),
(14, 3, '2019-06-12', '12:00:00', 8),
(15, 3, '2019-06-12', '12:00:00', 8),
(16, 3, '2019-06-12', '12:00:00', 8),
(17, 3, '2019-06-12', '12:00:00', 8),
(18, 3, '2019-06-12', '12:00:00', 8),
(19, 3, '2019-06-12', '12:00:00', 8),
(20, 3, '2019-06-12', '12:00:00', 8),
(21, 3, '2019-06-12', '12:00:00', 8),
(22, 3, '2019-06-12', '12:00:00', 8),
(23, 3, '2019-06-12', '12:00:00', 8),
(24, 3, '2019-06-12', '12:00:00', 8),
(25, 3, '2019-06-12', '12:00:00', 8),
(26, 3, '2019-06-12', '12:00:00', 8),
(27, 3, '2019-06-12', '12:00:00', 8),
(28, 3, '2019-06-12', '12:00:00', 8),
(29, 3, '2019-06-12', '12:00:00', 8),
(30, 3, '2019-06-27', '01:59:00', 10),
(31, 2, '2019-06-26', '01:59:00', 12),
(32, 4, '2019-06-25', '13:59:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `C_Name` text NOT NULL,
  `C_email` text NOT NULL,
  `C_Phone` text NOT NULL,
  `C_Password` varchar(300) NOT NULL,
  `C_Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_email`, `C_Phone`, `C_Password`, `C_Address`) VALUES
(8, 'AUn', 'aunspy21@gmail.com', '+923086437477', '25f9e794323b453885f5181f1b624d0b', 'UK London'),
(10, 'AUn', 'Aun.ciit@outlook.com', '+923086437477', '25d55ad283aa400af464c76d713c07ad', 'UK London'),
(11, 'AUn', 'PIZZA.HUT@gmail.com', '+923086437477', '25d55ad283aa400af464c76d713c07ad', 'UK London'),
(12, 'good Will', 'asd@gmail.com', '+923086437477', '25d55ad283aa400af464c76d713c07ad', 'UK London');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `S_ID` int(11) NOT NULL,
  `S_NAME` varchar(25) NOT NULL,
  `Place` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`S_ID`, `S_NAME`, `Place`) VALUES
(1, 'swimming pool', 'St pool'),
(2, 'indoor running tracks', 'Stadium'),
(3, 'tennis', 'outdoor'),
(4, 'football', 'uk stadium'),
(5, 'boxing', 'in door');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `FK_SER` (`S_ID`),
  ADD KEY `FK_CUS` (`C_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `C_ID_2` (`C_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_CUS` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SER` FOREIGN KEY (`S_ID`) REFERENCES `services` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
