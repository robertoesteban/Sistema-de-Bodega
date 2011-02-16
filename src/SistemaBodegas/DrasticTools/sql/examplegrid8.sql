-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2009 at 09:57 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `drasticdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `examplegrid8`
--

DROP TABLE IF EXISTS `examplegrid8`;
CREATE TABLE IF NOT EXISTS `examplegrid8` (
  `id` int(11) NOT NULL auto_increment,
  `color` varchar(20) collate utf8_unicode_ci NOT NULL default 'new color',
  `value` varchar(20) collate utf8_unicode_ci NOT NULL default '#FFFFFF',
  `beautiful` tinyint(20) NOT NULL default '1',
  `Comment` text collate utf8_unicode_ci NOT NULL,
  `image` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `examplegrid8`
--

INSERT INTO `examplegrid8` (`id`, `color`, `value`, `beautiful`, `Comment`, `image`) VALUES
(1, 'blue', '#1938FF', 1, 'Toby', 'img/demo1.gif'),
(2, 'red', '#FF1C2B', 1, 'Eric', 'img/DDsmall.png'),
(3, 'purple', '#FF1988', 0, 'John', 'img/DDpowered2.gif'),
(4, 'white', '#FFFFFF', 1, 'This is a multi-line\ncomment\n!!!!!!!', 'img/demo1.gif'),
(5, 'blue', '#FFFFFF', 1, 'nice color\nindeed!', 'img/demo2.gif'),
(6, 'blue', '#FFFFFF', 1, 'yes', 'img/demo3.gif');
