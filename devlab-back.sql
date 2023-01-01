/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `IsAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

CREATE TABLE `watch` (
  `user_id` int DEFAULT NULL,
  `moovie_id` int NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `watch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `IsAdmin`) VALUES
(33, 't@gmail.com', '75fe42543cf8bfbc1065b3a4e6367396', 'prenom', 'NOM', 0);
INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `IsAdmin`) VALUES
(34, 'porcepic91@gmail.com', '75fe42543cf8bfbc1065b3a4e6367396', 'Mehdi', 'bellam', 0);
INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `IsAdmin`) VALUES
(35, 'admin@gmail.com', '282871298085122da66e135ed526f7d3', 'admin', 'admin', 1);
INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `IsAdmin`) VALUES
(36, 'test@test.com', '75fe42543cf8bfbc1065b3a4e6367396', 'ter', 'ber', 0);

INSERT INTO `watch` (`user_id`, `moovie_id`) VALUES
(35, 91314);
INSERT INTO `watch` (`user_id`, `moovie_id`) VALUES
(34, 91314);
INSERT INTO `watch` (`user_id`, `moovie_id`) VALUES
(36, 91314);
INSERT INTO `watch` (`user_id`, `moovie_id`) VALUES
(35, 27205),
(35, 447404),
(36, 238),
(36, 278),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140),
(36, 383140);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;