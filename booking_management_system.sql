/*
Navicat MySQL Data Transfer

Source Server         : pc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : booking_management_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-01-29 10:54:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('21', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('22', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('23', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('24', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('25', '2024_01_26_050348_create_permission_tables', '1');

-- ----------------------------
-- Table structure for `model_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `model_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('2', 'App\\Models\\User', '8');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'list roles', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('2', 'view roles', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('3', 'create roles', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('4', 'update roles', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('5', 'delete roles', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('6', 'list permissions', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('7', 'view permissions', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('8', 'create permissions', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('9', 'update permissions', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('10', 'delete permissions', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('11', 'list users', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('12', 'view users', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('13', 'create users', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('14', 'update users', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `permissions` VALUES ('15', 'delete users', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');

-- ----------------------------
-- Table structure for `personal_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'user', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `roles` VALUES ('2', 'super-admin', 'web', '2024-01-29 03:42:45', '2024-01-29 03:42:45');

-- ----------------------------
-- Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '2');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('6', '2');
INSERT INTO `role_has_permissions` VALUES ('7', '2');
INSERT INTO `role_has_permissions` VALUES ('8', '2');
INSERT INTO `role_has_permissions` VALUES ('9', '2');
INSERT INTO `role_has_permissions` VALUES ('10', '2');
INSERT INTO `role_has_permissions` VALUES ('11', '2');
INSERT INTO `role_has_permissions` VALUES ('12', '2');
INSERT INTO `role_has_permissions` VALUES ('13', '2');
INSERT INTO `role_has_permissions` VALUES ('14', '2');
INSERT INTO `role_has_permissions` VALUES ('15', '2');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `success_msg` tinyint(1) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `news_letter_subscription` tinyint(1) DEFAULT 0,
  `privacy_policy_and_terms_of_condition` tinyint(1) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', '1', 'Adrian Senger', 'Odio similique sed quod molestiae aut facilis. Ab numquam omnis est nulla quo optio. Quo sed illo consequatur eligendi id excepturi. Omnis fugiat est amet labore molestiae.', '1999-04-02', '581 Skyla Overpass\nLake Eldoraburgh, NE 64695-5492', '828-566-1572', 'laila74@gmail.com', '2024-01-29 03:42:51', '$2y$10$wn/bd/L9arOzZ0uHJNtUFOubTTY.VXJSUbP0QZ0LI2w3dr1PnZqYu', '1', '1', 'dRG0swGKsIPh7vuI9ADjkevOEj0dU9ZMq8Ar1JqWL8kL9ZAT3g39PWDaXXy1', '2024-01-29 03:42:45', '2024-01-29 03:42:51');
INSERT INTO `users` VALUES ('3', '0', 'Prof. Camille Schroeder', 'Vitae atque est in qui ea. Consequuntur laboriosam qui et voluptas ratione eveniet debitis. Ipsum sed veritatis possimus sit libero. Sit ea velit explicabo nam neque earum.', '2020-01-29', '6378 Charity Forges\nJulienburgh, KS 95537-4728', '+1.973.576.0591', 'heidenreich.kellie@bashirian.com', '2024-01-29 03:42:45', '$2y$10$SleI3r.vqidDnwcsg65JdepM.UiEN1s3lKnAFFbMXCAlj2jTPvSqa', '1', '1', 'UUo8r3aVxm', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `users` VALUES ('4', '0', 'Karen Donnelly PhD', 'Voluptatum similique aut exercitationem tenetur et iure. Reiciendis sequi quis sit eius possimus nihil vitae. Veritatis fuga sequi nihil.', '1983-10-24', '62910 Rosalyn Cape\nBaumbachstad, IA 09578-5162', '937.726.2100', 'boehm.augustus@brekke.com', '2024-01-29 03:42:45', '$2y$10$y7YsQ2ac/moVPZHfkTuQWucQKRrqegLj.5M5.dC0xoZySF2IknJQO', '0', '1', 'zE7ouLHNg6', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `users` VALUES ('5', '0', 'Ms. Eugenia Ondricka', 'Numquam ut ut officia ratione. Cum aut ut dolore dolorum. Fugit et magnam placeat qui dolor natus. Tenetur aperiam et recusandae harum et odio repudiandae. Eum et est reiciendis ut. Ea quaerat molestiae est animi deserunt.', '1997-06-26', '9456 Kerluke Motorway Apt. 703\nPort Rhianna, MT 50272-5180', '269.402.2081', 'vcartwright@breitenberg.net', '2024-01-29 03:42:45', '$2y$10$9N4Uzo4ibUOTTx9c./pDQ.vvnXtL5XV7lgXwdWEPgkIu4vTjY8I7a', '0', '1', 'lDuIrLIcUH', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `users` VALUES ('6', '0', 'Cale Kassulke IV', 'Quod dolore beatae voluptatibus quia molestiae est vel. Fugit id quo sint accusantium. Qui commodi dignissimos vero est assumenda saepe aspernatur. Odio magni excepturi aut officia ipsam. Sequi dolores adipisci non impedit in.', '1982-02-03', '420 Brown Vista Suite 105\nEast Betsychester, TN 17970', '1-518-204-5793', 'elfrieda42@yahoo.com', '2024-01-29 03:42:45', '$2y$10$QvUBiMw52j5mqrhcA4HaNee.unsXeNp0KmLbWcq6MN1t/f870xGze', '0', '1', '9T2BWJL07N', '2024-01-29 03:42:45', '2024-01-29 03:42:45');
INSERT INTO `users` VALUES ('7', '1', 'Viranga', 'gayan', '2024-01-16', '499 1a ihalakaragamuna kadawath', '0716251645', 'dhanushkagaya167@gmail.com', '2024-01-29 03:46:34', '$2y$10$ECDGPDFfCHiZ/gqsqyiL6uUC.RYuovIQo694UuvAGjZ9JCJ5WD9C.', '1', '0', null, '2024-01-29 03:44:01', '2024-01-29 03:46:34');
INSERT INTO `users` VALUES ('8', '1', 'dhanushkas', 'gyanas', '2024-01-28', '496 ihalakaragamuna kadawatha', '0716252615', 'admin@admin.com', '2024-01-29 05:22:42', '$2y$10$cqNAPMl1IAChYWcUqYnzIenNPALEFf2/xf.q3oaGC7LUX222WoMz.', '1', '0', null, '2024-01-29 03:48:51', '2024-01-29 05:22:42');
INSERT INTO `users` VALUES ('9', '1', 'Viranga', 'gayan', '2024-01-29', '499 1a ihalakaragamuna kadawath', '0716541652', 'admin4545@admin.com', '2024-01-29 04:14:15', '$2y$10$IcnEfcx5kW53jETtMPQ3zOUSuGbi22CQG.U0tf8Ro0E344Lc.U402', '1', '0', null, '2024-01-29 04:05:48', '2024-01-29 04:14:15');
INSERT INTO `users` VALUES ('10', '1', 'Virangaplj', 'gayano', '2021-05-04', '499 1a ihalakaragamuna kadawathahh', '0716325416', 'admin465@admin.com', '2024-01-29 04:22:53', '$2y$10$LLwdUta6CmQTygiXjzX3UOcJ6BTgzMdO47Hy30DWaMGhq/CzP/7Zq', '1', '1', null, '2024-01-29 04:16:54', '2024-01-29 04:22:53');
INSERT INTO `users` VALUES ('11', '1', 'dhanushka', 'gayan', '2024-01-29', '899 1a ihalakaragamuna kadawath', '0716251546', 'admin454@admin.com', '2024-01-29 04:33:27', '$2y$10$kA8Knf0cQsZVaY0aGuLWJ.z7lKnSm26/0xDnRlEFwnd1UcN1Lxq9W', '1', '1', null, '2024-01-29 04:30:55', '2024-01-29 04:33:27');
INSERT INTO `users` VALUES ('12', '1', 'Virangapok', 'FamilyName', '2024-01-29', '495  kiribathgoda', '0715261540', 'admin45455@admin.com', '2024-01-29 04:35:39', '$2y$10$DIesejTSgKXrM0OLs3/2b.qTCLQxwcwTk5t2oJL1Fn4OSaDRzWL7.', '0', '0', null, '2024-01-29 04:35:11', '2024-01-29 04:35:39');
