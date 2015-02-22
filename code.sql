-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2015 at 12:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `code`
--
CREATE DATABASE IF NOT EXISTS `code` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `code`;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `c_id` int(3) NOT NULL,
  `cityname` varchar(40) NOT NULL,
  `p_id` int(3) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `city`:
--   `p_id`
--       `province` -> `p_id`
--

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`c_id`, `cityname`, `p_id`) VALUES
(1, 'Avalon Peninsula', 9),
(2, 'South Coast-Burin Peninsula and Notre Da', 9),
(3, 'West Coast-Northern Peninsula-Labrador', 9),
(4, 'Cape Breton', 7),
(5, 'North Coast', 7),
(6, 'Annapolis Valley', 7),
(7, 'Southern', 7),
(8, 'Halifax', 7),
(9, 'Moncton-Richibucto', 8),
(10, 'Saint John-St. Stephen', 8),
(11, 'Fredericton-Oromocto', 8),
(12, 'Edmundston-Woodstock', 8),
(13, 'Gasp?sie-?les-de-la-Madeleine', 2),
(14, 'Bas-Saint-Laurent', 2),
(15, 'Capitale-Nationale', 2),
(16, 'Chaudi?re-Appalaches', 2),
(17, 'Estrie', 2),
(18, 'Centre-du-Qu?bec', 2),
(19, 'Mont?r?gie', 2),
(20, 'Montr?al', 2),
(21, 'Laval', 2),
(22, 'Lanaudi?re', 2),
(23, 'Laurentides', 2),
(24, 'Outaouais', 2),
(25, 'Abitibi-T?miscamingue', 2),
(26, 'Mauricie', 2),
(27, 'Saguenay-Lac-Saint-Jean', 2),
(28, 'C?te-Nord and Nord-du-Qu?bec', 2),
(29, 'Ottawa', 1),
(30, 'Kingston-Pembroke', 1),
(31, 'Muskoka-Kawarthas', 1),
(32, 'Toronto', 1),
(33, 'Kitchener-Waterloo-Barrie', 1),
(34, 'Hamilton-Niagara Peninsula', 1),
(35, 'London', 1),
(36, 'Windsor-Sarnia', 1),
(37, 'Stratford-Bruce Peninsula', 1),
(38, 'Northeast', 1),
(39, 'Northwest', 1),
(40, 'Southeast', 5),
(41, 'South Central and North Central', 5),
(42, 'Southwest', 5),
(43, 'Winnipeg', 5),
(44, 'Interlake', 5),
(45, 'Parklands and Northern', 5),
(46, 'Regina-Moose Mountain', 6),
(47, 'Swift Current-Moose Jaw', 6),
(48, 'Saskatoon-Biggar', 6),
(49, 'Yorkton-Melville', 6),
(50, 'Prince Albert and Northern', 6),
(51, 'Lethbridge-Medicine Hat', 4),
(52, 'Camrose-Drumheller', 4),
(53, 'Calgary', 4),
(54, 'Banff-Jasper-Rocky Mountain House and At', 4),
(55, 'Red Deer', 4),
(56, 'Edmonton', 4),
(57, 'Wood Buffalo-Cold Lake', 4),
(58, 'Vancouver Island and Coast', 3),
(59, 'Lower Mainland-Southwest', 3),
(60, 'Thompson-Okanagan', 3),
(61, 'Kootenay', 3),
(62, 'Cariboo', 3),
(63, 'North Coast and Nechako', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gdp1`
--

CREATE TABLE IF NOT EXISTS `gdp1` (
  `year` int(11) NOT NULL,
  `p_id` int(3) NOT NULL,
  `value` double NOT NULL,
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gdp1`
--

INSERT INTO `gdp1` (`year`, `p_id`, `value`) VALUES
(2007, 6, 1004204),
(2008, 6, 1048243),
(2009, 6, 1061538),
(2010, 6, 1107296),
(2011, 6, 1161936),
(2007, 0, 63036),
(2008, 0, 64456),
(2009, 0, 66515),
(2010, 0, 68973),
(2011, 0, 72365),
(2007, 1, 23141),
(2008, 1, 28579),
(2009, 1, 23169),
(2010, 1, 23785),
(2011, 1, 29616),
(2007, 2, 122563),
(2008, 2, 156755),
(2009, 2, 90652),
(2010, 2, 114686),
(2011, 2, 139800),
(2007, 3, 35220),
(2008, 3, 37569),
(2009, 3, 36139),
(2010, 3, 38114),
(2011, 3, 39630),
(2007, 4, 95353),
(2008, 4, 105605),
(2009, 4, 103549),
(2010, 4, 113256),
(2011, 4, 119792),
(2007, 5, 186210),
(2008, 5, 174933),
(2009, 5, 158136),
(2010, 5, 166969),
(2011, 5, 176232),
(2007, 7, 79630),
(2008, 7, 80600),
(2009, 7, 76851),
(2010, 7, 81998),
(2011, 7, 86966),
(2007, 8, 62458),
(2008, 8, 63577),
(2009, 8, 61109),
(2010, 8, 64645),
(2011, 8, 68638),
(2007, 14, 48833),
(2008, 14, 49963),
(2009, 14, 50250),
(2010, 14, 51838),
(2011, 14, 53245),
(2007, 9, 98636),
(2008, 9, 100554),
(2009, 9, 94528),
(2010, 9, 101730),
(2011, 9, 107421),
(2007, 10, 77027),
(2008, 10, 82966),
(2009, 10, 82315),
(2010, 10, 86802),
(2011, 10, 93418),
(2007, 12, 75305),
(2008, 12, 79421),
(2009, 12, 83641),
(2010, 12, 85994),
(2011, 12, 89183),
(2007, 13, 96768),
(2008, 13, 102370),
(2009, 13, 108637),
(2010, 13, 112233),
(2011, 13, 117830),
(2007, 11, 11596),
(2008, 11, 12303),
(2009, 11, 12621),
(2010, 11, 12672),
(2011, 11, 12822),
(2007, 15, 30055),
(2008, 15, 31595),
(2009, 15, 31657),
(2010, 15, 32527),
(2011, 15, 33726),
(2007, 16, 29721),
(2008, 16, 31263),
(2009, 16, 32001),
(2010, 16, 32529),
(2011, 16, 34118),
(2007, 17, 96529),
(2008, 17, 104184),
(2009, 17, 111285),
(2010, 17, 114982),
(2011, 17, 121553);

-- --------------------------------------------------------

--
-- Table structure for table `population`
--

CREATE TABLE IF NOT EXISTS `population` (
  `p_id` int(3) NOT NULL,
  `agegroup` varchar(40) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `population`:
--   `p_id`
--       `province` -> `p_id`
--

--
-- Dumping data for table `population`
--

INSERT INTO `population` (`p_id`, `agegroup`, `value`) VALUES
(9, '0 to 14', '75.90'),
(9, '15 to 64', '357.60'),
(9, '65 and older', '93.50'),
(10, '0 to 14', '23.20'),
(10, '15 to 64', '96.80'),
(10, '65 and older', '26.20'),
(7, '0 to 14', '132.80'),
(7, '15 to 64', '637.10'),
(7, '65 and older', '172.80'),
(8, '0 to 14', '109.90'),
(8, '15 to 64', '505.80'),
(8, '65 and older', '138.20'),
(2, '0 to 14', '1267.50'),
(2, '15 to 64', '5541.30'),
(2, '65 and older', '1405.90'),
(1, '0 to 14', '2190.30'),
(1, '15 to 64', '9351.30'),
(1, '65 and older', '2137.10'),
(5, '0 to 14', '239.10'),
(5, '15 to 64', '855.40'),
(5, '65 and older', '187.50'),
(6, '0 to 14', '213.00'),
(6, '15 to 64', '749.60'),
(6, '65 and older', '162.90'),
(4, '0 to 14', '752.50'),
(4, '15 to 64', '2901.20'),
(4, '65 and older', '468.10'),
(3, '0 to 14', '677.70'),
(3, '15 to 64', '3168.60'),
(3, '65 and older', '785.10'),
(12, '0 to 14', '6.10'),
(12, '15 to 64', '26.60'),
(12, '65 and older', '3.80'),
(11, '0 to 14', '9.30'),
(11, '15 to 64', '31.40'),
(11, '65 and older', '2.90'),
(13, '0 to 14', '11.40'),
(13, '15 to 64', '23.80'),
(13, '65 and older', '1.30');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `p_id` int(3) NOT NULL,
  `code` char(20) NOT NULL,
  `name` char(40) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`p_id`, `code`, `name`) VALUES
(1, 'CA-ON', 'Ontario'),
(2, 'CA-QC', 'Quebec'),
(3, 'CA-BC', 'British Columbia'),
(4, 'CA-AB', 'Alberta'),
(5, 'CA-MB', 'Manitoba'),
(6, 'CA-SK', 'Saskatchewan'),
(7, 'CA-NS', 'Nova Scotia'),
(8, 'CA-NB', 'New Brunswick'),
(9, 'CA-NL', 'Newfoundland and Labrador'),
(10, 'CA-PE', 'Prince Edward Island'),
(11, 'CA-NT', 'Northwest Territories'),
(12, 'CA-YT', 'Yukon'),
(13, 'CA-NU', 'Nunavut');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `sector_id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`sector_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sector_id`, `name`) VALUES
(1, 'Agriculture'),
(2, 'Forestry, fishing, mining'),
(3, 'Utilities'),
(4, 'Construction'),
(5, 'Manufacturing'),
(6, 'Services-producing sector'),
(7, 'Trade'),
(8, 'Transportation and warehousing'),
(9, 'Finance, insurance, real estate and leas'),
(10, 'Professional, scientific and technical s'),
(11, 'Business, building and other support ser'),
(12, 'Educational services'),
(13, 'Health care and social assistance'),
(14, 'Information, culture and recreation'),
(15, 'Accommodation and food services'),
(16, 'Other services'),
(17, 'Public administration');

-- --------------------------------------------------------

--
-- Table structure for table `totalemployed`
--

CREATE TABLE IF NOT EXISTS `totalemployed` (
  `sector_id` int(3) NOT NULL,
  `p_id` int(3) NOT NULL,
  `totalemp` decimal(10,2) DEFAULT NULL,
  KEY `sector_id` (`sector_id`,`p_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `totalemployed`:
--   `p_id`
--       `province` -> `p_id`
--   `sector_id`
--       `sector` -> `sector_id`
--

--
-- Dumping data for table `totalemployed`
--

INSERT INTO `totalemployed` (`sector_id`, `p_id`, `totalemp`) VALUES
(1, 10, '3.20'),
(2, 10, '2.30'),
(3, 10, '0.30'),
(4, 10, '5.50'),
(5, 10, '6.20'),
(6, 10, '56.50'),
(7, 10, '10.90'),
(8, 10, '2.80'),
(9, 10, '2.30'),
(10, 10, '3.00'),
(11, 10, '2.90'),
(12, 10, '5.30'),
(13, 10, '10.00'),
(14, 10, '2.50'),
(15, 10, '5.60'),
(16, 10, '3.60'),
(17, 10, '7.40'),
(1, 9, '1.90'),
(2, 9, '16.40'),
(3, 9, '2.40'),
(4, 9, '22.60'),
(5, 9, '12.10'),
(6, 9, '182.50'),
(7, 9, '40.40'),
(8, 9, '11.00'),
(9, 9, '7.70'),
(10, 9, '10.90'),
(11, 9, '7.10'),
(12, 9, '16.70'),
(13, 9, '37.70'),
(14, 9, '7.00'),
(15, 9, '16.10'),
(16, 9, '11.20'),
(17, 9, '16.70'),
(1, 7, '5.00'),
(2, 7, '12.20'),
(3, 7, '3.60'),
(4, 7, '33.70'),
(5, 7, '28.20'),
(6, 7, '368.10'),
(7, 7, '73.70'),
(8, 7, '21.80'),
(9, 7, '22.30'),
(10, 7, '27.30'),
(11, 7, '20.00'),
(12, 7, '36.00'),
(13, 7, '70.90'),
(14, 7, '19.00'),
(15, 7, '32.90'),
(16, 7, '17.00'),
(17, 7, '27.10'),
(1, 8, '4.00'),
(2, 8, '10.40'),
(3, 8, '3.60'),
(4, 8, '25.60'),
(5, 8, '29.60'),
(6, 8, '281.50'),
(7, 8, '56.40'),
(8, 8, '17.20'),
(9, 8, '14.70'),
(10, 8, '17.70'),
(11, 8, '19.90'),
(12, 8, '27.90'),
(13, 8, '51.70'),
(14, 8, '11.70'),
(15, 8, '23.70'),
(16, 8, '15.90'),
(17, 8, '24.70'),
(1, 2, '58.00'),
(2, 2, '32.30'),
(3, 2, '29.10'),
(4, 2, '260.40'),
(5, 2, '479.40'),
(6, 2, '3.00'),
(7, 2, '649.70'),
(8, 2, '187.10'),
(9, 2, '219.00'),
(10, 2, '303.60'),
(11, 2, '161.90'),
(12, 2, '280.40'),
(13, 2, '562.20'),
(14, 2, '182.10'),
(15, 2, '283.70'),
(16, 2, '159.50'),
(17, 2, '228.60'),
(1, 1, '81.30'),
(2, 1, '33.00'),
(3, 1, '51.60'),
(4, 1, '476.00'),
(5, 1, '741.40'),
(6, 1, '5.00'),
(7, 1, '1.00'),
(8, 1, '312.30'),
(9, 1, '523.40'),
(10, 1, '570.40'),
(11, 1, '347.00'),
(12, 1, '513.30'),
(13, 1, '813.90'),
(14, 1, '316.90'),
(15, 1, '441.30'),
(16, 1, '271.60'),
(17, 1, '354.20'),
(1, 5, '23.40'),
(2, 5, '6.50'),
(3, 5, '7.70'),
(4, 5, '45.70'),
(5, 5, '65.60'),
(6, 5, '486.00'),
(7, 5, '95.00'),
(8, 5, '38.10'),
(9, 5, '34.20'),
(10, 5, '22.80'),
(11, 5, '16.60'),
(12, 5, '51.60'),
(13, 5, '101.90'),
(14, 5, '22.40'),
(15, 5, '40.10'),
(16, 5, '29.20'),
(17, 5, '34.20'),
(1, 6, '41.70'),
(2, 6, '27.70'),
(3, 6, '6.40'),
(4, 6, '56.30'),
(5, 6, '26.50'),
(6, 6, '407.90'),
(7, 6, '81.50'),
(8, 6, '28.00'),
(9, 6, '30.90'),
(10, 6, '24.90'),
(11, 6, '14.60'),
(12, 6, '44.80'),
(13, 6, '74.10'),
(14, 6, '16.50'),
(15, 6, '36.40'),
(16, 6, '24.90'),
(17, 6, '31.20'),
(1, 4, '63.80'),
(2, 4, '171.90'),
(3, 4, '19.30'),
(4, 4, '261.90'),
(5, 4, '149.60'),
(6, 4, '1.00'),
(7, 4, '311.60'),
(8, 4, '146.80'),
(9, 4, '101.40'),
(10, 4, '178.70'),
(11, 4, '81.80'),
(12, 4, '126.60'),
(13, 4, '255.40'),
(14, 4, '74.00'),
(15, 4, '156.90'),
(16, 4, '127.50'),
(17, 4, '86.80'),
(1, 3, '21.60'),
(2, 3, '54.60'),
(3, 3, '16.40'),
(4, 3, '202.00'),
(5, 3, '170.70'),
(6, 3, '1.00'),
(7, 3, '349.60'),
(8, 3, '134.80'),
(9, 3, '133.40'),
(10, 3, '188.90'),
(11, 3, '85.10'),
(12, 3, '162.10'),
(13, 3, '275.60'),
(14, 3, '110.30'),
(15, 3, '181.80'),
(16, 3, '110.30'),
(17, 3, '93.30');

-- --------------------------------------------------------

--
-- Table structure for table `weeklywages`
--

CREATE TABLE IF NOT EXISTS `weeklywages` (
  `sector_id` int(3) NOT NULL,
  `wages` text NOT NULL,
  KEY `sector_id` (`sector_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `weeklywages`:
--   `sector_id`
--       `sector` -> `sector_id`
--

--
-- Dumping data for table `weeklywages`
--

INSERT INTO `weeklywages` (`sector_id`, `wages`) VALUES
(1, '1,047.07'),
(2, '1,879.33'),
(3, '1,652.08'),
(4, '1,187.73'),
(5, '1,019.80'),
(7, '1,077.84'),
(7, '527.72'),
(8, '970.46'),
(14, '1,136.44'),
(9, '1,112.93'),
(9, '868.32'),
(10, '1,274.06'),
(12, '988.14'),
(13, '833.51'),
(14, '562.7'),
(15, '362.38'),
(17, '1,173.09'),
(16, '751.61');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `province` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `population`
--
ALTER TABLE `population`
  ADD CONSTRAINT `population_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `province` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `totalemployed`
--
ALTER TABLE `totalemployed`
  ADD CONSTRAINT `totalemployed_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `province` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `totalemployed_ibfk_1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`sector_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weeklywages`
--
ALTER TABLE `weeklywages`
  ADD CONSTRAINT `weeklywages_ibfk_1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`sector_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
