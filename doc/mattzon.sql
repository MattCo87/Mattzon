-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 mars 2021 à 22:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mattzon`
--

-- --------------------------------------------------------

--
-- Structure de la table `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `demande` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortdescription` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `shortdescription`, `description`, `image`, `price`) VALUES
(1, 'Pegasis', 'La basket stylée pour tous', 'Le top de la classe, même pour vos déplacement en ville, elle est conçue pour tous les sports : légère, souple et robuste, elle ravira tous les membres de la famille de 7 à 77 ans', 'nike-pegasus.jpg', '125.00'),
(2, 'Flavius', 'La sportive nec plus ultra', 'La trouvaille du siècle : une alliance de technologies qui respecte tous les runners grâce à son système unique de ressorts, elle vous garantit une véritable intégrité physique', 'Flavius.jpg', '59.99'),
(3, 'JupiTerrien', 'Simple et Logique', 'Enfin ... Voilà la chaussure que toute la voie lactée attendait : comme son nom l\'indique, elle est conçue spécifiquement pour les runners de fond, grâce à sa robustesse, vous pourrez traverser tous les chemins Terrestres, jusqu\'à Jupiter', 'JupiTerrien.jpg', '39.99'),
(4, 'Britain666', 'So British !', 'Une basket aux couleurs du Royaume-Uni, utilisable en ville comme dans les champs,  elle se démarque par son confort encore jamais connu grâce à ses renforts à tous les niveaux du pied', 'Britain666.jpg', '66.60'),
(5, 'JordanWhite', 'THE basket-shoe', 'La chaussure idéale pour le basket, promue par la star mondiale incontestée des années 90 ! Elle possède toutes les meilleures technologies pour exceller dans ce sport, et procure la meilleure sécurité pour vos chevilles', 'JordanWhite.jpg', '199.00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `email`, `pwd`) VALUES
(1, 'test', 'test', 'test@test.com', 'test'),
(2, 'Matt', 'Co', '87700a@gmail.com', 'mattco');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
