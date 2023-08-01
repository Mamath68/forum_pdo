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


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.category : ~9 rows (environ)
INSERT INTO `category` (`id_category`, `title`) VALUES
	(1, 'Fruits'),
	(2, 'Véhicule'),
	(3, 'Animaux'),
	(10, 'plan&egrave;tes'),
	(11, 'Etoiles'),
	(12, 'Technologie'),
	(13, 'Japanimation'),
	(14, 'drama'),
	(15, 'Mangas');

-- Listage de la structure de table forum. post
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.post : ~2 rows (environ)
INSERT INTO `post` (`id_post`, `body`, `creationDate`, `topic_id`, `user_id`) VALUES
	(1, 'Coucou, moi j\'adore les golden', '2023-05-02 10:27:53', 2, 2),
	(2, 'Bonjour, j\'adore les garigette', '2023-05-03 08:54:48', 1, 2);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `isClosed` tinyint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `id_user` (`user_id`) USING BTREE,
  KEY `id_category` (`category_id`) USING BTREE,
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.topic : ~6 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `isClosed`, `user_id`, `category_id`) VALUES
	(1, 'Fraises', '2023-05-02 10:28:34', 0, 1, 1),
	(2, 'Pommes', '2023-04-28 11:36:54', 0, 1, 1),
	(3, 'Voiture', '2023-05-03 15:49:00', 0, 1, 2),
	(4, 'Moto', '2023-05-03 15:49:40', 0, 1, 2),
	(5, 'Chien', '2023-05-03 15:50:04', 0, 1, 3),
	(6, 'Chats', '2023-05-03 15:50:25', 0, 1, 3);

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `roleUser` json DEFAULT NULL,
  `dateInscription` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table forum.user : ~4 rows (environ)
INSERT INTO `user` (`id_user`, `pseudo`, `email`, `password`, `roleUser`, `dateInscription`) VALUES
	(1, 'Mathieu Stamm', 'mathieu.stamm@gmail.com', '$2y$10$92LLxFTpwfPRDP8vy/qDPufp48yupfMIgLPy3LFV8seXhggP7Gxqu', '["ROLE_ADMIN"]', '2023-04-28 09:02:57'),
	(2, 'Mathieu1998', 'mathieu.stamm@outlook.com', '$2y$10$jQVbLuv0eW1a0Ubnrv.flOro4WQSBQyj2qOGyKk1C1Qjghr0OlRBq', '["ROLE_USER"]', '2023-04-28 10:41:17'),
	(3, 'Teuteu1998', 'mathieustamm@petalmail.com', '$2y$10$D4LrexQJcEdBechXCf2MW.2wU34W6bE9c8XFR/TYa6XjInkfZ/yky', NULL, '2023-04-28 16:35:17'),
	(17, 'Michaela Stamm', 'm.stamm68200@gmail.com', '$2y$10$Ky2vqYnrPKgBu0Ghw5eu.OSiqbpjD1fIpIMHII4ACGDSfANt5Ap/m', NULL, '2023-05-05 14:59:28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
