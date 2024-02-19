/*
 Navicat Premium Data Transfer

 Source Server         : pc
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : booking_management_system

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 19/02/2024 14:32:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for family_details
-- ----------------------------
DROP TABLE IF EXISTS `family_details`;
CREATE TABLE `family_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `given_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gothram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rashi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `natchatram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of family_details
-- ----------------------------
INSERT INTO `family_details` VALUES (1, 'Delectus aut', 'Deleniti ipsam', 'Est ad saepe', 'orowlosk@gmail.com', '0716524619', '2021-05-30', 'Vero enim animi', 'Asperiores tenetur', 'Repellendus fugiat', 'Rem fugiat', 4, '2024-01-31 05:14:15', '2024-02-04 11:03:43');
INSERT INTO `family_details` VALUES (3, 'Molestias rerum', 'Consectetur enim', 'Error sed ratione', 'orowlosk@gmail.com', '0715515625', '1984-09-23', 'Veniam repellat ', 'Accusantium.', 'Veniam veniam', 'Molestiae iste ', 3, '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `family_details` VALUES (5, 'Et qui voluptas', 'Voluptates et', 'Quasi non est', 'orowlosk@gmail.com', '0715515625', '1985-07-04', 'Quia a sunt', 'Non distinctio', 'Sit rerum sit sit', 'Modi harum', 5, '2024-01-31 05:14:15', '2024-02-01 04:08:43');
INSERT INTO `family_details` VALUES (10, 'sdfdsfsd', 'sdfdsfsdwer', 'sdfsdwer', 'woeoeoopj@gmail.com', '0716251478', '2024-02-17', NULL, NULL, NULL, NULL, 6, '2024-02-17 17:06:01', '2024-02-17 17:06:01');
INSERT INTO `family_details` VALUES (15, 'givenname', 'Middle name', 'family name', 'sdsdfdsf@gmail.com', '0716544514', '2019-01-15', 'sisterss', NULL, NULL, NULL, 1, '2024-02-18 23:30:40', '2024-02-19 03:20:18');

-- ----------------------------
-- Table structure for frequencies
-- ----------------------------
DROP TABLE IF EXISTS `frequencies`;
CREATE TABLE `frequencies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of frequencies
-- ----------------------------
INSERT INTO `frequencies` VALUES (1, 'Monthly', 31, '2024-01-31 05:14:15', '2024-02-04 11:04:03');
INSERT INTO `frequencies` VALUES (2, 'Weekly', 7, '2024-01-31 05:14:15', '2024-01-31 05:20:31');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_01_26_000001_create_family_details_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_01_26_000003_create_subscriber_types_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_01_26_000004_create_frequencies_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_01_26_009001_add_foreigns_to_subscribers_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_01_26_050348_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (11, '2024_01_26_000002_create_subscribers_table', 2);
INSERT INTO `migrations` VALUES (12, '2024_01_26_000005_create_user_profiles_table', 3);
INSERT INTO `migrations` VALUES (13, '2024_01_26_009002_add_foreigns_to_user_profiles_table', 3);
INSERT INTO `migrations` VALUES (15, '2024_02_05_163841_users', 4);
INSERT INTO `migrations` VALUES (16, '2024_02_06_042132_add_column_soft_delete_in_users_table', 5);
INSERT INTO `migrations` VALUES (17, '2024_02_06_074215_create_user_codes', 6);
INSERT INTO `migrations` VALUES (19, '2024_02_17_100440_family_details', 7);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (4, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (5, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (6, 'App\\Models\\User', 6);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (41, 'manage allfamilydetails', 'web', '2024-02-04 09:47:30', '2024-02-04 09:47:30');
INSERT INTO `permissions` VALUES (42, 'manage frequencies', 'web', '2024-02-04 09:47:30', '2024-02-04 09:47:30');
INSERT INTO `permissions` VALUES (43, 'manage subscribers', 'web', '2024-02-04 09:47:30', '2024-02-04 09:47:30');
INSERT INTO `permissions` VALUES (44, 'manage subscribertypes', 'web', '2024-02-04 09:47:30', '2024-02-04 09:47:30');
INSERT INTO `permissions` VALUES (45, 'manage userprofiles', 'web', '2024-02-04 09:47:30', '2024-02-04 09:47:30');
INSERT INTO `permissions` VALUES (46, 'manage users', 'web', '2024-02-04 15:24:21', '2024-02-04 15:24:24');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (41, 5);
INSERT INTO `role_has_permissions` VALUES (41, 6);
INSERT INTO `role_has_permissions` VALUES (42, 6);
INSERT INTO `role_has_permissions` VALUES (43, 6);
INSERT INTO `role_has_permissions` VALUES (46, 6);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'user', 'web', '2024-01-31 05:14:14', '2024-01-31 05:14:14');
INSERT INTO `roles` VALUES (2, 'super-admin', 'web', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `roles` VALUES (3, 'detailsAdmin', 'web', '2024-01-31 06:20:25', '2024-01-31 06:20:25');
INSERT INTO `roles` VALUES (4, 'manageUserProfile', 'web', '2024-02-04 07:52:30', '2024-02-04 07:52:30');
INSERT INTO `roles` VALUES (5, 'familydetails_manage', 'web', '2024-02-04 09:51:52', '2024-02-04 09:51:52');
INSERT INTO `roles` VALUES (6, 'youtuber', 'web', '2024-02-04 10:55:19', '2024-02-04 10:55:19');

-- ----------------------------
-- Table structure for subscriber_types
-- ----------------------------
DROP TABLE IF EXISTS `subscriber_types`;
CREATE TABLE `subscriber_types`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscriber_types
-- ----------------------------
INSERT INTO `subscriber_types` VALUES (1, 'Event', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `subscriber_types` VALUES (2, 'Function Halls', '2024-01-31 05:14:15', '2024-01-31 05:14:15');
INSERT INTO `subscriber_types` VALUES (3, 'Booking Offers', '2024-01-31 05:14:15', '2024-01-31 05:14:15');

-- ----------------------------
-- Table structure for subscribers
-- ----------------------------
DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_type_id` bigint UNSIGNED NOT NULL,
  `frequency_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscribers
-- ----------------------------
INSERT INTO `subscribers` VALUES (3, '564654654jfdg5069854kjg-lfdg49-586546056098549068', 0, 'wow754@gmail.com', 2, 2, '2024-01-31 06:09:37', '2024-01-31 23:51:39');
INSERT INTO `subscribers` VALUES (17, 'cb1b1df59e73490d1739bf11cb2a1d789fd4b95cd3342b43f6eac3374456ad85', NULL, 'keagan83@kautzer.biz', 1, NULL, '2024-02-01 05:23:21', '2024-02-01 05:23:21');
INSERT INTO `subscribers` VALUES (18, '87a83b90d3a32d7f49ac1eb7336a09fad31ca3fc2620d878fb43e2bc17f45b2a', NULL, 'keagan83@kautzer.biz', 2, NULL, '2024-02-01 05:23:37', '2024-02-01 05:23:37');
INSERT INTO `subscribers` VALUES (19, '2b7d44a5884058259142be89fcd7e1ea429657e2b4553a5cdb86a97b813c101c', NULL, 'keagan83@kautzer.biz', 3, NULL, '2024-02-01 05:30:57', '2024-02-01 05:30:57');
INSERT INTO `subscribers` VALUES (20, 'aafaa7e1856bf3bb091d752b048036dda8850c81524b9fc52df58af04487f48f', NULL, 'virginie98@stamm.com', 2, NULL, '2024-02-05 09:27:36', '2024-02-05 09:27:36');
INSERT INTO `subscribers` VALUES (21, 'cadcbb656440efa44659c90de38f6eb7debd842d1e52f1db210ac01ecddf92b1', NULL, 'virginie98@stamm.com', 3, NULL, '2024-02-05 09:27:53', '2024-02-05 09:27:53');

-- ----------------------------
-- Table structure for user_codes
-- ----------------------------
DROP TABLE IF EXISTS `user_codes`;
CREATE TABLE `user_codes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_codes
-- ----------------------------
INSERT INTO `user_codes` VALUES (1, 9, '1521', '2024-02-06 08:27:19', '2024-02-06 10:23:58');
INSERT INTO `user_codes` VALUES (2, 1, '3353', '2024-02-06 08:38:44', '2024-02-07 03:59:47');
INSERT INTO `user_codes` VALUES (3, 6, '5413', '2024-02-06 10:23:20', '2024-02-06 10:23:20');

-- ----------------------------
-- Table structure for user_profiles
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_number_landline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gothram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rashi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `natchatram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_profiles_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_profiles
-- ----------------------------
INSERT INTO `user_profiles` VALUES (8, 'public/YovHmdlHG0MAMl15iDiaK5qmHEsKUW0eQwCclmsl.png', '0716251647', 'sdfdsfsdf', 'sdfdsf', 'dsfdsf', 1, '2024-02-12 06:29:27', '2024-02-15 11:32:07');
INSERT INTO `user_profiles` VALUES (9, 'public/YovHmdlHG0MAMl15iDiaK5qmHEsKUW0eQwCclmsl.png', '0716254', 'Gothram test', 'Rashi test', 'Natcharam test', 4, '2024-02-16 06:05:13', '2024-02-18 07:48:18');
INSERT INTO `user_profiles` VALUES (12, NULL, NULL, NULL, NULL, NULL, 6, '2024-02-18 10:57:23', '2024-02-18 13:04:59');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `success_msg` tinyint(1) NULL DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `given_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `family_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_letter_subscription` tinyint(1) NULL DEFAULT 0,
  `privacy_policy_and_terms_of_condition` tinyint(1) NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, '1', 'Stephanie', 'Molestias ', 'Istanie', '1964-01-09', '61316 Langosh Parkways Suite 449Walterburgh, AR 48642-2987', '716242011', 'admin@admin.com', '2024-02-16 11:28:58', '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 1, 'OkTTfDBabjE67hSWRcFAdLODmdtnFVYkSQRtyHmSaGwgxKwYVe7BCI908uTb', '2024-01-31 05:14:14', '2024-02-18 06:08:17', NULL, NULL);
INSERT INTO `users` VALUES (2, 1, '1', 'Johathan Klein', 'Et facilis et eos', 'Rerum', '2010-11-03', '898 Bruen Keys Suite 491West Ivy, CT 90078-6581', '0716252616', 'camryn48@hotmail.com', '2024-02-16 07:12:32', '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 0, 'SNaBA6CieFzZwJfRdbJNHkjtDJ1dFL0WTi8l74DKrQJyVAOB8Z2vU8iPmRGx', '2024-01-31 05:14:16', '2024-02-16 07:12:32', NULL, NULL);
INSERT INTO `users` VALUES (3, 1, '1', 'Velma Gaylord', 'Fugit eos fugiat dolorem dolor. ', 'Porro magni', '1988-07-06', '76193 Maymie Pines Apt. 624\nPort Estefaniamouth, DE 20744-6498', '1-303-267-8859', 'sven94@yahoo.com', '2024-02-17 02:39:33', '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 0, '0Pv7swP1OlzL9bggzmML397mHdClHEXN5eiNyuCSDcxkpeRVB1AF4PDvSXVs', '2024-01-31 05:14:16', '2024-02-17 02:39:33', NULL, NULL);
INSERT INTO `users` VALUES (4, 1, '1', 'Miss Olga Green', 'Quis necessitatibus', 'Qui impedit', '2001-01-04', '749 Ruth LaneHuelshaven, DC 98430-2704', '0716325145', 'virginie98@stamm.com', '2024-02-18 07:48:19', '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 0, '1kqzCh4XNoe3fVKWJnIJzDn74caRkJVxa9h9LMdEUSivWYGicJrnBpwg0xt4', '2024-01-31 05:14:16', '2024-02-18 07:48:19', NULL, NULL);
INSERT INTO `users` VALUES (5, 1, '1', 'Norwood Kautzer', 'Repellendus ', 'Doloribus ', '2008-10-20', '53617 Larissa Center\nNorth Kevinton, LA 45310-3441', '(239) 478-2413', 'jhessel@schmitt.net', '2024-02-04 10:51:36', '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 0, 'Ly6a5j1cMEROazsWLZ2J2gpAXUjtUSJoJnCtZmA5a8TrcWl3GszcWzA6cdRF', '2024-01-31 05:14:16', '2024-02-04 10:51:36', NULL, NULL);
INSERT INTO `users` VALUES (6, 1, '1', 'Maximillian Swift Sr.', 'Dolor alias nesciunt', 'Repudiandae', '1986-03-05', '4494 Margaret Squares Suite 583Langmouth, WI 19122-8931', '+1.774.730.7420', 'keagan83@kautzer.biz', '2024-02-18 14:53:54', '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 0, 0, 'oGA4CB0GhGvMaS3gtNGudTVOpk9bOPtJWZi0tiCkJwNIFFE16fwWfKXm8CcS', '2024-01-31 05:14:16', '2024-02-18 14:53:54', NULL, NULL);
INSERT INTO `users` VALUES (8, 0, '1', 'John', 'Deo', 'Custom', '2024-02-06', '458 colombo 03', '0716251546', 'dhanush9984@gmail.com', NULL, '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 0, NULL, '2024-02-06 03:30:51', '2024-02-06 04:31:00', NULL, NULL);
INSERT INTO `users` VALUES (11, 0, '1', 'root', NULL, 'wenodan', '2010-01-03', '845 colombo 03', '0716251546', 'admin645@admin.com', NULL, '$2y$12$uTbdCsihPUEMb1YoRCiUI.QF.FSOp3ilakZdRISPh/0sH403tIlpC', 1, 0, NULL, '2024-02-15 10:30:33', '2024-02-15 10:30:33', NULL, NULL);
INSERT INTO `users` VALUES (12, 0, '1', 'John', 'deo', 'green', '2012-05-16', '451 colombo 03', '0716552145', 'john232@gmail.com', NULL, '$2y$10$xAuO7r1ek58/Gj/hiwYPCOy77h3GPS7SXVzABRPNlvDucNFFvn2pO', 1, 1, NULL, '2024-02-18 06:30:44', '2024-02-18 06:30:44', NULL, NULL);
INSERT INTO `users` VALUES (14, 0, '1', 'sdffds', 'dsfdsf', 'sdfdsfdsf', '2020-01-07', '445 colombo 03', '0716252514', 'qeue@gmail.com', NULL, '$2y$10$6KNeoamW1mGEAyhjzQG0Xe2Px.W1mB.JhgpHTv3RIqGR6PfyPWnfW', 1, 1, NULL, '2024-02-18 09:37:04', '2024-02-18 09:37:54', '2024-02-18 09:37:54', NULL);
INSERT INTO `users` VALUES (15, 0, '1', 'asen', 'tue', 'zoom', '2006-01-18', 'yoowk@gmail.com', '0716252145', 'eowk@gmail.com', NULL, '$2y$10$NsPVxzgr9v7tTd5n/Iw8Z./Lfxh8CRmkHKIlwTPgX5sd2WAGKjdWe', 1, 1, NULL, '2024-02-18 09:40:40', '2024-02-18 09:40:40', NULL, NULL);
INSERT INTO `users` VALUES (16, 1, '1', 'vindo', 'qeutum', 'amen', '2024-02-18', '454 colombo 03', '0716351245', 'admin845@admin.com', '2024-02-18 13:01:49', '$2y$10$xG9stuNTyEKqInkfPvmK5O7SLFhFaTmZjzHirOnrN6tr5JPQHghxS', 1, 1, NULL, '2024-02-18 11:48:28', '2024-02-18 13:01:49', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
