-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 15 Février 2019 à 19:16
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `soutenance`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `num_ens` int(10) NOT NULL,
  `nom_ens` varchar(30) NOT NULL,
  `prenom_ens` varchar(30) NOT NULL,
  `specialite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`num_ens`, `nom_ens`, `prenom_ens`, `specialite`) VALUES
(1, 'TRAORE', 'Daouda', 'Java, C++, Algorithme et complexité'),
(2, 'COULIBALY', 'Solomane', 'PHP, Site web, Base de donnÃ©es'),
(3, 'TELFI', 'Mohamed', 'RÃ©seau'),
(4, 'TELFI', 'Mohamed', 'RÃ©seau'),
(5, 'GOITA', 'Yacouba', 'Base de donnÃ©es'),
(6, 'COULIBALY', 'Mohamed', 'Android, UML, GÃ©nie logiciel'),
(7, 'COULIBALY', 'Demba', 'Java');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `num_etud` int(10) NOT NULL,
  `nom_etud` varchar(30) NOT NULL,
  `prenom_etud` varchar(30) NOT NULL,
  `num_pfe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etud`, `nom_etud`, `prenom_etud`, `num_pfe`) VALUES
(1, 'KAMISSOKO', 'Djoko', 16),
(2, 'COULIBALY', 'Kadidiatou', 17),
(3, 'HAIDARA', 'Cheick T', 19);

-- --------------------------------------------------------

--
-- Structure de la table `jury`
--

CREATE TABLE `jury` (
  `num_jury` int(10) NOT NULL,
  `codeEnsPr` int(10) NOT NULL,
  `codeEnsM1` int(10) NOT NULL,
  `codeEnsM2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jury`
--

INSERT INTO `jury` (`num_jury`, `codeEnsPr`, `codeEnsM1`, `codeEnsM2`) VALUES
(1, 1, 1, 1),
(2, 5, 3, 2),
(3, 1, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pfe`
--

CREATE TABLE `pfe` (
  `num_pfe` int(10) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `specialite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pfe`
--

INSERT INTO `pfe` (`num_pfe`, `titre`, `specialite`) VALUES
(14, 'mise en place d''un vlan', 'réseau'),
(15, 'Mise en place d''un VLAN', 'RÃ©seau'),
(16, 'Mise en place d''un serveur d''authentification', 'RÃ©seau-Developpement'),
(17, 'Géolocatisation des pharmacies de Ségou', 'Developpement'),
(18, 'Gestion des concours de l''Université de Ségou', 'Developpement'),
(19, 'Gestion du personnel de l''Université de Ségou', 'Developpement'),
(20, 'Gestion des courriers de l''Institut Universitaire de l''Université de Ségou', 'Developpement'),
(21, 'GÃ©olocalisation des villages de la rÃ©gion de SÃ©gou', 'DÃ©veloppement');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `num_session` int(10) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`num_session`, `date_deb`, `date_fin`) VALUES
(1, '0000-00-00', '0000-00-00'),
(2, '0000-00-00', '0000-00-00'),
(3, '2015-09-20', '2015-09-21'),
(4, '0000-00-00', '0000-00-00'),
(5, '2017-03-20', '2017-03-20'),
(6, '2017-09-11', '2017-09-04'),
(7, '2017-09-11', '2017-09-12'),
(8, '2017-09-19', '2017-09-20');

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `id_soutenance` int(10) NOT NULL,
  `num_pfe` int(10) NOT NULL,
  `num_session` int(10) NOT NULL,
  `num_jury` int(10) NOT NULL,
  `decision` varchar(20) NOT NULL,
  `mention` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `soutenance`
--

INSERT INTO `soutenance` (`id_soutenance`, `num_pfe`, `num_session`, `num_jury`, `decision`, `mention`) VALUES
(1, 14, 1, 1, 'Ajourner', 'Passable'),
(2, 19, 5, 3, 'Admis', 'Assez-bien');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`num_ens`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_etud`);

--
-- Index pour la table `jury`
--
ALTER TABLE `jury`
  ADD PRIMARY KEY (`num_jury`);

--
-- Index pour la table `pfe`
--
ALTER TABLE `pfe`
  ADD PRIMARY KEY (`num_pfe`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`num_session`);

--
-- Index pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD PRIMARY KEY (`id_soutenance`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `num_ens` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `num_etud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `jury`
--
ALTER TABLE `jury`
  MODIFY `num_jury` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `pfe`
--
ALTER TABLE `pfe`
  MODIFY `num_pfe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `num_session` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `id_soutenance` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
