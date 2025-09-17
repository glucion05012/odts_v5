-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 17, 2024 at 02:59 PM
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

--
-- Dumping data for table `conf_action`
--

INSERT INTO `conf_action` (`id`, `action`, `display`) VALUES
(1, 'For information/guidance/reference', 'A - For information/guidance/reference'),
(2, 'For comments/recommendations', 'B - For comments/recommendations'),
(3, 'Pls. take up with me', 'C - Pls. take up with me'),
(4, 'Pls. draft answer/memo/acknow', 'D - Pls. draft answer/memo/acknow'),
(5, 'For appropriate action', 'E - For appropriate action'),
(6, 'Pls. immediate investigation', 'F - Pls. immediate investigation'),
(7, 'Pls. attach supporting papers', 'G - Pls. attach supporting papers'),
(8, 'For approval', 'H - For approval'),
(9, 'For initial/signature', 'I - For initial/signature'),
(10, 'Pls. study/evaluate', 'J - Pls. study/evaluate'),
(11, 'Pls. release/file', 'K - Pls. release/file'),
(12, 'Update status of case', 'L - Update status of case'),
(13, 'Filed/Closed', 'M - Filed/Closed'),
(14, 'For ADA/check preparation', 'N - For ADA/check preparation'),
(15, 'For discussioin', 'O - For discussioin'),
(16, 'For revision', 'P - For revision'),
(17, 'Pls. attach draft file', 'Q - Pls. attach draft file'),
(18, 'Saved', 'R - Saved'),
(19, 'For scanning', 'S - For scanning'),
(20, 'For barcoding', 'T - For barcoding'),
(21, 'For dissemination', 'U - For dissemination');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conf_action`
--
ALTER TABLE `conf_action`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conf_action`
--
ALTER TABLE `conf_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;
