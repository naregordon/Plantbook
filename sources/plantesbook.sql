-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 07 Août 2014 à 15:24
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `plantesbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `nom`, `prix`, `id_panier`, `photo`) VALUES
(1, 'ssss', 9, 4, '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg'),
(2, 'ssss', 9, 4, '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg'),
(3, 'ssss', 9, 4, '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg'),
(4, 'ssss', 9, 4, '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg'),
(5, 'ssss', 9, 4, '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg'),
(6, 'Fraises', 8, 2, '16575481-fraise-fraiche-isole-sur-fond-blanc-avec-une-ombre-douce.jpg'),
(7, 'ssss', 9, 2, '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg'),
(8, 'Courgettes', 10, 2, '19690043-courgette-decore-avec-des-feuilles-de-laitue-verte-isolee-sur-blanc.jpg'),
(9, 'Fleures rouges', 19, 2, '2715138-accueil-plante--quot-cyclamen-persicum-giganteum--quot-sur-fond-clair-non-isole--six-plans-de-point-.jpg'),
(10, 'Fleures rouges', 19, 2, '2715138-accueil-plante--quot-cyclamen-persicum-giganteum--quot-sur-fond-clair-non-isole--six-plans-de-point-.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) COLLATE utf8_bin NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(512) COLLATE utf8_bin NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=58 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `categorie`, `photo`, `nom`, `prix`, `description`, `stock`) VALUES
(49, 'fruit', '13585481-fraises-avec-des-feuilles-isole-sur-un-fond-blanc.jpg', 'ssss', 9, 'ssssss', 7),
(50, 'legume', 'TOMATE.jpg', 'Tomate', 25, 'Super tomate bien rouge', 300),
(51, 'fruit', '16575481-fraise-fraiche-isole-sur-fond-blanc-avec-une-ombre-douce.jpg', 'Fraises', 8, 'Belles fraises sucrÃ©es', 50),
(52, 'legume', '19690043-courgette-decore-avec-des-feuilles-de-laitue-verte-isolee-sur-blanc.jpg', 'Courgettes', 10, 'Courgettes du jardin', 8),
(53, 'decoratif', '2715138-accueil-plante--quot-cyclamen-persicum-giganteum--quot-sur-fond-clair-non-isole--six-plans-de-point-.jpg', 'Fleures rouges', 19, 'belle fleures rouges', 45),
(54, 'aromatique', '1913-Crocus-sativus.jpg', 'Crocus sativus', 15, 'IdÃ©al pour les maux de tÃªte', 8),
(55, 'decoratif', '2632418-blossoming-maison-des-plantes-avec-des-fleurs-rose-rouge-en-pot.jpg', 'Fleurs de ouf', 10, 'fleur des champs', 5),
(56, 'decoratif', '2632418-blossoming-maison-des-plantes-avec-des-fleurs-rose-rouge-en-pot.jpg', 'qsds', 10, 'qdsdsqdsq', 5),
(57, 'decoratif', '2632418-blossoming-maison-des-plantes-avec-des-fleurs-rose-rouge-en-pot.jpg', 'qsds', 10, 'qdsdsqdsq', 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `numero_rue` int(11) NOT NULL,
  `rue` varchar(255) COLLATE utf8_bin NOT NULL,
  `ville` varchar(255) COLLATE utf8_bin NOT NULL,
  `code_postal` int(11) NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `numero_rue`, `rue`, `ville`, `code_postal`, `mot_de_passe`) VALUES
(1, 'toto', 'toto', 'toto@toto.fr', 0, '', '', 0, 'f71dbe52628a3f83a77ab494817525c6'),
(2, 'lucas', 'lucas', 'lucas@lucas.com', 0, '', '', 0, 'dc53fc4f621c80bdc2fa0329a6123708'),
(4, 'tata', 'tata', 'tata@tata.fr', 0, '', '', 0, '49d02d55ad10973b7b9d0dc9eba7fdf0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
