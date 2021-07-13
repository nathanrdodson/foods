-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2021 at 03:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstuffs`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `item` text NOT NULL,
  `brand` text NOT NULL,
  `size` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `weight` decimal(11,2) NOT NULL,
  `department` text NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`item`, `brand`, `size`, `quantity`, `cost`, `trans_id`, `weight`, `department`, `fid`) VALUES
('Rotisserie Chicken, Savory', 'Hy-Vee', '1', 1, '5.99', 6, '0.00', 'Food Service', 3),
('Asperagus', 'Hy-Vee', '', 1, '3.15', 6, '0.79', 'Produce', 4),
('Banana', 'Dole', '', 1, '1.39', 6, '2.35', 'Produce', 5),
('English Cucumber', 'Hy-Vee', '1', 2, '2.50', 6, '0.00', 'Produce', 6),
('Chocolate Creme Pie', 'Edwards', '25.5oz', 1, '4.99', 7, '0.00', 'Dessert', 7),
('Gold Yukon Potatoes', 'Kroger', '5lb', 1, '3.49', 7, '0.00', 'Produce', 8),
('BellaVitano Merlot Cheese', 'Sartori', '5.3oz', 1, '5.99', 7, '0.00', 'Specialty Cheese', 9),
('Sarvecchio Parmesian', 'Sartori', '', 1, '4.06', 7, '0.29', 'Specialty Cheese', 10),
('Baby Spring Mixed Greens', 'Simple Truth Organic', '5oz', 1, '3.00', 7, '0.00', 'Produce', 11),
('Boneless Skinless Chicken Breast', 'Simple Truth', '', 1, '7.88', 7, '1.58', 'Butcher', 12),
('', '', '', 0, '0.00', 0, '0.00', '', 45),
('Granola Bars', 'Sunbelt', '1', 12, '2.79', 10, '0.00', 'Cereal & Dry Goods', 46),
('Granola Bars', 'Sunbelt', '1', 12, '2.79', 10, '0.00', 'Cereal & Dry Goods', 47),
('Granola Bars', 'Sunbelt', '1', 12, '2.79', 10, '0.00', 'Cereal & Dry Goods', 48),
('Granola Bars', 'Kroger', '1', 12, '1.67', 10, '0.00', 'Cereal & Dry Goods', 49),
('Granola Bars, Chocolate Dipped', 'Kroger', '1', 12, '1.67', 10, '0.00', 'Cereal & Dry Goods', 50);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `date` date DEFAULT NULL,
  `location` text DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `total_saved` decimal(10,2) DEFAULT NULL,
  `trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`date`, `location`, `total_cost`, `total_saved`, `trans_id`) VALUES
('2021-06-28', 'Hy-Vee', '16.97', '0.00', 6),
('2021-06-03', 'Dillons', '32.15', '0.00', 7),
('2021-07-21', 'Dillons', '33.69', '4.83', 9),
('2021-07-02', 'Dillons', '33.69', '4.83', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
