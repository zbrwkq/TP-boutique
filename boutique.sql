-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 nov. 2022 à 16:28
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`) VALUES
(9, 'Nourriture', 'Découvrez notre panel de nourriture étasunienne '),
(10, 'Vêtement', 'Une belle petite collection avec un style de la west coast'),
(11, 'Cosmétique', 'Pour être beau à l\'anglaise'),
(12, 'Boisson', 'A BOIRE\r\n'),
(13, 'Médicaments', 'Pour rester en bonne santé');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0',
  `prix` float NOT NULL,
  `categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `qte`, `prix`, `categorie`) VALUES
(2, 'Betty Crocker', '', 12, 9269.46, 9),
(3, 'Andy Capps fries', '', 60, 6851.67, 9),
(4, 'Applebees', '', 91, 1306.19, 9),
(5, 'Andy Capps fries', '', 44, 6768.81, 9),
(6, 'Nabisco', '', 85, 5435.3, 9),
(7, 'Starbucks', '', 10, 4611.62, 9),
(8, 'Subway', '', 69, 4319.57, 9),
(9, 'Lavazza', '', 94, 1327.71, 9),
(10, 'Betty Crocker', '', 8, 8008.67, 9),
(11, 'Taco Bell', '', 48, 3334.96, 9),
(12, 'Dunkin Donuts', '', 59, 9467.06, 9),
(13, 'Nutella', '', 58, 6267.66, 9),
(14, 'LEonidas', '', 14, 606.659, 9),
(15, 'Secret Recipe', '', 48, 5600.2, 9),
(16, 'Soprole', '', 30, 9715.32, 9),
(17, 'Baskin robbins', '', 5, 8731.74, 9),
(18, 'Wonder Bread', '', 77, 4974.59, 9),
(19, 'Doritos', '', 74, 3696.91, 9),
(20, 'Betty Crocker', '', 32, 4695.76, 9),
(21, 'Sun-Pat', '', 2, 1416.7, 9),
(22, 'Kits', '', 92, 1342.92, 9),
(23, 'Lavazza', '', 62, 6312.08, 9),
(24, 'Tic Tac', '', 70, 8837.41, 9),
(25, 'Heinz', '', 64, 4722.31, 9),
(26, 'Taco Bell', '', 11, 6529.13, 9),
(27, 'Wonder Bread', '', 83, 2096.39, 9),
(28, 'Nesquik', '', 90, 1753.48, 9),
(29, 'Cheetos', '', 63, 5734.28, 9),
(30, 'Carib Brewery', '', 11, 2852.38, 9),
(31, 'Kits', '', 43, 572.227, 9),
(32, 'Applebees', '', 55, 8327.42, 9),
(33, 'KFC', '', 27, 50.6622, 9),
(34, 'McDonalds', '', 41, 2382.74, 9),
(35, 'Vitta Foods', '', 53, 3990.23, 9),
(36, 'Dr. Oetker', '', 7, 1933.31, 9),
(37, 'Burger King', '', 82, 2762.93, 9),
(38, 'Vitta Foods', '', 78, 9825.27, 9),
(39, 'Taco Bell', '', 7, 7512.78, 9),
(40, 'Red Lobster', '', 63, 9112.38, 9),
(41, 'Andy Capps fries', '', 87, 5459.95, 9),
(42, 'Taco Bell', '', 3, 8322.17, 9),
(43, 'Nutella', '', 36, 5249.23, 9),
(44, 'Nesquik', '', 99, 752.471, 9),
(45, 'Soprole', '', 42, 9634.38, 9),
(46, 'Starbucks', '', 78, 6200.99, 9),
(47, 'Taco Bell', '', 15, 8186.82, 9),
(48, 'Taco Bell', '', 28, 3241.69, 9),
(49, 'KFC', '', 94, 8073.33, 9),
(50, 'Olymel', '', 55, 5232.51, 9),
(51, 'Red Lobster', '', 55, 4399.44, 9),
(52, 'Mohito', '', 33, 6237.29, 10),
(53, 'Merc Clothing', '', 22, 8180.4, 10),
(54, 'Guess', '', 5, 6339.81, 10),
(55, 'Guess', '', 36, 6237.46, 10),
(56, 'Hamilton Shirts', '', 88, 9539.26, 10),
(57, 'Brooks Brothers', '', 1, 9127.17, 10),
(58, 'Tommy Hilfinger', '', 83, 5404.28, 10),
(59, 'Karen Kane', '', 95, 7548.16, 10),
(60, 'Marchesa', '', 75, 9857.2, 10),
(61, 'TNT', '', 94, 6966.88, 10),
(62, 'Brooks Brothers', '', 5, 679.715, 10),
(63, 'Old Navy', '', 37, 3611.84, 10),
(64, 'Six Deuce', '', 31, 6520.63, 10),
(65, 'Nudie Jeans', '', 51, 3519.27, 10),
(66, 'Countess Mara', '', 60, 4635.25, 10),
(67, 'Columbia Sportswear', '', 90, 7583.93, 10),
(68, 'Acorn Stores', '', 31, 291.191, 10),
(69, 'Nice Collective', '', 76, 8249.66, 10),
(70, 'SABA', '', 59, 9181.26, 10),
(71, 'Forever Lazy', '', 10, 3565.17, 10),
(72, 'Izod', '', 59, 4254.47, 10),
(73, 'Ethika', '', 58, 8207.51, 10),
(74, 'Cherokee Inc.', '', 61, 4347.99, 10),
(75, 'Ethika', '', 28, 4612.92, 10),
(76, 'Dollie & Me', '', 69, 6962.2, 10),
(77, 'Cherokee Inc.', '', 69, 2043.81, 10),
(78, 'Mossimo', '', 54, 5924.89, 10),
(79, 'Dollie & Me', '', 89, 5569.39, 10),
(80, 'Loyandford', '', 94, 3176.95, 10),
(81, 'C&A', '', 15, 9309.47, 10),
(82, 'Max Studio', '', 64, 4372.1, 10),
(83, 'Levis', '', 89, 2249.4, 10),
(84, 'Avirex', '', 38, 130.898, 10),
(85, 'Andrew Marc', '', 2, 5496.23, 10),
(86, 'Cherokee Inc.', '', 73, 744.659, 10),
(87, 'Forever Lazy', '', 37, 7453.7, 10),
(88, 'Angels Jeanswear', '', 75, 7331.82, 10),
(89, 'Countess Mara', '', 10, 4960.37, 10),
(90, 'Healthtex', '', 66, 1564.16, 10),
(91, 'Converse', '', 93, 4199.06, 10),
(92, 'Baby Gap', '', 60, 7059.21, 10),
(93, 'Cherokee Inc.', '', 56, 7783.4, 10),
(94, 'Tommy Hilfinger', '', 14, 5297.05, 10),
(95, 'Converse', '', 64, 1891.6, 10),
(96, 'Marchesa', '', 53, 1761.86, 10),
(97, 'Ex-Boyfriend', '', 57, 9138.16, 10),
(98, 'H&M', '', 95, 6805.21, 10),
(99, 'Mossimo', '', 5, 5278.4, 10),
(100, 'TNT', '', 32, 963.447, 10),
(101, 'Old Navy', '', 13, 1070.35, 10),
(102, 'Yves Saint Laurent', '', 12, 186.488, 11),
(103, 'Kat Von D', '', 19, 6463.12, 11),
(104, 'Saint Laurente', '', 41, 1721.9, 11),
(105, 'Olay', '', 27, 1089.66, 11),
(106, 'Clinique', '', 20, 8453.41, 11),
(107, 'Coty', '', 12, 6931.97, 11),
(108, 'Smashbox', '', 5, 6353.84, 11),
(109, 'Neutrogena', '', 82, 2122.09, 11),
(110, 'Rexona', '', 32, 5934.93, 11),
(111, 'Colourpop Cosmetics', '', 15, 1365.04, 11),
(112, 'ClarinsMen', '', 38, 6831.71, 11),
(113, 'Triumph & Disaster', '', 27, 6070.84, 11),
(114, 'NYX Cosmetics', '', 50, 6791.85, 11),
(115, 'Dove', '', 78, 3352.97, 11),
(116, 'LOreal', '', 6, 220.995, 11),
(117, 'The Body Shop', '', 61, 9126.01, 11),
(118, 'Biotherm', '', 98, 6545.19, 11),
(119, 'Natura', '', 37, 9236.24, 11),
(120, 'Yves Saint Laurent', '', 21, 3713.43, 11),
(121, 'Revlon', '', 64, 7416.24, 11),
(122, 'Clean & Clear', '', 81, 1629.54, 11),
(123, 'LOccitane', '', 36, 6877.07, 11),
(124, 'Head & Shoulders', '', 36, 6006.36, 11),
(125, 'Sephora', '', 84, 4914.78, 11),
(126, 'Pantene', '', 85, 940.486, 11),
(127, 'Nivea', '', 69, 5923.55, 11),
(128, 'Clean & Clear', '', 86, 6749.22, 11),
(129, 'Inglot', '', 82, 1121.4, 11),
(130, 'Eucerin', '', 68, 8536.69, 11),
(131, 'Vichy', '', 61, 80.4964, 11),
(132, 'Marc Jacobs', '', 15, 9589.85, 11),
(133, 'Tom Ford', '', 72, 6767.69, 11),
(134, 'Triumph & Disaster', '', 77, 1361.89, 11),
(135, 'Rexona', '', 68, 3778.27, 11),
(136, 'Speed Stick', '', 73, 887.846, 11),
(137, 'Chanel', '', 0, 4046.82, 11),
(138, 'NARS Cosmetics', '', 68, 959.334, 11),
(139, 'Pantene', '', 91, 8240.69, 11),
(140, 'ClarinsMen', '', 14, 4197.4, 11),
(141, 'Colourpop Cosmetics', '', 54, 9682.53, 11),
(142, 'Oriflame', '', 23, 7340.47, 11),
(143, 'Coty', '', 6, 1123.41, 11),
(144, 'Tom Ford', '', 31, 8528.13, 11),
(145, 'Redken', '', 67, 8017.31, 11),
(146, 'The Body Shop', '', 86, 6894.72, 11),
(147, 'Hourglass', '', 31, 6912.35, 11),
(148, 'Revolution Makeup London', '', 3, 8711.12, 11),
(149, 'Neutrogena', '', 95, 6254.52, 11),
(150, 'Colourpop Cosmetics', '', 79, 4187.72, 11),
(151, 'Lancome', '', 29, 2940.56, 11),
(152, 'Highland Spring', '', 73, 8866.19, 12),
(153, 'Coca Cola', '', 54, 6866.69, 12),
(154, 'Yanjing', '', 27, 1562.02, 12),
(155, 'Tanqueray', '', 31, 5742.22, 12),
(156, 'Strongbow', '', 56, 8368.82, 12),
(157, 'Tanqueray', '', 21, 5206.54, 12),
(158, 'Yanjing', '', 23, 9671.1, 12),
(159, 'Tanqueray', '', 4, 1333.73, 12),
(160, 'Keystone Light', '', 39, 3639.32, 12),
(161, 'Evolution Fresh', '', 18, 8975.49, 12),
(162, 'Frooti', '', 65, 227.871, 12),
(163, 'Blue Moon', '', 89, 640.105, 12),
(164, 'Yanjing', '', 2, 1506.64, 12),
(165, 'Juicy Juice', '', 30, 515.422, 12),
(166, 'Johnnie Walker', '', 17, 8446.21, 12),
(167, 'Jack Daniels', '', 20, 5180.51, 12),
(168, 'Nestlé Waters', '', 32, 325.553, 12),
(169, 'Highland Spring', '', 21, 965.779, 12),
(170, 'Malibu', '', 97, 279.536, 12),
(171, 'Tanqueray', '', 24, 7287.89, 12),
(172, 'Bud Light', '', 13, 4757.19, 12),
(173, 'Prigat', '', 81, 8139.73, 12),
(174, 'Malibu', '', 38, 5585.17, 12),
(175, 'Duvel Golden Ale', '', 99, 5975.06, 12),
(176, 'Cappy', '', 20, 2725.85, 12),
(177, 'Bacardi', '', 15, 3088.44, 12),
(178, 'Tanqueray', '', 47, 6326.2, 12),
(179, 'Grolsch', '', 84, 8412.24, 12),
(180, 'Cappy', '', 39, 3650.41, 12),
(181, 'Skol', '', 41, 8587.87, 12),
(182, 'Tanqueray', '', 64, 6718.05, 12),
(183, 'Guaranito', '', 85, 6305.71, 12),
(184, 'Evolution Fresh', '', 50, 3755.3, 12),
(185, 'Strongbow', '', 74, 3599.07, 12),
(186, 'Deep River Rock', '', 15, 3548.77, 12),
(187, 'Grolsch', '', 84, 8662.09, 12),
(188, 'Edelweiss', '', 29, 4381.59, 12),
(189, 'Deep River Rock', '', 80, 5839.69, 12),
(190, 'Nestlé Waters', '', 21, 1298.63, 12),
(191, 'Prigat', '', 2, 684.746, 12),
(192, 'Bacardi', '', 5, 7869.6, 12),
(193, 'Corona', '', 28, 8987, 12),
(194, 'Cappy', '', 99, 5437.67, 12),
(195, 'SunnyD', '', 6, 7858.57, 12),
(196, 'Nestlé Waters', '', 16, 6707.6, 12),
(197, 'Aquafina', '', 2, 7269.63, 12),
(198, 'Chivas Regal', '', 77, 1200.67, 12),
(199, 'Hennessy', '', 50, 8359.82, 12),
(200, 'Cappy', '', 90, 5876.58, 12),
(201, 'Mumm', '', 66, 4626.29, 12),
(202, 'Tylenol', '', 35, 8261.67, 13),
(203, 'Zovirax', '', 75, 3019.06, 13),
(204, 'Abilify', '', 18, 1088.53, 13),
(205, 'Femibion', '', 7, 9277.53, 13),
(206, 'Vioxx', '', 98, 4735.07, 13),
(207, 'Novolin', '', 79, 9819.75, 13),
(208, 'Exact', '', 34, 1436.37, 13),
(209, 'Zetril', '', 69, 1997.77, 13),
(210, 'Zoloft', '', 56, 2835.48, 13),
(211, 'Coldrex', '', 69, 6938.3, 13),
(212, 'Symbicort', '', 73, 7006.64, 13),
(213, 'Singulair', '', 88, 7608.58, 13),
(214, 'Amaryl', '', 77, 5559.02, 13),
(215, 'Gravol', '', 4, 7426.39, 13),
(216, 'Fosamax', '', 87, 1561.35, 13),
(217, 'Claritin', '', 69, 9954.1, 13),
(218, 'Tylenol', '', 10, 6783.25, 13),
(219, 'OxyContin', '', 64, 5066.3, 13),
(220, 'Benadryl', '', 93, 6216.52, 13),
(221, 'Herceptin', '', 0, 2632.13, 13),
(222, 'OxyContin', '', 94, 2992.55, 13),
(223, 'Arcoxia', '', 57, 3537.17, 13),
(224, 'Vaqta', '', 88, 6608.96, 13),
(225, 'Ocrevus', '', 9, 3102.93, 13),
(226, 'Lisinopril', '', 53, 4474.89, 13),
(227, 'MidNite', '', 24, 6358.06, 13),
(228, 'Makena', '', 43, 8623.01, 13),
(229, 'Femibion', '', 80, 1300.72, 13),
(230, 'Cosopt', '', 28, 3409.79, 13),
(231, 'Lisinopril', '', 27, 6608.89, 13),
(232, 'Makena', '', 69, 3311.22, 13),
(233, 'Midodrine', '', 50, 4070.9, 13),
(234, 'Pepcid', '', 93, 2986.33, 13),
(235, 'Aggrastat', '', 2, 6509.78, 13),
(236, 'Zetril', '', 96, 5914.93, 13),
(237, 'Symbicort', '', 19, 6571.33, 13),
(238, 'Maxalt', '', 58, 7471.55, 13),
(239, 'Gravol', '', 10, 6450.15, 13),
(240, 'Exact', '', 39, 2267.23, 13),
(241, 'Midodrine', '', 99, 65.844, 13),
(242, 'Advil', '', 62, 8797.93, 13),
(243, 'Claritin', '', 10, 4024.16, 13),
(244, 'Nurofen', '', 84, 807.48, 13),
(245, 'Emend', '', 19, 7480.04, 13),
(246, 'Paracetamol', '', 38, 4990.5, 13),
(247, 'Risperdal', '', 74, 3613.76, 13),
(248, 'Symbicort', '', 18, 8130.26, 13),
(249, 'Zoloft', '', 70, 8181.03, 13),
(250, 'Visine', '', 70, 4893.24, 13),
(251, 'Unisom', '', 31, 7467.5, 13);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `role` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `mdp`, `pseudo`, `role`) VALUES
(3, 'damien@mail.fr', '$2y$10$.yZJpkUWMD2tdgfPBZdnHuPozoiloG1EqDGE7gtU1Mju3ahgs4YGu', 'damien', 'admin'),
(6, 'romain', '$2y$10$Fyld0qYTAoekAiOHZo7e2exAatWbmPG.pNeUMSdHkL8/uvxgizXpu', '', 'default'),
(10, 'test2@mail.fr', '$2y$10$ChwScI/8EIzX9PYBiirp/.sPdRXvUnF8zxUNHcn.9JZnwZnUCrhBG', 'test', 'default'),
(9, 'test@mail.fr', '$2y$10$3hDSzdbwEtU801Ewp8R5wuUAW1Qw1Vd4CYReXGzVTDsEibhzSTUCO', 'test', 'default'),
(11, 'test3@mail.fr', '$2y$10$C1m.bkx7c9jMiZ6ZlGgh6ORLpNqdLccg5/zk19ovyNnJj4i4kgysu', 'test1234', 'default'),
(12, 'test4@mail.fr', '$2y$10$90G4pAkjIa4aRjOd8eaaJOPo35OA8tw1GS2IvcOswlZf.F5hH6dW2', 'test1234', 'default'),
(13, 'test5@mail.fr', '$2y$10$UahiYkQFq6bcXmEh.xftluy3n/fl3JrYF.fZXXEaWuMLX0glL7lye', 'test1234', 'default');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
