<?php

require_once('../DataAccess/Connection/Conexion.php');
require_once('../DataAccess/DAO/UsuarioDAO.php');

class ModificarUsuario {
    private $usuarioDAO;
    private $conexion;

    public function __construct($conexion) {
        $this->usuarioDAO = new UsuarioDAO($conexion->obtenerConexion());
        $this->conexion = $conexion;
    }

    public function mostrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = new Usuario();
            $usuario->id_usuario = $_POST['id_usuario'];
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->fechaNac = $_POST['fechaNac'];
            $usuario->direccion = $_POST['direccion'];
            $usuario->correo = $_POST['correo'];
            $usuario->telefono = $_POST['telefono'];

            $this->usuarioDAO->actualizarUsuario($usuario);
        }

        echo '

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modificar Usuario</title>
            <link rel="stylesheet" href="Estilo.css">
        </head>
        <body>
            <form action="ModificarUsuario.php" method="post">
                <label for="id_usuario">ID de Usuario:</label>
                <input type="text" name="id_usuario" required><br>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br>

                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" required><br>

                <label for="fechaNac">Fecha de Nacimiento:</label>
                <input type="date" name="fechaNac" required><br>

                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" required><br>

                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="correo" required><br>

                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" required><br>

                <input type="submit" value="Modificar Usuario">
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

$modificarUsuario = new ModificarUsuario($conexion);
$modificarUsuario->mostrar();

?>
