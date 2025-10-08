<?php
session_start();

// Cargar configuración
require_once 'config/config.php';

// Obtener la página solicitada
$pagina = $_GET['pagina'] ?? 'login';

// Enrutamiento simple con switch
switch($pagina) {
    case 'login':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->mostrarLogin();
        break;

    case 'procesar-login':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->procesarLogin();
        break;
    
    case 'inicioDocente':
        require_once 'controllers/DocenteController.php';
        $controller = new DocenteController();
        $controller->inicioDocente();
        break;

    default:
        echo "Página no encontrada";
}

?>