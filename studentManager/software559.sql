-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 04:00 AM
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
-- Table structure for table `software559`
--

CREATE TABLE `software559` (
  `email` varchar(100) NOT NULL,
  `java` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `python` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `c++` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `softwareTesting` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `technicalWriting` varchar(20) NOT NULL DEFAULT 'notEnrolled',
  `php` varchar(20) NOT NULL DEFAULT 'notEnrolled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software559`
--

INSERT INTO `software559` (`email`, `java`, `python`, `c++`, `softwareTesting`, `technicalWriting`, `php`) VALUES
('roshanrupeshkumar.shah@mohawkcollege.ca', 'Enrolled', 'notEnrolled', 'notEnrolled', 'notEnrolled', 'notEnrolled', 'Enrolled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `software559`
--
ALTER TABLE `software559`
  ADD UNIQUE KEY `studentid` (`email`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
