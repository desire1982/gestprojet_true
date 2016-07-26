-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 22 Avril 2016 à 17:44
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_accordpret`
--

CREATE TABLE IF NOT EXISTS `tbl_accordpret` (
  `ref_accordPret` varchar(20) NOT NULL,
  `code_destination` varchar(15) NOT NULL,
  `date_signature` date NOT NULL,
  PRIMARY KEY (`ref_accordPret`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_destination`
--

CREATE TABLE IF NOT EXISTS `tbl_destination` (
  `destination` varchar(15) NOT NULL,
  `lib_destination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_destination`
--

INSERT INTO `tbl_destination` (`destination`, `lib_destination`) VALUES
('711220101', 'cabinet'),
('711250101', 'DAF'),
('715', 'grt'),
('dsdsd', 'sdsdsdsd'),
('hgggh', 'ghghghgh'),
('5879', 'bvvnvnbn'),
('jhhjhj', 'jhhjhjhj'),
('ghh', 'ghhgh'),
('4454', 'vbvkj'),
('12442', 'GRAND'),
('895366', 'kjiuy'),
('gjgjhg', 'wxcvxbv'),
('4555', 'FORT'),
('9797', 'gfgfdghjh'),
('HLJKHLHLH', 'FHFJKGJ'),
('121353', 'FFHYJFKGF'),
('547888', 'GJGKHK'),
('3587777', 'VVBBBNNJN?JJ'),
('584566', 'MPOIIUUYTT'),
('458799', 'GDFJKKK'),
('689999', 'JKLHKLHD'),
('313213', 'GHJKHK'),
('111111212', 'KJKLMJ'),
('35556', 'CN?'),
('789455', 'habit'),
('96547788', 'DFDFJDJ'),
('48', 'PAPIERS');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_finprjt`
--

CREATE TABLE IF NOT EXISTS `tbl_finprjt` (
  `code_FinPrjt` int(5) NOT NULL AUTO_INCREMENT,
  `code_destination_fk` varchar(15) NOT NULL,
  `code_finPrjt_fk` varchar(20) NOT NULL,
  `montant_finPjt` double NOT NULL,
  PRIMARY KEY (`code_FinPrjt`),
  KEY `code_destination_fk` (`code_destination_fk`,`code_finPrjt_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Contenu de la table `tbl_finprjt`
--

INSERT INTO `tbl_finprjt` (`code_FinPrjt`, `code_destination_fk`, `code_finPrjt_fk`, `montant_finPjt`) VALUES
(64, '711220101 ', '1 ', 20),
(65, '711220101 ', '1 ', 21),
(66, '711220101 ', '1 ', 25),
(67, '711250101 ', '1 ', 20),
(68, '711250101 ', '1 ', 21),
(69, '711250101 ', '1 ', 35),
(70, 'hgggh ', '1 ', 20),
(71, 'HLJKHLHLH ', '1 ', 20),
(72, 'HLJKHLHLH ', '1 ', 26),
(73, 'HLJKHLHLH ', '1 ', 21),
(74, 'jhhjhj ', '1 ', 20),
(75, 'HLJKHLHLH ', '1 ', 25),
(76, '4555 ', '1 ', 10),
(77, '4555 ', '1 ', 15),
(78, '711220101 ', '1 ', 10),
(79, '121353 ', '1 ', 10),
(80, '4555 ', '1 ', 20),
(81, '', '', 0),
(82, 'hgggh ', '1 ', 2500),
(83, '711220101 ', '1 ', 24),
(84, '789455 ', '1 ', 50000000),
(85, 'HLJKHLHLH ', '1 ', 30000),
(86, '715 ', '1 ', 2500),
(87, '5879 ', '1 ', 3500),
(88, '711220101 ', '1 ', 2358),
(89, '711220101 ', '1 ', 2145),
(90, 'jhhjhj ', '1 ', 250),
(91, 'jhhjhj ', '1 ', 3550);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_sourcefinprjt`
--

CREATE TABLE IF NOT EXISTS `tbl_sourcefinprjt` (
  `codeFinPrjt` varchar(20) NOT NULL,
  `libFinPrjt` varchar(50) NOT NULL,
  PRIMARY KEY (`codeFinPrjt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_sourcefinprjt`
--

INSERT INTO `tbl_sourcefinprjt` (`codeFinPrjt`, `libFinPrjt`) VALUES
('1', 'ETAT');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_prenom` varchar(150) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `statut` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user_name`, `user_prenom`, `username`, `password`, `statut`, `date_creation`) VALUES
(1, 'kouame', 'desire', 'desire', '12345', 'admin', '2016-04-12 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
