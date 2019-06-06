-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 06, 2019 la 07:16 PM
-- Versiune server: 10.1.38-MariaDB
-- Versiune PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `lost_pets`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `my_ad`
--

CREATE TABLE `my_ad` (
  `id` int(10) NOT NULL,
  `idAd` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `disappearance_date` date NOT NULL,
  `marks` varchar(50) DEFAULT NULL,
  `collar` varchar(50) DEFAULT NULL,
  `last_seen_place` varchar(100) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `details` varchar(300) DEFAULT NULL,
  `owner` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `reward` int(10) DEFAULT NULL,
  `found` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `my_ad`
--
ALTER TABLE `my_ad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idAd` (`idAd`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
