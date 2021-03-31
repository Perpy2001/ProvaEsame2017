-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 31, 2021 alle 09:41
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

--
-- Dump dei dati per la tabella `autisti`
--

INSERT INTO `autisti` (`Npatente`, `Scadenza`, `nick`, `CF`) VALUES
('VE12121121', NULL, 'MegaClaudio69', '\"=\"=\"=\"'),
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
('VE12121121', 8),
('VE1234567B', 1),
('VE1234567B', 2),
('VE1234567B', 3),
('VE1234567B', 4),
('VE1234567B', 5),
('VE1234567B', 6),
('VE1234567B', 7);

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
('1', 'LordDermatite', 'GRTNCL02D01L736B'),
('2', 'MegaClaudio69', '\"=\"=\"=\"');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `Nprenotazione` int(22) NOT NULL,
  `codV` int(22) DEFAULT NULL,
  `CodR` int(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`Nprenotazione`, `codV`, `CodR`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL);

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
(1, '4', 'Sarebbe il TOP se non si grattasse la te', 'passeggero', 'GRTNCL02D01L736B'),
(2, '5', '', 'passeggero', 'GRTNCL02D01L736B'),
(3, '3', '', 'autista', 'GRTNCL02D01L736B'),
(4, '4', '', 'autista', 'GRTNCL02D01L736B'),
(5, '5', '', 'autista', 'GRTNCL02D01L736B');

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta`
--

CREATE TABLE `richiesta` (
  `CodR` int(22) NOT NULL,
  `partenza` char(22) DEFAULT NULL,
  `destinazione` char(22) DEFAULT NULL,
  `data` char(10) DEFAULT NULL,
  `CodV` int(22) DEFAULT NULL,
  `CodP` char(22) DEFAULT NULL
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
  `CodP` char(22) DEFAULT NULL,
  `Password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`CF`, `nome`, `cognome`, `tel`, `foto`, `email`, `Npatente`, `CodP`, `Password`) VALUES
('\"=\"=\"=\"', 'Claudio', 'Franchin', '6969696', NULL, 'dio@gmail.com', 'VE12121121', '2', 'cazziMii'),
('fjei dsfus0èd,of', 'Paolo', 'Paolli', 'f', NULL, 'gesdasd@dasdas', NULL, NULL, 'cazziMii'),
('GRTNCL02D01L736B', 'Nicolo', 'Grattatesta', '3331234567', '', 'GrattatestaNick@gmail', 'VE1234567B', '1', 'MiGrattoLaTesta');

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
(4, 'Venezia', 'Milano', '1/4/2020', '15:00:00', '21:00:00', '40', 35, 'Bus'),
(5, 'Sabaudi', 'oriago', '12/02', '10:00:00', '11:00:00', '200$', 3, 'nienete cani o messica'),
(6, 'Venezia', 'Norvegia', '12/02', '10:00:00', '11:00:00', '200$', 4, 'niente Messicani'),
(7, 'Venezia', 'Norvegia', '12/02', '10:00:00', '11:00:00', '200$', 4, 'niente Messicani'),
(8, 'Sabaudi', 'Norvegia', '12/02', '10:00:00', '11:00:00', '3£', 2, 'nienete cani o messica');

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
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`Nprenotazione`),
  ADD KEY `codV` (`codV`),
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
  ADD PRIMARY KEY (`CodR`),
  ADD KEY `CodV` (`CodV`),
  ADD KEY `CodP` (`CodP`);

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
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`codV`) REFERENCES `viaggio` (`codV`),
  ADD CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`CodR`) REFERENCES `richiesta` (`CodR`);

--
-- Limiti per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  ADD CONSTRAINT `recensioni_ibfk_1` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `richiesta`
--
ALTER TABLE `richiesta`
  ADD CONSTRAINT `richiesta_ibfk_1` FOREIGN KEY (`CodV`) REFERENCES `viaggio` (`codV`),
  ADD CONSTRAINT `richiesta_ibfk_2` FOREIGN KEY (`CodP`) REFERENCES `passegieri` (`CodP`);

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
