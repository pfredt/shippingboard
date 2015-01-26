-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.1.71-community-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица spas.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text,
  `value` text,
  `type` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.config: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `key`, `value`, `type`, `description`) VALUES
	(1, 'day1', '#fdf39a', 'color', 'Day1'),
	(2, 'day2', 'rgba(218, 139, 163, 0.47)', 'color', 'Day2'),
	(3, 'day3', 'rgba(218, 167, 139, 0.6)', 'color', 'Day3'),
	(4, 'day4', 'rgba(139, 202, 218, 0.2)', 'color', 'Day4'),
	(5, 'day5', '#8bdac2', 'color', 'Day5'),
	(6, 'day6', '#8b93da', 'color', 'Day6'),
	(7, 'day7', '#8fda8b', 'color', 'Day7'),
	(8, 'heading-weight', 'bold', 'weight', 'Heading Weight'),
	(9, 'heading', '#e82c65', 'color', 'Heading Color'),
	(10, 'spas-border-color', '#000000', 'color', 'Spas Outline Color'),
	(11, 'swim-spas-border-color', '#000000', 'color', 'Swim Spas Outline Color'),
	(12, 'spas-color', '#ffffff', 'color', 'Spas Text Color'),
	(13, 'swim-spas-color', '#ffffff', 'color', 'Swim Spas Text Color'),
	(14, 'line-color', '#609f13', 'color', 'Table Border Line'),
	(15, 'border-color', 'rgba(255, 0, 0, 0.63)', 'color', 'Borders Color');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;


-- Дамп структуры для таблица spas.hot_tubs_to_trailer_loads
CREATE TABLE IF NOT EXISTS `hot_tubs_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `hot_tub_model_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`index_number`),
  KEY `fk_trailer_load_id` (`trailer_load_id`),
  KEY `fk_hot_tub_model_id` (`hot_tub_model_id`),
  CONSTRAINT `fk_hot_tub_model_id` FOREIGN KEY (`hot_tub_model_id`) REFERENCES `hot_tub_models` (`hot_tub_model_id`),
  CONSTRAINT `fk_trailer_load_id` FOREIGN KEY (`trailer_load_id`) REFERENCES `trailer_load` (`trailer_load_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.hot_tubs_to_trailer_loads: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `hot_tubs_to_trailer_loads` DISABLE KEYS */;
INSERT INTO `hot_tubs_to_trailer_loads` (`index_number`, `trailer_load_id`, `hot_tub_model_id`) VALUES
	(1, 13, 2),
	(2, 13, 1),
	(3, 13, 1);
/*!40000 ALTER TABLE `hot_tubs_to_trailer_loads` ENABLE KEYS */;


-- Дамп структуры для таблица spas.hot_tub_models
CREATE TABLE IF NOT EXISTS `hot_tub_models` (
  `hot_tub_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hot_tub_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`hot_tub_model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.hot_tub_models: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `hot_tub_models` DISABLE KEYS */;
INSERT INTO `hot_tub_models` (`hot_tub_model_id`, `hot_tub_model_name`) VALUES
	(1, 'test'),
	(2, 'test once again'),
	(3, 'one more test');
/*!40000 ALTER TABLE `hot_tub_models` ENABLE KEYS */;


-- Дамп структуры для таблица spas.swim_spas_to_trailer_loads
CREATE TABLE IF NOT EXISTS `swim_spas_to_trailer_loads` (
  `index_number` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trailer_load_id` int(11) unsigned NOT NULL,
  `swim_spa_model_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`index_number`),
  KEY `fk_swim_spa_model_id` (`swim_spa_model_id`),
  KEY `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` (`trailer_load_id`),
  CONSTRAINT `fk_swim_spa_model_id` FOREIGN KEY (`swim_spa_model_id`) REFERENCES `swim_spa_models` (`swim_spa_model_id`),
  CONSTRAINT `trailer_load_trailer_load_to_swim_spas_to_trailer_loads` FOREIGN KEY (`trailer_load_id`) REFERENCES `trailer_load` (`trailer_load_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.swim_spas_to_trailer_loads: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `swim_spas_to_trailer_loads` DISABLE KEYS */;
INSERT INTO `swim_spas_to_trailer_loads` (`index_number`, `trailer_load_id`, `swim_spa_model_id`) VALUES
	(1, 13, 7),
	(2, 13, 11);
/*!40000 ALTER TABLE `swim_spas_to_trailer_loads` ENABLE KEYS */;


-- Дамп структуры для таблица spas.swim_spa_models
CREATE TABLE IF NOT EXISTS `swim_spa_models` (
  `swim_spa_model_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `swim_spa_model_name` varchar(500) NOT NULL,
  PRIMARY KEY (`swim_spa_model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.swim_spa_models: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `swim_spa_models` DISABLE KEYS */;
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
	(14, 'MP Impact Swim Spa');
/*!40000 ALTER TABLE `swim_spa_models` ENABLE KEYS */;


-- Дамп структуры для таблица spas.trailer_load
CREATE TABLE IF NOT EXISTS `trailer_load` (
  `trailer_load_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_date` varchar(255) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `processed` tinyint(1) DEFAULT NULL,
  `dealer` varchar(255) DEFAULT NULL,
  `number_of_spas` int(11) DEFAULT NULL,
  `number_of_swimspas` int(11) DEFAULT NULL,
  `shipper` varchar(55) DEFAULT NULL,
  `trailer_type` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`trailer_load_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.trailer_load: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `trailer_load` DISABLE KEYS */;
INSERT INTO `trailer_load` (`trailer_load_id`, `shipping_date`, `completed`, `processed`, `dealer`, `number_of_spas`, `number_of_swimspas`, `shipper`, `trailer_type`, `status`) VALUES
	(4, '1421611200', 0, 1, '', 4, NULL, '', '', '1'),
	(5, '1421697600', 0, 0, '', NULL, 4, '', '', '1'),
	(6, '1421784000', 0, 0, '', 2, 2, '', '', '1'),
	(7, '1421870400', 0, 0, '', 1, 2, '', '', '1'),
	(8, '1421956800', 0, 0, '', 2, 1, '', '', '1'),
	(9, '1422043200', 0, NULL, '', NULL, NULL, '', '', ''),
	(10, '1422129600', 0, NULL, '', NULL, NULL, '', '', ''),
	(11, '1421524800', 0, 0, '', 2, 1, '', '', '1'),
	(12, '1421352000', 0, 0, '', NULL, NULL, '', '', '1'),
	(13, '1422302400', 0, 0, '', NULL, NULL, '', '', '1'),
	(14, '1422388800', 0, 0, '', NULL, NULL, '', '', '1'),
	(15, '1422475200', 0, 0, '', NULL, NULL, '', '', '1');
/*!40000 ALTER TABLE `trailer_load` ENABLE KEYS */;


-- Дамп структуры для таблица spas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` char(64) NOT NULL COMMENT 'Salted SHA-256',
  `authKey` text,
  `accessToken` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы spas.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `authKey`, `accessToken`) VALUES
	(1, 'admin', '1111', 'authKey', 'accessToken');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
