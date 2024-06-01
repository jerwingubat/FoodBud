-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 03:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `python`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_datasets`
--

CREATE TABLE `food_datasets` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_description` text NOT NULL,
  `foo_other_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_datasets`
--

INSERT INTO `food_datasets` (`id`, `disease_id`, `food_name`, `food_description`, `foo_other_details`) VALUES
(1, 1, 'Meat', '', ''),
(2, 1, 'Soda', '', ''),
(3, 1, 'Sugar', '', ''),
(4, 1, 'Sweet', '', ''),
(5, 2, 'Beverage', '', ''),
(6, 2, 'Red Meat', '', ''),
(7, 2, 'Seafoods', '', ''),
(9, 3, 'Citrus fruit', '', ''),
(10, 3, 'Fatty foods', '', ''),
(11, 3, 'Spicy food', '', ''),
(12, 3, 'Tomatoes', '', ''),
(13, 3, 'Beverage', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `food_diseases`
--

CREATE TABLE `food_diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `info` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_diseases`
--

INSERT INTO `food_diseases` (`id`, `name`, `description`, `info`, `img`, `created_at`) VALUES
(1, 'Diabetes', '', '', '', '2022-11-20 00:17:25'),
(2, 'Gouty Arthritis', '', '', '', '2022-11-20 00:17:02'),
(3, 'Peptic Ulcer', '', '', '', '2022-11-20 00:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `food_save_disease`
--

CREATE TABLE `food_save_disease` (
  `id` int(11) NOT NULL,
  `food_dataset_id` int(11) NOT NULL,
  `testNo` int(11) NOT NULL,
  `is_count` int(11) NOT NULL,
  `imgFile` text NOT NULL,
  `acc_rate` double(15,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_datasets`
--
ALTER TABLE `food_datasets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_diseases`
--
ALTER TABLE `food_diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_save_disease`
--
ALTER TABLE `food_save_disease`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_datasets`
--
ALTER TABLE `food_datasets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `food_diseases`
--
ALTER TABLE `food_diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `food_save_disease`
--
ALTER TABLE `food_save_disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
