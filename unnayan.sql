-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 08:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unnayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `details` text,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `details`, `pic`) VALUES
(1, '<p>Must explain to you how all this mistaken idea of denouncing of a pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. abc</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `details`) VALUES
(1, 'Mens Ware', '<p>This is for men&nbsp;This is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for women</p>\r\n'),
(2, 'Womens Cloths', '<p>This is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for womenThis is for women</p>\r\n'),
(3, 'Kids Ware', '<p>This is for kids</p>\r\n'),
(4, 'Bags', NULL),
(5, 'Books', NULL),
(6, 'Mobile', NULL),
(7, 'Toys', NULL),
(8, 'sss', '<p>fgfg</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `details` text,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `details`, `email`) VALUES
(1, '<p>UNNAYAN</p>\r\n\r\n<p>Location : Dhaka, Mirpur-10.</p>\r\n\r\n<p>Email : info@unnayan.com</p>\r\n\r\n<p>phone : +880000000000</p>', 'oshitsd99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `create_admin`
--

CREATE TABLE `create_admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` text,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fullname` varchar(1000) DEFAULT NULL,
  `admin_type` varchar(2) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_admin`
--

INSERT INTO `create_admin` (`id`, `user_name`, `password`, `email`, `phone`, `fullname`, `admin_type`, `create_date`) VALUES
(5, 'oshitsd', '6c671a68abdfcf1f625f499d56b46a0b', 'oshitsd@gmail.com', '014546584648', 'Oshit Sutra Dar', 's', NULL),
(9, 'Nahian', '96e79218965eb72c92a549dd5a330112', 'Nahian@gmail.com', '01911978897', 'Nahian', 'a', '2018-05-20'),
(10, 'Unnayan', '96e79218965eb72c92a549dd5a330112', 'Unnayan@gmail.com', '01713829040', 'Unnayan', 'a', '2018-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `footer_about_us`
--

CREATE TABLE `footer_about_us` (
  `id` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_about_us`
--

INSERT INTO `footer_about_us` (`id`, `details`) VALUES
(1, '<p>Account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `footer_contact_us`
--

CREATE TABLE `footer_contact_us` (
  `id` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_contact_us`
--

INSERT INTO `footer_contact_us` (`id`, `details`) VALUES
(1, '<p>Location : Dhaka, Mirpur-10.</p>\r\n\r\n<p>Email : info@unnayan.com</p>\r\n\r\n<p>phone : +880000000000</p>');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `pic`) VALUES
(5, '', '9376090215ae065532ed03.png'),
(6, '', '8351502915ae065582e6ec.jpg'),
(7, '', '14601518665ae0655e8a037.jpg'),
(8, '', '5799621135ae0656214396.JPG'),
(9, '', '20368934985ae0656644929.jpg'),
(10, '', '2196469965ae065a652987.JPG'),
(11, '', '14863828975aeaf5a0ef07e.jpg'),
(12, 'hi', '19975200375aeaf5d7b3ed2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pricetype`
--

CREATE TABLE `pricetype` (
  `id` int(11) NOT NULL,
  `price_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricetype`
--

INSERT INTO `pricetype` (`id`, `price_type`) VALUES
(1, 'BDT'),
(2, 'USD'),
(3, 'RUPEE');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `pic`) VALUES
(7, '12078339715ad5a3c14de2c.jpg'),
(8, '12351461725ad5a3c5b71fd.jpg'),
(9, '17980312085ad5a3cadf741.jpg'),
(10, '8117384715ad5a3d16b092.jpg'),
(11, '3269523835ae5ac2fd3929.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_id` int(11) NOT NULL,
  `category_id` int(2) DEFAULT NULL,
  `sub_category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `category_id`, `sub_category_name`) VALUES
(1, 6, 'Samsung'),
(2, 4, 'Red Bag'),
(3, 4, 'White Bag'),
(4, 4, 'Blue Bags'),
(5, 4, 'Big Bag'),
(6, 6, 'Sony'),
(7, 6, 'Vivo'),
(8, 6, 'Huwai'),
(9, 8, 'ww');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access`
--

CREATE TABLE `tbl_access` (
  `acs_id` int(11) NOT NULL,
  `acs_user_id` int(11) NOT NULL,
  `acs_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_access`
--

INSERT INTO `tbl_access` (`acs_id`, `acs_user_id`, `acs_category`) VALUES
(25, 26, 4),
(30, 28, 1),
(32, 28, 2),
(33, 28, 7),
(34, 30, 1),
(35, 31, 1),
(36, 28, 3),
(37, 26, 2),
(39, 26, 1),
(41, 27, 4),
(44, 32, 1),
(45, 32, 4),
(46, 33, 4),
(47, 33, 5),
(48, 26, 6),
(49, 27, 8),
(50, 34, 1),
(51, 34, 2),
(52, 34, 4),
(53, 34, 5),
(54, 34, 6),
(55, 35, 2),
(56, 36, 1),
(57, 36, 6),
(59, 37, 6),
(60, 38, 5),
(61, 37, 3),
(62, 37, 7),
(63, 39, 1),
(66, 39, 6),
(67, 40, 1),
(68, 40, 4),
(69, 41, 1),
(70, 41, 4),
(71, 42, 1),
(72, 42, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_access`
--

CREATE TABLE `tbl_admin_access` (
  `aa_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `pending_reg_user` int(11) NOT NULL DEFAULT '0',
  `approve_user` int(11) NOT NULL DEFAULT '0',
  `pending_post` int(11) NOT NULL DEFAULT '0',
  `approve_post` int(11) NOT NULL DEFAULT '0',
  `price_type` int(11) NOT NULL DEFAULT '0',
  `phone_code` int(11) DEFAULT '0',
  `category` int(11) NOT NULL DEFAULT '0',
  `location` int(11) NOT NULL DEFAULT '0',
  `about_us` int(11) NOT NULL DEFAULT '0',
  `service` int(11) NOT NULL DEFAULT '0',
  `terms_con` int(11) NOT NULL DEFAULT '0',
  `faq` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `contact_us` int(11) NOT NULL DEFAULT '0',
  `photo_gallery` int(11) NOT NULL DEFAULT '0',
  `conporate` int(11) NOT NULL DEFAULT '0',
  `footer_about` int(11) NOT NULL DEFAULT '0',
  `footer_contact` int(11) NOT NULL DEFAULT '0',
  `slider` int(11) NOT NULL DEFAULT '0',
  `reg_user` int(11) NOT NULL DEFAULT '0',
  `user_post` int(11) NOT NULL DEFAULT '0',
  `main_menu` int(11) NOT NULL DEFAULT '0',
  `footer` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `ar_id` int(11) NOT NULL,
  `city_id` varchar(10) DEFAULT NULL,
  `area_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`ar_id`, `city_id`, `area_name`) VALUES
(19, '1', 'Mirpur-10'),
(20, '2', 'Janina Kothay'),
(21, '16', 'cccc'),
(22, '2', 'bca'),
(23, '1', 'Mirpur-12'),
(24, '3', 'Sultanpur'),
(25, '1', 'Aaaa'),
(26, '1', 'Bbbbb'),
(27, '1', 'CCCcc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_details`
--

CREATE TABLE `tbl_category_details` (
  `cd_id` int(11) NOT NULL,
  `cd_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_details`
--

INSERT INTO `tbl_category_details` (`cd_id`, `cd_details`) VALUES
(1, '<p>aaaaaaaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check_date`
--

CREATE TABLE `tbl_check_date` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_check_date`
--

INSERT INTO `tbl_check_date` (`id`, `date`) VALUES
(1, '2018-05-21'),
(2, '2018-05-27'),
(3, '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `cty_id` int(11) NOT NULL,
  `country_id` varchar(10) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`cty_id`, `country_id`, `city_name`) VALUES
(1, '1', 'Dhaka'),
(2, '2', 'Abc'),
(3, '1', 'Feni'),
(4, '1', 'Chottogram'),
(5, '1', 'Comilla'),
(6, '1', 'Rajsahi'),
(7, '1', 'Barishal'),
(8, '1', 'Khulna'),
(9, '1', 'Dinajpur'),
(10, '1', 'Rangpur'),
(11, '1', 'Sylet'),
(12, '1', 'Khagrachori'),
(13, '1', 'Rangamati'),
(14, '1', 'Mirpur-10'),
(15, '1', 'Mirpur-12'),
(16, '5', 'xxxx'),
(17, '2', 'Dddd'),
(18, '2', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `com_user` varchar(10) DEFAULT NULL,
  `comment` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `com_user`, `comment`, `date`) VALUES
(1, '26', 'So pretty website', '2018-05-06'),
(2, '27', 'Nothing Else', '2018-05-06'),
(3, '37', 'hi', '2018-05-07'),
(4, '39', 'Nice', '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corporate`
--

CREATE TABLE `tbl_corporate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `pic` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_corporate`
--

INSERT INTO `tbl_corporate` (`id`, `name`, `details`, `pic`, `status`) VALUES
(1, 'Honda Motors      ', '<p>Hi Details</p>\r\n', '10738631915aeda4e5c7af5.png', 'd'),
(2, 'g', '<p>g</p>\r\n', '9806489525aeda52dbf10d.jpg', 'd'),
(3, 'GGGGGGGGG', '<p>FFFF</p>\r\n', '11043478915aee935fd3a5a.jpg', 'a'),
(4, 'YESSSSSSSSSSSS', '<p>NOOOOOO</p>\r\n', '9944591725aeeb5ea77f2f.png', 'a'),
(5, 'bdbl', '<p>up</p>\r\n', '7230908655af117aaebac8.jpg', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `ct_id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`ct_id`, `country_name`) VALUES
(1, 'Bangladesh'),
(2, 'America'),
(3, 'India'),
(4, 'London'),
(5, 'ddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `f_id` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`f_id`, `details`) VALUES
(1, '<p>FAQ</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `fb_id` int(11) NOT NULL,
  `fb_name` varchar(255) DEFAULT NULL,
  `fb_email` varchar(50) DEFAULT NULL,
  `fb_phone` varchar(22) DEFAULT NULL,
  `fb_message` text,
  `fb_member_id` varchar(50) DEFAULT NULL,
  `fb_file` varchar(255) DEFAULT NULL,
  `fb_status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`fb_id`, `fb_name`, `fb_email`, `fb_phone`, `fb_message`, `fb_member_id`, `fb_file`, `fb_status`) VALUES
(29, 'Nahian', 'rasti18@gmail.com', '01676611594', 'Nice', NULL, '0', 'a'),
(30, 'oshitsd', 'Oshit@gmail.com', '01883847733', 'hi', '45454', '0', 'a'),
(31, 'oshitsd', 'Oshitsd@gmail.com', '01883847733', 'uuu', '788', '3909016885af2ba2d3a7df.png', 'a'),
(32, 'osd', 'osd@gmail.com', '01883847733', 'Hi', '76564', '0', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL,
  `py_date` date DEFAULT NULL,
  `py_name` varchar(100) DEFAULT NULL,
  `py_username` varchar(100) DEFAULT NULL,
  `py_account_id` varchar(255) DEFAULT NULL,
  `py_user_type` varchar(10) DEFAULT NULL,
  `py_paymrnt_name` varchar(100) DEFAULT NULL,
  `py_payment_amount` int(11) DEFAULT NULL,
  `py_status` varchar(2) DEFAULT NULL,
  `py_save_by` varchar(100) DEFAULT NULL,
  `py_save_time` date DEFAULT NULL,
  `py_ip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_details`
--

CREATE TABLE `tbl_payment_details` (
  `pay_id` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment_details`
--

INSERT INTO `tbl_payment_details` (`pay_id`, `details`) VALUES
(1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<big>Bank to Bank -&gt; 015888888888888888</big></p>\r\n\r\n<p><big>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;or</big></p>\r\n\r\n<p><big>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Bkas</big>h</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phone_code`
--

CREATE TABLE `tbl_phone_code` (
  `id` int(11) NOT NULL,
  `phone_code` varchar(50) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_phone_code`
--

INSERT INTO `tbl_phone_code` (`id`, `phone_code`, `country`) VALUES
(1, '0088', 'Bangladesh'),
(2, '+999', 'America');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `p_title` varchar(100) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `p_category` varchar(50) DEFAULT NULL,
  `p_sub_category` int(11) DEFAULT NULL,
  `p_details` text,
  `p_city` varchar(100) DEFAULT NULL,
  `p_country` varchar(255) DEFAULT NULL,
  `p_zone` varchar(255) DEFAULT NULL,
  `p_address` text,
  `p_email` varchar(50) DEFAULT NULL,
  `p_phone` varchar(30) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `p_price_type` int(11) DEFAULT NULL,
  `p_pic1` varchar(255) DEFAULT NULL,
  `p_pic2` varchar(255) DEFAULT NULL,
  `p_pic3` varchar(255) DEFAULT NULL,
  `p_pic4` varchar(255) DEFAULT NULL,
  `p_file_upload` text,
  `p_status` varchar(1) DEFAULT NULL,
  `p_user_type` varchar(2) DEFAULT NULL,
  `p_add_by` varchar(100) DEFAULT NULL,
  `p_add_time` datetime DEFAULT NULL,
  `p_update_by` varchar(100) DEFAULT NULL,
  `p_update_time` datetime DEFAULT NULL,
  `p_ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `p_title`, `p_date`, `p_category`, `p_sub_category`, `p_details`, `p_city`, `p_country`, `p_zone`, `p_address`, `p_email`, `p_phone`, `p_price`, `p_price_type`, `p_pic1`, `p_pic2`, `p_pic3`, `p_pic4`, `p_file_upload`, `p_status`, `p_user_type`, `p_add_by`, `p_add_time`, `p_update_by`, `p_update_time`, `p_ip`) VALUES
(24, 'Vivo  s7', '2018-05-07', '6', 7, '', '1', '1', '19', '', '', '00880186967786', 70000, 1, '568376075aefc9d211165.jpg', '0', '0', '0', '0', 'p', 'b', '26', '2018-05-07 05:05:50', NULL, NULL, NULL),
(25, 'Bag', '2018-05-07', '4', 3, '', '1', '1', '23', '', '', '00880186967786', 100, 2, '13645874335aefcbaf1b0d7.jpg', '0', '0', '0', '0', 'p', 's', '27', '2018-05-07 05:05:47', NULL, NULL, NULL),
(26, 'Something', '2018-05-07', '4', 0, '', '1', '1', '23', '', '', '00880186967786', 500, 1, '17066904215aefccb7e299d.jpg', '0', '0', '0', '0', 'p', 's', '27', '2018-05-07 05:05:12', NULL, NULL, NULL),
(27, 'Nothing', '2018-05-07', '8', 9, '', '1', '1', '19', '', '', '00880186967786', 500, 1, '19381289135aefcd873e9fc.jpg', '0', '0', '0', '0', 'p', 'b', '27', '2018-05-07 05:05:39', NULL, NULL, NULL),
(28, 'Something', '2018-05-07', '8', 9, '', '1', '1', '19', '', '', '00880186967786', 500, 1, '916278915aefcda4d253b.JPG', '0', '0', '0', '0', 'p', 'b', '27', '2018-05-07 05:05:09', NULL, NULL, NULL),
(29, 'Samsung s9', '2018-05-07', '6', 1, '', '1', '1', '19', '', '', '00880186967786', 9000, 1, '8705283215aefcea8932cf.png', '0', '0', '0', '0', 'p', 'b', '26', '2018-05-07 05:05:28', NULL, NULL, NULL),
(30, 'Jama', '2018-05-07', '2', 0, '', '1', '1', '19', '', '', '00880186967786', 2500, 1, '5063256135aefcf253b916.jpg', '0', '0', '0', '0', 'p', 's', '26', '2018-05-07 05:05:33', NULL, NULL, NULL),
(31, 'Jama 2', '2018-05-07', '2', 0, '', '1', '1', '', '', '', '00880186967786', 3500, 1, '17412566875aefcf40767e8.jpg', '0', '0', '0', '0', 'p', 's', '26', '2018-05-07 06:05:00', NULL, NULL, NULL),
(32, 'Children Book', '2018-05-10', '5', 0, '', '1', '1', '19', '', '', '008801840314188', 500, 1, '8667351785af045e1ca7bb.jpg', '0', '0', '0', '0', 'p', 's', '36', '2018-05-07 08:05:10', NULL, NULL, NULL),
(33, 'car', '2018-05-01', '7', 0, '', '', '1', '', '', 'rasti18@gmail.com', '008801676611594', 1000, 1, '3750934725af045f05daec.jpeg', '0', '0', '0', '0', 'p', 's', '36', '2018-05-07 08:05:24', NULL, NULL, NULL),
(34, 'Shirt', '2018-04-22', '1', 0, 'Shirt', '1', '1', '19', '', 'oshitsd99@gmail.com', '008801862534183', 800, 1, '10179690595af0890e6581f.jpg', '0', '0', '0', '0', 'd', 's', '39', '2018-05-07 01:05:46', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ser_id` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`ser_id`, `details`) VALUES
(1, '<p>Service</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms`
--

CREATE TABLE `tbl_terms` (
  `ter_id` int(11) NOT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_terms`
--

INSERT INTO `tbl_terms` (`ter_id`, `details`) VALUES
(1, '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>sssssssssssssssssssssssssssssssssssssssssss sssssssssssssssssssssssssssssssssss ssssssssssssssssssssssssssssssssssssssssssss ssssssssssssssssssssssssssssssssssssssssssss sssssssssssssssssssssssssssssssssssssssssss</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_date_of_birth` date DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_phone` varchar(30) DEFAULT NULL,
  `u_phone_code` varchar(10) DEFAULT NULL,
  `NIDpassNumber` varchar(50) DEFAULT NULL,
  `u_address` text,
  `u_area` varchar(30) DEFAULT NULL,
  `u_country` varchar(50) DEFAULT NULL,
  `u_file` varchar(255) DEFAULT NULL,
  `u_pic` text,
  `u_status` varchar(1) DEFAULT NULL,
  `u_member_id` varchar(50) DEFAULT NULL,
  `u_password` varchar(100) DEFAULT NULL,
  `u_validity` date DEFAULT NULL,
  `u_ip` varchar(100) DEFAULT NULL,
  `u_type` varchar(1) DEFAULT NULL,
  `u_agree` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `u_name`, `u_date_of_birth`, `u_email`, `u_phone`, `u_phone_code`, `NIDpassNumber`, `u_address`, `u_area`, `u_country`, `u_file`, `u_pic`, `u_status`, `u_member_id`, `u_password`, `u_validity`, `u_ip`, `u_type`, `u_agree`) VALUES
(26, 'Oshit Sutra Dar', '2018-04-28', 'Oshit@gmail.com', '01883847733', '0088', NULL, '', '1', '1', '19150313155ae056047a562.png', NULL, 'a', 'oshitsd', '6c671a68abdfcf1f625f499d56b46a0b', '2018-06-25', NULL, NULL, 1),
(27, 'Rahul Banarje', '1996-01-01', 'rahul@gmail.com', '01862534183', '0088', NULL, 'Feni', '1', '1', '7378240975ae3f81bcad33.png', '0', 'a', 'Rahul', '0bbd95d0d082f49e4a24a9f473974cd1', '2018-06-28', NULL, NULL, 1),
(36, 'Bappy Sutra Dar', NULL, 'sd.oshit@gmail.com', '01883847733', '0088', '01875324581545', NULL, NULL, NULL, '0', '4691694465af2c1d8010df.jpg', 'a', 'bappysd', 'f3a9b62860940199dcdd6434369084b4', '2018-08-07', NULL, NULL, 1),
(37, 'Nahian Hasan', NULL, 'rasti18@gmail.com', '01676611594', '0088', '852365411253695200', NULL, NULL, NULL, '0', NULL, 'a', 'nahian', 'e10adc3949ba59abbe56e057f20f883e', '2018-08-07', NULL, NULL, 1),
(38, 'Baker Hasan', NULL, '', '01840314188', '0088', '15879989897545454', NULL, NULL, NULL, '0', NULL, 'a', 'baker', '35c912de89b0d7dbda9af9c2cee78fa9', '2018-06-07', NULL, NULL, 1),
(39, 'Ratul', '0000-00-00', '', '01883847733', '0088', '75987348579345', 'Kawran Bazar', '1', '1', '0', NULL, 'a', 'Ratul', '64c08ca6b03ea1e208c7c5bc136a1005', '2018-08-07', NULL, NULL, 1),
(40, 'Jasim', NULL, 'Oshit@gmail.com', '01883847733', '0088', '456345645645645645', NULL, NULL, NULL, '0', NULL, 'a', '11111', 'b0baee9d279d34fa1dfd71aadb908c3f', '2018-06-09', NULL, NULL, 1),
(41, 'Oshit Sutra Dar', NULL, 'Oshit@gmail.com', '01883847733', '0088', '456345645645645645', NULL, NULL, NULL, '0', NULL, 'a', 'oshitsd', '6c671a68abdfcf1f625f499d56b46a0b', '2018-06-06', NULL, NULL, 1),
(42, 'abc', NULL, 'oshitsd99@gmail.com', '01883847733', '1', '456345645645645645', NULL, NULL, NULL, '0', NULL, 'a', 'abc', '96e79218965eb72c92a549dd5a330112', '2018-10-01', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_admin`
--
ALTER TABLE `create_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_about_us`
--
ALTER TABLE `footer_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_contact_us`
--
ALTER TABLE `footer_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricetype`
--
ALTER TABLE `pricetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_access`
--
ALTER TABLE `tbl_access`
  ADD PRIMARY KEY (`acs_id`);

--
-- Indexes for table `tbl_admin_access`
--
ALTER TABLE `tbl_admin_access`
  ADD PRIMARY KEY (`aa_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `tbl_category_details`
--
ALTER TABLE `tbl_category_details`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `tbl_check_date`
--
ALTER TABLE `tbl_check_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`cty_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_corporate`
--
ALTER TABLE `tbl_corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_payment_details`
--
ALTER TABLE `tbl_payment_details`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_phone_code`
--
ALTER TABLE `tbl_phone_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  ADD PRIMARY KEY (`ter_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_admin`
--
ALTER TABLE `create_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `footer_about_us`
--
ALTER TABLE `footer_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_contact_us`
--
ALTER TABLE `footer_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pricetype`
--
ALTER TABLE `pricetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_access`
--
ALTER TABLE `tbl_access`
  MODIFY `acs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_admin_access`
--
ALTER TABLE `tbl_admin_access`
  MODIFY `aa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_category_details`
--
ALTER TABLE `tbl_category_details`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_check_date`
--
ALTER TABLE `tbl_check_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `cty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_corporate`
--
ALTER TABLE `tbl_corporate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment_details`
--
ALTER TABLE `tbl_payment_details`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_phone_code`
--
ALTER TABLE `tbl_phone_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  MODIFY `ter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
