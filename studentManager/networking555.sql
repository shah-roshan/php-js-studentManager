-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 04:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `000793559`
--

-- --------------------------------------------------------

--
-- Table structure for table `networking555`
--

CREATE TABLE `networking555` (
  `email` varchar(100) NOT NULL,
  `virtualization` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `ciscoRouting` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `unix` varchar(30) NOT NULL DEFAULT 'notEnrolled',
  `security` varchar(30) NOT NULL DEFAULT 'notEnrolled',
  `maths` varchar(30) NOT NULL DEFAULT 'notEnrolled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `networking555`
--

INSERT INTO `networking555` (`email`, `virtualization`, `ciscoRouting`, `unix`, `security`, `maths`) VALUES
('smartdevelopers27@gmail.com', 'notEnrolled', 'notEnrolled', 'notEnrolled', 'notEnrolled', 'notEnrolled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `networking555`
--
ALTER TABLE `networking555`
  ADD UNIQUE KEY `studentid` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
