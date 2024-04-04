-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2024 at 02:24 PM
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

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`courseName`, `courseCode`) VALUES
('Computer science', 'ccs'),
('Education Arts', 'EAR'),
('Mathematics & Computer science', 'TMC');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `Names` varchar(100) NOT NULL,
  `idNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNo` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'lecturer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Names`, `idNo`, `email`, `phoneNo`, `password`, `usertype`) VALUES
('Felix Awere', 3423433, 'felix@gmail.com', 111942081, '$2y$10$P7YD76ExPNaJlgaUCgQ1ZeK1BAiL3WGGflSGh12h6MDCfc0fhq7Gi', 'admin'),
('Odhiambo', 7436525, 'felix@bipsnet.com', 703464043, '$2y$10$CJEQkhP0JrM3BU.65fpBqua2BaLKLAVXgY5sgB4MWr4SqTR28DO/C', 'lecturer'),
('Felix Awere', 76868799, 'felixawere01@gmail.com', 111942981, '$2y$10$P7YD76ExPNaJlgaUCgQ1ZeK1BAiL3WGGflSGh12h6MDCfc0fhq7Gi', 'lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL,
  `unit` varchar(40) NOT NULL,
  `time` varchar(15) NOT NULL,
  `venue` varchar(30) NOT NULL,
  `group` varchar(50) NOT NULL,
  `dayOfTheWeek` varchar(15) NOT NULL,
  `lecturer_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `unit`, `time`, `venue`, `group`, `dayOfTheWeek`, `lecturer_id`) VALUES
(8, 'CCT 210', '20:52', 'TB', 'TMC', 'monday', 'test'),
(9, 'CCS220', '08:00', 'Lab 5', 'ccs', 'tuesday', 'test'),
(10, 'CCS219', '17:13', 'Ampitheatre west wing', 'ccs', 'monday', 'test'),
(11, 'CCS219', '17:16', 'tb', 'ccs', 'monday', 'felix@gmail.com'),
(12, 'MAS  101', '17:02', 'west wing', 'ccs', 'monday', 'test');

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
('ccs/03003/022', 'felix', 'ccs', 'tmc', 'felixawere01@gmail.com', 111942081, '$2y$10$0Ddf8FDUykqmsNFhw90u5uXcjIDJk0dQ2ccE4U18Yv.iEFQ231VzG'),
('TMC/00022/022', 'Brightone', 'TMC', 'TMC', 'ojwangbrightone08@gmail.com', 703464043, '$2y$10$29ofwfDkhOqMzuBM9eCdTuINbjbAE9WQGZTVPMK72rbEAgjISxac6'),
('TMC/00024/022', 'Brightone ', 'TMC', 'TMC', 'ojwangbrightone08@gmail.com', 703464043, '$2y$10$rkoc9uee6MtTlR1hg6AZvO7YzrRVhy8Vxd82kH/2K5w5cF/0D0usO');

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
-- Dumping data for table `unitregistration`
--

INSERT INTO `unitregistration` (`unitName`, `unitCode`, `course`) VALUES
('system analysis', 'CCS219', 'ccs'),
('Software development Project', 'CCS220', 'ccs'),
('automata theory and languages', 'CCT 210', 'CCS'),
('analytical geometry', 'MAS  101', 'TMC'),
('Discrete Mathematics III', 'MMA220', 'TMC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`idNo`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
