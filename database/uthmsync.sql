-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 07:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uthmsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `fullName` varchar(100) NOT NULL,
  `staffID` varchar(100) NOT NULL,
  `staffIDImage` blob NOT NULL,
  `role` varchar(30) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `makeAdmin` tinyint(1) NOT NULL,
  `ptj` varchar(300) NOT NULL,
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fullName`, `staffID`, `staffIDImage`, `role`, `phoneNumber`, `email`, `password`, `username`, `makeAdmin`, `ptj`, `online`) VALUES
('Staff', 'staff1', 0x75706c6f6164732f, 'Staff', '0143000446', 'naddylim123@gmail.com', '$2y$10$tozSMXlJRlYR/l9DXodEJuIm/skkd4P5U26adahqN7l2iPsymc71i', 'staff1', 0, 'ptj1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_activities`
--

CREATE TABLE `staff_activities` (
  `activityName` varchar(250) NOT NULL,
  `activityDescription` varchar(300) NOT NULL,
  `location` varchar(300) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `date` date NOT NULL,
  `staffID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fullName` varchar(100) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `studentIDImage` blob NOT NULL,
  `role` varchar(30) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `faculty` varchar(300) NOT NULL,
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fullName`, `studentID`, `studentIDImage`, `role`, `phoneNumber`, `email`, `password`, `username`, `faculty`, `online`) VALUES
('Nur Nadhirah Mohd Harith Lim', 'AI200133', 0x75706c6f6164732f, 'Student', '0135008495', 'nad23lim@gmail.com', '$2y$10$9gPQq1cAhchrF5A98PbM/uQ2Xwf0fxuEy76lNCINyHQIjPAVa/5wy', 'AI200133', 'FSKTM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_activities`
--

CREATE TABLE `student_activities` (
  `activityName` varchar(250) NOT NULL,
  `activityDescription` varchar(300) NOT NULL,
  `location` varchar(300) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `date` date NOT NULL,
  `studentID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staff_activities`
--
ALTER TABLE `staff_activities`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `student_activities`
--
ALTER TABLE `student_activities`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff_activities`
--
ALTER TABLE `staff_activities`
  ADD CONSTRAINT `staff_activities_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`);

--
-- Constraints for table `student_activities`
--
ALTER TABLE `student_activities`
  ADD CONSTRAINT `student_activities_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
