-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 31 Octobre 2020 à 19:01
-- Version du serveur :  5.7.31-0ubuntu0.16.04.1
-- Version de PHP :  7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `releaseDate` int(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`b_id`, `title`, `author`, `summary`, `releaseDate`, `status`, `user`, `category`) VALUES
(4, 'Le hobbit', 'Tolkien', 'cjzecihvuvheroivjvk,dvnhienv ifvfjvevndf  idvnevjnvfknfvjfpfdndv dkkkkkkvndvkjeroejrnfd erijverpogjrenbdf neajpverbnknfdn khreghvbbfdjbvergjverov fndk', 1926, 1, NULL, 'fantastique'),
(5, 'Les fleurs du mal', 'Baudelaire', 'zzxzncjvfvhin hvergipevkd,vdfovjvjv  jivnfvjfvn fk fobjo jjvjnf f n  fnfbgj nfk fnbirbjbknfb ojrbignk fk sjbptotribjgnj gibbjitnj', 1920, 1, NULL, 'poesie'),
(6, 'les misérables', 'Victor Hugo', 'kdzceqvnejvntrbgb  kbbktpbl, zbrbjntrnbnj nvtrbjnr k, kbjntrbit\'kpùg, ktrokbbng grob,tkb,gk', 1860, 0, 987654321, 'roman'),
(8, 'Sonen', 'Young', 'encfrnfiotuvntrjtitbnvntrj"pogtb  ', 2004, 0, 123456789, 'roman'),
(9, 'Les mousquetaire', 'Dumas', 'lorem ipsum', 1865, 1, NULL, 'roman');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
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
-- Contenu de la table `user`
--

INSERT INTO `user` (`u_id`, `firstName`, `lastName`, `age`, `city`, `phone`, `mail`, `personnalCode`) VALUES
(1, 'Thomas', 'Gossart', 24, 'croix', 320456896, 'thomas.gossart.pro@gmail.com', '123456789'),
(2, 'Christophe', 'Parmentier', 30, 'tourcoinq', 320456895, 'crispy@gmail.com', '987654321');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `personnalCode` (`personnalCode`),
  ADD UNIQUE KEY `personnalCode_2` (`personnalCode`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
