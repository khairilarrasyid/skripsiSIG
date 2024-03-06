/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 80032 (8.0.32)
 Source Host           : localhost:3306
 Source Schema         : order_pariwisata

 Target Server Type    : MySQL
 Target Server Version : 80032 (8.0.32)
 File Encoding         : 65001

 Date: 23/02/2024 19:47:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (1, 'Penginapan', 'penginapan', '2024-02-15 15:08:12', NULL);
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (2, 'Camping', 'camping', '2024-02-15 15:08:12', NULL);
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (5, 'Budaya', 'budaya', '2024-02-10 10:32:44', '2024-02-10 10:32:44');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (6, 'Alam', 'alam', '2024-02-10 10:33:09', '2024-02-10 10:33:09');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (7, 'Cagar Alam', 'cagar-alam', '2024-02-10 10:57:09', '2024-02-10 10:57:09');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (8, 'Pertanian', 'pertanian', '2024-02-10 10:57:19', '2024-02-10 10:57:19');
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES (9, 'Petualangan', 'petualangan', '2024-02-10 10:57:43', '2024-02-10 10:57:43');
COMMIT;

-- ----------------------------
-- Table structure for destination_galleries
-- ----------------------------
DROP TABLE IF EXISTS `destination_galleries`;
CREATE TABLE `destination_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `destination_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `destination_galleries_destination_id_foreign` (`destination_id`),
  CONSTRAINT `destination_galleries_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of destination_galleries
-- ----------------------------
BEGIN;
INSERT INTO `destination_galleries` (`id`, `destination_id`, `image`, `created_at`, `updated_at`) VALUES (5, 3, 'M3wx9OgoccHxFpQSF8Ev9nz98PJXaLKeyivBTM1D.png', '2024-02-10 10:23:12', '2024-02-10 10:23:12');
INSERT INTO `destination_galleries` (`id`, `destination_id`, `image`, `created_at`, `updated_at`) VALUES (6, 3, 'M7yCLNGzolwStswQsDpLieoTPPXGKsgs2ykfHczC.png', '2024-02-10 10:25:36', '2024-02-10 10:25:36');
INSERT INTO `destination_galleries` (`id`, `destination_id`, `image`, `created_at`, `updated_at`) VALUES (7, 4, 'YFmVg6LHTYZyVmW0bQOE56Bw0XCn2Is0R2PZlz8U.png', '2024-02-10 11:02:19', '2024-02-10 11:02:19');
INSERT INTO `destination_galleries` (`id`, `destination_id`, `image`, `created_at`, `updated_at`) VALUES (8, 4, 'R0QGP43nAmavI6oK0pJdBChX4ePEymvIS3zavxi8.png', '2024-02-10 11:02:33', '2024-02-10 11:02:33');
INSERT INTO `destination_galleries` (`id`, `destination_id`, `image`, `created_at`, `updated_at`) VALUES (9, 5, '03xytvFqOBUKxCcp38CPpAQT4eJN1M8j6lbyFceJ.png', '2024-02-10 11:26:25', '2024-02-10 11:26:25');
INSERT INTO `destination_galleries` (`id`, `destination_id`, `image`, `created_at`, `updated_at`) VALUES (10, 5, '48f202uOGijrz8zVjobVL2pj61kId0YVaU4QEU8c.png', '2024-02-10 11:26:40', '2024-02-10 11:26:40');
COMMIT;

-- ----------------------------
-- Table structure for destinations
-- ----------------------------
DROP TABLE IF EXISTS `destinations`;
CREATE TABLE `destinations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `destinations_category_id_foreign` (`category_id`),
  KEY `destinations_user_id_foreign` (`user_id`),
  CONSTRAINT `destinations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `destinations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of destinations
