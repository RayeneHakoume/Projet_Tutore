-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 21 nov. 2021 à 08:21
-- Version du serveur :  10.5.10-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `new_enigmaker`
--

-- --------------------------------------------------------

--
-- Structure de la table `n_assoc_ep`
--

DROP TABLE IF EXISTS `n_assoc_ep`;
CREATE TABLE IF NOT EXISTS `n_assoc_ep` (
  `num_eni` int(11) NOT NULL,
  `num_parc` int(11) NOT NULL,
  PRIMARY KEY (`num_eni`,`num_parc`),
  KEY `fk_ep_p` (`num_parc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `n_assoc_ep`
--

INSERT INTO `n_assoc_ep` (`num_eni`, `num_parc`) VALUES
(22, 10),
(23, 9),
(24, 9),
(24, 10);

-- --------------------------------------------------------

--
-- Structure de la table `n_assoc_ue`
--

DROP TABLE IF EXISTS `n_assoc_ue`;
CREATE TABLE IF NOT EXISTS `n_assoc_ue` (
  `num` int(11) NOT NULL,
  `num_utilisateur` int(11) NOT NULL,
  `num_enigme` int(11) NOT NULL,
  `date_acomp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `n_assoc_up`
--

DROP TABLE IF EXISTS `n_assoc_up`;
CREATE TABLE IF NOT EXISTS `n_assoc_up` (
  `num` int(11) NOT NULL,
  `num_utilisateur` int(11) NOT NULL,
  `num_parcours` int(11) NOT NULL,
  `date_acomp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table d''association utilisateur / parcours';

-- --------------------------------------------------------

--
-- Structure de la table `n_enigme`
--

DROP TABLE IF EXISTS `n_enigme`;
CREATE TABLE IF NOT EXISTS `n_enigme` (
  `num_enigme` int(11) NOT NULL AUTO_INCREMENT,
  `num_parcours` int(11) DEFAULT NULL,
  `titre` varchar(90) DEFAULT NULL,
  `nb_vue` int(11) DEFAULT NULL,
  `nb_indice` int(11) DEFAULT NULL,
  `duree_moy` double DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `type_enigme` int(11) NOT NULL,
  `QText_question` text DEFAULT NULL,
  `QText_reponse` varchar(100) DEFAULT NULL,
  `QText_bgType` int(2) DEFAULT 1,
  `QText_bgInfo` varchar(500) DEFAULT NULL,
  `PImage_urlImage` varchar(100) DEFAULT NULL,
  `PImage_posX` decimal(10,0) DEFAULT NULL,
  `PImage_posY` decimal(10,0) DEFAULT NULL,
  `PImage_offsetX` decimal(10,0) DEFAULT NULL,
  `PImage_offsetY` decimal(10,0) DEFAULT NULL,
  `PImage_question` varchar(100) DEFAULT NULL,
  `Puz_urlImage` varchar(500) DEFAULT NULL,
  `Puz_nbPiece` int(11) DEFAULT NULL,
  `R_nbImage` int(11) DEFAULT NULL,
  `R_urls` varchar(500) DEFAULT NULL,
  `R_réponse` varchar(100) DEFAULT NULL,
  `O_nbImage` int(11) DEFAULT NULL,
  `O_urls` varchar(500) DEFAULT NULL,
  `O_réponse` varchar(100) DEFAULT NULL,
  `id_createur` int(11) NOT NULL,
  `date_creation_eni` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`num_enigme`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `n_enigme`
--

INSERT INTO `n_enigme` (`num_enigme`, `num_parcours`, `titre`, `nb_vue`, `nb_indice`, `duree_moy`, `url`, `type_enigme`, `QText_question`, `QText_reponse`, `QText_bgType`, `QText_bgInfo`, `PImage_urlImage`, `PImage_posX`, `PImage_posY`, `PImage_offsetX`, `PImage_offsetY`, `PImage_question`, `Puz_urlImage`, `Puz_nbPiece`, `R_nbImage`, `R_urls`, `R_réponse`, `O_nbImage`, `O_urls`, `O_réponse`, `id_createur`, `date_creation_eni`) VALUES
(21, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'test eni new bdd', 'z', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-11-20 19:37:35'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'test ultim', 'a', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2021-11-20 19:37:35'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'zzzzzzzzzzzzzzz okkkkkkkkkkkkk', 's', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2021-11-20 19:39:04'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Head into the Shee Vaneer â€” itâ€™s the one on the south side of the river very high up on the cliff. After you ride the elevator down, turn to the left. Ride the platform up to get a view of the floor. Take a screenshot or draw yourself a picture (or scroll down a little bit). The arrangement of balls in bowls you see here is how you have to make the floor in Shee Venath look.\r\nTake the elevator back up and leave Shee Vaneer and paraglide across the river to Shee Venath â€” itâ€™s to the north and a little west and at a lower elevation.\r\nTake the elevator down into Shee Venath and turn to the right. Ride the platform up to get a look at the floor in here. Take another screenshot or draw another picture (or scroll down) â€” this is the arrangement you need for Shee Vaneer.\r\n', 'sa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2021-11-20 20:14:54'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'sanew', 'ok', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2021-11-21 07:31:18'),
(26, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'newtnew', 'newrep', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2021-11-21 07:32:09');

-- --------------------------------------------------------

--
-- Structure de la table `n_indice`
--

DROP TABLE IF EXISTS `n_indice`;
CREATE TABLE IF NOT EXISTS `n_indice` (
  `num` int(11) NOT NULL,
  `num_parcours` int(11) DEFAULT NULL,
  `num_eg` int(11) DEFAULT NULL,
  `prio` int(11) DEFAULT NULL,
  `contenu_msg` varchar(100) DEFAULT NULL,
  `date_apparition` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `n_parcours`
--

DROP TABLE IF EXISTS `n_parcours`;
CREATE TABLE IF NOT EXISTS `n_parcours` (
  `num_parcour` int(11) NOT NULL AUTO_INCREMENT,
  `id_createur` int(100) NOT NULL,
  `titre_parcours` varchar(90) NOT NULL,
  `date_crea_parc` timestamp NULL DEFAULT current_timestamp(),
  `nb_vue` int(11) DEFAULT NULL,
  `note` double DEFAULT NULL,
  `pseudo_crea` varchar(20) DEFAULT NULL,
  `diff` double DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`num_parcour`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `n_parcours`
--

INSERT INTO `n_parcours` (`num_parcour`, `id_createur`, `titre_parcours`, `date_crea_parc`, `nb_vue`, `note`, `pseudo_crea`, `diff`, `url`) VALUES
(1, 1, 'ParcoursNoe1', '2021-11-06 23:00:00', 0, 0, 'SewerSlut', -1, '100deabe6e50af332c27cacd565ec22b'),
(2, 1, 'NoeFaitUnDeuxiemeParcours', '2021-11-06 23:00:00', 0, 0, 'SewerSlut', -1, '970a436c587baca6df649f23ac8ec668'),
(6, 1, '_Dummy', '2021-11-08 23:00:00', 0, 0, 'SewerSlut', -1, 'd1b69acecc17b00f22a40a301be95eac'),
(7, 2, 'Escalateur De Gratin de Slut', '2021-11-09 23:00:00', 0, 0, 'AzazSlut', -1, '5f23a63adf2d2b4b34dfcca195b9a79d'),
(8, 3, 'parcoirs', '2021-11-09 23:00:00', 0, 0, 'tyuio', -1, '5edf285c821eae514f313d43a1f7f046'),
(9, 6, 'parcours du dÃ©butant', '2021-11-20 21:14:55', NULL, NULL, NULL, NULL, NULL),
(10, 6, 'parcour new', '2021-11-20 21:19:56', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `n_utilisateur`
--

DROP TABLE IF EXISTS `n_utilisateur`;
CREATE TABLE IF NOT EXISTS `n_utilisateur` (
  `num_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` text NOT NULL,
  `date_inscr` timestamp NULL DEFAULT current_timestamp(),
  `nb_mission_faite` int(11) DEFAULT NULL,
  `nb_parcours_fait` int(11) DEFAULT NULL,
  `nb_mission_reussi` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_utilisateur`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `n_utilisateur`
--

INSERT INTO `n_utilisateur` (`num_utilisateur`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `date_inscr`, `nb_mission_faite`, `nb_parcours_fait`, `nb_mission_reussi`) VALUES
(1, 'Favier', 'Noe', 'SewerSlut', 'noe.favier@outlook.com', 'd3a32c5b3fbb4a40fb324a010981300b', '2021-10-19 22:00:00', 0, 0, NULL),
(2, 'Munoz', 'Jordan', 'AzazSlut', 'munoz.slut@hotmail.com/slut', '0fe0f9b7715ac40bb6d071602127e5d2', '2021-11-09 23:00:00', 0, 0, NULL),
(3, 'ppp', 'ooo', 'tyuio', 'aaaaaaaaa', '552e6a97297c53e592208cf97fbb3b60', '2021-11-09 23:00:00', 0, 0, NULL),
(4, NULL, NULL, 's', 'testnewbd@gmail.com', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', '2021-11-20 09:43:46', NULL, NULL, NULL),
(5, NULL, NULL, 'test', 't@gmail.com', '8efd86fb78a56a5145ed7739dcb00c78581c5375', '2021-11-20 10:43:36', NULL, NULL, NULL),
(6, NULL, NULL, 'r', 'r@gmail.com', '4dc7c9ec434ed06502767136789763ec11d2c4b7', '2021-11-20 11:05:58', NULL, NULL, NULL),
(7, NULL, NULL, 'w', 'w@gmail.com', 'aff024fe4ab0fece4091de044c58c9ae4233383a', '2021-11-20 13:52:06', NULL, NULL, NULL),
(8, NULL, NULL, 's', 'r2@gmail.com', '4dc7c9ec434ed06502767136789763ec11d2c4b7', '2021-11-21 07:30:20', NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `n_assoc_ep`
--
ALTER TABLE `n_assoc_ep`
  ADD CONSTRAINT `fk_ep_e` FOREIGN KEY (`num_eni`) REFERENCES `n_enigme` (`num_enigme`),
  ADD CONSTRAINT `fk_ep_p` FOREIGN KEY (`num_parc`) REFERENCES `n_parcours` (`num_parcour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
