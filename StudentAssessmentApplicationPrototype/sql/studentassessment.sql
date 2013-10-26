-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2013 at 03:24 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentassessment`
--
CREATE DATABASE IF NOT EXISTS `studentassessment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentassessment`;

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE IF NOT EXISTS `studentdata` (
  `std_name` text NOT NULL,
  `std_rollnumber` varchar(30) NOT NULL,
  `std_class` varchar(30) NOT NULL,
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_password` varchar(25) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`std_name`, `std_rollnumber`, `std_class`, `std_id`, `std_password`) VALUES
('asif ali', '40', 'bs software enginering', 30, 'asifali');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
