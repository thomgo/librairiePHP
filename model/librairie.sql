-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 17 Mai 2019 à 14:43
-- Version du serveur :  5.7.26-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-5+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `librairie`
--
CREATE DATABASE IF NOT EXISTS `librairie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `librairie`;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `l_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `parution` int(4) NOT NULL,
  `dispo` tinyint(4) NOT NULL,
  `utilisateur` int(11) DEFAULT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`l_id`, `titre`, `auteur`, `resume`, `parution`, `dispo`, `utilisateur`, `categorie`) VALUES
(4, 'Le hobbit', 'Tolkien', 'cjzecihvuvheroivjvk,dvnhienv ifvfjvevndf  idvnevjnvfknfvjfpfdndv dkkkkkkvndvkjeroejrnfd erijverpogjrenbdf neajpverbnknfdn khreghvbbfdjbvergjverov fndk', 1926, 1, NULL, 'fantastique'),
(5, 'Les fleurs du mal', 'Baudelaire', 'zzxzncjvfvhin hvergipevkd,vdfovjvjv  jivnfvjfvn fk fobjo jjvjnf f n  fnfbgj nfk fnbirbjbknfb ojrbignk fk sjbptotribjgnj gibbjitnj', 1920, 1, NULL, 'poesie'),
(6, 'les misérables', 'Victor Hugo', 'kdzceqvnejvntrbgb  kbbktpbl, zbrbjntrnbnj nvtrbjnr k, kbjntrbit\'kpùg, ktrokbbng grob,tkb,gk', 1860, 0, 987654321, 'roman'),
(8, 'Sonen', 'Young', 'encfrnfiotuvntrjtitbnvntrj"pogtb  ', 2004, 0, 123456789, 'roman');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `u_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `personnalCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`u_id`, `firstName`, `lastName`, `age`, `city`, `phone`, `mail`, `personnalCode`) VALUES
(1, 'Thomas', 'Gossart', 24, 'croix', 320456896, 'thomas.gossart.pro@gmail.com', '123456789'),
(2, 'Christophe', 'Parmentier', 30, 'tourcoinq', 320456895, 'crispy@gmail.com', '987654321');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`l_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `personnalCode` (`personnalCode`),
  ADD UNIQUE KEY `personnalCode_2` (`personnalCode`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
