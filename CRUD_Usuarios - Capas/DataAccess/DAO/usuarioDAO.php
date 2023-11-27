<?php

require_once('../DataAccess/Connection/Conexion.php');
require_once('../DataAccess/DTO/Usuario.php');

class UsuarioDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertarUsuario($usuario) {
        $sql = "INSERT INTO usuarios (nombre, apellido, fechaNac, direccion, correo, telefono)
                VALUES ('{$usuario->nombre}', '{$usuario->apellido}', '{$usuario->fechaNac}',
                        '{$usuario->direccion}', '{$usuario->correo}', '{$usuario->telefono}')";

        return $this->conn->query($sql);
    }

    public function actualizarUsuario($usuario) {
        $sql = "UPDATE usuarios
                SET nombre = '{$usuario->nombre}', apellido = '{$usuario->apellido}',
                    fechaNac = '{$usuario->fechaNac}', direccion = '{$usuario->direccion}',
                    correo = '{$usuario->correo}', telefono = '{$usuario->telefono}'
                WHERE id_usuario = '{$usuario->id_usuario}'";

        return $this->conn->query($sql);
    }

    public function eliminarUsuario($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_usuario = '{$id_usuario}'";

        return $this->conn->query($sql);
    }

    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conn->query($sql);

        $usuarios = array();
        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->id_usuario = $row['id_usuario'];
            $usuario->nombre = $row['nombre'];
            $usuario->apellido = $row['apellido'];
            $usuario->fechaNac = $row['fechaNac'];
            $usuario->direccion = $row['direccion'];
            $usuario->correo = $row['correo'];
            $usuario->telefono = $row['telefono'];
            $usuarios[] = $usuario;
        }

        return $usuarios;
    }
}

?>
