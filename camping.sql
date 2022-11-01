-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 mai 2021 à 21:50
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `camping`
--
CREATE DATABASE IF NOT EXISTS `camping` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `camping`;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_camping`
--

CREATE TABLE `tbl_camping` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_camping`
--

INSERT INTO `tbl_camping` (`id`, `nom`, `ville`, `description`) VALUES
(1, 'Camping de l\'Île Marie', 'Sherbrooke', 'Au Camping Ile Marie nous accueillons tous les types de campeur sur nos sites de camping les roulottes, les motorisés, les tente-roulottes, les tentes, les groupes de caravaning, etc.'),
(2, 'Camping Beau-lieu', 'Sherbrooke', 'Bienvenue! Le camping Beau-lieu est situé à Rock Forest dans les Cantons de l’Est, directement sur la piste cyclable, à proximité de Sherbrooke et de l’Université, ce qui permet aux vacanciers de se relaxer tout en bénéficiant des activités de la ville.'),
(3, 'Camping plage McKenzie', 'Racine', 'Situé sur les rives du Lac Brompton, le Camping Plage McKenzie vous offre une plage de sable avec une vue magnifique sur les montagnes. Idéal pour profiter de vos sports aquatiques préférés, pédalos, kayaks, paddle board et la baignade.'),
(4, 'Camping de Compton', 'Compton', 'Notre camping familial est situé au coeur d\'une région agrotouristique par excellence. Le Camping de Compton vous fera découvrir ses plus beaux couchers de soleil et son panorama unique.');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `pseudo`, `courriel`, `mdp`) VALUES
(1, 'Marc07', 'marc07@gmail.com', '$2y$10$ESCZNQ3gQyKRnYR9KI63y.SFVbTBDa9HmAiWs9FnTuXsIw5OuUHcO'),
(2, 'lisette77', 'lisette77@gmail.com', '$2y$10$unnhSLwCLOybwIZiQ.SvWO5vlcgilIGzJK78OhHnoBxLw93TRBwB.');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_commentaire`
--

CREATE TABLE `tbl_commentaire` (
  `id` int(11) NOT NULL,
  `id_camping` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `classement` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_commentaire`
--

INSERT INTO `tbl_commentaire` (`id`, `id_camping`, `id_client`, `classement`, `commentaire`) VALUES
(1, 2, 2, 4, 'Très beau camping chaleureux, bel accueil et plusieurs belles activités. Merci beaucoup!'),
(2, 3, 1, 5, 'Ce camping est dans notre top 5 au québec, nous y retournons à chaque année.'),
(3, 3, 2, 4, 'De très beaux terrains pour notre VR.'),
(4, 3, 1, 2, 'Je n\'ai pas aimé, mais je ne sais pas pourquoi.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_camping`
--
ALTER TABLE `tbl_camping`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_commentaire`
--
ALTER TABLE `tbl_commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_camping` (`id_camping`),
  ADD KEY `fk_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_camping`
--
ALTER TABLE `tbl_camping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_commentaire`
--
ALTER TABLE `tbl_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbl_commentaire`
--
ALTER TABLE `tbl_commentaire`
  ADD CONSTRAINT `fk_camping` FOREIGN KEY (`id_camping`) REFERENCES `tbl_camping` (`id`),
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`id_client`) REFERENCES `tbl_client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
