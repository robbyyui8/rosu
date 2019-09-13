/*
Navicat MySQL Data Transfer

Source Server         : mysql_ta
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : ucapps_final

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-05-25 20:39:15
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
