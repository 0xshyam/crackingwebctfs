--
-- Database: `hackimweb400`
--
CREATE DATABASE IF NOT EXISTS `hackimweb400` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackimweb400`;

-- --------------------------------------------------------


--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password_bcrypt` varchar(80) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_bcrypt`, `fname`, `description`) VALUES (1, 'jaffa', '$2y$10$FalJ8SmqTDBv7Fr366RC9uW5hKJVZijsDqzgASh1kSGMsUFMMLGZq', 'hackim', 'Hash cracking is futile!');