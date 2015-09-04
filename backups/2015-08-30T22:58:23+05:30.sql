#
# TABLE STRUCTURE FOR: cad_article
#

DROP TABLE IF EXISTS cad_article;

CREATE TABLE `cad_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO cad_article (`id`, `title`, `body`, `timestamp`, `published`) VALUES (1, 'Tjejan', '<p>dfgkdj f;gsdf </p><p>gdsf<span style=\"font-weight: bold;\"> gdsf gfd gdfg dfg dsfg </span></p>', '2015-08-29 22:31:49', 0);
INSERT INTO cad_article (`id`, `title`, `body`, `timestamp`, `published`) VALUES (2, 'IMCD Familiy', '<span style=\"font-weight: bold;\">IMCD Family</span> <div>sdfsfsdjf sdf dsf<span style=\"font-style: italic;\"> sdf dsfsdf dsf sdf<span style=\"text-decoration: underline;\"> dsf sdf sdf sd</span></span><span style=\"text-decoration: underline;\"> adf sadf </span>dsf </div>', '2015-08-29 23:00:11', 1);


#
# TABLE STRUCTURE FOR: cad_backups
#

DROP TABLE IF EXISTS cad_backups;

CREATE TABLE `cad_backups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO cad_backups (`id`, `filename`, `created_at`) VALUES (19, 'Init.sql', '2015-08-30 13:44:32');


#
# TABLE STRUCTURE FOR: cad_cadteam
#

DROP TABLE IF EXISTS cad_cadteam;

