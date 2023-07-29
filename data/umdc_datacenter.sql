-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2021 at 05:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umdc_datacenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `um_my_project`
--

CREATE TABLE `um_my_project` (
  `um_project` int(1) NOT NULL,
  `um_project_name` text NOT NULL,
  `um_project_address` text NOT NULL,
  `um_system_title` text NOT NULL,
  `um_year_origin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `um_my_project`
--

INSERT INTO `um_my_project` (`um_project`, `um_project_name`, `um_project_address`, `um_system_title`, `um_year_origin`) VALUES
(1, 'SMS Project', 'San Jose, Digos City', '', '2021-01-30 11:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `um_notification`
--

CREATE TABLE `um_notification` (
  `um_notif_id` int(100) NOT NULL,
  `um_notif_type` text NOT NULL,
  `um_notif_text` text NOT NULL,
  `um_notif_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `um_notification`
--

INSERT INTO `um_notification` (`um_notif_id`, `um_notif_type`, `um_notif_text`, `um_notif_date`) VALUES
(1, '', 'Login Notification by devmaster', '2021-01-30 03:13:23'),
(2, '', 'Login Notification by devmaster', '2021-01-30 03:13:24'),
(3, '', 'sample is added to products by devmaster', '2021-01-30 03:14:26'),
(4, '', 'Logout Notification by Cashier 1', '2021-01-30 14:14:55'),
(5, '', 'Login Notification by Inventory 1', '2021-01-30 02:15:08'),
(6, '', ' SURGICEP  Product Update -> Product Description:  SURGICEP  -> SURGICEP  ,  by Inventory 1', '2021-01-30 14:15:21'),
(7, '', ' Cefuroxime AXET    6-22 500mg Product Update -> Product Description:  Cefuroxime AXET    6-22 500mg -> Cefuroxime AXET    6-22 500mg ,  by Inventory 1', '2021-01-30 14:15:26'),
(8, '', ' Cefuroxime Susp ZINAXIME   8-21 250mg Product Update -> Product Description:  Cefuroxime Susp ZINAXIME   8-21 250mg -> Cefuroxime Susp ZINAXIME   8-21 250mg ,  by Inventory 1', '2021-01-30 14:15:32'),
(9, '', ' N95 MASK   Product Update -> Product Description:  N95 MASK   -> N95 MASK   ,  by Inventory 1', '2021-01-30 14:15:37'),
(10, '', ' NATURE-C  500mg Product Update -> Product Description:  NATURE-C  500mg -> NATURE-C  500mg ,  by Inventory 1', '2021-01-30 14:15:41'),
(11, '', ' ORTHROAT   11-24  Product Update -> Product Description:  ORTHROAT   11-24  -> ORTHROAT   11-24  ,  by Inventory 1', '2021-01-30 14:15:45'),
(12, '', ' ROWATINEX   5-23  Product Update -> Product Description:  ROWATINEX   5-23  -> ROWATINEX   5-23  ,  by Inventory 1', '2021-01-30 14:15:49'),
(13, '', ' SINUPRET  8-21  Product Update -> Product Description:  SINUPRET  8-21  -> SINUPRET  8-21  ,  by Inventory 1', '2021-01-30 14:15:53'),
(14, '', ' SOLFI GREEN   10-21  Product Update -> Product Description:  SOLFI GREEN   10-21  -> SOLFI GREEN   10-21  ,  by Inventory 1', '2021-01-30 14:15:58'),
(15, '', 'Logout Notification by Inventory 1', '2021-01-30 14:17:50'),
(16, '', 'Login Notification by devmaster', '2021-01-30 04:17:27'),
(17, '', 'Login Notification by devmaster', '2021-01-30 04:41:12'),
(18, '', 'Kent John Gocotano - added as new patient by devmaster', '2021-01-30 16:42:36'),
(19, '', 'Joane May Delima - added as new patient by devmaster', '2021-01-30 16:43:05'),
(20, '', 'Prescription Alert by devmaster Pull-Out Code No. 1001 by devmaster', '2021-01-30 16:46:20'),
(21, '', 'Prescription Alert by devmaster Pull-Out Code No. 1002 by devmaster', '2021-01-30 17:28:55'),
(22, '', 'Losartan ANIN-50  7-23 50mg Product Update ->  by devmaster', '2021-01-30 17:32:08'),
(23, '', 'Professional Fee is added to products by devmaster', '2021-01-30 17:34:38'),
(24, '', 'HBA1C Fee is added to products by devmaster', '2021-01-30 17:36:04'),
(25, '', 'Prescription Alert by devmaster Pull-Out Code No. 1003 by devmaster', '2021-01-30 17:38:56'),
(26, '', 'Login Notification by Inventory 1', '2021-01-30 05:53:32'),
(27, '', 'Logout Notification by Inventory 1', '2021-01-30 17:53:53'),
(28, '', 'Login Notification by Cashier 1', '2021-01-30 05:53:57'),
(29, '', 'Login Notification by devmaster', '2021-01-30 05:59:24'),
(30, '', ' is added to system users by devmaster', '2021-01-30 18:05:21'),
(31, '', 'Logout Notification by devmaster', '2021-01-30 18:06:00'),
(32, '', 'Login Notification by Dr. Emerson', '2021-01-30 06:06:03'),
(33, '', 'Login Notification by devmaster', '2021-02-03 09:22:30'),
(34, '', 'NEBULIZER is added to products by devmaster', '2021-02-03 10:19:24'),
(35, 'inout', 'Login Notification by devmaster', '2021-06-07 01:06:20'),
(36, 'inout', 'Logout by devmaster', '2021-06-07 13:42:56'),
(37, 'inout', 'Logout by ', '2021-06-07 13:46:29'),
(38, 'inout', 'Login Notification by devmaster', '2021-06-07 10:53:00'),
(39, 'inout', 'Logout by devmaster', '2021-06-07 22:53:03'),
(40, 'inout', 'Login Notification by Joane Mayy', '2021-06-07 11:01:06'),
(41, 'inout', 'Logout by Joane Mayy', '2021-06-07 23:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `um_optimum_secure`
--

CREATE TABLE `um_optimum_secure` (
  `um_sec_id` int(11) NOT NULL,
  `um_sec_value` varchar(200) NOT NULL,
  `um_sec_type` text NOT NULL,
  `um_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `um_optimum_secure`
--

INSERT INTO `um_optimum_secure` (`um_sec_id`, `um_sec_value`, `um_sec_type`, `um_user_id`) VALUES
(1, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'delete_product', 8),
(2, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'add_discount', 8),
(3, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'delete_sales', 8),
(5, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'delete_trans', 8),
(13, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'ref_rep', 8),
(15, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'restock_pullout_stock_transfer', 8),
(16, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'users', 8),
(17, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'delete_supplier', 8),
(18, '/5MZeYfLpL94X+S7IW1mT2+2xLdqLT8Z7letcvhrqZA=', 'delete_pin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `um_otpref`
--

CREATE TABLE `um_otpref` (
  `um_otp_id` int(11) NOT NULL,
  `um_otp_serial` text NOT NULL,
  `um_otp_num` varchar(6) NOT NULL,
  `um_user_code` varchar(10) NOT NULL,
  `um_otp_datereg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `um_otpref`
--

INSERT INTO `um_otpref` (`um_otp_id`, `um_otp_serial`, `um_otp_num`, `um_user_code`, `um_otp_datereg`) VALUES
(1, 'anlCmIgBuyZlneohVLqU', '185455', 'RxjY-58694', '2021-06-07 21:37:46'),
(2, 'mQtmipPrPusTwMvCgvsx', '752824', 'uaPq-78416', '2021-06-07 22:43:31'),
(3, 'luVqOrjLIVSHJVooaUzq', '140204', 'fGkq-69729', '2021-06-07 22:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `um_user`
--

CREATE TABLE `um_user` (
  `um_user_id` int(10) NOT NULL,
  `um_user_code` varchar(10) NOT NULL,
  `um_full_name` varchar(255) NOT NULL,
  `um_username` varchar(50) NOT NULL,
  `um_password` varchar(100) NOT NULL,
  `um_user_type` int(5) NOT NULL,
  `um_user_status` int(1) NOT NULL,
  `um_user_verify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `um_user`
--

INSERT INTO `um_user` (`um_user_id`, `um_user_code`, `um_full_name`, `um_username`, `um_password`, `um_user_type`, `um_user_status`, `um_user_verify`) VALUES
(1, '0', 'devmaster', 'kjohn0319@gmail.com', 'gozElr3tOF4jED67gzd4r2smH2NWy83w+P89isjSSgM=', 0, 0, 1),
(5, 'RxjY-58694', 'kent john', 'keanemay2020@gmail.com', 'gozElr3tOF4jED67gzd4r2smH2NWy83w+P89isjSSgM=', 1, 0, 1),
(6, 'uaPq-78416', 'John Gates', 'itskeane17@gmail.com', 'gozElr3tOF4jED67gzd4r2smH2NWy83w+P89isjSSgM=', 1, 0, 1),
(7, 'fGkq-69729', 'Joane Mayy', 'joanemaydelima@gmail.com', 'gozElr3tOF4jED67gzd4r2smH2NWy83w+P89isjSSgM=', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `um_my_project`
--
ALTER TABLE `um_my_project`
  ADD PRIMARY KEY (`um_project`);

--
-- Indexes for table `um_notification`
--
ALTER TABLE `um_notification`
  ADD PRIMARY KEY (`um_notif_id`);

--
-- Indexes for table `um_optimum_secure`
--
ALTER TABLE `um_optimum_secure`
  ADD PRIMARY KEY (`um_sec_id`);

--
-- Indexes for table `um_otpref`
--
ALTER TABLE `um_otpref`
  ADD PRIMARY KEY (`um_otp_id`);

--
-- Indexes for table `um_user`
--
ALTER TABLE `um_user`
  ADD PRIMARY KEY (`um_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `um_my_project`
--
ALTER TABLE `um_my_project`
  MODIFY `um_project` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `um_notification`
--
ALTER TABLE `um_notification`
  MODIFY `um_notif_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `um_optimum_secure`
--
ALTER TABLE `um_optimum_secure`
  MODIFY `um_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `um_otpref`
--
ALTER TABLE `um_otpref`
  MODIFY `um_otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `um_user`
--
ALTER TABLE `um_user`
  MODIFY `um_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
