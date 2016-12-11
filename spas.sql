-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2015 at 03:18 AM
-- Server version: 5.5.38-MariaDB
-- PHP Version: 5.5.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spas`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text,
  `value` text,
  `type` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `type`, `description`) VALUES
(1, 'day1', 'rgba(90, 293, 146, 0.59)', 'color', 'Monday'),
(2, 'day2', 'rgba(86, 150, 206, .64)', 'color', 'Tuesday'),
(3, 'day3', 'rgba(225, 99, 194, .54)', 'color', 'Wednesday'),
(4, 'day4', 'rgba(242, 141, 105, 0.54)', 'color', 'Thursday'),
(5, 'day5', 'rgba(246, 236, 129, 0.64)', 'color', 'Friday'),
(6, 'day6', '#ffffff', 'color', 'Saturday'),
(7, 'day7', '#ffffff', 'color', 'Sunday'),
(10, 'spas-border-color', '#000000', 'color', 'Spas Outline Color'),
(11, 'swim-spas-border-color', '#000000', 'color', 'Swim Spas Outline Color'),
(12, 'spas-color', '#a14b26', 'color', 'Spas Text Color'),
(13, 'swim-spas-color', '#121d80', 'color', 'Swim Spas Text Color'),
(14, 'line-color', '#c1c8b8', 'color', 'Table Border Line'),
(15, 'border-color', 'rgba(108, 35, 35, 0.63)', 'color', 'Borders Color'),
(18, 'heading-weight', 'bold', 'weight', 'Heading Weight'),
(19, 'heading', 'rgba(87, 71, 71, 0.51)', 'color', 'Heading Color'),
(20, 'default-top-row-weight', 'regular', 'weight', 'Default Top Row Weight'),
(22, 'default-border-thinkness', '3', 'size', 'Default Border Thinkness');

-- --------------------------------------------------------

--
-- Table structure for table `hot_tubs_to_trailer_loads`
--

CREATE TABLE IF NOT EXISTS `hot_tubs_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `hot_tub_model_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`index_number`),
  KEY `fk_trailer_load_id` (`trailer_load_id`),
  KEY `fk_hot_tub_model_id` (`hot_tub_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `hot_tubs_to_trailer_loads`
--

