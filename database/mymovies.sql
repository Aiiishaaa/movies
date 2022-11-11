-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 nov. 2022 à 21:44
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
-- Base de données : `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ContactId` int(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sujet` varchar(200) NOT NULL,
  `Message` varchar(200) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ContactId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`ContactId`, `fullname`, `Email`, `Sujet`, `Message`, `Date`) VALUES
(1, 'Aicha Hamida', 'aicha.hamida@ynov.com', 'Demande de renseignements', '        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus delectus mollitia eaque ducimus dolore nobis architecto. Tempora aliquam nihil minima vitae recusandae velit illo. Quod ', '2022-11-10 19:59:37');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(500) DEFAULT NULL,
  `idplaylist` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `status`, `idplaylist`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', NULL),
(4, 'takwa3', 'takwa4', 'takwa3@gmail.com', 'takwa3', 'user', NULL),
(5, 'aicha', 'aicha', 'Aicha Hamida', 'aicha.hamida@ynov.com', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
