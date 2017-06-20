<?php
//Conexion con la Base de Datos
include ("conexion.php");

//Crear tabla nmusuarios##########################################################################################
<<<SQL

CREATE TABLE `nmusuarios` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'identificador del Usuario',
  `username` varchar(20) NOT NULL COMMENT 'Nombre de Usuario',
  `password` varchar(100) NOT NULL COMMENT 'Contraseña del Usuario',
  `email` varchar(35) NOT NULL COMMENT 'Email registrado por el Usuario',
  `fecha` date NOT NULL COMMENT 'Fecha de Registro del Usuario',
  `permisos` int(2) NOT NULL COMMENT 'Permisos de acceso del usuario',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='Usuarios Registrados en el Sistema'

SQL;

//Crear tabla de logs#############################################################################################
<<<SQL

CREATE TABLE `nmlog` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `utc` int(2) NOT NULL COMMENT 'Registro del tiempo Universal',
  `anno` int(2) NOT NULL COMMENT 'Año de Registro',
  `mes` int(2) NOT NULL COMMENT 'Mes de Registro',
  `dia` int(2) NOT NULL COMMENT 'Dia de Registro',
  `hora` int(2) NOT NULL COMMENT 'Hora de Registro',
  `minuto` int(2) NOT NULL COMMENT 'Minutos del Registro',
  `segundo` int(2) NOT NULL COMMENT 'Segundos del Registro',
  `ip` varchar(50) NOT NULL COMMENT 'IP de Acceso',
  `navegador` varchar(100) NOT NULL COMMENT 'Navegador usado para el Acceso',
  `usuario` varchar(20) NOT NULL COMMENT 'Nombre del Usuario que Accesa al Sistema',
  `password` varchar(100) DEFAULT NULL COMMENT 'Contraseña del Usuario que ingreso al Sistema',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

SQL;


/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */



?>