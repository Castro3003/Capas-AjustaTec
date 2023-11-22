<?php
include("../../php/conexion.php");
$idRol = $_GET['idRol'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Rol</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalEliminarRoles_<?php echo $idRol; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Eliminar Rol</h2>
            
            <form action="../../AjustaTec/php/rol/eliminarRol.php" method="post">

            <input type="hidden" name="idRol" value="<?php echo $idRol; ?>">
        
            <label>¿Seguro que quieres eliminar este Rol?</label>
                
                <button type="submit" >Eliminar</button>
            </form>

          
        </div>
    </div>
    
</body>
</html>
