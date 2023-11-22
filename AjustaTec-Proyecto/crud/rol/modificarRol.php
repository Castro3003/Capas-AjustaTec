<?php
include("../../php/conexion.php");

if (isset($_GET['idRol'])) {
    $idRol = $_GET['idRol'];

    $consultaRol = "SELECT * FROM roles WHERE id_roles = $idRol";
    $resultadoRol = $conn->query($consultaRol);

    if ($resultadoRol->num_rows > 0) {
        $Rol = $resultadoRol->fetch_assoc();

        $nombre = $Rol['nombre_rol'];
        $descripcion = $Rol['descripcion_rol'];
        
    } else {
        echo "Rol no encontrado";
        exit();
    }
} else {
    echo "ID de Rol no proporcionado";
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
    <title>Modificar rol</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalModificarRoles_<?php echo $idRol; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Modificar Rol</h2>
            
            <form action="../../AjustaTec/php/rol/modificarRol.php" method="post">

            <input type="hidden" name="idRol" value="<?php echo $idRol; ?>">
        
            <label for="nombre">Seleccionar Rol:</label>
            <select  id="nombre" name="nombre" required>
                <option value="Administrador">Administrador</option>
                <option value="Jefe de rehabilitacion">Jefe de rehabilitacion</option>
                <option value="Administrador de pacientes">Administrador de pacientes</option>
                <option value="Administrador de rutinas">Administrador de rutinas</option>
            </select>
        
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" required>
        
                <button type="submit" >Modificar</button>
            </form>

        </div>
    </div>
    
</body>
</html>
