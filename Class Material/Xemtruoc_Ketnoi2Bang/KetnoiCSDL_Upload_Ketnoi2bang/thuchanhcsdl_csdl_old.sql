-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 04:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuchanhcsdl`
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
(4, 'K\' So phước', '0912345678', 1, ''),
(5, 'Nguyễn Mạnh Linh', '32452346234', 0, ''),
(6, 'Thu Trang', '0912345678', 1, 'demo.jpg'),
(7, 'Nguyễn Mạnh Linh', '0912345678', 1, 'nhanvien2.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
