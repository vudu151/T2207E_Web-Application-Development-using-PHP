-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 03:30 PM
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
  `hinhanh` varchar(255) DEFAULT NULL,
  `maphong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnhanvien`
--

INSERT INTO `tbnhanvien` (`id`, `hoten`, `dienthoai`, `gioitinh`, `hinhanh`, `maphong`) VALUES
(1, 'Bùi Thị Vân Anh', '0123456789', 1, 'vananh.jpg', 2),
(11, 'Việt Anh', '4234532452', 0, '', 1),
(12, 'Aptech2', '11122333', 0, 'BG-meet.jpg', 2),
(16, 'Trọng Trường', '11122333', 0, 'aptech.jpg', 2),
(18, 'Java Fullstack 2022', '4234532452', 0, 'BG-meet.jpg', 1),
(20, 'Nhân viên 3', '2345234523', 0, 'BG-meet.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbphongban`
--

CREATE TABLE `tbphongban` (
  `maphong` int(11) NOT NULL,
  `tenphong` varchar(30) NOT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbphongban`
--

INSERT INTO `tbphongban` (`maphong`, `tenphong`, `mota`, `trangthai`) VALUES
(1, 'Quản lý đào tạo', 'Phòng quản lý đào tạo', 1),
(2, 'Nhân sự', 'Phòng quản lý nhân sự', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbnhanvien`
--
ALTER TABLE `tbnhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_maphong_nhanvien` (`maphong`);

--
-- Indexes for table `tbphongban`
--
ALTER TABLE `tbphongban`
  ADD PRIMARY KEY (`maphong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbnhanvien`
--
ALTER TABLE `tbnhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbphongban`
--
ALTER TABLE `tbphongban`
  MODIFY `maphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbnhanvien`
--
ALTER TABLE `tbnhanvien`
  ADD CONSTRAINT `tbnhanvien_ibfk_1` FOREIGN KEY (`maphong`) REFERENCES `tbphongban` (`maphong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
