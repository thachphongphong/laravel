-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 07:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pearlsea_pearlhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `order`, `enable`) VALUES
(1, 'Trang Chủ', 'home.php', 1, 1),
(2, 'Giới Thiệu', 'GioiThieu.php', 0, 0),
(3, 'Phòng Nghỉ', 'PhongNghi.php', 2, 1),
(4, 'Thông Tin Du Lịch', 'TtDuLich.php', 3, 1),
(5, 'Ẩm Thực', 'AmThuc.php', 5, 1),
(6, 'Tin Tức', 'TinTuc.php', 6, 0),
(7, 'Ẩm Thực', 'AmThuc.php', 5, 1),
(8, 'Tin Tức', 'TinTuc.php', 6, 1),
(9, 'Liên Hệ', 'LienHe.php', 7, 1),
(10, 'Đăng Kí Phòng', 'DangKiPhong.pphp', 8, 1),
(11, 'Bản Đồ', 'BanDo.php', 9, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
