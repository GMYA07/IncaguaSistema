<?php
class HomeController {
    
    // Mostrar formulario de login
    public function mostrarLogin() {
        // Si ya está logueado, redirigir al dashboard
        if(isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '?pagina=inicioDocente');
            exit();
        }
        
        $titulo = 'Iniciar Sesión';
        require_once 'views/home/login.php';
    }
    
    // Procesar el login
    public function procesarLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Validación simple (después conectarás con BD)
            if ($usuario == 'docente' && $password == '123') {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['rol'] = 'docente';
                
                // Redireccionar al dashboard
                header('Location: ' . BASE_URL . '?pagina=inicioDocente');
                exit();
            } else {
                // Volver al login con error
                header('Location: ' . BASE_URL . '?pagina=login&error=1');
                exit();
            }
        } else {
            // Si acceden directo por GET, mostrar el login
            header('Location: ' . BASE_URL . '?pagina=login');
            exit();
        }
    }
    
    // Cerrar sesión
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '?pagina=login&logout=1');
        exit();
    }
}

?>