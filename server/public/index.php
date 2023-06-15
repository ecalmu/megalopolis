<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

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
    '/guardarPosicion' => 'guardarPosicion',
    '/insertar' => 'poblarBD',
    '/calcularIndicadores' => 'calcularIndicadores',
    '/cerrarSesion' => 'cerrarSesion',
    '/borrarUsuario' => 'borrarUsuario',
    '/enviarEmail' => 'enviarEmail',
    '/cambiarPass' => 'cambiarPass',
    '/recuperarPass' => 'recuperarPass'
];

$env = parse_ini_file("../.env");

foreach ($env as $key => $value) {
    define($key, $value);
}

// obtener la ruta solicitada
$ruta_solicitada = $_SERVER['REQUEST_URI'];
// buscar la ruta en el array de rutas
if (array_key_exists($ruta_solicitada, $rutas)) {
    if($ruta_solicitada != '/login' && $ruta_solicitada != '/registro' && $ruta_solicitada != '/registrarUsuario' && $ruta_solicitada != '/inicioSesion' && $ruta_solicitada != '/politicaPrivacidad' 
    && $ruta_solicitada != '/recuperarPass' && $ruta_solicitada != '/enviarEmail' && $ruta_solicitada != '/cambiarPass' && $ruta_solicitada != '/inicializacion' && $ruta_solicitada != '/insertar'){
        include('../src/sesion.php');
        include('../src/conexion.php');
        include('../src/actualizarEdificios.php');
    }
    // incluir el controlador adecuado
    include_once('../src/' . $rutas[$ruta_solicitada] . '.php');
} else {
    // manejar la ruta no encontrada
    echo 'Error 404: Página no encontrada';
}