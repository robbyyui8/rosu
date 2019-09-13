/*
Navicat MySQL Data Transfer

Source Server         : mysql_lawas
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : ucpapps

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2015-02-20 23:02:46
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=310595 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_transaction
-- ----------------------------
INSERT INTO `log_transaction` VALUES ('45', 'Aplikasi 3', '1', null, '30.00', '6.00', '0.78', '0.81');

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
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_uc_weight
-- ----------------------------
INSERT INTO `log_uc_weight` VALUES ('69', '45', 'Tambah pengguna', '3', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('70', '45', 'Tambah pengguna', '6', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('71', '45', 'Tambah pengguna', '8', '3', '15.00');

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
INSERT INTO `user` VALUES ('29', 'Idam Pradana Mahmudah', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'img/fotouser/default.jpg');
