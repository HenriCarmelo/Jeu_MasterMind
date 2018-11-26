-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Novembre 2018 à 04:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_mastermind`
--

-- --------------------------------------------------------

--
-- Structure de la table `choixduuser`
--

CREATE TABLE IF NOT EXISTS `choixduuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val1` varchar(11) NOT NULL,
  `val2` varchar(11) NOT NULL,
  `val3` varchar(11) NOT NULL,
  `val4` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

-- --------------------------------------------------------

--
-- Structure de la table `nombre_parties`
--

CREATE TABLE IF NOT EXISTS `nombre_parties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nb` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `nombre_parties`
--

INSERT INTO `nombre_parties` (`id`, `nb`) VALUES
(65, 8);

-- --------------------------------------------------------

--
-- Structure de la table `ordinateur`
--

CREATE TABLE IF NOT EXISTS `ordinateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val1` varchar(11) NOT NULL,
  `val2` varchar(11) NOT NULL,
  `val3` varchar(11) NOT NULL,
  `val4` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Contenu de la table `ordinateur`
--

INSERT INTO `ordinateur` (`id`, `val1`, `val2`, `val3`, `val4`) VALUES
(129, 'V', 'R', 'O', 'J');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE IF NOT EXISTS `statistiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pions_mal_places` int(11) NOT NULL,
  `nombre_pions_juste` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
