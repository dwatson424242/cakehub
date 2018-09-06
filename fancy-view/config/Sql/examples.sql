/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : z_test

 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 09/06/2018 12:13:03 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `examples`
-- ----------------------------
DROP TABLE IF EXISTS `examples`;
CREATE TABLE `examples` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;

