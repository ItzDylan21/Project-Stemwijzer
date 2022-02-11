-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 feb 2022 om 16:00
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `municipality`
--

CREATE TABLE `municipality` (
  `municipalityID` int(4) NOT NULL,
  `municipalityname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `party`
--

CREATE TABLE `party` (
  `partyID` int(11) NOT NULL,
  `partyname` varchar(64) NOT NULL,
  `partyinfo` varchar(1024) NOT NULL,
  `partylogo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`municipalityID`);

--
-- Indexen voor tabel `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`partyID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `municipality`
--
ALTER TABLE `municipality`
  MODIFY `municipalityID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `party`
--
ALTER TABLE `party`
  MODIFY `partyID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
