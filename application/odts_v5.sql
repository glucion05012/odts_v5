-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 06, 2024 at 12:23 PM
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
(36, 1, 'linkbiz payment.pdf', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/ODTS-NCR-2024-000049/linkbiz payment.pdf', '2024-11-05', 'dms'),
(37, 2, 'linkbiz payment.pdf', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/ODTS-NCR-2024-000050/linkbiz payment.pdf', '2024-11-06', 'dms'),
(38, 2, 'Revised Guide Questions Client Registration System.docx', 'C:/xampp/htdocs/odts_v5/assets/attachments/dms/ODTS-NCR-2024-000050/Revised Guide Questions Client Registration System.docx', '2024-11-06', 'dms');

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
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_dms`
--

INSERT INTO `dms_dms` (`id`, `reference_no`, `category_id`, `sub_category_id`, `subject_name`, `document_type`, `created_by_id`, `date_created`, `status`) VALUES
(49, 'ODTS-NCR-2024-000049', 5, 8, 'GIDDEL LUCION DTR FOR MONTH OF SEPTEMBER', 'For Compliance', '1520', '2024-11-05', 'Active'),
(50, 'ODTS-NCR-2024-000050', 5, 8, 'FOR YOUR CHECKING OF TCP', 'For Compliance', '1581', '2024-11-06', 'Active');

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
  `forwarded_to_id` varchar(200) DEFAULT NULL,
  `accepted_date` varchar(200) DEFAULT NULL,
  `action_id` varchar(200) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dms_transaction`
--

INSERT INTO `dms_transaction` (`id`, `dms_id`, `office_id`, `forwarded_by_id`, `forwarded_date`, `forwarded_to_id`, `accepted_date`, `action_id`, `remarks`, `status`) VALUES
(1, '49', '1', '1465', '2024-11-05', '1520', NULL, '4', 'For your checking', 'Pending'),
(2, '50', '1', '1581', '2024-11-06', '1520', '2024-11-06', '8', 'patingin lang', 'Pending'),
(10, '50', '1', '1520', '2024-11-06', '1581', '2024-11-06', '12', '111', 'Pending'),
(11, '50', '1', '1581', '2024-11-06', '1520', '2024-11-06', '4', '23', 'Pending');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dms_dms`
--
ALTER TABLE `dms_dms`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `dms_transaction`
--
ALTER TABLE `dms_transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;
