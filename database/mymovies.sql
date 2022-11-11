-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 nov. 2022 à 16:02
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mymovies`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sujet` varchar(200) NOT NULL,
  `Message` varchar(2000) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `fullname`, `Email`, `Sujet`, `Message`, `Date`) VALUES
(0, 'aicha', 'aicha.hamida@ynov.com', 'test', 'test', '2022-11-11 11:21:45'),
(1, 'Aicha Hamida', 'aicha.hamida@ynov.com', 'Demande de renseignements', '        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus delectus mollitia eaque ducimus dolore nobis architecto. Tempora aliquam nihil minima vitae recusandae velit illo. Quod ', '2022-11-10 19:59:37');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `film_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `release_year` year(4) DEFAULT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `original_language_id` int(10) UNSIGNED DEFAULT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `film_playlist`
--

CREATE TABLE `film_playlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `playlist_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(10) UNSIGNED NOT NULL,
  `playlist_name` varchar(200) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `user` (`user_id`, `Fullname`, `Email`, `Username`, `Password`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'aicha Hamida', 'Aicha.hamida06@yahoo.fr', 'aicha', '0000', 'user'),
(3, 'test', 'test@test.com', 'test', 'test', 'user'),
(4, 'lou', 'lou@yahoo.fr', 'lou', 'loulou', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`);

--
-- Index pour la table `film_playlist`
--
ALTER TABLE `film_playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`),
  ADD KEY `UserId` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film_playlist`
--
ALTER TABLE `film_playlist`
  ADD CONSTRAINT `film_playlist_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`playlist_id`),
  ADD CONSTRAINT `fk_film_playlist_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`) ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
