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

 Date: 15/05/2022 09:45:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
INSERT INTO `tb_gejala` VALUES ('G1', 'asdasd', '1', 1, '2022-05-15 08:28:30', '2022-05-15 08:51:43');

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
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengguna
-- ----------------------------
INSERT INTO `tb_pengguna` VALUES ('', '', '$2y$10$hYxkBLT1TsUIkBIUlgaO9OaB8sx7TC8vopkNhfEEt57AL5dHZLMGS', 0, 1, '2022-05-15 08:17:28', NULL);
INSERT INTO `tb_pengguna` VALUES ('aamirudinkom@gamil.com', 'Agus Amirudin', '$2y$10$qQtTzGUOCcdosVPpn17uaerye.zkt34LOhuxbxHlVP1ySexXuerQe', 1, 1, '2022-05-15 07:58:30', NULL);
INSERT INTO `tb_pengguna` VALUES ('admin@gmail.com', 'Admin', '$2y$10$XcQledQ4ovCMMMOBNgvc7ehUoRV1Q./NsS9QtTL4oFuTd1t3Rr.6m', 1, 1, '2022-04-14 13:29:33', NULL);

-- ----------------------------
-- Table structure for tb_penyakit
-- ----------------------------
DROP TABLE IF EXISTS `tb_penyakit`;
CREATE TABLE `tb_penyakit`  (
  `kode_penyakit` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penyakit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kode_penyakit`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_penyakit
-- ----------------------------
INSERT INTO `tb_penyakit` VALUES ('P1', 'Infeksi Saluran Kemih\r\n', 1, '2022-05-15 08:12:14', NULL);

-- ----------------------------
-- Table structure for tb_solusi
-- ----------------------------
DROP TABLE IF EXISTS `tb_solusi`;
CREATE TABLE `tb_solusi`  (
  `kode_solusi` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `solusi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kode_penyakit` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`kode_solusi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_solusi
-- ----------------------------
INSERT INTO `tb_solusi` VALUES ('S1', 'Minus aute non asper', NULL, NULL, '2022-05-15 08:57:46', NULL);

SET FOREIGN_KEY_CHECKS = 1;
