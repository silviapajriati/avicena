/*
SQLyog Professional v12.4.3 (32 bit)
MySQL - 5.5.16 : Database - avicena
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`avicena` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `avicena`;

/*Table structure for table `seqno` */

DROP TABLE IF EXISTS `seqno`;

CREATE TABLE `seqno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sfield` varchar(20) DEFAULT NULL,
  `stable` varchar(20) DEFAULT NULL,
  `lastno` varchar(50) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `seqno` */

insert  into `seqno`(`id`,`sfield`,`stable`,`lastno`) values 
(1,'daftar_no','tb_daftar','AVCN-1808-024');

/*Table structure for table `tb_daftar` */

DROP TABLE IF EXISTS `tb_daftar`;

CREATE TABLE `tb_daftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_daftar` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `t_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `alamat` text,
  `telp` int(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `asalsekolah` varchar(100) DEFAULT NULL,
  `n_ayah` varchar(50) DEFAULT NULL,
  `k_ayah` varchar(50) DEFAULT NULL,
  `n_ibu` varchar(50) DEFAULT NULL,
  `p_ibu` varchar(50) DEFAULT NULL,
  `telp_ortu` int(20) DEFAULT NULL,
  `hasil` varchar(50) DEFAULT NULL,
  `uploader` varchar(50) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `gelombang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_daftar`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `tb_daftar` */

insert  into `tb_daftar`(`id`,`no_daftar`,`nama`,`jurusan`,`t_lahir`,`tgl_lahir`,`jk`,`alamat`,`telp`,`email`,`agama`,`asalsekolah`,`n_ayah`,`k_ayah`,`n_ibu`,`p_ibu`,`telp_ortu`,`hasil`,`uploader`,`upload_date`,`gelombang`) values 
(32,'AVCN-1808-021','IKACUY','1','Tangerang','2018-08-15','P','Tangerang',218439431,'ikacuy@gmail.com','Islam','SMP ','M','HH','BSD','FJBASKJ',840984774,'2','admin','2018-08-23','1'),
(33,'AVCN-1808-022','Silvia','4','','0000-00-00','L','',0,'','Islam','','','','','',0,'1','admin','2018-08-24','1'),
(35,'AVCN-1808-024','jk','3','jk','2018-08-09','L','k',123,'a@gmail.com','Islam','h','h','h','h','h',0,'1','admin','2018-08-24','2');

/*Table structure for table `tb_jadwal` */

DROP TABLE IF EXISTS `tb_jadwal`;

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gelombang` varchar(50) DEFAULT NULL,
  `tgl_start` date DEFAULT NULL,
  `tgl_end` date DEFAULT NULL,
  `tgl_tes` date DEFAULT NULL,
  `tgl_hasil` date DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jadwal` */

insert  into `tb_jadwal`(`id`,`gelombang`,`tgl_start`,`tgl_end`,`tgl_tes`,`tgl_hasil`,`tgl_daftar`) values 
(1,'Gelombang I','2018-01-22','2018-04-30','2018-05-01','2018-08-24','2018-05-03'),
(2,'Gelombang II','2018-05-02','2018-09-30','2018-10-01','2018-08-24','2018-10-03');

/*Table structure for table `tb_kuota` */

DROP TABLE IF EXISTS `tb_kuota`;

CREATE TABLE `tb_kuota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(100) DEFAULT NULL,
  `kelas` int(10) DEFAULT NULL,
  `siswa` int(10) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kuota` */

insert  into `tb_kuota`(`id`,`jurusan`,`kelas`,`siswa`) values 
(1,'Multimedia',3,90),
(2,'Administrasi Perkantoran',2,80),
(3,'Akuntansi',2,80),
(4,'Teknik Kendaraan Ringan (TKR)',2,80),
(5,'Teknik Sepeda Motor (TSM)',2,80),
(6,'Teknik Komputer dan Jaringan (TKJ)',2,80);

/*Table structure for table `tb_visimisi` */

DROP TABLE IF EXISTS `tb_visimisi`;

CREATE TABLE `tb_visimisi` (
  `id` int(11) NOT NULL,
  `teks` text,
  `update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_visimisi` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `priv` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`username`,`pass`,`email`,`priv`) values 
('admin','admin','admin@gmail.com','1'),
('silvia','silvia','silvia@gmail.com','0'),
('aa','','','0'),
('ika','ika','ika','0'),
('cui','cui','cui','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
