-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 01:23 PM
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
-- Database: `joshan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins_messages`
--

CREATE TABLE `admins_messages` (
  `admin_messages_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins_messages`
--

INSERT INTO `admins_messages` (`admin_messages_id`, `email`, `subject`, `message`) VALUES
(1, 'sd@gmail.com', 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `futsals`
--

CREATE TABLE `futsals` (
  `futsals_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(100) NOT NULL,
  `opening_hours` varchar(250) NOT NULL,
  `closing_hours` varchar(250) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `futsals`
--

INSERT INTO `futsals` (`futsals_id`, `fullname`, `mobileno`, `email`, `address`, `opening_hours`, `closing_hours`, `price`) VALUES
(1, 'Shantinagar Futsal', '9817922111', 'hello@gmail.com', 'KTm', '5am', '5pm', 1200),
(2, 'Maitidevi Futsal', '9817922101', 'me3333@gmail.com', 'Shantinagar', '5am', '5pm', 2000),
(3, 'Shankamul Futsal', '9812637812', 'hhh@gmail.com', 'KTM', '6am', '9pm', 1700),
(4, 'Shankamul Futsal', '9812637812', 'hhh@gmail.com', 'KTM', '6am', '9pm', 1700);

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE `grounds` (
  `grounds_id` int(11) NOT NULL,
  `futsals_id` int(11) NOT NULL,
  `groundno` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grounds`
--

INSERT INTO `grounds` (`grounds_id`, `futsals_id`, `groundno`, `status`) VALUES
(1, 1, 2, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `futsal_id` int(11) NOT NULL,
  `date` int(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roles` varchar(50) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `fullname`, `email`, `mobileno`, `address`, `password`, `roles`, `img`) VALUES
(1, 'Joshan Pradhan', 'pradhan@apexcollege.edu.np', '9817922101', 'Shantinagar', '70b43a42d751e428906ad9bb9b89c605', 'Admin', ''),
(3, 'Joshan Limbhu', 'me3333@gmail.com', '9817922000', 'KTM', '70b43a42d751e428906ad9bb9b89c605', 'Admin', ''),
(4, 'Rohan Acharya', 'rohan@gmail.com', '9817922110', '', '70b43a42d751e428906ad9bb9b89c605', 'Standard', ''),
(5, 'Rohan Acharya', 'rohan1@gmail.com', '9817922111', '', '70b43a42d751e428906ad9bb9b89c605', 'Standard', ''),
(6, 'Tara Shrestha', 'tara@gmail.com', '9840072645', '', '70b43a42d751e428906ad9bb9b89c605', 'Standard', ''),
(7, 'Sagar Koirala', 'sagar@gmail.com', '9817922001', '', '70b43a42d751e428906ad9bb9b89c605', 'Standard', ''),
(8, 'Bimal Rai', 'bimal@gmail.com', '9817222222', '', '70b43a42d751e428906ad9bb9b89c605', 'Standard', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_messages`
--

CREATE TABLE `users_messages` (
  `user_messages_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_messages`
--

INSERT INTO `users_messages` (`user_messages_id`, `email`, `subject`, `message`) VALUES
(1, 'me3333@gmail.com', 'hello', ''),
(2, 'me3333@gmail.com', 'hello', 'asdasdasdad'),
(3, 'me3333@gmail.com', 'hello', 'asdasdwqdq'),
(4, 'me3333@gmail.com', 'Policyqwe', 'qweqweqwe'),
(5, 'V2@gmail.com', 'IT', 'Prabesh\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_messages`
--
ALTER TABLE `admins_messages`
  ADD PRIMARY KEY (`admin_messages_id`);

--
-- Indexes for table `futsals`
--
ALTER TABLE `futsals`
  ADD PRIMARY KEY (`futsals_id`);

--
-- Indexes for table `grounds`
--
ALTER TABLE `grounds`
  ADD PRIMARY KEY (`grounds_id`),
  ADD KEY `FOREIGN` (`futsals_id`) USING BTREE;

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `ground_id` (`ground_id`),
  ADD KEY `futsal_id` (`futsal_id`),
  ADD KEY `users_id` (`users_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users_messages`
--
ALTER TABLE `users_messages`
  ADD PRIMARY KEY (`user_messages_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins_messages`
--
ALTER TABLE `admins_messages`
  MODIFY `admin_messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `futsals`
--
ALTER TABLE `futsals`
  MODIFY `futsals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grounds`
--
ALTER TABLE `grounds`
  MODIFY `grounds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_messages`
--
ALTER TABLE `users_messages`
  MODIFY `user_messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grounds`
--
ALTER TABLE `grounds`
  ADD CONSTRAINT `grounds_ibfk_1` FOREIGN KEY (`futsals_id`) REFERENCES `futsals` (`futsals_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`futsal_id`) REFERENCES `futsals` (`futsals_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ground_id`) REFERENCES `grounds` (`grounds_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
