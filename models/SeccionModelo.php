<?php
require_once 'config/Database.php';

class SeccionModelo
{
    private $conn;
    private $tablaSeccion = 'Seccion';

    public function __construct()
    {
        $database = new Database();
    }

    //metodos
    public $id_grado;
    public $id_usuario;
    public $tipo_grado;
    public $seccion_grado;
    public $especialidad_grado;

    public function obtenerSecciones()
    {
        $query = "SELECT 
                    id_grado,
                    id_usuario,
                    tipo_grado,
                    seccion_grado,
                    especialidad_grado
                  FROM " . $this->tablaSeccion . "
                  ORDER BY id_grado DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
