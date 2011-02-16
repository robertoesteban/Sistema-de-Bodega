-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 22, 2007 at 10:43 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `drasticdata`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `country_map`
-- 

DROP TABLE IF EXISTS `country_map`;
CREATE TABLE `country_map` (
  `id` int(11) NOT NULL auto_increment,
  `Code` char(3) collate utf8_unicode_ci NOT NULL,
  `Name` char(52) collate utf8_unicode_ci NOT NULL,
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') collate utf8_unicode_ci NOT NULL default 'Asia',
  `SurfaceArea` float(10,2) NOT NULL default '0.00',
  `Population` int(11) NOT NULL default '0',
  `LocalName` char(45) collate utf8_unicode_ci NOT NULL,
  `Coords` char(30) collate utf8_unicode_ci NOT NULL default '43.733399,7.418518',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=273 ;

-- 
-- Dumping data for table `country_map`
-- 

INSERT INTO `country_map` (`id`, `Code`, `Name`, `Continent`, `SurfaceArea`, `Population`, `LocalName`, `Coords`) VALUES 
(1, 'AFG', 'Afghanistan', 'Asia', 652090.00, 22720000, 'Afganistan/Afqanestan', '31.802893,65.390625'),
(2, 'NLD', 'Netherlands', 'North America', 41526.00, 15864000, 'Nederland', '52.429222,5.800781'),
(3, 'ANT', 'Netherlands Antilles', 'North America', 800.00, 217000, 'Nederlandse Antillen', '12.136005,-68.933716'),
(4, 'ALB', 'Albania', 'Europe', 28748.00, 3401200, 'Shqipëria', '41.162114,19.863281'),
(5, 'DZA', 'Algeria', 'Africa', 2381741.00, 31471000, 'Al-ascgfjdy', '26.902477,2.636719'),
(6, 'ASM', 'American Samoa', 'Oceania', 199.00, 68000, 'Amerika Samoa', '42.163403,-26.71875'),
(7, 'AND', 'Andorra', 'North America', 468.00, 78000, 'Andorra', '13.923404,NaN'),
(9, 'AIA', 'Anguilla', 'Africa', 96.00, 8000, 'Anguilla', '3.074695,-1.098633'),
(10, 'ATG', 'Antigua and Barbuda', 'North America', 442.00, 68000, 'Antigua and Barbuda', '2.723583,-2.15332'),
(11, 'ARE', 'United Arab Emirates', 'Asia', 83600.00, 2441000, 'Al-Imarat al-´Arabiya al-Muttahida', '46.195042,-32.34375'),
(12, 'ARG', 'Argentina', 'South America', 2780400.00, 37032000, 'Argentina', '2.416276,-2.988281'),
(13, 'ARM', 'Armenia', 'Asia', 29800.00, 3520000, 'Hajastan', '2.591889,-5.625'),
(14, 'ABW', 'Aruba', 'North America', 193.00, 103000, 'Aruba', '2.591889,-4.526367'),
(15, 'AUS', 'Australia', 'Oceania', 7741220.00, 18886000, 'Australia', '2.108899,-4.921875'),
(16, 'AZE', 'Azerbaijan', 'Asia', 86600.00, 7734000, 'Azärbaycan', '0.527336,-3.383789'),
(17, 'BHS', 'Bahamas', 'North America', 13878.00, 307000, 'The Bahamas', '0.219726,-4.262695'),
(18, 'BHR', 'Bahrain', 'Asia', 694.00, 617000, 'Al-Bahrayn', '0.747049,-5.712891'),
(19, 'BGD', 'Bangladesh', 'Asia', 143998.00, 129155000, 'Bangladesh', '0.263671,-6.108398'),
(20, 'BRB', 'Barbados', 'North America', 430.00, 270000, 'Barbados', '-0.834931,-6.635742'),
(21, 'BEL', 'Belgium', 'Europe', 30518.00, 10239000, 'Belgie', '50.736455,4.438477'),
(22, 'BLZ', 'Belize', 'North America', 22696.00, 241000, 'Belize', '-1.142502,-5.053711'),
(23, 'BEN', 'Benin', 'Africa', 112622.00, 6097000, 'Bénin', '0,-1.450195'),
(24, 'BMU', 'Bermuda', 'North America', 53.00, 65000, 'Bermuda', '-3.074695,0.131836'),
(25, 'BTN', 'Bhutan', 'Asia', 47000.00, 2124000, 'Druk-Yul', '-3.995781,3.55957'),
(26, 'BOL', 'Bolivia', 'South America', 1098581.00, 8329000, 'Bolivia', '-3.601142,0.74707'),
(272, '', '', 'Asia', 0.00, 0, '', ''),
(28, 'BWA', 'Botswana', 'Africa', 581730.00, 1622000, 'Botswana', '2.767478,2.944336'),
(29, 'BRA', 'Brazil', 'South America', 8547403.00, 170115000, 'Brasil', '-2.108899,5.273438'),
(30, 'GBR', 'United Kingdom', 'Europe', 242900.00, 59623400, 'United Kingdom', '52.106505,-1.142578'),
(31, 'VGB', 'Virgin Islands, British', 'North America', 151.00, 21000, 'British Virgin Islands', '-4.171115,5.361328'),
(32, 'BRN', 'Brunei', 'Asia', 5765.00, 328000, 'Brunei Darussalam', '-3.469557,-2.329102'),
(33, 'BGR', 'Bulgaria', 'Europe', 110994.00, 8190900, 'Balgarija', '42.293564,24.960938'),
(34, 'BFA', 'Burkina Faso', 'Africa', 274000.00, 11937000, 'Burkina Faso', '3.557283,-4.21875'),
(35, 'BDI', 'Burundi', 'Africa', 27834.00, 6695000, 'Burundi/Uburundi', '3.162456,-6.196289'),
(36, 'CYM', 'Cayman Islands', 'North America', 264.00, 38000, 'Cayman Islands', '3.118576,-7.822266'),
(37, 'CHL', 'Chile', 'South America', 756626.00, 15211000, 'Chile', '2.767478,-9.008789'),
(38, 'COK', 'Cook Islands', 'Oceania', 236.00, 20000, 'The Cook Islands', '2.547988,-9.624023'),
(39, 'CRI', 'Costa Rica', 'North America', 51100.00, 4023000, 'Costa Rica', '1.054628,-11.425781'),
(40, 'DJI', 'Djibouti', 'Africa', 23200.00, 638000, 'Djibouti/Jibuti', '-0.087891,-10.327148'),
(41, 'DMA', 'Dominica', 'North America', 751.00, 71000, 'Dominica', '1.625758,-10.019531'),
(42, 'DOM', 'Dominican Republic', 'North America', 48511.00, 8495000, 'República Dominicana', '0.703107,-8.305664'),
(43, 'ECU', 'Ecuador', 'South America', 283561.00, 12646000, 'Ecuador', '2.943041,0.615234'),
(44, 'EGY', 'Egypt', 'Africa', 1001449.00, 68470000, 'Misr', '0.35156,2.900391'),
(45, 'SLV', 'El Salvador', 'North America', 21041.00, 6276000, 'El Salvador', '-0.747049,4.086914'),
(46, 'ERI', 'Eritrea', 'Africa', 117600.00, 3850000, 'Ertra', '-0.219726,1.010742'),
(47, 'ESP', 'Spain', 'Europe', 505992.00, 39441700, 'Espa?a', '39.909736,-3.339844'),
(48, 'ZAF', 'South Africa', 'Africa', 1221037.00, 40377000, 'South Africa', '-1.713612,0.922852'),
(49, 'ETH', 'Ethiopia', 'Africa', 1104300.00, 62565000, 'YeItyop´iya', '-1.537901,0.043945'),
(50, 'FLK', 'Falkland Islands', 'South America', 12173.00, 2000, 'Falkland Islands', '-1.142502,-0.878906'),
(51, 'FJI', 'Fiji Islands', 'Oceania', 18274.00, 817000, 'Fiji Islands', '-1.01069,-1.450195'),
(52, 'PHL', 'Philippines', 'Asia', 300000.00, 75967000, 'Pilipinas', '-1.977147,-4.042969'),
(53, 'FRO', 'Faroe Islands', 'Europe', 1399.00, 43000, 'Faroer Islands', '62.0936,-6.965332'),
(54, 'GAB', 'Gabon', 'Africa', 267668.00, 1226000, 'Le Gabon', '0,-4.658203'),
(55, 'GMB', 'Gambia', 'Africa', 11295.00, 1305000, 'The Gambia', '1.801461,-3.779297'),
(56, 'GEO', 'Georgia', 'Asia', 69700.00, 4968000, 'Sakartvelo', '1.801461,-2.329102'),
(57, 'GHA', 'Ghana', 'Africa', 238533.00, 20212000, 'Ghana', '0.263671,-2.373047'),
(58, 'GIB', 'Gibraltar', 'Europe', 6.00, 25000, 'Gibraltar', '36.125119,-5.346222'),
(59, 'GRD', 'Grenada', 'North America', 344.00, 94000, 'Grenada', '1.362176,0.966797'),
(60, 'GRL', 'Greenland', 'North America', 2166090.00, 56000, 'Kalaallit Nunaat/Gr?nland', '1.054628,4.702148'),
(61, 'GLP', 'Guadeloupe', 'North America', 1705.00, 456000, 'Guadeloupe', '0.703107,6.240234'),
(62, 'GUM', 'Guam', 'Oceania', 549.00, 168000, 'Guam', '1.362176,6.416016'),
(63, 'GTM', 'Guatemala', 'North America', 108889.00, 11385000, 'Guatemala', '1.977147,5.141602'),
(64, 'GIN', 'Guinea', 'Africa', 245857.00, 7430000, 'Guinée', '2.284551,4.438477'),
(65, 'GNB', 'Guinea-Bissau', 'Africa', 36125.00, 1213000, 'Guiné-Bissau', '2.416276,3.032227'),
(66, 'GUY', 'Guyana', 'South America', 214969.00, 861000, 'Guyana', '2.767478,1.625977'),
(67, 'HTI', 'Haiti', 'North America', 27750.00, 8222000, 'Ha?ti/Dayti', '2.416276,0.439453'),
(68, 'HND', 'Honduras', 'North America', 112088.00, 6485000, 'Honduras', '2.591889,-0.571289'),
(69, 'HKG', 'Hong Kong', 'Asia', 1075.00, 6782000, 'Xianggang/Hong Kong', '2.196727,-1.582031'),
(271, '', '', 'Asia', 0.00, 0, '', ''),
(71, 'IDN', 'Indonesia', 'Asia', 1904569.00, 212107000, 'Indonesia', '1.362176,-5.185547'),
(72, 'IND', 'India', 'Asia', 3287263.00, 1013662000, 'Bharat/India', '1.757537,-6.767578'),
(73, 'IRQ', 'Iraq', 'Asia', 438317.00, 23115000, 'Al-´Iraq', '-0.527336,-5.449219'),
(74, 'IRN', 'Iran', 'Asia', 1648195.00, 67702000, 'Iran', '-3.381824,-5.141602'),
(75, 'IRL', 'Ireland', 'Europe', 70273.00, 3775100, 'Ireland/Éire', '52.749594,-8.173828'),
(76, 'ISL', 'Iceland', 'Europe', 103000.00, 279000, 'Ísland', '64.396938,-18.808594'),
(77, 'ISR', 'Israel', 'Asia', 21056.00, 6217000, 'Yisra’el/Isra’il', '17.14079,64.511719'),
(78, 'ITA', 'Italy', 'Europe', 301316.00, 57680000, 'Italia', '42.032974,13.359375'),
(79, 'TMP', 'East Timor', 'Asia', 14874.00, 885000, 'Timor Timur', '-15.623037,75.585938'),
(80, 'AUT', 'Austria', 'Europe', 83859.00, 8091800, 'avgdjhgvdgdk', '47.398349,14.765625'),
(81, 'JAM', 'Jamaica', 'North America', 10990.00, 2583000, 'Jamaica', '-13.581921,53.261719'),
(82, 'JPN', 'Japan', 'Asia', 377829.00, 126714000, 'Nihon/Nippon', '-12.382928,71.71875'),
(83, 'YEM', 'Yemen', 'Asia', 527968.00, 18112000, 'Al-Yaman', '15.284185,46.933594'),
(84, 'JOR', 'Jordan', 'Asia', 88946.00, 5083000, 'Al-Urdunn', '6.315299,69.257813'),
(85, 'CXR', 'Christmas Island', 'Oceania', 135.00, 2500, 'Christmas Island', '12.554564,63.984375'),
(87, 'KHM', 'Cambodia', 'Asia', 181035.00, 11168000, 'Kâmpuchéa', '12.039321,55.371094'),
(88, 'CMR', 'Cameroon', 'Africa', 475442.00, 15085000, 'Cameroun/Cameroon', '5.965754,70.839844'),
(89, 'CAN', 'Canada', 'North America', 9970610.00, 31147000, 'Canada', '11.178402,61.171875'),
(90, 'CPV', 'Cape Verde', 'Africa', 4033.00, 428000, 'Cabo Verde', '4.565474,61.523438'),
(91, 'KAZ', 'Kazakstan', 'Asia', 2724900.00, 16223000, 'Qazaqstan', '0.527336,68.730469'),
(92, 'KEN', 'Kenya', 'Africa', 580367.00, 30080000, 'Kenya', '-1.054628,36.914063'),
(93, 'CAF', 'Central African Republic', 'Africa', 622984.00, 3615000, 'Centrafrique/B?-Afrîka', '6.315299,19.6875'),
(94, 'CHN', 'China', 'Asia', 9572900.00, 1277558000, 'Zhongquo', '8.233237,59.238281'),
(95, 'KGZ', 'Kyrgyzstan', 'Asia', 199900.00, 4699000, 'Kyrgyzstan', '3.337954,57.304688'),
(96, 'KIR', 'Kiribati', 'Oceania', 726.00, 83000, 'Kiribati', '4.214943,65.566406'),
(97, 'COL', 'Colombia', 'South America', 1138914.00, 42321000, 'Colombia', '10.833306,65.039063'),
(98, 'COM', 'Comoros', 'Africa', 1862.00, 578000, 'Komori/Comores', '6.664608,57.304688'),
(99, 'COG', 'Congo', 'Africa', 342000.00, 2943000, 'Congo', '-32.546813,-9.140625'),
(100, 'COD', 'Congo, The Democratic Republic of the', 'Africa', 2344858.00, 51654000, 'République Démocratique du Congo', '-30.297018,0'),
(101, 'CCK', 'Cocos (Keeling) Islands', 'Oceania', 14.00, 600, 'Cocos (Keeling) Islands', '-33.28462,6.328125'),
(102, 'PRK', 'North Korea', 'Asia', 120538.00, 24039000, 'Choson Minjujuui In´min Konghwaguk (Bukhan)', '-29.688053,34.804688'),
(103, 'KOR', 'South Korea', 'Asia', 99434.00, 46844000, 'Taehan Min’guk (Namhan)', '-24.20689,38.671875'),
(104, 'GRC', 'Greece', 'Europe', 131626.00, 10545700, 'Elláda', '39.095963,22.324219'),
(105, 'HRV', 'Croatia', 'Europe', 56538.00, 4473000, 'Hrvatska', '45.614037,16.391602'),
(106, 'CUB', 'Cuba', 'North America', 110861.00, 11201000, 'Cuba', '20.632784,-78.046875'),
(107, 'KWT', 'Kuwait', 'Asia', 17818.00, 1972000, 'Al-Kuwayt', '-29.53523,53.789063'),
(108, 'CYP', 'Cyprus', 'Asia', 9251.00, 754700, 'Kýpros/Kibris', '-26.588527,51.328125'),
(109, 'LAO', 'Laos', 'Asia', 236800.00, 5433000, 'Lao', '-24.046464,53.085938'),
(110, 'LVA', 'Latvia', 'Europe', 64589.00, 2424200, 'Latvija', '56.800878,25.751953'),
(111, 'LSO', 'Lesotho', 'Africa', 30355.00, 2153000, 'Lesotho', '-2.986927,49.570313'),
(112, 'LBN', 'Lebanon', 'Asia', 10400.00, 3282000, 'Lubnan', '-17.978733,51.679688'),
(113, 'LBR', 'Liberia', 'Africa', 111369.00, 3154000, 'Liberia', '-17.308688,56.25'),
(114, 'LBY', 'Libyan Arab Jamahiriya', 'Africa', 1759540.00, 5605000, 'Libiya', '-9.449062,64.511719'),
(115, 'LIE', 'Liechtenstein', 'Europe', 160.00, 32300, 'Liechtenstein', '47.115,9.569092'),
(116, 'LTU', 'Lithuania', 'Europe', 65301.00, 3698500, 'Lietuva', '55.279115,23.818359'),
(117, 'LUX', 'Luxembourg', 'Europe', 2586.00, 435700, 'Luxembourg/Lëtzebuerg', '49.724479,5.932617'),
(118, 'ESH', 'Western Sahara', 'Africa', 266000.00, 293000, 'As-Sahrawiya', '-6.140555,46.230469'),
(119, 'MAC', 'Macao', 'Asia', 18.00, 473000, 'Macau/Aomen', '-27.527758,57.480469'),
(120, 'MDG', 'Madagascar', 'Africa', 587041.00, 15942000, 'Madagasikara/Madagascar', '-13.923404,66.621094'),
(121, 'MKD', 'Macedonia', 'Europe', 25713.00, 2024000, 'Makedonija', '41.607228,21.621094'),
(122, 'MWI', 'Malawi', 'Africa', 118484.00, 10925000, 'Malawi', '-5.441022,60.46875'),
(123, 'MDV', 'Maldives', 'Asia', 298.00, 286000, 'Dhivehi Raajje/Maldives', '-21.943046,11.953125'),
(124, 'MYS', 'Malaysia', 'Asia', 329758.00, 22244000, 'Malaysia', '-25.324167,7.03125'),
(125, 'MLI', 'Mali', 'Africa', 1240192.00, 11234000, 'Mali', '-28.767659,10.898438'),
(126, 'MLT', 'Malta', 'Europe', 316.00, 380200, 'Malta', '35.880149,14.425049'),
(127, 'MAR', 'Morocco', 'Africa', 446550.00, 28351000, 'Al-Maghrib', '21.943046,-26.894531'),
(128, 'MHL', 'Marshall Islands', 'Oceania', 181.00, 64000, 'Marshall Islands/Majol', '18.479609,-30.410156'),
(129, 'MTQ', 'Martinique', 'North America', 1102.00, 395000, 'Martinique', '13.068777,-33.925781'),
(130, 'MRT', 'Mauritania', 'Africa', 1025520.00, 2670000, 'Muritaniya/Mauritanie', '12.554564,-23.554687'),
(131, 'MUS', 'Mauritius', 'Africa', 2040.00, 1158000, 'Mauritius', '9.275622,-29.179687'),
(132, 'MYT', 'Mayotte', 'Africa', 373.00, 149000, 'Mayotte', '10.314919,-27.246094'),
(133, 'MEX', 'Mexico', 'North America', 1958201.00, 98881000, 'México', '21.453069,-101.25'),
(134, 'FSM', 'Micronesia, Federated States of', 'Oceania', 702.00, 119000, 'Micronesia', '17.811456,-25.664062'),
(135, 'MDA', 'Moldova', 'Europe', 33851.00, 4380000, 'Moldova', '46.980252,28.78418'),
(136, 'MCO', 'Monaco', 'Europe', 1.50, 34000, 'Monaco', '43.733399,7.418518'),
(137, 'MNG', 'Mongolia', 'Asia', 1566500.00, 2662000, 'Mongol Uls', '-18.479609,-29.003906'),
(138, 'MSR', 'Montserrat', 'North America', 102.00, 11000, 'Montserrat', '-9.622414,-30.234375'),
(139, 'MOZ', 'Mozambique', 'Africa', 801590.00, 19680000, 'Moçambique', '-1.58183,-30.585937'),
(140, 'MMR', 'Myanmar', 'Asia', 676578.00, 45611000, 'Myanma Pye', '2.986927,-33.046875'),
(141, 'NAM', 'Namibia', 'Africa', 824292.00, 1726000, 'Namibia', '-12.21118,46.054688'),
(142, 'NRU', 'Nauru', 'Oceania', 21.00, 12000, 'Naoero/Nauru', '1.58183,60.292969'),
(143, 'NPL', 'Nepal', 'Asia', 147181.00, 23930000, 'Nepal', '-8.05923,48.867188'),
(144, 'NIC', 'Nicaragua', 'North America', 130000.00, 5074000, 'Nicaragua', '-3.688855,53.4375'),
(145, 'NER', 'Niger', 'Africa', 1267000.00, 10730000, 'Niger', '-0.35156,54.84375'),
(146, 'NGA', 'Nigeria', 'Africa', 923768.00, 111506000, 'Nigeria', '8.581021,7.558594'),
(147, 'NIU', 'Niue', 'Oceania', 260.00, 2000, 'Niue', '-8.754795,56.953125'),
(148, 'NFK', 'Norfolk Island', 'Oceania', 36.00, 2000, 'Norfolk Island', '-10.314919,51.152344'),
(149, 'NOR', 'Norway', 'Europe', 323877.00, 4478500, 'Norge', '60.152442,8.613281'),
(150, 'CIV', 'Côte d’Ivoire', 'Africa', 322463.00, 14786000, 'Côte d’Ivoire', '-14.264383,-4.394531'),
(151, 'OMN', 'Oman', 'Asia', 309500.00, 2542000, '´Uman', '-19.973349,-5.625'),
(152, 'PAK', 'Pakistan', 'Asia', 796095.00, 156483000, 'Pakistan', '-17.978733,-8.085937'),
(153, 'PLW', 'Palau', 'Oceania', 459.00, 19000, 'Belau/Palau', '-25.958045,-0.351562'),
(154, 'PAN', 'Panama', 'North America', 75517.00, 2856000, 'Panamá', '-27.994401,-4.746094'),
(155, 'PNG', 'Papua New Guinea', 'Oceania', 462840.00, 4807000, 'Papua New Guinea/Papua Niugini', '-27.683528,-8.085937'),
(156, 'PRY', 'Paraguay', 'South America', 406752.00, 5496000, 'Paraguay', '-27.839076,-10.019531'),
(157, 'PER', 'Peru', 'South America', 1285216.00, 25662000, 'Perú/Piruw', '-21.616579,-14.238281'),
(158, 'PCN', 'Pitcairn', 'Oceania', 49.00, 50, 'Pitcairn', '-18.979026,-16.699219'),
(159, 'MNP', 'Northern Mariana Islands', 'Oceania', 464.00, 78000, 'Northern Mariana Islands', '-25.005973,-15.996094'),
(160, 'PRT', 'Portugal', 'Europe', 91982.00, 9997600, 'Portugal', '38.822591,-8.173828'),
(161, 'PRI', 'Puerto Rico', 'North America', 8875.00, 3869000, 'Puerto Rico', '-23.563987,-20.390625'),
(162, 'POL', 'Poland', 'Europe', 323250.00, 38653600, 'Polska', '52.375599,20.039063'),
(163, 'GNQ', 'Equatorial Guinea', 'Africa', 28051.00, 453000, 'Guinea Ecuatorial', '-15.284185,59.941406'),
(164, 'QAT', 'Qatar', 'Asia', 11000.00, 599000, 'Qatar', '1.054628,1.757813'),
(165, 'FRA', 'France', 'Europe', 551500.00, 59225700, 'France', '47.724545,2.329102'),
(166, 'GUF', 'French Guiana', 'South America', 90000.00, 181000, 'Guyane française', '-13.923404,8.4375'),
(167, 'PYF', 'French Polynesia', 'Oceania', 4000.00, 235000, 'Polynésie française', '-9.968851,8.4375'),
(168, 'REU', 'Réunion', 'Africa', 2510.00, 699000, 'Réunion', '-9.968851,7.207031'),
(169, 'ROM', 'Romania', 'Europe', 238391.00, 22455500, 'România', '45.79817,24.873047'),
(170, 'RWA', 'Rwanda', 'Africa', 26338.00, 7733000, 'Rwanda/Urwanda', '-2.811371,5.625'),
(171, 'SWE', 'Sweden', 'Europe', 449964.00, 8861400, 'Sverige', '59.534318,15.292969'),
(172, 'SHN', 'Saint Helena', 'Africa', 314.00, 6000, 'Saint Helena', '8.05923,-22.5'),
(173, 'KNA', 'Saint Kitts and Nevis', 'North America', 261.00, 38000, 'Saint Kitts and Nevis', '7.013668,-20.390625'),
(174, 'LCA', 'Saint Lucia', 'North America', 622.00, 154000, 'Saint Lucia', '3.337954,-13.359375'),
(175, 'VCT', 'Saint Vincent and the Grenadines', 'North America', 388.00, 114000, 'Saint Vincent and the Grenadines', '6.489983,-18.808594'),
(176, 'SPM', 'Saint Pierre and Miquelon', 'North America', 242.00, 7000, 'Saint-Pierre-et-Miquelon', '2.811371,-16.347656'),
(177, 'DEU', 'Germany', 'Europe', 357022.00, 82164700, 'Deutschland', '51.426614,10.722656'),
(178, 'SLB', 'Solomon Islands', 'Oceania', 28896.00, 444000, 'Solomon Islands', '-5.790897,-9.667969'),
(179, 'ZMB', 'Zambia', 'Africa', 752618.00, 9169000, 'Zambia', '-5.441022,-13.359375'),
(180, 'WSM', 'Samoa', 'Oceania', 2831.00, 180000, 'Samoa', '-8.407168,-21.796875'),
(181, 'SMR', 'San Marino', 'Europe', 61.00, 27000, 'San Marino', '43.930539,12.458496'),
(182, 'STP', 'Sao Tome and Principe', 'Africa', 964.00, 147000, 'S?o Tomé e Príncipe', '-5.266008,-26.894531'),
(183, 'SAU', 'Saudi Arabia', 'Asia', 2149690.00, 21607000, 'Al-´Arabiya as-Sa´udiya', '-8.581021,-26.367187'),
(184, 'SEN', 'Senegal', 'Africa', 196722.00, 9481000, 'Sénégal/Sounougal', '-14.264383,-25.3125'),
(185, 'SYC', 'Seychelles', 'Africa', 455.00, 77000, 'Sesel/Seychelles', '-10.660608,1.40625'),
(186, 'SLE', 'Sierra Leone', 'Africa', 71740.00, 4854000, 'Sierra Leone', '-12.039321,6.503906'),
(187, 'SGP', 'Singapore', 'Asia', 618.00, 3567000, 'Singapore/Singapura/Xinjiapo/Singapur', '-17.978733,5.625'),
(188, 'SVK', 'Slovakia', 'Europe', 49012.00, 5398700, 'Slovensko', '48.661943,19.248047'),
(189, 'SVN', 'Slovenia', 'Europe', 20256.00, 1987800, 'Slovenija', '45.95115,14.545898'),
(190, 'SOM', 'Somalia', 'Africa', 637657.00, 10097000, 'Soomaaliya', '-21.616579,4.21875'),
(191, 'LKA', 'Sri Lanka', 'Asia', 65610.00, 18827000, 'Sri Lanka/Ilankai', '-25.165173,-2.285156'),
(192, 'SDN', 'Sudan', 'Africa', 2505813.00, 29490000, 'As-Sudan', '-25.324167,-5.976562'),
(193, 'FIN', 'Finland', 'Europe', 338145.00, 5171300, 'Suomi', '62.186014,26.015625'),
(194, 'SUR', 'Suriname', 'South America', 163265.00, 417000, 'Suriname', '-21.125498,0'),
(195, 'SWZ', 'Swaziland', 'Africa', 17364.00, 1008000, 'kaNgwane', '-22.43134,-10.019531'),
(196, 'CHE', 'Switzerland', 'Europe', 41284.00, 7160400, 'Schweiz/Suisse/Svizzera/Svizra', '46.800059,7.734375'),
(197, 'SYR', 'Syria', 'Asia', 185180.00, 16125000, 'Suriya', '-18.479609,-18.632812'),
(198, 'TJK', 'Tajikistan', 'Asia', 143100.00, 6188000, 'Toçikiston', '-17.978733,-24.257812'),
(199, 'TWN', 'Taiwan', 'Asia', 36188.00, 22256000, 'T’ai-wan', '-0.703107,-7.734375'),
(200, 'TZA', 'Tanzania', 'Africa', 883749.00, 33517000, 'Tanzania', '-1.406109,-2.988281'),
(201, 'DNK', 'Denmark', 'Europe', 43094.00, 5330000, 'Danmark', '55.528631,9.404297'),
(202, 'THA', 'Thailand', 'Asia', 513115.00, 61399000, 'Prathet Thai', '-21.779905,-17.402344'),
(203, 'TGO', 'Togo', 'Africa', 56785.00, 4629000, 'Togo', '-24.686952,-13.183594'),
(204, 'TKL', 'Tokelau', 'Oceania', 12.00, 2000, 'Tokelau', '-19.47695,-2.988281'),
(205, 'TON', 'Tonga', 'Oceania', 650.00, 99000, 'Tonga', '-15.114553,-9.84375'),
(206, 'TTO', 'Trinidad and Tobago', 'North America', 5130.00, 1295000, 'Trinidad and Tobago', '-12.897489,-17.578125'),
(207, 'TCD', 'Chad', 'Africa', 1284000.00, 7651000, 'Tchad/Tshad', '-13.923404,-14.0625'),
(208, 'CZE', 'Czech Republic', 'Europe', 78866.00, 10278100, '¸esko', '49.837982,17.050781'),
(209, 'TUN', 'Tunisia', 'Africa', 163610.00, 9586000, 'Tunis/Tunisie', '4.214943,-23.203125'),
(210, 'TUR', 'Turkey', 'Asia', 774815.00, 66591000, 'Türkiye', '2.108899,-17.226562'),
(211, 'TKM', 'Turkmenistan', 'Asia', 488100.00, 4459000, 'Türkmenostan', '-1.054628,-15.117187'),
(212, 'TCA', 'Turks and Caicos Islands', 'North America', 430.00, 17000, 'The Turks and Caicos Islands', '-11.867351,-15.117187'),
(213, 'TUV', 'Tuvalu', 'Oceania', 26.00, 12000, 'Tuvalu', '-8.581021,-24.257812'),
(214, 'UGA', 'Uganda', 'Africa', 241038.00, 21778000, 'Uganda', '-13.239945,-5.800781'),
(215, 'UKR', 'Ukraine', 'Europe', 603700.00, 50456000, 'Ukrajina', '48.835797,31.728516'),
(216, 'HUN', 'Hungary', 'Europe', 93030.00, 10043200, 'Magyarország', '47.15984,19.160156'),
(217, 'URY', 'Uruguay', 'South America', 175016.00, 3337000, 'Uruguay', '11.178402,-15.996094'),
(218, 'NCL', 'New Caledonia', 'Oceania', 18575.00, 214000, 'Nouvelle-Calédonie', '-2.284551,-11.777344'),
(219, 'NZL', 'New Zealand', 'Oceania', 270534.00, 3862000, 'New Zealand/Aotearoa', '-4.214943,-23.378906'),
(220, 'UZB', 'Uzbekistan', 'Asia', 447400.00, 24318000, 'Uzbekiston', '-8.233237,-7.558594'),
(221, 'BLR', 'Belarus', 'Europe', 207600.00, 10236000, 'Belarus', '53.225768,27.421875'),
(222, 'WLF', 'Wallis and Futuna', 'Oceania', 200.00, 15000, 'Wallis-et-Futuna', '-12.039321,-10.019531'),
(223, 'VUT', 'Vanuatu', 'Oceania', 12189.00, 190000, 'Vanuatu', '-11.005904,-20.214844'),
(224, 'VAT', 'Holy See (Vatican City State)', 'Europe', 0.40, 1000, 'Santa Sede/Citt? del Vaticano', '41.902916,12.452059'),
(225, 'VEN', 'Venezuela', 'South America', 912050.00, 24170000, 'Venezuela', '-11.523088,3.515625'),
(226, 'RUS', 'Russian Federation', 'Europe', 17075400.00, 146934000, 'Rossija', '52.268157,38.671875'),
(227, 'VNM', 'Vietnam', 'Asia', 331689.00, 79832000, 'Vi?t Nam', '-7.710992,-13.183594'),
(228, 'EST', 'Estonia', 'Europe', 45227.00, 1439200, 'Eesti', '58.745407,25.839844'),
(229, 'USA', 'United States', 'North America', 9363520.00, 278357000, 'United States', '-5.090944,-18.457031'),
(230, 'VIR', 'Virgin Islands, U.S.', 'North America', 347.00, 93000, 'Virgin Islands of the United States', '-3.162456,-21.445312'),
(231, 'ZWE', 'Zimbabwe', 'Africa', 390757.00, 11669000, 'Zimbabwe', '-0.703107,-23.027344'),
(232, 'PSE', 'Palestine', 'Asia', 6257.00, 3101000, 'Filastin', '-0.703107,-25.3125'),
(233, 'ATA', 'Antarctica', 'Antarctica', 13120000.00, 0, '–', '-82.402423,37.96875'),
(234, 'BVT', 'Bouvet Island', 'Antarctica', 59.00, 0, 'Bouvet?ya', '8.754795,-35.15625'),
(235, 'IOT', 'British Indian Ocean Territory', 'Africa', 78.00, 0, 'British Indian Ocean Territory', '15.623037,-30.585937'),
(236, 'SGS', 'South Georgia and the South Sandwich Islands', 'Antarctica', 3903.00, 0, 'South Georgia and the South Sandwich Islands', '20.96144,-37.617187'),
(237, 'HMD', 'Heard Island and McDonald Islands', 'Antarctica', 359.00, 0, 'Heard and McDonald Islands', '27.059126,-31.992187'),
(238, 'ATF', 'French Southern territories', 'Antarctica', 7780.00, 0, 'Terres australes françaises', '31.353637,-30.9375'),
(239, 'UMI', 'United States Minor Outlying Islands', 'Oceania', 16.00, 0, 'United States Minor Outlying Islands', '40.313043,-36.210937'),
(256, '', 'wij', 'Europe', 0.00, 0, 'qqq', '52.05249,5.317383'),
(270, '', '', 'Asia', 0.00, 0, '', '');
