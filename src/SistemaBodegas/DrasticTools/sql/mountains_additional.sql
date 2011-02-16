-- This is a copy of the mountains table, which is used in ExampleGrid10.php for joining with the original mountain table:

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP TABLE IF EXISTS `mountains_additional`;
CREATE TABLE IF NOT EXISTS `mountains_additional` (
  `id2` int(11) NOT NULL auto_increment,
  `Name2` char(52) collate utf8_unicode_ci NOT NULL,
  `Comment2` char(60) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id2`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

INSERT INTO `mountains_additional` (`id2`, `Name2`, `Comment2`) VALUES
(1, 'Mont Blanc', 'the highest!!!'),
(2, 'Grossglockner', NULL),
(3, 'Finsteraarhorn', NULL),
(4, 'Wildspitze', 'close'),
(5, 'Piz Bernina', NULL),
(6, 'Hochkönig', NULL),
(7, 'Dufourspitze', NULL),
(8, 'Hoher Dachstein', NULL),
(9, 'Marmolada', NULL),
(10, 'Monte Viso', NULL),
(11, 'Triglav', NULL),
(46, 'Barre des Ecrins', NULL),
(47, 'Santis', NULL),
(48, 'Ortler', 'almost'),
(49, 'Monte Baldo', NULL),
(50, 'Gran Paradiso', 'nice,...'),
(51, 'Pizzo di Coca', NULL),
(52, 'Cima Dodici', NULL),
(53, 'Dents du Midi', NULL),
(54, 'Chamechaude', NULL),
(55, 'Zugspitze', NULL),
(56, 'Monte Antelao', NULL),
(57, 'Pointe Arcalod', NULL),
(58, 'Grintovec', NULL);