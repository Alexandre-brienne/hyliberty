-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 10 nov. 2021 à 07:58
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hyliberty`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateaux`
--

CREATE TABLE `bateaux` (
  `id` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom_bateau` varchar(255) NOT NULL,
  `gps` varchar(255) NOT NULL,
  `hydrogene_1` int(11) NOT NULL,
  `hydrogene_2` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bateaux`
--

INSERT INTO `bateaux` (`id`, `matricule`, `nom_bateau`, `gps`, `hydrogene_1`, `hydrogene_2`, `client_id`) VALUES
(2, 'DA-2G-93', 'Botha', 'france', 20, 15, 1),
(3, 'WZ-G8-62', 'Emulous', 'france', 10, 30, 4),
(4, 'CW-XK-Y2', 'Peregrine Prize', 'france', 25, 50, 8),
(5, 'FN-ZZ-EF', 'The Aigle', 'france', 80, 45, 5),
(6, 'IE-QO-4J', 'The Newton', 'france', 20, 25, 10);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `nom`, `prenom`, `password`, `telephone`) VALUES
(1, 'wparell0@dedecms.com', 'Parell', 'Åke', 'XRs72484', '1504455653'),
(2, 'bwalsom1@microsoft.com', 'Walsom', 'Josée', 'LvOBdhzI8v9', '5491358840'),
(3, 'ksnead2@mozilla.com', 'Snead', 'Edmée', '866sRQgCqhT', '2264476102'),
(4, 'agretham3@joomla.org', 'Gretham', 'Joséphine', 'Akp4mT', '6215226647'),
(5, 'vsoeiro4@tripod.com', 'Soeiro', 'Thérèse', 'XUI1Rw', '3653301070'),
(6, 'tlisamore5@t.co', 'Lisamore', 'Desirée', 'BOt1AeR', '9193529914'),
(7, 'hobington6@nasa.gov', 'Obington', 'Océane', 'OAK2CIb', '8686589389'),
(8, 'tluke7@reuters.com', 'Luke', 'Styrbjörn', 'zFw4xR', '5001468197'),
(9, 'akilby8@spiegel.de', 'Kilby', 'Tú', 'hL4enWpzacGs', '1646843233'),
(10, 'dfulham9@networksolutions.com', 'Fulham', 'Daphnée', 'mHsOXo7zmwF', '8108915695'),
(21, '2raven3@toecye.com', 'leah', 'michel', '$argon2i$v=19$m=65536,t=4,p=1$aVp3NnlqUkFZaVlQUFhrWQ$7cv6u/oD66O4C8oSRTGi2oXKXuiFVMLlVzwP/yvqaSY', '0618821078'),
(22, 'ymohamed7ob11o@epuber.site', 'alexis', 'jordan', '$argon2i$v=19$m=65536,t=4,p=1$L2MzTWh3aW1sbDRDWkxYaQ$PEWzXWJ5mrT8u3BA4iLIzL0evlrczjrbyPqa9TWXERE', '0644645534'),
(23, '9houssembrin@virginiaintel.com', 'michel', 'lordon', '$argon2i$v=19$m=65536,t=4,p=1$UllTYUovY2FjbDlSOXFvWg$BHHP3qcWoEyfggf1NMEeD+gbUBQvjBlkC3Q5RUQDvH0', '0618821078'),
(24, 'relie.nasser9@itlrodk.com', 'ricardo', 'michel', '$argon2i$v=19$m=65536,t=4,p=1$RldMMzY4U3JybG9ZNUJMdA$84g1wvCTw9neY22a7xF+ukJQKKcNmlkH31n+rO/uecM', '0618821078');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bateaux`
--
ALTER TABLE `bateaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bateaux`
--
ALTER TABLE `bateaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bateaux`
--
ALTER TABLE `bateaux`
  ADD CONSTRAINT `bateaux_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
