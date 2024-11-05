-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 05, 2024 at 02:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `tis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `access_level_id` int(20) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `a_settings` varchar(10) DEFAULT NULL,
  `a_department` varchar(10) DEFAULT NULL,
  `a_company` varchar(10) DEFAULT NULL,
  `a_configuration` varchar(10) DEFAULT NULL,
  `a_user_sign_affix` varchar(10) DEFAULT NULL,
  `a_goalseek` varchar(10) DEFAULT NULL,
  `a_ticketing_tool` varchar(10) DEFAULT NULL,
  `a_projects` varchar(10) DEFAULT NULL,
  `a_all_projects` varchar(10) DEFAULT NULL,
  `a_dashboard` varchar(10) DEFAULT NULL,
  `a_dashboard_add_project` varchar(10) DEFAULT NULL,
  `a_dashboard_edit_project` varchar(10) DEFAULT NULL,
  `a_dashboard_archived_project` varchar(10) DEFAULT NULL,
  `a_ppa` varchar(10) DEFAULT NULL,
  `a_mark_up` varchar(10) DEFAULT NULL,
  `a_dashboard_view_only_boq` varchar(10) DEFAULT NULL,
  `a_dashboard_create_boq` varchar(10) DEFAULT NULL,
  `a_dashboard_view_boq` varchar(10) DEFAULT NULL,
  `a_dashboard_purchasing_tracker` varchar(10) DEFAULT NULL,
  `a_dashboard_purchasing_tracker_view` varchar(10) DEFAULT NULL,
  `a_inventory_view` varchar(10) DEFAULT NULL,
  `a_inventory_edit` varchar(10) DEFAULT NULL,
  `a_billing_view` varchar(10) DEFAULT NULL,
  `a_billing_collect_in` varchar(10) DEFAULT NULL,
  `a_billing_collect_pm` varchar(10) DEFAULT NULL,
  `a_billing_create_in` varchar(10) DEFAULT NULL,
  `a_billing_delete_in` varchar(10) DEFAULT NULL,
  `a_billing_create_pm` varchar(10) DEFAULT NULL,
  `a_billing_delete_pm` varchar(10) DEFAULT NULL,
  `a_accounting` varchar(10) DEFAULT NULL,
  `a_employee_management` varchar(10) DEFAULT NULL,
  `a_purchasing` varchar(10) DEFAULT NULL,
  `a_user_profiling` varchar(10) DEFAULT NULL,
  `a_lnd` varchar(10) DEFAULT NULL,
  `a_benefits_and_deductions` varchar(10) DEFAULT NULL,
  `a_request_form_approval` varchar(10) DEFAULT NULL,
  `a_mrf_dashboard` varchar(10) DEFAULT NULL,
  `a_mrf_add` varchar(10) DEFAULT NULL,
  `a_mrf_delete` varchar(10) DEFAULT NULL,
  `a_mrf_pool` varchar(10) DEFAULT NULL,
  `a_po_create` varchar(10) DEFAULT NULL,
  `a_po_dashboard` varchar(10) DEFAULT NULL,
  `a_po_pay` varchar(10) DEFAULT NULL,
  `a_po_print` varchar(10) DEFAULT NULL,
  `a_po_delete` varchar(10) DEFAULT NULL,
  `a_warehouse_dashboard` varchar(10) DEFAULT NULL,
  `a_warehouse_deliver` varchar(10) DEFAULT NULL,
  `a_warehouse_delete` varchar(10) DEFAULT NULL,
  `a_project_site_dashboard` varchar(10) DEFAULT NULL,
  `a_project_site_receive` varchar(10) DEFAULT NULL,
  `a_project_site_return` varchar(10) DEFAULT NULL,
  `a_announcements` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_level_id`, `user_id`, `a_settings`, `a_department`, `a_company`, `a_configuration`, `a_user_sign_affix`, `a_goalseek`, `a_ticketing_tool`, `a_projects`, `a_all_projects`, `a_dashboard`, `a_dashboard_add_project`, `a_dashboard_edit_project`, `a_dashboard_archived_project`, `a_ppa`, `a_mark_up`, `a_dashboard_view_only_boq`, `a_dashboard_create_boq`, `a_dashboard_view_boq`, `a_dashboard_purchasing_tracker`, `a_dashboard_purchasing_tracker_view`, `a_inventory_view`, `a_inventory_edit`, `a_billing_view`, `a_billing_collect_in`, `a_billing_collect_pm`, `a_billing_create_in`, `a_billing_delete_in`, `a_billing_create_pm`, `a_billing_delete_pm`, `a_accounting`, `a_employee_management`, `a_purchasing`, `a_user_profiling`, `a_lnd`, `a_benefits_and_deductions`, `a_request_form_approval`, `a_mrf_dashboard`, `a_mrf_add`, `a_mrf_delete`, `a_mrf_pool`, `a_po_create`, `a_po_dashboard`, `a_po_pay`, `a_po_print`, `a_po_delete`, `a_warehouse_dashboard`, `a_warehouse_deliver`, `a_warehouse_delete`, `a_project_site_dashboard`, `a_project_site_receive`, `a_project_site_return`, `a_announcements`) VALUES
