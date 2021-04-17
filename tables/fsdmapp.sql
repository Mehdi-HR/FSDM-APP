-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 17 avr. 2021 à 01:24
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fsdmapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `code_e` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cne` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_module`
--

CREATE TABLE `etudiant_module` (
  `code_e` int(6) NOT NULL,
  `id_m` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id_f` varchar(3) NOT NULL,
  `nom_f` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id_m` varchar(4) NOT NULL,
  `nom_m` varchar(100) NOT NULL,
  `id_f` varchar(3) NOT NULL,
  `code_p` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `code_p` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `code` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`code`, `nom`, `prenom`) VALUES
(34, 'omari', 'omar'),
(43, 'el kamili', 'najwa'),
(65, 'alami', 'nizar'),
(71, 'salhi', 'rachid'),
(76, 'naciri', 'rajae'),
(87, 'beqqali', 'reda');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `code` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`code_e`);

--
-- Index pour la table `etudiant_module`
--
ALTER TABLE `etudiant_module`
  ADD PRIMARY KEY (`code_e`,`id_m`),
  ADD KEY `id_m_fk` (`id_m`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id_f`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `code_p_fk` (`code_p`),
  ADD KEY `id_f_fk` (`id_f`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`code_p`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`code`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant_module`
--
ALTER TABLE `etudiant_module`
  ADD CONSTRAINT `code_e_fk` FOREIGN KEY (`code_e`) REFERENCES `etudiants` (`code_e`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_m_fk` FOREIGN KEY (`id_m`) REFERENCES `modules` (`id_m`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `code_p_fk` FOREIGN KEY (`code_p`) REFERENCES `professeurs` (`code_p`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_f_fk` FOREIGN KEY (`id_f`) REFERENCES `filieres` (`id_f`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
