/*
Navicat MySQL Data Transfer

Source Server         : ap-cdbr-azure-southeast-a.cloudapp.net
Source Server Version : 50545
Source Host           : ap-cdbr-azure-southeast-a.cloudapp.net:3306
Source Database       : imcddbmysqldatabase

Target Server Type    : MYSQL
Target Server Version : 50545
File Encoding         : 65001

Date: 2017-04-17 13:56:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cad_article`
-- ----------------------------
DROP TABLE IF EXISTS `cad_article`;
CREATE TABLE `cad_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_article
-- ----------------------------
INSERT INTO `cad_article` VALUES ('1', 'Colour A Dream', '<p>IMCD Proudly presents you a new CAD Portal to enhance to work of the CAD Stakeholders. This Increases the efficiency and the transparency of the transactions in the Colour A Dream project.</p><p>Visit : <a href=\"http://imcd.azurewebsites.com\" target=\"_blank\">imcd.azurewebsites.com</a></p>', '2015-09-12 07:08:38', '1');

-- ----------------------------
-- Table structure for `cad_backups`
-- ----------------------------
DROP TABLE IF EXISTS `cad_backups`;
CREATE TABLE `cad_backups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_backups
-- ----------------------------
INSERT INTO `cad_backups` VALUES ('19', 'Init.sql', '2015-08-30 13:44:32');
INSERT INTO `cad_backups` VALUES ('22', '2015-09-12T08:57:23+05:30.sql', '2015-09-12 03:27:23');
INSERT INTO `cad_backups` VALUES ('32', 'Test.sql', '2015-09-12 03:27:36');
INSERT INTO `cad_backups` VALUES ('41', '2016-10-06T09:35:40+05:30.sql', '2016-10-06 04:05:40');

-- ----------------------------
-- Table structure for `cad_cadteam`
-- ----------------------------
DROP TABLE IF EXISTS `cad_cadteam`;
CREATE TABLE `cad_cadteam` (
  `id` int(11) NOT NULL,
  `position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `cad_team_user` FOREIGN KEY (`id`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_cadteam
-- ----------------------------
INSERT INTO `cad_cadteam` VALUES ('16', 'Team Member');

-- ----------------------------
-- Table structure for `cad_class`
-- ----------------------------
DROP TABLE IF EXISTS `cad_class`;
CREATE TABLE `cad_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(15) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_class
-- ----------------------------
INSERT INTO `cad_class` VALUES ('7', 'Grade 08', '0');
INSERT INTO `cad_class` VALUES ('8', 'Grade 06', '0');
INSERT INTO `cad_class` VALUES ('9', 'Grade 07', '0');
INSERT INTO `cad_class` VALUES ('10', 'Grade 10', '0');
INSERT INTO `cad_class` VALUES ('11', 'Grade 09', '0');
INSERT INTO `cad_class` VALUES ('12', 'Grade 11', '0');

-- ----------------------------
-- Table structure for `cad_class_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `cad_class_subjects`;
CREATE TABLE `cad_class_subjects` (
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`,`subject_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `class_subjects_class` FOREIGN KEY (`class_id`) REFERENCES `cad_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `class_subjects_subject` FOREIGN KEY (`subject_id`) REFERENCES `cad_subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_class_subjects
-- ----------------------------
INSERT INTO `cad_class_subjects` VALUES ('7', '7');
INSERT INTO `cad_class_subjects` VALUES ('8', '7');
INSERT INTO `cad_class_subjects` VALUES ('10', '7');
INSERT INTO `cad_class_subjects` VALUES ('7', '8');
INSERT INTO `cad_class_subjects` VALUES ('8', '8');
INSERT INTO `cad_class_subjects` VALUES ('10', '8');
INSERT INTO `cad_class_subjects` VALUES ('8', '9');
INSERT INTO `cad_class_subjects` VALUES ('7', '10');
INSERT INTO `cad_class_subjects` VALUES ('8', '10');
INSERT INTO `cad_class_subjects` VALUES ('10', '10');
INSERT INTO `cad_class_subjects` VALUES ('7', '11');
INSERT INTO `cad_class_subjects` VALUES ('8', '13');
INSERT INTO `cad_class_subjects` VALUES ('10', '14');
INSERT INTO `cad_class_subjects` VALUES ('10', '16');

-- ----------------------------
-- Table structure for `cad_donor`
-- ----------------------------
DROP TABLE IF EXISTS `cad_donor`;
CREATE TABLE `cad_donor` (
  `id` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `address_1` varchar(25) NOT NULL,
  `address_2` varchar(25) DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `country` varchar(20) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  CONSTRAINT `donor_user` FOREIGN KEY (`id`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_donor
-- ----------------------------
INSERT INTO `cad_donor` VALUES ('15', null, 'Waththegedara', 'Kohilegedara', 'Kurunegala', 'Sri Lanka', '1');
INSERT INTO `cad_donor` VALUES ('19', null, 'No. 201/2', 'Daham Mw,', 'Colombo 09', 'Sri Lanka', '1');
INSERT INTO `cad_donor` VALUES ('20', null, 'Line 1', 'Line 2', 'City', 'Sri Lanka', '0');

-- ----------------------------
-- Table structure for `cad_funds`
-- ----------------------------
DROP TABLE IF EXISTS `cad_funds`;
CREATE TABLE `cad_funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donor` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` tinytext,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_no` varchar(50) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `transferred` tinyint(4) DEFAULT '0',
  `transfer_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donor` (`donor`),
  CONSTRAINT `funds_donor` FOREIGN KEY (`donor`) REFERENCES `cad_donor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_funds
-- ----------------------------
INSERT INTO `cad_funds` VALUES ('1', '15', '1000', 'For the month July', '2015-09-08 07:10:46', '390299202900280', '1', '1', '2015-09-12 07:29:40');
INSERT INTO `cad_funds` VALUES ('2', '15', '2000', 'For the months August & Sept.', '2015-09-11 07:11:20', '4830282928209', '1', '0', null);
INSERT INTO `cad_funds` VALUES ('11', '15', '2000', 'abc', '2016-01-25 16:28:22', '448609343', '0', '0', null);

-- ----------------------------
-- Table structure for `cad_message`
-- ----------------------------
DROP TABLE IF EXISTS `cad_message`;
CREATE TABLE `cad_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`),
  CONSTRAINT `message_from_user` FOREIGN KEY (`from`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_to_user` FOREIGN KEY (`to`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_message
-- ----------------------------
INSERT INTO `cad_message` VALUES ('1', '17', '1', 'First Message', '<h3><span style=\"text-decoration: underline;\">Welcome You to the Colour A Dream Web Portal.</span></h3><div>The Colour A Dream Web Portal is a web based platform to make ease the work of Colour A Dream project. This Portal interconnects the Donors, Students, CAD Team members at a single place in the web.</div><div><br></div><div>Please visit : <a href=\"http://imcd.azurewebsites.com\" target=\"_blank\">imcd.azurewebsites.com</a></div><div><br></div><div>Thank You,</div><div>Admin</div>', '2015-09-12 06:56:04', '1');
INSERT INTO `cad_message` VALUES ('3', '16', '1', 'First Message', '<h3><span style=\"text-decoration: underline;\">Welcome You to the Colour A Dream Web Portal.</span></h3><div>The Colour A Dream Web Portal is a web based platform to make ease the work of Colour A Dream project. This Portal interconnects the Donors, Students, CAD Team members at a single place in the web.</div><div><br></div><div>Please visit : <a href=\"http://imcd.azurewebsites.com\" target=\"_blank\">imcd.azurewebsites.com</a></div><div><br></div><div>Thank You,</div><div>Admin</div>', '2015-09-12 06:57:22', '1');
INSERT INTO `cad_message` VALUES ('11', '1', '1', 'test message', 'Hi from CAD', '2015-09-12 04:09:58', '1');

-- ----------------------------
-- Table structure for `cad_receipt`
-- ----------------------------
DROP TABLE IF EXISTS `cad_receipt`;
CREATE TABLE `cad_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_type` varchar(15) NOT NULL,
  `receiver` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receiver` (`receiver`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `receiver_FK` FOREIGN KEY (`receiver`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `cad_funds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_receipt
-- ----------------------------
INSERT INTO `cad_receipt` VALUES ('1', 'Fund', '15', '1', '2015-09-12 07:22:16', '1000');
INSERT INTO `cad_receipt` VALUES ('11', 'Fund', '15', '2', '2016-01-25 16:32:55', '2000');

-- ----------------------------
-- Table structure for `cad_school`
-- ----------------------------
DROP TABLE IF EXISTS `cad_school`;
CREATE TABLE `cad_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address_1` varchar(25) NOT NULL,
  `address_2` varchar(25) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `principal` varchar(25) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_school
-- ----------------------------
INSERT INTO `cad_school` VALUES ('6', 'A/Sri Jinarathana M.V', 'Yaaya 2,', 'Dehigama Rd', 'Mihinthalaya', 'Mr. R Ranbanda', '0259933932', '0');
INSERT INTO `cad_school` VALUES ('7', 'A/ Niwanthaka Chethiya M.V', 'Dharmapala Mw', '', 'Anuradhapura', 'Mr. K.A Jayalath', '0252293882', '0');

-- ----------------------------
-- Table structure for `cad_student`
-- ----------------------------
DROP TABLE IF EXISTS `cad_student`;
CREATE TABLE `cad_student` (
  `id` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `address_1` varchar(25) NOT NULL,
  `address_2` varchar(25) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assigned_teacher` varchar(50) DEFAULT NULL,
  `teacher_contact` varchar(20) DEFAULT NULL,
  `donor` int(11) DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `class_id` (`class_id`),
  KEY `school_id_2` (`school_id`),
  KEY `class_id_2` (`class_id`),
  KEY `school_id_3` (`school_id`),
  KEY `class_id_3` (`class_id`),
  CONSTRAINT `student_class` FOREIGN KEY (`class_id`) REFERENCES `cad_class` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `student_school` FOREIGN KEY (`school_id`) REFERENCES `cad_school` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `student_user` FOREIGN KEY (`id`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_student
-- ----------------------------
INSERT INTO `cad_student` VALUES ('17', '0000-00-00', 'Ihala Rd', 'Pothana', 'Anuradhapura', '6', '7', 'Mr. G.L Kumarihamy', '07249494932', '15', '1');
INSERT INTO `cad_student` VALUES ('18', '0000-00-00', 'Pahalagama', 'Yaaya 8', 'Pothana', '7', '10', 'Mrs. Sriyani Herath', '0724939330', '19', '1');

-- ----------------------------
-- Table structure for `cad_student_marks`
-- ----------------------------
DROP TABLE IF EXISTS `cad_student_marks`;
CREATE TABLE `cad_student_marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stc_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stc_id_2` (`stc_id`,`subject_id`),
  KEY `stc_id` (`stc_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `stc_id_FK` FOREIGN KEY (`stc_id`) REFERENCES `cad_student_test_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subject_id_FK` FOREIGN KEY (`subject_id`) REFERENCES `cad_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_student_marks
-- ----------------------------
INSERT INTO `cad_student_marks` VALUES ('1', '1', '7', '89');
INSERT INTO `cad_student_marks` VALUES ('2', '1', '8', '75');
INSERT INTO `cad_student_marks` VALUES ('3', '1', '10', '92');
INSERT INTO `cad_student_marks` VALUES ('4', '1', '11', '77');
INSERT INTO `cad_student_marks` VALUES ('6', '5', '7', '60');
INSERT INTO `cad_student_marks` VALUES ('7', '5', '8', '50');
INSERT INTO `cad_student_marks` VALUES ('8', '5', '10', '90');
INSERT INTO `cad_student_marks` VALUES ('9', '5', '11', '63');

-- ----------------------------
-- Table structure for `cad_student_test_class`
-- ----------------------------
DROP TABLE IF EXISTS `cad_student_test_class`;
CREATE TABLE `cad_student_test_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `test_id` (`test_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `class_id_FK` FOREIGN KEY (`class_id`) REFERENCES `cad_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_id_FK` FOREIGN KEY (`student_id`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `test_id_FK` FOREIGN KEY (`test_id`) REFERENCES `cad_test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='AKA: Examination';

-- ----------------------------
-- Records of cad_student_test_class
-- ----------------------------
INSERT INTO `cad_student_test_class` VALUES ('1', '17', '1', '7');
INSERT INTO `cad_student_test_class` VALUES ('5', '17', '2', '7');
INSERT INTO `cad_student_test_class` VALUES ('11', '17', '1', '7');

-- ----------------------------
-- Table structure for `cad_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `cad_subjects`;
CREATE TABLE `cad_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(20) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_subjects
-- ----------------------------
INSERT INTO `cad_subjects` VALUES ('7', 'Sinhala', '0');
INSERT INTO `cad_subjects` VALUES ('8', 'English', '0');
INSERT INTO `cad_subjects` VALUES ('9', 'Tamil', '0');
INSERT INTO `cad_subjects` VALUES ('10', 'Mathematics', '0');
INSERT INTO `cad_subjects` VALUES ('11', 'Science', '0');
INSERT INTO `cad_subjects` VALUES ('12', 'History', '0');
INSERT INTO `cad_subjects` VALUES ('13', 'Aesthetic', '0');
INSERT INTO `cad_subjects` VALUES ('14', 'Optional Subject 1', '0');
INSERT INTO `cad_subjects` VALUES ('15', 'Optional 2', '1');
INSERT INTO `cad_subjects` VALUES ('16', 'Optional Subject 2', '0');

-- ----------------------------
-- Table structure for `cad_test`
-- ----------------------------
DROP TABLE IF EXISTS `cad_test`;
CREATE TABLE `cad_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_test
-- ----------------------------
INSERT INTO `cad_test` VALUES ('1', '2015', '1', '3');
INSERT INTO `cad_test` VALUES ('2', '2014', '1', '1');

-- ----------------------------
-- Table structure for `cad_user`
-- ----------------------------
DROP TABLE IF EXISTS `cad_user`;
CREATE TABLE `cad_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `user_type` varchar(45) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `profile_pic` varchar(20) DEFAULT 'default.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cad_user
-- ----------------------------
INSERT INTO `cad_user` VALUES ('1', 'Thejan', 'Rajapakshe', 'admin', 'thejan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'coder.clix@gmail.com', '071583423', 'admin', '0', '1.jpg');
INSERT INTO `cad_user` VALUES ('15', 'Donor', 'Rajapakshe', null, 'donor@cad.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'donor@cad.com', '01889930993', 'donor', '0', '15.png');
INSERT INTO `cad_user` VALUES ('16', 'Thejan', 'CAD', 'Team Member', 'cad@cad.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'cad@cad.com', '0713939223', 'cad', '0', '16.jpg');
INSERT INTO `cad_user` VALUES ('17', 'Supun', 'Herath', null, 'student@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sherath@gmail.com', '0713939331', 'student', '0', '17.jpg');
INSERT INTO `cad_user` VALUES ('18', 'Samith', 'Dayananda', null, 'samith@cad.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'samith@cad.com', '0713939332', 'student', '0', 'default.png');
INSERT INTO `cad_user` VALUES ('19', 'Stanly', 'Senaviratne', null, 'stanly_sen@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'stanly_sen@gmail.com', '0777393939', 'donor', '0', 'default.png');
INSERT INTO `cad_user` VALUES ('20', 'Donor', 'Register', null, 'donor_register@cad.c', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'donor_register@cad.com', '0718838888', 'donor', '0', 'default.png');
