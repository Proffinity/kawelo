-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 10:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawale`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `phone_no` int(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ID`, `client_name`, `date`, `phone_no`, `time`, `status`) VALUES
(1, 'Peter Mpaso', '2021-01-21', 995763421, '10:00', 'Canceled by Client'),
(2, 'Mclean Kumala', '2021-01-26', 888345678, '08:00', 'OPEN'),
(3, 'Daniel Dhlovu', '2021-01-29', 993450045, '15:00', 'Canceled by SC');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `ID` int(100) NOT NULL,
  `case_category` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `respondent_name` varchar(100) NOT NULL,
  `case_type` varchar(100) NOT NULL,
  `assign` varchar(30) NOT NULL,
  `filling_no` varchar(100) NOT NULL,
  `filling_date` date NOT NULL,
  `registration_no` varchar(100) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`ID`, `case_category`, `client_name`, `respondent_name`, `case_type`, `assign`, `filling_no`, `filling_date`, `registration_no`, `registration_date`) VALUES
(1, '', 'Peter Mpaso', 'Harry Thomson', 'Land Dispute', 'Senior Counsel', 'KWL95846', '2021-01-05', 'KWL48850', '2021-01-07'),
(2, 'Important', 'Mclean Kumala', 'Boaz Kamwela', 'Job Dismissal', 'Master Counsel', 'KWL90202', '2020-12-15', 'KWL10023', '2021-02-01'),
(4, '', 'Daniel Dhlovu', 'Harry Mwanza', 'Land Dispute', 'Senior Counsel', 'HDD9876', '2021-01-20', 'DD765', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_ID` int(100) NOT NULL,
  `to_user_ID` int(11) NOT NULL,
  `from_user_ID` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_ID`, `to_user_ID`, `from_user_ID`, `chat_message`, `status`, `timestamp`) VALUES
(1, 1, 3, 'Hie boss', 0, '2021-01-30 13:08:38'),
(2, 3, 1, 'Hey whatsapp', 0, '2021-01-30 13:08:48'),
(3, 1, 3, 'Am fine sir....wanted to make a proposition', 0, '2021-01-30 13:09:13'),
(4, 1, 2, 'Hey! Wesley', 0, '2021-01-30 13:09:34'),
(5, 2, 1, 'Hey...you whatsapp', 0, '2021-01-30 13:09:54'),
(6, 1, 2, 'Yeah...', 0, '2021-01-30 13:10:41'),
(7, 1, 2, 'Wanted to ask you something', 0, '2021-01-30 13:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(100) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `residence` varchar(30) NOT NULL,
  `cases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `mobile_no`, `address`, `residence`, `cases`) VALUES
(1, 'Peter', 'Christopher', 'Mpaso', 'Male', 'chrismpaso@yahoo.com', '0999576859', 'Chikanda Village, TA Chikowi, Zomba', 'Zomba', 0),
(2, 'Mclean', 'Oscar', 'Kumala', 'Male', 'mcleankumz@gmail.com', '0888457809', 'Nico Tech, Private Bag 345, Blantyre 3', 'Blantyre', 0),
(4, 'Daniel', 'Bison', 'Ddhlovu', 'Male', 'daniel@gmail.com', '0999437856', 'manja, P.O. Box 45, Blantyre', 'Manja', 1);

-- --------------------------------------------------------

--
-- Table structure for table `court_details`
--

CREATE TABLE `court_details` (
  `ID` int(100) NOT NULL,
  `caseID` int(100) NOT NULL,
  `court_name` varchar(100) NOT NULL,
  `judge_name` varchar(100) NOT NULL,
  `first_hearing_date` date NOT NULL,
  `next_hearing_date` date NOT NULL,
  `case_status` varchar(100) NOT NULL,
  `court_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court_details`
--

INSERT INTO `court_details` (`ID`, `caseID`, `court_name`, `judge_name`, `first_hearing_date`, `next_hearing_date`, `case_status`, `court_no`) VALUES
(1, 1, 'Zomba High Court', 'Judge Medson Kalowe', '2021-01-08', '2021-01-25', 'Proceed to Respond', 'ZH90566'),
(2, 2, 'Blantyre Industrial Court', 'Magistrate Vincent Mlobwa', '2021-02-03', '2021-02-01', 'Respondents Defence', 'MGBT04950'),
(4, 4, 'Blantyre Magistrate Court', 'Magistrate Vincent Gondwe', '2021-01-25', '0000-00-00', '', 'BMC9866');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_ID` int(100) NOT NULL,
  `userID` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_ID`, `userID`, `last_activity`, `is_type`) VALUES
(1, 1, '2021-01-30 13:36:49', 'no'),
(2, 2, '2021-01-30 14:47:54', 'no'),
(3, 3, '2021-01-30 14:48:08', 'no'),
(4, 1, '2021-01-30 14:31:17', 'no'),
(5, 1, '2021-01-30 14:33:17', 'no'),
(6, 1, '2021-01-30 14:44:28', 'no'),
(7, 1, '2021-01-30 14:45:57', 'no'),
(8, 2, '2021-01-30 14:51:12', 'no'),
(9, 3, '2021-01-30 14:49:14', 'no'),
(10, 3, '2021-01-30 14:49:54', 'no'),
(11, 1, '2021-01-30 14:50:37', 'no'),
(12, 3, '2021-01-30 14:51:47', 'no'),
(13, 3, '2021-01-30 14:52:42', 'no'),
(14, 3, '2021-01-30 14:59:53', 'no'),
(15, 3, '2021-01-30 15:09:29', 'no'),
(16, 1, '2021-03-20 09:57:35', 'no'),
(17, 2, '2021-01-30 15:42:21', 'no'),
(18, 3, '2021-01-30 15:42:47', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `ID` int(100) NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `log_in_time` time NOT NULL,
  `log_out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`ID`, `first_name`, `last_name`, `date`, `log_in_time`, `log_out_time`) VALUES
(1, 'Wesley', 'Mwafulirwa', '2021-01-30', '17:40:42', '00:00:00'),
(2, 'Rebecca', 'Mwafulirwa', '2021-01-30', '17:42:21', '17:43:39'),
(3, 'Fredrick', 'Chingomba', '2021-01-30', '17:42:47', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(15) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `home_district` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userID`, `first_name`, `last_name`, `image_path`, `start_date`, `email`, `mobile_no`, `home_address`, `password`, `home_district`, `role`) VALUES
(1, 'KWL100347SC', 'Wesley', 'Mwafulirwa', '', '2016-02-16', 'wesley@kawelolawyers.ac.mw', 999789023, 'Mzimba Village, Box 777', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Mzimba', 'Admin'),
(2, 'KWL100389SEC', 'Rebecca', 'Mwafulirwa', '', '2017-09-20', 'becky@kawelolaywers@ac.mw', 888567423, 'Mzimba Village, Box 777', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Rumphi', 'Secretary'),
(3, 'KWL100365ACC', 'Fredrick', 'Chingomba', '', '2018-07-17', 'fredrick@kawelolawyer.ac.mw', 997568723, 'Kusungu, TA Chikweza', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Kasungu', 'Accountant'),
(5, 'KWL100315DC', 'Andrews', 'Kadangwe', 'Peter Single.jpg', '2018-10-29', 'james@kawelolawyers.ac.mw', 993561234, 'Chiradzulo District, T.A. Nkalo, Chiradzulo', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'Chiradzulo', 'Data Clerks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_ID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `court_details`
--
ALTER TABLE `court_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `court_details`
--
ALTER TABLE `court_details`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
