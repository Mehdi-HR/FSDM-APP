-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 avr. 2021 à 19:07
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
  `code_etudiant` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cne` varchar(14) NOT NULL,
  `id_filiere` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`code_etudiant`, `nom`, `prenom`, `cin`, `email`, `cne`, `id_filiere`) VALUES
(875, 'alami', 'nizar', 'zn549987', 'nizar.alami@gmail.com', 'M198154271', 'SMI');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_module`
--

CREATE TABLE `etudiant_module` (
  `code_etudiant` int(6) NOT NULL,
  `id_module` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id_filiere` varchar(4) NOT NULL,
  `nom_filiere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id_filiere`, `nom_filiere`) VALUES
('SMA', 'Science Mathématiques et Application'),
('SMC', 'Sciences de la Matière Chimie'),
('SMP', 'Sciences de la Matière Physique'),
('STU', 'Sciences de la Terre et de l\'Univers'),
('SVI', 'Sciences de la Vie '),
('SMI', 'Sciences Mathématiques et Informatique ');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id_module` varchar(4) NOT NULL,
  `nom_module` varchar(100) NOT NULL,
  `id_filiere` varchar(4) NOT NULL,
  `code_prof` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `code_prof` int(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`code_prof`, `nom`, `prenom`, `cin`, `email`) VALUES
(87, 'le prof', 'test', 'c765900', 'prof.test@usmba.ac.ma');

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
  ADD PRIMARY KEY (`code_etudiant`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cne` (`cne`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD KEY `id_filiere_fk` (`id_filiere`);

--
-- Index pour la table `etudiant_module`
--
ALTER TABLE `etudiant_module`
  ADD PRIMARY KEY (`code_etudiant`,`id_module`),
  ADD KEY `id_moduleFK` (`id_module`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id_filiere`),
  ADD UNIQUE KEY `nom_filiere` (`nom_filiere`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `nom_module` (`nom_module`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`code_prof`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `id_filiere_fk` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant_module`
--
ALTER TABLE `etudiant_module`
  ADD CONSTRAINT `code_etudiantFK` FOREIGN KEY (`code_etudiant`) REFERENCES `etudiants` (`code_etudiant`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_moduleFK` FOREIGN KEY (`id_module`) REFERENCES `modules` (`id_module`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
