/*
 Navicat Premium Data Transfer

 Source Server         : kominfo
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : db_sispak_moora

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 07/06/2022 00:30:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_diagnosis
-- ----------------------------
DROP TABLE IF EXISTS `tb_diagnosis`;
CREATE TABLE `tb_diagnosis`  (
  `id_diagnosis` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `data_gejala` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penyakit` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hasil_moora` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_diagnosis`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  INDEX `penyakit`(`penyakit`) USING BTREE,
  CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `tb_pengguna` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penyakit` FOREIGN KEY (`penyakit`) REFERENCES `tb_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_diagnosis
-- ----------------------------
INSERT INTO `tb_diagnosis` VALUES (1, 'nita@gmail.com', '[\"G26\",\"G27\",\"G28\",\"G29\"]', 'P09', '0.15859851314591', '2022-05-22 19:12:29');
INSERT INTO `tb_diagnosis` VALUES (2, 'nita@gmail.com', '[\"G01\",\"G02\",\"G03\",\"G05\"]', 'P01', '0.11894888485943', '2022-05-22 19:21:56');
INSERT INTO `tb_diagnosis` VALUES (3, 'nita@gmail.com', '[\"G01\",\"G02\",\"G03\",\"G05\"]', 'P01', '0.11894888485943', '2022-06-07 00:25:54');

-- ----------------------------
-- Table structure for tb_gejala
-- ----------------------------
DROP TABLE IF EXISTS `tb_gejala`;
CREATE TABLE `tb_gejala`  (
  `kode_gejala` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gejala` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bobot` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kode_gejala`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_gejala
-- ----------------------------
INSERT INTO `tb_gejala` VALUES ('G01', 'Urine keruh atau berdarah', '0.03', 1, '2022-05-15 08:28:30', '2022-05-22 13:44:59');
INSERT INTO `tb_gejala` VALUES ('G02', 'Nyeri saat buang air kecil', '0.03', 1, '2022-05-22 12:32:34', '2022-05-22 13:45:02');
INSERT INTO `tb_gejala` VALUES ('G03', 'Demam', '0.04', 1, '2022-05-22 12:32:37', '2022-05-22 13:45:05');
INSERT INTO `tb_gejala` VALUES ('G04', 'Sering Sendawa', '0.04', 1, '2022-05-22 12:32:39', '2022-05-22 13:45:09');
INSERT INTO `tb_gejala` VALUES ('G05', 'Mual dan muntah', '0.03', 1, '2022-05-22 12:32:40', '2022-05-22 13:45:14');
INSERT INTO `tb_gejala` VALUES ('G06', 'Perut Kembung', '0.02', 1, '2022-05-22 12:32:42', '2022-05-22 13:45:16');
INSERT INTO `tb_gejala` VALUES ('G07', 'Nyeri pada ulu hati hingga area sekitar dada', '0.03', 1, '2022-05-22 12:32:44', '2022-05-22 13:45:18');
INSERT INTO `tb_gejala` VALUES ('G08', 'Kulit tampak pucat', '0.05', 1, '2022-05-22 12:32:47', '2022-05-22 13:45:19');
INSERT INTO `tb_gejala` VALUES ('G09', 'Denyut jantung tidak teratur', '0.02', 1, '2022-05-22 12:32:48', '2022-05-22 13:45:22');
INSERT INTO `tb_gejala` VALUES ('G10', 'Nyeri dada dan sakit kepala', '0.03', 1, '2022-05-22 12:32:50', '2022-05-22 12:42:37');
INSERT INTO `tb_gejala` VALUES ('G11', 'Pendarahan pada vagina', '0.02', 1, '2022-05-22 12:32:53', '2022-05-22 12:42:48');
INSERT INTO `tb_gejala` VALUES ('G12', 'Nyeri saat buang air kecil', '0.03', 1, '2022-05-22 12:32:55', '2022-05-22 12:42:50');
INSERT INTO `tb_gejala` VALUES ('G13', 'Kram Perut', '0.06', 1, '2022-05-22 12:34:46', '2022-05-22 12:42:53');
INSERT INTO `tb_gejala` VALUES ('G14', 'Nyeri Panggul', '0.02', 1, '2022-05-22 12:34:48', '2022-05-22 12:43:10');
INSERT INTO `tb_gejala` VALUES ('G15', 'Perut terlihat membesar melebihi usia kehamilan', '0.04', 1, '2022-05-22 12:34:50', '2022-05-22 12:43:12');
INSERT INTO `tb_gejala` VALUES ('G16', 'Keluarnya cairan berwarna kecoklatan atau gumpalan-gumpalan seperti anggur', '0.04', 1, '2022-05-22 12:34:52', '2022-05-22 12:43:15');
INSERT INTO `tb_gejala` VALUES ('G17', 'Sakit seperti tertusuk dibagian perut, pinggul, bahu, dan leher', '0.06', 1, '2022-05-22 12:34:54', '2022-05-22 12:43:27');
INSERT INTO `tb_gejala` VALUES ('G18', 'Diare', '0.05', 1, '2022-05-22 12:34:56', '2022-05-22 12:43:29');
INSERT INTO `tb_gejala` VALUES ('G19', 'Lemas', '0.03', 1, '2022-05-22 12:34:58', '2022-05-22 12:43:31');
INSERT INTO `tb_gejala` VALUES ('G20', 'Muncul pendarahan saat berhubungan intim', '0.08', 1, '2022-05-22 12:35:00', '2022-05-22 12:43:44');
INSERT INTO `tb_gejala` VALUES ('G21', 'Pendarahan yang berhenti dan berlanjut lagi', '0.02', 1, '2022-05-22 12:36:21', '2022-05-22 12:43:47');
INSERT INTO `tb_gejala` VALUES ('G22', 'Gatal atau perih di vagina dan sekitarnya', '0.06', 1, '2022-05-22 12:36:22', '2022-05-22 12:44:03');
INSERT INTO `tb_gejala` VALUES ('G23', 'Keluarnya cairan abu-abu keputihan', '0.08', 1, '2022-05-22 12:36:25', '2022-05-22 12:44:06');
INSERT INTO `tb_gejala` VALUES ('G24', 'Nyeri saat berhubungan seksual', '0.04', 1, '2022-05-22 12:36:54', '2022-05-22 12:44:08');
INSERT INTO `tb_gejala` VALUES ('G25', 'Keputihan berbau asam', '0.06', 1, '2022-05-22 12:36:58', '2022-05-22 12:44:10');
INSERT INTO `tb_gejala` VALUES ('G26', 'Batuk', '0.06', 1, '2022-05-22 12:37:22', '2022-05-22 12:45:23');
INSERT INTO `tb_gejala` VALUES ('G27', 'Sakit Kepala', '0.06', 1, '2022-05-22 12:37:24', '2022-05-22 12:45:25');
INSERT INTO `tb_gejala` VALUES ('G28', 'Pilek', '0.06', 1, '2022-05-22 12:37:39', '2022-05-22 12:45:27');
INSERT INTO `tb_gejala` VALUES ('G29', 'Sesak Nafas', '0.08', 1, '2022-05-22 12:37:41', '2022-05-22 12:45:29');
INSERT INTO `tb_gejala` VALUES ('G30', 'Sakit saat buang air besar', '0.08', 1, '2022-05-22 12:37:43', '2022-05-22 12:45:40');
INSERT INTO `tb_gejala` VALUES ('G31', 'Tekstur fases kering', '0.04', 1, '2022-05-22 12:37:45', '2022-05-22 12:45:43');
INSERT INTO `tb_gejala` VALUES ('G32', 'Rasa penuh dan tidak nyaman didalam perut', '0.03', 1, '2022-05-22 12:37:47', '2022-05-22 12:45:45');
INSERT INTO `tb_gejala` VALUES ('G33', 'Ukuran janin yang lebih kecil jika dibandingkan dengan usia kehamilan yang seharusnya', '0.04', 1, '2022-05-22 12:37:49', '2022-05-22 12:45:57');
INSERT INTO `tb_gejala` VALUES ('G34', 'Ukuran perut lebih kecil dari seharusnya', '0.02', 1, '2022-05-22 12:38:48', '2022-05-22 12:46:00');
INSERT INTO `tb_gejala` VALUES ('G35', 'Ari ari tipis', '0.02', 1, '2022-05-22 12:38:52', '2022-05-22 12:46:02');
INSERT INTO `tb_gejala` VALUES ('G36', 'Pembengkakan pada bagian tubuh', '0.04', 1, '2022-05-22 12:38:55', '2022-05-22 12:46:16');
INSERT INTO `tb_gejala` VALUES ('G37', 'Penglihatan gelap atau kabur', '0.08', 1, '2022-05-22 12:38:58', '2022-05-22 12:46:18');
INSERT INTO `tb_gejala` VALUES ('G38', 'Kenaikan berat badan yang signifikan', '0.06', 1, '2022-05-22 12:39:46', '2022-05-22 12:46:20');
INSERT INTO `tb_gejala` VALUES ('G39', 'Sering Merasa Haus', '0.06', 1, '2022-05-22 12:40:19', '2022-05-22 12:46:34');
INSERT INTO `tb_gejala` VALUES ('G40', 'Mulut Kering', '0.05', 1, '2022-05-22 12:40:22', '2022-05-22 12:46:36');
INSERT INTO `tb_gejala` VALUES ('G41', 'Frekuensi buang air kecil meningkat', '0.04', 1, '2022-05-22 12:40:24', '2022-05-22 12:46:38');
INSERT INTO `tb_gejala` VALUES ('G42', 'Terlambat haid', '0.08', 1, '2022-05-22 12:40:26', '2022-05-22 12:46:55');
INSERT INTO `tb_gejala` VALUES ('G43', 'Payudara  terasa keras dan nyeri', '0.04', 1, '2022-05-22 12:40:28', '2022-05-22 12:46:58');
INSERT INTO `tb_gejala` VALUES ('G44', 'Muncul flek pada vagina', '0.04', 1, '2022-05-22 12:40:33', '2022-05-22 12:47:00');
INSERT INTO `tb_gejala` VALUES ('G45', 'Volume darah yang keluar pada vagina sangat banyak', '0.02', 1, '2022-05-22 12:40:35', '2022-05-22 12:47:02');

-- ----------------------------
-- Table structure for tb_hasil_moora
-- ----------------------------
DROP TABLE IF EXISTS `tb_hasil_moora`;
CREATE TABLE `tb_hasil_moora`  (
  `id_hasil_moora` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_moora` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_hasil_moora`) USING BTREE,
  INDEX `kode_penyakit`(`kode_penyakit`) USING BTREE,
  CONSTRAINT `kode_penyakit` FOREIGN KEY (`kode_penyakit`) REFERENCES `tb_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_hasil_moora
-- ----------------------------
INSERT INTO `tb_hasil_moora` VALUES (1, 'P01', '0.1189');
INSERT INTO `tb_hasil_moora` VALUES (2, 'P02', '0.1168');
INSERT INTO `tb_hasil_moora` VALUES (3, 'P03', '0.1069');
INSERT INTO `tb_hasil_moora` VALUES (4, 'P04', '0.1103');
INSERT INTO `tb_hasil_moora` VALUES (5, 'P05', '0.0857');
INSERT INTO `tb_hasil_moora` VALUES (6, 'P06', '0.0502');
INSERT INTO `tb_hasil_moora` VALUES (7, 'P07', '0.0314');
INSERT INTO `tb_hasil_moora` VALUES (8, 'P08', '0.1557');
INSERT INTO `tb_hasil_moora` VALUES (9, 'P09', '0.1586');
INSERT INTO `tb_hasil_moora` VALUES (10, 'P10', '0.1272');
INSERT INTO `tb_hasil_moora` VALUES (11, 'P11', '0.0653');
INSERT INTO `tb_hasil_moora` VALUES (12, 'P12', '0.1306');
INSERT INTO `tb_hasil_moora` VALUES (13, 'P13', '0.0776');
INSERT INTO `tb_hasil_moora` VALUES (14, 'P14', '0.0442');
INSERT INTO `tb_hasil_moora` VALUES (15, 'P15', '0.0000');

-- ----------------------------
-- Table structure for tb_jawaban_konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_jawaban_konsultasi`;
CREATE TABLE `tb_jawaban_konsultasi`  (
  `id_jawaban_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_konsultasi` int(11) NULL DEFAULT NULL,
  `jawaban` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pakar` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_jawaban_konsultasi`) USING BTREE,
  INDEX `jawaban_konsultasi`(`id_konsultasi`) USING BTREE,
  CONSTRAINT `jawaban_konsultasi` FOREIGN KEY (`id_konsultasi`) REFERENCES `tb_konsultasi` (`id_konsultasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jawaban_konsultasi
-- ----------------------------
INSERT INTO `tb_jawaban_konsultasi` VALUES (1, 1, 'ya, ada apa?', 1, '2022-05-22 19:11:31');
INSERT INTO `tb_jawaban_konsultasi` VALUES (2, 1, 'jadi gini', 0, '2022-05-22 19:11:43');
INSERT INTO `tb_jawaban_konsultasi` VALUES (3, 1, 'kenapa?', 1, '2022-05-22 19:11:50');
INSERT INTO `tb_jawaban_konsultasi` VALUES (4, 1, 'saya bingung', 0, '2022-05-22 19:11:57');
INSERT INTO `tb_jawaban_konsultasi` VALUES (5, 4, 'ya', 0, '2022-06-07 00:16:30');
INSERT INTO `tb_jawaban_konsultasi` VALUES (6, 4, 'apa ?', 1, '2022-06-07 00:17:49');
INSERT INTO `tb_jawaban_konsultasi` VALUES (7, 4, 'nggaa', 0, '2022-06-07 00:17:57');

-- ----------------------------
-- Table structure for tb_konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_konsultasi`;
CREATE TABLE `tb_konsultasi`  (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pertanyaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_konsultasi`) USING BTREE,
  INDEX `mail`(`email`) USING BTREE,
  CONSTRAINT `mail` FOREIGN KEY (`email`) REFERENCES `tb_pengguna` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_konsultasi
-- ----------------------------
INSERT INTO `tb_konsultasi` VALUES (1, 'nita@gmail.com', 'haloo pakar, saya mau bertanya', '2022-05-22 19:11:18');
INSERT INTO `tb_konsultasi` VALUES (2, 'nita@gmail.com', 'tes tes', '2022-06-07 00:15:06');
INSERT INTO `tb_konsultasi` VALUES (3, 'nita@gmail.com', 'tes tes', '2022-06-07 00:15:14');
INSERT INTO `tb_konsultasi` VALUES (4, 'nita@gmail.com', 'tes tes', '2022-06-07 00:16:03');

-- ----------------------------
-- Table structure for tb_pengetahuan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengetahuan`;
CREATE TABLE `tb_pengetahuan`  (
  `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_gejala` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(1) NULL DEFAULT current_timestamp(1),
  PRIMARY KEY (`id_pengetahuan`) USING BTREE,
  INDEX `kd_penyakit`(`kode_penyakit`) USING BTREE,
  INDEX `kd_gejala`(`kode_gejala`) USING BTREE,
  CONSTRAINT `kd_gejala` FOREIGN KEY (`kode_gejala`) REFERENCES `tb_gejala` (`kode_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kd_penyakit` FOREIGN KEY (`kode_penyakit`) REFERENCES `tb_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengetahuan
-- ----------------------------
INSERT INTO `tb_pengetahuan` VALUES (1, 'P01', 'G01', '2022-05-22 12:53:43.1');
INSERT INTO `tb_pengetahuan` VALUES (2, 'P01', 'G02', '2022-05-22 12:53:45.7');
INSERT INTO `tb_pengetahuan` VALUES (3, 'P01', 'G03', '2022-05-22 12:53:47.0');
INSERT INTO `tb_pengetahuan` VALUES (4, 'P01', 'G05', '2022-05-22 12:53:48.2');
INSERT INTO `tb_pengetahuan` VALUES (5, 'P02', 'G04', '2022-05-22 12:53:59.6');
INSERT INTO `tb_pengetahuan` VALUES (6, 'P02', 'G05', '2022-05-22 12:54:00.9');
INSERT INTO `tb_pengetahuan` VALUES (7, 'P02', 'G06', '2022-05-22 12:54:03.3');
INSERT INTO `tb_pengetahuan` VALUES (8, 'P02', 'G07', '2022-05-22 12:54:08.2');
INSERT INTO `tb_pengetahuan` VALUES (9, 'P03', 'G08', '2022-05-22 12:54:19.4');
INSERT INTO `tb_pengetahuan` VALUES (10, 'P03', 'G09', '2022-05-22 12:54:21.0');
INSERT INTO `tb_pengetahuan` VALUES (11, 'P03', 'G10', '2022-05-22 12:54:21.9');
INSERT INTO `tb_pengetahuan` VALUES (12, 'P03', 'G29', '2022-05-22 12:54:23.3');
INSERT INTO `tb_pengetahuan` VALUES (13, 'P04', 'G05', '2022-05-22 12:54:24.7');
INSERT INTO `tb_pengetahuan` VALUES (14, 'P04', 'G11', '2022-05-22 12:54:37.6');
INSERT INTO `tb_pengetahuan` VALUES (15, 'P04', 'G12', '2022-05-22 12:54:38.9');
INSERT INTO `tb_pengetahuan` VALUES (16, 'P04', 'G13', '2022-05-22 12:54:40.2');
INSERT INTO `tb_pengetahuan` VALUES (17, 'P05', 'G05', '2022-05-22 12:54:52.1');
INSERT INTO `tb_pengetahuan` VALUES (18, 'P05', 'G11', '2022-05-22 12:54:53.4');
INSERT INTO `tb_pengetahuan` VALUES (19, 'P05', 'G14', '2022-05-22 12:54:54.4');
INSERT INTO `tb_pengetahuan` VALUES (20, 'P05', 'G15', '2022-05-22 12:54:55.3');
INSERT INTO `tb_pengetahuan` VALUES (21, 'P05', 'G16', '2022-05-22 12:54:56.2');
INSERT INTO `tb_pengetahuan` VALUES (22, 'P06', 'G17', '2022-05-22 12:55:14.6');
INSERT INTO `tb_pengetahuan` VALUES (23, 'P06', 'G18', '2022-05-22 12:55:15.9');
INSERT INTO `tb_pengetahuan` VALUES (24, 'P06', 'G19', '2022-05-22 12:55:17.1');
INSERT INTO `tb_pengetahuan` VALUES (25, 'P07', 'G13', '2022-05-22 12:55:18.5');
INSERT INTO `tb_pengetahuan` VALUES (26, 'P07', 'G20', '2022-05-22 12:55:36.7');
INSERT INTO `tb_pengetahuan` VALUES (27, 'P07', 'G21', '2022-05-22 12:55:37.8');
INSERT INTO `tb_pengetahuan` VALUES (28, 'P08', 'G22', '2022-05-22 12:55:46.3');
INSERT INTO `tb_pengetahuan` VALUES (29, 'P08', 'G23', '2022-05-22 12:55:47.4');
INSERT INTO `tb_pengetahuan` VALUES (30, 'P08', 'G24', '2022-05-22 12:55:48.0');
INSERT INTO `tb_pengetahuan` VALUES (31, 'P08', 'G25', '2022-05-22 12:55:48.9');
INSERT INTO `tb_pengetahuan` VALUES (32, 'P09', 'G26', '2022-05-22 12:55:50.1');
INSERT INTO `tb_pengetahuan` VALUES (33, 'P09', 'G27', '2022-05-22 12:56:04.7');
INSERT INTO `tb_pengetahuan` VALUES (34, 'P09', 'G28', '2022-05-22 12:56:05.9');
INSERT INTO `tb_pengetahuan` VALUES (35, 'P09', 'G29', '2022-05-22 12:56:07.4');
INSERT INTO `tb_pengetahuan` VALUES (36, 'P10', 'G30', '2022-05-22 12:56:22.9');
INSERT INTO `tb_pengetahuan` VALUES (37, 'P10', 'G31', '2022-05-22 12:56:25.3');
INSERT INTO `tb_pengetahuan` VALUES (38, 'P10', 'G32', '2022-05-22 12:56:25.8');
INSERT INTO `tb_pengetahuan` VALUES (39, 'P11', 'G33', '2022-05-22 12:56:26.5');
INSERT INTO `tb_pengetahuan` VALUES (40, 'P11', 'G34', '2022-05-22 12:56:41.9');
INSERT INTO `tb_pengetahuan` VALUES (41, 'P11', 'G35', '2022-05-22 12:56:42.7');
INSERT INTO `tb_pengetahuan` VALUES (42, 'P12', 'G27', '2022-05-22 12:56:43.4');
INSERT INTO `tb_pengetahuan` VALUES (43, 'P12', 'G29', '2022-05-22 12:56:58.8');
INSERT INTO `tb_pengetahuan` VALUES (44, 'P12', 'G36', '2022-05-22 12:56:59.4');
INSERT INTO `tb_pengetahuan` VALUES (45, 'P12', 'G37', '2022-05-22 12:57:00.0');
INSERT INTO `tb_pengetahuan` VALUES (46, 'P12', 'G38', '2022-05-22 12:57:00.6');
INSERT INTO `tb_pengetahuan` VALUES (47, 'P13', 'G19', '2022-05-22 12:57:16.9');
INSERT INTO `tb_pengetahuan` VALUES (48, 'P13', 'G39', '2022-05-22 12:57:18.6');
INSERT INTO `tb_pengetahuan` VALUES (49, 'P13', 'G40', '2022-05-22 12:57:19.2');
INSERT INTO `tb_pengetahuan` VALUES (50, 'P13', 'G41', '2022-05-22 12:57:23.6');
INSERT INTO `tb_pengetahuan` VALUES (51, 'P14', 'G05', '2022-05-22 12:57:34.4');
INSERT INTO `tb_pengetahuan` VALUES (52, 'P14', 'G19', '2022-05-22 12:57:36.3');
INSERT INTO `tb_pengetahuan` VALUES (53, 'P14', 'G42', '2022-05-22 12:57:36.9');
INSERT INTO `tb_pengetahuan` VALUES (54, 'P14', 'G43', '2022-05-22 12:57:37.8');
INSERT INTO `tb_pengetahuan` VALUES (55, 'P14', 'G44', '2022-05-22 12:57:46.3');
INSERT INTO `tb_pengetahuan` VALUES (56, 'P14', 'G45', '2022-05-22 12:57:47.8');

-- ----------------------------
-- Table structure for tb_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna`  (
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` int(2) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`email`) USING BTREE,
  INDEX `roles`(`tipe`) USING BTREE,
  CONSTRAINT `roles` FOREIGN KEY (`tipe`) REFERENCES `tb_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengguna
-- ----------------------------
INSERT INTO `tb_pengguna` VALUES ('admin@gmail.com', 'Admin', '$2y$10$XcQledQ4ovCMMMOBNgvc7ehUoRV1Q./NsS9QtTL4oFuTd1t3Rr.6m', 1, 1, '2022-04-14 13:29:33', NULL);
INSERT INTO `tb_pengguna` VALUES ('nita@gmail.com', 'Nita Astuti', '$2y$10$q6YSBuv1OUvRRrJlXy46Puj3Rr2m.6lAkg1bMjQOtNlcO9VRrV/Pm', 3, 1, '2022-05-22 18:37:00', NULL);
INSERT INTO `tb_pengguna` VALUES ('pakar@gmail.com', 'Pakar', '$2y$10$qQtTzGUOCcdosVPpn17uaerye.zkt34LOhuxbxHlVP1ySexXuerQe', 2, 1, '2022-05-15 07:58:30', '2022-05-22 18:45:48');

-- ----------------------------
-- Table structure for tb_penyakit
-- ----------------------------
DROP TABLE IF EXISTS `tb_penyakit`;
CREATE TABLE `tb_penyakit`  (
  `kode_penyakit` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penyakit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `solusi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `bobot` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kode_penyakit`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_penyakit
-- ----------------------------
INSERT INTO `tb_penyakit` VALUES ('P01', 'Infeksi Saluran Kemih', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe repudiandae exercitationem cum, in ea quae quam laboriosam sint quidem assumenda facere error enim placeat quia inventore eveniet ad quisquam repellat maxime corporis? Voluptates rem dolor nobis ullam molestias a maiores.', '0.06', 1, '2022-05-15 08:12:14', '2022-05-25 13:34:34');
INSERT INTO `tb_penyakit` VALUES ('P02', 'Maag', NULL, '0.06', 1, '2022-05-22 12:23:24', '2022-05-22 13:44:36');
INSERT INTO `tb_penyakit` VALUES ('P03', 'Anemia', NULL, '0.06', 1, '2022-05-22 12:24:15', '2022-05-22 13:44:38');
INSERT INTO `tb_penyakit` VALUES ('P04', 'Abortus', NULL, '0.06', 1, '2022-05-22 12:24:16', '2022-05-22 13:44:40');
INSERT INTO `tb_penyakit` VALUES ('P05', 'Mola Hydatisoda (Hamil Anggur)', NULL, '0.04', 1, '2022-05-22 12:24:18', '2022-05-22 13:44:42');
INSERT INTO `tb_penyakit` VALUES ('P06', 'Hamil Ekstrauterin Ektopik Terganggu', NULL, '0.03', 1, '2022-05-22 12:24:22', '2022-05-22 13:44:43');
INSERT INTO `tb_penyakit` VALUES ('P07', 'Plasenta Previa', NULL, '0.02', 1, '2022-05-22 12:27:44', '2022-05-22 13:44:44');
INSERT INTO `tb_penyakit` VALUES ('P08', 'Keputihan', NULL, '0.08', 1, '2022-05-22 12:27:46', '2022-05-22 13:44:46');
INSERT INTO `tb_penyakit` VALUES ('P09', 'ISPA', NULL, '0.08', 1, '2022-05-22 12:27:47', '2022-05-22 13:44:48');
INSERT INTO `tb_penyakit` VALUES ('P10', 'Sembelit', NULL, '0.08', 1, '2022-05-22 12:27:49', '2022-05-22 12:29:59');
INSERT INTO `tb_penyakit` VALUES ('P11', 'IntraUterine Growth Restriction (IUGR)', NULL, '0.04', 1, '2022-05-22 12:27:51', '2022-05-22 12:29:59');
INSERT INTO `tb_penyakit` VALUES ('P12', 'Pregnancy Induced Hypertension (Darah Tinggi)', NULL, '0.06', 1, '2022-05-22 12:27:53', '2022-05-22 12:29:59');
INSERT INTO `tb_penyakit` VALUES ('P13', 'Diabetes Gestansional', NULL, '0.04', 1, '2022-05-22 12:27:56', '2022-05-22 12:29:59');
INSERT INTO `tb_penyakit` VALUES ('P14', 'Blighted Ovum', NULL, '0.02', 1, '2022-05-22 12:28:16', '2022-05-22 12:29:59');
INSERT INTO `tb_penyakit` VALUES ('P15', 'INFEKSI SALURAN KEMIHD', 'test', '0.02', 1, '2022-06-05 23:35:24', '2022-06-05 23:37:46');

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role`  (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES (1, 'Admin', '2022-05-15 03:21:05');
INSERT INTO `tb_role` VALUES (2, 'Pakar', '2022-05-15 03:22:25');
INSERT INTO `tb_role` VALUES (3, 'Pasien', '2022-05-15 03:22:29');

SET FOREIGN_KEY_CHECKS = 1;
