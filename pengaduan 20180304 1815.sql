-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.29-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema pengaduan
--

CREATE DATABASE IF NOT EXISTS pengaduan;
USE pengaduan;

--
-- Definition of table `tbljabatan`
--

DROP TABLE IF EXISTS `tbljabatan`;
CREATE TABLE `tbljabatan` (
  `IDJabatan` int(11) NOT NULL AUTO_INCREMENT,
  `NamaJabatan` varchar(50) DEFAULT NULL,
  `NA` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`IDJabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljabatan`
--

/*!40000 ALTER TABLE `tbljabatan` DISABLE KEYS */;
INSERT INTO `tbljabatan` (`IDJabatan`,`NamaJabatan`,`NA`) VALUES 
 (1,'Jabatan 1','N'),
 (2,'Jabatan 2','N'),
 (3,'Jabatan 3','N'),
 (4,'Jabatan 4','N');
/*!40000 ALTER TABLE `tbljabatan` ENABLE KEYS */;


--
-- Definition of table `tblkeluhan`
--

DROP TABLE IF EXISTS `tblkeluhan`;
CREATE TABLE `tblkeluhan` (
  `IDKeluhan` int(11) NOT NULL AUTO_INCREMENT,
  `JenisKeluahan` varchar(50) DEFAULT NULL,
  `NA` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`IDKeluhan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkeluhan`
--

/*!40000 ALTER TABLE `tblkeluhan` DISABLE KEYS */;
INSERT INTO `tblkeluhan` (`IDKeluhan`,`JenisKeluahan`,`NA`) VALUES 
 (1,'Komputer','N'),
 (2,'Printer','N'),
 (3,'Jaringan','N'),
 (4,'Lainnya','N');
/*!40000 ALTER TABLE `tblkeluhan` ENABLE KEYS */;


--
-- Definition of table `tblkerusakan`
--

DROP TABLE IF EXISTS `tblkerusakan`;
CREATE TABLE `tblkerusakan` (
  `IDKerusakan` int(11) NOT NULL AUTO_INCREMENT,
  `IDUser` int(11) DEFAULT NULL,
  `TglLapor` datetime DEFAULT NULL,
  `TglSelesai` datetime DEFAULT NULL,
  `Lokasi` varchar(255) DEFAULT NULL,
  `IDJenisKeluhan` int(11) DEFAULT NULL,
  `DeskripsiKeluhan` text,
  `Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDKerusakan`),
  KEY `IDJenisKeluhan` (`IDJenisKeluhan`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkerusakan`
--

/*!40000 ALTER TABLE `tblkerusakan` DISABLE KEYS */;
INSERT INTO `tblkerusakan` (`IDKerusakan`,`IDUser`,`TglLapor`,`TglSelesai`,`Lokasi`,`IDJenisKeluhan`,`DeskripsiKeluhan`,`Status`) VALUES 
 (15,3,'2018-02-19 08:18:27',NULL,'pop',1,'kok','Dalam Proses'),
 (16,3,'2018-02-19 08:23:19','2018-02-20 09:00:00','poiuiy',1,'pkmdosa','Dalam Proses'),
 (17,3,'2018-02-19 08:23:19','2018-02-26 18:00:00','poiuiy',3,'pkmdosa','Selesai'),
 (18,3,'2018-02-19 08:27:06',NULL,'area1',1,'abcdefg','Selesai'),
 (19,3,'2018-02-19 08:27:06','2018-02-21 00:00:00','area1',2,'abcdefg','Selesai'),
 (20,3,'2018-02-19 08:27:06',NULL,'area1',3,'abcdefg','Selesai'),
 (21,3,'2018-02-19 08:27:06',NULL,'area1',4,'abcdefg','Dalam Proses'),
 (22,3,'2018-02-19 08:27:35',NULL,'area2',1,'1234567','Dalam Proses'),
 (23,3,'2018-02-19 08:27:35','2018-02-18 09:00:00','area2',2,'1234567','Selesai'),
 (24,3,'2018-02-19 08:27:35',NULL,'area2',3,'1234567','Selesai'),
 (25,3,'2018-02-19 08:27:35',NULL,'area2',4,'1234567','Selesai'),
 (26,6,'2018-02-22 08:21:27',NULL,'chrome',2,'chrome','Selesai'),
 (27,6,'2018-02-22 08:21:27',NULL,'chrome',3,'chrome','Selesai'),
 (28,6,'2018-02-22 08:21:28',NULL,'chrome',4,'chrome','Dalam Proses'),
 (29,7,'2018-02-22 08:21:33',NULL,'firefox',2,'firefox','Selesai'),
 (30,7,'2018-02-22 08:21:33',NULL,'firefox',3,'firefox','Selesai'),
 (31,8,'2018-02-22 08:21:38',NULL,'opera',1,'opera','Selesai'),
 (32,8,'2018-02-22 08:21:38','2020-03-22 11:00:00','opera',3,'opera','Selesai'),
 (33,10,'2018-02-24 09:44:00',NULL,'Apso',1,'Dijdjdnsks','Selesai'),
 (34,10,'2018-02-24 09:44:00',NULL,'Apso',3,'Dijdjdnsks','Selesai'),
 (35,10,'2018-02-26 09:21:55',NULL,'Jdonsndodnbskd',1,'Kskdnekdodbbdkdndkdnd','Dalam Proses'),
 (36,10,'2018-02-26 09:21:55',NULL,'Jdonsndodnbskd',2,'Kskdnekdodbbdkdndkdnd','Selesai'),
 (37,10,'2018-02-26 09:21:55','2018-02-26 15:00:00','Jdonsndodnbskd',3,'Kskdnekdodbbdkdndkdnd','Selesai'),
 (38,10,'2018-02-26 09:21:55',NULL,'Jdonsndodnbskd',4,'Kskdnekdodbbdkdndkdnd','Dalam Proses'),
 (39,10,'2018-02-26 09:22:11',NULL,'Bdjoxxkx',1,'Jzisjs','Belum Diproses'),
 (40,10,'2018-02-26 09:22:11',NULL,'Bdjoxxkx',2,'Jzisjs','Belum Diproses'),
 (41,10,'2018-02-26 09:22:11',NULL,'Bdjoxxkx',3,'Jzisjs','Belum Diproses'),
 (42,10,'2018-02-26 09:22:11',NULL,'Bdjoxxkx',4,'Jzisjs','Belum Diproses'),
 (43,1,'2018-02-27 09:03:09','2018-02-27 11:00:00','PDI',1,'Komputer rusak','Selesai'),
 (44,1,'2018-02-27 09:04:33',NULL,'jember',1,'coba aduan ','Belum Diproses'),
 (45,11,'2018-03-02 07:58:34',NULL,'jember',1,'tes admin','Belum Diproses'),
 (46,11,'2018-03-02 07:58:34',NULL,'jember',3,'tes admin','Belum Diproses');
/*!40000 ALTER TABLE `tblkerusakan` ENABLE KEYS */;


--
-- Definition of table `tblperbaikan`
--

DROP TABLE IF EXISTS `tblperbaikan`;
CREATE TABLE `tblperbaikan` (
  `IDPerbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `IDKerusakan` int(11) DEFAULT NULL,
  `IDUser` int(11) DEFAULT NULL,
  `TglTindakan` datetime DEFAULT NULL,
  `TglPenyelesaian` datetime DEFAULT NULL,
  `DeskripsiPerbaikan` text,
  `Status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDPerbaikan`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblperbaikan`
--

/*!40000 ALTER TABLE `tblperbaikan` DISABLE KEYS */;
INSERT INTO `tblperbaikan` (`IDPerbaikan`,`IDKerusakan`,`IDUser`,`TglTindakan`,`TglPenyelesaian`,`DeskripsiPerbaikan`,`Status`) VALUES 
 (10,15,2,'2018-02-26 19:00:00',NULL,'qwerty','Dalam Proses'),
 (11,16,2,'2018-02-19 00:00:00','2018-02-20 00:00:00','qwer','Dalam Proses'),
 (12,17,2,'2018-02-19 18:00:00','2018-02-26 18:00:00','qwerty','Selesai'),
 (13,18,2,'1970-01-01 00:00:00',NULL,'13','Selesai'),
 (14,19,2,'2018-02-20 00:00:00','2018-02-21 00:00:00','a','Selesai'),
 (15,20,2,'2018-02-19 09:00:00','2018-02-19 11:00:00','abc','Selesai'),
 (16,21,2,'2018-05-26 00:00:00',NULL,'QWER','Dalam Proses'),
 (17,22,2,'2018-02-20 00:00:00',NULL,'aa','Dalam Proses'),
 (18,23,2,'2018-02-21 00:00:00',NULL,'a','Dalam Proses'),
 (19,28,1,'2018-02-24 09:05:00',NULL,'','Dalam Proses'),
 (20,27,1,'2018-02-24 09:05:00','2018-02-25 13:00:00','poo','Selesai'),
 (21,24,2,'2018-02-24 11:15:00','2018-02-24 11:00:00','Jzkxjxuxjsksmsj','Selesai'),
 (22,25,1,'2018-02-26 08:49:00',NULL,'','Selesai'),
 (23,30,1,'2018-02-26 08:53:00',NULL,'','Selesai'),
 (24,31,1,'2018-02-26 08:54:00',NULL,'a','Selesai'),
 (25,26,1,'2018-02-26 09:03:00',NULL,'','Selesai'),
 (26,0,1,'2018-02-26 09:10:00',NULL,'a','Dalam Proses'),
 (27,33,1,'2018-02-26 09:11:00','2018-02-26 11:00:00','a','Selesai'),
 (28,29,1,'2018-02-26 09:11:00',NULL,'a','Selesai'),
 (29,32,1,'2018-02-26 09:13:00','2020-03-22 11:00:00','aadsfgdsafghds','Selesai'),
 (30,34,1,'2018-02-26 09:19:00',NULL,'a','Selesai'),
 (31,35,1,'2018-02-26 09:23:00','2018-02-26 11:00:00','','Dalam Proses'),
 (32,36,1,'2018-02-26 09:25:00',NULL,'','Selesai'),
 (33,37,1,'2018-02-26 09:26:00','2018-02-26 15:00:00','','Selesai'),
 (34,38,1,'2018-02-26 09:27:00',NULL,'','Dalam Proses'),
 (35,43,1,'2018-02-27 09:03:00','2018-02-27 11:00:00','RAM rusak','Selesai');
/*!40000 ALTER TABLE `tblperbaikan` ENABLE KEYS */;


--
-- Definition of table `tblunit`
--

DROP TABLE IF EXISTS `tblunit`;
CREATE TABLE `tblunit` (
  `IDUnit` int(11) NOT NULL AUTO_INCREMENT,
  `NamaUnit` varchar(100) DEFAULT NULL,
  `NA` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`IDUnit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblunit`
--

/*!40000 ALTER TABLE `tblunit` DISABLE KEYS */;
INSERT INTO `tblunit` (`IDUnit`,`NamaUnit`,`NA`) VALUES 
 (1,'Unit A','N'),
 (2,'Unit B','N'),
 (3,'Unit C','N'),
 (4,'Unit D','N');
/*!40000 ALTER TABLE `tblunit` ENABLE KEYS */;


--
-- Definition of table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `UserLogin` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `LevelID` int(11) DEFAULT NULL,
  `IDUnit` int(11) DEFAULT NULL,
  `IDJabatan` int(11) DEFAULT NULL,
  `Telp` varchar(13) DEFAULT NULL,
  `NA` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`IdUser`,`UserLogin`,`Password`,`Nama`,`LevelID`,`IDUnit`,`IDJabatan`,`Telp`,`NA`) VALUES 
 (1,'superuser','superuser',NULL,1,NULL,NULL,NULL,'N'),
 (2,'teknisi','teknisi',NULL,2,NULL,NULL,NULL,'N'),
 (3,'pegawai','pegawai',NULL,3,NULL,NULL,NULL,'N'),
 (4,'tester','1234','Tester 1',3,1,2,'090909090909','N'),
 (5,'tester2','1234','Tester 22',3,3,1,'','N'),
 (6,'chrome','chrome','chrome',3,2,1,'145','N'),
 (7,'firefox','firefox','Firefox Browser',3,2,1,'','N'),
 (8,'opera','opera','Opera Browser',3,4,2,'','N'),
 (9,'teknisi.opera','opera','Teknisi Opera',2,3,2,'','N'),
 (10,'mobile','123','Mobile Chrome',3,4,2,'3791375816','N'),
 (11,'admin','admin','Admin',1,1,1,'','N');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
