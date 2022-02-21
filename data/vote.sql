-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 feb 2022 om 11:22
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
-- Tabelstructuur voor tabel `code`
--

CREATE TABLE `code` (
  `codeID` int(10) NOT NULL,
  `timeCreated` datetime NOT NULL,
  `uniqueCode` varchar(32) NOT NULL,
  `codeUsed` tinyint(1) NOT NULL,
  `timeUsed` datetime NOT NULL,
  `usedAfterExpired` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `member`
--

CREATE TABLE `member` (
  `memberID` int(4) NOT NULL,
  `memberFirstName` varchar(128) NOT NULL,
  `memberLastName` varchar(128) NOT NULL,
  `memberPicture` varchar(128) NOT NULL,
  `partyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `member`
--

INSERT INTO `member` (`memberID`, `memberFirstName`, `memberLastName`, `memberPicture`, `partyID`) VALUES
(1, 'Puck', 'de Nijs', 'cda-puckdenijs.jpg', 3),
(2, 'Frans', 'Jansen', 'd66-fransjansen.jpg', 6),
(3, 'Lambert', 'Riteco', 'groenlinks-lambertriteco.jpg', 7),
(4, 'Lars', 'Dignum', 'jesslokaal-larsdignum.jpg', 8),
(5, 'Rienk', 'Mud', 'pvda-rienkmud.jpeg', 10),
(6, 'Perry', 'Vriend', 'seniorenpartij-perryvriend.jpg', 9),
(7, 'Wim', 'Rijnders', 'sp-wimrijnders.jpg', 11),
(8, 'Angelique', 'van Wijk', 'vvd-angeliquevanwijk.jpg', 12),
(9, 'Merieke', 'Bredewold', 'wens4u-meriekebredewold.jpg', 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `municipality`
--

CREATE TABLE `municipality` (
  `municipalityID` int(4) NOT NULL,
  `municipalityname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `municipality`
--

INSERT INTO `municipality` (`municipalityID`, `municipalityname`) VALUES
(3, 'Schagen'),
(4, 'Den Helder'),
(5, 'Amsterdam'),
(6, 'Rotterdam'),
(7, 'Alkmaar');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `party`
--

CREATE TABLE `party` (
  `partyID` int(11) NOT NULL,
  `partyname` varchar(64) NOT NULL,
  `partyinfo` varchar(1024) NOT NULL,
  `partylogo` varchar(64) NOT NULL,
  `municipalityID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `party`
--

INSERT INTO `party` (`partyID`, `partyname`, `partyinfo`, `partylogo`, `municipalityID`) VALUES
(3, 'CDA', 'Test info', 'cda.png', 3),
(6, 'D66', 'het is wat het is', 'd66.png', 3),
(7, 'GroenLinks', '', 'groenlinks.png', 3),
(8, 'JESS lokaal', '', 'jesslokaal.png', 3),
(9, 'Ouderen partij Schagen', '', 'ouderenpartijschagen.png', 3),
(10, 'PvdA', '', 'pvda.png', 3),
(11, 'SP', '', 'sp.png', 3),
(12, 'VVD', '', 'vvd.png', 3),
(13, 'Wens4u', '', 'wens4u.png', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vote`
--

CREATE TABLE `vote` (
  `voteID` int(10) NOT NULL,
  `codeID` int(10) NOT NULL,
  `memberID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`codeID`);

--
-- Indexen voor tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `party` (`partyID`);

--
-- Indexen voor tabel `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`municipalityID`);

--
-- Indexen voor tabel `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`partyID`),
  ADD KEY `municipality` (`municipalityID`);

--
-- Indexen voor tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`voteID`),
  ADD KEY `code` (`codeID`),
  ADD KEY `member` (`memberID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `municipality`
--
ALTER TABLE `municipality`
  MODIFY `municipalityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `party`
--
ALTER TABLE `party`
  MODIFY `partyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `party` FOREIGN KEY (`partyID`) REFERENCES `party` (`partyID`);

--
-- Beperkingen voor tabel `party`
--
ALTER TABLE `party`
  ADD CONSTRAINT `municipality` FOREIGN KEY (`municipalityID`) REFERENCES `municipality` (`municipalityID`);

--
-- Beperkingen voor tabel `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `code` FOREIGN KEY (`codeID`) REFERENCES `code` (`codeID`),
  ADD CONSTRAINT `member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
