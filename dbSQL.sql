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
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `user`, `message`, `link`) VALUES
(105, 'asd', 'dsadsa', 'SJbP0YFRYYs'),
(106, 'asd', 'x', 'SJbP0YFRYYs'),
(107, 'asd', 'dsadsa', 'SJbP0YFRYYs'),
(108, 'asd', 'dsadsa', 'SJbP0YFRYYs'),
(109, 'asd', 'dsadsa', 'SJbP0YFRYYs'),
(110, 'asd', 'dsadsa', 'SJbP0YFRYYs'),
(111, 'asd', 'cxcx', 'SJbP0YFRYYs'),
(112, 'asd', 'cxcx', 'SJbP0YFRYYs'),
(113, 'asd', 'asddsa', 'SJbP0YFRYYs'),
(114, 'asd', 'asddsa', 'SJbP0YFRYYs'),
(115, 'asd', 'asd', 'SJbP0YFRYYs'),
(116, 'asd', 'asd', 'SJbP0YFRYYs'),
(117, 'asd', 'cx', 'SJbP0YFRYYs'),
(118, 'asd', 'cx', 'SJbP0YFRYYs'),
(119, 'asd', '123\r\n', 'SJbP0YFRYYs'),
(120, 'asd', 'x', 'dsadas'),
(121, 'asd', '1616\r\n', 'vcvcvc'),
(122, 'asd', '1616', 'vcvcvc'),
(123, 'asd', '156156\r\n', 'vcvcvc'),
(124, 'asd', '15615616\r\n', 'vcvcvc'),
(125, 'asd', '16515616', 'vcvcvc'),
(127, 'asd', '165156\r\n', 'vcvcvc'),
(128, 'g', 'dasdasdsa', 'vcvcvc');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Схема на данните от таблица `logged_in_users`
--

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fromUser` varchar(150) NOT NULL,
  `toUser` varchar(150) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `dateCreated` varchar(150) NOT NULL,
  `readed` int(1) NOT NULL,
  `deleted` int(1) NOT NULL,
  `readedAdmin` int(1) NOT NULL,
  `deletedAdmin` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`ID`, `fromUser`, `toUser`, `message`, `dateCreated`, `readed`, `deleted`, `readedAdmin`, `deletedAdmin`) VALUES
(94, 'Админ (g)', 'c', 'asdasdasd11234', '2014-06-07 00:01:00', 0, 0, 1, 1),
(96, 'Админ (c)', 'h', 'asdasdasdsada', '2014-06-07 00:08:27', 0, 0, 0, 0),
(97, 'Админ (g)', 'e', 'dsadasdsada', '2014-06-08 22:42:21', 0, 0, 0, 0),
(98, 'Админ (g)', 'i', '&lt;div&gt;''a''&lt;/div&gt;', '2014-06-08 22:42:35', 0, 0, 0, 0),
(99, 'Админ (q)', 'd', 'addddddddddd', '2014-06-13 13:01:38', 0, 0, 0, 1),
(100, 'Админ (asd)', 'f', 'sadasdsadsadsa', '2014-06-17 21:20:30', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `simple_login`
--

CREATE TABLE IF NOT EXISTS `simple_login` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `isAdmin` int(1) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `ID` varchar(10) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=195 ;

--
-- Схема на данните от таблица `simple_login`
--

INSERT INTO `simple_login` (`member_id`, `username`, `isAdmin`, `password`, `salt`, `firstname`, `lastname`, `ID`) VALUES
(172, 'i', 1, '$2a$10$e9088e0900a56ec910388uNWuyUi3MgcYrOKM0KQYuVKwF/TUls0S', 'e9088e0900a56ec9103888', 'i', 'i', 'i'),
(173, 'q', 1, '$2a$10$71a7463d5dca4c74391f2uwPEFnqGPHmHYc6D.EdJQ8IgxTe5/.VO', '71a7463d5dca4c74391f23', 'xxxxx', 'xxx', 'xxx'),
(171, 'r', 0, '$2a$10$dc46dae8e9134970d53efuzEDI/bXPMvJJQf0ELo3qX.sjsjjSccW', 'dc46dae8e9134970d53ef5', 'r', 'r', 'r'),
(193, 'asd', 0, '$2a$10$3b34b112f1d138094ee3buhGAYZUNoCPXu3zUTG8tFCya3mbF1pYW', '3b34b112f1d138094ee3b4', 'xxx', 'xxx', '222'),
(192, 'dsasa', 0, '$2a$10$780872a029063dd5a3d81OiroTJ2Im.7xx0kAc48QQiPgSxKoV1KO', '780872a029063dd5a3d81a', 'dasdsa', 'dsada', 'dasdasa'),
(169, 'c', 0, '$2a$10$c7ddcdadedaae3aed2183uuXq3oZfUjFh.LutjYDiS4Fwg7nTjjDq', 'c7ddcdadedaae3aed21837', '123', 'c', 'c'),
(170, 'g', 1, '$2a$10$632ca54bc36c98306da73ezBv326O9ipi5XkYeXfpGJxYkFtdFxO.', '632ca54bc36c98306da73f', 'g', 'g', 'g'),
(174, 'w', 0, '$2a$10$26c56223281e45bdea7a4OoLLXErsVRNqDaHdw7f0P33mU5YkH35K', '26c56223281e45bdea7a4c', 'w', 'w', 'w'),
(175, 'e', 0, '$2a$10$0289a53d580f46e62d238u5/c/kjRU4PD9jmjd8Id8hVubWrY9gr.', '0289a53d580f46e62d2382', 'e', 'e', 'e'),
(176, 't', 0, '$2a$10$5da1456e1071e163f340dO.Anploi8IYzin2EzgGHXYviqrowSEoi', '5da1456e1071e163f340da', 't', 't', 't'),
(177, 'u', 0, '$2a$10$b876a7681665586ec4f33eDBBBElv18YdDJK54R.bEnbofwcFhFhe', 'b876a7681665586ec4f33f', 'u', 'u', 'u'),
(178, 's', 0, '$2a$10$91c9b425d51e9ff11fb75uCvSxABZcAlBPC9IyjJEdhZcCA2jsJBa', '91c9b425d51e9ff11fb753', 's', 's', 's'),
(179, 'd', 0, '$2a$10$368c50602dc1ce45e3941uNNmKI76yzNrMHwTBjw5D3TZ0d8J6JOy', '368c50602dc1ce45e39411', 'd', 'd', 'd'),
(180, 'f', 0, '$2a$10$177ba13bc4316d2d4dca9uyHp3gtRhA6Y8rbY8JxdqC/EWuEbVeeO', '177ba13bc4316d2d4dca90', 'f', 'f', 'f'),
(181, 'h', 0, '$2a$10$e58e9eaadd2d1168a6661utk1QT0Rr0NYu9oaluq6DcJmHV7RhLR2', 'e58e9eaadd2d1168a66615', 'h', 'h', 'h'),
(182, 'j', 0, '$2a$10$afcc324ab12d7f94152dauVnTGWjqpJ1.FgE7/bLAYAdgsXMP60ce', 'afcc324ab12d7f94152da4', 'j', 'j', 'j'),
(183, 'k', 1, '$2a$10$fb482d81ee215df7871e1unzZMxaZOAFaAEdddWbADO4Ld0Etiruu', 'fb482d81ee215df7871e15', 'k', 'k', 'k'),
(184, 'l', 0, '$2a$10$47c6e17846cfb6e5bfc98uWvq5H7uRtwP/47UNHV9XfB8Q3JgP6ba', '47c6e17846cfb6e5bfc983', 'l', 'l', 'l'),
(185, 'p', 0, '$2a$10$9bbdafcd473ae041dab4duxBTkAyyT90jcnfyvl0QvAbDxySfa5DW', '9bbdafcd473ae041dab4d4', 'p', 'p', 'p'),
(186, 'o', 1, '$2a$10$948f0d022082f575ae982uV4ZU/uP5Vke1naRr4He47w0ndd3CUAu', '948f0d022082f575ae9829', 'o', 'o', 'o'),
(187, 'z', 0, '$2a$10$0d64153dc4d9701db9320uCL8fRnDFWugrPBQTEwH/NWxxwSsY.my', '0d64153dc4d9701db93204', 'z', 'z', 'z'),
(188, 'x', 0, '$2a$10$b857055e86fd4029ebb29eAwCVCDxa3yXUraOzX/8Dtb9aU/OIRsO', 'b857055e86fd4029ebb29f', 'x', 'x', 'x'),
(189, 'v', 0, '$2a$10$60e611323c6537cac8ddcu36WuJZHvws8UqFJid4wlilNiHsKF6RW', '60e611323c6537cac8ddc7', 'v', 'v', 'v'),
(190, 'n', 0, '$2a$10$15bf106def5eea8a9724aOGMB1ZuWXVVD9jdOWzJ2duM6TEg1CjTq', '15bf106def5eea8a9724ac', 'n', 'n', 'n'),
(191, 'm', 0, '$2a$10$df78438fe8ce5e19283f7uFXJnXa5rsZE6LvLMEzIu/sxuIoMcliy', 'df78438fe8ce5e19283f75', 'm', 'm', 'm'),
(194, 'po', 1, '$2a$10$e2bbf97d70eee4a230b6euI.kHGSD1sfN6.VOtmgWf/o8EUx6FgOe', 'e2bbf97d70eee4a230b6e3', 'po', 'po', 'po');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Схема на данните от таблица `test`
--

INSERT INTO `test` (`test_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `true_answer`) VALUES
(4, '?', '.', '!', '?', 'PH', 'D'),
(5, 'asdddddddddddddddddddddddddddasdddddddddddddddddddddddddddasdddddddddddddddddddddddddddasdddddddddddddddddddddddddddasddddddddddddddddddddddddddd', 'dsaasddddddddddddddddddddddddddd', 'asddddddddddddddddddddddddddd', 'asddddddddddddddddddddddddddd', 'asddddddddddddddddddddddddddd', 'A'),
(6, 'asdddddddddddddddddddddddddddasdddddddddddddddddddddddddddasddddddasdddddddddddddddddddddddddddasdddddddddddddddddddddddddddasddddddddddddddddddddddddddddddddddddddddddddddddasdddddddddddddddddddddddddddasddddddddddddddddddddddddddd', 'dsaasddddddddddddddddddddddddddd', 'asddddddddddddddddddddddddddd', 'asddddddddddddddddddddddddddd', 'asddddddddddddddddddddddddddd', 'A');

-- --------------------------------------------------------

--
-- Структура на таблица `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Схема на данните от таблица `videos`
--

INSERT INTO `videos` (`ID`, `name`, `link`) VALUES
(91, 'vcvcvc', 'vcvcvc'),
(93, 'dsadasdasdadsda', 'sdasdsadasds'),
(94, 'dsadsadsa', 'dsadsadsadsa'),
(95, 'dsadsadsa', 'dsadasdsa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
