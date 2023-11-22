<?php
include("../../php/conexion.php");

if (isset($_GET['idPaciente'])) {
    $idPaciente = $_GET['idPaciente'];

    $consultaPaciente = "SELECT * FROM pacientes WHERE id_pacientes = $idPaciente";
    $resultadoPaciente = $conn->query($consultaPaciente);

    if ($resultadoPaciente->num_rows > 0) {
        $Paciente = $resultadoPaciente->fetch_assoc();

        $nombre = $Paciente['nombre'];
        $apellido = $Paciente['apellido'];
        $fechaNacimiento = $Paciente['fechaNac'];
        $direccion = $Paciente['direccion'];
        $correo = $Paciente['correo'];
        $telefono = $Paciente['telefono'];
        $enfermedad = $Paciente['enfermedad'];
    
    } else {
        echo "Paciente no encontrado";
        exit();
    }
} else {
    echo "ID de Paciente no proporcionado";
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
    <title>Modificar Paciente</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalModificarPacientes_<?php echo $idPaciente; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Modificar Paciente</h2>
            
            <form action="../../AjustaTec/php/usuario/modificarUsuario.php" method="post">

            <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
        
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

                <label for="enfermedad">Enfermedad:</label>
                <input type="text" id="enfermedad" name="enfermedad" value="<?php echo $enfermedad; ?>" required>

                <button type="submit" >Modificar</button>
            </form>

        </div>
    </div>
    
</body>
</html>