CREATE TABLE `cad_cadteam` (
  `id` int(11) NOT NULL,
  `position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `cad_team_user` FOREIGN KEY (`id`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cad_cadteam (`id`, `position`) VALUES (2, 'Team Member');
INSERT INTO cad_cadteam (`id`, `position`) VALUES (3, 'Project Coordinator');
INSERT INTO cad_cadteam (`id`, `position`) VALUES (4, 'Team Member');
INSERT INTO cad_cadteam (`id`, `position`) VALUES (9, 'Project Manager');


#
# TABLE STRUCTURE FOR: cad_class
#

DROP TABLE IF EXISTS cad_class;

CREATE TABLE `cad_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(15) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO cad_class (`id`, `class_name`, `deleted`) VALUES (1, 'Class 9', 0);
INSERT INTO cad_class (`id`, `class_name`, `deleted`) VALUES (2, 'Class 1', 0);
INSERT INTO cad_class (`id`, `class_name`, `deleted`) VALUES (3, 'Class 3', 0);
INSERT INTO cad_class (`id`, `class_name`, `deleted`) VALUES (6, 'Class 2', 0);


#
# TABLE STRUCTURE FOR: cad_class_subjects
#

DROP TABLE IF EXISTS cad_class_subjects;

CREATE TABLE `cad_class_subjects` (
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`,`subject_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `class_subjects_class` FOREIGN KEY (`class_id`) REFERENCES `cad_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `class_subjects_subject` FOREIGN KEY (`subject_id`) REFERENCES `cad_subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (1, 1);
INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (2, 1);
INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (3, 1);
INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (1, 2);
INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (1, 3);
INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (2, 3);
INSERT INTO cad_class_subjects (`class_id`, `subject_id`) VALUES (3, 3);


#
# TABLE STRUCTURE FOR: cad_donor
#

DROP TABLE IF EXISTS cad_donor;

CREATE TABLE `cad_donor` (
  `id` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `address_1` varchar(25) NOT NULL,
  `address_2` varchar(25) DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `country` varchar(20) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  CONSTRAINT `donor_user` FOREIGN KEY (`id`) REFERENCES `cad_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cad_donor (`id`, `DOB`, `address_1`, `address_2`, `city`, `country`, `accepted`) VALUES (6, '2015-08-11', 'CCjjdk', 'fjdudmd', 'Colombo 7', 'Sri Lanka', 0);
INSERT INTO cad_donor (`id`, `DOB`, `address_1`, `address_2`, `city`, `country`, `accepted`) VALUES (10, '2015-08-26', 'jytfkyhtf kf ky', 'jhgf hjgf jhfd g', 'fgj fd jgfd', 'USA', 0);


#
# TABLE STRUCTURE FOR: cad_funds
#

DROP TABLE IF EXISTS cad_funds;

CREATE TABLE `cad_funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donor` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` tinytext,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_no` varchar(50) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `transferred` tinyint(4) DEFAULT NULL,
  `transfer_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donor` (`donor`),
  CONSTRAINT `funds_donor` FOREIGN KEY (`donor`) REFERENCES `cad_donor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO cad_funds (`id`, `donor`, `amount`, `description`, `timestamp`, `transaction_no`, `accepted`, `transferred`, `transfer_timestamp`) VALUES (1, 6, 1000, 'Month January', '2015-08-28 19:58:37', '10018278382', 1, 1, '2015-08-29 00:30:27');
INSERT INTO cad_funds (`id`, `donor`, `amount`, `description`, `timestamp`, `transaction_no`, `accepted`, `transferred`, `transfer_timestamp`) VALUES (2, 10, 3000, 'Month Jan - March', '2015-08-28 22:32:20', '732927829827', 1, 0, NULL);
INSERT INTO cad_funds (`id`, `donor`, `amount`, `description`, `timestamp`, `transaction_no`, `accepted`, `transferred`, `transfer_timestamp`) VALUES (3, 6, 2000, 'Month Feb, March', '2015-08-28 22:42:59', '1256989672-6', 1, 0, NULL);
INSERT INTO cad_funds (`id`, `donor`, `amount`, `description`, `timestamp`, `transaction_no`, `accepted`, `transferred`, `transfer_timestamp`) VALUES (5, 10, 1000, 'Month April', '2015-08-29 00:47:06', '23423424234234', 0, NULL, NULL);


#
# TABLE STRUCTURE FOR: cad_message
#

DROP TABLE IF EXISTS cad_message;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (2, 2, 1, 'sasaSaman', '<span style=\"text-decoration: underline;\">sdfsd</span>fs<div>fsdf</div><div>sdf&nbsp;</div>', '2015-08-07 14:50:28', 1);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (3, 1, 1, 'The Itestsin ', '<div><ol><li><span style=\"text-decoration: underline; line-height: 1.42857143;\">sdfsdfsdfsdfsdfsdfs</span><br></li><li><span style=\"text-decoration: underline; line-height: 1.42857143;\">sdfsdf</span></li><li><span style=\"text-decoration: underline; line-height: 1.42857143;\">sdf</span><span style=\"line-height: 1.42857143;\">sdfsdfsd</span></li></ol></div><div><span style=\"text-decoration: underline;\">the<span style=\"font-weight: bold;\"> ima</span>ge</span>&nbsp;</div><img src=\"data:image/jpeg;base64,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JA/V5v36x1SyVDU0wJELcZvd33ShMCNjZGpS13AWKhdoVKyjqLJQKqQrCkS5WVUS5WV+x6/+Tv/aAAwDAAABEQIRAAAQ+/8Affff8wwgggggggkkuMcUdcb8804o8+8t8889/wD/AP8Abizgyww8c8k44ggBDDDHDDDDDDDDBCAQwwzzzDTDSwzywgggggEs+/8A7rQwwwy2zzzjLLLPPLLLrPHHHHH3nHPHLLLLLHHHDjzjy2888844/PMIIIIIIY444www4444488ssscs0000ww00088444400UxxIIMy79//AJxwwAAAAEAAAQAQwxxwww15xzzzjDDDAAAAEMdxzzyyyxw0zCAAAAd995xxzzxzzyyy2OPPOOOPyyyyzzzzz7zzzz888888DAHAMM885BBBNNNPPf8AvnjiggkssggjjjjjnrjjnvsrjjywwwwzLf8Az330EEX333nnGEEIILLL77657LLII444IIYY44444JLLDDT3rLHnEEE//wD7DHPP/uOCCCCCCCCGOO+yyyyyyyymOOOSy++sMOAACCCCCW++6CP5hDb2+uOOuu/+6yiGOOi+OOOe6yyKSyuOOOSyP/PfOe+6yyCf5Ac9tBRzzz1BBBNP/wA5TbTikojistvutjjjjusgwAUMgwzxjnswwcdPQQQQQQQQQVeQTaTTQUccReZWcRe803wghssssOMMM4whTz3/AP8A9vPPNJBBBNdhB9A099NNdhcg8xtRxFNNZxPPMNNNNd95xzjryiiCGOiwwwwxzjf7F85Z/wD/AElGxzCQwxjDDAAoEg44wY88zDPNODjPNfPb9LLLLbLIfqAADe/7ygDTziAADT+9/DHDL/8A3DDPF5z3EYr8LVezZzyyDIziPP79J2095hBBBAVJBBR1wwYAw5aTIlkVNchditpCFWCR2cw4hbsKKP6xxJOMOLDONMcwzzCDDC2lRM4sEfckk1pIBnnMwYxt/uY9aIwDCK9euO6zjx1MNAxwsOOEMf8AJQaDk1Lba3sN9KUpIqUO5v8AdZ9AijyyzP09zT6o4JP+v/8A88dR4n8DGy/Lg9Vvdi/6hPThheW1PQgVkcrdL19884UJBJhF2YQBOPmnCSMNl7+V0K1SMMbGlu7Xr5S09u+xtepBLPDF8Aft0rCOBpMugsJQOoEb3CVBpKvS94/tfIxZQaMD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\" style=\"width: 800px;\">\n\n                                ', '2015-08-07 14:54:00', 1);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (4, 1, 1, 'This is the tesing message of a larger tehsdf sdf ', '<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span><div style=\"line-height: 18.5714302062988px;\">sdf sdf sdf sdf sdfsadfasdf sdaf asdf sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span></div><div style=\"line-height: 18.5714302062988px;\">sdf s<span style=\"color: rgb(255, 0, 255);\">d<span style=\"font-weight: bold;\">f sdf sdf sdfsadfasdf sdaf asdf sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span></span></span></div><div style=\"line-height: 18.5714302062988px;\"><span style=\"font-weight: bold;\"><span style=\"color: rgb(255, 0, 255);\">sdf sdf sdf sdf sdfsadfasdf sdaf asdf</span> sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span></span></div><div style=\"line-height: 18.5714302062988px;\"><span style=\"font-weight: bold;\">sdf sdf sdf sdf s<span style=\"text-decoration: underline;\">dfsadfasdf sd<span style=\"color: rgb(255, 156, 0);\">af asdf sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span></span></span></span></div><div style=\"line-height: 18.5714302062988px;\"><span style=\"color: rgb(255, 156, 0);\"><span style=\"text-decoration: underline;\">sdf sdf sdf sdf sdfsadfas</span>df sdaf asdf sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span></span></div><div style=\"line-height: 18.5714302062988px;\"><span style=\"color: rgb(255, 156, 0);\">sdf sdf sd</span>f sdf sdfsadfasdf sdaf asdf sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd</span></div><h4 style=\"line-height: 18.5714302062988px;\">sdf sdf sdf sdf sdfsad<span style=\"font-family: \'Comic Sans MS\';\">fasdf sdaf asdf sadf&nbsp;<span style=\"line-height: 18.5714302062988px;\">sdfsdf sd<br></span></span><span style=\"font-family: \'Comic Sans MS\';\">sdf sdf sdf sdf sdfsadfasdf sd</span>af asdf sadf&nbsp;</h4>', '2015-08-09 09:53:26', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (5, 1, 1, 'SSSSSSAAA', 'SSSSSSSS', '2015-08-10 11:17:09', 1);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (6, 1, 1, 'SSSSSSAAA', '\n\n                                ', '2015-08-10 11:20:29', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (7, 2, 1, 'SSSSSSAAA', '\n\n                                ', '2015-08-10 11:20:29', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (8, 1, 1, 'ssdfgdfg', 'dfgdfg', '2015-08-10 11:20:58', 1);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (9, 3, 1, 'ssdfgdfg', 'dfgdfg', '2015-08-10 11:20:59', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (10, 1, 1, 'gf dfg dfg dsfg', 'dsf gdfsg dsfg dfs&nbsp;', '2015-08-12 21:40:07', 1);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (11, 9, 1, 'from Mac', 'Mac ininininininin', '2015-08-16 09:39:52', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (12, 9, 1, '0982224', '222<div>4564354365403d56x g03654fd</div><div>g0df</div><div>sdfsdfsdf</div>', '2015-08-16 09:44:25', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (13, 4, 1, 'qwertyuiopkjhgcxcvbnm', 'yupofdjkl;lkjfdsckl;jsazxc,mnbvc', '2015-08-30 22:56:09', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (14, 1, 1, '12345678oijhgfcx ', 'srdtfyguihojlkcjghfxbjlntyretatzxcvbpettzkxrylctvy;utlxrktzejaetryltcu;vvcxlzelx;c\'v<div>/c.xzllxrctyvUBIniUOVYc/tuxrylz</div>', '2015-08-30 22:57:13', 0);
INSERT INTO cad_message (`id`, `to`, `from`, `subject`, `body`, `timestamp`, `read`) VALUES (15, 1, 1, 'wedfgbnm', 'xcvbnmnbvcvbnm<div>kjhgvbjkjv</div><div><img src=\"data:image/jpeg;base64,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\" style=\"width: 953px;\"><br></div><div>hgghjcv</div>', '2015-08-30 22:57:47', 0);


#
# TABLE STRUCTURE FOR: cad_receipt
#

DROP TABLE IF EXISTS cad_receipt;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO cad_receipt (`id`, `receipt_type`, `receiver`, `transaction_id`, `date`, `total`) VALUES (1, 'Fund', 6, 1, '2015-08-28 22:25:41', '1000');
INSERT INTO cad_receipt (`id`, `receipt_type`, `receiver`, `transaction_id`, `date`, `total`) VALUES (3, 'Fund', 10, 2, '2015-08-28 22:32:35', '3000');
INSERT INTO cad_receipt (`id`, `receipt_type`, `receiver`, `transaction_id`, `date`, `total`) VALUES (4, 'Fund', 6, 3, '2015-08-28 22:43:14', '2000');


#
# TABLE STRUCTURE FOR: cad_school
#

DROP TABLE IF EXISTS cad_school;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO cad_school (`id`, `name`, `address_1`, `address_2`, `city`, `principal`, `contact_no`, `deleted`) VALUES (1, 'Mu/Dik wewa MV', 'wekjnvkjn', 'kjnjn', 'Anuradhapura', 'Piyadasa', '123456', 0);
INSERT INTO cad_school (`id`, `name`, `address_1`, `address_2`, `city`, `principal`, `contact_no`, `deleted`) VALUES (5, 'Thejan Rajapakshe', 'Waththegedara', 'Kohilegedara', 'Kurunegala', 'dftyuijhgfszxbnm', '123456789', 0);


#
# TABLE STRUCTURE FOR: cad_student
#

DROP TABLE IF EXISTS cad_student;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cad_student (`id`, `DOB`, `address_1`, `address_2`, `city`, `school_id`, `class_id`, `assigned_teacher`, `teacher_contact`, `donor`, `accepted`) VALUES (5, '2015-08-10', 'ghjkjb', 'gkkmnb', 'ugfdxcvbn', 1, 1, 'adertyuijh', '45678', NULL, 0);
INSERT INTO cad_student (`id`, `DOB`, `address_1`, `address_2`, `city`, `school_id`, `class_id`, `assigned_teacher`, `teacher_contact`, `donor`, `accepted`) VALUES (11, '2015-08-04', 'djhg ksudhg ku', 'kuhgf hkgf kh', 'jhgf jhgf', 1, 1, 'dsfgsfg', '6565656', 10, 1);


#
# TABLE STRUCTURE FOR: cad_student_test_mark
#

DROP TABLE IF EXISTS cad_student_test_mark;

CREATE TABLE `cad_student_test_mark` (
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`test_id`,`class_id`,`subject_id`),
  KEY `test_id` (`test_id`),
  KEY `class_id` (`class_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `student_test_mark_class` FOREIGN KEY (`class_id`) REFERENCES `cad_class` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `student_test_mark_student` FOREIGN KEY (`student_id`) REFERENCES `cad_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_test_mark_subject` FOREIGN KEY (`subject_id`) REFERENCES `cad_subjects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `student_test_mark_test` FOREIGN KEY (`test_id`) REFERENCES `cad_test` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: cad_subjects
#

DROP TABLE IF EXISTS cad_subjects;

CREATE TABLE `cad_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(20) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO cad_subjects (`id`, `subject_name`, `deleted`) VALUES (1, 'Sinhala', 0);
INSERT INTO cad_subjects (`id`, `subject_name`, `deleted`) VALUES (2, 'English', 0);
INSERT INTO cad_subjects (`id`, `subject_name`, `deleted`) VALUES (3, 'Tamil', 0);
INSERT INTO cad_subjects (`id`, `subject_name`, `deleted`) VALUES (5, 'Social Studies', 1);
INSERT INTO cad_subjects (`id`, `subject_name`, `deleted`) VALUES (6, 'dsdfghn', 1);


#
# TABLE STRUCTURE FOR: cad_test
#

DROP TABLE IF EXISTS cad_test;

CREATE TABLE `cad_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: cad_user
#

DROP TABLE IF EXISTS cad_user;

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
  `profile_pic` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (1, 'Thejan', 'Rajapakshe', 'admin', 'thejan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'coder.clix@gmail.com', '071583423', 'admin', 0, '1.jpg');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (2, 'Janaka', 'Silva', 'admin', 'janaka', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'janaka@fdf.com', '342342422', 'cad', 0, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (3, 'saman', 'priyankara', 'volunteer', 'saman@imcds.org', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'saman@imcds.org', '543543541', 'cad', 0, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (4, 'Thejan', 'Rajapakshe V', 'Volunteer', 'jayaneedddtha@bright', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jayaneetha@brightron.net', NULL, 'cad', 0, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (5, 'Sagara', 'Silva', 'student', 'sagara', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sagara@sws.com', '0715849762', 'student', 0, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (6, 'MPD', 'Perera', 'Dr.', 'mpd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mpdperrera@gmail.com', '0767848343', 'donor', 1, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (9, 'jayaneetha', 'Rajapakshe', 'popo', '1jayaneetha@brightro', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin@Admins-MacBook-Pro.local', '7894561250', 'cad', 0, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (10, 'Donor', 'Accepted', 'C.E.O MMS', 'donoracepted#brightr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'donoracepted#brightron.net', '0498435154', 'donor', 1, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (11, 'Student', 'Accepted', 'student', 'student@brightron.ne', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'student@dfgdfg.com', '5465465469', 'student', 0, '');
INSERT INTO cad_user (`id`, `first_name`, `last_name`, `title`, `username`, `password`, `email`, `contact_no`, `user_type`, `deleted`, `profile_pic`) VALUES (14, 'qwertyu', 'wer', 'Team Member', 'Admin@Admins-MacBook', '7d9759c5fb95b2f0c0a60dccfe03843ec4f8b37f', 'Admin@Admins-MacBook-Pro.local', NULL, 'cad', 0, '');


