-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 juil. 2021 à 09:57
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `insea_2021`
--

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

DROP TABLE IF EXISTS `cycle`;
CREATE TABLE IF NOT EXISTS `cycle` (
  `Cycle_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_Cycle` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Cycle_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`Cycle_ID`, `Libelle_Cycle`) VALUES
(1, 'ingenieur'),
(2, 'Master'),
(3, 'Doctorat');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `ID_Etud` int(11) NOT NULL AUTO_INCREMENT,
  `Matricule_Etud` int(11) NOT NULL,
  `Nom_Etud` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom_Etud` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Cycle_ID` int(11) NOT NULL,
  `Filiere_ID` int(11) NOT NULL,
  `Niveau_ID` int(11) NOT NULL,
  `Sexe_Etud` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `Date_Nais_Etud` date NOT NULL,
  `Date_Ins_Etud` date NOT NULL,
  `Photo_Etud` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Etud`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`ID_Etud`, `Matricule_Etud`, `Nom_Etud`, `Prenom_Etud`, `Cycle_ID`, `Filiere_ID`, `Niveau_ID`, `Sexe_Etud`, `Date_Nais_Etud`, `Date_Ins_Etud`, `Photo_Etud`) VALUES
(1, 555, 'nom1', 'prenom1', 1, 5, 1, 'F', '2000-07-15', '2020-10-10', '');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `Filiere_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_Filiere` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Filiere_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`Filiere_ID`, `Libelle_Filiere`) VALUES
(1, 'Actuariat'),
(2, 'Stat-eco'),
(3, 'Stat-demo'),
(4, 'ROAD'),
(5, 'DSE'),
(6, 'DS');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `Niveau_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_Niveau` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Niveau_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`Niveau_ID`, `Libelle_Niveau`) VALUES
(1, '1A'),
(2, '2A'),
(3, '3A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
