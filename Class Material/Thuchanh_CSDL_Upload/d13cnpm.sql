-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 04:20 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d13cnpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbnhanvien`
--

CREATE TABLE `tbnhanvien` (
  `id` int(11) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `dienthoai` varchar(15) DEFAULT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnhanvien`
--

INSERT INTO `tbnhanvien` (`id`, `hoten`, `dienthoai`, `gioitinh`, `hinhanh`) VALUES
(1, 'Bùi Thị Vân Anh', '0123456789', 1, 'vananh.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbnhanvien`
--
ALTER TABLE `tbnhanvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbnhanvien`
--
ALTER TABLE `tbnhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
