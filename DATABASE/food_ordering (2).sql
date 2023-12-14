-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 11:01 AM
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
(1, 'Welcome to Eminent Food stores India Pvt. Ltd. Formerly Known as FOODIEEZ.', '<p>Best source of quality and hygiene fast food.</p>\r\n<p>We\'re dedicated to giving you the very best of food products, with a focus on great taste, quality, health &amp; Hygiene.</p>\r\n<p>Founded in 2019 by lovers of food, Eminent Food stores India Pvt. Ltd (Foodieez). has come a long way from its beginnings in Delhi Metro. When promoters first started out, their passion &amp; motto for Foodieez was to provide customers \"Pocket Friendly, Hygienic, tasty food products\" this drove them to start new vertical for food chain, after doing tons of research, they have launched Foodieez, that offer you \" world\'s class food products\".</p>\r\n<p>We now serve customers all over New Delhi and are thrilled that we\'re able to turn our passion into our food products.</p>\r\n<p>we hope you enjoy our food products as much as we enjoy offering them to you. If you have any questions or comments, please don\'t hesitate to contact us.</p>\r\n<p>Sincerely,</p>\r\n<p>[Foodieez Management]</p>', 'about-us.png');

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
  `store` varchar(255) NOT NULL COMMENT '1=Arunachal CP, 2=DCM, 3= Bhikaji, 99=Admin 100=developer',
  `admin_mobile` varchar(255) DEFAULT NULL,
  `admin_status` enum('0','1') NOT NULL DEFAULT '1',
  `added_by` varchar(100) NOT NULL,
  `added_on` date NOT NULL,
  `admin_update_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_email`, `admin_password`, `role`, `store`, `admin_mobile`, `admin_status`, `added_by`, `added_on`, `admin_update_on`) VALUES
