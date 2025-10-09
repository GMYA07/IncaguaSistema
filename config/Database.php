<?php
class Database {
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $conn = null;

    //Metodo para conectar a la base de datos
    public function conectar() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Nos ayuda a mostrar errores de la base de datos con el try catch los
            $this->conn->exec("set names utf8");                                  // parametros adentro de setAttribute

        } catch(PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
        }
        return $this->conn;
    }
}

?>
