-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 13, 2021 alle 08:51
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova_esame_2017`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `autisti`
--

CREATE TABLE `autisti` (
  `Npatente` char(10) NOT NULL,
  `Scadenza` char(10) DEFAULT NULL,
  `nick` char(40) DEFAULT NULL,
  `CF` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `auto`
--

CREATE TABLE `auto` (
  `targa` char(7) NOT NULL,
  `modello` char(22) DEFAULT NULL,
  `alimentazione` char(22) DEFAULT NULL,
  `Npatente` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `av`
--

CREATE TABLE `av` (
  `Npatente` char(10) DEFAULT NULL,
  `CodV` int(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `passegieri`
--

CREATE TABLE `passegieri` (
  `CodP` char(22) NOT NULL,
  `nick` char(40) DEFAULT NULL,
  `CF` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `pr`
--

CREATE TABLE `pr` (
  `CodR` int(22) DEFAULT NULL,
  `CodP` char(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `CodRec` int(16) NOT NULL,
  `numerico` char(22) DEFAULT NULL,
  `note` char(40) DEFAULT NULL,
  `tipo` char(22) DEFAULT NULL,
  `CF` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta`
--

CREATE TABLE `richiesta` (
  `CodR` int(22) NOT NULL,
  `partenza` char(22) DEFAULT NULL,
  `destinazione` char(22) DEFAULT NULL,
  `data` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `rv`
--

CREATE TABLE `rv` (
  `CodR` int(22) DEFAULT NULL,
  `CodV` int(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `CF` char(16) NOT NULL,
  `nome` char(22) DEFAULT NULL,
  `cognome` char(22) DEFAULT NULL,
  `tel` char(22) DEFAULT NULL,
  `foto` char(30) DEFAULT NULL,
  `email` char(22) DEFAULT NULL,
  `Npatente` char(10) DEFAULT NULL,
  `CodP` char(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE `viaggio` (
  `codV` int(22) NOT NULL,
  `partenza` char(22) DEFAULT NULL,
  `destinazione` char(22) DEFAULT NULL,
  `data` char(10) DEFAULT NULL,
  `oraP` char(22) DEFAULT NULL,
  `oraA` char(22) DEFAULT NULL,
  `Costo` char(6) DEFAULT NULL,
  `disponibilita` int(10) DEFAULT NULL,
  `note` char(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `autisti`
--
ALTER TABLE `autisti`
  ADD PRIMARY KEY (`Npatente`),
  ADD KEY `CF` (`CF`);

--
-- Indici per le tabelle `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`targa`),
  ADD KEY `Npatente` (`Npatente`);

--
-- Indici per le tabelle `av`
--
ALTER TABLE `av`
  ADD KEY `CodV` (`CodV`),
  ADD KEY `Npatente` (`Npatente`);

--
-- Indici per le tabelle `passegieri`
--
ALTER TABLE `passegieri`
  ADD PRIMARY KEY (`CodP`),
  ADD KEY `CF` (`CF`);

--
-- Indici per le tabelle `pr`
--
ALTER TABLE `pr`
  ADD KEY `CodP` (`CodP`),
  ADD KEY `CodR` (`CodR`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`CodRec`),
  ADD KEY `CF` (`CF`);

--
-- Indici per le tabelle `richiesta`
--
ALTER TABLE `richiesta`
  ADD PRIMARY KEY (`CodR`);

--
-- Indici per le tabelle `rv`
--
ALTER TABLE `rv`
  ADD KEY `CodV` (`CodV`),
  ADD KEY `CodR` (`CodR`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`CF`),
  ADD KEY `CodP` (`CodP`),
  ADD KEY `Npatente` (`Npatente`);

--
-- Indici per le tabelle `viaggio`
--
ALTER TABLE `viaggio`
  ADD PRIMARY KEY (`codV`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `autisti`
--
ALTER TABLE `autisti`
  ADD CONSTRAINT `autisti_ibfk_1` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`Npatente`) REFERENCES `autisti` (`Npatente`);

--
-- Limiti per la tabella `av`
--
ALTER TABLE `av`
  ADD CONSTRAINT `av_ibfk_1` FOREIGN KEY (`CodV`) REFERENCES `viaggio` (`codV`),
  ADD CONSTRAINT `av_ibfk_2` FOREIGN KEY (`Npatente`) REFERENCES `autisti` (`Npatente`);

--
-- Limiti per la tabella `passegieri`
--
ALTER TABLE `passegieri`
  ADD CONSTRAINT `passegieri_ibfk_1` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `pr`
--
ALTER TABLE `pr`
  ADD CONSTRAINT `pr_ibfk_1` FOREIGN KEY (`CodP`) REFERENCES `passegieri` (`CodP`),
  ADD CONSTRAINT `pr_ibfk_2` FOREIGN KEY (`CodR`) REFERENCES `richiesta` (`CodR`);

--
-- Limiti per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  ADD CONSTRAINT `recensioni_ibfk_1` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `rv`
--
ALTER TABLE `rv`
  ADD CONSTRAINT `rv_ibfk_1` FOREIGN KEY (`CodV`) REFERENCES `viaggio` (`codV`),
  ADD CONSTRAINT `rv_ibfk_2` FOREIGN KEY (`CodR`) REFERENCES `richiesta` (`CodR`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`CodP`) REFERENCES `passegieri` (`CodP`),
  ADD CONSTRAINT `utente_ibfk_2` FOREIGN KEY (`Npatente`) REFERENCES `autisti` (`Npatente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
