<?php

require_once('../DataAccess/Connection/Conexion.php');
require_once('../DataAccess/DAO/UsuarioDAO.php');

class AgregarUsuario {
    private $usuarioDAO;
    private $conexion;

    public function __construct($conexion) {
        $this->usuarioDAO = new UsuarioDAO($conexion->obtenerConexion());
        $this->conexion = $conexion;
    }

    public function mostrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->nombre = $_POST['nombre'];
            $nuevoUsuario->apellido = $_POST['apellido'];
            $nuevoUsuario->fechaNac = $_POST['fechaNac'];
            $nuevoUsuario->direccion = $_POST['direccion'];
            $nuevoUsuario->correo = $_POST['correo'];
            $nuevoUsuario->telefono = $_POST['telefono'];

            $this->usuarioDAO->insertarUsuario($nuevoUsuario);
        }

        echo '

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="../Vista/Estilo.css">
</head>
<body>
            <form action="AgregarUsuario.php" method="post">
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

                <input type="submit" value="Agregar Usuario">
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

$agregarUsuario = new AgregarUsuario($conexion);
$agregarUsuario->mostrar();

?>
