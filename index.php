<?php
session_start();

// Cargar configuración
require_once 'config/config.php';

// Obtener la página solicitada
$pagina = $_GET['pagina'] ?? 'login';

// Enrutamiento simple con switch
switch ($pagina) {
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

    case 'inicioAdministrador':
        require_once 'controllers/AdministradorController.php';
        $controller = new AdministradorController();
        $controller->inicioAdministrador();
        break;

    case 'logout':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->logout();
        break;

    case 'listarAlumnos':
        require_once 'controllers/AdministradorController.php';
        $controller = new AdministradorController();
        $controller->listarAlumno();
        break;
    case 'listarDocentes':
        require_once 'controllers/AdministradorController.php';
        $controller = new AdministradorController();
        $controller->listarDocentes();
        break;

    case 'listarDemeritos_Docente':
        require_once 'controllers/DocenteController.php';
        $controller = new DocenteController();
        $controller->listarDemeritos();
        break;

    case 'agregarDocente':
        require_once 'controllers/AdministradorController.php';
        $controller = new AdministradorController();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataDocente = [
                'nombre_usuario' => $_POST['nombre'],
                'apellido_usuario' => $_POST['apellidos'],
                'nie_usuario' => $_POST['nie'],
                'id_grado' => $_POST['seccion'],
                'usuario' => $_POST['usuario'],
                'contrasena' => $_POST['contrasena'],
                'rol' => 'Docente'
            ];
            $controller->agregarDocente($dataDocente);
            break;
        }

        break;

    case 'editarDocente':
        require_once 'controllers/AdministradorController.php';
        $controller = new AdministradorController();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataDocente = [
                'id_usuario' => $_POST['id_docente'],
                'nombre_usuario' => $_POST['nombre'],
                'apellido_usuario' => $_POST['apellidos'],
                'nie_usuario' => $_POST['nie'],
                'id_grado' => !empty($_POST['seccion']) ? $_POST['seccion'] : null,
                'usuario' => $_POST['usuario'],
                'rol' => 'Docente'
            ];

            // Solo agregar contraseña si se proporcionó
            if (!empty($_POST['contrasena'])) {
                $dataDocente['contrasena'] = $_POST['contrasena'];
            }
            $controller->editarDocente($dataDocente);
            break;
        }

        break;

    case 'cambiarEstadoDocente':

        require_once 'controllers/AdministradorController.php';
        $controller = new AdministradorController();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id_docente'];
            $estadoActual = $_POST['estado_actual'];

            // Cambiar al estado opuesto
            $nuevoEstado = ($estadoActual == 1) ? 0 : 1;

            $controller->cambiarEstadoDocente($id, $nuevoEstado);
            break;
        }

        break;


    default:
        echo "Página no encontrada";
}
