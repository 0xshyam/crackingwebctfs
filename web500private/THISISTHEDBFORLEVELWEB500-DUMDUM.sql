
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
CREATE DATABASE IF NOT EXISTS `hackimweb500` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackimweb500`;
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `useragents` (
  `bid` varchar(10) NOT NULL,
  `agent` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `useragents` (`bid`, `agent`) VALUES
('0x2FAABC49','Mozilla/5.0(WindowsNT6.1;WOW64)AppleWebKit/537.36(KHTML,likeGecko)Chrome/44.0.2403.155Safari/537.36'),
('0X293ABD1F','Mozilla/5.0(WindowsNT6.1;WOW64;Trident/7.0;rv:11.0)likeGecko'),
('0x6AFFBC21','Mozilla/5.0(WindowsNT6.1;WOW64;rv:39.0)Gecko/20100101Firefox/39.0'),
('0x8BDABC43','Mozilla/5.0(WindowsNT6.1;rv:39.0)Gecko/20100101Firefox/39.0');


CREATE TABLE IF NOT EXISTS `accounts` (
  `uid` varchar(5) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `age` int(2) NOT NULL,
  `zipcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `accounts` (`uid`, `uname`, `pwd`, `age`, `zipcode`) VALUES
('10000', 'ori', '6606a19f6345f8d6e998b69778cbf7ed', 28, '89918');

CREATE TABLE IF NOT EXISTS `cryptokey` (
  `id` varchar(5) NOT NULL,
  `keyval` varchar(20) NOT NULL,
  `keyfor` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cryptokey` (`id`, `keyval`, `keyfor`) VALUES
('1', 'TheTormentofTantalus', 'File Access');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
