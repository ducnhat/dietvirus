/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : virut

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-07-07 21:27:31
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `reply_message` text COLLATE utf8_unicode_ci,
  `is_reply` tinyint(4) DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT NULL,
  `reply_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'Thùy Trang', 'letrang580@gmail.com', 'asdasd', 'test\r\nthử coi\r\nsao\r\nnè', 'asdasdasd', '1', '1', '2015-07-03 16:11:38', '2015-07-03 15:57:08', '2015-07-03 16:11:38');
INSERT INTO `contacts` VALUES ('2', 'Thùy Trang', 'ddnhat@gmail.com', 'asdasd', 'asd\r\nas\r\nda\r\ns\r\nd', 'asd as asd asd', '1', '1', '2015-07-06 22:49:58', '2015-07-03 16:12:58', '2015-07-06 22:49:58');
INSERT INTO `contacts` VALUES ('3', 'Nhật', 'nhatdo@Outlook.com', 'test thử', 'test thử\r\ntest thửtest thử\r\ntest thử', 'e bị khùng khùng khùng khùng khùng khùng khùng khùng', '1', '1', '2015-07-03 16:40:03', '2015-07-03 16:13:47', '2015-07-03 16:40:03');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `key_warranty`
-- ----------------------------
DROP TABLE IF EXISTS `key_warranty`;
CREATE TABLE `key_warranty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_key_id` int(10) unsigned NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `error_message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_warranted` tinyint(4) DEFAULT '0',
  `resolve` text COLLATE utf8_unicode_ci,
  `resolve_at` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `new_product_key_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of key_warranty
-- ----------------------------
INSERT INTO `key_warranty` VALUES ('1', 'nhatdo@outlook.com', '5', '0906578610', '1', 'asdasdasd', '1', '', '2015-07-03 12:09:24', '1', '2015-07-01 15:13:24', '2015-07-03 12:09:26', 'Nhật', null, '7');
INSERT INTO `key_warranty` VALUES ('2', 'ddnhat@gmail.com', '3', '01229012202', '1', 'asdasdasd', '0', 'key kích hoạt quá số lượng máy cho phép', '2015-07-03 12:09:24', '1', '2015-07-01 15:13:24', '2015-07-03 12:09:26', 'Nhật', null, '6');

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
INSERT INTO `migrations` VALUES ('2015_06_27_173324_edit_orders_table', '5');
INSERT INTO `migrations` VALUES ('2015_06_29_195923_create_order_sent_keys_table', '6');
INSERT INTO `migrations` VALUES ('2015_07_01_000020_create_key_warranty_table', '7');
INSERT INTO `migrations` VALUES ('2015_07_01_095823_edit_product_keys_table', '8');
INSERT INTO `migrations` VALUES ('2015_07_01_105143_edit_key_warranty_table', '9');
INSERT INTO `migrations` VALUES ('2015_07_02_070738_edit_product_keys_table', '10');
INSERT INTO `migrations` VALUES ('2015_07_03_132850_create_contact_table', '11');
INSERT INTO `migrations` VALUES ('2015_07_03_171250_create_post_categories_table', '12');
INSERT INTO `migrations` VALUES ('2015_07_03_174856_create_posts_table', '13');
INSERT INTO `migrations` VALUES ('2015_07_04_080915_create_post_comments_table', '14');
INSERT INTO `migrations` VALUES ('2015_07_04_231251_create_pages_table', '15');
INSERT INTO `migrations` VALUES ('2015_07_06_201747_add_role_column_on_users_table', '16');
INSERT INTO `migrations` VALUES ('2015_07_07_065029_add_is_actived_and_active_code_and_actived_at_columns_on_users_table', '17');
INSERT INTO `migrations` VALUES ('2015_07_07_205003_add_ref_id_on_orders_table', '18');
INSERT INTO `migrations` VALUES ('2015_07_07_211629_add_ref_value_on_users_table', '19');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `order_items` VALUES ('16', '15', '6', 'Kaspersky Antivirus', '100000', '3', '2015-06-28 15:02:26', '2015-06-28 15:02:26', null);
INSERT INTO `order_items` VALUES ('17', '15', '5', 'Kaspersky Internet Security', '130000', '1', '2015-06-28 15:02:26', '2015-06-28 15:02:26', null);
INSERT INTO `order_items` VALUES ('18', '16', '5', 'Kaspersky Internet Security', '130000', '2', '2015-06-28 23:09:25', '2015-06-28 23:09:25', null);
INSERT INTO `order_items` VALUES ('19', '16', '7', 'Bkav Pro Internet Security', '170000', '2', '2015-06-28 23:09:25', '2015-06-28 23:09:25', null);

