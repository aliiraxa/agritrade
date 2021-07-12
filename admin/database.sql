-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2017 at 05:27 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2805529_my`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bus`
--

CREATE TABLE `tb_bus` (
  `bus_id` int(11) NOT NULL,
  `bus_plateNo` varchar(25) NOT NULL,
  `bus_no` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bus`
--

INSERT INTO `tb_bus` (`bus_id`, `bus_plateNo`, `bus_no`, `driver_id`, `route_id`) VALUES
(1, '6MBV006', 15, 6, 3),
(2, 'EA7THE', 16, 7, 4),
(3, 'RTS678', 17, 8, 5),
(4, 'KLI897', 18, 9, 6),
(5, 'OPL123', 20, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_driver`
--

CREATE TABLE `tb_driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(25) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `driver_number` varchar(25) NOT NULL,
  `driver_cnic` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_driver`
--

INSERT INTO `tb_driver` (`driver_id`, `driver_name`, `father_name`, `driver_number`, `driver_cnic`) VALUES
(6, 'Muhammad Yasin', 'Muhammad Ali', '0300-2345671', '32089-5432567-8'),
(7, 'Asif Ahemd', 'Aslam', '0300-2345678', '36002-2887934-5'),
(8, 'Qadir Ali', 'Ali ', '0300-8574321', '30210-2345678-8'),
(9, 'Hussain Syed', 'Syed Sohail', '0301-9876543', '39012-0987654-9'),
(10, 'Umair Waheen', 'Muhammad Yasin', '0300-9876543', '34019-0987654-9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_entry`
--

CREATE TABLE `tb_entry` (
  `entry_id` int(11) NOT NULL,
  `bus_No` int(11) NOT NULL,
  `bus_plateNo` varchar(15) NOT NULL,
  `bus_Driver` varchar(250) NOT NULL,
  `driver_cnic` varchar(26) NOT NULL,
  `bus_Route_No` int(11) NOT NULL,
  `bus_route_address` varchar(25) NOT NULL,
  `OutTime` time NOT NULL,
  `InTime` time NOT NULL,
  `Entry_In_Date` date NOT NULL,
  `Entry_Out_Date` date NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_route`
--

CREATE TABLE `tb_route` (
  `route_id` int(11) NOT NULL,
  `route_address` varchar(25) NOT NULL,
  `route_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_route`
--

INSERT INTO `tb_route` (`route_id`, `route_address`, `route_No`) VALUES
(3, 'Jhelum', 33),
(4, 'Alipoor', 75),
(5, 'Sialkot', 57),
(6, 'Lalamusa', 67),
(7, 'Mandibahuddin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'aliraza', '123456'),
(3, 'admin', 'admin'),
(7, 'rida', '123456'),
(8, 'muzammil', '123456'),
(9, 'memoona', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bus`
--
ALTER TABLE `tb_bus`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tb_entry`
--
ALTER TABLE `tb_entry`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `tb_route`
--
ALTER TABLE `tb_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bus`
--
ALTER TABLE `tb_bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_driver`
--
ALTER TABLE `tb_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_entry`
--
ALTER TABLE `tb_entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_route`
--
ALTER TABLE `tb_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bus`
--
ALTER TABLE `tb_bus`
  ADD CONSTRAINT `tb_bus_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `tb_driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_bus_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `tb_route` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
