-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2024 at 09:37 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buy_sell`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `created_at`) VALUES
(5, 'Real State', 1, '2019-10-13 22:12:36'),
(6, 'Property Dealer', 1, '2019-12-19 23:25:09'),
(7, 'Healthcare', 1, '2019-12-25 14:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `status`, `created_date`) VALUES
(10, 'Mohali', 1, '0000-00-00 00:00:00'),
(1508, 'Delhi', 1, '0000-00-00 00:00:00'),
(6, 'Pandicherri', 1, '0000-00-00 00:00:00'),
(8, 'Hisar', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_state` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Albania', 1),
(3, 'Algeria', 1),
(4, 'Andorra', 1),
(5, 'Angola', 1),
(6, 'Antigua and Barbuda', 1),
(7, 'Argentina', 1),
(8, 'Armenia', 1),
(9, 'Australia', 1),
(10, 'Austria', 1),
(11, 'Azerbaijan', 1),
(12, 'Bahamas', 1),
(13, 'Bahrain', 1),
(14, 'Bangladesh', 1),
(15, 'Barbados', 1),
(16, 'Belarus', 1),
(17, 'Belgium', 1),
(18, 'Belize', 1),
(19, 'Benin', 1),
(20, 'Bhutan', 1),
(21, 'Bolivia', 1),
(22, 'Bosnia and Herzegovina', 1),
(23, 'Botswana', 1),
(24, 'Brazil', 1),
(25, 'Brunei', 1),
(26, 'Bulgaria', 1),
(27, 'Burkina Faso', 1),
(28, 'Burundi', 1),
(29, 'Cabo Verde', 1),
(30, 'Cambodia', 1),
(31, 'Cameroon', 1),
(32, 'Canada', 1),
(33, 'Central African Republic', 1),
(34, 'Chad', 1),
(35, 'Chile', 1),
(36, 'China', 1),
(37, 'Colombia', 1),
(38, 'Comoros', 1),
(39, 'Congo, Republic of the', 1),
(40, 'Congo, Democratic Republic of the', 1),
(41, 'Costa Rica', 1),
(42, 'Cote d Ivoire', 1),
(43, 'Croatia', 1),
(44, 'Cuba', 1),
(45, 'Cyprus', 1),
(46, 'Czech Republic', 1),
(47, 'Denmark', 1),
(48, 'Djibouti', 1),
(49, 'Dominica', 1),
(50, 'Dominican Republic', 1),
(51, 'Ecuador', 1),
(52, 'Egypt', 1),
(53, 'El Salvador', 1),
(54, 'Equatorial Guinea', 1),
(55, 'Eritrea', 1),
(56, 'Estonia', 1),
(57, 'Ethiopia', 1),
(58, 'Fiji', 1),
(59, 'Finland', 1),
(60, 'France', 1),
(61, 'Gabon', 1),
(62, 'Gambia', 1),
(63, 'Georgia', 1),
(64, 'Germany', 1),
(65, 'Ghana', 1),
(66, 'Greece', 1),
(67, 'Grenada', 1),
(68, 'Guatemala', 1),
(69, 'Guinea', 1),
(70, 'Guinea-Bissau', 1),
(71, 'Guyana', 1),
(72, 'Haiti', 1),
(73, 'Honduras', 1),
(74, 'Hungary', 1),
(75, 'Iceland', 1),
(76, 'India', 1),
(77, 'Indonesia', 1),
(78, 'Iran', 1),
(79, 'Iraq', 1),
(80, 'Ireland', 1),
(81, 'Italy', 1),
(82, 'Jamaica', 1),
(83, 'Japan', 1),
(84, 'Jordan', 1),
(85, 'Kazakhstan', 1),
(86, 'Kenya', 1),
(87, 'Kiribati', 1),
(88, 'Kosovo', 1),
(89, 'Kuwait', 1),
(90, 'Kyrgyzstan', 1),
(91, 'Laos', 1),
(92, 'Latvia', 1),
(93, 'Lebanon', 1),
(94, 'Lesotho', 1),
(95, 'Liberia', 1),
(96, 'Libya', 1),
(97, 'Liechtenstein', 1),
(98, 'Lithuania', 1),
(99, 'Luxembourg', 1),
(100, 'Macedonia', 1),
(101, 'Madagascar', 1),
(102, 'Malawi', 1),
(103, 'Malaysia', 1),
(104, 'Maldives', 1),
(105, 'Mali', 1),
(106, 'Malta', 1),
(107, 'Marshall Islands', 1),
(108, 'Mauritania', 1),
(109, 'Mauritius', 1),
(110, 'Mexico', 1),
(111, 'Micronesia', 1),
(112, 'Moldova', 1),
(113, 'Monaco', 1),
(114, 'Mongolia', 1),
(115, 'Montenegro', 1),
(116, 'Morocco', 1),
(117, 'Mozambique', 1),
(118, 'Myanmar (Burma)', 1),
(119, 'Namibia', 1),
(120, 'Nauru', 1),
(121, 'Nepal', 1),
(122, 'Netherlands', 1),
(123, 'New Zealand', 1),
(124, 'Nicaragua', 1),
(125, 'Niger', 1),
(126, 'Nigeria', 1),
(127, 'North Korea', 1),
(128, 'Norway', 1),
(129, 'Oman', 1),
(130, 'Pakistan', 1),
(131, 'Palau', 1),
(132, 'Palestine', 1),
(133, 'Panama', 1),
(134, 'Papua New Guinea', 1),
(135, 'Paraguay', 1),
(136, 'Peru', 1),
(137, 'Philippines', 1),
(138, 'Poland', 1),
(139, 'Portugal', 1),
(140, 'Qatar', 1),
(141, 'Romania', 1),
(142, 'Russia', 1),
(143, 'Rwanda', 1),
(144, 'St. Kitts and Nevis', 1),
(145, 'St. Lucia', 1),
(146, 'St. Vincent and The Grenadines', 1),
(147, 'Samoa', 1),
(148, 'San Marino', 1),
(149, 'Sao Tome and Principe', 1),
(150, 'Saudi Arabia', 1),
(151, 'Senegal', 1),
(152, 'Serbia', 1),
(153, 'Seychelles', 1),
(154, 'Sierra Leone', 1),
(155, 'Singapore', 1),
(156, 'Slovakia', 1),
(157, 'Slovenia', 1),
(158, 'Solomon Islands', 1),
(159, 'Somalia', 1),
(160, 'South Africa', 1),
(161, 'South Korea', 1),
(162, 'South Sudan', 1),
(163, 'Spain', 1),
(164, 'Sri Lanka', 1),
(165, 'Sudan', 1),
(166, 'Suriname', 1),
(167, 'Swaziland', 1),
(168, 'Sweden', 1),
(169, 'Switzerland', 1),
(170, 'Syria', 1),
(171, 'Taiwan', 1),
(172, 'Tajikistan', 1),
(173, 'Tanzania', 1),
(174, 'Thailand', 1),
(175, 'Timor-Leste', 1),
(176, 'Togo', 1),
(177, 'Tonga', 1),
(178, 'Trinidad and Tobago', 1),
(179, 'Tunisia', 1),
(180, 'Turkey', 1),
(181, 'Turkmenistan', 1),
(182, 'Tuvalu', 1),
(183, 'Uganda', 1),
(184, 'Ukraine', 1),
(185, 'United Arab Emirates', 1),
(186, 'United Kingdom (UK)', 1),
(187, 'United States of America (USA)', 1),
(188, 'Uruguay', 1),
(189, 'Uzbekistan', 1),
(190, 'Vanuatu', 1),
(191, 'Vatican City (Holy See)', 1),
(192, 'Venezuela', 1),
(193, 'Vietnam', 1),
(194, 'Yemen', 1),
(195, 'Zambia', 1),
(196, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dealer_association`
--

CREATE TABLE `dealer_association` (
  `id` int(11) NOT NULL,
  `association_name` varchar(255) DEFAULT NULL,
  `dealer_name` varchar(255) DEFAULT NULL,
  `logo` varchar(100) NOT NULL,
  `establish_year` int(5) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `city_id` varchar(11) NOT NULL,
  `locality_id` int(11) NOT NULL,
  `cat_id` varchar(11) NOT NULL,
  `sub_category_id` varchar(11) NOT NULL,
  `closed_day` varchar(10) NOT NULL,
  `working_hours` varchar(20) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `map_url` varchar(256) NOT NULL,
  `video_url` varchar(150) NOT NULL,
  `business_information` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer_association`
--

INSERT INTO `dealer_association` (`id`, `association_name`, `dealer_name`, `logo`, `establish_year`, `website`, `email`, `phone`, `address`, `city_id`, `locality_id`, `cat_id`, `sub_category_id`, `closed_day`, `working_hours`, `payment_mode`, `map_url`, `video_url`, `business_information`, `created_at`, `status`) VALUES
(117, 'kumar Book Depo', 'Kumar', '', 0, '', 'satyendra.lalta@gmail.com', '8447330573', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '5', '1', 'Saturday', '00:00-19:40', 'Debit Card,Credit Card,Cheque,Cash', '', '', '', '2019-11-11 23:37:44', 1),
(118, 'Vmart Satiish', 'Satish JI', '', 0, '', 'satyendra.lalta@gmail.com', '9958023001', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '5', '', '0', '10:00-11:00', '', '', 'https://www.youtube.com/watch?v=Edsxf_NBFrw&t=5714s', '', '2022-07-09 14:28:49', 1),
(119, 'V Bazar', 'Satyendra', '', 0, '', 'satyendra.lalta@gmail.com', '8447330573', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '5', '1', 'Friday', '10:00-19:40', 'Debit Card,Credit Card,Cheque,Cash', '', '', '', '2019-11-12 12:41:48', 1),
(120, 'Gaurav', 'Mallu Babu', '', 0, '', 'satyendra.lalta@gmail.com', '8447330573', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '5', '1', 'Friday', '10:00-22:00', 'Debit Card,Credit Card,Cheque', '', '', '', '2019-11-12 12:45:54', 1),
(121, 'Gokul Swetts', 'Vinod Yada', '', 0, '', 'satyendra.lalta@gmail.com', '8447330573', 'Khalilabad Main road sant kabir nagar uttar pradeh 272175', '1508', 9, '5', '1', 'Tuesday', '10:00-11:55', 'Debit Card,Credit Card,Cheque', ',', 'https://www.youtube.com/watch?v=sjcPwLaXFlY', '', '2019-12-08 12:24:04', 1),
(122, 'Subham Mediacl', 'Ashok Kumar', '', 0, '', 'subham@gmail.com', '8447330573', 'Baghuli Bazar Khalilabad Sant kabir Nagar', '1508', 9, '5', '1', 'Friday', '12:00-07:00', 'Debit Card,Credit Card', 'https://www.google.com/maps/search/baghuli+bazar+sant+kabi+r+nagar/@26.9423971,82.9114764,11z/data=!3m1!4b1', 'https://www.youtube.com/watch?v=WvAzE_tp_BA', '', '2019-12-14 12:09:48', 1),
(123, 'Test Dealer', 'Deealer', '', 0, '', 'satyendra.lalta@gmail.com', '8447330573', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '5', '1', 'Friday', '10:00-23:56', 'Debit Card,Credit Card', 'https://www.google.com/maps/search/baghuli+bazar+sant+kabi+r+nagar/@26.9423971,82.9114764,11z/data=!3m1!4b1', 'https://www.youtube.com/watch?v=WvAzE_tp_BA', 'Welcome Properties in New Ashok Nagar, Delhi is a top player in the category Offices On Hire in the Delhi. This well-known establishment acts as a one-stop destination servicing customers both local and from other parts of Delhi. Over the course of its journey, this business has established a firm foothold in it’s industry. The belief that customer satisfaction is as important as their products and services, have helped this establishment garner a vast base of customers, which continues to grow by the day. This business employs individuals that are dedicated towards their respective roles and put in a lot of effort to achieve the common vision and larger goals of the company. In the near future, this business aims to expand its line of products and services and cater to a larger client base. In Delhi, this establishment occupies a prominent location in New Ashok Nagar. It is an effortless task in commuting to this establishment as there are various modes of transport readily available. It is at Main road, New Ashok Nagar metro pillar number -163, which makes it easy for first-time visitors in locating this establishment. It is known to provide top service in the following categories: Offices On Hire, Estate Agents, Estate Agents For Residential Rental, Paying Guest Accommodations For Women, Paying Guest Accommodations For Men, Paying Guest Accommodations, Estate Agents For Commercial Rental, Estate Agents For Residence.', '2019-12-14 13:17:44', 1),
(124, 'again ', 'Ashok Kumar', '', 1234, 'fff.cim', 'satyendra.lalta@gmail.com', '8447330573', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '0', '1,3', 'Sunday', '06:00-22:00', 'Debit Card,Credit Card,Cheque', 'https://www.google.com/maps/search/baghuli+bazar+sant+kabi+r+nagar/@26.9423971,82.9114764,11z/data=!3m1!4b1', 'yyyy', 'dsfsdfsdf', '2019-12-25 17:45:54', 1),
(125, 'lalta pharmacy', 'Lalta Yadav', '', 1234, 'fff.cim', 'satyendra.lalta@gmail.com', '8447330573', 'Flat no-404  Tower C3, Panchsheel Greens 1', '1508', 9, '7,5,6', '1,3', 'Wednesday', '10:00-23:00', 'Debit Card,Credit Card,Cheque,Cash', 'https://www.google.com/maps/search/baghuli+bazar+sant+kabi+r+nagar/@26.9423971,82.9114764,11z/data=!3m1!4b1', 'https://www.youtube.com/watch?v=WvAzE_tp_BA', 'Welcome Properties in New Ashok Nagar, Delhi is a top player in the category Offices On Hire in the Delhi. This well-known establishment acts as a one-stop destination servicing customers both local and from other parts of Delhi. Over the course of its journey, this business has established a firm foothold in it’s industry. The belief that customer satisfaction is as important as their products and services, have helped this establishment garner a vast base of customers, which continues to grow by the day. This business employs individuals that are dedicated towards their respective roles and put in a lot of effort to achieve the common vision and larger goals of the company. In the near future, this business aims to expand its line of products and services and cater to a larger client base. In Delhi, this establishment occupies a prominent location in New Ashok Nagar. It is an effortless task in commuting to this establishment as there are various modes of transport readily available. It is at Main road, New Ashok Nagar metro pillar number -163, which makes it easy for first-time visitors in locating this establishment. It is known to provide top service in the following categories: Offices On Hire, Estate Agents, Estate Agents For Residential Rental, Paying Guest Accommodations For Women, Paying Guest Accommodations For Men, Paying Guest Accommodations, Estate Agents For Commercial Rental, Estate Agents For Residence.', '2019-12-25 18:03:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Codeigniter Admin Template'),
(2, 'system_title', 'Codeigniter Admin Template');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Andaman & Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra & Nagar Haveli'),
(9, 'Daman & Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu & Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carrers`
--

CREATE TABLE `tbl_carrers` (
  `id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `qualifications` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `contact_email` varchar(30) NOT NULL,
  `conatct_phone` varchar(30) NOT NULL,
  `job_expiry` varchar(20) NOT NULL,
  `job_description` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carrers`
--

INSERT INTO `tbl_carrers` (`id`, `job_title`, `qualifications`, `experience`, `contact_email`, `conatct_phone`, `job_expiry`, `job_description`, `status`, `created_date`) VALUES
(1, 'PhP Developer Upadte', 'MCA', '0-9 Years', 'satyendra.lalta@gmail.com', '8447330573', '12/09/2019', 'This is test description', 1, '2019-12-14 20:59:24'),
(2, 'Tele Caller', 'BA', '2 Years', 'sss@gmail.com', '2345566', '12/12/33', 'havinf must experince ', 1, '2019-12-14 21:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealerAssocation_files`
--

CREATE TABLE `tbl_dealerAssocation_files` (
  `id` int(11) NOT NULL,
  `assocation_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dealerAssocation_files`
--

INSERT INTO `tbl_dealerAssocation_files` (`id`, `assocation_id`, `images`) VALUES
(1, 99, 'Inter.png'),
(2, 99, 'high.png'),
(3, 99, 'BA.png'),
(4, 100, '2019-07-13-222139.jpg'),
(5, 100, '2019-07-13-222054.jpg'),
(6, 101, '2019-07-13-222139.jpg'),
(7, 104, '2019-07-13-222054.jpg'),
(13, 104, '14.jpg'),
(14, 105, '20190103_220157.jpg'),
(15, 105, '20190207_145059.jpg'),
(16, 111, 'list-image.jpg'),
(17, 112, 'list-image.jpg'),
(18, 116, 'uploads/images/homepage-banner.jpg'),
(19, 117, 'Screenshot from 2019-03-23 19-46-59.png'),
(20, 117, 'Screenshot from 2019-03-23 19-47-00.png'),
(21, 117, 'Screenshot from 2019-03-23 19-47-01.png'),
(22, 119, 'download.jpeg'),
(23, 119, 'download_(1).jpeg'),
(24, 119, 'download_(2).jpeg'),
(25, 119, 'download_(3).jpeg'),
(26, 120, 'download_(1)1.jpeg'),
(27, 120, 'download_(2)1.jpeg'),
(28, 120, 'download_(3)1.jpeg'),
(29, 120, 'download_(4).jpeg'),
(30, 121, 'Screenshot_from_2019-12-05_21-09-54.png'),
(31, 121, 'Screenshot_from_2019-09-13_22-53-48.png'),
(32, 121, 'Screenshot_from_2019-09-03_14-57-25.png'),
(33, 122, 'Screenshot_from_2019-12-06_23-13-47.png'),
(34, 122, 'Screenshot_from_2019-12-05_21-10-40.png'),
(35, 122, 'Screenshot_from_2019-12-05_21-10-36.png'),
(36, 123, 'Screenshot_from_2019-08-12_15-02-02.png'),
(37, 123, 'Screenshot_from_2019-09-03_14-57-251.png'),
(38, 124, 'Screenshot_from_2019-03-23_19-47-001.png'),
(39, 124, 'Screenshot_from_2019-03-23_19-47-011.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `name`, `city`, `email`, `phone`, `message`, `created_date`, `status`) VALUES
(1, 'dsfsdf', 'sdfsd', 'satyendra.lalta@gmail.com', 2147483647, 'dsfsdfsd', '2019-12-18 16:23:21', 0),
(2, 'dfsdf', 'Greater Noida', 'satyendra.mca7@gmail.com', 2147483647, 'sadasdsa', '2019-12-18 16:24:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_getBestDeails`
--

CREATE TABLE `tbl_getBestDeails` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_getBestDeails`
--

INSERT INTO `tbl_getBestDeails` (`id`, `name`, `mobile`, `email`, `message`, `status`, `created_date`) VALUES
(6, 'cjjch', 1233566778, 'satyendra.lalta@gmail.com', 'tryu', 1, '2019-11-03 19:06:09'),
(7, 'nbkjb', 1342555555, 'satyendra.mca7@gmail.com', 'uguo', 1, '2019-11-03 19:08:23'),
(8, 'nbkjb', 1342555555, 'satyendra.mca7@gmail.com', 'uguo', 1, '2019-11-03 19:09:04'),
(9, 'sdbasjbdlasjd', 2147483647, 'satyendra.mca7@gmail.com', 'sdfsdfnsdlkfnsd;', 1, '2019-11-03 19:20:38'),
(10, 'zxczx,.cn,;zxc', 2147483647, 'dsfsdfds@gmail.com', 'dsfklsdnf;lksd', 1, '2019-11-03 19:28:10'),
(11, 'sadasds', 1212213123, 'wdwedw@gmail.com', 'sdfsfsdf', 1, '2019-11-09 00:06:36'),
(12, 'zscsdsa', 1231231231, 'wqeqweqweqw@GMAIL.COM', 'SADFASDAS', 1, '2019-11-09 00:08:42'),
(13, 'sdsa', 2147483647, 'satyendra.lalta@gmail.com', 'asdasdasdasdsadasdasasd', 1, '2019-12-15 15:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locality`
--

CREATE TABLE `tbl_locality` (
  `id` int(11) NOT NULL,
  `locality_name` varchar(256) NOT NULL,
  `city_id` int(11) NOT NULL,
  `locality_region_code` varchar(256) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locality`
--

INSERT INTO `tbl_locality` (`id`, `locality_name`, `city_id`, `locality_region_code`, `status`, `creation_date`) VALUES
(1, 'Chander Vihar', 1508, 'ncr-10192624', 1, '0000-00-00 00:00:00'),
(2, 'Gali no 1 west pandichery Goa', 6, '', 0, '0000-00-00 00:00:00'),
(3, 'Laxmi Nagar', 1508, 'ncr-10192623', 1, '0000-00-00 00:00:00'),
(4, 'Local1', 8, '', 0, '0000-00-00 00:00:00'),
(7, 'Test', 6, '', 1, '2019-10-19 21:36:59'),
(8, 'sdcdssf', 6, '', 0, '2019-10-19 21:37:54'),
(9, 'Madhu Vihar', 1508, 'ncr-1952620023', 1, '2019-11-10 13:37:54'),
(10, 'Mayur Vihar', 1508, 'ncr-1517705182', 1, '2019-11-10 13:39:29'),
(11, 'Nirman Vihar', 1508, 'ncr-1518678535', 1, '2019-12-24 23:39:27'),
(12, 'Anand Vihar', 1508, '-1578120210', 1, '2022-07-09 14:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_free_listing`
--

CREATE TABLE `tbl_post_free_listing` (
  `id` int(11) NOT NULL,
  `company_name` varchar(60) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_free_listing`
--

INSERT INTO `tbl_post_free_listing` (`id`, `company_name`, `vendor_name`, `city`, `locality`, `email`, `phone`, `message`, `created_date`, `status`) VALUES
(1, 'Om Property', '0', '0', '0', '0', 2147483647, '33ewq', '2019-12-18 14:21:55', 0),
(2, 'dsfsdfds', 'dsfdsfs', 'dsfds', 'dsfds', 'satyendra.lalta@gmail.com', 2147483647, 'fdsfdsfdsf', '2019-12-18 14:25:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dealer_id` varchar(255) DEFAULT NULL,
  `review` text,
  `rating` int(5) DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `name`, `dealer_id`, `review`, `rating`, `image`, `status`, `created_date`) VALUES
(80, 'sadas', '119', '', 3, 'Inter.png', 1, '2019-11-15 18:15:41'),
(81, 'xfvxc', '119', 'cxvx', 3, '', 1, '2019-11-15 18:20:22'),
(82, 'sfdsd', '119', 'dfds', 3, 'Screenshot from 2019-03-23 19-46-55 - 1.png', 1, '2019-11-15 18:24:41'),
(83, 'Satish', '122', 'This is test ', 3, 'high.png', 1, '2019-12-15 15:10:03'),
(85, 'Satyendra Yadav', '123', 'axsaxdassadsa', 4, 'avatar.jpg', 1, '2019-12-25 12:45:17'),
(86, 'test', '123', 'gujgukg', 3, 'Screenshot from 2019-03-23 19-46-52.png', 1, '2019-12-25 12:46:40'),
(87, '', '120', '', 0, '', 0, '2021-03-11 14:39:57'),
(88, 'Satish ', '119', 'Satish JI Sent Message', 5, 'Marriage_Invitation.pdf', 1, '2022-07-09 14:15:38'),
(89, '', '118', '', 3, '', 0, '2023-10-02 16:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `s_cat_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`id`, `cat_id`, `s_cat_name`, `status`, `created_at`) VALUES
(1, 5, 'Commercial', 1, '2019-12-19 23:25:54'),
(3, 5, 'Rental', 1, '2019-12-19 23:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `country`, `created_at`, `status`, `role`) VALUES
(1, 'Super', 'Admin', 'admin@admin.com', '0100 500 600', 'e6e061838856bf47e1de730719fb2609', 14, '2018-03-02 14:51:38', 0, 'admin'),
(19, 'Sarvesh', 'Tripathi', 'sktripathi12@gmail.com', '986756756', 'e6e061838856bf47e1de730719fb2609', 76, '2019-09-02 17:29:40', 0, 'admin'),
(20, '', 'test dndjs', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2019-09-11 14:23:28', 0, ''),
(21, '', 'test dndjs', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2019-09-11 14:29:30', 0, ''),
(22, 'test', 'testuser', 'test@gmail.com', '123344', '827ccb0eea8a706c4c34a16891f84e7b', 15, '2019-10-13 17:37:12', 0, 'user'),
(23, 'Satyendra', 'yadav', 'yadav@gmail.com', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 18, '2019-10-19 20:18:32', 0, 'admin'),
(24, 'User', 'UserLast', 'user@gmail.com', '', 'ee11cbb19052e40b07aac0ca060c23ee', 15, '2019-10-19 21:17:33', 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_power`
--

CREATE TABLE `user_power` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `power_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_power`
--

INSERT INTO `user_power` (`id`, `name`, `power_id`) VALUES
(2, 'edit', 2),
(3, 'delete', 3),
(4, 'add', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `action`) VALUES
(1, 11, 1),
(2, 11, 3),
(3, 13, 2),
(4, 14, 1),
(5, 14, 3),
(6, 15, 1),
(7, 15, 3),
(11, 16, 1),
(12, 16, 2),
(13, 24, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer_association`
--
ALTER TABLE `dealer_association`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_carrers`
--
ALTER TABLE `tbl_carrers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dealerAssocation_files`
--
ALTER TABLE `tbl_dealerAssocation_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_getBestDeails`
--
ALTER TABLE `tbl_getBestDeails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post_free_listing`
--
ALTER TABLE `tbl_post_free_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_power`
--
ALTER TABLE `user_power`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1509;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `dealer_association`
--
ALTER TABLE `dealer_association`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_carrers`
--
ALTER TABLE `tbl_carrers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dealerAssocation_files`
--
ALTER TABLE `tbl_dealerAssocation_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_getBestDeails`
--
ALTER TABLE `tbl_getBestDeails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_post_free_listing`
--
ALTER TABLE `tbl_post_free_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_power`
--
ALTER TABLE `user_power`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
