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
    <title>Asignar Rol</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalAsignarRoles_<?php echo $idUsuario; ?>" class="modal">

    <div class="modal-content">
        
        <h2>Asignar Rol</h2>
        
        <form action="../../AjustaTec/php/rol/registrarRol.php" method="post">
            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
            
            <label for="rol">Seleccionar Rol:</label>
            <select  id="rol" name="rol" required>
                <option value="Administrador">Administrador</option>
                <option value="Jefe de rehabilitacion">Jefe de rehabilitacion</option>
                <option value="Administrador de pacientes">Administrador de pacientes</option>
                <option value="Administrador de rutinas">Administrador de rutinas</option>
                
            </select>
            
            <label for="descripcion">Descripcion:</label>
                <input style="" type="text" id="descripcion" name="descripcion" required>
        

            <button type="submit" >Asignar Rol</button>
        </form>

    </div>
</div>


</body>
</html>
