-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 14 mars 2022 à 14:04
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
(11, 'Seguin', NULL, NULL, NULL, 'Duvalnec', 'Francois', '94033', 1, '1987-04-03 21:48:27'),
(12, 'Weber', NULL, NULL, NULL, 'Dos Santos', 'Traore', '65021', 1, '1980-08-15 05:11:46'),
(13, 'Jean', NULL, NULL, NULL, 'Brunel', 'Lemaire', '68043', 1, '1993-04-05 04:29:44'),
(14, 'Marin', NULL, NULL, NULL, 'Legrandnec', 'LedouxVille', '63009', 0, '1972-01-17 03:06:00'),
(15, 'Begue', NULL, NULL, NULL, 'Lesagedan', 'Tessier', '66091', 1, '2015-05-14 13:56:14'),
(16, 'Benoit', NULL, NULL, NULL, 'Francois', 'Vidal', '37207', 0, '1992-08-04 15:38:19'),
(17, 'Guillet', NULL, NULL, NULL, 'Marty', 'Garcia-les-Bains', '81031', 0, '1970-05-25 17:26:39'),
(18, 'Simon', NULL, NULL, NULL, 'Bourgeois', 'Navarro-les-Bains', '90131', 0, '1992-05-16 16:08:12'),
(19, 'Valentin', NULL, NULL, NULL, 'Seguin-la-Forêt', 'Leclercq-sur-Huet', '91888', 1, '1975-12-18 11:23:04'),
(20, 'Legendre', NULL, NULL, NULL, 'Giraud-sur-Mer', 'Pelletier-la-Forêt', '62085', 1, '1973-03-05 21:21:04');

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
(13, 'michèle.moreno@wanadoo.fr', '[\"ROlE_USER\"]', '$2y$13$4fPpf9U60Il5vLmWoNsuT.7avcTP2rNe.k8PHq3Nwl.3XWGf82J2m', 0, 11, 'Moreno', 'Michèle', '2006-12-25', 'Levy-sur-Bigot', 'Mendes', '25816', 0, '2022-01-18 07:15:37', NULL),
(14, 'tristan.nicolas@tele2.fr', '[\"ROlE_USER\"]', '$2y$13$LBHIUS7SdaoGVa8iOfq2auYRkL04SZzjQBFRpjdebJDA3vRjtTR1i', 0, NULL, 'Nicolas', 'Tristan', '2017-05-14', 'Denis', 'Paris-sur-Mer', '68020', 0, '2022-03-02 13:37:06', NULL),
(15, 'benoît.antoine@laposte.net', '[\"ROlE_USER\"]', '$2y$13$IP3h/KG.rMUG4cX6JyobbuEQzBQP/FNJ5eAlFYYeKzpmt/KK/jmXu', 0, NULL, 'Antoine', 'Benoît', '1997-12-10', 'FischerVille', 'Bouvier', '31064', 0, '2022-02-11 00:57:35', NULL),
(16, 'christophe.robert@laposte.net', '[\"ROlE_USER\"]', '$2y$13$cODuID2KRONJiSvxhPVnQuO9YZu7ynrNLictDuN.chss9w4vcacMG', 0, NULL, 'Robert', 'Christophe', '2016-07-18', 'Lecoq-les-Bains', 'Rousset', '49433', 0, '2022-02-14 22:14:25', NULL),
(17, 'dorothée.dupuis@laposte.net', '[\"ROlE_USER\"]', '$2y$13$pRUXee0eqigCf0JQqdLPFePkDgG8Qx3ZyMVKMEL05zn71tFJZFDjC', 0, NULL, 'Dupuis', 'Dorothée', '2006-10-11', 'Rodrigues', 'Brunet', '95060', 0, '2022-01-06 00:06:24', NULL),
(18, 'joseph.bousquet@yahoo.fr', '[\"ROlE_USER\"]', '$2y$13$7np2NkvglpxOeNsaghyZ4O0Zdxn12ZavFR7qdDCpORzrEpxpf51bu', 0, NULL, 'Bousquet', 'Joseph', '2020-09-10', 'CoulonVille', 'Noel', '77069', 0, '2022-02-26 22:59:09', NULL),
(19, 'Éléonore.gomez@yahoo.fr', '[\"ROlE_USER\"]', '$2y$13$HKcgzwk3iqBHSyxNmUJt.uhchq8TpeZS.TxEPMFLlGSqjTMiI7lIu', 0, NULL, 'Gomez', 'Éléonore', '1982-10-11', 'Chevallier', 'Lebrun', '10763', 0, '2022-02-24 22:05:24', NULL),
(20, 'amélie.evrard@noos.fr', '[\"ROlE_USER\"]', '$2y$13$pbADLMkBOxFgwK9fWj.98uUH2G0BpzfGb2G8sdbiELpGojwjKxune', 0, NULL, 'Evrard', 'Amélie', '1997-09-09', 'Morenodan', 'Couturier', '77923', 0, '2022-01-23 20:54:24', NULL),
(21, 'jacques.pottier@laposte.net', '[\"ROlE_USER\"]', '$2y$13$F0DxRqnUxfBlkipV743nnu2mUe8v5340b7DgKGWjkxTRgbckz3AaG', 0, NULL, 'Pottier', 'Jacques', '2019-07-30', 'Rousset-sur-Mer', 'Georges', '63006', 0, '2022-02-09 01:19:30', NULL),
(22, 'aimée.bousquet@sfr.fr', '[\"ROlE_USER\"]', '$2y$13$UVcuMFMDkdWosFC7qC/llugQ68mmdeHYcQBbXPo.B8dERUftzJ8pW', 0, 11, 'Bousquet', 'Aimée', '2008-08-27', 'Barbeboeuf', 'DuhamelBourg', '50227', 0, '2022-02-20 07:51:18', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
