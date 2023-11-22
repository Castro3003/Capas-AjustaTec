<?php
include("../../php/conexion.php");
$idUsuario = $_GET['idUsuario'];

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

<div id="myModalEliminarUsuarios_<?php echo $idUsuario; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Eliminar usuario</h2>
            
            <form action="../../AjustaTec/php/usuario/eliminarUsuario.php" method="post">

            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
        
            <label>¿Seguro que quieres eliminar este usuario?</label>
                
                <button type="submit" >Eliminar</button>
            </form>

          
        </div>
    </div>
    
</body>
</html>
