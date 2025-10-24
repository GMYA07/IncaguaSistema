<?php
require_once 'models/UsuarioModelo.php';
require_once 'models/SeccionModelo.php';

class AdministradorController
{
    private $tablaUsuario = 'Usuario';
    private $tablaLogueo = 'Loggeo';
    private $modeloUsuario;
    private $modeloSeccion;

    public function __construct()
    {
        $this->modeloUsuario = new UsuarioModelo();
        $this->modeloSeccion = new SeccionModelo();
    }

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

    public function agregarDocente($dataDocente)
    {
        $this->verificarSesion();

        $titulo = 'Docentes';

        $msg = $this->modeloUsuario->agregarUsuario($dataDocente) ? 'agregado' : 'error';

        // Redirect a listar docentes con el mensaje
        header('Location: ' . BASE_URL . '?pagina=listarDocentes&msg=' . $msg);
        exit();
    }

    public function editarDocente($dataDocente){
        $this->verificarSesion();

        $titulo = 'Docentes';

        $msg = $this->modeloUsuario->editarUsuario($dataDocente) ? 'actualizado' : 'error';

        // Redirect a listar docentes con el mensaje
        header('Location: ' . BASE_URL . '?pagina=listarDocentes&msg=' . $msg);
        exit();
    }

    public function cambiarEstadoDocente($idDocente,$estadoActual)
    {

        $this->verificarSesion();
        $titulo = 'Docentes';
        $msg = $this->modeloUsuario->cambiarEstadoUsuario($idDocente, $estadoActual) ? 'cambiado' : 'error';

        // Redirect a listar docentes con el mensaje
        header('Location: ' . BASE_URL . '?pagina=listarDocentes&msg=' . $msg);
        exit();
    }

    public function listarAlumno()
    {

        $this->verificarSesion();

        $titulo = 'Alumnos';
        require_once 'views/administrador/crudAlumnos.php';
    }

    public function listarDocentes()
    {
        $this->verificarSesion();

        $titulo = 'Docentes';
        $secciones = $this->modeloSeccion->obtenerSeccionesDisponibles();
        $docentes  = $this->modeloUsuario->obtenerUsuariosDocentes();

        require_once 'views/administrador/crudDocentes.php';
    }
}
