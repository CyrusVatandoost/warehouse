-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 06:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehousedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslist`
--

CREATE TABLE `accesslist` (
  `UserID` int(8) UNSIGNED NOT NULL,
  `FileID` int(8) UNSIGNED NOT NULL,
  `AccessID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accessrequest`
--

CREATE TABLE `accessrequest` (
  `AccessRequestID` int(8) UNSIGNED NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL,
  `AccessTypeID` int(8) UNSIGNED NOT NULL,
  `ProjectID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accesstype`
--

CREATE TABLE `accesstype` (
  `AccessTypeID` int(8) UNSIGNED NOT NULL,
  `AccessTypeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `FileID` int(8) UNSIGNED NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `ProjectID` int(8) UNSIGNED NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempt`
--

CREATE TABLE `loginattempt` (
  `login_attempt_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `ip_address` varchar(320) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageID` int(8) UNSIGNED NOT NULL,
  `MessageSubject` varchar(50) NOT NULL,
  `MessageContent` varchar(500) NOT NULL,
  `FromUserID` int(8) UNSIGNED NOT NULL,
  `ToUserID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` int(8) UNSIGNED NOT NULL,
  `PostSubject` varchar(50) NOT NULL,
  `PostMessage` varchar(500) NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(8) UNSIGNED NOT NULL,
  `ProjectName` varchar(320) NOT NULL,
  `UserID` int(8) UNSIGNED NOT NULL,
  `GuestVisibility` tinyint(1) NOT NULL,
  `ProjectStatus` enum('In Progress','Complete','Incomplete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `user_type_id` int(8) UNSIGNED NOT NULL,
  `user_position` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(8) UNSIGNED NOT NULL,
  `UserTypeName` enum('Guest','TE3D Member','Project Author','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslist`
--
ALTER TABLE `accesslist`
  ADD PRIMARY KEY (`AccessID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FileID` (`FileID`);

--
-- Indexes for table `accessrequest`
--
ALTER TABLE `accessrequest`
  ADD PRIMARY KEY (`AccessRequestID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AccessTypeID` (`AccessTypeID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `accesstype`
--
ALTER TABLE `accesstype`
  ADD PRIMARY KEY (`AccessTypeID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`FileID`),
  ADD KEY `ProjectID` (`ProjectID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `loginattempt`
--
ALTER TABLE `loginattempt`
  ADD PRIMARY KEY (`login_attempt_id`),
  ADD KEY `UserID` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `FromUserID` (`FromUserID`),
  ADD KEY `ToUserID` (`ToUserID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `UserTypeID` (`user_type_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslist`
--
ALTER TABLE `accesslist`
  MODIFY `AccessID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accessrequest`
--
ALTER TABLE `accessrequest`
  MODIFY `AccessRequestID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accesstype`
--
ALTER TABLE `accesstype`
  MODIFY `AccessTypeID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `FileID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loginattempt`
--
ALTER TABLE `loginattempt`
  MODIFY `login_attempt_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslist`
--
ALTER TABLE `accesslist`
  ADD CONSTRAINT `accesslist_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `accesslist_ibfk_2` FOREIGN KEY (`FileID`) REFERENCES `file` (`FileID`);

--
-- Constraints for table `accessrequest`
--
ALTER TABLE `accessrequest`
  ADD CONSTRAINT `accessrequest_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `accessrequest_ibfk_2` FOREIGN KEY (`AccessTypeID`) REFERENCES `accesstype` (`AccessTypeID`),
  ADD CONSTRAINT `accessrequest_ibfk_3` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ProjectID`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `loginattempt`
--
ALTER TABLE `loginattempt`
  ADD CONSTRAINT `loginattempt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`FromUserID`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`ToUserID`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `usertype_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `user` (`user_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
