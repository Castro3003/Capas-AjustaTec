<?php
include("../../php/conexion.php");
$idRutina = $_GET['idRutina'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar rutina</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalEliminarEjercicios_<?php echo $idRutina; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Eliminar ejercicios</h2>
            
            <form action="../../AjustaTec/php/ejercicio/eliminarEjercicio.php" method="post">

            <input type="hidden" name="idRutina" value="<?php echo $idRutina; ?>">
        
            <label>¿Seguro que quieres eliminar los ejercicios de esta rutina?</label>
                
                <button type="submit" >Eliminar</button>
            </form>

          
        </div>
    </div>
    
</body>
</html>
