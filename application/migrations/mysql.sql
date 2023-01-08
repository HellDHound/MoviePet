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
(1,	'2022-12-08');

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


-- 2023-01-08 17:14:22
