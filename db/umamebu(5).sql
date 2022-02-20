-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 27 août 2020 à 18:23
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `umamebu`
--
create database `umamebu`;
  use `umamebu`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_prod` int(25) NOT NULL,
  `type` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `dimension` int(25) NOT NULL,
  `quantite` int(25) NOT NULL,
  `prix_unit` float NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_prod`, `type`, `categorie`, `dimension`, `quantite`, `prix_unit`, `etat`) VALUES
(1, 'tole', 'dumzas', 20, 220, 20000, 1),
;

-- --------------------------------------------------------

--
-- Structure de la table `articlevendu`
--

CREATE TABLE `articlevendu` (
  `id_artv` int(25) NOT NULL,
  `id_com` int(55) NOT NULL,
  `id_prod` int(50) NOT NULL,
  `date_com` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) NOT NULL,
  `quantite_com` int(25) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `prix_tot` float NOT NULL,
  `etat` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articlevendu`
--

INSERT INTO `articlevendu` (`id_artv`, `id_com`, `id_prod`, `date_com`, `type`, `quantite_com`, `categorie`, `dimension`, `prix_tot`, `etat`) VALUES
(1, 1, 3, '2020-07-02 10:31:46', 'tole', 100, 'Dumzas', '20', 6300000, 0),
(2, 1, 1, '2020-07-02 10:31:46', 'tole', 50, 'CoverMax', '32', 6300000, 1);


--
-- Déclencheurs `articlevendu`
--
DELIMITER $$
CREATE TRIGGER `vente` AFTER INSERT ON `articlevendu` FOR EACH ROW begin
 IF NEW.quantite_com > 0 THEN
update article set quantite = quantite - new.quantite_com where id_prod = new.id_prod and type = new.type and categorie=new.categorie;
END IF;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_cl` int(25) NOT NULL,
  `nom_cl` varchar(255) NOT NULL,
  `prenom_cl` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `CNI` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_cl`, `nom_cl`, `prenom_cl`, `tel`, `adress`, `CNI`, `etat`) VALUES
(1, 'KAZUNGU', 'Arnauld', '47488396', 'GIHOSHA', '8787/5647', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_com` int(25) NOT NULL,
  `id_cl` int(25) NOT NULL,
  `date_paie` date NOT NULL,
  `type_paie` varchar(25) NOT NULL,
  `num_trans` varchar(50) DEFAULT NULL,
  `montant` float NOT NULL,
  `etat` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_com`, `id_cl`, `date_paie`, `type_paie`, `num_trans`, `montant`, `etat`) VALUES
(1, 4, '2020-07-02', 'LUMICASH', 'TEEY45HSSHG65746-GH454', 6300000, 1),
(2, 3, '2020-07-03', 'LUMICASH', 'TEEY45HSSHG65746-GH45456566', 330000, 1),
(3, 2, '2020-07-05', 'LUMICASH', 'TEEY45HGHFHGS-NBNMN', 975000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id_empl` int(25) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naiss` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `niveau_etude` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `CNI` varchar(255) NOT NULL,
  `etat` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id_empl`, `nom`, `prenom`, `date_naiss`, `tel`, `adress`, `niveau_etude`, `fonction`, `CNI`, `etat`) VALUES
(1, 'NIYONGABO', 'DESIRE', '1977-03-16', '79858546', 'kigobe', 'A2', 'Administrateur', '8576/897469', 1),
(2, 'KEZA', 'Chanelle', '1999-08-27', '79097397', 'KANYOSHA', 'A2', 'Caissier', '76768/54', 1),
(3, 'NIYONKURU', 'Meddy', '1984-05-27', '68097397', 'GIHOSHA', 'BACIII', 'Comptable', '656/76532', 1),
(4, 'BAYUBAHE', 'Fiston', '1989-07-13', '79097867', 'GIHOSHA', 'BACIII', 'Agent Accueil', '531.0705/76532/2016', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modepayement`
--

CREATE TABLE `modepayement` (
  `modeID` int(11) NOT NULL,
  `nom_mode` varchar(255) NOT NULL,
  `code_Agent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modepayement`
--

INSERT INTO `modepayement` (`modeID`, `nom_mode`, `code_Agent`) VALUES
(1, 'LUMICASH', 51808),
(2, 'ECOCASH', 40729),
(3, 'CASH', NULL),
(4, 'BORDEREAU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_util` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `niveau` int(1) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_util`, `login`, `password`, `niveau`, `etat`) VALUES
(1, 'admin', 'Desire', 0, 1),
(3, 'caissier', '12345', 1, 1),
(4, 'Accueil', 'fiston', 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `articlevendu`
--
ALTER TABLE `articlevendu`
  ADD PRIMARY KEY (`id_artv`),
  ADD KEY `artcokey` (`id_com`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_cl`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `clicom_k` (`id_cl`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id_empl`);

--
-- Index pour la table `modepayement`
--
ALTER TABLE `modepayement`
  ADD PRIMARY KEY (`modeID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD UNIQUE KEY `id_util` (`id_util`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_prod` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `articlevendu`
--
ALTER TABLE `articlevendu`
  MODIFY `id_artv` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_cl` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_com` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id_empl` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `modepayement`
--
ALTER TABLE `modepayement`
  MODIFY `modeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articlevendu`
--
ALTER TABLE `articlevendu`
  ADD CONSTRAINT `artcokey` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`),
  ADD CONSTRAINT `articlevendu_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `article` (`id_prod`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `clicom_k` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fkauserempl` FOREIGN KEY (`id_util`) REFERENCES `employe` (`id_empl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
