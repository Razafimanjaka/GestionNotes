-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Mars 2021 à 06:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gest_etu_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `matricule` varchar(5) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `mention` varchar(4) NOT NULL,
  `niveau` varchar(3) NOT NULL,
  `dateNaiss` varchar(15) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `codeMat` varchar(5) NOT NULL DEFAULT '',
  `nomMat` varchar(30) DEFAULT NULL,
  `coeff` int(2) DEFAULT NULL,
  `mention` varchar(5) NOT NULL,
  PRIMARY KEY (`codeMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `matricule` varchar(5) NOT NULL,
  `codeMat` varchar(5) NOT NULL,
  `note` float NOT NULL,
  KEY `matricule` (`matricule`),
  KEY `codeMat` (`codeMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note_et`
--

CREATE TABLE IF NOT EXISTS `note_et` (
  `numero_etu` varchar(5) NOT NULL,
  `codeM` varchar(5) NOT NULL,
  `noteNormal` float DEFAULT NULL,
  `noteRattr` float DEFAULT NULL,
  KEY `numero_etu` (`numero_etu`),
  KEY `codeM` (`codeM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`codeMat`) REFERENCES `matiere` (`codeMat`);

--
-- Contraintes pour la table `note_et`
--
ALTER TABLE `note_et`
  ADD CONSTRAINT `note_et_ibfk_1` FOREIGN KEY (`numero_etu`) REFERENCES `etudiant` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_et_ibfk_2` FOREIGN KEY (`codeM`) REFERENCES `matiere` (`codeMat`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
