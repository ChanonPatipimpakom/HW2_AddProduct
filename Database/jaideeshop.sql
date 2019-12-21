-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2019 at 10:40 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaideeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `active`) VALUES
(1, 'Mark', '5f4dcc3b5aa765d61d8327deb882cf99', 'Chanon', 'Patipimpakom', 'chanon.white.11@gmail.com', 1),
(4, 'Markus', '7738c3c6f82100d63c24dab9badc81ce', 'Markus', 'JR.Lost', 'chanon.zero.11@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `unitInStock` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `unitInStock`, `picture`, `category`) VALUES
(1, 'Notebook Asus', 'Core i9 ', 30000, 20, 'notebook.jpg', 1),
(2, 'Case Computer', 'Steal Serise', 35000, 15, 'computer.jpg', 1),
(3, 'Monitor LED', 'Monitor LED 43in HDFI', 5000, 10, 'monitor.jpg', 1),
(4, 'Printer Epson', 'Printer Laser Predator', 40000, 202, 'printer.jpg', 1),
(17, 'Omlet', 'Eag For Healty', 50, 10, 'omlet.jpg', 2),
(18, 'Pasta', 'Pasta For Healty', 25, 100, 'noodle.jpg', 2),
(19, 'Steak', 'Steak Medium Rare', 200, 50, 'steak.jpg', 2),
(20, 'French Fries', 'make with potato', 200, 90, 'fries.jpg', 2),
(21, 'FreeStyle', 'Women Uniform', 200, 50, 'school.jpg', 3),
(22, 'Sport Girl', 'Sport so cool', 300, 40, 'cloth.jpg', 3),
(23, 'Smart Suit', 'smart suit', 400, 30, 'smart.jpg', 3),
(24, 'Beautiful', 'beutifull uniform', 500, 60, 'beutifull.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
