<?php

require_once('../DataAccess/Connection/Conexion.php');
require_once('../DataAccess/DAO/UsuarioDAO.php');

class EliminarUsuario {
    private $usuarioDAO;
    private $conexion;

    public function __construct($conexion) {
        $this->usuarioDAO = new UsuarioDAO($conexion->obtenerConexion());
        $this->conexion = $conexion;
    }

    public function mostrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_usuario = $_POST['id_usuario'];

            $this->usuarioDAO->eliminarUsuario($id_usuario);
        }

        echo '

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Eliminar Usuario</title>
            <link rel="stylesheet" href="Estilo.css">
        </head>
        <body>
            <form action="EliminarUsuario.php" method="post">
                <label for="id_usuario">ID de Usuario a Eliminar:</label>
                <input type="text" name="id_usuario" required><br>

                <input type="submit" value="Eliminar Usuario">
            </form>
            </body>
            </html>
        ';
    }
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "crud";

$conexion = new Conexion($servername, $username, $password, $dbname);

$eliminarUsuario = new EliminarUsuario($conexion);
$eliminarUsuario->mostrar();

?>
