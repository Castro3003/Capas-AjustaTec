<?php
include("../../php/conexion.php");

    $idPaciente = $_GET['idPaciente'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Rutina</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalAsignarRutinas_<?php echo $idPaciente; ?>" class="modal">

    <div class="modal-content">
        
        <h2>Asignar Rutina</h2>
        
        <form action="../../AjustaTec/php/rutina/registrarRutina.php" method="post">

            <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
            
            <label for="nombre">Nombre rutina:</label>
                <input style="" type="text" id="nombre" name="nombre" required>
            
            <label for="descripcion">Descripcion:</label>
                <input style="" type="text" id="descripcion" name="descripcion" required>
        

            <button type="submit" >Asignar Rutina</button>
        </form>

    </div>
</div>


</body>
</html>
