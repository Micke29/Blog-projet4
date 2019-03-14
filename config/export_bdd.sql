-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 14 Mars 2019 à 08:08
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_account_act`
--

CREATE TABLE `t_account_act` (
  `act_id` int(11) NOT NULL,
  `act_username` varchar(32) NOT NULL,
  `act_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_account_act`
--

INSERT INTO `t_account_act` (`act_id`, `act_username`, `act_password`) VALUES
(1, 'moderateur', '$2y$10$z.miPUi3A0TavSvDnTPSp.f11ieEc4LrJLieadx6KtKxGP/khNTVC');

-- --------------------------------------------------------

--
-- Structure de la table `t_comments_cmt`
--

CREATE TABLE `t_comments_cmt` (
  `cmt_id` int(11) NOT NULL,
  `cmt_author` varchar(32) NOT NULL,
  `cmt_content` longtext NOT NULL,
  `cmt_date` datetime NOT NULL,
  `pst_id` int(11) NOT NULL,
  `cmt_report` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_comments_cmt`
--

INSERT INTO `t_comments_cmt` (`cmt_id`, `cmt_author`, `cmt_content`, `cmt_date`, `pst_id`, `cmt_report`) VALUES
(1, 'Amber', 'Love your blog page! Simply the best! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-02-01 00:00:00', 1, 1),
(2, 'Angie', 'Love hats!!', '2019-02-01 00:00:00', 2, 0),
(3, 'Moi', 'salut', '2019-02-28 12:05:27', 2, 1),
(4, 'Moi', 'bonjour', '2019-03-07 09:36:54', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_picture_pic`
--

CREATE TABLE `t_picture_pic` (
  `pic_id` int(11) NOT NULL,
  `pic_link` text NOT NULL,
  `pic_title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_picture_pic`
--

INSERT INTO `t_picture_pic` (`pic_id`, `pic_link`, `pic_title`) VALUES
(1, 'woods.jpg', 'Nature'),
(2, 'bridge.jpg', 'Norway');

-- --------------------------------------------------------

--
-- Structure de la table `t_posts_pst`
--

CREATE TABLE `t_posts_pst` (
  `pst_id` int(11) NOT NULL,
  `pst_title` varchar(48) NOT NULL,
  `pst_content` longtext NOT NULL,
  `pst_date` datetime NOT NULL,
  `pic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_posts_pst`
--

INSERT INTO `t_posts_pst` (`pst_id`, `pst_title`, `pst_content`, `pst_date`, `pic_id`) VALUES
(1, 'TITLE HEADING', '<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>', '2019-02-01 00:00:00', 1),
(2, 'BLOG ENTRY', '<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>', '2019-02-01 00:00:00', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_account_act`
--
ALTER TABLE `t_account_act`
  ADD PRIMARY KEY (`act_id`);

--
-- Index pour la table `t_comments_cmt`
--
ALTER TABLE `t_comments_cmt`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `t_posts_pst_FK` (`pst_id`);

--
-- Index pour la table `t_picture_pic`
--
ALTER TABLE `t_picture_pic`
  ADD PRIMARY KEY (`pic_id`);

--
-- Index pour la table `t_posts_pst`
--
ALTER TABLE `t_posts_pst`
  ADD PRIMARY KEY (`pst_id`),
  ADD KEY `t_picture_pic_FK` (`pic_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_account_act`
--
ALTER TABLE `t_account_act`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_comments_cmt`
--
ALTER TABLE `t_comments_cmt`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_picture_pic`
--
ALTER TABLE `t_picture_pic`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_posts_pst`
--
ALTER TABLE `t_posts_pst`
  MODIFY `pst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_comments_cmt`
--
ALTER TABLE `t_comments_cmt`
  ADD CONSTRAINT `t_posts_pst_FK` FOREIGN KEY (`pst_id`) REFERENCES `t_posts_pst` (`pst_id`);

--
-- Contraintes pour la table `t_posts_pst`
--
ALTER TABLE `t_posts_pst`
  ADD CONSTRAINT `t_picture_pic_FK` FOREIGN KEY (`pic_id`) REFERENCES `t_picture_pic` (`pic_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
