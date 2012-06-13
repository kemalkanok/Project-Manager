-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Haz 2012, 08:20:42
-- Sunucu sürümü: 5.5.16
-- PHP Sürümü: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Veritabanı: `projectmanager`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` text COLLATE utf8_turkish_ci NOT NULL,
  `starttime` date NOT NULL,
  `endtime` date NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `starttime`, `endtime`, `url`) VALUES(1, 'Blog With Xml', 'falan filan', '2012-06-12', '2012-06-30', 'http://localhost:81/projeler/blog-with-xml/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `project_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `state`, `project_id`) VALUES(1, 'start', 0, 1);
INSERT INTO `tasks` (`id`, `task`, `state`, `project_id`) VALUES(3, 'awefawefsfafdssfdadsf', 1, 1);
