-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 25. 09 2020 kl. 13:11:38
-- Serverversion: 10.4.14-MariaDB
-- PHP-version: 7.4.10

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
-- Struktur-dump for tabellen `book`
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
-- Struktur-dump for tabellen `student`
--

CREATE TABLE `student` (
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Class` text NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `StudentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `student`
--

INSERT INTO `student` (`FirstName`, `LastName`, `Class`, `Username`, `Password`, `StudentId`) VALUES
('Christian', 'Vedel Petersen', '3d1', 'cvp100', '123456', 2);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`);

--
-- Indeks for tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(255) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `student`
--
ALTER TABLE `student`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
