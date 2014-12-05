/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.32 : Database - cuestionario_mvc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`cuestionario_mvc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cuestionario_mvc`;

/*Table structure for table `calificacion` */

DROP TABLE IF EXISTS `calificacion`;

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `calificacion` varchar(10) DEFAULT NULL,
  `respuestas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `calificacion` */

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(500) DEFAULT NULL,
  `respuesta` varchar(10) DEFAULT NULL,
  `resultado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `preguntas` */

insert  into `preguntas`(`idpregunta`,`pregunta`,`respuesta`,`resultado`) values (1,'&iquest Qui&eacute;n gan&oacute el Bal&oacuten de Oro en 1976?','3','1'),(2,'¿En qué año nació Pelé?','8','1'),(3,'¿Quién ganó la Liga de Campeones de 1993?','9','1'),(4,'¿Cuántas ligas ganó Paco Gento del Real Madrid?','13','1'),(5,'¿Quién ganó el mundial de 1974?','17','1'),(6,'¿Qué selección ha llegado más veces a la final de la Eurocopa?','23','1'),(7,'¿Cuál es el Club Más antiguo de España?','28','1'),(8,'¿De qué equipo salieron los jugadores Gento, Santillana y Quique Setien?','31','1'),(9,'¿Con qué camiseta debutó Zidane?','33','1'),(10,'¿En qué ciudad jugaron las selecciones de Argentina-Brasil en el Mundial del 78?','40','1'),(11,'¿Dónde se disputó la Copa Confederaciones en el año 1999?','43','1'),(12,'¿Cuál es el nombre de pila de Liberiano Weah?','47','1'),(13,'¿En cuál de estos equipos jugó Fernando Morena?','49','1'),(14,'¿Contra qué selección Lionel Messi convirtió su primer gol oficial con la camiseta de la selección Argentina?','54','1'),(15,'¿Quién fue el goleador de la Eurocopa de Portugal 2004?','57','1'),(16,'¿Quien convirtio el gol de Inglaterra en los cuartos de final del mundial 2002, que perdio 2-1 con Brasil?','63','1'),(17,'¿Cuántos goles marcó Kaká en su primera temporada en Brasil?','66','1'),(18,'¿Frente a que equipo marcó su primer gol el Kun Agüero con el Atletico de Madrid?','70','1'),(19,'¿Cuántos goles marcó Raúl en su primera temporada en el Real Madrid C en 33 partidos?','75','1'),(20,'¿Quién ganó la 1ª liga española?','78','1'),(21,'¿Qué pais fue el primero en ganar una Copa Mundial?','84','1'),(22,'¿En que año se jugo la primera copa America?','85','1');

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `idrespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(50) DEFAULT NULL,
  `idpregunta` int(11) NOT NULL,
  PRIMARY KEY (`idrespuesta`),
  KEY `idpregunta` (`idpregunta`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idpregunta`) REFERENCES `preguntas` (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

/*Data for the table `respuestas` */

insert  into `respuestas`(`idrespuesta`,`respuesta`,`idpregunta`) values (1,'Johan Cruy',1),(2,'George Bes',1),(3,'Franz Beck',1),(4,'Michel Pla',1),(5,'1939 ',2),(6,'1945 ',2),(7,'1942 ',2),(8,'1940 ',2),(9,'Olympique ',3),(10,'AC Milan',3),(11,'Ajax Amste',3),(12,'Benfica ',3),(13,'12',4),(14,'9',4),(15,'15',4),(16,'7',4),(17,'Alemania Federal',5),(18,'Inglaterra',5),(19,'Brasil ',5),(20,'Argentina ',5),(21,'España',6),(22,'Francia ',6),(23,'Alemania ',6),(24,'Unión Sovietica',6),(25,'Real Madrid',7),(26,'Athletic de Bilbao ',7),(27,'Fútbol Club Barcelona',7),(28,'Recreativo',7),(29,'Barça ',8),(30,'Real Madrid',8),(31,'Racing de Santander ',8),(32,'Sevilla',8),(33,'AS Cannes ',9),(34,'Real Madrid',9),(35,'Juventus ',9),(36,'O. Marsell',9),(37,'Buenos Aires',10),(38,'Mendoza ',10),(39,'Cordoba ',10),(40,'Rosario ',10),(41,'Francia',11),(42,'España ',11),(43,'Corea-Japón',11),(44,'México ',11),(45,'John',12),(46,'Charles ',12),(47,'George ',12),(48,'Buchanan \r',12),(49,'Boca ',13),(50,'River',13),(51,'Nacional',13),(52,'Santos \r\n\r',13),(53,'Croacia',14),(54,'Venezuela ',14),(55,'Serbia y M',14),(56,'Bolivia ',14),(57,'Baros ',15),(58,'Van Nistel',15),(59,'Charisteas',15),(60,'Klose ',15),(61,'Gerrard ',16),(62,'Heskey ',16),(63,'Owen ',16),(64,'Beckham ',16),(65,'12',17),(66,'8',17),(67,'5',17),(68,'22',17),(69,'Betis ',18),(70,'Osasuna ',18),(71,'Celta ',18),(72,'Ath. Bilba',18),(73,'28',19),(74,'46',19),(75,'71',19),(76,'67',19),(77,'Real Madri',20),(78,'Barcelona ',20),(79,'Real Unión',20),(80,'Athlétic',20),(81,'Brasil',21),(82,'Argentina ',21),(83,'Italia ',21),(84,'Uruguay \r\n',21),(85,'1916',22),(86,'1920',22),(87,'1924',22),(88,'1935',22);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) DEFAULT NULL,
  `contasena` varchar(20) DEFAULT NULL,
  `puntuacion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`usuario`,`contasena`,`puntuacion`) values (3,'DaliaTovar','123456','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