INSERT INTO `hot_tubs_to_trailer_loads` (`index_number`, `trailer_load_id`, `hot_tub_model_id`) VALUES
(1, 13, 2),
(2, 13, 1),
(3, 13, 1),
(4, 19, 7),
(5, 19, 3),
(6, 19, 3),
(7, 20, 3),
(8, 21, 3),
(11, 23, 4),
(14, 22, 2),
(15, 22, 3),
(16, 24, 2),
(17, 25, 4),
(19, 28, 2),
(25, 29, 2),
(26, 29, 2),
(27, 27, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hot_tub_models`
--

CREATE TABLE IF NOT EXISTS `hot_tub_models` (
  `hot_tub_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hot_tub_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`hot_tub_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hot_tub_models`
--

INSERT INTO `hot_tub_models` (`hot_tub_model_id`, `hot_tub_model_name`) VALUES
(1, ' _'),
(2, 'TS 6.2'),
(3, 'TS 67.25'),
(4, 'TS 7.2'),
(5, 'TS 7.25'),
(6, 'TS 8.2'),
(7, 'TS 8.25'),
(8, 'TS 8.3'),
(9, 'TS 8.35'),
(10, 'HL 7');

-- --------------------------------------------------------

--
-- Table structure for table `swim_spas_to_trailer_loads`
--

CREATE TABLE IF NOT EXISTS `swim_spas_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `swim_spa_model_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`index_number`),
  KEY `fk_swim_spa_model_id` (`swim_spa_model_id`),
  KEY `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` (`trailer_load_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `swim_spas_to_trailer_loads`
--

INSERT INTO `swim_spas_to_trailer_loads` (`index_number`, `trailer_load_id`, `swim_spa_model_id`) VALUES
(1, 13, 7),
(2, 13, 11),
(3, 19, 13),
(4, 19, 12),
(5, 20, 13),
(6, 21, 13),
(8, 23, 12),
(10, 22, 14),
(11, 24, 9),
(12, 25, 4),
(14, 29, 9);

-- --------------------------------------------------------

--
-- Table structure for table `swim_spa_models`
--

CREATE TABLE IF NOT EXISTS `swim_spa_models` (
  `swim_spa_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `swim_spa_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`swim_spa_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `swim_spa_models`
--

INSERT INTO `swim_spa_models` (`swim_spa_model_id`, `swim_spa_model_name`) VALUES
(1, 'Trainer 19 Deep'),
(2, 'Trainer 19'),
(3, 'Trainer 18'),
(4, 'Trainer 15'),
(5, 'Trainer 15 Deep'),
(6, 'Trainer 12'),
(7, 'Therapool D'),
(8, 'Therapool SE'),
(9, 'MP Momentum Deep Swim Spa'),
(10, 'MP Momentum Swim Spa'),
(11, 'MP Signature S Swim Spa'),
(12, 'MP Force Deep Swim Spa'),
(13, 'MP Force Swim Spa'),
(14, 'MP Impact Swim Spa'),
(15, ' _');

-- --------------------------------------------------------

--
-- Table structure for table `trailer_load`
--

CREATE TABLE IF NOT EXISTS `trailer_load` (
  `trailer_load_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_date` varchar(255) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `processed` tinyint(1) DEFAULT NULL,
  `dealer` varchar(255) DEFAULT NULL,
  `number_of_spas` int(11) DEFAULT NULL,
  `number_of_swimspas` int(11) DEFAULT NULL,
  `thinkness` int(11) DEFAULT NULL,
  `weight` text,
  `shipper` varchar(55) DEFAULT NULL,
  `trailer_type` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`trailer_load_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `trailer_load`
--

INSERT INTO `trailer_load` (`trailer_load_id`, `shipping_date`, `completed`, `processed`, `dealer`, `number_of_spas`, `number_of_swimspas`, `thinkness`, `weight`, `shipper`, `trailer_type`, `status`) VALUES
(4, '1421611200', 0, 1, '', 4, NULL, 1, 'regular', '', '', '1'),
(5, '1421697600', 0, 0, '', NULL, 4, 1, 'regular', '', '', '1'),
(6, '1421784000', 0, 0, '', 2, 2, 1, 'regular', '', '', '1'),
(7, '1421870400', 0, 0, '', 1, 2, 1, 'regular', '', '', '1'),
(8, '1421956800', 0, 0, '', 2, 1, 1, 'regular', '', '', '1'),
(9, '1422043200', 0, NULL, '', NULL, NULL, 1, 'regular', '', '', ''),
(10, '1422129600', 0, NULL, '', NULL, NULL, 1, 'regular', '', '', ''),
(11, '1421524800', 0, 0, '', 2, 1, 1, 'regular', '', '', '1'),
(12, '1421352000', 0, 0, '', NULL, NULL, 1, 'regular', '', '', '1'),
(13, '1422302400', 0, 0, '', NULL, NULL, 1, 'regular', '', '', '1'),
(14, '1422388800', 0, 0, '', NULL, NULL, 1, 'regular', '', '', '1'),
(15, '1422475200', 0, 0, '', NULL, NULL, 1, 'regular', '', '', '1'),
(19, '1424217600', 0, 1, 'American Spas', 2, 1, 3, 'bold', 'American Shipping', 'Some Trailer', '1'),
(20, '1424304000', 0, 1, 'Happy Spas and Bubbles', 1, 1, 3, 'bold', 'Obama Shipping', 'Biden ', '1'),
(21, '1424304000', 0, 1, '5 guys and a spa', 2, 2, 3, 'bold', 'American Shipping', 'Flat Bed', '1'),
(22, '1424390400', 0, 1, 'Smart Guys', 2, 2, 2, 'normal', 'Smart Guys Trucking', 'Blue Boat', '1'),
(23, '1424649600', 0, 1, 'American Shipping ', 2, 2, 2, 'bold', 'American Spa Brothers', 'Little Thing', '1'),
(24, '1424736000', 0, 1, 'Nacho Dealer', 3, 2, 2, 'bold', 'Nacho Shipping', 'Little Box', '1'),
(25, '1424822400', 0, 1, 'Spas N Roses', 3, 2, NULL, 'normal', 'Axel', 'Sweet Spa Of Mine', '2'),
(26, '1424995200', 0, 1, '', 1, 1, 2, 'bold', 'Lazy Shipping', 'Long Box', '1'),
(27, '1424995200', 0, 1, 'American Spa Store', NULL, NULL, 75, 'bold', 'Lazy Shipping', 'Long Box', '1'),
(28, '1424908800', 0, 1, '', 2, 2, 2, 'bold', 'american', '', '1'),
(29, '1424908800', 0, 1, '', 2, 2, 9, 'bold', 'american', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` char(64) NOT NULL COMMENT 'Salted SHA-256',
  `authKey` text,
  `accessToken` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `authKey`, `accessToken`) VALUES
(1, 'admin', '1111', 'authKey', 'accessToken');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hot_tubs_to_trailer_loads`
--
ALTER TABLE `hot_tubs_to_trailer_loads`
  ADD CONSTRAINT `fk_hot_tub_model_id` FOREIGN KEY (`hot_tub_model_id`) REFERENCES `hot_tub_models` (`hot_tub_model_id`),
  ADD CONSTRAINT `fk_trailer_load_id` FOREIGN KEY (`trailer_load_id`) REFERENCES `trailer_load` (`trailer_load_id`);

--
-- Constraints for table `swim_spas_to_trailer_loads`
--
ALTER TABLE `swim_spas_to_trailer_loads`
  ADD CONSTRAINT `fk_swim_spa_model_id` FOREIGN KEY (`swim_spa_model_id`) REFERENCES `swim_spa_models` (`swim_spa_model_id`),
  ADD CONSTRAINT `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` FOREIGN KEY (`trailer_load_id`) REFERENCES `trailer_load` (`trailer_load_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;