<?php
require_once 'config/Database.php';

class AlumnoModelo
{
    private $conn;
    private $tablaAlumno = 'Alumno';

    //Propiedades Alumno
    public $id_alumno;
    public $id_grado;
    public $nie_alumno;
    public $nombres_alumno;
    public $apellidos_alumno;
    public $estado_alumno;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }
}
