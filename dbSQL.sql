-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2014 at 09:51 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE IF NOT EXISTS `test_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer1` varchar(1000) NOT NULL,
  `answer2` varchar(1000) NOT NULL,
  `answer3` varchar(1000) NOT NULL,
  `answer4` varchar(1000) NOT NULL,
  `true_answer` varchar(30) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`question_id`, `test_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `true_answer`) VALUES
(4, 0, '?', '.', '!', '?', 'PH', 'D'),
(5, 0, 'Дълги въпроси чупят UI?', 'Да!', 'Да бе да!', 'Не.', 'Само некогаш.', 'A'),
(6, 0, 'Въпрос2.', 'Грешен отговор1.', 'Грешен отговор2.', 'Верен отговор.', 'Грешен отговор3.', 'C'),
(11, 0, 'Kirlicata maj ne raboti. Ð¢Ð•Ð¡Ð¢.', 'Ne.', 'Navun vali.', 'Mechka.', 'Bachka si be.', 'A'),
(12, 0, 'Къде се намира колибата?', 'ПРАВИЛЕН', 'Там', 'Тук', 'Нейде другаде', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
