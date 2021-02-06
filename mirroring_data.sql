-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 08:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirroring_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_buyer`
--

CREATE TABLE `admin_buyer` (
  `id` int(11) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `id_buyer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_buyer`
--

INSERT INTO `admin_buyer` (`id`, `id_admin`, `id_buyer`) VALUES
(1, 'F1234', 'A1234,B1234,C1235'),
(2, 'F0123', 'F1234,F2345,F3456'),
(3, 'A1234', 'B1234,C1234,D1234'),
(4, 'D3412', 'K3432,L0321,L0234'),
(5, 'R2345', 'K4922,K3912,L2313'),
(6, 'R2345', 'K4922,K3912,L2313'),
(7, 'K3234', 'S1234,D0234,K0848');

-- --------------------------------------------------------

--
-- Table structure for table `koor_buyer`
--

CREATE TABLE `koor_buyer` (
  `id` int(11) NOT NULL,
  `id_koor` varchar(10) NOT NULL,
  `id_buyer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koor_buyer`
--

INSERT INTO `koor_buyer` (`id`, `id_koor`, `id_buyer`) VALUES
(1, 'F2345', 'A2345, B2345, C2345'),
(4, 'M8374', 'L8351');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_buyer`
--
ALTER TABLE `admin_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koor_buyer`
--
ALTER TABLE `koor_buyer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_buyer`
--
ALTER TABLE `admin_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `koor_buyer`
--
ALTER TABLE `koor_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
