-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2013 at 05:40 PM
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
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_data` varchar(20) NOT NULL,
  UNIQUE KEY `class_data` (`class_data`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_data`) VALUES
('asdiad'),
('bs se 3rd '),
('bs se 4th'),
('bsse4th'),
('komail'),
('komail123'),
('new clas'),
('SDS');

-- --------------------------------------------------------

--
-- Table structure for table `questcat`
--

CREATE TABLE IF NOT EXISTS `questcat` (
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questcat`
--

INSERT INTO `questcat` (`category`) VALUES
('social'),
('behavior'),
('active'),
('new category'),
('new cat also dded'),
('new cat also dded'),
('danish');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `quest` text NOT NULL,
  `quest_cat` text NOT NULL,
  `quest_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`quest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`std_name`, `std_rollnumber`, `std_class`, `std_id`, `std_password`) VALUES
('ali', '78', 'bsse4th', 1, '0e97c9b4f891ebbe2755920ef'),
('asi', '090930', 'komail', 2, 'ae89523f6bb8a730597e5f6da'),
('asi', '090930', 'komail', 3, 'ae89523f6bb8a730597e5f6da'),
('asi', '090930', 'komail', 4, 'ae89523f6bb8a730597e5f6da'),
('asi', '090930', 'komail', 5, 'ae89523f6bb8a730597e5f6da');

-- --------------------------------------------------------

--
-- Table structure for table `teacherinfo`
--

CREATE TABLE IF NOT EXISTS `teacherinfo` (
  `teacher_name` text NOT NULL,
  `teacher_pass` varchar(20) NOT NULL,
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacherinfo`
--

INSERT INTO `teacherinfo` (`teacher_name`, `teacher_pass`, `tid`) VALUES
('ali', 'ali123', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
