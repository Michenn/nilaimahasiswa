# Host: localhost  (Version 5.5.5-10.4.18-MariaDB)
# Date: 2021-06-20 21:26:32
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "mahasiswa"
#

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `absen` int(3) NOT NULL,
  `tugas` int(3) NOT NULL,
  `nilaiakhir` int(3) NOT NULL,
  `nilaihuruf` varchar(1) NOT NULL,
  `potonganharga` int(11) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=12174153 DEFAULT CHARSET=utf8mb4;

#
# Data for table "mahasiswa"
#

INSERT INTO `mahasiswa` VALUES (1217413,'guru',80,80,80,80,80,'b',NULL),(1217415,'Ed',90,90,90,90,90,'a',NULL),(1217419,'Test',80,80,80,80,80,'B',NULL),(12174101,'mr.m',90,80,80,80,83,'B',40),(12174152,'guru',90,80,80,70,80,'B',NULL);
