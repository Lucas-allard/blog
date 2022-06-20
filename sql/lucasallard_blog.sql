-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : lun. 20 juin 2022 à 20:32
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lucasallard_blog_live73`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `ID_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`username`, `password`, `ID_admin`) VALUES
('lucas_admin', '$2y$10$8UyZgsa1Fh9klcf3yYBz6O.RED35xXR90h/BSdPFTTHtcJM.AvUfm', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID_article` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `contentArticle` text NOT NULL,
  `ID_author` int(11) NOT NULL,
  `ID_category` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_article`, `date`, `title`, `contentArticle`, `ID_author`, `ID_category`, `image`) VALUES
(44, '2022-06-20 22:11:38', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor, sit amet consectetur adipisicing\r\nelit. Voluptatem nostrum explicabo fuga obcaecati asperiores, suscipit neque\r\nmagnam necessitatibus quaerat. Ut aut illo asperiores, autem ad eum eos\r\ncupiditate dolorum vitae amet ex minus sunt eveniet cumque nisi nesciunt\r\nvoluptatem fugit. Quaerat, provident nihil. Magni nulla sit eligendi culpa minus\r\nperspiciatis? Lorem, ipsum dolor sit amet consectetur adipisicing elit.', 2, 2, 'religion.jpg'),
(45, '2022-06-20 22:13:17', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor, sit amet consectetur adipisicing\r\nelit. Voluptatem nostrum explicabo fuga obcaecati asperiores, suscipit neque\r\nmagnam necessitatibus quaerat. Ut aut illo asperiores, autem ad eum eos\r\ncupiditate dolorum vitae amet ex minus sunt eveniet cumque nisi nesciunt\r\nvoluptatem fugit. Quaerat, provident nihil. Magni nulla sit eligendi culpa minus\r\nperspiciatis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. \r\n\r\nQui harum ad, voluptas exercitationem magni reprehenderit doloribus. Rem blanditiis\r\nsimilique libero sint veritatis, accusantium maxime sapiente explicabo ratione\r\nrepellendus corrupti delectus tempore, fugiat atque? Minima sed obcaecati\r\nquisquam aut repellat quis, enim consectetur eius ab quo similique. Ut eveniet\r\nducimus culpa natus, eum a numquam non iste, necessitatibus consequuntur\r\nincidunt odio quis tempora fugiat, mollitia voluptate iusto deserunt quo?\r\nCupiditate laboriosam rem provident nihil accusantium voluptatibus. Ad incidunt\r\nexcepturi ab voluptatibus.', 3, 3, 'sport.jpg'),
(46, '2022-06-20 22:15:02', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor, sit amet consectetur adipisicing\r\nelit. Voluptatem nostrum explicabo fuga obcaecati asperiores, suscipit neque\r\nmagnam necessitatibus quaerat. Ut aut illo asperiores, autem ad eum eos\r\ncupiditate dolorum vitae amet ex minus sunt eveniet cumque nisi nesciunt\r\nvoluptatem fugit. Quaerat, provident nihil. Magni nulla sit eligendi culpa minus\r\nperspiciatis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. \r\n\r\nQui harum ad, voluptas exercitationem magni reprehenderit doloribus. Rem blanditiis\r\nsimilique libero sint veritatis, accusantium maxime sapiente explicabo ratione\r\nrepellendus corrupti delectus tempore, fugiat atque? Minima sed obcaecati\r\nquisquam aut repellat quis, enim consectetur eius ab quo similique. Ut eveniet\r\nducimus culpa natus, eum a numquam non iste, necessitatibus consequuntur\r\nincidunt odio quis tempora fugiat, mollitia voluptate iusto deserunt quo?\r\nCupiditate laboriosam rem provident nihil accusantium voluptatibus. Ad incidunt\r\nexcepturi ab voluptatibus.', 4, 4, 'natuer.jpg'),
(47, '2022-06-20 22:15:03', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor, sit amet consectetur adipisicing\r\nelit. Voluptatem nostrum explicabo fuga obcaecati asperiores, suscipit neque\r\nmagnam necessitatibus quaerat. Ut aut illo asperiores, autem ad eum eos\r\ncupiditate dolorum vitae amet ex minus sunt eveniet cumque nisi nesciunt\r\nvoluptatem fugit. Quaerat, provident nihil. Magni nulla sit eligendi culpa minus\r\nperspiciatis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. \r\n\r\nQui harum ad, voluptas exercitationem magni reprehenderit doloribus. Rem blanditiis\r\nsimilique libero sint veritatis, accusantium maxime sapiente explicabo ratione\r\nrepellendus corrupti delectus tempore, fugiat atque? Minima sed obcaecati\r\nquisquam aut repellat quis, enim consectetur eius ab quo similique. Ut eveniet\r\nducimus culpa natus, eum a numquam non iste, necessitatibus consequuntur\r\nincidunt odio quis tempora fugiat, mollitia voluptate iusto deserunt quo?\r\nCupiditate laboriosam rem provident nihil accusantium voluptatibus. Ad incidunt\r\nexcepturi ab voluptatibus.', 4, 4, 'natuer.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `ID_author` int(11) NOT NULL,
  `lastnameAuthor` varchar(10) NOT NULL,
  `nameAuthor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`ID_author`, `lastnameAuthor`, `nameAuthor`) VALUES
(2, 'Jean', 'Gonzac'),
(3, 'Kevin', 'Tatin'),
(4, 'Pierre', 'Louis');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_category` int(11) NOT NULL,
  `categorie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_category`, `categorie`) VALUES
(2, 'Religion'),
(3, 'Sport'),
(4, 'Nature');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `ID_comment` int(11) NOT NULL,
  `lastnameComment` varchar(10) NOT NULL,
  `nameComment` varchar(10) NOT NULL,
  `contentComment` text NOT NULL,
  `ID_article` int(11) NOT NULL,
  `dateComment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`ID_comment`, `lastnameComment`, `nameComment`, `contentComment`, `ID_article`, `dateComment`) VALUES
(30, 'Lorem', 'Ipsum', 'Lorem ipsum dolor sit amet.', 44, '2022-06-20 22:12:13'),
(31, 'Lorem', 'Ipsum', 'Lorem ipsum dolor sit amet.', 44, '2022-06-20 22:12:24'),
(32, 'Lorem', 'Ipsum', 'Lorem ipsum medimo ultima', 45, '2022-06-20 22:13:42'),
(33, 'Ipsum', 'Lorem', 'Magicus madimus maximus fatalis', 47, '2022-06-20 22:15:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID_article`),
  ADD KEY `ID_categorie` (`ID_category`),
  ADD KEY `ID_author` (`ID_author`);
ALTER TABLE `article` ADD FULLTEXT KEY `contentArticle` (`contentArticle`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`ID_author`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_category`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `ID_article` (`ID_article`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `ID_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `author_delete` FOREIGN KEY (`ID_author`) REFERENCES `auteur` (`ID_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_delete` FOREIGN KEY (`ID_category`) REFERENCES `categorie` (`ID_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_delete` FOREIGN KEY (`ID_article`) REFERENCES `article` (`ID_article`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
