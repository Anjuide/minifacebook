-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 mai 2019 à 14:12
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

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
(7, 'Reggae');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `url_photo`, `date_naissance`, `statut_couple`) VALUES
(1, 'Zuckerberg', 'Mark', 'https://heelsagency.com/wp-content/uploads/2014/11/Mark-Zuckerberg-Heels-Agency-Demi-Karan-9.jpg', '1984-05-14', 'Marié'),
(2, 'Saverin', 'Edouardo', 'http://static3.bornrichimages.com/cdn2/500/500/91/c/wp-content/uploads/s3/1/2012/05/22/1337668925_300x300.jpg', '1982-03-19', 'Marié'),
(3, 'Moskovitz', 'Dustin', 'https://upload.wikimedia.org/wikipedia/commons/8/87/Dustin_Moskovitz_Headshot.jpg', '1984-05-22', 'Marié'),
(4, 'Hugues', 'Chris', 'https://queerty-prodweb.s3.amazonaws.com/wp/docs/2016/01/1207594-slide-s-6-chris-hughes.jpg', '1960-03-10', 'CÃ©libataire'),
(5, 'Barack', 'Obama', 'http://s.plurielles.fr/mmdia/i/61/4/people-barack-obama-2542614_123.jpg?v=1', '1961-08-04', 'MariÃ©'),
(6, 'Michelle', 'Obama', 'https://www.blackenterprise.com/wp-content/blogs.dir/1/files/2011/02/michelleobama2011.jpg', '1964-01-17', 'MariÃ©'),
(7, 'Bezos', 'Jeff', 'https://files.startupranking.com/person/thumb/235_4f6851a83a5d71417e1d3680daeefe2345f28e91_jeff-bezos_l.png', '1964-01-12', 'CÃ©libataire'),
(8, 'Larry', 'Page', 'https://be1world.ca/wp-content/uploads/2017/11/larry.jpg', '1973-03-26', 'MariÃ©'),
(9, 'Sergey', 'Brin', 'https://www.kliktrend.com/wp-content/uploads/2019/02/Sergey-Brin.jpg', '1973-08-21', 'CÃ©libataire'),
(10, 'Sundar', 'Pichai', 'https://i2.wp.com/indianewengland.com/wp-content/uploads/2015/12/Sundar-Pichai-e1482896983828.jpg?fit=500%2C500&ssl=1', '1972-07-12', 'En couple'),
(11, 'Spiegel', 'Evan', 'http://www.divergence-fm.org/uploads/kuoevanspiegel.jpeg', '1990-06-04', 'En couple'),
(12, 'Lovelace', 'Ada', 'https://i1.sndcdn.com/artworks-000462527769-goi06b-t500x500.jpg', '1815-12-10', 'CÃ©libataire'),
(13, 'Hamilton', 'Margaret', 'https://ada.vc/wp-content/uploads/2018/03/margaret-2-500x500.jpg', '1936-08-17', 'En couple'),
(14, 'Allen', 'Frances', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Allen_mg_2528-c.jpg/500px-Allen_mg_2528-c.jpg', '1932-01-01', 'Marié'),
(15, 'Stallman', 'Richard', 'https://d2r9nfiii89r0l.cloudfront.net/article/images/740x500/dimg/m_img_444.jpg', '1953-03-16', 'Célibataire');

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
