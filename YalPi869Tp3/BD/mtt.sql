-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 30 sep. 2017 à 02:33
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
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL,
  `suspect_id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `address`, `message`, `suspect_id`, `user_id`) VALUES
(1, 'admin@admin.com', 'Incroyable !', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `crimes`
--

CREATE TABLE `crimes` (
  `id` int(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  `suspect_id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `crimes`
--

INSERT INTO `crimes` (`id`, `description`, `suspect_id`, `user_id`) VALUES
(1, 'Crime Passionnel', 1, 1),
(2, 'Bande Organisée', 1, 1),
(3, 'Incendie Volontaire', 1, 1),
(4, 'Incendie Volontaire', 2, 1),
(5, 'Crime Passionnel', 2, 1),
(6, 'Bande Organisée', 3, 1),
(7, 'Bombe Radiologique', 4, 1),
(8, 'Crime Passionnel', 5, 1),
(9, 'Agression Sexuelle', 6, 1),
(10, 'Bombe Radiologique', 7, 1),
(11, 'Agression Sexuelle', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `date`, `description`) VALUES
(1, '2017-09-30', 'Vol d\'epicerie'),
(2, '2016-09-30', 'Meutre au premier degres'),
(3, '2013-06-13', 'Kidnapping');

-- --------------------------------------------------------

--
-- Structure de la table `events_files`
--

CREATE TABLE `events_files` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `events_files`
--

INSERT INTO `events_files` (`id`, `event_id`, `file_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `events_suspects`
--

CREATE TABLE `events_suspects` (
  `id` int(11) NOT NULL,
  `suspect_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events_suspects`
--

INSERT INTO `events_suspects` (`id`, `suspect_id`, `event_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 7, 2),
(4, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'suspect.jpg', 'Files/', '2017-09-30 00:31:46', '2017-09-30 00:31:46', 1);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Vehicules', 1, 'type', 'Aucun'),
(2, 'en_CA', 'Vehicules', 1, 'type', 'None'),
(3, 'ja_JP', 'Vehicules', 1, 'type', 'いいえ'),
(4, 'fr_CA', 'Vehicules', 2, 'type', 'Camion'),
(5, 'en_CA', 'Vehicules', 2, 'type', 'Truck'),
(6, 'ja_JP', 'Vehicules', 2, 'type', 'カミオン'),
(7, 'fr_CA', 'Vehicules', 3, 'type', 'Moto'),
(8, 'en_CA', 'Vehicules', 3, 'type', 'Motorbike'),
(9, 'ja_JP', 'Vehicules', 3, 'type', 'モト'),
(10, 'fr_CA', 'Vehicules', 4, 'type', 'Helicoptere'),
(11, 'en_CA', 'Vehicules', 4, 'type', 'Helicopter'),
(12, 'ja_JP', 'Vehicules', 4, 'type', 'ヘリコプター'),
(13, 'fr_CA', 'Vehicules', 5, 'type', 'Voiture'),
(14, 'en_CA', 'Vehicules', 5, 'type', 'Car'),
(15, 'ja_JP', 'Vehicules', 5, 'type', '車'),
(16, 'fr_CA', 'Vehicules', 6, 'type', 'Voiture'),
(17, 'en_CA', 'Vehicules', 6, 'type', 'Car'),
(18, 'ja_JP', 'Vehicules', 6, 'type', '車'),
(19, 'fr_CA', 'Vehicules', 7, 'type', 'Voiture'),
(20, 'en_CA', 'Vehicules', 7, 'type', 'Car'),
(21, 'ja_JP', 'Vehicules', 7, 'type', '車'),
(22, 'fr_CA', 'Vehicules', 8, 'type', 'Camion'),
(23, 'en_CA', 'Vehicules', 8, 'type', 'Truck'),
(24, 'ja_JP', 'Vehicules', 8, 'type', 'カミオン'),
(25, 'fr_CA', 'Crimes', 1, 'description', 'Crime Passionnel'),
(26, 'en_CA', 'Crimes', 1, 'description', 'Passionate Crime'),
(27, 'ja_JP', 'Crimes', 1, 'description', '情熱的な犯罪'),
(28, 'fr_CA', 'Crimes', 2, 'description', 'Bande Organisée'),
(29, 'en_CA', 'Crimes', 2, 'description', 'Organized Band'),
(30, 'ja_JP', 'Crimes', 2, 'description', '組織化されたバンド'),
(31, 'fr_CA', 'Crimes', 3, 'description', 'Incendie Volontaire'),
(32, 'en_CA', 'Crimes', 3, 'description', 'Arson'),
(33, 'ja_JP', 'Crimes', 3, 'description', '火災ボランティア'),
(34, 'fr_CA', 'Crimes', 4, 'description', 'Incendie Volontaire'),
(35, 'en_CA', 'Crimes', 4, 'description', 'Arson'),
(36, 'ja_JP', 'Crimes', 4, 'description', '火災ボランティア'),
(37, 'fr_CA', 'Crimes', 5, 'description', 'Crime Passionnel'),
(38, 'en_CA', 'Crimes', 5, 'description', 'Passionate Crime'),
(39, 'ja_JP', 'Crimes', 5, 'description', '情熱的な犯罪'),
(40, 'fr_CA', 'Crimes', 6, 'description', 'Bande Organisée'),
(41, 'en_CA', 'Crimes', 6, 'description', 'Organized Band'),
(42, 'ja_JP', 'Crimes', 6, 'description', '組織化されたバンド'),
(43, 'fr_CA', 'Crimes', 7, 'description', 'Bombe Radiologique'),
(44, 'en_CA', 'Crimes', 7, 'description', 'Radiological Bomb'),
(45, 'ja_JP', 'Crimes', 7, 'description', '放射線爆弾'),
(46, 'fr_CA', 'Crimes', 8, 'description', 'Crime Passionnel'),
(47, 'en_CA', 'Crimes', 8, 'description', 'Passionate Crime'),
(48, 'ja_JP', 'Crimes', 8, 'description', '情熱的な犯罪'),
(49, 'fr_CA', 'Crimes', 9, 'description', 'Agression Sexuelle'),
(50, 'en_CA', 'Crimes', 9, 'description', 'Sexual Assault'),
(51, 'ja_JP', 'Crimes', 9, 'description', '性的暴力'),
(52, 'fr_CA', 'Crimes', 10, 'description', 'Bombe Radiologique'),
(53, 'en_CA', 'Crimes', 10, 'description', 'Radiological Bomb'),
(54, 'ja_JP', 'Crimes', 10, 'description', '放射線爆弾'),
(55, 'fr_CA', 'Crimes', 11, 'description', 'Agression Sexuelle'),
(56, 'en_CA', 'Crimes', 11, 'description', 'Sexual Assault'),
(57, 'ja_JP', 'Crimes', 11, 'description', '性的暴力');

