/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.37-MariaDB : Database - corporatesms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`corporatesms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `corporatesms`;

/*Table structure for table `message_received` */

DROP TABLE IF EXISTS `message_received`;

CREATE TABLE `message_received` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `received_from` int(10) NOT NULL,
  `date_received` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received_msg` varchar(150) DEFAULT NULL,
  `received_date` date NOT NULL,
  `received_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `message_received` */

insert  into `message_received`(`message_id`,`received_from`,`date_received`,`received_msg`,`received_date`,`received_time`) values (1,980115880,'2019-05-05 13:51:43','This is an example message','0000-00-00','2019-05-06 15:11:07'),(2,980115880,'2019-05-05 13:51:43','This is another example','0000-00-00','2019-05-06 15:11:07'),(3,985113213,'2019-05-05 13:52:34','some more test message','0000-00-00','2019-05-06 15:11:07'),(4,985113213,'2019-05-05 13:52:34','some even more test message','0000-00-00','2019-05-06 15:11:07'),(5,98789874,'2019-05-06 14:55:06','aasdasdasd','2019-05-01','2019-05-06 15:11:07'),(6,8798,'2019-05-06 15:03:15','97897dqwdqwqdwqdqwd','2019-05-04','2019-05-06 15:11:07'),(7,98765,'2019-05-06 15:03:35','qqefweqc','2019-05-07','2019-05-06 15:11:07'),(8,654654,'2019-05-06 15:11:29','asda5s6d','2019-05-07','2019-05-06 15:11:29'),(9,654646,'2019-05-06 21:58:38','adsasd','2019-05-06','2019-05-06 21:58:38'),(10,0,'2019-05-07 00:08:45','','2019-05-07','2019-05-07 00:08:45'),(11,0,'2019-05-07 00:09:28','','2019-05-07','2019-05-07 00:09:28'),(12,0,'2019-05-07 00:11:26','','2019-05-07','2019-05-07 00:11:26'),(13,0,'2019-05-07 00:12:34','','2019-05-07','2019-05-07 00:12:34'),(14,985545451,'2019-05-07 10:04:14','adasdasdasdas','2019-05-07','2019-05-07 10:04:14'),(15,980115880,'2019-05-07 10:04:58','somrthing test','2019-05-07','2019-05-07 10:04:58');

/*Table structure for table `message_sent` */

DROP TABLE IF EXISTS `message_sent`;

CREATE TABLE `message_sent` (
  `sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_to` int(14) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(150) NOT NULL,
  `sent_date` date NOT NULL,
  PRIMARY KEY (`sent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `message_sent` */

insert  into `message_sent`(`sent_id`,`sent_to`,`date_sent`,`message`,`sent_date`) values (1,980115880,'2019-05-05 13:53:14','received test message','0000-00-00'),(2,985113213,'2019-05-05 13:53:14','more reeived test message','0000-00-00'),(3,2147483647,'0000-00-00 00:00:00','tri33333','0000-00-00'),(4,2147483647,'2019-05-06 23:56:14','tri33333','0000-00-00'),(5,2147483647,'2019-05-06 23:58:42','tri33333','0000-00-00'),(6,2147483647,'2019-05-06 23:59:13','tri33333','2019-05-06'),(7,2147483647,'2019-05-07 00:24:23','','2019-05-07');

/*Table structure for table `user_data` */

DROP TABLE IF EXISTS `user_data`;

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(14) DEFAULT NULL,
  `user_address` varchar(20) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'user',
  `user_password` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_data` */

insert  into `user_data`(`user_id`,`user_name`,`user_phone`,`user_address`,`user_email`,`role`,`user_password`,`created`) values (1,'shakti','9801158801','SAtungal','shakti@gmail.com','admin','$2y$10$DSehepubPlJypn8cIsBtTueKKTUyqvFLmIDe1NnM.dw2Ai8A28flu','2019-05-07 10:53:52'),(2,'ranju','','satungal','someone@hotmail.com','user','$2y$10$DSehepubPlJypn8cIsBtTueKKTUyqvFLmIDe1NnM.dw2Ai8A28flu','2019-05-07 10:54:36'),(3,'Chantale Blair','+1 (654) 476-7','Unde eos voluptate d','fibiko@mailinator.com','user','$2y$10$DSehepubPlJypn8cIsBtTueKKTUyqvFLmIDe1NnM.dw2Ai8A28flu','2019-05-07 22:21:27'),(4,'anooz','9841057767','balkumari','prasaianooz@gmail.com','user','$2y$10$1q4BMD7PWJ40b0162rnU5uCqkTWcRNcw.ana8bkF720V/gBcSA/MC','2019-05-07 22:40:01');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`user_type`,`password`) values (1,'shakti','shakti@gmail.com','admin','e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
