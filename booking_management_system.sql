/*
Navicat MySQL Data Transfer

Source Server         : pc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : booking_management_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-02-01 11:30:11
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
-- Table structure for `family_details`
-- ----------------------------
DROP TABLE IF EXISTS `family_details`;
CREATE TABLE `family_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `given_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `gothram` varchar(255) NOT NULL,
  `rashi` varchar(255) NOT NULL,
  `natchatram` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of family_details
-- ----------------------------
INSERT INTO `family_details` VALUES ('1', 'Delectus aut', 'Deleniti ipsam', 'Est ad saepe', 'orowlosk@gmail.com', '0716524615', '2021-05-30', 'Vero enim animi ', 'Asperiores tenetur', 'Repellendus fugiat', 'Rem fugiat ', '2024-01-31 05:14:15', '2024-01-31 06:54:20');
INSERT INTO `family_details` VALUES ('2', 'Magnam deleniti', 'Voluptas voluptas ', 'Tenetur velit vel', 'orowlosk@gmail.com', '0715515625', '2002-05-10', 'Maxime quia ', 'Sit provident', 'Dicta enim', 'Itaque accusantium ', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `family_details` VALUES ('3', 'Molestias rerum', 'Consectetur enim', 'Error sed ratione', 'orowlosk@gmail.com', '0715515625', '1984-09-23', 'Veniam repellat ', 'Accusantium.', 'Veniam veniam', 'Molestiae iste ', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `family_details` VALUES ('4', 'Molestiae', 'Iste et ex sed est. ', 'Porro maxime ', 'orowlosk@gmail.com', '0715515625', '1988-02-21', 'Eius soluta quae', 'Tempore ut', 'Omnis optio ', 'Debitis corpori', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `family_details` VALUES ('5', 'Et qui voluptas', 'Voluptates et', 'Quasi non est', 'orowlosk@gmail.com', '0715515625', '1985-07-04', 'Quia a sunt', 'Non distinctio', 'Sit rerum sit sit', 'Modi harum', '2024-01-31 05:14:15', '2024-02-01 04:08:43');

-- ----------------------------
-- Table structure for `frequencies`
-- ----------------------------
DROP TABLE IF EXISTS `frequencies`;
CREATE TABLE `frequencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of frequencies
-- ----------------------------
INSERT INTO `frequencies` VALUES ('1', 'Monthly', '30', '2024-01-31 05:14:15', '2024-01-31 05:20:12');
INSERT INTO `frequencies` VALUES ('2', 'Weekly', '7', '2024-01-31 05:14:15', '2024-01-31 05:20:31');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2024_01_26_000001_create_family_details_table', '1');
INSERT INTO `migrations` VALUES ('7', '2024_01_26_000003_create_subscriber_types_table', '1');
INSERT INTO `migrations` VALUES ('8', '2024_01_26_000004_create_frequencies_table', '1');
INSERT INTO `migrations` VALUES ('9', '2024_01_26_009001_add_foreigns_to_subscribers_table', '1');
INSERT INTO `migrations` VALUES ('10', '2024_01_26_050348_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('11', '2024_01_26_000002_create_subscribers_table', '2');

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
INSERT INTO `model_has_roles` VALUES ('2', 'App\\Models\\User', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'list allfamilydetails', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('2', 'view allfamilydetails', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('3', 'create allfamilydetails', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('4', 'update allfamilydetails', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('5', 'delete allfamilydetails', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('6', 'list frequencies', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('7', 'view frequencies', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('8', 'create frequencies', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('9', 'update frequencies', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('10', 'delete frequencies', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('11', 'list subscribers', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('12', 'view subscribers', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('13', 'create subscribers', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('14', 'update subscribers', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('15', 'delete subscribers', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('16', 'list subscribertypes', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('17', 'view subscribertypes', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('18', 'create subscribertypes', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('19', 'update subscribertypes', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('20', 'delete subscribertypes', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('21', 'list roles', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('22', 'view roles', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('23', 'create roles', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('24', 'update roles', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('25', 'delete roles', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('26', 'list permissions', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `permissions` VALUES ('27', 'view permissions', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('28', 'create permissions', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('29', 'update permissions', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('30', 'delete permissions', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('31', 'list users', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('32', 'view users', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('33', 'create users', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('34', 'update users', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `permissions` VALUES ('35', 'delete users', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'user', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `roles` VALUES ('2', 'super-admin', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `roles` VALUES ('3', 'detailsAdmin', 'web', '2024-01-31 06:20:25', '2024-01-31 06:20:25');

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
INSERT INTO `role_has_permissions` VALUES ('1', '1');
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('1', '3');
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '3');
INSERT INTO `role_has_permissions` VALUES ('3', '1');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '3');
INSERT INTO `role_has_permissions` VALUES ('4', '1');
INSERT INTO `role_has_permissions` VALUES ('4', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '3');
INSERT INTO `role_has_permissions` VALUES ('5', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('5', '3');
INSERT INTO `role_has_permissions` VALUES ('6', '1');
INSERT INTO `role_has_permissions` VALUES ('6', '2');
INSERT INTO `role_has_permissions` VALUES ('7', '1');
INSERT INTO `role_has_permissions` VALUES ('7', '2');
INSERT INTO `role_has_permissions` VALUES ('8', '1');
INSERT INTO `role_has_permissions` VALUES ('8', '2');
INSERT INTO `role_has_permissions` VALUES ('9', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '2');
INSERT INTO `role_has_permissions` VALUES ('10', '1');
INSERT INTO `role_has_permissions` VALUES ('10', '2');
INSERT INTO `role_has_permissions` VALUES ('11', '1');
INSERT INTO `role_has_permissions` VALUES ('11', '2');
INSERT INTO `role_has_permissions` VALUES ('12', '1');
INSERT INTO `role_has_permissions` VALUES ('12', '2');
INSERT INTO `role_has_permissions` VALUES ('13', '1');
INSERT INTO `role_has_permissions` VALUES ('13', '2');
INSERT INTO `role_has_permissions` VALUES ('14', '1');
INSERT INTO `role_has_permissions` VALUES ('14', '2');
INSERT INTO `role_has_permissions` VALUES ('15', '1');
INSERT INTO `role_has_permissions` VALUES ('15', '2');
INSERT INTO `role_has_permissions` VALUES ('16', '1');
INSERT INTO `role_has_permissions` VALUES ('16', '2');
INSERT INTO `role_has_permissions` VALUES ('17', '1');
INSERT INTO `role_has_permissions` VALUES ('17', '2');
INSERT INTO `role_has_permissions` VALUES ('18', '1');
INSERT INTO `role_has_permissions` VALUES ('18', '2');
INSERT INTO `role_has_permissions` VALUES ('19', '1');
INSERT INTO `role_has_permissions` VALUES ('19', '2');
INSERT INTO `role_has_permissions` VALUES ('20', '1');
INSERT INTO `role_has_permissions` VALUES ('20', '2');
INSERT INTO `role_has_permissions` VALUES ('21', '2');
INSERT INTO `role_has_permissions` VALUES ('22', '2');
INSERT INTO `role_has_permissions` VALUES ('23', '2');
INSERT INTO `role_has_permissions` VALUES ('24', '2');
INSERT INTO `role_has_permissions` VALUES ('25', '2');
INSERT INTO `role_has_permissions` VALUES ('26', '2');
INSERT INTO `role_has_permissions` VALUES ('27', '2');
INSERT INTO `role_has_permissions` VALUES ('28', '2');
INSERT INTO `role_has_permissions` VALUES ('29', '2');
INSERT INTO `role_has_permissions` VALUES ('30', '2');
INSERT INTO `role_has_permissions` VALUES ('31', '2');
INSERT INTO `role_has_permissions` VALUES ('32', '2');
INSERT INTO `role_has_permissions` VALUES ('33', '2');
INSERT INTO `role_has_permissions` VALUES ('34', '2');
INSERT INTO `role_has_permissions` VALUES ('35', '2');

-- ----------------------------
-- Table structure for `subscribers`
-- ----------------------------
DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subscriber_type_id` bigint(20) unsigned NOT NULL,
  `frequency_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subscribers
-- ----------------------------
INSERT INTO `subscribers` VALUES ('3', '564654654jfdg5069854kjg-lfdg49-586546056098549068', '0', 'wow754@gmail.com', '2', '2', '2024-01-31 06:09:37', '2024-01-31 23:51:39');
INSERT INTO `subscribers` VALUES ('5', '56ecf71f53164ce6fd0595eda51a6be300825a21aae7a715f98e4821948fd97c', null, 'jhessel@schmitt.net', '3', '1', '2024-02-01 02:16:00', '2024-02-01 02:16:00');
INSERT INTO `subscribers` VALUES ('6', 'dc6086813996893e5d48e61b76284d4f8ab8ac779596d167066a808241d0172b', null, 'jhessel@schmitt.net', '2', '2', '2024-02-01 02:19:42', '2024-02-01 02:19:42');
INSERT INTO `subscribers` VALUES ('7', '25ac1ae08b72605c61b93517dc35de465631b276a4b10d82ea9c0c08558b9f55', '1', 'jhessel@schmitt.net', '2', '1', '2024-02-01 03:13:57', '2024-02-01 04:39:31');
INSERT INTO `subscribers` VALUES ('8', 'a977309526626f8ba506d95a74c57dfe8f04ab16d9c7b4674e62b548fd791aca', null, 'jhessel@schmitt.net', '1', '2', '2024-02-01 03:35:52', '2024-02-01 03:35:52');
INSERT INTO `subscribers` VALUES ('9', '20219cb8e917e7fbe147f6bf1a57708376ef1733c799e76a377d641d7315faff', '0', 'jhessel@schmitt.net', '3', '2', '2024-02-01 03:36:11', '2024-02-01 03:37:01');
INSERT INTO `subscribers` VALUES ('10', '22de55826f514954e56453ec0cf92a9ca1926c92842d5b371181c38acc0236b4', null, 'jhessel@schmitt.net', '1', '1', '2024-02-01 03:44:05', '2024-02-01 03:44:05');
INSERT INTO `subscribers` VALUES ('17', 'cb1b1df59e73490d1739bf11cb2a1d789fd4b95cd3342b43f6eac3374456ad85', null, 'keagan83@kautzer.biz', '1', null, '2024-02-01 05:23:21', '2024-02-01 05:23:21');
INSERT INTO `subscribers` VALUES ('18', '87a83b90d3a32d7f49ac1eb7336a09fad31ca3fc2620d878fb43e2bc17f45b2a', null, 'keagan83@kautzer.biz', '2', null, '2024-02-01 05:23:37', '2024-02-01 05:23:37');
INSERT INTO `subscribers` VALUES ('19', '2b7d44a5884058259142be89fcd7e1ea429657e2b4553a5cdb86a97b813c101c', null, 'keagan83@kautzer.biz', '3', null, '2024-02-01 05:30:57', '2024-02-01 05:30:57');

-- ----------------------------
-- Table structure for `subscriber_types`
-- ----------------------------
DROP TABLE IF EXISTS `subscriber_types`;
CREATE TABLE `subscriber_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subscriber_types
-- ----------------------------
INSERT INTO `subscriber_types` VALUES ('1', 'Event', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `subscriber_types` VALUES ('2', 'Function Halls', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `subscriber_types` VALUES ('3', 'Booking Offers', '2024-01-31 05:14:15', '2024-01-31 05:14:15');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `success_msg` tinyint(1) DEFAULT 0,
  `given_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Prof. Vladimir Predovic', 'Molestias rerum dolor reprehenderit a. Qui aut exercitationem necessitatibus dolor soluta. Eius omnis excepturi fuga culpa in. Dicta sunt in doloremque sed dolorem expedita laudantium.', 'Iste corporis consequatur odio. Sequi ratione quis non recusandae est nisi rerum reprehenderit. Ea aut animi nam libero qui qui.', '1970-11-07', '61316 Langosh Parkways Suite 449\nWalterburgh, AR 48642-2987', '+1.820.870.5317', 'admin@admin.com', '2024-02-01 05:47:43', '$2y$10$VZY9XzY9AiNwwH327.mzceaCSerbr4VWxuVYUiVpyWGyHkPUufWTm', '1', '1', 'WGdNEpeZ5MYj4XXrJTElEaXziKmeTuFYI2RR58Gcr0aj8o8AiS5UojdYLgQw', '2024-01-31 05:14:14', '2024-02-01 05:47:43');
INSERT INTO `users` VALUES ('2', '0', 'Johathan Klein', 'Et facilis et eos nesciunt ducimus culpa facilis repellendus. Velit libero consequatur cupiditate saepe. Et voluptate sunt autem nesciunt repellat nostrum.', 'Rerum ratione maxime amet natus nostrum quae voluptatem sed. Aliquid sunt consequatur optio ab nobis nobis. Suscipit omnis voluptate amet exercitationem maiores labore maxime. Sit voluptatibus deleniti non qui officia.', '2010-11-03', '898 Bruen Keys Suite 491\nWest Ivy, CT 90078-6581', '(262) 736-2710', 'camryn48@hotmail.com', '2024-01-31 05:14:15', '$2y$10$VZY9XzY9AiNwwH327.mzceaCSerbr4VWxuVYUiVpyWGyHkPUufWTm', '0', '0', 'clBzrZVzzk', '2024-01-31 05:14:16', '2024-01-31 05:14:16');
INSERT INTO `users` VALUES ('3', '0', 'Velma Gaylord', 'Fugit eos fugiat dolorem dolor. Id doloremque commodi dolorum hic provident sit nam. Sunt eius facilis ducimus odio in. Quae in soluta neque ea. Neque odio dolores odio eligendi distinctio. Quidem ullam consequatur at odit. Facere fuga a in dolore.', 'Porro magni reiciendis rerum odio accusamus culpa fugit. Rem voluptatem deserunt nam iste officia tenetur. Rerum officia repellat error aut et.', '1988-07-06', '76193 Maymie Pines Apt. 624\nPort Estefaniamouth, DE 20744-6498', '1-303-267-8859', 'sven94@yahoo.com', '2024-01-31 05:14:15', '$2y$10$VZY9XzY9AiNwwH327.mzceaCSerbr4VWxuVYUiVpyWGyHkPUufWTm', '1', '0', 'hWQsjayia8', '2024-01-31 05:14:16', '2024-01-31 05:14:16');
INSERT INTO `users` VALUES ('4', '0', 'Miss Olga Green', 'Quis necessitatibus quo exercitationem sequi quidem odio ratione libero. Sunt rerum sequi inventore sunt velit. Pariatur voluptatibus ea nesciunt doloremque et quo. Nemo at nihil voluptates quibusdam aut.', 'Qui impedit sunt porro eveniet non. Cupiditate aliquid sequi esse magnam quasi similique. Modi accusantium quia natus facilis harum aut dolore. Omnis facilis nesciunt laboriosam consectetur.', '2001-01-04', '749 Ruth Lane\nHuelshaven, DC 98430-2704', '(225) 341-5165', 'virginie98@stamm.com', '2024-01-31 05:14:15', '$2y$10$VZY9XzY9AiNwwH327.mzceaCSerbr4VWxuVYUiVpyWGyHkPUufWTm', '1', '0', 'GBMnR90xi9', '2024-01-31 05:14:16', '2024-01-31 05:14:16');
INSERT INTO `users` VALUES ('5', '1', 'Norwood Kautzer', 'Repellendus distinctio ut eum quos ipsum est. Distinctio ut et iure impedit aut id. Commodi qui ut distinctio at voluptatem et. Nemo harum vero consequuntur blanditiis perferendis.', 'Doloribus consectetur culpa pariatur ratione ut magnam soluta. Quidem ullam aspernatur quos voluptatibus. Officia facilis dolorum ratione hic perspiciatis. Omnis hic porro et soluta.', '2008-10-20', '53617 Larissa Center\nNorth Kevinton, LA 45310-3441', '(239) 478-2413', 'jhessel@schmitt.net', '2024-02-01 03:38:59', '$2y$10$VZY9XzY9AiNwwH327.mzceaCSerbr4VWxuVYUiVpyWGyHkPUufWTm', '1', '0', 'gRm2Vh5PaRhv0h4qZ4B1wBpwcdzxxipu4YUC3DtrK19aJk7DPeGSb3dpujnI', '2024-01-31 05:14:16', '2024-02-01 03:38:59');
INSERT INTO `users` VALUES ('6', '1', 'Maximillian Swift Sr.', 'Dolor alias nesciunt rerum qui ex et et. Alias nihil qui eaque minus qui voluptas accusantium repellendus. Ea consequatur corrupti deserunt sint necessitatibus. Nesciunt iure et eligendi quis aut ea.', 'Repudiandae optio autem aliquid et possimus voluptatem non hic. Dolor fuga totam sequi eos reiciendis sit omnis. Velit recusandae totam ut eius consequatur doloribus.', '1986-03-05', '4494 Margaret Squares Suite 583\nLangmouth, WI 19122-8931', '+1.774.730.7420', 'keagan83@kautzer.biz', '2024-02-01 05:23:15', '$2y$10$VZY9XzY9AiNwwH327.mzceaCSerbr4VWxuVYUiVpyWGyHkPUufWTm', '0', '0', 'TJRqaPXz9xQqMWQGn5Rcf5Up8dV4UCJMjD8qTb3cxr3OUsvGcHWMwN7lYtqZ', '2024-01-31 05:14:16', '2024-02-01 05:23:15');
