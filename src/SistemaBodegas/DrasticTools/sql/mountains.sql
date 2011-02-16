-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 22, 2007 at 10:45 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `drasticdata`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `mountains`
-- 

DROP TABLE IF EXISTS `mountains`;
CREATE TABLE `mountains` (
  `id` int(11) NOT NULL auto_increment,
  `Name` char(52) collate utf8_unicode_ci NOT NULL,
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') collate utf8_unicode_ci NOT NULL default 'Asia',
  `Height` int(11) NOT NULL default '0',
  `Coords` char(30) collate utf8_unicode_ci default '46.537222,8.126111',
  `Comment` char(60) collate utf8_unicode_ci default NULL,
  `Climbed` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

-- 
-- Dumping data for table `mountains`
-- 

INSERT INTO `mountains` (`id`, `Name`, `Continent`, `Height`, `Coords`, `Comment`, `Climbed`) VALUES 
(1, 'Mont Blanc', 'Europe', 4810, '45.840401,6.860447', 'the highest!!!', 0),
(2, 'Grossglockner', 'Europe', 3798, '47.086488,12.675476', NULL, 0),
(3, 'Finsteraarhorn', 'Europe', 4274, '46.537222,8.126111', NULL, 0),
(4, 'Wildspitze', 'Europe', 3768, '46.896944,10.875278', 'close', 1),
(5, 'Piz Bernina', 'Europe', 4049, '46.383889,9.909167', NULL, 0),
(6, 'Hochkönig', 'Europe', 2941, '47.420806,13.063167', NULL, 0),
(7, 'Dufourspitze', 'Europe', 4634, '45.936667,7.866944', NULL, 1),
(8, 'Hoher Dachstein', 'Europe', 2995, '47.475556,13.606389', NULL, 0),
(9, 'Marmolada', 'Europe', 3343, '46.436944,11.865278', NULL, 0),
(10, 'Monte Viso', 'Europe', 3841, '44.659679,7.110128', NULL, 0),
(11, 'Triglav', 'Europe', 2864, '46.366667,13.816667', NULL, 0),
(46, 'Barre des Ecrins', 'Europe', 4102, '44.916389,6.333056', NULL, 0),
(47, 'Santis', 'Europe', 2503, '47.249167,9.343333', NULL, 0),
(48, 'Ortler', 'Europe', 3905, '46.510556,10.541944', 'almost', 1),
(49, 'Monte Baldo', 'Europe', 2218, '45.733333,10.833333', NULL, 0),
(50, 'Gran Paradiso', 'Europe', 4061, '45.552525,7.250977', 'nice,...', 1),
(51, 'Pizzo di Coca', 'Europe', 3050, '46.088472,10.239258', NULL, 0),
(52, 'Cima Dodici', 'Europe', 2336, '46.573967,12.32666', NULL, 0),
(53, 'Dents du Midi', 'Europe', 3257, '46.1625,6.923611', NULL, 0),
(54, 'Chamechaude', 'Europe', 2082, '46.164614,6.679688', NULL, 0),
(55, 'Zugspitze', 'Europe', 2962, '47.416667,10.983333', NULL, 0),
(56, 'Monte Antelao', 'Europe', 3264, '46.466667,12.283333', NULL, 0),
(57, 'Pointe Arcalod', 'Europe', 2217, '44.621754,6.459961', NULL, 0),
(58, 'Grintovec', 'Europe', 2558, '46.357222,14.535556', NULL, 0);
