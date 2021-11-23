-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2021 at 05:40 AM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RENAD_ACADEMY`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `AdminUsername` varchar(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`AdminUsername`, `First_name`, `Last_name`, `Password`, `Role`) VALUES
('Joseph_Norton', 'Joseph', 'Norton', 'L7B+^psa+4m?gdQq', 'Curriculum Coordinator'),
('Matthew_Campion', 'Matthew', 'Campion', '*UCXt_sDU6-$8^?$', 'Principal'),
('Sherri_Miller', 'Sherri', 'Miller', '3!jP49', 'Director');

-- --------------------------------------------------------

--
-- Table structure for table `GRADE`
--

CREATE TABLE `GRADE` (
  `GradeLevel` int(11) NOT NULL,
  `GradeSection` varchar(200) NOT NULL,
  `Number_of_Students` varchar(200) NOT NULL,
  `Grade_head` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GRADE`
--

INSERT INTO `GRADE` (`GradeLevel`, `GradeSection`, `Number_of_Students`, `Grade_head`) VALUES
(1, 'A', '8', NULL),
(1, 'B', '8', NULL),
(1, 'C', '8', NULL),
(2, 'A', '6', NULL),
(2, 'B', '10', NULL),
(3, 'A', '8', NULL),
(3, 'B', '6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `GRADE_HEAD`
--

CREATE TABLE `GRADE_HEAD` (
  `Teacher_username` varchar(200) NOT NULL,
  `Grade_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GRADE_HEAD`
--

INSERT INTO `GRADE_HEAD` (`Teacher_username`, `Grade_level`) VALUES
('Donna_Turner', 1),
('Lila_Bowler', 2),
('Saba_Short', 3);

-- --------------------------------------------------------

--
-- Table structure for table `IMAGES`
--

CREATE TABLE `IMAGES` (
  `ID` int(11) NOT NULL,
  `image_directory` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_subtext` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IMAGES`
--

INSERT INTO `IMAGES` (`ID`, `image_directory`, `image_name`, `image_subtext`) VALUES
(33, 'schedule_uploads/IMG-618bc7e24fe464.70555617.png', 'IMG-618bc7e24fe464.70555617.png', 'Arabic'),
(34, 'schedule_uploads/IMG-618bc7ebdf0c31.88682136.png', 'IMG-618bc7ebdf0c31.88682136.png', 'Art'),
(35, 'schedule_uploads/IMG-618bc7fb2bfdd0.76892697.png', 'IMG-618bc7fb2bfdd0.76892697.png', 'Break time'),
(36, 'schedule_uploads/IMG-618bc811776e84.19185276.png', 'IMG-618bc811776e84.19185276.png', 'Circle time'),
(37, 'schedule_uploads/IMG-618bc81d2fafb9.66034569.jpeg', 'IMG-618bc81d2fafb9.66034569.jpeg', 'English'),
(38, 'schedule_uploads/IMG-618bc828ee2fb5.20013076.png', 'IMG-618bc828ee2fb5.20013076.png', 'Math'),
(39, 'schedule_uploads/IMG-618bc832ea19c5.60817015.png', 'IMG-618bc832ea19c5.60817015.png', 'Science'),
(40, 'schedule_uploads/IMG-61917431bee8e3.83478523.png', 'IMG-61917431bee8e3.83478523.png', 'music'),
(41, 'schedule_uploads/IMG-619618c57dc9e4.38630447.png', 'IMG-619618c57dc9e4.38630447.png', 'P.E'),
(42, 'schedule_uploads/IMG-61961d99e1e4c2.53981196.png', 'IMG-61961d99e1e4c2.53981196.png', ''),
(43, 'schedule_uploads/IMG-61961e0656c3f7.12302680.png', 'IMG-61961e0656c3f7.12302680.png', 'Pic '),
(44, 'schedule_uploads/IMG-619620343c0c57.09406080.png', 'IMG-619620343c0c57.09406080.png', 'lunch '),
(45, 'schedule_uploads/IMG-61962035ee2222.32322036.png', 'IMG-61962035ee2222.32322036.png', ''),
(46, 'schedule_uploads/IMG-619620500c4911.39284665.png', 'IMG-619620500c4911.39284665.png', 'Circle '),
(47, 'schedule_uploads/IMG-61962089e26d36.82421117.jpg', 'IMG-61962089e26d36.82421117.jpg', 'Science'),
(48, 'schedule_uploads/IMG-619622e2ef0521.13250463.png', 'IMG-619622e2ef0521.13250463.png', 'arabic'),
(49, 'schedule_uploads/IMG-619622ebca1ec6.27526889.png', 'IMG-619622ebca1ec6.27526889.png', 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `SCHEDULE`
--

CREATE TABLE `SCHEDULE` (
  `ID` int(11) NOT NULL,
  `Schedule_name` varchar(255) DEFAULT NULL,
  `Created_by` varchar(200) NOT NULL,
  `show_text` tinyint(1) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `class1` int(11) NOT NULL,
  `class_duration1` int(11) DEFAULT NULL,
  `class2` int(11) DEFAULT NULL,
  `class_duration2` int(11) DEFAULT NULL,
  `class3` int(11) DEFAULT NULL,
  `class_duration3` int(11) DEFAULT NULL,
  `class4` int(11) DEFAULT NULL,
  `class_duration4` int(11) DEFAULT NULL,
  `class5` int(11) DEFAULT NULL,
  `class_duration5` int(11) DEFAULT NULL,
  `class6` int(11) DEFAULT NULL,
  `class_duration6` int(11) DEFAULT NULL,
  `class7` int(11) DEFAULT NULL,
  `class_duration7` int(11) DEFAULT NULL,
  `class8` int(11) DEFAULT NULL,
  `class_duration8` int(11) DEFAULT NULL,
  `class9` int(11) DEFAULT NULL,
  `class_duration9` int(11) DEFAULT NULL,
  `class10` int(11) DEFAULT NULL,
  `class_duration10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SCHEDULE`
--

INSERT INTO `SCHEDULE` (`ID`, `Schedule_name`, `Created_by`, `show_text`, `start_time`, `end_time`, `class1`, `class_duration1`, `class2`, `class_duration2`, `class3`, `class_duration3`, `class4`, `class_duration4`, `class5`, `class_duration5`, `class6`, `class_duration6`, `class7`, `class_duration7`, `class8`, `class_duration8`, `class9`, `class_duration9`, `class10`, `class_duration10`) VALUES
(65, 'Sunady November 4th', 'Saba_Short', 0, '21:04:00', '22:04:00', 36, NULL, 34, NULL, 37, NULL, 35, NULL, 38, NULL, 33, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Monday November 5th', 'Saba_Short', 1, '07:30:00', '13:45:00', 36, NULL, 36, NULL, 33, NULL, 37, NULL, 35, NULL, 34, NULL, 39, NULL, 38, NULL, NULL, NULL, NULL, NULL),
(77, 'Tuesday November 6th', 'Saba_Short', 1, '18:13:00', '22:10:00', 36, NULL, 34, NULL, 35, NULL, 37, NULL, 38, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Ahmed Khalid', 'Saba_Short', 1, '07:35:00', '12:11:00', 36, NULL, 34, NULL, 37, NULL, 35, NULL, 38, NULL, 33, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Monday November 1st', 'Saba_Short', 0, '05:00:00', '13:45:00', 34, 20, 36, 40, 36, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Tuesday November 2nd', 'Saba_Short', 1, '07:52:00', '15:52:00', 33, NULL, 34, NULL, 35, NULL, 36, NULL, 37, NULL, 40, NULL, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '15/11/2021', 'Saba_Short', 0, '07:30:00', '13:45:00', 35, NULL, 37, NULL, 38, NULL, 37, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'tmp', 'Saba_Short', 0, '12:22:00', '00:33:00', 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '18/11/2021', 'Saba_Short', 1, '07:00:00', '12:00:00', 36, NULL, 33, NULL, 38, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '', 'Nial_Forster', 0, '07:30:00', '10:30:00', 46, NULL, 44, NULL, 43, NULL, 46, NULL, 44, NULL, 43, NULL, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, '', 'Reem_Othman', 0, '07:00:00', '12:00:00', 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '', 'Saba_Short', 1, '07:30:00', '10:30:00', 36, NULL, 37, NULL, 35, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '18/11/2021', 'Saba_Short', 1, '07:00:00', '12:00:00', 36, NULL, 34, NULL, 33, NULL, 38, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, '18/11/2021', 'Saba_Short', 1, '07:00:00', '12:00:00', 36, NULL, 34, NULL, 33, NULL, 38, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '15/11/2021', 'Saba_Short', 1, '15:49:00', '16:49:00', 33, NULL, 39, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '15/11/2021', 'Saba_Short', 1, '15:49:00', '16:49:00', 33, NULL, 39, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'test', 'Saba_Short', 1, '07:00:00', '12:00:00', 35, NULL, 40, NULL, 40, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '15/11/2021', 'Saba_Short', 1, '15:49:00', '16:49:00', 33, NULL, 39, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Test2', 'Saba_Short', 1, '07:00:00', '12:00:00', 39, NULL, 39, NULL, 39, NULL, 39, NULL, 39, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '123', 'Saba_Short', 1, '07:00:00', '07:30:00', 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'test', 'Saba_Short', 1, '13:00:00', '14:00:00', 41, 11, 41, 12, 41, 13, 41, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'test', 'Saba_Short', 1, '13:00:00', '14:00:00', 41, 11, 41, 12, 41, 13, 41, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'test', 'Saba_Short', 1, '13:00:00', '14:00:00', 41, 11, 41, 12, 41, 13, 41, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'test', 'Saba_Short', 1, '13:00:00', '14:00:00', 41, 11, 41, 12, 41, 13, 41, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'test', 'Saba_Short', 1, '13:00:00', '14:00:00', 41, 11, 41, 12, 41, 13, 41, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'test2', 'Saba_Short', 1, '07:00:00', '13:00:00', 39, 1, 39, 2, 39, 3, 39, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'test2', 'Saba_Short', 1, '07:00:00', '13:00:00', 39, 1, 39, 2, 39, 3, 39, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'test3', 'Saba_Short', 1, '14:00:00', '14:00:00', 39, 1, 39, 2, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'test3', 'Saba_Short', 1, '14:00:00', '14:00:00', 39, 1, 39, 2, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'test3', 'Saba_Short', 1, '14:00:00', '14:00:00', 39, 1, 39, 2, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'test3', 'Saba_Short', 1, '14:00:00', '14:00:00', 39, 1, 39, 2, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'test3', 'Saba_Short', 1, '14:00:00', '14:00:00', 39, 1, 39, 2, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT`
--

CREATE TABLE `STUDENT` (
  `RFID` int(11) NOT NULL,
  `First_Name` varchar(200) NOT NULL,
  `Last_name` varchar(200) NOT NULL,
  `AdminUsername` varchar(200) DEFAULT NULL,
  `TeacherUsername` varchar(200) DEFAULT NULL,
  `GradeLevel` int(11) DEFAULT NULL,
  `GradeSection` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STUDENT`
--

INSERT INTO `STUDENT` (`RFID`, `First_Name`, `Last_name`, `AdminUsername`, `TeacherUsername`, `GradeLevel`, `GradeSection`) VALUES
(2350, 'Mohamed', 'Al Suwaidi', 'Sherri_Miller', 'Saba_Short', 3, 'B'),
(8736, 'Sara', 'Almannai', 'Joseph_Norton', 'Lila_Bowler', 1, 'b'),
(12345, 'Sara', 'Saad', 'Joseph_Norton', 'Nadeem_Whittington', 1, 'b'),
(35479, 'AlNada', 'Alemadi', 'Joseph_Norton', 'Reem_Othman', 1, 'B'),
(35745, 'Ahmed', 'Mohammed', 'Sherri_Miller', 'Saba_Short', 3, 'B'),
(37519, 'Mohammed', 'Faisal', 'Sherri_Miller', 'Nial_Forster', 1, 'A'),
(75262, 'Hamad', 'Nasser', 'Matthew_Campion', 'Lila_Bowler', 2, 'B'),
(87653, 'Mariam', 'Ahmed', 'Matthew_Campion', 'Saba_Short', 3, 'B'),
(93736, 'Reem', 'Ahmed', 'Joseph_Norton', 'Saba_Short', 3, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT_SCHEDULE`
--

CREATE TABLE `STUDENT_SCHEDULE` (
  `Schedule_id` int(11) NOT NULL,
  `Student_RFID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STUDENT_SCHEDULE`
--

INSERT INTO `STUDENT_SCHEDULE` (`Schedule_id`, `Student_RFID`, `active`) VALUES
(65, 35745, 0),
(77, 35745, 0),
(77, 87653, 1),
(77, 93736, 0),
(81, 35745, 0),
(82, 35745, 1),
(82, 93736, 0),
(83, 35745, 0),
(84, 35745, 0),
(85, 35745, 0),
(91, 35745, 0),
(94, 35745, 0),
(95, 35745, 0),
(96, 35745, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER`
--

CREATE TABLE `TEACHER` (
  `TeacherUsername` varchar(200) NOT NULL,
  `First_name` varchar(200) NOT NULL,
  `Last_name` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `AdminUsername` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TEACHER`
--

INSERT INTO `TEACHER` (`TeacherUsername`, `First_name`, `Last_name`, `Password`, `Department`, `AdminUsername`) VALUES
('Donna_Turner', 'Donna', 'Turner', 'Turner34%4', 'Art', 'Sherri_Miller'),
('Lila_Bowler', 'Lila', 'Bowler', '34%4Bowler', 'Science', 'Matthew_Campion'),
('Nadeem_Whittington', 'Nadeem', 'Whittington', 'Whittington6574839', 'English', 'Joseph_Norton'),
('Nial_Forster', 'Nial', 'Forster', 'NialF46&54', 'Art', 'Sherri_Miller'),
('Reem_Othman', 'Reem', 'Othman', 'Reem23&54', 'Math', 'Matthew_Campion'),
('RenadAcademy', 'susan', 'brown', 'RahafSaraMahaAlnada', 'Art', 'Sherri_Miller'),
('Saba_Short', 'Saba', 'Short', 'Saba_ShortSaba_Short', 'Computer', 'Sherri_Miller'),
('Tasnim_Neal', 'Tasnim', 'Neal', 'NealScience', 'Science', 'Matthew_Campion');

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER_CLASS_IMAGES`
--

CREATE TABLE `TEACHER_CLASS_IMAGES` (
  `TeacherUsername` varchar(200) NOT NULL,
  `Subject_name` varchar(255) NOT NULL,
  `Image_id` int(11) DEFAULT NULL,
  `Hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TEACHER_CLASS_IMAGES`
--

INSERT INTO `TEACHER_CLASS_IMAGES` (`TeacherUsername`, `Subject_name`, `Image_id`, `Hide`) VALUES
('Lila_Bowler', 'arabic', 48, 0),
('Lila_Bowler', 'Art', 49, 0),
('Nial_Forster', '', 42, 0),
('Nial_Forster', 'Circle ', 46, 0),
('Nial_Forster', 'lunch ', 44, 0),
('Nial_Forster', 'Pic ', 43, 0),
('Reem_Othman', '', 45, 0),
('Reem_Othman', 'Science', 47, 0),
('Saba_Short', 'Arabic', 33, 0),
('Saba_Short', 'Art', 34, 0),
('Saba_Short', 'Break time', 35, 0),
('Saba_Short', 'Circle time', 36, 0),
('Saba_Short', 'English', 37, 0),
('Saba_Short', 'Math', 38, 0),
('Saba_Short', 'music', 40, 1),
('Saba_Short', 'P.E', 41, 0),
('Saba_Short', 'Science', 39, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER_GRADE`
--

CREATE TABLE `TEACHER_GRADE` (
  `GradeLevel` int(11) NOT NULL,
  `TeacherUsername` varchar(200) NOT NULL,
  `GradeSection` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TEACHER_GRADE`
--

INSERT INTO `TEACHER_GRADE` (`GradeLevel`, `TeacherUsername`, `GradeSection`) VALUES
(1, 'Donna_Turner', 'B'),
(1, 'Nial_Forster', 'A'),
(1, 'Reem_Othman', 'C'),
(2, 'Lila_Bowler', 'B'),
(3, 'Saba_Short', 'B'),
(3, 'Tasnim_Neal', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`AdminUsername`);

--
-- Indexes for table `GRADE`
--
ALTER TABLE `GRADE`
  ADD PRIMARY KEY (`GradeLevel`,`GradeSection`),
  ADD KEY `Grade_head` (`Grade_head`);

--
-- Indexes for table `GRADE_HEAD`
--
ALTER TABLE `GRADE_HEAD`
  ADD PRIMARY KEY (`Teacher_username`,`Grade_level`),
  ADD KEY `Grade_level` (`Grade_level`);

--
-- Indexes for table `IMAGES`
--
ALTER TABLE `IMAGES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SCHEDULE`
--
ALTER TABLE `SCHEDULE`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `class1` (`class1`),
  ADD KEY `class2` (`class2`),
  ADD KEY `class3` (`class3`),
  ADD KEY `class4` (`class4`),
  ADD KEY `class5` (`class5`),
  ADD KEY `class6` (`class6`),
  ADD KEY `class7` (`class7`),
  ADD KEY `class8` (`class8`),
  ADD KEY `class9` (`class9`),
  ADD KEY `class10` (`class10`),
  ADD KEY `Created_by` (`Created_by`);

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`RFID`),
  ADD KEY `TeacherUsername` (`TeacherUsername`),
  ADD KEY `GradeLevel` (`GradeLevel`),
  ADD KEY `AdminUsername` (`AdminUsername`);

--
-- Indexes for table `STUDENT_SCHEDULE`
--
ALTER TABLE `STUDENT_SCHEDULE`
  ADD PRIMARY KEY (`Schedule_id`,`Student_RFID`),
  ADD KEY `Student_RFID` (`Student_RFID`);

--
-- Indexes for table `TEACHER`
--
ALTER TABLE `TEACHER`
  ADD PRIMARY KEY (`TeacherUsername`),
  ADD KEY `AdminUsername` (`AdminUsername`);

--
-- Indexes for table `TEACHER_CLASS_IMAGES`
--
ALTER TABLE `TEACHER_CLASS_IMAGES`
  ADD PRIMARY KEY (`TeacherUsername`,`Subject_name`),
  ADD KEY `Image_id` (`Image_id`);

--
-- Indexes for table `TEACHER_GRADE`
--
ALTER TABLE `TEACHER_GRADE`
  ADD PRIMARY KEY (`TeacherUsername`,`GradeLevel`,`GradeSection`),
  ADD KEY `GradeLevel` (`GradeLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `IMAGES`
--
ALTER TABLE `IMAGES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `SCHEDULE`
--
ALTER TABLE `SCHEDULE`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GRADE`
--
ALTER TABLE `GRADE`
  ADD CONSTRAINT `GRADE_ibfk_1` FOREIGN KEY (`Grade_head`) REFERENCES `TEACHER` (`TeacherUsername`);

--
-- Constraints for table `GRADE_HEAD`
--
ALTER TABLE `GRADE_HEAD`
  ADD CONSTRAINT `GRADE_HEAD_ibfk_1` FOREIGN KEY (`Teacher_username`) REFERENCES `TEACHER` (`TeacherUsername`),
  ADD CONSTRAINT `GRADE_HEAD_ibfk_2` FOREIGN KEY (`Grade_level`) REFERENCES `GRADE` (`GradeLevel`);

--
-- Constraints for table `SCHEDULE`
--
ALTER TABLE `SCHEDULE`
  ADD CONSTRAINT `SCHEDULE_ibfk_1` FOREIGN KEY (`class1`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_10` FOREIGN KEY (`class10`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_16` FOREIGN KEY (`Created_by`) REFERENCES `TEACHER` (`TeacherUsername`),
  ADD CONSTRAINT `SCHEDULE_ibfk_2` FOREIGN KEY (`class2`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_3` FOREIGN KEY (`class3`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_4` FOREIGN KEY (`class4`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_5` FOREIGN KEY (`class5`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_6` FOREIGN KEY (`class6`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_7` FOREIGN KEY (`class7`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_8` FOREIGN KEY (`class8`) REFERENCES `IMAGES` (`ID`),
  ADD CONSTRAINT `SCHEDULE_ibfk_9` FOREIGN KEY (`class9`) REFERENCES `IMAGES` (`ID`);

--
-- Constraints for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD CONSTRAINT `STUDENT_ibfk_1` FOREIGN KEY (`TeacherUsername`) REFERENCES `TEACHER` (`TeacherUsername`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `STUDENT_ibfk_2` FOREIGN KEY (`GradeLevel`) REFERENCES `GRADE` (`GradeLevel`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `STUDENT_ibfk_3` FOREIGN KEY (`AdminUsername`) REFERENCES `ADMIN` (`AdminUsername`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `STUDENT_SCHEDULE`
--
ALTER TABLE `STUDENT_SCHEDULE`
  ADD CONSTRAINT `STUDENT_SCHEDULE_ibfk_1` FOREIGN KEY (`Schedule_id`) REFERENCES `SCHEDULE` (`ID`),
  ADD CONSTRAINT `STUDENT_SCHEDULE_ibfk_2` FOREIGN KEY (`Student_RFID`) REFERENCES `STUDENT` (`RFID`);

--
-- Constraints for table `TEACHER`
--
ALTER TABLE `TEACHER`
  ADD CONSTRAINT `TEACHER_ibfk_1` FOREIGN KEY (`AdminUsername`) REFERENCES `ADMIN` (`AdminUsername`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `TEACHER_CLASS_IMAGES`
--
ALTER TABLE `TEACHER_CLASS_IMAGES`
  ADD CONSTRAINT `TEACHER_CLASS_IMAGES_ibfk_1` FOREIGN KEY (`TeacherUsername`) REFERENCES `TEACHER` (`TeacherUsername`),
  ADD CONSTRAINT `TEACHER_CLASS_IMAGES_ibfk_2` FOREIGN KEY (`Image_id`) REFERENCES `IMAGES` (`ID`);

--
-- Constraints for table `TEACHER_GRADE`
--
ALTER TABLE `TEACHER_GRADE`
  ADD CONSTRAINT `TEACHER_GRADE_ibfk_1` FOREIGN KEY (`TeacherUsername`) REFERENCES `TEACHER` (`TeacherUsername`) ON UPDATE CASCADE,
  ADD CONSTRAINT `TEACHER_GRADE_ibfk_2` FOREIGN KEY (`GradeLevel`) REFERENCES `GRADE` (`GradeLevel`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
