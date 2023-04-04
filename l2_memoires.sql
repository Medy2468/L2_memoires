-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 19 jan. 2022 à 02:34
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `l2_memoires`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `idDomaine` int(11) NOT NULL,
  `nomDomaine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`idDomaine`, `nomDomaine`) VALUES
(1, 'Informatique'),
(2, 'Gestion');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `idSujet` int(11) NOT NULL,
  `libelleSujet` text NOT NULL,
  `description` text NOT NULL,
  `problematique` text NOT NULL,
  `idDomaineF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`idSujet`, `libelleSujet`, `description`, `problematique`, `idDomaineF`) VALUES
(1, 'Etude et mise en place d\'une application qui donne 18 a tous les etudants.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(2, 'Sujet : Réalisation du projet Coffre', 'Ce projet doit être fait sur HTML, PHP et autres.', 'Le mieux sera de le faire en binôme.', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`idDomaine`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`idSujet`),
  ADD KEY `idDomaineF` (`idDomaineF`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `idSujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`idDomaineF`) REFERENCES `domaine` (`idDomaine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
