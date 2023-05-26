-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 mai 2023 à 13:50
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `detail_log`
--

CREATE TABLE `detail_log` (
  `iddetail_logs` int(11) NOT NULL,
  `logs` bigint(20) NOT NULL,
  `port` int(11) NOT NULL,
  `up` int(11) NOT NULL,
  `down` int(11) NOT NULL,
  `tiknum` int(11) NOT NULL,
  `idtest` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `detail_log`
--

INSERT INTO `detail_log` (`iddetail_logs`, `logs`, `port`, `up`, `down`, `tiknum`, `idtest`) VALUES
(7, 1, 1, 0, 0, 15, 1),
(6, 1, 1, 0, 100, 10, 1),
(5, 1, 1, 0, 300, 5, 1),
(4, 1, 1, 0, 0, 0, 1),
(3, 1, 2, 0, 0, 5, 1),
(2, 1, 2, 100, 0, 2, 1),
(1, 1, 2, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `idlogs` bigint(20) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`idlogs`, `test`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `params`
--

CREATE TABLE `params` (
  `idparams` int(11) NOT NULL,
  `scenario` int(11) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `type_flux` text,
  `debut` int(11) NOT NULL,
  `fin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `params`
--

INSERT INTO `params` (`idparams`, `scenario`, `port`, `type_flux`, `debut`, `fin`) VALUES
(37, 23, 3, 'U', 10, 20),
(36, 23, 2, 'D', 5, 15),
(35, 23, 2, 'U', 10, 20),
(33, 23, 1, 'U', 0, 5),
(34, 23, 1, 'D', 8, 16);

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `idport` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`idport`, `nom`) VALUES
(1, 'p1'),
(2, 'p2'),
(3, 'p3');

-- --------------------------------------------------------

--
-- Structure de la table `port_scenario`
--

CREATE TABLE `port_scenario` (
  `idport_scenario` int(11) NOT NULL,
  `port` int(11) DEFAULT NULL,
  `scenario` int(11) DEFAULT NULL,
  `numport` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `port_scenario`
--

INSERT INTO `port_scenario` (`idport_scenario`, `port`, `scenario`, `numport`) VALUES
(67, 3, 23, 98),
(66, 2, 23, 10),
(65, 1, 23, 21);

-- --------------------------------------------------------

--
-- Structure de la table `scenario`
--

CREATE TABLE `scenario` (
  `idscenario` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `intervalle` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `scenario`
--

INSERT INTO `scenario` (`idscenario`, `nom`, `intervalle`) VALUES
(23, 'Test1', 100);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `idtest` int(11) NOT NULL,
  `scenario` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `ts_debut` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`idtest`, `scenario`, `nom`, `ts_debut`) VALUES
(1, 23, 'Test1', '2023-05-25 11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type_flux`
--

CREATE TABLE `type_flux` (
  `code` varchar(1) NOT NULL,
  `lib` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_flux`
--

INSERT INTO `type_flux` (`code`, `lib`) VALUES
('U', 'upload'),
('D', 'downlod');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `detail_log`
--
ALTER TABLE `detail_log`
  ADD PRIMARY KEY (`iddetail_logs`),
  ADD KEY `logs_fk_1` (`idtest`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idlogs`);

--
-- Index pour la table `params`
--
ALTER TABLE `params`
  ADD PRIMARY KEY (`idparams`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`idport`);

--
-- Index pour la table `port_scenario`
--
ALTER TABLE `port_scenario`
  ADD PRIMARY KEY (`idport_scenario`);

--
-- Index pour la table `scenario`
--
ALTER TABLE `scenario`
  ADD PRIMARY KEY (`idscenario`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`idtest`);

--
-- Index pour la table `type_flux`
--
ALTER TABLE `type_flux`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `detail_log`
--
ALTER TABLE `detail_log`
  MODIFY `iddetail_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `idlogs` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `params`
--
ALTER TABLE `params`
  MODIFY `idparams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `idport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `port_scenario`
--
ALTER TABLE `port_scenario`
  MODIFY `idport_scenario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `scenario`
--
ALTER TABLE `scenario`
  MODIFY `idscenario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `idtest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
