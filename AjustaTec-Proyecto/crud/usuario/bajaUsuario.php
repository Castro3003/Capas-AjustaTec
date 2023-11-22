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

<div id="myModalBajaUsuarios_<?php echo $idUsuario; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Inhabilitar usuario</h2>
            
            <form action="../../AjustaTec/php/usuario/bajaUsuario.php" method="post">

            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
        
            <label>¿Seguro que quieres Inhabilitar este usuario?</label>
                
                <button type="submit" >Inhabilitar</button>
            </form>

          
        </div>
    </div>
    
</body>
</html>
