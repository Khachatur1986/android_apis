/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - php_api
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_api` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `php_api`;

/*Table structure for table `images` */

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `images` */

insert  into `images`(`id`,`description`,`image`,`url`) values (2,'captain','1549706797751.jpg','192.168.123.1');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (1,'admin','',NULL,'YWRtaW4=','2019-02-04 15:31:28');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (2,'test','',NULL,'dGVzdA==','2019-02-05 11:29:22');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (3,'test1','',NULL,'dGVzdDE=','2019-02-05 11:45:48');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (4,'test2','',NULL,'dGVzdDI=','2019-02-05 17:40:35');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (5,'hello','',NULL,'d29scmQ=','2019-02-05 18:38:22');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (6,'et_username','',NULL,'ZXRfcGFzc3dvcmQ=','2019-02-05 18:44:51');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (7,'et_username1','',NULL,'ZXRfcGFzc3dvcmQ=','2019-02-07 08:58:38');
insert  into `users`(`id`,`username`,`email`,`age`,`password`,`created`) values (8,'et_username3','',NULL,'ZXRfcGFzc3dvcmQ=','2019-02-07 09:03:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
