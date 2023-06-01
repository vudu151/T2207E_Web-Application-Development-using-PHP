-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 04:09 PM
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
-- Database: `webprodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbnhomsp`
--

CREATE TABLE `tbnhomsp` (
  `manhom` int(11) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `sothutu` int(11) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnhomsp`
--

INSERT INTO `tbnhomsp` (`manhom`, `tennhom`, `sothutu`, `trangthai`, `hinhanh`) VALUES
(1, 'Thời trang nam1', 1, 0, 'thoitrangnam.jpg'),
(2, 'Nữ', 2, 0, 'thoitrangnữ.jpg'),
(3, 'Trẻ em', 3, 0, ''),
(4, 'Phụ kiện 123', 5, 1, ''),
(5, 'Phụ kiện2a1', 6, 0, ''),
(6, 'sadfasdg', 4, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `trangthai` tinyint(1) DEFAULT NULL,
  `hoten` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `trangthai`, `hoten`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Quản trị hệ thống');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbnhomsp`
--
ALTER TABLE `tbnhomsp`
  ADD PRIMARY KEY (`manhom`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_USERNAME` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbnhomsp`
--
ALTER TABLE `tbnhomsp`
  MODIFY `manhom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
