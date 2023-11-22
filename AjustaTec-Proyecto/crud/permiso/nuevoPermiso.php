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
    <title>Asignar Permiso</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalAsignarPermisos_<?php echo $idRol; ?>" class="modal">

    <div class="modal-content">
        
    <h2>Asignar Permisos</h2>
        <form action="../../AjustaTec/php/permiso/registrarPermiso.php" method="post">
            <input type="hidden" name="idRol" value="<?php echo $idRol; ?>">
            
            <label for="permiso">Seleccionar Permiso:</label>
            <select  id="permiso" name="permiso" required>
                <option value="1">CRUD Usuarios</option>
                <option value="2">CRUD Pacientes</option>
                <option value="3">CRUD Roles</option>
                <option value="4">CRUD Permisos</option>
                <option value="5">CRUD Ejercicios</option>
                <option value="6">CRUD Rutinas</option>
            </select>

            <button type="submit" >Asignar Permiso</button>
        </form>

    </div>
</div>


</body>
</html>
