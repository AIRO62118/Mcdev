-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 14 mars 2022 à 15:43
-- Version du serveur : 10.3.29-MariaDB-0+deb10u1
-- Version de PHP : 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db-mcdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `libelle`, `parent_id_id`) VALUES
(1, 'Merle', NULL),
(2, 'Laroche', NULL),
(3, 'Renaud', NULL),
(4, 'Arnaud', 2),
(5, 'Dupuis', NULL),
(6, 'Coste', NULL),
(7, 'Pruvost', NULL),
(8, 'Bonnin', NULL),
(9, 'Thibault', NULL),
(10, 'Le Goff', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_envoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220307081656', '2022-03-07 09:17:25', 187),
('DoctrineMigrations\\Version20220307082622', '2022-03-07 09:26:33', 52),
('DoctrineMigrations\\Version20220307083051', '2022-03-07 09:30:57', 352),
('DoctrineMigrations\\Version20220307091056', '2022-03-07 10:11:04', 50),
('DoctrineMigrations\\Version20220308091157', '2022-03-08 10:12:15', 1283),
('DoctrineMigrations\\Version20220308092923', '2022-03-08 10:29:32', 243),
('DoctrineMigrations\\Version20220308093718', '2022-03-08 10:37:22', 2506),
('DoctrineMigrations\\Version20220308094545', '2022-03-08 10:45:49', 1141),
('DoctrineMigrations\\Version20220308095633', '2022-03-08 10:57:15', 3349),
('DoctrineMigrations\\Version20220308100538', '2022-03-08 11:05:43', 1026),
('DoctrineMigrations\\Version20220308115219', '2022-03-08 12:52:45', 1092);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `competence_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banniere_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_entreprise` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_premium` tinyint(1) NOT NULL,
  `date_création_page` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom_entreprise`, `logo_entreprise`, `banniere_entreprise`, `description_entreprise`, `adresse_ville`, `adresse_region`, `adresse_cp`, `est_premium`, `date_création_page`) VALUES
(21, 'Gros', NULL, NULL, NULL, 'Lebreton', 'Maillet-sur-Chartier', '67398', 1, '2005-01-27 18:54:13'),
(22, 'Vasseur', NULL, NULL, NULL, 'Fournier', 'Le Roux-les-Bains', '26080', 1, '2019-12-28 04:05:20'),
(23, 'Cohen', NULL, NULL, NULL, 'Guyot', 'Leroux', '57378', 0, '1996-11-20 09:51:01'),
(24, 'Collin', NULL, NULL, NULL, 'Lebreton', 'Marechal', '82083', 0, '2012-11-29 15:04:23'),
(25, 'Bouvet', NULL, NULL, NULL, 'Vaillantboeuf', 'Charles', '29076', 1, '1991-02-02 22:17:04'),
(26, 'Verdier', NULL, NULL, NULL, 'Cousin', 'Perrot', '78096', 0, '1994-07-06 23:55:40'),
(27, 'Gaudin', NULL, NULL, NULL, 'Klein', 'Moreno-les-Bains', '53126', 1, '2011-04-06 17:52:27'),
(28, 'Roussel', NULL, NULL, NULL, 'Lebrun-la-Forêt', 'Auger', '58713', 0, '1974-01-01 09:37:46'),
(29, 'Chevalier', NULL, NULL, NULL, 'Fontaine', 'Grondin-les-Bains', '90043', 0, '1987-08-17 05:33:24'),
(30, 'Lagarde', NULL, NULL, NULL, 'Lopeznec', 'Briandnec', '75098', 0, '2021-12-16 14:28:49');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `competence_id` int(11) DEFAULT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biographie_profil` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banniere_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rechercher`
--

CREATE TABLE `rechercher` (
  `id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `salaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_demande` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `est_salarie_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_premium` tinyint(1) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `est_patron_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `est_salarie_id`, `nom`, `prenom`, `date_de_naissance`, `adresse_region`, `adresse_ville`, `adresse_cp`, `est_premium`, `date_inscription`, `est_patron_id`) VALUES
