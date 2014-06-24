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
-- Database: `iexam`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

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
(128, 'g', 'dasdasdsa', 'vcvcvc'),
(129, 'g', 'dadsa', 'SJbP0YFRYYs'),
(130, 'g', 'dsadsa', 'SJbP0YFRYYs'),
(131, 'g', 'a', 'SJbP0YFRYYs'),
(132, 'g', 'a', 'SJbP0YFRYYs'),
(133, 'g', 'asdas', 'SJbP0YFRYYs'),
(134, 'g', '??????', 'SJbP0YFRYYs'),
(135, 'g', 'дасдсада', '0WN79cA4Cds'),
(136, 'g', 'дсадсадас', 'SJbP0YFRYYs'),
(137, '111111', 'асдсадасдса', 'SJbP0YFRYYs'),
(138, '111111', 'КИРИЛИЦААА', 'SJbP0YFRYYs'),
(139, 'admin1', 'ТЕсттест', 'DtQc06L7Z4M'),
(140, 'admin1', 'тестест', '3u1fu6f8Hto'),
(141, 'admin2', 'htdh', 'DtQc06L7Z4M'),
(142, 'admin2', 'rasgr', 'DtQc06L7Z4M'),
(143, 'admin2', 'gsgd', 'DtQc06L7Z4M'),
(144, 'admin2', 'rgdsg', 'DtQc06L7Z4M'),
(145, 'admin2', 'rgrsg', 'DtQc06L7Z4M'),
(146, 'admin2', 'rgesrg', 'DtQc06L7Z4M'),
(147, 'admin1', '123', 'DtQc06L7Z4M'),
(148, 'admin1', '55\r\n', 'DtQc06L7Z4M'),
(149, 'admin1', '123', 'DtQc06L7Z4M'),
(150, 'admin1', '123', 'DtQc06L7Z4M'),
(151, 'admin1', '32', 'DtQc06L7Z4M');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=148 ;

--
-- Схема на данните от таблица `logged_in_users`
--

INSERT INTO `logged_in_users` (`member_id`, `username`, `firstname`, `lastname`, `ID`, `loggedInTime`) VALUES
(126, 'g', 'g', 'g', 'g', '2014-06-20 03:37:08'),
(134, '222222', 'Потребител', 'Втори', '2222222222', '2014-06-20 06:54:16'),
(135, 'admin2', 'Администратор', 'Втори', '0202020202', '2014-06-20 06:54:47'),
(142, 'admin2', 'Администратор', 'Втори', '0202020202', '2014-06-20 09:59:31'),
(146, 'admin1', 'Иван', 'Стоянов', '0102030405', '2014-06-24 22:53:15'),
(147, '111111', 'Потребител', 'Първи', '1111111111', '2014-06-24 23:14:54');

-- --------------------------------------------------------

--
-- Структура на таблица `map_tests_questions`
--

