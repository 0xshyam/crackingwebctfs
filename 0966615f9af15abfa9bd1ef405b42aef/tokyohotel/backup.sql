SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
CREATE DATABASE IF NOT EXISTS `ctfdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ctfdb`;
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `accounts` (
  `uid` varchar(5) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `age` int(2) NOT NULL,
  `zipcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `accounts` (`uid`, `uname`, `pwd`, `age`, `zipcode`) VALUES
('10000', 'alice', 'aXN2ZXJ5c2NhcmVkb2Z0aGVkYXJrbmVzcw==', 28, '89918');
