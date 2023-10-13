-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 02:51 PM
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
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(3) NOT NULL,
  `access_admin_id` int(3) NOT NULL,
  `access_company_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `access_admin_id`, `access_company_id`) VALUES
(1, 40, 7),
(2, 40, 9),
(3, 40, 16),
(4, 40, 18),
(5, 40, 22),
(6, 40, 26),
(7, 40, 27),
(8, 40, 28),
(9, 40, 48),
(10, 40, 53),
(11, 40, 58),
(12, 40, 61),
(13, 40, 69),
(14, 40, 91),
(15, 40, 99),
(16, 40, 101),
(17, 40, 102),
(18, 33, 4),
(19, 33, 5),
(20, 33, 9),
(21, 33, 18),
(22, 33, 47),
(23, 33, 84),
(24, 120, 65),
(25, 120, 105),
(26, 51, 4),
(27, 51, 5),
(28, 51, 9),
(29, 51, 16),
(30, 51, 18),
(31, 51, 22),
(32, 51, 26),
(33, 51, 27),
(34, 51, 28),
(35, 51, 71),
(36, 51, 72),
(37, 51, 73),
(38, 51, 92),
(39, 51, 96),
(40, 76, 9),
(41, 76, 13),
(42, 76, 16),
(43, 76, 18),
(44, 76, 22),
(45, 76, 26),
(46, 76, 27),
(47, 76, 28),
(48, 76, 53),
(49, 76, 56),
(50, 76, 59),
(51, 76, 60),
(52, 76, 74),
(53, 76, 75),
(54, 76, 76),
(55, 76, 88),
(56, 76, 93),
(57, 76, 94),
(58, 76, 95),
(59, 76, 97),
(60, 177, 108),
(61, 177, 109),
(62, 20, 32),
(63, 20, 35),
(64, 153, 7),
(65, 29, 7),
(66, 29, 11),
(67, 29, 20),
(68, 29, 39),
(69, 32, 23),
(70, 32, 58),
(71, 71, 8),
(72, 11, 3),
(73, 11, 6),
(74, 11, 7),
(75, 11, 10),
(76, 11, 11),
(77, 11, 14),
(78, 11, 15),
(79, 11, 19),
(80, 11, 29),
(81, 11, 30),
(82, 11, 31),
(83, 11, 32),
(84, 11, 45),
(85, 11, 63),
(86, 11, 64),
(87, 11, 77),
(88, 11, 81),
(89, 11, 85),
(90, 11, 90),
(91, 66, 7),
(92, 66, 8),
(93, 66, 80),
(94, 66, 82),
(95, 66, 83),
(96, 143, 7),
(97, 143, 56),
(98, 143, 68),
(99, 143, 89),
(100, 143, 93),
(101, 143, 97),
(102, 12, 3),
(103, 12, 6),
(104, 12, 10),
(105, 12, 12),
(106, 12, 13),
(107, 12, 14),
(108, 12, 15),
(109, 12, 16),
(110, 12, 17),
(111, 12, 19),
(112, 12, 21),
(113, 12, 23),
(114, 12, 24),
(115, 12, 28),
(116, 12, 29),
(117, 12, 30),
(118, 12, 31),
(119, 12, 33),
(120, 12, 34),
(121, 12, 35),
(122, 12, 36),
(123, 12, 37),
(124, 12, 38),
(125, 12, 42),
(126, 12, 45),
(127, 12, 48),
(128, 12, 53),
(129, 12, 55),
(130, 12, 62),
(131, 12, 63),
(132, 12, 64),
(133, 12, 51),
(134, 12, 77),
(135, 12, 81),
(136, 12, 85),
(137, 12, 87),
(138, 12, 90),
(139, 12, 98),
(140, 12, 100),
(141, 27, 4),
(142, 27, 5),
(143, 27, 40),
(144, 27, 41),
(145, 61, 9),
(146, 61, 18),
(147, 61, 22),
(148, 61, 26),
(149, 61, 27),
(150, 61, 53),
(151, 61, 55),
(152, 61, 60),
(153, 61, 67),
(154, 61, 91),
(155, 52, 3),
(156, 52, 6),
(157, 52, 10),
(158, 52, 14),
(159, 52, 15),
(160, 52, 19),
(161, 52, 29),
(162, 52, 30),
(163, 52, 31),
(164, 52, 45),
(165, 52, 63),
(166, 52, 64),
(167, 52, 77),
(168, 52, 81),
(169, 52, 85),
(170, 52, 90),
(171, 121, 3),
(172, 121, 6),
(173, 121, 7),
(174, 121, 10),
(175, 121, 14),
(176, 121, 15),
(177, 121, 19),
(178, 121, 29),
(179, 121, 30),
(180, 121, 31),
(181, 121, 45),
(182, 121, 63),
(183, 121, 64),
(184, 121, 77),
(185, 121, 81),
(186, 121, 85),
(187, 121, 80),
(188, 121, 90),
(189, 121, 100),
(190, 121, 104),
(191, 65, 9),
(192, 65, 16),
(193, 65, 18),
(194, 65, 22),
(195, 65, 26),
(196, 65, 27),
(197, 65, 28),
(198, 65, 70),
(199, 65, 79),
(200, 65, 86),
(201, 65, 103),
(202, 65, 104),
(203, 65, 106),
(204, 65, 107);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(15) NOT NULL,
  `admin_empid` varchar(11) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_mobile` bigint(12) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_company_id` int(4) NOT NULL,
  `admin_user_type` int(2) NOT NULL DEFAULT 1 COMMENT '0=devloper,1=admin,2=normal user',
  `admin_status` varchar(255) DEFAULT NULL,
  `admin_login` int(10) NOT NULL DEFAULT 0,
  `admin_department` varchar(255) DEFAULT NULL,
  `admin_image` varchar(255) DEFAULT NULL,
  `admin_region` int(11) NOT NULL DEFAULT 5,
  `admin_bal` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_empid`, `admin_password`, `admin_name`, `admin_mobile`, `admin_email`, `admin_company_id`, `admin_user_type`, `admin_status`, `admin_login`, `admin_department`, `admin_image`, `admin_region`, `admin_bal`) VALUES
