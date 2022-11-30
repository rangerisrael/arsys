DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
INSERT INTO `activities` VALUES('1','Regular Curricular Activities');
INSERT INTO `activities` VALUES('2','Class Based Programs');
INSERT INTO `activities` VALUES('3','Institutional Activities');
INSERT INTO `activities` VALUES('4','Student Initiated Activities');
INSERT INTO `activities` VALUES('5','Unit Based Activities');
DROP TABLE IF EXISTS `department_office`;

CREATE TABLE `department_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
INSERT INTO `department_office` VALUES('0','');
INSERT INTO `department_office` VALUES('6','AGRICULTURE');
INSERT INTO `department_office` VALUES('2','BIT');
INSERT INTO `department_office` VALUES('3','EDUCATION');
INSERT INTO `department_office` VALUES('5','ENGINEER');
INSERT INTO `department_office` VALUES('9','FISHERIES');
INSERT INTO `department_office` VALUES('8','FORESTRY');
INSERT INTO `department_office` VALUES('4','HRM');
INSERT INTO `department_office` VALUES('1','IT');
INSERT INTO `department_office` VALUES('7','LAW');
DROP TABLE IF EXISTS `facilities_type`;

CREATE TABLE `facilities_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
INSERT INTO `facilities_type` VALUES('1','GYMNASIUM','roomGYM.png','23','Dipaculao');
INSERT INTO `facilities_type` VALUES('2','CONVENTIONAL','roomGYM.png','12','Lipit');
INSERT INTO `facilities_type` VALUES('3','ACCREDITATION HALL','roomGYM.png','San Luis','Baler');
INSERT INTO `facilities_type` VALUES('4','AVR','roomGYM.png','34','Zabali');
INSERT INTO `facilities_type` VALUES('5','Barangay Hall','roomASCOT.jpg','23','Baler Zabali');
INSERT INTO `facilities_type` VALUES('6','Tester','roomGYM.png','21','Philippines');
INSERT INTO `facilities_type` VALUES('7','Tester','roomhilux.png','34','Baler');
INSERT INTO `facilities_type` VALUES('8','TryHall','roomASCOT2.jpg','12','Maria');
INSERT INTO `facilities_type` VALUES('9','Room101','roomASCOT.jpg','33','Ascot Baler');
DROP TABLE IF EXISTS `motorpool_type`;

CREATE TABLE `motorpool_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `plate_number` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `gear` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
INSERT INTO `motorpool_type` VALUES('1','COUSTER','ASD5534543','diesel','automatic','motorpooltypevehicleertiga.png','12');
INSERT INTO `motorpool_type` VALUES('2','FORTUNER','DAEW43454','diesel','manual','motorpooltypevehiclefortuner.png','10');
INSERT INTO `motorpool_type` VALUES('3','MUX','QWEDDA54','gasoline','manual','motorpooltypevehiclehilux.png','6');
INSERT INTO `motorpool_type` VALUES('4','COMMUTER','ASDASDYUT5','diesel','manual','motorpooltypevehiclemux.png','12');
INSERT INTO `motorpool_type` VALUES('5','APV','BGRTU543','diesel','manual','motorpooltypevehiclehilux.png','23');
INSERT INTO `motorpool_type` VALUES('6','ERTIGA','BFTJERTR64','gasoline','automatic','motorpooltypevehiclemux.png','14');
INSERT INTO `motorpool_type` VALUES('7','HILUX','NDFGERTRT45','diesel','automatic','motorpooltypevehiclehilux.png','8');
INSERT INTO `motorpool_type` VALUES('8','Fortune','ASDF!123123','Diesel','autmotatic','motorpooltypevehiclemux.png','7');
INSERT INTO `motorpool_type` VALUES('9','Fortune','ASDF12312','Diesel','manual','motorpooltypevehiclemux.png','8');
INSERT INTO `motorpool_type` VALUES('10','Fortune','ASDFC3123','Diesel','automatic','motorpooltypevehiclemux.png','1');
INSERT INTO `motorpool_type` VALUES('11','Testet','t3423f','Gasoline','manual','motorpooltypevehiclemux.png','3');
INSERT INTO `motorpool_type` VALUES('12','Bugati','ASDFNB233','Diesel','automatic','motorpooltypevehiclemux.png','15');
DROP TABLE IF EXISTS `reservation_facilities`;

CREATE TABLE `reservation_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `reservation_type_id` int(11) DEFAULT NULL,
  `facilities_type_id` int(11) DEFAULT NULL,
  `date_filling` varchar(255) NOT NULL,
  `date_return` varchar(11) NOT NULL,
  `borrowing` varchar(255) NOT NULL,
  `assigned_person` varchar(255) NOT NULL,
  `assigned_contact_number` varchar(11) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `activity_name` varchar(255) NOT NULL,
  `brief_description` varchar(255) NOT NULL,
  `number_participant` varchar(255) NOT NULL,
  `target_day_use` varchar(255) NOT NULL,
  `scan_file` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservation_type_id` (`reservation_type_id`),
  KEY `facilities_type_id` (`facilities_type_id`),
  KEY `activity_id` (`activity_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reservation_facilities_ibfk_1` FOREIGN KEY (`reservation_type_id`) REFERENCES `reservation_type` (`id`),
  CONSTRAINT `reservation_facilities_ibfk_2` FOREIGN KEY (`facilities_type_id`) REFERENCES `facilities_type` (`id`),
  CONSTRAINT `reservation_facilities_ibfk_3` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `reservation_facilities_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `reservation_status` (`id`),
  CONSTRAINT `reservation_facilities_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
INSERT INTO `reservation_facilities` VALUES('11','arsys63848eb571e5f8.16617809','1','1','2022-11-28','2022-11-30','official','Tester','09123456454','1','Test','test','12','18:34','null','3','1');
DROP TABLE IF EXISTS `reservation_motorpool`;

CREATE TABLE `reservation_motorpool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `reservation_type_id` int(11) DEFAULT NULL,
  `motorpool_type_id` int(11) DEFAULT NULL,
  `date_filling` varchar(255) NOT NULL,
  `borrowing_office` varchar(255) NOT NULL,
  `date_return` varchar(11) NOT NULL,
  `assigned_person` varchar(255) NOT NULL,
  `assigned_contact_number` varchar(11) NOT NULL,
  `reason_travel_id` int(11) DEFAULT NULL,
  `reason_specify` varchar(255) DEFAULT NULL,
  `number_participant` varchar(255) NOT NULL,
  `target_day_use` varchar(255) NOT NULL,
  `scan_file` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservation_type_id` (`reservation_type_id`),
  KEY `motorpool_type_id` (`motorpool_type_id`),
  KEY `reason_travel_id` (`reason_travel_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  FULLTEXT KEY `date_return` (`date_return`),
  CONSTRAINT `reservation_motorpool_ibfk_1` FOREIGN KEY (`reservation_type_id`) REFERENCES `reservation_type` (`id`),
  CONSTRAINT `reservation_motorpool_ibfk_2` FOREIGN KEY (`motorpool_type_id`) REFERENCES `motorpool_type` (`id`),
  CONSTRAINT `reservation_motorpool_ibfk_3` FOREIGN KEY (`reason_travel_id`) REFERENCES `travel_reason` (`id`),
  CONSTRAINT `reservation_motorpool_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `reservation_status` (`id`),
  CONSTRAINT `reservation_motorpool_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
