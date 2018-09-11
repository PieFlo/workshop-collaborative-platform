-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 05 Janvier 2018 à 16:04
-- Version du serveur: 5.5.37
-- Version de PHP: 5.6.19-1~dotdeb+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `publishers`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acct_num` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déclencheurs `account`
--
DROP TRIGGER IF EXISTS `ins_sum`;
DELIMITER //
CREATE TRIGGER `ins_sum` BEFORE INSERT ON `account`
 FOR EACH ROW SET @sum = @sum + NEW.amount
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `au_id` char(11) NOT NULL,
  `au_lname` varchar(40) NOT NULL,
  `au_fname` varchar(20) NOT NULL,
  `phone` char(12) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zip` char(5) DEFAULT NULL,
  `contract` int(11) NOT NULL,
  PRIMARY KEY (`au_id`),
  KEY `aunmind` (`au_lname`,`au_fname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `authors`
--

INSERT INTO `authors` (`au_id`, `au_lname`, `au_fname`, `phone`, `address`, `city`, `state`, `zip`, `contract`) VALUES
('172-32-1176', 'White', 'Johnso', '408 496-7223', '10932 Bigge Rd.', 'Menlo Park', 'CA', '94025', 1),
('213-46-8915', 'Gree', 'Marjorie', '415 986-7020', '309 63rd St. #411', 'Oakland', 'CA', '94618', 1),
('238-95-7766', 'Carso', 'Cheryl', '415 548-7723', '589 Darwin Ln.', 'Berkeley', 'CA', '94705', 1),
('267-41-2394', 'O''Leary', 'Michael', '408 286-2428', '22 Cleveland Av. #14', 'San Jose', 'CA', '95128', 1),
('274-80-9391', 'Straight', 'Dea', '415 834-2919', '5420 College Av.', 'Oakland', 'CA', '94609', 1),
('341-22-1782', 'Smith', 'Meander', '913 843-0462', '10 Mississippi Dr.', 'Lawrence', 'KS', '66044', 0),
('409-56-7008', 'Bennet', 'Abraham', '415 658-9932', '6223 Bateman St.', 'Berkeley', 'CA', '94705', 1),
('427-17-2319', 'Dull', 'An', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', '94301', 1),
('472-27-2349', 'Gringlesby', 'Burt', '707 938-6445', 'PO Box 792', 'Covelo', 'CA', '95428', 1),
('486-29-1786', 'Locksley', 'Charlene', '415 585-4620', '18 Broadway Av.', 'San Francisco', 'CA', '94130', 1),
('527-72-3246', 'Greene', 'Morningstar', '615 297-2723', '22 Graybar House Rd.', 'Nashville', 'T', '37215', 0),
('648-92-1872', 'Blotchet-Halls', 'Reginald', '503 745-6402', '55 Hillsdale Bl.', 'Corvallis', 'OR', '97330', 1),
('672-71-3249', 'Yokomoto', 'Akiko', '415 935-4228', '3 Silver Ct.', 'Walnut Creek', 'CA', '94595', 1),
('712-45-1867', 'del Castillo', 'Innes', '615 996-8275', '2286 Cram Pl. #86', 'Ann Arbor', 'MI', '48105', 1),
('722-51-5454', 'DeFrance', 'Michel', '219 547-9982', '3 Balding Pl.', 'Gary', 'I', '46403', 1),
('724-08-9931', 'Stringer', 'Dirk', '415 843-2991', '5420 Telegraph Av.', 'Oakland', 'CA', '94609', 0),
('724-80-9391', 'MacFeather', 'Stearns', '415 354-7128', '44 Upland Hts.', 'Oakland', 'CA', '94612', 1),
('756-30-7391', 'Karse', 'Livia', '415 534-9219', '5720 McAuley St.', 'Oakland', 'CA', '94609', 1),
('807-91-6654', 'Panteley', 'Sylvia', '301 946-8853', '1956 Arlington Pl.', 'Rockville', 'MD', '20853', 1),
('846-92-7186', 'Hunter', 'Sheryl', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', '94301', 1),
('893-72-1158', 'McBadde', 'Heather', '707 448-4982', '301 Putnam', 'Vacaville', 'CA', '95688', 0),
('899-46-2035', 'Ringer', 'Anne', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', '84152', 1),
('998-72-3567', 'Ringer', 'Albert', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', '84152', 1);

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE IF NOT EXISTS `command` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `command`
--

INSERT INTO `command` (`id`, `login`, `date`) VALUES
(3, 'aria.cruz', '2018-01-05 12:13:36'),
(4, 'aria.cruz', '2018-01-05 12:20:00');

-- --------------------------------------------------------

--
-- Structure de la table `commanddetail`
--

CREATE TABLE IF NOT EXISTS `commanddetail` (
  `idcmd` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idcmd`,`iditem`),
  KEY `iditem` (`iditem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `commanddetail`
--

INSERT INTO `commanddetail` (`idcmd`, `iditem`, `quantity`) VALUES
(3, 736, 2),
(3, 877, 1),
(3, 1389, 1),
(4, 736, 1),
(4, 877, 2);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`id`, `libelle`) VALUES
(1, 'USA'),
(2, 'England'),
(3, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discounttype` varchar(40) NOT NULL,
  `stor_id` char(4) DEFAULT NULL,
  `lowqty` int(11) DEFAULT NULL,
  `highqty` int(11) DEFAULT NULL,
  `discount` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `discounts`
--

INSERT INTO `discounts` (`id`, `discounttype`, `stor_id`, `lowqty`, `highqty`, `discount`) VALUES
(1, 'Initial Customer', NULL, NULL, NULL, 10.50),
(2, 'Volume Discount', NULL, 100, 1000, 6.70),
(3, 'Customer Discount', '8042', NULL, NULL, 5.00);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` char(9) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `minit` char(1) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_lvl` tinyint(4) DEFAULT NULL,
  `pub_id` int(11) NOT NULL,
  `hire_date` datetime NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_id`),
  KEY `employee_ind` (`lname`,`fname`,`minit`),
  KEY `job_id` (`job_id`),
  KEY `pub_id` (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `minit`, `lname`, `job_id`, `job_lvl`, `pub_id`, `hire_date`, `login`, `password`, `role`) VALUES
('A-C71970F', 'Aria', NULL, 'Cruz', 2, 87, 1389, '2013-08-05 00:00:00', 'aria.cruz', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('ARD36773F', 'Anabela', 'R', 'Domingues', 8, 100, 877, '2013-08-05 18:19:03', 'anabela.domingues', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('CGS88322F', 'Carine', 'G', 'Schmitt', 13, 64, 1389, '2013-08-05 18:19:03', 'carine.schmitt', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('DBT39435M', 'Daniel', 'B', 'Tonini', 11, 75, 877, '2013-08-05 18:19:03', 'daniel.tonini', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('DWR65030M', 'Diego', 'W', 'Roel', 6, 127, 1389, '2013-08-05 18:19:03', 'diego.roel', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('E-A06128F', 'EPSI', NULL, 'Montpellier', 2, NULL, 736, '2014-06-12 00:00:00', 'epsi.montpellier', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 100),
('ENL44273F', 'Elizabeth', '', 'Lincol', 14, 35, 877, '2013-08-05 18:19:03', 'elizabeth.lincol', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('GHT50241M', 'Gary', 'H', 'Thomas', 9, 127, 736, '2013-08-05 18:19:03', 'gary.thomas', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('H-B39728F', 'Hele', '', 'Bennett', 12, 35, 877, '2013-08-05 18:19:03', 'hele.bennett', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('HAS54740M', 'Howard', 'A', 'Snyder', 12, 100, 736, '2013-08-05 18:19:03', 'howard.snyder', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('KFJ64308F', 'Kari', 'F', 'Josephs', 14, 100, 736, '2013-08-05 18:19:03', 'kari.josephs', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('L-B31947F', 'Lesley', '', 'Brow', 7, 120, 877, '2013-08-05 18:19:03', 'lesley.brow', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('LAL21447M', 'Laurence', 'A', 'Lebiha', 5, 127, 736, '2013-08-05 18:19:03', 'laurence.lebiha', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('M-L67958F', 'Maria', '', 'Larsso', 7, 127, 1389, '2013-08-05 18:19:03', 'maria.larsso', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('M-R38834F', 'Martine', '', 'Rance', 9, 75, 877, '2013-08-05 18:19:03', 'martine.rance', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('MAP77183M', 'Miguel', 'A', 'Paolino', 11, 112, 1389, '2013-08-05 18:19:03', 'miguel.paolino', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('MAS70474F', 'Margaret', 'A', 'Smith', 9, 78, 1389, '2013-08-05 18:19:03', 'margaret.smith', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('MFS52347M', 'Marti', 'F', 'Sommer', 10, 127, 736, '2013-08-05 18:19:03', 'marti.sommer', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('MGK44605M', 'Matti', 'G', 'Karttune', 6, 127, 736, '2013-08-05 18:19:03', 'matti.karttune', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('MJP25939M', 'Maria', 'J', 'Pontes', 5, 127, 1756, '2013-08-05 18:19:03', 'maria.pontes', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('MMS49649F', 'Mary', 'M', 'Saveley', 8, 127, 736, '2013-08-05 18:19:03', 'mary.saveley', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('PDI47470M', 'Palle', 'D', 'Ibse', 7, 127, 736, '2013-08-05 18:19:03', 'palle.ibse', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('PHF38899M', 'Peter', 'H', 'Franke', 10, 75, 877, '2013-08-05 18:19:03', 'peter.franke', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('PMA42628M', 'Paolo', 'M', 'Accorti', 13, 35, 877, '2013-08-05 18:19:03', 'paolo.accorti', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('PSA89086M', 'Pedro', 'S', 'Afonso', 14, 89, 1389, '2013-08-05 18:19:03', 'pedro.afonso', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('PSP68661F', 'Paula', 'S', 'Parente', 8, 125, 1389, '2013-08-05 18:19:03', 'paula.parente', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('PXH22250M', 'Paul', 'X', 'Henriot', 5, 127, 877, '2013-08-05 18:19:03', 'paul.henriot', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('R-M53550M', 'Roland', '', 'Mendel', 11, 127, 736, '2013-08-05 18:19:03', 'roland.mendel', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('RBM23061F', 'Rita', 'B', 'Muller', 5, 127, 1622, '2013-08-05 18:19:03', 'rita.muller', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('SKO22412M', 'Sve', 'K', 'Ottlieb', 5, 127, 1389, '2013-08-05 18:19:03', 'sve.ottlieb', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('TPO55093M', 'Timothy', 'P', 'O''Rourke', 13, 100, 736, '2013-08-05 18:19:03', 'timothy.o''rourke', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('VPA30890F', 'Victoria', 'P', 'Ashworth', 6, 127, 877, '2013-08-05 18:19:03', 'victoria.ashworth', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0),
('Y-L77953M', 'Yoshi', '', 'Latimer', 12, 32, 1389, '2013-08-05 18:19:03', 'yoshi.latimer', '$2y$10$jVcP6lUnfZdZFLT2L/AFv.UWYEzj3/zXhgypzpqcabtmdINaMwMgm', 0);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_desc` varchar(50) NOT NULL,
  `min_lvl` tinyint(4) NOT NULL,
  `max_lvl` tinyint(4) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_desc`, `min_lvl`, `max_lvl`) VALUES
(1, 'New Hire - Job not specified', 10, 10),
(2, 'Chief Executive Officer', 127, 127),
(3, 'Business Operations Manager', 127, 127),
(4, 'Chief Financial Officier', 127, 127),
(5, 'Publisher', 127, 127),
(6, 'Managing Editor', 127, 127),
(7, 'Marketing Manager', 120, 127),
(8, 'Public Relations Manager', 100, 127),
(9, 'Acquisitions Manager', 75, 127),
(10, 'Productions Manager', 75, 127),
(11, 'Operations Manager', 75, 127),
(12, 'Editor', 25, 100),
(13, 'Sales Representative', 25, 100),
(14, 'Designer', 25, 100);

-- --------------------------------------------------------

--
-- Structure de la table `photospublishers`
--

CREATE TABLE IF NOT EXISTS `photospublishers` (
  `pub_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `path` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `idCountry` int(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pub_id`),
  KEY `idCountry` (`idCountry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publishers`
--

INSERT INTO `publishers` (`pub_id`, `pub_name`, `city`, `state`, `idCountry`) VALUES
(736, 'Hachette', 'Paris', '75', 3),
(877, 'Binnet &amp; Hardley', 'Washington', 'DC', 1),
(1389, 'Algodata Infosystems', 'Washington', 'DC', 1),
(1622, 'Five Lakes Publishing', 'Chicago', 'IL', 1),
(1756, 'Ramones Publishers', 'Dallas', 'TX', 1),
(1758, 'Belton SA publishers', 'Boston', 'MA', 1),
(1759, 'Belmann Editeurs', 'Paris', '75', 3),
(1760, 'TEST2', 'Montpellier', 'HT', 3);

-- --------------------------------------------------------

--
-- Structure de la table `publishersOld`
--

CREATE TABLE IF NOT EXISTS `publishersOld` (
  `pub_id` char(4) NOT NULL,
  `pub_name` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publishersOld`
--

INSERT INTO `publishersOld` (`pub_id`, `pub_name`, `city`, `state`, `country`) VALUES
('0736', 'New Moon Books', 'Boston', 'MA', 'USA'),
('0877', 'Binnet &amp; Hardley', 'Washington', 'DC', 'USA'),
('1389', 'Algodata Infosystems', 'Washington', 'DC', 'USA'),
('1622', 'Five Lakes Publishing', 'Chicago', 'IL', 'USA'),
('1756', 'Ramones Publishers', 'Dallas', 'TX', 'USA'),
('1758', 'Belton publishers', 'Boston', 'MA', 'USA'),
('1759', 'Belmann publishers', 'Washington', 'DC', 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `pub_info`
--

CREATE TABLE IF NOT EXISTS `pub_info` (
  `pub_id` int(11) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `pr_info` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roysched`
--

CREATE TABLE IF NOT EXISTS `roysched` (
  `title_id` char(8) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `lorange` int(11) DEFAULT NULL,
  `hirange` int(11) DEFAULT NULL,
  `royalty` int(11) DEFAULT NULL,
  PRIMARY KEY (`title_id`,`sub_id`),
  KEY `title_id` (`title_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roysched`
--

INSERT INTO `roysched` (`title_id`, `sub_id`, `lorange`, `hirange`, `royalty`) VALUES
('BU1032', 1, 0, 5000, 10),
('BU1032', 2, 5001, 50000, 12),
('BU1111', 1, 0, 4000, 10),
('BU1111', 2, 4001, 8000, 12),
('BU1111', 3, 8001, 10000, 14),
('BU1111', 4, 12001, 16000, 16),
('BU1111', 5, 16001, 20000, 18),
('BU1111', 6, 20001, 24000, 20),
('BU1111', 7, 24001, 28000, 22),
('BU1111', 8, 28001, 50000, 24),
('BU2075', 1, 0, 1000, 10),
('BU2075', 2, 1001, 3000, 12),
('BU2075', 3, 3001, 5000, 14),
('BU2075', 4, 5001, 7000, 16),
('BU2075', 5, 7001, 10000, 18),
('BU2075', 6, 10001, 12000, 20),
('BU2075', 7, 12001, 14000, 22),
('BU2075', 8, 14001, 50000, 24),
('BU7832', 1, 0, 5000, 10),
('BU7832', 2, 5001, 10000, 12),
('BU7832', 3, 10001, 15000, 14),
('BU7832', 4, 15001, 20000, 16),
('BU7832', 5, 20001, 25000, 18),
('BU7832', 6, 25001, 30000, 20),
('BU7832', 7, 30001, 35000, 22),
('BU7832', 8, 35001, 50000, 24),
('MC2222', 1, 0, 2000, 10),
('MC2222', 2, 2001, 4000, 12),
('MC2222', 3, 4001, 8000, 14),
('MC2222', 4, 8001, 12000, 16),
('MC2222', 5, 12001, 20000, 18),
('MC2222', 6, 20001, 50000, 20),
('MC3021', 1, 0, 1000, 10),
('MC3021', 2, 1001, 2000, 12),
('MC3021', 3, 2001, 4000, 14),
('MC3021', 4, 4001, 6000, 16),
('MC3021', 5, 6001, 8000, 18),
('MC3021', 6, 8001, 10000, 20),
('MC3021', 7, 10001, 12000, 22),
('MC3021', 8, 12001, 50000, 24),
('PC1035', 1, 0, 2000, 10),
('PC1035', 2, 2001, 3000, 12),
('PC1035', 3, 3001, 4000, 14),
('PC1035', 4, 4001, 10000, 16),
('PC1035', 5, 10001, 50000, 18),
('PC8888', 1, 0, 5000, 10),
('PC8888', 2, 5001, 10000, 12),
('PC8888', 3, 10001, 15000, 14),
('PC8888', 4, 15001, 50000, 16),
('PS1372', 1, 0, 10000, 10),
('PS1372', 2, 10001, 20000, 12),
('PS1372', 3, 20001, 30000, 14),
('PS1372', 4, 30001, 40000, 16),
('PS1372', 5, 40001, 50000, 18),
('PS2091', 1, 0, 1000, 10),
('PS2091', 2, 1001, 5000, 12),
('PS2091', 3, 5001, 10000, 14),
('PS2091', 4, 10001, 50000, 16),
('PS2106', 1, 0, 2000, 10),
('PS2106', 2, 2001, 5000, 12),
('PS2106', 3, 5001, 10000, 14),
('PS2106', 4, 10001, 50000, 16),
('PS3333', 1, 0, 5000, 10),
('PS3333', 2, 5001, 10000, 12),
('PS3333', 3, 10001, 15000, 14),
('PS3333', 4, 15001, 50000, 16),
('PS7777', 1, 0, 5000, 10),
('PS7777', 2, 5001, 50000, 12),
('TC3218', 1, 0, 2000, 10),
('TC3218', 2, 2001, 4000, 12),
('TC3218', 3, 4001, 6000, 14),
('TC3218', 4, 6001, 8000, 16),
('TC3218', 5, 8001, 10000, 18),
('TC3218', 6, 10001, 12000, 20),
('TC3218', 7, 12001, 14000, 22),
('TC3218', 8, 14001, 50000, 24),
('TC4203', 1, 0, 2000, 10),
('TC4203', 2, 2001, 8000, 12),
('TC4203', 3, 8001, 16000, 14),
('TC4203', 4, 16001, 24000, 16),
('TC4203', 5, 24001, 32000, 18),
('TC4203', 6, 32001, 40000, 20),
('TC4203', 7, 40001, 50000, 22),
('TC7777', 1, 0, 5000, 10),
('TC7777', 2, 5001, 15000, 12),
('TC7777', 3, 15001, 50000, 14);

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `stor_id` char(4) NOT NULL,
  `ord_num` varchar(20) NOT NULL,
  `ord_date` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `payterms` varchar(12) NOT NULL,
  `title_id` char(8) NOT NULL,
  PRIMARY KEY (`stor_id`,`ord_num`,`title_id`),
  KEY `stor_id` (`stor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sales`
--

INSERT INTO `sales` (`stor_id`, `ord_num`, `ord_date`, `qty`, `payterms`, `title_id`) VALUES
('6380', '6871', '2014-06-05 18:19:03', 5, 'Net 60', 'BU1032'),
('6380', '722a', '2014-06-05 18:19:03', 3, 'Net 60', 'PS2091'),
('7066', 'A2976', '2014-06-05 18:19:03', 50, 'Net 30', 'PC8888'),
('7066', 'QA7442.3', '2014-06-05 18:19:03', 75, 'ON invoice', 'PS2091'),
('7067', 'D4482', '2014-06-05 18:19:03', 10, 'Net 60', 'PS2091'),
('7067', 'P2121', '2014-06-05 18:19:03', 40, 'Net 30', 'TC3218'),
('7067', 'P2121', '2014-06-05 18:19:03', 20, 'Net 30', 'TC4203'),
('7067', 'P2121', '2014-06-05 18:19:03', 20, 'Net 30', 'TC7777'),
('7131', 'N914008', '2014-06-05 18:19:03', 20, 'Net 30', 'PS2091'),
('7131', 'N914014', '2014-06-05 18:19:03', 25, 'Net 30', 'MC3021'),
('7131', 'P3087a', '2014-06-05 18:19:03', 20, 'Net 60', 'PS1372'),
('7131', 'P3087a', '2014-06-05 18:19:03', 25, 'Net 60', 'PS2106'),
('7131', 'P3087a', '2014-06-05 18:19:03', 15, 'Net 60', 'PS3333'),
('7131', 'P3087a', '2014-06-05 18:19:03', 25, 'Net 60', 'PS7777'),
('7896', 'QQ2299', '2014-06-05 18:19:03', 15, 'Net 60', 'BU7832'),
('7896', 'TQ456', '2014-06-05 18:19:03', 10, 'Net 60', 'MC2222'),
('7896', 'X999', '2014-06-05 18:19:03', 35, 'ON invoice', 'BU2075'),
('8042', '423LL922', '2014-06-05 18:19:03', 15, 'ON invoice', 'MC3021'),
('8042', '423LL930', '2014-06-05 18:19:03', 10, 'ON invoice', 'BU1032'),
('8042', 'P723', '2014-06-05 18:19:03', 25, 'Net 30', 'BU1111'),
('8042', 'QA879.1', '2014-06-05 18:19:03', 30, 'Net 30', 'PC1035');

-- --------------------------------------------------------

--
-- Structure de la table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `stor_id` char(4) NOT NULL,
  `stor_name` varchar(40) DEFAULT NULL,
  `stor_address` varchar(40) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `zip` char(5) DEFAULT NULL,
  PRIMARY KEY (`stor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stores`
--

INSERT INTO `stores` (`stor_id`, `stor_name`, `stor_address`, `city`, `state`, `zip`) VALUES
('6380', 'Eric the Read Books', '788 Catamaugus Ave.', 'Seattle', 'WA', '98056'),
('7066', 'Barnum''s', '567 Pasadena Ave.', 'Tusti', 'CA', '92789'),
('7067', 'News & Brews', '577 First St.', 'Los Gatos', 'CA', '96745'),
('7131', 'Doc-U-Mat: Quality Laundry and Books', '24-A Avogadro Way', 'Remulade', 'WA', '98014'),
('7896', 'Fricative Bookshop', '89 Madison St.', 'Fremont', 'CA', '90019'),
('8042', 'Bookbeat', '679 Carson St.', 'Portland', 'OR', '89076');

-- --------------------------------------------------------

--
-- Structure de la table `titleauthor`
--

CREATE TABLE IF NOT EXISTS `titleauthor` (
  `au_id` char(11) NOT NULL,
  `title_id` char(8) NOT NULL,
  `au_ord` int(4) DEFAULT NULL,
  `royaltyper` int(11) DEFAULT NULL,
  PRIMARY KEY (`au_id`,`title_id`),
  KEY `title_id` (`title_id`),
  KEY `au_id` (`au_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `titleauthor`
--

INSERT INTO `titleauthor` (`au_id`, `title_id`, `au_ord`, `royaltyper`) VALUES
('172-32-1176', 'PS3333', 1, 100),
('172-32-1176', 'PS7777', 3, 100),
('213-46-8915', 'BU1032', 2, 40),
('213-46-8915', 'BU2075', 1, 100),
('238-95-7766', 'PC1035', 1, 100),
('267-41-2394', 'BU1111', 2, 40),
('267-41-2394', 'TC7777', 2, 30),
('274-80-9391', 'BU7832', 1, 100),
('409-56-7008', 'BU1032', 1, 60),
('427-17-2319', 'PC8888', 1, 50),
('472-27-2349', 'TC7777', 3, 30),
('486-29-1786', 'PC9999', 1, 100),
('486-29-1786', 'PS1372', 3, 100),
('486-29-1786', 'PS2091', 3, 100),
('486-29-1786', 'PS2106', 3, 100),
('486-29-1786', 'PS3333', 3, 100),
('486-29-1786', 'PS7777', 1, 100),
('648-92-1872', 'TC4203', 1, 100),
('672-71-3249', 'TC7777', 1, 40),
('712-45-1867', 'MC2222', 1, 100),
('722-51-5454', 'MC3021', 1, 75),
('724-80-9391', 'BU1111', 1, 60),
('724-80-9391', 'PS1372', 2, 25),
('756-30-7391', 'PS1372', 1, 75),
('807-91-6654', 'TC3218', 1, 100),
('846-92-7186', 'PC8888', 2, 50),
('899-46-2035', 'MC3021', 2, 25),
('899-46-2035', 'PS2091', 2, 50),
('998-72-3567', 'PS2091', 1, 50),
('998-72-3567', 'PS2106', 1, 100);

-- --------------------------------------------------------

--
-- Structure de la table `titles`
--

CREATE TABLE IF NOT EXISTS `titles` (
  `title_id` char(8) NOT NULL,
  `title` varchar(80) NOT NULL,
  `type` char(12) NOT NULL,
  `pub_id` char(4) DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `advance` decimal(13,2) DEFAULT NULL,
  `royalty` int(11) DEFAULT NULL,
  `ytd_sales` int(11) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`title_id`),
  KEY `pub_id` (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `titles`
--

INSERT INTO `titles` (`title_id`, `title`, `type`, `pub_id`, `price`, `advance`, `royalty`, `ytd_sales`, `notes`, `pubdate`) VALUES
('BU1032', 'The Busy Executive''s Database Guide', 'Business', '1389', 19.99, 5000.00, 10, 4095, 'An overview of available database systems with emphasis on common business applications. Illustrated.', '2014-04-17 05:08:33'),
('BU1111', 'Cooking with Computers: Surreptitious Balance Sheets', 'Business', '1389', 11.95, 5000.00, 10, 3876, 'Helpful hints on how to use your electronic resources to the best advantage.', '2014-04-17 05:08:33'),
('BU2075', 'You Can Combat Computer Stress!', 'Business', '0736', 2.99, 10125.00, 24, 18722, 'The latest medical and psychological techniques for living with the electronic office. Easy-to-understand explanations.', '2014-04-17 05:08:33'),
('BU7832', 'Straight Talk About Computers', 'Business', '1389', 19.99, 5000.00, 10, 4095, 'Annotated analysis of what computers can do for you: a no-hype guide for the critical user.', '2014-04-17 05:08:33'),
('MC2222', 'Silicon Valley Gastronomic Treats', 'Modern cook', '0877', 19.99, 0.00, 12, 2032, 'Favorite recipes for quick, easy, and elegant meals.', '2014-04-17 05:08:33'),
('MC3021', 'The Gourmet Microwave', 'Modern cook', '0877', 2.99, 15000.00, 24, 22246, 'Traditional French gourmet recipes adapted for modern microwave cooking.', '2014-04-17 05:08:33'),
('PC1035', 'But Is It User Friendly?', 'Popular', '1389', 22.95, 7000.00, 16, 8780, 'A survey of software for the naive user, focusing on the ''friendliness'' of each.', '2014-04-17 05:08:33'),
('PC8888', 'Secrets of Silicon Valley', 'Popular', '1389', 20.00, 8000.00, 10, 4095, 'Muckraking reporting on the world''s largest computer hardware and software manufacturers.', '2014-04-17 05:08:33'),
('PC9999', 'Net Etiquette', 'Popular', '1389', NULL, NULL, NULL, NULL, 'A must-read for computer conferencing.', '2014-04-17 05:08:33'),
('PS1372', 'Computer Phobic AND Non-Phobic Individuals: Behavior Variations', 'Psychology', '0877', 21.59, 7000.00, 10, 375, 'A must for the specialist, this book examines the difference between those who hate and fear computers and those who do''t.', '2014-04-17 05:08:33'),
('PS2091', 'Is Anger the Enemy?', 'Psychology', '0736', 10.95, 2275.00, 12, 2045, 'Carefully researched study of the effects of strong emotions on the body. Metabolic charts included.', '2014-04-17 05:08:33'),
('PS2106', 'Life Without Fear', 'Psychology', '0736', 7.00, 6000.00, 10, 111, 'New exercise, meditation, and nutritional techniques that can reduce the shock of daily interactions. Popular audience. Sample menus included, exercise video available separately.', '2014-04-17 05:08:33'),
('PS3333', 'Prolonged Data Deprivation: Four Case Studies', 'Psychology', '0736', 19.99, 2000.00, 10, 4072, 'What happens when the data runs dry?  Searching evaluations of information-shortage effects.', '2014-04-17 05:08:33'),
('PS7777', 'Emotional Security: A New Algorithm', 'Psychology', '0736', 7.99, 4000.00, 10, 3336, 'Protecting yourself and your loved ones from undue emotional stress in the modern world. Use of computer and nutritional aids emphasized.', '2014-04-17 05:08:33'),
('TC3218', 'Onions, Leeks, and Garlic: Cooking Secrets of the Mediterranea', 'Trad. cook', '0877', 20.95, 7000.00, 10, 375, 'Profusely illustrated in color, this makes a wonderful gift book for a cuisine-oriented friend.', '2014-04-17 05:08:33'),
('TC4203', 'Fifty Years in Buckingham Palace Kitchens', 'Trad. cook', '0877', 11.95, 4000.00, 14, 15096, 'More anecdotes from the Quee''s favorite cook describing life among English royalty. Recipes, techniques, tender vignettes.', '2014-04-17 05:08:33'),
('TC7777', 'Sushi, Anyone?', 'Trad. cook', '0877', 14.99, 8000.00, 10, 4095, 'Detailed instructions on how to make authentic Japanese sushi in your spare time.', '2014-04-17 05:08:33');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commanddetail`
--
ALTER TABLE `commanddetail`
  ADD CONSTRAINT `commanddetail_ibfk_2` FOREIGN KEY (`iditem`) REFERENCES `publishers` (`pub_id`),
  ADD CONSTRAINT `commanddetail_ibfk_1` FOREIGN KEY (`idcmd`) REFERENCES `command` (`id`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`pub_id`) REFERENCES `publishers` (`pub_id`);

--
-- Contraintes pour la table `publishers`
--
ALTER TABLE `publishers`
  ADD CONSTRAINT `publishers_ibfk_1` FOREIGN KEY (`idCountry`) REFERENCES `country` (`id`);

--
-- Contraintes pour la table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`stor_id`) REFERENCES `stores` (`stor_id`);

--
-- Contraintes pour la table `titleauthor`
--
ALTER TABLE `titleauthor`
  ADD CONSTRAINT `titleauthor_ibfk_1` FOREIGN KEY (`au_id`) REFERENCES `authors` (`au_id`);

--
-- Contraintes pour la table `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `titles_ibfk_1` FOREIGN KEY (`pub_id`) REFERENCES `publishersOld` (`pub_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
