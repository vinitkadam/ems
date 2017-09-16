-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 09:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` longtext NOT NULL,
  `place` text NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL,
  `published_date` date NOT NULL,
  `views` bigint(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `name`, `short_desc`, `long_desc`, `place`, `s_date`, `e_date`, `s_time`, `e_time`, `published_date`, `views`) VALUES
(1, 'Event 1 heading', ' this is event 1 short desc this is event 1 short desc this is event 1 short desc this is event 1 short desc this is event 1 short desc this is event 1 short desc this is event 1 short desc this is event 1 short desc this is event 1 short desc ', 'this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description this is event 1 long detailed description ', 'dy patil college 5th floor room no 512', '2017-09-01', '2017-09-02', '09:00:00', '14:00:00', '2017-08-25', 0),
(2, 'Event 2 heading', ' this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc  this is event 2 short desc ', 'this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc this is event 2 long detailed desc ', 'RAIT placement cell 5th floor room no 515', '2017-09-01', '2017-09-13', '09:00:00', '16:00:00', '2017-08-29', 0),
(3, 'Event 3 Heading', 'this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description this is event 3 short description ', 'this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description this is event 3 entire long description ', 'Sies college of engineering', '2017-08-24', '2017-09-27', '08:00:00', '18:00:00', '2017-08-30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