-- ----------------------------
-- Table structure for `order_sent_keys`
-- ----------------------------
DROP TABLE IF EXISTS `order_sent_keys`;
CREATE TABLE `order_sent_keys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_key_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order_sent_keys
-- ----------------------------
INSERT INTO `order_sent_keys` VALUES ('1', '16', '4', '2015-06-29 20:25:22', '2015-06-29 20:25:22', null);
INSERT INTO `order_sent_keys` VALUES ('2', '16', '6', '2015-06-29 20:25:22', '2015-06-29 20:25:22', null);
INSERT INTO `order_sent_keys` VALUES ('3', '16', '2', '2015-06-29 20:25:22', '2015-06-29 20:25:22', null);
INSERT INTO `order_sent_keys` VALUES ('4', '16', '5', '2015-06-29 20:25:22', '2015-06-29 20:25:22', null);

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
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `payment_type` tinyint(4) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `ref_id` int(10) unsigned DEFAULT NULL,
  `ref_value` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', 'Nhật Đỗ', 'ddnhat@gmail.com', '906578610', '170000', '0', null, '170000', null, '2015-06-25 22:43:09', '2015-06-26 00:05:19', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('2', 'Đức Nhật', 'nhatdo@outlook.com', '906578610', '600000', '120000', 'KHAITRUONG20%', '480000', null, '2015-06-27 23:55:20', '2015-06-28 23:04:39', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('3', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:03:43', '2015-06-28 09:03:43', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('4', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:11:35', '2015-06-28 09:11:35', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('5', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:14:33', '2015-06-28 09:14:33', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('6', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:16:11', '2015-06-28 09:16:11', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('7', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:17:39', '2015-06-28 09:17:39', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('8', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', '2015-06-29 20:25:19', '2015-06-28 09:25:28', '2015-06-28 09:25:28', null, null, null, '2015-06-29 20:25:19', null, '0');
INSERT INTO `orders` VALUES ('9', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:25:48', '2015-06-28 09:25:48', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('10', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:28:02', '2015-06-28 09:28:02', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('11', 'Đức Nhật', 'nhatdo@outlook.com', '1229012202', '100000', '0', null, '100000', '2015-06-29 20:25:19', '2015-06-28 09:52:24', '2015-06-28 09:52:24', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('12', 'Đức Nhật', 'ddnhat@gmail.com', '1229012202', '100000', '0', null, '100000', null, '2015-06-28 09:55:11', '2015-06-28 09:55:11', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('13', 'DO DUC NHAT', 'ddnhat@gmail.com', '1229012202', '170000', '0', null, '170000', null, '2015-06-28 11:14:15', '2015-06-28 11:14:15', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('14', 'DO DUC NHAT', 'ddnhat@gmail.com1', '987654321', '170000', '0', null, '170000', null, '2015-06-28 11:20:59', '2015-06-30 07:18:20', null, null, null, null, null, '0');
INSERT INTO `orders` VALUES ('15', 'Thùy Trang', 'letrang580@gmail.com', '909308401', '430000', '0', null, '430000', null, '2015-06-28 15:02:26', '2015-06-28 15:02:26', '2015-06-30 07:02:07', null, null, null, null, '0');
INSERT INTO `orders` VALUES ('16', 'Thùy Trang', 'ddnhat@gmail.com', '906578610', '600000', '0', null, '600000', '2015-06-29 20:25:19', '2015-06-28 23:09:25', '2015-06-29 20:25:28', null, null, null, '2015-06-29 20:25:28', null, '0');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `show_on_menu` tinyint(4) DEFAULT '0',
  `is_published` tinyint(4) DEFAULT '1',
  `publish_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'Quy định bảo hành', '<ol>\r\n	<li>C&aacute;c trường hợp kh&ocirc;ng bảo h&agrave;nh:\r\n	<ul>\r\n		<li>K&iacute;ch hoạt qu&aacute; số lượng m&aacute;y quy định</li>\r\n		<li>Hết thời gian sử dụng</li>\r\n	</ul>\r\n	</li>\r\n	<li>C&aacute;c trường hợp bảo h&agrave;nh c&oacute; ph&iacute;:\r\n	<ul>\r\n		<li>K&iacute;ch hoạt qu&aacute; số lần cho ph&eacute;p (3 lần) th&igrave; t&iacute;nh theo bảng ph&iacute; sau:</li>\r\n		<li>\r\n		<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n			<tbody>\r\n				<tr>\r\n					<td><strong>Thời gian đ&atilde; sử dụng</strong></td>\r\n					<td><strong>Ph&iacute; bảo h&agrave;nh</strong></td>\r\n				</tr>\r\n				<tr>\r\n					<td>Dưới 1 th&aacute;ng</td>\r\n					<td>Miễn ph&iacute;</td>\r\n				</tr>\r\n				<tr>\r\n					<td>Từ 1 đến 11 th&aacute;ng</td>\r\n					<td>(8% gi&aacute; mua mới) x (số th&aacute;ng sử dụng)</td>\r\n				</tr>\r\n				<tr>\r\n					<td>Từ th&aacute;ng 12</td>\r\n					<td>100% gi&aacute; mua mới</td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li>C&aacute;c trường hợp bảo h&agrave;nh miễn ph&iacute;:\r\n	<ul>\r\n		<li>​M&atilde; bị lỗi\r\n		<p>&nbsp;</p>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n', '0', '1', '2015-07-04 23:52:00', '2015-07-04 23:56:43', '2015-07-05 10:27:48', null);
