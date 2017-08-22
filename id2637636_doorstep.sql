-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2017 at 04:39 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2637636_doorstep`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `comp_id` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `complaint` varchar(200) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `board` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`comp_id`, `name`, `complaint`, `address`, `email`, `phone`, `board`) VALUES
('20170822005', 'Harish G', 'Many pothole uncovered manholes in my locality.\r\nPlease take Immediate action', '#21 , 15th main ,21th cross , HAL , Indranagar, Bangalore 560035,Karnataka', 'test@example.com', 914722644, 'BBMP'),
('20170822004', 'Harish G', 'Short-Circuiting of the main pole in my locality.\r\nPlease take Immediate action', '#21 , 15th main ,21th cross , HAL , Indranagar, Bangalore 560035,Karnataka', 'test@example.com', 914722647, 'BESCOM'),
('20170822003', 'Mohith', 'There are lot of stray dogs in my locality .\r\nPlease take immediate action.', '#21 , 10th main ,11th cross , Jigini , Anekal, Bangalore 560032,Karnataka', 'demo@example.com', 2147483647, 'BBMP');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `comp_id` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`comp_id`, `msg`, `name`) VALUES
('20170822001', 'wait', 'manager'),
('20170820001', 'dgdgaafva', 'funny'),
('20170820001', 'svgaavavv vssff', 'funny'),
('20170822003', 'We will see to it that your complaint will be resolved as soon as possible', 'Chief Officer'),
('20170822003', 'The concerned authorities will be arriving today to your location.\r\nThank You.', 'Chief Officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`comp_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
