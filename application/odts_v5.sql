-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 05, 2024 at 10:23 AM
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
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conf_action`
--

INSERT INTO `conf_action` (`id`, `action`) VALUES
(4, 'For Approval'),
(8, 'For Appropriate Action'),
(9, 'For releasing'),
(10, 'For recommendation'),
(11, 'For reference/information'),
(12, 'For Barcoding'),
(13, 'For Revision');

-- --------------------------------------------------------

--
-- Table structure for table `conf_category`
--

CREATE TABLE `conf_category` (
  `id` int(11) NOT NULL,
  `main_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conf_category`
--

INSERT INTO `conf_category` (`id`, `main_category`) VALUES
(4, 'RECORDS'),
(5, 'ADMINISTRATIVE'),
(6, 'LEGAL'),
(7, 'PERMITTING');

-- --------------------------------------------------------

--
-- Table structure for table `conf_sub_category`
--

CREATE TABLE `conf_sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `sub_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conf_sub_category`
--

INSERT INTO `conf_sub_category` (`id`, `cat_id`, `sub_category`) VALUES
(6, '4', 'MEMORANDUM'),
(7, '4', 'SPECIAL ORDER'),
(8, '5', 'DAILY TIME RECORD'),
(9, '5', 'PURCHASE REQUEST'),
(10, '6', 'NOTICE OF VIOLATION'),
(11, '6', 'COMPLIANCE'),
(12, '7', 'FUS'),
(13, '7', 'WPS');

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
  `type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_attachments`
--

INSERT INTO `dms_attachments` (`id`, `dms_transaction_id`, `file_name`, `file_location`, `date_uploaded`, `type`) VALUES
(18, NULL, 'linkbiz payment.pdf', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/linkbiz payment.pdf', '2024-11-05', 'dms'),
(19, NULL, '20241021_111258.pdf', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/20241021_111258.pdf', '2024-11-05', 'dms'),
(20, NULL, '2024-10-15-STCP-21.pdf', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/2024-10-15-STCP-21.pdf', '2024-11-05', 'dms'),
(21, NULL, 'G Source - Copy.png', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/G Source - Copy.png', '2024-11-05', 'dms'),
(22, NULL, 'Draft-MPI-User-Enrollment-Form-for-DENR-NCR.xlsx', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/Draft-MPI-User-Enrollment-Form-for-DENR-NCR.xlsx', '2024-11-05', 'dms'),
(23, 19, 'Script_Client Registration System (1).docx', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/Script_Client Registration System (1).docx', '2024-11-05', 'dms');

-- --------------------------------------------------------

--
-- Table structure for table `dms_transaction`
--

CREATE TABLE `dms_transaction` (
  `id` int(20) NOT NULL,
  `reference_no` varchar(200) DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `sub_category_id` int(20) DEFAULT NULL,
  `subject_name` text DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `personnel_id` varchar(200) DEFAULT NULL,
  `action_id` varchar(200) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_transaction`
--

INSERT INTO `dms_transaction` (`id`, `reference_no`, `category_id`, `sub_category_id`, `subject_name`, `document_type`, `personnel_id`, `action_id`, `remarks`, `status`) VALUES
(12, 'ODTS-NCR-2024-000012', 4, 6, 'USE OF MOBILE DEVICE WHILE INSIDE OFFICE', 'For Compliance', '1520', '9', 'Please for filing', 'Active'),
(13, 'ODTS-NCR-2024-000013', 6, 10, 'NOV CUBAO', 'Confidential', '170', '13', '123123', 'Active'),
(14, 'ODTS-NCR-2024-000014', 5, 9, '12313', 'Confidential', '308', '4', '3213123', 'Active'),
(15, 'ODTS-NCR-2024-000015', 4, 6, '123', 'For Compliance', '309', '8', '123', 'Active'),
(16, 'ODTS-NCR-2024-000016', 4, 6, '2113213', 'For Compliance', '320', '4', '12312', 'Active'),
(17, 'ODTS-NCR-2024-000017', 0, 0, '', '', '', '', '', 'Active'),
(18, 'ODTS-NCR-2024-000018', 0, 0, '', '', '', '', '', 'Active'),
(19, 'ODTS-NCR-2024-000019', 0, 0, '', '', '', '', '', 'Active');

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
-- Indexes for table `dms_attachments`
--
ALTER TABLE `dms_attachments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `conf_category`
--
ALTER TABLE `conf_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conf_sub_category`
--
ALTER TABLE `conf_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dms_attachments`
--
ALTER TABLE `dms_attachments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dms_transaction`
--
ALTER TABLE `dms_transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;
