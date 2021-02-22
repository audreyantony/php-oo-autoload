-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 16 fév. 2021 à 13:26
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `phpooautoload`
--
CREATE DATABASE IF NOT EXISTS `phpooautoload` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpooautoload`;

-- --------------------------------------------------------

--
-- Structure de la table `thenews`
--

DROP TABLE IF EXISTS `thenews`;
CREATE TABLE IF NOT EXISTS `thenews` (
                                         `idtheNews` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `theNewsTitle` varchar(180) NOT NULL,
                                         `theNewsSlug` varchar(180) NOT NULL,
                                         `theNewsText` text NOT NULL,
                                         `theNewsDate` date DEFAULT current_timestamp(),
                                         `theUserIdtheUser` int(10) UNSIGNED NOT NULL,
                                         PRIMARY KEY (`idtheNews`),
                                         UNIQUE KEY `theNewsSlug_UNIQUE` (`theNewsSlug`),
                                         KEY `fk_theNews_theUser1_idx` (`theUserIdtheUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `thenews_has_thesection`
--

DROP TABLE IF EXISTS `thenews_has_thesection`;
CREATE TABLE IF NOT EXISTS `thenews_has_thesection` (
                                                        `theNews_idtheNews` int(10) UNSIGNED NOT NULL,
                                                        `theSection_idtheSection` int(10) UNSIGNED NOT NULL,
                                                        PRIMARY KEY (`theNews_idtheNews`,`theSection_idtheSection`),
                                                        KEY `fk_theNews_has_theSection_theSection1_idx` (`theSection_idtheSection`),
                                                        KEY `fk_theNews_has_theSection_theNews1_idx` (`theNews_idtheNews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `therole`
--

DROP TABLE IF EXISTS `therole`;
CREATE TABLE IF NOT EXISTS `therole` (
                                         `idtheRole` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `theRoleName` varchar(45) NOT NULL,
                                         `theRoleValue` smallint(5) UNSIGNED DEFAULT 2,
                                         PRIMARY KEY (`idtheRole`),
                                         UNIQUE KEY `theRoleName_UNIQUE` (`theRoleName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `therole`
--

INSERT INTO `therole` (`idtheRole`, `theRoleName`, `theRoleValue`) VALUES
(1, 'Administrateur', 3),
(2, 'Modérateur', 1),
(3, 'Rédacteur', 2);

-- --------------------------------------------------------

--
-- Structure de la table `thesection`
--

DROP TABLE IF EXISTS `thesection`;
CREATE TABLE IF NOT EXISTS `thesection` (
                                            `idtheSection` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `theSectionName` varchar(100) NOT NULL,
                                            `theSectionDesc` varchar(800) DEFAULT NULL,
                                            PRIMARY KEY (`idtheSection`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thesection`
--

INSERT INTO `thesection` (`idtheSection`, `theSectionName`, `theSectionDesc`) VALUES
(1, 'CodeIgniter', 'CodeIgniter est issue de la société EllisLab et a été conçu par Rick Ellis, PDG de cette entreprise située dans l\'Oregon, aux États-Unis. \r\nCodeIgniter est un dérivé de leur principal projet : ExpressionEngine. Il en est très largement inspiré et profite de l\'expérience acquise sur ce projet.'),
(2, 'CakePHP', 'CakePHP est un framework web libre écrit en PHP distribué sous licence MIT. Il suit le motif de conception Modèle-Vue-Contrôleur et imite le fonctionnement de Ruby on Rails.'),
(3, 'Laravel', 'Laravel est un framework web open-source écrit en PHP respectant le principe modèle-vue-contrôleur et entièrement développé en programmation orientée objet. \r\nLaravel est distribué sous licence MIT, avec ses sources hébergées sur GitHub.'),
(4, 'Symfony', 'Symfony est un ensemble de composants PHP ainsi qu\'un framework MVC libre écrit en PHP. \r\nIl fournit des fonctionnalités modulables et adaptables qui permettent de faciliter et d’accélérer le développement d\'un site web.'),
(5, 'Yii', 'Le Yii Framework (« Yes, It Is ») est un cadriciel (framework) pour PHP et utilise le paradigme de programmation orientée objet. Il est destiné au développement d\'applications Web.'),
(6, 'Zend', 'Le Zend Framework est un cadriciel pour PHP créé en mars 2006 par Zend Technologies, et distribué sous la Licence BSD Modifiée. \r\nLe 17 avril 2019, le projet prévoit de devenir open source sous le nom de Laminas, et le 6 novembre 2019, il devient accessible sur GitHub.');

-- --------------------------------------------------------

--
-- Structure de la table `theuser`
--

DROP TABLE IF EXISTS `theuser`;
CREATE TABLE IF NOT EXISTS `theuser` (
                                         `idtheUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `theUserLogin` varchar(80) NOT NULL,
                                         `theUserPwd` varchar(255) NOT NULL,
                                         `theUserMail` varchar(150) NOT NULL,
                                         `theRoleIdtheRole` smallint(5) UNSIGNED NOT NULL,
                                         PRIMARY KEY (`idtheUser`),
                                         UNIQUE KEY `theUserLogin_UNIQUE` (`theUserLogin`),
                                         UNIQUE KEY `theUserMail_UNIQUE` (`theUserMail`),
                                         KEY `fk_theUser_theRole_idx` (`theRoleIdtheRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theuser`
--

INSERT INTO `theuser` (`idtheUser`, `theUserLogin`, `theUserPwd`, `theUserMail`, `theRoleIdtheRole`) VALUES
(1, 'Mikhawa', 'Mikhawa1717', 'michael.pitz@cf2m.be', 1),
(2, 'SuperWoman', 'SuperWoman1717', 'Stephanie.Clark@cf2m.be', 2),
(3, 'Mansons', 'Mansons1717', 'medhi.mansons@cf2m.be', 3),
(4, 'Sofia25', 'Sofia251717', 'sofia.vanbe@cf2m.be', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `thenews`
--
ALTER TABLE `thenews`
    ADD CONSTRAINT `fk_theNews_theUser1` FOREIGN KEY (`theUserIdtheUser`) REFERENCES `theuser` (`idtheUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `thenews_has_thesection`
--
ALTER TABLE `thenews_has_thesection`
    ADD CONSTRAINT `fk_theNews_has_theSection_theNews1` FOREIGN KEY (`theNews_idtheNews`) REFERENCES `thenews` (`idtheNews`) ON DELETE CASCADE ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_theNews_has_theSection_theSection1` FOREIGN KEY (`theSection_idtheSection`) REFERENCES `thesection` (`idtheSection`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `theuser`
--
ALTER TABLE `theuser`
    ADD CONSTRAINT `fk_theUser_theRole` FOREIGN KEY (`theRoleIdtheRole`) REFERENCES `therole` (`idtheRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
