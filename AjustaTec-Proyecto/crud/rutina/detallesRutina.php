<?php
include("../../php/conexion.php");

if (isset($_GET['idRutina'])) {
    $idRutina = $_GET['idRutina'];

    $consultaRutina = "SELECT rutina.id_rutina, rutina.nombre_rutina, rutina.descripcion_rutina, eje_rut.repeticiones, eje_rut.duracion,
    pacientes.id_pacientes, pacientes.nombre, pacientes.apellido,
    GROUP_CONCAT(ejercicios.nombre_ejercicio ORDER BY ejercicios.nombre_ejercicio ASC) as ejercicios_asignados
    FROM rutina
    JOIN pacientes ON rutina.id_pacientes = pacientes.id_pacientes
    LEFT JOIN eje_rut ON rutina.id_rutina = eje_rut.id_rutina
    LEFT JOIN ejercicios ON eje_rut.id_ejercicios = ejercicios.id_ejercicios
    GROUP BY rutina.id_rutina;";
    $resultadoRutina = $conn->query($consultaRutina);

    if ($resultadoRutina->num_rows > 0) {
        $Rutina = $resultadoRutina->fetch_assoc();

        $nombre = $Rutina['nombre_rutina'];
        $descripcion = $Rutina['descripcion_rutina'];
        $repeticiones = $Rutina['repeticiones'];
        $duracion = $Rutina['duracion'];
        $nombreP = $Rutina['nombre'];
        $apellido = $Rutina['apellido'];
        $ejercicio = $Rutina['ejercicios_asignados'];
    } else {
        echo "Rutina no encontrado";
        exit();
    }
} else {
    echo "ID de rutina no proporcionado";
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
    <title>Detalles Rutina</title>

    <link rel="stylesheet" href="css/estiloForm.css">

</head>
<body>

<div id="myModalDetallesRutinas_<?php echo $idRutina; ?>" class="modal">
   
        <div class="modal-content">
            
            <h2>Detalles Rutina</h2>
            
            <label>ID:</label>
            <p><b><?php echo $idRutina; ?></b></p>

            <label>Nombre:</label>
            <p><b><?php echo $nombre; ?></b></p>
        
            <label>Descripcion:</label>
            <p><b><?php echo $descripcion; ?></b></p>

            <label>Repeticiones:</label>
            <p><b><?php echo $repeticiones; ?></b></p>

            <label>Duracion:</label>
            <p><b><?php echo $duracion; ?></b></p>

            <label>Paciente:</label>
            <p><b><?php echo $nombreP . ' ' . $apellido; ?></b></p>

            <label>Ejercicios:</label>
            <p><b><?php echo $ejercicio; ?></b></p>
            
            
        </div>
    </div>
    
</body>
</html>
