-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 24 mars 2022 à 15:52
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoo_animal`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(100) NOT NULL,
  `animal_species` varchar(100) NOT NULL,
  `animal_entryDate` datetime NOT NULL,
  `animal_gender` varchar(50) NOT NULL,
  `animal_parent_id` int(11) NOT NULL,
  `animal_picture` varchar(255) NOT NULL,
  `animal_diet` varchar(255) NOT NULL,
  `animal_treatment` varchar(255) NOT NULL,
  `animal_deathDate` datetime DEFAULT NULL,
  `animal_info` text,
  `animal_enclos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE `enclos` (
  `enclos_id` int(11) NOT NULL,
  `enclos_size` int(11) NOT NULL,
  `enclos_env` varchar(100) NOT NULL,
  `enclos_nom` varchar(100) NOT NULL,
  `enclos_empty` tinyint(1) NOT NULL,
  `enclos_capacity` int(3) NOT NULL,
  `enclos_zoo_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `healers`
--

CREATE TABLE `healers` (
  `healer_id` int(11) NOT NULL,
  `healer_first_name` varchar(100) NOT NULL,
  `healer_last_name` varchar(100) NOT NULL,
  `healer_entryDate` datetime NOT NULL,
  `healer_gender` varchar(50) NOT NULL,
  `healer_phone` int(20) NOT NULL,
  `healer_picture` varchar(255) NOT NULL,
  `healer_speciality` varchar(100) NOT NULL,
  `healer_nb_enclos_max` int(3) NOT NULL,
  `healer_id_sup` int(11) DEFAULT NULL,
  `healer_checkout_date` datetime NOT NULL,
  `healer_info` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `healers_animals`
--

CREATE TABLE `healers_animals` (
  `healer_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `zoos`
--

CREATE TABLE `zoos` (
  `zoo_id` int(11) NOT NULL,
  `zoo_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `FK_enclos_id` (`animal_enclos_id`);

--
-- Index pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD PRIMARY KEY (`enclos_id`),
  ADD KEY `FK_zoo_id` (`enclos_zoo_id`);

--
-- Index pour la table `healers`
--
ALTER TABLE `healers`
  ADD PRIMARY KEY (`healer_id`),
  ADD KEY `FK_healer_sup` (`healer_id_sup`);

--
-- Index pour la table `healers_animals`
--
ALTER TABLE `healers_animals`
  ADD PRIMARY KEY (`healer_id`,`animal_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `zoos`
--
ALTER TABLE `zoos`
  ADD PRIMARY KEY (`zoo_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enclos`
--
ALTER TABLE `enclos`
  MODIFY `enclos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `healers`
--
ALTER TABLE `healers`
  MODIFY `healer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `zoos`
--
ALTER TABLE `zoos`
  MODIFY `zoo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `FK_enclos_id` FOREIGN KEY (`animal_enclos_id`) REFERENCES `enclos` (`enclos_id`);

--
-- Contraintes pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD CONSTRAINT `FK_zoo_id` FOREIGN KEY (`enclos_zoo_id`) REFERENCES `zoos` (`zoo_id`);

--
-- Contraintes pour la table `healers`
--
ALTER TABLE `healers`
  ADD CONSTRAINT `FK_healer_sup` FOREIGN KEY (`healer_id_sup`) REFERENCES `healers` (`healer_id`);

--
-- Contraintes pour la table `healers_animals`
--
ALTER TABLE `healers_animals`
  ADD CONSTRAINT `healers_animals_ibfk_1` FOREIGN KEY (`healer_id`) REFERENCES `healers` (`healer_id`),
  ADD CONSTRAINT `healers_animals_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
