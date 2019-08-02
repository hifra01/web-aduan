# Host: localhost  (Version 5.5.5-10.1.21-MariaDB)
# Date: 2018-02-12 10:44:04
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tbljabatan"
#

DROP TABLE IF EXISTS `tbljabatan`;
CREATE TABLE `tbljabatan` (
  `IDJabatan` int(11) NOT NULL AUTO_INCREMENT,
  `NamaJabatan` varchar(50) DEFAULT NULL,
  `NA` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`IDJabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tbljabatan"
#


#
# Structure for table "tblkeluhan"
#

DROP TABLE IF EXISTS `tblkeluhan`;
CREATE TABLE `tblkeluhan` (
  `IDKeluhan` int(11) NOT NULL AUTO_INCREMENT,
  `JenisKeluahan` varchar(50) DEFAULT NULL,
  `NA` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`IDKeluhan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tblkeluhan"
#


#
# Structure for table "tblkerusakan"
#

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
  PRIMARY KEY (`IDKerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tblkerusakan"
#


#
# Structure for table "tblperbaikan"
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tblperbaikan"
#


#
# Structure for table "tblunit"
#

DROP TABLE IF EXISTS `tblunit`;
CREATE TABLE `tblunit` (
  `IDUnit` int(11) NOT NULL AUTO_INCREMENT,
  `NamaUnit` varchar(100) DEFAULT NULL,
  `NA` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`IDUnit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tblunit"
#


#
# Structure for table "tbluser"
#

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tbluser"
#

