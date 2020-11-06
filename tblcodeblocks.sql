-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2020 at 03:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcodeblocks`
--

CREATE TABLE `tblcodeblocks` (
  `codeid` int(11) NOT NULL,
  `blockname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='This table contains all code blocks';

--
-- Dumping data for table `tblcodeblocks`
--

INSERT INTO `tblcodeblocks` (`codeid`, `blockname`, `code`, `language`) VALUES
(1, 'multiplication', 'function multiply(p1, p2) {<br>\r\n  return p1 * p2;   // The function returns the product of p1 and p2<br>\r\n}', 'javascript'),
(2, 'addition', 'function add(p1, p2) {<br>\r\n  return p1 + p2;   // The function returns the addition of p1 and p2<br>\r\n}', 'javascript'),
(3, 'subtraction', 'function subtract(p1, p2) {<br>\r\n  return p1 - p2;   // The function returns the subtraction of p1 and p2<br>\r\n}', 'javascript'),
(4, 'division', 'function divise(p1, p2) {<br>\r\n  return p1 / p2;   // The function returns the subtraction of p1 and p2<br>\r\n}', 'javascript'),
(5, 'For Loop', '\r\nfor(let i = 0; i < x; i++) {\r\n\r\n//Code here\r\n\r\n}', 'javascript'),
(6, 'if-else', 'if (x)\r\n\r\n//Code here\r\n\r\n} else { }', 'javascript'),
(7, 'while Loop', 'while (x) {\r\n\r\n//Code here\r\n\r\n}', 'javascript'),
(8, 'hello world', 'function helloworld(){\r\n  alert(\'Hello World!\');\r\n}', 'javascript');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcodeblocks`
--
ALTER TABLE `tblcodeblocks`
  ADD PRIMARY KEY (`codeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcodeblocks`
--
ALTER TABLE `tblcodeblocks`
  MODIFY `codeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
