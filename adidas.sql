-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 nov. 2023 à 15:28
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `adidas`
--

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `remise` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `remise`, `type`, `debut`, `fin`) VALUES
(1, 'kev10', 10, '%', '2020-03-02 00:00:00', '2020-03-07 00:00:00'),
(2, 'adidas20', 20, '%', '2020-03-02 00:00:00', '2024-07-08 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produits` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `dateAdd` datetime NOT NULL,
  `prixTotal` decimal(10,0) NOT NULL,
  `userTemp` int(11) NOT NULL,
  `coupons` int(11) DEFAULT NULL,
  `invite` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dateAdd` datetime NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `recommande` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `quantite`, `prix`, `image`, `dateAdd`, `categorie`, `recommande`) VALUES
(1, 'Hublot BIgBan', 'A propos de cette montre\r\nCette Hublot a fait l’objet d’une inspection approfondie de précision, de fonctionnalité et de condition pour déterminer le niveau de remise en état nécessaires pour répondre à nos normes strictes. Il a également été référencé contre documents techniques et documents de référence du fabricant sicesdonnéessontdisponibles garantir l’authenticité et une histoire propre. Pour votre tranquillité, toutes nos montres disposent d’une garantie de 12 mois.', 5, '7995', 'Hublot-BigBang.jpg', '2020-03-05 00:00:00', 'montre', 'oui'),
(2, 'Hublot Big Bang 2', 'A propos de cette montre\r\nCette Hublot a fait l’objet d’une inspection approfondie de précision, de fonctionnalité et de condition pour déterminer le niveau de remise en état nécessaires pour répondre à nos normes strictes. Il a également été référencé contre documents techniques et documents de référence du fabricant sicesdonnéessontdisponibles garantir l’authenticité et une histoire propre. Pour votre tranquillité, toutes nos montres disposent d’une garantie de 12 mois.', 72, '15995', 'Hublot-BigBang2.jpg', '2020-03-05 00:00:00', 'montre', 'oui'),
(3, 'Hublot Classic', 'A propos de cette montre\r\nCette Hublot a fait l’objet d’une inspection approfondie de précision, de fonctionnalité et de condition pour déterminer le niveau de remise en état nécessaires pour répondre à nos normes strictes. Il a également été référencé contre documents techniques et documents de référence du fabricant sicesdonnéessontdisponibles garantir l’authenticité et une histoire propre. Pour votre tranquillité, toutes nos montres disposent d’une garantie de 12 mois.', 60, '20154', 'Hublot-Classic.jpg', '2020-03-05 00:00:00', 'montre', 'oui'),
(4, 'Hublot Fusion', 'A propos de cette montre\r\nCette Hublot a fait l’objet d’une inspection approfondie de précision, de fonctionnalité et de condition pour déterminer le niveau de remise en état nécessaires pour répondre à nos normes strictes. Il a également été référencé contre documents techniques et documents de référence du fabricant sicesdonnéessontdisponibles garantir l’authenticité et une histoire propre. Pour votre tranquillité, toutes nos montres disposent d’une garantie de 12 mois.', 90, '19874', 'Hublot-Fusion.jpg', '2020-03-05 00:00:00', 'montre', ''),
(5, 'Maillot PSG', 'Ceci est un maillot du PSG', 89, '50', '5e5fbfab43131.png', '2020-03-10 15:13:00', 'maillot', ''),
(6, 'Maillot FC Metz', 'Ceci est un maillot du FC Metz', 80, '50', '5e5ec7f05b308.jpg', '2020-03-10 15:13:00', 'maillot', 'oui'),
(7, 'Maillot FC Barcelone', 'Ceci est un maillot du FC Barcelone', 88, '50', '5e5fbf7acf41a.png', '2020-03-10 15:13:00', 'maillot', ''),
(8, 'Maillot Marseille', 'Ceci est un maillot de Marseille', 94, '50', 'Marseille.jpg', '2020-03-10 15:13:00', 'maillot', ''),
(9, 'Chaussure 1', 'Ceci est la premiere chaussure du magasin', 98, '40', 'chaussure1.jpg', '2020-03-10 15:13:00', 'chaussure', 'oui'),
(10, 'Chaussure 2', 'Ceci est la deuxieme chaussure du magasin', 89, '30', 'chaussure2.jpg', '2020-03-10 15:13:00', 'chaussure', 'oui'),
(11, 'Chaussure 3', 'Ceci est la troisieme chaussure du magasin', 60, '30', 'chaussure3.jpg', '2020-03-10 15:13:00', 'chaussure', ''),
(12, 'Chaussure 4', 'Ceci est la quatrieme chaussure du magasin', 83, '25', 'chaussure4.jpg', '2020-03-10 15:13:00', 'chaussure', ''),
(13, 'Maillot du Real Madrid', 'Ceci est un maillot du Real Madrid', 100, '50', 'realmadrid.jpg', '2020-03-10 15:13:00', 'maillot', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `dateinscription` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
