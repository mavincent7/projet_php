-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Janvier 2017 à 12:40
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_Admin` int(1) NOT NULL,
  `Login` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `Mdp` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_Admin`, `Login`, `Mdp`) VALUES
(1, 'admin', 'abcd1234');

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `id_Album` int(2) NOT NULL,
  `Titre` varchar(20) COLLATE ucs2_swedish_ci NOT NULL,
  `Duree` int(5) NOT NULL,
  `Couverture` varchar(150) COLLATE ucs2_swedish_ci DEFAULT NULL,
  `Annee_Parution` year(4) NOT NULL,
  `id_Artiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_swedish_ci;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`id_Album`, `Titre`, `Duree`, `Couverture`, `Annee_Parution`, `id_Artiste`) VALUES
(1, 'Encore', 52, 'https://upload.wikimedia.org/wikipedia/en/6/63/Encore_album_cover.jpeg', 2016, 1);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_Artiste` int(2) NOT NULL,
  `Nom` varchar(20) COLLATE ucs2_swedish_ci DEFAULT NULL,
  `Prenom` varchar(25) COLLATE ucs2_swedish_ci DEFAULT NULL,
  `Pseudo` varchar(25) COLLATE ucs2_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_swedish_ci;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id_Artiste`, `Nom`, `Prenom`, `Pseudo`) VALUES
(1, 'William', 'Grigahcine', 'DJ Snake'),
(2, NULL, NULL, 'The Chainsmokers');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_Avis` int(2) NOT NULL,
  `Type` varchar(20) COLLATE ucs2_swedish_ci NOT NULL,
  `id_Musique` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_swedish_ci;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id_Avis`, `Type`, `id_Musique`) VALUES
(1, 'N', 1),
(2, 'I', 1),
(3, 'P', 1),
(4, 'P', 1),
(5, 'P', 1),
(6, 'P', 1),
(7, 'I', 1),
(8, 'N', 1),
(10, 'P', 1),
(15, 'I', 1),
(16, 'N', 1),
(17, 'I', 1),
(18, 'P', 1),
(20, 'N', 1),
(21, 'N', 1),
(25, 'I', 1),
(26, 'P', 1),
(27, 'I', 1),
(28, 'N', 1),
(29, 'N', 1),
(30, 'N', 1),
(31, 'I', 1),
(32, 'I', 1),
(33, 'P', 1),
(36, 'I', 10),
(37, 'N', 12),
(38, 'P', 10),
(39, 'I', 1),
(40, 'P', 10);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_Commentaire` int(2) NOT NULL,
  `Commentaire` varchar(500) COLLATE ucs2_swedish_ci DEFAULT NULL,
  `id_Musique` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `id_Musique` int(2) NOT NULL,
  `Titre` varchar(25) COLLATE ucs2_swedish_ci NOT NULL,
  `Duree` float NOT NULL,
  `Chemin` varchar(150) COLLATE ucs2_swedish_ci DEFAULT NULL,
  `MiseEnLigne` datetime DEFAULT NULL,
  `id_Artiste` int(2) NOT NULL,
  `id_Album` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_swedish_ci;

--
-- Contenu de la table `musique`
--

INSERT INTO `musique` (`id_Musique`, `Titre`, `Duree`, `Chemin`, `MiseEnLigne`, `id_Artiste`, `id_Album`) VALUES
(1, 'Sahara', 4.18, 'musiques/Sahara.mp3', '2017-01-15 11:08:29', 1, 1),
(10, 'Closer', 4.05, 'musiques/Closer.mp3', '2017-01-16 12:20:14', 2, NULL),
(12, 'Sober', 3.26, 'musiques/Sober.mp3', '2017-01-16 12:28:13', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_Admin`);

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_Album`),
  ADD KEY `id_Artiste` (`id_Artiste`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id_Artiste`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_Avis`),
  ADD KEY `id_Musique` (`id_Musique`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_Commentaire`),
  ADD KEY `id_Musique` (`id_Musique`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`id_Musique`),
  ADD KEY `id_Artiste` (`id_Artiste`),
  ADD KEY `id_Album` (`id_Album`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_Admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `id_Album` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id_Artiste` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_Avis` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_Commentaire` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `musique`
--
ALTER TABLE `musique`
  MODIFY `id_Musique` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_idArtisteAlbum` FOREIGN KEY (`id_Artiste`) REFERENCES `artiste` (`id_Artiste`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_idMusiqueAvis` FOREIGN KEY (`id_Musique`) REFERENCES `musique` (`id_Musique`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_idMusique` FOREIGN KEY (`id_Musique`) REFERENCES `musique` (`id_Musique`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `fk_idAlbum` FOREIGN KEY (`id_Album`) REFERENCES `album` (`id_Album`),
  ADD CONSTRAINT `fk_idArtiste` FOREIGN KEY (`id_Artiste`) REFERENCES `artiste` (`id_Artiste`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