(23, 'guillaume.le roux@yahoo.fr', '[\"ROlE_USER\"]', '$2y$13$pFEl84/v8CpBAzp4AdPiteGUEf.FRfJ0K3k3LRNKEUM0uGHgHhsp6', 0, NULL, 'Le Roux', 'Guillaume', '2007-03-22', 'Couturiernec', 'Vaillantdan', '68075', 1, '2022-02-01 07:03:07', NULL),
(24, 'thomas.charrier@live.com', '[\"ROlE_USER\"]', '$2y$13$RMGgWeNoATiJlw4a.o.3CeF2NchxBb/Rc.Fd4uxqxYLYpjj4SjWDq', 0, NULL, 'Charrier', 'Thomas', '2018-04-21', 'Morvan-sur-Mer', 'Gomezboeuf', '89418', 1, '2022-01-22 01:30:53', NULL),
(25, 'guillaume.ledoux@wanadoo.fr', '[\"ROlE_USER\"]', '$2y$13$xwi5TH8B8v7fnrPxnrz1Neqx6v7aKke57uJGYetGg362KfzZM7XI.', 0, NULL, 'Ledoux', 'Guillaume', '2016-05-06', 'Leleunec', 'Roy-sur-Thibault', '42504', 0, '2022-02-08 16:16:15', NULL),
(26, 'patrick.seguin@club-internet.fr', '[\"ROlE_USER\"]', '$2y$13$gGkcLeGiHNPeNRpKaX2c7O9lfKVLHP8nNHR1Eic3fuvVMiHIPsXL2', 0, NULL, 'Seguin', 'Patrick', '2014-07-29', 'Didiernec', 'De Sousa', '61996', 0, '2022-03-06 19:03:55', NULL),
(27, 'sébastien.lefebvre@dbmail.com', '[\"ROlE_USER\"]', '$2y$13$5GtGp6dFOG/CQkM9z8TTBO6PzFHGswU1BvZOQNoi4QgtKKXybqrvO', 0, NULL, 'Lefebvre', 'Sébastien', '2007-04-20', 'Couturier', 'PeltierBourg', '83852', 0, '2022-02-04 13:04:15', NULL),
(28, 'danielle.navarro@free.fr', '[\"ROlE_USER\"]', '$2y$13$9S2MSqq/qg4.8lG8t4p4/Omzl6mtCOqZWmDRtS.vzcO.eACLUs/i.', 0, NULL, 'Navarro', 'Danielle', '1973-07-12', 'Hoarau-sur-Mer', 'Brunet-sur-Bouchet', '18133', 1, '2022-03-05 13:35:59', NULL),
(29, 'auguste.thierry@orange.fr', '[\"ROlE_USER\"]', '$2y$13$eeRseb6Ig5yXZAmcpOFGU.wapiFT/dGnHnD3qUTFFviclCji7FLh6', 0, NULL, 'Thierry', 'Auguste', '1970-10-20', 'Blondel', 'CamusBourg', '01436', 1, '2022-01-23 10:55:29', NULL),
(30, 'thibault.legrand@laposte.net', '[\"ROlE_USER\"]', '$2y$13$w.3hek/N8n1Itb4E0qL0Yun847sUt1zX8WvlQ6sAQsu2Eprk0.u/W', 0, NULL, 'Legrand', 'Thibault', '2008-02-29', 'Bourdon-les-Bains', 'Joly-sur-Leveque', '98487', 0, '2022-01-20 18:04:02', NULL),
(31, 'nathalie.michaud@laposte.net', '[\"ROlE_USER\"]', '$2y$13$tV4JgBS7o7Nvs/QgdNUlPuoflCFmcNDjwE3Uwq9MTd1azmbkPM83i', 0, NULL, 'Michaud', 'Nathalie', '1981-05-14', 'Coulon', 'Leroux', '41051', 0, '2022-02-27 09:47:59', NULL),
(32, 'antoine.mendes@club-internet.fr', '[\"ROlE_USER\"]', '$2y$13$V47mWOvaYcn.1syLWDW7COxXBJ98.s.q1/cLmvQMrtTxiD0mCshj2', 0, NULL, 'Mendes', 'Antoine', '2001-01-07', 'Pichon', 'Hubert', '12077', 1, '2022-02-24 22:53:35', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_94D4687FB3750AF4` (`parent_id_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_78AF0ACC15761DAB` (`competence_id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62EF7CBAA76ED395` (`user_id`),
  ADD KEY `IDX_62EF7CBA15761DAB` (`competence_id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E6D6B297A76ED395` (`user_id`);

--
-- Index pour la table `rechercher`
--
ALTER TABLE `rechercher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F3023C2315761DAB` (`competence_id`),
  ADD KEY `IDX_F3023C23A4AEAFEA` (`entreprise_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649A22CC7F3` (`est_patron_id`),
  ADD KEY `IDX_8D93D649A922E09C` (`est_salarie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `posseder`
--
ALTER TABLE `posseder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rechercher`
--
ALTER TABLE `rechercher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `FK_94D4687FB3750AF4` FOREIGN KEY (`parent_id_id`) REFERENCES `competence` (`id`);

--
-- Contraintes pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD CONSTRAINT `FK_78AF0ACC15761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_62EF7CBA15761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`),
  ADD CONSTRAINT `FK_62EF7CBAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_E6D6B297A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rechercher`
--
ALTER TABLE `rechercher`
  ADD CONSTRAINT `FK_F3023C2315761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`),
  ADD CONSTRAINT `FK_F3023C23A4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649A22CC7F3` FOREIGN KEY (`est_patron_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_8D93D649A922E09C` FOREIGN KEY (`est_salarie_id`) REFERENCES `entreprise` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
