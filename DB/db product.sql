-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2019 at 12:39 AM
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
-- Database: `product`
--

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
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `unitInStock`, `picture`) VALUES
(1, 'Notebook', 'Core i9 ', 30000, 20, 'notebook.jpg'),
(2, 'Computer PC', 'Core i7 NVIDIA GeForce 1080ti', 35000, 15, 'computer.jpg'),
(3, 'Monitor LED', 'Monitor LED 43in HDFI', 5000, 10, 'monitor.jpg'),
(4, 'Printer Laser', 'Printer Laser EPSON 500PH', 4000, 20, 'printer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product2`
--

CREATE TABLE `product2` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `unitInStock` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product2`
--

INSERT INTO `product2` (`id`, `name`, `description`, `price`, `unitInStock`, `picture`) VALUES
(1, 'Omlet', 'Eag For Healty', 50, 10, 'omlet.jpg'),
(2, 'Pasta', 'Pasta For Healty', 25, 100, 'noodle.jpg'),
(3, 'Steak', 'Steak Medium Rare', 200, 50, 'steak.jpg'),
(4, 'French Fries', 'make with potato', 200, 90, 'fries.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product3`
--

CREATE TABLE `product3` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `unitInStock` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product3`
--

INSERT INTO `product3` (`id`, `name`, `description`, `price`, `unitInStock`, `picture`) VALUES
(1, 'FreeStyle', 'Women Uniform', 200, 50, 'school.jpg'),
(2, 'Sport', 'Sport so cool', 300, 40, 'cloth.jpg'),
(3, 'Smart Suit', 'smart suit', 400, 30, 'smart.jpg'),
(4, 'Beautiful', 'beutifull uniform', 500, 60, 'beutifull.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product3`
--
ALTER TABLE `product3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product2`
--
ALTER TABLE `product2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product3`
--
ALTER TABLE `product3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
