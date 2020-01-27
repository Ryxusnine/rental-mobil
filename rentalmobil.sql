/*
Navicat MySQL Data Transfer

Source Server         : ryanmidzar
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rentalmobil

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-18 11:11:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `kendaraan`
-- ----------------------------
DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE `kendaraan` (
  `IdKendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `NoPlat` varchar(10) NOT NULL,
  `KdMerk` varchar(20) NOT NULL,
  `IdType` varchar(10) NOT NULL,
  `StatusRental` enum('Kosong','Dipesan','Jalan') NOT NULL,
  `HargaSewa` double(10,0) NOT NULL,
  `FotoMobil` varchar(100) NOT NULL,
  PRIMARY KEY (`IdKendaraan`,`NoPlat`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kendaraan
-- ----------------------------
INSERT INTO `kendaraan` VALUES ('39', 'DD 1234 UK', 'TYT', 'FTNR', 'Kosong', '750000', 'FotoMobil-1573437043-11-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('40', 'DD 6732 QQ', 'TYT', 'TAVZ', 'Jalan', '500000', 'FotoMobil-1573437057-11-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('41', 'DW 1450 QU', 'MTSHB', 'XPNR', 'Kosong', '870000', 'FotoMobil-1573539881-12-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('42', 'DD 1450 NU', 'TYT', 'AGY', 'Kosong', '450000', 'FotoMobil-1573725255-14-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('43', 'DD 1517 TT', 'TYT', 'TINV', 'Kosong', '500000', 'FotoMobil-1573725292-14-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('44', 'DD 7891 JK', 'ISZ', 'PNTR', 'Kosong', '350000', 'FotoMobil-1573725326-14-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('45', 'DD 2222 MO', 'SZK', 'SAPV', 'Kosong', '770000', 'FotoMobil-1573725379-14-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('46', 'DD 9879 OQ', 'SZK', 'SERG', 'Kosong', '600000', 'FotoMobil-1573725416-14-Nov-2019.jpg');
INSERT INTO `kendaraan` VALUES ('47', 'DD 3456 SJ', 'TYT', 'XNIA', 'Kosong', '455000', 'FotoMobil-1573725460-14-Nov-2019.jpg');

-- ----------------------------
-- Table structure for `merk`
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `KdMerk` varchar(50) NOT NULL,
  `NmMerk` varchar(50) NOT NULL,
  PRIMARY KEY (`KdMerk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of merk
-- ----------------------------
INSERT INTO `merk` VALUES ('DHTS', 'Daihatsu');
INSERT INTO `merk` VALUES ('HND', 'Honda');
INSERT INTO `merk` VALUES ('ISZ', 'Isuzu');
INSERT INTO `merk` VALUES ('MTSHB', 'Mitsubishi');
INSERT INTO `merk` VALUES ('NSN', 'Nissan');
INSERT INTO `merk` VALUES ('SZK', 'Suzuki');
INSERT INTO `merk` VALUES ('TYT', 'Toyota');

-- ----------------------------
-- Table structure for `sopir`
-- ----------------------------
DROP TABLE IF EXISTS `sopir`;
CREATE TABLE `sopir` (
  `IdSopir` int(11) NOT NULL AUTO_INCREMENT,
  `NmSopir` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `NoSim` char(20) NOT NULL,
  `TarifPerhari` double(10,0) NOT NULL,
  `StatusSopir` enum('Riding','Free','Booked') NOT NULL,
  PRIMARY KEY (`IdSopir`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sopir
-- ----------------------------
INSERT INTO `sopir` VALUES ('8', '-', '-', '-', '-', '0', 'Free');
INSERT INTO `sopir` VALUES ('9', 'Muh Atma Nugraha', 'Kantor Transmigrasi', '08912345678', '73711118080', '350000', 'Free');
INSERT INTO `sopir` VALUES ('10', 'Sahrul Bintang', 'Batua', '08198765432', '73712348080', '300000', 'Free');
INSERT INTO `sopir` VALUES ('11', 'Dominic Toretto', 'Makassar', '087800517800', '73756788080', '550000', 'Free');
INSERT INTO `sopir` VALUES ('12', 'Hobs', 'Makassar', '08987654321', '73710108888', '225000', 'Riding');

-- ----------------------------
-- Table structure for `transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `NoTransaksi` char(8) NOT NULL,
  `NIK` char(13) DEFAULT NULL,
  `Id_Mobil` varchar(10) DEFAULT NULL,
  `Tanggal_Pesan` date DEFAULT NULL,
  `Tanggal_Pinjam` date DEFAULT NULL,
  `Tanggal_Kembali_Rencana` date DEFAULT NULL,
  `Tanggal_Kembali_Sebenarnya` date DEFAULT NULL,
  `LamaRental` int(3) DEFAULT NULL,
  `LamaDenda` int(3) DEFAULT NULL,
  `Kerusakan` text,
  `Id_Sopir` char(6) DEFAULT NULL,
  `BiayaBBM` double(10,0) DEFAULT NULL,
  `BiayaKerusakan` double(10,0) DEFAULT NULL,
  `Denda` double(10,0) DEFAULT NULL,
  `Total_Bayar` double(10,0) DEFAULT NULL,
  `Jumlah_Bayar` double(10,0) DEFAULT NULL,
  `Kembalian` double(10,0) DEFAULT NULL,
  `StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai') DEFAULT NULL,
  PRIMARY KEY (`NoTransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('T000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `transaksi` VALUES ('T001', '172060', 'DD 1234 UK', '2019-11-14', '2019-11-14', '2019-11-15', '2019-11-15', '1', '0', 'Spion kanan patah', '10', '150000', '65000', '0', '1050000', '1300000', '35000', 'Selesai');
INSERT INTO `transaksi` VALUES ('T002', '172036', 'DD 2222 MO', '2019-11-14', '2019-11-15', '2019-11-17', null, '2', null, null, '8', null, null, null, '1540000', null, null, 'Batal');
INSERT INTO `transaksi` VALUES ('T003', '172037', 'DD 3456 SJ', '2019-11-14', '2019-11-21', '2019-11-23', null, '2', null, null, '9', null, null, null, '1610000', null, null, 'Batal');
INSERT INTO `transaksi` VALUES ('T004', '172041', 'DD 1450 NU', '2019-11-14', '2019-11-14', '2019-11-15', '2019-11-18', '1', '3', 'Tidak ada Kerusakan', '11', '50000', '0', '150000', '1000000', '1400000', '50000', 'Selesai');
INSERT INTO `transaksi` VALUES ('T005', '172039', 'DD 6732 QQ', '2019-11-14', '2019-11-16', '2019-11-21', null, '5', null, null, '12', null, null, null, '3625000', null, null, 'Batal');
INSERT INTO `transaksi` VALUES ('T006', '7271111807700', 'DD 6732 QQ', '2019-11-15', '2019-11-15', '2019-11-20', null, '5', null, null, '12', null, null, null, '3625000', null, null, 'Mulai');

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `IdType` varchar(20) NOT NULL,
  `NmType` varchar(50) NOT NULL,
  `KdMerk` varchar(50) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('', '', 'Pilih Kode Merk');
INSERT INTO `type` VALUES ('AGY', 'Agya', 'TYT');
INSERT INTO `type` VALUES ('FTNR', 'Fortuner', 'MTSHB');
INSERT INTO `type` VALUES ('PNTR', 'Phanter LS', 'ISZ');
INSERT INTO `type` VALUES ('SAPV', 'Apv Arena', 'SZK');
INSERT INTO `type` VALUES ('SERG', 'Ertiga Gs', 'SZK');
INSERT INTO `type` VALUES ('TAVZ', 'Avanza Vebs', 'TYT');
INSERT INTO `type` VALUES ('TINV', 'Innova Sporty', 'TYT');
INSERT INTO `type` VALUES ('XNIA', 'Xenia', 'TYT');
INSERT INTO `type` VALUES ('XPNR', 'Expander', 'MTSHB');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` char(13) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `JenisKelamin` enum('L','P') DEFAULT NULL,
  `Alamat` text,
  `telepon` varchar(13) DEFAULT NULL,
  `Posisi` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`NIK`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('14', '', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, null, null, '1');
INSERT INTO `users` VALUES ('16', '172038', 'Muh Ilham Pratama', 'Ilo27', 'a8ea7b98b8a724a68d909b6b924117d2', 'L', 'BTN Dwi Dharma', '08111111111', '2');
INSERT INTO `users` VALUES ('17', '172040', 'Muh Rafly Hisyam', 'Mancung', 'd41d8cd98f00b204e9800998ecf8427e', 'L', 'Sudiang', '08522222222', '2');
INSERT INTO `users` VALUES ('18', '172001', 'Suci Sekali', 'suci', '1cc6545f956f39a79c80b05f65df3c0a', 'P', 'Makassar', '08933333333', '2');
INSERT INTO `users` VALUES ('20', '172037', 'Muh Fajar Putra Ramadhan', 'Fjr14', '4af7ba308a90793ea11999b279806720', 'L', 'Regency', '08123456789', '3');
INSERT INTO `users` VALUES ('21', '172060', 'Mitra', 'Cxxuvy', 'e7e267bf763a26871ef64ce63293987b', 'L', 'Tunas Jaya Motor', '08234567891', '3');
INSERT INTO `users` VALUES ('22', '172041', 'Muh Saiful', 'Ms7', '2ccf8a8fc770f1c5e3daa13a2c6c19e2', 'L', 'Laikang', '08567891234', '3');
INSERT INTO `users` VALUES ('23', '172036', 'Sarada Hyuga', 'Hyuga', 'c43b1293fc1130d5a77a67eb64828f27', 'P', 'Makassar', '087891234567', '3');
INSERT INTO `users` VALUES ('24', '172039', 'Abel Ardhana S', 'Jnzz ', 'ef1610c716fd0d0f8cfa404edabebbae', 'L', 'Sudiang', '08756789102', '3');
INSERT INTO `users` VALUES ('25', '7271111807700', 'Muhammad Yasir', 'YasirSensei', '6e40f2beb69273ac83a27b668d8a4cf9', 'L', 'Perumahan Gelora', '081355967133', '3');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nmposisi` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', 'Admin');
INSERT INTO `user_role` VALUES ('2', 'Karyawan');
INSERT INTO `user_role` VALUES ('3', 'Pelanggan');

-- ----------------------------
-- View structure for `view_kendaraan`
-- ----------------------------
DROP VIEW IF EXISTS `view_kendaraan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kendaraan` AS select `kendaraan`.`NoPlat` AS `NoPlat`,`kendaraan`.`KdMerk` AS `KdMerk`,`kendaraan`.`IdType` AS `IdType`,`kendaraan`.`StatusRental` AS `StatusRental`,`kendaraan`.`HargaSewa` AS `HargaSewa`,`kendaraan`.`FotoMobil` AS `FotoMobil`,`merk`.`NmMerk` AS `NmMerk`,`type`.`NmType` AS `NmType`,`kendaraan`.`IdKendaraan` AS `IdKendaraan` from ((`kendaraan` join `merk` on((`kendaraan`.`KdMerk` = `merk`.`KdMerk`))) join `type` on((`kendaraan`.`IdType` = `type`.`IdType`))) ;

-- ----------------------------
-- View structure for `view_transaksi`
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi` AS select `transaksi`.`NoTransaksi` AS `NoTransaksi`,`transaksi`.`NIK` AS `NIK`,`transaksi`.`Id_Mobil` AS `Id_Mobil`,`transaksi`.`Tanggal_Pesan` AS `Tanggal_Pesan`,`transaksi`.`Tanggal_Pinjam` AS `Tanggal_Pinjam`,`transaksi`.`Tanggal_Kembali_Rencana` AS `Tanggal_Kembali_Rencana`,`transaksi`.`Tanggal_Kembali_Sebenarnya` AS `Tanggal_Kembali_Sebenarnya`,`transaksi`.`LamaRental` AS `LamaRental`,`transaksi`.`LamaDenda` AS `LamaDenda`,`transaksi`.`Kerusakan` AS `Kerusakan`,`transaksi`.`Id_Sopir` AS `Id_Sopir`,`transaksi`.`BiayaBBM` AS `BiayaBBM`,`transaksi`.`BiayaKerusakan` AS `BiayaKerusakan`,`transaksi`.`Denda` AS `Denda`,`transaksi`.`Total_Bayar` AS `Total_Bayar`,`transaksi`.`Jumlah_Bayar` AS `Jumlah_Bayar`,`transaksi`.`Kembalian` AS `Kembalian`,`transaksi`.`StatusTransaksi` AS `StatusTransaksi`,`users`.`id` AS `id`,`users`.`nama` AS `nama`,`users`.`nama_user` AS `nama_user`,`sopir`.`NmSopir` AS `NmSopir`,`sopir`.`TarifPerhari` AS `TarifPerhari`,`view_kendaraan`.`HargaSewa` AS `HargaSewa`,`view_kendaraan`.`NmMerk` AS `NmMerk`,`view_kendaraan`.`NmType` AS `NmType`,`users`.`telepon` AS `telepon`,`view_kendaraan`.`NoPlat` AS `NoPlat` from (((`transaksi` join `sopir` on((`transaksi`.`Id_Sopir` = `sopir`.`IdSopir`))) join `users` on((`transaksi`.`NIK` = `users`.`NIK`))) join `view_kendaraan` on((`transaksi`.`Id_Mobil` = `view_kendaraan`.`NoPlat`))) ;

-- ----------------------------
-- View structure for `view_type`
-- ----------------------------
DROP VIEW IF EXISTS `view_type`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_type` AS select `type`.`IdType` AS `IdType`,`type`.`NmType` AS `NmType`,`type`.`KdMerk` AS `KdMerk`,`merk`.`NmMerk` AS `NmMerk` from (`type` join `merk` on((`type`.`KdMerk` = `merk`.`KdMerk`))) ;

-- ----------------------------
-- View structure for `view_users`
-- ----------------------------
DROP VIEW IF EXISTS `view_users`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users` AS select `users`.`id` AS `id`,`users`.`NIK` AS `NIK`,`users`.`nama` AS `nama`,`users`.`nama_user` AS `nama_user`,`users`.`password` AS `password`,`users`.`JenisKelamin` AS `JenisKelamin`,`users`.`Alamat` AS `Alamat`,`users`.`telepon` AS `telepon`,`rentalmobil`.`users`.`Foto` AS `Foto`,`rentalmobil`.`users`.`Posisi` AS `Posisi`,`rentalmobil`.`user_role`.`Nmposisi` AS `Nmposisi` from (`user_role` join `users` on((`rentalmobil`.`users`.`Posisi` = `rentalmobil`.`user_role`.`id`))) ;
