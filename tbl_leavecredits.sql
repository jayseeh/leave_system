-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 11:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wblms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavecredits`
--

CREATE TABLE `tbl_leavecredits` (
  `id` int(10) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `leave_id` varchar(10) NOT NULL,
  `hrs_remaining` varchar(10) NOT NULL,
  `mins_remaining` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leavecredits`
--

INSERT INTO `tbl_leavecredits` (`id`, `emp_id`, `leave_id`, `hrs_remaining`, `mins_remaining`) VALUES
(7, '19640000', '1', '90', '0'),
(8, '19640000', '2', '24', '0'),
(9, '19640000', '3', '112', '0'),
(10, '19640000', '4', '0', '0'),
(11, '19640000', '6', '56', '0'),
(12, '19640000', '7', '0', '0'),
(13, '19640001', '1', '120', '0'),
(14, '19640001', '2', '24', '0'),
(15, '19640001', '3', '120', '0'),
(16, '19640001', '4', '8', '0'),
(17, '19640001', '5', '840', '0'),
(18, '19640001', '6', '56', '0'),
(19, '19640001', '7', '8', '0'),
(20, '19640009', '1', '120', '0'),
(21, '19640009', '2', '24', '0'),
(22, '19640009', '3', '120', '0'),
(23, '19640009', '4', '8', '0'),
(24, '19640009', '7', '8', '0'),
(25, '19649234', '1', '120', '0'),
(26, '19649234', '2', '24', '0'),
(27, '19649234', '3', '120', '0'),
(28, '19649234', '4', '8', '0'),
(29, '19649234', '6', '56', '0'),
(30, '19649234', '7', '8', '0'),
(31, '19640008', '1', '112', '0'),
(32, '19640008', '3', '120', '0'),
(33, '19640008', '5', '840', '0'),
(34, '19640010', '1', '112', '0'),
(35, '19640010', '2', '24', '0'),
(36, '19640010', '3', '120', '0'),
(37, '19640010', '4', '8', '0'),
(38, '19640010', '6', '56', '0'),
(39, '19640010', '7', '0', '0'),
(40, '19647689', '5', '840', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_leavecredits`
--
ALTER TABLE `tbl_leavecredits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_leavecredits`
--
ALTER TABLE `tbl_leavecredits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
