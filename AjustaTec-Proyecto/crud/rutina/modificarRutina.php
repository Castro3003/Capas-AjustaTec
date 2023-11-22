<?php
include("../../php/conexion.php");

if (isset($_GET['idRutina'])) {
    $idRutina = $_GET['idRutina'];

    $consultaRutina = "SELECT * FROM rutina WHERE id_rutina = $idRutina";
    $resultadoRutina = $conn->query($consultaRutina);

    if ($resultadoRutina->num_rows > 0) {
        $Rutina = $resultadoRutina->fetch_assoc();

        $nombre = $Rutina['nombre_rutina'];
        $descripcion = $Rutina['descripcion_rutina'];
        
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
    <title>Modificar Rutina</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalModificarRutinas_<?php echo $idRutina; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Modificar Rutina</h2>
            
            <form action="../../AjustaTec/php/rutina/modificarRutina.php" method="post">

            <input type="hidden" name="idRutina" value="<?php echo $idRutina; ?>">
        
            <label for="nombre">Nombre rutina:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" required>
        
                <button type="submit" >Modificar</button>
            </form>

        </div>
    </div>
    
</body>
</html>
