-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 12:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phishdefender`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(100) NOT NULL,
  `notif_type` text NOT NULL,
  `notif_text` text NOT NULL,
  `notif_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `notif_type`, `notif_text`, `notif_date`) VALUES
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(1) NOT NULL,
  `project_name` text NOT NULL,
  `project_address` text NOT NULL,
  `project_title` text NOT NULL,
  `project_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_address`, `project_title`, `project_created`) VALUES
(1, 'Phish Defender', 'San Jose, Digos City', '', '2021-01-30 11:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_reference` varchar(30) NOT NULL,
  `report_link` text NOT NULL,
  `report_description` varchar(255) NOT NULL,
  `report_email` varchar(100) NOT NULL,
  `report_status` int(1) NOT NULL,
  `report_created` datetime NOT NULL,
  `report_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_reference`, `report_link`, `report_description`, `report_email`, `report_status`, `report_created`, `report_updated`) VALUES
(1, '4iDSTqHuE6AEwzw07QIycXAxZoHpZC', 'https://hpanel.hostinger.com/', 'asdadadhakj sakldhadlkajsdhkla asdlashdhasklda', 'keanemay2020@gmail.com', 0, '2023-07-29 11:06:00', '2023-07-29 11:06:00'),
(2, 'PXV6XfA2V6RvU7EUAH1eCdogJyEOmS', 'https://hpanel.hostinger.com/', 'asdjahd hlasdhladhaskldahkd lkahdlkashdalksd', 'keanemay2020@gmail.com', 0, '2023-07-29 11:12:55', '2023-07-29 11:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_uid` int(11) NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` int(5) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_verify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_uid`, `user_code`, `user_fullname`, `user_username`, `user_password`, `user_type`, `user_status`, `user_verify`) VALUES
(1, '0', 'devmaster', 'kjohn0319@gmail.com', 'gozElr3tOF4jED67gzd4r2smH2NWy83w+P89isjSSgM=', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
