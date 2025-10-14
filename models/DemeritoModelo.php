<?php
require_once 'config/Database.php';

class DemeritoModelo
{
    private $conn;
    private $tablaDemerito = 'Demeritos';
    private $tablaDemerito_Detalles = 'Detalles_Demeritos';

    //Propiedades Tabla Demeritos;
    public $id_demerito; //<-- se usa tambien para tabla detalles demerito
    public $tipo_demerito;
    public $descripcion_demerito;

    //Propiedades Tabla Demeritos_Detalles
    public $id_detalle_demerito;
    public $id_usuario;
    public $id_alumno;
    public $comentario_demerito;
    public $fecha_demerito;
    public $estado_demerito;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    

}

?>
