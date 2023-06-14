<?
   	include "conexion.php";
	   mysqli_query($c,"DROP DATABASE megalopolis");
	//Creo la base de datos Megalopolis
	if (!mysqli_query($c,"CREATE DATABASE IF NOT EXISTS megalopolis")) {
		echo mysqli_error($c);
	}
	echo utf8_encode('Base de datos creada').'<br>';

    //Selecciono la Base de Datos que voy a usar
	mysqli_query($c,"use megalopolis");
	echo utf8_encode('Base de datos puesta en uso').'<br>';

	//Creo la tabla usuario
	mysqli_query($c,"CREATE TABLE IF NOT EXISTS usuario (
		id_usuario INT(5) AUTO_INCREMENT,
		email VARCHAR(50) NOT NULL,
		nombre VARCHAR(30) NOT NULL,
		pass VARCHAR(70) NOT NULL,
		dinero INT(10) DEFAULT 1000,
		comida INT(10) DEFAULT 1000,
		energia INT(10) DEFAULT 1000,
		felicidad INT(3) DEFAULT 100,
		poblacion INT(10) DEFAULT 1000,
		fechaMod INT(11),
		token VARCHAR(15),
        PRIMARY KEY (id_usuario),
		CONSTRAINT UC_Usuario UNIQUE (email,nombre)
        )");

	echo utf8_encode('Tabla usuario creada').'<br>';

    //Creo la tabla propuesta_comercial
	mysqli_query($c,"CREATE TABLE IF NOT EXISTS propuesta_comercial (
		id_propuesta INT(10) AUTO_INCREMENT, 
		demanda_energia INT(10),
		demanda_dinero INT(10),
		demanda_comida INT(10),
		oferta_energia INT(10),
		oferta_dinero INT(10),
		oferta_comida INT(10),
		id_usuario INT(5),
		PRIMARY KEY (id_propuesta),
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
        )");

	echo utf8_encode('Tabla propuesta_comercial creada').'<br>';

    //Creo la tabla ubicacion
	mysqli_query($c,"CREATE TABLE IF NOT EXISTS ubicacion (
		x INT(5), 
		y INT(5),
		tipo VARCHAR(16),
		id_usuario INT(5),
		PRIMARY KEY (x, y),
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
        CHECK (tipo='Ciudad' or tipo='Puesto_comercial')
        )");

	echo utf8_encode('Tabla ubicacion creada').'<br>';
    
    //Creo la tabla tipo
	mysqli_query($c,"CREATE TABLE IF NOT EXISTS tipo (
		id_tipo INT(10) AUTO_INCREMENT,
		nombre VARCHAR(50),
		tiempo TIME,
		coste_dinero INT(7),
		coste_comida INT(7),
		coste_energia INT(7),
		pob_requerida INT(7),
		edif_requeridos INT(7),
		efecto_dinero INT(7),
		efecto_comida INT(7),
		efecto_energia INT(7),
        PRIMARY KEY (id_tipo)
        )");

	echo utf8_encode('Tabla tipo creada').'<br>';

    //Creo la tabla edificio
	mysqli_query($c,"CREATE TABLE IF NOT EXISTS edificio (
		id_edificio INT(10) AUTO_INCREMENT,
		estado VARCHAR(11),
		id_usuario INT(5),
		id_tipo INT(10),
		disponibilidad INT(1),
		construccion TIMESTAMP,
        PRIMARY KEY (id_edificio),
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
        FOREIGN KEY (id_tipo) REFERENCES tipo(id_tipo),
        CHECK (estado='Activado' or estado='Desactivado')
        )");

	echo utf8_encode('Tabla edificio creada').'<br>';

	//Creo la tabla datos
	mysqli_query($c,"CREATE TABLE IF NOT EXISTS ubicacion (
		clave INT(10), 
		valor INT(10),
		PRIMARY KEY (clave)
        )");
	echo utf8_encode('Tabla datos creada').'<br>';
?>