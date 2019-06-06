-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 06, 2019 la 07:15 PM
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
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `idAd` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `age` int(4) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`idAd`, `email`, `password`, `firstName`, `lastName`, `gender`, `age`, `location`) VALUES
(1, 'aaa@gmail.com', '123456', 'AAA', 'BBB', 'male', 21, NULL),
(2, 'aaa@gmail.com', '123456', 'AAA', 'BBB', 'male', 21, NULL),
(3, 'bb@gmail.com', '234567', 'aaaa', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'null', 25, NULL),
(4, 'georgiana@gmail.com', 'georgiana', 'Georgiana ', 'Elena', 'male', 23, NULL),
(5, 'georgianae@gmail.com', '12345678', 'Georgiana ', 'Elena', 'female', 25, NULL),
(6, '123456@gmail.ro', '123456', 'Georgiana ', 'aaa', 'female', 24, NULL),
(7, '123234456@gmail.ro', '1234561', 'aaaaa', 'aaaa', 'null', 11, NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idAd`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `idAd` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
