-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 15. Sep 2023 um 20:39
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mediasammlung_oop`
--
DROP DATABASE IF EXISTS `mediasammlung_oop`;
CREATE DATABASE IF NOT EXISTS `mediasammlung_oop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mediasammlung_oop`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `medium`
--

DROP TABLE IF EXISTS `medium`;
CREATE TABLE `medium` (
  `mediumID` int(11) NOT NULL,
  `mediumTitle` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mediumArtist` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mediumReleaseYear` int(11) DEFAULT NULL,
  `mediumMediumType` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mediumPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `medium`
--
ALTER TABLE `medium`
  ADD PRIMARY KEY (`mediumID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `medium`
--
ALTER TABLE `medium`
  MODIFY `mediumID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
