# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.35)
# Base de données: blog
# Temps de génération: 2017-06-22 15:25:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_author` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `com_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int(11) DEFAULT NULL,
  `com_signale` tinyint(1) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  `com_delete` tinyint(1) DEFAULT NULL,
  `com_niveau` tinyint(1) DEFAULT NULL,
  `grand_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `art_id` (`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;

INSERT INTO `comment` (`com_id`, `com_author`, `com_content`, `com_date`, `parent_id`, `com_signale`, `art_id`, `com_delete`, `com_niveau`, `grand_parent_id`)
VALUES
	(1,'brunus','Dans un communiqué officiel, le gouverneur a baptisé ce transfert d’« effort extrêmement bien planifié, encore que légèrement accéléré, qui démontre la coordination des ressources de l’administration fédérale et de l’État en faveur de la population d’Alaska','2017-06-02 15:04:29',0,1,1,NULL,0,1),
	(2,'one','Le sénateur Gara a pour sa part affirmé que ce plan « plaçait l’intérêt des habitants de Salmon Bay au-delà de toute autre considération','2017-06-05 12:18:09',1,1,1,NULL,1,1),
	(3,'brunus','Salmon Bay est le premier des douze villages d’Alaska dont la réimplantation est prévue au cours des dix prochaines années.','2017-06-06 22:03:33',2,0,1,NULL,2,1),
	(116,'comment 1','<p>comment 1&nbsp;</p>','2017-06-14 23:21:33',0,NULL,8,NULL,0,116),
	(117,'s comment 1','<p>s comment 1</p>','2017-06-14 23:21:55',116,NULL,8,NULL,1,116),
	(118,'s s comment 1','<p>s s comment 1</p>','2017-06-14 23:22:17',117,NULL,8,NULL,2,116),
	(122,'Commentaire 2','Commentaire 2','2017-06-17 11:44:26',0,0,9,0,0,122),
	(123,'Commentaire 2 - 1','<p>Commentaire 2 - 1</p>','2017-06-17 11:44:44',0,NULL,9,NULL,0,123),
	(124,'Sous commentaire 2','Sous commentaire 2','2017-06-17 11:45:06',122,NULL,9,0,1,122),
	(125,'Sous commentaire 2-1','<p>Sous commentaire 2-1</p>','2017-06-17 11:45:18',123,NULL,9,NULL,1,123),
	(126,'Sous Sous commentaire 2','<p>Sous Sous commentaire 2</p>','2017-06-17 11:45:37',124,NULL,9,NULL,2,122),
	(127,'Sous Sous commentaire 2-1','<p>Sous Sous commentaire 2-1</p>','2017-06-17 11:45:52',125,NULL,9,NULL,2,123),
	(128,'sous sous sous commentaire 2','sous sous sous commentaire 2','2017-06-17 11:46:17',126,0,9,0,3,122),
	(129,'Sous Sous Sous commentaire 2-1','<p>Sous Sous Sous commentaire 2-1</p>','2017-06-17 11:46:37',127,NULL,9,NULL,3,123);

/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
