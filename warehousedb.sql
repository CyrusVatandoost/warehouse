-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2017 at 03:43 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `Deletes`
--

CREATE TABLE `Deletes` (
  `delete_id` int(8) UNSIGNED NOT NULL,
  `log_id` int(8) UNSIGNED NOT NULL,
  `made_permanent_by` int(8) UNSIGNED NOT NULL,
  `made_permanent_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `File`
--

CREATE TABLE `File` (
  `file_id` int(8) UNSIGNED NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file` varchar(500) NOT NULL,
  `project_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GuestPass`
--

CREATE TABLE `GuestPass` (
  `pass_id` int(8) UNSIGNED NOT NULL,
  `email` varchar(320) NOT NULL,
  `date_issued` datetime NOT NULL,
  `date_used` datetime DEFAULT NULL,
  `pass_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GuestPassFiles`
--

CREATE TABLE `GuestPassFiles` (
  `pass_id` int(8) UNSIGNED NOT NULL,
  `file_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LoginAttempt`
--

CREATE TABLE `LoginAttempt` (
  `login_attempt_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `ip_address` varchar(320) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Logs`
--

CREATE TABLE `Logs` (
  `log_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED DEFAULT NULL,
  `project_id` int(8) UNSIGNED DEFAULT NULL,
  `file_id` int(8) UNSIGNED DEFAULT NULL,
  `log_action` enum('ADD','DELETE','SET','') NOT NULL,
  `subject` varchar(50) NOT NULL,
  `subject_value` varchar(320) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  `proponent_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE `Message` (
  `message_id` int(8) UNSIGNED NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `from_user_id` int(8) UNSIGNED NOT NULL,
  `to_user_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Organization`
--

CREATE TABLE `Organization` (
  `org_id` int(8) UNSIGNED NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `org_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OrganizationContent`
--

CREATE TABLE `OrganizationContent` (
  `org_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `member_type_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OrganizationMemberType`
--

CREATE TABLE `OrganizationMemberType` (
  `member_type_id` int(8) UNSIGNED NOT NULL,
  `member_name` enum('Administrator','Fellow','Researcher','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `post_subject` varchar(50) NOT NULL,
  `post_message` varchar(500) NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `project_id` int(8) UNSIGNED NOT NULL,
  `project_name` varchar(320) NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `visibility_id` tinyint(1) NOT NULL,
  `project_status` enum('In Progress','Complete','Incomplete') NOT NULL,
  `dateStarted` datetime NOT NULL,
  `archived` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectAuthors`
--

CREATE TABLE `ProjectAuthors` (
  `project_id` int(8) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectTags`
--

CREATE TABLE `ProjectTags` (
  `project_id` int(8) UNSIGNED NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `middle_initial` varchar(2) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `user_type_id` int(8) UNSIGNED NOT NULL,
  `user_position` enum('Regular','Administrator') NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `email`, `password`, `first_name`, `middle_initial`, `last_name`, `gender`, `user_type_id`, `user_position`, `profile_pic`, `isAdmin`, `archived`) VALUES
(1, 'juandelacruz@gmail.com', 'p@55w0rD', 'Juan', 'F', 'Dela Cruz', 'Male', 1, 'Regular', 'jdc.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `user_type_id` int(8) UNSIGNED NOT NULL,
  `user_type_name` enum('Guest','TE3D Member','Project Author','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`user_type_id`, `user_type_name`) VALUES
(1, 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Deletes`
--
ALTER TABLE `Deletes`
  ADD PRIMARY KEY (`delete_id`);

--
-- Indexes for table `File`
--
ALTER TABLE `File`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `file` (`file`),
  ADD KEY `ProjectID` (`project_id`),
  ADD KEY `UserID` (`user_id`);

--
-- Indexes for table `GuestPass`
--
ALTER TABLE `GuestPass`
  ADD PRIMARY KEY (`pass_id`),
  ADD UNIQUE KEY `pass_code` (`pass_code`);

--
-- Indexes for table `GuestPassFiles`
--
ALTER TABLE `GuestPassFiles`
  ADD KEY `file_id` (`file_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `LoginAttempt`
--
ALTER TABLE `LoginAttempt`
  ADD PRIMARY KEY (`login_attempt_id`),
  ADD KEY `UserID` (`user_id`);

--
-- Indexes for table `Logs`
--
ALTER TABLE `Logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `proponent_id` (`proponent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `FromUserID` (`from_user_id`),
  ADD KEY `ToUserID` (`to_user_id`);

--
-- Indexes for table `Organization`
--
ALTER TABLE `Organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `OrganizationContent`
--
ALTER TABLE `OrganizationContent`
  ADD KEY `org_id` (`org_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `member_type_id` (`member_type_id`);

--
-- Indexes for table `OrganizationMemberType`
--
ALTER TABLE `OrganizationMemberType`
  ADD PRIMARY KEY (`member_type_id`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `UserID` (`user_id`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `UserID` (`user_id`);

--
-- Indexes for table `ProjectAuthors`
--
ALTER TABLE `ProjectAuthors`
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ProjectTags`
--
ALTER TABLE `ProjectTags`
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `UserTypeID` (`user_type_id`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Deletes`
--
ALTER TABLE `Deletes`
  MODIFY `delete_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `File`
--
ALTER TABLE `File`
  MODIFY `file_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `GuestPass`
--
ALTER TABLE `GuestPass`
  MODIFY `pass_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LoginAttempt`
--
ALTER TABLE `LoginAttempt`
  MODIFY `login_attempt_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Logs`
--
ALTER TABLE `Logs`
  MODIFY `log_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Message`
--
ALTER TABLE `Message`
  MODIFY `message_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Organization`
--
ALTER TABLE `Organization`
  MODIFY `org_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `OrganizationMemberType`
--
ALTER TABLE `OrganizationMemberType`
  MODIFY `member_type_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `post_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `project_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `UserType`
--
ALTER TABLE `UserType`
  MODIFY `user_type_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `File`
--
ALTER TABLE `File`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`project_id`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `GuestPassFiles`
--
ALTER TABLE `GuestPassFiles`
  ADD CONSTRAINT `guestpassfiles_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `File` (`file_id`),
  ADD CONSTRAINT `guestpassfiles_ibfk_2` FOREIGN KEY (`pass_id`) REFERENCES `GuestPass` (`pass_id`);

--
-- Constraints for table `LoginAttempt`
--
ALTER TABLE `LoginAttempt`
  ADD CONSTRAINT `loginattempt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Logs`
--
ALTER TABLE `Logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `File` (`file_id`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `Project` (`project_id`),
  ADD CONSTRAINT `logs_ibfk_3` FOREIGN KEY (`proponent_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `logs_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `OrganizationContent`
--
ALTER TABLE `OrganizationContent`
  ADD CONSTRAINT `organizationcontent_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `Organization` (`org_id`),
  ADD CONSTRAINT `organizationcontent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `organizationcontent_ibfk_3` FOREIGN KEY (`member_type_id`) REFERENCES `OrganizationMemberType` (`member_type_id`);

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `ProjectAuthors`
--
ALTER TABLE `ProjectAuthors`
  ADD CONSTRAINT `projectauthors_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`project_id`),
  ADD CONSTRAINT `projectauthors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `ProjectTags`
--
ALTER TABLE `ProjectTags`
  ADD CONSTRAINT `projecttags_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`project_id`);

--
-- Constraints for table `UserType`
--
ALTER TABLE `UserType`
  ADD CONSTRAINT `usertype_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `User` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
