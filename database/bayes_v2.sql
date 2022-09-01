/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.22-MariaDB : Database - bayes_v2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bayes_v2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bayes_v2`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`) values ('admin','admin');

/*Table structure for table `tb_aturan` */

DROP TABLE IF EXISTS `tb_aturan`;

CREATE TABLE `tb_aturan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(16) DEFAULT NULL,
  `kode_gejala` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `tb_aturan` */

insert  into `tb_aturan`(`ID`,`kode_penyakit`,`kode_gejala`,`nilai`) values (1,'P01','G01',0.2),(2,'P02','G01',0.7),(3,'P03','G01',0.7),(4,'P04','G01',0.6),(5,'P01','G02',0.9),(6,'P02','G02',0.1),(7,'P03','G02',0.2),(8,'P04','G02',0.5),(9,'P01','G03',0.2),(10,'P02','G03',0.7),(11,'P03','G03',0.2),(12,'P04','G03',0.75),(13,'P01','G04',0.2),(14,'P02','G04',0.9),(15,'P03','G04',0.2),(16,'P04','G04',0.2),(17,'P01','G05',0.2),(18,'P02','G05',0.3),(19,'P03','G05',0.2),(20,'P04','G05',0.9),(21,'P01','G06',0.95),(22,'P02','G06',0.3),(23,'P03','G06',0.7),(24,'P04','G06',0.3),(25,'P01','G07',0.2),(26,'P02','G07',0.2),(27,'P03','G07',0.9),(28,'P04','G07',0.5);

/*Table structure for table `tb_gejala` */

DROP TABLE IF EXISTS `tb_gejala`;

CREATE TABLE `tb_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gejala` */

insert  into `tb_gejala`(`kode_gejala`,`nama_gejala`) values ('G01','Panas'),('G02','Sakit Kepala'),('G03','Bersin'),('G04','Batuk'),('G05','Pilek, Hidung Buntu'),('G06','Badan Lemas'),('G07','Kedinginan');

/*Table structure for table `tb_penyakit` */

DROP TABLE IF EXISTS `tb_penyakit`;

CREATE TABLE `tb_penyakit` (
  `kode_penyakit` varchar(16) NOT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`kode_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penyakit` */

insert  into `tb_penyakit`(`kode_penyakit`,`nama_penyakit`,`bobot`,`keterangan`) values ('P01','Anemia',0.5,'Kondisi ketika darah tidak memiliki sel darah merah sehat yang cukup.'),('P02','Bronkitis',0.6,'Radang selaput saluran bronkial, yang membawa udara ke dan dari paru-paru.'),('P03','Demam',0.6,'Peningkatan sementara suhu tubuh rata-rata menjadi 37°C (98,6°F).'),('P04','Flu',0.7,'Suatu infeksi virus umum yang dapat mematikan, terutama di kelompok risiko tinggi.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
