-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 04 Octobre 2016 à 14:21
-- Version du serveur: 5.6.13
-- Version de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `crypto_casino`
--
CREATE DATABASE IF NOT EXISTS `crypto_casino` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crypto_casino`;

-- --------------------------------------------------------

--
-- Structure de la table `cc_session`
--

CREATE TABLE IF NOT EXISTS `cc_session` (
  `cs_id_session` varchar(50) NOT NULL,
  `cs_btc_adress` varchar(200) NOT NULL,
  `cs_eth_adress` varchar(200) NOT NULL,
  `cs_last_active_time` date NOT NULL,
  `cs_status` varchar(10) NOT NULL,
  `cs_game_played` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
