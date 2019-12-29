-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 06:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblfutsals`
--

CREATE TABLE `tblfutsals` (
  `futsals_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfutsals`
--

INSERT INTO `tblfutsals` (`futsals_id`, `fullname`, `address`, `mobileno`, `email`, `status`, `reg_date`, `users_id`) VALUES
(1, 'Shantinagar Futsal', 'Shantinagar', '9812371263', 'shantinagar@gmail.com', 'Active', '2018-08-06 15:18:51.796880', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrounds`
--

CREATE TABLE `tblgrounds` (
  `grounds_id` int(11) NOT NULL,
  `ground` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `futsals_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgrounds`
--

INSERT INTO `tblgrounds` (`grounds_id`, `ground`, `price`, `status`, `reg_date`, `futsals_id`) VALUES
(8, 'Ground - A', '2222', 'Available', '2018-08-06 04:24:45.115882', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

CREATE TABLE `tblmessages` (
  `messages_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `users_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmessages`
--

INSERT INTO `tblmessages` (`messages_id`, `email`, `subject`, `message`, `reg_date`, `users_id`, `roles_id`) VALUES
(1, 'owner@gmail.com', 'Policy', 'Regarding the policy of this website', '2018-08-05 11:22:55.529388', 2, 1),
(7, 'sagar@gmail.com', 'Joshan', 'joshanaaaaaaaaaaaaaaaaaaaaa', '2018-08-05 18:38:55.000000', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblreservations`
--

CREATE TABLE `tblreservations` (
  `reservations_id` int(11) NOT NULL,
  `request_date` varchar(50) NOT NULL,
  `request_time` varchar(50) NOT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `users_id` int(11) NOT NULL,
  `futsals_id` int(11) NOT NULL,
  `grounds_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblreservations`
--

INSERT INTO `tblreservations` (`reservations_id`, `request_date`, `request_time`, `reg_date`, `users_id`, `futsals_id`, `grounds_id`) VALUES
(2, '2000-06-01', '08:19', '2018-08-05 13:30:16.000000', 2, 1, 8),
(5, '2005-12-04', '19:52', '2018-08-05 17:01:36.000000', 10, 1, 8),
(6, '1975-06-22', '14:14', '2018-08-05 18:26:52.000000', 5, 1, 8),
(7, '2018-08-07', '02:00', '2018-08-06 05:36:26.000000', 10, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblroles`
--

CREATE TABLE `tblroles` (
  `roles_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblroles`
--

INSERT INTO `tblroles` (`roles_id`, `role`, `slug`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Owner', 'owner'),
(3, 'Customer', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `users_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `reg_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`users_id`, `fullname`, `email`, `mobileno`, `address`, `password`, `img`, `reg_date`, `roles_id`) VALUES
(2, 'Joshan Limbhu', 'admin@gmail.com', '9842749895', 'KTM', '70b43a42d751e428906ad9bb9b89c605', '', '2018-08-04 11:16:32.101212', 1),
(5, 'Sagar Koirala', 'sagar@gmail.com', '982137612', 'BTN', '70b43a42d751e428906ad9bb9b89c605', '', '2018-08-05 17:43:07.111043', 2),
(10, 'Nayan Adhikari', 'nayancustomer@example.com', '987381723', 'apexian', '70b43a42d751e428906ad9bb9b89c605', '', '2018-08-05 17:25:33.390541', 3),
(11, 'Rohit Ali', 'rohitowner@gmail.com', '91273987912', 'Nepalgunj', '70b43a42d751e428906ad9bb9b89c605', '', '2018-08-06 15:31:02.000000', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblfutsals`
--
ALTER TABLE `tblfutsals`
  ADD PRIMARY KEY (`futsals_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tblgrounds`
--
ALTER TABLE `tblgrounds`
  ADD PRIMARY KEY (`grounds_id`),
  ADD KEY `futsals_id` (`futsals_id`);

--
-- Indexes for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD PRIMARY KEY (`messages_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `users_id_2` (`users_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Indexes for table `tblreservations`
--
ALTER TABLE `tblreservations`
  ADD PRIMARY KEY (`reservations_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `futsals_id` (`futsals_id`),
  ADD KEY `grounds_id` (`grounds_id`);

--
-- Indexes for table `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfutsals`
--
ALTER TABLE `tblfutsals`
  MODIFY `futsals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblgrounds`
--
ALTER TABLE `tblgrounds`
  MODIFY `grounds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblreservations`
--
ALTER TABLE `tblreservations`
  MODIFY `reservations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfutsals`
--
ALTER TABLE `tblfutsals`
  ADD CONSTRAINT `tblfutsals_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tblusers` (`users_id`);

--
-- Constraints for table `tblgrounds`
--
ALTER TABLE `tblgrounds`
  ADD CONSTRAINT `tblgrounds_ibfk_1` FOREIGN KEY (`futsals_id`) REFERENCES `tblfutsals` (`futsals_id`);

--
-- Constraints for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD CONSTRAINT `tblmessages_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `tblusers` (`users_id`),
  ADD CONSTRAINT `tblmessages_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `tblroles` (`roles_id`);

--
-- Constraints for table `tblreservations`
--
ALTER TABLE `tblreservations`
  ADD CONSTRAINT `tblreservations_ibfk_1` FOREIGN KEY (`grounds_id`) REFERENCES `tblgrounds` (`grounds_id`),
  ADD CONSTRAINT `tblreservations_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tblusers` (`users_id`),
  ADD CONSTRAINT `tblreservations_ibfk_3` FOREIGN KEY (`futsals_id`) REFERENCES `tblfutsals` (`futsals_id`);

--
-- Constraints for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD CONSTRAINT `tblusers_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `tblroles` (`roles_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
