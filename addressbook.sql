-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Apr 2021 um 20:15
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `addressbook`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addressbook_tbl`
--

CREATE TABLE `addressbook_tbl` (
  `id` int(255) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `addressbook_tbl`
--

INSERT INTO `addressbook_tbl` (`id`, `firstname`, `lastname`, `city`, `address`, `email`, `telefon`, `time_stamp`) VALUES
(2, 'Arash', 'Talebi', 'Dortmund', 'Leutgendortmunderstr.46', 'arash.talebi@yahoo.com', '017643504545', '2021-04-14 18:14:10');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `addressbook_tbl`
--
ALTER TABLE `addressbook_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `addressbook_tbl`
--
ALTER TABLE `addressbook_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
