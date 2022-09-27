/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.13-MariaDB : Database - blogg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blogg` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `blogg`;

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` varchar(500) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `sujet_id` (`sujet_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`sujet_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `posts` */

insert  into `posts`(`id`,`sujet_id`,`user_id`,`title`,`image`,`body`,`published`,`created_at`) values (45,18,67,'Cameroon Law','1618225842_glpi.jpg','cfivhbjlnjhgcvhbkjlnkm,nbhgvhkbjlnknbhlkjlnk',1,'2021-04-12 13:10:42'),(46,19,67,'Cameroon Law and crimes','1619202050_20210224_143134.jpg','sfdvbsfdvbswdsvdv',1,'2021-04-23 20:20:50'),(47,20,67,'Cameroon for peace','1619202078_IMG_20190907_093115.jpg','dfbdsfbqdsfvbsfdqbdsfvbx  cbvdwgvQZEdgfvsvqsdvqsDvgsqdgvsdgfsdfvsdvgsdvsdvsdv',1,'2021-04-23 20:21:18'),(48,20,67,'NOMI loves ARTHUR & LOIC','1619202644_FB_IMG_15901757349705378.jpg','xc wvxcvbnbfdsvqcxcvbn',1,'2021-04-23 20:30:44');

/*Table structure for table `publicationdoc` */

DROP TABLE IF EXISTS `publicationdoc`;

CREATE TABLE `publicationdoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sujet` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `imageAss` varchar(200) NOT NULL,
  `dateCreation` date NOT NULL DEFAULT current_timestamp(),
  `nomDoc` varchar(200) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sujet` (`id_sujet`),
  CONSTRAINT `publicationdoc_ibfk_1` FOREIGN KEY (`id_sujet`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `publicationdoc` */

insert  into `publicationdoc`(`id`,`id_sujet`,`name`,`body`,`imageAss`,`dateCreation`,`nomDoc`,`publish`,`user_id`) values (13,18,'MAMA AFRICA (women law)','DFEGRHTYJTHGREFZDFGHJYHGFDFGHJKUJHGRFEZERTYUTIYTHRGFGRHJYKYHTGRFEGRHTJYHTGRFEEEEEERGVFEZGQREAZGTFZERGTZEHFDSVGTEQRZZGTRHYRHGFBHRGYJTYJYERHJYHREZTEGTRHJYUYTHJERHGGDSFHGHRHTYETHYERGFSDFGSTRE','1620576011_arafat.png','2021-05-09','1620576011_merise.pdf',1,67),(14,19,'NOMI is mine come see my styles','DSEFGRHYUJTHDGBSDHTJYUTHGFDSCEQRFYQUEUYZKJCBHSDKHFVBERHGBEZRGFVERHZAEGHMZKHFBLCKVSDQFZHBEGFITHEJRMGHNVBDSLKJFBVSKFDNHGZVEVHBFEZLKJHNLEZKFHNLJFMEGKBRJCLFAJZEVBFZRELNJGVMDSKJBSVHKVLSFNGRZLJDSCVSQDLFLHDS%FDSNVBJKBQDSVCKJSBDKJFVBRJ','1620576073_20210224_143218.jpg','2021-05-09','1620576073_Avant-propos.docx',1,67),(15,20,'See my style in programming','SDKFHVBNGSVJBHDSBVLNRLJEVBSFDLKNGVKJRTDBHLTNK','1620576122_OIP (2).jpg','2021-05-09','1620576122_Rapport Arthur bon.docx',1,67),(16,19,'CAMEROONIANS are African Kings','dshvbkvblbnvckdhqsbvlgfnvdskqbckzrgbnermknfvzklejrljgerngzekbnfgzrkgnfvzbekjbazhvfljdnemazkbfhcqsvdlsnmgknljergbfvdkhsqbvcvjdsbnmkerngkjbsdbvshbvfldskjvdsjbvskjbvfgrlkegnmrekngjrzgfbdkjhqsjfbezrjgtbrlzjgbrljgb','1620576214_OIP (1).jpg','2021-05-09','1620576214_contract.pdf',1,67),(17,20,'The final test','&lt;p&gt;This is &lt;strong&gt;Engel &lt;/strong&gt;Law...&lt;/p&gt;\r\n\r\n&lt;p&gt;In fact it is a PDF containing exercises on Engel&amp;#39;s law application ...&lt;/p&gt;\r\n\r\n&lt;p&gt;This is crucial for &lt;strong&gt;&lt;em&gt;BTS&lt;/em&gt;&lt;/strong&gt;...&lt;/p&gt;\r\n','1621371400_image-smartphone-mobile-desk.jpg','2021-05-18','1621371400_2011_TD1_loi_Engel.pdf',1,67),(18,19,'NOMI Arthur sur JurisActif','&lt;p&gt;fghjbqsdnvlcnqd&lt;/p&gt;\r\n','1623687986_télécharger (1).jpg','2021-06-14','1623687986_merise.pdf',1,67),(19,18,'MAMA AFRICA ','jbiuhpo','1656626471_WhatsApp Image 2022-06-07 at 08.03.30.jpeg','2022-07-01','1656626471_admin_1655927329_.pdf',1,65);

/*Table structure for table `topics` */

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `topics` */

insert  into `topics`(`id`,`name`,`description`) values (18,'Droit pénal','<p>Le droit<strong> p&eacute;na</strong>l au<em> Cameroun</em></p>\r\n'),(19,'Droit des affaires','azertyuiojhgfdsxcvbn,;kliuytrfvbn'),(20,'law','zertyuiolm');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`admin`,`username`,`email`,`password`,`created_at`) values (65,1,'juris','lnomi274@gmail.com','$2y$10$wdobF8WdNmXTAqfcQM8jOu1rMOPHbkDfBBTp6tdBogaqkeZGtRzY.','2021-03-27 13:52:59'),(67,1,'NOMI Ph.D','arthurloic57@yahoo.fr','$2y$10$JV01nDL9vLxRZxEzuCeR0esS7OUDGH1ujwrk40p59Ktf6/6z65Xxe','2021-03-31 16:19:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
