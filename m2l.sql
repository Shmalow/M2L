-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 19 Novembre 2014 à 09:46
-- Version du serveur: 5.6.11
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `m2l`
--
CREATE DATABASE IF NOT EXISTS `m2l` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `m2l`;

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contenu` text CHARACTER SET utf8 NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `id_user`, `titre`, `contenu`, `date_creation`) VALUES
(1, 1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 6, 'Le PHP à la conquête du monde !', 'C''est officiel, l''éléPHPant a annoncé à la radio hier soir "J''ai l''intention de conquérir le monde !".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu''il n''en fallait pour dire "éléPHPant". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11'),
(5, 1, 'Open sans', 'Open Sanssssssssssssssssssss', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `commentaire` text CHARACTER SET utf8 NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `pseudo`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum''s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu''on ne le pense !', '2010-03-27 22:02:13'),
(7, 2, 'dung', 'le php la conquete du monde', '0000-00-00 00:00:00'),
(8, 1, 'dung', 'bienvenue sur mon blog billet 1', '0000-00-00 00:00:00'),
(9, 1, 'dung', 'bienvenue sur mon blog billet 1', '0000-00-00 00:00:00'),
(10, 1, 'linh', 'bienvenue sur mon blog billet 1', '0000-00-00 00:00:00'),
(11, 1, 'linh', 'bienvenue sur mon blog billet 1', '0000-00-00 00:00:00'),
(12, 2, 'dung2', 'le php', '0000-00-00 00:00:00'),
(36, 2, 'abc', 'abc', '0000-00-00 00:00:00'),
(35, 1, 'sarmale', 'sarmale', '0000-00-00 00:00:00'),
(34, 2, 'lina3', 'lina3', '0000-00-00 00:00:00'),
(33, 2, 'lina', 'lina', '0000-00-00 00:00:00'),
(37, 2, 'abc2', 'abc2', '0000-00-00 00:00:00'),
(46, 2, 'zung', 'This is not Open Sans !!', '0000-00-00 00:00:00'),
(42, 2, 'yoloooooooooooo', 'yolooooooooooooooooooooooooooooooooo', '0000-00-00 00:00:00'),
(43, 2, 'abc', 'anti-haccccccccccccccccccking', '0000-00-00 00:00:00'),
(44, 2, 'abc', 'anti-hackinggabc', '0000-00-00 00:00:00'),
(45, 2, 'zung', 'user  is logged !!!!', '0000-00-00 00:00:00'),
(51, 1, 'zung', 'svvq', '0000-00-00 00:00:00'),
(49, 5, 'zung', 'Story of my life !!!!', '0000-00-00 00:00:00'),
(50, 5, 'zung', 'yohooo deuxieme commentaire !!!', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`) VALUES
(1, 'nguyen', 'dung', 'zung', 'zung@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(6, 'nguyen', 'thuy ling', 'lina', 'lina.nguyen@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
