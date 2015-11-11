-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 11 Novembre 2015 à 11:10
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `appli_C2iS`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_firstname` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_desc` varchar(500) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `authors`
--

INSERT INTO `authors` (`author_id`, `author_firstname`, `author_name`, `author_desc`) VALUES
(1, 'Victor', 'Hugo', 'Né le 26 février 1802 à Besançon et mort le 22 mai 1885 à Paris, est un poète, dramaturge et prosateur romantique considéré comme l’un des plus importants écrivains de langue française. Il est aussi une personnalité politique et un intellectuel engagé qui a joué un rôle majeur dans l’histoire du xixe siècle.'),
(2, 'Émile', 'Zola', 'Ecrivain et journaliste français, né le 2 avril 1840 à Paris, où il est mort le 29 septembre 1902. Considéré comme le chef de file du naturalisme, c''est l''un des romanciers français les plus populaires2, les plus publiés, traduits et commentés au monde. Ses romans ont connu de très nombreuses adaptations au cinéma et à la télévision'),
(3, 'Albert', 'Camus', 'Né le 7 novembre 1913 à Mondovi, près d''Annaba (anciennement Bône), en Algérie, et mort le 4 janvier 1960 à Villeblevin, dans l''Yonne en France1, est un écrivain, philosophe, romancier, dramaturge, essayiste et nouvelliste français. Il est aussi journaliste militant engagé dans la Résistance française et, proche des courants libertaires2, dans les combats moraux de l''après-guerre.'),
(4, 'Agatha', 'Christie', 'Née Agatha Mary Clarissa Miller (15 septembre 1890 - 12 janvier 1976), puis, après son second mariage, Agatha Mallowan et, à partir de son anoblissement en 1971, Dame Agatha Christie, est une femme de lettres anglaise, auteur de nombreux romans policiers. Son nom est associé à celui de ses deux héros : Hercule Poirot, détective professionnel, et Miss Marple, détective amateur.');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_desc` varchar(500) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author_id`, `book_desc`) VALUES
(1, 'Bug-Jargal', 1, 'Bug-Jargal est le deuxième roman de Victor Hugo. Écrit par l’auteur, en quinze jours à la suite d’un pari, à l’âge de seize ans, le conte "Bug-Jargal" paraît dans la revue le Conservateur littéraire en 1820 mais le roman, version remaniée du conte, ne sera édité pour la première fois qu’en 1826.'),
(2, 'Notre-Dame de Paris', 1, 'Notre-Dame de Paris (titre complet : Notre-Dame de Paris. 1482) est un roman de l''écrivain français Victor Hugo, publié en 1831.  Le titre fait référence à la cathédrale de Paris, Notre-Dame, qui est un des lieux principaux de l''intrigue du roman.'),
(3, 'Les Misérables', 1, 'Les Misérables est un roman de Victor Hugo paru en 1862 (la première partie est publiée le 30 mars à Bruxelles par les Éditions Lacroix, Verboeckhoven et Cie, et le 3 avril de la même année à Paris).'),
(4, 'Thérèse Raquin', 2, 'Thérèse Raquin est le troisième roman de l''écrivain français Émile Zola publié en 1867. Ce roman, qui présente déjà les caractéristiques du naturalisme développé plus tard dans le cycle des Rougon-Macquart, fera connaître l''écrivain au public parisien. L''auteur en tirera lui-même, en 1873, une pièce de théâtre intitulée Thérèse Raquin : drame en 4 actes.'),
(5, 'Le Docteur Pascal', 2, 'Le Docteur Pascal est un roman d’Émile Zola publié en 1893, le vingtième et dernier volume de la série des Rougon-Macquart. '),
(6, 'L''Étranger', 3, 'L’Étranger est un roman d’Albert Camus, paru en 1942. Il prend place dans la tétralogie que Camus nommera « cycle de l’absurde » qui décrit les fondements de la philosophie camusienne : l’absurde. Cette tétralogie comprend également l’essai intitulé Le Mythe de Sisyphe ainsi que les pièces de théâtre Caligula et Le Malentendu. Le roman a été traduit en quarante langues et une adaptation cinématographique en a été réalisée par Luchino Visconti en 1967.'),
(7, 'La Peste', 3, 'La Peste est un roman d’Albert Camus publié en 1947 et ayant reçu le prix des Critiques la même année. Il appartient au cycle de la révolte rassemblant trois œuvres de Camus, La Peste, L''Homme révolté et Les Justes qui ont permis en partie à son auteur de remporter le prix Nobel de littérature en 1957.'),
(8, 'Le Crime de l''Orient-Express', 4, 'Le Crime de l''Orient-Express (titre original : Murder on the Orient Express) est un roman policier d''Agatha Christie publié le 1er janvier 1934 au Royaume-Uni, mettant en scène Hercule Poirot. Il est publié la même année aux États-Unis sous le titre Murder in the Calais Coach, puis en France.'),
(9, 'La Dernière Énigme', 4, 'La Dernière Énigme (titre original : Sleeping Murder: Miss Marple''s Last Case) est un roman policier d''Agatha Christie publié en octobre 1976 au Royaume-Uni. Il est publié la même année aux États-Unis et en 1976 en France. Sa publication est intervenue après la mort de l''auteur, même s''il fut rédigé en 1940.'),
(10, 'Le Cheval à bascule', 4, 'Le Cheval à bascule (titre original : Postern of fate) est un roman policier d''Agatha Christie publié en octobre 1973 au Royaume-Uni, mettant en scène pour la cinquième et dernière fois le duo Tommy et Tuppence Beresford, parvenus à l''âge de la retraite. Il est publié la même année aux États-Unis et en 1974 en France.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
