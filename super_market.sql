-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 03:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(10) NOT NULL,
  `item` varchar(255) NOT NULL,
  `unit_price` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `item`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 'A', '50', '0000-00-00 00:00:00', '2022-04-28 11:03:11'),
(2, 'B', '30', '0000-00-00 00:00:00', '2022-04-28 11:03:11'),
(3, 'C', '20', '0000-00-00 00:00:00', '2022-04-28 11:03:29'),
(4, 'D', '15', '0000-00-00 00:00:00', '2022-04-28 11:03:29'),
(5, 'E', '5', '0000-00-00 00:00:00', '2022-04-28 11:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_offers`
--

CREATE TABLE `product_offers` (
  `ID` int(10) NOT NULL,
  `product` int(10) NOT NULL,
  `offer_qty` int(10) NOT NULL,
  `special_price` varchar(10) NOT NULL,
  `addon_product` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_offers`
--

INSERT INTO `product_offers` (`ID`, `product`, `offer_qty`, `special_price`, `addon_product`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '130', 0, '0000-00-00 00:00:00', '2022-04-28 12:46:51'),
(2, 2, 2, '45', 0, '0000-00-00 00:00:00', '2022-04-28 12:46:51'),
(3, 3, 2, '38', 0, '0000-00-00 00:00:00', '2022-04-28 12:47:26'),
(4, 3, 3, '50', 0, '0000-00-00 00:00:00', '2022-04-28 12:47:26'),
(5, 4, 0, '5', 1, '0000-00-00 00:00:00', '2022-04-28 12:48:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_offers`
--
ALTER TABLE `product_offers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
