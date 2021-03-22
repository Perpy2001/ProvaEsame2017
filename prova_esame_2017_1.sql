-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 13, 2021 alle 11:18
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

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

--
-- Dump dei dati per la tabella `autisti`
--

INSERT INTO `autisti` (`Npatente`, `Scadenza`, `nick`, `CF`) VALUES
('VE1234567B', '31/12/2030', 'Spissa in testa', 'GRTNCL02D01L736B');

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

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`targa`, `modello`, `alimentazione`, `Npatente`) VALUES
('FD132BD', 'B.M.B. / Menarinibus \"', 'Metano', 'VE1234567B'),
('FF123DB', 'Mercedes Vito 9 Posti', 'Diesel', 'VE1234567B');

-- --------------------------------------------------------

--
-- Struttura della tabella `av`
--

CREATE TABLE `av` (
  `Npatente` char(10) NOT NULL,
  `CodV` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `av`
--

INSERT INTO `av` (`Npatente`, `CodV`) VALUES
('VE1234567B', 1),
('VE1234567B', 2),
('VE1234567B', 3),
('VE1234567B', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `passegieri`
--

CREATE TABLE `passegieri` (
  `CodP` char(22) NOT NULL,
  `nick` char(40) DEFAULT NULL,
  `CF` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `passegieri`
--

INSERT INTO `passegieri` (`CodP`, `nick`, `CF`) VALUES
('1', 'LordDermatite', 'GRTNCL02D01L736B');

-- --------------------------------------------------------

--
-- Struttura della tabella `pr`
--

CREATE TABLE `pr` (
  `CodR` int(22) NOT NULL,
  `CodP` char(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `pr`
--

INSERT INTO `pr` (`CodR`, `CodP`) VALUES
(1, '1');

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

--
-- Dump dei dati per la tabella `recensioni`
--

INSERT INTO `recensioni` (`CodRec`, `numerico`, `note`, `tipo`, `CF`) VALUES
(1, '4', 'Sarebbe il TOP se non si grattasse la te', 'passeggero', 'GRTNCL02D01L736B');

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

--
-- Dump dei dati per la tabella `richiesta`
--

INSERT INTO `richiesta` (`CodR`, `partenza`, `destinazione`, `data`) VALUES
(1, 'Venezia', 'Milano', '1/4/2020');

-- --------------------------------------------------------

--
-- Struttura della tabella `rv`
--

CREATE TABLE `rv` (
  `CodR` int(22) NOT NULL,
  `CodV` int(22) NOT NULL
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

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`CF`, `nome`, `cognome`, `tel`, `foto`, `email`, `Npatente`, `CodP`) VALUES
('GRTNCL02D01L736B', 'Nicolo', 'Grattatesta', '3331234567', '', 'GrattatestaNick@gmail.', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE `viaggio` (
  `codV` int(22) NOT NULL,
  `partenza` char(22) DEFAULT NULL,
  `destinazione` char(22) DEFAULT NULL,
  `data` char(10) DEFAULT NULL,
  `oraP` time DEFAULT NULL,
  `oraA` time DEFAULT NULL,
  `Costo` char(6) DEFAULT NULL,
  `disponibilita` int(10) DEFAULT NULL,
  `note` char(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `viaggio`
--

INSERT INTO `viaggio` (`codV`, `partenza`, `destinazione`, `data`, `oraP`, `oraA`, `Costo`, `disponibilita`, `note`) VALUES
(1, 'Venezia', 'Milano', '1/4/2020', '08:00:00', '11:00:00', '200', 3, ''),
(2, 'Venezia', 'Milano', '1/4/2020', '06:00:00', '09:00:00', '100', 7, ''),
(3, 'Venezia', 'Milano', '1/4/2020', '12:00:00', '16:00:00', '250', 8, ''),
(4, 'Venezia', 'Milano', '1/4/2020', '15:00:00', '21:00:00', '40', 35, 'Bus');

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
  ADD PRIMARY KEY (`Npatente`,`CodV`),
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
  ADD PRIMARY KEY (`CodR`,`CodP`),
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
  ADD PRIMARY KEY (`CodR`,`CodV`),
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
