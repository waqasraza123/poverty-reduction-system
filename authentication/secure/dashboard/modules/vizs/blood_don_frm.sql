-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2016 at 01:01 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blood_don_frm`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_req`
--

CREATE TABLE IF NOT EXISTS `blood_req` (
  `pat_name` varchar(20) NOT NULL,
  `typ_dis` varchar(20) NOT NULL,
  `doc_name` varchar(20) NOT NULL,
  `whn_req` date NOT NULL,
  `cont_num` varchar(12) NOT NULL,
  `blood_grp` varchar(5) NOT NULL,
  `quan` varchar(3) NOT NULL,
  `req_city` varchar(20) NOT NULL,
  `cont_per_name` varchar(20) NOT NULL,
  `hosp_add` varchar(50) NOT NULL,
  `dt` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_req`
--

INSERT INTO `blood_req` (`pat_name`, `typ_dis`, `doc_name`, `whn_req`, `cont_num`, `blood_grp`, `quan`, `req_city`, `cont_per_name`, `hosp_add`, `dt`) VALUES
('Usman', 'AIDS', 'Dr. Fahad', '2016-01-20', '03007787781', 'A+', '100', 'Islamabad', 'Sultan Mehmood', 'PIMS, Islamabad', '2016-01-02'),
('Basit', 'Fever', 'Dr. Arslan', '2016-01-22', '03007784678', 'A+', '50m', 'Lahore', 'Civil Hospital', 'Model Town Lahore', '2016-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(15) NOT NULL,
  `mob_num` varchar(12) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `mob_num`, `e_mail`, `message`) VALUES
('Usman', '036878687', 'usman@gmail.com', 'Hello. I want some info.');

-- --------------------------------------------------------

--
-- Table structure for table `donor_reg`
--

CREATE TABLE IF NOT EXISTS `donor_reg` (
  `uname` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `weight` int(4) NOT NULL,
  `b_gp` varchar(5) NOT NULL,
  `ldd` date NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `mob_num` varchar(12) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `msg` varchar(50) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_reg`
--

CREATE TABLE IF NOT EXISTS `member_reg` (
  `uname` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mob_num` varchar(12) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `msg` varchar(100) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_reg`
--

INSERT INTO `member_reg` (`uname`, `pass`, `name`, `mob_num`, `e_mail`, `msg`) VALUES
('omer', '12345', 'Omer', '0515151667', 'omer@gmail.com', 'Stay Blessed everyone.'),
('Ali', 'pakistan', 'Ali Khan', '03006752872', 'ali@gmail.com', 'Hi, I am ALi. Have a Nice Day.'),
('basit', '12345', 'Basit Ali', '03005675671', 'basit@gmail.com', 'Happy New Year. '),
('usman', '12345', 'Hafiz Usman', '03331234567', 'h.usman@gmail.com', 'Hi, I am Usman.\r\nThanks');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
