-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 10:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpacc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `qnt` int(255) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `cust_id`, `p_price`, `qnt`, `date_updated`) VALUES
(35, 9, 1, '340000', 1, '2022-09-30 20:03:04'),
(37, 6, 2, '174999', 1, '2022-10-01 08:49:57'),
(39, 9, 2, '340000', 1, '2022-10-15 02:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_des` varchar(255) NOT NULL,
  `cat_img` varchar(1000) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `date_updated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `cat_img`, `is_deleted`, `date_updated`) VALUES
(20, 'Charger', 'sgbdsxjhs', '12.png', 1, '2022-09-11 06:06:33.000000'),
(25, 'thilini', 'hello', '5c3c3bc060329c1f437fcee9571ad716972fb08ce17733757d273f8a947461cd.jpg', 1, '2022-09-11 06:05:56.000000'),
(26, 'Foods', 'foody', '27699.jpg', 1, '2022-09-11 06:04:36.000000'),
(27, 'thilini', 'FDHB', 'Beautiful-Flower-Field-Nature-HD-Wallpaper.jpg', 1, '2022-09-16 19:49:50.000000'),
(28, 'dog', 'sdxg', '00027853.Jack.Sparrow.jpg', 1, '2022-09-11 06:37:19.000000'),
(29, 'Laptop', 'wrong info', 'Front Page.png', 1, '2022-09-16 19:50:14.000000'),
(30, 'Mobile Phone', 'dchbh', 'chef.png', 1, '2022-09-16 05:32:08.000000'),
(31, 'Computers and Laptops', 'Computers and Laptops can buy ', '585-5852411_desktop-laptop-desktop-pc-and-laptop-hd-png.png', 0, '2022-09-26 08:46:13.000000'),
(32, 'smartphone and tablets', 'Brand new smartphone', '492-4925938_mobile-phones-and-tablets-hd-png-download.png', 0, '2022-09-16 19:56:35.000000'),
(33, 'Camera', 'Canon Camera', 'download.jpg', 0, '2022-09-16 19:56:15.000000'),
(34, 'Headphones', 'Headphone ', 'iPad mini 8.3 - 1.png', 1, '2022-10-14 21:29:53.000000'),
(35, 'Headphones', 'headphones', 'images (1).jpg', 0, '2022-10-14 21:30:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(10) NOT NULL,
  `contact_msg` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_msg`, `status`, `date_updated`) VALUES
(4, 'kanishka', 'john@gmail.com', '0713664071', 'Hello from kanishka', 1, '2022-09-25 07:57:08'),
(5, 'Tharushi', 'tharu1234@gmail.com', '0776892356', 'Hello error ', 1, '2022-09-25 07:57:08'),
(6, 'Thilini', 'thili@gmail.com', '0712237562', 'Hello ', 1, '2022-09-25 07:57:08'),
(11, 'Thilini', 'kthilini1999@gmail.com', '0712997562', 'sifjkabgml', 1, '2022-09-25 08:03:22'),
(12, 'kanishka', 'kanishkadewsandaruwan@gmail.com', '0713664071', 'dclzbn;', 1, '2022-09-25 08:10:51'),
(13, 'john', 'john@gmail.com', '0776892356', 'sxhbdzc', 1, '2022-09-25 08:12:40'),
(14, '', '', '', '', 0, '2022-10-15 02:02:11'),
(15, '', '', '', '', 0, '2022-10-15 02:02:14'),
(16, '', '', '', '', 0, '2022-10-15 02:02:15'),
(17, '', '', '', '', 0, '2022-10-15 02:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_phone` varchar(10) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_nic` varchar(255) NOT NULL,
  `cust_img` varchar(255) DEFAULT NULL,
  `cust_password` varchar(8) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_email`, `cust_phone`, `cust_address`, `cust_nic`, `cust_img`, `cust_password`, `is_deleted`, `date_updated`) VALUES
(1, '', 'admin', '', '', '', '', '12345', 1, '2022-10-01 07:42:36'),
(2, 'Thilini Maheshika', 'thili@gmail.com', '0713664071', 'Galle', '9923788723V', '', '12', 0, '2022-09-26 22:22:20'),
(4, 'kanishka', 'kanishka@gmail.com', '0713664071', '', '', '', '1234', 0, '2022-09-22 19:42:07'),
(5, 'maheshika', 'mahi123@gmail.com', '0776892356', '', '', '', '56789', 0, '2022-09-22 19:50:01'),
(6, 'Tharushi', 'tharu1234@gmail.com', '0712997562', 'Galle', '9912368723V', '', '00000', 0, '2022-09-26 08:30:37'),
(7, 'me', 'me123@gmail.com', '0712997562', 'Neluwa', '9923568723', '0', '123', 1, '2022-09-26 22:01:41'),
(8, 'test', 'test@gmail.com', '0776892356', 'Galle', '9923568723', NULL, '123', 0, '2022-09-27 04:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `g_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `title`, `g_img`) VALUES
(4, 'Phone Accessories ', '360_F_364410725_IFLJi9mHRoeZ8W2bcGX1sxVJka14RmwZ.jpg'),
(5, 'Xiomi Redmi full screen', 'images.jpg'),
(6, 'Mobile Accessories', 'images (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(255) NOT NULL,
  `mod_img` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`mod_id`, `mod_name`, `mod_img`, `is_deleted`, `date_updated`) VALUES
