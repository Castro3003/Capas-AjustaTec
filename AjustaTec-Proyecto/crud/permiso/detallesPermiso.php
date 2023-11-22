<?php
include("../../php/conexion.php");

if (isset($_GET['idPermiso'])) {
    $idPermiso = $_GET['idPermiso'];

    $consultaPermiso = "SELECT * FROM permisos WHERE id_permisos = $idPermiso";
    $resultadoPermiso = $conn->query($consultaPermiso);

    if ($resultadoPermiso->num_rows > 0) {
        $Permiso = $resultadoPermiso->fetch_assoc();

    
        $nombre = $Permiso['nombre_permiso'];
        $descripcion = $Permiso['descripcion_permiso'];
        
        
    } else {
        echo "Permiso no encontrado";
        exit();
    }
} else {
    echo "ID de Permiso no proporcionado";
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

<div id="myModalDetallesPermisos_<?php echo $idPermiso; ?>" class="modal">
   
        <div class="modal-content">
            
            <h2>Detalles Paciente</h2>
            
            <label>ID:</label>
            <p><b><?php echo $idPermiso; ?></b></p>

            <label>Nombre:</label>
            <p><b><?php echo $nombre; ?></b></p>
        
            <label>Descripcion:</label>
            <p><b><?php echo $descripcion; ?></b></p>
        
            
        </div>
    </div>
    
</body>
</html>
