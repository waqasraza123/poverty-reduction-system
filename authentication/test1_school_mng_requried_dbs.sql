-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 09:56 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_mng`
--
CREATE DATABASE IF NOT EXISTS `school_mng` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school_mng`;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `exp_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_expense` int(11) NOT NULL,
  `teachers_salary` int(11) NOT NULL,
  `staff_salary` int(11) NOT NULL,
  `bills` int(11) NOT NULL,
  `extras` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `facuties_tbl`;
CREATE TABLE IF NOT EXISTS `facuties_tbl` (
  `faculties_id` int(10) unsigned NOT NULL,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facuties_tbl`
--

INSERT INTO `facuties_tbl` (`faculties_id`, `faculties_name`, `note`) VALUES
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

DROP TABLE IF EXISTS `stu_score_tbl`;
CREATE TABLE IF NOT EXISTS `stu_score_tbl` (
  `ss_id` int(10) unsigned NOT NULL,
  `stu_id` varchar(50) NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_score_tbl`
--

INSERT INTO `stu_score_tbl` (`ss_id`, `stu_id`, `faculties_id`, `sub_id`, `miderm`, `final`, `note`) VALUES
(29, 'Saif-ur- Rehman', 'test', 'fdsf', 45, 80, 'fgdgsg');

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

DROP TABLE IF EXISTS `stu_tbl`;
CREATE TABLE IF NOT EXISTS `stu_tbl` (
  `roll_no` int(10) NOT NULL,
  `stu_id` int(10) unsigned NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `student_expense` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `sub_tbl`;
CREATE TABLE IF NOT EXISTS `sub_tbl` (
  `sub_id` int(10) unsigned NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_tbl`
--

INSERT INTO `sub_tbl` (`sub_id`, `faculties_id`, `teacher_id`, `semester`, `sub_name`, `note`) VALUES
(7, 'test', 'Yameen Bashir', '4', 'fdsf', 'dsfdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

DROP TABLE IF EXISTS `teacher_tbl`;
CREATE TABLE IF NOT EXISTS `teacher_tbl` (
  `teacher_id` int(10) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `users_tbl`;
CREATE TABLE IF NOT EXISTS `users_tbl` (
  `u_id` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` char(10) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `type`, `approved`) VALUES
(1, 'admin', 'admin', 1),
(4, 'moazkhan', 'admin', 1),
(5, 'teacher', 'teacher', 0),
(6, 'alikhan', 'student', 1),
(8, 'bilalkhan', 'teacher', 1),
(11, 'ter', 'admin', 1),
(13, 'admin1178', '1', 0),
(15, 'admin11', 'student', 1),
(16, '12345623', 'teacher', 0);

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
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  MODIFY `faculties_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  MODIFY `ss_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  MODIFY `stu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  MODIFY `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;--
-- Database: `test1`
--
CREATE DATABASE IF NOT EXISTS `test1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test1`;

-- --------------------------------------------------------

--
-- Table structure for table `am_users`
--

DROP TABLE IF EXISTS `am_users`;
CREATE TABLE IF NOT EXISTS `am_users` (
  `idam_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ngoemail` varchar(45) NOT NULL,
  `phonenumber` varchar(45) NOT NULL,
  `ngoname` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_users`
--

INSERT INTO `am_users` (`idam_users`, `user_id`, `ngoemail`, `phonenumber`, `ngoname`) VALUES
(1, 19, '12wdqw@23131', '923121134567', 'qqweqw'),
(2, 24, '13beseuhussain@edu.pk', '923121234567', 'ngoname');

-- --------------------------------------------------------

--
-- Table structure for table `an_users`
--

DROP TABLE IF EXISTS `an_users`;
CREATE TABLE IF NOT EXISTS `an_users` (
  `idan_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` varchar(45) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `an_users`
--

INSERT INTO `an_users` (`idan_users`, `user_id`, `user_role`) VALUES
(1, 19, 'student'),
(2, 20, 'student'),
(3, 21, 'student'),
(4, 22, 'student'),
(5, 23, 'student'),
(6, 24, 'student'),
(7, 25, 'student'),
(8, 26, 'student'),
(9, 27, 'student'),
(10, 28, 'student'),
(11, 29, 'student'),
(12, 30, 'student'),
(13, 31, 'student'),
(14, 32, 'student'),
(15, 33, 'student'),
(16, 34, 'student'),
(17, 35, 'student'),
(18, 36, 'student'),
(19, 37, 'student'),
(25, 42, 'student'),
(27, 43, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `blood_req`
--

DROP TABLE IF EXISTS `blood_req`;
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
('Basit', 'Fever', 'Dr. Arslan', '2016-01-22', '03007784678', 'A+', '50m', 'Lahore', 'Civil Hospital', 'Model Town Lahore', '2016-01-02'),
('Junaid', 'mental', 'Dr. Who', '2016-01-20', '03007787781', 'AB+', '200', 'Peshawar', 'Sultan Mehmood', 'PIMS, Peshawar', '2016-01-02'),
('Junaid', 'mental', 'Dr. Who', '2016-01-20', '03007787781', 'AB+', '200', 'Peshawar', 'Sultan Mehmood', 'PIMS, Peshawar', '2016-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `timestamp_t` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
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
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article` text COLLATE utf8_unicode_ci NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rating` enum('0','1','2','3','4','5') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `user_id`, `cat_id`, `title`, `article`, `date_published`, `rating`) VALUES
(1, 0, 'A-1', 'چند اہم اصطلاحات', ':(Infection) وبا يا اچھوت\r\nعام حالات میں جانوروں اور پرندوں میں مختلف جراثیم، وائرس موجود ہوتے ہيں۔ کسی قسم کی ناگہانی صورت يا دباؤ کی وجہ سے جانوروں ياں پرندوں کا مدافعاتی نظام اس حد تک کمزور ہو جاتا ہے کہ يہ جراثيم ان کے اندرونی اعضاء تک رساي حاصل کر ليتے ہيں اور بيماری کا سبب بنتے ہيں۔ اس کو چھوت يا وبا کہتے ہيں۔ مثال کے طور پہ مرغیوں ميں متعدی نزلہ وغيرہ۔\r\n\r\n:(Disease) مرض\r\nصحت کی عمومی حالت سے مختلف ايسی صورت جس ميں جانور يا پرندے کو کسی قسم کی دشواری پيش ہو مرض يا بيماری کہلاتی ہے۔\r\n\r\n:(Pathogen) پيتھوجن\r\nوہ زندہ اجسام جو کسی بيماری کو پيدا کرنے کا سبب بتے ہيں۔ ازقسم بيکٹيريا، وائرس، پروٹوزوا، بيرونی يا اندرونی کرم وغيرہ۔\r\nان کو دو حصوں ميں تقسيم کيا جا سکتا ہے:\r\nاؤل: ايسے جراثيم جو بغير کسی بيرونی اثرکی موجودگی کے بيماری پيداکرنے کی اہليت رکھتے ہيں پرائمری پيتھوجن کہلاتے ہيں\r\nدوسری: ايسے جراثيم جو صحت مند جسم مين بيماری تو پیدا کر سکتے ہيں مگر اس مقصد کے ليے انکو چند بيرونی عواملکی ضرورت ہوتی ہے۔ مثلا کمزور مدافعتی نظام ار عضليات کو چوٹ، زخم وغيرہ۔\r\n\r\n :(Vaccine) ويکسين\r\nجانوروں ميں کسی بيماری سے حفاظت کے ليے حفظ ماتقدم کے طور پر دی جانے والی دوائ کو وےکسين کہتے ہيں۔ کسی بھی بيماری کے ليے ویکسین اسی بيماری کو پھيلانے والے جراثيم ؛وائرس يا بيکٹيريا سے بنائ جاتی ہے جو کہ ويکسين ميں مردہ، نيم مردہ يا زندہ حالت ميں پائے جاتے ہيں۔ ويکسين عمومن وبائ امراض کے ليے کی جاتی ہے۔\r\n\r\n:(Antibiotics) اينٹی بايئوٹکس\r\nايسے اجزاء جو بيکٹيريا سے حاصل کئے جائيں اور انہی کے خاتمے کے ليے استعمال کيے جائيں۔', '2016-01-03 09:40:27', '0');

-- --------------------------------------------------------

--
-- Table structure for table `content_android_devlopment`
--

DROP TABLE IF EXISTS `content_android_devlopment`;
CREATE TABLE IF NOT EXISTS `content_android_devlopment` (
  `chapter_no` int(11) NOT NULL,
  `chapter_name` varchar(40) NOT NULL,
  `video_link` varchar(500) NOT NULL,
  `video_summary` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_android_devlopment`
--

INSERT INTO `content_android_devlopment` (`chapter_no`, `chapter_name`, `video_link`, `video_summary`) VALUES
(1, 'Introduction', 'https://www.youtube.com/embed/QAbQgLGKd3YLesson 1 - User Interface Components In this lesson, we will highlight various important components of the Android User Interface (UI) ï¿½ like Radio Buttons, Grid Views and several more ï¿½ that will allow you to make highly functional mobile apps. We will focus on each UI component by trying to answer the question, ', 'Lesson 1 - User Interface Components In this lesson, we will highlight various important components of the Android User Interface (UI) ï¿½ like Radio Buttons, Grid Views and several more ï¿½ that will allow you to make highly functional mobile apps. We will focus on each UI component by trying to answer the question, '),
(2, 'Installing Android Studio', 'https://www.youtube.com/embed/zEsDwzjPJ5cIn this tutorial, we will be installing Android Studio on a Windows 7 64-bit OS. If you have questions, feel free to ask in the comments or visit my forums and leave a topic in the Android section.', 'In this tutorial, we will be installing Android Studio on a Windows 7 64-bit OS. If you have questions, feel free to ask in the comments or visit my forums and leave a topic in the Android section.'),
(3, 'Setting Up Project', 'https://www.youtube.com/embed/r4oIez0sfvY', 'When building a mobile application, it''s important that you always test your application on a real device before releasing it to users. This video describes how to set up your development environment and Android-powered device for testing and debugging on the device.\r\n\r\nYou can use any Android-powered device as an environment for running, debugging, and testing your applications. The tools included in the SDK make it easy to install and run your application on the device each time you compile. You can install your application on the device directly from Android Studio or from the command line with ADB. If you don''t yet have a device, check with the service providers in your area to determine which Android-powered devices are available.'),
(4, 'Running a Simple App', 'https://www.youtube.com/embed/qKRWC3Q8wRwTo run an application on an emulator or device, the application must be signed using debug or release mode. You typically want to sign your application in debug mode when you develop and test your application, because the build system uses a debug key with a known password so you do not have to enter it every time you build. When you are ready to release the application to Google Play, you must sign the application in release mode, using your own private ', 'To run an application on an emulator or device, the application must be signed using debug or release mode. You typically want to sign your application in debug mode when you develop and test your application, because the build system uses a debug key with a known password so you do not have to enter it every time you build. When you are ready to release the application to Google Play, you must sign the application in release mode, using your own private key.If you are using Android development tools, the build system can sign the application for you when build your app for debugging. You must obtain a certificate to sign your app when you build and app for release. For more information on signing applications, see Signing Your Applications.');

-- --------------------------------------------------------

--
-- Table structure for table `content_database_mangement`
--

DROP TABLE IF EXISTS `content_database_mangement`;
CREATE TABLE IF NOT EXISTS `content_database_mangement` (
  `chapter_no` int(11) NOT NULL,
  `chapter_name` varchar(40) NOT NULL,
  `video_link` varchar(200) NOT NULL,
  `video_summary` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_database_mangement`
--

INSERT INTO `content_database_mangement` (`chapter_no`, `chapter_name`, `video_link`, `video_summary`) VALUES
(1, 'Introduction', 'https://www.youtube.com/embed/R5BN-1Llhcw?list=PLyfAe_is5zoAndjqsbEmATkevlmGxFcvt', 'In this tutorial we will see how DBMS deals with handling and assembling data into database properly. Here we have complete Database Management system ( DBMS ) Course. The DBMS is the software that interacts with the users'' application programs and the database. the Database Management system ( DBMS ) is an extremely powerful and useful tool. However, as the end-users are not too interested in how complex or easy a task is for the system, it\r\ncould be argued that the DBMS has made things more complex because they now see more data than they actually need or want.DBMS for a personal computer\r\nmay not support concurrent shared access, and it may provide only limited security,\r\nintegrity, and recovery control. \r\nHowever, modern, large multi-user DBMS products offer\r\nall the above functions and much more. Modern systems are extremely complex pieces\r\nof software consisting of millions of lines of code, with documentation comprising many\r\nvolumes. This is a result of having to provide software that handles requirements of a\r\nmore general nature. '),
(2, 'Environment of Database', 'https://www.youtube.com/embed/9fiAlM71Fa4?list=PLyfAe_is5zoAndjqsbEmATkevlmGxFcvt', 'In this section, we examine all the component of the DBMS environment. We can identify five major components in the DBMS environment: hardware, software, data, procedures, and people.\r\nDBMS means Database Management system. It deals with handling and assembling data into database properly. Here we have complete Database Management system ( DBMS ) Course. The DBMS is the software that interacts with the users'' application programs and the database. the Database Management system ( DBMS ) is an extremely powerful and useful tool. However, as the end-users are not too interested in how complex or easy a task is for the system, it\r\ncould be argued that the DBMS has made things more complex because they now see more data than they actually need or want.'),
(3, 'Role of Database Administrators or DBA', 'https://www.youtube.com/embed/MhGWEY7JqyQ?list=PLyfAe_is5zoAndjqsbEmATkevlmGxFcvt', 'The database and the DBMS are corporate resources that must be managed like any other\r\nresource. Data and database administration are the roles generally associated with the\r\nmanagement and control of a DBMS and its data. The Data Administrator (DA) is\r\nresponsible for the management of the data resource including database planning, development\r\nand maintenance of standards, policies and procedures, and conceptual/logical database\r\ndesign. The DA consults with and advises senior managers, ensuring that the\r\ndirection of database development will ultimately support corporate objectives.\r\nThe Database Administrator (DBA) is responsible for the physical realization of the\r\ndatabase, including physical database design and implementation, security and integrity\r\ncontrol, maintenance of the operational system, and ensuring satisfactory performance\r\nof the applications for users. The role of the DBA is more technically oriented than the\r\nrole of the DA, requiring detailed knowledge of the target DBMS and the system environment.'),
(4, 'Entity-Relationship Diagram Tutorial', 'https://www.youtube.com/embed/SDsJG-a4WAI?list=PLyfAe_is5zoAndjqsbEmATkevlmGxFcvt', 'An Entity-Relationship diagram (ERD) typically serves as the main deliverable of a conceptual data model. While newer approaches to E-R modeling have developed, the E-R approach is still cited by some professionals as "the premier model for conceptual database design". An ERD is a logical representation of an organization''s data, and consists of three primary components:\r\n\r\nEntities -- Major categories of data and are represented by rectangles\r\nAttributes -- Characteristics of entities and are listed within entity rectangles\r\nRelationships -- Business relationships between entities and are represented by lines\r\nAn Entity is a person, place, object, event, or concept that an organization wants to maintain data on. Each entity has a unique identity that differentiates it from other entities. A point of distinction must be made between entity types and entity instances. An entity type is a collection of entities that share common properties. Entity types are also known as entity classes. An entity instance is an individual occurrence of an entity type. A data model describes an entity type only once; however there may be numerous instances of that type within a database.');

-- --------------------------------------------------------

--
-- Table structure for table `courses_info`
--

DROP TABLE IF EXISTS `courses_info`;
CREATE TABLE IF NOT EXISTS `courses_info` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `image_logo` varchar(100) NOT NULL,
  `contentTable_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_info`
--

INSERT INTO `courses_info` (`course_id`, `course_name`, `description`, `image_logo`, `contentTable_name`) VALUES
(1, 'Android Development for Beginners', 'Learn the basics of Android and Java programming, and take the first step on your journey to becoming an Android developer!\r\n\r\nThis course is designed for students who are new to programming, and want to learn how to build Android apps. You don''t need any programming experience to take this course. If you have been using a smartphone to surf the web and chat with friends, then you''re our perfect target student!\r\n\r\nLearning anything new can be tough. We will walk you through the process of making Android apps, but to get the most out of this course, you must bring your enthusiasm for learning, and budget time on your calendar to learn with us.\r\n\r\nBy the end of the course, you''ll build two simple (but powerful) apps that you can share with your friends. We also hope that you will learn enough through this course to decide how best to continue your journey as an Android app developer, if you''re interesting in pursuing such a path.', 'images\\androidl.jpg', 'content_android_devlopment'),
(2, 'Database Management', 'A DBMS makes it possible for end users to create, read, update and delete data in a database. The DBMS essentially serves as an interface between the database and end users or application programs, ensuring that data is consistently organized and remains easily accessible.\nFormally, a "database" refers to a set of related data and the way it is organized. Access to this data is usually provided by a "database management system" (DBMS) consisting of an integrated set of computer software that allows users to interact with one or more databases and provides access to all of the data contained in the database (although restrictions may exist that limit access to particular data). The DBMS provides various functions that allow entry, storage and retrieval of large quantities of information and provides ways to manage how that information is organized.\n\nBecause of the close relationship between them, the term "database" is often used casually to refer to both a database and the DBMS used to manipulate it.\n\nOutside the world of professional information technology, the term database is often used to refer to any collection of related data (such as a spreadsheet or a card index). This article is concerned only with databases where the size and usage requirements necessitate use of a database management system', 'images\\bdb2.jpg', 'content_database_mangement');

-- --------------------------------------------------------

--
-- Table structure for table `cw_users`
--

DROP TABLE IF EXISTS `cw_users`;
CREATE TABLE IF NOT EXISTS `cw_users` (
  `id_cw_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isdonor` tinyint(4) NOT NULL DEFAULT '1',
  `phonenumber` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw_users`
--

INSERT INTO `cw_users` (`id_cw_users`, `user_id`, `isdonor`, `phonenumber`) VALUES
(1, 19, 1, '923121234567'),
(2, 22, 0, '923121234567'),
(3, 24, 0, '923121234567'),
(4, 25, 1, '923121234567'),
(5, 33, 1, '923121234567'),
(6, 35, 1, '923121234567'),
(7, 38, 1, '923121234567');

-- --------------------------------------------------------

--
-- Table structure for table `cwmigrations`
--

DROP TABLE IF EXISTS `cwmigrations`;
CREATE TABLE IF NOT EXISTS `cwmigrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cwmigrations`
--

INSERT INTO `cwmigrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_05_200000_create_problems_table', 1),
('2015_12_06_300000_add_cashier_columns', 1),
('2015_12_06_400000_create_money_table', 1),
('2015_12_12_500000_create_things_table', 1),
('2015_12_13_600000_create_donate_table', 1),
('2015_12_18_700000_add_fk_to_problems_table', 2),
('2016_01_02_221718_add_problemId_col_to_donate_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cwusers`
--

DROP TABLE IF EXISTS `cwusers`;
CREATE TABLE IF NOT EXISTS `cwusers` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donner` tinyint(1) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stripe_active` tinyint(4) NOT NULL DEFAULT '0',
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_subscription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_plan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_four` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `subscription_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cwusers`
--

INSERT INTO `cwusers` (`id`, `name`, `email`, `phone`, `address`, `donner`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_active`, `stripe_id`, `stripe_subscription`, `stripe_plan`, `last_four`, `trial_ends_at`, `subscription_ends_at`) VALUES
(1, 'Waqas Raza', 'donor@gmail.com', '03048346944', 'nust h-12', 1, '$2y$10$Zun.sbyg15ucY.ncEnguMuYvhaPxxKuy3GktnndYbSMuXFAjnGzhy', 'CgNaGin86M0REgm3uCq3EXJPcWCYyvP5v3l0Bwrf8cEoR7LtseHcquC8mMKM', '2015-12-18 15:28:39', '2016-01-03 03:13:34', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Steve Austin', 'needy@gmail.com', '5096805330', 'street 32', 0, '$2y$10$tSFnnNDDiWZtlr2aqHvsS./qHSOE.dPk0BeT4xM0GTcIdNWRAqLWq', 'UxF4zuBUv3ysXhLzND1RiCpcXmsjtHAo005W1DaHW6fzgxP5rojdisOgC0cS', '2015-12-18 15:29:07', '2016-01-03 12:28:38', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Beverly Hills', 'bhills_3366@mailinator.com', '3105553366', '3366 Beverly Dr', 0, '$2y$10$mfccsoqr6IIoLoXHmLVi4eJ7xWCxpxHi0uih6z.3Ou5F0i2W8xa8.', NULL, '2015-12-20 06:59:50', '2015-12-20 06:59:50', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Beverly Hills', 'bhills_4992@mailinator.com', '3105554992', '4992 Beverly Dr', 1, '$2y$10$0zmu03ZfPIQZw45CuNs7YeSMRbiT9bTRg3JB39euEPlC0rDwE0Mkq', NULL, '2015-12-20 07:01:13', '2015-12-20 07:01:13', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Beverly Hills', 'bhills_9501@mailinator.com', '3105559501', '9501 Beverly Dr', 0, '$2y$10$qZUzQtb5s4M9juPQEUabiOxIFuts2nL6k7RPq7K1nMyYEWbRavWlO', NULL, '2015-12-20 13:11:59', '2015-12-20 13:11:59', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Beverly Hills', 'bhills_9685@mailinator.com', '3105559685', '9685 Beverly Dr', 0, '$2y$10$YkmClzF84L7Za9kabB.E/e0YjAJQzIVDPvrpZex8k.ebWFlKYAx7W', NULL, '2015-12-20 13:12:44', '2015-12-20 13:12:44', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Beverly Hills', 'bhills_6683@mailinator.com', '3105556683', '6683 Beverly Dr', 0, '$2y$10$ayI38zEc7daKs4sRSqa4yu2acqfDTiRq5qe/7E.x1wQIC6ZM7J21u', 'NVXuWIBda5crSirAnU9NyzOMkf401YhwxCEGeVGFs0bICsq13cFGqutCoGqi', '2015-12-20 13:14:01', '2015-12-20 13:14:18', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Beverly Hills', 'bhills_7547@mailinator.com', '3105557547', '7547 Beverly Dr', 1, '$2y$10$KtYvWgfX/7WrdP95c1xeceEmlrqsNsp04BcRP2EUJ0H6pNBMolRI2', 'RkNToSmDRkoD25Jz5Hk6IOYKeQNQETyd5Blo8F05WJDa9SVT1NFRF0hvuxEf', '2015-12-20 13:14:41', '2015-12-20 13:43:17', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

DROP TABLE IF EXISTS `disease`;
CREATE TABLE IF NOT EXISTS `disease` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `definition` text COLLATE utf8_unicode_ci NOT NULL,
  `incidence` text COLLATE utf8_unicode_ci NOT NULL,
  `cause` text COLLATE utf8_unicode_ci NOT NULL,
  `transmission` text COLLATE utf8_unicode_ci NOT NULL,
  `symptoms` text COLLATE utf8_unicode_ci NOT NULL,
  `postmortem_exam` text COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL,
  `treatment` text COLLATE utf8_unicode_ci NOT NULL,
  `prevention` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rating` enum('0','1','2','3','4','5') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `user_id`, `cat_id`, `category`, `name`, `definition`, `incidence`, `cause`, `transmission`, `symptoms`, `postmortem_exam`, `diagnosis`, `treatment`, `prevention`, `publication_date`, `rating`) VALUES
(1, 0, 'P-1', 'Virus', ' (New Castle Disease) رانی کھیت ', 'نیو کیسل بیماری تمام عمر کے پولٹری کو متاثر  کرنے والی ایک انتہائی متعدی وائرل بیماری ہے . متاثرہ پرجاتیوں مرگی ، ترکی ، کبوتر اور بتھ شامل ہیں. حالت شاذ و نادر ہی بتھ میں تشخیص لیکن پیداوار قطرے / ارورتا مسائل کی ایک ممکنہ وجہ ہے . \r\nدوسرے پرجاتی کبھی کبھار ستنداریوں سمیت سنکردوست کیا جا سکتا (مثلا انسان میں آشوب چشم )\r\n', '', 'مملوث وائرس Paramyxovirus PMV 1 ، متغیر pathogenicity کی ہے جو ہے . نشانیاں عام طور پر ، اعصابی نظام تنفس یا تولیدی نظام کی بیماری ہیں . روگنتا عام طور پر زیادہ ہے اور اموات 0-100٪ سے مختلف ہوتی ہے . زیادہ اموات ویکسین سے محروم اسٹاک میں velogenic بیماری میں دیکھا جاتا ہے ', 'ٹرانسمیشن ایروسولز ، پرندوں ، fomites ، زائرین اور (اکثر asymptomatic ) درآمد psittacines کے ذریعے ہے . یہ عام طور پر عمودی نہیں ہے (لیکن چوزوں آلودہ گولوں سے \r\nافزائش گاہیں میں متاثرہ بن سکتا ہے ) \r\n', 'نشانیاں انتہائی متغیر ہیں اور انفیکشن وائرس ( اوپر ملاحظہ کریں) ، سنکرامک خوراک اور گزشتہ نمائش یا ویکسینیشن سے استثنی کی ڈگری کی نوعیت پر انحصار کرے گا .\r\n\r\nاچانک موت\r\nذہنی دباؤ.\r\nکم بھوک لگنا .\r\nکھانسی.\r\nڈائریا .\r\nاعصابی علامات .\r\nفالج .\r\nبٹی ہوئی گردن .\r\nانڈے کی پیداوار میں شدید کمی .\r\n', '', 'ایک گھمنڈی تشخیص نشانیوں، پوسٹ-ماورٹیم لیسانس، سرالوجی میں بڑھتی ہوئی ٹاٹری پر ہے. یہ تنہائی عیسوی، HA، ہیلو میں ND سیرم کے یا کیا آپ کو (کم کراس کے رد عمل), اف کے ساتھ تصدیق ہوتی ہے ۔ Cross-reactions پمو-3 کے ساتھ بنیادی طور پر کیا گیا ہے ۔ پیتھوگاناکاٹی موت کا مطلب ہے وقت کی طرف سے امبریاوس میں، انٹراسریبرال کا جائزہ لیا یا لڑکیاں میں ۴ پیتھوگاناکاٹی ۔ نمونے - داخل رغامی یا کلواکال ۔   فرق ہے متعدی بحفاظت، لارینگوٹراکہیاٹاس، متعدی کورازا، برڈفلو، EDS-76، حیموررحگاک کی بیماری، انکیپہالومیلاٹاس، انکیپہالومالاکیا، انٹسیکاٹانس، دائیں کان کے انفیکشن/کھوپڑی عثٹیاٹاس، پنیومووروس انفیکشن سے ۔', 'کوئی بھی ، اینٹی بایوٹک ثانوی بیکٹیریا کو کنٹرول کرنے کے لیے', 'سنگرودھ (Quarantine)  ، بائیو سیکیورٹی ، تمام میں / تمام آؤٹ پیداوار ، ویکسینیشن . یہ خاص طور پر معمول سیرم سائنسی نگرانی کے استعمال کی طرف سے پرندوں عمل میں ، ویکسی نیشن کے جواب کی نگرانی کے لئے عام ہے . HI بڑے پیمانے پر استعمال کیا گیا ہے؛ یلسا اب بھی استعمال کیا جاتا ہے . یہ ٹیسٹ براہ راست تاہم ، کے Mucosal استثنی کا اندازہ نہیں .\r\n\r\nحفاظتی ٹیکوں کے پروگرام مناسب طریقے سے محفوظ کیا جاتا ہے جس میں اعلی طاقت کی ویکسین ، استعمال کرتے ہیں اور اکاؤنٹ میں مقامی حالات لینا چاہئے . ایک مخصوص پروگرام دن 14 دنوں میں LaSota قسم ویکسین کے بعد کی عمر میں Hitchner B1 ویکسین شامل کر سکتے ہیں . LaSota قسم ویکسین بھی خطرہ زیادہ ہے تو عمر کے 35-40 دنوں میں بار بار کر سکتے ہیں . سپرے درخواست کے استعمال کی سفارش کی ہے لیکن یہ کم سے کم رد عمل کے ساتھ اچھا تحفظ حاصل کرنے کے لئے دیکھ بھال کے ساتھ لاگو کیا جا کرنے کی ضرورت ہے .\r\nفعال ویکسین زیادہ تر عام میں زندہ ویکسین کے استعمال کی جگہ لے لی ہے لیکن وہ مقامی بیماریوں کے لگنے کی روک تھام کے لیے نہیں .\r\n\r\nانیکٹاویٹد ویکسین زیادہ تر عام میں براہ راست ویکسین کے استعمال کی جگہ لے لی ہے بلکہ انہیں مقامی بیماریوں کے لگنے سے منع نہیں ہے ۔   کی روک تھام یا واکانال کے رد عمل میں نوجوان چوزوں کم کرنے کے لیے اس دن پرانی ہے ماؤں کو یکساں ٹاریس ضروری ہے ۔ واکانال رد عمل آشوبِ چشم، سناکانگ، اور کبھی کبھار کم trachea میں پیپ کا ایک پلگ کی وجہ سے سانس لینا کے طور پر پیش کرسکتا ہے ۔ کچھ ممالک میں اسے گلیزر واککانال ردعمل کے ادوار کے دوران اینٹی پروفیلیکٹاکالل فراہم کرنے کے لئے موجود رہی ہے ۔ اچھا انتظام کے تحت میکوپلاسم گاللاسیپٹیکم مفت اسٹاک کے استعمال کا خطرہ واکانال رد عمل کی گھٹا دیتا ہے ۔\r\n', '2016-01-03 09:51:48', '0'),
(2, 0, 'P-2', 'Virus', 'ميريکس کی بيماری (Marek’s Disease)', 'مرغیوں کی وہ بیماری اور شاذ و نادر ہی مرغیوں کے ساتھ قریبی ایسوسی ایشن میں ترکوں، دنیا بھر میں دیکھا کی ایک ہرپیز وائرس انفیکشن ہے. 1980 اور 1990 کے عشرے سے انتہائی کمزوری اپبھیدوں شمالی امریکہ اور یورپ میں ایک مسئلہ بن چکے ہیں ۔ مرض 10-50 فیصد اور شرح اموات 100 فیصد ہے ۔ ایک متاثرہ ریوڑ میں شرح اموات عام طور پر ایک اعتدال پسند یا اعلی کی شرح پر کافی چند ہفتوں تک جاری رہتا ہے ۔ ''دیر'' وہ میں کی اموات کی عمر 40 ہفتے کو وسیع کر سکتے ہیں ۔ متاثرہ پرندے زیادہ دیگر بیماریوں کے لئے، پرجیوی اور بیکٹیریل دونوں ساتھ ہیں ۔', '', 'انفیکشن کا راستہ عموماً تنفس ہے اور یہ بیماری پھیلانے متعدی پنکھ گلٹی غصہ، فاوماٹیس، وغیرہ کی طرف سے اعلی متعدی ہے ۔ متاثرہ پرندوں کی زندگی کے لئے واریماک رہیں ۔ عمودی ٹرانسمیشن اہم نہیں تصور کی جاتی ہے ۔', '', 'پیروں، پروں اور گردن کافالج . وزن میں کمی ۔ گرے iris یا Pupil۔ رویا تنظیمیں ۔ پنکھ کے follicles  کا اٹھنا اور رووگہان کے ارد گردکھردری جلد ہے ۔', 'جگر، طحال، گردوں، پھیپھڑوں، گوندس، دل اور استخوان بندی پٹھوں میں   گرے-سفید فوکا نیوپلاسٹاک ٹش ۔ عصبی تنوں اور سٹریاشن کا نقصان ہوا گاڑھا ہونا. ماکراسوپاکالل - لیمفواد گھسپیٹھ کی کثیرشکلیت ہے ', 'تاریخ، طبی علامات، لیسانس ، ہسٹوپیٹہولوجی ۔  لیمپہواد لیوکوساس، عصیھ، ٹہاامانا کی کمی، خاص طور پر آغاز پر، Ca/فاسفورس/وٹامن ڈی کی کمی ۔', 'کوئی نہیں', 'حفظان صحت، سب-میں/سب-out پیداوار، مزاحم اپبھیدوں، 1500PFU  کے HVT میں پرانے دن (مگر اب تیزی کے ساتھ میں اووا ایپلی کیشن پر منتقلی کے)، ایسوسی ایشن کے دیگر اپبھیدوں (SB1 سارو-قسم 2) کے ساتھ اور راسپان کے ساتھ عام طور پر قطرے پلانے ہیں ۔   یہ ویکسین کی مختلف اقسام کے امتزاج کی کوشش میں وسیع تحفظ حاصل کرنے کے لیے استعمال کرنا عام رواج ہے ۔ وراثیات B21 جین ہے جو وہ کی بیماری چیلنج کے لیے بڑھتی ہوئی مزاحمت ویسےہی کی فریکوئنسی میں اضافہ کی طرف سے مدد کر سکتے ہیں ۔', '2016-01-03 09:55:50', '0');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

DROP TABLE IF EXISTS `donate`;
CREATE TABLE IF NOT EXISTS `donate` (
  `id` int(10) unsigned NOT NULL,
  `donorId` int(10) unsigned NOT NULL,
  `moneyId` int(10) unsigned NOT NULL,
  `thingId` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `problemId` int(10) unsigned NOT NULL DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `donorId`, `moneyId`, `thingId`, `created_at`, `updated_at`, `problemId`) VALUES
(46, 2, 4, 0, '2016-01-02 13:48:26', '2016-01-02 13:48:26', 2),
(47, 1, 2, 0, '2016-01-02 13:53:31', '2016-01-02 13:53:31', 2),
(48, 1, 2, 0, '2016-01-02 14:14:07', '2016-01-02 14:14:07', 2),
(49, 1, 2, 0, '2016-01-02 14:16:25', '2016-01-02 14:16:25', 2),
(50, 1, 5, 0, '2016-01-02 14:25:14', '2016-01-02 14:25:14', 2),
(51, 1, 2, 0, '2016-01-02 15:08:22', '2016-01-02 15:08:22', 2),
(52, 1, 2, 0, '2016-01-03 03:10:26', '2016-01-03 03:10:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `donation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `school_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_reg`
--

DROP TABLE IF EXISTS `donor_reg`;
CREATE TABLE IF NOT EXISTS `donor_reg` (
  `uname` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `weight` int(4) NOT NULL,
  `b_gp` varchar(5) NOT NULL,
  `ldd` date NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `mob_num` varchar(12) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `msg` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_reg`
--

INSERT INTO `donor_reg` (`uname`, `pass`, `name`, `age`, `gender`, `dob`, `weight`, `b_gp`, `ldd`, `state`, `city`, `pin_code`, `mob_num`, `e_mail`, `msg`) VALUES
('amad', '2345', 'ahmed', 13, 'male', '2013-45-67', 34, 'A+', '0000-00-00', 'Punjab', 'Multan', 44000, '35338573', 'asd@gmail.com', 'fggfc fgdg gdhg gd'),
('test123', '87654321', 'asd', 78, 'Male', '95-12-12', 60, 'O+', '1995-06-14', 'pak', 'Islamabad', 44000, '03121234567', '13beseuhussain@seecs.edu.pk', 'sdsdfsdfsdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_table`
--

DROP TABLE IF EXISTS `enrollment_table`;
CREATE TABLE IF NOT EXISTS `enrollment_table` (
  `e` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_table`
--

INSERT INTO `enrollment_table` (`e`, `id`, `course_name`, `student_id`, `status`) VALUES
(5, 1, 'Android Development for Beginners', 23, ''),
(6, 2, 'Database Management', 23, ''),
(7, 2, 'Database Management', 25, ''),
(8, 1, 'Android Development for Beginners', 25, ''),
(9, 1, 'Android Development for Beginners', 42, '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `exp_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_expense` int(11) NOT NULL,
  `teachers_salary` int(11) NOT NULL,
  `staff_salary` int(11) NOT NULL,
  `bills` int(11) NOT NULL,
  `extras` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `facuties_tbl`;
CREATE TABLE IF NOT EXISTS `facuties_tbl` (
  `faculties_id` int(10) unsigned NOT NULL,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facuties_tbl`
--

INSERT INTO `facuties_tbl` (`faculties_id`, `faculties_name`, `note`) VALUES
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `hw_users`
--

DROP TABLE IF EXISTS `hw_users`;
CREATE TABLE IF NOT EXISTS `hw_users` (
  `id_hw_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hw_users`
--

INSERT INTO `hw_users` (`id_hw_users`, `user_id`, `phone_number`) VALUES
(1, 24, '923121234567'),
(2, 19, '923121234567'),
(3, 27, '923127199912'),
(4, 33, '923121234567');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `image_name` text COLLATE utf8_unicode_ci NOT NULL,
  `scan_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(10) unsigned NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `path`) VALUES
(1, 'uploads/86157.jpg'),
(2, 'uploads/39693.JPG'),
(3, ''),
(4, '');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `occupation` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `contact`, `address`, `lat`, `lng`, `occupation`) VALUES
(1, 'Umar Ahmed', '0333 5811946', 'G-10/1', 33.670853, 73.012024, 'carpenter'),
(33, 'Ahad Mahmood', '0300444272', 'Street 47, G-11', 33.669930, 72.986633, 'Electrician'),
(32, 'Hussnain Waris', '03004442725', 'Street 81, G-11 ', 33.669930, 72.995811, 'Sweeper'),
(34, 'Talha Munir', '03004434534', 'G-11', 33.669930, 72.999123, 'Glazier'),
(35, 'Moiz Farooq', '03404434534', 'Street 147, G-11', 33.665085, 72.995537, 'Glazier');

-- --------------------------------------------------------

--
-- Table structure for table `member_reg`
--

DROP TABLE IF EXISTS `member_reg`;
CREATE TABLE IF NOT EXISTS `member_reg` (
  `uname` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mob_num` varchar(12) NOT NULL,
  `e_mail` varchar(40) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_reg`
--

INSERT INTO `member_reg` (`uname`, `pass`, `name`, `mob_num`, `e_mail`, `msg`) VALUES
('omer', '12345', 'Omer', '0515151667', 'omer@gmail.com', 'Stay Blessed everyone.'),
('Ali', 'pakistan', 'Ali Khan', '03006752872', 'ali@gmail.com', 'Hi, I am ALi. Have a Nice Day.'),
('basit', '12345', 'Basit Ali', '03005675671', 'basit@gmail.com', 'Happy New Year. '),
('usman', '12345', 'Hafiz Usman', '03331234567', 'h.usman@gmail.com', 'Hi, I am Usman.\r\nThanks'),
('ndsad', '1232', 'ewqe', '523423', 'qwe4r3', 'asdd');

-- --------------------------------------------------------

--
-- Table structure for table `metirial_donation`
--

DROP TABLE IF EXISTS `metirial_donation`;
CREATE TABLE IF NOT EXISTS `metirial_donation` (
  `metirial_id` int(11) NOT NULL,
  `metirial_name` varchar(60) NOT NULL,
  `category` varchar(30) NOT NULL,
  `picture` varchar(60) DEFAULT NULL,
  `sent` int(1) NOT NULL,
  `reserved` int(1) NOT NULL,
  `recieved` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metirial_donation`
--

INSERT INTO `metirial_donation` (`metirial_id`, `metirial_name`, `category`, `picture`, `sent`, `reserved`, `recieved`) VALUES
(45, '4564654', 'Clothes', 'pics/445dd8.jpg', 0, 0, 0),
(46, '4564654', 'Clothes', 'pics/445dd8.jpg', 0, 0, 0),
(47, 'sdfsdfs', 'Bags', 'pics/1511628_624478180923496_1200703402_n.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `metirial_donation_acceptor`
--

DROP TABLE IF EXISTS `metirial_donation_acceptor`;
CREATE TABLE IF NOT EXISTS `metirial_donation_acceptor` (
  `metirial_id` int(11) NOT NULL DEFAULT '0',
  `user_first_name` varchar(15) NOT NULL,
  `user_last_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metirial_donation_user`
--

DROP TABLE IF EXISTS `metirial_donation_user`;
CREATE TABLE IF NOT EXISTS `metirial_donation_user` (
  `metirial_id` int(11) NOT NULL DEFAULT '0',
  `user_first_name` varchar(15) NOT NULL,
  `user_last_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metirial_donation_user`
--

INSERT INTO `metirial_donation_user` (`metirial_id`, `user_first_name`, `user_last_name`, `user_email`) VALUES
(45, '1234', 'Mouse', '13beseuhussain@seecsada.edu.pk'),
(46, '1234', 'Mouse', '13beseuhussain@seecsada.edu.pk'),
(47, '1234', 'Mouse', '13beseuhussain@seecsada.edu.pk');

-- --------------------------------------------------------

--
-- Table structure for table `mh_user_data`
--

DROP TABLE IF EXISTS `mh_user_data`;
CREATE TABLE IF NOT EXISTS `mh_user_data` (
  `user_first_name` varchar(15) NOT NULL,
  `user_last_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_donor` varchar(1) DEFAULT NULL,
  `user_password` varchar(40) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_contact_number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mh_user_data`
--

INSERT INTO `mh_user_data` (`user_first_name`, `user_last_name`, `user_email`, `user_donor`, `user_password`, `user_address`, `user_contact_number`) VALUES
('1234', 'Mouse', '13beseuhussain@seecsada.edu.pk', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sdasd asdasd adada', 2147483647),
('Mickey', 'asd', 'skipper.umar@gmaisdssl.com', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', '923123456789', 2147483647),
('test', 'check', 'abc@kg.com', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'asasewe sdfsdfsd sdfsd f', 2147483647),
('test', 'check', 'skipper.umar@gmail.cd.com', '1', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'sdfsdf', 2147483647),
('umar', 'hussain', '13beseuhussain@edu.pk', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'asdasjhd', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `mh_users`
--

DROP TABLE IF EXISTS `mh_users`;
CREATE TABLE IF NOT EXISTS `mh_users` (
  `id_mh_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `is_donor` tinyint(4) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mh_users`
--

INSERT INTO `mh_users` (`id_mh_users`, `user_id`, `contact_number`, `is_donor`, `address`) VALUES
(1, 19, '923121234567', 0, 'house 1 street 2 awqq'),
(3, 21, '923121234567', 1, 'asasewe sdfsdfsd sdfsd f'),
(4, 24, '923121234567', 0, 'asdasjhd'),
(5, 25, '923121234567', 1, 'sdfsdf'),
(6, 33, '923121234567', 1, 'sdasd asdasd adada'),
(8, 42, '923123456789', 0, '923123456789');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_01_01_062528_create_images_table', 1),
('2016_01_02_062528_create_MMusers_table', 1),
('2016_01_03_062528_create_schools_table', 1),
('2016_01_04_062528_create_password_resets_table', 1),
('2016_01_05_062528_create_donations_table', 1),
('2016_01_01_062528_create_images_table', 1),
('2016_01_02_062528_create_MMusers_table', 1),
('2016_01_03_062528_create_schools_table', 1),
('2016_01_04_062528_create_password_resets_table', 1),
('2016_01_05_062528_create_donations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mm_users`
--

DROP TABLE IF EXISTS `mm_users`;
CREATE TABLE IF NOT EXISTS `mm_users` (
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `more_info` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mm_users`
--

INSERT INTO `mm_users` (`user_id`, `name`, `phone_number`, `occupation`, `role`, `bio`, `more_info`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Abdul Basit12', 'abcd123re4', 'Teacherer', 0, 'nothing Special ', 'fdsaf', 's7bp05t1wawJpX3SRmGlILYpxXGHbvbgekvXZxaGX9MyYgDpGr9XKCPgEes6', '0000-00-00 00:00:00', '2016-01-02 05:11:09'),
(36, '', '923364654439', 'SDAKFJSDA', 0, 'SAKFDLAKDSJ', 'KLDSFJLKSD', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '', '923364654439', 'Developer', 0, 'sdlkfjadsle', 'saldkfjlkadsj;asld', 'bnOx4UcSfh3GGpUm3Albw2jajh3xQJFm12kD4cMGrl9xhSFnaDmclhIJ2oci', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'abab', '923121234567', '256456sdf4s564we6', 0, 'fwnwje ckvj k fej vjek rv', 'sdsdfsfds', 'BYxfvuVWzg9okcGrnZ4mOoBQNNMuh8JjWeBmNzVZxrepbxo1VYXs7xXarvSA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Mickeyasd', '923123456789', '123456789', 0, 'ASFSDFFSDFSDFS', 'sdffsdfsdfs', 'pEcMETYM5NUqUVrZvLLIfLroPQ7SCQE673obrYX76PpJi6OCpz0r5AZ65STR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '1234ewe', '923121234567', '1213656', 0, 'asdasdasdxzxxcsdcs', 'ASDDXBZ BN BN N', 'JgbK1ba3h9V97qm8DjkIJBG4bno9VirKBsVBPt4QGaZHfSBCwVW2HWhpcvvH', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mmm_users`
--

DROP TABLE IF EXISTS `mmm_users`;
CREATE TABLE IF NOT EXISTS `mmm_users` (
  `id_mm_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `bio` longtext NOT NULL,
  `more_info` text NOT NULL,
  `occupation` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmm_users`
--

INSERT INTO `mmm_users` (`id_mm_users`, `user_id`, `phone_number`, `bio`, `more_info`, `occupation`) VALUES
(1, 22, '923121345678', 'sdfhsdfsdnfjk fsdjk f', 'sdfsdfnsdfk sdfsdk fsdkfs', 'carpainter'),
(2, 24, '923121234567', 'sdfsdfsd', 'sdfsd', 'dfsdf'),
(3, 25, '923121234567', 'fwfjkwefnw vk jkdsjksdnfsjknsjkdf sd fsdfw ieof wehdsfi oifoweoif uwo f wofjoweiow f ow fowe ofwo fow eo fuou fowe fowe ufouwe fuweuo fuweo fuoweiu iofu weiofwri uf orwfuru frefu erfoe rg eru ger gerio geroi goeri goetg trgu er ger goer oesfsdfsdfsdfsdfsdfsdf sdfsdfsd sd fsd fs  sd  d  d d d d d d werwern wefw jif rf erj fnd fn n efn wejn fn fne rfn enmr gmn rmn nmd vcm vern n vd fvn sdm vmsnd fnmw em mw', 'sfsdfsdssd', 'fwe'),
(4, 33, '923121234567', 'asdasdasd', 'asdasdadasdas', 'adasa'),
(5, 35, '923121234567', 'buhbuhj', 'zxdfxfgc', '123456'),
(6, 39, '923123456787', 'sdfs', 'sdfsds', 'Teacher'),
(7, 40, '923121234567', 'wwewrrwer454sd6fv', '4ew56r46v4 cd4f5v4f5v46', 'weqweqw546'),
(8, 41, '923121234567', 'fwnwje ckvj k fej vjek rv', 'sdsdfsfds', '256456sdf4s564we6'),
(9, 42, '923123456789', 'ASFSDFFSDFSDFS', 'sdffsdfsdfs', '123456789'),
(10, 43, '923121234567', 'asdasdasdxzxxcsdcs', 'ASDDXBZ BN BN N', '1213656');

-- --------------------------------------------------------

--
-- Table structure for table `monetary_donation`
--

DROP TABLE IF EXISTS `monetary_donation`;
CREATE TABLE IF NOT EXISTS `monetary_donation` (
  `problem_id` int(11) NOT NULL,
  `problem_name` varchar(30) NOT NULL,
  `problem_description` varchar(500) NOT NULL,
  `money_required` int(11) DEFAULT NULL,
  `money_recieved` int(11) DEFAULT '0',
  `picture` varchar(30) DEFAULT NULL,
  `acceptor_contact` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

DROP TABLE IF EXISTS `money`;
CREATE TABLE IF NOT EXISTS `money` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(10) unsigned NOT NULL,
  `problemId` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`id`, `name`, `organization`, `phone`, `email`, `address`, `city`, `state`, `cost`, `problemId`, `created_at`, `updated_at`) VALUES
(32, 'Beverly Hills', 'Xfwgc', '3105551253', 'bhills_1253@mailinator.com', 'Cmqhzi lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 1253, 4, '2016-01-02 13:48:26', '2016-01-02 13:48:26'),
(33, 'Beverly Hills', 'Jhhgy', '3105550533', 'bhills_0533@mailinator.com', 'Haenuf lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 533, 2, '2016-01-02 13:53:31', '2016-01-02 13:53:31'),
(34, 'Beverly Hills', 'Ckhvd', '3105557836', 'bhills_7836@mailinator.com', 'Yngafe lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 7836, 2, '2016-01-02 14:14:07', '2016-01-02 14:14:07'),
(35, 'Beverly Hills', 'Xaaxh', '3105555886', 'bhills_5886@mailinator.com', 'Gdjvnc lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 5886, 2, '2016-01-02 14:16:25', '2016-01-02 14:16:25'),
(36, 'Beverly Hills', 'Sygdo', '3105555116', 'bhills_5116@mailinator.com', 'Wahhoo lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 5116, 5, '2016-01-02 14:25:14', '2016-01-02 14:25:14'),
(37, 'Beverly Hills', 'Xdodi', '3105551598', 'bhills_1598@mailinator.com', 'Qqqbvi lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 1598, 2, '2016-01-02 15:08:22', '2016-01-02 15:08:22'),
(38, 'Beverly Hills', 'Iiayf', '3105554852', 'bhills_4852@mailinator.com', 'Jrjoaq lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Beverly Hills', 'CA', 4852, 2, '2016-01-03 03:10:26', '2016-01-03 03:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `mr_users`
--

DROP TABLE IF EXISTS `mr_users`;
CREATE TABLE IF NOT EXISTS `mr_users` (
  `idmr_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mr_users`
--

INSERT INTO `mr_users` (`idmr_users`, `user_id`, `contact`, `role`) VALUES
(1, 24, '923121234567', 0),
(2, 33, '923121234567', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

DROP TABLE IF EXISTS `ngo`;
CREATE TABLE IF NOT EXISTS `ngo` (
  `user_id` int(11) NOT NULL,
  `ngo_name` varchar(255) NOT NULL,
  `ngo_email` varchar(50) NOT NULL,
  `ngo_phone` varchar(20) DEFAULT NULL,
  `ngo_image` varchar(50) DEFAULT NULL,
  `ngo_description` varchar(255) DEFAULT NULL,
  `ngo_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ngo_rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_cause`
--

DROP TABLE IF EXISTS `ngo_cause`;
CREATE TABLE IF NOT EXISTS `ngo_cause` (
  `cause_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cause_title` varchar(50) DEFAULT NULL,
  `cause_venue` varchar(100) DEFAULT NULL,
  `cause_cover` varchar(50) DEFAULT NULL,
  `cause_description` varchar(255) DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `finishing_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_item`
--

DROP TABLE IF EXISTS `ngo_item`;
CREATE TABLE IF NOT EXISTS `ngo_item` (
  `item_id` int(11) NOT NULL,
  `cause_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `item_worth` int(11) DEFAULT NULL,
  `item_required` int(11) DEFAULT NULL,
  `item_recieved` int(11) DEFAULT NULL,
  `item_promised` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_message`
--

DROP TABLE IF EXISTS `ngo_message`;
CREATE TABLE IF NOT EXISTS `ngo_message` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `message_subject` varchar(100) DEFAULT NULL,
  `message_body` varchar(100) DEFAULT NULL,
  `send_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_user`
--

DROP TABLE IF EXISTS `ngo_user`;
CREATE TABLE IF NOT EXISTS `ngo_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(75) NOT NULL,
  `is_user_ngo` tinyint(1) DEFAULT NULL,
  `is_user_admin` tinyint(1) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_user`
--

INSERT INTO `ngo_user` (`user_id`, `user_name`, `is_user_ngo`, `is_user_admin`, `pass`) VALUES
(1, 'wqe', 1, 1, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `pamphlets`
--

DROP TABLE IF EXISTS `pamphlets`;
CREATE TABLE IF NOT EXISTS `pamphlets` (
  `cat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `pam_id` int(11) NOT NULL,
  `pam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `title` varchar(30) NOT NULL,
  `cell` varchar(25) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `sponsored` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `location`, `caption`, `title`, `cell`, `fullname`, `price`, `sponsored`) VALUES
(61, 'photos/kk.jpg', 'hssa', 'bmwclassic', '03939933', 'hussnain', '3773373', 0),
(60, 'photos/kk.jpg', 'hushwuhushwu', 'bmw classic', '', '', '120000', 0),
(59, 'photos/1546385_657214171063958_5685249054500195149_n.jpg', '', '', '', '', '', 0),
(58, 'photos/10566357_915123541847414_2117040397_n.jpg', 'hdhushudhhdus', 'hussnain', '03128888822', 'hussnain', '1200000', 0),
(57, 'photos/10566357_915123541847414_2117040397_n.jpg', 'hdhushudhhdus', 'hussnain', '03128888822', 'hussnain', '1200000', 0),
(56, 'photos/', '', '', '', '', '', 0),
(53, 'photos/ss.jpg', 'brandnew', 'bmw classic', '', '', '200000', 0),
(54, 'photos/rolls.jpg', 'shsuhushushus', 'HealthyFit', '', '', '3939', 0),
(55, 'photos/kk.jpg', 'hey there', 'hhhhh', '99999', 'hhhhhhhhhhh', '313232', 0),
(62, 'photos/kk.jpg', 'nice one', 'bmw classic', '03333222', 'hussnain', '1230', 0),
(63, 'photos/', '', '', '', '', '', 0),
(64, 'photos/kk.jpgss', 'hssass', 'bmwclassicss', '03939933ss', 'hussnainss', '3773373ss', 1),
(65, '', '', '', '', '', '', 0),
(66, '', '', '', '', '', '', 0),
(67, '', '', '', '', '', '', 0),
(68, '', '', '', '', '', '', 0),
(69, '', '', '', '', '', '', 0),
(70, '', '', '', '', '', '', 0),
(71, '', '', '', '', '', '', 0),
(72, '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
CREATE TABLE IF NOT EXISTS `problems` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `problem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `severity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `solved` int(10) unsigned NOT NULL DEFAULT '0',
  `userId` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `name`, `phone`, `address`, `problem`, `severity`, `cost`, `solved`, `userId`, `created_at`, `updated_at`) VALUES
(2, 'Beverly Hills', '3105550065', '0065 Beverly Dr', 'Awlqla lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'high', 65, 1, 2, '2015-12-18 15:35:57', '2015-12-21 14:10:26'),
(3, 'Beverly Hills', '3105557186', '7186 Beverly Dr', 'Qhtjed lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'high', 7186, 1, 2, '2015-12-18 15:36:16', '2015-12-19 08:37:43'),
(4, 'Waqas', '025998989', 'some address', 'Problem Detail', 'extreme', 989, 0, 2, '2015-12-19 09:58:06', '2015-12-19 09:58:06'),
(5, 'Beverly Hills', '3105552657', '2657 Beverly Dr', 'Bzaygi lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'high', 2657, 0, 2, '2016-01-02 13:09:02', '2016-01-02 13:09:02'),
(9, 'Beverly Hills', '310555552657', '2657 Beverly Dr', 'Bzaygi lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'high', 2657, 0, 1, '2016-01-02 13:09:55', '2016-01-02 13:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `rating_number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `seller`, `buyer`, `review`, `rating_number`) VALUES
(1, 0, 'admin11', '77', 'azwz', 3),
(2, 0, 'admin11', '77', 'azwz', 3),
(3, 0, 'admin11', '77', 'adsdfdsdsfadsf', 5),
(4, 0, 'basit85', 'basit850', 'wqerwe', 5),
(5, 0, 'basit85', 'basit850', 'Best', 4),
(6, 0, 'admin11', '77', 'ddsdfsdf', 3),
(7, 0, 'basit85', 'qqqqqq', 'asdas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registered_modules`
--

DROP TABLE IF EXISTS `registered_modules`;
CREATE TABLE IF NOT EXISTS `registered_modules` (
  `id_registered_modules` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_modules`
--

INSERT INTO `registered_modules` (`id_registered_modules`, `user_id`, `module_id`, `password`) VALUES
(1, 19, './school_management', ''),
(2, 19, './drixel', ''),
(3, 19, './academic_scholorships', ''),
(4, 19, './donations', ''),
(5, 19, './d2quiz', ''),
(6, 19, './ngos', ''),
(7, 19, './problem_sharing', ''),
(8, 21, './d2quiz', ''),
(10, 21, './donations', ''),
(11, 21, './school_management', ''),
(12, 22, './school_renovation', ''),
(13, 22, './problem_sharing', ''),
(14, 22, './drixel', ''),
(15, 22, './d2quiz', ''),
(16, 22, './school_management', ''),
(17, 24, './academic_scholorships', ''),
(18, 24, './school_renovation', ''),
(19, 24, './problem_sharing', ''),
(20, 24, './food_sustenance', ''),
(21, 24, './donations', ''),
(22, 24, './p2p_ecommerce', ''),
(23, 24, './drixel', ''),
(24, 24, './school_management', ''),
(25, 24, './d2quiz', ''),
(26, 24, './ngos', ''),
(27, 24, './blood_donations', ''),
(28, 25, './problem_sharing', ''),
(29, 25, './drixel', ''),
(30, 25, './school_management', ''),
(31, 25, './school_renovation', ''),
(32, 25, './academic_scholorships', ''),
(33, 25, './donations', ''),
(34, 19, './p2p_ecommerce', ''),
(35, 19, './blood_donations', ''),
(36, 27, './school_management', ''),
(37, 27, './p2p_ecommerce', ''),
(38, 27, './blood_donations', ''),
(39, 28, './blood_donations', ''),
(40, 29, './school_management', ''),
(41, 30, './school_management', ''),
(42, 31, './school_management', ''),
(43, 32, './school_management', ''),
(44, 32, './academic_scholorships', ''),
(45, 33, './donations', ''),
(48, 33, './academic_scholorships', ''),
(49, 33, './p2p_ecommerce', ''),
(50, 33, './drixel', ''),
(51, 33, './blood_donations', ''),
(52, 33, './d2quiz', ''),
(53, 33, './problem_sharing', ''),
(54, 33, './food_sustenance', ''),
(55, 33, './school_renovation', ''),
(56, 33, './school_management', ''),
(57, 34, './blood_donations', ''),
(58, 34, './school_management', ''),
(59, 35, './school_renovation', NULL),
(60, 35, './problem_sharing', NULL),
(61, 35, './academic_scholorships', NULL),
(62, 35, './drixel', NULL),
(63, 35, './d2quiz', NULL),
(64, 35, './blood_donations', NULL),
(65, 36, './school_renovation', NULL),
(66, 37, './school_renovation', NULL),
(67, 38, './drixel', NULL),
(68, 38, './academic_scholorships', NULL),
(69, 38, './school_management', NULL),
(70, 38, './problem_sharing', NULL),
(71, 39, './school_renovation', NULL),
(72, 40, './school_renovation', NULL),
(73, 41, './school_renovation', NULL),
(74, 41, './school_renovation', NULL),
(75, 41, './drixel', NULL),
(76, 42, './d2quiz', NULL),
(77, 42, './blood_donations', NULL),
(78, 42, './drixel', NULL),
(79, 42, './academic_scholorships', NULL),
(80, 42, './school_renovation', NULL),
(81, 42, './school_renovation', NULL),
(82, 42, './donations', NULL),
(83, 42, './school_management', NULL),
(84, 43, './drixel', NULL),
(85, 43, './school_renovation', NULL),
(86, 43, './school_renovation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sch_communication`
--

DROP TABLE IF EXISTS `sch_communication`;
CREATE TABLE IF NOT EXISTS `sch_communication` (
  `school_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `sender_is` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_donations`
--

DROP TABLE IF EXISTS `sch_donations`;
CREATE TABLE IF NOT EXISTS `sch_donations` (
  `don_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `don_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sch_requests`
--

DROP TABLE IF EXISTS `sch_requests`;
CREATE TABLE IF NOT EXISTS `sch_requests` (
  `req_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `req_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `full_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `course_degree` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `approx_amount` int(11) NOT NULL,
  `school_name` varchar(80) NOT NULL,
  `req_text` text NOT NULL,
  `add_info` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_requests`
--

INSERT INTO `sch_requests` (`req_id`, `user_id`, `req_time`, `full_name`, `father_name`, `course_degree`, `age`, `gender`, `approx_amount`, `school_name`, `req_text`, `add_info`) VALUES
(1, 32, '0000-00-00 00:00:00', '11', 'abc', 'bs', 21, '0', 5000, 'fsd sdfs', 'erwereiw ', 'werwer');

-- --------------------------------------------------------

--
-- Table structure for table `sch_school`
--

DROP TABLE IF EXISTS `sch_school`;
CREATE TABLE IF NOT EXISTS `sch_school` (
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_ame` varchar(80) NOT NULL,
  `school_address` varchar(100) NOT NULL,
  `school_contact` varchar(20) NOT NULL,
  `school_email` varchar(30) NOT NULL,
  `school_website` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_school`
--

INSERT INTO `sch_school` (`school_id`, `user_id`, `school_ame`, `school_address`, `school_contact`, `school_email`, `school_website`) VALUES
(1, 9, 'abc school', 'xyz city', '03236566', 's@l.com', 'sdfsf'),
(3, 14, 'a', 'b', 'c', 'd@e.com', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `sch_users`
--

DROP TABLE IF EXISTS `sch_users`;
CREATE TABLE IF NOT EXISTS `sch_users` (
  `sch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `is_school` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_users`
--

INSERT INTO `sch_users` (`sch_id`, `user_id`, `rating`, `is_school`, `is_admin`) VALUES
(1, 8, 0, 0, 1),
(2, 9, 0, 1, 0),
(3, 14, 0, 1, 0),
(4, 38, 0, 0, 0),
(5, 19, 0, 0, 0),
(6, 42, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `amount_required` int(11) NOT NULL,
  `amount_gathered` int(11) NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `name`, `user_id`, `amount_required`, `amount_gathered`, `image_id`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'TEST TEST', 36, 100000, 100000, 1, 'TEST', 'testtesttesttesttest testtesttesttesttest', '2016-01-04 04:42:30', '2016-01-04 05:01:29'),
(2, 'School', 36, 23423, 10000, 2, 'school', 'sdfsdfasdfs', '2016-01-04 04:53:46', '2016-01-04 11:01:31'),
(4, 'Test', 37, 12312, 0, 4, 'sdlkfjlsdkf', 'slmnfalsddas', '2016-01-04 07:45:37', '2016-01-04 07:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `sr_users`
--

DROP TABLE IF EXISTS `sr_users`;
CREATE TABLE IF NOT EXISTS `sr_users` (
  `idsr_users` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` varchar(45) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sr_users`
--

INSERT INTO `sr_users` (`idsr_users`, `user_id`, `user_role`) VALUES
(1, 19, 'student'),
(2, 20, 'student'),
(3, 21, 'student'),
(4, 22, 'student'),
(5, 23, 'student'),
(6, 24, 'student'),
(7, 25, 'student'),
(8, 26, 'student'),
(9, 27, 'student'),
(10, 28, 'student'),
(11, 29, 'student'),
(12, 30, 'teacher'),
(13, 31, 'admin'),
(14, 32, 'admin'),
(15, 33, 'teacher'),
(16, 34, 'teacher'),
(18, 38, '1'),
(23, 42, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

DROP TABLE IF EXISTS `stu_score_tbl`;
CREATE TABLE IF NOT EXISTS `stu_score_tbl` (
  `ss_id` int(10) unsigned NOT NULL,
  `stu_id` varchar(50) NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_score_tbl`
--

INSERT INTO `stu_score_tbl` (`ss_id`, `stu_id`, `faculties_id`, `sub_id`, `miderm`, `final`, `note`) VALUES
(29, 'Saif-ur- Rehman', 'test', 'fdsf', 45, 80, 'fgdgsg');

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

DROP TABLE IF EXISTS `stu_tbl`;
CREATE TABLE IF NOT EXISTS `stu_tbl` (
  `roll_no` int(10) NOT NULL,
  `stu_id` int(10) unsigned NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `student_expense` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`roll_no`, `stu_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `phone`, `email`, `student_expense`) VALUES
(2116, 1, 'Saif-ur-', 'Rehman', 'male', '1991-03-01', 'Lahore', '56456654654', 'saif-ur@gmail.com', 564565),
(2115, 2, 'Jazib', 'Bashir', 'male', '1990-05-04', '  Lahore', '03054038588', 'jazib@yahoo.com', 6767),
(2103, 3, 'Tahir', 'Awan', 'Male', '1988-05-05', '   Lahore', '03054038588', 'tahir@gmail.com   ', 0),
(2110, 4, 'Abdul', 'Jabbar', 'Male', '1989-06-06', 'Lahore', '03054038588 ', 'jabbar@gmail.com', 0),
(435, 5, 'gfdgfdg', 'gsfgdf', 'male', '2016-01-21', 'fdsfdf', '435435345435', 'fdggfsdg@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_tbl`
--

DROP TABLE IF EXISTS `sub_tbl`;
CREATE TABLE IF NOT EXISTS `sub_tbl` (
  `sub_id` int(10) unsigned NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_tbl`
--

INSERT INTO `sub_tbl` (`sub_id`, `faculties_id`, `teacher_id`, `semester`, `sub_name`, `note`) VALUES
(7, 'test', 'Yameen Bashir', '4', 'fdsf', 'dsfdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

DROP TABLE IF EXISTS `teacher_tbl`;
CREATE TABLE IF NOT EXISTS `teacher_tbl` (
  `teacher_id` int(10) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `degree`, `salary`, `married`, `phone`, `email`, `type`) VALUES
(1, 'Yameen', 'Bashir', 'Male', '1985-03-05', 'Lahore', 'Master', 1500, 'No', '015 871 787', 'yameen.like@gmail.com', 'teacher'),
(2, 'Atta-ur-', 'Rehman', 'Male', '1986-03-08', 'Lahore', 'Bachelor', 1500, 'Yes', '016 572 393', 'attarehman@gmail.com', 'teacher'),
(3, 'Hussain', 'Naqvi', 'Male', '1990-07-03', 'Lahore', 'Bachelor', 1000, 'Yes', '087 666 55 ', 'hussain@gmail.com', 'teacher'),
(4, 'Maria', 'Atif', 'Male', '0000-00-00', 'Lahore', 'Bachelor', 1000, 'Yes', '099 77 66 33', 'maria@gmail.com', 'teacher'),
(8, 'trett', 'terert', 'female', '2016-01-20', 'gtyrtyrty', 'FSC', 45435, 'female', '45454354353453', '', 'staff'),
(9, 'tret', 'ghgfh', 'male', '2016-01-06', 'rtetret', 'Matric', 543, 'male', '565654654656', '', 'staff'),
(10, 'qwe', 'qwe', 'male', '2016-01-13', 'gfdgfg', 'Basic', 3456, 'yes', '45345454556', '', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `things`
--

DROP TABLE IF EXISTS `things`;
CREATE TABLE IF NOT EXISTS `things` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `problemId` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ua_users`
--

DROP TABLE IF EXISTS `ua_users`;
CREATE TABLE IF NOT EXISTS `ua_users` (
  `idua_users` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `phonenumber` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ua_users`
--

INSERT INTO `ua_users` (`idua_users`, `role`, `phonenumber`, `user_id`) VALUES
(1, 0, '923121234567', 28),
(2, 1, '923121234567', 33),
(3, 0, '923121234567', 34),
(4, 1, '923121234567', 35),
(5, 1, '923123456745', 42);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(19, 'admin11', 'Mickey', 'Mouse', '13beseuhussain@seecs.edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(20, '77', 'Mickey', 'Mouse', 'ab@q', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(21, '2345', 'test', 'check', 'abc@kg.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(22, '13beseuhussain', '1234', 'asd', 'sk@q', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(23, '123456', 'dasadas', 'ewe', 'skipper.umar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(24, 'test21', 'umar', 'hussain', '13beseuhussain@edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(25, 'finaltest', 'test', 'check', 'skipper.umar@gmail.cd.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0),
(26, '14bbb123', '1234', 'Mouse', '13beseuhussain@scs.edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(27, '78945687', 'qwe', 'Mouse', '13beseuhussain@seecs.e.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(28, '654321', '1234', 'asd', 'skipper.umar@il.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(29, 'portar43', 'test', '87', 'skipper.umar@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(30, '13beseuhussain32', 'dasadas', '78979', 'qwee@dew.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(31, 'moazkhan', 'Moaz', 'Khan', '13besemmoaz@seecs.edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(32, 'safierehman', 'Safieur', 'Rehman', '13beserrehman@seecs.edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(33, 'admin112', '1234', 'Mouse', '13beseuhussain@seecsada.edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(34, '110beseuhussain', 'Mickey', 'Mouse', 'sakipper.umar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(35, 'testtest', 'Mickey', 'Mouse', 'skipper.umar@gmailfgdf.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(36, 'basit85', 'Abdul', 'Basit', 'basit85@gmail.com', '9529396a7af6dca176988db704ee247766dcc90e', 0),
(37, 'basit850', 'Abdul', 'Basit', 'basit850@gmail.com', '6027da52b0a80a8028bfe1eaf32aff5cbf8caee4', 0),
(38, 'admin1178', 'Mickey', 'Mouse', 'skipper.umar@gmailewqr.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(39, 'basittest', 'basit', 'ali', 'skipper.umar@gmaisdl.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(40, 'basittest9', 'basit', 'basit2', 'skipper.umar@gwewe.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(41, 'testwr', 'ab', 'ab', '13beseuhussain@seeecs.edu.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(42, '12345623', 'Mickey', 'asd', 'skipper.umar@gmaisdssl.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(43, 'qqqqqq', '1234', 'ewe', '13beseuhussain@seecs.edudd.pk', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_num` bigint(14) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `date_of_birth`, `gender`, `address`, `contact_num`, `image`, `role`) VALUES
(23, '1996-09-29', 'Male', 'NUST', 3330539114, '', 'student'),
(24, '2016-01-21', 'Female', 'islamabad', 3440341194, '', 'instructor'),
(25, '1995-03-08', 'Male', 'Kallar Kahar', 3330539114, 'dps/rekt.gif', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first name` varchar(15) NOT NULL,
  `last name` varchar(15) NOT NULL,
  `email id` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `username`, `first name`, `last name`, `email id`, `password`, `role`) VALUES
(101, 'ahmed19', 'Ahmed', 'Mubashar', 'ahmed_191@gmail.com', 'ahmed1234', 'student'),
(10145, '2000-01-21', 'male', '16', 'Bahria town phase 9, lahore', '2147483647', 'ahmed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

DROP TABLE IF EXISTS `users_tbl`;
CREATE TABLE IF NOT EXISTS `users_tbl` (
  `u_id` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` char(10) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `visitor_comment`
--

DROP TABLE IF EXISTS `visitor_comment`;
CREATE TABLE IF NOT EXISTS `visitor_comment` (
  `comment_id` int(11) NOT NULL,
  `visitor_name` varchar(30) NOT NULL,
  `visitor_email` varchar(30) NOT NULL,
  `visitor_subject` varchar(55) DEFAULT NULL,
  `visitor_message` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `am_users`
--
ALTER TABLE `am_users`
  ADD PRIMARY KEY (`idam_users`), ADD KEY `id_idx` (`user_id`);

--
-- Indexes for table `an_users`
--
ALTER TABLE `an_users`
  ADD PRIMARY KEY (`idan_users`), ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_android_devlopment`
--
ALTER TABLE `content_android_devlopment`
  ADD UNIQUE KEY `chapter_no` (`chapter_no`);

--
-- Indexes for table `courses_info`
--
ALTER TABLE `courses_info`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `cw_users`
--
ALTER TABLE `cw_users`
  ADD PRIMARY KEY (`id_cw_users`), ADD KEY `p_user_idx` (`user_id`);

--
-- Indexes for table `cwusers`
--
ALTER TABLE `cwusers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`), ADD KEY `donate_donorid_foreign` (`donorId`), ADD KEY `donate_problemid_foreign` (`problemId`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`), ADD KEY `donations_user_id_foreign` (`user_id`), ADD KEY `donations_school_id_foreign` (`school_id`);

--
-- Indexes for table `donor_reg`
--
ALTER TABLE `donor_reg`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `enrollment_table`
--
ALTER TABLE `enrollment_table`
  ADD PRIMARY KEY (`e`);

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
-- Indexes for table `hw_users`
--
ALTER TABLE `hw_users`
  ADD PRIMARY KEY (`id_hw_users`), ADD KEY `user_id_hw_users_idx` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_reg`
--
ALTER TABLE `member_reg`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `metirial_donation`
--
ALTER TABLE `metirial_donation`
  ADD PRIMARY KEY (`metirial_id`);

--
-- Indexes for table `metirial_donation_acceptor`
--
ALTER TABLE `metirial_donation_acceptor`
  ADD PRIMARY KEY (`metirial_id`), ADD KEY `user_first_name` (`user_first_name`,`user_last_name`,`user_email`);

--
-- Indexes for table `metirial_donation_user`
--
ALTER TABLE `metirial_donation_user`
  ADD PRIMARY KEY (`metirial_id`), ADD KEY `user_first_name` (`user_first_name`,`user_last_name`,`user_email`);

--
-- Indexes for table `mh_user_data`
--
ALTER TABLE `mh_user_data`
  ADD PRIMARY KEY (`user_first_name`,`user_last_name`,`user_email`);

--
-- Indexes for table `mh_users`
--
ALTER TABLE `mh_users`
  ADD PRIMARY KEY (`id_mh_users`), ADD KEY `userlnk_idx` (`user_id`);

--
-- Indexes for table `mm_users`
--
ALTER TABLE `mm_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mmm_users`
--
ALTER TABLE `mmm_users`
  ADD PRIMARY KEY (`id_mm_users`), ADD KEY `user_idx` (`user_id`);

--
-- Indexes for table `monetary_donation`
--
ALTER TABLE `monetary_donation`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id`), ADD KEY `money_problemid_foreign` (`problemId`);

--
-- Indexes for table `mr_users`
--
ALTER TABLE `mr_users`
  ADD PRIMARY KEY (`idmr_users`), ADD KEY `userid_idx` (`user_id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `ngo_name` (`ngo_name`);

--
-- Indexes for table `ngo_cause`
--
ALTER TABLE `ngo_cause`
  ADD PRIMARY KEY (`cause_id`), ADD KEY `User_ID_Cause_FK` (`user_id`);

--
-- Indexes for table `ngo_item`
--
ALTER TABLE `ngo_item`
  ADD PRIMARY KEY (`item_id`), ADD KEY `Cause_ID_FK` (`cause_id`);

--
-- Indexes for table `ngo_message`
--
ALTER TABLE `ngo_message`
  ADD PRIMARY KEY (`message_id`), ADD KEY `User_ID_Message_FK` (`user_id`);

--
-- Indexes for table `ngo_user`
--
ALTER TABLE `ngo_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pamphlets`
--
ALTER TABLE `pamphlets`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `problems_phone_unique` (`phone`), ADD KEY `problems_userid_foreign` (`userId`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`), ADD KEY `user_id_FK` (`user_id`);

--
-- Indexes for table `registered_modules`
--
ALTER TABLE `registered_modules`
  ADD PRIMARY KEY (`id_registered_modules`), ADD KEY `users_idx` (`user_id`);

--
-- Indexes for table `sch_communication`
--
ALTER TABLE `sch_communication`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `sch_donations`
--
ALTER TABLE `sch_donations`
  ADD PRIMARY KEY (`don_id`);

--
-- Indexes for table `sch_requests`
--
ALTER TABLE `sch_requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `sch_school`
--
ALTER TABLE `sch_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `sch_users`
--
ALTER TABLE `sch_users`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`), ADD KEY `schools_user_id_foreign` (`user_id`), ADD KEY `schools_image_id_foreign` (`image_id`);

--
-- Indexes for table `sr_users`
--
ALTER TABLE `sr_users`
  ADD PRIMARY KEY (`idsr_users`), ADD KEY `userid_idx` (`user_id`);

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
-- Indexes for table `things`
--
ALTER TABLE `things`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ua_users`
--
ALTER TABLE `ua_users`
  ADD PRIMARY KEY (`idua_users`), ADD KEY `userss_idx` (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `visitor_comment`
--
ALTER TABLE `visitor_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `am_users`
--
ALTER TABLE `am_users`
  MODIFY `idam_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `an_users`
--
ALTER TABLE `an_users`
  MODIFY `idan_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses_info`
--
ALTER TABLE `courses_info`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cw_users`
--
ALTER TABLE `cw_users`
  MODIFY `id_cw_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cwusers`
--
ALTER TABLE `cwusers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enrollment_table`
--
ALTER TABLE `enrollment_table`
  MODIFY `e` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  MODIFY `faculties_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hw_users`
--
ALTER TABLE `hw_users`
  MODIFY `id_hw_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `metirial_donation`
--
ALTER TABLE `metirial_donation`
  MODIFY `metirial_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `mh_users`
--
ALTER TABLE `mh_users`
  MODIFY `id_mh_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mm_users`
--
ALTER TABLE `mm_users`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `mmm_users`
--
ALTER TABLE `mmm_users`
  MODIFY `id_mm_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `monetary_donation`
--
ALTER TABLE `monetary_donation`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `mr_users`
--
ALTER TABLE `mr_users`
  MODIFY `idmr_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ngo_cause`
--
ALTER TABLE `ngo_cause`
  MODIFY `cause_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ngo_item`
--
ALTER TABLE `ngo_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ngo_message`
--
ALTER TABLE `ngo_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pamphlets`
--
ALTER TABLE `pamphlets`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `registered_modules`
--
ALTER TABLE `registered_modules`
  MODIFY `id_registered_modules` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `sch_communication`
--
ALTER TABLE `sch_communication`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sch_donations`
--
ALTER TABLE `sch_donations`
  MODIFY `don_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sch_requests`
--
ALTER TABLE `sch_requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sch_school`
--
ALTER TABLE `sch_school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sch_users`
--
ALTER TABLE `sch_users`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sr_users`
--
ALTER TABLE `sr_users`
  MODIFY `idsr_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  MODIFY `ss_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  MODIFY `stu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  MODIFY `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `things`
--
ALTER TABLE `things`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ua_users`
--
ALTER TABLE `ua_users`
  MODIFY `idua_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10146;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `visitor_comment`
--
ALTER TABLE `visitor_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `am_users`
--
ALTER TABLE `am_users`
ADD CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `an_users`
--
ALTER TABLE `an_users`
ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cw_users`
--
ALTER TABLE `cw_users`
ADD CONSTRAINT `p_user` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
ADD CONSTRAINT `donations_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`),
ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `mm_users` (`user_id`);

--
-- Constraints for table `hw_users`
--
ALTER TABLE `hw_users`
ADD CONSTRAINT `user_id_hw_users` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mh_users`
--
ALTER TABLE `mh_users`
ADD CONSTRAINT `userlnk` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `mmm_users`
--
ALTER TABLE `mmm_users`
ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mr_users`
--
ALTER TABLE `mr_users`
ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ngo`
--
ALTER TABLE `ngo`
ADD CONSTRAINT `User_ID_FK` FOREIGN KEY (`user_id`) REFERENCES `ngo_user` (`user_id`);

--
-- Constraints for table `ngo_cause`
--
ALTER TABLE `ngo_cause`
ADD CONSTRAINT `User_ID_Cause_FK` FOREIGN KEY (`user_id`) REFERENCES `ngo_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngo_item`
--
ALTER TABLE `ngo_item`
ADD CONSTRAINT `Cause_ID_FK` FOREIGN KEY (`cause_id`) REFERENCES `ngo_cause` (`cause_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngo_message`
--
ALTER TABLE `ngo_message`
ADD CONSTRAINT `User_ID_Message_FK` FOREIGN KEY (`user_id`) REFERENCES `ngo_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered_modules`
--
ALTER TABLE `registered_modules`
ADD CONSTRAINT `users` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
ADD CONSTRAINT `schools_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`),
ADD CONSTRAINT `schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `mm_users` (`user_id`);

--
-- Constraints for table `sr_users`
--
ALTER TABLE `sr_users`
ADD CONSTRAINT `sr_userid` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ua_users`
--
ALTER TABLE `ua_users`
ADD CONSTRAINT `userss` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
