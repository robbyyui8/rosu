/*
Navicat MySQL Data Transfer

Source Server         : mysql_lawas
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : ucpapps

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2015-02-11 18:22:01
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of actor_weight
-- ----------------------------

-- ----------------------------
-- Table structure for `environment_factor`
-- ----------------------------
DROP TABLE IF EXISTS `environment_factor`;
CREATE TABLE `environment_factor` (
  `ID_ECF` int(10) NOT NULL AUTO_INCREMENT,
  `INDIKATOR` varchar(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_ECF`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of environment_factor
-- ----------------------------

-- ----------------------------
-- Table structure for `log_actor_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_actor_weight`;
CREATE TABLE `log_actor_weight` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `JUM_AKTOR` int(10) DEFAULT NULL,
  `ID_KATEGORI` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_actor_weight
-- ----------------------------

-- ----------------------------
-- Table structure for `log_ef_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_ef_weight`;
CREATE TABLE `log_ef_weight` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `ID_EF` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_ef_weight
-- ----------------------------

-- ----------------------------
-- Table structure for `log_tf_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_tf_weight`;
CREATE TABLE `log_tf_weight` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `ID_TF` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_tf_weight
-- ----------------------------

-- ----------------------------
-- Table structure for `log_uc_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_uc_weight`;
CREATE TABLE `log_uc_weight` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `NAMA_USE_CASE` varchar(125) DEFAULT NULL,
  `JUM_TRANSAKSI` int(10) DEFAULT NULL,
  `ID_KATEGORI` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_uc_weight
-- ----------------------------

-- ----------------------------
-- Table structure for `tecnical_factor`
-- ----------------------------
DROP TABLE IF EXISTS `tecnical_factor`;
CREATE TABLE `tecnical_factor` (
  `ID_TCF` int(10) NOT NULL AUTO_INCREMENT,
  `INDIKATOR` varchar(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_TCF`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tecnical_factor
-- ----------------------------
INSERT INTO `tecnical_factor` VALUES ('2', 'T1', 'Sya bisa seratus persen tanpa ada halangan apapun. Bismillah ;D', '13');

-- ----------------------------
-- Table structure for `transaction_log`
-- ----------------------------
DROP TABLE IF EXISTS `transaction_log`;
CREATE TABLE `transaction_log` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(125) DEFAULT NULL,
  `total_effort` double(125,0) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `biaya_real` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaction_log
-- ----------------------------

-- ----------------------------
-- Table structure for `uc_weight`
-- ----------------------------
DROP TABLE IF EXISTS `uc_weight`;
CREATE TABLE `uc_weight` (
  `ID_UC_WEIGHT` int(10) NOT NULL AUTO_INCREMENT,
  `TIPE` varchar(10) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` int(10) DEFAULT NULL,
  `BOBOT` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_UC_WEIGHT`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uc_weight
-- ----------------------------
INSERT INTO `uc_weight` VALUES ('5', 'Average', '23', '12.99');

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
