<?php
require_once 'config/Database.php';

class SeccionModelo
{
    private $conn;
    private $tablaSeccion = 'grado';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    //metodos
    public $id_grado;
    public $id_usuario;
    public $tipo_grado;
    public $seccion_grado;
    public $especialidad_grado;

    public function obtenerSeccionesDisponibles($idUsuario = null)
    {
        $query = "SELECT 
                id_grado,
                tipo_grado,
                seccion_grado,
                especialidad_grado
              FROM " . $this->tablaSeccion . "
              WHERE id_usuario IS NULL";

        // Si es edición, incluir también la sección actual del docente
        if ($idUsuario !== null) {
            $query .= " OR id_usuario = :id_usuario";
        }

        $query .= " ORDER BY tipo_grado, seccion_grado ASC";

        $stmt = $this->conn->prepare($query);

        if ($idUsuario !== null) {
            $stmt->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
        }

        $stmt->execute();

        return $stmt;
    }
}
