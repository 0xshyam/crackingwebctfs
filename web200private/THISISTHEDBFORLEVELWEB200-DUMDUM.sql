
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hackimweb200` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hackimweb200`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES (1,'amazingspiderman','9f9d51bc70ef21ca5c14f307980a29d8','limited'),(2,'incrediblehulk','72ab8af56bddab33b269c5964b26620a','admin');
