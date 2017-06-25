# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.35)
# Base de données: blog
# Temps de génération: 2017-06-23 15:30:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `art_content` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `art_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `art_modified` datetime NOT NULL,
  `art_publish` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`art_id`, `art_title`, `art_content`, `art_date`, `art_modified`, `art_publish`)
VALUES
	(1,'Un oiseau nommé Jo-Jo','JUNIOR fut véritablement témoin du crash de Jo-Jo. Et de son plongeon. Accroupi dans la toundra, il était à deux doigts d’attraper une pie-grièche quand sa proie s’envola. À cet instant précis, il leva les yeux et vit l’imposante masse de Jo-Jo fendre les airs comme une sorte de gigantesque volatile, droit en direction du lac.\nÀ Salmon Bay, tout le monde était au courant que Junior avait passé l’été à essayer d’attraper une des pies qui nichaient dans les aulnes le long de la station de radio. La petite bande de broussailles, la seule chose qui ressemblât de près ou de loin à des arbres à Salmon Bay, abritait plusieurs oiseaux, et tout le monde savait que la découverte de l’oiseau écorcheur1 constituait le moment le plus excitant de la jeune carrière d’ornithologue de Junior.','2017-05-20 10:40:12','0000-00-00 00:00:00',1),
	(2,'Avant le plongeon de Jo-Jo','VALERIE était assise sur le rebord de la haute berge, les jambes pendant dans le vide. La rivière tourbillonnait à trois mètres sous ses pieds. Toutes les cinq minutes, à intervalles réguliers, morceaux imposants ou bien fine petite pluie se détachaient de la paroi de terre en contrebas pour s’effondrer dans l’eau, mais elle ne paraissait pas y prêter attention ni s’en soucier.\nElle retira la chaîne plaquée or qu’elle portait autour du cou et passa un doigt sur les lettres gravées : Classe de 2001. Elle pensa aux années passées au collège de Salmon Bay et à ses camarades, vivants ou morts. Ils étaient censés tenir au printemps une réunion pour les dix ans des anciens élèves, mais en comptant Jo-Jo, ils n’étaient plus que cinq à vivre à Salmon Bay. Six autres résidaient ailleurs. Cinq étaient enterrés au cimetière. Et il y en avait encore un par ici dans la nature. Ils ne l’avaient jamais retrouvé, même après avoir dragué la rivière pendant des semaines avec des cordes, des filets et de gros crochets d’acier.','2017-05-21 19:15:47','0000-00-00 00:00:00',1),
	(3,'Dans le lac','PANIKA posa son seau en plastique à confiture plein de boue à côté de la tête de Marcy, juste en dessous du dispensaire. D’ici quelques secondes, Jo-Jo prendrait son envol et planerait, effarouchant l’oiseau écorcheur de Junior.« La petite fille tira le couteau à beurre, qu’elle glissa soigneusement tout autour de la circonférence du récipient pour décoller les bords. Puis elle retourna le seau pour que la boue tombe en une motte parfaite en émettant un « plop ». Elle ne savait pas pourquoi, mais elle adorait ce drôle de bruit de succion un peu gluant.\nElle reprit son couteau, qu’elle planta au milieu de la motte, puis se mit à tourner en cercle. Progressivement, elle aplanit et élargit la masse de boue noire jusqu’à obtenir une sorte de crêpe plate parfaitement oblongue. Du plat de la lame, elle en lissa la surface avec attention et délicatesse.\n— J’aime que ce soit bien lisse avant de commencer, chuchota-t-elle. Voilà, commenta-t-elle, écartant le couteau et admirant le tableau noir brillant qu’elle avait créé. Tu as l’air triste, tatie. Est-ce qu’oncle Ed a encore été méchant avec toi ? Je vais te raconter une histoire, et tu te sentiras mieux.\n','2017-05-23 22:09:33','0000-00-00 00:00:00',1),
	(4,'Encore avant le plongeon de Jo-Jo','UNDERWOOD emprunta un quad et sillonna en tous sens les pistes boueuses du village, procédant aux calculs nécessaires pour élaborer une estimation du coût de la délocalisation. Le lieu n’était rien de plus qu’un bidonville, d’après les critères de Ronny, et il se refusait à baptiser autrement Salmon Bay. Pour lui, une vraie ville abritait cinémas, épiceries et bars. Une ville avait des trottoirs et des devantures. Une assiette fiscale. Des pelouses. Des routes. Des panneaux « Stop ». Salmon Bay accueillait un hall de bingo, une école, une armurerie de la Garde nationale, était affligé d’un problème sanitaire dégueulasse que tout le monde se contentait d’appeler le lac, et d’un léger problème d’érosion.\nRonny griffonna à l’encre rouge sur son carnet de notes ses premières impressions sur le village : des trucs horribles.','2017-05-26 04:55:19','0000-00-00 00:00:00',1),
	(5,'Ceux qui ne dormaient pas','IM referma doucement les portes de l’armurerie pour ne pas réveiller les vingt soldats qui dormaient encore à l’intérieur. Il avait volontairement choisi\nde placer son lit de camp dans l’entrée pour qu’aucun des hommes ne puisse lui en vouloir de ses allées et venues nocturnes. Sorti pour son second jogging du milieu de la nuit sur la piste d’atterrissage, il accueillit l’air frais avec bonheur. De l’autre côté du village, Jo-Jo venait de sombrer dans un sommeil agité. Dans son premier rêve, la barge faisait son arrivée. Seulement, ce n’était pas une barge chargée de conteneurs, mais un de ces monstrueux bateaux de croisière blancs d’Alaska, avec sur le pont des gens tirés à quatre épingles qui adressaient des signes au village. Ainsi, tandis que le rêve de Jo-Jo devenait de plus en plus fou, Tim se préparait à une nouvelle longue course.\nAu cours de sa première nuit sur place, Tim avait achevé la lecture du dernier des livres qu’il avait achetés à Anchorage.','2017-05-27 13:08:41','0000-00-00 00:00:00',1),
	(6,'Le coup de feu','<p>ELI contempla son filet de p&ecirc;che au saumon royal suspendu aux pieux sous sa maison. Il l&rsquo;avait r&eacute;par&eacute; un an auparavant, aussi celui-ci n&rsquo;avait-il pas besoin de raccommodage, mais de toute fa&ccedil;on, la p&ecirc;che au saumon royal &eacute;tait encore ferm&eacute;e. Jo-Jo l&rsquo;avait annonc&eacute; &agrave; la radio une semaine auparavant. Quelquefois, le boulot de Jo-Jo exigeait qu&rsquo;il communique de mauvaises nouvelles. Une fois encore, apr&egrave;s la fonte des glaces, les saumons royaux n&rsquo;avaient pas remont&eacute; la rivi&egrave;re pour suivre les &eacute;perlans &agrave; l&rsquo;odeur de concombre. Deux ann&eacute;es de suite, et pour ainsi dire aucun saumon royal n&rsquo;avait remont&eacute; la Salmon River pour frayer. Il se passait quelque chose dans l&rsquo;oc&eacute;an. Encore deux ans comme &ccedil;a, et le saumon royal pourrait bien dispara&icirc;tre compl&egrave;tement. Eli descendit de la v&eacute;randa, puis effleura de la main les n&oelig;uds des mailles de vingt centim&egrave;tres carr&eacute;s du filet. Il imagina l&rsquo;&eacute;norme t&ecirc;te d&rsquo;un saumon royal tentant de passer au travers. &Agrave;&nbsp;cette &eacute;poque de l&rsquo;ann&eacute;e, il aurait d&eacute;j&agrave; d&ucirc; &ecirc;tre en train de travailler au s&eacute;chage et au fumage de la douce chair orang&eacute;e huileuse, en train de la d&eacute;couper et de suspendre les grosses tranches sur les s&eacute;choirs de bois.\"</p>','2017-05-28 09:59:28','0000-00-00 00:00:00',1),
	(7,'Après le coup de feu','ANGELIC ouvrit la porte du bain de vapeur et s’engouffra à l’intérieur. Elle laissa légèrement entrouvert, pour qu’un rai de lumière vertical éclaire le fond de l’entrée du petit abri en contreplaqué.\nLes sacs y étaient, exactement là où Valerie l’avait dit. Angelic en retira dix bouteilles, qu’elle rangea soigneusement dans son sac à dos. Elle n’avait jamais eu en main une bouteille de vodka pleine. Elle en leva une à la lumière, se demandant à quoi ressemblait le goût et quel effet cela lui ferait.\nJosh et ses amis parlaient toujours de boire et de se défoncer, mais elle ne l’avait jamais vraiment vu boire, elle avait juste senti son haleine quelquefois quand il venait chez elle alors que les parents d’Angelic étaient partis au bingo. ','2017-05-30 23:07:32','0000-00-00 00:00:00',1),
	(8,'Essai pour commentaire MODIFIER','<p>Essai pour commentaire &amp; sous commentaire dgqsgqdf</p>','2017-06-14 23:20:13','0000-00-00 00:00:00',0),
	(9,'Essai pour commentaire 2','<p>Essai pour commentaire 2h,olmmi::mop&ugrave;p</p>','2017-06-17 11:43:55','0000-00-00 00:00:00',1),
	(10,'Essai commentaire 3','<p>Essai commentaire 3</p>\r\n<p>&nbsp;</p>','2017-06-23 14:58:38','0000-00-00 00:00:00',1);

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;


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


# Affichage de la table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_password` varchar(88) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`user_id`, `user_date`, `user_name`, `user_firstname`, `user_pseudo`, `user_password`)
VALUES
	(6,'2017-06-23 16:37:06','BRUN','Bruno','brunus','0c3a0294f2cd9f06e6452f293e4e035da575e66f'),
	(7,'2017-06-23 16:43:32','Leconte','Bruno','one','ad782ecdac770fc6eb9a62e44f90873fb97fb26b');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
