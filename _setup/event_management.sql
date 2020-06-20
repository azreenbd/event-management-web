-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 08:09 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `att_id` int(4) NOT NULL,
  `att_name` varchar(100) DEFAULT NULL,
  `att_nric` varchar(14) DEFAULT NULL,
  `att_phone_num` varchar(13) DEFAULT NULL,
  `att_email` varchar(100) DEFAULT NULL,
  `eve_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `comm_id` int(4) NOT NULL,
  `comm_name` varchar(100) DEFAULT NULL,
  `comm_div` varchar(20) DEFAULT NULL,
  `comm_nric` varchar(14) DEFAULT NULL,
  `comm_phone_num` varchar(13) DEFAULT NULL,
  `comm_email` varchar(100) DEFAULT NULL,
  `eve_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eve_id` int(4) NOT NULL,
  `eve_name` varchar(100) DEFAULT NULL,
  `eve_date` date DEFAULT NULL,
  `eve_time` time DEFAULT NULL,
  `eve_venue` varchar(100) DEFAULT NULL,
  `eve_max_num_att` int(3) DEFAULT NULL,
  `eve_desc` varchar(255) DEFAULT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tentative`
--

CREATE TABLE `tentative` (
  `tent_id` int(4) NOT NULL,
  `tent_time` time DEFAULT NULL,
  `tent_desc` varchar(255) DEFAULT NULL,
  `eve_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `fk_event2` (`eve_id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `fk_event1` (`eve_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eve_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tentative`
--
ALTER TABLE `tentative`
  ADD PRIMARY KEY (`tent_id`),
  ADD KEY `fk_event` (`eve_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `att_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `comm_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eve_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tentative`
--
ALTER TABLE `tentative`
  MODIFY `tent_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `fk_event2` FOREIGN KEY (`eve_id`) REFERENCES `event` (`eve_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `fk_event1` FOREIGN KEY (`eve_id`) REFERENCES `event` (`eve_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tentative`
--
ALTER TABLE `tentative`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`eve_id`) REFERENCES `event` (`eve_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
