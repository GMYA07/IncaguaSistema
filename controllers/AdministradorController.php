<?php
    Class AdministradorController
    {
        // Verificar que esté logueado (lo usamos en todos los métodos)
        private function verificarSesion()
        {
            if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'administrador') {
                header('Location: ' . BASE_URL . '?pagina=login');
                exit();
            }
        }

        // Mostrar dashboard
        public function inicioAdministrador()
        {
            $this->verificarSesion();

            $titulo = 'Inicio Administrador';
            $usuario = $_SESSION['usuario'];

            require_once 'views/administrador/inicioAdministrador.php';
        }
    }
?>