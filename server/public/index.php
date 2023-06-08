<?php
$rutas = [
    '/' => 'inicio',
    '/non-initial' => 'non-initial',
    '/api/example-endpoint' => 'example-endpoint',
    '/inicializacion' => 'inicializacionBD',
    '/edificios' => 'edificios',
    '/comercio' => 'comercio',
    '/rankings' => 'rankings',
    '/mapa' => 'mapa',
    '/generarMapa' => 'generarMapa',
    '/construir' => 'construirEdificio',
    '/login' => 'login',
    '/registro' => 'registro',
    '/registrarUsuario' => 'registrarUsuario',
    '/inicioSesion' => 'inicioSesion',
    '/avisoLegal' => 'avisoLegal',
    '/politicaPrivacidad' => 'politicaPrivacidad',
    '/politicaCookies' => 'politicaCookies',
    '/insertar' => 'poblarBD',
    '/guardarPosicion' => 'guardarPosicion'

];

$env = parse_ini_file("../.env");

foreach ($env as $key => $value) {
    define($key, $value);
}

// obtener la ruta solicitada
$ruta_solicitada = $_SERVER['REQUEST_URI'];
// buscar la ruta en el array de rutas
if (array_key_exists($ruta_solicitada, $rutas)) {
    // incluir el controlador adecuado
    include_once('../src/' . $rutas[$ruta_solicitada] . '.php');
} else {
    // manejar la ruta no encontrada
    echo 'Error 404: Página no encontrada';
}