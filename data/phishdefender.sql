-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 12:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
-- Table structure for table `dataloads`
--

CREATE TABLE `dataloads` (
  `dataload_id` int(11) NOT NULL,
  `dataload_count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataloads`
--

INSERT INTO `dataloads` (`dataload_id`, `dataload_count`) VALUES
(1, 64);

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
(41, 'inout', 'Logout by Joane Mayy', '2021-06-07 23:01:11'),
(42, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-10 16:38:18'),
(43, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-11 16:03:44'),
(44, 'auth', 'Logout - kjohn0319@gmail.com', '2023-08-11 23:05:36'),
(45, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-11 23:06:39'),
(46, 'auth', 'Logout - kjohn0319@gmail.com', '2023-08-11 23:06:41'),
(47, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-11 23:08:05'),
(48, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-13 19:38:12'),
(49, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-14 15:15:27'),
(50, 'auth', 'Logout - kjohn0319@gmail.com', '2023-08-14 20:11:20'),
(51, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-14 20:17:03'),
(52, 'auth', 'Logout - kjohn0319@gmail.com', '2023-08-14 20:45:56'),
(53, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-14 20:54:06'),
(54, 'auth', 'Login - kjohn0319@gmail.com', '2023-08-16 15:26:09'),
(55, 'auth', 'Logout - kjohn0319@gmail.com', '2023-08-16 18:40:26');

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
(1, 'Phishlook', 'San Jose, Digos City', '', '2021-01-30 11:27:07');

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
(3, 'PNobMn3e30R4QyD4QJ0FrRDy2Qrfqi', 'https://www.canva.com/', 'aasdasd asdasdasda asdasdasd', 'player.mir100@gmail.com', 0, '2023-08-14 19:03:48', '2023-08-14 19:03:48'),
(4, 'eSPVAuxU8j4xFiBqCE24AxWevBHkPM', 'https://www.twitch.tv/', 'asdasdakj asdasd asdasdasdas', 'sample@gmail.com', 0, '2023-08-14 20:55:28', '2023-08-14 20:55:28');

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
(1, '0', 'devmaster', 'kjohn0319@gmail.com', 'ea439fbdaa955099ec9ad4a96a3a81bd', 0, 0, 1),
(8, '1E6BlTKprV', 'John Gatess', 'empty@gmail.com', 'ea439fbdaa955099ec9ad4a96a3a81bd', 0, 0, 1),
(9, 'm2mrJWIIaV', 'Christoffer', 'jasongray@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visited_sites`
--

CREATE TABLE `visited_sites` (
  `vis_id` int(11) NOT NULL,
  `vis_link` text NOT NULL,
  `vis_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visited_sites`
--

INSERT INTO `visited_sites` (`vis_id`, `vis_link`, `vis_created`) VALUES
(4, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=phishdefender&table=visited_sites', '2023-08-14 20:31:51'),
(7, 'https://www.canva.com/', '2023-08-14 20:32:58'),
(8, 'http://localhost/pdadmin/alert', '2023-08-14 20:32:58'),
(9, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=phishdefender&table=dataloads', '2023-08-14 20:33:22'),
(11, 'https://www.youtube.com/', '2023-08-14 20:34:56'),
(12, 'http://localhost/phpmyadmin/index.php?route=/sql&db=phishdefender&table=dataloads&pos=0', '2023-08-14 20:35:00'),
(15, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=phishdefender&table=visited_sites', '2023-08-14 20:36:25'),
(16, 'https://www.messenger.com/t/9306605789410614', '2023-08-14 20:39:55'),
(17, 'https://www.messenger.com/t/6510455735632311', '2023-08-14 20:40:18'),
(18, 'https://meet.google.com/', '2023-08-14 20:40:30'),
(19, 'https://meet.google.com/vyk-tbgq-jqs?ijlm=1692016855605&adhoc=1&hs=187', '2023-08-14 20:40:56'),
(20, 'https://meet.google.com/vyk-tbgq-jqs', '2023-08-14 20:40:57'),
(21, 'https://www.messenger.com/t/9306605789410614', '2023-08-14 20:42:00'),
(22, 'http://localhost/pdadmin/c/a/logout', '2023-08-14 20:45:57'),
(23, 'http://localhost/pdadmin/', '2023-08-14 20:45:58'),
(24, 'https://testsafebrowsing.appspot.com/', '2023-08-14 20:52:08'),
(25, 'https://testsafebrowsing.appspot.com/s/phishing.html', '2023-08-14 20:52:22'),
(26, 'http://localhost/pdadmin/alert', '2023-08-14 20:52:22'),
(27, 'https://www.youtube.com/', '2023-08-14 20:53:06'),
(28, 'https://www.bilibili.tv/', '2023-08-14 20:53:09'),
(29, 'https://www.bilibili.tv/en', '2023-08-14 20:53:10'),
(30, 'https://testsafebrowsing.appspot.com/', '2023-08-14 20:53:47'),
(31, 'http://localhost/pdadmin/c/a/', '2023-08-14 20:54:06'),
(32, 'http://localhost/pdadmin/c/a/pdatabase', '2023-08-14 20:54:16'),
(33, 'https://www.twitch.tv/', '2023-08-14 20:54:40'),
(34, 'http://localhost/pdadmin/report?urlStr=https://www.twitch.tv/', '2023-08-14 20:55:02'),
(35, 'http://localhost/pdadmin/pending?note=added', '2023-08-14 20:55:29'),
(36, 'http://localhost/pdadmin/c/a/', '2023-08-14 20:55:47'),
(37, 'http://localhost/pdadmin/c/a/reports', '2023-08-14 20:56:02'),
(38, 'http://localhost/pdadmin/c/a/reports?note=report_updated', '2023-08-14 20:56:33'),
(39, 'http://localhost/pdadmin/c/a/pdatabase', '2023-08-14 20:56:43'),
(40, 'https://www.twitch.tv/', '2023-08-14 20:56:58'),
(41, 'http://localhost/pdadmin/alert', '2023-08-14 20:56:58'),
(42, 'http://localhost/pdadmin/c/a/', '2023-08-14 20:57:33'),
(43, 'http://localhost/pdadmin/c/a/reports', '2023-08-14 20:58:34'),
(44, 'http://localhost/pdadmin/c/a/', '2023-08-14 20:58:40'),
(45, 'http://localhost/pdadmin/c/a/pdatabase', '2023-08-14 20:58:56'),
(46, 'http://localhost/pdadmin/c/a/reports', '2023-08-14 20:58:57'),
(47, 'http://localhost/pdadmin/c/a/users', '2023-08-14 20:58:58'),
(48, 'http://localhost/pdadmin/c/a/', '2023-08-14 20:59:12'),
(49, 'https://console.cloud.google.com/apis/dashboard?project=antiphishing-394107', '2023-08-14 20:59:29'),
(50, 'https://console.cloud.google.com/billing?project=antiphishing-394107', '2023-08-14 20:59:52'),
(51, 'https://console.cloud.google.com/apis/dashboard?project=antiphishing-394107', '2023-08-14 20:59:53'),
(52, 'https://console.cloud.google.com/billing/linkedaccount?project=antiphishing-394107', '2023-08-14 20:59:53'),
(53, 'https://console.cloud.google.com/billing/019D00-C3A240-99C512?project=antiphishing-394107', '2023-08-14 20:59:54'),
(54, 'https://console.cloud.google.com/billing/019D00-C3A240-99C512/budgets?project=antiphishing-394107', '2023-08-14 21:01:17'),
(55, 'https://phishtank.org/api_info.php', '2023-08-14 21:01:43'),
(56, 'https://phishtank.org/register.php', '2023-08-14 21:01:47'),
(57, 'https://www.google.com/search?q=phishtank+registration+disabled&oq=phishtank+registra&aqs=chrome.0.0i512j69i57j0i22i30j0i390i650l4.2852j0j7&sourceid=chrome&ie=UTF-8', '2023-08-14 21:02:00'),
(58, 'http://localhost/pdadmin/c/a/reports', '2023-08-14 21:07:40'),
(59, 'http://localhost/pdadmin/c/a/pdatabase', '2023-08-14 21:07:40'),
(60, 'http://localhost/pdadmin/c/a/reports', '2023-08-14 21:07:42'),
(61, 'http://localhost/pdadmin/c/a/reports?note=report_updated', '2023-08-14 21:07:49'),
(62, 'https://www.twitch.tv/', '2023-08-14 21:07:58'),
(63, 'https://www.messenger.com/', '2023-08-14 21:08:18'),
(64, 'https://www.messenger.com/t/9306605789410614', '2023-08-14 21:08:23'),
(65, 'https://meet.google.com/', '2023-08-14 21:08:25'),
(66, 'https://www.messenger.com/t/6510455735632311', '2023-08-14 21:08:27'),
(67, 'https://www.youtube.com/', '2023-08-14 21:10:08'),
(68, 'chrome://extensions/', '2023-08-14 21:10:11'),
(69, 'chrome://extensions/?errors=fchbamedhgfbcaejijfpjhamlbomlmlp', '2023-08-14 21:10:13'),
(70, 'chrome://extensions/', '2023-08-14 21:10:33'),
(71, 'https://www.youtube.com/', '2023-08-14 21:11:36'),
(72, 'https://www.youtube.com/', '2023-08-14 21:12:24'),
(73, 'chrome://extensions/', '2023-08-14 21:12:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataloads`
--
ALTER TABLE `dataloads`
  ADD PRIMARY KEY (`dataload_id`);

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
-- Indexes for table `visited_sites`
--
ALTER TABLE `visited_sites`
  ADD PRIMARY KEY (`vis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataloads`
--
ALTER TABLE `dataloads`
  MODIFY `dataload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visited_sites`
--
ALTER TABLE `visited_sites`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
