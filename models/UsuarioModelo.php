<?php
require_once 'config/Database.php';

class UsuarioModelo
{
    private $conn;
    private $tablaUsuario = 'Usuario';
    private $tablaLoggeo = 'Loggeo';

    // Propiedades de Usuario
    public $id_usuario;
    public $nombre_usuario;
    public $apellido_usuario;
    public $nie_usuario;
    public $rol;
    public $estado_usuario;

    // Propiedades de Loggeo
    public $id_loggueo;
    public $user;
    public $password;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function validarLogin($user, $password)
    {
        $query = "SELECT 
                    u.id_usuario,
                    u.nombre_usuario,
                    u.apellido_usuario,
                    u.nie_usuario,
                    u.rol,
                    u.estado_usuario,
                    l.id_loggueo,
                    l.user,
                    l.password
                  FROM " . $this->tablaUsuario . " u
                  INNER JOIN " . $this->tablaLoggeo . " l 
                    ON u.id_usuario = l.id_usuario
                  WHERE l.user = :user 
                    AND u.estado_usuario = 1
                  LIMIT 1";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Verificar la contraseña
            if (password_verify($password, $row['password'])) {
                return $row; // Login exitoso
            }
        }

        return false; // Usuario o contraseña incorrectos
    }
}
