-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 mai 2021 à 10:41
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reves`
--

-- --------------------------------------------------------

--
-- Structure de la table `reves`
--

DROP TABLE IF EXISTS `reves`;
CREATE TABLE IF NOT EXISTS `reves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `reve` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reves`
--

INSERT INTO `reves` (`id`, `author`, `reve`, `created_at`, `likes`, `dislikes`) VALUES
(1, 'Pierre', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. ', '2021-01-08 09:17:12', 8, 2),
(2, 'Diego', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 2', '2021-01-07 09:17:12', 4, 1),
(3, 'Paul', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 3', '2021-01-07 09:21:04', 3, 1),
(4, 'Henri', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 4', '2021-01-06 09:21:43', 2, 1),
(5, 'Jacky', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 5', '2021-01-06 09:21:43', 1, 0),
(6, 'Nestor', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 6', '2021-01-04 09:25:28', 1, 3),
(7, 'Ben', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 7', '2021-01-03 09:25:28', 2, 0),
(8, 'Michel', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 8', '2021-01-02 09:26:25', 0, 1),
(9, 'Jean', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 9', '2021-01-01 09:26:25', 1, 0),
(10, 'Daniel', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 10', '2021-01-05 09:26:52', 1, 1),
(11, 'moi', 'Quam multis nominibus Assyria ex diutius eis praesens nomina inposita nomina eis construxit Assyria indiderunt viribus quae quarum quae quarum Graecis enim enim ad lingua amittunt firmas habitaculis primigenia rexit.', '2021-01-08 14:22:59', 1, 1),
(12, 'Raynald', 'Quam multis nominibus Assyria ex diutius eis praesens nomina inposita nomina eis construxit Assyria indiderunt viribus quae quarum quae quarum Graecis enim enim ad lingua amittunt firmas habitaculis primigenia rexit.', '2021-01-08 14:25:39', 4, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
