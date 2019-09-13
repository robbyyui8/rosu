/*
Navicat MySQL Data Transfer

Source Server         : mysql_ta
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : ucapps_final

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-05-25 20:35:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `aktivitas`
-- ----------------------------
DROP TABLE IF EXISTS `aktivitas`;
CREATE TABLE `aktivitas` (
  `ID_AKTIVITAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROFESI` int(11) DEFAULT NULL,
  `NAMA_AKTIVITAS` char(125) DEFAULT NULL,
  `KATEGORI_AKTIVITAS` int(11) DEFAULT NULL,
  `PRESENTASE_USAHA` double DEFAULT NULL,
  PRIMARY KEY (`ID_AKTIVITAS`),
  KEY `FK_REFERENCE_11` (`ID_PROFESI`),
  CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_PROFESI`) REFERENCES `profesi` (`ID_PROFESI`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aktivitas
-- ----------------------------
INSERT INTO `aktivitas` VALUES ('1', '2', 'Requirements', '1', '7.5');
INSERT INTO `aktivitas` VALUES ('2', '2', 'Specifications & Design', '1', '17.5');
INSERT INTO `aktivitas` VALUES ('3', '1', 'Coding', '1', '10');
INSERT INTO `aktivitas` VALUES ('4', '4', 'Testing', '1', '7');
INSERT INTO `aktivitas` VALUES ('5', '3', 'Project management', '2', '7');
INSERT INTO `aktivitas` VALUES ('6', '2', 'Configuration Management', '2', '3');
INSERT INTO `aktivitas` VALUES ('7', '5', 'Documentation', '2', '3');
INSERT INTO `aktivitas` VALUES ('8', '2', 'Training & Support', '2', '3');
INSERT INTO `aktivitas` VALUES ('9', '3', 'Acceptance & Deployment', '2', '5');
INSERT INTO `aktivitas` VALUES ('10', '3', 'Quality Assurance & Control', '3', '12.34');
INSERT INTO `aktivitas` VALUES ('11', '4', 'Evaluation and Testing', '3', '24.66');

-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `ID_ANGGOTA` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_ANGGOTA` char(125) DEFAULT NULL,
  `ID_PROFESI` int(11) DEFAULT NULL,
  `PENGALAMAN` char(125) DEFAULT NULL,
  PRIMARY KEY (`ID_ANGGOTA`),
  KEY `FK_REFERENCE_15` (`ID_PROFESI`),
  CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_PROFESI`) REFERENCES `profesi` (`ID_PROFESI`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('1', 'Mukhamad Faiz Fanani', '1', '1 tahun');
INSERT INTO `anggota` VALUES ('2', 'Rima Faiqoh Augustine', '5', ' 1 bulan');
INSERT INTO `anggota` VALUES ('3', 'Hudalizaman', '1', '2 tahun');
INSERT INTO `anggota` VALUES ('4', 'Sella Wahyu Restiana', '5', '1 tahun');

-- ----------------------------
-- Table structure for `anggota_tim`
-- ----------------------------
DROP TABLE IF EXISTS `anggota_tim`;
CREATE TABLE `anggota_tim` (
  `ID_ANGGOTA_TIM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIM` int(11) DEFAULT NULL,
  `ID_ANGGOTA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ANGGOTA_TIM`),
  KEY `Fk_tim` (`ID_TIM`),
  KEY `fk_anggota` (`ID_ANGGOTA`),
  CONSTRAINT `Fk_tim` FOREIGN KEY (`ID_TIM`) REFERENCES `tim` (`ID_TIM`),
  CONSTRAINT `fk_anggota` FOREIGN KEY (`ID_ANGGOTA`) REFERENCES `anggota` (`ID_ANGGOTA`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of anggota_tim
-- ----------------------------
INSERT INTO `anggota_tim` VALUES ('11', '15', '1');
INSERT INTO `anggota_tim` VALUES ('12', '15', '2');
INSERT INTO `anggota_tim` VALUES ('13', '15', '3');
INSERT INTO `anggota_tim` VALUES ('37', '16', '1');
INSERT INTO `anggota_tim` VALUES ('38', '16', '2');
INSERT INTO `anggota_tim` VALUES ('39', '16', '3');
INSERT INTO `anggota_tim` VALUES ('40', '17', '1');
INSERT INTO `anggota_tim` VALUES ('41', '17', '2');
INSERT INTO `anggota_tim` VALUES ('51', '18', '1');
INSERT INTO `anggota_tim` VALUES ('52', '18', '2');
INSERT INTO `anggota_tim` VALUES ('53', '18', '3');
INSERT INTO `anggota_tim` VALUES ('54', '18', '4');
INSERT INTO `anggota_tim` VALUES ('55', '19', '1');
INSERT INTO `anggota_tim` VALUES ('56', '20', '2');
INSERT INTO `anggota_tim` VALUES ('57', '20', '3');
INSERT INTO `anggota_tim` VALUES ('60', '21', '2');
INSERT INTO `anggota_tim` VALUES ('61', '21', '3');
INSERT INTO `anggota_tim` VALUES ('62', '22', '2');
INSERT INTO `anggota_tim` VALUES ('63', '22', '3');
INSERT INTO `anggota_tim` VALUES ('64', '22', '4');
INSERT INTO `anggota_tim` VALUES ('65', '23', '2');
INSERT INTO `anggota_tim` VALUES ('66', '24', '3');
INSERT INTO `anggota_tim` VALUES ('68', '25', '3');
INSERT INTO `anggota_tim` VALUES ('69', '26', '2');
INSERT INTO `anggota_tim` VALUES ('70', '26', '3');
INSERT INTO `anggota_tim` VALUES ('71', '26', '4');
INSERT INTO `anggota_tim` VALUES ('76', '27', '1');
INSERT INTO `anggota_tim` VALUES ('77', '27', '2');
INSERT INTO `anggota_tim` VALUES ('79', '28', '2');
INSERT INTO `anggota_tim` VALUES ('80', '28', '3');
INSERT INTO `anggota_tim` VALUES ('81', '29', '2');
INSERT INTO `anggota_tim` VALUES ('82', '29', '3');
INSERT INTO `anggota_tim` VALUES ('83', '30', '1');
INSERT INTO `anggota_tim` VALUES ('84', '30', '2');
INSERT INTO `anggota_tim` VALUES ('85', '31', '1');
INSERT INTO `anggota_tim` VALUES ('86', '31', '2');
INSERT INTO `anggota_tim` VALUES ('87', '31', '4');

-- ----------------------------
-- Table structure for `aplikasi`
-- ----------------------------
DROP TABLE IF EXISTS `aplikasi`;
CREATE TABLE `aplikasi` (
  `ID_APLIKASI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_APLIKASI` char(125) DEFAULT NULL,
  `UUCW` double DEFAULT NULL,
  `UAW` double DEFAULT NULL,
  `TCF` double DEFAULT NULL,
  `ECF` double DEFAULT NULL,
  `EFFORT_ESTIMATE` double(10,2) DEFAULT NULL,
  `EFFORT_REAL` double DEFAULT NULL,
  `BIAYA_ESTIMASI` double(255,2) DEFAULT NULL,
  `DATE_CREATED` varchar(125) DEFAULT NULL,
  `ID_TIM` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `TEMPLATE` int(11) DEFAULT NULL,
  `BIAYA_REAL` double(10,2) DEFAULT NULL,
  `STEP` int(5) DEFAULT NULL,
  `ID_CLIENT` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_APLIKASI`),
  KEY `FK_REFERENCE_12` (`ID_TIM`),
  KEY `FK_CLIENT` (`ID_CLIENT`),
  CONSTRAINT `FK_CLIENT` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`),
  CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`ID_TIM`) REFERENCES `tim` (`ID_TIM`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aplikasi
-- ----------------------------
INSERT INTO `aplikasi` VALUES ('6', 'Aplikasi5', null, null, null, null, null, null, null, '0000-00-00', '15', '0', '1', null, null, null);
INSERT INTO `aplikasi` VALUES ('7', 'UCP 2', '10', '5', '0.795', '0.65', null, null, null, '0000-00-00', '16', '0', '1', null, null, null);
INSERT INTO `aplikasi` VALUES ('8', 'Aplikasi 3', '5', '1', '0.74', '0.65', null, null, null, '0000-00-00', '17', '0', '1', null, null, null);
INSERT INTO `aplikasi` VALUES ('9', 'Aplikasi UCP', '40', '4', '0.72', '0.655', '415.01', '30', '11843375.00', '0000-00-00', '18', '1', '1', null, '7', null);
INSERT INTO `aplikasi` VALUES ('10', 'Aplikasi 3', null, null, null, null, null, null, null, '0000-00-00', '19', '0', '1', null, '1', null);
INSERT INTO `aplikasi` VALUES ('11', 'Aplikasi UCP', null, null, null, null, null, null, null, '0000-00-00', '20', '0', '1', null, '1', null);
INSERT INTO `aplikasi` VALUES ('12', 'Aplikasi UCP', null, null, null, null, null, null, null, '0000-00-00', '21', '0', '1', null, '2', null);
INSERT INTO `aplikasi` VALUES ('13', 'sip', null, null, null, null, null, null, null, '0000-00-00', '22', '0', '1', null, '1', null);
INSERT INTO `aplikasi` VALUES ('14', 'Aplikasi 100', '15', '2', '0.75', '0.645', null, null, null, '0000-00-00', '23', '0', '1', null, '6', null);
INSERT INTO `aplikasi` VALUES ('15', 'Aplikasi 3', '5', '3', '0.71', '0.64', '72.70', null, '2369218.75', '0000-00-00', '24', '1', '1', null, '7', '4');
INSERT INTO `aplikasi` VALUES ('16', null, null, null, null, null, null, null, null, null, null, null, null, null, '2', '6');
INSERT INTO `aplikasi` VALUES ('17', null, null, null, null, null, null, null, null, null, null, null, null, null, '2', '7');
INSERT INTO `aplikasi` VALUES ('18', 'Aplikasi UCP', null, null, null, null, null, null, null, '18-05-2015', '25', '0', '1', null, '1', '8');
INSERT INTO `aplikasi` VALUES ('19', 'Aplikasi UCP', null, null, null, null, null, null, null, '19-05-2015', '26', '0', '1', null, '1', '9');
INSERT INTO `aplikasi` VALUES ('20', 'Aplikasi pajak', null, null, null, null, null, null, null, null, null, null, '0', null, '1', '10');
INSERT INTO `aplikasi` VALUES ('21', null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '11');
INSERT INTO `aplikasi` VALUES ('22', null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '12');
INSERT INTO `aplikasi` VALUES ('23', null, null, null, null, null, null, null, null, null, null, null, null, null, '2', '13');
INSERT INTO `aplikasi` VALUES ('24', 'Aplikasi gudang', null, null, null, null, null, null, null, '19-05-2015', '27', '0', '0', null, '3', '14');
INSERT INTO `aplikasi` VALUES ('25', 'Aplikasi Nyamuk', '30', '4', '0.8', '0.605', '183.92', '0', '5268625.00', '19-05-2015', '28', '1', '1', null, '7', '15');
INSERT INTO `aplikasi` VALUES ('26', 'Aplikasi UCP', '20', '1', null, null, null, null, null, '21-05-2015', '29', '0', '0', null, '4', '16');
INSERT INTO `aplikasi` VALUES ('27', 'Aplikais 3', '15', '2', '0.91', '0.645', null, null, null, '21-05-2015', '30', '0', '1', null, '7', '17');
INSERT INTO `aplikasi` VALUES ('28', null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '18');
INSERT INTO `aplikasi` VALUES ('29', 'Aplikasi UCP', '5', '1', '0.74', '0.635', '56.39', null, '1655250.00', '25-05-2015', '31', '2', '0', null, '7', '19');

-- ----------------------------
-- Table structure for `biaya_op`
-- ----------------------------
DROP TABLE IF EXISTS `biaya_op`;
CREATE TABLE `biaya_op` (
  `ID_OP` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `DESKRIPSI` varchar(125) DEFAULT NULL,
  `NILAI` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_OP`),
  KEY `fk_id_aplikasi` (`ID_APLIKASI`),
  CONSTRAINT `fk_id_aplikasi` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_op
-- ----------------------------
INSERT INTO `biaya_op` VALUES ('17', null, '0', '0.00');
INSERT INTO `biaya_op` VALUES ('18', null, '0', '0.00');
INSERT INTO `biaya_op` VALUES ('19', null, '0', '0.00');
INSERT INTO `biaya_op` VALUES ('20', null, '0', '0.00');
INSERT INTO `biaya_op` VALUES ('31', '9', 'bbb', '2000.00');
INSERT INTO `biaya_op` VALUES ('32', '9', ' Beli pulsa', '30000.00');
INSERT INTO `biaya_op` VALUES ('33', '15', 'Beli paket internet ', '300000.00');
INSERT INTO `biaya_op` VALUES ('34', '25', ' gv', '34000.00');
INSERT INTO `biaya_op` VALUES ('35', '25', ' Biaya Internet', '40000.00');
INSERT INTO `biaya_op` VALUES ('36', '25', ' Biaya ukur aplikasi', '50000.00');
INSERT INTO `biaya_op` VALUES ('37', '29', 'Beli Internet 1 Bulan ', '50000.00');

-- ----------------------------
-- Table structure for `client`
-- ----------------------------
DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `ID_CLIENT` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(125) DEFAULT NULL,
  `ALAMAT` text,
  `TANGGAL_PENGAJUAN` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENT`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of client
-- ----------------------------
INSERT INTO `client` VALUES ('3', 'PT Beno', 'Jalan Asem payeng', '15-05-2015');
INSERT INTO `client` VALUES ('4', 'PT Beno', 'Jalan Asem payung3', '15-05-2015');
INSERT INTO `client` VALUES ('5', 'j', 'j', 'j');
INSERT INTO `client` VALUES ('6', 'a', 'a', '11-05-2015');
INSERT INTO `client` VALUES ('7', 'A', 'jalan pegangsaan', '13-05-2015');
INSERT INTO `client` VALUES ('8', 'A', 'd', '04-05-2015');
INSERT INTO `client` VALUES ('9', 'PT. Sindo Sentosa', 'Jl. Dukuh Kupang No.56', '22-05-2015');
INSERT INTO `client` VALUES ('10', 'PT. Sindo Sentosa', 'jalan basuki', '19-05-2015');
INSERT INTO `client` VALUES ('11', 'test', 'd', '27-05-2015');
INSERT INTO `client` VALUES ('12', 'A', 's', '27-05-2015');
INSERT INTO `client` VALUES ('13', 'as', 'kf', '27-05-2015');
INSERT INTO `client` VALUES ('14', 'Asbun', 'd', '27-05-2015');
INSERT INTO `client` VALUES ('15', 'Client rumah', 'client rumah5', '26-05-2015');
INSERT INTO `client` VALUES ('16', 'Faiz fanani', 'Jalan Asem Payung No.89', '22-05-2015');
INSERT INTO `client` VALUES ('17', 'Aplikasi2', 'Jalan asem payung', '22-05-2015');
INSERT INTO `client` VALUES ('18', 'aa', 'd', '26-05-2015');
INSERT INTO `client` VALUES ('19', 'Bapak Marsudi', 'Jalan Pejambon', '08-05-2015');

-- ----------------------------
-- Table structure for `client_backup`
-- ----------------------------
DROP TABLE IF EXISTS `client_backup`;
CREATE TABLE `client_backup` (
  `ID_CLIENT` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(125) DEFAULT NULL,
  `ALAMAT` text,
  `TANGGAL_PENGAJUAN` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of client_backup
-- ----------------------------
INSERT INTO `client_backup` VALUES ('3', 'PT Beno', 'Jalan Asem payeng', '15-05-2015');
INSERT INTO `client_backup` VALUES ('4', 'PT Beno', 'Jalan Asem payung3', '15-05-2015');

-- ----------------------------
-- Table structure for `fitur`
-- ----------------------------
DROP TABLE IF EXISTS `fitur`;
CREATE TABLE `fitur` (
  `ID_FITUR` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `NAMA_FITUR` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID_FITUR`),
  KEY `fk_id_aplikasi_fitur` (`ID_APLIKASI`),
  CONSTRAINT `fk_id_aplikasi_fitur` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fitur
-- ----------------------------

-- ----------------------------
-- Table structure for `log_aktor`
-- ----------------------------
DROP TABLE IF EXISTS `log_aktor`;
CREATE TABLE `log_aktor` (
  `ID_LOG_A` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_P_A` int(11) DEFAULT NULL,
  `NAMA_AKTOR` char(125) DEFAULT NULL,
  PRIMARY KEY (`ID_LOG_A`),
  KEY `FK_REFERENCE_3` (`ID_APLIKASI`),
  KEY `FK_REFERENCE_4` (`ID_P_A`),
  CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`),
  CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_P_A`) REFERENCES `pembobotan_aktor` (`ID_P_A`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_aktor
-- ----------------------------
INSERT INTO `log_aktor` VALUES ('3', '7', '1', 'Aktor 1');
INSERT INTO `log_aktor` VALUES ('5', '7', '3', 'Aktor 3');
INSERT INTO `log_aktor` VALUES ('7', '7', '1', 'aktor 2');
INSERT INTO `log_aktor` VALUES ('8', '8', '1', 'Aktor 2');
INSERT INTO `log_aktor` VALUES ('10', '9', '1', 'aktor 4');
INSERT INTO `log_aktor` VALUES ('12', '9', '1', 'aktor 6');
INSERT INTO `log_aktor` VALUES ('13', '9', '2', 'a');
INSERT INTO `log_aktor` VALUES ('14', '14', '2', 'Aktor 3');
INSERT INTO `log_aktor` VALUES ('16', '15', '3', 'Aktor 2');
INSERT INTO `log_aktor` VALUES ('17', '25', '1', 'Aktor5');
INSERT INTO `log_aktor` VALUES ('18', '25', '3', 'aktor 6');
INSERT INTO `log_aktor` VALUES ('19', '26', '1', 'Aktor 3');
INSERT INTO `log_aktor` VALUES ('20', '27', '2', 'pengguna');
INSERT INTO `log_aktor` VALUES ('21', '29', '1', 'Direktur');

-- ----------------------------
-- Table structure for `log_biaya`
-- ----------------------------
DROP TABLE IF EXISTS `log_biaya`;
CREATE TABLE `log_biaya` (
  `ID_LOG_BIAYA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_AKTIVITAS` int(11) DEFAULT NULL,
  `NILAI_USAHA` double DEFAULT NULL,
  `GAJI_PER_JAM` double DEFAULT NULL,
  `BIAYA_AKTIVITAS` double DEFAULT NULL,
  `EDIT_BIAYA` int(10) DEFAULT '0',
  PRIMARY KEY (`ID_LOG_BIAYA`),
  KEY `FK_REFERENCE_10` (`ID_AKTIVITAS`),
  KEY `FK_REFERENCE_9` (`ID_APLIKASI`),
  CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ID_AKTIVITAS`) REFERENCES `aktivitas` (`ID_AKTIVITAS`),
  CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=5897 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_biaya
-- ----------------------------
INSERT INTO `log_biaya` VALUES ('78', '7', '1', '11.63', '25000', '290750', '0');
INSERT INTO `log_biaya` VALUES ('79', '7', '2', '27.13', '25000', '678250', '0');
INSERT INTO `log_biaya` VALUES ('80', '7', '3', '15.5', '15625', '242187.5', '0');
INSERT INTO `log_biaya` VALUES ('81', '7', '4', '10.85', '18750', '203437.5', '0');
INSERT INTO `log_biaya` VALUES ('82', '7', '5', '10.85', '53125', '576406.25', '0');
INSERT INTO `log_biaya` VALUES ('83', '7', '6', '4.65', '25000', '116250', '0');
INSERT INTO `log_biaya` VALUES ('84', '7', '7', '4.65', '9375', '43593.75', '0');
INSERT INTO `log_biaya` VALUES ('85', '7', '8', '4.65', '25000', '116250', '0');
INSERT INTO `log_biaya` VALUES ('86', '7', '9', '7.75', '53125', '411718.75', '0');
INSERT INTO `log_biaya` VALUES ('87', '7', '10', '19.13', '53125', '1016281.25', '0');
INSERT INTO `log_biaya` VALUES ('88', '7', '11', '38.23', '18750', '716812.5', '0');
INSERT INTO `log_biaya` VALUES ('89', '8', '1', '4.33', '25000', '108250', '0');
INSERT INTO `log_biaya` VALUES ('90', '8', '2', '10.1', '25000', '252500', '0');
INSERT INTO `log_biaya` VALUES ('91', '8', '3', '5.77', '15625', '90156.25', '0');
INSERT INTO `log_biaya` VALUES ('92', '8', '4', '4.04', '18750', '75750', '0');
INSERT INTO `log_biaya` VALUES ('93', '8', '5', '4.04', '53125', '214625', '0');
INSERT INTO `log_biaya` VALUES ('94', '8', '6', '1.73', '25000', '43250', '0');
INSERT INTO `log_biaya` VALUES ('95', '8', '7', '1.73', '9375', '16218.75', '0');
INSERT INTO `log_biaya` VALUES ('96', '8', '8', '1.73', '25000', '43250', '0');
INSERT INTO `log_biaya` VALUES ('97', '8', '9', '2.89', '53125', '153531.25', '0');
INSERT INTO `log_biaya` VALUES ('98', '8', '10', '7.12', '53125', '378250', '0');
INSERT INTO `log_biaya` VALUES ('99', '8', '11', '14.23', '18750', '266812.5', '0');
INSERT INTO `log_biaya` VALUES ('4467', '14', '1', '12.34', '25000', '308500', '0');
INSERT INTO `log_biaya` VALUES ('4468', '14', '2', '28.78', '25000', '719500', '0');
INSERT INTO `log_biaya` VALUES ('4469', '14', '3', '16.45', '15625', '257031.25', '0');
INSERT INTO `log_biaya` VALUES ('4470', '14', '4', '11.51', '18750', '215812.5', '0');
INSERT INTO `log_biaya` VALUES ('4471', '14', '5', '11.51', '53125', '611468.75', '0');
INSERT INTO `log_biaya` VALUES ('4472', '14', '6', '4.93', '25000', '123250', '0');
INSERT INTO `log_biaya` VALUES ('4473', '14', '7', '4.93', '9375', '46218.75', '0');
INSERT INTO `log_biaya` VALUES ('4474', '14', '8', '4.93', '25000', '123250', '0');
INSERT INTO `log_biaya` VALUES ('4475', '14', '9', '8.22', '53125', '436687.5', '0');
INSERT INTO `log_biaya` VALUES ('4476', '14', '10', '20.3', '53125', '1078437.5', '0');
INSERT INTO `log_biaya` VALUES ('4477', '14', '11', '40.56', '18750', '760500', '0');
INSERT INTO `log_biaya` VALUES ('5028', '9', '1', '31.13', '25000', '778250', '0');
INSERT INTO `log_biaya` VALUES ('5029', '9', '2', '72.63', '25000', '1815750', '0');
INSERT INTO `log_biaya` VALUES ('5030', '9', '3', '41.5', '15625', '648437.5', '0');
INSERT INTO `log_biaya` VALUES ('5031', '9', '4', '29.05', '18750', '544687.5', '0');
INSERT INTO `log_biaya` VALUES ('5032', '9', '5', '29.05', '53125', '1543281.25', '0');
INSERT INTO `log_biaya` VALUES ('5033', '9', '6', '12.45', '25000', '311250', '0');
INSERT INTO `log_biaya` VALUES ('5034', '9', '7', '12.45', '9375', '116718.75', '0');
INSERT INTO `log_biaya` VALUES ('5035', '9', '8', '12.45', '25000', '311250', '0');
INSERT INTO `log_biaya` VALUES ('5036', '9', '9', '20.75', '53125', '1102343.75', '0');
INSERT INTO `log_biaya` VALUES ('5037', '9', '10', '51.21', '53125', '2720531.25', '0');
INSERT INTO `log_biaya` VALUES ('5038', '9', '11', '102.34', '18750', '1918875', '0');
INSERT INTO `log_biaya` VALUES ('5270', '15', '1', '5.45', '25000', '136250', '0');
INSERT INTO `log_biaya` VALUES ('5271', '15', '2', '12.72', '25000', '318000', '0');
INSERT INTO `log_biaya` VALUES ('5272', '15', '3', '7.27', '15625', '113593.75', '0');
INSERT INTO `log_biaya` VALUES ('5273', '15', '4', '5.09', '18750', '95437.5', '0');
INSERT INTO `log_biaya` VALUES ('5274', '15', '5', '5.09', '53125', '270406.25', '0');
INSERT INTO `log_biaya` VALUES ('5275', '15', '6', '2.18', '25000', '54500', '0');
INSERT INTO `log_biaya` VALUES ('5276', '15', '7', '2.18', '9375', '20437.5', '0');
INSERT INTO `log_biaya` VALUES ('5277', '15', '8', '2.18', '25000', '54500', '0');
INSERT INTO `log_biaya` VALUES ('5278', '15', '9', '3.64', '53125', '193375', '0');
INSERT INTO `log_biaya` VALUES ('5279', '15', '10', '8.97', '53125', '476531.25', '0');
INSERT INTO `log_biaya` VALUES ('5280', '15', '11', '17.93', '18750', '336187.5', '0');
INSERT INTO `log_biaya` VALUES ('5435', '25', '1', '24.68', '25000', '617000', '0');
INSERT INTO `log_biaya` VALUES ('5436', '25', '2', '57.6', '25000', '1440000', '0');
INSERT INTO `log_biaya` VALUES ('5437', '25', '3', '32.91', '15625', '514218.75', '0');
INSERT INTO `log_biaya` VALUES ('5438', '25', '4', '23.04', '18750', '432000', '0');
INSERT INTO `log_biaya` VALUES ('5439', '25', '5', '23.04', '53125', '1224000', '0');
INSERT INTO `log_biaya` VALUES ('5440', '25', '6', '9.87', '25000', '246750', '0');
INSERT INTO `log_biaya` VALUES ('5441', '25', '7', '9.87', '9375', '92531.25', '0');
INSERT INTO `log_biaya` VALUES ('5442', '25', '8', '9.87', '25000', '246750', '0');
INSERT INTO `log_biaya` VALUES ('5443', '25', '9', '16.46', '53125', '874437.5', '0');
INSERT INTO `log_biaya` VALUES ('5444', '25', '10', '40.61', '53125', '2157406.25', '0');
INSERT INTO `log_biaya` VALUES ('5445', '25', '11', '81.16', '18750', '1521750', '0');
INSERT INTO `log_biaya` VALUES ('5457', '27', '1', '14.97', '25000', '374250', '0');
INSERT INTO `log_biaya` VALUES ('5458', '27', '2', '34.92', '25000', '873000', '0');
INSERT INTO `log_biaya` VALUES ('5459', '27', '3', '19.96', '15625', '311875', '0');
INSERT INTO `log_biaya` VALUES ('5460', '27', '4', '13.97', '18750', '261937.5', '0');
INSERT INTO `log_biaya` VALUES ('5461', '27', '5', '13.97', '53125', '742156.25', '0');
INSERT INTO `log_biaya` VALUES ('5462', '27', '6', '5.99', '25000', '149750', '0');
INSERT INTO `log_biaya` VALUES ('5463', '27', '7', '5.99', '9375', '56156.25', '0');
INSERT INTO `log_biaya` VALUES ('5464', '27', '8', '5.99', '25000', '149750', '0');
INSERT INTO `log_biaya` VALUES ('5465', '27', '9', '9.98', '53125', '530187.5', '0');
INSERT INTO `log_biaya` VALUES ('5466', '27', '10', '24.63', '53125', '1308468.75', '0');
INSERT INTO `log_biaya` VALUES ('5467', '27', '11', '49.21', '18750', '922687.5', '0');
INSERT INTO `log_biaya` VALUES ('5886', '29', '1', '4.23', '25000', '105750', '0');
INSERT INTO `log_biaya` VALUES ('5887', '29', '2', '9.87', '25000', '246750', '0');
INSERT INTO `log_biaya` VALUES ('5888', '29', '3', '5.64', '15625', '88125', '0');
INSERT INTO `log_biaya` VALUES ('5889', '29', '4', '3.95', '18750', '74062.5', '0');
INSERT INTO `log_biaya` VALUES ('5890', '29', '5', '3.95', '53125', '209843.75', '0');
INSERT INTO `log_biaya` VALUES ('5891', '29', '6', '1.69', '25000', '42250', '0');
INSERT INTO `log_biaya` VALUES ('5892', '29', '7', '1.69', '9375', '15843.75', '0');
INSERT INTO `log_biaya` VALUES ('5893', '29', '8', '1.69', '25000', '42250', '0');
INSERT INTO `log_biaya` VALUES ('5894', '29', '9', '2.82', '53125', '149812.5', '0');
INSERT INTO `log_biaya` VALUES ('5895', '29', '10', '6.96', '53125', '369750', '0');
INSERT INTO `log_biaya` VALUES ('5896', '29', '11', '13.91', '18750', '260812.5', '0');

-- ----------------------------
-- Table structure for `log_indikator_ecf`
-- ----------------------------
DROP TABLE IF EXISTS `log_indikator_ecf`;
CREATE TABLE `log_indikator_ecf` (
  `ID_LOG_ECF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_P_ECF` int(11) DEFAULT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `VALUE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LOG_ECF`),
  KEY `FK_REFERENCE_5` (`ID_P_ECF`),
  KEY `FK_REFERENCE_6` (`ID_APLIKASI`),
  CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_P_ECF`) REFERENCES `pembobotan_ecf` (`ID_P_ECF`),
  CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_indikator_ecf
-- ----------------------------
INSERT INTO `log_indikator_ecf` VALUES ('69', '1', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('70', '2', '7', '2');
INSERT INTO `log_indikator_ecf` VALUES ('71', '3', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('72', '4', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('73', '5', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('74', '6', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('75', '7', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('76', '8', '7', '1');
INSERT INTO `log_indikator_ecf` VALUES ('77', '1', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('78', '2', '8', '2');
INSERT INTO `log_indikator_ecf` VALUES ('79', '3', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('80', '4', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('81', '5', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('82', '6', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('83', '7', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('84', '8', '8', '1');
INSERT INTO `log_indikator_ecf` VALUES ('85', '1', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('86', '2', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('87', '3', '9', '2');
INSERT INTO `log_indikator_ecf` VALUES ('88', '4', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('89', '5', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('90', '6', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('91', '7', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('92', '8', '9', '1');
INSERT INTO `log_indikator_ecf` VALUES ('93', '1', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('94', '2', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('95', '3', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('96', '4', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('97', '5', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('98', '6', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('99', '7', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('100', '8', '14', '1');
INSERT INTO `log_indikator_ecf` VALUES ('101', '1', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('102', '2', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('103', '3', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('104', '4', '15', '0');
INSERT INTO `log_indikator_ecf` VALUES ('105', '5', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('106', '6', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('107', '7', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('108', '8', '15', '1');
INSERT INTO `log_indikator_ecf` VALUES ('125', '1', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('126', '2', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('127', '3', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('128', '4', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('129', '5', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('130', '6', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('131', '7', '25', '1');
INSERT INTO `log_indikator_ecf` VALUES ('132', '8', '25', '5');
INSERT INTO `log_indikator_ecf` VALUES ('133', '1', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('134', '2', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('135', '3', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('136', '4', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('137', '5', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('138', '6', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('139', '7', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('140', '8', '27', '1');
INSERT INTO `log_indikator_ecf` VALUES ('141', '1', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('142', '2', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('143', '3', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('144', '4', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('145', '5', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('146', '6', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('147', '7', '29', '1');
INSERT INTO `log_indikator_ecf` VALUES ('148', '8', '29', '2');

-- ----------------------------
-- Table structure for `log_indikator_tcf`
-- ----------------------------
DROP TABLE IF EXISTS `log_indikator_tcf`;
CREATE TABLE `log_indikator_tcf` (
  `ID_LOG_TCF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_P_TCF` int(11) DEFAULT NULL,
  `VALUE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LOG_TCF`),
  KEY `FK_REFERENCE_7` (`ID_APLIKASI`),
  KEY `FK_REFERENCE_8` (`ID_P_TCF`),
  CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`),
  CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_P_TCF`) REFERENCES `pembobotan_tcf` (`ID_P_TCF`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_indikator_tcf
-- ----------------------------
INSERT INTO `log_indikator_tcf` VALUES ('85', '7', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('86', '7', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('87', '7', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('88', '7', '54', '2');
INSERT INTO `log_indikator_tcf` VALUES ('89', '7', '55', '2');
INSERT INTO `log_indikator_tcf` VALUES ('90', '7', '56', '1');
INSERT INTO `log_indikator_tcf` VALUES ('91', '7', '57', '2');
INSERT INTO `log_indikator_tcf` VALUES ('92', '7', '58', '1');
INSERT INTO `log_indikator_tcf` VALUES ('93', '7', '59', '2');
INSERT INTO `log_indikator_tcf` VALUES ('94', '7', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('95', '7', '61', '2');
INSERT INTO `log_indikator_tcf` VALUES ('96', '7', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('97', '7', '63', '2');
INSERT INTO `log_indikator_tcf` VALUES ('98', '8', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('99', '8', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('100', '8', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('101', '8', '54', '1');
INSERT INTO `log_indikator_tcf` VALUES ('102', '8', '55', '1');
INSERT INTO `log_indikator_tcf` VALUES ('103', '8', '56', '1');
INSERT INTO `log_indikator_tcf` VALUES ('104', '8', '57', '1');
INSERT INTO `log_indikator_tcf` VALUES ('105', '8', '58', '1');
INSERT INTO `log_indikator_tcf` VALUES ('106', '8', '59', '1');
INSERT INTO `log_indikator_tcf` VALUES ('107', '8', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('108', '8', '61', '1');
INSERT INTO `log_indikator_tcf` VALUES ('109', '8', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('110', '8', '63', '1');
INSERT INTO `log_indikator_tcf` VALUES ('111', '9', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('112', '9', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('113', '9', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('114', '9', '54', '1');
INSERT INTO `log_indikator_tcf` VALUES ('115', '9', '55', '1');
INSERT INTO `log_indikator_tcf` VALUES ('116', '9', '56', '1');
INSERT INTO `log_indikator_tcf` VALUES ('117', '9', '57', '1');
INSERT INTO `log_indikator_tcf` VALUES ('118', '9', '58', '1');
INSERT INTO `log_indikator_tcf` VALUES ('119', '9', '59', '0');
INSERT INTO `log_indikator_tcf` VALUES ('120', '9', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('121', '9', '61', '1');
INSERT INTO `log_indikator_tcf` VALUES ('122', '9', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('123', '9', '63', '0');
INSERT INTO `log_indikator_tcf` VALUES ('202', '14', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('203', '14', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('204', '14', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('205', '14', '54', '1');
INSERT INTO `log_indikator_tcf` VALUES ('206', '14', '55', '1');
INSERT INTO `log_indikator_tcf` VALUES ('207', '14', '56', '1');
INSERT INTO `log_indikator_tcf` VALUES ('208', '14', '57', '1');
INSERT INTO `log_indikator_tcf` VALUES ('209', '14', '58', '1');
INSERT INTO `log_indikator_tcf` VALUES ('210', '14', '59', '1');
INSERT INTO `log_indikator_tcf` VALUES ('211', '14', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('212', '14', '61', '1');
INSERT INTO `log_indikator_tcf` VALUES ('213', '14', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('214', '14', '63', '2');
INSERT INTO `log_indikator_tcf` VALUES ('215', '15', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('216', '15', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('217', '15', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('218', '15', '54', '0');
INSERT INTO `log_indikator_tcf` VALUES ('219', '15', '55', '1');
INSERT INTO `log_indikator_tcf` VALUES ('220', '15', '56', '1');
INSERT INTO `log_indikator_tcf` VALUES ('221', '15', '57', '1');
INSERT INTO `log_indikator_tcf` VALUES ('222', '15', '58', '0');
INSERT INTO `log_indikator_tcf` VALUES ('223', '15', '59', '1');
INSERT INTO `log_indikator_tcf` VALUES ('224', '15', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('225', '15', '61', '1');
INSERT INTO `log_indikator_tcf` VALUES ('226', '15', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('227', '15', '63', '1');
INSERT INTO `log_indikator_tcf` VALUES ('241', '25', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('242', '25', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('243', '25', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('244', '25', '54', '2');
INSERT INTO `log_indikator_tcf` VALUES ('245', '25', '55', '1');
INSERT INTO `log_indikator_tcf` VALUES ('246', '25', '56', '2');
INSERT INTO `log_indikator_tcf` VALUES ('247', '25', '57', '2');
INSERT INTO `log_indikator_tcf` VALUES ('248', '25', '58', '2');
INSERT INTO `log_indikator_tcf` VALUES ('249', '25', '59', '1');
INSERT INTO `log_indikator_tcf` VALUES ('250', '25', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('251', '25', '61', '2');
INSERT INTO `log_indikator_tcf` VALUES ('252', '25', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('253', '25', '63', '2');
INSERT INTO `log_indikator_tcf` VALUES ('254', '27', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('255', '27', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('256', '27', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('257', '27', '54', '3');
INSERT INTO `log_indikator_tcf` VALUES ('258', '27', '55', '4');
INSERT INTO `log_indikator_tcf` VALUES ('259', '27', '56', '4');
INSERT INTO `log_indikator_tcf` VALUES ('260', '27', '57', '4');
INSERT INTO `log_indikator_tcf` VALUES ('261', '27', '58', '3');
INSERT INTO `log_indikator_tcf` VALUES ('262', '27', '59', '3');
INSERT INTO `log_indikator_tcf` VALUES ('263', '27', '60', '2');
INSERT INTO `log_indikator_tcf` VALUES ('264', '27', '61', '2');
INSERT INTO `log_indikator_tcf` VALUES ('265', '27', '62', '2');
INSERT INTO `log_indikator_tcf` VALUES ('266', '27', '63', '1');
INSERT INTO `log_indikator_tcf` VALUES ('279', '29', '51', '1');
INSERT INTO `log_indikator_tcf` VALUES ('280', '29', '52', '1');
INSERT INTO `log_indikator_tcf` VALUES ('281', '29', '53', '1');
INSERT INTO `log_indikator_tcf` VALUES ('282', '29', '54', '1');
INSERT INTO `log_indikator_tcf` VALUES ('283', '29', '55', '1');
INSERT INTO `log_indikator_tcf` VALUES ('284', '29', '56', '1');
INSERT INTO `log_indikator_tcf` VALUES ('285', '29', '57', '1');
INSERT INTO `log_indikator_tcf` VALUES ('286', '29', '58', '1');
INSERT INTO `log_indikator_tcf` VALUES ('287', '29', '59', '1');
INSERT INTO `log_indikator_tcf` VALUES ('288', '29', '60', '1');
INSERT INTO `log_indikator_tcf` VALUES ('289', '29', '61', '1');
INSERT INTO `log_indikator_tcf` VALUES ('290', '29', '62', '1');
INSERT INTO `log_indikator_tcf` VALUES ('291', '29', '63', '1');

-- ----------------------------
-- Table structure for `log_konstanta_effort`
-- ----------------------------
DROP TABLE IF EXISTS `log_konstanta_effort`;
CREATE TABLE `log_konstanta_effort` (
  `ID_K_EFFORT` int(11) NOT NULL AUTO_INCREMENT,
  `NILAI_EFFORT` double(10,2) NOT NULL,
  `DATE_CREATED` date DEFAULT NULL,
  PRIMARY KEY (`ID_K_EFFORT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_konstanta_effort
-- ----------------------------
INSERT INTO `log_konstanta_effort` VALUES ('1', '20.00', '2015-04-26');

-- ----------------------------
-- Table structure for `log_use_case`
-- ----------------------------
DROP TABLE IF EXISTS `log_use_case`;
CREATE TABLE `log_use_case` (
  `ID_LOG_UC` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_USE_CASE` char(125) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` int(11) DEFAULT NULL,
  `ID_APLIKASI` int(11) DEFAULT NULL,
  `ID_P_UC` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LOG_UC`),
  KEY `FK_REFERENCE_1` (`ID_APLIKASI`),
  KEY `FK_REFERENCE_2` (`ID_P_UC`),
  CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_APLIKASI`) REFERENCES `aplikasi` (`ID_APLIKASI`),
  CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_P_UC`) REFERENCES `pembobotan_use_case` (`ID_P_UC`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_use_case
-- ----------------------------
INSERT INTO `log_use_case` VALUES ('2', 'Use Case menambah data pengguna', '5', '7', '2');
INSERT INTO `log_use_case` VALUES ('3', 'Use case 1', '3', '8', '1');
INSERT INTO `log_use_case` VALUES ('4', 'Menambah pengguna', '3', '9', '1');
INSERT INTO `log_use_case` VALUES ('5', 'a', '3', '9', '1');
INSERT INTO `log_use_case` VALUES ('6', 'b', '1', '9', '1');
INSERT INTO `log_use_case` VALUES ('7', 'c', '3', '9', '1');
INSERT INTO `log_use_case` VALUES ('8', 'g', '3', '9', '1');
INSERT INTO `log_use_case` VALUES ('9', 'z', '60', '9', '3');
INSERT INTO `log_use_case` VALUES ('10', 'Use Case 1', '4', '14', '2');
INSERT INTO `log_use_case` VALUES ('11', 'Use Case 3', '3', '14', '1');
INSERT INTO `log_use_case` VALUES ('13', 'Aplikasi 7', '1', '15', '1');
INSERT INTO `log_use_case` VALUES ('15', 'use case', '5', '25', '2');
INSERT INTO `log_use_case` VALUES ('16', '', '2', '25', '1');
INSERT INTO `log_use_case` VALUES ('17', 'Use Case masak', '8', '25', '3');
INSERT INTO `log_use_case` VALUES ('18', '', '10', '26', '3');
INSERT INTO `log_use_case` VALUES ('19', 'Use Case 4', '3', '26', '1');
INSERT INTO `log_use_case` VALUES ('20', 'tambah pengguna', '8', '27', '3');
INSERT INTO `log_use_case` VALUES ('21', 'Memverifikasi Data Pra-permohonan dengan Dokumen Asli', '2', '29', '1');

-- ----------------------------
-- Table structure for `pembobotan_aktor`
-- ----------------------------
DROP TABLE IF EXISTS `pembobotan_aktor`;
CREATE TABLE `pembobotan_aktor` (
  `ID_P_A` int(11) NOT NULL AUTO_INCREMENT,
  `KLASIFIKASI_AKTOR` char(125) DEFAULT NULL,
  `TIPE_AKTOR` char(125) DEFAULT NULL,
  `BOBOT` double DEFAULT NULL,
  PRIMARY KEY (`ID_P_A`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembobotan_aktor
-- ----------------------------
INSERT INTO `pembobotan_aktor` VALUES ('1', 'Simple', 'Berinteraksi melalui baris perintah atau Command Prompt', '1');
INSERT INTO `pembobotan_aktor` VALUES ('2', 'Average', 'Berinteraksi dengan protokiol  komunikasi seperti (e.g. TCP/IP, FTP, HTTP, database)', '2');
INSERT INTO `pembobotan_aktor` VALUES ('3', 'Complex', 'Berinteraksi dengan GUI atau web page', '3');

-- ----------------------------
-- Table structure for `pembobotan_ecf`
-- ----------------------------
DROP TABLE IF EXISTS `pembobotan_ecf`;
CREATE TABLE `pembobotan_ecf` (
  `ID_P_ECF` int(11) NOT NULL AUTO_INCREMENT,
  `INDIKATOR` char(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double DEFAULT NULL,
  PRIMARY KEY (`ID_P_ECF`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembobotan_ecf
-- ----------------------------
INSERT INTO `pembobotan_ecf` VALUES ('1', 'Familiarity with the Project', 'Apakah tim anda merasa familiar (menguasai) dengan proyek pengembangan perangkat lunak, khusunya proyek perangkat lunak dibidang pendidikan?\r\nSemakin familiar (menguasai), maka nilai semakin tinggi.', '1.5');
INSERT INTO `pembobotan_ecf` VALUES ('2', 'Application Experience', 'Sejauh mana pengalaman tim anda dalam membuat perubahan pada proyek pengembangan perangkat lunak yang sama? Semakin banyak pengalaman dalam membuat perubahan pada proyek yang sama maka nilanya semkin tinggi', '0.5');
INSERT INTO `pembobotan_ecf` VALUES ('3', 'OO Programming Experience', 'Sejauh mana pengalaman tim anda dalam membuat proyek perangkat lunak berbasis Object Oriented (OO) programming?. Semakin banyak pengalaman dalam Object Oriented (OO) programming, maka nilai semakin tinggi.', '1');
INSERT INTO `pembobotan_ecf` VALUES ('4', 'Lead Analyst Capability', 'Lead Analyst Capability', '0.5');
INSERT INTO `pembobotan_ecf` VALUES ('5', 'Motivation', 'Seberapa besar motivasi pada tim anda dalam membuat proyek pengembangan perangkat lunak dibidang pendidikan?\r\nSemakin besar motivasi, maka nilai semakin tinggi.', '1');
INSERT INTO `pembobotan_ecf` VALUES ('6', 'Stable Requirements', 'Seberapa besar kebutuhan pada proyek pengembangan perangkat lunak dibidang pendidikan mengalami perubahan?\r\nSemakin besar kebutuhan akan perubahan, maka nilai semakin tinggi.', '2');
INSERT INTO `pembobotan_ecf` VALUES ('7', 'Part Time Staff', 'Apakah dalam tim anda terdapat anggota tim yang bekerja paruh waktu?\r\nSemakin banyak waktu yang digunakan anggota tim untuk bekerja paruh waktu, maka nilai semakin tinggi.', '-1');
INSERT INTO `pembobotan_ecf` VALUES ('8', 'Difficult Programming Language', 'Seberapa sulit bagi tim anda, bahasa pemrograman yang digunakan dalam pembuatan proyek perangkat lunak dibidang pendidikan?\r\nSemakin sulit bahasa pemrograman, maka nilai semakin tinggi.', '-1');

-- ----------------------------
-- Table structure for `pembobotan_tcf`
-- ----------------------------
DROP TABLE IF EXISTS `pembobotan_tcf`;
CREATE TABLE `pembobotan_tcf` (
  `ID_P_TCF` int(11) NOT NULL AUTO_INCREMENT,
  `INDIKATOR` char(125) DEFAULT NULL,
  `DESKRIPSI` text,
  `BOBOT` double DEFAULT NULL,
  PRIMARY KEY (`ID_P_TCF`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembobotan_tcf
-- ----------------------------
INSERT INTO `pembobotan_tcf` VALUES ('51', 'Distributed System Required', 'Seberapa kompleks (terpusat ataupun terdistribusi) kebutuhan arsitektur pada proyek perangkat lunak ini?\r\nSemakin kompleks kebutuhan arsitektur, maka nilai semakin tinggi.', '2');
INSERT INTO `pembobotan_tcf` VALUES ('52', 'Response Time Is Important', 'Apakah menurut tim anda kecepatan respon (server) bagi pengguna merupakan faktor penting?\r\nSemakin pentingnya peningkatan waktu respon, maka nilai semakin tinggi.', '1');
INSERT INTO `pembobotan_tcf` VALUES ('53', 'End User Efficiency', 'Apakah menurut tim anda proyek perangkat lunak yang dikembangkan ini untuk mengoptimalkan efisiensi pengguna, atau hanya mengutamakan kemampuan tim saja?\r\nSemakin optimal efisiensi pengguna, maka nilai semakin tinggi. ', '1');
INSERT INTO `pembobotan_tcf` VALUES ('54', 'Complex Internal Processing Required', 'Seberapa banyak algoritma yang sulit (kompleks) untuk dilakukan dan diuji pada proyek perangkat lunak ini?\r\nSemakin kompleks algoritma (resource leveling, OLAP cubes, etc) maka nilai semakin tinggi. Namun, database sederhana, maka nilai semakin rendah.', '1');
INSERT INTO `pembobotan_tcf` VALUES ('55', 'Reusable Code Must Be A Focus', 'Seberapa besar penggunaan ulang kode pada proyek perangkat lunak ini? “Penggunaan ulang kode mengurangi jumlah usaha yang diperlukan untuk mendistribusikan sebuah proyek dan mengurangi jumlah waktu yang diperlukan untuk debugging sebuah proyek.”\r\nSemakin tinggi tingkat penggunaan ulang kode, maka nilai semakin rendah.', '1');
INSERT INTO `pembobotan_tcf` VALUES ('56', 'Installation Easy', 'Apakah menurut tim anda kemudahan instalasi proyek perangkat lunak ini bagi pengguna akhir merupakan faktor penting?\r\nSemakin tinggi tingkat kompetensi pengguna dalam instalasi proyek perangkat lunak ini, maka nilai semakin rendah.', '0.5');
INSERT INTO `pembobotan_tcf` VALUES ('57', 'Usability', 'Apakah kemudahan dalam penggunaan aplikasi merupakan kriteria utama dari proyek pembuatan perangkat lunak tim anda?\r\nSemakin besar pentingnya kegunaan, semakin tinggi nilai yang diberikan. ', '0.5');
INSERT INTO `pembobotan_tcf` VALUES ('58', 'Cross-Platform Support', 'Apakah dibutuhkan dukungan multi-platform untuk aplikasi dari tim anda?\r\nSemakin banyak platform yang harus didukung (ini bisa versi browser, perangkat mobile, dll atau Windows / OSX / Unix), semakin tinggi nilai yang diberikan.', '2');
INSERT INTO `pembobotan_tcf` VALUES ('59', 'Easy To Change', 'Apakah aplikasi anda mudah untuk diubah atau disesuaikan oleh pengguna / customer di masa depan? Semakin mudah perubahan atau penyesuaian aplikasi anda,maka nilai semakin tinggi. ', '1');
INSERT INTO `pembobotan_tcf` VALUES ('60', 'Highly Concurrent', 'Apakah dalam aplikasi anda dapat mengatasi penguncian database atau masalah konkurensi lainnya?\r\nSemakin tinggi perhatian yang diberikan untuk menyelesaikan permasalahan dalam data atau aplikasi, maka nilai semakin tinggi. ', '1');
INSERT INTO `pembobotan_tcf` VALUES ('61', 'Custom Security', 'Apakah dalam aplikasi anda solusi keamanan yang ada mudah digunakan, atau kode kustom harus dikembangkan?\r\nApabila kode kustom kemanan lebih harus dilakukan, maka nilai semakin tinggi', '1');
INSERT INTO `pembobotan_tcf` VALUES ('62', 'Dependence On Third-Party Code', 'Apakah aplikasi anda masih memerlukan kontrol dari pihak ketiga, seperti penggunaan ulang kode?\r\nApabila kebutuhan kontrol dari pihak ketiga tidak terlalu penting, maka nilai semakin tinggi.', '1');
INSERT INTO `pembobotan_tcf` VALUES ('63', 'User Training', 'Berapa lama waktu yang dibutuhkan untuk pelatihan pengguna diperlukan?\r\nSemakin lama waktu yang dibutuhkan pengguna untuk penguasaan aplikasi, maka semakin tinggi nilai yang diberikan.', '1');

-- ----------------------------
-- Table structure for `pembobotan_use_case`
-- ----------------------------
DROP TABLE IF EXISTS `pembobotan_use_case`;
CREATE TABLE `pembobotan_use_case` (
  `ID_P_UC` int(11) NOT NULL AUTO_INCREMENT,
  `TIPE` char(125) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` char(125) DEFAULT NULL,
  `BOBOT` int(3) DEFAULT NULL,
  PRIMARY KEY (`ID_P_UC`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembobotan_use_case
-- ----------------------------
INSERT INTO `pembobotan_use_case` VALUES ('1', 'Simple', '1-3', '5');
INSERT INTO `pembobotan_use_case` VALUES ('2', 'Average', '4-7', '10');
INSERT INTO `pembobotan_use_case` VALUES ('3', 'Complex', '>=8', '15');

-- ----------------------------
-- Table structure for `profesi`
-- ----------------------------
DROP TABLE IF EXISTS `profesi`;
CREATE TABLE `profesi` (
  `ID_PROFESI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PROFESI` char(125) DEFAULT NULL,
  `GAJI_PER_BULAN` double DEFAULT NULL,
  PRIMARY KEY (`ID_PROFESI`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of profesi
-- ----------------------------
INSERT INTO `profesi` VALUES ('1', 'Programmer', '2500000');
INSERT INTO `profesi` VALUES ('2', 'Sistem Analis', '4000000');
INSERT INTO `profesi` VALUES ('3', 'Project Manager', '8500000');
INSERT INTO `profesi` VALUES ('4', 'Tester', '3000000');
INSERT INTO `profesi` VALUES ('5', 'Dokumentator', '1500000');

-- ----------------------------
-- Table structure for `tim`
-- ----------------------------
DROP TABLE IF EXISTS `tim`;
CREATE TABLE `tim` (
  `ID_TIM` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_TIM` char(125) DEFAULT NULL,
  PRIMARY KEY (`ID_TIM`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tim
-- ----------------------------
INSERT INTO `tim` VALUES ('15', 'Tim Aplikasi2');
INSERT INTO `tim` VALUES ('16', 'Tim UCP 2');
INSERT INTO `tim` VALUES ('17', 'Tim Aplikasi 3');
INSERT INTO `tim` VALUES ('18', 'Tim Aplikasi UCP');
INSERT INTO `tim` VALUES ('19', 'Tim Aplikasi 3');
INSERT INTO `tim` VALUES ('20', 'Tim Aplikasi UCP');
INSERT INTO `tim` VALUES ('21', 'Tim Aplikasi UCP');
INSERT INTO `tim` VALUES ('22', 'Tim sip');
INSERT INTO `tim` VALUES ('23', 'Tim Aplikasi 100');
INSERT INTO `tim` VALUES ('24', 'Tim Aplikasi 3');
INSERT INTO `tim` VALUES ('25', 'Tim Aplikasi UCP');
INSERT INTO `tim` VALUES ('26', 'Tim Aplikasi UCP');
INSERT INTO `tim` VALUES ('27', 'Tim Aplikasi gudang');
INSERT INTO `tim` VALUES ('28', 'Tim Aplikasi Nyamuk');
INSERT INTO `tim` VALUES ('29', 'Tim Aplikasi UCP');
INSERT INTO `tim` VALUES ('30', 'Tim Aplikais 3');
INSERT INTO `tim` VALUES ('31', 'Tim Aplikasi UCP');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` char(125) DEFAULT NULL,
  `USERNAME` char(125) DEFAULT NULL,
  `EMAIL` varchar(125) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'Administrator', 'admin', null, '21232f297a57a5a743894a0e4a801fc3', '1');
INSERT INTO `user` VALUES ('5', 'Aula Ayubi2', 'sekretaris', null, '21232f297a57a5a743894a0e4a801fc3', '4');
INSERT INTO `user` VALUES ('6', 'Affas', 'analis', null, '21232f297a57a5a743894a0e4a801fc3', '3');
INSERT INTO `user` VALUES ('7', 'Fathurahman', 'direktur', 'faturrahman.sukses@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2');