INSERT INTO `pages` VALUES ('2', 'Giới thiệu', '<p><a href=\"http://phanmemquetvirut.com\" target=\"_blank\">Phần mềm qu&eacute;t virut</a></p>\r\n', '1', '1', '2015-07-05 10:14:00', '2015-07-05 10:14:51', '2015-07-05 10:14:51', null);

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
-- Table structure for `post_categories`
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES ('3', 'giới thiệu', '', '2015-07-03 17:43:49', '2015-07-03 17:43:49', null);

-- ----------------------------
-- Table structure for `post_comments`
-- ----------------------------
DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_display` tinyint(4) DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT NULL,
  `reply_message` text COLLATE utf8_unicode_ci,
  `reply_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_comments_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of post_comments
-- ----------------------------
INSERT INTO `post_comments` VALUES ('1', '2', 'Trang', 'letrang508@gmail.com', 'test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, test lại coi nè, ', '1', '1', '', '2015-07-04 23:04:31', '2015-07-04 09:51:38', '2015-07-04 23:04:31', null);
INSERT INTO `post_comments` VALUES ('2', '2', 'Nhật Đỗ ', 'ddnhat@gmail.com1', 'asd asd asd a das asd asd asd a das asd asd asd a das asd asd asd a das asd asd asd a das asd asd asd a das ', '0', '1', 'trả lời thử coi sao nètrả lời thử coi sao nètrả lời thử coi sao nètrả lời thử coi sao nè', '2015-07-04 10:10:05', '2015-07-04 09:52:06', '2015-07-04 10:10:05', null);

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(4) DEFAULT '1',
  `publish_at` datetime NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'Giới thiệu trang web', 'asasd asd asd asd asd asd asd\r\n as\r\nd \r\nasd\r\n a\r\nsd', '<p>test thử coi sao&nbsp;test thử coi<strong>&nbsp;sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sa</strong>o&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sa<em>o&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;t</em>est thử coi sa<s>o&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test t</s><a href=\"http://beta.dev/upload/images/posts/1.jpg\" target=\"_blank\"><img alt=\"asdasd\" src=\"http://beta.dev/upload/images/posts/1.jpg\" style=\"border-style:solid; border-width:1px; height:220px; width:350px\" /></a><s>hử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;te</s>st thử coi sao&nbsp;test thử coi sao&nbsp;test thử coi sao&nbsp;</p>\r\n', '1.jpg', '1', '2015-07-23 23:09:00', '3', '1', '2015-07-03 22:09:29', '2015-07-04 06:45:50', null);
