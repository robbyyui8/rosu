/*
Navicat MySQL Data Transfer

Source Server         : mysql_lawas
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : ucpapps

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2015-02-23 21:22:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actor_weight`
-- ----------------------------
DROP TABLE IF EXISTS `actor_weight`;
CREATE TABLE `actor_weight` (
  `ID_ACTOR_WEIGHT` int(10) NOT NULL AUTO_INCREMENT,
  `KLASIFIKASI_AKTOR` text NOT NULL,
  `TIPE_AKTOR` varchar(125) DEFAULT NULL,
  `BOBOT` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID_ACTOR_WEIGHT`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actor_weight
-- ----------------------------
INSERT INTO `actor_weight` VALUES ('1', 'Berinteraksi dengan Baris  atau Command Prompt', 'Simple', '1');
INSERT INTO `actor_weight` VALUES ('2', 'Berinteraksi dengan Protokol komunikasi seperti (e.g. TCP/IP.FTP,HTTP,database)', 'Average', '2');
INSERT INTO `actor_weight` VALUES ('3', 'Berinterkasi dengan GUI atau webpage', 'Complex', '3');

-- ----------------------------
-- Table structure for `aktivitas`
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas`;
CREATE TABLE `aktivitas` (
  `ID_AKTIVITAS` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_AKTIVITAS` varchar(125) DEFAULT NULL,
  `ID_PROFESI` int(10) DEFAULT NULL,
  `ID_METODE_AKTIVITAS` int(10) DEFAULT NULL,
  `PRESENTASE` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_AKTIVITAS`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aktivitas
-- ----------------------------
INSERT INTO `aktivitas` VALUES ('6', 'Requirements', '2', '1', '7.50');
INSERT INTO `aktivitas` VALUES ('7', 'Specifications and Design', '2', '1', '17.50');
INSERT INTO `aktivitas` VALUES ('8', 'Coding', '1', '1', '10.00');
INSERT INTO `aktivitas` VALUES ('9', 'Integration and Testing', '4', '1', '7.00');
INSERT INTO `aktivitas` VALUES ('10', 'Project management', '3', '1', '7.00');
INSERT INTO `aktivitas` VALUES ('11', 'Configuration Management', '2', '1', '4.00');
INSERT INTO `aktivitas` VALUES ('12', 'Documentation', '5', '1', '4.00');
INSERT INTO `aktivitas` VALUES ('13', 'Acceptance and Development', '3', '1', '6.00');
INSERT INTO `aktivitas` VALUES ('14', 'Quality and Assurance Testing', '4', '1', '12.50');
INSERT INTO `aktivitas` VALUES ('15', 'Evaluation and TEsting', '4', '0', '24.50');

-- ----------------------------
-- Table structure for `environment_factor`
-- ----------------------------
DROP TABLE IF EXISTS `environment_factor`;
CREATE TABLE `environment_factor` (
  `ID_ECF` int(10) NOT NULL AUTO_INCREMENT,
  `INDIKATOR` varchar(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_ECF`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of environment_factor
-- ----------------------------
INSERT INTO `environment_factor` VALUES ('3', 'E1', ' Familiar dengan proses yang digunakan', '1.00');
INSERT INTO `environment_factor` VALUES ('4', 'E2', 'Pengalaman dengan Apliaksi', '0.00');
INSERT INTO `environment_factor` VALUES ('5', 'E3', 'Pengalaman Team dengan OOP', '1.00');
INSERT INTO `environment_factor` VALUES ('6', 'E4', 'Kemampuan memimpin analisis', '0.00');
INSERT INTO `environment_factor` VALUES ('7', 'E5', 'Motovasi TIM', '1.00');
INSERT INTO `environment_factor` VALUES ('8', 'E6', 'STABILITAS KEBUTUHAN', '2.00');
INSERT INTO `environment_factor` VALUES ('9', 'E7', 'PEKERJA YANG PARUH WAKTU', '-1.00');
INSERT INTO `environment_factor` VALUES ('10', 'E8', 'TINGKAT KESULITAN BAHASA PEMROGRAMAN', '-1.00');

-- ----------------------------
-- Table structure for `log_actor_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_actor_weight`;
CREATE TABLE `log_actor_weight` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `NAMA_AKTOR` varchar(10) DEFAULT NULL,
  `ID_KATEGORI` int(10) DEFAULT NULL,
  `BOBOT` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_actor_weight
-- ----------------------------
INSERT INTO `log_actor_weight` VALUES ('22', '44', 'Aktor1', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('23', '44', 'Aktor2', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('24', '44', 'Aktor2', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('25', '44', 'Aktor5', '3', '3.00');
INSERT INTO `log_actor_weight` VALUES ('26', '44', 'Aktor5', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('27', '45', 'Faiz', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('28', '45', 'Zaki', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('29', '45', 'Aula', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('30', '46', 'faiz', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('31', '47', 'Login', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('32', '47', ' Operator', '3', '3.00');

-- ----------------------------
-- Table structure for `log_ecf_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_ecf_weight`;
CREATE TABLE `log_ecf_weight` (
  `ID_LOG_ECF` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `ID_ECF` varchar(125) DEFAULT NULL,
  `VALUE` varchar(125) DEFAULT NULL,
  `BOBOT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_LOG_ECF`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_ecf_weight
-- ----------------------------
INSERT INTO `log_ecf_weight` VALUES ('110', '45', '3', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('111', '45', '4', '3', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('112', '45', '5', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('113', '45', '6', '3', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('114', '45', '7', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('115', '45', '8', '3', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('116', '45', '9', '3', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('117', '45', '10', '3', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('118', '45', '3', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('119', '45', '4', '3', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('120', '45', '5', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('121', '45', '6', '3', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('122', '45', '7', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('123', '45', '8', '3', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('124', '45', '9', '3', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('125', '45', '10', '3', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('126', '46', '3', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('127', '46', '4', '5', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('128', '46', '5', '5', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('129', '46', '6', '5', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('130', '46', '7', '5', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('131', '46', '8', '5', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('132', '46', '9', '5', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('133', '46', '10', '5', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('134', '46', '3', '4', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('135', '46', '4', '5', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('136', '46', '5', '5', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('137', '46', '6', '5', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('138', '46', '7', '5', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('139', '46', '8', '5', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('140', '46', '9', '5', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('141', '46', '10', '5', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('142', '47', '3', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('143', '47', '4', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('144', '47', '5', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('145', '47', '6', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('146', '47', '7', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('147', '47', '8', '3', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('148', '47', '9', '3', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('149', '47', '10', '3', '-1.00');

-- ----------------------------
-- Table structure for `log_tcf_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_tcf_weight`;
CREATE TABLE `log_tcf_weight` (
  `ID_LOG_TCF` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) NOT NULL,
  `ID_TCF` varchar(125) NOT NULL,
  `VALUE` varchar(125) NOT NULL,
  `BOBOT` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_LOG_TCF`)
) ENGINE=MyISAM AUTO_INCREMENT=310631 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_tcf_weight
-- ----------------------------

-- ----------------------------
-- Table structure for `log_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `log_transaction`;
CREATE TABLE `log_transaction` (
  `ID_APLIKASI` int(10) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(125) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `biaya_real` double(125,2) DEFAULT NULL,
  `UCW` double(10,2) DEFAULT NULL,
  `UAW` double(10,2) DEFAULT NULL,
  `ECF` double(10,2) DEFAULT NULL,
  `TCF` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_APLIKASI`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_transaction
-- ----------------------------
INSERT INTO `log_transaction` VALUES ('45', 'Aplikasi 3', '1', null, '30.00', '6.00', '0.78', '0.81');
INSERT INTO `log_transaction` VALUES ('46', 'Aplikasi 2', '1', null, '10.00', '1.00', '0.85', '0.79');
INSERT INTO `log_transaction` VALUES ('47', 'Aplikasi SIM Pelayanan PUBLIK', '1', null, '50.00', '5.00', '0.67', '0.88');

-- ----------------------------
-- Table structure for `log_uc_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_uc_weight`;
CREATE TABLE `log_uc_weight` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `NAMA_USE_CASE` varchar(125) DEFAULT NULL,
  `JUM_TRANSAKSI` varchar(10) DEFAULT NULL,
  `ID_KATEGORI` int(10) DEFAULT NULL,
  `BOBOT` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_uc_weight
-- ----------------------------
INSERT INTO `log_uc_weight` VALUES ('69', '45', 'Tambah pengguna', '3', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('70', '45', 'Tambah pengguna', '6', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('71', '45', 'Tambah pengguna', '8', '3', '15.00');
INSERT INTO `log_uc_weight` VALUES ('72', '46', 'Use Case 1', '4', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('73', '47', 'Use Case Tambah pengguna', '4', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('74', '47', 'Use Case tambah modul tambahan', '5', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('75', '47', 'Use Case tambah pengguna barang', '9', '3', '15.00');
INSERT INTO `log_uc_weight` VALUES ('76', '47', 'Use Case tambah pengguna barang', '11', '3', '15.00');

-- ----------------------------
-- Table structure for `metode_aktivitas`
-- ----------------------------
DROP TABLE IF EXISTS `metode_aktivitas`;
CREATE TABLE `metode_aktivitas` (
  `ID_METODE_AKTIVITAS` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_METODE_AKTIVITAS` varchar(125) DEFAULT NULL,
  `ASSIGN` double(15,2) DEFAULT NULL,
  `STATUS` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_METODE_AKTIVITAS`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of metode_aktivitas
-- ----------------------------
INSERT INTO `metode_aktivitas` VALUES ('1', 'metode 1', null, '1.00');

-- ----------------------------
-- Table structure for `metode_usaha`
-- ----------------------------
DROP TABLE IF EXISTS `metode_usaha`;
CREATE TABLE `metode_usaha` (
  `ID_METODE_USAHA` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_METODE_USAHA` varchar(125) DEFAULT NULL,
  `NILAI` double(15,2) DEFAULT NULL,
  `STATUS` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_METODE_USAHA`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of metode_usaha
-- ----------------------------
INSERT INTO `metode_usaha` VALUES ('3', 'Edward R. Carroll', '28.00', '0');
INSERT INTO `metode_usaha` VALUES ('2', 'Metode Gustav Karner', '12.00', '1');

-- ----------------------------
-- Table structure for `profesi`
-- ----------------------------
DROP TABLE IF EXISTS `profesi`;
CREATE TABLE `profesi` (
  `ID_PROFESI` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_PROFESI` varchar(125) DEFAULT NULL,
  `GAJI` double(15,2) DEFAULT NULL,
  PRIMARY KEY (`ID_PROFESI`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profesi
-- ----------------------------
INSERT INTO `profesi` VALUES ('1', 'Programmer', '10000000.00');
INSERT INTO `profesi` VALUES ('2', 'Sistem Analis', '18000000.00');
INSERT INTO `profesi` VALUES ('3', 'Project Manager', '50000000.00');
INSERT INTO `profesi` VALUES ('4', 'Tester', '15000000.00');
INSERT INTO `profesi` VALUES ('5', 'Dokumentator', '25000000.00');

-- ----------------------------
-- Table structure for `tecnical_factor`
-- ----------------------------
DROP TABLE IF EXISTS `tecnical_factor`;
CREATE TABLE `tecnical_factor` (
  `ID_TCF` int(10) NOT NULL AUTO_INCREMENT,
  `DESKRIPSI` text,
  `BOBOT` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_TCF`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tecnical_factor
-- ----------------------------
INSERT INTO `tecnical_factor` VALUES ('5', 'Kebutuhan Sistem terdestribusi', '2.00');
INSERT INTO `tecnical_factor` VALUES ('8', 'KOMPLEKSITAS PROSES INTERNAL', '1.00');
INSERT INTO `tecnical_factor` VALUES ('9', 'KOMPLEXSITAS PROSES INTERNAL', '1.00');
INSERT INTO `tecnical_factor` VALUES ('10', 'PENGGUNAAN KODE DARI HASIL DAUR ULANG', '1.00');
INSERT INTO `tecnical_factor` VALUES ('11', 'KEMUDAHAN UNTUK INSTAL', '0.50');
INSERT INTO `tecnical_factor` VALUES ('12', 'KEMUDAHAN UNTUK INSTALL', '0.50');
INSERT INTO `tecnical_factor` VALUES ('13', 'KEMUDAHAN UNTUK DIGUNAKAN', '0.50');
INSERT INTO `tecnical_factor` VALUES ('14', 'MAINTENANCE SISTEM', '1.00');
INSERT INTO `tecnical_factor` VALUES ('15', 'PROSES PARALEL', '1.00');
INSERT INTO `tecnical_factor` VALUES ('16', 'FITUR KEAMANAN', '1.00');
INSERT INTO `tecnical_factor` VALUES ('17', 'AKSES PIHAK KE-3', '1.00');
INSERT INTO `tecnical_factor` VALUES ('18', 'PELATIHAN PENGGUNA', '1.00');

-- ----------------------------
-- Table structure for `uc_weight`
-- ----------------------------
DROP TABLE IF EXISTS `uc_weight`;
CREATE TABLE `uc_weight` (
  `ID_UC_WEIGHT` int(10) NOT NULL AUTO_INCREMENT,
  `TIPE` varchar(10) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` varchar(120) DEFAULT NULL,
  `BOBOT` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_UC_WEIGHT`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uc_weight
-- ----------------------------
INSERT INTO `uc_weight` VALUES ('1', 'Simple', '1-3', '5.00');
INSERT INTO `uc_weight` VALUES ('2', 'Average', '4-7', '10.00');
INSERT INTO `uc_weight` VALUES ('3', 'Complex', '>=8', '15.00');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(125) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `role` int(125) NOT NULL,
  `url_foto` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('30', 'Idam Pradana Mahmudah', 'admin', '21232f297a57a5a743894a0e4a801fc3', '3', 'img/fotouser/default.jpg');
INSERT INTO `user` VALUES ('26', 'Faiz Fanani', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'img/fotouser/Never-Give-Up-Wallpaper.jpg');
INSERT INTO `user` VALUES ('29', 'Idam Pradana Mahmudah', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', '4', 'img/user/default.jpg');
