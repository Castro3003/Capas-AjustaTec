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
        $password = $usuario['password'];
    
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
    <title>Modificar Usuario</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalModificarUsuarios_<?php echo $idUsuario; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Modificar usuario</h2>
            
            <form action="../../AjustaTec/php/usuario/modificarUsuario.php" method="post">

            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
        
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
        
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $fechaNacimiento; ?>" required>
        
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" required>
        
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>
        
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required>

                <button type="submit" >Modificar</button>
            </form>

        </div>
    </div>
    
</body>
</html>
