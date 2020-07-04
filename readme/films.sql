-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2020 г., 16:10
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webbylab`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `release_year` year(4) NOT NULL,
  `format` enum('DVD','Blu-Ray','VHS') NOT NULL,
  `stars` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `title`, `release_year`, `format`, `stars`) VALUES
(1, 'Blazing Saddles', 1974, 'VHS', 'Mel Brooks, Clevon Little, Harvey Korman, Gene Wilder, Slim Pickens, Madeline Kahn'),
(2, 'Casablanca', 1942, 'DVD', 'Humphrey Bogart, Ingrid Bergman, Claude Rains, Peter Lorre'),
(3, 'Charade', 1953, 'DVD', 'Audrey Hepburn, Cary Grant, Walter Matthau, James Coburn, George Kennedy'),
(4, 'Cool Hand Luke', 1967, 'VHS', 'Paul Newman, George Kennedy, Strother Martin'),
(5, 'Butch Cassidy and the Sundance Kid', 1969, 'VHS', 'Paul Newman, Robert Redford, Katherine Ross'),
(6, 'The Sting', 1973, 'DVD', 'Robert Redford, Paul Newman, Robert Shaw, Charles Durning'),
(7, 'The Muppet Movie', 1979, 'DVD', 'Jim Henson, Frank Oz, Dave Geolz, Mel Brooks, James Coburn, Charles Durning, Austin Pendleton'),
(8, 'Get Shorty', 1995, 'DVD', 'John Travolta, Danny DeVito, Renne Russo, Gene Hackman, Dennis Farina'),
(9, 'My Cousin Vinny', 1992, 'DVD', 'Joe Pesci, Marrisa Tomei, Fred Gwynne, Austin Pendleton, Lane Smith, Ralph Macchio'),
(10, 'Gladiator', 2000, 'Blu-Ray', 'Russell Crowe, Joaquin Phoenix, Connie Nielson'),
(11, 'Star Wars', 1977, 'Blu-Ray', 'Harrison Ford, Mark Hamill, Carrie Fisher, Alec Guinness, James Earl Jones'),
(12, 'Raiders of the Lost Ark', 1981, 'DVD', 'Harrison Ford, Karen Allen'),
(13, 'Serenity', 2005, 'Blu-Ray', 'Nathan Fillion, Alan Tudyk, Adam Baldwin, Ron Glass, Jewel Staite, Gina Torres, Morena Baccarin, Sean Maher, Summer Glau, Chiwetel Ejiofor'),
(14, 'Hooisers', 1986, 'VHS', 'Gene Hackman, Barbara Hershey, Dennis Hopper'),
(15, 'WarGames', 1983, 'VHS', 'Matthew Broderick, Ally Sheedy, Dabney Coleman, John Wood, Barry Corbin'),
(16, 'Spaceballs', 1987, 'DVD', 'Bill Pullman, John Candy, Mel Brooks, Rick Moranis, Daphne Zuniga, Joan Rivers'),
(17, 'Young Frankenstein', 1974, 'VHS', 'Gene Wilder, Kenneth Mars, Terri Garr, Gene Hackman, Peter Boyle'),
(18, 'Real Genius', 1985, 'VHS', 'Val Kilmer, Gabe Jarret, Michelle Meyrink, William Atherton'),
(19, 'Top Gun', 1986, 'DVD', 'Tom Cruise, Kelly McGillis, Val Kilmer, Anthony Edwards, Tom Skerritt'),
(20, 'MASH', 1970, 'DVD', 'Donald Sutherland, Elliot Gould, Tom Skerritt, Sally Kellerman, Robert Duvall'),
(21, 'The Russians Are Coming', 1966, 'VHS', 'Carl Reiner, Eva Marie Saint, Alan Arkin, Brian Keith'),
(22, 'Jaws', 1975, 'DVD', 'Roy Scheider, Robert Shaw, Richard Dreyfuss, Lorraine Gary'),
(23, 'A Space Odyssey', 1968, 'DVD', 'Keir Dullea, Gary Lockwood, William Sylvester, Douglas Rain'),
(24, 'Harvey', 1950, 'DVD', 'James Stewart, Josephine Hull, Peggy Dow, Charles Drake'),
(25, 'Knocked Up', 2007, 'Blu-Ray', 'Seth Rogen, Katherine Heigl, Paul Rudd, Leslie Mann');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
