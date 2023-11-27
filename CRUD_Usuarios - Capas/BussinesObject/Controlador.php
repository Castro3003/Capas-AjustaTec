<?php

require_once('../DataAccess/Connection/Conexion.php');
require_once('../DataAccess/DAO/UsuarioDAO.php');
require_once('../DataAccess/DTO/Usuario.php');

class Controlador {
    private $usuarioDAO;
    private $conexion;

    public function __construct($conexion) {
        $this->usuarioDAO = new UsuarioDAO($conexion->obtenerConexion());
        $this->conexion = $conexion;
    }

    public function agregarUsuario($usuario) {
        return $this->usuarioDAO->insertarUsuario($usuario);
    }

    public function actualizarUsuario($usuario) {
        return $this->usuarioDAO->actualizarUsuario($usuario);
    }

    public function eliminarUsuario($id_usuario) {
        return $this->usuarioDAO->eliminarUsuario($id_usuario);
    }
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "crud";

$conexion = new Conexion($servername, $username, $password, $dbname);

$controlador = new Controlador($conexion);


?>
