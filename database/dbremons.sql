-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 06:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbremons`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarduino`
--

CREATE TABLE `tbarduino` (
  `id` int(11) NOT NULL,
  `idalat` varchar(255) NOT NULL,
  `flow_sensor` varchar(255) NOT NULL,
  `ph_meter` varchar(255) NOT NULL,
  `ketinggian` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarduino`
--

INSERT INTO `tbarduino` (`id`, `idalat`, `flow_sensor`, `ph_meter`, `ketinggian`, `datetime`) VALUES
(1, 'ARD001', '1', '1', '1', '2024-06-28 10:06:20'),
(2, 'ard001', '10', '10', '10', '2024-06-28 10:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbdrainase`
--

CREATE TABLE `tbdrainase` (
  `id` int(11) NOT NULL,
  `idalat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleuser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarduino`
--
ALTER TABLE `tbarduino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdrainase`
--
ALTER TABLE `tbdrainase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbarduino`
--
ALTER TABLE `tbarduino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbdrainase`
--
ALTER TABLE `tbdrainase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
