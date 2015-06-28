/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : virut

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-06-28 11:31:58
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `coupon`
-- ----------------------------
DROP TABLE IF EXISTS `coupon`;
CREATE TABLE `coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'promo',
  `target` tinyint(4) NOT NULL DEFAULT '1',
  `condition` int(11) DEFAULT '0',
  `value` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_used` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupon_coupon_unique` (`coupon`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of coupon
-- ----------------------------
INSERT INTO `coupon` VALUES ('1', 'Mừng khai trương', 'KHAITRUONG20%', 'promo', '1', '100000', '20', '100', '2015-06-18 00:00:00', '2015-07-01 00:00:00', '2015-06-20 14:43:04', '2015-06-23 22:28:16', null, '0');

-- ----------------------------
-- Table structure for `jobs`
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES ('2', 'default', '{\"job\":\"Illuminate\\\\Events\\\\CallQueuedHandler@call\",\"data\":{\"class\":\"App\\\\Listeners\\\\SendOrderConfirmationEmail\",\"method\":\"handle\",\"data\":\"a:1:{i:0;O:24:\\\"App\\\\Events\\\\OrderWasAdded\\\":1:{s:5:\\\"order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:9:\\\"App\\\\Order\\\";s:2:\\\"id\\\";i:14;}}}\"}}', '0', '1', '1435465262', '1435465259', '1435465259');

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
INSERT INTO `migrations` VALUES ('2015_06_20_105930_create_coupon_table', '3');
INSERT INTO `migrations` VALUES ('2015_06_22_070117_edit_coupon_table', '4');
INSERT INTO `migrations` VALUES ('2015_06_23_081951_create_orders_table', '4');
INSERT INTO `migrations` VALUES ('2015_06_23_221652_create_order_items_table', '4');
INSERT INTO `migrations` VALUES ('2015_06_23_233916_create_jobs_table', '4');

-- ----------------------------
-- Table structure for `order_items`
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES ('1', '1', '7', 'Bkav Pro Internet Security', '170000', '1', '2015-06-25 22:43:09', '2015-06-25 22:43:09', null);
INSERT INTO `order_items` VALUES ('2', '2', '7', 'Bkav Pro Internet Security', '170000', '2', '2015-06-27 23:55:20', '2015-06-27 23:55:20', null);
INSERT INTO `order_items` VALUES ('3', '2', '5', 'Kaspersky Internet Security', '130000', '2', '2015-06-27 23:55:20', '2015-06-27 23:55:20', null);
INSERT INTO `order_items` VALUES ('4', '3', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:03:43', '2015-06-28 09:03:43', null);
INSERT INTO `order_items` VALUES ('5', '4', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:11:35', '2015-06-28 09:11:35', null);
INSERT INTO `order_items` VALUES ('6', '5', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:14:33', '2015-06-28 09:14:33', null);
INSERT INTO `order_items` VALUES ('7', '6', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:16:11', '2015-06-28 09:16:11', null);
INSERT INTO `order_items` VALUES ('8', '7', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:17:39', '2015-06-28 09:17:39', null);
INSERT INTO `order_items` VALUES ('9', '8', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:25:28', '2015-06-28 09:25:28', null);
INSERT INTO `order_items` VALUES ('10', '9', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:25:48', '2015-06-28 09:25:48', null);
INSERT INTO `order_items` VALUES ('11', '10', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:28:02', '2015-06-28 09:28:02', null);
INSERT INTO `order_items` VALUES ('12', '11', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:52:25', '2015-06-28 09:52:25', null);
INSERT INTO `order_items` VALUES ('13', '12', '6', 'Kaspersky Antivirus', '100000', '1', '2015-06-28 09:55:11', '2015-06-28 09:55:11', null);
INSERT INTO `order_items` VALUES ('14', '13', '7', 'Bkav Pro Internet Security', '170000', '1', '2015-06-28 11:14:15', '2015-06-28 11:14:15', null);
INSERT INTO `order_items` VALUES ('15', '14', '7', 'Bkav Pro Internet Security', '170000', '1', '2015-06-28 11:20:59', '2015-06-28 11:20:59', null);

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `is_paid` tinyint(4) DEFAULT '0',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', 'Nhật Đỗ', 'ddnhat@gmail.com', '906578610', '170000', '0', null, '170000', '0', null, '2015-06-25 22:43:09', '2015-06-26 00:05:19', null);
INSERT INTO `orders` VALUES ('2', 'Đức Nhật', 'nhatdo@outlook.com', '906578610', '600000', '120000', 'KHAITRUONG20%', '480000', '0', null, '2015-06-27 23:55:20', '2015-06-27 23:55:20', null);
INSERT INTO `orders` VALUES ('3', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:03:43', '2015-06-28 09:03:43', null);
INSERT INTO `orders` VALUES ('4', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:11:35', '2015-06-28 09:11:35', null);
INSERT INTO `orders` VALUES ('5', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:14:33', '2015-06-28 09:14:33', null);
INSERT INTO `orders` VALUES ('6', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:16:11', '2015-06-28 09:16:11', null);
INSERT INTO `orders` VALUES ('7', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:17:39', '2015-06-28 09:17:39', null);
INSERT INTO `orders` VALUES ('8', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:25:28', '2015-06-28 09:25:28', null);
INSERT INTO `orders` VALUES ('9', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:25:48', '2015-06-28 09:25:48', null);
INSERT INTO `orders` VALUES ('10', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:28:02', '2015-06-28 09:28:02', null);
INSERT INTO `orders` VALUES ('11', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:52:24', '2015-06-28 09:52:24', null);
INSERT INTO `orders` VALUES ('12', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '0', null, '2015-06-28 09:55:11', '2015-06-28 09:55:11', null);
INSERT INTO `orders` VALUES ('13', 'DO DUC NHAT', 'ddnhat@gmail.com', '1229012202', '170000', '0', null, '170000', '0', null, '2015-06-28 11:14:15', '2015-06-28 11:14:15', null);
INSERT INTO `orders` VALUES ('14', 'DO DUC NHAT', 'ddnhat@gmail.com', '1229012202', '170000', '0', null, '170000', '0', null, '2015-06-28 11:20:59', '2015-06-28 11:20:59', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_keys
-- ----------------------------
INSERT INTO `product_keys` VALUES ('2', 'asdasdasd', '7', '1', null, null, '2015-06-16 08:03:49', '2015-06-16 08:03:49', null);
INSERT INTO `product_keys` VALUES ('3', 'test lại 1', '6', '1', null, null, '2015-06-16 08:05:27', '2015-06-16 22:23:52', null);
INSERT INTO `product_keys` VALUES ('4', 'test lại', '5', '1', null, null, '2015-06-16 08:21:23', '2015-06-16 22:27:01', null);
INSERT INTO `product_keys` VALUES ('5', '123asda', '7', '1', null, null, '2015-06-16 08:21:23', '2015-06-16 22:27:01', null);
INSERT INTO `product_keys` VALUES ('6', 'asd123432', '5', '1', null, null, '2015-06-16 08:21:23', '2015-06-16 08:21:23', null);

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
INSERT INTO `products` VALUES ('5', 'Kaspersky Internet Security', 'D:\\xampp\\tmp\\phpB948.tmp', '130000', 'Kaspersky Lab', '2015-06-14 22:30:35', '2015-06-17 12:19:22', null);
INSERT INTO `products` VALUES ('6', 'Kaspersky Antivirus', 'D:\\xampp\\tmp\\php28EB.tmp', '100000', 'Kaspersky Lab', '2015-06-15 07:52:30', '2015-06-17 12:19:50', null);
INSERT INTO `products` VALUES ('7', 'Bkav Pro Internet Security', 'D:\\xampp\\tmp\\php1338.tmp', '170000', 'Bkav', '2015-06-15 08:26:58', '2015-06-17 12:21:55', null);
INSERT INTO `products` VALUES ('8', 'Norton Internet Security', 'D:\\xampp\\tmp\\php347F.tmp', '160000', 'Symantec', '2015-06-17 08:07:57', '2015-06-17 12:25:21', null);

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
