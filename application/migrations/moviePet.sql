-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `film_database_core_markers`;
CREATE TABLE `film_database_core_markers` (
  `id` tinyint NOT NULL DEFAULT '1',
  `databaseLastUpdateDate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `databaseLastUpdateDate` (`databaseLastUpdateDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `film_database_core_markers` (`id`, `databaseLastUpdateDate`) VALUES
(1,	'2022-01-09');

DROP TABLE IF EXISTS `genres_table`;
CREATE TABLE `genres_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `genre` text,
  `genreFilms` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `genres_table` (`id`, `genre`, `genreFilms`) VALUES
(1,	'аниме',	0),
(2,	'биография',	0),
(3,	'боевик',	0),
(4,	'вестерн',	0),
(5,	'военный',	0),
(6,	'детектив',	0),
(7,	'детский',	0),
(8,	'для взрослых',	0),
(9,	'документальный',	0),
(10,	'драма',	0),
(11,	'игра',	0),
(12,	'история',	0),
(13,	'комедия',	0),
(14,	'концерт',	0),
(15,	'короткометражка',	0),
(16,	'криминал',	0),
(17,	'мелодрама',	0),
(18,	'музыка',	0),
(19,	'мультфильм',	0),
(20,	'мюзикл',	0),
(21,	'новости',	0),
(22,	'приключения',	0),
(23,	'реальное ТВ',	0),
(24,	'семейный',	0),
(25,	'спорт',	0),
(26,	'ток-шоу',	0),
(27,	'триллер',	0),
(28,	'ужасы',	0),
(29,	'фантастика',	0),
(30,	'фильм-нуар',	0),
(31,	'фэнтези',	0),
(32,	'церемония',	0);

DROP TABLE IF EXISTS `main_films_table`;
CREATE TABLE `main_films_table` (
  `id` int NOT NULL,
  `name` text,
  `updatedAt` date DEFAULT NULL,
  `posterUrl` text,
  `previewUrl` text,
  `ratingKp` double DEFAULT NULL,
  `ratingImdb` double DEFAULT NULL,
  `type` text,
  `description` text,
  `year` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `films_genres_table`;
CREATE TABLE `films_genres_table` (
                                      `id` int NOT NULL AUTO_INCREMENT,
                                      `filmId` int DEFAULT NULL,
                                      `genreId` int DEFAULT NULL,
                                      PRIMARY KEY (`id`),
                                      KEY `filmId` (`filmId`),
                                      KEY `genreId` (`genreId`),
                                      CONSTRAINT `films_genres_table_ibfk_1` FOREIGN KEY (`filmId`) REFERENCES `main_films_table` (`id`),
                                      CONSTRAINT `films_genres_table_ibfk_2` FOREIGN KEY (`genreId`) REFERENCES `genres_table` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `user_movie_table`;
CREATE TABLE `user_movie_table` (
                                    `id` int NOT NULL AUTO_INCREMENT,
                                    `username` varchar(255) NOT NULL,
                                    `email` varchar(255) NOT NULL,
                                    `password` text NOT NULL,
                                    `usergroup` tinyint NOT NULL DEFAULT '1',
                                    UNIQUE KEY `id` (`id`),
                                    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `user_favorites_table`;
CREATE TABLE `user_favorites_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filmId` int DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filmId` (`filmId`),
  KEY `userId` (`userId`),
  CONSTRAINT `user_favorites_table_ibfk_1` FOREIGN KEY (`filmId`) REFERENCES `main_films_table` (`id`),
  CONSTRAINT `user_favorites_table_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user_movie_table` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



-- 2023-01-11 14:07:23