(23, 'CP', 'cp@foodieez.in', 'cp@foodieez.in', 'test', '1', NULL, '1', 'developer@foodieez.in', '2023-09-26', '2023-10-18 17:52:59'),
(19, 'Admin', 'admin@foodieez.in', 'admin@foodieez.in', 'super', '99', NULL, '1', 'developer@foodieez.in', '2023-09-26', '2023-12-13 10:35:07'),
(22, 'DCM', 'dcm@foodieez.in', 'dcm@foodieez.in', 'test', '2', NULL, '1', 'developer@foodieez.in', '2023-09-26', '2023-10-18 18:09:36'),
(21, 'Developer', 'developer@foodieez.in', 'developer@foodieez.in', 'super', '100', '7017742830', '1', 'developer@foodieez.in', '2023-09-26', '2023-10-11 11:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `banner_link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ID`, `image`, `alt`, `banner_link`) VALUES
(31, 'hh925.png', 'hh', 'dishes'),
(32, 'foodieez-special905.png', 'foodieez-special', 'dishes'),
(27, 'Foodieez424.jpg', 'Foodieez', 'dishes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dish_detail_id` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `discount` varchar(244) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `order_number` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `category`, `discount`, `slug`, `order_number`, `image`, `status`, `added_on`) VALUES
(9, 'Sandwich', NULL, 'sandwich', 2, 'sandwich.webp', 1, '2023-10-11 00:00:00'),
(20, 'Noodles', NULL, 'noodles', 12, 'noodles.webp', 1, '2023-10-11 00:00:00'),
(11, 'Wrap', NULL, 'wrap', 3, 'rolls.webp', 1, '2023-10-11 00:00:00'),
(19, 'Oats', NULL, 'oats', 7, 'oats.jpg', 1, '2023-09-19 00:00:00'),
(14, 'Thali', NULL, 'thali', 11, 'thali.jpg', 1, '2023-09-02 00:00:00'),
(15, 'Biryani', NULL, 'biryani', 13, 'biryani.jpg', 1, '2023-09-19 00:00:00'),
(16, 'Shake', NULL, 'shake', 8, 'shake.jpg', 1, '2023-09-19 00:00:00'),
(17, 'Paratha', NULL, 'paratha', 9, 'paratha.jpg', 1, '2023-09-19 00:00:00'),
(18, 'Maggie', NULL, 'maggie', 4, 'maggie.jpg', 1, '2023-09-19 00:00:00'),
(26, 'Burger', NULL, 'burger', 1, 'burger.webp', 1, '2023-09-19 00:00:00'),
(29, 'Fast Food', NULL, 'fast-food', 5, 'fast-food.jpg', 1, '2023-09-19 00:00:00'),
(30, 'Soup', NULL, 'soup', 10, 'soup.jpg', 1, '2023-09-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` longtext NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `name`, `email`, `subject`, `phone`, `message`, `added_on`) VALUES
(4, 'erfrf', 'developer.sagar10@gmail.com', 'ewfwe', NULL, 'wefwef', '2023-09-22 04:02:48'),
(5, 'erfrf', 'developer.sagar10@gmail.com', 'ewfwe', NULL, 'wefwef', '2023-09-22 04:03:05'),
(6, 'erfrf', 'developer.sagar10@gmail.com', 'ewfwe', NULL, 'wefwef', '2023-09-22 04:03:23'),
(7, 'erfrf', 'developer.sagar10@gmail.com', 'ewfwe', NULL, 'wefwef', '2023-09-22 04:04:14'),
(8, 'erfrf', 'developer.sagar10@gmail.com', 'ewfwe', NULL, 'wefwef', '2023-09-22 04:04:47'),
(9, 'trewq', 'developer.sagar10@gmail.com', 'refdwsq', NULL, 'gfedwsa', '2023-09-22 04:35:32'),
(10, 'trewq', 'developer.sagar10@gmail.com', 'refdwsq', NULL, 'gfedwsa', '2023-09-22 04:38:02'),
(11, 'ewre', 'developer.sagar10@gmail.com', 'grfw2t', NULL, 'ge3w2', '2023-09-22 04:38:43'),
(12, 'bvfedsqa', 'developer.sagar10@gmail.com', 'gvfdwsv', NULL, 'cdsa', '2023-09-22 04:39:19'),
(13, 'dfvas', 'developer.sagar10@gmail.com', 'fads', NULL, 'rfedwsq', '2023-09-22 04:40:10'),
(14, 'Sagar Kumar', 'developer.sagar10@gmail.com', 'Just Test By Dev....!!!!!!!', NULL, 'Just Test By Dev Message ...!!!!!!!', '2023-09-28 04:43:48');

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
(3, 'NEW', 'F', '10', '50', '2023-11-30', 0, '2023-10-12');

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

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `ID` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` enum('veg','non-veg') NOT NULL DEFAULT 'veg',
  `price_tagline` varchar(255) DEFAULT NULL,
  `is_detailed_dish` enum('0','1') DEFAULT NULL,
  `is_attribute_product` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=no, 1=yes',
  `meal` varchar(255) DEFAULT NULL,
  `dish` varchar(255) NOT NULL,
  `mrp` bigint(255) DEFAULT NULL,
  `selling_price` bigint(255) DEFAULT NULL,
  `main_sku` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `dish_detail` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_popular` enum('0','1') NOT NULL DEFAULT '0',
  `is_combo` enum('0','1') NOT NULL DEFAULT '0',
  `is_daydish` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_available` enum('0','1') NOT NULL DEFAULT '1',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `trash` enum('0','1') NOT NULL DEFAULT '0',
  `added_on` date NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`ID`, `category_id`, `type`, `price_tagline`, `is_detailed_dish`, `is_attribute_product`, `meal`, `dish`, `mrp`, `selling_price`, `main_sku`, `image`, `short_description`, `dish_detail`, `slug`, `is_popular`, `is_combo`, `is_daydish`, `status`, `is_available`, `meta_title`, `meta_description`, `meta_keywords`, `trash`, `added_on`, `updated_on`) VALUES
(6, 14, 'veg', '', '0', '1', 'lunch,dinner,', 'Mann Ki Thali', 0, 0, '', 'mann-ki-thali2023-7508.webp', 'Make Your Own Thali', '', 'man-ki-thali', '0', '0', '0', '1', '1', 'Make-Your-Own-Thali', 'Make Your Own Thali', 'thali,mann-ki-thali', '0', '0000-00-00', '0000-00-00 00:00:00'),
(7, 14, 'veg', 'Regular Price @225 ', '0', '1', 'lunch,dinner,', 'Super Deluxe Thali', 0, 0, '', 'super-deluxe-thali2023-2818.webp', 'Rajma/Chole, Dal Makhani, Shahi Paneer, 4 Tawa Roti, Rice, Boondi Raita & Salad.', '', 'super-delexe-thali', '0', '0', '0', '1', '1', 'Super-Deluxe-Thali', 'Rajma/Chole, Dal Makhani, Shahi Paneer, 4 Tawa Roti, Rice, Boondi Raita & Salad.', 'thali,super-deluxe-thali,deluxe-thali', '0', '0000-00-00', '0000-00-00 00:00:00'),
(8, 14, 'veg', 'Regular Price @175 ', '0', '1', 'lunch,dinner,', 'Deluxe Thali', 0, 0, '', 'deluxe-thali2023-2712.jpg', 'Shahi Paneer/Dal Makhani, 4 Tawa Roti, Rice, Boondi Raita & Salad', '', 'deluxe-thali', '0', '0', '0', '1', '1', 'Deluxe-Thali', 'Shahi Paneer/Dal Makhani, 4 Tawa Roti, Rice, Boondi Raita & Salad', 'thali,shahi-panner,dal-makhani,raita,salad', '0', '0000-00-00', '0000-00-00 00:00:00'),
(9, 14, 'veg', 'Regular Price @125', '0', '1', 'lunch,dinner,', 'Ghar Ki Thali', 0, 0, '', 'ghar-ki-thali2023-4434.webp', 'Rajma/Chole, 2 Tawa Roti, Rice, Boondi Raita & Salad', '', 'ghar-ki-thali', '0', '0', '0', '1', '1', 'Ghar-Ki-Thali', 'Rajma/Chole, 2 Tawa Roti, Rice, Boondi Raita & Salad', 'thali,ghar-ki-thali', '0', '0000-00-00', '0000-00-00 00:00:00'),
(10, 14, 'veg', 'Regular Price @120 ', '0', '0', 'lunch,', 'Rajma Rice', 99, 99, 'RICE-5', 'rajma-rice2023-5184.jpg', 'Rajma Rice With Green Chutney & Sliced Onion.', '', 'rajma-rice', '0', '0', '0', '1', '1', 'Rajma-Rice', 'Rajma Rice With Green Chutney & Sliced Onion.', 'rajma,rice,rajma-rice', '0', '0000-00-00', '0000-00-00 00:00:00'),
(11, 14, 'veg', 'Regular Price @120', '0', '0', 'lunch,', 'Dal Rice', 99, 99, 'RICE-4', 'dal-rice2023-6865.jpg', 'Dal Rice With Green Chutney & Sliced Onion.', '', 'dal-rice', '0', '0', '0', '1', '1', 'Dal-Rice', 'Dal Rice With Green Chutney & Sliced Onion.', 'dal,rice,dal-rice', '0', '0000-00-00', '0000-00-00 00:00:00'),
(12, 14, 'veg', 'Regular Price @120', '0', '0', 'lunch,', 'Chole Rice', 99, 99, 'RICE-3', 'chole-rice2023-9472.png', 'Chole Rice With Green Chutney & Sliced Onion.', '', 'chole-rice', '0', '0', '0', '1', '1', 'Chole-Rice', 'Chole Rice With Green Chutney & Sliced Onion.', 'Chole-Rice,chole,rice', '0', '0000-00-00', '0000-00-00 00:00:00'),
(13, 15, 'veg', 'Regular Price @149', '0', '0', 'lunch,dinner,', 'Veg Biryani', 125, 125, 'BIRYANI-001', 'veg-biryani2023-7458.jpg', '', '', 'veg-biryani', '0', '0', '0', '1', '1', 'Veg-Biryani', 'Veg Biryani', 'Veg-Biryani,veg,biryani', '0', '0000-00-00', '0000-00-00 00:00:00'),
(14, 15, 'veg', 'Regular Price @169', '0', '0', 'lunch,dinner,', 'Panner Biryani', 149, 149, 'BIRYANI-002', 'panner-biryani2023-9593.webp', '', '', 'panner-biryani', '0', '0', '0', '1', '1', 'Panner-Biryani', 'Panner Biryani', 'Panner-Biryani,panner,biryani', '0', '0000-00-00', '0000-00-00 00:00:00'),
(15, 15, 'non-veg', 'Regular Price @169', '0', '0', 'lunch,dinner,', 'Egg Biryani', 149, 149, 'BIRYANI-003', 'egg-biryani2023-9238.jpg', '', '', 'egg-biryani', '0', '0', '0', '1', '1', 'Egg-Biryani', 'Egg Biryani', 'Egg-Biryani,egg,biryani', '0', '0000-00-00', '0000-00-00 00:00:00'),
(16, 15, 'non-veg', 'Regular Price @189', '0', '0', 'lunch,dinner,', 'Chicken Biryani', 169, 169, 'BIRYANI-004', 'chicken-biryani2023-3079.jpg', '', '', 'chicken-biryani', '0', '0', '0', '1', '1', 'Chicken-Biryani', 'Chicken Biryani', 'Chicken-Biryani,chicken,biryani', '0', '0000-00-00', '0000-00-00 00:00:00'),
(17, 16, 'veg', '', '0', '0', 'beverages,', 'Vanilla Shake', 120, 120, 'Shakes-Breverages-5', 'vanilla-shake2023-7769.jpg', 'Vanilla, Ice Cream, Milk, Sugar Syrup', '', 'vanilla-shake', '0', '0', '0', '1', '1', 'Vanilla-Shake', 'Vanilla Shake', 'Vanilla-Shake,shake,vanilla', '0', '0000-00-00', '0000-00-00 00:00:00'),
(18, 16, 'veg', '', '0', '0', 'beverages,', 'Banana Shake', 120, 120, 'Shakes-Breverages-017', 'banana-shake2023-3887.jpg', 'Banana, Ice Cream, Milk, Sugar Syrup', '', 'banana-shake', '0', '0', '0', '1', '1', 'Banana-Shake', 'Banana, Ice Cream, Milk, Sugar Syrup', 'shake,banana,banana-shake', '0', '0000-00-00', '0000-00-00 00:00:00'),
(19, 16, 'veg', '', '0', '0', 'beverages,', 'Chocolate Shake', 130, 130, 'Shakes-Breverages-1', 'chocolate-shake2023-8481.jpg', 'Chocolate Syrup, Ice Cream, Milk', '', 'chocolate-shake', '0', '0', '0', '1', '1', 'Chocolate-Shake', 'Chocolate Syrup, Ice Cream, Milk', 'Chocolate-Shake,shake,chocolate', '0', '0000-00-00', '0000-00-00 00:00:00'),
(20, 16, 'veg', '', '0', '0', 'beverages,', 'Strawberry Shake', 130, 130, 'Shakes-Breverages-3', 'strawberry-shake2023-9374.jpg', 'Strawberry Syrup, Ice Cream, Milk', '', 'strawberry-shake', '0', '0', '0', '1', '1', 'Strawberry-Shake', 'Strawberry Syrup, Ice Cream, Milk', 'Strawberry,Strawberry--shake', '0', '0000-00-00', '0000-00-00 00:00:00'),
(21, 16, 'veg', '', '0', '0', 'beverages,', 'Mango Shake', 140, 140, 'Shakes-Breverages-018', 'mango-shake2023-9482.jpg', 'Mango, Ice Cream, Milk, Sugar Syrup', '', 'mango-shake', '0', '0', '0', '1', '1', 'Mango-Shake', 'Mango, Ice Cream, Milk, Sugar Syrup', 'mango,mango-shake,shake', '0', '0000-00-00', '0000-00-00 00:00:00'),
(22, 16, 'veg', '', '0', '0', 'beverages,', 'Oreo Shake', 160, 160, 'Shakes-Breverages-4', 'oreo-shake2023-6390.jpg', 'Oreo Biscuit, Ice Cream, Milk, Sugar', '', 'oreo-shake', '0', '0', '0', '1', '1', 'Oreo-Shake', 'Oreo Biscuit, Ice Cream, Milk, Sugar', 'oreo,shake,oreo-shake', '0', '0000-00-00', '0000-00-00 00:00:00'),
(23, 16, 'veg', '', '0', '0', 'beverages,', 'Choco Brownie Shake', 190, 190, 'Shakes-Breverages-2', 'choco-brownie-shake2023-6224.jpg', 'Brownie, Ice Cream, Milk, Sugar Syrup', '', 'choco-brownie-shake', '0', '0', '0', '1', '1', 'Choco-Brownie-Shake', 'Brownie, Ice Cream, Milk, Sugar Syrup', 'Choco-Brownie-Shake,choco-shake,shake,Brownie-Shake', '0', '0000-00-00', '0000-00-00 00:00:00'),
(24, 17, 'veg', '', '0', '0', 'breakfast,', 'Plain Paratha with Curd', 50, 50, 'PARATHA-7', 'plain-paratha-with-curd2023-8298.jpg', 'Multi Grain Wheat, Butter, Curd, Green Chutney, Paratha', '', 'plain-paratha-with-curd', '0', '0', '0', '1', '1', 'Plain-Paratha-with-Curd', 'Multi Grain Wheat, Butter, Curd, Green Chutney, Paratha', 'paratha,curd,plain-paratha', '0', '0000-00-00', '0000-00-00 00:00:00'),
(25, 18, 'veg', '', '0', '0', 'breakfast,', 'Plain Maggi', 60, 60, 'Maggi-1', 'plain-maggi2023-3611.jpg', 'Coriander,Fast Food, Maggi, Water', '', 'plain-maggie', '0', '0', '0', '1', '1', 'Plain-Maggi', 'Coriander,Fast Food, Maggi, Water', 'maggie,plain-maggie', '0', '0000-00-00', '0000-00-00 00:00:00'),
(26, 19, 'veg', '', '0', '0', 'breakfast,', 'Masala Oats', 70, 70, 'OATS-01', 'masala-oats2023-7286.jpg', 'Capsicum, Carrot, Chili, Coriander, Corn, Flakes, Maggi Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', '', 'masala-oats', '0', '0', '0', '1', '1', 'Masala-Oats', 'Capsicum, Carrot, Chili, Coriander, Corn, Flakes, Maggi Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', 'masala-oats,oats', '0', '0000-00-00', '0000-00-00 00:00:00'),
(27, 19, 'veg', '', '0', '0', 'breakfast,', 'Veggie Masala Oats', 80, 80, 'OATS-02', 'veggie-masala-oats2023-1173.jpg', 'Capsicum, Carrot, Chili, Coriander, Corn, Flakes, Maggi Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', '', 'veggie-masala-oats', '0', '0', '0', '1', '1', 'Veggie-Masala-Oats', 'Capsicum, Carrot, Chili, Coriander, Corn, Flakes, Maggi Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', 'oats,masala-oats,veggie-masala-oats', '0', '0000-00-00', '0000-00-00 00:00:00'),
(28, 19, 'veg', '', '0', '0', 'breakfast,', 'Butter Masala Oats', 90, 90, 'OATS-03', 'butter-masala-oats2023-9136.jpg', 'Butter, Capsicum, Carrot, Chili, Coriander, Corn, Flakes, Maggi, Masala, Mushroom, Oats, Onion, Peas, Tomato', '', 'butter-masala-oats', '0', '0', '0', '1', '1', 'Butter-Masala-Oats', 'Butter, Capsicum, Carrot, Chili, Coriander, Corn, Flakes, Maggi, Masala, Mushroom, Oats, Onion, Peas, Tomato', 'oats,masala-oats,butter-masala-oats', '0', '0000-00-00', '0000-00-00 00:00:00'),
(29, 19, 'veg', '', '0', '0', 'breakfast,', 'Milk Oats', 105, 105, 'OATS-04', 'milk-oats2023-5465.jpg', 'Adam, Kaju, Milk, Oats, Sugar', '', 'milk-oats', '0', '0', '0', '1', '1', 'Milk-Oats', 'Adam, Kaju, Milk, Oats, Sugar', 'kaju,oats,milt-oats,kaju-oats,milk-oats', '0', '0000-00-00', '0000-00-00 00:00:00'),
(30, 19, 'non-veg', '', '0', '0', 'breakfast,', 'Egg Masala Oats', 110, 110, 'OATS-05', 'egg-masala-oats2023-1823.jpg', 'Capsicum, Carrot, Chili, Coriander, Corn, Egg, Flakes, Maggi, Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', '', 'egg-masala-oats', '0', '0', '0', '1', '1', 'Egg-Masala-Oats', 'Capsicum, Carrot, Chili, Coriander, Corn, Egg, Flakes, Maggi, Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', 'masala-oats,egg-oats,Egg-Masala-Oats', '0', '0000-00-00', '0000-00-00 00:00:00'),
(31, 19, 'non-veg', '', '0', '0', 'breakfast,', 'Chicken Masala Oats', 140, 140, 'OATS-06', 'chicken-masala-oats2023-9451.jpg', 'Boneless, Capsicum, Carrot, Chicken, Chili, Coriander, Corn, Flakes, Maggi Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', '', 'chicken-masala-oats', '0', '0', '0', '1', '1', 'Chicken-Masala-Oats', 'Boneless, Capsicum, Carrot, Chicken, Chili, Coriander, Corn, Flakes, Maggi Masala, Mushroom, Oats, Oil, Onion, Peas, Tomato', 'chicken-oats,chicken-masala-oats,masala-oats', '0', '0000-00-00', '0000-00-00 00:00:00'),
(32, 17, 'veg', '', '0', '0', 'breakfast,', 'Pyaz Paratha', 90, 90, 'PARATHA-2', 'pyaz-paratha2023-9678.jpg', 'Multi Grain Wheat, Masala, Onion, Paratha', '', 'pyaz-paratha', '0', '0', '0', '1', '1', 'Pyaz-Paratha', 'Multi Grain Wheat, Masala, Onion, Paratha', 'pyaz-paratha,paratha', '0', '0000-00-00', '0000-00-00 00:00:00'),
(33, 9, 'veg', '', '0', '0', 'breakfast,', 'Coleslaw Sandwich', 80, 80, 'SANDWITCH-01', 'coleslaw-sandwich2023-1403.jpg', 'Bread, Butter, Cabbage, Carrot, Chat Masala, Salad Mayo, White Pepper', '', 'coleslaw-sandwich', '0', '0', '0', '1', '1', 'Coleslaw-Sandwich', 'Bread, Butter, Cabbage, Carrot, Chat Masala, Salad Mayo, White Pepper', 'Coleslaw-Sandwich,sandwich,coleslaw', '0', '0000-00-00', '0000-00-00 00:00:00'),
(34, 9, 'veg', '', '0', '0', 'breakfast,', 'Bombay Sandwich', 100, 100, 'SANDWITCH-03', 'bombay-sandwich2023-8436.webp', 'Aloo, Bread, Butter, Chat Masala, Chutney, Cucumber, Green Mayo, Onion, Salad, Sandwich, Toast, Tomato', '', 'bombay-sandwich', '0', '0', '0', '1', '1', 'Bombay-Sandwich', 'Aloo, Bread, Butter, Chat Masala, Chutney, Cucumber, Green Mayo, Onion, Salad, Sandwich, Toast, Tomato', 'sandwich,bombay-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(35, 9, 'veg', '', '0', '0', 'breakfast,', 'Veg Cheese Sandwich', 130, 130, 'SANDWITCH-04', 'veg-cheese-sandwich2023-2167.jpg', 'Bread, Broccoli, Butter, Capsicum, Carrot, Chat Masala, Cheese Blend, Cheese Sliced, Corn, Cucumber, Mushroom, Peas, Salad Mayo, Tomato, White Pepper', '', 'veg-cheese-sandwich', '0', '0', '0', '1', '1', 'Veg-Cheese-Sandwich', 'Bread, Broccoli, Butter, Capsicum, Carrot, Chat Masala, Cheese Blend, Cheese Sliced, Corn, Cucumber, Mushroom, Peas, Salad Mayo, Tomato, White Pepper', 'sandwich,veg-sandwich,veg-cheese-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(36, 9, 'veg', '', '0', '0', 'breakfast,', 'Paneer Tikka Sandwich', 135, 135, 'SANDWITCH-05', 'paneer-tikka-sandwich2023-8708.jpg', 'Bread, Butter, Capsicum, Chat Masala, Cheese Blend, Onion, Tandoori Sauce, White Pepper', '', 'paneer-tikka-sandwich', '0', '0', '0', '1', '1', 'Paneer-Tikka-Sandwich', 'Bread, Butter, Capsicum, Chat Masala, Cheese Blend, Onion, Tandoori Sauce, White Pepper', 'Paneer-Tikka-Sandwich,panner-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(37, 9, 'non-veg', '', '0', '0', 'breakfast,', 'Non Veg Sandwich', 150, 150, 'SANDWITCH-07', 'non-veg-sandwich2023-5126.webp', 'Bread, Butter, Cheese Blend, Chicken Kebab, Chicken Patty, Chilli Garlic, Cucumber, Onion, Thousand Sause', '', 'non-veg-sandwich', '0', '0', '0', '1', '1', 'Non-Veg-Sandwich', 'Bread, Butter, Cheese Blend, Chicken Kebab, Chicken Patty, Chilli Garlic, Cucumber, Onion, Thousand Sause', 'non-veg,Non-Veg-Sandwich,chicken-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(38, 9, 'veg', '', '0', '0', 'breakfast,', 'Foodieez Special Veg Sandwich', 160, 160, 'SANDWITCH-06', 'foodieez-special-veg-sandwich2023-6559.jpg', 'Aloo Toast, Bread, Butter, Capsicum, Chat Masala, Coleslaw, Cucumber, Green Chutney, Onion, Paneer, Salad Mayo, Tomato', '', 'foodieez-special-veg-sandwich', '0', '0', '0', '1', '1', 'Foodieez-Special-Veg-Sandwich', 'Aloo Toast, Bread, Butter, Capsicum, Chat Masala, Coleslaw, Cucumber, Green Chutney, Onion, Paneer, Salad Mayo, Tomato', 'foodieez-special-veg-sandwich,special-sandwich,foodieez-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(39, 9, 'non-veg', '', '0', '0', 'breakfast,', 'Chicken Keema Sandwich', 160, 160, 'SANDWITCH-08', 'chicken-keema-sandwich2023-3535.jpg', 'Bread, Butter, Chicken Keema, Cucumber, Green Chutney, Salad Mayo, Onion, Tomato', '', 'chicken-keema-sandwich', '0', '0', '0', '1', '1', 'Chicken-Keema-Sandwich', 'Bread, Butter, Chicken Keema, Cucumber, Green Chutney, Salad Mayo, Onion, Tomato', 'chicken-keema-sandwich,keema-sandwich,chicken-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(40, 9, 'non-veg', '', '0', '0', 'breakfast,', 'Chicken Cheese Sandwich', 170, 170, 'SANDWITCH-09', 'chicken-cheese-sandwich2023-6094.jpg', 'Boneless, Bread, Butter, Cheese, Chicken, Chutney, Cucumber, Green, Onion, Sandwich, Sliced, Tandoori, Tomato', '', 'chicken-cheese-sandwich', '0', '0', '0', '1', '1', 'Chicken-Cheese-Sandwich', 'Boneless, Bread, Butter, Cheese, Chicken, Chutney, Cucumber, Green, Onion, Sandwich, Sliced, Tandoori, Tomato', 'chicken-cheese-sandwich,cheese-sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(41, 9, 'non-veg', '', '0', '0', 'breakfast,', 'Chicken Salami Sandwich', 180, 180, 'SANDWITCH-10', 'chicken-salami-sandwich2023-7412.jpg', 'Blend, Bread, Butter, Cheese, Chicken, Chilli, Cucumber, Garlic, Onion, Salami, Sandwich, Tandoori, Tomato', '', 'chicken-salami-sandwich', '0', '0', '0', '1', '1', 'Chicken-Salami-Sandwich', 'Blend, Bread, Butter, Cheese, Chicken, Chilli, Cucumber, Garlic, Onion, Salami, Sandwich, Tandoori, Tomato', 'Chicken-Salami-Sandwich', '0', '0000-00-00', '0000-00-00 00:00:00'),
(42, 9, 'non-veg', '', '0', '0', 'breakfast,', 'Mutton Seekh Kebab Sandwich', 230, 220, 'SANDWITCH-11', 'mutton-seekh-kebab-sandwich2023-6649.jpg', 'Bread, Butter, Cheese Blend, Chilli Garlic, Cucumber Tomato, Green Chutney, Mutton Kabab, Onion, Thousand Sauce', '', 'mutto-eekh-kebab-sandwich', '0', '0', '0', '1', '1', 'Mutton-Seekh-Kebab-Sandwich', 'Bread, Butter, Cheese Blend, Chilli Garlic, Cucumber Tomato, Green Chutney, Mutton Kabab, Onion, Thousand Sauce', 'Mutton-Seekh-Kebab-Sandwich,mutton-sandwitch', '0', '0000-00-00', '2023-12-13 16:36:50'),
(43, 18, 'veg', '', '0', '0', 'breakfast,', 'Veggi Masala Maggi', 80, 80, 'Maggi-2', 'veggi-masala-maggi2023-2813.jpg', 'Butter, Capsicum, Carrot, Chilli, Coriander, Corn, Fast, Flakes, Food, Maggi Masala, Mushroom, Onion, Peas, Tomato', '', 'veggi-masala-maggi', '0', '0', '0', '1', '1', 'Veggi-Masala-Maggi', 'Butter, Capsicum, Carrot, Chilli, Coriander, Corn, Fast, Flakes, Food, Maggi Masala, Mushroom, Onion, Peas, Tomato', 'Veggi-Masala-Maggi,masala-maggie', '0', '0000-00-00', '0000-00-00 00:00:00'),
(44, 18, 'veg', '', '0', '0', 'breakfast,', 'Butter Masala Maggi', 90, 90, 'Maggi-3', 'butter-masala-maggi2023-2247.jpg', 'Butter, Capsicum, Carrot, Chilli Flakes, Coriander, Corn, Maggi, Maggi Masala, Mushroom, Onion, Peas, Tomato', '', 'butter-masala-maggi', '0', '0', '0', '1', '1', 'Butter-Masala-Maggi', 'Butter, Capsicum, Carrot, Chilli Flakes, Coriander, Corn, Maggi, Maggi Masala, Mushroom, Onion, Peas, Tomato', 'butter-maggie,butter-masala-maggie', '0', '0000-00-00', '0000-00-00 00:00:00'),
(45, 18, 'non-veg', '', '0', '0', 'breakfast,', 'Egg Masala Maggi', 110, 110, 'Maggi-4', 'egg-masala-maggi2023-1350.jpg', 'Capsicum, Carrot, Chilli Flakes, Coriander, Corn, Egg, Maggi, Maggi Masala, Mushroom, Oil, Onion, Peas, Tomato', '', 'egg-masala-maggi', '0', '0', '0', '1', '1', 'Egg-Masala-Maggi', 'Capsicum, Carrot, Chilli Flakes, Coriander, Corn, Egg, Maggi, Maggi Masala, Mushroom, Oil, Onion, Peas, Tomato', 'egg-maggie,egg-masala,egg-masala-maggie', '0', '0000-00-00', '0000-00-00 00:00:00'),
(46, 18, 'non-veg', '', '0', '0', 'breakfast,', 'Chicken Masala Maggi', 140, 140, 'Maggi-5', 'chicken-masala-maggi2023-1617.jpg', 'Boneless Chicken, Capsicum, Carrot, Chilli Flakes, Coriander, Corn, Maggi, Maggi Masala, Mushroom, Oil, Onion, Peas, Tomato', '', 'chicken-masala-maggi', '0', '0', '0', '1', '1', 'Chicken-Masala-Maggi', 'Boneless Chicken, Capsicum, Carrot, Chilli Flakes, Coriander, Corn, Maggi, Maggi Masala, Mushroom, Oil, Onion, Peas, Tomato', 'Chicken-Masala-Maggi,Chicken--Maggi', '0', '0000-00-00', '0000-00-00 00:00:00'),
(47, 17, 'veg', '', '0', '0', 'breakfast,', 'Aloo Pyaz Paratha', 110, 110, 'PARATHA-3', 'aloo-pyaz-paratha2023-3376.jpg', 'Multi Grain Wheat, Masala, Onion, Paratha, Potato', '', 'aloo-pyaz-paratha', '0', '0', '0', '1', '1', 'Aloo-Pyaz-Paratha', 'Multi Grain Wheat, Masala, Onion, Paratha, Potato', 'aloo-paratha,aloo-pyaz-paratha', '0', '0000-00-00', '0000-00-00 00:00:00'),
(48, 17, 'veg', '', '0', '0', 'breakfast,', 'Ghobhi Paratha', 125, 125, 'PARATHA-4', 'ghobhi-paratha2023-6952.jpg', 'Multi Grain Wheat, Black Pepper, Butter, Coriander, Curd, Garam Masala, Ghobhi, Green Chilli, Green Chutney, Oil, Salt', '', 'ghobhi-paratha', '0', '0', '0', '1', '1', 'Ghobhi-Paratha', 'Multi Grain Wheat, Black Pepper, Butter, Coriander, Curd, Garam Masala, Ghobhi, Green Chilli, Green Chutney, Oil, Salt', 'gobhi-paratha,paratha,veg-paratha', '0', '0000-00-00', '0000-00-00 00:00:00'),
(49, 17, 'veg', '', '0', '0', 'breakfast,', 'Paneer Paratha', 159, 159, 'PARATHA-5', 'paneer-paratha2023-3691.jpg', 'Multi Grain Wheat, Foodieez, Masala, Onion, Paneer, Paratha', '', 'paneer-paratha', '0', '0', '0', '1', '1', 'Paneer-Paratha', 'Multi Grain Wheat, Foodieez, Masala, Onion, Paneer, Paratha', 'panner-paratha,paratha', '0', '0000-00-00', '0000-00-00 00:00:00'),
(50, 17, 'veg', '', '0', '0', 'breakfast,', 'Paneer Pyaz Paratha', 165, 165, 'PARATHA-6', 'paneer-pyaz-paratha2023-9176.jpg', 'Multi Grain Wheat, Black Pepper, Butter, Coriander, Curd, Garam Masala, Green Chilli, Green Chutney, Oil, Onion, Paneer, Salt', '', 'paneer-pyaz-paratha', '0', '0', '0', '1', '1', 'Paneer-Pyaz-Paratha', 'Multi Grain Wheat, Black Pepper, Butter, Coriander, Curd, Garam Masala, Green Chilli, Green Chutney, Oil, Onion, Paneer, Salt', 'panner-pyaz-paratha,panner-paratha,paratha', '0', '0000-00-00', '0000-00-00 00:00:00'),
(51, 20, 'veg', '', '0', '0', 'noodles,', 'Veg Noodles', 119, 119, 'Veg-Noodles-01', 'veg-noodles2023-1326.webp', '', '', 'veg-noodles', '0', '0', '0', '1', '1', 'Veg-Noodles', 'Veg Noodles', 'Veg-Noodles,noodles,veg,Chinese', '0', '0000-00-00', '0000-00-00 00:00:00'),
(52, 20, 'veg', '', '0', '0', 'noodles,', 'Singaporean Noodles', 129, 129, 'singaporean-noodles-01', 'singaporean-noodles2023-5498.com__recipes__images__2015__05__20150424-singapore-noodles-shao-zhong-20-130b0ed9d8ad45b3bd164cbe1328abef', 'Singapore Noodles', '', 'singaporean-noodles', '0', '0', '0', '1', '1', 'Singapore-Noodles', 'Singapore Noodles', 'Singapore-Noodles,singaporean-noodles,singaporean,noodles', '0', '0000-00-00', '0000-00-00 00:00:00'),
(53, 20, 'veg', '', '0', '0', 'noodles,', 'Chilli Garlic Noodles', 129, 129, 'NOODLES-03', 'chilli-garlic-noodles2023-4064.webp', '', '', 'chilli-garlic-noodles', '0', '0', '0', '1', '0', 'Chilli-Garlic-Noodles', 'Chilli Garlic Noodles', 'Chilli-Garlic-Noodles,noodles,chilli-garlic', '0', '0000-00-00', '0000-00-00 00:00:00'),
(54, 20, 'veg', '', '0', '0', 'noodles,', 'Hakka Noodles', 139, 139, 'NOODLES-04', 'hakka-noodles2023-2710.jpg', '', '', 'hakka-noodles', '1', '0', '0', '1', '0', 'Hakka-Noodles', 'Hakka Noodles', 'Hakka-Noodles,noodles,chinise', '0', '0000-00-00', '0000-00-00 00:00:00'),
(55, 20, 'veg', '', '0', '0', 'noodles,', 'Paneer Noodles', 149, 149, 'NOODLES-05', 'paneer-noodles2023-6872.webp', '', '', 'paneer-noodles', '1', '0', '0', '1', '0', 'Paneer-Noodles', 'Paneer Noodles', 'Paneer-Noodles,panner,noodles', '0', '0000-00-00', '0000-00-00 00:00:00'),
(56, 20, 'non-veg', NULL, '0', '0', 'noodles,', 'Egg Noodles', 159, 159, 'NOODLES-06', 'egg-noodles2023-1627.webp', '', '', 'egg-noodles', '1', '0', '0', '1', '1', 'Egg-Noodles', 'Egg Noodles', 'Egg-Noodles,egg,noodles', '0', '0000-00-00', '0000-00-00 00:00:00'),
(57, 20, 'non-veg', '', '0', '0', 'noodles', 'Chicken Noodles', 179, 179, 'NOODLES-07', 'chicken-noodles2023-2763.jpg', '', NULL, 'chicken-noodles', '1', '0', '0', '1', '1', 'Chicken-Noodles', 'Chicken Noodles', 'Chicken-Noodles,chicken,noodles,non-veg', '0', '0000-00-00', '0000-00-00 00:00:00'),
(58, 26, 'veg', '', '1', '0', '', 'Aloo Tikki Burger', 75, 75, 'Burger-1', 'aloo-tikki-burger.webp', '', '', 'aloo-tikki-burger', '0', '0', '0', '1', '1', 'Aloo-Tikki-Burger', 'Aloo Tikki Burger', 'Aloo-Tikki-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(59, 26, 'non-veg', '', '1', '0', '', 'Maharaja Chicken Burger', 220, 220, 'Burger-10', 'maharaja-chicken-burger.webp', '', '', 'maharaja-chicken-burger', '0', '0', '0', '1', '1', 'Maharaja-Chicken-Burger', 'Maharaja Chicken Burger', 'Maharaja-Chicken-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(60, 26, 'non-veg', '', '1', '0', '', 'Mutton Seekh Kebab Burger', 220, 220, 'Burger-11', 'mutton-seekh-kabab-burger.jpg', '', '', 'mutton-seekh-kebab-burger', '0', '0', '0', '1', '1', 'Mutton-Seekh-Kebab-Burger', 'Mutton Seekh Kebab Burger', 'Mutton-Seekh-Kebab-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(61, 26, 'non-veg', '', '1', '0', '', 'Grilled Chicken Burger', 100, 100, 'Burger-13', 'Grilled-chicken-burgers2.jpg', '', '', 'grilled-chicken-burger', '0', '0', '0', '1', '1', 'Grilled-Chicken-Burger', 'Grilled Chicken Burger', 'Grilled-Chicken-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(62, 26, 'veg', '', '1', '0', '', 'Veggie Burger', 95, 95, 'Burger-2', 'veggie-burger.webp', '', '', 'veggie-burger', '0', '0', '0', '1', '1', 'Veggie-Burger', 'Veggie Burger', 'Veggie-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(63, 26, 'veg', '', '1', '0', '', 'Veg Crispy and Crunch Burger', 115, 115, 'Burger-3', 'veg-crispy-and-crunc.webp', '', '', 'veg-crispy-and-crunch-burger', '0', '0', '0', '1', '1', 'Veg-Crispy-&-Crunch-Burger', 'Veg Crispy & Crunch Burger', 'Veg-Crispy-&-Crunch-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(64, 26, 'veg', '', '1', '0', '', 'Maharaja Burger', 180, 180, 'Burger-4', 'maharaja-burger.jpg', '', '', 'maharaja-burger', '0', '0', '0', '1', '1', 'Maharaja-Burger', 'Maharaja Burger', 'Maharaja-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(65, 26, 'veg', '', '1', '0', '', 'Foodieez Special Veg Burger', 190, 190, 'Burger-5', 'foodieez-special-burger.webp', '', '', 'foodieez-special-veg-burger', '0', '0', '0', '1', '1', 'Foodieez-Special-Veg-Burger', 'Foodieez Special Veg Burger', 'Foodieez-Special-Veg-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(66, 26, 'veg', '', '1', '0', '', 'Paneer Tikki Burger', 149, 149, 'Burger-6', 'panner-tikki-burger.webp', '', '', 'paneer-tikki-burger', '0', '0', '0', '1', '1', 'Paneer-Tikki-Burger', 'Paneer Tikki Burger', 'Paneer-Tikki-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(67, 26, 'non-veg', '', '1', '0', '', 'Chicken Burger', 120, 120, 'Burger-7', 'chicken-burger.jpg', '', '', 'chicken-burger', '0', '0', '0', '1', '1', 'Chicken-Burger', 'Chicken Burger', 'Chicken-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(68, 26, 'non-veg', '', '1', '0', '', 'Chicken Cheese Burger', 155, 155, 'Burger-8', 'chicken-cheese-burger.webp', '', '', 'chicken-cheese-burger', '0', '0', '0', '1', '1', 'Chicken-Cheese-Burger', 'Chicken Cheese Burger', 'Chicken-Cheese-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(69, 26, 'non-veg', '', '1', '0', '', 'Chicken Crispy & Crunch Burger', 170, 170, 'Burger-9', 'chicken-crispy-and-crunch.png', '', '', 'chicken-crispy-and-crunch-burger', '0', '0', '0', '1', '1', 'Chicken-Crispy-&-Crunch-Burger', 'Chicken Crispy & Crunch Burger', 'Chicken-Crispy-&-Crunch-Burger', '0', '0000-00-00', '0000-00-00 00:00:00'),
(76, 30, 'veg', '', '1', '0', '', 'Sweet Corn Soup', 120, 120, 'Soup-001', 'sweet-corn-soup.webp', '', '', 'sweet-corn-soup', '0', '0', '0', '1', '1', 'Sweet-Corn-Soup', 'Sweet Corn Soup', 'Sweet-Corn-Soup', '', '0000-00-00', '0000-00-00 00:00:00'),
(77, 30, 'veg', '', '1', '0', '', 'Mix Veg Soup', 120, 120, 'Soup-002', 'mix-veg-soup.jpg', '', '', 'mix-veg-soup', '0', '0', '0', '1', '1', 'Mix-Veg-Soup', 'Mix Veg Soup', 'Mix-Veg-Soup', '', '0000-00-00', '0000-00-00 00:00:00'),
(78, 30, 'veg', '', '1', '0', '', 'Tomato Soup', 120, 120, 'Soup-003', 'tomato-soup.jpg', '', '', 'tomato-soup', '0', '0', '0', '1', '1', 'Tomato-Soup', 'Tomato Soup', 'Tomato-Soup', '', '0000-00-00', '0000-00-00 00:00:00'),
(79, 30, 'non-veg', '', '1', '0', '', 'Chicken Soup', 150, 150, 'Soup-004', 'chicken-soup.jpg', '', '', 'chicken-soup', '0', '0', '0', '1', '1', 'Chicken-Soup', 'Chicken Soup', 'Chicken-Soup', '', '0000-00-00', '0000-00-00 00:00:00'),
(80, 30, 'non-veg', '', '1', '0', '', 'Chicken Soup With Leg', 200, 200, 'Soup-005', 'chicken-soup-with-leg-piece.jpg', '', '', 'Chicken-Soup-With-Leg', '0', '0', '0', '1', '1', 'Chicken-Soup-With-Leg', 'Chicken Soup With Leg', 'Chicken-Soup-With-Leg', '', '0000-00-00', '0000-00-00 00:00:00'),
(81, 11, 'non-veg', '', '1', '0', '', 'Egg Wrap', 160, 160, 'Wrap-12', 'egg-wrap.webp', '', '', 'Egg-Wrap', '0', '0', '0', '1', '1', 'Egg-Wrap', 'Egg Wrap', 'Egg-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(82, 11, 'veg', '', '1', '0', '', 'Chicken Cheese Wrap', 175, 175, 'Wrap-13', 'Chicken-Cheese-Wrap.webp', '', '', 'Chicken-Cheese-Wrap', '0', '0', '0', '1', '1', 'Chicken-Cheese-Wrap', 'Chicken Cheese Wrap', 'Chicken-Cheese-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(83, 11, 'veg', '', '1', '0', '', 'Aloo Tikki Wrap', 100, 100, 'Wraps-1', 'aloo-tikki-wrap.jpg', '', '', 'Aloo-Tikki-Wrap', '0', '0', '0', '1', '1', 'Aloo-Tikki-Wrap', 'Aloo Tikki Wrap', 'Aloo-Tikki-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(84, 11, 'non-veg', '', '1', '0', '', 'Chicken Keema Wrap', 195, 195, 'Wraps-10', 'Chicken-Keema-Wrap.jpg', '', '', 'Chicken-Keema-Wrap', '0', '0', '0', '1', '1', 'Chicken-Keema-Wrap', 'Chicken Keema Wrap', 'Chicken-Keema-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(85, 11, 'non-veg', '', '1', '0', '', 'Mutton Seekh Kebab Wrap', 225, 225, 'Wraps-11', 'mutton-sekh-kabab-wrap.jpg', '', '', 'Mutton-Seekh-Kebab-Wrap', '0', '0', '0', '1', '1', 'Mutton-Seekh-Kebab-Wrap', 'Mutton Seekh Kebab Wrap', 'Mutton-Seekh-Kebab-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(86, 11, 'veg', '', '1', '0', '', 'Paneer Wrap', 145, 145, 'Wraps-2', 'Paneer-Wrap.jpg', '', '', 'Paneer-Wrap', '0', '0', '0', '1', '1', 'Paneer-Wrap', 'Paneer Wrap', 'Paneer-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(87, 11, 'veg', '', '1', '0', '', 'Veg Wrap', 115, 115, 'Wraps-3', 'veg-wrap.jpg', '', '', 'Veg-Wrap', '0', '0', '0', '1', '1', 'Veg-Wrap', 'Veg Wrap', 'Veg-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(88, 11, 'veg', '', '1', '0', '', 'Foodieez Special Veg Wrap', 180, 180, 'Wraps-4', 'Foodieez-Special-Veg-Wrap.jpg', '', '', 'Foodieez-Special-Veg-Wrap', '0', '0', '0', '1', '1', 'Foodieez-Special-Veg-Wrap', 'Foodieez Special Veg Wrap', 'Foodieez-Special-Veg-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(89, 11, 'non-veg', '', '1', '0', '', 'Mutton Wrap', 90, 90, 'Wraps-6', 'mutton-wrap.jpg', '', '', 'Mutton-Wrap', '0', '0', '0', '1', '1', 'Mutton-Wrap', 'Mutton Wrap', 'Mutton-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(90, 11, 'non-veg', '', '1', '0', '', 'Chicken Wrap', 165, 165, 'Wraps-7', 'Chicken-Wrap.webp', '', '', 'Chicken-Wrap', '0', '0', '0', '1', '1', 'Chicken-Wrap', 'Chicken Wrap', 'Chicken-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(91, 11, 'non-veg', '', '1', '0', '', 'Foodieez Special Non Veg Wrap', 230, 230, 'Wraps-8', 'Foodieez-Special-Non-Veg-Wrap.webp', '', '', 'Foodieez-Special-Non-Veg-Wrap', '0', '0', '0', '1', '1', 'Foodieez-Special-Non-Veg-Wrap', 'Foodieez Special Non Veg Wrap', 'Foodieez-Special-Non-Veg-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(92, 11, 'non-veg', '', '1', '0', '', 'Chicken Salami Wrap', 190, 190, 'Wraps-9', 'Chicken-Salami-Wrap.jpg', '', '', 'Chicken-Salami-Wrap', '0', '0', '0', '1', '1', 'Chicken-Salami-Wrap', 'Chicken Salami Wrap', 'Chicken-Salami-Wrap', '', '0000-00-00', '0000-00-00 00:00:00'),
(93, 29, 'non-veg', '', '1', '0', '', 'Omelette', 99, 99, 'FastFood-0018', 'Omelette.jpg', '', '', 'Omelette', '0', '0', '0', '1', '1', 'Omelette', 'Omelette', 'Omelette', '', '0000-00-00', '0000-00-00 00:00:00'),
(94, 29, 'veg', '', '1', '0', '', 'Honey Chilli Potato', 180, 180, 'FastFood-0017', 'honey-chilli-fries.jpg', '', '', 'Honey-Chilli-Potato', '0', '0', '0', '1', '1', 'Honey-Chilli-Potato', 'Honey Chilli Potato', 'Honey-Chilli-Potato', '', '0000-00-00', '0000-00-00 00:00:00'),
(95, 29, 'veg', '', '1', '0', '', 'Bread Toast', 59, 59, 'FastFood-0016', 'bread-toast.jpg', '', '', 'Bread-Toast', '0', '0', '0', '1', '1', 'Bread-Toast', 'Bread Toast', 'Bread-Toast', '', '0000-00-00', '0000-00-00 00:00:00'),
(96, 29, 'veg', '', '1', '0', '', 'Veg Momos', 110, 110, 'Fastfood-10', 'Veg-Momos.png', '', '', 'Veg-Momos', '0', '0', '0', '1', '1', 'Veg-Momos', 'Veg Momos', 'Veg-Momos', '', '0000-00-00', '0000-00-00 00:00:00'),
(97, 29, 'non-veg', '', '1', '0', '', 'Non Veg Momos', 130, 130, 'Fastfood-11', 'Non-Veg-Momos.jpg', '', '', 'Non-Veg-Momos', '0', '0', '0', '1', '1', 'Non-Veg-Momos', 'Non Veg Momos', 'Non-Veg-Momos', '', '0000-00-00', '0000-00-00 00:00:00'),
(98, 29, 'veg', '', '1', '0', '', 'French Fries Small', 69, 69, 'Fastfood-12', 'small-french-fries.webp', '', '', 'French-Fries-Small', '0', '0', '0', '1', '1', 'French-Fries-Small', 'French Fries Small', 'French-Fries-Small', '', '0000-00-00', '0000-00-00 00:00:00'),
(99, 29, 'veg', '', '1', '0', '', 'French Fries Large', 119, 119, 'Fastfood-13', 'french-fries-large.jpg', '', '', 'French-Fries-Large', '0', '0', '0', '1', '1', 'French-Fries-Large', 'French Fries Large', 'French-Fries-Large', '', '0000-00-00', '0000-00-00 00:00:00'),
(100, 29, 'veg', '', '1', '0', '', 'Masala French Fries', 139, 139, 'Fastfood-14', 'masala-french-fries-large.jpg', '', '', 'Masala-French-Fries', '0', '0', '0', '1', '1', 'Masala-French-Fries', 'Masala French Fries', 'Masala-French-Fries', '', '0000-00-00', '0000-00-00 00:00:00'),
(101, 29, 'veg', '', '1', '0', '', 'Mayonnaise French Fries', 149, 149, 'Fastfood-15', 'mayonnaise-french-fries.webp', '', '', 'Mayonnaise-French-Fries', '0', '0', '0', '1', '1', 'Mayonnaise-French-Fries', 'Mayonnaise French Fries', 'Mayonnaise-French-Fries', '', '0000-00-00', '0000-00-00 00:00:00'),
(102, 29, 'non-veg', '', '1', '0', '', 'Chicken French Fries Small', 169, 169, 'Fastfood-16', 'chicken-french-fries-small.png', '', '', 'Chicken-French-Fries-Small', '0', '0', '0', '1', '1', 'Chicken-French-Fries-Small', 'Chicken French Fries Small', 'Chicken-French-Fries-Small', '', '0000-00-00', '0000-00-00 00:00:00'),
(103, 29, 'non-veg', '', '1', '0', '', 'Chicken French Fries Large', 220, 220, 'Fastfood-17', 'chicken-french-fries-large.jpg', '', '', 'Chicken-French-Fries-Large', '0', '0', '0', '1', '1', 'Chicken-French-Fries-Large', 'Chicken French Fries Large', 'Chicken-French-Fries-Large', '', '0000-00-00', '0000-00-00 00:00:00'),
(104, 29, 'veg', '', '1', '0', '', 'Sweet Corn Medium', 99, 99, 'Fastfood-3', 'Sweet-Corn-Medium.jpg', '', '', 'Sweet-Corn-Medium', '0', '0', '0', '1', '1', 'Sweet-Corn-Medium', 'Sweet Corn Medium', 'Sweet-Corn-Medium', '', '0000-00-00', '0000-00-00 00:00:00'),
(105, 29, 'veg', '', '1', '0', '', 'Sweet Corn Large', 125, 125, 'Fastfood-4', 'sweetcornLarge.png', '', '', 'Sweet-Corn-Large', '0', '0', '0', '1', '1', 'Sweet-Corn-Large', 'Sweet Corn Large', 'Sweet-Corn-Large', '', '0000-00-00', '0000-00-00 00:00:00'),
(106, 29, 'veg', '', '1', '0', '', 'Red Sauce Pasta', 199, 199, 'Fastfood-6', 'Red-Sauce-Pasta-008.webp', '', '', 'Red-Sauce-Pasta', '0', '0', '0', '1', '1', 'Red-Sauce-Pasta', 'Red Sauce Pasta', 'Red-Sauce-Pasta', '', '0000-00-00', '0000-00-00 00:00:00'),
(107, 29, 'veg', '', '1', '0', '', 'White Sauce Pasta', 199, 199, 'Fastfood-7', 'white-sause-pasta.jpg', '', '', 'White-Sauce-Pasta', '0', '0', '0', '1', '1', 'White-Sauce-Pasta', 'White Sauce Pasta', 'White-Sauce-Pasta', '', '0000-00-00', '0000-00-00 00:00:00'),
(108, 29, 'veg', '', '1', '0', '', 'Red and White Sauce Pasta', 230, 230, 'Fastfood-8', 'Red-and-White-Pasta.jpg', '', '', 'Red-and-White-Sauce-Pasta', '0', '0', '0', '1', '1', 'Red-&-White-Sauce-Pasta', 'Red & White Sauce Pasta', 'Red-&-White-Sauce-Pasta', '', '0000-00-00', '0000-00-00 00:00:00'),
(109, 29, 'non-veg', '', '1', '0', '', 'Chicken Pasta', 299, 299, 'Fastfood-9', 'chicken-pasta.jpg', '', '', 'Chicken-Pasta', '0', '0', '0', '1', '1', 'Chicken-Pasta', 'Chicken Pasta', 'Chicken-Pasta', '', '0000-00-00', '0000-00-00 00:00:00'),
(110, 17, 'veg', '', '1', '0', '', 'Chicken Paratha ', 150, 150, 'Chicken-Paratha-combo', 'chicken-paratha-combo-curdtea-&-chatni2023-1196.jpg', '', '', 'Chicken-Paratha', '0', '1', '0', '1', '1', 'Chicken-Paratha-', 'Chicken Paratha ', 'Chicken-Paratha-', '', '0000-00-00', '0000-00-00 00:00:00'),
(111, 17, 'veg', '', '1', '0', '', 'Egg Paratha', 130, 130, 'Egg-Paratha-combo', 'egg-paratha-combo-curdtea-&-chatni2023-1196.jpg', '', '', 'Egg-Paratha', '0', '1', '0', '1', '1', 'Egg-Paratha', 'Egg Paratha', 'Egg-Paratha', '', '0000-00-00', '0000-00-00 00:00:00'),
(112, 17, 'veg', '', '1', '0', '', 'Methi Paratha', 110, 110, 'Methi-Paratha-combo', 'methiparatha-combo-curdtea-&-chatni2023-1196.jpg', '', '', 'Methi-Paratha', '0', '1', '0', '1', '1', 'Methi-Paratha', 'Methi Paratha', 'Methi-Paratha', '', '0000-00-00', '0000-00-00 00:00:00'),
(113, 17, 'veg', '', '1', '0', '', 'Bathua Paratha', 110, 110, 'Bathua-Paratha-combo', 'bathua-paratha-combo-curdtea-&-chatni2023-1196.jpg', '', '', 'Bathua-Paratha', '0', '1', '0', '1', '1', 'Bathua-Paratha', 'Bathua Paratha', 'Bathua-Paratha', '', '0000-00-00', '0000-00-00 00:00:00'),
(114, 17, 'veg', '', '1', '0', '', 'Palak Paratha', 110, 110, 'Palak-Paratha-combo', 'palak-paratha-combo-curdtea-&-chatni2023-1196.jpg', '', '', 'Palak-Paratha', '0', '1', '0', '1', '1', 'Palak-Paratha', 'Palak Paratha', 'Palak-Paratha', '', '0000-00-00', '0000-00-00 00:00:00'),
(115, 17, 'veg', '', '1', '0', '', 'Gobhi Paratha', 110, 110, 'Gobhi-Paratha-combo', 'gobhi-paratha-combo-curdtea-&-chatni2023-1196.jpg', '', '', 'Gobhi-Paratha', '0', '1', '0', '1', '1', 'Gobhi-Paratha', 'Gobhi Paratha', 'Gobhi-Paratha', '', '0000-00-00', '0000-00-00 00:00:00'),
(116, 17, 'veg', '', '1', '0', '', 'Buy Any 2 Sandwich Get 2 Hot Coffee Free', 249, 249, 'Buy-Any-2-Sandwich-Get-2-Hot-Coffee-Free', 'buy-any-2sandwich-combo.jpg', '', '', 'Buy-Any-2-Sandwich-Get-2-Hot-Coffee-Free', '0', '1', '0', '1', '1', 'Buy-Any-2-Sandwich-Get-2-Hot-Coffee-Free', '', 'Buy-Any-2-Sandwich-Get-2-Hot-Coffee-Free', '', '0000-00-00', '0000-00-00 00:00:00'),
(117, 17, 'veg', '', '1', '0', '', '2 Veggie Burger 2 Colddrink 2 Fries', 249, 249, '2-Veggie-Burger-2-Colddrink-2-Fries', 'veggie-burger-combo.png', '', '', '2-Veggie-Burger-2-Colddrink-2-Fries', '1', '1', '0', '1', '1', '', '', '', '', '0000-00-00', '2023-12-13 18:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `dish_details`
--

CREATE TABLE `dish_details` (
  `dish_detail_id` int(11) NOT NULL,
  `dish_id` varchar(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `sku` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `dish_details`
--

INSERT INTO `dish_details` (`dish_detail_id`, `dish_id`, `attribute`, `price`, `status`, `sku`) VALUES
(8, '6', 'Chole', 50, '1', 'Thali-004-02'),
(7, '6', 'Rajma', 50, '1', 'Thali-004-01'),
(9, '6', 'Shahi Paneer', 75, '1', 'Thali-004-03'),
(10, '6', 'Dal Makhani', 65, '1', 'Thali-004-04'),
(11, '6', 'Plain Roti', 8, '1', 'Thali-004-05'),
(12, '6', 'Rice', 25, '1', 'Thali-004-06'),
(13, '6', 'Raita', 25, '1', 'Thali-004-07'),
(14, '6', 'Salad', 25, '1', 'Thali-004-08'),
(15, '6', 'Butter Roti', 10, '1', 'Thali-004-09'),
(16, '7', 'Rajma', 199, '1', 'Thali-003-01'),
(17, '7', 'Chole', 199, '1', 'Thali-003-02'),
(18, '8', 'Shahi Paneer', 149, '1', 'Thali-002-01'),
(19, '8', 'Dal Makhani', 149, '1', 'Thali-002-02'),
(20, '9', 'Rajma', 99, '1', 'Thali-001-01'),
(21, '9', 'Chole', 99, '1', 'Thali-001-02'),
(374, '115', 'Tea', 110, '1', 'gobhi-paratha-tea-combo'),
(373, '114', 'Tea', 110, '1', 'palak-paratha-tea-combo'),
(372, '114', 'Curd', 110, '1', 'palak-paratha-curd-combo'),
(371, '113', 'Curd', 110, '1', 'bathua-paratha-curd-combo'),
(369, '112', 'Tea', 110, '1', 'methi-paratha-tea-combo'),
(370, '113', 'Tea', 110, '1', 'bathua-paratha-tea-combo'),
(364, '111', 'Curd', 130, '1', 'egg-paratha-curd-combo'),
(365, '111', 'Tea', 130, '1', 'egg-paratha-tea-combo'),
(366, '110', 'Tea', 150, '1', 'chicken-paratha-tea-combo'),
(367, '110', 'Curd', 150, '1', 'chicken-paratha-curd-combo'),
(368, '112', 'Curd', 110, '1', 'methi-paratha-curd-combo'),
(375, '115', 'Curd', 110, '1', 'gobhi-paratha-curd-combo');

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
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `festival_id` int(11) NOT NULL,
  `festival_name` varchar(255) DEFAULT NULL,
  `festival_banner` varchar(255) DEFAULT NULL,
  `festival_status` enum('0','1') NOT NULL DEFAULT '1',
  `timing` varchar(255) NOT NULL DEFAULT '1000',
  `redirect_page` varchar(255) NOT NULL DEFAULT 'dish',
  `fesival_added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`festival_id`, `festival_name`, `festival_banner`, `festival_status`, `timing`, `redirect_page`, `fesival_added_on`) VALUES
(6, 'Diwali', 'diwali249196501.png', '0', '1000', 'dishes', '2023-10-20 11:46:24');

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
(131, 134, '1522669988.jpg'),
(127, 134, '1655021128.png'),
(128, 134, '1613553780.png'),
(129, 134, '1028295355.jpg'),
(130, 134, '149450191.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_plan`
--

CREATE TABLE `monthly_plan` (
  `ID` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `main_sku` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `selling_price` int(10) DEFAULT NULL,
  `mrp` varchar(100) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `dish` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `type` enum('veg','non-veg') NOT NULL DEFAULT 'veg',
  `price_tagline` varchar(255) DEFAULT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monthly_plan`
--

INSERT INTO `monthly_plan` (`ID`, `image`, `main_sku`, `slug`, `selling_price`, `mrp`, `short_description`, `dish`, `status`, `type`, `price_tagline`, `added_on`) VALUES
(1, 'grg.webp', 'Thali-001', NULL, 1899, '2178', 'Rajma/Chole, 2 Tawa Roti, Rice, Boondi Raita & Salad.  ', 'Ghar Ki Thali (Mon - Fri)', '1', 'veg', NULL, '2023-05-08 15:03:41'),
(2, 'Deluxe_Thali.webp', 'Thali-002', NULL, 2950, '3278', 'Shahi paneer/Dal Makhani, 4 Tawa Roti, Rice, Boondi Raita & Salad ', 'Deluxe Thali (Mon - Fri)', '1', 'veg', NULL, '2023-05-08 15:26:31'),
(3, 'Super_Deluxe_Thali.jpg', 'Thali-003', NULL, 3999, '4378', 'Rajma/Chole, Dal Makhani, Shahi Paneer, 4 Tawa Roti, Rice, Boondi Raita & salad. ', 'Super Deluxe Thali (Mon - Fri)', '1', 'veg', NULL, '2023-05-08 15:27:54'),
(4, 'Rajma_Rice_with_green_Chutney_&_Sliced_Onion..jpg', 'RICE-5', NULL, 1899, '2178', 'Rajma Rice with green Chutney & Sliced Onion.  ', 'Rajma Rice (Mon - Fri)', '1', 'veg', NULL, '2023-05-08 15:28:48'),
(5, 'Dal_Rice.jpg', 'RICE-4', NULL, 1899, '2178', 'Dal Rice with green Chutney & Sliced Onion. ', 'Dal Rice (Mon - Fri)', '1', 'veg', NULL, '2023-05-08 15:29:49'),
(6, 'Chole_Rice.webp', 'RICE-3', NULL, 1899, '2178', 'Chole Rice with green Chutney & Sliced Onion. ', 'Chole Rice (Mon - Fri)', '1', 'veg', NULL, '2023-05-08 15:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `address` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `appartment` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `city` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `coupon_code` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `order_status` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT '1',
  `payment_type` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `razorpayPaymentId` varchar(255) DEFAULT NULL,
  `razorpayOrderId` varchar(255) DEFAULT NULL,
  `paymentstatus` varchar(255) DEFAULT NULL,
  `delieverytype` varchar(100) DEFAULT NULL,
  `delievery_date` date DEFAULT NULL,
  `delievery_time` varchar(255) NOT NULL,
  `store` int(11) NOT NULL DEFAULT 1,
  `otp` varchar(255) NOT NULL,
  `otp_validate` enum('0','1') NOT NULL DEFAULT '0',
  `feedback_icon` int(11) DEFAULT NULL,
  `feedback` longtext DEFAULT NULL,
  `feedback_added_on` datetime DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `delievery_boy_id` int(11) DEFAULT NULL,
  `delievered_on` datetime DEFAULT NULL,
  `order_cancelBy` enum('user','admin') CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `order_cancelAt` datetime DEFAULT NULL,
  `order_added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_order_id` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `plan` varchar(255) DEFAULT NULL,
  `dish_order_id` int(11) NOT NULL,
  `attributeID` varchar(255) DEFAULT NULL,
  `timestamps` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `portal_name` varchar(255) NOT NULL DEFAULT 'PORTAL',
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
  `mobilenavtxt` varchar(50) NOT NULL,
  `mail_active` enum('0','1') NOT NULL DEFAULT '1',
  `email_authorization_key` varchar(255) NOT NULL,
  `whatsapp_active` enum('0','1') NOT NULL DEFAULT '1',
  `whatsapp_sender` varchar(255) NOT NULL,
  `whatsapp_templateName` varchar(255) NOT NULL,
  `on_maintenance` enum('0','1') NOT NULL DEFAULT '1',
  `is_infobip_connected` enum('0','1') NOT NULL DEFAULT '1',
  `google_login` enum('0','1') NOT NULL DEFAULT '1',
  `two_factor` enum('0','1') NOT NULL DEFAULT '1',
  `preloader` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `portal_name`, `cart_min_price`, `cart_min_price_msg`, `website_close`, `website_close_msg`, `website_path`, `wallet_amount`, `referral_amount`, `instagram`, `facebook`, `twitter`, `youtube`, `logo`, `fav`, `site_address`, `site_phone`, `site_email`, `smtp_email`, `smtp_password`, `opening_hours`, `tagline`, `themecolor`, `mainbtn`, `secondarybtn`, `mobilenav`, `mobilenavlight`, `mobilenavtxt`, `mail_active`, `email_authorization_key`, `whatsapp_active`, `whatsapp_sender`, `whatsapp_templateName`, `on_maintenance`, `is_infobip_connected`, `google_login`, `two_factor`, `preloader`) VALUES
(1, 'Foodieez', 20, 'Min Price is 20', 0, 'Website Closed !', 'http://localhost/food-ordering/', 50, 50, 'https://www.instagram.com/foodieez.in/', 'https://www.facebook.com/foodieez.in/', 'javascript:void(0)', 'javascript:void(0)', 'media/upload/setting/foodieez_logo65264dd5a9fbd.png', 'media/upload/setting/foodieez_fav6526953d73f68.png', 'Ground floor DCM Building, Barakhamba Road, Connaught Place', '8130654257', 'dcm@foodieez.in', '', '', 'Everyday : 08:30 - 20:30', '', '#fd7d16', '#58a431 ', '#ffb700', '#0a0c1a', '#04050a', '#ebebeb', '1', '', '1', '1', '', '0', '1', '1', '0', 11);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`ID`, `email`, `status`, `added_on`) VALUES
(2, 'developer.sagar10@gmail.com', '1', '2023-10-12'),
(3, 'sagar@eminentcompliance.com', '0', '2023-12-12'),
(4, 'wefwefwefw@efw.com', '1', '2023-12-12'),
(5, 'wqw@g.com', '1', '2023-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` longtext DEFAULT NULL,
  `appartment` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `referral_from` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `added_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `mobile`, `address`, `appartment`, `postcode`, `city`, `referral_code`, `referral_from`, `token`, `status`, `added_on`) VALUES
(2, 'Sagar', 'sagar@eminentcompliance.com', '7017742830', 'kaseru khera', 'kumar gali', '110001', 'Delhi', '502574cc5ac4', '', 'bb53249642b8415b5fe18a82a136f0', 'active', '2023-09-21'),
(3, 'guest', NULL, '8826915196', NULL, NULL, NULL, NULL, '5b5e7ed188e4', '', '9e80df015fea69108cfa87abc703b6', 'active', '2023-09-27'),
(4, 'guest', 'jkumaravi@gmaIl.com', '9891317215', '2nd floor Eminent', 'DCM building', '110001', 'Delhi', '6ca11827142a', '', '87262e2e5b020d3cf2e84672be9cae', 'active', '2023-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `session` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `ses_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`session`, `time`, `name`, `userID`, `ses_id`) VALUES
('g8rgucupbtdijkutrcgh3nqgem', 1702546605, 'Developer', '21', 458603);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `dish` (`dish`),
  ADD KEY `meta_title` (`meta_title`),
  ADD KEY `meta_description` (`meta_description`(1000));

--
-- Indexes for table `dish_details`
--
ALTER TABLE `dish_details`
  ADD PRIMARY KEY (`dish_detail_id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`festival_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `referral_code` (`referral_code`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`ses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delievery_boy`
--
ALTER TABLE `delievery_boy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `dish_details`
--
ALTER TABLE `dish_details`
  MODIFY `dish_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `festival_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `monthly_plan`
--
ALTER TABLE `monthly_plan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `ses_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458604;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
