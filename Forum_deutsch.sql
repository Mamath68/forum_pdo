-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_deutsch
CREATE DATABASE IF NOT EXISTS `forum_deutsch` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_deutsch`;

-- Listage de la structure de table forum_deutsch. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum_deutsch.category : ~2 rows (environ)
REPLACE INTO `category` (`id_category`, `title`) VALUES
	(24, 'Fruits'),
	(25, 'anime');

-- Listage de la structure de table forum_deutsch. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `body` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `topic_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `id_user` (`user_id`) USING BTREE,
  KEY `id_sujet` (`topic_id`) USING BTREE,
  CONSTRAINT `FK_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum_deutsch.post : ~2 rows (environ)
REPLACE INTO `post` (`id_post`, `body`, `creationDate`, `topic_id`, `user_id`) VALUES
	(1, 'Ich liebe Bio-Obste', '2023-09-11 14:24:24', 1, 20),
	(2, 'Ich liebe diesen Anime', '2023-09-11 14:59:25', 2, 20);

-- Listage de la structure de table forum_deutsch. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `id_user` (`user_id`) USING BTREE,
  KEY `id_category` (`category_id`) USING BTREE,
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum_deutsch.topic : ~2 rows (environ)
REPLACE INTO `topic` (`id_topic`, `name`, `creationDate`, `user_id`, `category_id`) VALUES
	(1, 'Bio', '2023-09-11 14:17:59', 22, 24),
	(2, 'Naruto', '2023-09-12 13:16:57', 22, 25);

-- Listage de la structure de table forum_deutsch. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `roleUser` json DEFAULT NULL,
  `dateInscription` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum_deutsch.user : ~2 rows (environ)
REPLACE INTO `user` (`id_user`, `pseudo`, `email`, `password`, `roleUser`, `dateInscription`) VALUES
	(20, 'test2023', 'mathieu@gmail.Com', '$2y$10$aD3kD6C0yGruJqn60jkoxegnBv1dGudtt0M7bK/lzIpjn4Lw2PlGW', '["ROLE_USER"]', '2023-09-12 10:43:26'),
	(22, 'MathieuStamm', 'mamath98@gmail.com', '$2y$10$zddXnjnOlwlLiwxIewUDx.TSMuhbRQ8ZZH59eLNjmXN.G44G0nRMu', '["ROLE_ADMIN"]', '2023-09-12 11:06:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
