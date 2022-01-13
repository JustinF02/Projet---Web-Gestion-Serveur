-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-rhuin.alwaysdata.net
-- Generation Time: Dec 20, 2021 at 10:35 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhuin_projet_festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(255) NOT NULL COMMENT 'ID du groupe',
  `nom` varchar(255) NOT NULL COMMENT 'Nom du groupe',
  `departement` varchar(255) NOT NULL COMMENT 'Département d''origine',
  `email` varchar(255) NOT NULL COMMENT 'Email représentant du groupe',
  `style` varchar(255) NOT NULL COMMENT 'Style musicale du groupe',
  `annee` int(255) NOT NULL COMMENT 'Année de création',
  `presentation` text NOT NULL COMMENT '¨Présentation du texte',
  `experience` text NOT NULL COMMENT 'Expérience scénique',
  `urlgroupe` varchar(500) NOT NULL COMMENT 'Site web ou page facebook',
  `soundcloud` varchar(500) NOT NULL COMMENT 'URL soundclound(facultatif)',
  `youtube` varchar(500) NOT NULL COMMENT 'URL youtube(facultatif)',
  `association` varchar(500) NOT NULL COMMENT 'Statut associatif(oui/non)',
  `sacem` varchar(500) NOT NULL COMMENT 'SACEM(oui/non)',
  `producteur` varchar(500) NOT NULL COMMENT 'Producteur(oui/non)',
  `fichier1` varchar(500) NOT NULL COMMENT 'Extrait n°1',
  `fichier2` varchar(500) NOT NULL COMMENT 'Extrait n°2',
  `fichier3` varchar(500) NOT NULL COMMENT 'Extrait n°3',
  `dossier_presse` varchar(500) NOT NULL COMMENT 'Dossier de presse',
  `photo1` varchar(500) NOT NULL COMMENT 'Photo n°1',
  `photo2` varchar(500) NOT NULL COMMENT 'Photo n°2',
  `fiche_technique` varchar(500) NOT NULL COMMENT 'Fiche technique',
  `doc_sacem` varchar(500) NOT NULL COMMENT 'Document SACEM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `candidature`
--

