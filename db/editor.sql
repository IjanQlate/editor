-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for editor
CREATE DATABASE IF NOT EXISTS `editor` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `editor`;

-- Dumping structure for table editor.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ilikesomething` varchar(1000) DEFAULT NULL,
  `idontlikesomething` varchar(1000) DEFAULT NULL,
  `ihavesuggestion` text,
  `sendby` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table editor.feedback: ~3 rows (approximately)
DELETE FROM `feedback`;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id`, `ilikesomething`, `idontlikesomething`, `ihavesuggestion`, `sendby`) VALUES
	(1, 'Feedback', '', '', '1'),
	(2, '', 'Feedback', '', '1'),
	(3, '', '', 'Feedback', '1');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table editor.paperwork
CREATE TABLE IF NOT EXISTS `paperwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `paperwork` text,
  `comment` text,
  `status` varchar(250) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `updatedby` varchar(50) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table editor.paperwork: ~0 rows (approximately)
DELETE FROM `paperwork`;
/*!40000 ALTER TABLE `paperwork` DISABLE KEYS */;
INSERT INTO `paperwork` (`id`, `title`, `owner`, `paperwork`, `comment`, `status`, `createddate`, `updatedby`, `lastupdate`) VALUES
	(1, 'Program Usahawan', 'Husna', '', NULL, 'Yes', '2020-10-25 23:04:20', NULL, NULL);
/*!40000 ALTER TABLE `paperwork` ENABLE KEYS */;

-- Dumping structure for table editor.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `group_system` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table editor.user: ~5 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `group_system`) VALUES
	(1, 'Fullname', 'email@email.com', 'username', '$2y$10$kXaYxC1wG0aoyclc3TG6O.45l1y.7IF0kCErPrKquOuxqof.OuvA6', 'Pengarah Program'),
	(2, 'Husna', 'husnayais00@gmail.com', 'husna', '$2y$10$HYiCtfKsl/a8Db3rcWo2W.MUBqmhdJy4LfdN6gQEwUAQ86yRG7Eq.', 'Pengarah Program'),
	(3, 'Noremyliana', 'emylianarahmad@gmail.com', 'noremyliana', '$2y$10$Wask8bRjpugyrXB4aHTCPuXCSqbHYR2lK9iirH3NtoY5SB.VZfcIu', 'Pengarah Program'),
	(4, 'Nuraliah Natasha ', 'aliahnatasha235@gmail.com', 'aliah', '$2y$10$Nvl/WQZyQJOfNhu90CXQveNCyJFlnQZhjTAGJDM05n3C2j6sWgKe6', 'Pengarah Program'),
	(5, 'Pijan', 'pijan@gmail.com', '1', '$2y$10$6YFsFdNb9Mi3SIMv9cbBN.0/b3SjaOs.b1K0EUOrhyQE.aRdftngu', 'Pengarah Program');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