INSERT INTO `reservation_motorpool` VALUES('20','arsys6384ab1dc9b646.11162343','2','5','2022-11-28','official','2022-11-29','testerme','09124567867','3','','2','20:35:22','motorpool_scan_file_-selfie.jpg','2','1');
DROP TABLE IF EXISTS `reservation_status`;

CREATE TABLE `reservation_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_update` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO `reservation_status` VALUES('1','approve');
INSERT INTO `reservation_status` VALUES('3','decline');
INSERT INTO `reservation_status` VALUES('2','pending');
DROP TABLE IF EXISTS `reservation_type`;

CREATE TABLE `reservation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
INSERT INTO `reservation_type` VALUES('1','facilities');
INSERT INTO `reservation_type` VALUES('2','motorpool');
DROP TABLE IF EXISTS `reset_password`;

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reset_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
INSERT INTO `reset_password` VALUES('44','$2y$10$YbHnHiEdi4VJ7ubE.nSHVuabmxi8sJfhI4lvK/J6b22ZB8K8dddGm','11/19/2022','8');
INSERT INTO `reset_password` VALUES('45','$2y$10$N7jy1tanK5.K9IbMvqT.z.8xnm21GsApuRJ5S/8PkCqiQPpTat1RC','11/19/2022','8');
INSERT INTO `reset_password` VALUES('46','$2y$10$MPwUcURv3wKr6CRVahTYYOGRh/hkln3GsSQ.GwKbaRQQKhwVE.o0e','11/19/2022','8');
INSERT INTO `reset_password` VALUES('47','$2y$10$yq4sN50L3rxYYcw2b0gvWertAXAGDEkMEsJbqZ3D2FUN3Hiu8UZRC','11/19/2022','8');
INSERT INTO `reset_password` VALUES('48','$2y$10$iUB26uk2nceN45Duzqbu7OQn0XTcpSPMICv3SPZearsFbXmjr9wHG','11/26/2022','17');
INSERT INTO `reset_password` VALUES('49','$2y$10$CjBog.0L4rSsB/mg/Yfq3eHzfi24WBWfqwvKR0Y6Nj68DQDulWKOa','11/26/2022','11');
INSERT INTO `reset_password` VALUES('50','$2y$10$wbyDpN/bLvvHefpMwEqb0OG.xcm9PwZ5hnoRblUKRoN8jXsrqxANW','11/26/2022','8');
INSERT INTO `reset_password` VALUES('51','$2y$10$4vG2bbzXI6I8VtajVBmyrOCScWiS46dzLb1GREzaVNkmOLz66xt92','11/26/2022','8');
INSERT INTO `reset_password` VALUES('52','$2y$10$iiEDMmE/ijJ2EHpLiZCeYe8P41oub57WeU2CJ7wFSCGxMFcNu1/yC','11/26/2022','16');
DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
INSERT INTO `roles` VALUES('1','admin');
INSERT INTO `roles` VALUES('2','user');
DROP TABLE IF EXISTS `travel_reason`;

CREATE TABLE `travel_reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO `travel_reason` VALUES('1','Reason 1');
INSERT INTO `travel_reason` VALUES('2','Reason 4');
INSERT INTO `travel_reason` VALUES('3','Reason 3');
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `id_number` varchar(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department_specify` varchar(20) DEFAULT NULL,
  `phone_number` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_office` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `users` VALUES('1','dev.me','dev.me28@gmail.com','users_front.jpg','Ascot123','6','NULL','09123453536','MALE','$2y$10$MpgbMSHv7c26kn2KD5bgvekv6pZMAU6HMapSUCd00U8hRxNWWZILK','1','2022-11-28','2022-11-28');


COMMIT;