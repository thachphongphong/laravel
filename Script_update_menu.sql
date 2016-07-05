-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2016 at 06:21 PM
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
  `name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menu`
--

Truncate table `menu`

INSERT INTO `menu` (`id`, `name`, `name_en`, `url`, `order`, `enable`) VALUES
(1, 'Trang Chủ', 'Home', 'home', 0, 1),
(2, 'Giới Thiệu', 'Introduction', 'introduction', 1, 1),
(3, 'Phòng Nghỉ', 'Room Categories', 'room', 2, 1),
(4, 'Thông Tin Du Lịch', 'Tour Guide', 'tour_guide', 3, 1),
(5, 'Ẩm Thực', 'Local Food', 'local_food', 5, 1),
(6, 'Tin Tức', 'News', 'news', 6, 1),
(9, 'Liên Hệ', 'Contact Us', 'contact', 7, 1),
(10, 'Đăng Kí Phòng', 'Reservation', 'reservation', 8, 1),
(11, 'Bản Đồ', 'Map', 'map', 9, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