INSERT INTO `candidature` (`id`, `nom`, `departement`, `email`, `style`, `annee`, `presentation`, `experience`, `urlgroupe`, `soundcloud`, `youtube`, `association`, `sacem`, `producteur`, `fichier1`, `fichier2`, `fichier3`, `dossier_presse`, `photo1`, `photo2`, `fiche_technique`, `doc_sacem`) VALUES
(1, 'ACDC', 'Autre', 'brianjohnson@gmail.com', 'rock', 1973, 'AC/DC est un groupe de hard rock australien constitué à Sydney en 1973 par les frères Angus et Malcolm Young.', 'Les compositions du groupe sont dans la plus pure lignée du blues et du rock\'n\'roll : mesure binaire (très appuyée chez AC/DC), gamme pentatonique (utilisée surtout[1] en blues) et solo de guitare.', 'http://www.ac-dc.wikibis.com/', 'https://www.youtube.com/channel/UCB0JSO6d5ysH2Mmqz5I9rIw', 'https://www.youtube.com/channel/UCB0JSO6d5ysH2Mmqz5I9rIw', 'Oui', 'Oui', 'Oui', 'audio1_1_ACDC.mpeg', 'audio2_1_ACDC.mpeg', 'audio3_1_ACDC.mpeg', 'dossierpresse_1_ACDC.pdf', 'photo1_1_ACDC.jpeg', 'photo2_1_ACDC.jpeg', 'fichetechnique_1_ACDC.pdf', 'docSACEM_1_ACDC.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `departement_id` int(11) NOT NULL,
  `departement_code` varchar(3) DEFAULT NULL,
  `departement_nom` varchar(255) DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) DEFAULT NULL,
  `departement_slug` varchar(255) DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_code`, `departement_nom`, `departement_nom_uppercase`, `departement_slug`, `departement_nom_soundex`) VALUES
(1, '01', 'Ain', 'AIN', 'ain', 'A500'),
(2, '02', 'Aisne', 'AISNE', 'aisne', 'A250'),
(3, '03', 'Allier', 'ALLIER', 'allier', 'A460'),
(4, '04', 'Alpes-de-Haute-Provence', 'ALPES-DE-HAUTE-PROVENCE', 'alpes-de-haute-provence', 'A412316152'),
(5, '05', 'Hautes-Alpes', 'HAUTES-ALPES', 'hautes-alpes', 'H32412'),
(6, '06', 'Alpes-Maritimes', 'ALPES-MARITIMES', 'alpes-maritimes', 'A41256352'),
(7, '07', 'Ardèche', 'ARDÈCHE', 'ardeche', 'A632'),
(8, '08', 'Ardennes', 'ARDENNES', 'ardennes', 'A6352'),
(9, '09', 'Ariège', 'ARIÈGE', 'ariege', 'A620'),
(10, '10', 'Aube', 'AUBE', 'aube', 'A100'),
(11, '11', 'Aude', 'AUDE', 'aude', 'A300'),
(12, '12', 'Aveyron', 'AVEYRON', 'aveyron', 'A165'),
(13, '13', 'Bouches-du-Rhône', 'BOUCHES-DU-RHÔNE', 'bouches-du-rhone', 'B2365'),
(14, '14', 'Calvados', 'CALVADOS', 'calvados', 'C4132'),
(15, '15', 'Cantal', 'CANTAL', 'cantal', 'C534'),
(16, '16', 'Charente', 'CHARENTE', 'charente', 'C653'),
(17, '17', 'Charente-Maritime', 'CHARENTE-MARITIME', 'charente-maritime', 'C6535635'),
(18, '18', 'Cher', 'CHER', 'cher', 'C600'),
(19, '19', 'Corrèze', 'CORRÈZE', 'correze', 'C620'),
(20, '2a', 'Corse-du-sud', 'CORSE-DU-SUD', 'corse-du-sud', 'C62323'),
(21, '2b', 'Haute-corse', 'HAUTE-CORSE', 'haute-corse', 'H3262'),
(22, '21', 'Côte-d\'or', 'CÔTE-D\'OR', 'cote-dor', 'C360'),
(23, '22', 'Côtes-d\'armor', 'CÔTES-D\'ARMOR', 'cotes-darmor', 'C323656'),
(24, '23', 'Creuse', 'CREUSE', 'creuse', 'C620'),
(25, '24', 'Dordogne', 'DORDOGNE', 'dordogne', 'D6325'),
(26, '25', 'Doubs', 'DOUBS', 'doubs', 'D120'),
(27, '26', 'Drôme', 'DRÔME', 'drome', 'D650'),
(28, '27', 'Eure', 'EURE', 'eure', 'E600'),
(29, '28', 'Eure-et-Loir', 'EURE-ET-LOIR', 'eure-et-loir', 'E6346'),
(30, '29', 'Finistère', 'FINISTÈRE', 'finistere', 'F5236'),
(31, '30', 'Gard', 'GARD', 'gard', 'G630'),
(32, '31', 'Haute-Garonne', 'HAUTE-GARONNE', 'haute-garonne', 'H3265'),
(33, '32', 'Gers', 'GERS', 'gers', 'G620'),
(34, '33', 'Gironde', 'GIRONDE', 'gironde', 'G653'),
(35, '34', 'Hérault', 'HÉRAULT', 'herault', 'H643'),
(36, '35', 'Ile-et-Vilaine', 'ILE-ET-VILAINE', 'ile-et-vilaine', 'I43145'),
(37, '36', 'Indre', 'INDRE', 'indre', 'I536'),
(38, '37', 'Indre-et-Loire', 'INDRE-ET-LOIRE', 'indre-et-loire', 'I536346'),
(39, '38', 'Isère', 'ISÈRE', 'isere', 'I260'),
(40, '39', 'Jura', 'JURA', 'jura', 'J600'),
(41, '40', 'Landes', 'LANDES', 'landes', 'L532'),
(42, '41', 'Loir-et-Cher', 'LOIR-ET-CHER', 'loir-et-cher', 'L6326'),
(43, '42', 'Loire', 'LOIRE', 'loire', 'L600'),
(44, '43', 'Haute-Loire', 'HAUTE-LOIRE', 'haute-loire', 'H346'),
(45, '44', 'Loire-Atlantique', 'LOIRE-ATLANTIQUE', 'loire-atlantique', 'L634532'),
(46, '45', 'Loiret', 'LOIRET', 'loiret', 'L630'),
(47, '46', 'Lot', 'LOT', 'lot', 'L300'),
(48, '47', 'Lot-et-Garonne', 'LOT-ET-GARONNE', 'lot-et-garonne', 'L3265'),
(49, '48', 'Lozère', 'LOZÈRE', 'lozere', 'L260'),
(50, '49', 'Maine-et-Loire', 'MAINE-ET-LOIRE', 'maine-et-loire', 'M346'),
(51, '50', 'Manche', 'MANCHE', 'manche', 'M200'),
(52, '51', 'Marne', 'MARNE', 'marne', 'M650'),
(53, '52', 'Haute-Marne', 'HAUTE-MARNE', 'haute-marne', 'H3565'),
(54, '53', 'Mayenne', 'MAYENNE', 'mayenne', 'M000'),
(55, '54', 'Meurthe-et-Moselle', 'MEURTHE-ET-MOSELLE', 'meurthe-et-moselle', 'M63524'),
(56, '55', 'Meuse', 'MEUSE', 'meuse', 'M200'),
(57, '56', 'Morbihan', 'MORBIHAN', 'morbihan', 'M615'),
(58, '57', 'Moselle', 'MOSELLE', 'moselle', 'M240'),
(59, '58', 'Nièvre', 'NIÈVRE', 'nievre', 'N160'),
(60, '59', 'Nord', 'NORD', 'nord', 'N630'),
(61, '60', 'Oise', 'OISE', 'oise', 'O200'),
(62, '61', 'Orne', 'ORNE', 'orne', 'O650'),
(63, '62', 'Pas-de-Calais', 'PAS-DE-CALAIS', 'pas-de-calais', 'P23242'),
(64, '63', 'Puy-de-Dôme', 'PUY-DE-DÔME', 'puy-de-dome', 'P350'),
(65, '64', 'Pyrénées-Atlantiques', 'PYRÉNÉES-ATLANTIQUES', 'pyrenees-atlantiques', 'P65234532'),
(66, '65', 'Hautes-Pyrénées', 'HAUTES-PYRÉNÉES', 'hautes-pyrenees', 'H321652'),
(67, '66', 'Pyrénées-Orientales', 'PYRÉNÉES-ORIENTALES', 'pyrenees-orientales', 'P65265342'),
(68, '67', 'Bas-Rhin', 'BAS-RHIN', 'bas-rhin', 'B265'),
(69, '68', 'Haut-Rhin', 'HAUT-RHIN', 'haut-rhin', 'H365'),
(70, '69', 'Rhône', 'RHÔNE', 'rhone', 'R500'),
(71, '70', 'Haute-Saône', 'HAUTE-SAÔNE', 'haute-saone', 'H325'),
(72, '71', 'Saône-et-Loire', 'SAÔNE-ET-LOIRE', 'saone-et-loire', 'S5346'),
(73, '72', 'Sarthe', 'SARTHE', 'sarthe', 'S630'),
(74, '73', 'Savoie', 'SAVOIE', 'savoie', 'S100'),
(75, '74', 'Haute-Savoie', 'HAUTE-SAVOIE', 'haute-savoie', 'H321'),
(76, '75', 'Paris', 'PARIS', 'paris', 'P620'),
(77, '76', 'Seine-Maritime', 'SEINE-MARITIME', 'seine-maritime', 'S5635'),
(78, '77', 'Seine-et-Marne', 'SEINE-ET-MARNE', 'seine-et-marne', 'S53565'),
(79, '78', 'Yvelines', 'YVELINES', 'yvelines', 'Y1452'),
(80, '79', 'Deux-Sèvres', 'DEUX-SÈVRES', 'deux-sevres', 'D2162'),
(81, '80', 'Somme', 'SOMME', 'somme', 'S500'),
(82, '81', 'Tarn', 'TARN', 'tarn', 'T650'),
(83, '82', 'Tarn-et-Garonne', 'TARN-ET-GARONNE', 'tarn-et-garonne', 'T653265'),
(84, '83', 'Var', 'VAR', 'var', 'V600'),
(85, '84', 'Vaucluse', 'VAUCLUSE', 'vaucluse', 'V242'),
(86, '85', 'Vendée', 'VENDÉE', 'vendee', 'V530'),
(87, '86', 'Vienne', 'VIENNE', 'vienne', 'V500'),
(88, '87', 'Haute-Vienne', 'HAUTE-VIENNE', 'haute-vienne', 'H315'),
(89, '88', 'Vosges', 'VOSGES', 'vosges', 'V200'),
(90, '89', 'Yonne', 'YONNE', 'yonne', 'Y500'),
(91, '90', 'Territoire de Belfort', 'TERRITOIRE DE BELFORT', 'territoire-de-belfort', 'T636314163'),
(92, '91', 'Essonne', 'ESSONNE', 'essonne', 'E250'),
(93, '92', 'Hauts-de-Seine', 'HAUTS-DE-SEINE', 'hauts-de-seine', 'H32325'),
(94, '93', 'Seine-Saint-Denis', 'SEINE-SAINT-DENIS', 'seine-saint-denis', 'S525352'),
(95, '94', 'Val-de-Marne', 'VAL-DE-MARNE', 'val-de-marne', 'V43565'),
(96, '95', 'Val-d\'oise', 'VAL-D\'OISE', 'val-doise', 'V432'),
(97, '976', 'Mayotte', 'MAYOTTE', 'mayotte', 'M300'),
(98, '971', 'Guadeloupe', 'GUADELOUPE', 'guadeloupe', 'G341'),
(99, '973', 'Guyane', 'GUYANE', 'guyane', 'G500'),
(100, '972', 'Martinique', 'MARTINIQUE', 'martinique', 'M6352'),
(101, '974', 'Réunion', 'RÉUNION', 'reunion', 'R500');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_membre` int(255) NOT NULL COMMENT 'ID du membre dans la table',
  `id_groupe` int(255) NOT NULL COMMENT 'ID du groupe de musique',
  `nom` varchar(255) NOT NULL COMMENT 'Nom du membre',
  `prenom` varchar(255) NOT NULL COMMENT 'Prénom du membre',
  `instrument` varchar(255) NOT NULL COMMENT 'Instrument du membre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id_membre`, `id_groupe`, `nom`, `prenom`, `instrument`) VALUES
