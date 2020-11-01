drop database if exists mariadb;
create database mariadb;

use mariadb;

DROP TABLE IF EXISTS productos;
create table productos (
	id int not null auto_increment primary key,
	folio varchar(20) not null,
	nombre varchar(100) not null,
	color varchar(100) not null,
	costo decimal(5, 2) not null,
	unidad_medida varchar(100) not null,
	fecha_baja date default null
);
