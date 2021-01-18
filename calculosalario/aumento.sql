# Host: localhost  (Version 5.5.24-log)
# Date: 2019-07-28 21:48:26
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "salarial"
#

DROP TABLE IF EXISTS `salarial`;
CREATE TABLE `salarial` (
  `cedula` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT NULL,
  `hijos` int(11) DEFAULT NULL,
  `sueldo` float DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "salarial"
#

INSERT INTO `salarial` VALUES ('103250752','Eduardo ',6,20000000,'O',26090000),('503750420','victor',5,1000000,'O',1375000),('504280321','josue',2,8000000,'V',8830000);
