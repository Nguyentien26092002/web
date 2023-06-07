-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 27, 2023 lúc 03:32 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `minhlongmoto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Pass_word` varchar(250) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `Pass_word`, `create_at`, `status`, `position`) VALUES
(8, 'add', '$2y$10$SYH6KcaRYQCKK9fm61GnE.XnsqSeXO8eNup/NyHPwnxdhHmQv.t/a', NULL, 0, 0),
(9, 'Tien12', '$2y$10$rxtfB5WsaBvVKcTHUupJmOWvkggLw5ghytF8IbZxUwcdjTYS6Iyp.', NULL, 0, 0),
(5, 'admin', '$2y$10$LGoaSZToGkUSVC8jArlKPuOG62DRdZ//f1YmyhybnsaDwjhK7SGaS', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `agency`
--

DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `agency_id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_adress` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_provine` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_phone` decimal(14,0) NOT NULL,
  PRIMARY KEY (`agency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `agency`
--

INSERT INTO `agency` (`agency_id`, `agency_adress`, `agency_provine`, `agency_phone`) VALUES
(4, '197B LÃª VÄƒn Viá»‡t, PhÆ°á»ng Hiá»‡p PhÃº, Q9, TP.HCM ', 'TP. Thá»§ Äá»©c', '336066336'),
(3, ' vÄƒn viá»‡t thá»§ Ä‘á»©c', 'thá»§ Ä‘á»©c', '336656924');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name` (`brand_name`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `category_id`, `brand_name`) VALUES
(5, 44, 'Zontes'),
(2, 44, 'Yamaha'),
(4, 44, 'Honda'),
(6, 44, 'suzuki');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `color_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`color_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_name`, `color_img`) VALUES
('cam', 'cam.png'),
('xanh', 'mau-xanh-duong.jpg'),
('xÃ¡m', 'pngtree-simple-gray-solid-color-background-image_557027.jpg'),
('tráº¯ng', 'trang.jpg'),
('Ä‘en', 'images-4.png'),
('Ä‘á»', 'download.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` varchar(10) NOT NULL,
  `cccd` decimal(12,0) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` decimal(12,0) NOT NULL,
  `province` varchar(50) DEFAULT NULL,
  `district` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `wards` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `static` int(1) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `cccd` (`cccd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_cart`
--

DROP TABLE IF EXISTS `customer_cart`;
CREATE TABLE IF NOT EXISTS `customer_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_quantity` int(10) NOT NULL,
  `cart_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer_cart`
--

INSERT INTO `customer_cart` (`cart_id`, `product_id`, `user_ip`, `cart_quantity`, `cart_color`, `total`) VALUES
(71, 166, '::1', 1, 'Ä‘en', 62000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_feedback`
--

DROP TABLE IF EXISTS `customer_feedback`;
CREATE TABLE IF NOT EXISTS `customer_feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` varchar(200) DEFAULT NULL,
  `title_feedback` varchar(50) DEFAULT NULL,
  `date_feedback` datetime DEFAULT NULL,
  `static` tinyint(4) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_feedback`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_inf`
--

DROP TABLE IF EXISTS `customer_inf`;
CREATE TABLE IF NOT EXISTS `customer_inf` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_sdt` decimal(11,0) NOT NULL,
  `customer_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `static` int(2) DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer_inf`
--

INSERT INTO `customer_inf` (`cus_id`, `Customer_name`, `customer_sdt`, `customer_mail`, `customer_title`, `static`) VALUES
(3, 'admin1', '123', '123', 'loo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `has`
--

DROP TABLE IF EXISTS `has`;
CREATE TABLE IF NOT EXISTS `has` (
  `product_id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`agency_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `has`
--

INSERT INTO `has` (`product_id`, `agency_id`, `quantity`) VALUES
(158, 4, 12),
(141, 3, 123);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay`
--

DROP TABLE IF EXISTS `pay`;
CREATE TABLE IF NOT EXISTS `pay` (
  `id_receipt` int(11) NOT NULL,
  `trading_code` int(11) NOT NULL,
  `static` tinyint(4) DEFAULT NULL,
  `money_paid` int(11) NOT NULL,
  PRIMARY KEY (`trading_code`,`id_receipt`),
  UNIQUE KEY `id_receipt` (`id_receipt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `pay`
--

INSERT INTO `pay` (`id_receipt`, `trading_code`, `static`, `money_paid`) VALUES
(6523, 13996499, 0, 8300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_bike`
--

DROP TABLE IF EXISTS `product_bike`;
CREATE TABLE IF NOT EXISTS `product_bike` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_des` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_type` varchar(10) NOT NULL,
  `hp` float NOT NULL,
  `height` float NOT NULL,
  `fuel` float NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `brand_product` (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_bike`
--

INSERT INTO `product_bike` (`product_id`, `product_name`, `product_price`, `brand_id`, `product_des`, `engine_type`, `hp`, `height`, `fuel`) VALUES
(153, 'Yamaha R15V4', '76500000', 2, '', 'SOHC', 14.2, 1135, 2.29),
(163, 'Zontes 310T1', '42000000', 5, '', 'DOHC', 17.7, 1135, 3.2),
(156, 'Honda Air Blade 125', '42000000', 5, '', 'Dohc', 12.3, 1085, 2.26),
(159, 'HONDA CBR 150R', '89000000', 4, '', 'DOHC', 16.9, 1077, 2.8),
(165, 'Exciter 155', '5000000000', 2, '                          ', 'SOHC', 14.2, 1135, 2.09),
(166, 'Yamaha R3', '62000000', 2, '', 'DOHC', 27.8, 1145, 3.6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(39, 'Order'),
(44, 'Bike'),
(41, 'Contact'),
(42, 'About Us'),
(43, 'News');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_img_des`
--

DROP TABLE IF EXISTS `product_img_des`;
CREATE TABLE IF NOT EXISTS `product_img_des` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`product_id`,`color`),
  UNIQUE KEY `stt` (`stt`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_img_des`
--

INSERT INTO `product_img_des` (`product_id`, `product_img_desc`, `color`, `stt`) VALUES
(156, 'air-blade-125-2022-tieu-chuan-do-den.jpg', 'Ä‘á»', 77),
(156, 'air-blade-160-dac-biet-xanh-xam-den.jpg', 'xÃ¡m', 75),
(156, 'air-blade-160-tieu-chuan-den-xam.jpg', 'Ä‘en', 76),
(166, 'yamaha-r3-mau-den.jpg', 'Ä‘en', 95),
(153, 'r15v4-mau-den.jpg', 'Ä‘en', 61),
(153, 'r15v4-mau-xanh.jpg', 'Ä‘á»', 62),
(165, 'exciter-155-cao-cap-moi-2023-cam.jpg', 'cam', 93),
(163, 'Zontes-310T1-mau-den-mam-den.jpg', 'Ä‘en', 89),
(163, 'Zontes-310T1-mau-xanh-1.jpg', 'xanh', 90),
(159, 'cbr150r-victory-black-red.jpg', 'Ä‘á»', 81),
(159, 'cbr150r-matte-black.jpg', 'Ä‘en', 82),
(166, 'yamaha-r3-mau-xanh.jpg', 'xanh', 94),
(165, 'exciter-150-gioi-han-mau-moi-xanh-den.jpg', 'xanh', 92);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `content` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`content`, `imga`, `title`, `id`) VALUES
('https://youtu.be/zay4KY5jTZg', 'cbr250rr-2023-tang-1ps-3-533x261.jpg', 'ADV 150 2022: Tráº¯ng mÃ¢m vÃ ng vÃ  Ä‘en mÃ¢m vÃ ng Ä‘Ã£ vá» Viá»‡t Nam', 2),
('https://youtu.be/T9EaIvaMi40', 'gia-yamaha-xsr155-mau-moi-1.jpg', 'GiÃ¡ XS155R vÃ  XSR155: giÃ¡ khuyáº¿n mÃ£i chá»‰ 75TR kÃ¨m mÃ u má»›i nháº¥t', 3),
('https://youtu.be/bskXo_kLHpc', 'Honda-WinnerX.jpg', 'Honda Winner X: GiÃ¡ xe Winner X 2023 má»›i nháº¥t', 4),
('https://youtu.be/KFNxi72RySA', 'suzuki-satria-f150-1024x502.jpg', 'Satria 2023 & giÃ¡ xe Satria hÃ´m nay ráº» nháº¥t', 5),
('https://youtu.be/zay4KY5jTZg', 'honda-adv-160.jpg', 'GiÃ¡ Honda ADV 150 2023 má»›i nháº¥t', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `id_receipt` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) DEFAULT NULL,
  `id_customer` varchar(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `sum_price` float NOT NULL,
  `item` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_receipt`),
  KEY `id_customer` (`id_customer`),
  KEY `agency_id` (`agency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9410 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt_detail`
--

DROP TABLE IF EXISTS `receipt_detail`;
CREATE TABLE IF NOT EXISTS `receipt_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `id_recceipt` int(11) DEFAULT NULL,
  `customer_pay` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `product` varchar(50) NOT NULL,
  `Ship` int(11) DEFAULT NULL,
  `static` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `product_id` (`product_id`),
  KEY `id_recceipt` (`id_recceipt`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
