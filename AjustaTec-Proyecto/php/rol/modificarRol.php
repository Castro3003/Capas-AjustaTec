<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idRol = $_POST["idRol"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    
    
    include '../conexion.php'; 

    $consultaCorreo = "SELECT nombre_rol FROM roles WHERE nombre_rol = '$nombre' AND id_roles != '$idRol'";
    $stmtCorreo = $conn->prepare($consultaCorreo);
    $stmtCorreo->execute();
    $stmtCorreo->store_result();

    if ($stmtCorreo->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡El rol ya está existe!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtCorreo->close();
        $conn->close();
        exit();
    }


    $sql = "UPDATE roles SET nombre_rol = '$nombre', descripcion_rol = '$descripcion' WHERE id_roles = '$idRol'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    echo '<script>';
    echo 'alert("¡Actualización exitosa!");';
    echo 'window.location.href = "../../mainAdmin.php";'; 
    echo '</script>';

    exit();
}
?>
