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

-- Dumping data for table editor.feedback: ~2 rows (approximately)
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
  `paperwork` longtext,
  `comment` text,
  `status` varchar(250) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `updatedby` varchar(50) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `commentby` varchar(50) DEFAULT NULL,
  `datecomment` datetime DEFAULT NULL,
  `approveby` varchar(50) DEFAULT NULL,
  `dateapprove` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table editor.paperwork: ~7 rows (approximately)
DELETE FROM `paperwork`;
/*!40000 ALTER TABLE `paperwork` DISABLE KEYS */;
INSERT INTO `paperwork` (`id`, `title`, `owner`, `paperwork`, `comment`, `status`, `createddate`, `updatedby`, `lastupdate`, `commentby`, `datecomment`, `approveby`, `dateapprove`) VALUES
	(4, 'Title Baru Laa', 'Pijan', 'a:2:{i:0;s:12:"<p>21312</p>";i:1;s:14:"<p>sdasdas</p>";}', 'Date Comment: 2020-10-27 02:10:23 AM, Comment:Update page,Date Comment: 2020-10-27 02:10:36 AM, Comment: 1231', 'Approved', '2020-10-27 01:35:39', 'Pijan', '2020-10-27 10:13:30', 'Sokongan', '2020-10-27 10:54:36', 'Pengarah', '2020-10-27 11:19:04'),
	(5, 'Title Paperwork', 'Pijan', 'a:3:{i:0;s:13:"<p>PAGE 1</p>";i:1;s:17:"<p>PAGE 2<br></p>";i:2;s:17:"<p>PAGE 3<br></p>";}', 'Date Comment: 2020-10-27 03:10:00 AM, Comment: Testing', 'Approved', '2020-10-27 01:41:06', NULL, NULL, 'Sokongan', '2020-10-27 11:05:00', 'Pengarah', '2020-10-27 11:19:13'),
	(6, 'Title Paperwork', 'Pijan', 'a:3:{i:0;s:13:"<p>PAGE 1</p>";i:1;s:17:"<p>PAGE 2<br></p>";i:2;s:17:"<p>PAGE 3<br></p>";}', NULL, 'Pending Approval', '2020-10-27 01:43:21', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Title Paperwork', 'Pijan', 'a:3:{i:0;s:13:"<p>PAGE 1</p>";i:1;s:17:"<p>PAGE 2<br></p>";i:2;s:17:"<p>PAGE 3<br></p>";}', NULL, 'Pending Approval', '2020-10-27 01:44:21', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'Title Paperwork', 'Pijan', 'a:2:{i:0;s:13:"<p>Page 1</p>";i:1;s:13:"<p>Page 2</p>";}', NULL, 'Pending Approval', '2020-10-27 01:50:03', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'Paperwork', 'Pijan', 'a:2:{i:0;s:13:"<p>PAGE 1</p>";i:1;s:13:"<p>PAGE 2</p>";}', NULL, 'Pending Approval', '2020-10-27 01:50:29', NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'PROJEK USAHAWAN BARU', 'Pijan', 'a:3:{i:0;s:21:"<p>SELAMAT DATANG</p>";i:1;s:19:"<p>TERIMA KASIH</p>";i:2;s:13:"<p>SEKIAN</p>";}', NULL, 'Pending Approval', '2020-10-27 09:42:53', 'Pijan', '2020-10-27 10:12:29', NULL, NULL, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table editor.user: ~7 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `group_system`) VALUES
	(1, 'Fullname', 'email@email.com', 'username', '$2y$10$kXaYxC1wG0aoyclc3TG6O.45l1y.7IF0kCErPrKquOuxqof.OuvA6', 'Pengarah Program'),
	(2, 'Husna', 'husnayais00@gmail.com', 'husna', '$2y$10$HYiCtfKsl/a8Db3rcWo2W.MUBqmhdJy4LfdN6gQEwUAQ86yRG7Eq.', 'Pengarah Program'),
	(3, 'Noremyliana', 'emylianarahmad@gmail.com', 'noremyliana', '$2y$10$Wask8bRjpugyrXB4aHTCPuXCSqbHYR2lK9iirH3NtoY5SB.VZfcIu', 'Pengarah Program'),
	(4, 'Nuraliah Natasha ', 'aliahnatasha235@gmail.com', 'aliah', '$2y$10$Nvl/WQZyQJOfNhu90CXQveNCyJFlnQZhjTAGJDM05n3C2j6sWgKe6', 'Pengarah Program'),
	(5, 'Pengarah Program', 'pijan@gmail.com', '1', '$2y$10$6YFsFdNb9Mi3SIMv9cbBN.0/b3SjaOs.b1K0EUOrhyQE.aRdftngu', 'Pengarah Program'),
	(6, 'Sokongan', '2@2', '2', '$2y$10$Qv7VeHTnxpSzlWsKR92jPu4.9aRbJW5VEyr6zvyPwAlNson02hjz.', 'Sokongan'),
	(7, 'Pengarah', '3@3', '3', '$2y$10$dKrZWbvskoXioWG5r28Efeo8rMJEpezBnyXlC1oZ1R3seHge17YL.', 'Pengarah');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
