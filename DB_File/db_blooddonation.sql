-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2021-12-05 19:42:10
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for db_blooddonation
DROP DATABASE IF EXISTS `db_blooddonation`;
CREATE DATABASE IF NOT EXISTS `db_blooddonation` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_blooddonation`;


-- Dumping structure for table db_blooddonation.tb_ambulance_service
DROP TABLE IF EXISTS `tb_ambulance_service`;
CREATE TABLE IF NOT EXISTS `tb_ambulance_service` (
  `ambulance_service_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ambulance_service_code` int(11) DEFAULT NULL,
  `ambulance_service_name` varchar(255) DEFAULT NULL,
  `about_service` varchar(255) DEFAULT NULL,
  `serivice_image` varchar(255) DEFAULT NULL,
  `service_address` varchar(255) DEFAULT NULL,
  `service_contact` varchar(255) DEFAULT NULL,
  `service_opening_time` varchar(255) DEFAULT NULL,
  `service_owner_name` varchar(255) DEFAULT NULL,
  `owner_contact` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ambulance_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='ambulance_service_id,ambulance_service_code,ambulance_service_name,about_service,service_address,service_contact,service_opening_time,service_owner_name,owner_contact,added_by,is_verified,entry_time';

-- Dumping data for table db_blooddonation.tb_ambulance_service: ~0 rows (approximately)
DELETE FROM `tb_ambulance_service`;
/*!40000 ALTER TABLE `tb_ambulance_service` DISABLE KEYS */;
INSERT INTO `tb_ambulance_service` (`ambulance_service_id`, `ambulance_service_code`, `ambulance_service_name`, `about_service`, `serivice_image`, `service_address`, `service_contact`, `service_opening_time`, `service_owner_name`, `owner_contact`, `added_by`, `is_verified`, `entry_time`) VALUES
	(1, 215437, 'Zara Ambulance Service', 'We can provide first aid, emergency care, various medicines and life support, and carry patients to hospital. We are 24/7 ready to help.', 'ambulance_service_img/13d8b071bcd45cff64dcea2754d737aeambulance_service.jpg', 'Agrabad, Chattogram', '(+88) 01918-125018', 'Every Day, 24 Hours Open', 'Md Sajid Hussain', '01845865899', 'Sajid', 1, '2021-12-04 05:31:59');
/*!40000 ALTER TABLE `tb_ambulance_service` ENABLE KEYS */;


-- Dumping structure for table db_blooddonation.tb_ambulance_service_review
DROP TABLE IF EXISTS `tb_ambulance_service_review`;
CREATE TABLE IF NOT EXISTS `tb_ambulance_service_review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ambulance_service_id` int(11) DEFAULT NULL,
  `ambulance_service_name` varchar(255) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `reviewed_by` varchar(255) DEFAULT NULL,
  `service_owner_username` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='review_id,ambulance_service_id,ambulance_service_name,rating_value,comment,reviewed_by,service_owner_username,entry_time';

-- Dumping data for table db_blooddonation.tb_ambulance_service_review: ~1 rows (approximately)
DELETE FROM `tb_ambulance_service_review`;
/*!40000 ALTER TABLE `tb_ambulance_service_review` DISABLE KEYS */;
INSERT INTO `tb_ambulance_service_review` (`review_id`, `ambulance_service_id`, `ambulance_service_name`, `rating_value`, `comment`, `reviewed_by`, `service_owner_username`, `entry_time`) VALUES
	(1, 1, 'Zara Ambulance Service', 4, 'Their service is very good. Thanks to Zara Amlulance Service!', 'Sakib', 'Sajid', '2021-12-05 09:02:54');
/*!40000 ALTER TABLE `tb_ambulance_service_review` ENABLE KEYS */;


-- Dumping structure for table db_blooddonation.tb_blood_donation_appointmnet
DROP TABLE IF EXISTS `tb_blood_donation_appointmnet`;
CREATE TABLE IF NOT EXISTS `tb_blood_donation_appointmnet` (
  `blood_donation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `blood_donation_code` int(11) DEFAULT NULL,
  `doner_name` varchar(255) DEFAULT NULL,
  `doner_email` varchar(255) DEFAULT NULL,
  `doner_contact` varchar(255) DEFAULT NULL,
  `doner_blood_group` varchar(255) DEFAULT NULL,
  `blood_donation_date` varchar(255) DEFAULT NULL,
  `donated_by` varchar(255) DEFAULT NULL,
  `blood_donation_center_id` int(11) DEFAULT NULL,
  `donation_center_name` varchar(255) DEFAULT NULL,
  `donation_center_address` varchar(255) DEFAULT NULL,
  `donation_center_contact` varchar(255) DEFAULT NULL,
  `donation_center_added_by` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`blood_donation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_blooddonation.tb_blood_donation_appointmnet: ~1 rows (approximately)
DELETE FROM `tb_blood_donation_appointmnet`;
/*!40000 ALTER TABLE `tb_blood_donation_appointmnet` DISABLE KEYS */;
INSERT INTO `tb_blood_donation_appointmnet` (`blood_donation_id`, `blood_donation_code`, `doner_name`, `doner_email`, `doner_contact`, `doner_blood_group`, `blood_donation_date`, `donated_by`, `blood_donation_center_id`, `donation_center_name`, `donation_center_address`, `donation_center_contact`, `donation_center_added_by`, `is_verified`, `entry_time`) VALUES
	(1, 302155, 'Md Sakib Hussain', 'sakibhussain@gmail.com', '01865869511', 'B(+ve)', '2021-12-05', 'Sakib', 1, '', '#Road No-3, Opposite of Chattogram Medical College, Chattogram', '(+88) 01918-125018', 'Sajid', 1, '2021-12-05 15:30:59');
/*!40000 ALTER TABLE `tb_blood_donation_appointmnet` ENABLE KEYS */;


-- Dumping structure for table db_blooddonation.tb_blood_donation_center
DROP TABLE IF EXISTS `tb_blood_donation_center`;
CREATE TABLE IF NOT EXISTS `tb_blood_donation_center` (
  `blood_donation_center_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `donation_center_code` int(11) DEFAULT NULL,
  `donation_center_name` varchar(255) DEFAULT NULL,
  `donation_center_address` varchar(255) DEFAULT NULL,
  `donation_center_contact` varchar(255) DEFAULT NULL,
  `donation_center_email` varchar(255) DEFAULT NULL,
  `donation_center_image` varchar(255) DEFAULT NULL,
  `opening_hour` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_contact` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`blood_donation_center_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='blood_donation_center_id,donation_center_code,donation_center_name,donation_center_address,donation_center_contact,donation_center_email,donation_center_image,opening_hour,owner_name,owner_contact,added_by,entry_time';

