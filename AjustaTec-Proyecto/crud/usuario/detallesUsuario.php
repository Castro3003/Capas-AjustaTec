<?php
include("../../php/conexion.php");

if (isset($_GET['idUsuario'])) {
    $idUsuario = $_GET['idUsuario'];

    $consultaUsuario = "SELECT * FROM usuarios WHERE id_usuario = $idUsuario";
    $resultadoUsuario = $conn->query($consultaUsuario);

    if ($resultadoUsuario->num_rows > 0) {
        $usuario = $resultadoUsuario->fetch_assoc();

        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellido'];
        $fechaNacimiento = $usuario['fechaNac'];
        $direccion = $usuario['direccion'];
        $correo = $usuario['correo'];
        $telefono = $usuario['telefono'];
        $estado = $usuario['estado'];

        $consultaRol = "SELECT nombre_rol FROM roles WHERE id_usuario = " . $usuario['id_usuario'];
        $resultadoRol = $conn->query($consultaRol);

        if ($resultadoRol->num_rows > 0) {
            $rol = $resultadoRol->fetch_assoc()['nombre_rol'];
        } else {
            $rol = "Rol no asignado";
        }
    } else {
        echo "Usuario no encontrado";
        exit();
    }
} else {
    echo "ID de usuario no proporcionado";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Usuario</title>

    <link rel="stylesheet" href="css/estiloForm.css">

</head>
<body>

<div id="myModalDetallesUsuarios_<?php echo $idUsuario; ?>" class="modal">
   
        <div class="modal-content">
            
            <h2>Detalles usuario</h2>
            
            <label>ID:</label>
            <p><b><?php echo $idUsuario; ?></b></p>

            <label>Nombre:</label>
            <p><b><?php echo $nombre; ?></b></p>
        
            <label>Apellido:</label>
            <p><b><?php echo $apellido; ?></b></p>
        
            <label>Fecha de nacimiento:</label>
            <p><b><?php echo $fechaNacimiento; ?></b></p>

            <label>Direccion:</label>
            <p><b><?php echo $direccion; ?></b></p>
        
            <label>Correo:</label>
            <p><b><?php echo $correo; ?></b></p>
        
            <label>Telefono:</label>
            <p><b><?php echo $telefono; ?></b></p>
            
            <label>Rol:</label>
            <p><b><?php echo $rol; ?></b></p>

            <label>Estado:</label>
            <p><b><?php echo $estado; ?></b></p>
            
        </div>
    </div>
    
</body>
</html>
