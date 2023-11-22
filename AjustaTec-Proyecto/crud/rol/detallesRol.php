<?php
include("../../php/conexion.php");

if (isset($_GET['idRol'])) {
    $idRol = $_GET['idRol'];

    $consultaRol = "SELECT roles.id_roles, roles.nombre_rol, roles.descripcion_rol,
    usuarios.id_usuario, usuarios.nombre, usuarios.apellido,
    GROUP_CONCAT(permisos.nombre_permiso ORDER BY permisos.nombre_permiso ASC) as permisos_asignados
    FROM roles
    JOIN usuarios ON roles.id_usuario = usuarios.id_usuario
    LEFT JOIN per_rol ON roles.id_roles = per_rol.id_roles
    LEFT JOIN permisos ON per_rol.id_permisos = permisos.id_permisos
    GROUP BY roles.id_roles;";
    $resultadoRol = $conn->query($consultaRol);

    if ($resultadoRol->num_rows > 0) {
        $Rol = $resultadoRol->fetch_assoc();

        $nombre = $Rol['nombre_rol'];
        $descripcion = $Rol['descripcion_rol'];
        $nombreU = $Rol['nombre'];
        $apellido = $Rol['apellido'];
        $permisos = $Rol['permisos_asignados'];
       
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
    <title>Detalles Rol</title>

    <link rel="stylesheet" href="css/estiloForm.css">

</head>
<body>

<div id="myModalDetallesRoles_<?php echo $idRol; ?>" class="modal">
   
        <div class="modal-content">
            
            <h2>Detalles Rol</h2>
            
            <label>ID:</label>
            <p><b><?php echo $idRol; ?></b></p>

            <label>Nombre:</label>
            <p><b><?php echo $nombre; ?></b></p>
        
            <label>Descripcion:</label>
            <p><b><?php echo $descripcion; ?></b></p>

            <label>Usuario:</label>
            <p><b><?php echo $nombreU . ' ' . $apellido; ?></b></p>

            <label>Permisos:</label>
            <p><b><?php echo $permisos; ?></b></p>
            
            
        </div>
    </div>
    
</body>
</html>
