<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

// Iniciar sesión
$router->get('/', [Controllers\LoginController::class, 'login']);
$router->post('/', [Controllers\LoginController::class, 'login']);
$router->get('/logout', [Controllers\LoginController::class, 'logout']);

// Recuperar password
$router->get('/olvide', [Controllers\LoginController::class, 'olvide']);
$router->post('/olvide', [Controllers\LoginController::class, 'olvide'] );
$router->get('/recuperar', [Controllers\LoginController::class, 'recuperar']);
$router->post('/recuperar', [Controllers\LoginController::class, 'recuperar']);

// Crear cuenta
$router->get('/crear-cuenta', [Controllers\LoginController::class, 'crear']);
$router->post('/crear-cuenta', [Controllers\LoginController::class, 'crear']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

// Area Privada
$router->get('/cita', [Controllers\CitaController::class, 'index']);
$router->get('/admin', [Controllers\LoginController::class, 'admin']);

// API de Citas
$router->get('/api/servicios', [Controllers\APIController::class, 'index']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();