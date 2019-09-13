/*
Navicat MySQL Data Transfer

Source Server         : mysql_ta
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : ucpapps

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-29 14:43:01
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
  `ID_KATEGORI_AKTIVITAS` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_AKTIVITAS`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aktivitas
-- ----------------------------
INSERT INTO `aktivitas` VALUES ('16', 'Requirements', '2', '1', '7.50', '1');
INSERT INTO `aktivitas` VALUES ('17', 'Specifications & Design', '2', '1', '17.50', '1');
INSERT INTO `aktivitas` VALUES ('18', 'Coding', '1', '1', '10.00', '1');
INSERT INTO `aktivitas` VALUES ('19', 'Testing', '4', '1', '7.00', '1');
INSERT INTO `aktivitas` VALUES ('20', 'Project management', '3', '1', '7.00', '2');
INSERT INTO `aktivitas` VALUES ('21', 'Configuration Management', '2', '1', '3.00', '2');
INSERT INTO `aktivitas` VALUES ('22', 'Documentation', '5', '1', '3.00', '2');
INSERT INTO `aktivitas` VALUES ('23', 'Training & Support', '2', '1', '3.00', '2');
INSERT INTO `aktivitas` VALUES ('24', 'Acceptance & Deployment', '3', '1', '5.00', '2');
INSERT INTO `aktivitas` VALUES ('25', 'Quality Assurance & Control', '3', '1', '12.34', '3');
INSERT INTO `aktivitas` VALUES ('26', 'Evaluation and Testing', '4', '1', '24.66', '3');

-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `ID_ANGGOTA` int(10) NOT NULL AUTO_INCREMENT,
  `NIP` varchar(125) DEFAULT NULL,
  `NAMA` varchar(125) DEFAULT NULL,
  `ID_PROFESI` int(10) DEFAULT NULL,
  `PENGALAMAN` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID_ANGGOTA`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('13', '1234', 'Amril Azhar', '1', '2 tahun');
INSERT INTO `anggota` VALUES ('14', '12344', 'Faiz Fanani', '1', '12');

-- ----------------------------
-- Table structure for `anggota_tim`
-- ----------------------------
DROP TABLE IF EXISTS `anggota_tim`;
CREATE TABLE `anggota_tim` (
  `ID_ANGGOTA_TIM` int(10) NOT NULL AUTO_INCREMENT,
  `ID_TIM` int(10) NOT NULL,
  `ID_ANGGOTA` int(10) NOT NULL,
  PRIMARY KEY (`ID_ANGGOTA_TIM`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of anggota_tim
-- ----------------------------
INSERT INTO `anggota_tim` VALUES ('7', '1', '14');
INSERT INTO `anggota_tim` VALUES ('4', '1', '0');
INSERT INTO `anggota_tim` VALUES ('3', '1', '0');
INSERT INTO `anggota_tim` VALUES ('6', '1', '13');

-- ----------------------------
-- Table structure for `aplikasi`
-- ----------------------------
DROP TABLE IF EXISTS `aplikasi`;
CREATE TABLE `aplikasi` (
  `ID_APLIKASI` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_APLIKASI` varchar(125) DEFAULT NULL,
  `STATUS` int(10) DEFAULT NULL,
  `BIAYA_ESTIMASI` double(10,2) DEFAULT NULL,
  `BIAYA_REAL` double(125,2) DEFAULT NULL,
  `UCW` double(10,2) DEFAULT NULL,
  `UAW` double(10,2) DEFAULT NULL,
  `ECF` double(10,2) DEFAULT NULL,
  `TCF` double(10,2) DEFAULT NULL,
  `DATE_CREATED` varchar(12) DEFAULT NULL,
  `ID_TIM` int(10) DEFAULT NULL,
  `TEMPLETE` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_APLIKASI`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aplikasi
-- ----------------------------
INSERT INTO `aplikasi` VALUES ('96', 'Aplikasi UCP', '0', null, null, '30.00', '2.00', '0.65', '0.76', '22-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('97', 'Aplikasi SIM_RS', '0', null, null, '5.00', null, null, null, '24-03-2015', '1', '0');
INSERT INTO `aplikasi` VALUES ('98', 'd', '0', null, null, '45.00', null, null, null, '24-03-2015', '2', '1');
INSERT INTO `aplikasi` VALUES ('99', 'Use ase', '0', null, null, '10.00', '11.00', null, null, '25-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('100', 'Aplikasi 1', '0', null, null, '15.00', '2.00', '0.62', '0.72', '25-03-2015', '2', '1');
INSERT INTO `aplikasi` VALUES ('101', 'Alikasi 3', '0', null, null, '15.00', '6.00', '0.63', '0.72', '26-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('102', 'Aplikasi2', '0', null, null, '10.00', '2.00', '0.66', '0.74', '26-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('103', 'Aplikasi Perhitungan Biaya', '0', null, null, null, null, null, null, '26-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('104', 'Aplikasi UCP', '0', null, null, '5.00', '2.00', '0.67', '0.72', '26-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('105', 'Aplikasi Coba Final', '0', null, null, null, null, null, null, '26-03-2015', '2', '0');
INSERT INTO `aplikasi` VALUES ('106', 'Aplikasi 1', '0', null, null, null, null, null, null, '26-03-2015', '1', '0');
INSERT INTO `aplikasi` VALUES ('107', 'Aplikasi Harga', '0', null, null, '5.00', '1.00', '0.65', '0.70', '26-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('108', 'Aplikasi 4', '0', null, null, '5.00', '1.00', null, '0.80', '26-03-2015', '1', '1');
INSERT INTO `aplikasi` VALUES ('109', 'f', '0', null, null, '5.00', '1.00', null, '0.72', '26-03-2015', '1', '0');
INSERT INTO `aplikasi` VALUES ('110', 'sdc', '0', null, null, '5.00', '2.00', null, null, '26-03-2015', '1', '0');
INSERT INTO `aplikasi` VALUES ('111', 'dfv', '0', null, null, '5.00', '2.00', null, null, '26-03-2015', '2', '0');
INSERT INTO `aplikasi` VALUES ('112', 'dfv', '0', null, null, '5.00', null, null, null, '26-03-2015', '2', '1');
INSERT INTO `aplikasi` VALUES ('113', 'Aplikasi 4', '0', null, null, null, null, null, null, '26-03-2015', '1', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_actor_weight
-- ----------------------------
INSERT INTO `log_actor_weight` VALUES ('71', '96', 'aq', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('72', '99', 'Aktor 1', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('73', '99', 'Aktor 3', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('74', '99', 'Aktor 2', '3', '3.00');
INSERT INTO `log_actor_weight` VALUES ('75', '99', 'as', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('76', '99', 'sd', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('77', '99', 'f', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('82', '100', 'Aktor3', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('79', '100', 'Aktor4', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('83', '101', 'Pengguna', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('84', '101', 'Direktur', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('85', '101', 'Skpd', '3', '3.00');
INSERT INTO `log_actor_weight` VALUES ('86', '102', 'Aktor 1', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('87', '104', 'Aktor 3', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('88', '107', 'Aktor 3', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('89', '108', 'Aktor w', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('91', '109', 'Aktor 17', '1', '1.00');
INSERT INTO `log_actor_weight` VALUES ('92', '110', 'd', '2', '2.00');
INSERT INTO `log_actor_weight` VALUES ('93', '111', 'dsf', '2', '2.00');

-- ----------------------------
-- Table structure for `log_biaya`
-- ----------------------------
DROP TABLE IF EXISTS `log_biaya`;
CREATE TABLE `log_biaya` (
  `ID_LOG_BIAYA` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `ID_AKTIVITAS` int(125) DEFAULT NULL,
  `PRESENTASE_USAHA` double(10,2) DEFAULT NULL,
  `NILAI_USAHA` double(10,2) DEFAULT NULL,
  `GAJI_PER_JAM` double(10,2) DEFAULT NULL,
  `BIAYA_AKTIVITAS` double(10,2) DEFAULT NULL,
  `EDIT` int(10) DEFAULT '0',
  PRIMARY KEY (`ID_LOG_BIAYA`)
) ENGINE=MyISAM AUTO_INCREMENT=3521 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_biaya
-- ----------------------------
INSERT INTO `log_biaya` VALUES ('3278', '96', '26', '24.66', '77.97', '18750.00', '1461937.50', '0');
INSERT INTO `log_biaya` VALUES ('3277', '96', '25', '12.34', '39.01', '53125.00', '2072406.25', '0');
INSERT INTO `log_biaya` VALUES ('3276', '96', '24', '5.00', '15.81', '53125.00', '839906.25', '0');
INSERT INTO `log_biaya` VALUES ('3275', '96', '23', '3.00', '9.48', '25000.00', '237000.00', '0');
INSERT INTO `log_biaya` VALUES ('3274', '96', '22', '3.00', '9.48', '9375.00', '88875.00', '0');
INSERT INTO `log_biaya` VALUES ('3273', '96', '21', '3.00', '9.48', '25000.00', '237000.00', '0');
INSERT INTO `log_biaya` VALUES ('3272', '96', '20', '7.00', '22.13', '53125.00', '1175656.25', '0');
INSERT INTO `log_biaya` VALUES ('3271', '96', '19', '7.00', '22.13', '18750.00', '414937.50', '0');
INSERT INTO `log_biaya` VALUES ('3270', '96', '18', '10.00', '31.62', '15625.00', '494062.50', '0');
INSERT INTO `log_biaya` VALUES ('3269', '96', '17', '17.50', '55.33', '25000.00', '1383250.00', '0');
INSERT INTO `log_biaya` VALUES ('3268', '96', '16', '7.50', '23.71', '25000.00', '592750.00', '0');
INSERT INTO `log_biaya` VALUES ('3344', '100', '26', '24.66', '37.43', '18750.00', '701812.50', '0');
INSERT INTO `log_biaya` VALUES ('3343', '100', '25', '12.34', '18.73', '53125.00', '995031.25', '0');
INSERT INTO `log_biaya` VALUES ('3342', '100', '24', '5.00', '7.59', '53125.00', '403218.75', '0');
INSERT INTO `log_biaya` VALUES ('3341', '100', '23', '3.00', '4.55', '25000.00', '113750.00', '0');
INSERT INTO `log_biaya` VALUES ('3340', '100', '22', '3.00', '4.55', '9375.00', '42656.25', '0');
INSERT INTO `log_biaya` VALUES ('3339', '100', '21', '3.00', '4.55', '25000.00', '113750.00', '0');
INSERT INTO `log_biaya` VALUES ('3338', '100', '20', '7.00', '10.62', '53125.00', '564187.50', '0');
INSERT INTO `log_biaya` VALUES ('3337', '100', '19', '7.00', '10.62', '18750.00', '199125.00', '0');
INSERT INTO `log_biaya` VALUES ('3336', '100', '18', '10.00', '15.18', '15625.00', '237187.50', '0');
INSERT INTO `log_biaya` VALUES ('3335', '100', '17', '17.50', '26.56', '25000.00', '664000.00', '0');
INSERT INTO `log_biaya` VALUES ('3334', '100', '16', '7.50', '11.38', '25000.00', '284500.00', '0');
INSERT INTO `log_biaya` VALUES ('3410', '101', '26', '24.66', '46.98', '18750.00', '880875.00', '0');
INSERT INTO `log_biaya` VALUES ('3409', '101', '25', '12.34', '23.51', '53125.00', '1248968.75', '0');
INSERT INTO `log_biaya` VALUES ('3408', '101', '24', '5.00', '9.53', '53125.00', '506281.25', '0');
INSERT INTO `log_biaya` VALUES ('3407', '101', '23', '3.00', '5.72', '25000.00', '143000.00', '0');
INSERT INTO `log_biaya` VALUES ('3406', '101', '22', '3.00', '5.72', '9375.00', '53625.00', '0');
INSERT INTO `log_biaya` VALUES ('3405', '101', '21', '3.00', '5.72', '25000.00', '143000.00', '0');
INSERT INTO `log_biaya` VALUES ('3404', '101', '20', '7.00', '13.34', '53125.00', '708687.50', '0');
INSERT INTO `log_biaya` VALUES ('3403', '101', '19', '7.00', '13.34', '18750.00', '250125.00', '0');
INSERT INTO `log_biaya` VALUES ('3402', '101', '18', '10.00', '19.05', '15625.00', '297656.25', '0');
INSERT INTO `log_biaya` VALUES ('3401', '101', '17', '17.50', '33.34', '25000.00', '833500.00', '0');
INSERT INTO `log_biaya` VALUES ('3400', '101', '16', '7.50', '14.29', '25000.00', '357250.00', '0');
INSERT INTO `log_biaya` VALUES ('3498', '104', '26', '24.66', '14.91', '18750.00', '279562.50', '0');
INSERT INTO `log_biaya` VALUES ('3497', '104', '25', '12.34', '7.46', '53125.00', '396312.50', '0');
INSERT INTO `log_biaya` VALUES ('3496', '104', '24', '5.00', '3.02', '53125.00', '160437.50', '0');
INSERT INTO `log_biaya` VALUES ('3495', '104', '23', '3.00', '1.81', '25000.00', '45250.00', '0');
INSERT INTO `log_biaya` VALUES ('3494', '104', '22', '3.00', '1.81', '9375.00', '16968.75', '0');
INSERT INTO `log_biaya` VALUES ('3493', '104', '21', '3.00', '1.81', '25000.00', '45250.00', '0');
INSERT INTO `log_biaya` VALUES ('3492', '104', '20', '7.00', '4.23', '53125.00', '224718.75', '0');
INSERT INTO `log_biaya` VALUES ('3491', '104', '19', '7.00', '4.23', '18750.00', '79312.50', '0');
INSERT INTO `log_biaya` VALUES ('3490', '104', '18', '10.00', '6.05', '15625.00', '94531.25', '0');
INSERT INTO `log_biaya` VALUES ('3489', '104', '17', '17.50', '10.58', '25000.00', '264500.00', '0');
INSERT INTO `log_biaya` VALUES ('3488', '104', '16', '7.50', '4.54', '25000.00', '113500.00', '0');
INSERT INTO `log_biaya` VALUES ('3499', '107', '16', '7.50', '4.10', '25000.00', '102500.00', '0');
INSERT INTO `log_biaya` VALUES ('3500', '107', '17', '17.50', '9.56', '25000.00', '239000.00', '0');
INSERT INTO `log_biaya` VALUES ('3501', '107', '18', '10.00', '5.46', '15625.00', '85312.50', '0');
INSERT INTO `log_biaya` VALUES ('3502', '107', '19', '7.00', '3.82', '18750.00', '71625.00', '0');
INSERT INTO `log_biaya` VALUES ('3503', '107', '20', '7.00', '3.82', '53125.00', '202937.50', '0');
INSERT INTO `log_biaya` VALUES ('3504', '107', '21', '3.00', '1.64', '25000.00', '41000.00', '0');
INSERT INTO `log_biaya` VALUES ('3505', '107', '22', '3.00', '1.64', '9375.00', '15375.00', '0');
INSERT INTO `log_biaya` VALUES ('3506', '107', '23', '3.00', '1.64', '25000.00', '41000.00', '0');
INSERT INTO `log_biaya` VALUES ('3507', '107', '24', '5.00', '2.73', '53125.00', '145031.25', '0');
INSERT INTO `log_biaya` VALUES ('3508', '107', '25', '12.34', '6.74', '53125.00', '358062.50', '0');
INSERT INTO `log_biaya` VALUES ('3509', '107', '26', '24.66', '13.46', '18750.00', '252375.00', '0');
INSERT INTO `log_biaya` VALUES ('3510', '102', '16', '7.50', '8.79', '25000.00', '219750.00', '0');
INSERT INTO `log_biaya` VALUES ('3511', '102', '17', '17.50', '20.51', '25000.00', '512750.00', '0');
INSERT INTO `log_biaya` VALUES ('3512', '102', '18', '10.00', '11.72', '15625.00', '183125.00', '0');
INSERT INTO `log_biaya` VALUES ('3513', '102', '19', '7.00', '8.21', '18750.00', '153937.50', '0');
INSERT INTO `log_biaya` VALUES ('3514', '102', '20', '7.00', '8.21', '53125.00', '436156.25', '0');
INSERT INTO `log_biaya` VALUES ('3515', '102', '21', '3.00', '3.52', '25000.00', '88000.00', '0');
INSERT INTO `log_biaya` VALUES ('3516', '102', '22', '3.00', '3.52', '9375.00', '33000.00', '0');
INSERT INTO `log_biaya` VALUES ('3517', '102', '23', '3.00', '3.52', '25000.00', '88000.00', '0');
INSERT INTO `log_biaya` VALUES ('3518', '102', '24', '5.00', '5.86', '53125.00', '311312.50', '0');
INSERT INTO `log_biaya` VALUES ('3519', '102', '25', '12.34', '14.46', '53125.00', '768187.50', '0');
INSERT INTO `log_biaya` VALUES ('3520', '102', '26', '24.66', '28.91', '18750.00', '542062.50', '0');

-- ----------------------------
-- Table structure for `log_ecf_weight`
-- ----------------------------
DROP TABLE IF EXISTS `log_ecf_weight`;
CREATE TABLE `log_ecf_weight` (
  `ID_LOG_ECF` int(10) NOT NULL AUTO_INCREMENT,
  `ID_APLIKASI` int(10) DEFAULT NULL,
  `ID_ECF` int(10) DEFAULT NULL,
  `VALUE` int(10) DEFAULT NULL,
  `BOBOT` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_LOG_ECF`)
) ENGINE=MyISAM AUTO_INCREMENT=159197 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_ecf_weight
-- ----------------------------
INSERT INTO `log_ecf_weight` VALUES ('159015', '96', '3', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159016', '96', '4', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159017', '96', '5', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159018', '96', '6', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159019', '96', '7', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159020', '96', '8', '1', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('159021', '96', '9', '1', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159022', '96', '10', '2', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159062', '100', '10', '2', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159061', '100', '9', '1', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159060', '100', '8', '1', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('159059', '100', '7', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159058', '100', '6', '1', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159057', '100', '5', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159056', '100', '4', '1', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159055', '100', '3', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159063', '101', '3', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159064', '101', '4', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159065', '101', '5', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159066', '101', '6', '1', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159067', '101', '7', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159068', '101', '8', '1', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('159069', '101', '9', '1', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159070', '101', '10', '2', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159196', '102', '10', '1', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159195', '102', '9', '0', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159194', '102', '8', '1', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('159193', '102', '7', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159192', '102', '6', '1', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159191', '102', '5', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159190', '102', '4', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159189', '102', '3', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159157', '104', '3', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159156', '104', '4', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159155', '104', '5', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159154', '104', '6', '2', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159153', '104', '7', '2', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159152', '104', '8', '2', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('159151', '104', '9', '2', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159150', '104', '10', '1', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159188', '107', '3', '3', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159187', '107', '4', '1', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159186', '107', '5', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159185', '107', '6', '1', '0.00');
INSERT INTO `log_ecf_weight` VALUES ('159184', '107', '7', '1', '1.00');
INSERT INTO `log_ecf_weight` VALUES ('159183', '107', '8', '1', '2.00');
INSERT INTO `log_ecf_weight` VALUES ('159182', '107', '9', '1', '-1.00');
INSERT INTO `log_ecf_weight` VALUES ('159181', '107', '10', '1', '-1.00');

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
) ENGINE=MyISAM AUTO_INCREMENT=311749 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_tcf_weight
-- ----------------------------
INSERT INTO `log_tcf_weight` VALUES ('311605', '96', '18', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311604', '96', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311603', '96', '16', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311602', '96', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311601', '96', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311600', '96', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311599', '96', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311598', '96', '11', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311597', '96', '10', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311596', '96', '9', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311595', '96', '8', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311594', '96', '5', '2', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311545', '100', '18', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311544', '100', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311543', '100', '16', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311542', '100', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311541', '100', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311540', '100', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311539', '100', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311538', '100', '11', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311537', '100', '10', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311536', '100', '9', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311535', '100', '8', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311534', '100', '5', '1', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311581', '101', '18', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311580', '101', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311579', '101', '16', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311578', '101', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311577', '101', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311576', '101', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311575', '101', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311574', '101', '11', '2', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311573', '101', '10', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311572', '101', '9', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311571', '101', '8', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311570', '101', '5', '1', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311748', '102', '18', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311747', '102', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311746', '102', '16', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311745', '102', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311744', '102', '14', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311743', '102', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311742', '102', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311741', '102', '11', '2', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311740', '102', '10', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311739', '102', '9', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311738', '102', '8', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311737', '102', '5', '1', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311689', '104', '5', '1', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311688', '104', '8', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311687', '104', '9', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311686', '104', '10', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311685', '104', '11', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311684', '104', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311683', '104', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311682', '104', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311681', '104', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311680', '104', '16', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311679', '104', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311678', '104', '18', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311690', '107', '5', '1', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311691', '107', '8', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311692', '107', '9', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311693', '107', '10', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311694', '107', '11', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311695', '107', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311696', '107', '13', '0', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311697', '107', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311698', '107', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311699', '107', '16', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311700', '107', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311701', '107', '18', '0', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311702', '108', '5', '1', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311703', '108', '8', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311704', '108', '9', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311705', '108', '10', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311706', '108', '11', '2', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311707', '108', '12', '2', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311708', '108', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311709', '108', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311710', '108', '15', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311711', '108', '16', '2', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311712', '108', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311713', '108', '18', '5', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311735', '109', '17', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311734', '109', '16', '0', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311733', '109', '15', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311732', '109', '14', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311731', '109', '13', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311730', '109', '12', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311729', '109', '11', '1', '0.50');
INSERT INTO `log_tcf_weight` VALUES ('311728', '109', '10', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311727', '109', '9', '0', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311726', '109', '8', '1', '1.00');
INSERT INTO `log_tcf_weight` VALUES ('311725', '109', '5', '2', '2.00');
INSERT INTO `log_tcf_weight` VALUES ('311736', '109', '18', '1', '1.00');

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
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log_uc_weight
-- ----------------------------
INSERT INTO `log_uc_weight` VALUES ('153', '96', 'Use Case 12', '12', '3', '15.00');
INSERT INTO `log_uc_weight` VALUES ('154', '96', 'Use Case 12', '5', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('155', '96', 'Use Case 12', '6', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('156', '97', 'Tambah Pengguna', '5', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('157', '98', 'use Case 1', '4', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('158', '98', 'Use Case 2', '1', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('159', '98', 'e', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('160', '98', '1', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('161', '98', 'a', '1', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('162', '98', '132', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('163', '98', 'qe', '5', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('164', '98', 'qw', '6', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('202', '107', 'Use Case 4', '5', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('199', '104', 'Use Case 2', '4', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('210', '102', 'Use Case 2', '4', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('196', '101', 'Use Case 2', '3', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('193', '99', 'Use Case 2', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('194', '100', 'Use Case 1', '12', '3', '15.00');
INSERT INTO `log_uc_weight` VALUES ('195', '101', 'Use Case 2', '6', '2', '10.00');
INSERT INTO `log_uc_weight` VALUES ('192', '99', 'Use Case 1', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('203', '108', 'Use Case 3', '4', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('206', '109', 'Aktor 3', '3', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('207', '110', 'c', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('208', '111', 'dfv', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('209', '112', 'f', '2', '1', '5.00');
INSERT INTO `log_uc_weight` VALUES ('211', '102', 'Use Case 2', '2', '1', '5.00');

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
INSERT INTO `metode_aktivitas` VALUES ('1', 'Kasim Saleh', null, '1.00');

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
INSERT INTO `metode_usaha` VALUES ('2', 'Metode Gustav Karner', '20.00', '1');

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
INSERT INTO `profesi` VALUES ('1', 'Programmer', '2500000.00');
INSERT INTO `profesi` VALUES ('2', 'Sistem Analis', '4000000.00');
INSERT INTO `profesi` VALUES ('3', 'Project Manager', '8500000.00');
INSERT INTO `profesi` VALUES ('4', 'Tester', '3000000.00');
INSERT INTO `profesi` VALUES ('5', 'Dokumentator', '1500000.00');

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
-- Table structure for `tim`
-- ----------------------------
DROP TABLE IF EXISTS `tim`;
CREATE TABLE `tim` (
  `ID_TIM` int(10) NOT NULL AUTO_INCREMENT,
  `NAMA_TIM` varchar(10) DEFAULT NULL,
  `DESKRIPSI_TIM` varchar(125) DEFAULT NULL,
  `DATE_CREATED` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`ID_TIM`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tim
-- ----------------------------
INSERT INTO `tim` VALUES ('1', 'Tim A', 'Tim ini merupaan tim unggulan', '12');
INSERT INTO `tim` VALUES ('2', 'Tim B', '  sebuah tim yang bahagia', null);
INSERT INTO `tim` VALUES ('3', 'Tim C', '  Deskripsi 2', '10-03-2015');

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
INSERT INTO `uc_weight` VALUES ('1', 'Simple', '1-5', '5.00');
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