(1, 'Nokiya', 'nokiya.png', 1, '2022-09-16 20:06:29'),
(2, 'Apple', 'apple.png', 0, '2022-09-11 18:29:24'),
(3, 'Samsung', 'samsung.jpg', 1, '2022-09-16 19:58:05'),
(4, 'thilini', 'Home1.jpg', 1, '2022-09-11 18:55:58'),
(5, 'Canon', 'download.png', 0, '2022-09-16 19:57:57'),
(6, 'Asus', 'download (1).png', 0, '2022-09-16 19:58:39'),
(7, 'TCL', 'download (2).png', 0, '2022-09-16 20:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `qnt` int(255) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `p_id`, `qnt`, `p_price`) VALUES
(75, 45, 6, 1, '174999'),
(76, 45, 9, 2, '340000'),
(77, 45, 6, 2, '174999'),
(78, 46, 6, 1, '174999'),
(79, 46, 9, 2, '340000'),
(80, 46, 6, 2, '174999'),
(81, 47, 6, 1, '174999'),
(82, 47, 9, 2, '340000'),
(83, 47, 6, 2, '174999'),
(84, 48, 6, 1, '174999'),
(85, 48, 9, 2, '340000'),
(86, 48, 6, 2, '174999'),
(87, 49, 6, 1, '174999'),
(88, 50, 9, 1, '340000'),
(89, 51, 9, 1, '340000'),
(90, 54, 9, 1, '340000'),
(91, 55, 6, 1, '174999'),
(92, 73, 9, 1, '340000');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(255) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `shipping_address` varchar(1000) NOT NULL,
  `billing_address` varchar(1000) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `order_status` int(8) NOT NULL,
  `tracking_status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_id`, `cust_id`, `total`, `shipping_address`, `billing_address`, `is_deleted`, `order_status`, `tracking_status`, `date_updated`) VALUES
(70, 2, '175149', 'Galle', 'Galle', 0, 5, 'Pending', '2022-09-30 19:42:15'),
(71, 2, '175149', 'Galle', 'Galle', 0, 2, 'Pending', '2022-10-01 01:20:51'),
(72, 2, '175149', 'Galle', 'Galle', 0, 2, 'Pending', '2022-09-30 22:27:52'),
(73, 2, '340150', 'Galle', 'Galle', 0, 2, 'Pending', '2022-09-30 22:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_des` varchar(1000) NOT NULL,
  `model` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_price` int(255) NOT NULL,
  `p_qnt` int(255) NOT NULL,
  `p_waranty` int(255) NOT NULL,
  `p_active` int(2) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `cat_id`, `p_name`, `p_des`, `model`, `p_img`, `p_price`, `p_qnt`, `p_waranty`, `p_active`, `is_deleted`, `date_updated`) VALUES
(2, 29, 'Asus laptop', 'dchb', '1', 'Back page.png', 0, 1, 0, 1, 1, '2022-09-12 20:11:05'),
(4, 27, 'hello', 'edit', '3', 'pngfind.com-kennys-png-5077696.png', 12000, 2, 2, 0, 1, '2022-09-16 19:58:53'),
(5, 27, 'Phone', 'hello', '2', 'online-food-order-mobile-app-ui-ux-gui-material-design-kit-apps-login-menu-select-pizza-pizza-type-detail-74919543.jpg', 12000, 2, 2, 0, 1, '2022-09-16 19:58:58'),
(6, 31, 'ASUS Laptop 15 (X515MA) ', ' Intel Celeron Upto 2.8 Ghz, Finger Print', '6', 'AS-CEL-X515-487-128SSD-SL-02.jpg', 174999, -66, 2, 1, 0, '2022-09-30 18:16:52'),
(7, 32, 'TCL TAB 10 ', 'FHD WiFi (3GB+32GB) (Black) With Tab Cover', '7', '492-4925938_mobile-phones-and-tablets-hd-png-download.png', 90000, 0, 1, 1, 0, '2022-10-01 08:27:22'),
(8, 33, 'EOS 850D BODY +18-55MM LENS', '24.1-megapixel APS-C CMOS sensor + 4K video recording', '5', 'download.jpg', 300000, 2, 2, 2, 0, '2022-10-01 08:33:00'),
(9, 31, 'Vivobook Pro', 'The colorful, bold and youthful Vivobook series shows who you really are. ', '6', 'download (2).jpg', 340000, -42, 1, 1, 0, '2022-10-01 08:27:27'),
(10, 31, 'hello', 'dsgh', '2', '585-5852411_desktop-laptop-desktop-pc-and-laptop-hd-png.png', 12, 1, 1, 1, 0, '2022-10-15 01:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `banner_title` varchar(255) NOT NULL,
  `banner_pname` varchar(255) NOT NULL,
  `banner_back_img` varchar(255) NOT NULL,
  `banner_img` varchar(1000) NOT NULL,
  `com_email` varchar(255) NOT NULL,
  `com_phone` varchar(10) NOT NULL,
  `com_address` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `subpage_title` varchar(255) NOT NULL,
  `subpage_back_img` varchar(1000) NOT NULL,
  `ship_fee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`banner_title`, `banner_pname`, `banner_back_img`, `banner_img`, `com_email`, `com_phone`, `com_address`, `fb`, `insta`, `google`, `subpage_title`, `subpage_back_img`, `ship_fee`) VALUES
('Place your Iphone Order now!!', 'Iphone 14', 'banner_background.jpg', 'Apple-iPhone-14-Pro-Max 1.png', 'bpaccessories@gmail.com', '0772341256', 'Colombo', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.google.com/', 'This is Shop Page', '360_F_364410725_IFLJi9mHRoeZ8W2bcGX1sxVJka14RmwZ.jpg', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
