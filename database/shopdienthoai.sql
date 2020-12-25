-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2020 at 02:33 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

DROP TABLE IF EXISTS `ctdonhang`;
CREATE TABLE IF NOT EXISTS `ctdonhang` (
  `maCTDH` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `maHD` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenSP` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinhthucthanhtoan` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maCTDH`),
  KEY `maHD` (`maHD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`maCTDH`, `maHD`, `tenSP`, `soluong`, `gia`, `hinhthucthanhtoan`) VALUES
('123dg', '123', 'tttt', 2, 2222, '2222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `maDM` int(11) NOT NULL AUTO_INCREMENT,
  `tenDM` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maDM`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maDM`, `tenDM`) VALUES
(1, 'dienthoai'),
(2, 'maytinh');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `maHD` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `maKH` int(11) NOT NULL,
  `tenKH` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `tinhtrangDH` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngayDatHang` date NOT NULL,
  PRIMARY KEY (`maHD`),
  KEY `maKH` (`maKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `maKH`, `tenKH`, `diachi`, `sodienthoai`, `email`, `tinhtrangDH`, `ngayDatHang`) VALUES
('123', 5645645, 'cxczxczxczc', 'czxczxcxzcz', 10262232, 'etdgdgdgdf@gmail.com', 'zcxzcxczczczc', '2020-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `maKH` int(11) NOT NULL AUTO_INCREMENT,
  `tenKH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenDangNhap` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaySinhKH` date NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `diachi` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maKH`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5645646 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `tenDangNhap`, `matkhau`, `ngaySinhKH`, `gioitinh`, `email`, `sodienthoai`, `diachi`) VALUES
(5645645, 'nguyenthanhtien', 'gfgfgf', '123456', '2020-11-11', 'nam', 'etdgdgdgdf@gmail.com', 9211156, 'hgfhfghf');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
CREATE TABLE IF NOT EXISTS `lienhe` (
  `hoten` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `noidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhasx`
--

DROP TABLE IF EXISTS `nhasx`;
CREATE TABLE IF NOT EXISTS `nhasx` (
  `maNSX` int(11) NOT NULL,
  `tenNSX` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhasx`
--

INSERT INTO `nhasx` (`maNSX`, `tenNSX`) VALUES
(123, 'samsung');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `maSP` int(100) NOT NULL,
  `tenSP` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `mauSP` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `chitietSP` text COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `trangthaiSP` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `maDM` int(11) NOT NULL,
  PRIMARY KEY (`maSP`),
  KEY `maDM` (`maDM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `hinhanh`, `mauSP`, `chitietSP`, `soluong`, `gia`, `khuyenmai`, `trangthaiSP`, `maDM`) VALUES
(1, 'iphone 11', 'iphone-11-128gb-black-600x600min.jpg', 'Ä‘á»', 'jhgfjhsagjdgashgdgasd\r\nd\r\nsa\r\nda\r\nsda\r\nsd\r\na', 5, 50000000, 2, ' ', 1),
(2, 'Äƒdadawd123', 'iphone-11-pro-256gb-black-600x600min.jpg', 'etwrer', 'Æ°erwrwrwrwrw', 5, 45345, 2, ' á»­eewr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `maTT` int(11) NOT NULL,
  `tieude` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `noidung` text COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaydangtin` date NOT NULL,
  `tacgia` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `thoigianhethan` date NOT NULL,
  PRIMARY KEY (`maTT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`maTT`, `tieude`, `noidung`, `hinhanh`, `ngaydangtin`, `tacgia`, `thoigianhethan`) VALUES
(3, 'ssssssssssssss', 'ssssssssss', 'note10.jpg', '2020-12-01', 'nguyá»…n thÃ nh tiáº¿n', '2021-01-10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maDM`) REFERENCES `danhmuc` (`maDM`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