-- --------------------------------------------------------

--
-- Structure de la table `suspects`
--

CREATE TABLE `suspects` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vehicule_id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `suspects`
--

INSERT INTO `suspects` (`id`, `firstname`, `name`, `vehicule_id`, `user_id`) VALUES
(1, 'Jean', 'Paul', 1, 1),
(2, 'Bruce', 'Wayne', 2, 1),
(3, 'Sebastien', 'Lamontagne', 3, 1),
(4, 'Martin', 'Goule', 4, 1),
(5, 'Christinia', 'pope', 5, 1),
(6, 'Cyrus', 'Bhaskar', 6, 1),
(7, 'Uttara', 'Maximilienne', 7, 1),
(8, 'Martin', 'Picard', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`, `role`) VALUES
(2, 'etudiant@cmomo.ca', '$2y$10$/MKQgKZ0rBdePIp1Nvfkx.Usv/upCDqOBy/3rCq6HdFzDcKXsoODC', '2017-08-29 12:51:53', '2017-08-29 13:05:00', 0),
(1, 'admin@admin.com', '$2y$10$QsNbkQUvEG9BvKxiLSxYJuyxAST7NaY7ClU8y8ChEKqDK6p3jSaM2', '2017-09-07 19:40:20', '2017-09-07 19:40:20', 3);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(5) NOT NULL,
  `type` varchar(200) NOT NULL,
  `plate` char(6) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `type`, `plate`, `user_id`) VALUES
(1, 'Aucun', '000000', 1),
(2, 'Camion', 'H6A9L2', 1),
(3, 'Moto', 'L9O7D4', 1),
(4, 'Helicoptere', 'K7J9I4', 1),
(5, 'Voiture', 'J8L9G3', 1),
(6, 'Voiture', 'P9Y6S5', 1),
(7, 'Voiture', 'U5T9M3', 1),
(8, 'Camion', 'M8Y5N1', 1);

--
-- Index pour les tables déchargées
--

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events_suspects`
--
ALTER TABLE `events_suspects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`(100),`foreign_key`,`field`(100));

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
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `events_files`
--
ALTER TABLE `events_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `events_suspects`
--
ALTER TABLE `events_suspects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `suspects`
--
ALTER TABLE `suspects`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
