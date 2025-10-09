<?php
class HomeController
{

    // Mostrar formulario de login
    public function mostrarLogin()
    {
        // Si ya está logueado, redirigir al dashboard
        if (isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '?pagina=inicioDocente');
            exit();
        }

        $titulo = 'Iniciar Sesión';
        require_once 'views/home/login.php';
    }

    // Procesar el login
    public function procesarLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($usuario) || empty($password)) {
                header('Location: ' . BASE_URL . '?pagina=login&error=2');
                exit();
            }

            require_once 'models/UsuarioModelo.php';
            $usuarioModelo = new UsuarioModelo();

            $datosUsuario = $usuarioModelo->validarLogin($usuario, $password);

            if ($datosUsuario) {
                // Guardar en sesión
                $_SESSION['id_usuario'] = $datosUsuario['id_usuario'];
                $_SESSION['nombre_usuario'] = $datosUsuario['nombre_usuario'];
                $_SESSION['apellido_usuario'] = $datosUsuario['apellido_usuario'];
                $_SESSION['nie_usuario'] = $datosUsuario['nie_usuario'];
                $_SESSION['rol'] = $datosUsuario['rol'];
                $_SESSION['user'] = $datosUsuario['user'];

                $this->redirigirSegunRol($datosUsuario['rol']);
            } else {
                header('Location: ' . BASE_URL . '?pagina=login&error=1');
                exit();
            }
        } else {
            // Si acceden directo por GET, mostrar el login
            header('Location: ' . BASE_URL . '?pagina=login');
            exit();
        }
    }

    private function redirigirSegunRol($rol) {
        switch($rol) {
            case 'Administrador':
                header('Location: ' . BASE_URL . '?pagina=inicioAdministrador');
                break;
            case 'Docente':
                header('Location: ' . BASE_URL . '?pagina=inicioDocente');
                break;
            default:
                header('Location: ' . BASE_URL . '?pagina=dashboard');
        }
        exit();
    }

    // Cerrar sesión
    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '?pagina=login&logout=1');
        exit();
    }
}