-- ----------------------------
BEGIN;
INSERT INTO `destinations` (`id`, `name`, `category_id`, `user_id`, `description`, `address`, `latitude`, `longitude`, `image`, `opening_hours`, `ticket_price`, `created_at`, `updated_at`) VALUES (3, 'Riam Bidadari', 6, 1, '<h1>Lorem Ipsum</h1><h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4><h5>\"Tidak ada yang menyukai kepedihan, yang mencarinya dan ingin merasakannya, semata karena pedih rasanya...\"</h5><p><br></p><p class=\"ql-align-center\"><br></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at volutpat velit, ac lobortis quam. Donec commodo fringilla sapien, ac tristique nibh dictum a. Nullam ut risus varius, tempus orci in, gravida lacus. Ut pretium efficitur quam, nec tempor sem eleifend non. Phasellus efficitur libero eros, at mollis nibh finibus non. Maecenas leo nibh, dignissim sed consequat ac, vehicula nec felis. Fusce ac mollis eros, vitae mattis nulla.</p><p><br></p><p>Integer id vestibulum quam. Cras finibus ut quam a volutpat. Donec non commodo arcu. Vivamus lobortis commodo aliquet. Nullam mauris erat, pharetra vel tortor non, euismod varius est. Duis aliquet sed odio quis congue. Curabitur malesuada erat non nibh ultricies ultrices.</p><p><br></p><p>Nulla ornare, turpis id laoreet faucibus, augue est bibendum leo, vitae consequat enim lectus ac ex. Pellentesque quis ipsum justo. Sed in mauris sit amet augue ullamcorper tincidunt. Proin molestie dolor ac mauris interdum, sit amet euismod orci euismod. Morbi nec nunc vitae velit viverra feugiat quis ut nisl. Nullam ut turpis et tellus molestie accumsan. Vivamus auctor diam nibh, vel dapibus urna pellentesque ac. Integer scelerisque tellus interdum enim consequat, non elementum augue ullamcorper. Praesent semper risus sed odio euismod consequat. Nulla faucibus nisl et vulputate ullamcorper. Pellentesque fringilla finibus lectus, id condimentum tellus venenatis in. Sed tincidunt, lorem eget pulvinar sollicitudin, neque tellus accumsan metus, a tempor nulla sem vulputate risus. Phasellus mattis faucibus enim, vel accumsan eros auctor dignissim. Aenean vitae urna eleifend, varius neque sit amet, feugiat urna. Curabitur ultrices suscipit arcu, vulputate pulvinar urna aliquam ut. Nullam ultrices iaculis congue.</p><p><br></p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vel ante vitae purus semper efficitur id sit amet enim. In hac habitasse platea dictumst. Cras dignissim purus eu risus consectetur, elementum porta nulla condimentum. Nunc venenatis ex eu mi semper ornare. Fusce tortor est, consequat eget faucibus eu, blandit sit amet tortor. Maecenas eu efficitur risus. Aliquam euismod arcu ex, faucibus finibus risus blandit at. Donec quis commodo ligula. Aliquam ultrices ut sapien at volutpat. Curabitur nec tellus quis risus consectetur euismod ut ut odio. Morbi in fringilla felis. Etiam ac mauris vitae nunc mollis efficitur sit amet a nunc. Vestibulum non elit at urna blandit suscipit ac at dolor. Maecenas efficitur fringilla volutpat. Nullam lacinia rutrum hendrerit.</p>', 'Jl. Lumbang-Randu desa No.RT.09, Lumbang, Kec. Muara Uya', '-1.8857372', '114.977573', 'CfE8nV3L8FqF7EAGqcWXZqH2EZ1IzXm2e1BWr0e8.png', '10:00 - 20:00', 20000, '2024-02-10 10:15:34', '2024-02-10 10:42:11');
INSERT INTO `destinations` (`id`, `name`, `category_id`, `user_id`, `description`, `address`, `latitude`, `longitude`, `image`, `opening_hours`, `ticket_price`, `created_at`, `updated_at`) VALUES (4, 'Bukit Mambanin Marindi', 9, 1, '<h1>Lorem Ipsum</h1><h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4><h5>\"Tidak ada yang menyukai kepedihan, yang mencarinya dan ingin merasakannya, semata karena pedih rasanya...\"</h5><p class=\"ql-align-center\"><br></p><p class=\"ql-align-center\"><br></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at volutpat velit, ac lobortis quam. Donec commodo fringilla sapien, ac tristique nibh dictum a. Nullam ut risus varius, tempus orci in, gravida lacus. Ut pretium efficitur quam, nec tempor sem eleifend non. Phasellus efficitur libero eros, at mollis nibh finibus non. Maecenas leo nibh, dignissim sed consequat ac, vehicula nec felis. Fusce ac mollis eros, vitae mattis nulla.</p><p>Integer id vestibulum quam. Cras finibus ut quam a volutpat. Donec non commodo arcu. Vivamus lobortis commodo aliquet. Nullam mauris erat, pharetra vel tortor non, euismod varius est. Duis aliquet sed odio quis congue. Curabitur malesuada erat non nibh ultricies ultrices.</p><p>Nulla ornare, turpis id laoreet faucibus, augue est bibendum leo, vitae consequat enim lectus ac ex. Pellentesque quis ipsum justo. Sed in mauris sit amet augue ullamcorper tincidunt. Proin molestie dolor ac mauris interdum, sit amet euismod orci euismod. Morbi nec nunc vitae velit viverra feugiat quis ut nisl. Nullam ut turpis et tellus molestie accumsan. Vivamus auctor diam nibh, vel dapibus urna pellentesque ac. Integer scelerisque tellus interdum enim consequat, non elementum augue ullamcorper. Praesent semper risus sed odio euismod consequat. Nulla faucibus nisl et vulputate ullamcorper. Pellentesque fringilla finibus lectus, id condimentum tellus venenatis in. Sed tincidunt, lorem eget pulvinar sollicitudin, neque tellus accumsan metus, a tempor nulla sem vulputate risus. Phasellus mattis faucibus enim, vel accumsan eros auctor dignissim. Aenean vitae urna eleifend, varius neque sit amet, feugiat urna. Curabitur ultrices suscipit arcu, vulputate pulvinar urna aliquam ut. Nullam ultrices iaculis congue.</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vel ante vitae purus semper efficitur id sit amet enim. In hac habitasse platea dictumst. Cras dignissim purus eu risus consectetur, elementum porta nulla condimentum. Nunc venenatis ex eu mi semper ornare. Fusce tortor est, consequat eget faucibus eu, blandit sit amet tortor. Maecenas eu efficitur risus. Aliquam euismod arcu ex, faucibus finibus risus blandit at. Donec quis commodo ligula. Aliquam ultrices ut sapien at volutpat. Curabitur nec tellus quis risus consectetur euismod ut ut odio. Morbi in fringilla felis. Etiam ac mauris vitae nunc mollis efficitur sit amet a nunc. Vestibulum non elit at urna blandit suscipit ac at dolor. Maecenas efficitur fringilla volutpat. Nullam lacinia rutrum hendrerit.</p>', 'Marindi, Kec. Haruai', '-2.0021313', '114.9712147', 'XFyyfuP4Ik7SbQx3AdO6ncwfCvLynGExRJvZWKSD.png', NULL, 0, '2024-02-10 11:02:02', '2024-02-10 11:02:02');
INSERT INTO `destinations` (`id`, `name`, `category_id`, `user_id`, `description`, `address`, `latitude`, `longitude`, `image`, `opening_hours`, `ticket_price`, `created_at`, `updated_at`) VALUES (5, 'Camping Outdoor(Ekowisata) Tampirak Desa Santu\'un', 9, 1, '<h1>Lorem Ipsum</h1><h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4><h5>\"Tidak ada yang menyukai kepedihan, yang mencarinya dan ingin merasakannya, semata karena pedih rasanya...\"</h5><p class=\"ql-align-center\"><br></p><p class=\"ql-align-center\"><br></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at volutpat velit, ac lobortis quam. Donec commodo fringilla sapien, ac tristique nibh dictum a. Nullam ut risus varius, tempus orci in, gravida lacus. Ut pretium efficitur quam, nec tempor sem eleifend non. Phasellus efficitur libero eros, at mollis nibh finibus non. Maecenas leo nibh, dignissim sed consequat ac, vehicula nec felis. Fusce ac mollis eros, vitae mattis nulla.</p><p>Integer id vestibulum quam. Cras finibus ut quam a volutpat. Donec non commodo arcu. Vivamus lobortis commodo aliquet. Nullam mauris erat, pharetra vel tortor non, euismod varius est. Duis aliquet sed odio quis congue. Curabitur malesuada erat non nibh ultricies ultrices.</p><p>Nulla ornare, turpis id laoreet faucibus, augue est bibendum leo, vitae consequat enim lectus ac ex. Pellentesque quis ipsum justo. Sed in mauris sit amet augue ullamcorper tincidunt. Proin molestie dolor ac mauris interdum, sit amet euismod orci euismod. Morbi nec nunc vitae velit viverra feugiat quis ut nisl. Nullam ut turpis et tellus molestie accumsan. Vivamus auctor diam nibh, vel dapibus urna pellentesque ac. Integer scelerisque tellus interdum enim consequat, non elementum augue ullamcorper. Praesent semper risus sed odio euismod consequat. Nulla faucibus nisl et vulputate ullamcorper. Pellentesque fringilla finibus lectus, id condimentum tellus venenatis in. Sed tincidunt, lorem eget pulvinar sollicitudin, neque tellus accumsan metus, a tempor nulla sem vulputate risus. Phasellus mattis faucibus enim, vel accumsan eros auctor dignissim. Aenean vitae urna eleifend, varius neque sit amet, feugiat urna. Curabitur ultrices suscipit arcu, vulputate pulvinar urna aliquam ut. Nullam ultrices iaculis congue.</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vel ante vitae purus semper efficitur id sit amet enim. In hac habitasse platea dictumst. Cras dignissim purus eu risus consectetur, elementum porta nulla condimentum. Nunc venenatis ex eu mi semper ornare. Fusce tortor est, consequat eget faucibus eu, blandit sit amet tortor. Maecenas eu efficitur risus. Aliquam euismod arcu ex, faucibus finibus risus blandit at. Donec quis commodo ligula. Aliquam ultrices ut sapien at volutpat. Curabitur nec tellus quis risus consectetur euismod ut ut odio. Morbi in fringilla felis. Etiam ac mauris vitae nunc mollis efficitur sit amet a nunc. Vestibulum non elit at urna blandit suscipit ac at dolor. Maecenas efficitur fringilla volutpat. Nullam lacinia rutrum hendrerit.</p>', 'Tampirak, Santuun, Kec. Muara Uya', '-1.8337762', '114.9480902', 'nvaXZLhv1hCe6UxryS4fuYjVbBBOhlA56dWrxprB.png', '07:00 - 23:00', 100000, '2024-02-10 11:18:51', '2024-02-10 11:18:51');
INSERT INTO `destinations` (`id`, `name`, `category_id`, `user_id`, `description`, `address`, `latitude`, `longitude`, `image`, `opening_hours`, `ticket_price`, `created_at`, `updated_at`) VALUES (6, 'Wisata Air Terjun Desa', 6, 1, '<h1>Lorem Ipsum</h1><h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4><h5>\"Tidak ada yang menyukai kepedihan, yang mencarinya dan ingin merasakannya, semata karena pedih rasanya...\"</h5><p class=\"ql-align-center\"><br></p><p class=\"ql-align-center\"><br></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at volutpat velit, ac lobortis quam. Donec commodo fringilla sapien, ac tristique nibh dictum a. Nullam ut risus varius, tempus orci in, gravida lacus. Ut pretium efficitur quam, nec tempor sem eleifend non. Phasellus efficitur libero eros, at mollis nibh finibus non. Maecenas leo nibh, dignissim sed consequat ac, vehicula nec felis. Fusce ac mollis eros, vitae mattis nulla.</p><p>Integer id vestibulum quam. Cras finibus ut quam a volutpat. Donec non commodo arcu. Vivamus lobortis commodo aliquet. Nullam mauris erat, pharetra vel tortor non, euismod varius est. Duis aliquet sed odio quis congue. Curabitur malesuada erat non nibh ultricies ultrices.</p><p>Nulla ornare, turpis id laoreet faucibus, augue est bibendum leo, vitae consequat enim lectus ac ex. Pellentesque quis ipsum justo. Sed in mauris sit amet augue ullamcorper tincidunt. Proin molestie dolor ac mauris interdum, sit amet euismod orci euismod. Morbi nec nunc vitae velit viverra feugiat quis ut nisl. Nullam ut turpis et tellus molestie accumsan. Vivamus auctor diam nibh, vel dapibus urna pellentesque ac. Integer scelerisque tellus interdum enim consequat, non elementum augue ullamcorper. Praesent semper risus sed odio euismod consequat. Nulla faucibus nisl et vulputate ullamcorper. Pellentesque fringilla finibus lectus, id condimentum tellus venenatis in. Sed tincidunt, lorem eget pulvinar sollicitudin, neque tellus accumsan metus, a tempor nulla sem vulputate risus. Phasellus mattis faucibus enim, vel accumsan eros auctor dignissim. Aenean vitae urna eleifend, varius neque sit amet, feugiat urna. Curabitur ultrices suscipit arcu, vulputate pulvinar urna aliquam ut. Nullam ultrices iaculis congue.</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vel ante vitae purus semper efficitur id sit amet enim. In hac habitasse platea dictumst. Cras dignissim purus eu risus consectetur, elementum porta nulla condimentum. Nunc venenatis ex eu mi semper ornare. Fusce tortor est, consequat eget faucibus eu, blandit sit amet tortor. Maecenas eu efficitur risus. Aliquam euismod arcu ex, faucibus finibus risus blandit at. Donec quis commodo ligula. Aliquam ultrices ut sapien at volutpat. Curabitur nec tellus quis risus consectetur euismod ut ut odio. Morbi in fringilla felis. Etiam ac mauris vitae nunc mollis efficitur sit amet a nunc. Vestibulum non elit at urna blandit suscipit ac at dolor. Maecenas efficitur fringilla volutpat. Nullam lacinia rutrum hendrerit.</p>', 'Lano, Kec. Jaro', '-1.7283355', '115.0207337', 'xa8UAO3C2zZ9NqHjCoYTphBCjjHDwsZyvECyrQRf.png', '07:00 - 20:00', 25000, '2024-02-10 11:23:13', '2024-02-10 11:23:13');
INSERT INTO `destinations` (`id`, `name`, `category_id`, `user_id`, `description`, `address`, `latitude`, `longitude`, `image`, `opening_hours`, `ticket_price`, `created_at`, `updated_at`) VALUES (7, 'Wisata Riam Kinarum', 7, 1, '<h1>Lorem Ipsum</h1><h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4><h5>\"Tidak ada yang menyukai kepedihan, yang mencarinya dan ingin merasakannya, semata karena pedih rasanya...\"</h5><p class=\"ql-align-center\"><br></p><p><br></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at volutpat velit, ac lobortis quam. Donec commodo fringilla sapien, ac tristique nibh dictum a. Nullam ut risus varius, tempus orci in, gravida lacus. Ut pretium efficitur quam, nec tempor sem eleifend non. Phasellus efficitur libero eros, at mollis nibh finibus non. Maecenas leo nibh, dignissim sed consequat ac, vehicula nec felis. Fusce ac mollis eros, vitae mattis nulla.</p><p>Integer id vestibulum quam. Cras finibus ut quam a volutpat. Donec non commodo arcu. Vivamus lobortis commodo aliquet. Nullam mauris erat, pharetra vel tortor non, euismod varius est. Duis aliquet sed odio quis congue. Curabitur malesuada erat non nibh ultricies ultrices.</p><p>Nulla ornare, turpis id laoreet faucibus, augue est bibendum leo, vitae consequat enim lectus ac ex. Pellentesque quis ipsum justo. Sed in mauris sit amet augue ullamcorper tincidunt. Proin molestie dolor ac mauris interdum, sit amet euismod orci euismod. Morbi nec nunc vitae velit viverra feugiat quis ut nisl. Nullam ut turpis et tellus molestie accumsan. Vivamus auctor diam nibh, vel dapibus urna pellentesque ac. Integer scelerisque tellus interdum enim consequat, non elementum augue ullamcorper. Praesent semper risus sed odio euismod consequat. Nulla faucibus nisl et vulputate ullamcorper. Pellentesque fringilla finibus lectus, id condimentum tellus venenatis in. Sed tincidunt, lorem eget pulvinar sollicitudin, neque tellus accumsan metus, a tempor nulla sem vulputate risus. Phasellus mattis faucibus enim, vel accumsan eros auctor dignissim. Aenean vitae urna eleifend, varius neque sit amet, feugiat urna. Curabitur ultrices suscipit arcu, vulputate pulvinar urna aliquam ut. Nullam ultrices iaculis congue.</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum vel ante vitae purus semper efficitur id sit amet enim. In hac habitasse platea dictumst. Cras dignissim purus eu risus consectetur, elementum porta nulla condimentum. Nunc venenatis ex eu mi semper ornare. Fusce tortor est, consequat eget faucibus eu, blandit sit amet tortor. Maecenas eu efficitur risus. Aliquam euismod arcu ex, faucibus finibus risus blandit at. Donec quis commodo ligula. Aliquam ultrices ut sapien at volutpat. Curabitur nec tellus quis risus consectetur euismod ut ut odio. Morbi in fringilla felis. Etiam ac mauris vitae nunc mollis efficitur sit amet a nunc. Vestibulum non elit at urna blandit suscipit ac at dolor. Maecenas efficitur fringilla volutpat. Nullam lacinia rutrum hendrerit.</p>', 'jl, Kinarum, Kec. Upau', '-1.7283355', '115.0207337', 'oFjwAfW0JQw8Llrvwbd8l19mzqlvPDR02UllMcIG.png', '02:00 - 20:00', 40000, '2024-02-10 11:30:03', '2024-02-10 11:30:03');
INSERT INTO `destinations` (`id`, `name`, `category_id`, `user_id`, `description`, `address`, `latitude`, `longitude`, `image`, `opening_hours`, `ticket_price`, `created_at`, `updated_at`) VALUES (9, 'Hotel ashofa syariah tabalong', 1, 1, '<p>Test</p>', 'Jl. A. Yani, Maburai, Kec. Murung Pudak', '-2.1910963', '115.4243152', 'VLAtvGCtQOk0EF83iWax8aamWyenqLFQjgeyaJru.png', '02:00 - 08:00', 240000, '2024-02-15 15:46:41', '2024-02-15 15:46:41');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2024_02_05_075746_create_categories_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2024_02_05_075808_create_destinations_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2024_02_05_075817_create_destination_galleries_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2024_02_07_132156_change_description_coloum_type', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12, '2024_02_07_132622_change_coloum_destinations_nullable', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2024_02_16_110650_create_tour_guides_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14, '2024_02_16_145423_change_description_to_text', 5);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tour_guides
-- ----------------------------
DROP TABLE IF EXISTS `tour_guides`;
CREATE TABLE `tour_guides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_guides_user_id_foreign` (`user_id`),
  CONSTRAINT `tour_guides_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tour_guides
-- ----------------------------
BEGIN;
INSERT INTO `tour_guides` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `description`, `foto`, `created_at`, `updated_at`) VALUES (2, 1, 'Asmaradhana Borobudur Tours', 'test@gmail.com', '0839438943894', 'Argo Mulyo', '<p>We are a group of creative people who don’t like to serve same things. We always create or add something new, even in to regular conventional event &amp; incentive programs to make everything easy and special for our guests. </p><ul><li>Students price, 5 stars services.  </li><li>Professional and friendly drivers</li><li>Serve tickets, hotels and tour packages</li><li>Our team local people at Yogyakarta</li></ul><p><br></p>', 'qDYSBQLMnwF4XVtWzpEBN6lPAKrXU2AFNCXarFcT.png', '2024-02-16 15:04:15', '2024-02-16 15:04:15');
INSERT INTO `tour_guides` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `description`, `foto`, `created_at`, `updated_at`) VALUES (3, 1, 'Borobudursunrise.com', 'test@gmail.com', '088878787887', 'Test', '<p>Borobudur Prambanan Tour adalah perusahaan perjalanan di Kota Yogyakartta. Kami memiliki pengalaman di bidang ini selama lebih dari 2 tahun. Visi kami adalah membuat semua orang yang bepergian di Yogyakarta merasa nyaman.</p>', 'ircSO1QDnd6opjUxIJt6vFCwr2vO4gvhwKsSClzd.png', '2024-02-16 15:12:20', '2024-02-16 15:12:20');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$LP7UirKdJT47hjODnZz.FuoJK0lk7P0U08Cyxuxiabhoy0.FoICby', NULL, NULL, '2024-02-09 14:19:44');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
