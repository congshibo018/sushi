/*
 Navicat Premium Data Transfer

 Source Server         : ass2
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost
 Source Database       : HefengSushi

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : utf-8

 Date: 01/24/2018 22:39:12 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `Dish`
-- ----------------------------
DROP TABLE IF EXISTS `Dish`;
CREATE TABLE `Dish` (
  `id` varchar(11) NOT NULL,
  `DishName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Price` double(10,1) NOT NULL,
  `Series` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `Dish`
-- ----------------------------
BEGIN;
INSERT INTO `Dish` VALUES ('1', 'Miso soup', '1.png', '2.0', 'HOT FOOD SERIES'), ('10', 'Scallop', '10.png', '6.0', 'COLD SERIES'), ('11', 'Salmon fillet', '11.png', '6.5', 'COLD SERIES'), ('11B', 'Vegetable salad', '11B.png', '15.0', 'COLD SERIES'), ('12', 'Salmon Sashimi assorted (6)', '12.png', '15.0', 'SASHIMI SERIES'), ('13', 'Arctic shellfish Sashimi assorted (12)', '13.png', '15.0', 'SASHIMI SERIES'), ('14', 'Antarctic shrimp sashimi assorted (6)', '14.png', '25.0', 'SASHIMI SERIES'), ('15', 'Salmon Arctic shellfish assorted (8 salmon; 12 arctic shells)', '15.png', '35.0', 'SASHIMI SERIES'), ('16', 'Salmon carnival', '16.png', '60.0', 'SASHIMI SERIES'), ('17', 'Salmon Flower Love', '17.png', '58.0', 'SASHIMI SERIES'), ('18', 'Classic single', '18.png', '25.0', 'SET MEAL'), ('19', 'Classic double', '19.png', '45.0', 'SET MEAL'), ('2', 'Takoyaki octopus', '2.png', '7.5', 'HOT FOOD SERIES'), ('20', 'Luxury double', '20.png', '53.0', 'SET MEAL'), ('21', 'Classic four people', '21.png', '65.0', 'SET MEAL'), ('22', 'Luxury four people', '22.png', '70.0', 'SET MEAL'), ('23', 'Salmon Peony Mochi', '23.png', '2.8', 'SEAFOOD PEONY MOCHI '), ('24', 'Arctic shell Peony Mochi', '24.png', '2.8', 'SEAFOOD PEONY MOCHI '), ('25', 'Scallop Peony Mochi', '25.png', '3.8', 'SEAFOOD PEONY MOCHI '), ('26', 'Crab Peony Mochi', '26.png', '3.8', 'SEAFOOD PEONY MOCHI '), ('27', 'Eel Peony Mochi', '27.png', '2.8', 'COOKED FOOD PEONY MOCHI '), ('28', 'Mango eel Peony Mochi', '28.png', '3.0', 'COOKED FOOD PEONY MOCHI '), ('29', 'Cooked crab Peony Mochi', '29.png', '2.8', 'COOKED FOOD PEONY MOCHI '), ('3', 'Japanese fried dumplings', '3.png', '7.5', 'HOT FOOD SERIES'), ('30', 'Cheese crab Peony Mochi', '30.png', '3.0', 'COOKED FOOD PEONY MOCHI '), ('31', 'Fresh shrimp Mayonnaise', '31.png', '2.8', 'COOKED FOOD PEONY MOCHI '), ('32', 'Cheese shrimp', '32.png', '3.0', 'COOKED FOOD PEONY MOCHI '), ('33', 'Steamed bun stuffed with sweetened bean paste', '33.png', '2.0', 'COOKED FOOD PEONY MOCHI '), ('34', 'Burning salmon', '34.png', '3.0', 'COOKED FOOD PEONY MOCHI '), ('35', 'Fried shrimp Peony Mochi', '35.png', '3.0', 'COOKED FOOD PEONY MOCHI '), ('36', 'Salmon rolls', '36.png', '3.5', 'THIN ROLL'), ('37', 'Tuna mud roll', '37.png', '3.5', 'THIN ROLL'), ('38', 'Crab roll', '38.png', '3.5', 'THIN ROLL'), ('39', 'Cucumber roll', '39.png', '3.5', 'THIN ROLL'), ('4', 'Dolphin', '4.png', '15.0', 'HOT FOOD SERIES'), ('40', 'Japanese roll', '40.png', '3.5', 'THIN ROLL'), ('41', 'Egg roll', '41.png', '3.5', 'THIN ROLL'), ('42', 'Round roll', '42.png', '4.0', 'SUSHI ROLL'), ('43', 'Eel roll', '43.png', '4.0', 'SUSHI ROLL'), ('44', 'Green eel roll', '44.png', '4.0', 'SUSHI ROLL'), ('45', 'Eel roll with cheese', '45.png', '4.0', 'SUSHI ROLL'), ('46', 'Burn salmon rolls', '46.png', '4.0', 'SUSHI ROLL'), ('47', 'Burn salmon cheese roll', '47.png', '4.0', 'SUSHI ROLL'), ('48', 'Tuna avocado roll', '48.png', '4.0', 'SUSHI ROLL'), ('49', 'Chicken roll', '49.png', '4.0', 'SUSHI ROLL'), ('5', 'Eel rice', '5.png', '28.0', 'HOT FOOD SERIES'), ('50', 'Crab warships', '50.png', '3.0', 'SUSHI WARSHIP BUN'), ('51', 'Seaweed warships', '51.png', '3.0', 'SUSHI WARSHIP BUN'), ('52', 'Tuna mud warships', '52.png', '3.0', 'SUSHI WARSHIP BUN'), ('53', 'Mustard octopus warship', '53.png', '3.0', 'SUSHI WARSHIP BUN'), ('54', 'Lobster salad warship', '54.png', '3.0', 'SUSHI WARSHIP BUN'), ('55', 'Scallop warships', '55.png', '3.0', 'SUSHI WARSHIP BUN'), ('56', 'Sesame mushroom warships', '56.png', '3.0', 'SUSHI WARSHIP BUN'), ('57', 'Ginger squid warships', '57.png', '3.0', 'SUSHI WARSHIP BUN'), ('58', 'Cucumber bun cucumber warship', '58.png', '3.5', 'SUSHI WARSHIP BUN'), ('59', 'Cucumber bun seaweed warship', '59.png', '3.5', 'SUSHI WARSHIP BUN'), ('6', 'Seaweed', '6.png', '4.5', 'COLD SERIES'), ('60', 'Cucumber bun tuna mud warship', '60.png', '3.5', 'SUSHI WARSHIP BUN'), ('61', 'Cucumber bun mustard octopus warship', '61.png', '3.5', 'SUSHI WARSHIP BUN'), ('62', 'Cucumber bun lobster salad warship', '62.png', '3.5', 'SUSHI WARSHIP BUN'), ('63', 'Cucumber bun scallop warship', '63.png', '3.5', 'SUSHI WARSHIP BUN'), ('64', 'Cucumber bun sesame oil mushroom warship', '64.png', '3.5', 'SUSHI WARSHIP BUN'), ('65', 'Cucumber bun ginger squid warship', '65.png', '3.5', 'SUSHI WARSHIP BUN'), ('67', 'Salmon bun crab warship', '67.png', '4.0', 'SUSHI WARSHIP BUN'), ('68', 'Salmon bun seaweed warship', '68.png', '4.0', 'SUSHI WARSHIP BUN'), ('69', 'Salmon bun tuna mud warship', '69.png', '4.0', 'SUSHI WARSHIP BUN'), ('7', 'Soybeans', '7.png', '4.5', 'COLD SERIES'), ('70', 'Salmon bun mustard octopus warship', '70.png', '4.0', 'SUSHI WARSHIP BUN'), ('71', 'Salmon bun lobster salad warship', '71.png', '4.0', 'SUSHI WARSHIP BUN'), ('72', 'Salmon bun scallop warship', '72.png', '4.0', 'SUSHI WARSHIP BUN'), ('73', 'Salmon bun sesame mushroom warship', '73.png', '4.0', 'SUSHI WARSHIP BUN'), ('74', 'Salmon bun ginger squid warship', '74.png', '4.0', 'SUSHI WARSHIP BUN'), ('8', 'Sesame oil mushrooms', '8.png', '6.0', 'COLD SERIES'), ('9', 'Ginger squid', '9.png', '6.0', 'COLD SERIES');
COMMIT;

-- ----------------------------
--  Table structure for `Orders`
-- ----------------------------
DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Detail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `DeliveryMethod` varchar(255) NOT NULL,
  `DeliveryTime` time NOT NULL,
  `Status` int(11) NOT NULL,
  `SuccessDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `Orders`
-- ----------------------------
BEGIN;
INSERT INTO `Orders` VALUES ('1', 'alec', '39 rhodes ', '414', 'fan', 'take', '00:00:00', '1', '2018-01-24 00:00:00'), ('41', 'alec', 'test', '123', '章鱼小丸子:2\n日式煎饺:2\n鳗鱼饭:1\n', 'delivery', '11:11:00', '1', '2018-01-25 00:00:00'), ('42', 'aha', 'aha', 'aha', '豚骨拉面:4\n', 'delivery', '11:11:00', '0', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
