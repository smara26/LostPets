-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 04:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_pets`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `disappearance_date` date NOT NULL,
  `marks` varchar(50) DEFAULT NULL,
  `collar` varchar(50) DEFAULT NULL,
  `last_seen_place` varchar(100) NOT NULL,
  `last_modify_date` date NOT NULL,
  `picture` varchar(50) NOT NULL,
  `details` varchar(300) DEFAULT NULL,
  `owner` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `reward` int(10) DEFAULT NULL,
  `found` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `breed`, `disappearance_date`, `marks`, `collar`, `last_seen_place`, `last_modify_date`, `picture`, `details`, `owner`, `phone`, `mail`, `reward`, `found`) VALUES
(3, 'Nameded', 'qwewe', '2020-01-01', '', '', '47.1725036 27.547524', '2019-06-02', 'BazaDeDate.png', 'wewqe', 'ala bala', '0759015784', 'alabala@gmail.com', 0, 0),
(4, 'test doggo', 'sadsa', '2019-06-07', '', '', '48.85378527483343 2.349817215721175', '2019-03-20', 'BazaDeDate.png', '', 'ala bala', '0745879874', 'alabala@gmail.com', 0, 0),
(5, 'rere', 'wer', '2019-05-29', '', '', '51.10850353713832 -113.74252909171578', '2019-06-13', '', '', 'ala bala', '1561561651', 'alabala@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `ad_id` int(10) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `age` int(4) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `gender`, `age`, `location`) VALUES
(1, 'aaa@gmail.com', '123456', 'AAA', 'BBB', 'male', 21, NULL),
(2, 'bb@gmail.com', '234567', 'aaaa', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'null', 25, NULL),
(3, 'georgiana@gmail.com', 'georgiana', 'Georgiana ', 'Elena', 'male', 23, NULL),
(4, 'georgianae@gmail.com', '12345678', 'Georgiana ', 'Elena', 'female', 25, NULL),
(5, '123456@gmail.ro', '123456', 'Georgiana ', 'aaa', 'female', 24, NULL),
(6, '123234456@gmail.ro', '1234561', 'aaaaa', 'aaaa', 'null', 11, NULL),
(7, 'alabala@gmail.com', '123456', 'ala', 'bala', 'female', 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_ads`
--

CREATE TABLE `users_ads` (
  `user_id` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `ad_id_fk` (`ad_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_ads`
--
ALTER TABLE `users_ads`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ad_id` (`ad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `ad_id_fk` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_ads`
--
ALTER TABLE `users_ads`
  ADD CONSTRAINT `users_ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ads_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