(1, 'EIPL/001', 'Eminent@10', 'Priyank Varshney', 9718109106, 'priyank@eminentcompliance.com', 1, 1, 'Active', 1, 'Management', NULL, 5, 0),
(2, 'EIPL/002', 'Eminent@10', 'Ruchi Acharya', 9718109105, 'ruchi@eminentcompliance.com', 1, 1, 'Active', 1, 'Management', NULL, 5, 0),
(3, 'EIPL/003', 'Ravi@100', 'Ravi Kumar', 9891317215, 'ravi@eminentcompliance.com', 1, 2, 'Active', 1, 'Finance & Accounts', 'https://lh3.googleusercontent.com/a/AAcHTtfCZXQ8m_hvyU5XG2RjcDkS775IF3uklNWn9cV3iPwE=s96-c', 5, 0),
(4, 'EIPL/004', 'Eminent@10', 'Vivekanand Jha', 9910677156, 'vivekanand@eminentcompliance.com', 1, 2, 'Active', 1, 'Finance', 'https://ui-avatars.com/api/?name=Vivekanand+Jha&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=VIJ', 5, 0),
(5, 'EIPL/005', 'Eminent@10', 'Subhan Farooqui', 9899479996, 'subhan@eminentcompliance.com', 1, 2, 'Active', 1, 'Finance', 'media/upload/emp_img/64c9fa95a6e6a_Subhan Farooqui-min_11zon.jpg', 5, 0),
(6, 'EIPL/009', 'Eminent@10', 'Kamlesh', 9999999902, 'kamlesh@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(7, 'EIPL/011', 'Eminent@10', 'Mohd. Nadeem Rizvi', 9990813450, 'nadeem@eminentcompliance.com', 1, 3, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64baa3d530c6c_20230609_112304.jpg', 3, 0),
(8, 'EIPL/012', 'Eminent@10', 'Mukesh Vazir', 8901118707, 'mukesh@eminentcompliance.com', 1, 3, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Mukesh+Vazir&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=MUV', 3, 0),
(9, 'EIPL/013', 'Eminent@10', 'Prince Virat', 9911737940, 'prince@eminentcompliance.com', 1, 10, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Prince+Virat&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PRV', 5, 0),
(10, 'EIPL/014', 'Raghueetcs@2001', 'Raghav Khattar', 8447762262, 'raghav@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Raghav+Khattar&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RAK', 5, 0),
(11, 'EIPL/015', 'Eminent@10', 'Rashmi Grover', 8800922411, 'rashmi@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Rashmi+Grover&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RAG', 5, 0),
(12, 'EIPL/016', 'Sameera@786', 'Sameera Khan', 9891766693, 'sameera@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64a69067929b9_PIC.jpg', 5, 0),
(13, 'EIPL/017', 'Eminent@10', 'Bharti Tokas', 8585968751, 'bharti@handikart.co.in', 2, 3, 'Inactive', 0, 'Marketing', NULL, 5, 0),
(14, 'EIPL/020', 'Eminent@10', 'Veerendra Singh ', 9999999901, 'veerendra@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(15, 'EIPL/024', 'Eminent@10', 'Avinash Singh', 8826915196, 'admin@eminentcompliance.com', 1, 1, 'Active', 1, 'IT', 'https://lh3.googleusercontent.com/a/AAcHTtfLYp8zCdbIWRA76Fu__X3-lKx8YgFzaN-UrwIdi1saKg=s96-c', 5, 0),
(16, 'EIPL/026', 'Eminent@10', 'Salman Arshad', 9999197707, 'salman@eminentcompliance.com', 1, 4, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Salman+Arshad&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SAA', 5, 0),
(17, 'EIPL/027', 'Eminent@10', 'Surabhi Dwivedi', 9818922216, 'surabhi@handikart.co.in', 2, 3, 'Inactive', 0, 'Marketing', 'https://ui-avatars.com/api/?name=Surabhi+Dwivedi&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SUD', 5, 0),
(18, 'EIPL/029', 'Eminent@10', 'Abdulla', 9620503130, 'abdulla@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTteAzQnHufOPnHQJYQXck3OyYFVY07WHvNY8yboJLtCFvLA=s96-c', 4, 0),
(19, 'EIPL/034', 'Eminent@10', 'Dhirendra Singh', 9971981048, 'dhirendra@eminentcompliance.com', 1, 3, 'Active', 0, 'Admin', NULL, 5, 0),
(20, 'EIPL/036', 'Discovery@123', 'Manish Sharma', 7838614699, 'manish@eminentcompliance.com', 1, 4, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64a68b4d848ba_unnamed (3).jpg', 5, 0),
(21, 'EIPL/039', 'Eminent@10', 'Jyoti Maheshwari', 9654196236, 'jyoti@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Jyoti+Maheshwari&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=JYM', 5, 0),
(22, 'EIPL/041', 'KAUSHALk1988#', 'Kaushal Kumar Sharma', 8700783532, 'kaushal@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://lh3.googleusercontent.com/a/AAcHTtdZU-15NekODBEtABq00eoquQV91QCc2CGN_Rr8hnng=s96-c', 5, 0),
(23, 'EIPL/042', 'Eminent@10', 'Rahul Gosain', 7048985231, 'rahul@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(24, 'EIPL/044', '1234567Aa@', 'Ashish Tripathi', 7503028583, 'ashish@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Ashish+Tripathi&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=AST', 5, 0),
(25, 'EIPL/045', 'Tushar@21', 'Tushar Singh', 8376070758, 'tushar@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Tushar+Singh&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=TUS', 5, 0),
(26, 'EIPL/046', 'Eminent@10', 'Naveen Kumar Sharma', 9557094251, 'naveen@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(27, 'EIPL/051', 'Eminent@10', 'Samprita Mahapatra', 7978477196, 'samprita@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(28, 'EIPL/052', 'Eminent@10', 'Shubham Tripathi', 9068418032, 'shubham@handikart.co.in', 2, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(29, 'EIPL/054', 'Eminent@10', 'Rajat Chaudhary', 9540602217, 'rajat@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Rajat+Chaudhary&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RAC', 3, 0),
(30, 'EIPL/055', 'Eminent@10', 'Arun Kumar', 9711505115, 'arun@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTtc1gAO8RI5QqiLzYyOxKtPxmRdqgQ7xJADDfR77-gM1=s96-c', 3, 0),
(31, 'EIPL/056', 'Eminent@10', 'Krishan Singh Rawat', 9555633347, 'krishan@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(32, 'EIPL/057', 'Eminent@10', 'Randhir Singh', 9811058899, 'randhir@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Randhir+Singh&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RAS', 5, 0),
(33, 'EIPL/058', 'Deep@1998', 'Deepesh Singh', 9999462441, 'deepesh@eminentcompliance.com', 1, 5, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Deepesh+Singh&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=DES', 5, 0),
(34, 'EIPL/059', 'Eminent@10', 'Gaurav Butola', 9999999903, 'gaurav@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 3, 0),
(35, 'EIPL/063', 'Eminent@10', 'Parvinder Singh Rana', 8470869686, 'parvinder@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Parvinder+Singh+Rana&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PAR', 5, 0),
(36, 'EIPL/065', 'Eminent@10', 'Hasan Imam', 8709222181, 'hasan@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Hassan+Imam&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=HAI', 1, 0),
(37, 'EIPL/066', 'Eminent@10', 'Shantanu Kumar Singh', 8294739653, 'shantanu@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Shantanu+Kumar+Singh&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SHS', 1, 0),
(38, 'EIPL/067', 'Eminent@10', 'Meenakshi Chauhan', 9999999904, 'meenakshi@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(39, 'EIPL/070', 'Eminent@10', 'Atul Raghav', 9953892913, 'atul@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', 'https://ui-avatars.com/api/?name=Atul+Raghav&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ATR', 5, 0),
(40, 'EIPL/071', 'Eminent@10', 'Abdul Basit Kaleem', 8750529194, 'basit@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Abdul+Basit+Kaleem&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ABK', 5, 0),
(41, 'EIPL/073', 'Bikash@100', 'Bikash Bera', 9064274453, 'bikash@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTtfiY7sOBtFD5k5AxzEEJBl7Y2Up0yszpHpKEFxztSXj=s96-c', 1, 0),
(42, 'EIPL/077', 'Eminent@10', 'Satyapal singh', 9716649126, 'satyapal@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://lh3.googleusercontent.com/a/AAcHTtdiVx1h2y4oKz94MMU3MpawwJ8hpxGcyJoSwilzmJc9=s96-c', 5, 0),
(43, 'EIPL/082', 'Eminent@10', 'Bahiste Jahan ', 9999999905, 'bahiste@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(44, 'EIPL/083', 'Eminent@10', 'Sonali Kumar', 9871509480, 'sonali@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(45, 'EIPL/084', 'Eminent@10', 'Pushpendra Mehra', 9159730227, 'pushpendra.mehra@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(46, 'EIPL/086', 'Eminent@10', 'Abhishek Kumar', 9555251080, 'abhishek@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(47, 'EIPL/087', 'Eminent@10', 'Ashwani Kumar', 9560027014, 'ashwani@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(48, 'EIPL/089', 'Eminent@10', 'Deepak Kumar', 9555595916, 'deepak@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', NULL, 5, 0),
(49, 'EIPL/090', 'Eminent@10', 'Sanjay ', 9999999906, 'sanjay@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(50, 'EIPL/091', 'Eminent@10', 'Sunil Paul', 9999999907, 'sunil@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 4, 0),
(51, 'EIPL/092', 'Eminent@10', 'Geetanjali Yadav', 7678229574, 'geetanjali@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Geetanjali+Yadav&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=GEY', 5, 0),
(52, 'EIPL/093', 'shiwangi@123456', 'Shiwangi Verma', 9560909738, 'shiwangi@eminentcompliance.com', 1, 5, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Shiwangi+Verma&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SHV', 5, 0),
(53, 'EIPL/094', 'Eminent@10', 'Vijender Kumar ', 9999999908, 'vijender@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(54, 'EIPL/097', 'Eminent@10', 'Ekta Kaushal', 9650714897, 'ekta.kaushal@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Human Resource', NULL, 5, 0),
(55, 'EIPL/098', 'Eminent@10', 'Rajnish Bansal', 9999999909, 'rajnish@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(56, 'EIPL/099', 'Dmukadam@1010', 'Prasad Mukaddam', 9326618058, 'prasad@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Prasad+Mukaddam&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PRM', 2, 0),
(57, 'EIPL/100', 'Eminent@10', 'Kumar Lokesh Meghawat', 9922060105, 'kumarmeghawat@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Kumar+Lokesh+Meghawat&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=KUM', 2, 0),
(58, 'EIPL/102', 'Eminent@10', 'Kunal Rampurkar', 8779679069, 'kunal@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTtcHKBxZjB8qnqvVOXAKQNgE0FkAy6mcNrTrOrt4uUEE=s96-c', 2, 0),
(59, 'EIPL/103', 'Records@407', 'Omprakash Lakhansingh Bhadoriya', 8200939686, 'omprakash@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Omprakash+Lakhansingh+Bhadoriya&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=OMB', 2, 0),
(60, 'EIPL/105', 'Eminent@000', 'Sk. Razak Tulla', 8763598982, 'razak@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Sk.+Razak+Tulla&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SKT', 1, 0),
(61, 'EIPL/107', 'Eminent@10', 'Shalini Tyagi', 9899784155, 'shalini@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(62, 'EIPL/108', 'Eminent@10', 'Priya Nagwani', 9990143432, 'priya@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance', 'https://ui-avatars.com/api/?name=Priya+Nagwani&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PRN', 5, 0),
(63, 'EIPL/109', 'Eminent@10', 'Roshan Chandra', 9643376294, 'roshan@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(64, 'EIPL/110', 'Eminent@10', 'Sahil Kumar', 9716690398, 'sahil@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(65, 'EIPL/111', 'Yamini@10', 'Yamini Bisht', 8700614564, 'yamini@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64a699075298f_IMG-20191010-WA0008~2.jpg', 5, 0),
(66, 'EIPL/112', 'Richa_1710', 'Richa Sharma', 9953767173, 'richa@eminentcompliance.com', 1, 5, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTtfUrX2zf8I8JuqsjpB35K-JNHtA2bBhTaUUr2_Uibhe=s96-c', 5, 0),
(67, 'EIPL/113', 'Eminent@10', 'Nagunuri Uday Kumar', 9009298851, 'nagunuri@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', NULL, 4, 0),
(68, 'EIPL/114', 'Eminent@10', 'Shweta Singh', 9958418949, 'shweta@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(69, 'EIPL/115', 'Eminent@10', 'Pradeep ', 9999999100, 'pradeep@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(70, 'EIPL/116', 'Eminent@10', 'Pooran Singh', 9654640035, 'pooran@eminentcompliance.com', 1, 3, 'Active', 0, 'Admin', 'https://ui-avatars.com/api/?name=Pooran+Singh&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=POS', 5, 0),
(71, 'EIPL/117', 'Eminent@10', 'Rashmi Paswan', 8876375986, 'rashmi.paswan@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Rashmi+Paswan&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RAP', 5, 0),
(72, 'EIPL/118', 'Eminent@10', 'Vipin Batti', 9999999111, 'vipin@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(73, 'EIPL/119', 'Eminent@10', 'Sheetal Chauhan ', 9999999112, 'sheetal@handikart.co.in', 2, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(74, 'EIPL/120', 'Eminent@10', 'Amit Kumar', 9717928812, 'amit@handikart.co.in', 2, 3, 'Active', 0, 'Admin', NULL, 5, 0),
(75, 'EIPL/121', 'Lalit@10', 'Lalit Kumar Singh', 9761240192, 'lalit@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'media/upload/emp_img/64b645ca06d40_IMG_0017.JPG', 5, 0),
(76, 'EIPL/122', 'Eminent@10', 'Heena Pachouri', 9718873873, 'heena@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTte3ZiJEERBw8eHDg7ZFcAGT5b7WiVrge6_Z1FDRvOep=s96-c', 5, 0),
(77, 'EIPL/123', 'Eminent@10', 'Ikhlaq Rasul Khan', 9953786500, 'ikhlaq@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(78, 'EIPL/124', 'Eminent@10', 'Arpita', 9999999113, 'arpita@eminentcompliance.com', 2, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(79, 'EIPL/125', 'Eminent@10', 'Ritesh Jha', 8986735150, 'ritesh@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(80, 'EIPL/126', 'Eminent@10', 'Faheem Ahmad', 9639611196, 'faheem@eminentcompliance.com', 1, 3, 'Active', 1, 'IT', 'media/upload/emp_img/64a691012e172_64a68b5b649bb_A5A8D25B-B907-49E1-B3B4-BAD9D0A2ABC4.jpeg', 5, 0),
(81, 'EIPL/127', 'Eminent@10', 'Parshuram Gani', 8010862460, 'parshuram@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', NULL, 2, 0),
(82, 'EIPL/128', 'InnerPeace1010', 'Ankita Kumari', 7905464040, 'ankita@handikart.co.in', 2, 3, 'Active', 1, 'Marketing', 'https://ui-avatars.com/api/?name=Ankita+Kumari&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ANK', 5, 0),
(83, 'EIPL/129', 'Eminent@10', 'Divya Verma', 7906578030, 'divya@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(84, 'EIPL/130', 'Eminent@10', 'Ranjit Hazra', 7980900258, 'ranjit@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTteyG6XYLblH7gA_0BkaO3N-BXbk_UhKgrx9ywoAhBR-XQ=s96-c', 1, 0),
(85, 'EIPL/131', 'Eminent@10', 'Asheesh Kumar ', 9910474025, 'asheesh@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(86, 'EIPL/132', 'Eminent@10', 'Akash Bajpai ', 7007972270, 'akash@eminentcompliance.com', 1, 3, 'Inactive', 0, 'MIS', 'https://ui-avatars.com/api/?name=Akash+Bajpai+&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=AK', 5, 0),
(87, 'EIPL/133', 'Eminent@10', 'Deepti Singh', 8318472310, 'deepti@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(88, 'EIPL/134', 'Eminent@10', 'Prerna Saxena ', 8923774692, 'prerna@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(89, 'EIPL/135', 'Eminent@10', 'Achinta Das ', 7002203462, 'achinta@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 1, 0),
(90, 'EIPL/136', 'Eminent@10', 'Abhay Kumar Mishra ', 8809314997, 'abhay@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Abhay+Kumar+Mishra+&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=AB', 1, 0),
(91, 'EIPL/137', 'divisha2288', 'Divisha Kapoor', 9811559365, 'divisha@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance', 'https://ui-avatars.com/api/?name=Divisha+Kapoor&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=DIK', 5, 0),
(92, 'EIPL/138', 'Eminent@10', 'Mithilesh Sahu', 9999999114, 'mithilesh@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 5, 0),
(93, 'EIPL/139', 'Eminent@10', 'Deepti Sharma ', 9812905221, 'deepti.sharma@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(94, 'EIPL/140', 'Eminent@10', 'Kanan', 9999999115, 'kanan@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Default', NULL, 4, 0),
(95, 'EIPL/141', 'Eminent@10', 'Prakash', 9999999116, 'prakash@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 3, 0),
(96, 'EIPL/142', 'Eminent@10', 'Shiv Shankar Yadav', 7773944994, 'shiv@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(97, 'EIPL/143', 'Eminent@10', 'Shalu Sangwan ', 7289904882, 'shalu@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(98, 'EIPL/144', 'Eminent@10', 'Mona Bhatt', 9188394689, 'mona.bhatt@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(99, 'EIPL/145', 'Eminent@10', 'Akash Gurjar', 9599822522, 'akash.gujar@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(100, 'EIPL/146', 'Eminent@10', 'Sachin Kumar ', 9999999117, 'sachin@eminentcompliance.com', 1, 3, 'Active', 0, 'Admin', NULL, 5, 0),
(101, 'EIPL/147', 'Eminent@10', 'Sugriv', 9999999118, 'sugriv@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(102, 'EIPL/148', 'Eminent@10', 'Mirza Haider', 9999999119, 'mirza@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 3, 0),
(103, 'EIPL/149', 'Eminent@10', 'Sukanta Majhi ', 9088140829, 'sukanta@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Sukanta+Majhi+&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SU', 1, 0),
(104, 'EIPL/150', 'Eminent@10', 'Nitin Bhardwaj ', 9873844241, 'nitin@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(105, 'EIPL/151', 'Eminent@10', 'Raj Raghav Singh ', 9999999120, 'raj@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(106, 'EIPL/152', 'Eminent@10', 'Vishal Kumar', 9999999121, 'vishal@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(107, 'EIPL/153', 'Eminent@10', 'Ankur Dingliwal ', 7678683006, 'ankur@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(108, 'EIPL/154', 'abAB@1234', 'Reshu Rajore', 9971773365, 'reshu@eminentcompliance.com', 1, 1, 'Active', 1, 'Human Resource', 'media/upload/emp_img/64a5377f2888a_HRv.cms', 5, 0),
(109, 'EIPL/155', 'Eminent@10', 'Deepak Kumar', 9205282838, 'deepak.kumar@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(110, 'EIPL/156', 'Eminent@10', 'Manoj Kumar', 8826938716, 'manoj@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(111, 'EIPL/157', 'Eminent@10', 'Praful Vasantrao Waghmare', 9665937403, 'praful@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Praful+Vasantrao+Waghmare&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PRW', 2, 0),
(112, 'EIPL/158', 'Eminent@10', 'Bharti Rajput', 9999999122, 'bharti@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(113, 'EIPL/159', '8505932648', 'Kapil Rawat', 8505932648, 'kapil@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance', 'https://ui-avatars.com/api/?name=Kapil+Rawat&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=KAR', 5, 0),
(114, 'EIPL/160', 'Eminent@10', 'Ankush Singh', 9540059877, 'ankush@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(115, 'EIPL/161', 'Eminent@10', 'Ekta Bharti', 8285972209, 'ekta.bharti@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Custom', NULL, 5, 0),
(116, 'EIPL/300', 'Eminent@10', 'Sunit Kumar', 9015355588, 'sunit@eminentcompliance.com', 1, 3, 'Inactive', 0, 'IT', NULL, 5, 0),
(117, 'EIPL/162', 'Eminent@10', 'Sahil Dhiman', 9876811796, 'sahil.dhiman@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(118, 'EIPL/163', 'Eminent@10', 'Anshul Parashar', 9891623683, 'anshul@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64c3520f5d9f8_IMG20230408083946.jpg', 5, 0),
(119, 'EIPL/164', 'Amaira@2019', 'Swati Khanna', 9810559069, 'swati@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Swati+Khanna&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SWK', 5, 0),
(120, 'EIPL/165', 'G@y@tri_1996', 'Gayatri Singh', 9625475445, 'gayatri@eminentcompliance.com', 1, 5, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Gayatri+Singh&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=GAS', 5, 0),
(121, 'EIPL/166', '9582913035', 'Sunny ', 9582913035, 'sunny@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64a8065e971fb_sunny singh.jpeg', 5, 0),
(122, 'EIPL/167', 'Eminent@10', 'Dharmender Singh ', 8285950517, 'dharmender@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Custom', 'https://ui-avatars.com/api/?name=Dharmender+Singh+&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=DH', 5, 0),
(123, 'EIPL/168', 'Eminent@10', 'Aniket Singh', 9818331213, 'aniket@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Custom', NULL, 5, 0),
(124, 'EIPL/169', 'Eminent@10', 'Chetan Sharma ', 9958934133, 'chetan@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(125, 'EIPL/170', 'Eminent@10', 'Jatin Kapoor', 8802766286, 'jatin@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Custom', NULL, 5, 0),
(126, 'EIPL/171', 'Eminent@10', 'Jyoti Dubey', 7838014727, 'jyoti.dubey@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Custom', NULL, 5, 0),
(127, 'EIPL/172', 'Eminent@10', 'Lata Bisht', 7248506860, 'lata@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance & Accounts', 'https://ui-avatars.com/api/?name=Lata+Bisht&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=LAB', 5, 0),
(128, 'EIPL/173', 'Eminent@10', 'Amit Kumar', 9968383411, 'amit@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance', 'https://ui-avatars.com/api/?name=Amit+Kumar&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=AMK', 5, 0),
(129, 'EIPL/174', 'Simran@rahul2', 'Simran', 9319784576, 'simran@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance', 'https://ui-avatars.com/api/?name=Simran&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SIS', 5, 0),
(130, 'EIPL/175', 'Eminent@1502#', 'Abhijeet Kumar', 7004696613, 'abhijeet@handikart.co.in', 2, 3, 'Active', 1, 'Marketing', 'https://ui-avatars.com/api/?name=Abhijeet+Kumar&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ABK', 5, 0),
(131, 'EIPL/176', 'Eminent@10', 'Rajat Sharma', 9896322873, 'rajat.sharma@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 3, 0),
(132, 'EIPL/177', 'Eminent@10', 'Arun Kumar Rai ', 9582186762, 'arun.kumar@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Custom', NULL, 5, 0),
(133, 'EIPL/178', 'Eminent@10', 'Azam Imtiyaz', 9582404941, 'azam@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(134, 'EIPL/179', 'Eminent@10', 'Varun Raghuwanshi', 8827471060, 'varun@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Varun+Raghuwanshi&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=VAR', 2, 0),
(135, 'EIPL/180', 'Eminent@10', 'Shruti Mohan Mukkar', 9810715759, 'shruti@handikart.co.in', 2, 3, 'Active', 1, 'Marketing', NULL, 5, 0),
(136, 'EIPL/181', 'Eminent@10', 'Jayanta Nath', 9085932261, 'jayanta@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Jayanta+Nath&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=JAN', 1, 0),
(137, 'EIPL/182', 'Eminent@10', 'Pranav Gupta', 7827085285, 'pranav@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(139, 'EIPL/184', 'Eminent@10', 'Emayavaramban', 6380919109, 'emayavaramban@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 4, 0),
(140, 'EIPL/185', 'Eminent@10', 'Dheeraj Guru', 8860783482, 'dheeraj@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', 'https://ui-avatars.com/api/?name=Dheeraj+Guru&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=DHG', 5, 0),
(141, 'EIPL/186', 'Eminent@10', 'Renu Vidyarthi', 9599328909, 'renu@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 5, 0),
(142, 'EIPL/187', 'Eminent@10', 'Yashpal Singh Bisht', 8954638683, 'yashpal@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Yashpal+Singh+Bisht&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=YAB', 5, 0),
(143, 'EIPL/188', 'Eminent@10', 'Ritika Arora', 8979217180, 'ritika@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Ritika+Arora&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RIA', 5, 0),
(144, 'EIPL/189', 'Aakash5797@', 'Aakash', 9958497397, 'aakash@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://lh3.googleusercontent.com/a/AAcHTtd60Xl2EsxuXG0pOqA29IacXBXDWUztJY_qF2etu_YP=s96-c', 5, 0),
(145, 'EIPL/190', 'Eminent@10', 'Neha Negi', 9717927691, 'neha@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Neha+Negi&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=NEN', 5, 0),
(146, 'EIPL/191', 'ROOPALIBISHT01@', 'Roopali Bisht', 7065788339, 'roopali@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Roopali+Bisht&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ROB', 5, 0),
(147, 'EIPL/192', 'Eminent@10', 'Avishek Gupta', 7001912535, 'avishek@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 4, 0),
(148, 'EIPL/193', 'Eminent@10', 'Suresh Kumar R', 9591835907, 'suresh@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Suresh+Kumar+R&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SUR', 4, 0),
(149, 'EIPL/194', 'Eminent@10', 'Sanjeev Kumar Singh', 9891420741, 'sanjeev@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance & Accounts', NULL, 5, 0),
(150, 'EIPL/195', 'Eminent@10', 'Topeeque', 7619433650, 'topeeque@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64c4c52630f5a_FB_IMG_1669955927755.jpg', 4, 0),
(151, 'EIPL/196', 'Eminent@10', 'Arjun Kumar Manjhi', 9599578943, 'arjun@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(152, 'EIPL/197', 'Eminent@10', 'Jwala Sharma', 9315367845, 'jwala@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance & Accounts', NULL, 5, 0),
(153, 'EIPL/198', 'Eminent@10', 'Mona Bhatt', 7888394689, 'mona@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64a6a4a6d6ef1_WhatsApp Image 2023-07-06 at 4.55.10 PM.jpeg', 5, 0),
(154, 'EIPL/199', 'Eminent@10', 'Rashmi Bisht', 7505889588, 'rashmi.bhist@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Marketing', NULL, 5, 0),
(155, 'EIPL/200', 'Eminent@10', 'Ravichandra Bhathula', 9845011437, 'chandra.ravi@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'media/upload/emp_img/64c606a968813_IMG_0624.jpeg', 4, 0),
(156, 'EIPL/201', 'Eminent@10', 'Vinodh P', 9999999123, 'vinodh@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Legal Compliance', NULL, 4, 0),
(157, 'EIPL/202', 'Eminent@10', 'Manish Kumar', 7488376023, 'manish.kumar@eminentcompliance.com', 1, 3, 'Inactive', 0, 'IT', NULL, 5, 0),
(158, 'EIPL/203', 'Eminent@10', 'Pawan', 9910207112, 'pawan@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance & Accounts', 'https://ui-avatars.com/api/?name=Pawan&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PAP', 5, 0),
(159, 'EIPL/204', 'Eminent@10', 'Kuldeep Bidhuri', 8700930765, 'kuldeep@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance & Accounts', NULL, 5, 0),
(160, 'EIPL/205', 'Eminent@10', 'Vasanthi Muralidhar', 8867855446, 'vasanthi@handikart.co.in', 2, 3, 'Inactive', 0, 'Operations', NULL, 4, 0),
(161, 'EIPL/206', 'Eminent@10', 'Aakash Kumar', 8826128250, 'aakash.kumar@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Aakash+Kumar&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=AAK', 5, 0),
(162, 'EIPL/207', 'Eminent@10', 'Piyush Raj Yadav', 9589011704, 'piyush@eminentcompliance.com', 1, 8, 'Active', 1, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Piyush+Raj+Yadav&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PIY', 1, 0),
(163, 'EIPL/208', 'Eminent@10', 'Mohit Agrawal', 9999999124, 'mohit@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(164, 'EIPL/209', '1234567Aa@', 'Ekta', 7011916721, 'ekta@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Ekta&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=EKE', 5, 0),
(165, 'EIPL/210', '@Rdz0317', 'Ravi', 8826163183, 'ravi.prajapati@eminentcompliance.com', 1, 11, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Ravi&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=RAR', 5, 0),
(166, 'EIPL/211', 'SagarSagar', 'Sagar Kumar ', 7017742830, 'sagar@eminentcompliance.com', 1, 0, 'Active', 1, 'IT', 'media/upload/emp_img/64a538795870b_software-developer-6521720_1280.jpg', 5, 0),
(167, 'EIPL/212', 'Aman@1804', 'Aman', 8376851822, 'aman@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Aman&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=AMA', 5, 0),
(168, 'EIPL/213', 'Eminent@10', 'Nitika Sharma', 8800893412, 'nitika@handikart.co.in', 2, 3, 'Active', 1, 'Marketing', 'https://ui-avatars.com/api/?name=Nitika+Sharma&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=NIS', 5, 0),
(169, 'EIPL/214', 'Eminent@10', 'Ankit Sharma', 9711359556, 'ankit@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Ankit+Sharma&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ANS', 5, 0),
(170, 'EIPL/215', 'Eminent2023', 'Rajeev Kumar', 8630164747, 'rajeev@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://lh3.googleusercontent.com/a/AAcHTtfa43LATCMou06I3fXHeWVlSXEe_VH26zBXorVUytwV=s96-c', 5, 0),
(171, 'EIPL/216', 'Eminent@10', 'Anand Sharma', 9315158032, 'anand@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Audit & Assurance', NULL, 5, 0),
(172, 'EIPL/217', 'Eminent@10', 'Gurnit Kaur', 9999009206, 'gurnit@handikart.co.in', 2, 3, 'Active', 1, 'Buying & Merchandising', 'https://ui-avatars.com/api/?name=Gurnit+Kaur&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=GUK', 5, 0),
(173, 'EIPL/218', 'Eminent@10', 'Punya Suri', 9999918073, 'punya@handikart.co.in', 2, 3, 'Active', 1, 'Fashion Designing', 'https://ui-avatars.com/api/?name=Punya+Suri&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=PUS', 5, 0),
(174, 'EIPL/219', 'Eminent@10', 'Vibha Mishra', 7827170344, 'vibha@handikart.co.in', 2, 3, 'Active', 1, 'Fashion Designing', 'https://lh3.googleusercontent.com/a/AAcHTte2p0DbrgtLBIDhHDoPRczhck9FkUcHrxA-5WaU-qL7=s96-c', 5, 0),
(175, 'EIPL/220', 'Eminent@10', 'Ajay Kumar', 7701888937, 'ajay@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'media/upload/emp_img/64a68ecf3cda5_IMG_20230706_144108.jpg', 5, 0),
(176, 'EIPL/221', 'Eminent@10', 'Tanzeem Zaidi', 8006508146, 'tanzeem@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'media/upload/emp_img/64c8955943c87_Screenshot_2023-08-01-10-46-08-23_6012fa4d4ddec268fc5c7112cbb265e7.jpg', 5, 0),
(177, 'EIPL/222', 'Eminent@10', 'Lorrain Wilson ', 8287154117, 'lorrain@eminentcompliance.com', 1, 6, 'Active', 1, 'Legal Compliance', 'https://lh3.googleusercontent.com/a/AAcHTtcTRfJKFNSiN_TX-Sib1uoygaEGOk2YCd2o6kC8tEp9=s96-c', 5, 0),
(178, 'EIPL/223', 'Eminent@10', 'Pawan Pandey', 9818408192, 'pawan@handikart.co.in', 2, 3, 'Active', 1, 'Operations', NULL, 5, 0),
(179, 'EIPL/224', 'Eminent@10', 'Pushpendra Mehra', 8059730227, 'pushpendra@eminentcompliance.com', 1, 3, 'Active', 1, 'Finance & Accounts', NULL, 5, 0),
(180, 'EIPL/225', 'Anuj@590767', 'Anuj Kumar', 7906386533, 'anuj@eminentcompliance.com', 107, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Anuj+Kumar&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=ANK', 5, 0),
(181, 'EIPL/226', 'Eminent@10', 'Sonu Sharma', 9127586358, 'sonu@eminentcompliance.com', 1, 3, 'Inactive', 0, 'Finance & Accounts', NULL, 5, 0),
(182, 'EIPL/227', 'Sakshi@10', 'Sakshi Saraswat', 7017841594, 'sakshi@eminentcompliance.com', 1, 3, 'Active', 1, 'Audit & Assurance', 'https://ui-avatars.com/api/?name=Sakshi+Saraswat&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=SAS', 5, 0),
(190, 'EIPL/231', 'Eminent@10', 'Poonam Soni', 9315298834, 'poonam@eminentcompliance.com', 1, 3, 'Active', 0, 'Human Resource', 'https://lh3.googleusercontent.com/a/AAcHTtfZ03QM40RAHC-LCzyrKjp3v4YNJUM0vYCQxlMd4sre=s96-c', 5, 0),
(191, 'EIPL/999', 'employee', 'Employee', 8802894471, 'employee@eminentcompliance.com', 1, 3, 'Active', 1, 'Operations', 'https://ui-avatars.com/api/?name=employee&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=EME', 5, 0),
(192, 'EIPL/228', 'Eminent@10', 'Karan Kumar', 9582871191, 'karankumar032@gmail.com', 1, 3, 'Active', 0, NULL, 'https://ui-avatars.com/api/?name=Karan+Kumar&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=KAK', 5, 0),
(193, 'EIPL/230', 'Eminent@10', 'Tanisha', 9873046231, 'tanisha@eminentcompliance.com', 1, 3, 'Active', 0, 'Legal Compliance', 'https://ui-avatars.com/api/?name=Tanisha&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=TAT', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(4) NOT NULL,
  `company_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(107, ' Burgundy Hospitality Pvt Ltd'),
(3, '90minutes Retail Private Limited'),
(79, 'A3m Direct Brand Purchase Private Limited'),
(43, 'Aai Cargo Logistics & Allied Service Company Limited'),
(55, 'Aaidea Solutions Private Limited'),
(33, 'Aditya Birla Fashion And Retail Limited (Pantaloons)'),
(44, 'Airport Authority Of India Officers Institute'),
(92, 'Amazon Retail India Pvt Ltd'),
(4, 'Amazon Seller Services Private Limited'),
(5, 'Amazon Transportation Services Private Limited '),
(73, 'Ans Digital Private Limited'),
(62, 'Antares Legal'),
(100, 'Asvah Retail Pvt Ltd'),
(98, 'Bigway Marketing Private Limited'),
(41, 'Bundl Technologies Private Limited (Swiggy)'),
(70, 'Cleartrip Private Limited'),
(45, 'Commoncity Retail Private Limited'),
(6, 'Crofcloud Onsale Landing Private Limited'),
(78, 'Dana Choga'),
(7, 'Dealskart Online Services Private Limited'),
(8, 'Decathlon Sports India Private Limited'),
(20, 'Delightful Gourmet Private Limited'),
(94, 'Digmiro Distribution India Private Limited'),
(91, 'Djt Retailers Private Limited'),
(95, 'Drg Labs India Private Limited'),
(89, 'Dunzo Digital Pvt Ltd'),
(97, 'Dunzo Wholesale Private Limited'),
(105, 'Earth Paws Pvt Ltd'),
(96, 'Ebo Mart Private Limited'),
(101, 'Emerson Process Management Power'),
(21, 'Eminent Food Stores India Private Limited'),
(1, 'Eminent India Private Limited'),
(46, 'Excel Experiential Marketing Private Limited'),
(27, 'F1 Info Solutions & Services Private Limited'),
(76, 'Flipkart Health Limited'),
(9, 'Flipkart India Private Limited'),
(47, 'Flipkart Internet Private Limited'),
(10, 'Fnv Retail Private Limited'),
(38, 'Future Lifestyle Fashions Limited'),
(11, 'Future Retail Limited'),
(32, 'Future Supply Chain Solutions Limited'),
(12, 'Giani Ice Cream Private Limited'),
(13, 'Go Airlines (India) Limited'),
(82, 'Gourmet Investments Pvt Ltd'),
(14, 'Grofers India Private Limited'),
(2, 'Handikart Online Sales Private Limited'),
(15, 'Hands On Trade Private Limited'),
(34, 'Himesh Foods Private Limited'),
(72, 'Home Solutions (Retail) India Limited'),
(16, 'Homemade Bakers (India) Limited'),
(93, 'Hypersqaure Convenience Private Limited'),
(42, 'Ice Cream Company'),
(36, 'Ikea India Private Limited'),
(68, 'India Farmers Fertilizer Cooperative Limited (Iffco)'),
(66, 'Infifresh Foods Private Limited'),
(18, 'Instakart Services Private Limited'),
(17, 'Interglobe Aviation Limited'),
(26, 'Jeeves Consumer Service Private Limited'),
(58, 'Jumbotail Technologies'),
(48, 'Jumbotail Wholesale Private Limited'),
(49, 'Kazaya Private Limited'),
(64, 'Kemexel Ecommerce Private Limited'),
(104, 'Kirankart Technologie Pvt Ltd'),
(19, 'La Super Retail Private Limited'),
(99, 'Lenskart Eyetech Private Limited'),
(69, 'Lenskart Solutions Private Limited'),
(29, 'Loveey Trading India Private Limited'),
(80, 'Mogli Labs India Private Limited'),
(90, 'Moonstone Ventures Llp'),
(30, 'Moveon Delivery Intime Private Limited'),
(86, 'Mrs Bectors English Oven Limited'),
(74, 'My Joy Pharmaceuticals Private Limited'),
(88, 'Myntra Designs India Private Limited'),
(60, 'Myntra Jabong Private Limited'),
(67, 'Novarris Fashion Trading Private Limited'),
(37, 'Pan India Foods Solutions Private Limited'),
(22, 'Phonepe Private Limited'),
(50, 'Phonepe Wealth Services Private Limited'),
(40, 'Pisces Eservices Private Limited'),
(23, 'Praxis Home Retail Limited'),
(56, 'Profectus Technologies Pvt Ltd'),
(71, 'Puma'),
(51, 'Rachika Trading Limited'),
(75, 'Sastasundar Health Buddy Limited'),
(103, 'Scribetech India Healthcare Pvt Ltd'),
(106, 'Setu Nutrition Pvt Ltd'),
(28, 'Shreyash Retail Private Limited'),
(87, 'Snv Aviation Private Limited'),
(59, 'Source Water India Private Limited'),
(31, 'Ssc Tradecom Private Limited'),
(24, 'Sterling Foods'),
(77, 'Storeasy Llp'),
(81, 'Superwell Comtrade Private Limited'),
(84, 'Surifresh Extract Private Limited'),
(63, 'Tams Global Private Limited'),
(52, 'Taramis Labs Private Limited'),
(25, 'Taskus India Private Limited'),
(54, 'Tata Smartfoodz Limited'),
(53, 'Tata Starbucks Private Limited'),
(65, 'Team Hr Gsa Private Limited'),
(83, 'Texmes Cusine India Pvt Ltd'),
(108, 'The New Shop - Company Owned'),
(109, 'The New Shop - Franchise Owned'),
(35, 'Vegith Global Services Private Limited'),
(57, 'Walmart India Private Limited'),
(102, 'Water Solutions India Pvt Ltd'),
(85, 'Younext Sales Llp'),
(61, 'Zomato Hyperpure Private Limited'),
(39, 'Zomato Media Private Limited');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(4) NOT NULL,
  `department_name` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(0, 'Not Alloted'),
(1, 'FDA'),
(2, 'Municipality'),
(3, 'Agricultural Department '),
(4, 'Labour Department '),
(5, 'Pollution Department '),
(6, 'Electricity Department '),
(7, 'Fire Department'),
(8, 'Legal Metrology'),
(9, 'Mandi Samiti'),
(10, 'Gram Panchayat'),
(11, 'Delhi Police'),
(12, 'RTO'),
(14, 'Veterinary Department'),
(15, 'Court'),
(16, 'NDMC'),
(17, 'Drug'),
(18, 'Telecommunication'),
(19, 'Commercial Tax'),
(20, 'E Bike'),
(21, 'GST');

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `emp_info_id` int(10) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `emp_work` varchar(100) DEFAULT NULL,
  `emp_gender` varchar(100) DEFAULT NULL,
  `emp_join` varchar(100) DEFAULT NULL,
  `emp_des` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `emp_pan` varchar(100) DEFAULT NULL,
  `emp_esic` varchar(100) DEFAULT NULL,
  `emp_uan` varchar(100) DEFAULT NULL,
  `emp_bank` varchar(100) DEFAULT NULL,
  `emp_acc` varchar(100) DEFAULT NULL,
  `emp_ifsc` varchar(100) DEFAULT NULL,
  `aadhar_doc` varchar(255) DEFAULT NULL,
  `pan_doc` varchar(255) DEFAULT NULL,
  `offer_letter` varchar(255) DEFAULT NULL,
  `salary_annexure` varchar(255) DEFAULT NULL,
  `appointment_letter` varchar(255) DEFAULT NULL,
  `confirmation_letter` varchar(255) DEFAULT NULL,
  `increment_letter` varchar(255) DEFAULT NULL,
  `relieving_letter` varchar(255) DEFAULT NULL,
  `medical_insurance` varchar(255) DEFAULT NULL,
  `accidental_insurance` varchar(255) DEFAULT NULL,
  `emp_blood` varchar(255) DEFAULT NULL,
  `current_address` longtext DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `relative_mobile` varchar(255) DEFAULT NULL,
  `relative_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`emp_info_id`, `emp_id`, `emp_work`, `emp_gender`, `emp_join`, `emp_des`, `dob`, `emp_pan`, `emp_esic`, `emp_uan`, `emp_bank`, `emp_acc`, `emp_ifsc`, `aadhar_doc`, `pan_doc`, `offer_letter`, `salary_annexure`, `appointment_letter`, `confirmation_letter`, `increment_letter`, `relieving_letter`, `medical_insurance`, `accidental_insurance`, `emp_blood`, `current_address`, `permanent_address`, `relative_mobile`, `relative_name`) VALUES
(1, 'EIPL/001', 'Barakhamba', 'Male', '2016-01-27', 'Managing Director', '1984-09-10', 'AHBPV9583B', NULL, NULL, 'HDFC Bank', '50100081462163    ', 'HDFC0000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'EIPL/002', 'Barakhamba', 'Female', '2016-01-27', 'Director', '1984-08-18', 'AJQPA7306N', NULL, NULL, 'HDFC Bank', '16721050007813    ', 'HDFC0001672', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'EIPL/003', 'Barakhamba', 'Male', '2016-01-27', 'General Manager ', '1984-01-01', 'DFOPK6405M', NULL, '101450669332    ', 'Standard Chartered Bank', '52215713849    ', 'SCBL0036020', '64bf81ab1e525.pdf', '64bf81ab1f029.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL003-MedicalInsurance-1690971052.pdf', NULL, 'B+', 'H12/1, MALVIY NAGAR, NEW DELHI-110017', 'NEAR TO VISVAKARMA MANDIR, GANESGGANJ, MIRZAPUR, UP-231001', '7042322742', 'JYOTI JAISWAL'),
(4, 'EIPL/004', 'Barakhamba', 'Male', '2016-01-27', 'Senior Manager', '1991-05-13', 'AZBPJ8538Q', NULL, '101116088185    ', 'Standard Chartered Bank', '52215723089    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL004-MedicalInsurance-1690970934.pdf', NULL, NULL, 'S-431 3RD FLOOR, SCHOOL BLOCK, LAXMINAGAR, NEW DELHI-110092', 'VILLAGE-BHAGWANPUR, P.O BHAIYAPATTI, DIST-MADHUBANI BIHAR-847230', NULL, NULL),
(5, 'EIPL/005', 'Barakhamba', 'Male', '2016-01-27', 'General Manager ', '1993-02-24', 'ACJPF9766B', NULL, '101545000978    ', 'Standard Chartered Bank', '52215714039    ', 'SCBL0036020', '64c9fa788ac9b.pdf', '64c9fa788b794.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL005-MedicalInsurance-1690971101.pdf', NULL, 'B+', '18/16 Moulsiri Road, Shipra Sun City, Indirapuram 201014', 'Dariyal General Store, Ward No.6, Main Market Kaladhungi, Distt. Nainital, Uttarakhand - 263140', '9756825127', 'Mohd Usman (Father)'),
(6, 'EIPL/009', 'Barakhamba', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(7, 'EIPL/011', 'Uttar Pradesh', 'Male', '2019-04-01', 'Assistant Manager ', '1984-02-01', 'AJPPR2725M', NULL, '101450670365    ', 'State Bank of India', '30054119931    ', 'SBIN0001780', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL011-MedicalInsurance-1690971142.pdf', NULL, NULL, '11/188 gwailtoli kanpur up 208001', '11/188 Gwailtoli Kanpur up 208001', NULL, NULL),
(8, 'EIPL/012', 'Haryana', 'Male', '2019-04-01', 'Assistant Regional Manager', '1992-06-20', 'CSUPM6340K', NULL, '101450670396    ', 'HDFC Bank', '50100069965158    ', 'HDFC0000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', '', '', '', ''),
(9, 'EIPL/013', 'Barakhamba', 'Male', '2018-03-19', 'Senior Manager', '1988-07-21', 'AMLPV9688A', NULL, '101450669252    ', 'Standard Chartered Bank', '52215714020    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL013-MedicalInsurance-1690971204.pdf', NULL, '', '352 E/9 MUNIRKA VILLAGE NEW DELHI 110067', '352 E/9 MUNIRKA VILLAGE NEW DELHI 110067', '9718126060', 'Tarun Virat'),
(10, 'EIPL/014', 'Barakhamba', 'Male', '2018-02-01', 'Senior Manager', '1993-09-18', 'CXAPK8735P', NULL, '101450669281    ', 'Standard Chartered Bank', '52215714136    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C-7/1 New cottage Road Adarsh Nagar Delhi 33', 'C-7/1 New cottage Road Adarsh Nagar Delhi 33', NULL, NULL),
(11, 'EIPL/015', 'Barakhamba', 'Female', '2018-05-18', 'Assistant Manager', '1993-12-06', 'CEWPR7431G', NULL, '101502828472    ', 'HDFC Bank', '50100299853516    ', 'HDFC0000708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2531, Mind control Gym Sainik Colony, Sector 49, Faridabad', '2531, Mind control Gym Sainik Colony, Sector 49, Faridabad', NULL, NULL),
(12, 'EIPL/016', 'Barakhamba', 'Female', '2016-08-21', 'Senior Manager ', '1993-10-12', 'CPYPK1595M', NULL, '101450669350    ', 'Bank of India', '608210110004381    ', 'BKID0006082', '64bf961e58f58.pdf', '64bf961e5991d.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O+ ', 'House No. 624/12, Zakir Nagar, New Friends Colony, Jamia Nagar, New Delhi - 110025', 'House No. 180 - A/07, Zakir Nagar, New Friends Colony, Jamia Nagar, New Delhi - 110025', '9990043491', 'Farida Khan (Mother)'),
(13, 'EIPL/017', 'Barakhamba', 'Female', '2019-01-03', 'Manager', '1992-11-24', 'BEDPB5423G', NULL, NULL, 'Bank of Baroda', '601101011004403    ', 'BARB0MUNIRK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A-153 , North Moti Bagh , New Delhi - 110021', '244 A/1 , Munirka Village , New Delhi - 110067', NULL, NULL),
(14, 'EIPL/020', 'Barakhamba', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(15, 'EIPL/024', 'Barakhamba', 'Male', '2016-08-01', 'Senior Manager', '1995-08-22', 'FDYPS2708M', NULL, '101116088163    ', 'Standard Chartered Bank', '52215713377    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL024-MedicalInsurance-1690971225.pdf', NULL, NULL, 'D 1626 11th Avenue Gaur City 2, Nodia U.P 201301', '11/16 E.W.S Preetam Nagar Coloney Dhoomanganj Prayagraj 211011', NULL, NULL),
(16, 'EIPL/026', 'Barakhamba', 'Male', '2016-06-10', 'Chief Operation Officer', '1989-06-30', 'BYNPA3478G', NULL, '101450669309    ', 'Standard Chartered Bank', '52215713202    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G-2 Taj Enclave 110031', 'G-2 Taj Enclave 110031', NULL, NULL),
(17, 'EIPL/027', 'Barakhamba', 'Female', '2018-04-01', 'Senior Manager', '1991-07-20', 'BRKPD7294M', NULL, NULL, 'Standard Chartered Bank', '52215723143    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Noida Sector 41 , 132house no', 'Aryamitra Aspire Hyderabad', NULL, NULL),
(18, 'EIPL/029', 'Karnataka', 'Male', '2019-11-01', 'Assistant Regional Manager', '1994-01-01', 'BRKPA0260J', NULL, '101545001001    ', 'HDFC Bank', '50100296669780    ', 'HDFC0004310', '64c4b171cd3ca.jpg', '64c4b171cdd09.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Chickmagalur ', 'Chickmagalur ', '9620503130', 'Abdulla'),
(19, 'EIPL/034', 'Barakhamba', 'Male', '2019-04-01', 'Senior Executive ', '1986-02-12', 'BZOPS5382R', NULL, '101116088171    ', 'Standard Chartered Bank', '52215713989    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL034-MedicalInsurance-1690971264.pdf', NULL, NULL, 'H.no-F-109,Galli no 4, West Vinod Nagar,Shakarpur Baramad, Shakarpur, Gandhi Nagar, East Delhi, Delhi-110092', 'H.no-F-109,Galli no 4, West Vinod Nagar,Shakarpur Baramad, Shakarpur, Gandhi Nagar, East Delhi, Delhi-110092', NULL, NULL),
(20, 'EIPL/036', 'Barakhamba', 'Male', '2018-08-06', 'General Manager', '1992-03-01', 'CXFPK1526F', NULL, '100760531035    ', 'Standard Chartered Bank', '52215714012    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL036-MedicalInsurance-1690971284.pdf', NULL, 'AB -VE', 'Taj Enclave Geeta colony,G Block 110031', 'Village,Gurha manda,Tehsil Akhnoor,Jammu 181201', '', ''),
(21, 'EIPL/039', 'Barakhamba', 'Female', '2018-12-19', 'Manager', '1994-03-08', 'CLMPM4305H', NULL, '101450670383    ', 'Standard Chartered Bank', '52215715914    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL039-MedicalInsurance-1690971307.pdf', NULL, '', '267 A POCKET 2 PHASE 1 MAYUR VIHAR', '267 A POCKET 2 PHASE 1 MAYUR VIHAR', '', ''),
(22, 'EIPL/041', 'Barakhamba', 'Male', '2018-12-10', 'Assistant Manager', '1988-11-23', 'BUIPS3373R', NULL, '100191457994    ', 'Standard Chartered Bank', '52215716015    ', 'SCBL0036020', '64c3b5e3d891b.pdf', '64c3b5e3d925b.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'H-16/334, Sangam vihar, ratiya marg, new delhi-110062', 'H-16/334, Sangam vihar, ratiya marg, new delhi-110062', '9971860571', 'kaushal sharma'),
(23, 'EIPL/042', 'Barakhamba', 'Male', '2018-08-20', 'Associate Manager', '1990-06-11', 'BEOPG8976A', NULL, '101450669247    ', 'Canara Bank', '90562010066654    ', 'CNRB0019009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C-58, GALI NO 4, EKTA MARG, NANGLI VIHAR EXTN, NEW DELHI-110043', 'C-58, GALI NO 4, EKTA MARG, NANGLI VIHAR EXTN, NEW DELHI-110043', NULL, NULL),
(24, 'EIPL/044', 'Barakhamba', 'Male', '2018-10-08', 'Assistant Manager', '1996-08-01', 'BLXPT4150K', NULL, '101502302890    ', 'Standard Chartered Bank', '52215716007    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL044-MedicalInsurance-1690971338.pdf', NULL, NULL, 'D-54 Moji Wala Bagh, Azadpur, Delhi-110033', 'D-54 Moji Wala Bagh, Azadpur, Delhi-110033', NULL, NULL),
(25, 'EIPL/045', 'Barakhamba', 'Male', '2018-10-11', 'Assistant Manager', '1996-04-21', 'HDQPS6255D', NULL, '101450669268    ', 'Standard Chartered Bank', '52215714071    ', 'SCBL0036020', NULL, '64c261cde6ca1.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', '198 A SECTOR 2 VAISHALI, GHAZIABAD. UTTAR PRADESH 201010', '198 A SECTOR 2 VAISHALI, GHAZIABAD. UTTAR PRADESH 201010', '9818638810', 'Bhagwat Singh'),
(26, 'EIPL/046', 'Gurugram', 'Male', '2019-04-01', 'Senior Executive ', '1990-08-10', 'GMGPS1049H', NULL, '101450670401    ', 'Allahbad bank', '50171807890    ', 'ALLA0210116', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kelanpur,Akarabad,Aligarh, Uttar Pradesh -202121', 'C/O Manoj Verma, Opp. - Kidzee School, Ghoda Mohalla, Aya Nagar, South Delhi, Pin Code - 110047.', NULL, NULL),
(27, 'EIPL/051', 'Barakhamba', 'Female', '2019-04-01', 'Associate Manager ', '1994-12-21', 'DQQPM0009E', NULL, '101542387087    ', 'Axis bank', '916010078294993    ', 'UTIB0003089', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Flatno-40, Maitri Apartment, Mayur Vihar phase-1, New Delhi-110091', 'Piturutirtha, Shree ram nagar, Khordha, Odisha, 750025', NULL, NULL),
(28, 'EIPL/052', 'Barakhamba', 'Male', '2019-07-27', 'Executive ', '1997-10-25', 'BNRPT8290E', NULL, NULL, 'State Bank of India', '34349414323    ', 'SBIN0017716', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45 badam Mandi karker khera meerut', '45 badam Mandi karker khera meerut', NULL, NULL),
(29, 'EIPL/054', 'Barakhamba', 'Male', '2018-11-19', 'Manager', '1996-03-30', 'BPYPC3912B', NULL, '101450669321    ', 'Standard Chartered Bank', '52215713938    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HD - 301, Duplex Villas, Sector - 135, Noida', 'K - 22/33, Gali No. 20, West Ghonda, Delhi - 110053', NULL, NULL),
(30, 'EIPL/055', 'Delhi', 'Male', '2019-04-15', 'Manager', '1985-03-05', 'CAEPKA600G', NULL, '100090591996    ', 'ICICI Bank', '8301537274    ', 'ICIC0000083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL055-MedicalInsurance-1690971369.pdf', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'EIPL/056', 'Barakhamba', 'Male', '2019-05-14', 'Assistant Manager', '1980-05-31', 'AVVPR4365B', NULL, '101542387073    ', 'Standard Chartered Bank', '83101509056    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'X 4/17, Chaudhary fateh singh marg Brahmpuri, Delhi110053', 'X 4/17, Chaudhary fateh singh marg Brahmpuri, Delhi110053', NULL, NULL),
(32, 'EIPL/057', 'Barakhamba', 'Male', '2019-06-01', 'Manager', '1986-07-24', 'CIZPS5308G', NULL, '101184257812    ', 'Standard Chartered Bank', '52215713199    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C 104,Gali no 1, Vistar colony indrapuram Ghazibad UP', 'Vill Jahangeerpur,PO Salempur, Dist. Hathras UP', NULL, NULL),
(33, 'EIPL/058', 'Barakhamba', 'Male', '2019-06-01', 'Assistant Regional Manager', '1998-06-17', 'GXKPS6847A', NULL, '101513147162    ', 'Standard Chartered Bank', '52215713296    ', 'SCBL0036020', '64bf7aff9757a.pdf', '64bf7aff98046.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'K-20/6 Gali No 20 West Ghonda Delhi 110053', 'K-20/6 Gali No 20 West Ghonda Delhi 110053', '', ''),
(34, 'EIPL/059', 'Delhi', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(35, 'EIPL/063', 'Barakhamba', 'Male', '2019-06-19', 'Manager ', '1989-11-07', 'BRMPR0189R', NULL, '100284198938    ', 'Standard Chartered Bank', '52215713822    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AB+', 'A-17A Mange Ram Park Budh Vihar Phase-1 Delhi 110086', 'A-17A Mange Ram Park Budh Vihar Phase-1 Delhi 110086', '', ''),
(36, 'EIPL/065', 'Bihar', 'Male', '2019-07-27', 'Senior Field Executive', '1993-04-10', 'AGCPI5174R', '1014572703', '101545000966    ', 'State Bank of India', '37058218735    ', 'SBIN0019019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL065-MedicalInsurance-1690971439.pdf', NULL, 'B+', 'OPPOSITE 95C PWD QUARTER SATGHARWA COLONY BANO ROAD LODIPUR PATNA 800001.', 'OPPOSITE 95C PWD QUARTER SATGHARWA COLONY BANO ROAD LODIPUR PATNA 800001', '', ''),
(37, 'EIPL/066', 'Bihar', 'Male', '2019-11-01', 'Field Executive', '2000-03-13', 'KADPS9093G', '1014572682', '101545000984    ', 'Indian Overseas Bank', '148401000003635    ', 'IOBA0001484', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL066-MedicalInsurance-1690971500.pdf', NULL, NULL, 'Panchgachhiya Saharsa', 'Panchgachhiya saharsa', NULL, NULL),
(38, 'EIPL/067', 'Gurugram', 'Female', '2019-07-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(39, 'EIPL/070', 'Gurugram', 'Male', '2019-07-04', 'Senior Executive ', '1995-02-06', 'BWYPR8599G', NULL, '100670860965    ', 'Indusind bank', '100042157907    ', 'INDB0000370', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' H.no 100 Gali no.4 Girdharpur Road Chhapraula Gaziabad', ' H.no 100 Gali no.4 Girdharpur Road Chhapraula Gaziabad', NULL, NULL),
(40, 'EIPL/071', 'Barakhamba', 'Male', '2019-07-12', 'Manager', '1988-10-10', 'CPXPK9218L', NULL, '101240289923    ', 'Standard Chartered Bank', '52215713946    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A 234, GR FLR, ABUL FAZAL PART 2, JAMIA NAGAR, OKHLA-110025', 'NEAR BRAINMART SCHOOL, MOH. QZI SARAI 1ST, NAGINA, BIJNOR, U.P-246762', NULL, NULL),
(41, 'EIPL/073', 'West Bengal', 'Male', '2019-10-01', 'Field Executive', '1991-02-16', 'BQCPB6475R', '1014572641', '101542403063    ', 'ICICI Bank', '39301559510    ', 'ICIC0001101', '64bf77a834919.jpg', '64bf77a83542b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL073-MedicalInsurance-1690971549.pdf', NULL, '', 'Vill+P.O.-Keshabpur Jalpai, P. S.- Mahishadal, District-Purba Medinipur, West Bengal, Pin-721628', 'Vill P.O.-Keshabpur Jalpai, P. S.- Mahishadal, District-Purba Medinipur, West Bengal, Pin-721628', '', ''),
(42, 'EIPL/077', 'Barakhamba', 'Male', '2019-09-02', 'Assistant Manager', '1986-04-14', 'OJVPS7333N', '1014572742', '101542387714    ', 'Standard Chartered Bank', '52215713180    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL077-MedicalInsurance-1690971611.pdf', NULL, '', 'HOME NUMER 497,STREET NO 10,SECTOR 9,SHIVPURI, NEW VIJAY NAGAR, GHAZIABAD,(UP) ', 'HOME NUMER 497,STREET NO 10,SECTOR 9,SHIVPURI, NEW VIJAY NAGAR, GHAZIABAD,(UP) ', '', ''),
(43, 'EIPL/082', 'Barakhamba', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(44, 'EIPL/083', 'Gurugram', 'Female', '2019-09-25', 'Executive ', NULL, 'GFTPS4003D', NULL, '101209795356    ', 'ICICI Bank', '7101563131    ', 'ICIC0000071', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'EIPL/084', 'Gurugram', 'Male', '2019-10-01', 'Senior Executive ', '1990-01-20', 'BWAPM1666B', NULL, '101202601059    ', 'Punjab National Bank', '4453000100049560    ', 'PUNB0445300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'D64 Street no.2 Laxmi Nagar Delhi', 'Defence Colony,Near Golju Temple Chandani Chauk Ghurdaura Naintal Uttrakhand 263139', NULL, NULL),
(46, 'EIPL/086', 'Barakhamba', 'Male', '2019-11-25', 'Assistant Manager ', '1997-02-15', 'CFQPA9380G', '1014572586', '100795324874    ', 'Punjab & Sind bank', '9801000005814    ', 'PSIB0020980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Village bass kushla, post bhangrola district gurgaon (Haryana) 122505', NULL, NULL, NULL),
(47, 'EIPL/087', 'Gurugram', 'Male', '2019-12-04', 'Senior Executive ', NULL, 'CADPK3981R', NULL, '100094858385    ', 'Deusthe bank', '400033276750019    ', 'DEUT0279PBC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'EIPL/089', 'Barakhamba', 'Male', '2019-10-07', 'Assistant Manager', '1998-01-01', 'DBAPD0728J', '1014572560', '101542387705    ', 'Canara Bank', '4188101003875    ', 'CNRB0004188', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL089-MedicalInsurance-1690971653.pdf', NULL, NULL, 'IMT MANESAR GURUGRAM SECTOR- 7 BASKUSHLA HARYANA 122505', 'VILL + POST RAMGARHA DISTT SIWAN 841244', NULL, NULL),
(49, 'EIPL/090', 'Gurugram', 'Male', '2019-12-22', 'Executive ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'EIPL/091', 'Tamil Nadu', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(51, 'EIPL/092', 'Barakhamba', 'Female', '2019-12-30', 'Manager', '1991-07-04', 'ALBPY1480E', NULL, '101552027139    ', 'Standard Chartered Bank', '52215713903    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106 D pocket A Mayur Vihar Phase 11 Delhi 110091', '106 D pocket A Mayur Vihar Phase 11 Delhi 110091', NULL, NULL),
(52, 'EIPL/093', 'Barakhamba', 'Female', '2020-01-18', 'Assistant Regional Manager', '1992-02-15', 'AQDPV1308B', NULL, '100645290695    ', 'Standard Chartered Bank', '52215715981    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL093-MedicalInsurance-1690971795.pdf', NULL, 'AB+', 'B-151,2nd Floor,Nehru Vihar,110054', 'Uttimpur,Hulasganj,dis-Jehanabad,Bihar-880047', '9810978842', 'Ravi'),
(53, 'EIPL/094', 'Gurugram', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(54, 'EIPL/097', 'Barakhamba', 'Female', '2020-02-10', 'Manager ', '0000-00-00', 'FFJPK8362E', NULL, '101324837592    ', 'Bank of India', '604010110022875    ', 'BKID0006040', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, NULL, NULL),
(55, 'EIPL/098', 'Gurugram', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(56, 'EIPL/099', 'Maharashtra', 'Male', '2020-11-01', 'Senior Field Executive', '1995-06-13', 'CFHPM3809M', '3413349799', '101545000997    ', 'Axis bank', '916010038469357    ', 'UTIB0000183', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL099-MedicalInsurance-1690971839.pdf', NULL, 'B-', '003,saraswati bldg, kashi complex, near holy angel school, dombivli east', '003,saraswati bldg, kashi complex,near holy angel school,dombivli east', '', ''),
(57, 'EIPL/100', 'Maharashtra', 'Male', '2020-11-01', 'Field Executive', '1996-06-01', 'CQRPM7868M', '1014572609', '101553461492    ', 'Bank of Baroda', '30110100006990    ', 'BARB0GENPUN', '64c4cd1acf971.pdf', '64c4cd1ad034e.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Plot no 32,Flat no 01, Erande Villa, Varadayini Society Sus Road Pashan Pune 411021', 'Plot no 32,Flat no 01, Erande Villa , Varadayini Society Sus Road Pashan Pune 411021', '7972036247', 'Kumar '),
(58, 'EIPL/102', 'Maharashtra', 'Male', '2020-02-01', 'Field Executive', '1996-02-01', 'BWVPR7863J', '1014579372', '101247185029    ', 'Central Bank Of India', '3391246786    ', 'CBIN0280635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL102-MedicalInsurance-1690971901.pdf', NULL, 'B+', 'Room no. 234, building no. 13/B, CGS colony , B sector , v.s. road , Bhandup east', 'Room no. 234, building no. 13/B, CGS colony , B sector , v.s. road , Bhandup east', '9987229302', 'Kunal Rampurkar'),
(59, 'EIPL/103', 'Gujarat', 'Male', '2019-07-21', 'Senior Field Executive', '1991-11-23', 'BOOPB2493D', '1014572633', '101545091786', '#NULL', '20343841525', 'SBIN0017900', '64ca0eb9ce7a1.pdf', '64ca0eb9cf272.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL103-MedicalInsurance-1690971948.pdf', NULL, 'O+', 'B-406, Saharsh Residency Nr. Sai chowk, Nava Naroda Ahmedabad-382330', 'B-406, Saharsh Residency Nr. Sai chowk, Nava Naroda Ahmedabad-382330', '8488877710', 'Ashaben'),
(60, 'EIPL/105', 'Odisha', 'Male', '2020-03-11', 'Field Executive', '1994-07-05', 'AVTPT3423A', '1014572646', '101577573444    ', 'Bank of India', '558810110001503    ', 'BKID0005588', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL105-MedicalInsurance-1690971978.pdf', NULL, '0+', 'Plot No- 685, Barmunda, Behind The Biju Pattnaik Field, Bhubaneswar-751003', 'At - Arilo, PO - Nurtang, Block - Mahanga, Cuttack, Odisha -754204', '', ''),
(61, 'EIPL/107', 'Barakhamba', 'Female', '2020-07-22', 'Associate Manager ', '1993-10-21', 'ATWPT8479M', NULL, '100980704726    ', 'ICICI Bank', '389001500676    ', 'ICIC0003890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'D-105, Chhattarpur Extension, New Delhi - 110074', 'D-105, Chhattarpur Extension, New Delhi - 110074', NULL, NULL),
(62, 'EIPL/108', 'Barakhamba', 'Female', '2020-08-17', 'General Manager ', '1988-04-19', 'AZQPP8539E', NULL, '100039913782    ', 'Standard Chartered Bank', '52215713873    ', 'SCBL0036020', '64c2189dd12c2.jpg', '64c2189dd1c47.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'F-1822,18TH FLOOR, TOWER F, GAUR SPORTSWOOD , NOIDA 201301, U.P.', 'A-78, Gurmandi, Near Rana Pratap Bagh, New Delhi-110007', '9811808800', 'MOHIT NAGWANI'),
(63, 'EIPL/109', 'Barakhamba', 'Male', '2020-08-02', 'Associate Manager ', '1991-12-21', 'APAPJ7228J', NULL, '101603193929    ', 'State Bank of India', '62497761478    ', 'SBIN0001578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Flat No - 304, Gali No - 2, Anmol Residency, Sarfabad, Sector - 73 Noida, 201301', 'Ward No - 11, Tola Durgapur, Panchgachia, Saharsa, Bihar - 852124', NULL, NULL),
(64, 'EIPL/110', 'Barakhamba', 'Male', '2020-08-02', 'Assistant Manager', '1997-01-19', 'KMYPS8922P', '1014565839', '101252263604    ', 'State Bank of India', '38036832164    ', 'SBIN0032182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A4 MBR ENCLAVE POCHANPUR SECTOR -23 DWARKA NEW DELHI-77', 'A4 MBR ENCLAVE POCHANPUR SECTOR -23 DWARKA NEW DELHI-77', NULL, NULL),
(65, 'EIPL/111', 'Barakhamba', 'Female', '2020-08-02', 'Manager', '1995-08-06', 'CCZPB3862Q', NULL, '101061620033    ', 'Standard Chartered Bank', '52215713962    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL111-MedicalInsurance-1690972021.pdf', NULL, 'A+', '346 B Nyay Khand 1 Indirapuram Ghaziabad Uttar Pradesh 201014', '346 B Nyay Khand 1 Indirapuram Ghaziabad Uttar Pradesh 201014', '9818546865', 'Geeta Bisht'),
(66, 'EIPL/112', 'Barakhamba', 'Female', '2020-08-24', 'Manager', '1996-09-17', 'KLVPS0011M', '1014566521', '101478178701    ', 'Standard Chartered Bank', '52215713881    ', 'SCBL0036020', '64c2526e8f6d8.pdf', '64c2526e90121.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', '3rd floor A-23 Rishi Nagar Rani Bagh Delhi - 110034', '3rd floor A-23 Rishi Nagar Rani Bagh Delhi - 110034', '9953296989', 'Nitin Sharma'),
(67, 'EIPL/113', 'Telangana', 'Male', '2020-09-14', 'Field Executive', '1989-11-18', 'AIEPN1480B', '1014565879', '101388099982    ', 'Andhra Bank', '68301505295    ', 'ANDB0000031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL113-MedicalInsurance-1690972039.pdf', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'EIPL/114', 'Barakhamba', 'Female', '2020-09-21', 'Assistant Manager', '1993-11-23', 'EVJPS7518R', NULL, '100543534435    ', 'ICICI Bank', '244501501570    ', 'ICIC0002445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NAVEEN PLACE, JHARODHA KALAN, NAJAFGARH NEW DELHI-110072', 'NAVEEN PLACE, JHARODHA KALAN, NAJAFGARH NEW DELHI-110072', NULL, NULL),
(69, 'EIPL/115', 'Barakhamba', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(70, 'EIPL/116', 'Barakhamba', 'Male', '2019-06-01', 'Executive ', '1983-07-01', 'BYBPS8977G', '1115604256', '101254660363    ', 'Standard Chartered Bank', '52215713830    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL116-MedicalInsurance-1690972060.pdf', NULL, NULL, 'B-160 B, Lajpat Nagar, Sahibabad, Ghaziabad,Uttar Pradesh 201005', 'B-160 B, Lajpat Nagar, Sahibabad, Ghaziabad,Uttar Pradesh 201005', NULL, NULL),
(71, 'EIPL/117', 'Barakhamba', 'Female', '2020-11-09', 'Assistant Manager', '1995-12-31', 'CPHPP8722E', NULL, '101642696054    ', 'Standard Chartered Bank', '52215713911    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lavanya Apartment Flat No. G-1 C Block Sector -62, Noida,Uttar Pradesh-201301', 'Vill Kaituka lachhi, Ketuka Lachchhi, Saran, Lachhi Kaituka, Bihar-841460', NULL, NULL),
(72, 'EIPL/118', 'Gurugram', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(73, 'EIPL/119', 'Barakhamba', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(74, 'EIPL/120', 'Barakhamba', 'Male', '2018-08-18', 'Executive ', '1991-02-21', 'ESMPK9918M', NULL, NULL, 'Standard Chartered Bank', '52215713342    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL120-MedicalInsurance-1690972201.pdf', NULL, NULL, 'H.No 139,CD,Bhoor Bhart Nagar,Railway Colony,Vijay Nagar, Ghaziabad,UP-201009', 'H.No 139,CD,Bhoor Bhart Nagar,Railway Colony,Vijay Nagar, Ghaziabad,UP-201009', NULL, NULL),
(75, 'EIPL/121', 'Barakhamba', 'Male', '2019-05-09', 'Assistant Manager', '1995-05-15', 'KJDPS8708H', NULL, '', 'Standard Chartered Bank', '52215715922    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL121-MedicalInsurance-1690972240.pdf', NULL, 'AB+', 'A-10 A BLOCK EAST VINODNAGAR NEW DELHI', 'VILLAGE-THUMARGAON, POST OFFICE-SINORA DISTRICT-ALMORA (UTTARAKHAND)', '', ''),
(76, 'EIPL/122', 'Barakhamba', 'Female', '2019-05-03', 'Manager ', '1995-01-11', 'CMIPP3556Q', NULL, NULL, 'Standard Chartered Bank', '52215715957    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H-262, Alpha 2 Greater Noida', 'H-262, Alpha 2 Greater Noida', NULL, NULL),
(77, 'EIPL/123', 'Barakhamba', 'Male', '2019-06-01', 'Manager', '1992-07-12', 'CBFPK0152D', NULL, NULL, 'State Bank of India', '32435122621    ', 'SBIN0000405', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H No. 211 - B, 4th Floor, Munirka Market, Munirka, South West Delhi, Delhi - 110067', 'H No. 31, Near Dr. Khan Clinic, Katni, Madhya Pradesh - 483501', NULL, NULL),
(78, 'EIPL/124', 'Barakhamba', 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(79, 'EIPL/125', 'Barakhamba', 'Male', '2021-01-01', 'Executive ', '1993-04-05', 'AYVPJ3656L', NULL, '100314134561    ', 'State Bank of India', '20159754265    ', 'SBIN0014296', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HOUSE NO.53A, GALI NO. 2,GOYAL COMPLEX, Badarpur, New Delhi-110044', 'Village- Hati (Sarisab-Pahi), P.S- Pandaul. Distt.- Madhubani, Bihar-847424', NULL, NULL),
(80, 'EIPL/126', 'Barakhamba', 'Male', '2021-02-01', 'Assistant Manager', '1996-07-20', 'BSPPA3051H', '1014580503', '101665839003    ', 'Standard Chartered Bank', '52215713288    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Indian Apartment B-73 Vikram Enclave Extn. Gaziyabad', 'MOhalla Sayyed Wara Nagina Distt. Bijnor U. P.', NULL, NULL),
(81, 'EIPL/127', 'Goa', 'Male', '2021-02-08', 'Field Executive ', '1992-10-24', 'CIFPG5414H', '1014584842', '101159721591    ', 'Bank of India', '100110110005296    ', 'BKID0001001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.NO-353,Mont Hill Margao, South Goa-403601', 'H.NO-353,Mont Hill Margao, South Goa-403601', NULL, NULL),
(82, 'EIPL/128', 'Barakhamba', 'Female', '2021-02-11', 'Assistant Manager', '1996-11-19', 'CZJPA1934R', NULL, '', 'Standard Chartered Bank', '52215713350    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O+', 'E-11/1 Paryavaran Complex Saket 110030', 'C-37/4 Sector 2 JNPT Township, Navi Mumbai 400707', '', ''),
(83, 'EIPL/129', 'Barakhamba', 'Female', '2021-02-22', 'Executive', '1993-04-28', 'ANBPV9965H', '1014584843', '101665838994    ', 'Standard Chartered Bank', '31780003217    ', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B.A- 20, Ansal Colony, Shastri Nagar, Meerut', 'B.A- 20, Ansal Colony, Shastri Nagar, Meerut', NULL, NULL),
(84, 'EIPL/130', 'West Bengal', 'Male', '2021-02-22', 'Field Executive ', '1981-04-05', 'ACCPH9285J', '1014585345', '101414312367    ', 'Bank of India', '403810110009807    ', 'BKID0004038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL130-MedicalInsurance-1690972291.pdf', NULL, '', '27/H/4 Gobra Gorosthan Road Kolkata -700046', '52/3A strand road kolkata -700006', '', ''),
(85, 'EIPL/131', 'Gurugram', 'Male', '2021-02-25', 'Executive ', '1988-03-13', 'CVDPK1456N', NULL, NULL, 'HDFC Bank', '50100333431060    ', 'HDFC0000044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Khera Afgan, Saharanpur, UP-247340', 'Khera Afgan, Saharanpur, UP-247340', NULL, NULL),
(86, 'EIPL/132', 'Gurugram', 'Male', '2021-03-15', 'Senior Executive ', '1992-06-15', 'BPQPB4482P', NULL, '100753662291    ', 'Axis bank', '915010057058166    ', 'UTIB0000007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'J-1/43 adarsh Nagar barra-1,Kanpur, Uttar Pradesh ', 'J-1/43 adarsh Nagar barra-1,Kanpur, Uttar Pradesh ', NULL, NULL),
(87, 'EIPL/133', 'Barakhamba', 'Female', '2021-03-15', 'Executive', '1997-07-15', 'NVUPS4526K', NULL, NULL, 'Bank Of India', '131710400029046    ', 'IBKL0001317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gandhi, Farukkhabad, Uttar Pradesh-209621', 'Gandhi, Farukkhabad, Uttar Pradesh-209621', NULL, NULL),
(88, 'EIPL/134', 'Barakhamba', 'Female', '2021-04-01', 'Executive ', NULL, 'DULPS4621F', NULL, '101058226555    ', 'Canara Bank', '1458131000332    ', 'CNRB0001458', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'EIPL/135', 'Assam', 'Male', '2021-06-01', 'Field Executive ', '1993-02-05', 'BIZPD9724N', NULL, NULL, 'Central Bank Of India', '3691126956    ', 'CBIN0284540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vill/Town No.1, Rawta Station, Udalguri, Assam?', 'Vill/Town No.1, Rawta Station, Udalguri, Assam?', NULL, NULL),
(90, 'EIPL/136', 'Jharkhand', 'Male', '2021-06-23', 'Executive ', '1982-03-15', 'BAQPM3051C', '1115875285', '101707065229    ', 'Punjab National Bank', '1090000100151980    ', 'PUNB0109000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL136-MedicalInsurance-1690972325.pdf', NULL, '', 'Sheo mangal mishra, boc colony, bhelwatand, churi,dakra colliery, Ranchi, jharkhand', 'Sheo mangal mishra, boc colony, bhelwatand, churi,dakra colliery, Ranchi, jharkhand', '8340464990', 'Abhay kumar Mishra '),
(91, 'EIPL/137', 'Barakhamba', 'Female', '2021-06-29', 'Manager', '1988-02-02', 'AXFPK4422L', NULL, '100620770581    ', 'Standard Chartered Bank', '52215715949    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15/18 C, MOTI NAGAR, NEW DELHI - 110015', '15/18 C, MOTI NAGAR, NEW DELHI - 110015', NULL, NULL),
(92, 'EIPL/138', 'Gurugram', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(93, 'EIPL/139', 'Barakhamba', 'Female', '2021-07-15', 'Executive', '1989-12-18', 'BLMPD8331H', NULL, '101713454875    ', 'ICICI Bank', '46101506598    ', 'ICIC0000461', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VPO NUNA MAJRA, TEHSIL - BAHADURGARH, DISTT. JHAJJAR, HARYANA, PIN CODE NO. 124507', 'VPO NUNA MAJRA, TEHSIL - BAHADURGARH, DISTT. JHAJJAR, HARYANA, PIN CODE NO. 124507', NULL, NULL),
(94, 'EIPL/140', 'Tamil Nadu', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL),
(95, 'EIPL/141', 'Haryana', 'Male', NULL, 'Field Executive ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'EIPL/142', 'Gurugram', 'Male', '2021-07-21', 'Executive ', '1982-01-25', 'ACCPY6815B', NULL, '100960121808    ', 'ICICI Bank', '344501500388    ', 'ICIC0003445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'EIPL/143', 'Barakhamba', 'Female', '2021-07-30', 'Executive', '1996-09-03', 'MYRPS7557R', '1115894580', '101713454881    ', 'Indian Bank', '7052919579    ', 'IDIB000T584', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E-88, Yadav nagar, samaypur badli, north west delhi-110042', 'E-88, Yadav nagar, samaypur badli, north west delhi-110042', NULL, NULL),
(98, 'EIPL/144', 'Barakhamba', 'Female', '2021-08-02', 'Executive ', '1992-02-20', 'BKWPB3985L', NULL, '101724381130    ', 'Punjab National Bank', '4867001500013210    ', 'PUNB0486700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '121/1 PUSHP VIHAR NEW DELHI', '121/1 PUSHP VIHAR NEW DELHI SAKET', NULL, NULL),
(99, 'EIPL/145', 'Gurugram', 'Female', '2021-08-13', 'Executive ', NULL, 'ASQPG7580H', NULL, '101569222312    ', 'HDFC bank', '50100321592532    ', 'HDFC0000093', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'EIPL/146', 'Barakhamba', 'Male', NULL, 'Driver', '1985-08-09', NULL, '1115905931', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'EIPL/147', 'Barakhamba', 'Male', '2021-09-01', 'Executive', '1995-07-02', NULL, '1115910040', '101388722316    ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'EIPL/148', 'Haryana', 'Male', '2021-09-01', 'Field Executive ', '2000-02-18', NULL, '1115910057', '101738022326    ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'EIPL/149', 'West Bengal', 'Male', '2021-09-01', 'Senior Field Executive', '1982-01-01', 'FMTPM1802A', '1115905864', '101738041925    ', 'Indian Bank?', '6662029911    ', 'IDIB000G003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Madhyahizia, Kinkarbali Hooghly, West Bengal-712407', 'Madhyahizia, Kinkarbali Hooghly, West Bengal-712407', NULL, NULL),
(104, 'EIPL/150', 'Gurugram', 'Male', '2021-09-03', 'Executive', '1993-01-03', 'ATBPN6391H', NULL, '101738025623    ', 'State Bank Of India', '32996135845    ', 'SBIN0000645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Khera dawat colony, near shiv vatika gurgaon, haryana-122001', 'Khera dawat colony, near shiv vatika gurgaon, haryana-122001', NULL, NULL),
(105, 'EIPL/151', 'Gurugram', 'Male', '2021-09-04', 'Executive', '1990-03-12', 'GMMPS8574K', NULL, '100292557993    ', 'HDFC Bank', '50100243303762    ', 'HDFC0003878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '36, Basai, Tundla, Firozabad, Uttar pradesh,283204', '36, Basai, Tundla, Firozabad, Uttar pradesh,283204', NULL, NULL),
(106, 'EIPL/152', 'Gurugram', 'Male', '2021-09-09', 'Executive', '1994-08-16', NULL, NULL, '101510895195    ', 'ICICI Bank', '8701049473    ', 'ICIC0000087', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'EIPL/153', 'Gurugram', 'Male', '2021-10-05', 'Executive', '1989-01-17', 'AVTPD2991F', NULL, '101749054941    ', 'Kotak Bank', '2445438417    ', 'KKBK0004659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F 1/U 139, Pitam Pura, North West Delhi 110034', 'F 1/U 139, Pitam Pura, North West Delhi 110034', NULL, NULL),
(108, 'EIPL/154', 'Barakhamba', 'Female', '2021-10-14', 'Assistant Manager', '1991-09-01', 'BFPPR4772H', NULL, '100580437532    ', 'Standard Chartered Bank', '52215713970    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL154-MedicalInsurance-1690871062.pdf', NULL, 'A+', 'H.No-49/16,Third Floor, Ashok Nagar,Tilak Nagar-110018', 'H.no-KC-7, Chandanvan Phase 1, Mathura Cantt, U.P ', '7417833802', 'Gulab Singh'),
(109, 'EIPL/155', 'Gurugram', 'Male', '2021-10-25', 'Executive', '1995-01-01', 'GUQPK3085K', NULL, '101363747395?', 'ICICI Bank', '50901523282    ', 'ICIC0000509', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1/175, Housing Board, Ward No - 19, Bhiwadi, Alwar- 301019', '1/175, Housing Board, Ward No - 19, Bhiwadi, Alwar- 301019', NULL, NULL),
(110, 'EIPL/156', 'Gurugram', 'Male', '2021-11-09', 'Executive', '1987-07-03', 'BEVPK2431R', NULL, '100221550297    ', 'ICICI Bank', '113301504728    ', 'ICIC0001133', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 13,Gali no 1, Near meerut Road, Ghookna More, Ghaziabad, Ghaziabad,UP-201001', 'H.no 13,Gali no 1, Near meerut Road, Ghookna More, Ghaziabad, Ghaziabad,UP-201001', NULL, NULL),
(111, 'EIPL/157', 'Maharashtra', 'Male', '2021-12-21', 'Field Executive ', '1992-12-15', 'ADFPW8178B', '1115973390', '101253608020    ', 'State Bank of India', '20244623279    ', 'SBIN0017637', '64bfc65785673.jpg', '64bfc657860a3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Plot no. 20, Near Vande Matram College, Avdhut Nagar, Manewada Nagpur-440034', '20,Awdhoot Nagar,Manewada,Besa, Mhalginagar,Nagpur, Maharashtra 440034', '8055151292', 'Praful waghmare'),
(112, 'EIPL/158', 'Gurugram', 'Female', '2021-11-15', 'Executive', '1986-03-11', 'AXQPR6600N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'The Coralwood, C 703, Sector 84 , Gurgaon', '196,Block A,Moti Bagh, Sounth Moti Nagar, Moti Bagh Delhi , CanttSouth West Delhi-110021', NULL, NULL),
(113, 'EIPL/159', 'Barakhamba', 'Male', '2021-11-15', 'Executive', '2001-10-02', 'EROPR6187Q', '1115944849', '101757324032    ', 'Standard Chartered Bank', '52215713334    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RC -601,Pratap Vihar Khora Colony,Khora,Gutuam Budh Nagar 201309', 'RC -601,Pratap Vihar Khora Colony,Khora,Gutuam Budh Nagar 201309', NULL, NULL),
(114, 'EIPL/160', 'Barakhamba', 'Male', '2021-11-23', 'Executive', '1996-07-05', 'HGRPS2261H', NULL, '101453255391    ', 'Bank Of Baroda', '21420100017037    ', 'BARB0TRDAZA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G-13,Gali no-1, Swami Sharadanand Park, Bhalsawa dairy, North West Delhi - 110042', 'G-13,Gali no-1, Swami Sharadanand Park, Bhalsawa dairy, North West Delhi - 110042', NULL, NULL),
(115, 'EIPL/161', 'Gurugram', 'Female', '2021-11-22', 'Executive', '1999-11-19', 'CGNPB5539A', '1115949634', '101757327999    ', 'State Bank Of India', '33829959143    ', 'SBIN0004326', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.NO 381,Sector 15 Vasundhar, Ghaziabad.U.P 201012', 'H.NO 381,Sector 15 Vasundhar, Ghaziabad.U.P 201012', NULL, NULL),
(116, 'EIPL/300', 'Barakhamba', 'Male', '2021-11-01', 'General Manager', '1977-12-08', 'AKUPK6856A', NULL, NULL, 'Standard Chartered Bank', '62210427221    ', 'SCBL0036022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T-15, 1203,Nirala Estate,GH-4, Tech Zone-IV,Greater Noida (West)', '154,D-1,Surya Vihar,Kheora Banger,Kanpur-208002', NULL, NULL),
(117, 'EIPL/162', 'Gurugram', 'Male', '2021-12-20', 'Executive', '1991-04-04', 'BNQPD8497L', NULL, '101364750757    ', 'Punjab National Bank', '894000101440685    ', 'PUNB0089400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ward N-4 Village Dhugiari Post Office Gaggal The Kangra, H.P - 176209', '208, Manimajra town Chandigarh 160101', NULL, NULL),
(118, 'EIPL/163', 'Barakhamba', 'Male', '2021-12-13', 'Senior Executive', '1998-09-10', 'EILPP3420C', '6718511784', '101480386335    ', 'Standard Chartered Bank', '52215713954    ', 'SCBL0036020', '64c24fdd8da0b.jpg', '64c24fdd8e350.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O+', 'C-201,Vistaar Colony,Abhay Khand-1,Indirapuram,Ghaziabad', 'C-201,Vistaar Colony,Abhay Khand-1,Indirapuram,Ghaziabad', '8287344100', 'Jatin'),
(119, 'EIPL/164', 'Barakhamba', 'Female', '2021-12-20', 'Senior Executive ', '1988-07-28', 'BXCPS4388D', NULL, '101769966840    ', 'Standard Chartered Bank', '52215723070    ', 'SCBL0036020', '64bf923d81eed.jpeg', '64bf923d827f7.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'A-81, Sukhdev Nagar,Kotla Mubarakpur,New Delhi 110003', 'A-81, Sukhdev Nagar,Kotla Mubarakpur,New Delhi 110003', '9899542085', 'Amit Chhabra'),
(120, 'EIPL/165', 'Barakhamba', 'Female', '2021-12-27', 'Senior Executive', '1996-12-15', 'HCZPS2803B', '1115975148', '101769966838    ', 'Standard Chartered Bank', '52215713261    ', 'SCBL0036020', '64c4dcd3e8267.pdf', '64c4de31893bc.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A+', '12/298 DDA Flats Madangir,Dr. Ambedkar Nagar, New Delhi 110062', '12/298 DDA Flats Madangir,Dr. Ambedkar Nagar, New Delhi 110062', '', ''),
(121, 'EIPL/166', 'Barakhamba', 'Male', '2021-12-27', 'Senior Executive', '1997-11-04', 'GDSPS9762N', '1115975159', '101769966394    ', 'Standard Chartered Bank', '52212193402    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'A-4/474 EAST GOKALPUR AMAR COLONY DELHI-110094', 'A-4/474 EAST GOKALPUR AMAR COLONY DELHI-110094', '', ''),
(122, 'EIPL/167', 'Gurugram', 'Male', '2021-12-27', 'Executive', '1992-06-05', 'GZHPS2317L', '1115979713', '101304012556    ', 'Ujjivan Small Finance Bank', '2240110010051650    ', 'UJVN0002240', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31A/1 Dass Garden Barpola, Najafgarh, Delhi, PIN 110043,Delhi ', '31A/1 Dass Garden Barpola, Najafgarh, Delhi, PIN 110043,Delhi ', NULL, NULL),
(123, 'EIPL/168', 'Gurugram', 'Male', '2021-12-27', 'Executive', '1997-04-22', 'GSMPS5125J', NULL, NULL, 'UCO Bank', '20370110049273    ', 'UCBA0002037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H/16/96 SANGAM VIHAR NEW DELHI - 110080', 'H/16/96 SANGAM VIHAR NEW DELHI - 110080', NULL, NULL),
(124, 'EIPL/169', 'Barakhamba', 'Male', '2022-01-12', 'Executive', '1996-03-23', 'BPCPC1417D', NULL, '101780534972    ', 'Axis Bank', '921010029890164    ', 'UTIB0000208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'E-102,J.J Colony Wazirpur, Ashok Vihar, North West, Delhi Delhi 110052', 'E-102,J.J Colony Wazirpur, Ashok Vihar, North West, Delhi Delhi 110052', NULL, NULL),
(125, 'EIPL/170', 'Gurugram', 'Male', '2022-01-17', 'Executive', '1995-11-27', 'ENWPK8036H', NULL, '101783330781    ', 'Punjab National Bank', '7989000100048300    ', 'PUNB0798900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T A-63-64 Gali no 5, Om Vihar, Shukkar Bazar, Uttam Nagar, D.K Mohan Garden West Delhi -110059', 'T A-63-64 Gali no 5, Om Vihar, Shukkar Bazar, Uttam Nagar, D.K Mohan Garden West Delhi -110059', NULL, NULL),
(126, 'EIPL/171', 'Gurugram', 'Female', '2022-01-17', 'Executive', '1994-10-11', 'DELPD1138G', NULL, '101780534986    ', 'State Bank of India', '20311234596    ', 'SBIN0005226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10-A/2 Hindustan Times Apartment?Mayur Vihar Phase-1 Delhi-110091', 'H.No-212, Shakti Khand-1,Indirapuram, Shipra Sun City, Ghaziabad, UP-201014', NULL, NULL),
(127, 'EIPL/172', 'Gurugram', 'Female', '2022-01-24', 'Executive', '1994-06-25', 'BLHPB8301C', NULL, '100204168230    ', 'HDFC Bank', '2831140187221    ', 'HDFC0000283', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dungarpur,Halduchour Lalkaun, Halduchaur, Nanital, Uttarkand-263139', 'Dungarpur,Halduchour Lalkaun, Halduchaur, Nanital, Uttarkand-263139', NULL, NULL),
(128, 'EIPL/173', 'Barakhamba', 'Male', '2022-02-09', 'Senior Executive', '1995-05-20', 'EVKPK5743M', NULL, '101790564173    ', 'Standard Chartered Bank', '52215713857    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL173-MedicalInsurance-1690972381.pdf', NULL, NULL, 'N-28/F-392,Wazirpur CSA Colony, Delhi-110052', 'N-28/F-392,Wazirpur CSA Colony, Delhi-110052', NULL, NULL),
(129, 'EIPL/174', 'Barakhamba', 'Female', '2022-02-09', 'Executive', '1999-08-23', 'JCUPS7665L', '115999933', '101790564173    ', 'State Bank of India', '38271085949    ', 'SBIN0011564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'H.no 257 Mangapuri Phase -1 Palam Palam Village S.O South West Delhi, Delhi-110045', 'H.no 257 Mangapuri Phase -1 Palam Palam Village S.O South West Delhi, Delhi-110045', '', ''),
(130, 'EIPL/175', 'Barakhamba', 'Male', '2022-02-15', 'Assistant Manager', '1995-02-15', 'DDMPK3550D', NULL, '101790564194    ', 'Standard Chartered Bank', '52215715930    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'RSVF 11,Katwaria Sarai,Haus Khas, Delhi,110016', 'C/o Sri Surender Narayan Singh, Gandhi Nagar, Ishakchak, Bhagalpur, Bihar,812001', '', ''),
(131, 'EIPL/176', 'Noida', 'Male', '2022-02-21', 'Senior Executive', '1981-10-02', 'DXGPS20291H', NULL, '100418262597    ', 'HDFC Bank', '50100061586851    ', 'HDFC0002563', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 284, Sarojini Colony,Yamuna Nagar, Jagadhari Yamuna Nagar, Haryana 135001', 'H.no 284, Sarojini Colony,Yamuna Nagar, Jagadhari Yamuna Nagar, Haryana 135001', NULL, NULL),
(132, 'EIPL/177', 'Gurugram', 'Male', '2022-02-21', 'Assistant Manager', '1980-01-19', 'ASPPR2339N', NULL, '100060344674    ', 'State Bank of India', '33237994929    ', 'SBIN0012610', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'H.no 35, Village-Kund. Kunr, Rohtas,Bihar-802213', NULL, NULL),
(133, 'EIPL/178', 'Gurugram', 'Male', '2022-03-09', 'Executive', '1992-12-12', 'ACXPI1367B', NULL, '101803028475    ', 'The Federal Bank Limited', '16770100025568    ', 'FDRL0001677', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vill. Girdhapur, Baheri, Bareilly, Uttar Pradesh-243203', 'H.no - M-65/2, Third Floor, Batla House, Jamia Nagar Okhla, New Delhi 110025', NULL, NULL),
(134, 'EIPL/179', 'Madhya Pradesh', 'Male', '2022-03-10', 'Field Executive ', '1994-12-26', 'BQPPR9389R', '1116020271', '101378571229    ', 'Axis Bank', '918010049326759    ', 'UTIB0000462', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '58-A Naveen Nagar Aishbagh Near Bhopal Academy School?-462010', 'H.no 24,Gram-Kaandra Khedi, Ward no-3, Post-saval Kheda, Kandra Kedi,Hoshangabad, Madhya Pradesh-461001', NULL, NULL),
(135, 'EIPL/180', 'Barakhamba', 'Female', '2022-03-21', 'General Manager', '1984-06-05', 'AIVPM2236M', NULL, NULL, 'Standard Chartered Bank', '52215722880    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.No-689, New Friends Colony,New Delhi-110025', 'H.No-689, New Friends Colony,New Delhi-110025', NULL, NULL),
(136, 'EIPL/181', 'Assam', 'Male', '2022-03-28', 'Field Executive ', '1985-03-22', 'AGWPN3436B', '4301511407', '101228735939    ', 'State Bank of India', '20003426902    ', 'SBIN0006196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL181-MedicalInsurance-1690972436.pdf', NULL, 'O+', 'H.no 8, Gopal Nagar, Lakhyadhar Choudhary, Path, Noonmati, Kamrup Metro, Assam-781020', 'H.no 8, Gopal Nagar, Lakhyadhar Choudhary, Path, Noonmati, Kamrup Metro, Assam-781020', '7086750195', 'Preetyshikha Kalita'),
(137, 'EIPL/182', 'Barakhamba', 'Male', '2022-04-20', 'Executive', '1995-04-08', 'BLHPG3401N', '1116042280', '101263795815    ', 'Standard Chartered Bank', '52215713997    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '759, 3rd Floor, Gali Mehtab Rai,Kundewalan, Ajmeri Gate.', '759, 3rd Floor, Gali Mehtab Rai,Kundewalan, Ajmeri Gate.', NULL, NULL),
(138, 'EIPL/183', 'Karnataka', 'Male', '2022-05-09', 'Field Executive ', '1978-01-01', 'DOUPS8508L', '5040617975', '100913384538    ', 'Yes Bank', '65991900016950    ', 'YESB0000659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no- 42, Janatha Colony, Chikkanagamangala,Huskur,Bangalore,Anekal,Karnataka,560099', 'H.no- 42, Janatha Colony, Chikkanagamangala,Huskur,Bangalore,Anekal,Karnataka,560099', NULL, NULL);
INSERT INTO `emp_info` (`emp_info_id`, `emp_id`, `emp_work`, `emp_gender`, `emp_join`, `emp_des`, `dob`, `emp_pan`, `emp_esic`, `emp_uan`, `emp_bank`, `emp_acc`, `emp_ifsc`, `aadhar_doc`, `pan_doc`, `offer_letter`, `salary_annexure`, `appointment_letter`, `confirmation_letter`, `increment_letter`, `relieving_letter`, `medical_insurance`, `accidental_insurance`, `emp_blood`, `current_address`, `permanent_address`, `relative_mobile`, `relative_name`) VALUES
(139, 'EIPL/184', 'Tamil Nadu', 'Male', '2022-05-09', 'Field Executive ', '1993-12-24', 'ACKPE4094L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 26/14,Kamarajar Nagar, 2nd Street, Choolaimedu,Chennai, Tamil Nadu-600094', 'H.no 26/14,Kamarajar Nagar, 2nd Street, Choolaimedu,Chennai, Tamil Nadu-600094', NULL, NULL),
(140, 'EIPL/185', 'Gurugram', 'Male', '2022-05-23', 'Senior Executive ', '1991-06-28', 'BJTPG8672F', NULL, '101823311166    ', 'Axis Bank', '913010033741666    ', 'UTIB0000055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 72/2,Krishna Kunj Extension,Part-1, Laxmi Nagar, Delhi, Shakarpur,East Delhi,Delhi-110092', 'H.no 72/2,Krishna Kunj Extension,Part-1, Laxmi Nagar, Delhi, Shakarpur,East Delhi,Delhi-110092', NULL, NULL),
(141, 'EIPL/186', 'Barakhamba', 'Female', '2022-06-08', 'Executive', '1979-05-13', 'AFLPV0500L', NULL, NULL, 'State Bank of India', '51100577745    ', 'SBIN0050303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 12,Old Compound, Mandi House, New Delhi-110001', 'H.no 12,Old Compound, Mandi House, New Delhi-110001', NULL, NULL),
(142, 'EIPL/187', 'Barakhamba', 'Male', '2022-07-12', 'Executive', '1997-06-22', 'CLVPB9190A', '1116094514', '101851487196    ', 'Standard Chartered Bank', '52215714063    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Block 2, Gali no 8,Sangam Vihar, New Delhi,110080', 'Vill-Era, Post Era(Barakham), Tehsil-Duaramt, Dist Almora,UK-263653', NULL, NULL),
(143, 'EIPL/188', 'Barakhamba', 'Female', '2022-08-16', 'Executive', '1997-01-31', 'DXJPA1870B', NULL, '', 'Standard Chartered Bank', '52215713865    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A+', '1222, Sector 16, Faridabad 121002', 'H.no-79,Shamshabad Road, Chamroli Kaveri Vihar Phase 2, Agra, UP-282001', '', ''),
(144, 'EIPL/189', 'Barakhamba', 'Male', '2022-08-25', 'Executive', '1997-07-05', 'CXAPA5357D', '1116115938', '101571310277    ', 'Standard Chartered Bank', '52215715965    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'H.no-RZ-3,Gali No-3,Deep Enclave Part-2,Vikas Nagar,Uttam Nagar,New Delhi-110059', 'H.no-RZ-3,Gali No-3,Deep Enclave Part-2,Vikas Nagar,Uttam Nagar,New Delhi-110059', '', ''),
(145, 'EIPL/190', 'Barakhamba', 'Female', '2022-08-26', 'Executive', '2000-12-27', 'BVOPN6560L', '1116115959', '101837954192    ', 'Standard Chartered Bank', '52215715973    ', 'SCBL0036020', '64ca882cdc7eb.jpg', '64ca882cdde4e.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O+', 'B-505 3rd Floor Dakshinpuri Ambedkar Nagar New Delhi -110062', 'B-505 3rd Floor Dakshinpuri Ambedkar Nagar New Delhi -110062', '', ''),
(146, 'EIPL/191', 'Barakhamba', 'Female', '2022-09-05', 'Executive', '2000-09-01', 'EGZPB6049D', NULL, '101780343503    ', 'Standard Chartered Bank', '52215714004    ', 'SCBL0036020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RZH-639B, Street no. 16 Raj Nagar Part-2 Palam Colony New Delhi- 110077', 'RZH-639B, Street no. 16 Raj Nagar Part-2 Palam Colony New Delhi- 110077', NULL, NULL),
(147, 'EIPL/192', 'Tamil Nadu', 'Male', '2022-09-15', 'Field Executive ', '1997-06-04', 'CDMPG0783R', NULL, NULL, 'State Bank of India', '39783056282    ', 'SBIN0000063', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sharavathi Apartments, Roopena Agrahara, Bommanahalli, Bengaluru, Karnataka 560068', '61 Gandhi Road,Near Telephone Exchange, Darjeeling, West Bengal-734101', NULL, NULL),
(148, 'EIPL/193', 'Karnataka', 'Male', '2022-09-15', 'Field Executive ', '1978-01-01', 'DOUPS8508L', '5040617975', '100913384538    ', 'Yes Bank', '65991900016950    ', 'YESB0000659', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0+', 'H.no- 42, Janatha Colony, Chikkanagamangala,Huskur,Bangalore,Anekal,Karnataka,560099', 'H.no- 42, Janatha Colony, Chikkanagamangala,Huskur,Bangalore,Anekal,Karnataka,560099', '9632875549', 'Kavitha'),
(149, 'EIPL/194', 'Gurugram', 'Male', '2022-10-17', 'Senior Executive', '1987-03-03', 'CKEPK1681H', NULL, '100597498471    ', 'State Bank Of India', '20146416833    ', 'SBIN0003245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL194-MedicalInsurance-1690972456.pdf', NULL, NULL, 'A-450, Gali No. D-33, Molarband Extension, Badarpur, New Delhi-110044', 'A-31,Basantpur Road, Vishnu Enclave, Panschsheel Colony-2, Sector-91, Faridabad,Haryana-121013', NULL, NULL),
(150, 'EIPL/195', 'Tamil Nadu', 'Male', '2022-11-07', 'Field Executive ', '1990-06-04', 'AIJPT2254L', '1116155610', '101891091869    ', 'Bank of Baroda', '11280100022992    ', 'BARB0VEPANA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '4/1181,Muslimpur, Mathepalli, Krishnagiri,Tamil Nadu 635121', '4/1181,Muslimpur, Mathepalli, Krishnagiri,Tamil Nadu 635121', '', ''),
(151, 'EIPL/196', 'Barakhamba', 'Male', '2022-11-10', 'Executive', '1996-02-07', 'FCLPM8807F', '1116156784', '101895417140    ', 'Punjab National Bank', '2952000100251890    ', 'PUNB0295200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RZB-2,Pantu 2, Sitapuri New Delhi-110045', 'Mahuli, P/s traiya, Agauthar Sundar, Saran, Bihar, 841418', NULL, NULL),
(152, 'EIPL/197', 'Gurugram', 'Female', '2022-11-10', 'Executive', '1994-03-20', 'KQTPS5744G', NULL, '101483280159    ', 'HDFC Bank', '50100456470589    ', 'HDFC0000553', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rzf 988/17, flat no. 101, swastik apartment, Ambedkar marg, Rajnagar part-2, Palam colony, Delhi - 110077', 'Ward-2,Ateli(Rural)(21), Mandi Ateli, Mahendragarh Haryana, 123021', NULL, NULL),
(153, 'EIPL/198', 'Barakhamba', 'Female', '2022-11-14', 'Senior Executive', '1992-02-20', 'BKWPB3985L', NULL, '101724381130    ', 'Punjab National Bank', '4867001500013210    ', 'PUNB0486700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Flat No. SF-2, 3rd Floor, B-77, Gali No. 11, Sewak Park, Dwarka Delhi - 110059', '54/4,Pushp Vihar Sec-1, Malviya Nagar S.O, South Delhi, Delhi-110017', NULL, NULL),
(154, 'EIPL/199', 'Barakhamba', 'Female', '2022-11-14', 'Business Development Executive', '1998-04-24', 'DXYPB7301F', NULL, '101487789060    ', 'State Bank of India', '37920668402    ', 'SBIN0005100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bhandari PG B1/43 Gali no.3, Near Malik gym, New Ashok Nagar New Delhi 110096', 'Vikas Nagar Road Phase 3, Kusumkera, Haripur Nayak, Uttarakhand,263139', NULL, NULL),
(155, 'EIPL/200', 'Karnataka', 'Male', '2022-11-23', 'Field Executive ', '1988-04-30', 'DHMPR3230K', NULL, '100615025741    ', 'HDFC Bank', '50100112273375    ', 'HDFC0004082', '64c6074457a6a.jpeg', '64c607445846f.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL200-MedicalInsurance-1690972507.pdf', NULL, '', '8,Chamundi Layout, Near Chamuneshwari Temple,Kattigenahalli, Yelahanka Post,Kattigenahalli,Bengaluru,Katnataka-550064', '8,Chamundi Layout, Near Chamuneshwari Temple,Kattigenahalli, Yelahanka Post,Kattigenahalli,Bengaluru,Katnataka-550064', '', ''),
(156, 'EIPL/201', 'Karnataka', 'Male', '2022-12-01', 'Field Executive ', '1990-04-05', 'ANKPV8006C', NULL, NULL, 'Kotak MahindraBank', '4213066600    ', 'KKBK0008054', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no-462 Old no 168, Hennur Cross,Sonnappa Layout, Bangalore, Karnataka 560043', 'H.no-462 Old no 168, Hennur Cross,Sonnappa Layout, Bangalore, Karnataka 560043', NULL, NULL),
(157, 'EIPL/202', 'Barakhamba', 'Male', '2022-12-13', 'Java Developer', '1998-06-08', 'GVDPK6786D', NULL, '101905698853    ', 'Standard Chartered Bank', '1226000103178030    ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Govindpuri  colony  South East Delhi.  Kalkaji, Chittaranjan Park, Gali no 6,New Delhi 110019', 'Gram -Basadiha, Post-Urdina, Thana-Barun,Urdina,Aurangabad,Barun, Bihar-824112', NULL, NULL),
(158, 'EIPL/203', 'Gurugram', 'Male', '2022-12-22', 'Executive', '1991-03-14', 'BPQPP4313H', NULL, '101905698848    ', 'Bank of Baroda', '7870100027190    ', 'BARB0SECFAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.No-E-510,SGM Nagar,Sharma Chowk, Faridabad, Haryana -121001', 'H.No-E-510,SGM Nagar,Sharma Chowk, Faridabad, Haryana -121001', NULL, NULL),
(159, 'EIPL/204', 'Gurugram', 'Male', '2022-12-22', 'Executive', '1995-08-15', 'CHZPB4414P', NULL, '101905698869    ', 'Punjab & Sind bank', '3361000079882    ', 'PSIB0000336', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.NO 208,Haddu Mohalla, Madanpur Khadar,Sarita Vihar. S.O South Delhi, Delhi-110076', 'H.NO 208,Haddu Mohalla, Madanpur Khadar,Sarita Vihar. S.O South Delhi, Delhi-110076', NULL, NULL),
(160, 'EIPL/205', 'Karnataka', 'Female', '2023-01-16', 'Senior Executive', '1984-07-31', 'ANQPV6859F', NULL, NULL, 'ICICI Bank', '107601501454    ', 'ICIC0001076', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.No Sudhama,Chikkansal Road, Kundapura,Upudi,Karnataka-576201', 'H.No Sudhama,Chikkansal Road, Kundapura,Upudi,Karnataka-576201', NULL, NULL),
(161, 'EIPL/206', 'Barakhamba', 'Male', '2023-01-17', 'Executive', '1988-03-01', 'HBTPK4919R', NULL, '101914559749    ', 'Canara Bank', '1100530144664    ', 'CNRB0000348', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL206-MedicalInsurance-1690972578.pdf', NULL, 'o+', 'F-235 Pandit Mohalla Tekhand, Okhla Phase 1, New Delhi-110020', 'F-235 Pandit Mohalla Tekhand, Okhla Phase 1, New Delhi-110020', '', ''),
(162, 'EIPL/207', 'Chhattisgarh', 'Male', '2023-01-18', 'Field Executive ', '1996-07-21', 'AOOPY7306P', NULL, '100877410997    ', 'Punjab National Bank', '20692191009807    ', 'PUNB0206910', '64bf9c2712158.jpg', '64bf9c2712a59.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL207-MedicalInsurance-1690972637.pdf', NULL, 'A+', 'H.no-115,Ward No -06, Ausar,Durg, Chattisgarh-491223', 'H.no-115,Ward No -06, Ausar,Durg, Chattisgarh-491223', '8085821259', 'Lubham banchhor '),
(163, 'EIPL/208', 'Barakhamba', 'Male', '2023-02-01', 'Executive', '1993-06-17', 'BISPA4511P', NULL, NULL, 'Kotak Mahindra Bank', '346926408    ', 'KKBK0000958', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no-526, Goverdhan Gate, Gavdua Gali Purana Shahar, Vrindavan, Mathura-281121', 'H.no-526, Goverdhan Gate, Gavdua Gali Purana Shahar, Vrindavan, Mathura-281121', NULL, NULL),
(164, 'EIPL/209', 'Barakhamba', 'Female', '2023-02-07', 'Management Trainee', '1997-12-04', 'ADRPE2938D', '1116202618', '101924124200    ', 'Canara Bank', '4889101013682    ', 'CNRB0004889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'o+', 'H.no 85-A, Rajender Park, Bakkar Wala, West Delhi,Delhi-110041', 'H.no 85-A, Rajender Park, Bakkar Wala, West Delhi,Delhi-110041', '', ''),
(165, 'EIPL/210', 'Barakhamba', 'Male', '2023-02-23', 'Senior Executive', '1992-03-06', 'BTPPR1507L', NULL, '100320045372    ', 'Union Bank Of India', '623002010002333    ', 'UBIN0562301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL210-MedicalInsurance-1690972662.pdf', NULL, NULL, 'H.no D-161,Gauri Shankar Enclave, Prem Nagar-3,Kirari, Delhi 110086', 'H.no D-161,Gauri Shankar Enclave, Prem Nagar-3,Kirari, Delhi 110086', NULL, NULL),
(166, 'EIPL/211', 'Barakhamba', 'Male', '2023-03-01', 'Full Stack Developer', '2000-09-10', 'HUZPK5195L', '', '101934871083    ', 'Punjab National Bank', '4038000100201930    ', 'PUNB0403800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B+', 'H.no-183, Uncha Mohalla Kaseru Khera, Meerut,UP-250001', 'H.no-183, Uncha Mohalla Kaseru Khera, Meerut,UP-250001', '', ''),
(167, 'EIPL/212', 'Barakhamba', 'Male', '2023-03-13', 'Executive', '2000-04-18', 'DBUPA8291P', NULL, '101414062250    ', 'Kotak Mahindra Bank ', '1914072428    ', 'KKBK0000261', '64c34cbaf0e36.pdf', '64c34cbaf18ad.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O+', 'C-334,Shiv Vihar,JJ Colony(Hastsal) Utaam Nagar, New Delhi-110059', 'C-334,Shiv Vihar,JJ Colony(Hastsal) Utaam Nagar, New Delhi-110059', '8376851822', 'Aman'),
(168, 'EIPL/213', 'Barakhamba', 'Female', '2023-03-14', 'Business Development Executive', '1994-07-18', 'EYVPS3452M', '1116219543', '101934871077    ', 'Kotak Mahindra Bank ', '1413343180    ', 'KKBK0004608', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL213-MedicalInsurance-1690972698.pdf', NULL, 'O +', 'H.no-573/8,Street no 4, Vijay Park, Maujpur,New Delhi -110053', 'H.no-573/8,Street no 4, Vijay Park, Maujpur,New Delhi -110053', '', ''),
(169, 'EIPL/214', 'Barakhamba', 'Male', '2023-03-16', 'Senior Executive', '1999-09-29', 'JZWPS8829F', NULL, '101934871096    ', 'IDBI Bank ', '413104000076465    ', 'IBKL0000413', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 34, Shastri Nagar, Street-12, New Delhi-110052', 'H.no 34, Shastri Nagar, Street-12, New Delhi-110052', NULL, NULL),
(170, 'EIPL/215', 'Gurugram', 'Male', '2023-04-01', 'Executive ', '1991-08-10', 'CFOPK6892M', NULL, '100486939564    ', 'Punjab National Bank ', '1839000400228140    ', 'PUNB0183900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A+', 'H.no L-27B, AvasVIkas Colony, Badaun, Uttar Pradesh - 243601', 'H.no L-27B, AvasVIkas Colony, Badaun, Uttar Pradesh ', '', ''),
(171, 'EIPL/216', 'Gurugram', 'Male', '2023-04-06', 'Executive', '1994-08-14', 'HBWPS0169C', NULL, NULL, 'Kotak Mahindra Bank ', '2813603058    ', 'KKBK0000196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'H.no 295,C-Block Road No 3, Andrewsganj, South Delhi, Delhi 110049', 'H.no 295,C-Block Road No 3, Andrewsganj, South Delhi, Delhi 110049', NULL, NULL),
(172, 'EIPL/000', 'Barakhamba', 'Male', '2016-01-27', 'Unknown', '1984-09-10', '', NULL, NULL, 'HDFC Bank', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'EIPL/231', 'Barakhamba', 'Female', '2023-07-17', 'Senior-Executive', '1997-11-25', 'LGJPS6733E', '', '101215430000', 'Bank Of India', '607610110006824', 'BKID0006076', '64c8b66fa10e3.pdf', '64c8b66fa19cc.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O+', 'D-92, Baljeet Vihar, Nithari Delhi -110086', 'D-92, Baljeet Vihar, Nithari Delhi -110086', '9971276585', 'Rajesh Kumar ( Father )'),
(174, 'EIPL/228', 'Gurugram', 'Male', '2023-05-31', 'Executive', '1994-09-28', 'CWFPK0088R', '', '101196277273', 'HDFC Bank', '50100280575203', 'HDFC0000044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'B-2, BK Dutt Colony, Lodhi Road, New Delhi - 110003', 'B-2, BK Dutt Colony, Lodhi Road, New Delhi - 110003', NULL, NULL),
(175, 'EIPL/230', 'Barakhamba', 'Female', '2023-07-11', 'Executive', '2002-04-02', 'CGVPT4921Q', '', '', 'Punjab National Bank', '4881001700150784', 'PUNB0488100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'H.no-L-1,2073/11/9, Asthal Mandir, Sangam Vihar, Puspha Bhawna, South Delhi -110062', 'H.no-L-1,2073/11/9, Asthal Mandir, Sangam Vihar, Puspha Bhawna, South Delhi -110062', NULL, NULL),
(176, 'EIPL/220', 'Barakhamba', 'Male', '2023-04-18', 'Executive', '2005-07-20', '', '', '', 'Unity Small Finance Bank', '605100100000890', 'UNBA0000605', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '268F/6,Hauz Rani Kumhar Bast, Near Malviya Nagar, New Delhi-110017', '268F/6,Hauz Rani Kumhar Bast, Near Malviya Nagar, New Delhi-110017', NULL, NULL),
(177, 'EIPL/221', 'Barakhamba', 'Male', '2023-04-18', 'Executive', '2002-04-01', 'ADPPZ5230K', '', '', 'Bank Of Baroda', '17300100030035', 'BARB0NAGINA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'H.no-B73,Vikram Enclave,Indian Apartment Building, Sahibabad Gaziyabad UP-251005', 'Mohalla Sayyed Wara Nagina Distt. Bijnor U. P.', NULL, NULL),
(178, 'EIPL/222', 'Barakhamba', 'Female', '2023-04-26', 'Executive', '1998-05-12', 'AFEPW5486R', '', '', 'Canara Bank', '391101081749', 'CNRB0000391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'A-9C DDA Flats New Central School, Tagore Garden New Delhi-10027', 'A-9C DDA Flats New Central School, Tagore Garden New Delhi-10027', NULL, NULL),
(179, 'EIPL/223', 'Barakhamba', 'Male', '2023-05-10', 'Executive', '1976-07-04', 'CTKPK1063L', '', '', 'Indian Bank', '481650631', 'IDIB000M102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Flat No. 30, Mayur Vihar 1, New Delhi-110091', 'Flat No. 30, Mayur Vihar 1, New Delhi-110091', NULL, NULL),
(180, 'EIPL/224', 'Gurugram', 'Male', '2023-05-11', 'Senior-Executive', '1990-01-20', 'BWAPM1666B', '', '101202601059', 'Punjab National Bank', '4453000100049560', 'PUNB0445300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EIPL224-MedicalInsurance-1690972717.pdf', NULL, '', 'Taragi Niwas D--64 Streer no 2, Shiv Mandir Marg, Laxmi Nagar, New Delhi-110092', 'Defence Colony,Near Golju Temple Chandani Chauk Ghurdaura Naintal Uttrakhand-263139', NULL, NULL),
(181, 'EIPL/225', 'Barakhamba', 'Male', '2022-05-11', 'Executive', '1994-12-11', 'EONPK6070K', '', '', 'State Bank Of India', '37718084892', 'SBIN0000597', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Malik PG, Govindpuri,Near Govindpuri Metro Station Delhi-110019', 'Village Guna Hattu Post Deoraniya Tensil Baheri, UP-243203', NULL, NULL),
(182, 'EIPL/227', 'Barakhamba', 'Female', '2023-05-15', 'Executive', '2001-02-23', 'MEQPS2249K', '', '', 'Canara Bank', '3931101009230', 'CNRB0003931', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Rajapuri, Uttam Nagar, New Delhi -110059', 'Nagala Murari, Sarsaul, Sarsol, Aligarh, Uttar Pradesh-202002', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_app`
--

CREATE TABLE `expense_app` (
  `exp_a_id` int(10) NOT NULL,
  `exp_a_reg` int(10) DEFAULT NULL,
  `exp_a_emp` int(10) DEFAULT NULL,
  `exp_a_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exp_a_by` int(10) DEFAULT NULL,
  `zone_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense_app`
--

INSERT INTO `expense_app` (`exp_a_id`, `exp_a_reg`, `exp_a_emp`, `exp_a_on`, `exp_a_by`, `zone_name`) VALUES
(1, 2, 66, '2023-06-19 14:28:39', 166, 'West'),
(2, 1, 120, '2023-06-19 14:28:39', 166, 'East'),
(3, 4, 52, '2023-06-19 14:28:39', 166, 'South'),
(4, 3, 33, '2023-06-19 14:28:39', 166, 'North'),
(5, 5, 21, '2023-06-19 14:28:39', 166, 'Central');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `mail_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'infobip',
  `email_authorization_key` varchar(255) DEFAULT NULL COMMENT 'infobip',
  `whatsapp_active` enum('0','1') DEFAULT '0' COMMENT 'infobip',
  `whatsapp_sender` varchar(25) NOT NULL DEFAULT '0' COMMENT 'infobip',
  `whatsapp_templateName` varchar(255) DEFAULT NULL COMMENT 'infobip',
  `on_maintenance` enum('0','1') NOT NULL DEFAULT '0',
  `is_infobip_connected` enum('0','1') NOT NULL DEFAULT '1',
  `google_login` enum('0','1') NOT NULL DEFAULT '0',
  `two_factor` enum('0','1') NOT NULL DEFAULT '1',
  `preloader` int(11) NOT NULL DEFAULT 1,
  `brand_logo` longtext DEFAULT NULL,
  `portal_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `mail_active`, `email_authorization_key`, `whatsapp_active`, `whatsapp_sender`, `whatsapp_templateName`, `on_maintenance`, `is_infobip_connected`, `google_login`, `two_factor`, `preloader`, `brand_logo`, `portal_name`) VALUES
(1, '1', NULL, '1', '1', NULL, '0', '1', '0', '1', 3, 'media/upload/settings/foodieez_stock_logo64e351ccacafe.png', 'Foodieez Stock');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(4) NOT NULL,
  `status_name` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Docs Pending'),
(2, 'Will Apply'),
(3, 'Applied'),
(4, 'On Hold'),
(5, 'Collected'),
(6, 'Rejected'),
(7, 'Not Applicable'),
(8, 'Add Doc Required');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `session` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `empid` varchar(255) DEFAULT NULL,
  `ses_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`session`, `time`, `name`, `empid`, `ses_id`) VALUES
('hha6if45pk0ajbsq85gl22mmto', 1692622242, 'Sagar Kumar ', 'EIPL/211', 12997);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_mobile` (`admin_mobile`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `company` (`company_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`emp_info_id`);

--
-- Indexes for table `expense_app`
--
ALTER TABLE `expense_app`
  ADD PRIMARY KEY (`exp_a_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`ses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `emp_info_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `expense_app`
--
ALTER TABLE `expense_app`
  MODIFY `exp_a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `ses_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12998;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
