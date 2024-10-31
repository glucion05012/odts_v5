-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 31, 2024 at 04:56 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `dms_transaction`
--

CREATE TABLE `dms_transaction` (
  `id` int(20) NOT NULL,
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

INSERT INTO `dms_transaction` (`id`, `category_id`, `sub_category_id`, `subject_name`, `document_type`, `personnel_id`, `action_id`, `remarks`, `status`) VALUES
(1, 4, 6, 'Creation of New Memo for the Online Registration of Clients', 'For Compliance', '1520', '8', 'Please check the memo released', 'Active');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dms_transaction`
--
ALTER TABLE `dms_transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
