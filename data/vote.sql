-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 09:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `codeID` int(10) NOT NULL,
  `timeCreated` datetime NOT NULL,
  `uniqueCode` varchar(32) NOT NULL,
  `codeUsed` tinyint(1) NOT NULL DEFAULT 0,
  `timeUsed` datetime NOT NULL,
  `usedAfterExpired` int(5) NOT NULL DEFAULT 0,
  `municipalityID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`codeID`, `timeCreated`, `uniqueCode`, `codeUsed`, `timeUsed`, `usedAfterExpired`, `municipalityID`) VALUES
(0, '2022-03-06 21:49:48', '12345678', 0, '2022-03-06 21:49:48', 0, 3),
(1, '2022-03-07 09:39:25', 'Yuu6eze9', 0, '2022-03-07 09:39:25', 0, 3),
(2, '2022-03-07 09:42:11', 'i9G7m4Wf', 0, '2022-03-07 09:42:11', 0, 3),
(3, '2022-03-07 09:42:34', 'DswLMaCq', 0, '2022-03-07 09:42:34', 0, 3),
(4, '2022-03-07 09:42:46', 'DrMZ9rm3', 0, '2022-03-07 09:42:46', 0, 3),
(5, '2022-03-07 09:42:46', 'M7kuyqWL', 0, '2022-03-07 09:42:46', 0, 3),
(6, '2022-03-07 09:43:50', '84vW5JWv', 0, '2022-03-07 09:43:50', 0, 3),
(7, '2022-03-07 09:43:50', 'urHudrUn', 0, '2022-03-07 09:43:50', 0, 3),
(8, '2022-03-07 09:44:17', 'RVGA67HE', 0, '2022-03-07 09:44:17', 0, 3),
(9, '2022-03-07 09:44:17', '63B2Mr2N', 0, '2022-03-07 09:44:17', 0, 3),
(10, '2022-03-07 09:45:19', '84hd2DY8', 0, '2022-03-07 09:45:19', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(4) NOT NULL,
  `memberFirstName` varchar(128) NOT NULL,
  `memberLastName` varchar(128) NOT NULL,
  `memberListOrder` int(5) NOT NULL,
  `memberPicture` varchar(128) NOT NULL DEFAULT 'placeholder-member.png',
  `partyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memberFirstName`, `memberLastName`, `memberListOrder`, `memberPicture`, `partyID`) VALUES
(1, ' P. (Puck) ', 'de Nijs-Visser', 1, 'cda-puckdenijs.jpg', 3),
(2, ' J. (Co) ', 'Wiskerke', 2, 'placeholder-member.png', 3),
(3, ' D. (Debby) ', 'Burger-de Graaf', 3, 'placeholder-member.png', 3),
(4, ' B.J. (Boudien) ', 'Glashouwer', 4, 'placeholder-member.png', 3),
(5, ' W. (Wim) ', 'Vonk', 5, 'placeholder-member.png', 3),
(6, ' M. (Menno) ', 'van Oerle', 6, 'placeholder-member.png', 3),
(7, ' M.A.J. (Marcel) ', 'Sanders', 7, 'placeholder-member.png', 3),
(8, ' R.A.J.C. (Richard) ', 'van Bergen', 8, 'placeholder-member.png', 3),
(9, ' S.T. (Tim) ', 'Slijkhuis', 9, 'placeholder-member.png', 3),
(10, ' R.M. (Ruud) ', 'Bakker', 10, 'placeholder-member.png', 3),
(11, ' A.T. (Arco) ', 'Kleimeer', 11, 'placeholder-member.png', 3),
(12, ' S.G.M. (Sonja) ', 'Bloom', 12, 'placeholder-member.png', 3),
(13, ' Y.A. (Youri) ', 'van Tol', 13, 'placeholder-member.png', 3),
(14, ' P.H.M. (Peter) ', 'Huits', 14, 'placeholder-member.png', 3),
(15, ' J.J. (Johan) ', 'Visser', 15, 'placeholder-member.png', 3),
(16, ' P.N.S. (Peter) ', 'Boon', 16, 'placeholder-member.png', 3),
(17, ' G.E.K. (Gerard) ', 'Schouten', 17, 'placeholder-member.png', 3),
(18, ' W.M. (Wil) ', 'Niesten-Vork', 18, 'placeholder-member.png', 3),
(19, ' E.G. (Els) ', 'van de Giesen-Ruiter', 19, 'placeholder-member.png', 3),
(20, ' J.C.J. (Hans) ', 'van Kampen', 20, 'placeholder-member.png', 3),
(21, ' C.W. (Kees) ', 'de Wit', 21, 'placeholder-member.png', 3),
(22, ' H. (Hillie) ', 'Tams-Ferwerda', 22, 'placeholder-member.png', 3),
(23, ' H.A.C. (Hedwig) ', 'Komproe', 23, 'placeholder-member.png', 3),
(24, ' L.W.M. (Leo) ', 'de Groot', 24, 'placeholder-member.png', 3),
(25, ' W. (Willem) ', 'Joling', 25, 'placeholder-member.png', 3),
(26, ' C. (Calvin) ', 'Ruijs', 26, 'placeholder-member.png', 3),
(27, ' J.N.J.J. (Jos) ', 'Beemsterboer', 27, 'placeholder-member.png', 3),
(28, ' J.G.J.M. (Coby) ', 'van Noort-Zonneveld', 28, 'placeholder-member.png', 3),
(29, ' C.M. (Nel) ', 'Boersen-Bergen', 29, 'placeholder-member.png', 3),
(30, ' B.J. (Ben) ', 'Wolters', 30, 'placeholder-member.png', 3),
(31, ' C.W. (Cora) ', 'Blankendaal', 31, 'placeholder-member.png', 3),
(32, ' B.G. (Bart) ', 'van Duin', 32, 'placeholder-member.png', 3),
(33, ' J. (Jan) ', 'Prij', 33, 'placeholder-member.png', 3),
(34, ' C.J. (Cindy) ', 'Rijbroek-Hijink', 34, 'placeholder-member.png', 3),
(35, ' N.J. (Koos) ', 'Broersen', 35, 'placeholder-member.png', 3),
(36, ' J. (Jelle) ', 'Vrijhof', 36, 'placeholder-member.png', 3),
(37, ' P.C. (Piet) ', 'Kleverlaan', 37, 'placeholder-member.png', 3),
(38, ' W.B. (Wil) ', 'de Groot', 38, 'placeholder-member.png', 3),
(39, ' A.N.M. (Adrie) ', 'de Wit', 39, 'placeholder-member.png', 3),
(40, ' J.A. (Jan) ', 'Pronk', 40, 'placeholder-member.png', 3),
(41, ' H. (Henk) ', 'van Zanten', 41, 'placeholder-member.png', 3),
(42, ' D.P.W. (Daniël) ', 'Rustenburg', 42, 'placeholder-member.png', 3),
(43, ' P.A.M. (Paula) ', 'van Duin-Scholten', 43, 'placeholder-member.png', 3),
(44, ' D.C. (Daphne) ', 'Rob', 44, 'placeholder-member.png', 3),
(45, ' S.P.T. (Sam) ', 'Boersen', 45, 'placeholder-member.png', 3),
(46, ' G.J. (Gert-Jan) ', 'Slijkerman', 46, 'placeholder-member.png', 3),
(47, ' S.J.A. (Sigge) ', 'van der Veek', 47, 'placeholder-member.png', 3),
(48, ' S.M. (Sander) ', 'Lensink', 48, 'placeholder-member.png', 3),
(49, ' H.C. (Bram) ', 'Broersen', 49, 'placeholder-member.png', 3),
(50, ' J.C.J. (Jelle) ', 'Beemsterboer', 50, 'placeholder-member.png', 3),
(51, ' P.F.J. (Perry)', 'Vriend', 1, 'seniorenpartij-perryvriend.jpg', 4),
(52, ' A.S. (Andre)', 'Groot', 2, 'placeholder-member.png', 4),
(53, ' M.C.M. (Marga)', 'Mulder-Keij', 3, 'placeholder-member.png', 4),
(54, ' M.A.F. (Marianne)', 'Wijnker', 4, 'placeholder-member.png', 4),
(55, ' C.H.J. (Cor)', 'Quint', 5, 'placeholder-member.png', 4),
(56, ' G.E.M. (Truus)', 'Cooper-Limmen', 6, 'placeholder-member.png', 4),
(57, ' L.G.M. (Louis)', 'Roozendaal', 7, 'placeholder-member.png', 4),
(58, ' A.P.L. (Arthur)', 'van de Wateringen', 8, 'placeholder-member.png', 4),
(59, ' A. (Ton)', 'Schouten', 9, 'placeholder-member.png', 4),
(60, ' C.C. (Cietjong)', 'Wang', 10, 'placeholder-member.png', 4),
(61, ' B.H. (Ben)', 'Wissink', 11, 'placeholder-member.png', 4),
(62, ' G.R. (Gjalt)', 'Bloembergen', 12, 'placeholder-member.png', 4),
(63, ' I.B.M. (Ivonne)', 'Bosman-van Kessel', 13, 'placeholder-member.png', 4),
(64, ' D. (Dick)', 'Dam', 14, 'placeholder-member.png', 4),
(65, ' L.M. (Leen)', 'van Dipten', 15, 'placeholder-member.png', 4),
(66, ' P.T. (Piet)', 'Drieenhuizen', 16, 'placeholder-member.png', 4),
(67, ' G.H. (Ger)', 'de Haan', 17, 'placeholder-member.png', 4),
(68, ' C.M. (Connie)', 'Mensingh-de Ruigh', 18, 'placeholder-member.png', 4),
(69, ' W.E. (Wil)', 'Mulder', 19, 'placeholder-member.png', 4),
(70, ' G.J. (Gerard)', 'Schagen', 20, 'placeholder-member.png', 4),
(71, ' J.M.M. (Sabine)', 'Schravemade-Vriend', 21, 'placeholder-member.png', 4),
(72, ' M.A.J. (Ria)', 'Vriend-van der Helm', 22, 'placeholder-member.png', 4),
(73, ' E.J.M. (Ellen)', 'van de Wateringen', 23, 'placeholder-member.png', 4),
(74, ' J. (Jaap)', 'Wit', 24, 'placeholder-member.png', 4),
(76, ' A.M. (Angelique)', 'van Wijk - Ligthart', 1, 'vvd-angeliquevanwijk.jpg', 5),
(77, ' W.J. (Willem-Jan)', 'Stam', 2, 'placeholder-member.png', 5),
(78, ' R.A.J. (Roel)', 'Takes', 3, 'placeholder-member.png', 5),
(79, ' J. (Jur)', 'Perton', 4, 'placeholder-member.png', 5),
(80, ' P.J. (Peter)', 'Vlam', 5, 'placeholder-member.png', 5),
(81, ' H.M.I.N. (Heleen)', 'Stoelinga-Souman', 6, 'placeholder-member.png', 5),
(82, ' W.M. (Willem)', 'van de Sande', 7, 'placeholder-member.png', 5),
(83, ' C. (Claudio)', 'Blok', 8, 'placeholder-member.png', 5),
(84, ' A. (Alie)', 'Bos', 9, 'placeholder-member.png', 5),
(85, ' E. (Eva)', 'Buis', 10, 'placeholder-member.png', 5),
(86, ' A.A.N.P. (Arjan)', 'Ligthart', 11, 'placeholder-member.png', 5),
(87, ' M.M. (Martien)', 'Baltus', 12, 'placeholder-member.png', 5),
(88, ' V.A. (Volkert)', 'Bakker', 13, 'placeholder-member.png', 5),
(89, ' J.P. (Jeroen)', 'Groot', 14, 'placeholder-member.png', 5),
(90, ' T.A. (Thomas)', 'van der Ploeg', 15, 'placeholder-member.png', 5),
(91, ' P.J. (Piet)', 'Marees', 16, 'placeholder-member.png', 5),
(92, ' J. (Jan)', 'Bouwes', 17, 'placeholder-member.png', 5),
(93, ' L. (Lars)', 'Dignum', 1, 'jesslokaal-larsdignum.jpg', 6),
(94, ' S.C. (Simco)', 'Kruijer', 2, 'placeholder-member.png', 6),
(95, ' J.P. (Jack)', 'Kruijer', 3, 'placeholder-member.png', 6),
(96, ' M. (Marijn)', 'Streefkerk', 4, 'placeholder-member.png', 6),
(97, ' R.P. (Ron)', 'Zut', 5, 'placeholder-member.png', 6),
(98, ' M. (Maaike)', 'Tesselaar', 6, 'placeholder-member.png', 6),
(99, ' J.T. (Hans)', 'Kröger', 7, 'placeholder-member.png', 6),
(100, ' C.H.T. (Carla)', 'Rampen - van de Put', 8, 'placeholder-member.png', 6),
(101, ' W. (Wietse)', 'de Vries', 9, 'placeholder-member.png', 6),
(102, ' D. (Dirk)', 'van Egmond', 10, 'placeholder-member.png', 6),
(103, ' P.D. (Petra)', 'Taams', 11, 'placeholder-member.png', 6),
(104, ' L.J. (Lars)', 'Haver', 12, 'placeholder-member.png', 6),
(105, ' P.J. (Patrick)', 'van Emmerik', 13, 'placeholder-member.png', 6),
(106, ' A. (Andrea)', 'Raap', 14, 'placeholder-member.png', 6),
(107, ' H.C. (Harry)', 'van der Salm', 15, 'placeholder-member.png', 6),
(108, ' H. (Henk)', 'Rijs', 16, 'placeholder-member.png', 6),
(109, ' I.W.A. (Irene)', 'Kramer', 17, 'placeholder-member.png', 6),
(110, ' K.P. (Koen)', 'Zutt', 18, 'placeholder-member.png', 6),
(111, ' J.J. (Jacob Jan)', 'de Vries', 19, 'placeholder-member.png', 6),
(112, ' M.M. (Thildy)', 'van Diepen - Rampen', 20, 'placeholder-member.png', 6),
(113, ' R. (Ronald)', 'Helvrich', 21, 'placeholder-member.png', 6),
(114, ' J.K. (Joëlle)', 'Kat', 22, 'placeholder-member.png', 6),
(115, ' S.M.T.J. (Sjef)', 'Otto', 23, 'placeholder-member.png', 6),
(116, ' P.J. (Peter Jaap)', 'Don', 24, 'placeholder-member.png', 6),
(117, ' M.C. (Margreet)', 'de Graaf', 25, 'placeholder-member.png', 6),
(118, ' W. (Willem)', 'van der Ham', 26, 'placeholder-member.png', 6),
(119, ' J.G. (Hans)', 'Nieman', 27, 'placeholder-member.png', 6),
(120, ' S. (Sander)', 'Kaandorp', 28, 'placeholder-member.png', 6),
(121, ' C. (Nel)', 'Raap - Zwart', 29, 'placeholder-member.png', 6),
(122, ' W.L. (Rens)', 'Cappon', 30, 'placeholder-member.png', 6),
(123, ' V.C. (Vera)', 'van Vuuren', 1, 'pvda-veravanvuuren.jpg', 7),
(124, ' S. (Samuel)', 'Muntjewerf', 2, 'placeholder-member.png', 7),
(125, ' M.G. (Mirjam)', 'van Musscher', 3, 'placeholder-member.png', 7),
(126, ' A.H. (Helga)', 'Wagemaker', 4, 'placeholder-member.png', 7),
(127, ' J.J. (Hans)', 'Heddes', 5, 'placeholder-member.png', 7),
(128, ' H.C.P.M. (Harry)', 'Piket', 6, 'placeholder-member.png', 7),
(129, ' J.C. (Jan)', 'Schrijver', 7, 'placeholder-member.png', 7),
(130, ' S.E.B. (Sabine)', 'Juckenack', 8, 'placeholder-member.png', 7),
(131, ' B. (Ben)', 'Blonk', 9, 'placeholder-member.png', 7),
(132, ' R. (Roosje)', 'Numan', 10, 'placeholder-member.png', 7),
(133, ' M.C. (Martin)', 'van der Jagt', 11, 'placeholder-member.png', 7),
(134, ' K.M. (Marlene)', 'Talsma-Hoejenbos', 12, 'placeholder-member.png', 7),
(135, ' P. (Pieter)', 'van der Wal', 13, 'placeholder-member.png', 7),
(136, ' J.W. (Marianne)', 'Janssen-de Koning', 14, 'placeholder-member.png', 7),
(137, ' P. (Philip)', 'van der Zee', 15, 'placeholder-member.png', 7),
(138, ' M.A.M. (Marga)', 'de Groen', 16, 'placeholder-member.png', 7),
(139, ' J. (Jan)', 'Muntjewerf', 17, 'placeholder-member.png', 7),
(140, ' J.J.H. (Jolijn)', 'van Dijk', 18, 'placeholder-member.png', 7),
(141, ' R. (Rienk)', 'Mud', 19, 'placeholder-member.png', 7),
(142, ' J. (Jannie)', 'Paarlberg', 20, 'placeholder-member.png', 7),
(143, ' R.J. (Rolf)', 'Klant', 21, 'placeholder-member.png', 7),
(144, ' M.G. (Bertie)', 'van Mourik', 22, 'placeholder-member.png', 7),
(145, ' J. (Jaap)', 'Goudsmit', 23, 'placeholder-member.png', 7),
(146, ' R.B. (Ruud)', 'Zoon', 24, 'placeholder-member.png', 7),
(147, ' M.A.J. (Marc)', 'Moussault', 25, 'placeholder-member.png', 7),
(148, ' F. (Erik)', 'van Vliet', 26, 'placeholder-member.png', 7),
(149, ' M.A. (Marjan)', 'Leijen', 27, 'placeholder-member.png', 7),
(177, ' L.A.J. (Lambert)', 'Riteco', 1, 'groenlinks-lambertriteco.jpg', 8),
(178, ' J.W. (Joke)', 'Menkveld', 2, 'placeholder-member.png', 8),
(179, ' B.W. (Ben)', 'Sintenie', 3, 'placeholder-member.png', 8),
(180, ' A.J.J. (André)', 'Bijlsma', 4, 'placeholder-member.png', 8),
(181, ' K.D. (Kelly)', 'Groen', 5, 'placeholder-member.png', 8),
(182, ' G. (Gerrit)', 'Rot', 6, 'placeholder-member.png', 8),
(183, ' S.J. (Sandra)', 'Komen - de Leeuw', 7, 'placeholder-member.png', 8),
(184, ' J. (Jacob)', 'Bart', 8, 'placeholder-member.png', 8),
(185, ' I.D.G.M. (Isabelle)', 'Brus', 9, 'placeholder-member.png', 8),
(186, ' M.J. (Maureen)', 'Mazurel', 10, 'placeholder-member.png', 8),
(187, ' M. (Mo)', 'Ismael', 11, 'placeholder-member.png', 8),
(188, ' J.E.B. (Hans)', 'van der Geest - Donkers', 12, 'placeholder-member.png', 8),
(189, ' A.H.M. (Lineke)', 'Kleemans', 13, 'placeholder-member.png', 8),
(190, ' R. (Ruud)', 'Maarschall', 14, 'placeholder-member.png', 8),
(191, ' R.P. (Ruud)', 'Bakker', 15, 'placeholder-member.png', 8),
(192, ' F.N.J. (Frans)', 'Jansen', 1, 'd66-fransjansen.jpg', 9),
(193, ' M. (Margriet)', 'Struijf', 2, 'placeholder-member.png', 9),
(194, ' H. (Harry)', 'Vogel', 3, 'placeholder-member.png', 9),
(195, ' J.G. (Hans)', 'Horn', 4, 'placeholder-member.png', 9),
(196, ' J.A. (Hanneke)', 'Toorenent-Jonker', 5, 'placeholder-member.png', 9),
(197, ' M.M.A. (Margreet)', 'Frowijn-Druijven', 6, 'placeholder-member.png', 9),
(198, ' E.M.M. (Liesbeth)', 'Vlietstra-Wouterse', 7, 'placeholder-member.png', 9),
(199, ' C. (Kees)', 'Veenvliet', 8, 'placeholder-member.png', 9),
(200, ' J.C. (Jaap)', 'Jansen', 9, 'placeholder-member.png', 9),
(201, ' J. (Jolanda)', 'van Opbergen-Velthuizen', 10, 'placeholder-member.png', 9),
(202, ' A.A.J. (Harry)', 'van Drimmelen', 11, 'placeholder-member.png', 9),
(203, ' M.S. (Marijke)', 'Meijer-van den Broek', 12, 'placeholder-member.png', 9),
(204, ' P.H. (Paul)', 'de Winter', 13, 'placeholder-member.png', 9),
(205, ' N.A. (Nick)', 'Velt', 14, 'placeholder-member.png', 9),
(206, ' W.P. (Wim)', 'Rijnders', 1, 'sp-wimrijnders.jpg', 10),
(207, ' U.L.M. (Ursula)', 'Smit-Kiekebos', 2, 'placeholder-member.png', 10),
(208, ' G.L. (Leo)', 'van der Harst', 3, 'placeholder-member.png', 10),
(209, ' A.M.M. (Jeanne)', 'Pouw', 4, 'placeholder-member.png', 10),
(210, ' H. (Henk)', 'de Boer', 5, 'placeholder-member.png', 10),
(211, ' G.P. (Galina)', 'Piket', 6, 'placeholder-member.png', 10),
(212, ' S. (Sander)', 'Rezelman', 7, 'placeholder-member.png', 10),
(213, ' J.J.P. (Jeroen)', 'Muntjewerf', 8, 'placeholder-member.png', 10),
(214, ' M. (Margreet)', 'Komen-van Dijk', 9, 'placeholder-member.png', 10),
(215, ' B.G.C. (Bjarne)', 'Rezelman', 10, 'placeholder-member.png', 10),
(216, ' C.P. (Nel)', 'Loeve', 11, 'placeholder-member.png', 10),
(217, ' R.G. (Ronald)', 'Komen', 12, 'placeholder-member.png', 10),
(218, ' W.G. (Wilma)', 'Hoogeboom', 13, 'placeholder-member.png', 10),
(219, ' H.P. (Merieke)', 'Bredewold', 1, 'wens4u-meriekebredewold.jpg', 11),
(220, ' J.H. (Jacqueline)', 'Freijsen-Vacano', 2, 'placeholder-member.png', 11),
(221, ' M.C. (Margreet)', 'Verloop', 3, 'placeholder-member.png', 11),
(222, ' L. (Linda)', 'Steijger', 4, 'placeholder-member.png', 11),
(223, ' S. (Suzanne)', 'Steijger', 5, 'placeholder-member.png', 11),
(224, ' F. (Emma)', 'Hartman', 6, 'placeholder-member.png', 11),
(225, ' M. (Marjolein)', 'Visscher-Spakman', 7, 'placeholder-member.png', 11),
(226, ' H.E. (Hilda)', 'Bloem-van der Wel', 8, 'placeholder-member.png', 11),
(227, ' R.D. (Rudi)', 'Sedney', 9, 'placeholder-member.png', 11),
(228, ' M. (Marcel)', 'Cornelisse', 10, 'placeholder-member.png', 11),
(229, ' M.I.P. (Ingrid)', 'Melchers', 11, 'placeholder-member.png', 11),
(230, ' R.C.M. (Rob)', 'Hogenes', 12, 'placeholder-member.png', 11),
(231, ' P. (Piet)', 'Wit', 13, 'placeholder-member.png', 11),
(232, ' S. (Nina)', 'Obradović', 14, 'placeholder-member.png', 11),
(233, ' G.M. (Gaülli)', 'Stam', 15, 'placeholder-member.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `municipalityID` int(4) NOT NULL,
  `municipalityname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`municipalityID`, `municipalityname`) VALUES
