-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 19 Σεπ 2013 στις 20:48:45
-- Έκδοση διακομιστή: 5.5.24-log
-- Έκδοση PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `services`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `notes`
--

INSERT INTO `notes` (`id`, `title`, `note`) VALUES
(1, 'First Note Jaffa', 'Â Oh this works after all!');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
