/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : virut

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-06-17 08:24:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_06_13_145141_create_products_table', '2');
INSERT INTO `migrations` VALUES ('2015_06_13_150729_create_product_keys_table', '2');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `product_keys`
-- ----------------------------
DROP TABLE IF EXISTS `product_keys`;
CREATE TABLE `product_keys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `sold_at` datetime DEFAULT NULL,
  `return_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_keys_product_id_foreign` (`product_id`),
  KEY `product_keys_user_id_foreign` (`user_id`),
  CONSTRAINT `product_keys_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_keys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_keys
-- ----------------------------
INSERT INTO `product_keys` VALUES ('2', 'asdasdasd', '7', '1', null, null, '2015-06-16 08:03:49', '2015-06-16 08:03:49', null);
INSERT INTO `product_keys` VALUES ('3', 'test lại 1', '6', '1', null, null, '2015-06-16 08:05:27', '2015-06-16 22:23:52', null);
INSERT INTO `product_keys` VALUES ('4', 'test lại', '5', '1', null, null, '2015-06-16 08:21:23', '2015-06-16 22:27:01', null);

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('5', 'Kaspersky Internet Security', 'D:\\xampp\\tmp\\php21B3.tmp', '130000', 'Kaspersky Lab', '2015-06-14 22:30:35', '2015-06-17 08:08:31', null);
INSERT INTO `products` VALUES ('6', 'Kaspersky Antivirus', 'D:\\xampp\\tmp\\php5DC7.tmp', '100000', 'Kaspersky Lab', '2015-06-15 07:52:30', '2015-06-15 08:06:15', null);
INSERT INTO `products` VALUES ('7', 'Bkav Pro Internet Security', 'D:\\xampp\\tmp\\php58EE.tmp', '170000', 'Bkav', '2015-06-15 08:26:58', '2015-06-15 08:29:34', null);
INSERT INTO `products` VALUES ('8', 'Norton Internet Security', 'D:\\xampp\\tmp\\phpB04E.tmp', '160000', 'Symantec', '2015-06-17 08:07:57', '2015-06-17 08:07:57', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Đức Nhật', '0906578610', 'ddnhat@gmail.com', '$2y$10$ivx6mz1aEQOeruVq1Q700uC/ycXmkLjCPGYfFWmhtf5PPk./8JLsC', '1', 'fp5TMUxFbO4S6gU0mMoIoryoIHaYUlnJPDKbJHWpTHPdUF6WzlKBt0fsxrnQ', '2015-06-15 23:14:04', '2015-06-16 22:15:49', null);
