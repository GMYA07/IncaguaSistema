<?php
    Class AdministradorController
    {
        // Verificar que esté logueado (lo usamos en todos los métodos)
        private function verificarSesion()
        {
            if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] != 'Administrador') {
                header('Location: ' . BASE_URL . '?pagina=login');
                exit();
            }
        }

        // Mostrar dashboard
        public function inicioAdministrador()
        {
            $this->verificarSesion();

            $titulo = 'Inicio Administrador';
            $usuario = $_SESSION['nombre_usuario'];

            require_once 'views/administrador/inicioAdministrador.php';
        }
    }
?>