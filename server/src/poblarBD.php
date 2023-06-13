<?
include "conexion.php";
//Inserciones en la tabla usuario
mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('clara@gmail.com', 'Clara', '1234', 1200, 3000, 800, 70, 1200)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('miguel@gmail.com', '-miguel', '5678', 1500, 2500, 900, 80, 1300)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('sara@gmail.com', 'Sara', '9012', 1800, 2000, 1000, 90, 1400)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('juan@gmail.com', 'Juan', '3456', 2000, 1500, 1100, 63, 1500)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('laura@gmail.com', 'Laura', '7890', 2200, 1800, 1200, 85, 1600)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('ramon@gmail.com', 'Ramon', '1234', 2400, 2200, 1300, 75, 1700)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('beatriz@gmail.com', 'Beatriz', '5678', 2600, 1900, 1400, 85, 1800)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('raul@gmail.com', 'Raul', '9012', 2800, 2300, 1500, 95, 1900)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('patricia@gmail.com', 'Patricia', '3456', 3000, 1600, 1600, 80, 2000)");

mysqli_query($c, "INSERT INTO usuario (email, nombre, pass, dinero, comida, energia, felicidad, poblacion) 
VALUES ('lucia@gmail.com', 'Lucia', '7890', 3200, 2100, 1700, 55, 2100)");

//Inserciones en la tabla propuesta comercial
mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (100, 50, 0, 0,0,200,1)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (200, 300, 0, 0, 0, 150, 2)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (0, 0, 100, 250, 400, 0, 3)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (150, 0, 200, 0, 450, 0, 4)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (0, 250, 0, 300, 0, 400, 5)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (350, 0, 0, 0, 500, 200, 6)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (0, 400, 250, 450, 0, 0, 7)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (0, 0, 300, 400, 350, 0, 8)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (450, 350, 0, 0, 0, 300, 9)");

mysqli_query($c, "INSERT INTO propuesta_comercial (demanda_energia, demanda_dinero, demanda_comida, oferta_energia, oferta_dinero, oferta_comida, id_usuario) VALUES (0, 500, 400, 350, 0, 0, 10)");


//Inserciones en la tabla ubicacion
mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (1, 3, 'Ciudad',1)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (2, 5, 'Puesto_comercial', 2)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (4, 8, 'Ciudad', 3)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (6, 10, 'Ciudad', 4)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (1, 2, 'Puesto_comercial', 5)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (3, 6, 'Ciudad', 6)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (5, 9, 'Puesto_comercial', 7)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (7, 12, 'Ciudad', 8)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (1, 1, 'Ciudad', 9)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (3, 4, 'Puesto_comercial', 10)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (3, 5, 'Puesto_comercial', 1)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (5, 8, 'Ciudad', 2)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (7, 10, 'Puesto_comercial', 3)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (2, 2, 'Ciudad', 4)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (4, 6, 'Ciudad', 5)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (6, 9, 'Puesto_comercial', 6)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (1, 12, 'Ciudad', 7)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (3, 1, 'Ciudad', 8)");

mysqli_query($c, "INSERT INTO ubicacion (x, y, tipo, id_usuario) VALUES (5, 4, 'Puesto_comercial', 9)");

//Inserciones en la tabla tipo
mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('central nuclear', '00:20:30', 3000,200,0,4000,0,100,0,400)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('granja', '00:15:00', 1000, 500, 0, 2000, 0, 50, 0, 100)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('fabrica', '01:00:00', 3000, 2000, 100, 4000, 0, 200, 0, 300)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('mercado', '00:30:00', 2000, 1000, 200, 3000, 0, 100, 0, 150)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('granero', '00:20:00', 1500, 800, 0, 2500, 0, 80, 0, 120)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('mina de hierro', '01:30:00', 4000, 0, 300, 5000, 0, 0, 0, 400)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('parque solar', '00:45:00', 2500, 0, 600, 3500, 0, 0, 200, 300)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('biblioteca', '02:00:00', 5000, 1000, 500, 6000, 0, 0, 0, 500)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('universidad', '03:30:00', 8000, 2000, 1000, 8000, 7, 0, 0, 1000)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('instituto', '02:30:00', 6000, 1500, 800, 6000, 7, 0, 0, 800)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('parque', '00:10:00', 500, 100, 0, 1000, 0, 0, 0, 0)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('hospital', '01:30:00', 5000, 1500, 800, 5000, 7, 0, 0, 1000)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('torre de vigilancia', '00:30:00', 2000, 500, 200, 3000, 0, 0, 0, 0)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('almacen', '01:00:00', 3000, 1000, 300, 4000, 0, 0, 0, 0)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('parque acuatico', '02:00:00', 6000, 2000, 1000, 6000, 0, 0, 200, 500)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('cine', '01:30:00', 4000, 1200, 600, 4000, 0, 0, 0, 400)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('plaza', '00:20:00', 1500, 500, 0, 2000, 0, 0, 0, 0)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('estadio', '02:30:00', 7000, 2500, 1500, 7000, 6, 0, 0, 800)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('comisaria', '02:00:00', 6000, 1800, 1000, 6000, 5, 0, 0, 1000)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('gimnasio', '01:00:00', 3000, 1000, 500, 3000, 0, 0, 0, 300)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('restaurante', '01:30:00', 4000, 1500, 800, 4000, 0, 0, 300, 0)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('torre de comunicaciones', '02:30:00', 7000, 2000, 1500, 7000, 0, 0, 0, 800)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('parque tematico', '03:00:00', 8000, 2500, 2000, 8000, 0, 0, 400, 400)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('hotel', '02:30:00', 7000, 2000, 1000, 7000, 0, 0, 0, 1000)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('puerto', '03:00:00', 8000, 1500, 2500, 8000, 0, 0, 0, 600)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('teatro', '01:30:00', 5000, 1800, 600, 5000, 0, 0, 0, 300)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('estacion de tren', '02:30:00', 7000, 2000, 1500, 7000, 0, 0, 0, 800)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('zoo', '03:00:00', 8000, 2500, 1000, 8000, 0, 0, 400, 0)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('centro comercial', '02:00:00', 6000, 2000, 800, 6000, 0, 0, 300, 300)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('parque de atracciones', '03:30:00', 9000, 2500, 2000, 9000, 0, 0, 400, 400)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('estacion de autobuses', '02:00:00', 6000, 1500, 1000, 6000, 0, 0, 0, 600)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('museo', '02:30:00', 7000, 1800, 800, 7000, 0, 0, 0, 300)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('parque industrial', '03:00:00', 8000, 2000, 1500, 8000, 1, 0, 0, 500)");

mysqli_query($c, "INSERT INTO tipo (nombre, tiempo, coste_dinero, coste_comida, coste_energia, pob_requerida, edif_requeridos, efecto_dinero, efecto_comida, efecto_energia) VALUES ('biblioteca', '01:30:00', 5000, 1500, 500, 5000, 0, 0, 0, 200)");

//Inserciones en la tabla edificio
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (1, 1, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (2, 2, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (3, 3, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (4, 4, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (5, 5, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (6, 6, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (7, 7, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (8, 8, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (9, 9, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (10, 10, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (11, 1, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (12, 2, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (13, 3, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (14, 4, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (15, 5, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (16, 6, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (17, 7, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (18, 8, 'Activado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (19, 9, 'Desactivado')");
mysqli_query($c, "INSERT INTO edificio (id_tipo, id_usuario, estado) VALUES (20, 10, 'Desactivado')");

?>