-- Dumping data for table db_blooddonation.tb_blood_donation_center: ~1 rows (approximately)
DELETE FROM `tb_blood_donation_center`;
/*!40000 ALTER TABLE `tb_blood_donation_center` DISABLE KEYS */;
INSERT INTO `tb_blood_donation_center` (`blood_donation_center_id`, `donation_center_code`, `donation_center_name`, `donation_center_address`, `donation_center_contact`, `donation_center_email`, `donation_center_image`, `opening_hour`, `owner_name`, `owner_contact`, `added_by`, `is_verified`, `entry_time`) VALUES
	(1, 310694, 'Sondani Blood Donation Center', '#Road No-3, Opposite of Chattogram Medical College, Chattogram', '(+88) 01918-125018', 'sondanidonation@gmail.com', 'blood_donation_center_img/e34be1e92489ac36e9da744785eb168abg-2.jpg', 'Open Every Day: 8:00 AM - 10:00 PM', 'Md Sajid Hussain', '01845865899', 'Sajid', 1, '2021-12-03 14:33:00');
/*!40000 ALTER TABLE `tb_blood_donation_center` ENABLE KEYS */;


-- Dumping structure for table db_blooddonation.tb_blood_doner
DROP TABLE IF EXISTS `tb_blood_doner`;
CREATE TABLE IF NOT EXISTS `tb_blood_doner` (
  `blood_doner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `doner_code` int(11) DEFAULT NULL,
  `doner_name` varchar(255) DEFAULT NULL,
  `doner_email` varchar(255) DEFAULT NULL,
  `doner_phone_no` varchar(255) DEFAULT NULL,
  `doner_image` varchar(255) DEFAULT NULL,
  `doner_blood_group` varchar(255) DEFAULT NULL,
  `doner_address` varchar(255) DEFAULT NULL,
  `doner_username` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`blood_doner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='blood_doner_id,doner_code,doner_name,doner_email,doner_phone_no,doner_image,doner_blood_group,doner_address,doner_username,entry_time';

-- Dumping data for table db_blooddonation.tb_blood_doner: ~0 rows (approximately)
DELETE FROM `tb_blood_doner`;
/*!40000 ALTER TABLE `tb_blood_doner` DISABLE KEYS */;
INSERT INTO `tb_blood_doner` (`blood_doner_id`, `doner_code`, `doner_name`, `doner_email`, `doner_phone_no`, `doner_image`, `doner_blood_group`, `doner_address`, `doner_username`, `entry_time`) VALUES
	(1, 772827, 'Md Sajid Hussain', 'sajidhussain@gmail.com', '01845865899', 'blooddoner_img/blood_doner-1.jpg', 'A(+ve)', 'Agrabad, Chattgram', 'Sajid', '2021-12-03 13:39:40');
/*!40000 ALTER TABLE `tb_blood_doner` ENABLE KEYS */;


-- Dumping structure for table db_blooddonation.tb_charity_foundation
DROP TABLE IF EXISTS `tb_charity_foundation`;
CREATE TABLE IF NOT EXISTS `tb_charity_foundation` (
  `foundation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `foundation_code` int(11) DEFAULT NULL,
  `charity_foundation_name` varchar(255) DEFAULT NULL,
  `foundation_image` varchar(255) DEFAULT NULL,
  `about_foundation` varchar(255) DEFAULT NULL,
  `foundation_address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foundation_opening_hour` varchar(255) DEFAULT NULL,
  `organization_type` varchar(255) DEFAULT NULL,
  `social_media_link` varchar(255) DEFAULT NULL,
  `foundation_owner_name` varchar(255) DEFAULT NULL,
  `owner_email` varchar(255) DEFAULT NULL,
  `owner_contact_number` varchar(255) DEFAULT NULL,
  `owner_nid_number` varchar(255) DEFAULT NULL,
  `way_of_payment` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`foundation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='foundation_id,foundation_code,foundation_name,foundation_image,about_foundation,foundation_address,contact_number,email,foundation_opening_hour,organization_type,social_media_link,foundation_owner_name,owner_email,owner_contact_number,owner_nid_number,added_by,entry_time';

-- Dumping data for table db_blooddonation.tb_charity_foundation: ~1 rows (approximately)
DELETE FROM `tb_charity_foundation`;
/*!40000 ALTER TABLE `tb_charity_foundation` DISABLE KEYS */;
INSERT INTO `tb_charity_foundation` (`foundation_id`, `foundation_code`, `charity_foundation_name`, `foundation_image`, `about_foundation`, `foundation_address`, `contact_number`, `email`, `foundation_opening_hour`, `organization_type`, `social_media_link`, `foundation_owner_name`, `owner_email`, `owner_contact_number`, `owner_nid_number`, `way_of_payment`, `added_by`, `is_verified`, `entry_time`) VALUES
	(1, 890900, 'à§§ à¦Ÿà¦¾à¦•à¦¾à§Ÿ à¦†à¦¹à¦¾à¦°', 'charity_foundation_img/charity-2.jpg', 'à¦¸à§‡à¦°à¦¾ à¦¸à¦®à§à¦ªà¦°à§à¦•à¦—à§à¦²à§‹ à¦–à¦¾à¦¬à¦¾à¦° à¦¶à§‡à§Ÿà¦¾à¦° à¦¥à§‡à¦•à§‡ à¦¸à§ƒà¦·à§à¦Ÿà¦¿ à¦¹à§Ÿâ€™ à¦ à¦ªà§à¦°à¦¤à¦¿à¦ªà¦¾à¦¦à§à¦¯à¦•à§‡ à¦¸à¦¾à¦®à¦¨à§‡ à¦°à§‡à¦–à§‡ à§¨à§¦à§§à§¬ à¦¸à¦¾à¦²à§‡ à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦¨à¦¨à§à¦¦ à¦«à¦¾ï', 'Agrabad, Chattogram', '(+88) 01878-116232', 'sopnojatri@foundation.org', 'Every Day, 24 Hours Open', 'Nonprofit Org.', 'https://www.facebook.com/1Tk.Meal/', 'Md Sajid Hussain', 'sajidhussain@gmail.com', '01845865899', '6021545483', '<p><b>1.</b>&nbsp;<b>The City Bank Limited</b></p><p>&nbsp; &nbsp; Acc. No: 11254202155</p><p>&nbsp; &nbsp; Foundation Name: 1 Taka Meal</p>', 'Sajid', 1, '2021-12-04 10:29:54');
/*!40000 ALTER TABLE `tb_charity_foundation` ENABLE KEYS */;


-- Dumping structure for table db_blooddonation.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='name,email,phone,address,user_name,password,user_type,entry_time';

-- Dumping data for table db_blooddonation.tb_user: ~3 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Md Sajid Hussain', 'sajidhussain@gmail.com', '01845865899', 'Agrabad, Chattogram', 'Sajid', '12345', 'Blood Doner', '2021-12-03 11:38:48'),
	(2, 'Nurshed Trena', 'nurshedtrena@gmail.com', '01847148744', 'Agrabad, Chattogram', 'Trena', '12345', 'Admin', '2021-12-03 11:38:48'),
	(3, 'Md Sakib Hussain', 'sakibhussain@gmail.com', '01865869511', 'Agrabad, Chattogram', 'Sakib', '12345', 'General User', '2021-12-03 11:38:48');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
