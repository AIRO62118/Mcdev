-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 18 mars 2022 à 13:59
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
  `parent_id_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `parent_id_id`, `libelle`) VALUES
(81, NULL, 'Barthelemy'),
(82, 81, 'Costa'),
(83, NULL, 'Merle'),
(84, NULL, 'Lefebvre'),
(85, NULL, 'Menard'),
(86, NULL, 'Costa'),
(87, NULL, 'Ramos'),
(88, NULL, 'Marion'),
(89, NULL, 'Thierry'),
(90, NULL, 'Vallee');

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
('DoctrineMigrations\\Version20220315074757', '2022-03-15 08:48:12', 26454);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `competence_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `competence_id`, `libelle`) VALUES
(1, 86, 'Etienne'),
(2, 81, 'Thibault'),
(3, 83, 'Guillou'),
(4, 83, 'Martineau'),
(5, 86, 'Julien'),
(6, 89, 'Barre'),
(7, 87, 'Boutin'),
(8, 81, 'Denis'),
(9, 89, 'Lombard'),
(10, 81, 'Maillard');

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
  `adresse_ville_e` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_region_e` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_cpe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_premium` tinyint(1) NOT NULL,
  `date_création_page` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom_entreprise`, `logo_entreprise`, `banniere_entreprise`, `description_entreprise`, `adresse_ville_e`, `adresse_region_e`, `adresse_cpe`, `est_premium`, `date_création_page`) VALUES
(1, 'Renaud', NULL, NULL, NULL, 'Diallo-sur-Maillard', 'Richard-sur-Ribeiro', '54300', 0, '2014-06-23 14:51:29'),
(2, 'Letellier', NULL, NULL, NULL, 'Pages-sur-Mer', 'Meyer', '81310', 0, '1995-07-21 00:24:38'),
(3, 'Lemaitre', NULL, NULL, NULL, 'Henry-sur-Mer', 'Devaux', '24451', 0, '1994-10-22 12:04:36'),
(4, 'Roy', NULL, NULL, NULL, 'Nguyen', 'Rodriguez', '59050', 0, '2000-08-17 12:32:12'),
(5, 'Raynaud', NULL, NULL, NULL, 'Moulin', 'Blanchard', '68092', 1, '1975-05-25 20:44:49'),
(6, 'Lemonnier', NULL, NULL, NULL, 'Berger-la-Forêt', 'Perrier', '91062', 0, '2016-02-12 11:17:00'),
(7, 'Chauvin', NULL, NULL, NULL, 'Godard-sur-Mer', 'Lecoq', '14085', 0, '1978-10-26 20:00:30'),
(8, 'Legrand', NULL, NULL, NULL, 'Marty-les-Bains', 'Maillet-sur-Martel', '21002', 1, '1972-06-28 15:07:43'),
(9, 'Jacquet', NULL, NULL, NULL, 'Ledoux-sur-Meyer', 'Camus', '00032', 0, '2019-12-22 14:15:58'),
(10, 'Buisson', NULL, NULL, NULL, 'Robert', 'Vallet', '89912', 1, '2010-04-29 08:45:52');

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
  `est_salarie_id` int(11) DEFAULT NULL,
  `est_patron_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_premium` tinyint(1) DEFAULT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `est_salarie_id`, `est_patron_id`, `email`, `roles`, `password`, `is_verified`, `nom`, `prenom`, `date_de_naissance`, `adresse_region`, `adresse_ville`, `adresse_cp`, `est_premium`, `date_inscription`) VALUES
(1, NULL, NULL, 'thomas.lesage@laposte.net', '[\"ROlE_USER\"]', '$2y$13$2Dzr4BoXyAyCi49SeiQRguX3Scje2Y9zIbEBUUCxD1.HtMescTyw6', 0, 'Lesage', 'Thomas', '2006-12-12', 'Morvan', 'Langlois', '35863', 0, '2022-02-15 00:06:55'),
(2, NULL, NULL, 'claudine.peltier@club-internet.fr', '[\"ROlE_USER\"]', '$2y$13$BEhtxZ/gG9RqYVCUiQBuBOpmVb5VhyjbX0LRgcCYj0n5/SVA6bAzO', 0, 'Peltier', 'Claudine', '2016-02-15', 'Da Costa', 'LeroyBourg', '93581', 1, '2022-02-06 16:30:00'),
(3, NULL, NULL, 'inès.faivre@noos.fr', '[\"ROlE_USER\"]', '$2y$13$QozzfReTsvE7Ywlbkilqhep8R.ZyvrfxRXG7Rjfr4e.chHMAGgg6i', 0, 'Faivre', 'Inès', '1998-08-25', 'Morenoboeuf', 'Vidal', '93505', 0, '2022-03-12 15:29:51'),
(4, 8, NULL, 'matthieu.le roux@laposte.net', '[\"ROlE_USER\"]', '$2y$13$cdD3ukW8vPpGF2KNQDkVsO9ytJ917JlCN/7dcNFtj2Y6Ek8PMFfby', 0, 'Le Roux', 'Matthieu', '1974-12-31', 'Faivre-sur-Evrard', 'Vaillant', '16475', 1, '2022-02-02 23:57:37'),
(5, NULL, NULL, 'jeannine.rossi@tele2.fr', '[\"ROlE_USER\"]', '$2y$13$7uiCovmn4ZOok7UzR3rU4.kWPO.SzannUzNAffM8WMEOHX5DT3tx6', 0, 'Rossi', 'Jeannine', '2009-03-10', 'MerleVille', 'Allain', '52095', 0, '2022-03-03 20:15:10'),
(6, 2, NULL, 'matthieu.lambert@wanadoo.fr', '[\"ROlE_USER\"]', '$2y$13$c3eScQ1gF.8YK6XdTRzOBelYqp9f297eOnpWBnBPJ0cSVBbHyy/fe', 0, 'Lambert', 'Matthieu', '1978-03-18', 'Morin', 'RaymondVille', '19694', 1, '2022-03-14 21:33:14'),
(7, 1, NULL, 'patrick.verdier@sfr.fr', '[\"ROlE_USER\"]', '$2y$13$Qp9vcFio/VGQXMAK0Ymu6emmgUIySTojkdb6ua5NM8NcSf7Zj5utO', 0, 'Verdier', 'Patrick', '1984-03-04', 'Hamel-la-Forêt', 'Royer', '16004', 0, '2022-01-19 21:11:09'),
(8, 1, NULL, 'chantal.brun@noos.fr', '[\"ROlE_USER\"]', '$2y$13$txuZ30GKDzpssaUrourFZuIk0Yz3nMSUzoVlDaCn8RkZJNqQ31dYe', 0, 'Brun', 'Chantal', '1993-01-10', 'Besnardnec', 'Chauveau', '57050', 0, '2022-02-14 16:46:19'),
(9, 1, NULL, 'guy.marchand@laposte.net', '[\"ROlE_USER\"]', '$2y$13$.YauNseozJWGqvSoFAQSvOCzjG46yPoeUj5dUao/ELFlK6IHidBKO', 0, 'Marchand', 'Guy', '1983-12-31', 'Lenoir', 'Joly-les-Bains', '79015', 1, '2022-02-08 08:55:51'),
(10, 1, NULL, 'gilles.martineau@orange.fr', '[\"ROlE_USER\"]', '$2y$13$Uom78wWwopsaE6nAsbfay.Mw4N8TCKHZqnxyemz0DJ..D271vX/iC', 0, 'Martineau', 'Gilles', '1984-11-29', 'LopezBourg', 'BarthelemyBourg', '45918', 1, '2022-03-10 10:08:01');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `posseder`
--
ALTER TABLE `posseder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rechercher`
--
ALTER TABLE `rechercher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
