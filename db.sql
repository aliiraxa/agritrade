-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 10:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agritrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'rice'),
(2, 'suger');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `category` int(11) NOT NULL,
  `about` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `title`, `price`, `name`, `email`, `phone`, `category`, `about`, `city`, `district`, `street`, `img`, `stock`) VALUES
(7, 4, 'For Writer', '12.00', 'Ali Raza', 'aliraza6136@gmail.com', '07383453599', 1, 'dsfad', 'Gujrat Area', 'fsdf', '32sdfsds3 Village AND Ladin gujrat tehsas djs alkd', 'assets/img/products/For Writer.PNG', 32);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `city`, `district`, `street`, `phone`, `email`, `user_id`) VALUES
(6, 'blue ball pointt', 'Gujrat Area', 'fsdf', '32sdfsds3 Village AND Ladin gujrat tehsas djs alkd', '07383453599', 'aliraza6136@gmail.com', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `receive_date` date NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `sellery_email` varchar(100) NOT NULL,
  `sellery_phone` varchar(100) NOT NULL,
  `buyer_name` varchar(50) NOT NULL,
  `buyer_email` varchar(100) NOT NULL,
  `buyer_phone` varchar(100) NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `agent_number` varchar(100) NOT NULL,
  `delivery_address` text NOT NULL,
  `order_user_email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `order_date`, `receive_date`, `product_name`, `product_price`, `product_qty`, `seller_name`, `sellery_email`, `sellery_phone`, `buyer_name`, `buyer_email`, `buyer_phone`, `agent_name`, `agent_number`, `delivery_address`, `order_user_email`, `status`) VALUES
(1, '2021-07-12', '0000-00-00', 'For Writer', '12.00', '1', 'Ali Raza', 'aliraza6136@gmail.com', '07383453599', 'Ali Raza', 'aliraza6136@gmail.com', '07383453599', 'Ali Raza', '01715557788', '32sdfsds3 Village AND Ladin gujrat tehsas djs alkd, Gujrat Area dsf', 'pakworldnews3@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `phone` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT 'role 1:seller, 2:buyer 3:transport agent',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `img`, `address`, `about`, `phone`, `email`, `password`, `role`, `status`) VALUES
(1, 'Mr', 'Ali Raza d', 'assets/img/1.PNG', 'gurjat', 'ghfgh', '+9234178197193', 'siddm7001@gmail.com', '12345', 1, ''),
(4, '', 'Ali Raza', '', 'gurjat', 'fadf', '07383453599', 'aliraza6136@gmail.com', '12345', 1, ''),
(5, 'Mr', 'Ali Raza', 'assets/img/5.jpg', 'gurjat', '', '', 'pakworldnews3@gmail.com', '12345', 2, ''),
(6, 'Mr', 'Ali Raza', 'assets/img/6.jpg', 'gurjat', 'fsadfasd', '01715557788', 'thelinkinfo1@gmail.com', '12345', 3, '1'),
(7, '', 'Ali Raza', '', '', '', '', 'zara_nwr@yahoo.co.uk', '12345', 4, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
