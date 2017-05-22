-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 02:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleadbv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `pricerequest` varchar(10) NOT NULL,
  `leftdate` date NOT NULL,
  `picture` mediumblob,
  `locationid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  `reportdescription` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `pricerequest`, `leftdate`, `picture`, `locationid`, `categoryid`, `username`, `title`, `description`, `reported`, `reportdescription`) VALUES
(1, '30€', '2017-03-26', NULL, 251, 17, 'Yousery686659', 'iPod Nano', 'Selling closer to 10 year old iPod Nano, 8gb of memory, comes with the charging cable and original packaging', 0, NULL),
(2, '2€', '2017-03-14', NULL, 146, 9, 'Lonintly0160', 'Xbox 360 games', 'Selling a bunch of old Xbox 360 games, all good condition with manual. Price is per game', 0, NULL),
(3, '0.50€', '2017-02-07', NULL, 146, 9, 'Lonintly0160', 'Spore: Galactic Edit', 'Selling a copy of Spore: Galactic Edition. Great for fuelling a fireplace or firing out of a cannon.', 0, NULL),
(4, '100€', '2017-03-09', NULL, 221, 36, 'Cogreboy19654402', 'Ford Escort, somewha', 'Selling a 1997 Ford Escort that had a bit of an accident with the front of an ambulance. Still works sorta.', 0, NULL),
(5, '50€', '2017-03-27', NULL, 221, 43, 'Cogreboy19654402', 'Super excellent spoi', 'Totally radical spoilers for sale! Some manual assembly required.', 0, NULL),
(6, '148€', '2017-03-01', NULL, 111, 34, 'Evir19796977', 'Authentic Iron Cross', 'Genuine Iron Cross medals for sale! May contain small traces of lead.', 0, NULL),
(7, '711€', '2017-03-02', NULL, 111, 34, 'Evir19796977', 'Hero of the Russian ', 'Authentic medal of a Hero of the Russian Federation. Arrived at my house by mistake, seemed to be en route to Washington DC.', 0, NULL),
(8, '321€', '2017-03-03', NULL, 107, 19, 'Thismis9022', 'Used ASIMO', 'Used ASIMO robot for sale, good working condition. Can be commanded to dance, but not very good at it.', 0, NULL),
(9, '10€', '2017-03-27', NULL, 107, 19, 'Thismis9022', 'Self-replicating nan', 'Selling self-replicating nanomachines. Useful for surgical procedures, but slightly contagious. Keep away from strong magnetic fields.', 0, NULL),
(10, '105€', '2017-03-03', NULL, 12, 29, 'Joad19582688', 'Marvellous bowler ha', 'Selling a most excellent bowler hat. Good for cosplaying Churchill, a Pinkerton agent or a gangster.', 0, NULL),
(11, '10€', '2017-03-12', NULL, 112, 11, 'Forson6122', 'Replica Mona Lisa', 'A high-quality to-scale replica of the Mona Lisa done with the same canvas and paints. Unfortunately some French bloke drew a moustache on it.', 0, NULL),
(12, '150€', '2017-03-13', NULL, 84, 20, 'Taidow0184', 'Used chainsaw', 'Wanting to sell a used chainsaw. Seen heavy use in logging, but in good condition and well-maintained.', 0, NULL),
(13, '25€', '2017-03-23', NULL, 66, 20, 'Slithered8781', 'Paper shredder, heav', 'Selling a heavily-used paper shredder. Still works, but not as fast as I need for my purposes. Useful for casual destruction of evidence only.', 0, NULL),
(14, '10€', '2017-03-09', NULL, 77, 7, 'Wilkened2474', 'Lord of the Rings DV', 'A DVD box set of the original Lord of the Rings films for sale. Excellent condition, just dont put your finger in the little holes on the DVDs.', 0, NULL),
(15, '100€', '2017-03-24', NULL, 146, 20, 'Butrackill6426', '.44 Magnum, Deactiva', 'Heavily-used .44 Magnum revolver, deactivated to comply with Finnish gun laws.', 0, NULL),
(16, '5€', '2017-03-01', NULL, 101, 14, 'Oldisher19926925', 'NVIDIA Geforce 4 Ti', 'Good condition Geforce 4 Ti, useful if you want to relive the glory days of 2004 with authentic hardware.', 0, NULL),
(17, '232.14€', '2017-03-15', NULL, 91, 41, 'Thro19665733', '95E petrol, 1 barrel', 'Barrel of 95E-grade petrol. Sold my Hummer for a Mini, so the other dozen barrels ive got will last years.', 0, NULL),
(18, '100€', '2017-03-27', NULL, 22, 16, 'Stuard5682', 'TCL 32\" TV', 'Barely-used TCL 32\" HD Ready TV H32B3904 for sale. Havent been able to look at it the same after that girl in the well climbed out of it', 0, NULL),
(19, '156€', '2017-03-27', NULL, 104, 6, 'Borre19660045', 'Lovecraft Bibliograp', 'The complete works of H.P. Lovecraft, even the stuff that should never be looked at with mortal eyes.', 0, NULL),
(20, '55€', '2017-03-27', NULL, 104, 6, 'Borre19660045', 'Necronomicon replica', 'A faithful reproduction of the Necronomicon, made with real leather of unknown species. Any perception of it emitting sound is entirely coincidental.', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `parentcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parentcategory`) VALUES
(1, 'Entertainment', NULL),
(2, 'Electronics', NULL),
(3, 'Home, Garden & DIY', NULL),
(4, 'Clothing, Travel & Jewelry', NULL),
(5, 'Vehicles', NULL),
(6, 'Books', 1),
(7, 'Films', 1),
(8, 'Music', 1),
(9, 'Video Games', 1),
(10, 'Board Games', 1),
(11, 'Art and Supplies', 1),
(12, 'Toys', 1),
(13, 'Sports Equipment', 1),
(14, 'Computers, Components and Access', 2),
(15, 'Phones & Accessories', 2),
(16, 'TV & Video', 2),
(17, 'Audio Equipment & Accessories', 2),
(18, 'Musical Instruments & Accessorie', 2),
(19, 'Wearables, Small Electronics & M', 2),
(20, 'Tools', 3),
(21, 'Appliances', 3),
(22, 'Lighting', 3),
(23, 'Furniture', 3),
(24, 'Pet Supplies, Toys & Misc.', 3),
(25, 'Garden Supplies & Decoration', 3),
(26, 'Kitchen, Bathroom & Toilet Fixtu', 3),
(27, 'Flooring, Carpets, Wallpaper & P', 3),
(28, 'Windows, Frames, Curtains & Blin', 3),
(29, 'Men', 4),
(30, 'Women', 4),
(31, 'Children', 4),
(32, 'Babies', 4),
(33, 'Shoes', 4),
(34, 'Jewelry', 4),
(35, 'Luggage', 4),
(36, 'Cars', 5),
(37, 'Vans', 5),
(38, 'Motorcycles', 5),
(39, 'Lorries', 5),
(40, 'Tyres', 5),
(41, 'Fluids', 5),
(42, 'Electronics & Accessories', 5),
(43, 'Spare/Replacement Parts', 5);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `parentlocation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `parentlocation`) VALUES
(1, 'Ahvenanmaa', NULL),
(2, 'Etelä-Karjala', NULL),
(3, 'Etelä-Pohjanmaa', NULL),
(4, 'Etelä-Savo', NULL),
(5, 'Kainuu', NULL),
(6, 'Kanta-häme', NULL),
(7, 'Keski-Pohjanmaa', NULL),
(8, 'Keski-Suomi', NULL),
(9, 'Kymenlaakso', NULL),
(10, 'Lappi', NULL),
(11, 'Pirkanmaa', NULL),
(12, 'Pohjanmaa', NULL),
(13, 'Pohjois-Karjala', NULL),
(14, 'Pohjois-Pohjanmaa', NULL),
(15, 'Pohjois-Savo', NULL),
(16, 'Päijät-Häme', NULL),
(17, 'Satakunta', NULL),
(18, 'Uusimaa', NULL),
(19, 'Varsinais-Suomi', NULL),
(20, 'Brändö', 1),
(21, 'Eckerö', 1),
(22, 'Finström', 1),
(23, 'Föglö', 1),
(24, 'Geta', 1),
(25, 'Hammarland', 1),
(26, 'Jomala', 1),
(27, 'Kumlinge', 1),
(28, 'Kökar', 1),
(29, 'Lemland', 1),
(30, 'Lumparland', 1),
(31, 'Maarianhamina', 1),
(32, 'Saltvik', 1),
(33, 'Sottunga', 1),
(34, 'Sund', 1),
(35, 'Vårdö', 1),
(36, 'Imatra', 2),
(37, 'Lappeenranta', 2),
(38, 'Lemi', 2),
(39, 'Luumäki', 2),
(40, 'Parikkala', 2),
(41, 'Rautjärvi', 2),
(42, 'Ruokolahti', 2),
(43, 'Savitaipale', 2),
(44, 'Taipalsaari', 2),
(45, 'Alajärvi', 3),
(46, 'Alavus', 3),
(47, 'Evijärvi', 3),
(48, 'Ilmajoki', 3),
(49, 'Isojoki', 3),
(50, 'Karijoki', 3),
(51, 'Kauhajoki', 3),
(52, 'Kauhava', 3),
(53, 'Kuortane', 3),
(54, 'Kurikka', 3),
(55, 'Lappajärvi', 3),
(56, 'Lapua', 3),
(57, 'Seinäjoki', 3),
(58, 'Soini', 3),
(59, 'Teuva', 3),
(60, 'Vimpeli', 3),
(61, 'Ähtäri', 3),
(62, 'Enonkoski', 4),
(63, 'Heinävesi', 4),
(64, 'Hirvensalmi', 4),
(65, 'Joroinen', 4),
(66, 'Juva', 4),
(67, 'Kangasniemi', 4),
(68, 'Mikkeli', 4),
(69, 'Mäntyharju', 4),
(70, 'Pertunmaa', 4),
(71, 'Pieksämäki', 4),
(72, 'Puumala', 4),
(73, 'Rantasalmi', 4),
(74, 'Savonlinna', 4),
(75, 'Sulkava', 4),
(76, 'Hyrynsalmi', 5),
(77, 'Kajaani', 5),
(78, 'Kuhmo', 5),
(79, 'Paltamo', 5),
(80, 'Puolanka', 5),
(81, 'Ristijärvi', 5),
(82, 'Sotkamo', 5),
(83, 'Suomussalmi', 5),
(84, 'Forssa', 6),
(85, 'Hattula', 6),
(86, 'Hausjärvi', 6),
(87, 'Humppila', 6),
(88, 'Hämeenlinna', 6),
(89, 'Janakkala', 6),
(90, 'Jokioinen', 6),
(91, 'Loppi', 6),
(92, 'Riihimäki', 6),
(93, 'Tammela', 6),
(94, 'Ypäjä', 6),
(95, 'Halsua', 7),
(96, 'Kannus', 7),
(97, 'Kaustinen', 7),
(98, 'Kokkola', 7),
(99, 'Lestijärvi', 7),
(100, 'Perho', 7),
(101, 'Toholampi', 7),
(102, 'Veteli', 7),
(103, 'Hankasalmi', 8),
(104, 'Joutsa', 8),
(105, 'Jyväskylä', 8),
(106, 'Jämsä', 8),
(107, 'Kannonkoski', 8),
(109, 'Karstula', 8),
(110, 'Keuruu', 8),
(111, 'Kinnula', 8),
(112, 'Kivijärvi', 8),
(113, 'Konnevesi', 8),
(114, 'Kuhmoinen', 8),
(115, 'Kyyjärvi', 8),
(116, 'Laukaa', 8),
(117, 'Luhanka', 8),
(118, 'Multia', 8),
(119, 'Muurame', 8),
(120, 'Petäjävesi', 8),
(121, 'Pihtipudas', 8),
(122, 'Saarijärvi', 8),
(123, 'Toivakka', 8),
(124, 'Uurainen', 8),
(125, 'Viitasaari', 8),
(126, 'Äänenkoski', 8),
(127, 'Hamina', 9),
(128, 'Iitti', 9),
(129, 'Kotka', 9),
(130, 'Kouvola', 9),
(131, 'Miehikkälä', 9),
(132, 'Pyhtää', 9),
(133, 'Virolahti', 9),
(134, 'Enontekiö', 10),
(135, 'Inari', 10),
(136, 'Kemi', 10),
(137, 'Kemijärvi', 10),
(138, 'Keminmaa', 10),
(139, 'Kittilä', 10),
(140, 'Kolari', 10),
(141, 'Muonio', 10),
(142, 'Pelkosenniemi', 10),
(143, 'Pello', 10),
(144, 'Posio', 10),
(145, 'Ranua', 10),
(146, 'Rovaniemi', 10),
(147, 'Salla', 10),
(148, 'Savukoski', 10),
(149, 'Simo', 10),
(150, 'Sodankylä', 10),
(151, 'Tervola', 10),
(152, 'Tornio', 10),
(153, 'Utsjoki', 10),
(154, 'Ylitornio', 10),
(155, 'Akaa', 11),
(156, 'Hämeenkyrö', 11),
(157, 'Ikaalinen', 11),
(158, 'Juupajoki', 11),
(159, 'Kangasala', 11),
(160, 'Kihniö', 11),
(161, 'Lempäälä', 11),
(162, 'Mänttä-Vilppula', 11),
(163, 'Nokia', 11),
(164, 'Orivesi', 11),
(165, 'Parkano', 11),
(166, 'Pirkkala', 11),
(167, 'Punkalaidun', 11),
(168, 'Pälkäne', 11),
(169, 'Ruovesi', 11),
(170, 'Sastamala', 11),
(171, 'Tampere', 11),
(172, 'Urjala', 11),
(173, 'Valkeakoski', 11),
(174, 'Vesilahti', 11),
(175, 'Virrat', 11),
(176, 'Ylöjärvi', 11),
(177, 'Isokyrö', 12),
(178, 'Kaskinen', 12),
(179, 'Korsnäs', 12),
(180, 'Kristiinankaupunki', 12),
(181, 'Kruunupyy', 12),
(182, 'Laihia', 12),
(183, 'Luoto', 12),
(184, 'Maalahti', 12),
(185, 'Mustasaari', 12),
(186, 'Närpiö', 12),
(187, 'Pedersören kunta', 12),
(188, 'Pietarsaari', 12),
(189, 'Uusikaarlepyy', 12),
(190, 'Vaasa', 12),
(191, 'Vöyri', 12),
(192, 'Ilomantsi', 13),
(193, 'Joensuu', 13),
(194, 'Juuka', 13),
(195, 'Kitee', 13),
(196, 'Kontiolahti', 13),
(197, 'Lieksa', 13),
(198, 'Liperi', 13),
(199, 'Nurmes', 13),
(200, 'Outokumpu', 13),
(201, 'Polvijärvi', 13),
(202, 'Rääkkylä', 13),
(203, 'Tohmajärvi', 13),
(204, 'Valtimo', 13),
(205, 'Alavieska', 14),
(206, 'Haapajärvi', 14),
(207, 'Haapavesi', 14),
(208, 'Hailuoto', 14),
(209, 'Ii', 14),
(210, 'Kalajoki', 14),
(211, 'Kempele', 14),
(212, 'Kuusamo', 14),
(213, 'Kärsämäki', 14),
(214, 'Liminka', 14),
(215, 'Lumijoki', 14),
(216, 'Merijärvi', 14),
(217, 'Muhos', 14),
(218, 'Nivala', 14),
(219, 'Oulainen', 14),
(220, 'Oulu', 14),
(221, 'Pudasjärvi', 14),
(222, 'Pyhäjoki', 14),
(223, 'Pyhäjärvi', 14),
(224, 'Pyhäntä', 14),
(225, 'Raahe', 14),
(226, 'Pyhäjärvi', 14),
(227, 'Pyhäntä', 14),
(228, 'Raahe', 14),
(229, 'Reisjärvi', 14),
(230, 'Sievi', 14),
(231, 'Siikajoki', 14),
(232, 'Siikalatva', 14),
(234, 'Taivalkoski', 14),
(235, 'Tyrnävä', 14),
(236, 'Utajärvi', 14),
(237, 'Vaala', 14),
(238, 'Ylivieska', 14),
(239, 'Iisalmi', 15),
(240, 'Kaavi', 15),
(241, 'Keitele', 15),
(242, 'Kiuruvesi', 15),
(243, 'Kuopio', 15),
(244, 'Lapinlahti', 15),
(245, 'Leppävirta', 15),
(246, 'Pielavesi', 15),
(247, 'Rautalampi', 15),
(248, 'Rautavaara', 15),
(249, 'Siilinjärvi', 15),
(250, 'Sonkajärvi', 15),
(251, 'Suonenjoki', 15),
(252, 'Tervo', 15),
(253, 'Tuusniemi', 15),
(254, 'Varkaus', 15),
(255, 'Vesanto', 15),
(256, 'Vieremä', 15),
(257, 'Asikkala', 16),
(258, 'Hartola', 16),
(259, 'Heinola', 16),
(260, 'Hollola', 16),
(261, 'Kärkölä', 16),
(262, 'Lahti', 16),
(263, 'Orimattila', 16),
(264, 'Padasjoki', 16),
(265, 'Sysmä', 16),
(266, 'Eura', 17),
(267, 'Eurajoki', 17),
(268, 'Harjavalta', 17),
(269, 'Honkajoki', 17),
(270, 'Huittinen', 17),
(271, 'Jämijärvi', 17),
(272, 'Kankaanpää', 17),
(273, 'Karvia', 17),
(274, 'Kokemäki', 17),
(275, 'Merikarvia', 17),
(276, 'Nakkila', 17),
(277, 'Pomarkku', 17),
(278, 'Pori', 17),
(279, 'Rauma', 17),
(280, 'Siikainen', 17),
(281, 'Säkylä', 17),
(282, 'Ulvila', 17),
(283, 'Askola', 18),
(284, 'Espoo', 18),
(285, 'Hanko', 18),
(286, 'Helsinki', 18),
(287, 'Hyvinkää', 18),
(288, 'Inkoo', 18),
(289, 'Järvenpää', 18),
(290, 'Karkkila', 18),
(291, 'Kauniainen', 18),
(292, 'Kerava', 18),
(293, 'Kirkkonummi', 18),
(294, 'Lapinjärvi', 18),
(295, 'Lohja', 18),
(296, 'Loviisa', 18),
(297, 'Myrskylä', 18),
(298, 'Mäntsälä', 18),
(299, 'Nurmjärvi', 18),
(300, 'Pornainen', 18),
(301, 'Porvoo', 18),
(302, 'Pukkila', 18),
(303, 'Raasepori', 18),
(304, 'Sipoo', 18),
(305, 'Siuntio', 18),
(306, 'Tuusula', 18),
(307, 'Vantaa', 18),
(308, 'Vihti', 18),
(309, 'Aura', 19),
(310, 'Kaarina', 19),
(311, 'Kemiönsaari', 19),
(312, 'Koski TI', 19),
(313, 'Kustavi', 19),
(314, 'Laitila', 19),
(315, 'Lieto', 19),
(316, 'Loimaa', 19),
(317, 'Marttila', 19),
(318, 'Masku', 19),
(319, 'Mynämäki', 19),
(320, 'Naantali', 19),
(321, 'Nousiainen', 19),
(322, 'Oripää', 19),
(323, 'Paimio', 19),
(324, 'Parainen', 19),
(325, 'Pyhäranta', 19),
(326, 'Pöytyä', 19),
(327, 'Raisiö', 19),
(328, 'Rusko', 19),
(329, 'Salo', 19),
(330, 'Sauvo', 19),
(331, 'Somero', 19),
(332, 'Taivassalo', 19),
(333, 'Turku', 19),
(334, 'Uusikaupunki', 19),
(335, 'Vehmaa', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `username` varchar(20) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`username`, `fullname`, `password`, `email`, `telephone`) VALUES
('Borre19660045', 'Taneli K Larnia', '-47.15,-126.716667', 'stranger.aeons@yahoo.com', '044 135 5898'),
('Butrackill6426', 'Harry L Mönkäre', 'areyoufeelingluckypunk', 'dirty.harry@sfpd.gov', '040 769 5465'),
('Cogreboy19654402', 'Aune T Hyvönen', 'abcdefg', 'aune.hyvonen@hotmail.com', '050 578 5649'),
('Evir19796977', 'Johan E Väisänen', 'asdfghjkl', 'johanvaisanen@gmail.com', '041 747 2237'),
('Forson6122', 'Tauno T Rautakorpi', 'ithurtswhenip', 'tauno.rautakorpi@gmail.com', '042 630 9324'),
('Joad19582688', 'Bo V Venäläinen', '666111666111', 'thingy.wotsit@gmail.com', '042 218 5653'),
('Lonintly0160', 'Reija &Aring; Johansson', 'asdfghjkl', 'reija.johannson@gmail.com', '041 235 0327'),
('nordicuser', 'JÃ¶rÃ¶ Ã„Ã¤ripÃ¥Ã¥', 'asdfghjkl', 'testiosoite@live.fi', '0404513371'),
('Oldisher19926925', 'Atso V Lassila', 'qwertyytrewq', 'alissalvosta@luukku.com', '044 279 9551'),
('Registertest', 'Registertester Joe', 'asdfghjkl', 'madeup@hotmail.com', '+358404513372'),
('Slithered8781', 'Annika P Sirviö', 'drowssap', 'super.secret.agent@cia.gov', '046 483 1055'),
('Stuard5682', 'Joel J Hirvi', '0987654321', 'joel.hirvi@gmail.com', '042 075 7088'),
('Taidow0184', 'Eija-Riitt A Oksanen', 'password', 'eij.rii.oksa@gmail.com', '041 714 4738'),
('Thismis9022', 'Jere O Koivu', 'dsfigjdsofgj', 'fabricatedhumanbeing@live.co.uk', '040 421 5578'),
('Thro19665733', 'Natalia V Kapanen', 'wasdwasdwasd', 'everyonesgotamidname@gmail.com', '046 512 0585'),
('Wilkened2474', 'Arvi A Polvi', 'passworddrowssap', 'wilkened2474@gmail.com', '050 760 5919'),
('Yousery686659', 'Irene A Heikkinen', '12345', 'irene.heikkinen@gmail.com', '044 779 0824'),
('Yskyes', 'Mikko Jaakonsaari', 'endzeit', 'mikko.jaakonsaari@live.fi', '0404513373');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_category` (`categoryid`),
  ADD KEY `advertisements_location` (`locationid`),
  ADD KEY `advertisements_user` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentcategory` (`parentcategory`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SK` (`id`),
  ADD KEY `parentlocation` (`parentlocation`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephone` (`telephone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_category` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `advertisements_location` FOREIGN KEY (`locationid`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `advertisements_user` FOREIGN KEY (`username`) REFERENCES `sellers` (`username`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `parentcategory` FOREIGN KEY (`parentcategory`) REFERENCES `categories` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `parentlocation` FOREIGN KEY (`parentlocation`) REFERENCES `locations` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