CREATE TABLE IF NOT EXISTS `map_tests_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_id` (`image_id`),
  KEY `question_id` (`question_id`,`has_image`),
  KEY `test_id` (`test_id`,`question_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Схема на данните от таблица `map_tests_questions`
--

INSERT INTO `map_tests_questions` (`id`, `test_id`, `question_number`, `question_id`, `has_image`, `image_id`) VALUES
(1, 1, 1, 4, 1, 1),
(2, 1, 2, 5, 1, 2),
(3, 1, 3, 6, 1, 3),
(4, 1, 4, 11, 1, 4),
(5, 1, 5, 12, 1, 5),
(7, 2, 1, 13, 0, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`ID`, `fromUser`, `toUser`, `message`, `dateCreated`, `readed`, `deleted`, `readedAdmin`, `deletedAdmin`) VALUES
(94, 'Админ (g)', 'c', 'asdasdasd11234', '2014-06-07 00:01:00', 0, 0, 1, 1),
(96, 'Админ (c)', 'h', 'asdasdasdsada', '2014-06-07 00:08:27', 0, 0, 0, 0),
(97, 'Админ (g)', 'e', 'dsadasdsada', '2014-06-08 22:42:21', 0, 0, 0, 0),
(98, 'Админ (g)', 'i', '&lt;div&gt;''a''&lt;/div&gt;', '2014-06-08 22:42:35', 0, 0, 0, 0),
(99, 'Админ (q)', 'd', 'addddddddddd', '2014-06-13 13:01:38', 0, 0, 0, 1),
(101, 'Админ (g)', 'asd', 'sad', '2014-06-18 20:26:00', 0, 0, 0, 0),
(102, '', 'admin2', 'dsadas', '2014-06-18 20:57:46', 0, 0, 0, 0),
(112, '111111', 'admin1', 'Какво става, как си ?', '2014-06-20 07:28:51', 0, 0, 1, 1),
(113, '111111', 'admin1', 'Колко изкара по WWW... 6?', '2014-06-20 07:29:25', 0, 0, 1, 1),
(114, '111111', 'admin1', 'Бати тъпите съощения пиша :D', '2014-06-20 07:29:55', 0, 0, 1, 1),
(119, 'Админ (admin1)', '111111', 'zdravei', '2014-06-20 09:57:32', 1, 0, 0, 1),
(123, 'admin1', '111111', 'aaa', '2014-06-24 23:15:30', 1, 0, 0, 1),
(128, 'admin1', '111111', 'asd', '2014-06-24 23:27:21', 1, 0, 0, 1),
(129, 'admin1', '111111', 'sd', '2014-06-24 23:28:06', 1, 0, 0, 1),
(131, '111111', 'admin1', '666\r\n', '2014-06-24 23:51:37', 0, 0, 1, 1),
(132, 'Админ (admin1)', '222222', '566', '2014-06-24 23:54:37', 0, 0, 0, 1),
(134, ' ', ' ', 'asd', '2014-06-25 00:08:30', 0, 1, 0, 0),
(135, '111111', 'admin1', 'aaaa', '2014-06-25 00:36:16', 0, 0, 1, 1),
(137, '111111', 'admin1', '7', '2014-06-25 00:39:48', 0, 0, 1, 0),
(138, '111111', 'admin1', 'asddas', '2014-06-25 01:05:46', 0, 0, 1, 1),
(139, 'admin1', '111111', 'asd', '2014-06-25 01:05:59', 0, 0, 0, 1),
(140, '111111', 'admin1', 'a', '2014-06-25 01:06:22', 0, 0, 0, 1),
(141, '111111', 'admin1', 'asd', '2014-06-25 01:08:14', 0, 0, 0, 0);

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
  `profile_picture` varchar(1000) DEFAULT NULL,
  `ID` varchar(10) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200 ;

--
-- Схема на данните от таблица `simple_login`
--

INSERT INTO `simple_login` (`member_id`, `username`, `isAdmin`, `password`, `salt`, `firstname`, `lastname`, `profile_picture`, `ID`) VALUES
(169, 'c', 0, '$2a$10$c7ddcdadedaae3aed2183uuXq3oZfUjFh.LutjYDiS4Fwg7nTjjDq', 'c7ddcdadedaae3aed21837', '123', 'c', NULL, 'c'),
(170, 'g', 1, '$2a$10$632ca54bc36c98306da73ezBv326O9ipi5XkYeXfpGJxYkFtdFxO.', '632ca54bc36c98306da73f', 'g', 'g', NULL, 'g'),
(171, 'r', 1, '$2a$10$dc46dae8e9134970d53efuzEDI/bXPMvJJQf0ELo3qX.sjsjjSccW', 'dc46dae8e9134970d53ef5', 'r', 'r', NULL, 'r'),
(172, 'i', 1, '$2a$10$e9088e0900a56ec910388uNWuyUi3MgcYrOKM0KQYuVKwF/TUls0S', 'e9088e0900a56ec9103888', 'i', 'i', NULL, 'i'),
(173, 'q', 1, '$2a$10$71a7463d5dca4c74391f2uwPEFnqGPHmHYc6D.EdJQ8IgxTe5/.VO', '71a7463d5dca4c74391f23', 'xxxxx', 'xxx', NULL, 'xxx'),
(174, 'w', 0, '$2a$10$26c56223281e45bdea7a4OoLLXErsVRNqDaHdw7f0P33mU5YkH35K', '26c56223281e45bdea7a4c', 'w', 'w', NULL, 'w'),
(175, 'e', 0, '$2a$10$0289a53d580f46e62d238u5/c/kjRU4PD9jmjd8Id8hVubWrY9gr.', '0289a53d580f46e62d2382', 'e', 'e', NULL, 'e'),
(176, 't', 0, '$2a$10$5da1456e1071e163f340dO.Anploi8IYzin2EzgGHXYviqrowSEoi', '5da1456e1071e163f340da', 't', 't', NULL, 't'),
(177, 'u', 0, '$2a$10$b876a7681665586ec4f33eDBBBElv18YdDJK54R.bEnbofwcFhFhe', 'b876a7681665586ec4f33f', 'u', 'u', NULL, 'u'),
(178, 's', 0, '$2a$10$91c9b425d51e9ff11fb75uCvSxABZcAlBPC9IyjJEdhZcCA2jsJBa', '91c9b425d51e9ff11fb753', 's', 's', NULL, 's'),
(179, 'd', 0, '$2a$10$368c50602dc1ce45e3941uNNmKI76yzNrMHwTBjw5D3TZ0d8J6JOy', '368c50602dc1ce45e39411', 'd', 'd', NULL, 'd'),
(180, 'f', 0, '$2a$10$177ba13bc4316d2d4dca9uyHp3gtRhA6Y8rbY8JxdqC/EWuEbVeeO', '177ba13bc4316d2d4dca90', 'f', 'f', NULL, 'f'),
(181, 'h', 0, '$2a$10$e58e9eaadd2d1168a6661utk1QT0Rr0NYu9oaluq6DcJmHV7RhLR2', 'e58e9eaadd2d1168a66615', 'h', 'h', NULL, 'h'),
(182, 'j', 0, '$2a$10$afcc324ab12d7f94152dauVnTGWjqpJ1.FgE7/bLAYAdgsXMP60ce', 'afcc324ab12d7f94152da4', 'j', 'j', NULL, 'j'),
(183, 'k', 1, '$2a$10$fb482d81ee215df7871e1unzZMxaZOAFaAEdddWbADO4Ld0Etiruu', 'fb482d81ee215df7871e15', 'k', 'k', NULL, 'k'),
(184, 'l', 0, '$2a$10$47c6e17846cfb6e5bfc98uWvq5H7uRtwP/47UNHV9XfB8Q3JgP6ba', '47c6e17846cfb6e5bfc983', 'l', 'l', NULL, 'l'),
(185, 'p', 0, '$2a$10$9bbdafcd473ae041dab4duxBTkAyyT90jcnfyvl0QvAbDxySfa5DW', '9bbdafcd473ae041dab4d4', 'p', 'p', NULL, 'p'),
(186, 'o', 1, '$2a$10$948f0d022082f575ae982uV4ZU/uP5Vke1naRr4He47w0ndd3CUAu', '948f0d022082f575ae9829', 'o', 'o', NULL, 'o'),
(187, 'z', 0, '$2a$10$0d64153dc4d9701db9320uCL8fRnDFWugrPBQTEwH/NWxxwSsY.my', '0d64153dc4d9701db93204', 'z', 'z', NULL, 'z'),
(188, 'x', 0, '$2a$10$b857055e86fd4029ebb29eAwCVCDxa3yXUraOzX/8Dtb9aU/OIRsO', 'b857055e86fd4029ebb29f', 'x', 'x', NULL, 'x'),
(189, 'v', 0, '$2a$10$60e611323c6537cac8ddcu36WuJZHvws8UqFJid4wlilNiHsKF6RW', '60e611323c6537cac8ddc7', 'v', 'v', NULL, 'v'),
(190, 'n', 0, '$2a$10$15bf106def5eea8a9724aOGMB1ZuWXVVD9jdOWzJ2duM6TEg1CjTq', '15bf106def5eea8a9724ac', 'n', 'n', NULL, 'n'),
(191, 'm', 0, '$2a$10$df78438fe8ce5e19283f7uFXJnXa5rsZE6LvLMEzIu/sxuIoMcliy', 'df78438fe8ce5e19283f75', 'm', 'm', NULL, 'm'),
(192, 'dsasa', 0, '$2a$10$780872a029063dd5a3d81OiroTJ2Im.7xx0kAc48QQiPgSxKoV1KO', '780872a029063dd5a3d81a', 'dasdsa', 'dsada', NULL, 'dasdasa'),
(193, 'asd', 0, '$2a$10$3b34b112f1d138094ee3buhGAYZUNoCPXu3zUTG8tFCya3mbF1pYW', '3b34b112f1d138094ee3b4', 'xxx', 'xxx', NULL, '222'),
(194, 'po', 1, '$2a$10$e2bbf97d70eee4a230b6euI.kHGSD1sfN6.VOtmgWf/o8EUx6FgOe', 'e2bbf97d70eee4a230b6e3', 'po', 'po', NULL, 'po'),
(195, 'admin1', 1, '$2a$10$51928205d3381e940632dunsyE/EeQ2crdrkFBKreYopBk93bRmIO', '51928205d3381e940632d0', 'Иван', 'Стоянов', 'http://www.php.net/images/logo.php', '0102030405'),
(196, 'admin2', 1, '$2a$10$b77be2b16caab9bf1f24dOOBJpjCCAjnumiDTIw6eWUWHnyq42GYm', 'b77be2b16caab9bf1f24dc', 'Администратор', 'Втори', NULL, '0202020202'),
(198, '222222', 0, '$2a$10$cbe3373776151d19512dbuNhgEZOE2AE6FaDPFaF8phj9yTSekj0q', 'cbe3373776151d19512db8', 'Потребител', 'Втори', NULL, '2222222222'),
(199, '111111', 0, '$2a$10$7be8e756a20ac31a42e18OkTAmFVhJ2rqAD95MBzqUfJEEBSFqi3y', '7be8e756a20ac31a42e18a', 'Потребител', 'Първи', NULL, '1111111111');

-- --------------------------------------------------------

--
-- Структура на таблица `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `has_images` tinyint(1) NOT NULL,
  `image_tile_size` int(3) NOT NULL DEFAULT '0',
  `image_filenames` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Схема на данните от таблица `tests`
--

INSERT INTO `tests` (`id`, `description`, `has_images`, `image_tile_size`, `image_filenames`) VALUES
(1, 'Тест с картинки "Околен свят"', 1, 10, '''test30x30.png'', ''chovka.png'', ''koliba.jpg'', ''nos.jpg'', ''cveke.png'', ''badHeightNos.jpg'', ''badWidthNos.jpg'', ''badFormatNos.bmp'''),
(12, 'Тест при Милен', 0, 0, ''),
(13, 'Тест по WWW', 0, 0, ''),
(14, 'ООП', 0, 0, ''),
(15, 'Тест по Java', 0, 0, ''),
(16, 'Дискретни Структури 1 ;(', 0, 0, ''),
(17, 'Тест по C#', 0, 0, ''),
(18, 'TEST TEST', 0, 0, ''),
(19, 'asdsa', 0, 0, ''),
(20, 'ff', 0, 0, '');

-- --------------------------------------------------------

--
-- Структура на таблица `test_answers`
--

CREATE TABLE IF NOT EXISTS `test_answers` (
  `username` varchar(150) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `test_answers`
--

INSERT INTO `test_answers` (`username`, `question_id`, `answer`) VALUES
('admin1', 37, 'C'),
('admin1', 38, 'D'),
('admin1', 39, 'B'),
('admin1', 40, 'C'),
('admin1', 41, 'C'),
('admin1', 42, 'B'),
('admin1', 43, 'A'),
('admin1', 44, 'C'),
('admin1', 45, 'D'),
('admin1', 46, 'B'),
('admin1', 47, 'C'),
('admin1', 48, 'A'),
('admin1', 49, 'A'),
('admin1', 50, 'D'),
('admin1', 51, 'A'),
('admin1', 52, 'C'),
('admin1', 53, 'A'),
('admin1', 54, 'C'),
('admin1', 55, 'D'),
('admin1', 56, 'A'),
('admin1', 57, 'B'),
('admin1', 58, 'D'),
('admin1', 59, 'A'),
('admin1', 60, 'A'),
('admin1', 61, 'C'),
('admin1', 62, 'D'),
('admin1', 63, 'B'),
('admin1', 64, 'C'),
('admin1', 66, 'B'),
('admin1', 68, 'C'),
('admin1', 70, 'A'),
('admin1', 71, 'C'),
('admin1', 73, 'C'),
('admin1', 72, 'C'),
('admin1', 74, 'A'),
('admin1', 75, 'C'),
('admin1', 76, 'C'),
('admin1', 77, 'D'),
('admin1', 78, 'D'),
('admin1', 79, 'C'),
('admin1', 80, 'B'),
('admin1', 81, 'A'),
('admin1', 82, 'A'),
('admin1', 83, 'C'),
('admin1', 84, 'A'),
('admin1', 85, 'B'),
('admin1', 86, 'A'),
('admin1', 87, 'C'),
('admin1', 88, 'A'),
('admin1', 89, 'C'),
('admin1', 90, 'C'),
('admin1', 91, 'B'),
('admin1', 92, 'D'),
('admin1', 93, 'A'),
('admin1', 94, 'B'),
('admin1', 95, 'C'),
('admin1', 96, 'B'),
('admin1', 97, 'C'),
('admin1', 98, 'B'),
('admin1', 99, 'C'),
('admin1', 100, 'C'),
('admin1', 101, 'B'),
('admin1', 102, 'A'),
('admin1', 103, 'B'),
('admin1', 104, 'C'),
('admin1', 105, 'C'),
('admin1', 106, 'A'),
('admin1', 107, 'C'),
('admin1', 108, 'D'),
('admin1', 109, 'C'),
('admin1', 110, 'B'),
('admin1', 111, 'B'),
('admin1', 112, 'B'),
('admin2', 74, 'D'),
('admin2', 75, 'C'),
('admin2', 78, 'C'),
('admin2', 76, 'B'),
('admin2', 77, 'C'),
('admin2', 79, 'D'),
('admin2', 80, 'B'),
('admin2', 81, 'A'),
('admin2', 82, 'D'),
('admin2', 83, 'C'),
('admin2', 84, 'B'),
('admin2', 85, 'A'),
('admin2', 86, 'D'),
('admin2', 87, 'C'),
('admin2', 88, 'B'),
('admin2', 89, 'D'),
('222222', 74, 'C'),
('222222', 75, 'B'),
('222222', 76, 'C'),
('222222', 77, 'C'),
('222222', 78, 'C'),
('222222', 79, 'C'),
('222222', 80, 'C'),
('222222', 81, 'B'),
('222222', 82, 'B'),
('222222', 83, 'C'),
('222222', 84, 'C'),
('222222', 85, 'C'),
('222222', 86, 'B'),
('222222', 87, 'C'),
('222222', 88, 'C'),
('222222', 89, 'C'),
('111111', 74, 'A'),
('111111', 75, 'C'),
('111111', 76, 'D'),
('111111', 77, 'C'),
('111111', 78, 'B'),
('111111', 79, 'C'),
('111111', 80, 'C'),
('111111', 81, 'D'),
('111111', 82, 'C'),
('111111', 83, 'B'),
('111111', 84, 'C'),
('111111', 85, 'D'),
('111111', 86, 'C'),
('111111', 87, 'B'),
('111111', 88, 'B'),
('111111', 89, 'D'),
('admin1', 115, 'A'),
('admin1', 116, 'C'),
('admin1', 117, 'A'),
('111111', 37, 'D');

-- --------------------------------------------------------

--
-- Структура на таблица `test_images`
--

CREATE TABLE IF NOT EXISTS `test_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_of_tiles` int(11) NOT NULL,
  `css_file` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `test_images`
--

INSERT INTO `test_images` (`id`, `number_of_tiles`, `css_file`) VALUES
(1, 9, 'css/imageCSS/image0.css'),
(2, 300, 'css/imageCSS/image1.css'),
(3, 182, 'css/imageCSS/image2.css'),
(4, 575, 'css/imageCSS/image3.css'),
(5, 460, 'css/imageCSS/image4.css');

-- --------------------------------------------------------

--
-- Структура на таблица `test_questions`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- Схема на данните от таблица `test_questions`
--

INSERT INTO `test_questions` (`question_id`, `test_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `true_answer`) VALUES
(4, 0, 'Какво е показано на картинката?', 'Риба.', 'Стол.', 'Епа нема такова животно!', 'Квадратче.', 'D'),
(5, 0, 'Кое е това животно?', 'Куркудил.', 'Динозавър.', 'Пилето Гошо.', 'Риба тресчотка.', 'C'),
(6, 0, 'Къде се намира тази колиба?', 'На село.', 'В ЗОНА 51.', 'До Фантастико.', 'Каква колиба?', 'B'),
(11, 0, 'Космат ли е показаният нос?', 'Тва са мустаци, бе!', 'Да.', 'Не казвам.', 'Кой ме е снимал?', 'A'),
(12, 0, 'Какво е това цвете?', 'Фикус.', 'Теменужка.', 'Дето жената чака от 1 година за подарък.', 'Туй е бюро, бе?!', 'C'),
(25, 11, 'Ð’ÑŠÐ¿Ñ€Ð¾Ñ 1', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 1 Ð', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 1 B', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 1 C', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 1 D', 'B'),
(26, 11, 'Ð’ÑŠÐ¿Ñ€Ð¾Ñ 2', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 2 A', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 2 B', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 2 C', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 2 D', 'D'),
(27, 11, 'Ð’ÑŠÐ¿Ñ€Ð¾Ñ 3', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 3 A', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 3 B', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 3 C', 'ÐžÑ‚Ð³Ð¾Ð²Ð¾Ñ€ 3 D', 'A'),
(28, 11, 'd', 'asd', 'sad', 'sd', 'asdsadas', 'B'),
(29, 11, 'dsa', 'dasd', 'a', '24', '14141241', 'D'),
(30, 11, '43', '324', '23432', 'dsad', 'sadasdsa', 'D'),
(31, 11, '432432423', 'dsadsa', 'dsa', 'dsa', 'dsadas', 'D'),
(32, 11, '432', '423423dadsa', 'dsa', 'dasdsa', 'dsadsa', 'D'),
(33, 11, '4324', '23dsad', 'asd', 'sad', 'asdsadas', 'D'),
(34, 11, 'ADSASD', 'asdADDA', 'ASDSAD', 'ASDADS', 'ASDDSADas', 'A'),
(35, 11, 'ADS', 'DASDs', 'aDSA', 'sadsa', 'dsadas', 'D'),
(36, 11, 'd', 'sad', 'asd', 'asdas', 'das', 'C'),
(37, 12, 'DSad', 'sad', 'ada', 'dasda', 'sdasd', 'D'),
(38, 12, 'Ð°Ð¡ÐÐ”ÐÐ”', 'Ð”Ð¡Ð', 'Ð”ÐÐ¡Ð”', 'ÐÐ”Ð¡', 'Ð”ÐÐ¡Ð”Ð¡Ð', 'D'),
(39, 12, 'Ð¡Ð”', 'ÐÐ•Ð’', 'ÐÐ”Ð¡', 'ÐÐ”Ð¡Ð', 'Ð”ÐÐ¡Ð”ÐÐ¡', 'A'),
(40, 12, 'Ð´ÑÐ°Ð´Ð°ÑÐ´Ð°Ñ', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´Ð°ÑÐ´', 'C'),
(41, 12, 'Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´', 'Ð°Ð´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°Ð´Ð°Ñ', 'A'),
(42, 12, 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´Ð°ÑÐ´Ð°Ð´', 'Ð°ÑÐ´Ð°Ð´Ð°ÑÐ´', 'Ð°ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´Ð°Ñ', 'C'),
(43, 12, 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´', 'Ð°ÑÐ´ÑÐ°', 'Ð´Ð°ÑÐ´Ð°Ñ', 'B'),
(44, 12, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´Ñ', 'Ð´Ð°Ñ', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´Ð°Ñ', 'A'),
(45, 12, 'Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´Ð°Ñ', 'B'),
(46, 12, 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´Ð°ÑÐ´ÑÐ°', 'D'),
(47, 12, 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´Ð°Ñ', 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(48, 13, 'Ð¡ÐÐ”ÐÐ”', 'ÑÐ°Ð´', 'Ð°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'Ð°Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(49, 13, 'Ð´ÑÐ°Ð”', 'Ð¡Ð”ÐÐ”', 'ÐÐ¡Ð”ÐÐ¡', 'Ð”Ð¡', 'Ð”ÐÐ¡Ð”ÐÐ¡Ð”Ð°', 'A'),
(50, 13, 'ÐÐ¡Ð”ÐÐ¡Ð”ÐÐ¡Ð”ÐÐ¡', 'Ð”ÐÐ¡Ð”ÐÐ¡Ð”', 'Ð¡ÐÐ”Ð¡Ð', 'Ð”ÐÐ¡Ð”Ð¡ÐÐ”Ð¡Ð', 'Ð”ÐÐ¡Ð”ÐÐ¡', 'D'),
(51, 13, 'ÐÐ”Ð¡Ð”ÐÐ¡Ð”ÐÐ¡Ð”', 'Ð¡ÐÐ”ÐÐ¡Ð”Ð¡ÐÐ”', 'Ð¡ÐÐ”ÐÐ¡Ð”', 'Ð¡ÐÐ”Ð¡Ð', 'Ð”ÐÐ¡Ð”ÐÐ¡Ð”Ð', 'A'),
(52, 13, 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´Ð°Ñ', 'Ð´ÑÐ°', 'Ð´ÑÐ°', 'ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(53, 13, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´Ñ', 'Ð°Ð´ÑÐ°Ð´Ñ', 'Ð°Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(54, 13, 'Ð´ÑÐ°Ð´ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(55, 13, 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´', 'ÑÐ°Ð´Ñ', 'Ð°Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(56, 13, 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(57, 13, 'Ð´ÑÐ°Ð´Ð°', 'ÑÐ´ÑÐ°', 'Ð´Ð°ÑÐ´Ñ', 'Ð°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°Ð´Ñ', 'B'),
(58, 13, 'Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(59, 13, 'Ð´Ñ', 'Ð°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(60, 13, 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´', 'Ð´Ñ', 'Ð´ÑÐ´ÑÐ°Ð´Ð°Ñ', 'A'),
(61, 13, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(62, 14, 'Ð´Ð°ÑÐ´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´ÑÐ°Ð´', 'ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(63, 14, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´', 'ÑÐ°Ð´Ð°ÑÐ´', 'Ð°ÑÐ´ÑÐ°Ð´Ð°Ñ', 'B'),
(64, 14, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(65, 14, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(66, 14, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°', 'Ð´Ð°ÑÐ´ÑÐ°Ð´ÑÐ°', 'A'),
(67, 14, 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´Ñ', 'Ð°Ð´Ñ', 'Ð´Ð°ÑÐ´ÑÐ°Ð´Ð°Ñ', 'A'),
(68, 14, 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(69, 14, 'Ð´ÑÐ°Ð´Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´Ð°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(70, 14, 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´Ñ', 'Ð°Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´Ð°ÑÐ´ÑÐ°', 'A'),
(71, 14, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ´', 'ÑÐ°Ð´Ð°ÑÐ´ÑÐ°', 'C'),
(72, 14, 'Ð´ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´Ð°Ñ', 'A'),
(73, 14, 'Ð´ÑÐ°Ð´Ñ', 'Ð°Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´', 'ÑÐ°Ð´Ð°Ñ', 'D'),
(74, 15, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°Ñ', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°Ð´Ð°Ñ', 'A'),
(75, 15, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(76, 15, 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´ÑÐ°', 'C'),
(77, 15, 'Ð´ÑÐ°Ð´ÑÐ°Ð´', 'Ð°ÑÐ´Ð°ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°Ð´ÑÐ°', 'A'),
(78, 15, 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´Ñ', 'Ð°Ð´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°', 'D'),
(79, 15, 'Ð´ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´Ð°Ñ', 'C'),
(80, 15, 'Ð´ÑÐ°Ð´Ð°', 'ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´Ñ', 'Ð°Ð´ÑÐ°', 'B'),
(81, 15, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´', 'Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°Ð´Ð°Ñ', 'A'),
(82, 15, 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´', 'ÑÐ°Ð´', 'ÑÐ°Ð´', 'ÑÐ°Ð´Ð°ÑÐ´', 'A'),
(83, 15, 'Ð´ÑÐ°', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´', 'ÑÐ°Ð´Ð°Ñ', 'C'),
(84, 15, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð°Ñ', 'Ñ„', 'Ñ„Ñ„Ð³Ñ„Ð³Ñ„', 'A'),
(85, 15, 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð°Ñ', 'Ñ„', 'Ñ„Ñ„Ð³Ñ„Ð³Ñ„', 'B'),
(86, 15, 'Ñ…Ð³Ñ…Ð³', 'Ñ…Ð³', 'Ñ…Ð³Ñ…', 'Ð³Ñ…', 'Ð³Ñ…', 'A'),
(87, 15, 'Ñ…Ð³Ñ…Ð³', 'Ñ…Ð³', 'Ñ…Ð³Ñ…', 'Ð³Ñ…', 'Ð³Ñ…', 'C'),
(88, 15, 'Ñ…Ð³', 'Ñ…Ð³', '', '', '', 'A'),
(89, 15, 'Ñ…Ð³', 'Ñ…Ð³', 'Ñ…Ð³', 'Ñ…Ð³', 'Ñ…Ð³Ñ…Ð³', 'C'),
(90, 16, 'Ð´Ð°Ñ', 'Ð´ÑÐ°', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´Ð°Ñ', 'Ð´ÑÐ°Ð´Ð°Ñ', 'B'),
(91, 16, 'Ð´', 'ÑÐ°Ð´Ð°', 'ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´Ð°ÑÐ´Ð°Ñ', 'D'),
(92, 16, 'Ð´ÑÐ°Ð´Ð°ÑÐ´Ð°', 'ÑÐ´Ð°Ñ', 'Ð´Ð°ÑÐ´ÑÐ°', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´Ð°ÑÐ´Ð°Ñ', 'A'),
(93, 16, 'Ð´ÑÐ°Ð´Ð°ÑÐ´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(94, 16, 'Ð´ÑÐ°Ð´ÑÐ°', 'Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´ÑÐ°', 'Ð´Ð°Ñ', 'Ð´ÑÐ°Ð´Ð°Ñ', 'D'),
(95, 16, 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(96, 16, 'Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´Ñ', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ´Ð°Ñ', 'B'),
(97, 16, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'D'),
(98, 16, 'Ð´ÑÐ°Ð´Ð°ÑÐ´', 'ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°', 'Ð´ÑÐ°Ð´Ñ', 'Ð°Ð´ÑÐ°Ð´ÑÐ°', 'C'),
(99, 16, 'Ð´ÑÐ´', 'Ð°ÑÐ´', 'ÑÐ°Ð´Ñ', 'Ð°Ð´ÑÐ°Ð´', 'ÑÐ°Ð´ÑÐ°Ð´ÑÐ°', 'A'),
(100, 16, 'Ð´ÑÐ°Ð´Ð°Ñ', 'Ð´Ð°ÑÐ´', 'Ð°ÑÐ´ÑÐ°', 'Ð´ÑÐ°Ð´', 'Ð°ÑÐ´ÑÐ°', 'C'),
(101, 17, 'Ð´ÑÐ°', 'Ð´Ð°Ñ2312', '4324', '234', '23423432', 'C'),
(102, 17, '432432', '432', '423', '423423', '432', 'B'),
(103, 17, '4324', '234', '234234', '234', '23423', 'D'),
(104, 17, '4324', '234', '234', '324234', '34234', 'C'),
(105, 17, '43', '2432', '432423', '423', '423423', 'B'),
(106, 17, '432', '432', '423423', '43', '2432432', 'C'),
(107, 17, '432', '432', '432', '423', '423423432', 'D'),
(108, 17, 'Ñ„Ð´', 'ÑÑ„', 'ÑÐ´Ñ„ÑÐ´', 'Ñ„Ñ', 'Ð´Ñ„Ð´ÑÑ„ÑÐ´', 'D'),
(109, 17, 'Ñ„Ð´Ñ', 'Ñ„ÑÐ´', 'Ñ„ÑÐ´', 'Ñ„Ð´ÑÑ„ÑÐ´', 'Ñ„ÑÐ´Ñ„ÑÐ´', 'D'),
(110, 17, 'Ñ„Ð´Ñ', 'Ñ„ÑÐ´', 'Ñ„ÑÐ´', 'Ñ„Ð´Ñ', 'Ñ„Ð´ÑÑ„ÑÐ´', 'A'),
(111, 17, 'Ð³', 'Ñ…Ð³Ñ…Ð³', 'Ñ…Ð³Ñ…Ð³', 'Ñ…Ð³', 'Ñ…Ð³Ñ…Ð³', 'A'),
(112, 17, '32', '423', '42', '432', '432432', 'A'),
(113, 15, 'sdad', 'asdas', 'dsad', 'dsasadas', 'dsadsa', 'B'),
(114, 17, 'TEST', '55', '443', '33', '3556', 'B'),
(115, 18, '1', '1', '1', '1', '1', 'A'),
(116, 18, '2', '2', '2', '2', '2', 'B'),
(117, 18, '3', '3', '3', '3', '3', 'D');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Схема на данните от таблица `videos`
--

INSERT INTO `videos` (`ID`, `name`, `link`) VALUES
(101, 'Рекламен клип на ФМИ', 'DtQc06L7Z4M'),
(102, 'Java Programming - Step by Step tutorial', '3u1fu6f8Hto'),
(105, 'FMI - Christmas Song', 'RwR9GWk2kMo'),
(106, 'Фатални Мозъчни Изкривявания', '9xFuEyXIRwM'),
(107, 'JSPs and Servlets Tutorial 01 - Setting up', 'b42CJ0r-1to'),
(109, 'Spring Tutorial 07 - Injecting Objects', 'g15RcFyEcrk'),
(110, 'Въведение в PHP', 'E9-l6Mbx-Vs'),
(111, 'Learn PHP in 15 minutes', 'ZdP0KM49IVk'),
(112, 'JavaScript Video Tutorial Pt 1', '_cLvpJY2deo'),
(113, 'Javascript: Your New Overlord', 'Trurfqh_6fQ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
