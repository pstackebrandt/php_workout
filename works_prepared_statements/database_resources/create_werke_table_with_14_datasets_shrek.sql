-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 24. Aug 2023 um 21:08
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `buechersammlung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `werke`
--

CREATE TABLE `werke` (
  `werkeID` int(11) NOT NULL,
  `werkeAuthor` varchar(256) NOT NULL,
  `werkeTitle` varchar(256) NOT NULL,
  `werkeReleaseYear` year(4) NOT NULL,
  `werkeMediaType` varchar(20) NOT NULL,
  `werkePrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `werke`
--

INSERT INTO `werke` (`werkeID`, `werkeAuthor`, `werkeTitle`, `werkeReleaseYear`, `werkeMediaType`, `werkePrice`) VALUES
(1, 'Pedro', 'Wilde Geschichten', 2006, 'paperback', '29.95'),
(2, 'Pedro', 'Wilde Geschichten', 2006, 'paperback', '29.95'),
(3, 'Prinzessin Fiona', 'Mein Leben als Oger', 2022, 'hardcover', '20.99'),
(4, 'Prinzessin Fiona', 'Das Schloss hinter dem Drachen', 2021, 'audiobook', '15.99'),
(5, 'Prinzessin Fiona', 'Die Oger-Hochzeit', 2022, 'Hardcover', '20.50'),
(6, 'Prinzessin Fiona', 'Geschichten aus Far Far Away', 2021, 'Hörbuch', '18.99'),
(7, 'Prinzessin Fiona', 'Mein erster Tag als Oger', 2023, 'Foliant', '22.99'),
(8, 'Esel', 'Reise mit einem Oger', 2023, 'Paperback', '14.99'),
(9, 'Esel', 'Die besten Witze', 2021, 'Hörbuch', '9.50'),
(10, 'Gestiefelter Kater', 'Schwertkampf 101', 2022, 'Paperback', '15.99'),
(11, 'Zauberer Merlin', 'Magie für Anfänger', 2021, 'Hardcover', '24.50'),
(12, 'Königin Lilian', 'Regieren mit Stil', 2023, 'Foliant', '23.50'),
(13, 'Schneewittchen', 'Das wahre Märchen', 2021, 'Paperback', '13.99'),
(14, 'Robin Hood', 'Waldaventuren', 2022, 'Hardcover', '19.99');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `werke`
--
ALTER TABLE `werke`
  ADD PRIMARY KEY (`werkeID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `werke`
--
ALTER TABLE `werke`
  MODIFY `werkeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
