/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - db_amanah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_amanah` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_amanah`;

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_supplier` varchar(15) DEFAULT NULL,
  `id_kategori` varchar(15) DEFAULT NULL,
  `satuan` varchar(250) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`nama_barang`,`id_supplier`,`id_kategori`,`satuan`,`harga`,`stok`) values 
('BRG0001','Cat Avian 5 KG','SUP02','KAT01','Pcs',45000,150),
('BRG0002','Cat Nippon 10kg','SUP01','KAT01','Pcs',70000,90),
('BRG0003','Semen Gresik','SUP01','KAT02','Pcs',50000,40),
('BRG0004','Besi 7 Meter','SUP04','KAT05','Pcs',70000,75);

/*Table structure for table `tb_barang_keluar` */

DROP TABLE IF EXISTS `tb_barang_keluar`;

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `harga_jual` int(75) NOT NULL,
  `jumlah` int(75) NOT NULL,
  `total_harga` int(75) NOT NULL,
  PRIMARY KEY (`id_barang_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_barang_keluar` */

insert  into `tb_barang_keluar`(`id_barang_keluar`,`tanggal`,`id_barang`,`harga_jual`,`jumlah`,`total_harga`) values 
('BK2021051415283E','2021-05-14','BRG0002',100000,10,10000),
('BK2021051716298Z','2021-05-17','BRG0003',100000,10,2000000),
('BK2021051813520D','2021-05-18','BRG0001',5500,5,100000);

/*Table structure for table `tb_barang_masuk` */

DROP TABLE IF EXISTS `tb_barang_masuk`;

CREATE TABLE `tb_barang_masuk` (
  `id_barang_masuk` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_nota` varchar(50) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `harga_beli` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total_harga` int(50) NOT NULL,
  PRIMARY KEY (`id_barang_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_barang_masuk` */

insert  into `tb_barang_masuk`(`id_barang_masuk`,`tanggal`,`no_nota`,`id_barang`,`harga_beli`,`jumlah`,`total_harga`) values 
('BM2021051415209','2021-05-17','INV001','BRG0001',40000,45,1800000),
('BM2021051813500','2021-05-18','123','BRG0001',5000,10,50000);

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`nama_kategori`) values 
('KAT01','Cat Tembok'),
('KAT02','Semen'),
('KAT03','Keramik'),
('KAT04','Bahan Bagunan'),
('KAT05','Besi');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`id_supplier`,`nama_supplier`,`no_telepon`,`alamat`) values 
('SUP01','PT. Bagun Rumah','082147210088','bumiayu, brebes'),
('SUP02','PT. Makmur Jaya','082147210088','Sleman, Yogyakarta'),
('SUP03','PT. Indodax','081282761775','Jakarta, DKI'),
('SUP04','PT. Tokocripto','081282761778','Wonosari, Gunung Kidul');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(25) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`nama`,`alamat`,`no_hp`,`jabatan`,`password`,`foto`) values 
('USR04','gudang','adi','jalan','0887555','admin gudang','$2y$10$nsrwZZjCfuxpDx3ckkD5juE8u26/YbTR33xpX1MqZ87zs3Gt57sVq','user.png'),
('USR05','pemilik','aas','jjl','9076','pemilik','$2y$10$3SQVqL1UQEwn4Rs4StyrgebHDsOy74tIsdF3.BIF81Yq0HBDmqwmq','user.png'),
('USR06','superadmin','ddd','aaa','2222','superadmin','$2y$10$3SQVqL1UQEwn4Rs4StyrgebHDsOy74tIsdF3.BIF81Yq0HBDmqwmq','user.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
