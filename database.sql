-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 23:35
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(10) UNSIGNED NOT NULL,
  `cin` varchar(10) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `cin`, `nom`, `prenom`, `email`, `password`) VALUES
(4, 'aaaa', 'youssef', 'hattat', 'sffjkfl@flkm', 'ojfsfkml');

-- --------------------------------------------------------

--
-- Structure de la table `immobilier`
--

CREATE TABLE `immobilier` (
  `id_immobilier` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `prixlocation` decimal(10,0) NOT NULL,
  `id_type` int(11) NOT NULL,
  `disponible` enum('oui','non') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `immobilier`
--

INSERT INTO `immobilier` (`id_immobilier`, `titre`, `adresse`, `prixlocation`, `id_type`, `disponible`) VALUES
(1, 'Youssef', 'temara', 250, 1, 'oui'),
(2, 'hmed', 'skhirat', 251, 1, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `id_immobilier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_debut_location` date NOT NULL,
  `date_fin_location` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_location`, `id_immobilier`, `id_client`, `date_debut_location`, `date_fin_location`) VALUES
(1, 1, 1, '2022-06-27', '2022-06-29');

-- --------------------------------------------------------

--
-- Structure de la table `typebimmo`
--

CREATE TABLE `typebimmo` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `typebimmo`
--

INSERT INTO `typebimmo` (`id_type`, `libelle`) VALUES
(1, 'Ryad'),
(2, 'Hotel'),
(3, 'Motel'),
(4, 'Villa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `immobilier`
--
ALTER TABLE `immobilier`
  ADD PRIMARY KEY (`id_immobilier`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Index pour la table `typebimmo`
--
ALTER TABLE `typebimmo`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `immobilier`
--
ALTER TABLE `immobilier`
  MODIFY `id_immobilier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `typebimmo`
--
ALTER TABLE `typebimmo`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
