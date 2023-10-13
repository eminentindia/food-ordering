-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 07:20 AM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `heading`, `description`, `image`) VALUES
(0, 'Welcome to Eminent Food stores India Pvt. Ltd. Formerly Known as FOODIEEZ.', '<p>Best source of quality and hygiene fast food.</p><p>We?re dedicated to giving you the very best of food products, with a focus on great taste, quality, health &amp; Hygiene.</p><p>Founded in 2019 by lovers of food, Eminent Food stores India Pvt. Ltd (<strong>Foodieez</strong>). has come a long way from its beginnings in Delhi Metro. When promoters first started out, their passion &amp; motto for <strong>Foodieez </strong>was to provide customers ?Pocket Friendly, Hygienic, tasty food products? this drove them to start new vertical for food chain, after doing tons of research, they have launched Foodieez, that offer you ? world?s class food products?.</p><p>We now serve customers all over New Delhi and are thrilled that we?re able to turn our passion into our food products.</p><p>we hope you enjoy our food products as much as we enjoy offering them to you. If you have any questions or comments, please don?t hesitate to contact us.</p><p>Sincerely,</p><p>[Foodieez Management]</p>', 'about-us.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `role` enum('super','test') NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_email`, `admin_password`, `role`, `added_by`, `added_on`) VALUES
(17, 'Test Admin', 'admin@gmail.com', '$2y$10$UI1iAky4ute47TuO4LlWvOL6gCD4cDaZpouG1lDYBgTRVihw6jSXa', 'super', 'admin@gmail.com', '2022-01-09'),
(16, 'atechseva', 'atechseva@gmail.com', '$2y$10$ksnKDHG3PFv7FduQaoyyzegCew.wECqHKgHb8Wh8JWkZM5mxud5J2', 'super', 'admin@gmail.com', '2022-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ID`, `image`, `alt`) VALUES
(20, 'foodieez-preorders.jpg', 'foodieez-preorders'),
(21, 'foodieez-preorders_2.jpg', 'foodieez-preorders_2'),
(22, 'rf3rgeveverf.jpg', 'rf3rgeveverf');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dish_detail_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `user_id`, `dish_detail_id`, `qty`, `added_on`) VALUES
(15, 1, 6, 1, '2023-08-29 05:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `category`, `slug`, `order_number`, `image`, `status`, `added_on`) VALUES
(9, 'Sandwich', 'sandwich', '4', 'sandwich.webp', 1, '2021-10-21 00:00:00'),
(8, 'Dhosa', 'dhosa', '3', 'dhosa.webp', 1, '2021-10-21 00:00:00'),
(7, 'Coffee', 'coffee', '2', 'coffee.webp', 1, '2021-10-21 00:00:00'),
(6, 'Pizza', 'pizza', '1', 'pizza.webp', 1, '2021-10-20 00:00:00'),
(10, 'Chole Bhature', 'chole-bhature', '5', 'chole-bhature.webp', 1, '2021-10-21 00:00:00'),
(11, 'Rolls', 'rolls', '6', 'rolls.webp', 1, '2021-10-21 00:00:00'),
(12, 'Chicken', 'chicken', '10', 'chicken.webp', 1, '2021-11-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `ID` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `coupon_value` varchar(255) NOT NULL,
  `cart_min_value` varchar(255) NOT NULL,
  `expired_on` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`ID`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `expired_on`, `status`, `added_on`) VALUES
(2, 'NEW', 'F', '20', '10', '2023-08-30', 1, '2023-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `delievery_boy`
--

CREATE TABLE `delievery_boy` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `delievery_boy`
--

INSERT INTO `delievery_boy` (`ID`, `name`, `mobile`, `password`, `image`, `status`, `added_on`) VALUES
(6, 'akshay kumar', '7017742830', '$2y$10$/hT3GBTtovmI20CUlXsW2.Ag5LhRAAms9EzBZ6raefr3OREocGyqi', '4802.png', 1, '2021-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `ID` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` enum('veg','non-veg') NOT NULL,
  `dish` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` longtext NOT NULL,
  `dish_detail` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_available` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`ID`, `category_id`, `type`, `dish`, `image`, `short_description`, `dish_detail`, `slug`, `status`, `is_available`, `meta_title`, `meta_description`, `meta_keywords`, `added_on`) VALUES
(2, 12, 'non-veg', 'Buttur Chicken', 'buttur-chicken6196.jpg', '<p>Buttur Chicken</p>', '<p>Buttur Chicken</p>', 'butter-chicken', 1, 1, 'Buttur Chicken', 'Buttur Chicken', 'Buttur Chicken', '2021-12-16'),
(3, 6, 'veg', 'Cheese Pizza', 'cheese-pizza8533.cms', '<p>he most commonly used cheese on pizza is <strong>mozzarella</strong>, because it melts beautifully without turning oily or lumpy. Cheeses such as feta, haloumi and aged gouda are tasty toppings, but they\'re a bit fancy for families and don\'t melt as well as mozzarella. Low-moisture mozzarella in particular has great melt and stretch.</p>', '<p>he most commonly used cheese on pizza is <strong>mozzarella</strong>, because it melts beautifully without turning oily or lumpy. Cheeses such as feta, haloumi and aged gouda are tasty toppings, but they\'re a bit fancy for families and don\'t melt as well as mozzarella. Low-moisture mozzarella in particular has great melt and stretch.</p>', 'Cheese-Pizza', 1, 1, 'Cheese Pizza', 'he most commonly used cheese on pizza is mozzarella, because it melts beautifully without turning oily or lumpy. Cheeses such as feta, haloumi and aged gouda are tasty toppings, but they\'re a bit fancy for families and don\'t melt as well as mozzarella. Low-moisture mozzarella in particular has great melt and stretch.', 'Cheese Pizza', '2021-12-16'),
(4, 9, 'veg', 'Cheese Sandwitch', 'cheese-sandwitch6725.jpg', '<p>Cheese Sandwitch</p>', '<p>Cheese Sandwitch</p>', 'Cheese-Sandwitch', 1, 1, 'Cheese Sandwitch', 'Cheese Sandwitch', 'Cheese Sandwitch', '2021-12-16'),
(5, 7, 'veg', 'Famous Coffee', 'famous-coffee6388.webp', '<p>Per Cup</p>', '<p>Per Cup</p>', 'coffee', 1, 1, 'Per Cup', 'Per Cup', 'Per Cup', '2021-12-16'),
(6, 8, 'veg', 'Masala Dhosa', 'masala-dhosa6066.webp', '<p>Masala Dhosa</p>', '<p>Masala Dhosa</p>', 'masala-dhosa', 1, 1, 'Masala Dhosa', 'Masala Dhosa', 'Masala Dhosa', '2021-12-16'),
(7, 10, 'veg', 'Chole Bhature', 'chole-bhature1282.jpg', '<p>Chole Bhature</p>', '<p>Chole Bhature</p>', 'chole-bhature', 1, 1, 'Chole Bhature', 'Chole Bhature', 'Chole Bhature', '2021-12-16'),
(8, 11, 'veg', 'Paneer Roll', 'paneer-roll5215.jpg', '<p>Paneer Roll</p>', '<p><strong>Paneer Roll</strong></p>', 'paneer-roll', 1, 1, 'Paneer Roll', 'Paneer Roll', 'rolls,chinise', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `dish_details`
--

CREATE TABLE `dish_details` (
  `ID` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `dish_details`
--

INSERT INTO `dish_details` (`ID`, `dish_id`, `attribute`, `price`, `status`) VALUES
(1, 1, 'Full', 200, 1),
(2, 1, 'Half', 110, 1),
(3, 1, 'jj', 55, 1),
(4, 2, 'Half', 99, 1),
(5, 2, 'Full', 189, 1),
(6, 3, 'S', 59, 1),
(7, 3, 'M', 99, 1),
(8, 4, 'Per Piece', 39, 1),
(9, 5, 'Per Cup', 79, 1),
(10, 6, 'Half', 119, 1),
(11, 6, 'Full', 199, 1),
(12, 7, 'Half', 39, 1),
(13, 7, 'Full', 69, 1),
(14, 8, 'Per Piece', 69, 1),
(15, 10, 'sfvs', 55, 1),
(16, 11, 'd', 4, 1),
(17, 12, 'rf', 5, 1),
(18, 13, 'sd', 4, 1),
(19, 14, 'dac', 4, 1),
(20, 15, 'd', 4, 1),
(21, 16, 'k', 4, 1),
(22, 3, 'L', 130, 1),
(23, 3, 'XL', 180, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `q` varchar(255) NOT NULL,
  `a` longtext NOT NULL,
  `display_priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `q`, `a`, `display_priority`) VALUES
(17, 'What is Lorem Ipsum ?', '<p>Nullam sed neque luctus, maximus diam sed, facilisis orci. Nunc ultricies neque a aliquam sollicitudin. Vivamus sit amet finibus sapien. Duis est dui, sodales nec pretium a, interdum in lacus. Sed et est vel velit vestibulum tincidunt non a felis. Phasellus convallis, diam eu facilisis tincidunt, ex nibh vulputate dolor, eu maximus massa libero vel eros. In vulputate metus lacus, eu vehicula dolor feugiat id. Nulla vitae nisl in ex consequat porttitor vel a lectus. Vestibulum viverra in velit ac consequat. Nullam porta nulla eu dignissim cursus.</p>', 1),
(18, 'Why do we use it?', 'Cras non gravida urna. Ut venenatis nulla in tellus lobortis, vel mollis lectus condimentum. Duis elementum sapien purus, et sagittis nulla efficitur in. Phasellus vitae eros sed nisi fringilla auctor nec quis nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque rutrum faucibus nibh vitae fermentum. Aliquam commodo sem sit amet malesuada consectetur. Ut sit amet vestibulum diam. Etiam quis dictum turpis, eget condimentum velit. Sed cursus odio dapibus, consectetur massa sit amet, fringilla purus.', 2),
(19, 'Where does it come from?', 'Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin tortor enim, lacinia nec malesuada eget, laoreet eget quam. Suspendisse quis mauris quis tellus rutrum imperdiet nec id ipsum. Suspendisse non nisi in metus viverra convallis. Nam dictum erat sed libero eleifend, a venenatis ipsum elementum. Nulla placerat metus nec nisl malesuada, et mattis mauris faucibus. Cras blandit efficitur condimentum. Nam euismod sapien et iaculis tempus. Duis vitae ullamcorper libero.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `dish_id`, `image`) VALUES
(81, 6, '1656474157.jpg'),
(80, 5, '798376131.jpg'),
(79, 5, '1065044710.jpg'),
(78, 5, '2115331031.jpg'),
(77, 5, '82737345.jpg'),
(76, 5, '1462802522.jpg'),
(75, 4, '948709277.jpg'),
(74, 4, '160282422.jpg'),
(73, 4, '1965414849.jpg'),
(72, 3, '880655404.jpg'),
(71, 3, '452227497.jpg'),
(70, 3, '1198913091.jpg'),
(69, 2, '1842924410.jpg'),
(68, 2, '1347843201.jpg'),
(67, 2, '1383075113.jpg'),
(66, 2, '913357507.jpg'),
(65, 2, '2101887582.jpg'),
(82, 6, '794501641.jpg'),
(83, 6, '797113198.jpg'),
(84, 6, '907654775.jpg'),
(85, 7, '1253590335.jpg'),
(86, 7, '196742827.jpg'),
(87, 7, '1907609124.jpg'),
(88, 7, '1413102244.jpeg'),
(89, 8, '1673147845.jpg'),
(90, 8, '1108230146.jpg'),
(91, 8, '1394281360.jpg'),
(92, 8, '717474439.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `appartment` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `total_price` float NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `final_price` float NOT NULL,
  `delievery_boy_id` int(11) DEFAULT NULL,
  `order_status` varchar(50) NOT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `delievered_on` datetime DEFAULT NULL,
  `order_cancelBy` enum('user','admin') DEFAULT NULL,
  `order_cancelAt` datetime DEFAULT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `name`, `user_id`, `email`, `phone`, `address`, `appartment`, `postcode`, `city`, `payment_type`, `payment_id`, `total_price`, `coupon_code`, `final_price`, `delievery_boy_id`, `order_status`, `payment_status`, `delievered_on`, `order_cancelBy`, `order_cancelAt`, `added_on`) VALUES
(10, 'sagar', 8, 'atechseva@gmail.com', '7017742830', 'kaseru khera', 'wefwef', '4344343', 'meerut', 'cod', NULL, 128, '', 128, NULL, '2', 'success', '2023-08-28 11:28:19', NULL, NULL, '2023-08-28 07:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ID` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `dish_details_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ID`, `order_id`, `dish_details_id`, `price`, `qty`) VALUES
(11, 10, 6, 59, 1),
(12, 10, 14, 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `status`) VALUES
(1, 'pending'),
(2, 'complete'),
(3, 'on the way'),
(4, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `cart_min_price` int(11) NOT NULL,
  `cart_min_price_msg` varchar(255) NOT NULL,
  `website_close` int(11) NOT NULL,
  `website_close_msg` varchar(255) NOT NULL,
  `website_path` varchar(255) NOT NULL,
  `wallet_amount` int(11) NOT NULL,
  `referral_amount` int(11) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `fav` varchar(255) NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `site_phone` varchar(12) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `smtp_email` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `opening_hours` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `themecolor` varchar(50) NOT NULL,
  `mainbtn` varchar(50) NOT NULL,
  `secondarybtn` varchar(50) NOT NULL,
  `mobilenav` varchar(50) NOT NULL,
  `mobilenavlight` varchar(50) NOT NULL,
  `mobilenavtxt` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `cart_min_price`, `cart_min_price_msg`, `website_close`, `website_close_msg`, `website_path`, `wallet_amount`, `referral_amount`, `instagram`, `facebook`, `twitter`, `youtube`, `logo`, `fav`, `site_address`, `site_phone`, `site_email`, `smtp_email`, `smtp_password`, `opening_hours`, `tagline`, `themecolor`, `mainbtn`, `secondarybtn`, `mobilenav`, `mobilenavlight`, `mobilenavtxt`) VALUES
(1, 20, 'Min Price is 20', 0, 'Website Closed !', 'http://localhost/food-ordering/', 50, 50, 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'logo.png', 'fav.png', 'Ground floor DCM Building, Barakhamba Road, Connaught Place', '91 813065425', 'dcm@foodieez.in', 'atechseva@gmail.com', 'enter your password here', 'Everyday : 08:30 - 20:30', 'Get Rs.50 On Sign up + Rs.3 Per Referral (Paytm Cash)', '#fd7d16', '#fd7d16', '#ffb700', '#0a0c1a', '#04050a', '#ebebeb');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`ID`, `email`, `added_on`) VALUES
(1, 'developer.sagar10@gmail.com', '2023-08-28'),
(2, 'sfweg@34gersdc.com', '2023-08-28'),
(3, 'fghjk@h.com', '2023-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `referral_from` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`, `mobile`, `referral_code`, `referral_from`, `token`, `status`, `added_on`) VALUES
(1, 'hello', 'developer.sagar10@gmail.com', '$2y$10$OkrHuaBxB.br.Yn/aJkvQe5Q.extcPgGV6ltPOWFXcZUJ/ReCPA2m', '7017742830', '84aab2b65eca', '', '6210c3de0b2f0778fa8b8a529f3bda', 'active', '2023-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `type` enum('in','out') NOT NULL,
  `message` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `amount`, `type`, `message`, `payment_id`, `added_on`) VALUES
(1, 1, 50, 'in', 'New Register', 0, '2023-08-29 05:22:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `delievery_boy`
--
ALTER TABLE `delievery_boy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dish_details`
--
ALTER TABLE `dish_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delievery_boy`
--
ALTER TABLE `delievery_boy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dish_details`
--
ALTER TABLE `dish_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
