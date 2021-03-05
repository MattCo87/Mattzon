/*
 Navicat MySQL Data Transfer

 Source Server         : [MAMP] localhost
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost
 Source Database       : mattzon

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : utf-8

 Date: 03/05/2021 22:24:44 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `msg`
-- ----------------------------
DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `demande` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `msg`
-- ----------------------------
BEGIN;
INSERT INTO `msg` VALUES ('1', 'Vauché', 'Nicolas', 'nvauche@gmail.com', 'pro', 'Test', 'test de message'), ('2', 'Vauché', 'Nicolas', 'nvauche@gmail.com', 'pro', 'Test avec modèle', 'blablablablabla.');
COMMIT;

-- ----------------------------
--  Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortdescription` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `product`
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES ('1', 'Pegasis', null, null, 'nike-pegasus.jpg', '125.00'), ('2', 'Flavius', null, null, 'Flavius.jpg', '59.99'), ('3', 'JupiTerrien', null, null, 'JupiTerrien.jpg', '39.99');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'test', 'test', 'test@test.com', 'test');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
