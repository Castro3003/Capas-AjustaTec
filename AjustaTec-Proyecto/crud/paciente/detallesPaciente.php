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
        $estado = $Paciente['estado'];
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
    <title>Detalles Paciente</title>

    <link rel="stylesheet" href="css/estiloForm.css">

</head>
<body>

<div id="myModalDetallesPacientes_<?php echo $idPaciente; ?>" class="modal">
   
        <div class="modal-content">
            
            <h2>Detalles Paciente</h2>
            
            <label>ID:</label>
            <p><b><?php echo $idPaciente; ?></b></p>

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

            <label>Enfermedad:</label>
            <p><b><?php echo $enfermedad; ?></b></p>
            
            <label>Estado:</label>
            <p><b><?php echo $estado; ?></b></p>
            
        </div>
    </div>
    
</body>
</html>
