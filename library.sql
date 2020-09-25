-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 02:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookId` int(255) NOT NULL,
  `Title` text NOT NULL,
  `Author` text NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Lend` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Class` text NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `StudentId` int(11) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`FirstName`, `LastName`, `Class`, `Username`, `Password`, `StudentId`, `IsAdmin`) VALUES
('Emil', 'Admin', '3d1', 'EmilAdmin', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', 3, 1),
('Christian', 'Admin', '3d1', 'ChristianAdmin', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', 4, 1),
('Lukas', 'Admin', '3d1', 'LukasAdmin', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', 5, 1),
('Adam', 'H', '3d1', 'AdamH', '516b9783fca517eecbd1d064da2d165310b19759', 6, 0),
('Karl', 'Kurtsen', '2d1', 'KarlKurtsen', 'f29d53e1bcd5a93b84f861b7046209a9529d1529', 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
