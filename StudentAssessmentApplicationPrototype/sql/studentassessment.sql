-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2014 at 06:29 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentassessment`
--

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
('bs se 2nd'),
('bs se 3rd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
('how are you?', 'behavior', 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`std_name`, `std_rollnumber`, `std_class`, `std_id`, `std_password`) VALUES
('danish', '51', 'bs se 1st', 7, 'danish'),
('ali', '1', 'bs se 1st', 8, 'ali'),
('asif', '2', 'bs se 2nd', 10, 'asif'),
('asad', '4', 'bs se 2nd', 11, 'asad'),
('raheel', '42', 'bs se 1st', 13, 'raheel'),
('naseer', '63', 'bs se 1st', 14, 'naseer'),
('nabeel', '41', 'bs se 1st', 15, 'nabeel'),
('junaid', '23', 'bs se 2nd', 16, 'junaid'),
('fahad', '42', 'bs se 2nd', 17, 'fahad');

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
-- Table structure for table `testaverragereports`
--

CREATE TABLE IF NOT EXISTS `testaverragereports` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `assessor` varchar(256) NOT NULL,
  `assessed` varchar(256) NOT NULL,
  `testId` int(100) NOT NULL,
  `averrageAnswer` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `testaverragereports`
--

INSERT INTO `testaverragereports` (`id`, `assessor`, `assessed`, `testId`, `averrageAnswer`) VALUES
(9, 'raheel', 'danish', 2, 2),
(10, 'raheel', 'ali', 2, 1),
(11, 'raheel', 'naseer', 2, 2),
(12, 'raheel', 'nabeel', 2, 2),
(13, 'danish', 'ali', 2, 2),
(14, 'danish', 'raheel', 2, 2),
(15, 'danish', 'naseer', 2, 2),
(16, 'danish', 'nabeel', 2, 4),
(17, 'ali', 'danish', 2, 1),
(18, 'ali', 'raheel', 2, 2),
(19, 'ali', 'naseer', 2, 4),
(20, 'ali', 'nabeel', 2, 2),
(21, 'nabeel', 'danish', 2, 2),
(22, 'nabeel', 'ali', 2, 3),
(23, 'nabeel', 'raheel', 2, 3),
(24, 'nabeel', 'naseer', 2, 1),
(25, 'naseer', 'danish', 2, 2),
(26, 'naseer', 'ali', 2, 1),
(27, 'naseer', 'raheel', 2, 2),
(28, 'naseer', 'nabeel', 2, 3),
(29, 'naseer', 'danish', 3, 1),
(30, 'fahad', 'asif', 4, 2),
(31, 'fahad', 'asad', 4, 3),
(32, 'fahad', 'junaid', 4, 3),
(33, 'asad', 'junaid', 5, 2),
(34, 'ali', 'danish', 6, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `testdata`
--

INSERT INTO `testdata` (`studentassessor`, `studentassessd`, `subject`, `category`, `class`, `question`, `answer`, `serialnumber`, `testid`) VALUES
('raheel', 'danish', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 33, 2),
('raheel', 'danish', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 34, 2),
('raheel', 'danish', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 35, 2),
('raheel', 'danish', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 36, 2),
('raheel', 'ali', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 37, 2),
('raheel', 'ali', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 38, 2),
('raheel', 'ali', 'english', 'social', 'bs se 1st', 'this is 3rd question', '1', 39, 2),
('raheel', 'ali', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 40, 2),
('raheel', 'naseer', 'english', 'social', 'bs se 1st', 'is this question from social', '2', 41, 2),
('raheel', 'naseer', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 42, 2),
('raheel', 'naseer', 'english', 'social', 'bs se 1st', 'this is 3rd question', '1', 43, 2),
('raheel', 'naseer', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 44, 2),
('raheel', 'nabeel', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 45, 2),
('raheel', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '3', 46, 2),
('raheel', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '3', 47, 2),
('raheel', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 48, 2),
('danish', 'ali', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 49, 2),
('danish', 'ali', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 50, 2),
('danish', 'ali', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 51, 2),
('danish', 'ali', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 52, 2),
('danish', 'raheel', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 53, 2),
('danish', 'raheel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '1', 54, 2),
('danish', 'raheel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 55, 2),
('danish', 'raheel', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 56, 2),
('danish', 'naseer', 'english', 'social', 'bs se 1st', 'is this question from social', '3', 57, 2),
('danish', 'naseer', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '3', 58, 2),
('danish', 'naseer', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 59, 2),
('danish', 'naseer', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 60, 2),
('danish', 'nabeel', 'english', 'social', 'bs se 1st', 'is this question from social', '4', 61, 2),
('danish', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '3', 62, 2),
('danish', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '3', 63, 2),
('danish', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 4th question', '4', 64, 2),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 65, 2),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '1', 66, 2),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 67, 2),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 68, 2),
('ali', 'raheel', 'english', 'social', 'bs se 1st', 'is this question from social', '2', 69, 2),
('ali', 'raheel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '1', 70, 2),
('ali', 'raheel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 71, 2),
('ali', 'raheel', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 72, 2),
('ali', 'naseer', 'english', 'social', 'bs se 1st', 'is this question from social', '4', 73, 2),
('ali', 'naseer', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '3', 74, 2),
('ali', 'naseer', 'english', 'social', 'bs se 1st', 'this is 3rd question', '3', 75, 2),
('ali', 'naseer', 'english', 'social', 'bs se 1st', 'this is 4th question', '4', 76, 2),
('ali', 'nabeel', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 77, 2),
('ali', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '1', 78, 2),
('ali', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 79, 2),
('ali', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 4th question', '4', 80, 2),
('nabeel', 'danish', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 81, 2),
('nabeel', 'danish', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 82, 2),
('nabeel', 'danish', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 83, 2),
('nabeel', 'danish', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 84, 2),
('nabeel', 'ali', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 85, 2),
('nabeel', 'ali', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 86, 2),
('nabeel', 'ali', 'english', 'social', 'bs se 1st', 'this is 3rd question', '4', 87, 2),
('nabeel', 'ali', 'english', 'social', 'bs se 1st', 'this is 4th question', '4', 88, 2),
('nabeel', 'raheel', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 89, 2),
('nabeel', 'raheel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '4', 90, 2),
('nabeel', 'raheel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '3', 91, 2),
('nabeel', 'raheel', 'english', 'social', 'bs se 1st', 'this is 4th question', '4', 92, 2),
('nabeel', 'naseer', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 93, 2),
('nabeel', 'naseer', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 94, 2),
('nabeel', 'naseer', 'english', 'social', 'bs se 1st', 'this is 3rd question', '1', 95, 2),
('nabeel', 'naseer', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 96, 2),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'is this question from social', '3', 97, 2),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '3', 98, 2),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'this is 3rd question', '2', 99, 2),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 100, 2),
('naseer', 'ali', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 101, 2),
('naseer', 'ali', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 102, 2),
('naseer', 'ali', 'english', 'social', 'bs se 1st', 'this is 3rd question', '1', 103, 2),
('naseer', 'ali', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 104, 2),
('naseer', 'raheel', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 105, 2),
('naseer', 'raheel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '3', 106, 2),
('naseer', 'raheel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '3', 107, 2),
('naseer', 'raheel', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 108, 2),
('naseer', 'nabeel', 'english', 'social', 'bs se 1st', 'is this question from social', '4', 109, 2),
('naseer', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '4', 110, 2),
('naseer', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 3rd question', '3', 111, 2),
('naseer', 'nabeel', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 112, 2),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 113, 3),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 114, 3),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'this is 3rd question', '1', 115, 3),
('naseer', 'danish', 'english', 'social', 'bs se 1st', 'this is 4th question', '1', 116, 3),
('fahad', 'asif', 'english', 'social', 'bs se 2nd', 'is this question from social', '1', 117, 4),
('fahad', 'asif', 'english', 'social', 'bs se 2nd', 'this is 2nd questioon', '3', 118, 4),
('fahad', 'asif', 'english', 'social', 'bs se 2nd', 'this is 3rd question', '2', 119, 4),
('fahad', 'asif', 'english', 'social', 'bs se 2nd', 'this is 4th question', '2', 120, 4),
('fahad', 'asad', 'english', 'social', 'bs se 2nd', 'is this question from social', '4', 121, 4),
('fahad', 'asad', 'english', 'social', 'bs se 2nd', 'this is 2nd questioon', '3', 122, 4),
('fahad', 'asad', 'english', 'social', 'bs se 2nd', 'this is 3rd question', '2', 123, 4),
('fahad', 'asad', 'english', 'social', 'bs se 2nd', 'this is 4th question', '4', 124, 4),
('fahad', 'junaid', 'english', 'social', 'bs se 2nd', 'is this question from social', '1', 125, 4),
('fahad', 'junaid', 'english', 'social', 'bs se 2nd', 'this is 2nd questioon', '4', 126, 4),
('fahad', 'junaid', 'english', 'social', 'bs se 2nd', 'this is 3rd question', '4', 127, 4),
('fahad', 'junaid', 'english', 'social', 'bs se 2nd', 'this is 4th question', '4', 128, 4),
('asad', 'junaid', 'english', 'social', 'bs se 2nd', 'is this question from social', '1', 129, 5),
('asad', 'junaid', 'english', 'social', 'bs se 2nd', 'this is 2nd questioon', '1', 130, 5),
('asad', 'junaid', 'english', 'social', 'bs se 2nd', 'this is 3rd question', '2', 131, 5),
('asad', 'junaid', 'english', 'social', 'bs se 2nd', 'this is 4th question', '4', 132, 5),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'is this question from social', '1', 133, 6),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'this is 2nd questioon', '2', 134, 6),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'this is 3rd question', '1', 135, 6),
('ali', 'danish', 'english', 'social', 'bs se 1st', 'this is 4th question', '2', 136, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testinfo`
--

INSERT INTO `testinfo` (`test_id`, `test_class`, `test_subject`, `test_category`) VALUES
(1, 'bs se 1st', 'english', 'social'),
(2, 'bs se 1st', 'english', 'social'),
(3, 'bs se 1st', 'english', 'social'),
(4, 'bs se 2nd', 'english', 'social'),
(5, 'bs se 2nd', 'english', 'social'),
(6, 'bs se 1st', 'english', 'social');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
