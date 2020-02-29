-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: mysql.info.unicaen.fr    Database: 21306226_bd
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb7u1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heroes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `firm` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heroes`
--

LOCK TABLES `heroes` WRITE;
/*!40000 ALTER TABLE `heroes` DISABLE KEYS */;
INSERT INTO `heroes` VALUES (1,'Batman','DC','Véritable identité : Bruce Wayne<br /><br/>\r\nSes parents se sont fait tués sous ses yeux pendant son enfance.<br /><br/>\r\nMétier : Riche industriel (propriétaire de Wayne Entreprise)<br /><br/>\r\nMission : Combattre les crimes dans la ville de Gotham City.<br /><br/>\r\nSuper pouvoirs : Batman n\'a pas de super-pouvoirs. Pour compenser, il a une excellente condition physique (il pratique les arts martiaux) et il est super-intelligent. Il a également un équipement de très haute technologie comme la célébrissime Batmobile. Et surtout, il a Alfred et Robin.<br/><br/>','http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_batman_52ab7a8c79da39.68474144.jpg?itok=iHwyI5Vh','CrazyBane','2016-04-03 12:04:59'),(2,'Superman','DC','Superman est né sur la planète Krypton sous le nom de Kal-El. Krypton est alors menacé de destruction, ses parents ont juste le temps de l\'enrouler dans une cape, de le placer dans un vaisseau spatial et de l\'expédier sur Terre juste avant l\'explosion...<br /><br/>\r\nVéritable identité : Kal-El puis Clark (rebaptisé par la famille Kent pour passer inapercu à l\'école)<br /><br/>\r\nMétier : journaliste au Daily Planet<br /><br/>\r\nMission : Aide et défend ceux qui sont en difficulté et combat l’injustice.<br/><br/>\r\nSuper pouvoirs : il a une force surhumaine, court super vite, entend à des kilomètres, peut congeler avec son souffle, brûle avec ses yeux, voit à travers les murs... <br/>Le seul hic, c\'est qu\'il suffit de lui mettre de la Kryptonite sous le nez pour le mettre KO.<br/><br/>','http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_superman_52ab9ab32a25e2.57621569.jpg?itok=Y-ED_ba9','uftos','2016-04-03 12:04:32'),(3,'Spiderman','Marvel','C’est l’homme araignée et le personnage le plus populaire de l’univers des bandes dessinées et dessins animés. Suite à une expérience, il est mordu par une araignée radioactive. Il devient alors Spiderman.<br/><br/>\r\nVéritable identité : Peter Parker<br/><br/>\r\nMétier : photographe<br/><br/>\r\nSuper pouvoirs : il a une force et une agilité hors du commun et la capacité de coller aux parois avec ses pieds et ses mains car il tisse des toiles. Il ressent aussi les dangers qui arrivent.<br/><br/>','http://i.annihil.us/u/prod/marvel/i/mg/9/30/538cd33e15ab7/standard_xlarge.jpg','CrazyBane','2016-04-03 12:03:59'),(4,'Hulk','Marvel','Bruce Banner a été exposé aux rayons Gamma en faisant mumuse avec des bombes américaines, depuis il se transforme en gros monstre vert dès qu\'il est énervé ou un peu stressé.<br/><br/>\r\nVéritable identité : Dr. Bruce Banner<br/><br/>\r\nMétier : scientifique<br/><br/>\r\nSuper pouvoirs : Hulk n\'a pas de super-pouvoirs à proprement parlé mais lorsqu\'il se transforme il acquiert une force phénoménale et une capacité de régénération. Il est invincible et peut faire des bons de 1km ! Et plus il est énervé, plus il est fort. Sa rage est totalement incontrôlable et il détruit tout sur son passage, parfois même ses alliés.<br/><br/>','http://i.annihil.us/u/prod/marvel/i/mg/5/a0/538615ca33ab0/standard_xlarge.jpg','uftos','2016-04-03 12:07:55'),(5,'Green Lantern','DC','Le pouvoir de Green Lantern (la lanterne verte) a eu plusieurs avatars. En fait,ce sont des extra-terrestres qui se sont amusés à dissimuler des anneaux magiques dans tout l\'univers. Ceux qui portent cet anneau peuvent bénéficier de ses pouvoirs. Mais attention, pour cela il faut être super courageux, avoir le cœur pur, tout ca tout ca.<br/><br/>\r\nVéritable identité : Il n\'y a pas un mais 7 200 Green Lantern dans toute la Galaxie, répartis par secteurs. Alan Scott, Hal Jordan (qui a fait l\'objet d\'un film en 2011), et Kyle Rayner sont les plus connus.<br/><br/>\r\nMétier :  Hal Jordan était pilote d\'essai, Kyle Rayner était dessinateur. Pour les autres, on ne sait pas trop.<br/><br/>\r\nMission : Sauver la planète des méchants extra-terrestres et accessoirement filer un coup de main à ses copains de la Ligue des Justiciers.<br/><br/>\r\nSuper pouvoirs : ses pouvoirs lui sont conférés par son anneau. Grâce à lui il peut voler, respirer dans l\'espace, traduire automatiquement n\'importe quelle ','http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_greenlantern_52ab8925eb4700.01944682.jpg?itok=Z2jtIWLs','uftos','2016-04-03 12:13:27'),(6,'Iron Man','Marvel','Iron Man n’a pas réellement de supers pouvoirs. Seule son armure fait de lui un être exceptionnel et super puissant.<br/><br/>\r\nVéritable identité : Anthony \"Tony\" Stark<br/><br/>\r\nMétier : il travaillait dans la fabrication d’armes pour le gouvernement américain. Et c’est lors d’un déplacement durant lequel son coeur va mal suite à une explosion, qu’il se fabrique une armure équipée de transistors.<br/><br/>\r\nMission : combat le mal (et fait des expériences dans son labo)<br/><br/>\r\nSuper pouvoirs : c’est grâce à son armure, qui est pour lui un nouveau corps, qu’il acquiert une force inimaginable. Mais c’est surtout grâce à ce qu’il a à la place du cœur, le plastron, qu’il a tous ces pouvoirs.<br/><br/>','https://i.annihil.us/u/prod/marvel/i/mg/6/a0/55b6a25e654e6/standard_xlarge.jpg','CrazyBane','2016-04-03 12:17:08'),(7,'Wonder Woman','DC','Wonder Woman est une véritable princesse Amazone, fille de la Reine Hippolyte. Elle est venue sur Terre pour voir du pays. Elle est forte, belle et intelligente. <br/><br/>\r\nVéritable identité : Wonder Woman n\'a pas d\'identité cachée. C\'est véritablement la Princesse Diana ! Elle assume.<br/><br/>\r\nMétier : Ambassadrice amazone dans notre monde.<br/><br/>\r\nMission :  Sauveuse de l\'humanité (à plein temps).<br/><br/>\r\nSuper pouvoirs :  super-force, vol et super-vitesse, télépathie animale, capacité de régénération, projection astrale,...<br/><br/>','http://media.dcentertainment.com/sites/default/files/styles/character_thumb_160x160/public/CharThumb_215x215_wonderwoman_52ab9eca102af8.44572969.jpg?itok=nyor_9I8','uftos','2016-04-03 12:20:47'),(8,'Wolverine','Marvel','Il se démarque des autres héros par sa violence. Il est le seul a enfreindre la règle des X-Men, il tue alors que c’est interdit. Il est très courageux et l’affrontement ne lui fait pas peur.<br/><br/>\r\nSuper pouvoirs : ses sens sont extrêmement développés. Il a aussi le pouvoir d’auto-guérison et ses propres blessures se cicatrisent très vite. Il est aussi capable de reconstituer l’intégralité d’un corps. Mais il a malgré tout des points faibles comme l’Epée de Muramasa qui annule son pouvoir d’auto-guérison et il redoute les mutants disposant d’un pouvoir magnétique.<br/><br/>','http://i.annihil.us/u/prod/marvel/i/mg/2/60/537bcaef0f6cf/standard_xlarge.jpg','CrazyBane','2016-04-03 12:24:02'),(9,'Le Fauve','Marvel','C’est l’élément stable et sérieux du groupe XMen et il est doté d’une impressionnante culture générale.<br/><br/>\r\nVéritable identité : Henry Philip McCoy<br/><br/>\r\nSuper pouvoirs : il possède une force surhumaine qui lui permet de soulever ou d’exercer une pression inimaginable. D’autre part, c’est son agilité, ses réflexes, son endurance et sa rapidité qui permettent de dire qu’il est totalement supérieur aux humains. Ses sens sont différents de ceux des humains car il est un expert en mutation et dans l’évolution biologique.<br/><br/>','https://i.annihil.us/u/prod/marvel/i/mg/6/40/537ba156b62e6/standard_xlarge.jpg','Lawoue','2016-04-03 12:27:47'),(10,'La Femme Invisible','Marvel','Elle a un pouvoir que tout le monde souhaiterait avoir : être invisible.<br/><br/>\r\nVéritable identité : Jane Richards<br/><br/>\r\nSuper pouvoir : au delà de devenir invisible, elle peut générer des champs de force et de protection. Elle peut aussi rendre visible des choses qui étaient jusque là invisibles. Elle a le don de contrôler les champs de force pour se protéger ou protéger les autres.<br/><br/>','http://i.annihil.us/u/prod/marvel/i/mg/6/a0/52695b9cd40b6/standard_xlarge.jpg','MiLow','2016-04-03 12:31:30');
/*!40000 ALTER TABLE `heroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comptes`
--

DROP TABLE IF EXISTS `comptes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comptes` (
  `login` varchar(15) NOT NULL DEFAULT '',
  `mdp` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'skin/super-icons/aquaman.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comptes`
--

LOCK TABLES `comptes` WRITE;
/*!40000 ALTER TABLE `comptes` DISABLE KEYS */;
INSERT INTO `comptes` VALUES ('CrazyBane','$2y$10$f4JutW2HnPUDHNM0SBfcdugagT.fEdNVfBOgnb.wmpFFa75w/G/R6','admin','skin/super-icons/dead-pool.png','2016-04-02 17:28:28'),('Lawoue','$2y$10$2TPk/MKCwqWa2LO19Sm7VOYvqU2P4FbnKPY1Rgvk2BF8XfFrzz/uG','user','skin/super-icons/wonder-woman.png','2016-04-02 17:45:01'),('MiLow','$2y$10$84maPP742BMbprz0ui9GKOCawYX5dEkQsEcprmkNw8Wpug8AjsbNa','user','skin/super-icons/captain-america.png','2016-04-03 11:20:37'),('uftos','$2y$10$8hf1FKJFsK8sc1bW9YsI0ufkODNRAYukCFRh.6GxF86CMgkTEBx1q','admin','skin/super-icons/green-arrow.png','2016-04-02 17:28:28');
/*!40000 ALTER TABLE `comptes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-03 16:40:31
