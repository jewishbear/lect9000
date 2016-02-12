-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 12 2016 г., 13:59
-- Версия сервера: 5.5.37-0ubuntu0.13.10.1
-- Версия PHP: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `LECTURES`
--

-- --------------------------------------------------------

--
-- Структура таблицы `LECTURE`
--

CREATE TABLE IF NOT EXISTS `LECTURE` (
  `lecture_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `lecture_date` text NOT NULL,
  `lecture_time` int(11) NOT NULL,
  UNIQUE KEY `lecture_id` (`lecture_id`),
  KEY `lesson_id` (`lesson_id`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `LECTURE`
--

INSERT INTO `LECTURE` (`lecture_id`, `lesson_id`, `room_id`, `lecture_date`, `lecture_time`) VALUES
(0, 0, 0, 'YYYY-MM-DD', 0),
(1, 1, 1, '2014-04-01', 570),
(2, 3, 8, '2014-04-02', 1080),
(3, 5, 6, '2014-04-02', 1080),
(4, 1, 4, '2014-04-02', 1080),
(5, 2, 5, '2014-04-02', 1080),
(6, 1, 5, '2014-04-02', 570),
(7, 4, 5, '2014-04-02', 675),
(8, 1, 3, '2014-04-02', 1080),
(9, 1, 7, '2014-04-02', 1110),
(10, 7, 6, '2014-04-02', 830),
(11, 11, 1, '2014-04-02', 570),
(12, 14, 10, '2014-04-02', 570),
(13, 12, 15, '2014-04-02', 570),
(14, 9, 9, '2014-04-02', 675),
(15, 9, 23, '2014-04-02', 675),
(17, 4, 7, '2014-04-02', 620),
(18, 1, 5, '2016-02-03', 570);

-- --------------------------------------------------------

--
-- Структура таблицы `LESSON`
--

CREATE TABLE IF NOT EXISTS `LESSON` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_length` int(11) NOT NULL,
  UNIQUE KEY `lesson_id` (`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `LESSON`
--

INSERT INTO `LESSON` (`lesson_id`, `lesson_name`, `lesson_length`) VALUES
(0, 'ZERO', 0),
(1, 'MATH', 95),
(2, 'ENGLISH', 95),
(3, 'YOGA', 95),
(4, 'HISTORY', 95),
(5, 'CUCUMBER FESTIVAL', 95),
(6, 'PHISYCS', 95),
(7, 'SPORT', 95),
(8, 'FUNNY THINGS', 50),
(9, 'LOVE', 120),
(10, 'HAPPINES', 95),
(11, 'COFFEE TIME', 20),
(12, 'ARTS', 95),
(13, 'MUSIC', 95),
(14, 'PROCRASTINATION', 180);

-- --------------------------------------------------------

--
-- Структура таблицы `ROOM`
--

CREATE TABLE IF NOT EXISTS `ROOM` (
  `room_id` int(11) NOT NULL,
  `room_name` text NOT NULL,
  `room_info` text NOT NULL,
  UNIQUE KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ROOM`
--

INSERT INTO `ROOM` (`room_id`, `room_name`, `room_info`) VALUES
(0, '0', 'ZERO'),
(1, '101', 'room 101'),
(2, '102', 'room 102'),
(3, '103', 'room 103'),
(4, '104', 'room 104'),
(5, '105', 'room 105'),
(6, '106', 'room 106'),
(7, '107', 'room 107'),
(8, '108', 'room 108'),
(9, '109', 'room 109'),
(10, '110', 'room 110'),
(11, '201', 'room 201'),
(12, '202', 'room 202'),
(13, '203', 'room 203'),
(14, '204', 'room 204'),
(15, '205', 'room 205'),
(16, '206', 'room 206'),
(17, '207', 'room 207'),
(18, '208', 'room 208'),
(19, '209', 'room 209'),
(20, '210', 'room 210'),
(21, '301', 'room 301'),
(22, '302', 'room 302'),
(23, '302E', 'room 302E'),
(24, '303', 'room 303'),
(25, '304', 'room 304'),
(26, '304E', 'room 304E');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `LECTURE`
--
ALTER TABLE `LECTURE`
  ADD CONSTRAINT `LECTURE_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `LESSON` (`lesson_id`),
  ADD CONSTRAINT `LECTURE_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `ROOM` (`room_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
