-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 13 nov. 2022 à 20:45
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `push_notification`
--

-- --------------------------------------------------------

--
-- Structure de la table `notif`
--

CREATE TABLE `notif` (
  `id` int(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `notif_msg` text NOT NULL,
  `notif_time` datetime NOT NULL,
  `section` varchar(10) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `notif_repeat` int(11) DEFAULT 1,
  `notif_loop` int(11) DEFAULT 1,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notif`
--

INSERT INTO `notif` (`id`, `title`, `notif_msg`, `notif_time`, `section`, `user`, `notif_repeat`, `notif_loop`, `publish_date`) VALUES
(21, 'TEST DSI', 'TEST DSI', '2022-06-06 15:57:01', 'DSI', '', 1, 10, '2022-06-06 13:57:01'),
(22, 'test sem', 'test sem', '2022-06-06 15:59:08', 'SEM', 'test10', 1, 10, '2022-06-06 13:59:08'),
(23, 'test', 'test', '2022-06-06 15:59:44', '', 'test10', 1, 10, '2022-06-06 13:59:44'),
(24, 'test', 'test', '2022-06-06 16:03:25', 'DSI', '', 1, 10, '2022-06-06 14:03:25'),
(28, 'test test', 'tes\'test', '2022-06-18 03:31:31', 'DSI', 'moumni', 1, 10, '2022-06-18 01:31:31'),
(29, 'test2 test2', 'test\'test2', '2022-06-18 03:35:05', 'DSI', 'moumni', 1, 10, '2022-06-18 01:35:05'),
(34, 'moumni', 'mou\'ni', '2022-06-18 04:01:55', 'DSI', '', 1, 10, '2022-06-18 02:01:55'),
(35, 'moumni3', 'moum\'ni', '2022-06-18 04:05:33', 'DSI', 'moumni', 1, 10, '2022-06-18 02:05:33'),
(36, 'test4', 'te\'st', '2022-06-18 04:05:58', 'DSI', 'moumni', 1, 10, '2022-06-18 02:05:58'),
(37, 'test5', 'te\'st', '2022-06-18 04:06:50', 'DSI', 'moumni', 1, 10, '2022-06-18 02:06:50');

-- --------------------------------------------------------

--
-- Structure de la table `notif_user`
--

CREATE TABLE `notif_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `fullName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notif_user`
--

INSERT INTO `notif_user` (`id`, `username`, `password`, `email`, `section`, `fullName`) VALUES
(1, 'admin', 'admin', '', '', ''),
(26, 'moumni', 'moumni', 'moumni@gmail.com', 'DSI', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notif_user`
--
ALTER TABLE `notif_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `notif_user`
--
ALTER TABLE `notif_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
