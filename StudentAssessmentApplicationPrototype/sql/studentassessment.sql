-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2013 at 06:58 PM
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
('bs se 1st'),
('bs se 2nd');

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
('danish'),
('social'),
('sohial');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `quest` text NOT NULL,
  `quest_cat` text NOT NULL,
  `quest_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`quest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quest`, `quest_cat`, `quest_id`) VALUES
('is this question from social', 'social', 1),
('this is 2nd questioon', 'social', 2),
('this is 3rd question', 'social', 3),
('this is 4th question', 'social', 4),
('this is question in behavior', 'behavior', 5),
('this is also behavior question', 'behavior', 6),
('and this is also behavir', 'behavior', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`std_name`, `std_rollnumber`, `std_class`, `std_id`, `std_password`) VALUES
('danish', '51', 'bs se 1st', 7, 'danish'),
('ali', '1', 'bs se 1st', 8, 'ali'),
('ali', '1', 'bs se 1st', 9, 'ali'),
('asif', '2', 'bs se 2nd', 10, 'asif'),
('asad', '4', 'bs se 2nd', 11, 'asad'),
('asad', '4', 'bs se 2nd', 12, 'asad');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_name` text NOT NULL,
  `subject_class` text NOT NULL,
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_name`, `subject_class`, `subject_id`) VALUES
('phicix', '', 11),
('phisics', 'bs se 4th', 13),
('english', 'bs se 3rd', 19),
('english', 'bs se 1st', 24),
('mathematics', 'bs se 1st', 25),
('statistics', 'bs se 1st', 26),
('english', 'bs se 1st', 27),
('chem', 'bs se 2nd', 28),
('bio', 'bs se 2nd', 29);

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

-- --------------------------------------------------------

--
-- Table structure for table `testdata`
--

CREATE TABLE IF NOT EXISTS `testdata` (
  `studentassessor` text NOT NULL,
  `studentassessd` text NOT NULL,
  `subject` text NOT NULL,
  `category` text NOT NULL,
  `class` varchar(20) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(20) NOT NULL,
  `serialnumber` int(11) NOT NULL AUTO_INCREMENT,
  `testid` int(11) NOT NULL,
  PRIMARY KEY (`serialnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `testdata`
--

INSERT INTO `testdata` (`studentassessor`, `studentassessd`, `subject`, `category`, `class`, `question`, `answer`, `serialnumber`, `testid`) VALUES
('ali', 'asad', 'bs se 2nd', 'chem', 'social', 'is this question from social', '1', 193, 18),
('ali', 'asad', 'bs se 2nd', 'chem', 'social', 'this is 2nd questioon', '2', 194, 18),
('ali', 'asad', 'bs se 2nd', 'chem', 'social', 'this is 3rd question', '3', 195, 18),
('ali', 'asad', 'bs se 2nd', 'chem', 'social', 'this is 4th question', '4', 196, 18);

-- --------------------------------------------------------

--
-- Table structure for table `testinfo`
--

CREATE TABLE IF NOT EXISTS `testinfo` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_class` varchar(25) NOT NULL,
  `test_subject` text NOT NULL,
  `test_category` text NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `testinfo`
--

INSERT INTO `testinfo` (`test_id`, `test_class`, `test_subject`, `test_category`) VALUES
(11, 'bs se 1st', 'english', 'social'),
(12, 'bs se 2nd', 'bio', 'social'),
(13, 'bs se 2nd', 'chem', 'social'),
(14, 'bs se 1st', 'english', 'social'),
(15, 'bs se 2nd', 'bio', 'behavior'),
(16, 'bs se 1st', 'english', 'new category'),
(17, 'bs se 1st', 'english', 'social'),
(18, 'bs se 2nd', 'chem', 'social');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
