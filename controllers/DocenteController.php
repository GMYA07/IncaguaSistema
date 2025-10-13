<?php
class DocenteController
{

    // Verificar que esté logueado (lo usamos en todos los métodos)
    private function verificarSesion()
    {
        if (!isset($_SESSION['nombre_usuario']) || $_SESSION['rol'] != 'Docente') {
            header('Location: ' . BASE_URL . '?pagina=login');
            exit();
        }
    }

    // Mostrar dashboard
    public function inicioDocente()
    {
        $this->verificarSesion();

        $titulo = 'Inicio Docente';
        $usuario = $_SESSION['nombre_usuario'];

        require_once 'views/docente/inicioDocente.php';
    }

    // Listar alumnos
    public function listarAlumnos()
    {
        $this->verificarSesion();

        $titulo = 'Lista de Alumnos';
        $usuario = $_SESSION['usuario'];

        // Aquí después cargarías el modelo
        // require_once 'models/AlumnoModelo.php';
        // $alumnoModelo = new AlumnoModelo();
        // $alumnos = $alumnoModelo->obtenerTodos();

        require_once 'views/docente/alumnos.php';
    }

    // Registrar demeritos
    public function registrarDemeritos()
    {
        $this->verificarSesion();

        $titulo = 'Registro de Demeritos';
        $usuario = $_SESSION['usuario'];

        require_once 'views/docente/demeritos.php';
    }


    public function listarDemeritos(){
            $this->verificarSesion();

            $titulo = 'Lista de Demeritos';
            require_once 'views/docente/crudDemeritos.php';
        }
}

?>
