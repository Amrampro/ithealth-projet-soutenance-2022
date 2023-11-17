-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 09:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ithealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `idmedecin` int(11) NOT NULL,
  `idadministrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `authorisationconsult`
--

CREATE TABLE `authorisationconsult` (
  `idauth` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorisationconsult`
--

INSERT INTO `authorisationconsult` (`idauth`, `idpatient`, `idmedecin`) VALUES
(2, 6, 3),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `idchatbot` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL,
  `idadministrateur` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `question` varchar(254) DEFAULT NULL,
  `reponse` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `idconsultation` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `taille` varchar(10) DEFAULT NULL,
  `tension` varchar(10) DEFAULT NULL,
  `temperature` varchar(10) DEFAULT NULL,
  `poids` varchar(10) DEFAULT NULL,
  `dateconsult` datetime DEFAULT current_timestamp(),
  `noteconsult` varchar(254) DEFAULT NULL,
  `descision` varchar(254) DEFAULT NULL,
  `matricule` varchar(254) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`idconsultation`, `idmedecin`, `idpatient`, `taille`, `tension`, `temperature`, `poids`, `dateconsult`, `noteconsult`, `descision`, `matricule`, `annee`) VALUES
(1, 1, 1, NULL, '15', '38', '62', '2022-10-06 10:50:20', 'VIDUDHDIKHWHIUYYWSCSDC', 'IUFUISIFUUIFIUIUFIUSDF', 'CNSOOA10', 2020),
(2, 1, 6, '45', '5', '5', '5', '2022-10-09 20:59:49', '453', '454', 'CONS6SCE7M4lQ3', NULL),
(3, 1, 6, '45', '5', '5', '5', '2022-10-09 21:01:40', '453', '454', 'CONS6SCE7M4lQ3', NULL),
(4, 1, 6, '45', '5', '5', '5', '2022-10-09 21:03:00', '453', '454', 'CONS6SCE7M4lQ3', NULL),
(5, 1, 6, '45', '5', '5', '5', '2022-10-09 21:06:12', '5FAq', '5FAt', 'CONS6SCE7M4lQ3', NULL),
(6, 1, 1, '1', '15', '38', '68', '2022-10-09 21:08:00', 'nQR1aJhsOJaEVeD0CKEZDrkv8ns3TH3QLjfP', 'lgRwOpkpfZomkvH/BOURT6Zu/3Jk', 'CONS1pSJe4Pid8', NULL),
(7, 3, 1, '1', '15', '38', '65', '2022-10-14 10:25:46', 'pBFtLY99', 'pBFtLY99', 'CONS8L0oQxC9t9', NULL),
(8, 3, 1, '5', '5', '5', '5', '2022-10-14 10:40:41', 'pBd4PZFo', 'tR14JZVnOIYi3/fjRe8R', 'CONSOdFUg2jUVy', NULL),
(9, 1, 1, '1,80', '15,0', '38,6', '68,5', '2022-10-14 10:49:51', 'nQR1aJhsOIwijfLi', 'ggBpJ48pfZZnif3iTfURT6V9VbdhTw==', 'CONSz8Co1bNrpj', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examens`
--

CREATE TABLE `examens` (
  `idexamen` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `facteurrhesus` varchar(254) DEFAULT NULL,
  `pretraitements` varchar(254) DEFAULT NULL,
  `allergies` varchar(254) DEFAULT NULL,
  `maladies` varchar(254) DEFAULT NULL,
  `plainte` varchar(254) DEFAULT NULL,
  `diagnostic` varchar(254) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `etat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `idfacture` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `idconsultation` int(11) NOT NULL,
  `examin` int(11) DEFAULT NULL,
  `par` int(11) DEFAULT NULL,
  `matricule` varchar(254) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `avance` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

CREATE TABLE `historique` (
  `idhistorique` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL,
  `idadministrateur` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `evenement` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `idmedecin` int(11) NOT NULL,
  `idspecialite` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `login` varchar(254) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `statut` int(11) DEFAULT 1,
  `dernierecon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`idmedecin`, `idspecialite`, `nom`, `prenom`, `login`, `password`, `tel`, `created`, `email`, `statut`, `dernierecon`) VALUES
(1, 2, 'Boba', 'Jean', 'ttt', '$2y$10$s9VzIMmqJdvIiADeHRmq4.hkwI5CnBGIHqdlLfVQYDmIpc6N.Df7i', 658214785, '2022-09-30 14:47:39', 'boba@gmail.com', 1, '2022-10-14 11:48:32'),
(3, 5, 'Rohn', 'Bernard', 'rrr', '$2y$10$s9VzIMmqJdvIiADeHRmq4.hkwI5CnBGIHqdlLfVQYDmIpc6N.Df7i', 698547123, '2022-09-30 15:24:54', 'robert@yahoo.fr', 1, '2022-10-14 18:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `idmessage` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL,
  `type` varchar(254) DEFAULT NULL,
  `content` varchar(254) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `isunread` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `idpatient` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `genre` varchar(1) DEFAULT NULL,
  `adresse` varchar(250) NOT NULL,
  `groupsanguin` varchar(254) DEFAULT NULL,
  `datenais` date DEFAULT NULL,
  `image` varchar(254) DEFAULT NULL,
  `mat` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `pass` varchar(254) DEFAULT NULL,
  `question` varchar(254) DEFAULT NULL,
  `reponse` varchar(254) DEFAULT NULL,
  `dernierecon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idpatient`, `nom`, `prenom`, `genre`, `adresse`, `groupsanguin`, `datenais`, `image`, `mat`, `email`, `tel`, `pass`, `question`, `reponse`, `dernierecon`) VALUES
(1, 'Alain', 'Moba', 'M', 'Awae escalier, 33700 Yaounde, Cameroun', 'B+', '1999-09-21', NULL, 'PA0023', 'patient@gmail.com', 963258, '$2y$10$s9VzIMmqJdvIiADeHRmq4.hkwI5CnBGIHqdlLfVQYDmIpc6N.Df7i', 'Qui est monap', 'personne', NULL),
(6, 'Anima', 'Josephine', 'M', 'ljikk', 'O-', '2015-10-20', 'conversation entre utilisateurs.png', 'IHP3bRnQLQuYE', 'kj@jhdf.f', 64764678, '$2y$10$56cbIpcw2GYAtk.wIDNzxedVG/S75h2vT1J4y0Y91st.7jmHmK7RC', 'kjkj', 'kjk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rdv`
--

CREATE TABLE `rdv` (
  `idrdv` int(11) NOT NULL,
  `idpatient` int(11) NOT NULL,
  `idmedecin` int(11) NOT NULL,
  `libelle` varchar(254) DEFAULT NULL,
  `matricule` varchar(254) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `etat` int(11) DEFAULT 2,
  `statut` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rdv`
--

INSERT INTO `rdv` (`idrdv`, `idpatient`, `idmedecin`, `libelle`, `matricule`, `date`, `heure`, `etat`, `statut`) VALUES
(1, 1, 1, 'Verification', 'TTT', '2022-10-10', '06:52:40', 0, 0),
(2, 1, 1, 'test final', 'TTT', '2022-09-15', '14:53:31', 2, 0),
(3, 1, 3, 'examin', 'ppp', '2022-10-13', '14:26:35', 1, 0),
(4, 1, 1, 'Visite simple', 'VIFBV8e', '2022-10-20', '12:20:00', 2, 0),
(5, 1, 3, 'Visite finale', 'VI8QIZW', '2022-10-14', '12:13:00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

CREATE TABLE `specialite` (
  `idspecialite` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialite`
--

INSERT INTO `specialite` (`idspecialite`, `nom`) VALUES
(1, 'Anatomie et cytologie pathologiques'),
(2, 'Cardiologue'),
(3, 'Dentiste'),
(4, 'Neurologue'),
(5, 'Virologue'),
(6, 'Endocrinologue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idmedecin`,`idadministrateur`);

--
-- Indexes for table `authorisationconsult`
--
ALTER TABLE `authorisationconsult`
  ADD PRIMARY KEY (`idauth`),
  ADD KEY `fk_association12` (`idpatient`),
  ADD KEY `fk_association13` (`idmedecin`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`idchatbot`),
  ADD KEY `fk_association1` (`idpatient`),
  ADD KEY `fk_association11` (`idmedecin`,`idadministrateur`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`idconsultation`),
  ADD KEY `fk_association5` (`idmedecin`),
  ADD KEY `fk_association6` (`idpatient`);

--
-- Indexes for table `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`idexamen`),
  ADD KEY `fk_association17` (`idpatient`),
  ADD KEY `fk_association18` (`idmedecin`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`idfacture`),
  ADD KEY `fk_association16` (`idpatient`),
  ADD KEY `fk_association9` (`idconsultation`);

--
-- Indexes for table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`idhistorique`),
  ADD KEY `fk_association10` (`idmedecin`,`idadministrateur`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idmedecin`),
  ADD KEY `fk_association14` (`idspecialite`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `fk_association2` (`idpatient`),
  ADD KEY `fk_association3` (`idmedecin`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idpatient`);

--
-- Indexes for table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`idrdv`),
  ADD KEY `fk_association19` (`idpatient`),
  ADD KEY `fk_association20` (`idmedecin`);

--
-- Indexes for table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`idspecialite`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorisationconsult`
--
ALTER TABLE `authorisationconsult`
  MODIFY `idauth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `idchatbot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `idconsultation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `examens`
--
ALTER TABLE `examens`
  MODIFY `idexamen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `idfacture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historique`
--
ALTER TABLE `historique`
  MODIFY `idhistorique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `idmedecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `idpatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `idrdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `idspecialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `fk_generalisation_1` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`);

--
-- Constraints for table `authorisationconsult`
--
ALTER TABLE `authorisationconsult`
  ADD CONSTRAINT `fk_association12` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_association13` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`);

--
-- Constraints for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD CONSTRAINT `fk_association1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_association11` FOREIGN KEY (`idmedecin`,`idadministrateur`) REFERENCES `administrateur` (`idmedecin`, `idadministrateur`);

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `fk_association5` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`),
  ADD CONSTRAINT `fk_association6` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Constraints for table `examens`
--
ALTER TABLE `examens`
  ADD CONSTRAINT `fk_association17` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_association18` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`);

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `fk_association16` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_association9` FOREIGN KEY (`idconsultation`) REFERENCES `consultations` (`idconsultation`);

--
-- Constraints for table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `fk_association10` FOREIGN KEY (`idmedecin`,`idadministrateur`) REFERENCES `administrateur` (`idmedecin`, `idadministrateur`);

--
-- Constraints for table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `fk_association14` FOREIGN KEY (`idspecialite`) REFERENCES `specialite` (`idspecialite`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_association2` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_association3` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`);

--
-- Constraints for table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_association19` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`),
  ADD CONSTRAINT `fk_association20` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
