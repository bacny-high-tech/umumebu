-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Mai 2020 à 17:29
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `umamebu`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE IF NOT EXISTS `achat` (
  `id_ach` int(25) NOT NULL AUTO_INCREMENT,
  `id_cl` int(25) NOT NULL,
  `id_prod` int(25) NOT NULL,
  `date_achat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ach`),
  KEY `ac_k` (`id_cl`),
  KEY `ad_k` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_cl` int(25) NOT NULL AUTO_INCREMENT,
  `nom_cl` varchar(255) NOT NULL,
  `prenom_cl` varchar(255) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `CNI` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_cl`, `nom_cl`, `prenom_cl`, `tel`, `adress`, `CNI`) VALUES
(2, 'cesse', 'asihart', '25323442', 'uvira', '233-44'),
(5, 'DUSHIME', 'Soso ', '72343777', 'NGAGARA', '0304/79.56');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_com` int(25) NOT NULL AUTO_INCREMENT,
  `id_cl` int(25) NOT NULL,
  `id_prod` int(25) NOT NULL,
  `date_com` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantite_com` int(25) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `prix_tot` float NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `acom_k` (`id_cl`),
  KEY `adcom_k` (`id_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_com`, `id_cl`, `id_prod`, `date_com`, `quantite_com`, `categorie`, `dimension`, `prix_tot`) VALUES
(1, 2, 4, '2020-04-15 00:00:00', 20, 'simba', '20m', 2000),
(2, 5, 4, '2020-04-26 14:17:41', 1, 'yty', 'trt', 788),
(4, 5, 1, '2020-04-18 00:00:00', 54, 'gdf', 'gfhd', 6546),
(5, 2, 4, '2020-04-29 00:00:00', 56, 'ego', '30', 50000),
(6, 2, 4, '2020-04-29 00:00:00', 56, 'ego', '30', 50000);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `id_empl` int(25) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naiss` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `niveau_etude` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `CNI` varchar(255) NOT NULL,
  PRIMARY KEY (`id_empl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`id_empl`, `nom`, `prenom`, `date_naiss`, `tel`, `adress`, `niveau_etude`, `fonction`, `CNI`) VALUES
(2, 'Dudu', 'Bruce', '2020-05-07', '79341285', 'NGAGARA', 'A3', 'Gerant', '0304/68.894'),
(4, 'deedy', 'fefe', '23/3/2004', '71234356', 'jabe', 'A3', 'caissier', '304/45.67'),
(5, 'niyo', 'Don', '2020-05-14', '72394856', 'NGAGARA', 'A3', 'comptable', '0304/45.67');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id_fact` int(25) NOT NULL AUTO_INCREMENT,
  `id_com` int(25) NOT NULL,
  `id_cl` int(25) NOT NULL,
  `id_empl` int(25) NOT NULL,
  `id_prod` int(25) NOT NULL,
  `date_fact` date NOT NULL,
  `prix_fact` float NOT NULL,
  PRIMARY KEY (`id_fact`),
  KEY `fa_k` (`id_com`),
  KEY `afac_k` (`id_cl`),
  KEY `adf_k` (`id_prod`),
  KEY `fact_k` (`id_empl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE IF NOT EXISTS `payement` (
  `id_paie` int(25) NOT NULL AUTO_INCREMENT,
  `id_com` int(11) NOT NULL,
  `date_paie` date NOT NULL,
  `montant` float NOT NULL,
  `type_paie` varchar(25) NOT NULL,
  `num_bordereaux` varchar(50) NOT NULL,
  PRIMARY KEY (`id_paie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_prod` int(25) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `dimension` int(25) NOT NULL,
  `quantite` int(25) NOT NULL,
  `prix_unit` float NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `type`, `categorie`, `dimension`, `quantite`, `prix_unit`) VALUES
(1, 'dumuzas', 'sasec', 45, 45566, 88223),
(4, 'dssde', 'del', 34, 245, 120000),
(5, 'dumuzas ', 'dddsorig', 45456, 569, 1200);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_us` int(8) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `id_v` int(25) NOT NULL AUTO_INCREMENT,
  `id_empl` int(25) NOT NULL,
  `date_vente` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_v`),
  KEY `v_k` (`id_empl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `ac_k` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`),
  ADD CONSTRAINT `ad_k` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `acom_k` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`),
  ADD CONSTRAINT `adcom_k` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `adf_k` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`),
  ADD CONSTRAINT `afac_k` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`),
  ADD CONSTRAINT `fact_k` FOREIGN KEY (`id_empl`) REFERENCES `employe` (`id_empl`),
  ADD CONSTRAINT `fa_k` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `c_k` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`);
  ADD CONSTRAINT `p_k` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id_prod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
