-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 06:30 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'SuperAdmin', 'admin', 5689784592, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-07-09 11:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblassigment`
--

CREATE TABLE `tblassigment` (
  `ID` int(10) NOT NULL,
  `Tid` int(5) DEFAULT NULL,
  `Cid` int(5) DEFAULT NULL,
  `Sid` int(50) DEFAULT NULL,
  `AssignmentNumber` varchar(200) DEFAULT NULL,
  `AssignmenttTitle` varchar(200) DEFAULT NULL,
  `AssignmentDescription` mediumtext DEFAULT NULL,
  `SubmissionDate` date DEFAULT NULL,
  `AssigmentMarks` int(5) DEFAULT NULL,
  `AssignmentFile` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblassigment`
--

INSERT INTO `tblassigment` (`ID`, `Tid`, `Cid`, `Sid`, `AssignmentNumber`, `AssignmenttTitle`, `AssignmentDescription`, `SubmissionDate`, `AssigmentMarks`, `AssignmentFile`, `CreationDate`) VALUES
(1, 2, 2, 8, 'AI102-48015', 'First Aritificial Inteligence Assignment', 'There is 20 question of 20 marks if any doubt in question consults with me. Question Paper is attached', '2020-07-18', 20, '49b1034a769848f4b8163174fa05d5a61594812212.pdf', '2020-07-15 11:23:32'),
(2, 2, 2, 2, 'OS101-48440', 'Operating System Assignment', 'PFA of assignmetnt paper', '2020-10-02', 20, '8aaabcabe1a68a68d44f2a877f9176cd1595223751.pdf', '2020-09-15 16:33:17'),
(3, 1, 1, 3, 'DE101-35182', 'Assignment Digital Eletronics', 'PFA', '2020-07-21', 50, '49b1034a769848f4b8163174fa05d5a61594812361.pdf', '2020-07-15 11:26:01'),
(4, 1, 1, 1, 'Math101-81818', 'Assignment of Mathmetics', 'Solve the assignment question paper', '2020-11-01', 50, '49b1034a769848f4b8163174fa05d5a61594812420.pdf', '2020-09-15 16:33:37'),
(5, 1, 1, 1, 'Math101-56229', 'Assignment', 'PFA', '2020-07-19', 50, '2582eaed284849e828a2e7f250b02e4e1595071165.pdf', '2020-07-18 11:19:25'),
(6, 1, 1, 3, 'DE101-39140', 'Assignment', 'PFA', '2020-07-25', 50, '2582eaed284849e828a2e7f250b02e4e1595071199.pdf', '2020-07-18 11:19:59'),
(7, 1, 1, 1, 'Math101-90065', 'Assignment', 'PFA', '2020-07-26', 50, '2582eaed284849e828a2e7f250b02e4e1595071234.pdf', '2020-07-18 11:20:34'),
(8, 1, 1, 3, 'DE101-95576', 'Assignment', 'PFA', '2020-07-23', 50, '2582eaed284849e828a2e7f250b02e4e1595071262.pdf', '2020-07-18 11:21:02'),
(9, 1, 1, 3, 'DE101-45429', 'Assignment', 'PFA', '2020-09-30', 50, '2582eaed284849e828a2e7f250b02e4e1595071317.pdf', '2020-09-10 16:21:20'),
(10, 4, 1, 3, 'DE101-94149', 'This for Test Purpose', 'Do the assignment on time', '2020-10-31', 50, '069741a92a2f641eb428ba6d12ccb9af1600271732.pdf', '2020-09-16 15:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `ID` int(10) NOT NULL,
  `BranchName` char(200) DEFAULT NULL,
  `CourseName` char(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`ID`, `BranchName`, `CourseName`, `CreationDate`) VALUES
(1, 'Information Technology', 'B.Tech', '2020-07-09 18:08:52'),
(2, 'Computer Science', 'B.Tech', '2020-07-10 04:00:53'),
(3, 'Electrical Engineering', 'B.Tech', '2020-07-10 04:01:37'),
(4, 'Electronics', 'B.Tech', '2020-07-10 04:01:54'),
(5, 'PCM', 'B.Sc', '2020-07-10 04:02:15'),
(6, 'ZCB', 'B.Tech', '2020-07-10 04:02:29'),
(7, 'English', 'B.Ed', '2020-07-10 04:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `ID` int(10) NOT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`ID`, `Title`, `Description`, `CreationDate`) VALUES
(1, 'Announcement of Annual Function', 'Annual Function is held in our college if anyone wants to perform kindly give their name.', '2020-07-12 06:33:01'),
(2, 'News', 'Recently there is a tsunami in andra pradesh ', '2020-07-12 06:34:00'),
(3, 'fdsfse', 'fdsferwa', '2020-07-12 06:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblnewsbyteacher`
--

CREATE TABLE `tblnewsbyteacher` (
  `ID` int(10) NOT NULL,
  `TeacherID` int(5) NOT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnewsbyteacher`
--

INSERT INTO `tblnewsbyteacher` (`ID`, `TeacherID`, `Title`, `Description`, `CreationDate`) VALUES
(1, 1, 'Practical dates has been Declared', 'Student check the detail of their Pratical', '2020-07-16 14:34:39'),
(2, 1, 'Announcement', 'All students come on the ground tomorrow at 8 a.m', '2020-07-16 07:44:38'),
(3, 4, 'Tesrt', 'Tes purpose', '2020-09-16 15:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `ID` int(5) NOT NULL,
  `CourseID` int(5) DEFAULT NULL,
  `SubjectFullname` char(200) DEFAULT NULL,
  `SubjectShortname` char(200) DEFAULT NULL,
  `SubjectCode` varchar(6) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`ID`, `CourseID`, `SubjectFullname`, `SubjectShortname`, `SubjectCode`, `CreationDate`) VALUES
(1, 1, 'Mathematics', 'Math', 'Math101', '2020-07-10 04:45:51'),
(2, 2, 'Operating System', 'OS', 'OS101', '2020-07-10 05:27:04'),
(3, 1, 'Digital Electronics', 'DE', 'DE101', '2020-07-10 05:28:05'),
(4, 3, 'Computer Communication Network', 'CCN', 'CCN101', '2020-07-10 05:28:55'),
(5, 3, 'Management Information Systems', 'MIS', 'MIS', '2020-07-10 05:29:25'),
(6, 4, 'Introduction to Microprocessor', 'ITM', 'ITM101', '2020-07-10 05:30:18'),
(7, 3, 'Relational Database Management System', 'RDBMS', 'RDBMS101', '2020-07-10 05:31:44'),
(8, 2, 'Artificial Intelligence', 'AI', 'AI102', '2020-07-10 05:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `ID` int(10) NOT NULL,
  `EmpID` varchar(50) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Gender` varchar(200) DEFAULT NULL,
  `Dob` varchar(200) DEFAULT NULL,
  `CourseID` int(5) DEFAULT NULL,
  `Religion` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`ID`, `EmpID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Gender`, `Dob`, `CourseID`, `Religion`, `Address`, `Password`, `ProfilePic`, `JoiningDate`) VALUES
(1, 'Emp101', 'Test', 'Sample', 8956231478, 'kaushal@gmail.com', 'Male', '1984-01-06', 1, 'Hindu', 'J-125, Mohan Road Jakirpur Merrut', '202cb962ac59075b964b07152d234b70', '779b7513263ef185b6d094af290ef5401595083511.png', '2020-07-21 05:18:00'),
(2, 'Emp102', 'Sarita', 'Pandey', 4564877987, 'sar@gmail.com', 'Female', '1990-01-09', 2, 'Hindu', 'K-980', '202cb962ac59075b964b07152d234b70', 'e76de47f621d84adbab3266e3239baee1594385101.png', '2020-07-13 05:22:14'),
(3, 'Emp103', 'Test', 'Sample', 6544654654, 'test@gmail.com', 'Male', '1990-07-05', 3, 'Hindu', 'B-234 Nehru Nagar New Delhi', '202cb962ac59075b964b07152d234b70', '779b7513263ef185b6d094af290ef5401595247971.png', '2020-07-20 12:26:11'),
(4, 'EMP12345', 'Anuj', 'Kumar', 1234567890, 'ak@gmail.com', 'Male', '2019-04-02', 1, 'Indian', 'New Delhi India 110101', 'f925916e2754e5e03f75dd58a5733251', 'bf17934885c638c1c32d491cc6dbaad61600271426.png', '2020-09-16 15:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbluploadass`
--

CREATE TABLE `tbluploadass` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `AssId` int(5) DEFAULT NULL,
  `AssDes` mediumtext DEFAULT NULL,
  `AnswerFile` varchar(200) NOT NULL,
  `SubmitDate` timestamp NULL DEFAULT current_timestamp(),
  `Marks` decimal(10,2) DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluploadass`
--

INSERT INTO `tbluploadass` (`ID`, `UserID`, `AssId`, `AssDes`, `AnswerFile`, `SubmitDate`, `Marks`, `Remarks`, `UpdationDate`) VALUES
(1, 1, 3, 'Please the attachment of answer sheet', '49b1034a769848f4b8163174fa05d5a61594812931.pdf', '2020-07-15 11:35:31', '45.00', 'Good', '2020-07-16 07:17:48'),
(2, 1, 4, 'Sample Text', '49b1034a769848f4b8163174fa05d5a61594817244.pdf', '2020-07-15 12:47:24', NULL, NULL, NULL),
(3, 2, 1, 'PFA', '49b1034a769848f4b8163174fa05d5a61594817292.pdf', '2020-07-15 12:48:12', '10.00', 'gdfgdf', '2020-07-15 18:02:54'),
(4, 4, 1, 'PFA', '49b1034a769848f4b8163174fa05d5a61594817353.pdf', '2020-07-15 12:49:13', NULL, NULL, NULL),
(5, 1, 7, 'PFA', '2582eaed284849e828a2e7f250b02e4e1595074317.pdf', '2020-07-18 12:11:57', NULL, NULL, NULL),
(6, 5, 9, 'This for Testing purpose', '2c86e2aa7eb4cb4db70379e28fab9b521599755007.pdf', '2020-09-10 16:23:27', NULL, NULL, NULL),
(7, 6, 10, 'Assignment Complete', '2c86e2aa7eb4cb4db70379e28fab9b521600271784.pdf', '2020-09-16 15:56:24', '46.00', 'Very Good', '2020-09-16 15:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Cid` int(5) DEFAULT NULL,
  `RollNumber` int(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Cid`, `RollNumber`, `Password`, `RegDate`) VALUES
(1, 'Test S', 7245649787, 'tests@gmail.com', 1, 1234, '202cb962ac59075b964b07152d234b70', '2020-07-21 05:54:13'),
(2, 'Megna', 4654987987, 'megna@gmail.com', 2, 124, '202cb962ac59075b964b07152d234b70', '2020-07-13 14:54:55'),
(3, 'Rajeev Aggarwal', 9874659798, 'raj@gmail.com', 4, 1235, '202cb962ac59075b964b07152d234b70', '2020-07-13 14:58:28'),
(4, 'Pankaj', 1234567891, 'pan@gmail.com', 2, 12346, '202cb962ac59075b964b07152d234b70', '2020-07-14 04:54:46'),
(5, 'Anuj kumar', 1234567980, 'anujk@gmail.com', 1, 10806121, 'f925916e2754e5e03f75dd58a5733251', '2020-09-10 15:26:26'),
(6, 'Test User', 1258746321, 'test@gmail.com', 1, 123456, 'f925916e2754e5e03f75dd58a5733251', '2020-09-16 15:54:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblassigment`
--
ALTER TABLE `tblassigment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnewsbyteacher`
--
ALTER TABLE `tblnewsbyteacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluploadass`
--
ALTER TABLE `tbluploadass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblassigment`
--
ALTER TABLE `tblassigment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblnewsbyteacher`
--
ALTER TABLE `tblnewsbyteacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluploadass`
--
ALTER TABLE `tbluploadass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
