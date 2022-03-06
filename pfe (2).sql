-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 27 fév. 2022 à 16:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudoo` varchar(25) NOT NULL,
  `adminDate` varchar(30) NOT NULL,
  `addBy` varchar(30) NOT NULL DEFAULT '/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudoo`, `adminDate`, `addBy`) VALUES
(1, 'Admin29', '18, 1, 2022', '/');

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `OfferName` text NOT NULL,
  `OfferDescription` text NOT NULL,
  `OfferCategore` text NOT NULL,
  `OfferImage` text NOT NULL,
  `OfferPoster` text NOT NULL,
  `OfferEvaluation` int(100) NOT NULL,
  `DatePost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `serviceDescription` longtext NOT NULL,
  `serviceIcon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `serviceName`, `serviceDescription`, `serviceIcon`) VALUES
(213, 'besnice', '', './images_Admin/1.png'),
(214, 'audio', '', './images_Admin/audio.png'),
(215, 'video', '', './images_Admin/film.png'),
(216, 'Programmation', '', './images_Admin/laptop.png'),
(217, 'disgn', '', './images_Admin/creativity.png'),
(218, 'traduction', '', './images_Admin/edit.png');

-- --------------------------------------------------------

--
-- Structure de la table `userinformation`
--

CREATE TABLE `userinformation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwor` varchar(100) NOT NULL,
  `psudo` varchar(30) NOT NULL,
  `token` longtext NOT NULL,
  `exprim` text NOT NULL,
  `Theadmin` int(11) NOT NULL DEFAULT 2,
  `image` text NOT NULL DEFAULT './images_Admin/images.jpg',
  `userDate` varchar(30) NOT NULL,
  `block` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `userinformation`
--

INSERT INTO `userinformation` (`id`, `nom`, `prenom`, `email`, `passwor`, `psudo`, `token`, `exprim`, `Theadmin`, `image`, `userDate`, `block`) VALUES
(13, 'admin', 'admin', 'mustapha.stambouli29m@gmail.com', '787e33d1fa592016673b276f39553b88', 'Admin29', '', '', 0, './images_Admin/images.jpg', '18, 1, 2022', 0),
(19, 'soumia', 'ait belkacem', 'lilia.lilya17@gmail.com', '560f6c297fa06fcddb6bf4cdcb801554', 'soumi', '', '', 2, './images_Admin/images.jpg', '', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT pour la table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