(3, 'Schagen'),
(4, 'Den Helder'),
(5, 'Amsterdam'),
(6, 'Rotterdam'),
(7, 'Alkmaar');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `partyID` int(11) NOT NULL,
  `partyname` varchar(64) NOT NULL,
  `partyinfo` varchar(1024) NOT NULL,
  `partylogo` varchar(64) NOT NULL,
  `municipalityID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`partyID`, `partyname`, `partyinfo`, `partylogo`, `municipalityID`) VALUES
(3, 'CDA', 'Test info', 'cda.png', 3),
(4, 'Seniorenpartij Schagen', '', 'ouderenpartijschagen.png', 3),
(5, 'VVD', '', 'vvd.png', 3),
(6, 'JessLokaal', '', 'jesslokaal.png', 3),
(7, 'Partij van de Arbeid (P.v.d.A.)', '', 'pvda.png', 3),
(8, 'GROENLINKS', '', 'groenlinks.png', 3),
(9, 'D66', 'het is wat het is', 'd66.png', 3),
(10, 'SP (Socialistische Partij)', '', 'sp.png', 3),
(11, 'Wens4U (wij en Schagen voor u)', '', 'wens4u.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `voteID` int(10) NOT NULL,
  `codeID` int(10) NOT NULL,
  `memberID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`voteID`, `codeID`, `memberID`) VALUES
(1, 0, 51);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`codeID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `party` (`partyID`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`municipalityID`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`partyID`),
  ADD KEY `municipality` (`municipalityID`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`voteID`),
  ADD KEY `code` (`codeID`),
  ADD KEY `member` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `partyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `voteID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `party` FOREIGN KEY (`partyID`) REFERENCES `party` (`partyID`);

--
-- Constraints for table `party`
--
ALTER TABLE `party`
  ADD CONSTRAINT `municipality` FOREIGN KEY (`municipalityID`) REFERENCES `municipality` (`municipalityID`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `code` FOREIGN KEY (`codeID`) REFERENCES `code` (`codeID`),
  ADD CONSTRAINT `member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
