-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 fév. 2022 à 10:55
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
  `exprim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `userinformation`
--

INSERT INTO `userinformation` (`id`, `nom`, `prenom`, `email`, `passwor`, `psudo`, `token`, `exprim`) VALUES
(10, 'soumia', 'ait belkacem', 'lilia.lilya17@gmail.com', '12345678', 'soumi', '6ded9e1ac574bce27d5dffc9b9d45e508a34c925dc0e3035b5c397b7718de3aae4c54191163a9a21ae558ce11674dae4c740', '1643723400'),
(11, 'chirin', 'chi', 'imamchirine083@gmail.com', '93046758d21048ae10e9fa249537aa79', 'chirin', '', ''),
(12, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
