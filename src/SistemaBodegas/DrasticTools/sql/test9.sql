-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2008 at 10:17 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `drasticdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `test9`
--

DROP TABLE IF EXISTS `test9`;
CREATE TABLE IF NOT EXISTS `test9` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `email` varchar(30) collate utf8_unicode_ci NOT NULL,
  `www` varchar(30) collate utf8_unicode_ci NOT NULL,
  `present` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `test9`
--

INSERT INTO `test9` (`id`, `name`, `email`, `www`, `present`) VALUES
(1, 'John', 'john@example.com', 'www.example.com/john', 1),
(2, 'Jan', 'jan@example.com', 'www.example.com/jan', 0),
(3, 'Tom', 'tom@example.com', 'www.example.com/tom', 1),
(4, 'tony', 'tony@example.com', 'www.example.com/tony', 0);