-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2012 at 06:13 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gioDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_tbl`
--

CREATE TABLE IF NOT EXISTS `project_tbl` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `EmpName` varchar(20) NOT NULL,
  `SalPerDay` int(10) NOT NULL,
  `DaysWork` int(1) NOT NULL,
  `DaysOvernight` int(1) NOT NULL,
  `WeeklySal` int(10) NOT NULL,
  `OvernightSal` int(10) NOT NULL,
  `Week` int(2) NOT NULL,
  `Year` int(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_tbl`
--

INSERT INTO `project_tbl` (`ID`, `EmpName`, `SalPerDay`, `DaysWork`, `DaysOvernight`, `WeeklySal`, `OvernightSal`, `Week`, `Year`) VALUES
(1, 'James', 10000, 3, 1, 30000, 0, 11, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `stock_tbl`
--

CREATE TABLE IF NOT EXISTS `stock_tbl` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(20) NOT NULL,
  `ItemStock` int(3) NOT NULL,
  `PricePerUnit` int(10) NOT NULL,
  `ItemUsed` int(11) NOT NULL,
  `ItemLeft` int(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stock_tbl`
--

INSERT INTO `stock_tbl` (`ID`, `ItemName`, `ItemStock`, `PricePerUnit`, `ItemUsed`, `ItemLeft`) VALUES
(1, 'Gypsum', 51, 10000, 30, 21);

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE IF NOT EXISTS `student_tbl` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`ID`, `Name`, `Class`, `Password`) VALUES
(4, 'Gionaldo', 'JC1SB', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `votereg_tbl`
--

CREATE TABLE IF NOT EXISTS `votereg_tbl` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `votereg_tbl`
--

INSERT INTO `votereg_tbl` (`ID`, `Name`, `Password`, `Address`, `Gender`) VALUES
(1, 'admin', 'admin', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
