-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 02:07 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shippingboard`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `type`, `description`) VALUES
(1, 'day1', '', 'color', 'Monday'),
(2, 'day2', 'rgba(86, 150, 206, 0.64)', 'color', 'Tuesday'),
(3, 'day3', 'rgba(225, 99, 194, 0.46)', 'color', 'Wednesday'),
(4, 'day4', 'rgba(242, 141, 105, 0.44)', 'color', 'Thursday'),
(5, 'day5', 'rgba(246, 236, 129, 0.64)', 'color', 'Friday'),
(6, 'day6', '#ffffff', 'color', 'Saturday'),
(7, 'day7', '#ffffff', 'color', 'Sunday'),
(10, 'spas-border-color', 'rgba(0, 0, 0, 0.19)', 'color', 'Spas Outline Color'),
(11, 'swim-spas-border-color', 'rgba(0, 0, 0, 0.19)', 'color', 'Swim Spas Outline Color'),
(12, 'spas-color', 'rgba(5, 6, 6, 0.34)', 'color', 'Spas Text Color'),
(13, 'swim-spas-color', 'rgba(5, 6, 6, 0.34)', 'color', 'Swim Spas Text Color'),
(14, 'line-color', 'rgba(0, 0, 0, 0.71)', 'color', 'Table Border Line'),
(15, 'border-color', 'rgba(108, 35, 35, 0.63)', 'color', 'Borders Color'),
(18, 'heading-weight', 'bold', 'weight', 'Heading Weight'),
(19, 'heading', 'rgba(87, 71, 71, 0.51)', 'color', 'Heading Color'),
(20, 'default-top-row-weight', 'bold', 'weight', 'Default Top Row Weight'),
(22, 'default-border-thinkness', '2', 'size', 'Default Border Thinkness'),
(23, 'last_spas', '928', 'size', 'Last years total spas for this month  '),
(24, 'last_swimspas', '119', 'size', 'Last years total swim spas for this month  '),
(25, 'mtd_spas', '922', 'size', 'MTD Spas'),
(26, 'mtd_swim_spas', '128', 'size', 'MTD Swim Spas');

-- --------------------------------------------------------

--
-- Table structure for table `hot_tubs_to_trailer_loads`
--

CREATE TABLE IF NOT EXISTS `hot_tubs_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `hot_tub_model_id` int(11) unsigned NOT NULL,
  `serial_number` text,
  PRIMARY KEY (`index_number`),
  KEY `fk_trailer_load_id` (`trailer_load_id`),
  KEY `fk_hot_tub_model_id` (`hot_tub_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `hot_tubs_to_trailer_loads`
--

INSERT INTO `hot_tubs_to_trailer_loads` (`index_number`, `trailer_load_id`, `hot_tub_model_id`, `serial_number`) VALUES
(51, 2710, 11, ''),
(52, 2710, 11, ''),
(53, 2710, 11, ''),
(54, 2710, 11, ''),
(55, 2710, 11, ''),
(56, 2710, 11, ''),
(57, 2710, 11, ''),
(58, 2710, 11, ''),
(59, 2710, 11, ''),
(60, 2710, 11, ''),
(61, 2710, 11, ''),
(62, 2710, 10, ''),
(63, 2711, 13, ''),
(64, 2711, 13, ''),
(65, 2711, 14, ''),
(66, 2711, 14, ''),
(80, 2714, 13, ''),
(81, 2714, 13, ''),
(82, 2714, 13, ''),
(83, 2714, 13, ''),
(84, 2714, 13, ''),
(85, 2714, 11, ''),
(86, 2714, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `hot_tub_models`
--

CREATE TABLE IF NOT EXISTS `hot_tub_models` (
  `hot_tub_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hot_tub_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`hot_tub_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
(10, 'HL 7'),
(11, 'Fit'),
(12, 'MPL 900'),
(13, 'CLS 1055'),
(14, 'LSX 1000STS');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480614371),
('m150829_120417_new_column', 1480614374);

-- --------------------------------------------------------

--
-- Table structure for table `swim_spas_to_trailer_loads`
--

CREATE TABLE IF NOT EXISTS `swim_spas_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `swim_spa_model_id` int(11) unsigned NOT NULL,
  `serial_number` text,
  PRIMARY KEY (`index_number`),
  KEY `fk_swim_spa_model_id` (`swim_spa_model_id`),
  KEY `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` (`trailer_load_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `swim_spas_to_trailer_loads`
--

INSERT INTO `swim_spas_to_trailer_loads` (`index_number`, `trailer_load_id`, `swim_spa_model_id`, `serial_number`) VALUES
(6, 2710, 14, ''),
(7, 2710, 14, ''),
(8, 2710, 11, ''),
(13, 2714, 14, ''),
(14, 2714, 14, ''),
(15, 2714, 14, ''),
(16, 2714, 9, 'Note:  this is a note'),
(17, 2714, 9, 'Note:  this is a note'),
(18, 2714, 9, 'Note:  this is a note');

-- --------------------------------------------------------

--
-- Table structure for table `swim_spa_models`
--

CREATE TABLE IF NOT EXISTS `swim_spa_models` (
  `swim_spa_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `swim_spa_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`swim_spa_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `swim_spa_models`
--

INSERT INTO `swim_spa_models` (`swim_spa_model_id`, `swim_spa_model_name`) VALUES
(1, 'Trainer 19 D'),
(2, 'Trainer 19'),
(3, 'Trainer 18'),
(4, 'Trainer 15'),
(5, 'Trainer 15 D'),
(6, 'Trainer 12'),
(7, 'Therapool D'),
(8, 'Therapool SE'),
(9, 'Momentum D'),
(10, 'Momentum'),
(11, 'Signature S'),
(12, 'Force D'),
(13, 'Force'),
(14, 'Impact'),
(15, 'Trainer 14'),
(18, 'Trainer 17'),
(19, 'Signature'),
(20, '-');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2715 ;

--
-- Dumping data for table `trailer_load`
--

INSERT INTO `trailer_load` (`trailer_load_id`, `shipping_date`, `completed`, `processed`, `dealer`, `number_of_spas`, `number_of_swimspas`, `thinkness`, `weight`, `shipper`, `trailer_type`, `status`) VALUES
(2710, '1481760000', 1, 1, '', NULL, NULL, NULL, 'bold', '', '', '1'),
(2711, '1481760000', 0, 0, 'Fort Wayne Spas', NULL, NULL, NULL, 'bold', '', '', '1'),
(2714, '1480550400', 0, 0, '', 2, 5, NULL, 'bold', '', '', '1');

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
