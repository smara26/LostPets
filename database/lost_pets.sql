-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 09:32 PM
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
CREATE DATABASE IF NOT EXISTS `lost_pets` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lost_pets`;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--
-- Creation: Jun 06, 2019 at 07:29 PM
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
-- RELATIONSHIPS FOR TABLE `ads`:
--

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `breed`, `disappearance_date`, `marks`, `collar`, `last_seen_place`, `last_modify_date`, `picture`, `details`, `owner`, `phone`, `mail`, `reward`, `found`) VALUES
(1, 'Thora', 'amstaff', '2019-06-02', 'white belly', 'red leather', 'Sos. Pacurari, nr. 2Angtbtgbtgf', '0000-00-00', 'flala.jpg', NULL, 'Smara', '0777557799', 'smara0726@gmail.com', 3000, 0),
(2, 'sfhdk', 'cv,kj', '2019-06-04', 'dfersh', NULL, 'etrlkjk', '0000-00-00', 'fgh', NULL, 'thyjluk', '567890009', 'fhghky', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jun 06, 2019 at 06:48 PM
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
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `gender`, `age`, `location`) VALUES
(1, 'aaa@gmail.com', '123456', 'AAA', 'BBB', 'male', 21, NULL),
(2, 'bb@gmail.com', '234567', 'aaaa', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'null', 25, NULL),
(3, 'georgiana@gmail.com', 'georgiana', 'Georgiana ', 'Elena', 'male', 23, NULL),
(4, 'georgianae@gmail.com', '12345678', 'Georgiana ', 'Elena', 'female', 25, NULL),
(5, '123456@gmail.ro', '123456', 'Georgiana ', 'aaa', 'female', 24, NULL),
(6, '123234456@gmail.ro', '1234561', 'aaaaa', 'aaaa', 'null', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_ads`
--
-- Creation: Jun 06, 2019 at 07:24 PM
--

CREATE TABLE `users_ads` (
  `user_id` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users_ads`:
--   `user_id`
--       `users` -> `id`
--   `ad_id`
--       `ads` -> `id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
