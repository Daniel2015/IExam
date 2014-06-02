-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_login`
--

-- --------------------------------------------------------

--
-- Структура на таблица `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `admin`
--

INSERT INTO `admin` (`member_id`, `username`, `password`) VALUES
(1, 'his', '65b50b04a6af50bb2f174db30a8c6dad'),
(2, 'marian', '61de80355d479505de9c731f12460625'),
(3, 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e');

-- --------------------------------------------------------

--
-- Структура на таблица `logged_in_users`
--

CREATE TABLE IF NOT EXISTS `logged_in_users` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `ID` varchar(150) NOT NULL,
  `loggedInTime` varchar(150) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура на таблица `simple_login`
--

CREATE TABLE IF NOT EXISTS `simple_login` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `ID` varchar(10) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Схема на данните от таблица `simple_login`
--

INSERT INTO `simple_login` (`member_id`, `username`, `password`, `firstname`, `lastname`, `ID`) VALUES
(88, 'kkk', 'cb42e130d1471239a27fca6228094f0e', 'kkk', 'kkk', 'kkk'),
(87, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'b', 'b'),
(86, 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', 'asd'),
(85, '83388', '76779835646b8800ebc38d378e197d9a', 'Georgi', 'Nikolov', '9103495313'),
(84, '12345', '8287458823facb8ff918dbfabcd22ccb', 'marian', 'graurov', '1122334455');

-- --------------------------------------------------------

--
-- Структура на таблица `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `answer1` varchar(1000) NOT NULL,
  `answer2` varchar(1000) NOT NULL,
  `answer3` varchar(1000) NOT NULL,
  `answer4` varchar(1000) NOT NULL,
  `true_answer` varchar(30) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Схема на данните от таблица `test`
--

INSERT INTO `test` (`test_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `true_answer`) VALUES
(94, 'vupros', 'a', 'b', 'c', 'd', 'C'),
(95, 'AS', 'as', 'sa', 'SAs', 'aS', 'C'),
(96, 'd', 'd', 'd', 'd', 'd', 'A'),
(97, 'gsg', 'gs', 'gs', 'gs', 'gs', 'D');

CREATE TABLE IF NOT EXISTS `messages` (
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	`fromUser` varchar(150) NOT NULL,
	`toUser` varchar(150) NOT NULL,
	`message` varchar(1000) NOT NULL,
	`dateCreated` varchar(150) NOT NULL,
	`readed` int(1) NOT NULL,
	`deleted` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
