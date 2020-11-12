-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 nov. 2020 à 15:31
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `congé`
--

-- --------------------------------------------------------

--
-- Structure de la table `dmd`
--

CREATE TABLE `dmd` (
  `id` int(11) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `nom` text NOT NULL,
  `prénom` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `Edate` date NOT NULL,
  `Sdate` date NOT NULL,
  `intérim` int(11) NOT NULL,
  `RA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dmd`
--

INSERT INTO `dmd` (`id`, `cin`, `nom`, `prénom`, `email`, `Edate`, `Sdate`, `intérim`, `RA`) VALUES
(335, 'bloom', 'bloom', 'bloom', 'bloom@bloom.com', '2020-11-02', '2020-12-06', 2, 1),
(336, 'glimmer', 'glimmer', 'glimmer', 'glimmer@gmail.com', '2020-10-26', '2020-12-06', 3, 1),
(337, 'nezha', 'nezha', 'nezha', 'nezha@gmail.com', '2020-10-26', '2020-12-06', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `duration`
--

CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `cin` text NOT NULL,
  `durée` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `duration`
--

INSERT INTO `duration` (`id`, `cin`, `durée`) VALUES
(237, 'bloom', '1	mois	4	jours'),
(238, 'glimmer', '1	mois	11	jours'),
(239, 'nezha', '1	mois	11	jours');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `events1`
--

CREATE TABLE `events1` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events1`
--

INSERT INTO `events1` (`id`, `title`, `color`, `start`, `end`) VALUES
(11, 'feast', '#40E0D0', '2020-11-04 00:00:00', '2020-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `events2`
--

CREATE TABLE `events2` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events2`
--

INSERT INTO `events2` (`id`, `title`, `color`, `start`, `end`) VALUES
(8, 'bonjour', '#008000', '2020-11-03 00:00:00', '2020-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `new` varchar(255) NOT NULL,
  `cin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `file_url`, `new`, `cin`) VALUES
(227, '5fa0152abaf2f3.00943462.docx', 'uploads/TCP.docx', 'TCP.docx', 'bloom'),
(228, '5fa01554e283f7.72204379.pdf', 'uploads/doc.pdf', 'doc.pdf', 'glimmer'),
(229, '5fa0158866bdf1.93658447.jpg', 'uploads/minis.jpg', 'minis.jpg', 'nezha');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `cin` varchar(10) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `jourstot` int(11) NOT NULL,
  `joursrest` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `cin`, `nom`, `prénom`, `grade`, `division`, `tel`, `adresse`, `jourstot`, `joursrest`, `email`) VALUES
(65, 'bloom', 'bloom', 'bloom', 'professeur', 'ingenieur', '0521548396', 'bloom', 20, 30, 'bloom@gmail.com'),
(66, 'glimmer', 'glimmer', 'glimmer', 'ingénieur', 'Bachelier', '062598753210', 'glimmer', 10, 30, 'glimmer@gmail.com'),
(67, 'nezha', 'nezha', 'nezha', 'eleve', 'ingénieur', '0521548396', 'taounate', 15, 25, 'nezha@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `congé` varchar(250) NOT NULL,
  `cin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `congé`, `cin`) VALUES
(371, 'Congé administratif annuel', 'bloom'),
(372, 'Congé de pèlerinage', 'glimmer'),
(373, 'Congé de pèlerinage', 'nezha');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(11, 'nezha', 'nezha@gmail.com', 'f5ed62cfbb7d30633c1bdec46dc2e8280fd6f4173a0167f1ce262b49ca0b3e13');

-- --------------------------------------------------------

--
-- Structure de la table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users1`
--

INSERT INTO `users1` (`id`, `username`, `email`, `password`) VALUES
(13, 'ges', 'ges@ges.com', '9e75ebde0bf19e30db7574e794118c002316eef0e385129723916c50c4cf50ef');

-- --------------------------------------------------------

--
-- Structure de la table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users2`
--

INSERT INTO `users2` (`id`, `username`, `email`, `password`) VALUES
(9, 'valid', 'valid@gmail.com', 'ec654fac9599f62e79e2706abef23dfb7c07c08185aa86db4d8695f0b718d1b3'),
(10, 'nezha', 'nezha@gmail.com', 'f5ed62cfbb7d30633c1bdec46dc2e8280fd6f4173a0167f1ce262b49ca0b3e13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dmd`
--
ALTER TABLE `dmd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events1`
--
ALTER TABLE `events1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events2`
--
ALTER TABLE `events2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dmd`
--
ALTER TABLE `dmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT pour la table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `events1`
--
ALTER TABLE `events1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `events2`
--
ALTER TABLE `events2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