INSERT INTO `posts` VALUES ('2', 'Cách tìm lại mã key bản quyền Bkav bị mất khi cài lại máy', 'Bạn cài lại Windows hoặc muốn cài lại hoặc nâng cấp phần mềm diệt virus Bkav nhưng lại quên mất mã key bản quyền. Bài viết sau sẽ hướng dẫn bạn cách tìm lại mã bản quyền Bkav đã bị mất', '<p><strong>C&oacute; nhiều c&aacute;ch để c&oacute; thể t&igrave;m v&agrave; lấy lại <a href=\"http://bb.com.vn/pro/sanpham/dietvirus-bkav.html\" target=\"_blank\">m&atilde; key bản quyền Bkav</a> bị mất. Bạn h&atilde;y &aacute;p dụng 1 trong c&aacute;c c&aacute;ch sau đ&acirc;y:</strong></p>\r\n\r\n<p><strong>C&aacute;ch 1:</strong> Bkav c&oacute; cơ chế Backup m&atilde; key bản quyền tự động bằng c&aacute;ch sao lưu file th&ocirc;ng tin bản quyền c&oacute; t&ecirc;n &quot;<strong>bkavsysinfo.sys</strong>&quot; l&ecirc;n thư mục gốc của tất cả c&aacute;c ổ đĩa. V&igrave; vậy, để t&igrave;m lại m&atilde; key bản quyền của Bkav, bạn chỉ việc Copy v&agrave; Backup lại file &quot;<strong>bkavsysinfo.sys</strong>&quot; n&agrave;y l&ecirc;n ổ đĩa USB. Sau đ&oacute;, l&uacute;c n&agrave;o muốn c&agrave;i lại phần mềm, bạn chỉ việc Copy file n&agrave;y v&agrave;o thư mục gốc của ổ C l&agrave; xong. Sau khi c&agrave;i xong Bkav, phần mềm sẽ tự động lấy lại c&aacute;c th&ocirc;ng tin bản quyền cũ từ file &quot;<strong>bkavsysinfo.sys</strong>&quot; n&agrave;y (bạn kh&ocirc;ng cần phải đăng k&yacute; hoặc nhập lại th&ocirc;ng tin nữa)</p>\r\n\r\n<p><strong>C&aacute;ch 2:</strong> Bạn cũng c&oacute; thể t&igrave;m lại key bản quyền Bkav bằng c&aacute;ch truy nhập chạy c&ocirc;ng cụ &quot;<strong>Regedit.exe</strong>&quot; (hoặc C:\\Windows\\SysWOW64\\regedit.exe đối với Windows 64bit) v&agrave; truy nhập theo đường dẫn sau: &quot;<strong>HKEY_LOCAL_MACHINE\\SOFTWARE\\Bkav</strong>&quot; sau đ&oacute; sao lưu kh&oacute;a &quot;<strong>Bkav</strong>&quot; n&agrave;y. Kh&oacute;a n&agrave;y ch&iacute;nh l&agrave; m&atilde; đang k&yacute; bản quyền để bạn c&oacute; thể sử dụng k&iacute;ch hoạt sau khi c&agrave;i đặt lại phần mềm bằng c&aacute;ch nh&aacute;y đ&uacute;p v&agrave;o file sao lưu để nhập n&oacute; v&agrave;o Registry của hệ thống</p>\r\n\r\n<p><strong>C&aacute;ch 3:</strong> Trường hợp bạn kh&ocirc;ng thể lấy lại Key bản quyền của Norton như 2 c&aacute;ch ở tr&ecirc;n (sau khi đ&atilde; format ổ cứng hoặc đ&atilde; x&oacute;a ổ C v&agrave; c&agrave;i lại Windows), bạn vẫn c&oacute; thể phục hồi lại m&atilde; bản quyền bằng c&aacute;ch gọi điện tới số hỗ trợ <strong>Hotline 1900.561.296 của Bkav</strong> sau đ&oacute; đọc số điện thoại bạn đ&atilde; sử dụng để đăng k&yacute; trong lần đầu ti&ecirc;n. Nếu đọc đ&uacute;ng th&ocirc;ng tin, Bkav sẽ cung cấp lại m&atilde; bản quyền để bạn c&oacute; thể c&agrave;i đặt lại phần mềm</p>\r\n\r\n<p>Ch&uacute;c bạn th&agrave;nh c&ocirc;ng!</p>\r\n', '2.jpg', '1', '2015-07-04 07:15:00', '3', '1', '2015-07-04 07:15:36', '2015-07-04 07:30:12', null);

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `return_at` datetime DEFAULT NULL,
  `use_for` int(11) DEFAULT NULL,
  `warranty_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_keys_product_id_foreign` (`product_id`),
  KEY `product_keys_user_id_foreign` (`user_id`),
  CONSTRAINT `product_keys_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_keys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_keys
-- ----------------------------
INSERT INTO `product_keys` VALUES ('2', 'asdasdasd', '7', '1', '2015-06-29 20:25:22', '2015-06-16 08:03:49', '2015-06-29 20:25:22', null, null, null, null);
INSERT INTO `product_keys` VALUES ('3', 'test lại 1', '6', '1', null, '2015-06-16 08:05:27', '2015-06-16 22:23:52', null, null, null, null);
INSERT INTO `product_keys` VALUES ('4', 'test lại', '5', '1', '2015-06-29 20:25:22', '2015-06-16 08:21:23', '2015-06-29 20:25:22', null, null, null, null);
INSERT INTO `product_keys` VALUES ('5', '123asda', '7', '1', '2015-06-29 20:25:22', '2015-06-16 08:21:23', '2015-07-01 15:13:24', null, null, null, '2015-07-02 07:33:59');
INSERT INTO `product_keys` VALUES ('6', 'asd123432', '5', '1', '2015-06-29 20:25:22', '2015-06-16 08:21:23', '2015-06-29 20:25:22', null, null, null, null);
INSERT INTO `product_keys` VALUES ('7', 'test thử coi sao', '7', '1', '2015-07-03 12:09:25', '2015-06-16 08:21:23', '2015-07-03 12:09:25', null, null, '1', null);
INSERT INTO `product_keys` VALUES ('8', 'XXXXX-XXXXX-XXXXX-XXXXX', '7', '1', null, '2015-07-02 07:52:43', '2015-07-02 07:52:56', null, null, null, null);

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
INSERT INTO `products` VALUES ('5', 'Kaspersky Internet Security', 'D:\\xampp\\tmp\\phpB948.tmp', '125000', 'Kaspersky Lab', '2015-06-14 22:30:35', '2015-06-30 08:00:48', null);
INSERT INTO `products` VALUES ('6', 'Kaspersky Antivirus', 'D:\\xampp\\tmp\\php28EB.tmp', '95000', 'Kaspersky Lab', '2015-06-15 07:52:30', '2015-06-30 08:01:00', null);
INSERT INTO `products` VALUES ('7', 'Bkav Pro Internet Security', 'D:\\xampp\\tmp\\php1338.tmp', '165000', 'Bkav', '2015-06-15 08:26:58', '2015-06-30 08:01:14', null);
INSERT INTO `products` VALUES ('8', 'Norton Internet Security', 'D:\\xampp\\tmp\\php347F.tmp', '150000', 'Symantec', '2015-06-17 08:07:57', '2015-06-30 08:01:29', null);

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
  `role` tinyint(4) DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0',
  `active_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `ref_value` int(11) DEFAULT '5',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Đức Nhật', '0906578610', 'ddnhat@gmail.com', '$2y$10$eGANUC28ES6Dyp7wMKNUfu.tRkxPaMQqF38ZWoE5BjWExMr03/AfC', '1', 'OrqTfHyEDXQ4oO6A2E5A6RT6R3Zp3VNAARrPEof2Y5SV0dwAaUwX52wVWgtA', '2015-06-15 23:14:04', '2015-07-07 07:30:01', null, '2', '1', null, null, '5');
