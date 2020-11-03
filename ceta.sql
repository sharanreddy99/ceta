-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 03:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceta`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventsnew`
--
create database ceta;
use ceta;

CREATE TABLE `eventsnew` (
  `eid` int(11) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `dateofevent` date NOT NULL,
  `availability` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventsold`
--

CREATE TABLE `eventsold` (
  `eid` int(11) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `dateofevent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_pass`
--

CREATE TABLE `event_pass` (
  `pin` varchar(20) NOT NULL,
  `used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `gender` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `lname`, `email`, `pass`, `mobile`, `gender`) VALUES
(1, 'prasad', 'reddy', 'prasadreddy@gmail.com', 'Prasad@123', '9898989898', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `feedback` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pingenerator`
--

CREATE TABLE `pingenerator` (
  `pin` varchar(20) NOT NULL,
  `used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `year` varchar(9) NOT NULL,
  `branch` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `year` varchar(9) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yreventsnew`
--

CREATE TABLE `yreventsnew` (
  `eid` int(11) NOT NULL,
  `year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yreventsold`
--

CREATE TABLE `yreventsold` (
  `eid` int(11) NOT NULL,
  `year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventsnew`
--
ALTER TABLE `eventsnew`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `eventsold`
--
ALTER TABLE `eventsold`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`,`fname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`,`fname`),
  ADD UNIQUE KEY `rollno` (`rollno`),
  ADD UNIQUE KEY `rollno_2` (`rollno`),
  ADD UNIQUE KEY `email` (`email`,`mobile`);

--
-- Indexes for table `yreventsnew`
--
ALTER TABLE `yreventsnew`
  ADD KEY `yreventsnew_ibfk_1` (`eid`);

--
-- Indexes for table `yreventsold`
--
ALTER TABLE `yreventsold`
  ADD KEY `yreventsold_ibfk_1` (`eid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `yreventsnew`
--
ALTER TABLE `yreventsnew`
  ADD CONSTRAINT `yreventsnew_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `eventsnew` (`eid`) ON DELETE CASCADE;

--
-- Constraints for table `yreventsold`
--
ALTER TABLE `yreventsold`
  ADD CONSTRAINT `yreventsold_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `eventsold` (`eid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
