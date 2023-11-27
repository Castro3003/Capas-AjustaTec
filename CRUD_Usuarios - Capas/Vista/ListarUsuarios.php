<?php

require_once('../DataAccess/Connection/Conexion.php');
require_once('../DataAccess/DAO/UsuarioDAO.php');

class ListarUsuarios {
    private $usuarioDAO;
    private $conexion;

    public function __construct($conexion) {
        $this->usuarioDAO = new UsuarioDAO($conexion->obtenerConexion());
        $this->conexion = $conexion;
    }

    public function mostrar() {
        $usuarios = $this->usuarioDAO->obtenerUsuarios();

        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Usuarios</title>
            <link rel="stylesheet" href="Estilo.css">
        </head>
        <body>
        <table border="1">';
        echo '<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Fecha Nac.</th><th>Dirección</th><th>Correo</th><th>Teléfono</th></tr>';
        foreach ($usuarios as $usuario) {
            echo '<tr>';
            echo '<td>' . $usuario->id_usuario . '</td>';
            echo '<td>' . $usuario->nombre . '</td>';
            echo '<td>' . $usuario->apellido . '</td>';
            echo '<td>' . $usuario->fechaNac . '</td>';
            echo '<td>' . $usuario->direccion . '</td>';
            echo '<td>' . $usuario->correo . '</td>';
            echo '<td>' . $usuario->telefono . '</td>';
            echo '</tr>';
        }
        echo '</table>
        
        </body>
        </html>';
    }
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "crud";

$conexion = new Conexion($servername, $username, $password, $dbname);

$listarUsuarios = new ListarUsuarios($conexion);
$listarUsuarios->mostrar();

?>