(1, 1, 'Johnson', 'Brian', ''),
(2, 1, 'Young', 'Angus', 'guitar solo'),
(3, 1, 'Young ', 'Malcolm', 'guitar rythmique'),
(4, 1, 'Gregg', 'Paul', 'basse'),
(5, 1, 'Chris ', 'Slade', 'batterie');

-- --------------------------------------------------------

--
-- Table structure for table `scene`
--

CREATE TABLE `scene` (
  `numero` int(255) NOT NULL COMMENT 'Numéro de scène',
  `genre` varchar(255) NOT NULL COMMENT 'Genre de la scène'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `scene`
--

INSERT INTO `scene` (`numero`, `genre`) VALUES
(1, 'Tribute'),
(2, 'Acoustique / Folk'),
(3, 'Amplifié / Rock');

-- --------------------------------------------------------

--
-- Table structure for table `style_musicaux`
--

CREATE TABLE `style_musicaux` (
  `numero` int(10) NOT NULL,
  `nom_style` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `style_musicaux`
--

INSERT INTO `style_musicaux` (`numero`, `nom_style`) VALUES
(1, 'rock'),
(2, 'pop'),
(3, 'jazz'),
(4, 'soul'),
(5, 'rap'),
(6, 'folk'),
(7, 'punk'),
(8, 'métal'),
(9, 'hip hop'),
(10, 'RNB'),
(11, 'blues'),
(12, 'country'),
(13, 'funk'),
(14, 'reggae'),
(15, 'électro');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `email` varchar(255) NOT NULL COMMENT 'Email utilisateur',
  `type` varchar(255) NOT NULL COMMENT 'Responsable / Candidats / Administrateur',
  `nom` varchar(255) NOT NULL COMMENT 'Nom d''utilisateur',
  `prenom` varchar(255) NOT NULL COMMENT 'Prénom de l''utilisateur',
  `adresse` varchar(255) NOT NULL COMMENT 'Adresse postale',
  `code_postal` int(255) NOT NULL COMMENT 'Code Postal',
  `telephone` int(255) NOT NULL COMMENT 'N° Téléphone',
  `motdepasse` varchar(255) NOT NULL COMMENT 'Mot de passe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `type`, `nom`, `prenom`, `adresse`, `code_postal`, `telephone`, `motdepasse`) VALUES
('brianjohnson@gmail.com', 'candidat', 'Johnson', 'Brian', 'Dunston, Royaume Uni', 99999, 725145689, '$2y$10$vtPHd.VkLpQqu/7qnQRAGOqcRSMnzGoIlR.DfJgmsgFcWb9bAdiSC'),
('rickastley@gmail.com', 'administrateur', 'Asltey', 'Rick', '-----', 0, 0, '$2y$10$c9b0ELhDjgBRXQdwOMM3M.Lx02lRRZE7024fKRb22Ojrtck30ckGS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`);

--
-- Indexes for table `scene`
--
ALTER TABLE `scene`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `style_musicaux`
--
ALTER TABLE `style_musicaux`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'ID du groupe', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `departement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `scene`
--
ALTER TABLE `scene`
  MODIFY `numero` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Numéro de scène', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `style_musicaux`
--
ALTER TABLE `style_musicaux`
  MODIFY `numero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
