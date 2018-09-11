-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 11, 2018 at 09:03 AM
-- Server version: 10.2.8-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `avisbonneaddresse`
--

DROP TABLE IF EXISTS `avisbonneaddresse`;
CREATE TABLE IF NOT EXISTS `avisbonneaddresse` (
  `idAvisGoodAddress` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text DEFAULT NULL,
  `idCreateur` int(11) DEFAULT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `idGoodAddress` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAvisGoodAddress`),
  KEY `idCreateur` (`idCreateur`),
  KEY `idGoodAddress` (`idGoodAddress`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `avisrecette`
--

DROP TABLE IF EXISTS `avisrecette`;
CREATE TABLE IF NOT EXISTS `avisrecette` (
  `idAvisRecette` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `idCreateur` int(11) DEFAULT NULL,
  `idRecette` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAvisRecette`),
  KEY `idCreateur` (`idCreateur`),
  KEY `idRecette` (`idRecette`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bonneaddresse`
--

DROP TABLE IF EXISTS `bonneaddresse`;
CREATE TABLE IF NOT EXISTS `bonneaddresse` (
  `idBonAddresse` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `siteWeb` varchar(250) DEFAULT NULL,
  `regime` varchar(50) DEFAULT NULL,
  `allergies` varchar(50) DEFAULT NULL,
  `budget` varchar(50) DEFAULT NULL,
  `idCreateur` int(11) DEFAULT NULL,
  `idAvis` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBonAddresse`),
  KEY `idCreateur` (`idCreateur`),
  KEY `idAvis` (`idAvis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idAcheteur` int(11) DEFAULT NULL,
  `prixTotal` float DEFAULT NULL,
  `idCreateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idCreateur` (`idCreateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `motdepasse` varchar(250) DEFAULT NULL,
  `regime` varchar(50) DEFAULT NULL,
  `allergies` varchar(50) DEFAULT NULL,
  `dateInscription` date DEFAULT NULL,
  PRIMARY KEY (`idEtudiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foodtruck`
--

DROP TABLE IF EXISTS `foodtruck`;
CREATE TABLE IF NOT EXISTS `foodtruck` (
  `idTruck` int(11) NOT NULL AUTO_INCREMENT,
  `idAcheteur` int(11) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `imageMenu` varchar(250) DEFAULT NULL,
  `arrive` time DEFAULT NULL,
  `depart` time DEFAULT NULL,
  PRIMARY KEY (`idTruck`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idmessage` int(11) NOT NULL AUTO_INCREMENT,
  `idSource` int(11) DEFAULT NULL,
  `idReference` int(11) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `dateMessage` date DEFAULT NULL,
  PRIMARY KEY (`idmessage`),
  KEY `idSource` (`idSource`),
  KEY `idReference` (`idReference`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `idPlat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `imagePlat` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `regime` varchar(50) DEFAULT NULL,
  `allergies` varchar(50) DEFAULT NULL,
  `idCamion` int(11) DEFAULT NULL,
  `idDemande` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPlat`),
  KEY `idCamion` (`idCamion`),
  KEY `idDemande` (`idDemande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `ingredient` text DEFAULT NULL,
  `steps` text DEFAULT NULL,
  `imageRecette` varchar(50) DEFAULT NULL,
  `tempsPreparation` time DEFAULT NULL,
  `regime` varchar(50) DEFAULT NULL,
  `allergies` varchar(50) DEFAULT NULL,
  `budget` varchar(50) DEFAULT NULL,
  `idCreateur` int(11) DEFAULT NULL,
  `idAvis` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecette`),
  KEY `idCreateur` (`idCreateur`),
  KEY `idAvis` (`idAvis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `idSujet` int(11) NOT NULL AUTO_INCREMENT,
  `nomSujet` varchar(250) DEFAULT NULL,
  `idCreateur` int(11) DEFAULT NULL,
  `dateSujet` date DEFAULT NULL,
  PRIMARY KEY (`idSujet`),
  KEY `idCreateur` (`idCreateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
