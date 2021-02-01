-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 09 nov. 2017 à 20:52
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mtt`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `suspect_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `crimes`
--

CREATE TABLE `crimes` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `suspect_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `events_files`
--

CREATE TABLE `events_files` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `events_suspects`
--

CREATE TABLE `events_suspects` (
  `id` int(11) NOT NULL,
  `suspect_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `created` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `modified` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `field` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(60) COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suspects`
--

CREATE TABLE `suspects` (
  `id` int(11) NOT NULL,
  `firstname` char(1) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `name` char(1) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `vehicule_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `role` int(11) NOT NULL,
  `comfirmation` tinyint(1) NOT NULL DEFAULT '0',
  `uuid` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `plate` char(1) COLLATE utf8_general_mysql500_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suspect_id` (`suspect_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suspect_id` (`suspect_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events_files`
--
ALTER TABLE `events_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `events_suspects`
--
ALTER TABLE `events_suspects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suspect_id` (`suspect_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `suspects`
--
ALTER TABLE `suspects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicule_id` (`vehicule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
