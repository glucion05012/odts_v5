-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 17, 2024 at 02:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `odts_v5`
--

-- --------------------------------------------------------

--
-- Table structure for table `conf_action`
--

CREATE TABLE `conf_action` (
  `id` int(11) NOT NULL,
  `action` varchar(100) DEFAULT NULL,
  `display` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conf_category`
--

CREATE TABLE `conf_category` (
  `id` int(11) NOT NULL,
  `main_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conf_sub_category`
--

CREATE TABLE `conf_sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `sub_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conf_user_access`
--

CREATE TABLE `conf_user_access` (
  `id` int(20) NOT NULL,
  `userid` varchar(200) DEFAULT NULL,
  `dms_settings` varchar(200) DEFAULT NULL,
  `confidential` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conf_user_access`
--

INSERT INTO `conf_user_access` (`id`, `userid`, `dms_settings`, `confidential`) VALUES
(1, '1520', '1', '1'),
(2, '1581', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `dms_attachments`
--

CREATE TABLE `dms_attachments` (
  `id` int(20) NOT NULL,
  `dms_transaction_id` int(20) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `timestamp_date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_attachments`
--

INSERT INTO `dms_attachments` (`id`, `dms_transaction_id`, `file_name`, `file_location`, `date_uploaded`, `timestamp_date_uploaded`, `type`) VALUES
(62, 46, '54549781-198f-49b6-8555-564f538db6e1.jpg', '/assets/attachments/dms//54549781-198f-49b6-8555-564f538db6e1.jpg', '2024-11-11', '2024-11-11 01:29:18', 'dms'),
(63, 46, 'Guidelines for assisting clients on CRS Registration (1).pptx', '/assets/attachments/dms//Guidelines for assisting clients on CRS Registration (1).pptx', '2024-11-11', '2024-11-11 01:29:18', 'dms'),
(64, 65, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/ODTS-NCR-2024-000081/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 12:05:55', 'dms'),
(65, 67, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/67/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 12:10:46', 'dms'),
(66, 68, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/ODTS-NCR-2024-000084/68/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 12:13:19', 'dms'),
(67, 69, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/ODTS-NCR-2024-000085/69/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 12:16:48', 'dms'),
(68, 69, 'ID_Giddel (1).png', '/assets/attachments/dms/ODTS-NCR-2024-000085/69/ID_Giddel (1).png', '2024-11-13', '2024-11-13 12:16:48', 'dms'),
(69, 71, 'CRS Tally for September 20-23 2024.docx', '/assets/attachments/dms/ODTS-NCR-2024-000085/71/CRS Tally for September 20-23 2024.docx', '2024-11-13', '2024-11-13 12:22:56', 'dms'),
(70, 82, 'ID_Giddel (1).png', '/assets/attachments/dms/ODTS-NCR-2024-000069/82/ID_Giddel (1).png', '2024-11-13', '2024-11-13 12:47:58', 'dms'),
(71, 83, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/ODTS-NCR-2024-000086/83/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 15:40:34', 'dms'),
(72, 84, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/ODTS-NCR-2024-000087/84/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 15:46:43', 'dms'),
(73, 85, 'Acer_Wallpaper_01_3840x2400.jpg', '/assets/attachments/dms/ODTS-NCR-2024-000088/85/Acer_Wallpaper_01_3840x2400.jpg', '2024-11-13', '2024-11-13 16:06:59', 'dms'),
(74, 86, 'Acer_Wallpaper_01_3840x2400.jpg', '/assets/attachments/dms/ODTS-NCR-2024-000089/86/Acer_Wallpaper_01_3840x2400.jpg', '2024-11-13', '2024-11-13 16:15:47', 'dms'),
(75, 86, 'Acer_Wallpaper_01_3840x2400.jpg', '/assets/attachments/dms/ODTS-NCR-2024-000089/86/Acer_Wallpaper_01_3840x2400.jpg', '2024-11-13', '2024-11-13 16:15:47', 'dms'),
(76, 87, 'Department of Environment and Natural Resources.pdf', '/assets/attachments/dms/ODTS-NCR-2024-000089/87/Department of Environment and Natural Resources.pdf', '2024-11-13', '2024-11-13 16:16:34', 'dms'),
(77, 88, 'ODTSv5 (1).jpg', '/assets/attachments/dms/ODTS-NCR-2024-000089/88/ODTSv5 (1).jpg', '2024-11-13', '2024-11-13 16:18:53', 'dms');

-- --------------------------------------------------------

--
-- Table structure for table `dms_dms`
--

CREATE TABLE `dms_dms` (
  `id` int(20) NOT NULL,
  `reference_no` varchar(200) DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `sub_category_id` int(20) DEFAULT NULL,
  `subject_name` text DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `created_by_id` varchar(200) DEFAULT NULL,
  `date_created` varchar(200) DEFAULT NULL,
  `timestamp_date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_dms`
--

INSERT INTO `dms_dms` (`id`, `reference_no`, `category_id`, `sub_category_id`, `subject_name`, `document_type`, `created_by_id`, `date_created`, `timestamp_date_created`, `status`) VALUES
(62, 'ODTS-NCR-2024-000062', 4, 6, '11111111', 'For Compliance', '1520', '2024-11-11', '2024-11-11 01:27:19', 'Active'),
(63, 'ODTS-NCR-2024-000063', 4, 6, 'aaaa', 'For Compliance', '1520', '2024-11-11', '2024-11-11 01:29:17', 'Active'),
(64, 'ODTS-NCR-2024-000064', 4, 6, '123123123', 'For Compliance', '1520', '2024-11-11', '2024-11-13 12:35:28', 'Inactive'),
(65, 'ODTS-NCR-2024-000065', 4, 6, '1', 'For Compliance', '1520', '2024-11-13', '2024-11-13 12:37:08', 'Inactive'),
(66, 'ODTS-NCR-2024-000066', 4, 6, '1', 'For Compliance', '1520', '2024-11-13', '2024-11-13 12:38:18', 'Inactive'),
(67, 'ODTS-NCR-2024-000067', 4, 6, '2', 'For Compliance', '1520', '2024-11-13', '2024-11-13 12:40:18', 'Inactive'),
(68, 'ODTS-NCR-2024-000068', 4, 6, '1', 'For Compliance', '1520', '2024-11-13', '2024-11-13 12:46:15', 'Inactive'),
(69, 'ODTS-NCR-2024-000069', 5, 8, '2', 'For Compliance', '1520', '2024-11-13', '2024-11-13 12:47:58', 'Inactive'),
(70, 'ODTS-NCR-2024-000070', 4, 6, '3', 'For Compliance', '1520', '2024-11-13', '2024-11-13 09:22:21', 'Active'),
(71, 'ODTS-NCR-2024-000071', 4, 6, '1', 'For Compliance', '1520', '2024-11-13', '2024-11-13 09:28:53', 'Active'),
(72, 'ODTS-NCR-2024-000072', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 09:31:27', 'Active'),
(73, 'ODTS-NCR-2024-000073', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 09:35:37', 'Active'),
(74, 'ODTS-NCR-2024-000074', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 09:36:09', 'Active'),
(75, 'ODTS-NCR-2024-000075', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 09:36:42', 'Active'),
(76, 'ODTS-NCR-2024-000076', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 09:37:15', 'Active'),
(77, 'ODTS-NCR-2024-000077', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 09:41:05', 'Active'),
(78, 'ODTS-NCR-2024-000078', 4, 6, '1', 'For Compliance', '1520', '2024-11-13', '2024-11-13 11:25:05', 'Active'),
(79, 'ODTS-NCR-2024-000079', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 11:39:30', 'Active'),
(80, 'ODTS-NCR-2024-000080', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 11:51:38', 'Active'),
(81, 'ODTS-NCR-2024-000081', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 12:05:55', 'Active'),
(82, 'ODTS-NCR-2024-000082', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 12:09:22', 'Active'),
(83, 'ODTS-NCR-2024-000083', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 12:10:44', 'Active'),
(84, 'ODTS-NCR-2024-000084', 0, 0, '', '', '1520', '2024-11-13', '2024-11-13 12:13:18', 'Active'),
(85, 'ODTS-NCR-2024-000085', 4, 7, 'test', 'For Compliance', '1520', '2024-11-13', '2024-11-13 12:29:34', 'Inactive'),
(86, 'ODTS-NCR-2024-000086', 4, 6, 'adfafdas', 'For Compliance', '1520', '2024-11-13', '2024-11-13 15:40:34', 'Active'),
(87, 'ODTS-NCR-2024-000087', 4, 7, 'wdfsdf', 'Confidential', '1520', '2024-11-13', '2024-11-13 15:46:43', 'Active'),
(88, 'ODTS-NCR-2024-000088', 4, 6, '123', 'For Compliance', '1520', '2024-11-13', '2024-11-13 16:06:59', 'Active'),
(89, 'ODTS-NCR-2024-000089', 4, 6, '123', 'Confidential', '1520', '2024-11-13', '2024-11-13 16:15:47', 'Active'),
(90, 'ODTS-NCR-2024-000090', 4, 6, 'test', 'For Compliance', '1581', '2024-11-17', '2024-11-17 13:07:12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dms_transaction`
--

CREATE TABLE `dms_transaction` (
  `id` int(20) NOT NULL,
  `dms_id` varchar(200) DEFAULT NULL,
  `office_id` varchar(200) DEFAULT NULL,
  `forwarded_by_id` varchar(200) DEFAULT NULL,
  `forwarded_date` varchar(200) DEFAULT NULL,
  `timestamp_forwarded_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `forwarded_to_id` varchar(200) DEFAULT NULL,
  `accepted_date` varchar(200) DEFAULT NULL,
  `timestamp_accepted_date` varchar(200) DEFAULT NULL,
  `action_id` varchar(200) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `attachment_type` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_transaction`
--

INSERT INTO `dms_transaction` (`id`, `dms_id`, `office_id`, `forwarded_by_id`, `forwarded_date`, `timestamp_forwarded_date`, `forwarded_to_id`, `accepted_date`, `timestamp_accepted_date`, `action_id`, `remarks`, `attachment_type`, `status`) VALUES
(45, '62', '1', '1520', '2024-11-11', '2024-11-11 01:27:19', '1581', NULL, NULL, '4', '2222222', NULL, 'Pending'),
(46, '63', '1', '1520', '2024-11-11', '2024-11-11 01:29:17', '1581', NULL, NULL, '4', 'bbbb', NULL, 'Pending'),
(47, '64', '1', '1520', '2024-11-11', '2024-11-11 05:13:55', '1581', '2024-11-11', '2024-11-11 01:13:55', '8', '12312312', NULL, 'Pending'),
(48, '64', '1', '1581', '2024-11-11', '2024-11-13 12:35:04', '1520', '2024-11-13', '2024-11-13 08:35:04', '4', '123123', NULL, 'Pending'),
(49, '65', '1', '1520', '2024-11-13', '2024-11-13 12:36:43', '1520', '2024-11-13', '2024-11-13 08:36:43', '4', '1', NULL, 'Pending'),
(50, '66', '1', '1520', '2024-11-13', '2024-11-13 12:37:57', '1520', '2024-11-13', '2024-11-13 08:37:57', '4', '1', NULL, 'Pending'),
(51, '67', '1', '1520', '2024-11-13', '2024-11-13 12:39:56', '1520', '2024-11-13', '2024-11-13 08:39:56', '4', '2', NULL, 'Pending'),
(52, '68', '1', '1520', '2024-11-13', '2024-11-13 12:45:56', '1520', '2024-11-13', '2024-11-13 08:45:56', '4', '1', NULL, 'Pending'),
(53, '69', '1', '1520', '2024-11-13', '2024-11-13 12:47:35', '1520', '2024-11-13', '2024-11-13 08:47:35', '4', '2', NULL, 'Pending'),
(54, '70', '1', '1520', '2024-11-13', '2024-11-13 09:22:21', '1520', NULL, NULL, '4', '3', NULL, 'Pending'),
(55, '71', '1', '1520', '2024-11-13', '2024-11-13 09:28:53', '1520', NULL, NULL, '4', '1', NULL, 'Pending'),
(56, '72', '', '1520', '2024-11-13', '2024-11-13 09:31:27', '', NULL, NULL, '', '', NULL, 'Pending'),
(57, '73', '', '1520', '2024-11-13', '2024-11-13 09:35:37', '', NULL, NULL, '', '', NULL, 'Pending'),
(58, '74', '', '1520', '2024-11-13', '2024-11-13 09:36:09', '', NULL, NULL, '', '', NULL, 'Pending'),
(59, '75', '', '1520', '2024-11-13', '2024-11-13 09:36:42', '', NULL, NULL, '', '', NULL, 'Pending'),
(60, '76', '', '1520', '2024-11-13', '2024-11-13 09:37:15', '', NULL, NULL, '', '', NULL, 'Pending'),
(61, '77', '', '1520', '2024-11-13', '2024-11-13 09:41:05', '', NULL, NULL, '', '', NULL, 'Pending'),
(62, '78', '1', '1520', '2024-11-13', '2024-11-13 11:25:05', '1520', NULL, NULL, '4', '1', NULL, 'Pending'),
(63, '79', '', '1520', '2024-11-13', '2024-11-13 11:39:30', '', NULL, NULL, '', '', NULL, 'Pending'),
(64, '80', '', '1520', '2024-11-13', '2024-11-13 11:51:38', '', NULL, NULL, '', '', NULL, 'Pending'),
(65, '81', '', '1520', '2024-11-13', '2024-11-13 12:05:55', '', NULL, NULL, '', '', NULL, 'Pending'),
(66, '82', '', '1520', '2024-11-13', '2024-11-13 12:09:22', '', NULL, NULL, '', '', NULL, 'Pending'),
(67, '83', '', '1520', '2024-11-13', '2024-11-13 12:10:44', '', NULL, NULL, '', '', NULL, 'Pending'),
(68, '84', '', '1520', '2024-11-13', '2024-11-13 12:13:18', '', NULL, NULL, '', '', NULL, 'Pending'),
(69, '85', '1', '1520', '2024-11-13', '2024-11-13 12:17:28', '1520', '2024-11-13', '2024-11-13 08:17:28', '4', 'test2', NULL, 'Pending'),
(70, '85', '1', '1520', '2024-11-13', '2024-11-13 12:22:06', '1520', '2024-11-13', '2024-11-13 08:22:06', '8', 'sfsdf', NULL, 'Pending'),
(71, '85', '1', '1520', '2024-11-13', '2024-11-13 12:24:49', '1520', '2024-11-13', '2024-11-13 08:24:49', '4', '1', NULL, 'Pending'),
(72, '85', '1', '1520', '2024-11-13', '2024-11-13 12:29:34', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(73, '85', '1', '1520', '2024-11-13', '2024-11-13 12:31:22', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(74, '85', '1', '1520', '2024-11-13', '2024-11-13 12:31:53', '1520', NULL, NULL, '4', '1', NULL, 'Pending'),
(75, '85', '1', '1520', '2024-11-13', '2024-11-13 12:32:37', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(76, '64', '1', '1520', '2024-11-13', '2024-11-13 12:35:28', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(77, '64', '1', '1520', '2024-11-13', '2024-11-13 12:36:31', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(78, '65', '1', '1520', '2024-11-13', '2024-11-13 12:37:08', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(79, '66', '1', '1520', '2024-11-13', '2024-11-13 12:38:18', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(80, '67', '1', '1520', '2024-11-13', '2024-11-13 12:40:18', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(81, '68', '1', '1520', '2024-11-13', '2024-11-13 12:46:15', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(82, '69', '1', '1520', '2024-11-13', '2024-11-13 12:47:58', '1520', NULL, NULL, '0', '1', NULL, 'Closed'),
(83, '86', '1', '1520', '2024-11-13', '2024-11-13 15:40:34', '1520', NULL, NULL, '4', '1', NULL, 'Pending'),
(84, '87', '1', '1520', '2024-11-13', '2024-11-13 15:49:05', '1520', '2024-11-13', '2024-11-13 11:49:05', '4', '231', NULL, 'Pending'),
(85, '88', '1', '1520', '2024-11-13', '2024-11-13 16:06:59', '1520', NULL, NULL, '4', '123', 'Hard Copy', 'Pending'),
(86, '89', '1', '1520', '2024-11-13', '2024-11-13 16:16:07', '1520', '2024-11-14', '2024-11-14 12:16:07', '4', '123', 'Attachment', 'Pending'),
(87, '89', '1', '1520', '2024-11-13', '2024-11-13 16:18:23', '1520', '2024-11-14', '2024-11-14 12:18:23', '4', 'fsd', 'Hard Copy', 'Pending'),
(88, '89', '1', '1520', '2024-11-13', '2024-11-13 16:18:53', '1581', NULL, NULL, '4', '32', 'Hard Copy', 'Pending'),
(89, '90', '1', '1581', '2024-11-17', '2024-11-17 13:07:12', '1669', NULL, NULL, '4', 'sadf', 'Hard Copy', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conf_action`
--
ALTER TABLE `conf_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_category`
--
ALTER TABLE `conf_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_sub_category`
--
ALTER TABLE `conf_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_user_access`
--
ALTER TABLE `conf_user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dms_attachments`
--
ALTER TABLE `dms_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dms_dms`
--
ALTER TABLE `dms_dms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dms_transaction`
--
ALTER TABLE `dms_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conf_action`
--
ALTER TABLE `conf_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conf_category`
--
ALTER TABLE `conf_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conf_sub_category`
--
ALTER TABLE `conf_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conf_user_access`
--
ALTER TABLE `conf_user_access`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dms_attachments`
--
ALTER TABLE `dms_attachments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `dms_dms`
--
ALTER TABLE `dms_dms`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `dms_transaction`
--
ALTER TABLE `dms_transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;