(1, '1', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(29, '29', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(30, '30', 'on', NULL, NULL, 'on', NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'on', 'on', 'on', NULL),
(31, '31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '32', NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '33', NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL),
(34, '34', NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '35', 'on', NULL, NULL, 'on', NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, 'on', 'on', NULL, 'on', 'on', 'on', NULL),
(36, '36', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(37, '37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '38', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `action_id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`action_id`, `name`, `description`) VALUES
(1, 'For Approval', ''),
(3, 'For Billing', ''),
(4, 'For Purchasing', ''),
(5, 'For BOQ', ''),
(6, 'For Review', ''),
(7, 'For filing', 'duplicate transaction'),
(8, 'For reconsideration', 'for re-checking'),
(9, 'For site assessment/inspection', ''),
(10, 'For evaluation ', 'For evaluation of review of  project details and attachments'),
(11, 'For initial plan preparation', ''),
(13, 'For Collection', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` int(10) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `file_id` int(20) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `tis_no` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `user_id_department` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`file_id`, `file_name`, `file_location`, `transaction_id`, `tis_no`, `user_id`, `user_id_department`, `date_uploaded`) VALUES
(19, '45f1a187-8cb1-41d5-80d1-55ce4ea02998.jpg', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/', '242', 'TIS-2024-000107', '38', '18', 'August 17, 2024 10:27:am  '),
(20, ';YRICS.docx', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/', '247', 'TIS-2024-000107', '1', '18', 'August 17, 2024 10:39:am  '),
(21, 'ACCOMPLISHED 2024MB_SWMS.xlsx', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/', '258', 'TIS-2024-000111', '1', '18', 'August 29, 2024 1:35:pm  '),
(22, 'ACCEPTANCE-CERTIFICATE-FINAL-BILLING-4TH-PHASE-1.docx', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/', '260', 'TIS-2024-000112', '38', '18', 'September 7, 2024 6:30:am  ');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_id` int(20) NOT NULL,
  `project_id` int(20) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `project_id`, `status`, `remarks`) VALUES
(32, 108, '0%', 'For Billing'),
(33, 109, '0%', 'For Billing'),
(34, 112, '0%', 'For Billing');

-- --------------------------------------------------------

--
-- Table structure for table `bnd`
--

CREATE TABLE `bnd` (
  `bnd_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boq`
--

CREATE TABLE `boq` (
  `boq_id` int(20) NOT NULL,
  `project_id` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `sub_description` varchar(200) DEFAULT NULL,
  `item` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `cost` varchar(200) DEFAULT NULL,
  `mark_up` varchar(200) DEFAULT NULL,
  `total_cost` varchar(200) DEFAULT NULL,
  `boq_cat_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boq`
--

INSERT INTO `boq` (`boq_id`, `project_id`, `description`, `sub_description`, `item`, `qty`, `unit`, `cost`, `mark_up`, `total_cost`, `boq_cat_id`) VALUES
(2493, '109', 'Aerogrids', 'Improvise', '1', '200', 'unit/s', '11493', '21', '2781306', '34'),
(2494, '109', 'MANUAL HEAD', '4 inches', '1', '20', 'unit/s', '3500', '5', '73500', '34'),
(2495, '109', 'Aerogrids', 'Improvise', '1', '17', 'unit/s', '11493', '12', '218826.72', '34'),
(2496, '109', 'Biotube', '30cm', '1', '16', 'unit/s', '123.45', '12', '2212.224', '35'),
(2497, '109', 'Kawake KB-401A', '2HP 3Phase', '1', '100', ' unit/s', '31640', '10', '3480400', '35'),
(2498, '109', 'Kawake KB-401A', '2HP 3Phase', '1', '14', ' unit/s', '31640', '10', '487256', '35'),
(2499, '109', 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '1', '25', 'unit/s', '6500', '5', '170625', '35'),
(2500, '109', 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '1', '18', 'unit/s', '6500', '5', '122850', '35'),
(2501, '109', 'Aerator', 'Model:ACO-328 60Hz (PH)', '1', '31', 'unit/s', '2117.00', '5', '68908.35', '35'),
(2502, '109', 'OZONE GENERATOR', '10G ', '1', '14', 'unit/s', '17000.00', '5', '249900', '36'),
(2503, '109', 'OZONE GENERATOR', '15G ', '1', '16', 'unit/s', '24000.00', '2', '391680', '36'),
(2505, '110', 'Aerogrids', 'Improvise', '1', '2', 'unit/s', '11493', '0', '22986', '34'),
(2506, '110', 'MANUAL HEAD', '4 inches', '1', '1', 'unit/s', '3500', '0', '3500', '34'),
(2507, '110', 'Aerogrids', 'Improvise', '1', '3', 'unit/s', '11493', '0', '34479', '34'),
(2508, '110', 'Biotube', '30cm', '1', '5', 'unit/s', '123.45', '0', '617.25', '35'),
(2509, '110', 'KAWAKE KB-401A', '1.5HP 3Phase', '1', '9', ' unit/s', '19872.58', '0', '178853.22000000003', '35'),
(2510, '110', 'KAWAKE KB-401A', '1.5HP 3Phase', '1', '7', ' unit/s', '19872.58', '0', '139108.06', '35'),
(2511, '110', 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '1', '4', 'unit/s', '6500', '0', '26000', '35'),
(2512, '110', 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '1', '8', 'unit/s', '6500', '0', '52000', '35'),
(2513, '110', 'Aerator', '', '1', '6', 'unit/s', '2117.00', '0', '12702', '35'),
(2514, '110', 'OZONE GENERATOR', '', '1', '10', 'unit/s', '17000.00', '0', '170000', '36'),
(2515, '110', 'OZONE GENERATOR', '', '1', '11', 'unit/s', '24000.00', '0', '264000', '36'),
(2517, '110', 'STATIC MIXER DN50', '2 inches', '0', '2', 'unit/s', '5850.00', '0123', '26091', '0'),
(2518, '110', 'Kawake KB-401A', '1.5HP 3Phase', '0', '0', ' unit/s', '19872.58', '0', '0', '0'),
(2519, '111', 'Aerogrids', 'Improvise', '1', '196', 'unit/s', '11493', '1', '2275154.28', '34'),
(2520, '111', 'MANUAL HEAD', '4 inches', '1', '20', 'unit/s', '3500', '2', '71400', '34'),
(2521, '111', 'Aerogrids', 'Improvise', '1', '5', 'unit/s', '11493', '4', '59763.6', '34'),
(2522, '111', 'Biotube', '30cm', '1', '1', 'unit/s', '123.45', '7', '132.0915', '35'),
(2523, '111', 'KAWAKE KB-401A', '1.5HP 3Phase', '1', '100', ' unit/s', '19872.58', '5', '2086620.9000000004', '35'),
(2524, '111', 'KAWAKE KB-401A', '1.5HP 3Phase', '1', '5', ' unit/s', '19872.58', '9', '108305.56100000002', '35'),
(2525, '111', 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '1', '5', 'unit/s', '6500', '6', '34450', '35'),
(2526, '111', 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '1', '1', 'unit/s', '6500', '5', '6825', '35'),
(2527, '111', 'Aerator', 'Model:ACO-328 60Hz (PH)', '1', '3', 'unit/s', '2117.00', '8', '6859.08', '35'),
(2528, '111', 'OZONE GENERATOR ', '10G ', '1', '14', 'unit/s', '17000.00', '0', '238000', '36'),
(2529, '111', 'OZONE GENERATOR ', '15G ', '1', '5', 'unit/s', '24000.00', '0', '120000', '36'),
(2530, '111', 'HDPE Pipe', '3.0 mm', '0', '0', 'piece', '6500', '0', '0', '0'),
(2542, '110', 'Microbes', 'blue gray', '0', '1', 'lot', '1000000.00', '0', '589663.47', '0'),
(2544, '109', 'Microbes', 'blue gray', '0', '3', 'lot', '1000000.00', '0', '2000000.00', '0'),
(2546, '111', 'Microbes', 'blue gray', '0', '2', 'lot', '1000000.00', '0', '1992489.49', '0'),
(2547, '112', 'CHAIR', '16x20 cm', '1', '15', 'pieces', '170', '10', '2805', '40'),
(2548, '112', 'Aerator', 'Model:ACO-328 60Hz (PH)', '0', '5', 'unit/s', '2117.00', '0', '10585', '0'),
(2549, '112', 'Microbes', 'blue gray', '0', '1', 'lot', '1000000.00', '0', '1000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `boq_cat`
--

CREATE TABLE `boq_cat` (
  `boq_cat_id` int(20) NOT NULL,
  `boq_main_cat_id` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boq_cat`
--

INSERT INTO `boq_cat` (`boq_cat_id`, `boq_main_cat_id`, `name`, `description`) VALUES
(34, '9', 'GENERAL REQUIREMENTS', ''),
(35, '9', 'MAIN EQUIPMENT', ''),
(36, '9', 'ELECTRICAL MATERIALS', ''),
(37, '10', 'GENERAL REQUIREMENTS', ''),
(38, '10', 'MAIN EQUIPMENT', ''),
(39, '10', 'ELECTRICAL MATERIALS', ''),
(40, '11', 'SWMD', '');

-- --------------------------------------------------------

--
-- Table structure for table `boq_config`
--

CREATE TABLE `boq_config` (
  `boq_config_id` int(20) NOT NULL,
  `boq_cat_id` varchar(200) DEFAULT NULL,
  `inventory_id` varchar(200) NOT NULL,
  `item` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `sub_description` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boq_config`
--

INSERT INTO `boq_config` (`boq_config_id`, `boq_cat_id`, `inventory_id`, `item`, `description`, `sub_description`, `qty`) VALUES
(208, '35', '418', '1', 'Biotube', '30cm', '1'),
(209, '35', '415', '1', 'KAWAKE KB-401A ', '1.5HP/3P', '100'),
(210, '35', '415', '1', 'KAWAKE KB-401A ', '1.5HP/3P', '5'),
(211, '35', '422', '1', 'BOOSTER PUMP', 'Brand: AquatekModel: ATS100 1hp ', '5'),
(212, '35', '422', '1', 'BOOSTER PUMP', 'Brand: AquatekModel: ATS100 1hp ', '1'),
(213, '35', '414', '1', 'Aerator ', 'Model: ACO-328\r\n60Hz (PH)', '3'),
(214, '34', '416', '1', 'Aerogrids', 'Improvise', '200'),
(215, '34', '424', '1', 'MANUAL HEAD ', '2.5', '20'),
(216, '34', '416', '1', 'Aerogrids', 'Improvise', '5'),
(217, '36', '427', '1', 'OZONE GENERATOR ', '10G ', '14'),
(218, '36', '428', '1', 'OZONE GENERATOR ', '15G ', '5'),
(220, '40', '440', '1', 'CHAIR', '16x20 cm', '15');

-- --------------------------------------------------------

--
-- Table structure for table `boq_main_cat`
--

CREATE TABLE `boq_main_cat` (
  `boq_main_cat_id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boq_main_cat`
--

INSERT INTO `boq_main_cat` (`boq_main_cat_id`, `name`, `description`) VALUES
(9, '10 CMD', 'waley\r\n'),
(10, '50 CMD', ''),
(11, 'NCR', '');

-- --------------------------------------------------------

--
-- Table structure for table `boq_purchasing`
--

CREATE TABLE `boq_purchasing` (
  `boq_purchasing_id` int(20) NOT NULL,
  `boq_id` varchar(200) DEFAULT NULL,
  `project_id` varchar(200) DEFAULT NULL,
  `purchase_order` varchar(200) DEFAULT NULL,
  `purchase_order_cost` varchar(200) DEFAULT NULL,
  `delivery_receipt` varchar(200) DEFAULT NULL,
  `delivery_receipt_cost` varchar(200) DEFAULT NULL,
  `excess` varchar(200) DEFAULT NULL,
  `excess_cost` varchar(200) DEFAULT NULL,
  `boq_cat_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `boq_purchasing`
--

INSERT INTO `boq_purchasing` (`boq_purchasing_id`, `boq_id`, `project_id`, `purchase_order`, `purchase_order_cost`, `delivery_receipt`, `delivery_receipt_cost`, `excess`, `excess_cost`, `boq_cat_id`) VALUES
(2460, '2460', '102', '0', '0', '0', '0', '0', NULL, '34'),
(2461, '2461', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2462, '2462', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2463, '2463', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2464, '2464', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2465, '2465', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2466, '2466', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2467, '2467', '102', '0', '0', '0', '0', '0', NULL, '36'),
(2468, '2468', '102', '0', '0', '0', '0', '0', NULL, '36'),
(2469, '2469', '102', '0', '0', '0', '0', '0', NULL, '34'),
(2470, '2470', '102', '0', '0', '0', '0', '0', NULL, '34'),
(2471, '2471', '102', '0', '0', '0', '0', '0', NULL, '34'),
(2472, '2472', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2473, '2473', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2474, '2474', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2475, '2475', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2476, '2476', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2477, '2477', '102', '0', '0', '0', '0', '0', NULL, '35'),
(2478, '2478', '102', '0', '0', '0', '0', '0', NULL, '36'),
(2479, '2479', '102', '0', '0', '0', '0', '0', NULL, '36'),
(2480, '2480', '106', '0', '0', '0', '0', '0', NULL, '34'),
(2481, '2481', '106', '0', '0', '0', '0', '0', NULL, '34'),
(2482, '2482', '106', '0', '0', '0', '0', '0', NULL, '34'),
(2483, '2483', '106', '0', '0', '0', '0', '0', NULL, '35'),
(2484, '2484', '106', '0', '0', '0', '0', '0', NULL, '35'),
(2485, '2485', '106', '0', '0', '0', '0', '0', NULL, '35'),
(2486, '2486', '106', '0', '0', '0', '0', '0', NULL, '35'),
(2487, '2487', '106', '0', '0', '0', '0', '0', NULL, '35'),
(2488, '2488', '106', '0', '0', '0', '0', '0', NULL, '35'),
(2489, '2489', '106', '0', '0', '0', '0', '0', NULL, '36'),
(2490, '2490', '106', '0', '0', '0', '0', '0', NULL, '36'),
(2491, '2491', '106', '0', '0', '0', '0', '0', NULL, '0'),
(2493, '2493', '109', '0', '0', '0', '0', '0', NULL, '34'),
(2494, '2494', '109', '0', '0', '0', '0', '0', NULL, '34'),
(2495, '2495', '109', '0', '0', '0', '0', '0', NULL, '34'),
(2496, '2496', '109', '0', '0', '0', '0', '0', NULL, '35'),
(2497, '2497', '109', '0', '0', '0', '0', '0', NULL, '35'),
(2498, '2498', '109', '0', '0', '0', '0', '0', NULL, '35'),
(2499, '2499', '109', '0', '0', '0', '0', '0', NULL, '35'),
(2500, '2500', '109', '0', '0', '0', '0', '0', NULL, '35'),
(2501, '2501', '109', '0', '0', '0', '0', '0', NULL, '35'),
(2502, '2502', '109', '0', '0', '0', '0', '0', NULL, '36'),
(2503, '2503', '109', '0', '0', '0', '0', '0', NULL, '36'),
(2505, '2505', '110', '0', '0', '0', '0', '0', NULL, '34'),
(2506, '2506', '110', '0', '0', '0', '0', '0', NULL, '34'),
(2507, '2507', '110', '0', '0', '0', '0', '0', NULL, '34'),
(2508, '2508', '110', '0', '0', '0', '0', '0', NULL, '35'),
(2509, '2509', '110', '0', '0', '0', '0', '0', NULL, '35'),
(2510, '2510', '110', '0', '0', '0', '0', '0', NULL, '35'),
(2511, '2511', '110', '0', '0', '0', '0', '0', NULL, '35'),
(2512, '2512', '110', '0', '0', '0', '0', '0', NULL, '35'),
(2513, '2513', '110', '0', '0', '0', '0', '0', NULL, '35'),
(2514, '2514', '110', '0', '0', '0', '0', '0', NULL, '36'),
(2515, '2515', '110', '0', '0', '0', '0', '0', NULL, '36'),
(2517, '2517', '110', '0', '0', '0', '0', '0', NULL, '0'),
(2518, '2518', '110', '0', '0', '0', '0', '0', NULL, '0'),
(2519, '2519', '111', '0', '0', '0', '0', '0', NULL, '34'),
(2520, '2520', '111', '0', '0', '0', '0', '0', NULL, '34'),
(2521, '2521', '111', '0', '0', '0', '0', '0', NULL, '34'),
(2522, '2522', '111', '0', '0', '0', '0', '0', NULL, '35'),
(2523, '2523', '111', '0', '0', '0', '0', '0', NULL, '35'),
(2524, '2524', '111', '0', '0', '0', '0', '0', NULL, '35'),
(2525, '2525', '111', '0', '0', '0', '0', '0', NULL, '35'),
(2526, '2526', '111', '0', '0', '0', '0', '0', NULL, '35'),
(2527, '2527', '111', '0', '0', '0', '0', '0', NULL, '35'),
(2528, '2528', '111', '0', '0', '0', '0', '0', NULL, '36'),
(2529, '2529', '111', '0', '0', '0', '0', '0', NULL, '36'),
(2530, '2530', '111', '0', '0', '0', '0', '0', NULL, '0'),
(2540, '2540', '110', '0', '0', '0', '0', '0', NULL, '0'),
(2541, '2541', '110', '0', '0', '0', '0', '0', NULL, '0'),
(2542, '2542', '110', '0', '0', '0', '0', '0', NULL, '0'),
(2544, '2544', '109', '0', '0', '0', '0', '0', NULL, '0'),
(2546, '2546', '111', '0', '0', '0', '0', '0', NULL, '0'),
(2547, '2547', '112', '12', '2244', '10', '1870', '5', '935', '40'),
(2548, '2548', '112', '0', '0', '0', '0', '0', NULL, '0'),
(2549, '2549', '112', '0', '0', '0', '0', '0', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `cash_in_bank`
--

CREATE TABLE `cash_in_bank` (
  `cash_account_id` int(10) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `bank_recon` varchar(200) NOT NULL,
  `income` varchar(200) NOT NULL,
  `quick_assets` varchar(200) NOT NULL,
  `working_capital` varchar(200) NOT NULL,
  `capital_requirement` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `account_number` int(20) NOT NULL,
  `account_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cash_in_bank`
--

INSERT INTO `cash_in_bank` (`cash_account_id`, `account_title`, `category`, `bank_recon`, `income`, `quick_assets`, `working_capital`, `capital_requirement`, `balance`, `details`, `bank_name`, `branch`, `account_number`, `account_name`) VALUES
(11, 'Cash In Bank - BDO_bjhjcdhjcdhjd', 'Current Asset', 'yes', 'no', 'yes', 'no', 'yes', '4', 'HJASABSHBHABJKAS', 'BDO', 'BGHDHDHDHHD', 0, 'FRENZY LOU SARMIENTO');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `account_id` int(10) NOT NULL,
  `account_code` varchar(200) DEFAULT NULL,
  `account_type` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`account_id`, `account_code`, `account_type`, `description`) VALUES
(22, '1001', 'PETTY CASH', ''),
(23, '1002', 'PETTY CASH', ''),
(25, '1003', 'Cash in Bank', ''),
(26, '1004', 'PREPAYMENT', '');

-- --------------------------------------------------------

--
-- Table structure for table `chart_account_title`
--

CREATE TABLE `chart_account_title` (
  `title_id` int(10) NOT NULL,
  `sub_account_code` varchar(200) DEFAULT NULL,
  `type_id` int(10) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `bank_recon` varchar(200) NOT NULL,
  `bank_recon_type` varchar(200) DEFAULT NULL,
  `income` varchar(200) NOT NULL,
  `income_type` varchar(200) DEFAULT NULL,
  `quick_assets` varchar(200) NOT NULL,
  `quick_assets_type` varchar(200) DEFAULT NULL,
  `working_capital` varchar(200) NOT NULL,
  `working_capital_type` varchar(200) DEFAULT NULL,
  `capital_requirement` varchar(200) NOT NULL,
  `capital_requirement_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chart_account_title`
--

INSERT INTO `chart_account_title` (`title_id`, `sub_account_code`, `type_id`, `account_title`, `category`, `bank_recon`, `bank_recon_type`, `income`, `income_type`, `quick_assets`, `quick_assets_type`, `working_capital`, `working_capital_type`, `capital_requirement`, `capital_requirement_type`) VALUES
(11, NULL, 22, 'RICHARD BALANO', 'CURRENT ASSET', 'no', '+', 'no', '-', 'yes', '+/-', 'yes', '+', 'no', '-'),
(13, NULL, 22, 'Manuel Hiram', '2423rfdfs', 'yes', NULL, 'no', NULL, 'no', NULL, 'yes', NULL, 'no', NULL),
(14, '1001-b', 22, 'test acct', 'asdf', 'yes', '+', 'yes', '+', 'no', '+/-', 'no', '+/-', 'yes', '-');

-- --------------------------------------------------------

--
-- Table structure for table `check_voucher`
--

CREATE TABLE `check_voucher` (
  `voucher_id` int(10) NOT NULL,
  `tis_no` varchar(200) DEFAULT NULL,
  `voucher_type` varchar(200) DEFAULT NULL,
  `voucher_no` varchar(200) DEFAULT NULL,
  `voucher_date` varchar(200) DEFAULT NULL,
  `supplier_id` varchar(200) DEFAULT NULL,
  `tin` varchar(200) DEFAULT NULL,
  `ref_type` varchar(200) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `business_style` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `vat` varchar(200) DEFAULT NULL,
  `gross_amount` varchar(200) DEFAULT NULL,
  `less_vat` varchar(200) DEFAULT NULL,
  `net` varchar(200) DEFAULT NULL,
  `withholding_tax` varchar(200) DEFAULT NULL,
  `amount_due` varchar(200) DEFAULT NULL,
  `vatable_sales` varchar(200) DEFAULT NULL,
  `vat_exempt` varchar(200) DEFAULT NULL,
  `zero_rated` varchar(200) DEFAULT NULL,
  `vat_amount` varchar(200) DEFAULT NULL,
  `total_amount_due` varchar(200) DEFAULT NULL,
  `cash_account_id` varchar(200) DEFAULT NULL,
  `cab_drcr` varchar(200) DEFAULT NULL,
  `input_tax_drcr` varchar(200) DEFAULT NULL,
  `with_tax_drcr` varchar(200) DEFAULT NULL,
  `cv_total_debit` varchar(200) DEFAULT NULL,
  `cv_total_credit` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(10) NOT NULL,
  `pb_id` int(10) DEFAULT NULL,
  `pm_billing_id` int(10) DEFAULT NULL,
  `pmrc_billing_id` int(10) DEFAULT NULL,
  `billing_id` int(10) DEFAULT NULL,
  `rv_no` varchar(200) DEFAULT NULL,
  `fund_source` varchar(200) DEFAULT NULL,
  `receipt_type` varchar(200) DEFAULT NULL,
  `reference_no` varchar(200) DEFAULT NULL,
  `reference_date` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `check_no` varchar(200) DEFAULT NULL,
  `acct_name` varchar(200) DEFAULT NULL,
  `acct_no` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `gross_amount` varchar(200) DEFAULT NULL,
  `net_amount` varchar(200) DEFAULT NULL,
  `output_tax` varchar(200) DEFAULT NULL,
  `with_tax` varchar(200) DEFAULT NULL,
  `or_amount` varchar(200) DEFAULT NULL,
  `date_collected` varchar(200) DEFAULT NULL,
  `date_collected_raw` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `pb_id`, `pm_billing_id`, `pmrc_billing_id`, `billing_id`, `rv_no`, `fund_source`, `receipt_type`, `reference_no`, `reference_date`, `bank`, `check_no`, `acct_name`, `acct_no`, `description`, `gross_amount`, `net_amount`, `output_tax`, `with_tax`, `or_amount`, `date_collected`, `date_collected_raw`) VALUES
(93, 126, 0, NULL, 34, '2024-000112-126', 'Bank Recon', 'Official Receipt', '222222222222', '2024-09-09', 'westbank', '12364785', 'Browny Dog', '11111111111', 'Downpayment', '₱226,999.36', '₱202,678.00', '₱24,321.36', '₱4,053.56', '₱222,945.80', 'September 7, 2024 ', '2024-09-07'),
(94, 127, 0, NULL, 34, '2024-000112-127', 'Bank Recon', 'Official Receipt', '3333333333', '2024-09-08', 'BDO', '33333333333333', 'BROWNY DOG', '985632147', '', '₱238,349.33', '₱212,811.90', '₱25,537.43', '₱4,256.24', '₱234,093.09', 'September 7, 2024 ', '2024-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(20) NOT NULL,
  `group_id` int(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `contact_position` varchar(200) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `landline` varchar(200) DEFAULT NULL,
  `contact_email` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `group_id`, `name`, `description`, `email`, `contact_person`, `contact_position`, `contact_number`, `landline`, `contact_email`, `status`, `remarks`) VALUES
(47, 33, 'AMAIA STEPS PASIG', '', '', '', '', '', '', '', '1', ''),
(48, 33, 'AYALA STEPS THE JUNCTION PLACE', '', '', '', '', '', '', '', '1', ''),
(49, 34, 'PUREGOLD PRICE CLUB INC.', '', '', '', '', '', '', '', '1', ''),
(50, 35, 'ONE ASTRA PLACE', '', '', '', '', '', '', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `cv_voucher`
--

CREATE TABLE `cv_voucher` (
  `id` int(10) NOT NULL,
  `voucher_no` varchar(200) DEFAULT NULL,
  `select_account` varchar(200) DEFAULT NULL,
  `dr_cr` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `description`, `email`) VALUES
(14, 'ACCOUNTING', '', ''),
(15, 'PURCHASING', '', ''),
(16, 'RELATIONSHIP MANAGER', '', ''),
(17, 'BILLING AND COLLECTION ', '', ''),
(18, 'DESIGN ', '', ''),
(19, 'PERMITTING AND COMPLIANCE', '', ''),
(20, 'MAINTENANCE ', '', ''),
(21, 'HUMAN RESOURCE', '', 'hr@techbrokers.ph');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `name`, `description`) VALUES
(8, 'HEAD ', ''),
(9, 'OFFICER', '');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets`
--

CREATE TABLE `fixed_assets` (
  `fixed_asset_id` int(20) NOT NULL,
  `asset_no` varchar(200) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `site` varchar(200) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tin` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `date_of_acquisition` varchar(200) DEFAULT NULL,
  `cost` varchar(200) DEFAULT NULL,
  `useful_life` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms_leave`
--

CREATE TABLE `forms_leave` (
  `leave_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_filed` varchar(200) DEFAULT NULL,
  `from_date` varchar(200) DEFAULT NULL,
  `to_date` varchar(200) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL COMMENT 'Pending, Approved, Declined',
  `date_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms_leave`
--

INSERT INTO `forms_leave` (`leave_id`, `user_id`, `date_filed`, `from_date`, `to_date`, `duration`, `type`, `reason`, `remarks`, `status`, `date_status`) VALUES
(17, 36, 'August 3, 2024', '2024-08-02', '2024-08-02', '1', 'Vacation Leave', 'ME TIME', NULL, 'Pending', NULL),
(18, 1, 'September 2, 2024', '2024-09-02', '2024-09-02', '1', 'Sick Leave', 'cough', NULL, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forms_loan`
--

CREATE TABLE `forms_loan` (
  `loan_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_filed` varchar(200) DEFAULT NULL,
  `date_needed` varchar(200) DEFAULT NULL,
  `amount_loan` varchar(200) DEFAULT NULL,
  `aoi` varchar(200) DEFAULT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `date_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms_loan`
--

INSERT INTO `forms_loan` (`loan_id`, `user_id`, `date_filed`, `date_needed`, `amount_loan`, `aoi`, `purpose`, `remarks`, `status`, `date_status`) VALUES
(15, 1, 'September 2, 2024', '2024-09-14', '10000', '3', 'bayad bahay', NULL, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forms_ot`
--

CREATE TABLE `forms_ot` (
  `ot_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_filed` varchar(200) DEFAULT NULL,
  `from_date` varchar(200) DEFAULT NULL,
  `to_date` varchar(200) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `date_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms_ot`
--

INSERT INTO `forms_ot` (`ot_id`, `user_id`, `date_filed`, `from_date`, `to_date`, `duration`, `purpose`, `remarks`, `status`, `date_status`) VALUES
(17, 36, 'August 3, 2024', '2024-08-03T07:00', '2024-08-03T17:00', '10:00', 'TIS MEETING AND PAYROLL', NULL, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forwarding`
--

CREATE TABLE `forwarding` (
  `transaction_id` int(20) NOT NULL,
  `tis_no` varchar(200) DEFAULT NULL,
  `project_id` int(20) DEFAULT NULL,
  `date_received` varchar(200) DEFAULT NULL,
  `date_received_raw` varchar(200) NOT NULL,
  `forwarded_by_id` int(20) DEFAULT NULL,
  `forwarded_by_department_id` int(20) DEFAULT NULL,
  `date_accepted` varchar(200) DEFAULT NULL,
  `date_accepted_raw` varchar(200) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `user_department_id` int(20) DEFAULT NULL,
  `date_forwarded` varchar(200) DEFAULT NULL,
  `date_forwarded_raw` varchar(200) DEFAULT NULL,
  `forwarded_to_id` int(20) DEFAULT NULL,
  `forwarded_to_department_id` int(20) DEFAULT NULL,
  `action` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `accepted` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `forwarding`
--

INSERT INTO `forwarding` (`transaction_id`, `tis_no`, `project_id`, `date_received`, `date_received_raw`, `forwarded_by_id`, `forwarded_by_department_id`, `date_accepted`, `date_accepted_raw`, `user_id`, `user_department_id`, `date_forwarded`, `date_forwarded_raw`, `forwarded_to_id`, `forwarded_to_department_id`, `action`, `notes`, `accepted`) VALUES
(242, 'TIS-2024-000107', 107, 'August 17, 2024 4:18:pm  ', '2024-08-17', NULL, NULL, 'August 17, 2024 4:26:pm  ', '2024-08-17', 38, 18, 'August 17, 2024 4:27:pm  ', '2024-08-17', 1, 18, '0', NULL, '1'),
(243, 'TIS-2024-000108', 108, 'August 17, 2024 4:21:pm  ', '2024-08-17', NULL, NULL, 'August 17, 2024 4:27:pm  ', '2024-08-17', 38, 18, 'August 17, 2024 4:28:pm  ', '2024-08-17', 1, 18, '0', NULL, '1'),
(244, 'TIS-2024-000107', 107, 'August 17, 2024 4:27:pm  ', '2024-08-17', 38, 18, 'August 17, 2024 4:35:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:37:pm  ', '2024-08-17', 1, 18, '5', 'HEHEHEHEHE', '1'),
(245, 'TIS-2024-000108', 108, 'August 17, 2024 4:28:pm  ', '2024-08-17', 38, 18, 'August 17, 2024 4:35:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:36:pm  ', '2024-08-17', 1, 18, '5', '', '1'),
(246, 'TIS-2024-000108', 108, 'August 17, 2024 4:36:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:38:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:45:pm  ', '2024-08-17', 1, 18, '5', '', '1'),
(247, 'TIS-2024-000107', 107, 'August 17, 2024 4:37:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:37:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:39:pm  ', '2024-08-17', 1, 18, '5', '', '1'),
(248, 'TIS-2024-000107', 107, 'August 17, 2024 4:39:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:41:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 4:42:pm  ', '2024-08-17', 1, 18, '5', '', '1'),
(249, 'TIS-2024-000109', 109, 'August 17, 2024 4:42:pm  ', '2024-08-17', NULL, NULL, 'August 17, 2024 4:43:pm  ', '2024-08-17', 38, 18, 'August 17, 2024 4:43:pm  ', '2024-08-17', 1, 18, '0', NULL, '1'),
(250, 'TIS-2024-000107', 107, 'August 17, 2024 4:42:pm  ', '2024-08-17', 1, 18, NULL, NULL, 1, 18, NULL, NULL, NULL, NULL, '5', '', '0'),
(251, 'TIS-2024-000109', 109, 'August 17, 2024 4:43:pm  ', '2024-08-17', 38, 18, 'August 17, 2024 4:48:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 5:04:pm  ', '2024-08-17', 1, 18, '5', '', '1'),
(252, 'TIS-2024-000108', 108, 'August 17, 2024 4:45:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 5:07:pm  ', '2024-08-17', 1, 18, NULL, NULL, NULL, NULL, '3', '', '1'),
(253, 'TIS-2024-000109', 109, 'August 17, 2024 5:04:pm  ', '2024-08-17', 1, 18, 'August 17, 2024 5:06:pm  ', '2024-08-17', 1, 18, NULL, NULL, NULL, NULL, '3', '', '1'),
(254, 'TIS-2024-000110', 110, 'August 21, 2024 8:59:pm  ', '2024-08-21', NULL, NULL, 'August 21, 2024 8:59:pm  ', '2024-08-21', 38, 18, 'August 21, 2024 9:01:pm  ', '2024-08-21', 1, 18, '0', NULL, '1'),
(255, 'TIS-2024-000110', 110, 'August 21, 2024 9:01:pm  ', '2024-08-21', 38, 18, 'August 21, 2024 9:02:pm  ', '2024-08-21', 1, 18, 'August 21, 2024 9:09:pm  ', '2024-08-21', 1, 18, '5', '', '1'),
(256, 'TIS-2024-000110', 110, 'August 21, 2024 9:09:pm  ', '2024-08-21', 1, 18, 'August 21, 2024 9:10:pm  ', '2024-08-21', 1, 18, 'August 21, 2024 9:12:pm  ', '2024-08-21', 1, 18, '1', '', '1'),
(257, 'TIS-2024-000110', 110, 'August 21, 2024 9:12:pm  ', '2024-08-21', 1, 18, NULL, NULL, 1, 18, NULL, NULL, NULL, NULL, '4', '', '0'),
(258, 'TIS-2024-000111', 111, 'August 29, 2024 7:34:pm  ', '2024-08-29', NULL, NULL, 'August 29, 2024 7:34:pm  ', '2024-08-29', 1, 18, 'August 29, 2024 7:35:pm  ', '2024-08-29', 38, 18, '0', NULL, '1'),
(259, 'TIS-2024-000111', 111, 'August 29, 2024 7:35:pm  ', '2024-08-29', 1, 18, 'August 29, 2024 7:36:pm  ', '2024-08-29', 38, 18, NULL, NULL, NULL, NULL, '5', 'Priority, please. Thank you. ', '1'),
(260, 'TIS-2024-000112', 112, 'September 7, 2024 11:39:am  ', '2024-09-07', NULL, NULL, 'September 7, 2024 12:09:pm  ', '2024-09-07', 38, 18, 'September 7, 2024 12:30:pm  ', '2024-09-07', 34, 17, '0', NULL, '1'),
(261, 'TIS-2024-000112', 112, 'September 7, 2024 12:30:pm  ', '2024-09-07', 38, 18, 'September 7, 2024 1:48:pm  ', '2024-09-07', 34, 17, 'September 7, 2024 1:48:pm  ', '2024-09-07', 38, 18, '3', 'URGENT', '1'),
(262, 'TIS-2024-000112', 112, 'September 7, 2024 1:48:pm  ', '2024-09-07', 34, 17, NULL, NULL, 38, 18, NULL, NULL, NULL, NULL, '4', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `group_company`
--

CREATE TABLE `group_company` (
  `group_id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `contact_position` varchar(200) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `landline` varchar(200) DEFAULT NULL,
  `contact_email` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_company`
--

INSERT INTO `group_company` (`group_id`, `name`, `description`, `email`, `contact_person`, `contact_position`, `contact_number`, `landline`, `contact_email`, `remarks`, `status`) VALUES
(33, 'AYALA LAND INC', '', '', '', '', '', '', '', '', '1'),
(34, 'PUREGOLD PIRCE CLUB INC.', '', '', '', '', '', '', '', '', '1'),
(35, 'CEBU LAND MASTERS INC.', '', '', '', '', '', '', '', '', '1'),
(36, 'SM Group of Company', '', 'anabelle.wahing11@gmail.com', 'Anne Apa-ap', 'Company President', '09598530551', '', 'gidz.lucion@gmail.com', 'new', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hr_user_profile`
--

CREATE TABLE `hr_user_profile` (
  `user_profile_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `employee_type` varchar(200) DEFAULT NULL,
  `date_hired` varchar(200) DEFAULT NULL,
  `end_of_contract` varchar(200) DEFAULT NULL,
  `employment_status` varchar(200) DEFAULT NULL,
  `working_hours` varchar(200) DEFAULT NULL,
  `vacation_leave` varchar(200) DEFAULT NULL,
  `sick_leave` varchar(200) DEFAULT NULL,
  `salary` varchar(200) DEFAULT NULL,
  `salary_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_user_profile`
--

INSERT INTO `hr_user_profile` (`user_profile_id`, `user_id`, `employee_type`, `date_hired`, `end_of_contract`, `employment_status`, `working_hours`, `vacation_leave`, `sick_leave`, `salary`, `salary_type`) VALUES
(14, 29, '10', '2022-10-24', '', 'Permanent', '9', '', '', '23500', 'Fixed'),
(15, 30, '10', '2022-10-01', '', 'Permanent', '9', '', '', '', 'Fixed'),
(16, 31, '10', '', '', 'Permanent', '8', '', '', '300000', 'Fixed'),
(17, 32, '10', '2022-10-10', '', 'Permanent', '9', '', '', '21500', 'Fixed'),
(18, 33, '10', '2021-12-01', '', 'Permanent', '9', '', '', '17000', 'Fixed'),
(19, 34, '10', '2023-06-05', '', 'Permanent', '9', '', '', '', 'Fixed'),
(20, 35, '10', '2023-03-13', '', 'Permanent', '9', '', '', '645', 'Daily'),
(21, 36, '10', '2023-07-23', '', 'Permanent', '9', '', '', '17000', 'Fixed'),
(22, 37, '10', '2024-08-03', '', 'Permanent', '9', '', '', '12000', 'Fixed'),
(23, 38, '10', '', '', 'Permanent', '8', '', '', '', 'Fixed');

-- --------------------------------------------------------

--
-- Table structure for table `hr_user_profile_bank`
--

CREATE TABLE `hr_user_profile_bank` (
  `user_profile_bank_id` int(10) NOT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `user_profile_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_user_profile_bank`
--

INSERT INTO `hr_user_profile_bank` (`user_profile_bank_id`, `bank_name`, `account_name`, `account_number`, `user_profile_id`) VALUES
(14, 'BDO', 'JASPER M. CANIDO', '002230116912', 14),
(15, '', '', '', 15),
(16, '', '', '', 16),
(17, 'BDO', 'Manuel O. Duran', '002230116629', 17),
(18, 'BDO', 'Juliebeth B. Tan', '002230116610', 18),
(19, '', '', '', 19),
(20, 'BDO', 'Judelix P. Loreto', '002230117366', 20),
(21, 'BDO', 'Angelica L. Llena', '002230116564', 21),
(22, 'BDO', 'afdsdgs', '131242352345', 22),
(23, '', '', '', 23);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `specification` varchar(200) DEFAULT NULL,
  `rate` varchar(200) DEFAULT NULL,
  `unit_of_measurement` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `threshold` varchar(200) DEFAULT NULL,
  `market_price` varchar(200) DEFAULT NULL,
  `supplier` varchar(200) DEFAULT NULL,
  `vatinc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `code`, `name`, `description`, `specification`, `rate`, `unit_of_measurement`, `price`, `threshold`, `market_price`, `supplier`, `vatinc`) VALUES
(414, '0012', 'Aerator', '', 'Model:ACO-328 60Hz (PH)', '4', 'unit/s', '2117', '2', '2117', '12', '1'),
(415, '0015', 'KAWAKE KB-401A', '', '1.5HP 3Phase', '31', ' unit/s', '19872.58', '', '19872.58', '17', '1'),
(416, '0017', 'Aerogrids', '', 'Improvise', '99', 'unit/s', '11474.79', '', '11493', '18', '0'),
(417, '0015', 'Kawake KB-401A', '', '2HP 3Phase', '255', 'unit/s', '22148.00', '', '31640.00', '24', '1'),
(418, '008', 'Biotube', '', '30cm', '12', 'unit/s', '123.45', '', '123.45', '18', '0'),
(419, '0015', 'Kawake KB-501S ', '', '2HP 1Phase 60hz', '0', 'unit/s', '27493.25', '', '32345.00', '24', '1'),
(420, '0015', 'Kawake KB-601A-11 ', '', '2.55HP/3P', '17', 'unit/s', '30376.00', '', '37970.00', '24', '1'),
(421, '0015', 'KAWAKE KB-601A-21', '', '3.42HP/3P', '31', 'unit/s', '42457.50', '', '49950.00', '24', '1'),
(422, '007', 'BOOSTER PUMP', '', 'Brand:Aquatek Model: ATS100 1hp ', '0', 'unit/s', '5200', '', '6500', '23', '1'),
(423, '0015', 'KAWAKE KB-601A-21', '', '4.6HP/3P', '0', 'unit/s', '49950.00', '', '49950.00', '24', '1'),
(424, '0020', 'MANUAL HEAD', '', '2.5 inches', '7', 'unit/s', '1200.00', '', '1200.00', '24', '0'),
(425, '0020', 'MANUAL HEAD', '', '4 inches', '14', 'unit/s', '3500.00', '', '3500.00', '18', '0'),
(426, '007', 'BOOSTER PUMP', '', 'Brand: Aquatek Model: ATS150 1.5 hp ', '4', 'unit/s', '6200', '', '7000', '23', '1'),
(427, '0018', 'OZONE GENERATOR ', '', '10G ', '5', 'unit/s', '17000.00', '', '17000.00', '18', '0'),
(428, '0018', 'OZONE GENERATOR ', '', '15G ', '30', 'unit/s', '24000.00', '', '24000.00', '18', '0'),
(429, '007', 'BOOSTER PUMP', '', 'Model: BJZ100', '1', 'unit/s', '10500', '', '11500', '18', '0'),
(430, '0018', 'OZONE GENERATOR ', '', '30G ', '1', 'unit/s', '46000.00', '', '46000.00', '18', '0'),
(431, '0018', 'OZONE GENERATOR ', '', '50G ', '0', 'unit/s', '65000.00', '', '65000.00', '18', '0'),
(432, '009', 'Pressure Gauge', '', 'Stainless', '30', 'unit/s', '800.00', '', '800.00', '18', '0'),
(433, '0010', 'Pressure Washer', '', 'Cleaning Material', '15', 'unit/s', '1510000.00', '', '1510000.00', '18', '0'),
(434, '0016', 'STATIC MIXER DN50 ', '', '2 inches', '15', 'unit/s', '1950.00', '', '5850.00', '18', '0'),
(435, '0016', 'STATIC MIXER DN-80 ', '', '3 inches', '13', 'unit/s', '4800.00', '', '4800.00', '18', '0'),
(437, '1', 'test trim', '', 'test trim specs', '14', '2000', '500', '', '10', '25', '0'),
(438, '0021', 'HDPE Pipe', '', '3.0 mm', '15', 'piece', '5500', '4', '6500', '25', '1'),
(439, '0001', 'Microbes', '', 'blue gray', '100', 'lot', '1000000', '10', '1000000', '25', '0'),
(440, '231545', 'CHAIR', 'color pink ', '16x20 cm', '100', 'pieces', '150', '15', '170', '27', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jvlf_voucher`
--

CREATE TABLE `jvlf_voucher` (
  `voucher_id` int(11) NOT NULL,
  `tis_no` varchar(200) DEFAULT NULL,
  `voucher_date` varchar(200) DEFAULT NULL,
  `voucher_type` varchar(200) DEFAULT NULL,
  `voucher_no` varchar(200) DEFAULT NULL,
  `total_debit` varchar(200) DEFAULT NULL,
  `total_credit` varchar(200) DEFAULT NULL,
  `amount_paid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_attach`
--

CREATE TABLE `leave_attach` (
  `leave_attach_id` int(20) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `leave_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_attach`
--

INSERT INTO `leave_attach` (`leave_attach_id`, `file_name`, `file_location`, `date_uploaded`, `leave_id`) VALUES
(1, 'SM.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/leave/', 'September 2, 2024 9:09:pm  ', '18'),
(2, 'UP.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/leave/', 'September 2, 2024 9:09:pm  ', '18');

-- --------------------------------------------------------

--
-- Table structure for table `lnd`
--

CREATE TABLE `lnd` (
  `lnd_id` int(20) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `date_started` varchar(200) DEFAULT NULL,
  `no_of_hours` varchar(200) DEFAULT NULL,
  `validity` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lnd`
--

INSERT INTO `lnd` (`lnd_id`, `title`, `date_started`, `no_of_hours`, `validity`, `description`, `user_id`, `status`) VALUES
(6, 'PowerBi1', '2024-09-01', '81', '2024-10-01', 'powerbi maps1', '29,30,33', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lnd_attach`
--

CREATE TABLE `lnd_attach` (
  `lnd_attach_id` int(20) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `lnd_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lnd_attach`
--

INSERT INTO `lnd_attach` (`lnd_attach_id`, `file_name`, `file_location`, `date_uploaded`, `lnd_id`) VALUES
(11, 'CO - Copy.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/lnd/', 'September 3, 2024 4:21:pm  ', '6');

-- --------------------------------------------------------

--
-- Table structure for table `mrf`
--

CREATE TABLE `mrf` (
  `mrf_id` int(20) NOT NULL,
  `mrf_no` varchar(200) DEFAULT NULL,
  `date_requested` varchar(200) DEFAULT NULL,
  `date_needed` varchar(200) DEFAULT NULL,
  `requested_by` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `project_id` varchar(200) DEFAULT NULL,
  `isexternal` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mrf`
--

INSERT INTO `mrf` (`mrf_id`, `mrf_no`, `date_requested`, `date_needed`, `requested_by`, `remarks`, `status`, `project_id`, `isexternal`) VALUES
(87, 'MRF-2024-000087', '2024-08-17', '2024-08-30', 'Admin admin Admin', 'external req', 'Pending', NULL, '1'),
(89, 'MRF-2024-000089', '2024-08-17', '2024-08-30', 'Admin admin Admin', '', 'Pending', '109', NULL),
(90, 'MRF-2024-000090', '2024-08-17', '2024-08-30', 'Admin admin Admin', 'main', 'Pending', '108', NULL),
(91, 'MRF-2024-000091', '2024-08-21', '2024-08-22', 'Admin admin Admin', '', 'Pending', NULL, '1'),
(92, 'MRF-2024-000092', '2024-08-21', '2024-08-30', 'Admin admin Admin', '', 'Pending', NULL, '1'),
(93, 'MRF-2024-000093', '2024-09-07', '2024-09-08', 'Frenzy C Sarmiento', '', 'Pending', '112', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mrf_items`
--

CREATE TABLE `mrf_items` (
  `mrf_items_id` int(20) NOT NULL,
  `item` varchar(200) DEFAULT NULL,
  `specs` varchar(200) DEFAULT NULL,
  `qty_needed` varchar(200) DEFAULT NULL,
  `unit` varchar(200) DEFAULT NULL,
  `mrf_id` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mrf_items`
--

INSERT INTO `mrf_items` (`mrf_items_id`, `item`, `specs`, `qty_needed`, `unit`, `mrf_id`, `status`) VALUES
(481, 'Pressure Gauge', 'Stainless', '10', 'unit/s', '87', 'MRF'),
(482, 'OZONE GENERATOR ', '15G ', '20', 'unit/s', '87', 'MRF'),
(483, 'BOOSTER PUMP', 'Brand: Aquatek Model: ATS150 1.5 hp ', '30', 'unit/s', '87', 'PO'),
(496, 'Aerogrids', 'Improvise', '200', 'unit/s', '89', 'MRF'),
(497, 'MANUAL HEAD', '4 inches', '20', 'unit/s', '89', 'MRF'),
(498, 'Aerogrids', 'Improvise', '17', 'unit/s', '89', 'MRF'),
(499, 'Biotube', '30cm', '16', 'unit/s', '89', 'MRF'),
(500, 'Kawake KB-401A', '2HP 3Phase', '100', ' unit/s', '89', 'PO'),
(501, 'Kawake KB-401A', '2HP 3Phase', '14', ' unit/s', '89', 'PO'),
(502, 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '25', 'unit/s', '89', 'PO'),
(503, 'BOOSTER PUMP', 'Brand:Aquatek Model: ATS100 1hp ', '18', 'unit/s', '89', 'PO'),
(504, 'Aerator ', 'Model:ACO-328 60Hz (PH)', '31', 'unit/s', '89', 'PO'),
(505, 'OZONE GENERATOR ', '10G ', '14', 'unit/s', '89', 'MRF'),
(506, 'OZONE GENERATOR ', '15G ', '16', 'unit/s', '89', 'MRF'),
(507, 'Microbes', 'green', '540', 'gram', '89', 'MRF'),
(508, 'OZONE GENERATOR ', '50G ', '32', 'unit/s', '90', 'MRF'),
(509, 'Kawake KB-401A', '1.5HP 3Phase', '14', ' unit/s', '90', 'PO'),
(510, 'Aerogrids', 'Improvise', '13', 'unit/s', '90', 'MRF'),
(511, 'KAWAKE KB-601A-21', '3.42HP/3P', '20', 'unit/s', '91', 'PO'),
(512, 'Kawake KB-401A', '2HP 3Phase', '15', 'unit/s', '92', 'PO'),
(513, 'CHAIR', '16x20 cm', '15', 'pieces', '93', 'MRF'),
(514, 'Aerator', 'Model:ACO-328 60Hz (PH)', '5', 'unit/s', '93', 'MRF'),
(515, 'Microbes', 'blue gray', '1', 'lot', '93', 'MRF');

-- --------------------------------------------------------

--
-- Table structure for table `pmrc_billing`
--

CREATE TABLE `pmrc_billing` (
  `pmrc_billing_id` int(10) NOT NULL,
  `billing_id` int(10) DEFAULT NULL,
  `project_id` int(10) DEFAULT NULL,
  `date_created` varchar(200) DEFAULT NULL,
  `date_created_raw` varchar(200) DEFAULT NULL,
  `total_amount` varchar(200) DEFAULT NULL,
  `gross_amt` varchar(200) DEFAULT NULL,
  `VAT` varchar(200) DEFAULT NULL,
  `netVAT` varchar(200) DEFAULT NULL,
  `with_tax` varchar(200) DEFAULT NULL,
  `net_amount` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `voucher` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmrc_dr`
--

CREATE TABLE `pmrc_dr` (
  `pmrc_po_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `dr_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `pmrc_billing_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmrc_po`
--

CREATE TABLE `pmrc_po` (
  `pmrc_po_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `po_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `pmrc_billing_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmrc_service_invoice`
--

CREATE TABLE `pmrc_service_invoice` (
  `pmrc_si_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `si_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `pmrc_billing_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmrc_transmittal`
--

CREATE TABLE `pmrc_transmittal` (
  `pmrc_tr_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `tr_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `pmrc_billing_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pm_billing`
--

CREATE TABLE `pm_billing` (
  `pm_billing_id` int(20) NOT NULL,
  `billing_id` int(20) DEFAULT NULL,
  `project_id` int(20) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `date_created` varchar(200) DEFAULT NULL,
  `date_created_raw` varchar(200) DEFAULT NULL,
  `pm_type` varchar(200) DEFAULT NULL,
  `payment_month` varchar(200) DEFAULT NULL,
  `monthly_amt` varchar(200) DEFAULT NULL,
  `receipt_type` varchar(200) DEFAULT NULL,
  `gross_amt` varchar(200) DEFAULT NULL,
  `VAT` varchar(200) DEFAULT NULL,
  `netVAT` varchar(200) DEFAULT NULL,
  `with_tax` varchar(200) DEFAULT NULL,
  `net_amount` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `voucher` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_billing`
--

INSERT INTO `pm_billing` (`pm_billing_id`, `billing_id`, `project_id`, `type`, `date_created`, `date_created_raw`, `pm_type`, `payment_month`, `monthly_amt`, `receipt_type`, `gross_amt`, `VAT`, `netVAT`, `with_tax`, `net_amount`, `status`, `voucher`) VALUES
(260, 32, 108, 'Operatorship', 'October 2, 2024', '2024-10-', '3', '1', '₱16,369,047.62', NULL, '₱16,666,666.67', '₱1,785,714.29', NULL, '₱297,619.05', '₱16,369,047.62', 'For Collection', '0'),
(261, 32, 108, 'Operatorship', 'November 2, 2024', '2024-11-', '3', '2', '₱16,369,047.62', NULL, '₱16,666,666.67', '₱1,785,714.29', NULL, '₱297,619.05', '₱16,369,047.62', 'For Collection', '0'),
(262, 32, 108, 'Operatorship', 'December 2, 2024', '2024-12-', '3', '3', '₱16,369,047.62', NULL, '₱16,666,666.67', '₱1,785,714.29', NULL, '₱297,619.05', '₱16,369,047.62', 'For Collection', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pm_dr`
--

CREATE TABLE `pm_dr` (
  `pm_dr_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `pm_billing_id` int(10) DEFAULT NULL,
  `dr_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pm_po`
--

CREATE TABLE `pm_po` (
  `pm_po_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `pm_billing_id` int(10) DEFAULT NULL,
  `po_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pm_service_invoice`
--

CREATE TABLE `pm_service_invoice` (
  `pm_si_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `pm_billing_id` int(10) DEFAULT NULL,
  `si_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pm_transmittal`
--

CREATE TABLE `pm_transmittal` (
  `pm_tr_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `pm_billing_id` int(10) DEFAULT NULL,
  `tr_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `po_id` int(20) NOT NULL,
  `po_no` varchar(200) DEFAULT NULL,
  `date_requested` varchar(200) DEFAULT NULL,
  `date_of_delivery` varchar(200) DEFAULT NULL,
  `supplier_id` varchar(200) DEFAULT NULL,
  `remarks` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `requested_by` varchar(200) DEFAULT NULL,
  `mode_of_payment` varchar(200) DEFAULT NULL,
  `terms` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `service_type` varchar(200) DEFAULT NULL,
  `vat` varchar(200) DEFAULT NULL,
  `total_gross_amount` varchar(200) DEFAULT NULL,
  `total_discount` varchar(200) DEFAULT NULL,
  `total_net_amount` varchar(200) DEFAULT NULL,
  `withholding_tax` varchar(200) DEFAULT NULL,
  `total_deposit` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`po_id`, `po_no`, `date_requested`, `date_of_delivery`, `supplier_id`, `remarks`, `status`, `requested_by`, `mode_of_payment`, `terms`, `discount`, `service_type`, `vat`, `total_gross_amount`, `total_discount`, `total_net_amount`, `withholding_tax`, `total_deposit`) VALUES
(119, 'PO-2024-000119', '2024-08-21', '2024-08-23', '\r\n                    24                    ', '4', 'Delivered', 'Admin admin Admin', 'Cash', '2', '25', 'Goods', 'VAT', '3984458.12', '996114.53', '2988343.59', '26681.64', '2961661.95'),
(120, 'PO-2024-000120', '2024-08-22', '2024-08-24', '\r\n                    12                    ', 'ree', 'Pending', 'Admin admin Admin', 'Cash', '1', '25', 'Services', 'VAT', '65627.00', '16406.75', '49220.25', '878.93', '48341.32');

-- --------------------------------------------------------

--
-- Table structure for table `po_attach`
--

CREATE TABLE `po_attach` (
  `po_attach_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `po_id` varchar(200) DEFAULT NULL,
  `po_no` varchar(200) DEFAULT NULL,
  `dr_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL,
  `reference_no` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_attach`
--

INSERT INTO `po_attach` (`po_attach_id`, `file_name`, `file_location`, `po_id`, `po_no`, `dr_no`, `date_uploaded`, `reference_no`) VALUES
(127, 'BC - Copy.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/purchase_order/', '119', 'PO-2024-000119', NULL, NULL, 'pay 2,961,000.00'),
(128, 'BC.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/purchase_order/', '119', 'PO-2024-000119', NULL, NULL, 'pay 2,961,000.00'),
(129, 'EA.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/purchase_order/', '119', 'PO-2024-000119', NULL, NULL, 'pay 661.95'),
(132, 'CO.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/purchase_order/dr/', '119', NULL, 'dr1', 'August 22, 2024 5:22:pm  ', NULL),
(133, 'EC - Copy.pdf', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/purchase_order/dr/', '119', NULL, 'dr2', 'August 22, 2024 5:22:pm  ', NULL),
(134, 'PROGRESS BILLING with RECOUPMENT .xlsx', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/purchase_order/', '121', 'PO-2024-000121', NULL, NULL, '3515651365633');

-- --------------------------------------------------------

--
-- Table structure for table `po_dr`
--

CREATE TABLE `po_dr` (
  `po_dr_id` int(10) NOT NULL,
  `dr_no` varchar(200) DEFAULT NULL,
  `date_delivered` varchar(200) DEFAULT NULL,
  `received_by` varchar(200) DEFAULT NULL,
  `mrf_items_id` varchar(200) DEFAULT NULL,
  `qty_delivered` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_dr`
--

INSERT INTO `po_dr` (`po_dr_id`, `dr_no`, `date_delivered`, `received_by`, `mrf_items_id`, `qty_delivered`) VALUES
(156, 'dr1', '2024-08-22', 'Admin admin Admin', '509', '10'),
(157, 'dr1', '2024-08-22', 'Admin admin Admin', '500', '120'),
(158, 'dr1', '2024-08-22', 'Admin admin Admin', '511', '10'),
(159, 'dr2', '2024-08-22', 'Admin admin Admin', '509', '4'),
(160, 'dr2', '2024-08-22', 'Admin admin Admin', '500', '9'),
(161, 'dr2', '2024-08-22', 'Admin admin Admin', '511', '10');

-- --------------------------------------------------------

--
-- Table structure for table `po_items`
--

CREATE TABLE `po_items` (
  `po_items_id` int(20) NOT NULL,
  `po_id` varchar(200) DEFAULT NULL,
  `mrf_items_id` varchar(200) DEFAULT NULL,
  `qty_po` varchar(200) DEFAULT NULL,
  `price_per_unit` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_items`
--

INSERT INTO `po_items` (`po_items_id`, `po_id`, `mrf_items_id`, `qty_po`, `price_per_unit`, `price`) VALUES
(357, '119', '500', '100', '22148.00', '2214800.00'),
(358, '119', '501', '14', '22148.00', '310072.00'),
(359, '119', '509', '14', '19872.58', '278216.12'),
(360, '119', '511', '20', '42457.50', '849150.00'),
(361, '119', '512', '15', '22148.00', '332220.00'),
(362, '120', '504', '31', '2117.00', '65627.00');

-- --------------------------------------------------------

--
-- Table structure for table `po_pay`
--

CREATE TABLE `po_pay` (
  `po_pay_id` int(10) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `date_paid` varchar(200) DEFAULT NULL,
  `balance` varchar(200) DEFAULT NULL,
  `po_id` varchar(200) DEFAULT NULL,
  `reference_no` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_pay`
--

INSERT INTO `po_pay` (`po_pay_id`, `amount`, `date_paid`, `balance`, `po_id`, `reference_no`) VALUES
(27, '2961000', NULL, '661.95', '119', NULL),
(30, '2961000', '2024-08-21', '661.95', '119', 'pay 2,961,000.00'),
(31, '661.95', '2024-08-21', NULL, '119', 'pay 661.95'),
(32, '48300', NULL, '41.32', '120', NULL),
(33, '48300', '2024-08-29', '41.32', '120', '2024-125463'),
(34, '5000', NULL, '5280.68', '121', NULL),
(35, '5000', '2024-09-07', '5280.68', '121', '3515651365633');

-- --------------------------------------------------------

--
-- Table structure for table `progress_billing`
--

CREATE TABLE `progress_billing` (
  `pb_id` int(20) NOT NULL,
  `billing_id` int(20) DEFAULT NULL,
  `date_created` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `poa` varchar(200) DEFAULT NULL,
  `voa` varchar(200) DEFAULT NULL,
  `deduction` varchar(200) DEFAULT NULL,
  `recoupment` varchar(200) DEFAULT NULL,
  `retention` varchar(200) DEFAULT NULL,
  `due_payable` varchar(200) DEFAULT NULL,
  `due_payable_ewt` varchar(200) DEFAULT NULL,
  `balance` varchar(200) DEFAULT NULL,
  `balance_ewt` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `VAT` varchar(200) DEFAULT NULL,
  `voucher` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_billing`
--

INSERT INTO `progress_billing` (`pb_id`, `billing_id`, `date_created`, `type`, `poa`, `voa`, `deduction`, `recoupment`, `retention`, `due_payable`, `due_payable_ewt`, `balance`, `balance_ewt`, `status`, `VAT`, `voucher`) VALUES
(124, 33, 'August 17, 2024 5:28:pm  ', 'Downpayment', '20%', '₱1,802,632.00', '', '', '', '₱1,802,632.00', '₱1,770,442.14', '₱7,210,528.00', '₱7,081,768.58', 'For Collection', NULL, '0'),
(125, 33, 'August 17, 2024 5:29:pm  ', 'Progress Billing No. 1', '30%', '₱2,703,948.00', '₱811,184.40', '₱540,789.60', '₱270,394.80', '₱1,892,763.60', '₱1,858,964.25', '₱5,317,764.40', '₱5,222,804.32', 'For Collection', NULL, '0'),
(126, 34, 'September 7, 2024 1:04:pm  ', 'Downpayment', '20%', '₱226,999.36', '', '', '', '₱226,999.36', '₱222,945.80', '₱907,997.44', '₱891,783.20', 'Collected', NULL, '0'),
(127, 34, 'September 7, 2024 1:42:pm  ', 'Progress Billing No. 1', '30%', '₱340,499.04', '₱102,149.71', '₱68,099.81', '₱34,049.90', '₱238,349.33', '₱234,093.09', '₱669,648.11', '₱657,690.11', 'Collected', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(20) NOT NULL,
  `company_id` int(20) DEFAULT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `treatment_fac` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `landline` varchar(200) DEFAULT NULL,
  `tin` varchar(200) DEFAULT NULL,
  `project_details` varchar(200) DEFAULT NULL,
  `overall_cost` varchar(200) DEFAULT NULL,
  `bid_details` varchar(200) DEFAULT NULL,
  `reference` varchar(200) DEFAULT NULL,
  `deadline` varchar(200) DEFAULT NULL,
  `deadline_raw` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `boq_id` int(20) DEFAULT NULL,
  `gantt_id` int(20) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `date_created` varchar(200) DEFAULT NULL,
  `date_created_raw` varchar(200) DEFAULT NULL,
  `created_by_id` int(20) DEFAULT NULL,
  `printedboq` varchar(10) DEFAULT NULL,
  `boq_date_created` varchar(200) DEFAULT NULL,
  `boq_date_created_raw` varchar(200) DEFAULT NULL,
  `boq_created_by` varchar(200) DEFAULT NULL,
  `vatinc` varchar(10) DEFAULT NULL,
  `signed` varchar(200) DEFAULT NULL,
  `signed_user` varchar(200) DEFAULT NULL,
  `signed_date` varchar(200) DEFAULT NULL,
  `signed_date_raw` varchar(200) DEFAULT NULL,
  `project_type` varchar(200) DEFAULT NULL,
  `tis_no` varchar(200) DEFAULT NULL,
  `contract_price` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `company_id`, `project_name`, `treatment_fac`, `address`, `longitude`, `latitude`, `owner`, `contact_person`, `contact_number`, `landline`, `tin`, `project_details`, `overall_cost`, `bid_details`, `reference`, `deadline`, `deadline_raw`, `notes`, `boq_id`, `gantt_id`, `status`, `date_created`, `date_created_raw`, `created_by_id`, `printedboq`, `boq_date_created`, `boq_date_created_raw`, `boq_created_by`, `vatinc`, `signed`, `signed_user`, `signed_date`, `signed_date_raw`, `project_type`, `tis_no`, `contract_price`) VALUES
(107, 48, 'GIDDEL LUCIONS FACTORY', '5', 'QUEZON CITY', '121.05188581465853', '14.68226066668241', 'GIDDEL LUCION', 'GIDDEL LUCION', '09123456789', '12325566', '213234654651564654', 'FOR TESTING', NULL, '', 'RUSH', 'August 24, 2024 12:00:am  ', '2024-08-24', 'NOTHING', NULL, NULL, '1', 'August 17, 2024 4:18:pm  ', '2024-08-17', 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Maintenance', '', '10000000'),
(108, 50, 'ANABELLES CORPORATION', '10', 'BULACAN', '121.03190323065', '14.944868472460353', 'ANABELLE WAHING', 'ANABELLE WAHING', '09784563212', '21544353', '2153555666', 'NEED DIN TO TEST TODAY', NULL, '', 'FOR RUSH', 'August 24, 2024 12:00:am  ', '2024-08-24', '', NULL, NULL, '1', 'August 17, 2024 4:21:pm  ', '2024-08-17', 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Maintenance', '', '50000000'),
(109, 48, 'FRENZY LOUS CORPORATION', '10', 'CARAMOAN', '123.844824351789', '13.807648699232525', 'FRENZY LOU SARMIENTO', 'FRENZY LOU SARMIENTO', '21364666565', '31654654', '', 'FOR BOQ', '11253160.0048', '', 'MEEEEEEEEEEE', 'August 24, 2024 12:00:am  ', '2024-08-24', 'FOR BOQ', NULL, NULL, '1', 'August 17, 2024 4:42:pm  ', '2024-08-17', 38, NULL, 'August 17, 2024 4:48:pm  ', '2024-08-17', '1', '1', NULL, NULL, NULL, NULL, 'Installation', '', ''),
(110, 50, 'BLACK SCOOP', '20', 'QUEZON CITY', '121.04433271422195', '14.676282569344945', 'LAPU-LAPU', 'LAPU-LAPU', '56465416556', '23156464', '', '', '1520000.00', '', '', 'August 24, 2024 12:00:am  ', '2024-08-24', 'AUGUST 21, 2024', NULL, NULL, '1', 'August 21, 2024 8:59:pm  ', '2024-08-21', 38, NULL, 'August 21, 2024 9:02:pm  ', '2024-08-21', '1', '0', '1', '1', 'August 21, 2024 9:14:pm  ', '2024-08-21', 'Installation', '', ''),
(111, 50, 'AAW WWTF', '1500 cubic meters per day', 'San Vicente, San Miguel, Bohol', '120.5897531', '14.051223', 'Arlene A. Wahing', 'Belle Wahing', '09509530551', '', '451-593-6201', '', '7000000.00', '', '', 'October 31, 2024 12:00:am  ', '2024-10-31', '', NULL, NULL, '1', 'August 29, 2024 7:34:pm  ', '2024-08-29', 1, NULL, 'August 29, 2024 7:36:pm  ', '2024-08-29', '38', '0', '1', '38', 'August 29, 2024 8:01:pm  ', '2024-08-29', 'Installation', '', ''),
(112, 49, 'BROWNY', '10', '', '121.04433271422195', '14.675286203904484', '', '', '', '', '', '', '1134996.8', '', '', 'January 1, 1970 8:00:am  ', '', '', NULL, NULL, '1', 'September 7, 2024 11:39:am  ', '2024-09-07', 38, NULL, 'September 7, 2024 12:09:pm  ', '2024-09-07', '38', '1', '1', '38', 'September 7, 2024 12:17:pm  ', '2024-09-07', 'Installation', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_site_dr`
--

CREATE TABLE `project_site_dr` (
  `project_site_dr_id` int(10) NOT NULL,
  `po_dr_id` varchar(200) DEFAULT NULL,
  `date_delivered` varchar(200) DEFAULT NULL,
  `received_by` varchar(200) DEFAULT NULL,
  `mrf_items_id` varchar(200) DEFAULT NULL,
  `qty_delivered_site` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_site_dr_return`
--

CREATE TABLE `project_site_dr_return` (
  `project_site_dr_return_id` int(10) NOT NULL,
  `po_dr_id` varchar(200) DEFAULT NULL,
  `date_returned` varchar(200) DEFAULT NULL,
  `returned_by` varchar(200) DEFAULT NULL,
  `mrf_items_id` varchar(200) DEFAULT NULL,
  `qty_returned_site` varchar(200) DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rv_voucher`
--

CREATE TABLE `rv_voucher` (
  `voucher_id` int(10) NOT NULL,
  `pb_id` varchar(10) DEFAULT NULL,
  `pm_billing_id` varchar(10) DEFAULT NULL,
  `pmrc_billing_id` varchar(10) DEFAULT NULL,
  `voucher_type` varchar(200) DEFAULT NULL,
  `voucher_no` varchar(200) DEFAULT NULL,
  `voucher_date` varchar(200) DEFAULT NULL,
  `voucher_payment` varchar(200) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `cash_account_id` varchar(200) DEFAULT NULL,
  `bank_debit_credit` varchar(200) DEFAULT NULL,
  `tax_debit_credit` varchar(200) DEFAULT NULL,
  `account_receive_drcr` varchar(200) DEFAULT NULL,
  `vat_drcr` varchar(200) DEFAULT NULL,
  `total_debit` varchar(200) DEFAULT NULL,
  `total_credit` varchar(200) DEFAULT NULL,
  `stat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice`
--

CREATE TABLE `service_invoice` (
  `si_id` int(10) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `pb_id` int(10) DEFAULT NULL,
  `si_no` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_invoice`
--

INSERT INTO `service_invoice` (`si_id`, `file_name`, `file_location`, `pb_id`, `si_no`, `date_uploaded`) VALUES
(20, 'PROGRESS BILLING with RECOUPMENT .xlsx', 'C:/xampp/htdocs/Techbrokers_Integrated_System/assets/attachments/service_invoice/', 126, '15', 'September 7, 2024 1:06:pm  ');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `site_id` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `name`, `location`, `description`, `longitude`, `latitude`) VALUES
(10, 'ADMIN - MANILA', '', '', '14.62601794104357', '121.00211431759111');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_inventory`
--

CREATE TABLE `supplier_inventory` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `tin` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ref_type` varchar(200) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `business_type` varchar(200) NOT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `acct_name` varchar(200) DEFAULT NULL,
  `acct_no` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_inventory`
--

INSERT INTO `supplier_inventory` (`supplier_id`, `supplier_name`, `tin`, `address`, `ref_type`, `ref_no`, `business_type`, `bank`, `acct_name`, `acct_no`) VALUES
(11, 'BRILLS MARKETING CORPORATION ', '005-679-709-000', '2765 New Panaderos Ext, Santa Ana, Manila', '', '', 'Exhaust Fan', NULL, NULL, NULL),
(12, 'FEV MARINE', '225-110-309-000', '9 Orestes Ln, Cubao, Quezon City,', '', '', 'AERATOR', NULL, NULL, NULL),
(13, 'CAMARIN HARDWARE', '611-638-591-0000', 'B1 L7 Zapote St, Camarin Rd, Barangay 178, Caloocan', '', '', 'Hardware Materials', NULL, NULL, NULL),
(14, 'COLIN BUILDERS SUPPLY', '211-461-646-000', '152 N.S. Amoranto Sr. St, La Loma, Quezon City', '', '', 'Pvc Pipes & Fittings', NULL, NULL, NULL),
(15, 'GCT MARKETING CORP.', '615-380-774-00000', '817 Tetuan St, Santa Cruz, Manila', '', '', 'Submersible Pump/ Pressure Tank', NULL, NULL, NULL),
(16, 'PURESTAR IMPORT EXPORT INC.', '008-917-223-000', ' 143 Cordillera, Santa Mesa Heights, Quezon City', '', '', 'FRP Tank/ Booster Pump/ Filtration Pipes & Fittings', 'BDO', 'Giddel Lucion', '123123123123'),
(17, 'VICTOR HARDWARE', '000-329-273-000', '697-699 Gregorio Araneta Ave, Quezon City, Metro Manila', '', '', 'Kawake Ring Blower', NULL, NULL, NULL),
(18, 'CHINA', 'N/A', 'CHINA', '', '', 'IMPORT', 'BDO', 'Ana', '123123123123'),
(19, 'FJMB LUCKY INDUSTRIAL SUPPLY', '464-444-238-000', '1512 Recto Ave, Santa Cruz, Manila', '', '', 'Stainless / PVC Supplies', NULL, NULL, NULL),
(20, 'ARROW ELECTRICAL SUPPLY', '107-295-939-000', '814 G Puyat St. Zone 040 Brgy. 394, Quiapo Manila', '', '', 'Electrical Supplies', NULL, NULL, NULL),
(21, 'ART BASE CORPORATION', '205-062-931-000', 'Room 507 Makati Executive Center, Salcedo Village, Makati City', '', '', 'Coagulant ', NULL, NULL, NULL),
(22, 'GRAND HONOR STAINLESS TRADING CORP.', 'DR ONLY', '1013-1015 BENAVIDEZ ST, BRGY. 294, ZONE 028, BINONDO MANILA', '', '', 'STAINLESS', NULL, NULL, NULL),
(23, 'PURESTAR IMPORT  EXPORT INC.', '008-917-223-000', ' 143 Cordillera, Santa Mesa Heights, Quezon City', '', '', 'PUMP-SEKO-OZONE-P.SWTCH-A1', 'UNIONBANK', 'Ana', '098754'),
(24, 'VICTOR HARDWARE', '000-329-273-000', '697-699, 697-699 Gregorio Araneta Ave, Quezon City, Metro Manila', '', '', 'KAWAKE', 'EASTWEST', 'Freny', '213123123'),
(25, 'COASTLANE MARKETING', 'Change Company', '74 Matutum, Quezon City', '', '', 'Booster Pump', NULL, NULL, NULL),
(27, 'MANILA', '21231353123136', 'CARAMOAN', '', '', 'FURNITURE', 'BDO', 'MANILA BAY', '1111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `time_record`
--

CREATE TABLE `time_record` (
  `time_record_id` int(10) NOT NULL,
  `time_in` varchar(200) DEFAULT NULL,
  `time_in_raw` varchar(200) DEFAULT NULL,
  `time_out` varchar(200) DEFAULT NULL,
  `time_out_raw` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_record`
--

INSERT INTO `time_record` (`time_record_id`, `time_in`, `time_in_raw`, `time_out`, `time_out_raw`, `user_id`, `longitude`, `latitude`) VALUES
(34, 'August 31, 2024 10:57:pm  ', '2024-08-31 22:57:58', NULL, NULL, '1', '121.0661848', '14.6289157');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `employee_number` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `birthdate` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `landline` varchar(200) DEFAULT NULL,
  `home_address` varchar(200) DEFAULT NULL,
  `skills` varchar(200) DEFAULT NULL,
  `hmo` varchar(200) DEFAULT NULL,
  `tin` varchar(200) DEFAULT NULL,
  `sss` varchar(200) DEFAULT NULL,
  `pagibig` varchar(200) DEFAULT NULL,
  `philhealth` varchar(200) DEFAULT NULL,
  `department_id` int(20) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `site_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `employee_number`, `first_name`, `middle_name`, `last_name`, `birthdate`, `email`, `contact`, `landline`, `home_address`, `skills`, `hmo`, `tin`, `sss`, `pagibig`, `philhealth`, `department_id`, `designation`, `username`, `password`, `status`, `site_id`) VALUES
(1, '0001', 'Admin', 'admin', 'Admin', '', '', '', '', '', '', '', '', '', '', '', 18, '8', 'admin', 'admin', '1', NULL),
(29, '2022-0048', 'JASPER', 'MANALO', 'CANIDO', '1995-07-26', 'jaspercanido@techbrokers.ph', '09452349922', '', '150 DONA JULIANA ST. FILINVEST 2 QUEZON CITY', '', '34883576', '625-194-088-0000', '35-1342490-3', '1212-9112-2340', '03-051403471-7', 18, '9', 'jmcanido', '1234', '1', NULL),
(30, '2022-0078', 'CRESFER', 'SAPIO', 'TELIN JR', '2000-02-06', 'cresfer.telin@techbrokers.ph', '09102191889', '', 'PUROK 5 STO. NINO BUTUAN CITY AGUSAN DEL NORTE\r\n', '', '35107075', '625-228-486-00000', '08-2889033-7', '1212-3604-3983', '18-251281203-2', 18, '9', 'cstelin jr', '1234', '1', NULL),
(32, '2022-0079', 'MANUEL', 'ORALE', 'DURAN', '1979-05-30', 'manuel.duran@techbrokers.ph', '', '', '196 SAN BASILIO ZONE 3 STA. RITA, PAMPANGA', '', '35207216', '211-725-144-000', '33-7426308-8', '1050-0024-9679', '19-089975218-3', 14, '9', 'moduran', '1234', '1', NULL),
(33, '2022-0089', 'JULIEBETH', 'BACODIO', 'TAN', '1989-01-21', 'juliebeth.tan@techbrokers.ph', '09761721772', '', 'BLK 11 LOT 36 PHASE 2 SPRINGTOWN VILLA BUCAL TANZA CAVITE', '', '34883575', '307-409-155-000', '34-0923059-1', '1040-0302-7949', '02-050843391-4', 15, '9', 'jbtan', '1234', '1', NULL),
(34, '2023-0131', 'REA', 'TINIO', 'BADILLA', '1999-04-09', 'rea.badilla@techbrokers.ph', '09456820699', '', 'BLK 6 PAMA SAWATA 3 C-3 ROAD DAGAT-DAGATAN, CALOOCAN CITY\r\n', '', '35565377', '751-837-862-00000', '34-8335800-4', '1212-4792-4187', '02-027227647-2', 17, '9', 'rtbadilla', '1234', '1', NULL),
(35, '2023-0117', 'JUDELIX', 'PLAZA', 'LORETO', '1996-05-11', 'loretojudelix@gmail.com', '09095672955', '', 'P-2 SAN AGUSTIN, BAYUGAN, AGUSAN DEL SUR', '', '35565396', '625-200-008-00000', '35-2639946-7', '1212-9863-0016', '18-201068812-5', 18, '9', 'jploreto', '1234', '1', NULL),
(36, '2023-0136', 'ANGELICA', 'LAYLAY', 'LLENA', '2000-07-26', 'angelicallena619@gmail.com', '09673800942', '', '', '', '35565394', '605-679-654-00000', '35-2639946-7', '1213-2296-8741', '03-026781219-1', 21, '9', 'alllena', '1234', '1', NULL),
(37, 'asrawet', 'asfsf', 'asdasfswf', 'asfasasg', '2024-08-03', 'fdzhgdhfseh@gmail.com', '', '', 'vhdcreyae', '', '1123', '131313', '1313', '131313', '131313', 14, '8', 'aaasfasasg', '1234', '0', NULL),
(38, '10002', 'Frenzy', 'C', 'Sarmiento', '2024-08-31', '', '', '', '', '', '', '', '', '', '', 18, '8', 'fcsarmiento', '1234', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(10) NOT NULL,
  `voucher_no` varchar(200) NOT NULL,
  `cash_account_id` varchar(200) NOT NULL,
  `v_drcr` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_attachment`
--

CREATE TABLE `voucher_attachment` (
  `va_id` int(10) NOT NULL,
  `voucher_id` int(10) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `date_uploaded` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_history`
--

CREATE TABLE `voucher_history` (
  `history_id` int(10) NOT NULL,
  `cash_account_id` int(10) DEFAULT NULL,
  `voucher_date` varchar(200) DEFAULT NULL,
  `account_title` varchar(200) DEFAULT NULL,
  `balance` varchar(200) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher_history`
--

INSERT INTO `voucher_history` (`history_id`, `cash_account_id`, `voucher_date`, `account_title`, `balance`, `account_name`, `account_number`) VALUES
(3, 11, '2024-08-21 21:39:38', 'Cash In Bank - BDO_bjhjcdhjcdhjd', '4', 'FRENZY LOU SARMIENTO', 'bjhjcdhjcdhjd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`access_level_id`);

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `bnd`
--
ALTER TABLE `bnd`
  ADD PRIMARY KEY (`bnd_id`);

--
-- Indexes for table `boq`
--
ALTER TABLE `boq`
  ADD PRIMARY KEY (`boq_id`);

--
-- Indexes for table `boq_cat`
--
ALTER TABLE `boq_cat`
  ADD PRIMARY KEY (`boq_cat_id`);

--
-- Indexes for table `boq_config`
--
ALTER TABLE `boq_config`
  ADD PRIMARY KEY (`boq_config_id`);

--
-- Indexes for table `boq_main_cat`
--
ALTER TABLE `boq_main_cat`
  ADD PRIMARY KEY (`boq_main_cat_id`);

--
-- Indexes for table `boq_purchasing`
--
ALTER TABLE `boq_purchasing`
  ADD PRIMARY KEY (`boq_purchasing_id`);

--
-- Indexes for table `cash_in_bank`
--
ALTER TABLE `cash_in_bank`
  ADD PRIMARY KEY (`cash_account_id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `chart_account_title`
--
ALTER TABLE `chart_account_title`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `check_voucher`
--
ALTER TABLE `check_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `cv_voucher`
--
ALTER TABLE `cv_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `fixed_assets`
--
ALTER TABLE `fixed_assets`
  ADD PRIMARY KEY (`fixed_asset_id`);

--
-- Indexes for table `forms_leave`
--
ALTER TABLE `forms_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `forms_loan`
--
ALTER TABLE `forms_loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `forms_ot`
--
ALTER TABLE `forms_ot`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `forwarding`
--
ALTER TABLE `forwarding`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `group_company`
--
ALTER TABLE `group_company`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `hr_user_profile`
--
ALTER TABLE `hr_user_profile`
  ADD PRIMARY KEY (`user_profile_id`);

--
-- Indexes for table `hr_user_profile_bank`
--
ALTER TABLE `hr_user_profile_bank`
  ADD PRIMARY KEY (`user_profile_bank_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `jvlf_voucher`
--
ALTER TABLE `jvlf_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `leave_attach`
--
ALTER TABLE `leave_attach`
  ADD PRIMARY KEY (`leave_attach_id`);

--
-- Indexes for table `lnd`
--
ALTER TABLE `lnd`
  ADD PRIMARY KEY (`lnd_id`);

--
-- Indexes for table `lnd_attach`
--
ALTER TABLE `lnd_attach`
  ADD PRIMARY KEY (`lnd_attach_id`);

--
-- Indexes for table `mrf`
--
ALTER TABLE `mrf`
  ADD PRIMARY KEY (`mrf_id`);

--
-- Indexes for table `mrf_items`
--
ALTER TABLE `mrf_items`
  ADD PRIMARY KEY (`mrf_items_id`);

--
-- Indexes for table `pmrc_billing`
--
ALTER TABLE `pmrc_billing`
  ADD PRIMARY KEY (`pmrc_billing_id`);

--
-- Indexes for table `pmrc_dr`
--
ALTER TABLE `pmrc_dr`
  ADD PRIMARY KEY (`pmrc_po_id`);

--
-- Indexes for table `pmrc_po`
--
ALTER TABLE `pmrc_po`
  ADD PRIMARY KEY (`pmrc_po_id`);

--
-- Indexes for table `pmrc_service_invoice`
--
ALTER TABLE `pmrc_service_invoice`
  ADD PRIMARY KEY (`pmrc_si_id`);

--
-- Indexes for table `pmrc_transmittal`
--
ALTER TABLE `pmrc_transmittal`
  ADD PRIMARY KEY (`pmrc_tr_id`);

--
-- Indexes for table `pm_billing`
--
ALTER TABLE `pm_billing`
  ADD PRIMARY KEY (`pm_billing_id`);

--
-- Indexes for table `pm_dr`
--
ALTER TABLE `pm_dr`
  ADD PRIMARY KEY (`pm_dr_id`);

--
-- Indexes for table `pm_po`
--
ALTER TABLE `pm_po`
  ADD PRIMARY KEY (`pm_po_id`);

--
-- Indexes for table `pm_service_invoice`
--
ALTER TABLE `pm_service_invoice`
  ADD PRIMARY KEY (`pm_si_id`);

--
-- Indexes for table `pm_transmittal`
--
ALTER TABLE `pm_transmittal`
  ADD PRIMARY KEY (`pm_tr_id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `po_attach`
--
ALTER TABLE `po_attach`
  ADD PRIMARY KEY (`po_attach_id`);

--
-- Indexes for table `po_dr`
--
ALTER TABLE `po_dr`
  ADD PRIMARY KEY (`po_dr_id`);

--
-- Indexes for table `po_items`
--
ALTER TABLE `po_items`
  ADD PRIMARY KEY (`po_items_id`);

--
-- Indexes for table `po_pay`
--
ALTER TABLE `po_pay`
  ADD PRIMARY KEY (`po_pay_id`);

--
-- Indexes for table `progress_billing`
--
ALTER TABLE `progress_billing`
  ADD PRIMARY KEY (`pb_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_site_dr`
--
ALTER TABLE `project_site_dr`
  ADD PRIMARY KEY (`project_site_dr_id`);

--
-- Indexes for table `project_site_dr_return`
--
ALTER TABLE `project_site_dr_return`
  ADD PRIMARY KEY (`project_site_dr_return_id`);

--
-- Indexes for table `rv_voucher`
--
ALTER TABLE `rv_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `supplier_inventory`
--
ALTER TABLE `supplier_inventory`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `time_record`
--
ALTER TABLE `time_record`
  ADD PRIMARY KEY (`time_record_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `voucher_attachment`
--
ALTER TABLE `voucher_attachment`
  ADD PRIMARY KEY (`va_id`);

--
-- Indexes for table `voucher_history`
--
ALTER TABLE `voucher_history`
  ADD PRIMARY KEY (`history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `access_level_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `action_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ann_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `file_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `bnd`
--
ALTER TABLE `bnd`
  MODIFY `bnd_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boq`
--
ALTER TABLE `boq`
  MODIFY `boq_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2550;

--
-- AUTO_INCREMENT for table `boq_cat`
--
ALTER TABLE `boq_cat`
  MODIFY `boq_cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `boq_config`
--
ALTER TABLE `boq_config`
  MODIFY `boq_config_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `boq_main_cat`
--
ALTER TABLE `boq_main_cat`
  MODIFY `boq_main_cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `boq_purchasing`
--
ALTER TABLE `boq_purchasing`
  MODIFY `boq_purchasing_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2550;

--
-- AUTO_INCREMENT for table `cash_in_bank`
--
ALTER TABLE `cash_in_bank`
  MODIFY `cash_account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `chart_account_title`
--
ALTER TABLE `chart_account_title`
  MODIFY `title_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `check_voucher`
--
ALTER TABLE `check_voucher`
  MODIFY `voucher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cv_voucher`
--
ALTER TABLE `cv_voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fixed_assets`
--
ALTER TABLE `fixed_assets`
  MODIFY `fixed_asset_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms_leave`
--
ALTER TABLE `forms_leave`
  MODIFY `leave_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forms_loan`
--
ALTER TABLE `forms_loan`
  MODIFY `loan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forms_ot`
--
ALTER TABLE `forms_ot`
  MODIFY `ot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forwarding`
--
ALTER TABLE `forwarding`
  MODIFY `transaction_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `group_company`
--
ALTER TABLE `group_company`
  MODIFY `group_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `hr_user_profile`
--
ALTER TABLE `hr_user_profile`
  MODIFY `user_profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hr_user_profile_bank`
--
ALTER TABLE `hr_user_profile_bank`
  MODIFY `user_profile_bank_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `jvlf_voucher`
--
ALTER TABLE `jvlf_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `leave_attach`
--
ALTER TABLE `leave_attach`
  MODIFY `leave_attach_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lnd`
--
ALTER TABLE `lnd`
  MODIFY `lnd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lnd_attach`
--
ALTER TABLE `lnd_attach`
  MODIFY `lnd_attach_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mrf`
--
ALTER TABLE `mrf`
  MODIFY `mrf_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `mrf_items`
--
ALTER TABLE `mrf_items`
  MODIFY `mrf_items_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `pmrc_billing`
--
ALTER TABLE `pmrc_billing`
  MODIFY `pmrc_billing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pmrc_dr`
--
ALTER TABLE `pmrc_dr`
  MODIFY `pmrc_po_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pmrc_po`
--
ALTER TABLE `pmrc_po`
  MODIFY `pmrc_po_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pmrc_service_invoice`
--
ALTER TABLE `pmrc_service_invoice`
  MODIFY `pmrc_si_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pmrc_transmittal`
--
ALTER TABLE `pmrc_transmittal`
  MODIFY `pmrc_tr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pm_billing`
--
ALTER TABLE `pm_billing`
  MODIFY `pm_billing_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `pm_dr`
--
ALTER TABLE `pm_dr`
  MODIFY `pm_dr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pm_po`
--
ALTER TABLE `pm_po`
  MODIFY `pm_po_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pm_service_invoice`
--
ALTER TABLE `pm_service_invoice`
  MODIFY `pm_si_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pm_transmittal`
--
ALTER TABLE `pm_transmittal`
  MODIFY `pm_tr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `po_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `po_attach`
--
ALTER TABLE `po_attach`
  MODIFY `po_attach_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `po_dr`
--
ALTER TABLE `po_dr`
  MODIFY `po_dr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `po_items`
--
ALTER TABLE `po_items`
  MODIFY `po_items_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `po_pay`
--
ALTER TABLE `po_pay`
  MODIFY `po_pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `progress_billing`
--
ALTER TABLE `progress_billing`
  MODIFY `pb_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `project_site_dr`
--
ALTER TABLE `project_site_dr`
  MODIFY `project_site_dr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project_site_dr_return`
--
ALTER TABLE `project_site_dr_return`
  MODIFY `project_site_dr_return_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rv_voucher`
--
ALTER TABLE `rv_voucher`
  MODIFY `voucher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `si_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `site_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier_inventory`
--
ALTER TABLE `supplier_inventory`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `time_record`
--
ALTER TABLE `time_record`
  MODIFY `time_record_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `voucher_attachment`
--
ALTER TABLE `voucher_attachment`
  MODIFY `va_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher_history`
--
ALTER TABLE `voucher_history`
  MODIFY `history_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
