/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80027
 Source Host           : localhost:3306
 Source Schema         : sql50

 Target Server Type    : MySQL
 Target Server Version : 80027
 File Encoding         : 65001

 Date: 09/01/2022 21:10:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `cno` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `cname` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tno` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of courses
-- ----------------------------
BEGIN;
INSERT INTO `courses` VALUES ('3-105', '计算机导论', '825');
INSERT INTO `courses` VALUES ('3-245', '操作系统', '804');
INSERT INTO `courses` VALUES ('6-166', '数据电路', '856');
INSERT INTO `courses` VALUES ('9-888', '高等数学', '100');
COMMIT;

-- ----------------------------
-- Table structure for scores
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `sno` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `cno` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `degree` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of scores
-- ----------------------------
BEGIN;
INSERT INTO `scores` VALUES ('103', '3-245', 86.0);
INSERT INTO `scores` VALUES ('105', '3-245', 75.0);
INSERT INTO `scores` VALUES ('109', '3-245', 68.0);
INSERT INTO `scores` VALUES ('103', '3-105', 92.0);
INSERT INTO `scores` VALUES ('105', '3-105', 88.0);
INSERT INTO `scores` VALUES ('109', '3-105', 76.0);
INSERT INTO `scores` VALUES ('101', '3-105', 64.0);
INSERT INTO `scores` VALUES ('107', '3-105', 91.0);
INSERT INTO `scores` VALUES ('108', '3-105', 78.0);
INSERT INTO `scores` VALUES ('101', '6-166', 85.0);
INSERT INTO `scores` VALUES ('107', '6-106', 79.0);
INSERT INTO `scores` VALUES ('108', '6-166', 81.0);
COMMIT;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `sno` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `sname` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `ssex` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `sbirthday` datetime DEFAULT NULL,
  `class` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
BEGIN;
INSERT INTO `students` VALUES ('108', '曾华', '男', '1977-09-01 00:00:00', '95033');
INSERT INTO `students` VALUES ('105', '匡明', '男', '1975-10-02 00:00:00', '95031');
INSERT INTO `students` VALUES ('107', '王丽', '女', '1976-01-23 00:00:00', '95033');
INSERT INTO `students` VALUES ('101', '李军', '男', '1976-02-20 00:00:00', '95033');
INSERT INTO `students` VALUES ('109', '王芳', '女', '1975-02-10 00:00:00', '95031');
INSERT INTO `students` VALUES ('103', '陆君', '男', '1974-06-03 00:00:00', '95031');
COMMIT;

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `tno` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `tname` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `tsex` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `tbirthday` datetime NOT NULL,
  `prof` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `depart` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of teachers
-- ----------------------------
BEGIN;
INSERT INTO `teachers` VALUES ('804', '李诚', '男', '1958-12-02 00:00:00', '副教授', '计算机系');
INSERT INTO `teachers` VALUES ('856', '张旭', '男', '1969-03-12 00:00:00', '讲师', '电子工程系');
INSERT INTO `teachers` VALUES ('825', '王萍', '女', '1972-05-05 00:00:00', '助教', '计算机系');
INSERT INTO `teachers` VALUES ('831', '刘冰', '女', '1977-08-14 00:00:00', '助教', '电子工程系');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
