-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 01:32 PM
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
-- Database: `acar`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE `courseregistration` (
  `courseName` varchar(50) NOT NULL,
  `courseCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `Names` varchar(100) NOT NULL,
  `idNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNo` int(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `unit` varchar(30) NOT NULL,
  `time` int(5) NOT NULL,
  `venue` varchar(30) NOT NULL,
  `group` varchar(50) NOT NULL,
  `dayOfTheWeek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `admNo` varchar(20) NOT NULL,
  `names` varchar(100) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNo` int(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`admNo`, `names`, `courseName`, `courseCode`, `email`, `phoneNo`, `password`) VALUES
('ccs/03003/020', 'felix', 'ccs', 'ccs', 'felixawere01@gmail.com', 703464043, '$2y$10$sKEGaHLRUG6H0ZpBl6FcmO/hZEgXyTW1cuZ08Dt84M/mrf6eoAsB6'),
('ccs/03003/021', 'felix', 'ccs', 'ccs', 'felixawere01@gmail.com', 703464043, 'Felabs@1234'),
('ccs/03003/022', 'felix', 'ccs', 'ccs', 'felixawere01@gmail.com', 703464043, 'Felabs@1234');

-- --------------------------------------------------------

--
-- Table structure for table `unitregistration`
--

CREATE TABLE `unitregistration` (
  `unitName` varchar(50) NOT NULL,
  `unitCode` varchar(20) NOT NULL,
  `course` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`idNo`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`unit`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`admNo`);

--
-- Indexes for table `unitregistration`
--
ALTER TABLE `unitregistration`
  ADD PRIMARY KEY (`unitCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
