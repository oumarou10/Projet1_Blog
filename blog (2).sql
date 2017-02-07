-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 16 Décembre 2016 à 19:33
-- Version du serveur :  5.6.33
-- Version de PHP :  7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `auteur`, `contenu`, `date_creation`) VALUES
(1, 'Bienvenue sur mon blog !', 'Marcel', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'Pierrot', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir "J\'ai l\'intention de conquérir le monde !".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire "éléPHPant". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11'),
(5, 'Vive le PHP ', 'Marcelinho', 'Je pense que c\'est le meilleur langage !!!', '2016-12-04 06:17:31'),
(6, 'Les Lyonnais au dos du mur !', 'Aulas', 'Après leur victoire lors d ela dernière journée il est possible que les yonnais se qualifient.', '2016-12-04 06:17:31'),
(7, 'Le java c\'est difficile', 'Nicolas', 'J\'ai etudié ce langage durant ', '2016-12-01 09:10:41'),
(8, 'Quelle sensation foudroyante', 'Cyril', 'Le centre commercial a ouvert depuis peu et l\'attraction phare est aimée de tous marré son prix exhorbitant', '2016-12-01 09:10:41'),
(9, 'Il a été etonné', 'Manuel Valls', 'Je me presente aux elections !!!', '2016-12-05 02:20:27'),
(10, 'Grandioseeee ', 'Je suis champion du monde', 'J\'ai gagné la ligue des champions avec mon eqquipé', '2016-12-01 07:19:30'),
(11, 'Hallucinant', 'Dimitri Payet', 'Je suis à mon meilleur niveau mais j\'aspire à devenir encore meilleur d\'ici mes 30 ans !!!', '2016-12-05 02:20:27'),
(12, 'Malchanceux', 'Adeline', 'J\'ai tout simplement trouvé le film super nul , rien de plus à ajouter.', '2016-12-01 07:19:30');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '0000-00-00 00:00:00'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13'),
(32, 5, 'Issa', 'Je suis plutôt ruby', '2016-12-16 18:47:06'),
(20, 1, 'Paridis', 'Oh je suis d\'avis', '2016-12-02 04:25:01'),
(21, 1, 'Axelle', 'Ca va faire mal', '2016-12-02 04:28:55'),
(29, 9, 'Victor', 'Faites lui confiance', '2016-12-16 18:15:23'),
(23, 2, 'Youba', 'Je suis de retour', '2016-12-05 17:44:19'),
(24, 1, 'Kazim', 'Très archaïque', '2016-12-05 17:45:04'),
(25, 2, 'Julien', 'Vive le php', '2016-12-05 18:39:34'),
(26, 1, 'Doli', 'Je suis partisan', '2016-12-13 10:41:42'),
(27, 9, 'Solène', 'je ne suis pas d\'accord', '2016-12-13 14:31:23'),
(28, 9, 'Moyama', 'je ne comprends pas ce qui t\'as poussé', '2016-12-13 14:31:38'),
(31, 9, 'Victor', 'Je l\'étais au début', '2016-12-16 18:32:03'),
(17, 1, 'Oumarou', 'Nous sommes okay pour penser que nous sommes forts', '2016-12-02 02:34:14'),
(30, 9, 'Moyama', 'Je suis sceptique', '2016-12-16 18:28:59'),
(33, 5, 'Patrick', 'Moi je dirai Java', '2016-12-16 18:48:17'),
(34, 5, 'Issa', 'Ah bon ?', '2016-12-16 18:51:32'),
(35, 5, 'Patrick', 'J\'enseigne si tu veux', '2016-12-16 18:54:13'),
(36, 5, 'Issa', 'Merci', '2016-12-16 18:54:33'),
(37, 11, 'Mourinho', 'Il me le faut pour la saison prochaine', '2016-12-16 18:58:47');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`ID`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'Julien', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', 'xandra12@mail.Com', '2016-12-05'),
(2, 'Benzema', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'benzema@yahoo.fr', '2016-12-15'),
(3, 'jonathan', '0880863af587adadf38815c6a1a295529d7d5c0c', 'jonathan@mail.com', '2016-12-15'),
(4, 'brandon', '04892aac2bbf2c836624b67ac94e020d7bcedeb7', 'brandon@mail.com', '2016-12-15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'test'),
(2, 'oumarou', 'marseille');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
