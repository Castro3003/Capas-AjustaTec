<?php
include("../../php/conexion.php");

if (isset($_GET['idEjercicio'])) {
    $idEjercicio = $_GET['idEjercicio'];

    $consultaEjercicio = "SELECT * FROM ejercicios WHERE id_ejercicios = $idEjercicio";
    $resultadoEjercicio = $conn->query($consultaEjercicio);

    if ($resultadoEjercicio->num_rows > 0) {
        $Ejercicio = $resultadoEjercicio->fetch_assoc();

    
        $nombre = $Ejercicio['nombre_ejercicio'];
        $descripcion = $Ejercicio['descripcion_ejercicio'];
        
        
    } else {
        echo "Ejercicio no encontrado";
        exit();
    }
} else {
    echo "ID de ejercicio no proporcionado";
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
    <title>Detalles Ejercicio</title>

    <link rel="stylesheet" href="css/estiloForm.css">

</head>
<body>

<div id="myModalDetallesEjercicios_<?php echo $idEjercicio; ?>" class="modal">
   
        <div class="modal-content">
            
            <h2>Detalles Ejercicio </h2>
            
            <label>ID:</label>
            <p><b><?php echo $idEjercicio; ?></b></p>

            <label>Nombre:</label>
            <p><b><?php echo $nombre; ?></b></p>
        
            <label>Descripcion:</label>
            <p><b><?php echo $descripcion; ?></b></p>
        
            
        </div>
    </div>
    
</body>
</html>
