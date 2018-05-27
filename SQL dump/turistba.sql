-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2017 at 07:25 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `turistba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `br_tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_posla` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `ime`, `prezime`, `adresa`, `br_tel`, `e_mail`, `username`, `password`, `id_posla`) VALUES
(1, 'Armin', 'Alagić', 'Plandišće 6', '+38762107667', 'armin@hotmail.com', 'admin1', 'admin1', 0),
(2, 'Adis', 'Salihodžić', 'Ozimice 2', '+38761591901', 'adis_saha@hotmail.com', 'adis', 'adis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aranzmani`
--

CREATE TABLE IF NOT EXISTS `aranzmani` (
  `id_aranzman` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_destinacije` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kontinent` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drzava` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cijena` double NOT NULL,
  `tip` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datum_polaska` date NOT NULL,
  `br_mjesta` int(10) NOT NULL,
  `slika1` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika2` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika3` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika4` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akcija` tinyint(1) NOT NULL,
  `akcijska_cijena` double NOT NULL,
  `tip_prijevoza` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admina` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stanje` int(4) NOT NULL,
  PRIMARY KEY (`id_aranzman`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `aranzmani`
--

INSERT INTO `aranzmani` (`id_aranzman`, `naziv_destinacije`, `kontinent`, `drzava`, `cijena`, `tip`, `opis`, `datum_polaska`, `br_mjesta`, `slika1`, `slika2`, `slika3`, `slika4`, `akcija`, `akcijska_cijena`, `tip_prijevoza`, `id_admina`, `stanje`) VALUES
(1, 'Graz - Shoping', 'Evropa', 'Austrija', 80, 'Zimovanje', '- Okupljanje u 07.00 h na trgu\r\n- Polazak u 07:30 h\r\n- Obilazak grada i shoping do 18:00 h\r\n- Okupljanje u 18:30 h\r\n- Polazak u 19:00 h', '2017-01-17', 56, 'sl/graz.jpg', 'sl/graz2.jpg', 'sl/graz3.jpg', 'sl/url.jpg', 1, 40, 'Bus', '2', 1),
(2, 'Zagreb - Arena', 'Evropa', 'Hrvatska', 40, 'Zimovanje', '- Okupljanje u 07.00 h na trgu\r\n- Polazak u 07:30 h\r\n- Obilazak sajma i arene do 18:00 h\r\n- Okupljanje u 18:30 h\r\n- Polazak u 19:00 h', '2017-01-28', 53, 'sl/za.jpg', 'sl/arena-zagreb.001.jpg', 'sl/IMG_6390_zps19931aca.jpg', 'sl/IMG_6462_zps85128039.jpg', 1, 20, 'Bus', '2', 1),
(3, 'Venecija - Karneval', 'Evropa', 'Italija', 200, 'Ljetovanje', '', '2017-01-27', 37, 'sl/vk.jpg', 'sl/kv2.jpg', 'sl/km.jpg', 'sl/karneval.jpg', 0, 165, 'Bus', '2', 0),
(4, 'Budva', 'Evropa', 'Crna gora', 195, 'Ljetovanje', '- 3 dana ljetovanja\r\n- hotel 3 zvjezdice\r\n- obilazak grada\r\n- polazak u 08:00 h', '2017-07-28', 46, 'sl/budva.jpg', 'sl/budva-ft-4x2.jpg', 'sl/42915514.jpg', 'sl/avala-resort-villas.jpg', 0, 0, 'Bus', '2', 1),
(5, 'Trst Advent', 'Evropa', 'Italija', 50, 'Zimovanje', '- Okupljanje u 07.00 h na trgu - Polazak u 07:30 h - Obilazak grada i shoping do 18:00 h - Okupljanje u 18:30 h - Polazak u 19:00 h', '2017-01-09', 55, 'sl/trst.jpg', 'sl/Advent-u-Trstu.jpg', 'sl/62113_635175278706881374.jpg', 'sl/Advent-u-Trstu.jpg', 0, 0, 'Avion', '2', 1),
(6, 'Zadar', 'Evropa', 'Hrvatska', 120, 'Ljetovanje', '- Okupljanje u 07.00 h na trgu\r\n- Polazak u 07:30 h\r\n- Smještaj u hotel\r\n- Okupljanje u 18:30 h\r\n- Polazak u 19:00 h', '2017-07-17', 56, 'sl/zaton-zadar-002.jpg', 'sl/zaton-beach-004.jpg', 'sl/url.jpg', 'sl/kolovare-zadar-a.jpg', 0, 0, 'Bus', '2', 1),
(7, 'Vlašić', 'Evropa', 'BiH', 100, 'Zimovanje', '- Okupljanje u 07.00 h na trgu - Polazak u 07:30 h - Obilazak grada i shoping do 18:00 h - Okupljanje u 18:30 h - Polazak u 19:00 h', '2017-01-27', 50, 'sl/vlašićba.jpg', 'sl/babanovac.jpg', 'sl/51.jpg', 'sl/vlasic.jpg', 0, 0, 'Bus', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izvjestaj`
--

CREATE TABLE IF NOT EXISTS `izvjestaj` (
  `id_izvjestaj` int(11) NOT NULL AUTO_INCREMENT,
  `id_aranzmana` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_rezervacija` int(11) NOT NULL,
  `prihod` int(11) NOT NULL,
  PRIMARY KEY (`id_izvjestaj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `izvjestaj`
--

INSERT INTO `izvjestaj` (`id_izvjestaj`, `id_aranzmana`, `br_rezervacija`, `prihod`) VALUES
(1, '3', 3, 600);

-- --------------------------------------------------------

--
-- Table structure for table `izvjestaj_kviza`
--

CREATE TABLE IF NOT EXISTS `izvjestaj_kviza` (
  `id_izvjestaj_kviza` int(11) NOT NULL AUTO_INCREMENT,
  `id_kviza` varchar(45) NOT NULL,
  `id_aranzmana` int(11) NOT NULL,
  `pobjednik` varchar(45) NOT NULL,
  `br_ucesnika` int(100) NOT NULL,
  PRIMARY KEY (`id_izvjestaj_kviza`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `izvjestaj_kviza`
--

INSERT INTO `izvjestaj_kviza` (`id_izvjestaj_kviza`, `id_kviza`, `id_aranzmana`, `pobjednik`, `br_ucesnika`) VALUES
(1, '1', 7, 'adis123', 3),
(2, '2', 7, 'armin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE IF NOT EXISTS `klijent` (
  `id_klijent` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_pasosa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `grad` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `br_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `e_mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `br_rezervacija` int(10) NOT NULL,
  `odgovor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_klijent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`id_klijent`, `ime`, `prezime`, `username`, `password`, `br_pasosa`, `datum_rodjenja`, `grad`, `adresa`, `br_tel`, `e_mail`, `br_rezervacija`, `odgovor`) VALUES
(1, 'Adis', 'Salihodžić', 'adis123', 'adis123', 'A1234567', '1995-04-12', 'Bihać', 'Ozimice 2', '+38762-107-607', 'adis@gmail.com', 2, 0),
(2, 'Hamza', 'Handanagić', 'hamza123', 'hamza123', 'H1234567', '1995-04-11', 'Cazin', 'Cazin 14', '+38762-107-668', 'hamza@hotmail.com', 0, 0),
(3, 'Arnela', 'Gutlić', 'arnela123', 'arnela123', 'A2345678', '1995-06-07', 'Bosanski Petrovac', 'Petrovac bb', '+38761-102-657', 'arnela@gmail.com', 1, 0),
(4, 'Armin', 'Alagić', 'armin123', 'armin123', 'A3456789', '1994-04-07', 'Bihać', 'Bihać', '+38762-107-667', 'armin_94@hotmail.com', 1, 0),
(5, 'Muhamed', 'Handukić', 'hami123', 'hami123', 'M1234567', '1994-07-05', 'Bihać', 'Pokoj 4', '+38766-144-663', 'hami.h@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kviz`
--

CREATE TABLE IF NOT EXISTS `kviz` (
  `id_kviz` int(11) NOT NULL AUTO_INCREMENT,
  `pitanje` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opcija_1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opcija_2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opcija_3` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `odgovor` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stanje` int(4) NOT NULL,
  PRIMARY KEY (`id_kviz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kviz`
--

INSERT INTO `kviz` (`id_kviz`, `pitanje`, `opcija_1`, `opcija_2`, `opcija_3`, `odgovor`, `stanje`) VALUES
(1, 'Koji je glavni grad BiH?', 'Sarajevo', 'Zenica', 'Tuzla', 'Sarajevo', 0),
(2, 'Koja je najviša planina u BiH?', 'Jahorina', 'Maglić', 'Vlašić', 'Maglić', 0),
(3, 'Kapiten BiH nogometne reprezentacije?', 'Edin Džeko', 'Senad Lulić', 'Avdija Vršajević', 'Edin Džeko', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moje_destinacije`
--

CREATE TABLE IF NOT EXISTS `moje_destinacije` (
  `id_moje` int(11) NOT NULL AUTO_INCREMENT,
  `id_aranzmana` int(11) NOT NULL,
  `id_klijenta` int(11) NOT NULL,
  PRIMARY KEY (`id_moje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `moje_destinacije`
--

INSERT INTO `moje_destinacije` (`id_moje`, `id_aranzmana`, `id_klijenta`) VALUES
(1, 3, 1),
(2, 3, 3),
(3, 3, 4),
(4, 7, 4),
(5, 0, 0),
(6, 0, 0),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocjena_aranzmana`
--

CREATE TABLE IF NOT EXISTS `ocjena_aranzmana` (
  `id_ocjena` int(11) NOT NULL AUTO_INCREMENT,
  `id_aranzmana` int(11) NOT NULL,
  `id_klijenta` int(11) NOT NULL,
  `ocjena` int(11) NOT NULL,
  `komentar` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ocjena`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ocjena_aranzmana`
--

INSERT INTO `ocjena_aranzmana` (`id_ocjena`, `id_aranzmana`, `id_klijenta`, `ocjena`, `komentar`) VALUES
(1, 3, 3, 5, 'Bilo je super!'),
(2, 3, 4, 4, 'Prejako!');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE IF NOT EXISTS `rezervacije` (
  `id_rezervacija` int(11) NOT NULL AUTO_INCREMENT,
  `id_klijenta` int(11) NOT NULL,
  `id_aranzmana` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id_rezervacija`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id_rezervacija`, `id_klijenta`, `id_aranzmana`, `datum`) VALUES
(1, 1, 7, '2017-01-12'),
(2, 1, 3, '2017-01-12'),
(3, 3, 3, '2017-01-12'),
(4, 4, 3, '2017-01-12'),
(5, 4, 7, '2017-01-12'),
(6, 0, 0, '2017-01-12'),
(7, 0, 0, '2017-01-12'),
(8, 1, 2, '2017-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `ucesnici`
--

CREATE TABLE IF NOT EXISTS `ucesnici` (
  `id_ucesnik` int(11) NOT NULL AUTO_INCREMENT,
  `id_klijent` int(11) NOT NULL,
  `id_kviz` int(11) NOT NULL,
  PRIMARY KEY (`id_ucesnik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ucesnici`
--

