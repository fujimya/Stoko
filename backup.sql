/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.16 : Database - db_stoko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_stoko` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_stoko`;

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `kode` varchar(100) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga_beli` double DEFAULT '0',
  `harga_jual` double DEFAULT '0',
  `stok` int(11) DEFAULT '0',
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`kode`,`nama_barang`,`harga_beli`,`harga_jual`,`stok`) values ('115151','Buku',10000,10500,44),('15151515','Pensil',9000,1000,20);

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nope` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`id`,`nama`,`nope`,`alamat`) values (2,'Akun 2 Ubah','085754543231','Jl Custom ubah\r\n');

/*Table structure for table `tbl_detail_beli` */

DROP TABLE IF EXISTS `tbl_detail_beli`;

CREATE TABLE `tbl_detail_beli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_beli` */

insert  into `tbl_detail_beli`(`id`,`kode`,`jumlah`,`satuan`,`harga`,`diskon`) values (7,'15151515',20,'PCS',200000,9000),(8,'115151',10,'PCS',10000,9000),(9,'115151',20,'PCS',625000,100),(10,'115151',10,'Pcs',10000,0);

/*Table structure for table `tbl_detail_jual` */

DROP TABLE IF EXISTS `tbl_detail_jual`;

CREATE TABLE `tbl_detail_jual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_detail_jual` */

insert  into `tbl_detail_jual`(`id`,`kode`,`jumlah`,`satuan`,`harga`,`diskon`) values (9,'15151515',20,'PCS',232500,0),(10,'15151515',20,'PCS',625000,0),(11,'115151',1,'PCS',10500,0),(12,'115151',2,'PCS',21000,10000),(13,'115151',3,'PCS',31500,0);

/*Table structure for table `tbl_keranjang` */

DROP TABLE IF EXISTS `tbl_keranjang`;

CREATE TABLE `tbl_keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0',
  `satuan` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT '0',
  `diskon` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_keranjang` */

/*Table structure for table `tbl_keranjang_jual` */

DROP TABLE IF EXISTS `tbl_keranjang_jual`;

CREATE TABLE `tbl_keranjang_jual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0',
  `satuan` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT '0',
  `diskon` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_keranjang_jual` */

/*Table structure for table `tbl_pembelian` */

DROP TABLE IF EXISTS `tbl_pembelian`;

CREATE TABLE `tbl_pembelian` (
  `faktur` varchar(100) NOT NULL,
  `id_suplier` varchar(100) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_beli` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  PRIMARY KEY (`faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pembelian` */

insert  into `tbl_pembelian`(`faktur`,`id_suplier`,`tanggal`,`total_beli`,`diskon`) values ('18ijg1','2','2019-08-06 14:26:08',210000,18000),('aakksmdk','2','2019-08-13 05:42:44',10000,0);

/*Table structure for table `tbl_penjualan` */

DROP TABLE IF EXISTS `tbl_penjualan`;

CREATE TABLE `tbl_penjualan` (
  `faktur` varchar(100) NOT NULL,
  `id_customer` varchar(100) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_jual` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  PRIMARY KEY (`faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_penjualan` */

insert  into `tbl_penjualan`(`faktur`,`id_customer`,`tanggal`,`total_jual`,`diskon`) values ('12q2w2','2','2019-08-06 22:21:34',625000,100),('20190814L2798AC','2','2019-08-14 05:29:15',31500,0),('20190814L6971VI','2','2019-08-14 05:28:10',31500,10000),('222nm','2','2019-08-06 22:23:59',857500,0);

/*Table structure for table `tbl_suplier` */

DROP TABLE IF EXISTS `tbl_suplier`;

CREATE TABLE `tbl_suplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nope` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_suplier` */

insert  into `tbl_suplier`(`id`,`nama`,`nope`,`alamat`) values (2,'Suplier 1','089654543231','Jl Suplier');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `nik` varchar(60) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`nik`,`nama`,`jabatan`,`password`) values ('1212','Gin','PEMILIK','123'),('12345','boni','ADMIN','1234');

/* Trigger structure for table `tbl_detail_beli` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `beli` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `beli` AFTER INSERT ON `tbl_detail_beli` FOR EACH ROW BEGIN
    update tbl_barang set `stok` = `stok` + new.jumlah where kode = new.kode;
    END */$$


DELIMITER ;

/* Trigger structure for table `tbl_detail_jual` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `penjualan` AFTER INSERT ON `tbl_detail_jual` FOR EACH ROW BEGIN
UPDATE tbl_barang SET `stok` = `stok` - new.jumlah WHERE kode = new.kode;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
