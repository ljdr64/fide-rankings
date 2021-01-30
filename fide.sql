/*
 Navicat MySQL Data Transfer

 Source Server         : maxilocal
 Source Server Type    : MySQL
 Source Server Version : 50730
 Source Host           : localhost:3306
 Source Schema         : fide

 Target Server Type    : MySQL
 Target Server Version : 50730
 File Encoding         : 65001

 Date: 30/01/2021 19:51:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for players
-- ----------------------------
DROP TABLE IF EXISTS `players`;
CREATE TABLE `players`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `elo` smallint(4) NULL DEFAULT NULL,
  `fideId` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `country` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of players
-- ----------------------------
INSERT INTO `players` VALUES (4, 'Ian', 'Nepomniachtchi', 2789, '4168119', 'Rusia', 'https://images.chesscomfiles.com/uploads/v1/blog/389718.79d4001a.668x375o.27fc527b9542@2x.jpeg');
INSERT INTO `players` VALUES (5, 'Teimour', 'Radjabov', 2765, '13400924', 'Azerbaijan', 'https://e00-marca.uecdn.es/assets/multimedia/imagenes/2020/12/31/16094448167705.jpg');
INSERT INTO `players` VALUES (6, 'Maxime', 'Vachier-Lagrave', 2784, '623539', 'Francia', 'https://hunonchess.com/wp-content/uploads/2020/04/49691089066_ab1db7a5cb_c.jpg');
INSERT INTO `players` VALUES (8, 'Laureano Joel', ' Rodriguez', 2218, '117854', 'Argentina', 'https://images.chesscomfiles.com/uploads/v1/user/3785058.712d4c2a.1200x1200o.0c892db4c3b5.jpeg');
INSERT INTO `players` VALUES (9, 'Leandro', 'Alvarez', 2088, '132756', 'Argentina', 'https://lh3.googleusercontent.com/proxy/XRO9m-xIFu-Q7uII68upunmAtrBqrRtMghkfjGKqvoXTFW6g1yrA2JPssmKU4w8KCv2WukGxs3Nq0FNJE8oRDo-03-KtP8KXy6y_sg6ZJQ');
INSERT INTO `players` VALUES (10, 'Juan Maximiliano', 'Rossi Simms', 2068, '113425', 'Argentina', 'https://media-exp1.licdn.com/dms/image/C4E03AQHkkJ5IL-8Htg/profile-displayphoto-shrink_200_200/0/1539770304333?e=1615420800&v=beta&t=a70-DvUjshQdZQMeil4lKnkP090BnEA0jUsXSaQ3qNE');

SET FOREIGN_KEY_CHECKS = 1;
