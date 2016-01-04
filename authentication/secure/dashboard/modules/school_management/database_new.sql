-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2016 at 11:32 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_expense` int(11) NOT NULL,
  `teachers_salary` int(11) NOT NULL,
  `staff_salary` int(11) NOT NULL,
  `bills` int(11) NOT NULL,
  `extras` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `date`, `student_expense`, `teachers_salary`, `staff_salary`, `bills`, `extras`) VALUES
(2, '2015-11-30 19:00:00', 54355, 54635, 4354, 5435, 12000),
(23, '2016-01-02 16:41:59', 65767, 5000, 45435, 564, 432),
(24, '2016-01-02 16:42:19', 3123, 5000, 45435, 567, 67567),
(26, '2016-01-02 17:25:38', 571332, 5000, 45435, 435, 4535),
(27, '2016-01-02 17:26:02', 571332, 5000, 45435, 234, 342),
(28, '2016-01-03 15:40:52', 0, 5000, 49434, 75767, 57767),
(29, '2016-01-03 15:41:13', 0, 5000, 49434, 2, 2),
(30, '2016-01-03 15:46:31', 571332, 5000, 49434, 44, 44);

-- --------------------------------------------------------

--
-- Table structure for table `facuties_tbl`
--

CREATE TABLE `facuties_tbl` (
  `faculties_id` int(10) UNSIGNED NOT NULL,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facuties_tbl`
--

INSERT INTO `facuties_tbl` (`faculties_id`, `faculties_name`, `note`) VALUES
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

CREATE TABLE `stu_score_tbl` (
  `ss_id` int(10) UNSIGNED NOT NULL,
  `stu_id` varchar(50) NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_score_tbl`
--

INSERT INTO `stu_score_tbl` (`ss_id`, `stu_id`, `faculties_id`, `sub_id`, `miderm`, `final`, `note`) VALUES
(29, 'Saif-ur- Rehman', 'test', 'fdsf', 45, 80, 'fgdgsg');

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

CREATE TABLE `stu_tbl` (
  `roll_no` int(10) NOT NULL,
  `stu_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `student_expense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`roll_no`, `stu_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `phone`, `email`, `student_expense`) VALUES
(2116, 1, 'Saif-ur-', 'Rehman', 'male', '1991-03-01', 'Lahore', '56456654654', 'saif-ur@gmail.com', 564565),
(2115, 2, 'Jazib', 'Bashir', 'male', '1990-05-04', '  Lahore', '03054038588', 'jazib@yahoo.com', 6767),
(2103, 3, 'Tahir', 'Awan', 'Male', '1988-05-05', '   Lahore', '03054038588', 'tahir@gmail.com   ', 0),
(2110, 4, 'Abdul', 'Jabbar', 'Male', '1989-06-06', 'Lahore', '03054038588 ', 'jabbar@gmail.com', 0),
(435, 5, 'gfdgfdg', 'gsfgdf', 'male', '2016-01-21', 'fdsfdf', '435435345435', 'fdggfsdg@gmail.com', 0),
(43, 6, 'fdg', 'fgds', 'male', '2013-07-17', 'twetert', '45324543542352', 'moaz@gmail.com', 454);

-- --------------------------------------------------------

--
-- Table structure for table `sub_tbl`
--

CREATE TABLE `sub_tbl` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_tbl`
--

INSERT INTO `sub_tbl` (`sub_id`, `faculties_id`, `teacher_id`, `semester`, `sub_name`, `note`) VALUES
(7, 'test', 'Yameen Bashir', '4', 'fdsf', 'dsfdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `married` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(80) NOT NULL DEFAULT 'teacher'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `degree`, `salary`, `married`, `phone`, `email`, `type`) VALUES
(1, 'Yameen', 'Bashir', 'male', '1985-03-05', 'Lahore', 'Master', 1500, 'yes', '43525443525', 'yameen.like@gmail.com', 'teacher'),
(2, 'Atta-ur-', 'Rehman', 'Male', '1986-03-08', 'Lahore', 'Bachelor', 1500, 'Yes', '016 572 393', 'attarehman@gmail.com', 'teacher'),
(3, 'Hussain', 'Naqvi', 'Male', '1990-07-03', 'Lahore', 'Bachelor', 1000, 'Yes', '087 666 55 ', 'hussain@gmail.com', 'teacher'),
(4, 'Maria', 'Atif', 'Male', '0000-00-00', 'Lahore', 'Bachelor', 1000, 'Yes', '099 77 66 33', 'maria@gmail.com', 'teacher'),
(8, 'trett', 'terert', 'female', '2016-01-20', 'gtyrtyrty', 'FSC', 45435, 'female', '45454354353453', '', 'staff'),
(9, 'tret', 'ghgfh', 'male', '2016-01-06', 'rtetret', 'Matric', 543, 'male', '565654654656', '', 'staff'),
(10, 'qwe', 'qwe', 'male', '2016-01-13', 'gfdgfg', 'Basic', 3456, 'yes', '45345454556', '', 'staff'),
(11, 'tetytyw', 'tretew', 'female', '1992-02-11', 'gdfgfd', 'Master', 453451, 'yes', '435454353453', 'rtrg@dfsf.com', 'Teacher'),
(12, 'fsdf', 'fgder', 'female', '1990-01-06', 'rtwert', 'Matric', 34551, 'yes', '3423432423423', '', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` char(10) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `type`, `approved`) VALUES
(1, 'admin', 'admin', 1),
(4, 'moazkhan', 'admin', 1),
(5, 'teacher', 'teacher', 0),
(6, 'alikhan', 'student', 1),
(8, 'bilalkhan', 'teacher', 1),
(11, 'ter', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  ADD PRIMARY KEY (`faculties_id`);

--
-- Indexes for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  MODIFY `faculties_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  MODIFY `ss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
