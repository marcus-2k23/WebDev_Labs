-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 10:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `tname` varchar(500) NOT NULL,
  `cname` varchar(500) NOT NULL,
  `sname` varchar(500) NOT NULL,
  `ssname` varchar(500) NOT NULL,
  `semail` varchar(500) NOT NULL,
  `ssemail` varchar(500) NOT NULL,
  `postcode` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `province` varchar(500) NOT NULL,
  `projname` varchar(500) NOT NULL,
  `projdesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `tname`, `cname`, `sname`, `ssname`, `semail`, `ssemail`, `postcode`, `address`, `city`, `province`, `projname`, `projdesc`) VALUES
(5, 'asdfgh', 'sdfghj', 'asdfgh', 'dfghsdfg', 'e@h.j', 'kj@h.c', 'A6A 5V6', 'cbvnm', 'ddsf', 'as', 'scdfvbg', 'dfghj'),
(6, 'asdfgh', 'sdfghj', 'asdfgh', 'dfghsdfg', 'e@h.j', 'kj@h.c', 'A6A 5V6', 'cbvnm', 'ddsf', 'as', 'scdfvbg', 'dfghj'),
(7, 'asdfgh', 'sdfghj', 'asdfgh', 'dfghsdfg', 'e@h.j', 'kj@h.c', 'A6A 5V6', 'cbvnm', 'ddsf', 'as', 'scdfvbg', 'dfghj'),
(12, 'asdfwdsrfgtg', 'asdfghgbjkadzdf', 'asdfgh', 'sdfgh', 'e@h.j', 'kj@h.c', 'A1B 1A1', 'albertaasdf', 'dfgh', 'albertaadf', 'scdfvbg', 'dfghj'),
(13, 'dsfrtgy', 'asdfgh', 'asdfgh', 'sdfgh', 'erfg@cfghj.dcfgv', 'xdcfgh@xdfcgv.cfgh', 'P1P 3P3', 'dsfbgh', 'd', 'as', 'xdfcgjhb', 'xdcfghvjbgt xdcfgvbn ghy'),
(14, 'dsfrtgy', 'asdfgh', 'asdfgh', 'sdfgh', 'erfg@cfghj.dcfgv', 'xdcfgh@xdfcgv.cfgh', 'P1P 3P3', 'dsfbgh', 'd', 'as', 'xdfcgjhb', 'xdcfghvjbgt xdcfgvbn ghy');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
