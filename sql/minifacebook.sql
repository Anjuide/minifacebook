-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 mai 2019 à 10:01
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `minifacebook`
--

-- --------------------------------------------------------

--
-- Structure de la table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
CREATE TABLE IF NOT EXISTS `hobby` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `hobby`
--

INSERT INTO `hobby` (`id`, `type`) VALUES
(1, 'Bricolage'),
(2, 'Danse'),
(3, 'Sports'),
(4, 'Chasse'),
(5, 'Jardinage'),
(6, 'Musique'),
(7, 'PÃªche'),
(8, 'ThÃ©Ã¢tre'),
(9, 'Cuisine et gastronomie'),
(10, 'Photographie'),
(11, 'Volontariat');

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id`, `type`) VALUES
(1, 'Afro-Trap'),
(2, 'Chanson franÃ§aise'),
(3, 'Dancehall'),
(4, 'Rock'),
(5, 'Hip-Hop'),
(6, 'Pop'),
(7, 'Reggae'),
(68, 'Montest');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `url_photo` varchar(200) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `statut_couple` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `url_photo`, `date_naissance`, `statut_couple`) VALUES
(1, 'Gnamba', 'Angra Ange Anselme', 'Photodeange.ch', '1989-01-27', 'En couple'),
(2, 'Cerdelli', 'Marine Coralie', 'Photodemarine.ch', '1993-06-07', 'En couple'),
(3, 'Bouo', 'Odile Anastasie', 'PhotodeOdile.ch', '1965-04-15', 'CÃ©libataire'),
(4, 'Friederich', 'Bernhard', 'Photodebernard.ch', '1960-03-10', 'CÃ©libataire'),
(5, 'Palazzotto', 'Sabine Valérie', 'Photodesabine.ch', '1978-08-29', 'MariÃ©'),
(6, 'Palazzotto', 'Paolo', 'Photodepaolo.ch', '1960-02-28', 'MariÃ©'),
(7, 'Damato', 'Alexandro', 'PhotodeAlex.ch', '1988-10-05', 'En couple'),
(8, 'Xiang', 'Yuka', 'PhotodeYuka.ch', '1986-02-05', 'En couple'),
(9, 'Lalle Bi', 'Jacques Arnaud', 'Photodejacques.ch', '2003-06-14', 'CÃ©libataire'),
(10, 'Affin', 'Walid', 'Photodewalid.ch', '2003-09-14', 'CÃ©libataire'),
(11, 'PÃ©dÃ©a', 'Jeannette', 'Photodejeannette.ch', '1935-01-01', 'CÃ©libataire');

-- --------------------------------------------------------

--
-- Structure de la table `relationhobby`
--

DROP TABLE IF EXISTS `relationhobby`;
CREATE TABLE IF NOT EXISTS `relationhobby` (
  `personne_id` int(100) NOT NULL,
  `hobby_id` int(10) NOT NULL,
  PRIMARY KEY (`personne_id`,`hobby_id`),
  KEY `hobby_id` (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `relationhobby`
--

INSERT INTO `relationhobby` (`personne_id`, `hobby_id`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `relationmusique`
--

DROP TABLE IF EXISTS `relationmusique`;
CREATE TABLE IF NOT EXISTS `relationmusique` (
  `personne_id` int(100) NOT NULL,
  `musique_id` int(10) NOT NULL,
  PRIMARY KEY (`personne_id`,`musique_id`),
  KEY `musique_id` (`musique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `relationmusique`
--

INSERT INTO `relationmusique` (`personne_id`, `musique_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(1, 3),
(3, 3),
(1, 4),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `relationpersonne`
--

DROP TABLE IF EXISTS `relationpersonne`;
CREATE TABLE IF NOT EXISTS `relationpersonne` (
  `personne_id` int(100) NOT NULL,
  `relation_id` int(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`personne_id`,`relation_id`),
  KEY `relation_id` (`relation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `relationpersonne`
--

INSERT INTO `relationpersonne` (`personne_id`, `relation_id`, `type`) VALUES
(1, 2, 'Parents'),
(1, 3, 'Amis'),
(1, 5, 'Parents'),
(1, 8, 'Parents'),
(2, 1, 'Parents'),
(2, 5, 'Amis'),
(2, 6, 'Amis'),
(2, 8, 'Parents'),
(4, 5, 'Parents');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `relationhobby`
--
ALTER TABLE `relationhobby`
  ADD CONSTRAINT `RelationHobby_ibfk_1` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `RelationHobby_ibfk_2` FOREIGN KEY (`hobby_id`) REFERENCES `hobby` (`id`);

--
-- Contraintes pour la table `relationmusique`
--
ALTER TABLE `relationmusique`
  ADD CONSTRAINT `RelationMusique_ibfk_1` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `RelationMusique_ibfk_2` FOREIGN KEY (`musique_id`) REFERENCES `musique` (`id`);

--
-- Contraintes pour la table `relationpersonne`
--
ALTER TABLE `relationpersonne`
  ADD CONSTRAINT `RelationPersonne_ibfk_1` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `RelationPersonne_ibfk_2` FOREIGN KEY (`relation_id`) REFERENCES `personne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
