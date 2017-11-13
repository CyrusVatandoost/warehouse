-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2017 at 08:45 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehousedb`
--
IF EXISTS(SELECT name FROM sys.databases
  WHERE name = 'warehousedb')
  DROP DATABASE 'warehousedb';

CREATE DATABASE 'warehousedb';
USE 'warehousedb';

-- --------------------------------------------------------

--
-- Table structure for table `AccessList`
--

CREATE TABLE `AccessList` (
  `UserID` int(8) UNSIGNED NOT NULL,
  `FileID` int(8) UNSIGNED NOT NULL,
  `AccessID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AccessRequest`
--

CREATE TABLE `AccessRequest` (
  `AccessRequestID` int(8) UNSIGNED NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL,
  `AccessTypeID` int(8) UNSIGNED NOT NULL,
  `ProjectID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AccessType`
--

CREATE TABLE `AccessType` (
  `AccessTypeID` int(8) UNSIGNED NOT NULL,
  `AccessTypeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `File`
--

CREATE TABLE `File` (
  `FileID` int(8) UNSIGNED NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `ProjectID` int(8) UNSIGNED NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LoginAttempt`
--

CREATE TABLE `LoginAttempt` (
  `LoginAttemptID` int(8) UNSIGNED NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL,
  `ip_address` varchar(320) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `MemberID` int(8) UNSIGNED NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL,
  `MemberPosition` enum('Regular','Administrator') NOT NULL,
  `MemberStatusID` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `MessageID` int(8) UNSIGNED NOT NULL,
  `MessageSubject` varchar(50) NOT NULL,
  `MessageContent` varchar(500) NOT NULL,
  `FromUserID` int(8) UNSIGNED NOT NULL,
  `ToUserID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `PostID` int(8) UNSIGNED NOT NULL,
  `PostSubject` varchar(50) NOT NULL,
  `PostMessage` varchar(500) NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `ProjectID` int(8) UNSIGNED NOT NULL,
  `ProjectName` varchar(320) NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL,
  `GuestVisibility` tinyint(1) NOT NULL,
  `ProjectStatus` enum('In Progress','Complete','Incomplete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(8) UNSIGNED NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(35) NOT NULL,
  `MiddleInitial` varchar(2) NOT NULL,
  `LastName` varchar(35) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `UserTypeID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `UserTypeID` int(8) UNSIGNED NOT NULL,
  `UserTypeName` enum('Guest','TE3D Member','Project Author','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AccessList`
--
ALTER TABLE `AccessList`
  ADD PRIMARY KEY (`AccessID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FileID` (`FileID`);

--
-- Indexes for table `AccessRequest`
--
ALTER TABLE `AccessRequest`
  ADD PRIMARY KEY (`AccessRequestID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AccessTypeID` (`AccessTypeID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `AccessType`
--
ALTER TABLE `AccessType`
  ADD PRIMARY KEY (`AccessTypeID`);

--
-- Indexes for table `File`
--
ALTER TABLE `File`
  ADD PRIMARY KEY (`FileID`),
  ADD KEY `ProjectID` (`ProjectID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `LoginAttempt`
--
ALTER TABLE `LoginAttempt`
  ADD PRIMARY KEY (`LoginAttemptID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `FromUserID` (`FromUserID`),
  ADD KEY `ToUserID` (`ToUserID`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserTypeID` (`UserTypeID`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccessList`
--
ALTER TABLE `AccessList`
  MODIFY `AccessID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccessRequest`
--
ALTER TABLE `AccessRequest`
  MODIFY `AccessRequestID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AccessType`
--
ALTER TABLE `AccessType`
  MODIFY `AccessTypeID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `File`
--
ALTER TABLE `File`
  MODIFY `FileID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LoginAttempt`
--
ALTER TABLE `LoginAttempt`
  MODIFY `LoginAttemptID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Member`
--
ALTER TABLE `Member`
  MODIFY `MemberID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `MessageID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `PostID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `ProjectID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `UserType`
--
ALTER TABLE `UserType`
  MODIFY `UserTypeID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AccessList`
--
ALTER TABLE `AccessList`
  ADD CONSTRAINT `accesslist_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `accesslist_ibfk_2` FOREIGN KEY (`FileID`) REFERENCES `File` (`FileID`);

--
-- Constraints for table `AccessRequest`
--
ALTER TABLE `AccessRequest`
  ADD CONSTRAINT `accessrequest_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `accessrequest_ibfk_2` FOREIGN KEY (`AccessTypeID`) REFERENCES `AccessType` (`AccessTypeID`),
  ADD CONSTRAINT `accessrequest_ibfk_3` FOREIGN KEY (`ProjectID`) REFERENCES `Project` (`ProjectID`);

--
-- Constraints for table `File`
--
ALTER TABLE `File`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `Project` (`ProjectID`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `LoginAttempt`
--
ALTER TABLE `LoginAttempt`
  ADD CONSTRAINT `loginattempt_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Member`
--
ALTER TABLE `Member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`FromUserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`ToUserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `UserType`
--
ALTER TABLE `UserType`
  ADD CONSTRAINT `usertype_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `User` (`UserTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
