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

  public function obtenerUsuariosDocentes()
  {
    $sql = 'SELECT 
                u.id_usuario,
                u.nombre_usuario,
                u.apellido_usuario,
                u.nie_usuario,
                u.rol,
                u.estado_usuario,
                l.user
            FROM ' . $this->tablaUsuario . ' u
            INNER JOIN ' . $this->tablaLoggeo . ' l 
                ON u.id_usuario = l.id_usuario
            WHERE u.rol = :rol
            ORDER BY u.nombre_usuario ASC';

    $stmt = $this->conn->prepare($sql);
    $rol = 'Docente';
    $stmt->bindParam(':rol', $rol);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  public function agregarUsuario($data)
  {
    try {
      $sql = 'INSERT INTO ' . $this->tablaUsuario . '
                (
                    nombre_usuario,
                    apellido_usuario,
                    nie_usuario,
                    rol,
                    estado_usuario
                )
                VALUES(
                     :nombre_usuario,
                     :apellido_usuario,
                     :nie_usuario,
                     :rol_usuario,
                     :estado_usuario
                )
            ';

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(':nombre_usuario', $data['nombre_usuario']);
      $stmt->bindParam(':apellido_usuario', $data['apellido_usuario']);
      $stmt->bindParam(':nie_usuario', $data['nie_usuario']);
      $stmt->bindParam(':rol_usuario', $data['rol']);
      $estado = 1;
      $stmt->bindParam(':estado_usuario', $estado);


      $stmt->execute();
      $ultimoId = $this->conn->lastInsertId();

      if ($ultimoId <= 0) {
        return false;
      }

      $sql2 = 'INSERT INTO ' . $this->tablaLoggeo . '
                (
                    id_usuario,
                    user,
                    password
                )
                VALUES(
                     :id_usuario,
                     :user,
                     :pass
                )
            ';

      $stmt2 = $this->conn->prepare($sql2);
      $stmt2->bindParam(':id_usuario', $ultimoId);
      $stmt2->bindParam(':user', $data['usuario']);
      $hashedPassword = password_hash($data['contrasena'], PASSWORD_DEFAULT);
      $stmt2->bindParam(':pass', $hashedPassword);

      return $stmt2->execute();
    } catch (PDOException $e) {
      error_log("Error al agregar usuario: " . $e->getMessage());
      return false;
    }
  }

  public function cambiarEstadoUsuario($id_usuario, $estado)
  {
    try {
      $sql = 'UPDATE ' . $this->tablaUsuario . '
                SET estado_usuario = :estado
                WHERE id_usuario = :id_usuario';

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':id_usuario', $id_usuario);

      return $stmt->execute();
    } catch (PDOException $e) {
      error_log("Error al cambiar estado usuario: " . $e->getMessage());
      return false;
    }
  }
}