INSERT INTO `users` VALUES ('2', 'admin', '0909308401', 'letrang580@gmail.com', '$2y$10$eGANUC28ES6Dyp7wMKNUfu.tRkxPaMQqF38ZWoE5BjWExMr03/AfC', '1', 'dqXgvH89CNQT05epCDBQb1zXBDHsamvzSRWSozIgnVUPMReqfNn2eQ7nC6W5', '2015-07-06 20:29:02', '2015-07-07 08:06:59', null, '1', '1', null, null, '5');
INSERT INTO `users` VALUES ('3', 'Nhật', '0906578610', 'nhatdo@outlook.com', '$2y$10$eGANUC28ES6Dyp7wMKNUfu.tRkxPaMQqF38ZWoE5BjWExMr03/AfC', '1', 'vLSkkKe5Q1eYhu9bANgK4AiN6W34AMEciHKDo1CkZI6B1aJvHG3cK0A27IQf', '2015-07-07 08:01:54', '2015-07-07 08:05:11', null, '1', '1', 'yUUwzi3GOq9QQT488v0DiL6AQLZIHZZJimqxIzWRKdq70LAYoXn7HthauMr1', null, '5');
INSERT INTO `users` VALUES ('4', 'Nhật Đỗ', '01229012202', 'ddnhat@gmail.com1', '$2y$10$lnrMSu3Y976hkymImZBzRuWhyddqxwtKVf2GHNjxoGxSNE90.CxMu', '0', 'y76gPTfIqNwr8THxYHoqBmbQmw0jqNId9zfT7e0Gw9QbgBc3DgcQQn9ys3T0', '2015-07-07 08:05:33', '2015-07-07 08:05:34', null, '0', '0', '3Y2xJmHe1XECswbxqz9GyKxW83ag1F36RqYEeinhFk0KxXTfAQWUgKCOoiMw', null, '5');
