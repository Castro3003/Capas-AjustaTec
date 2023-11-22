<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["rol"];
    $descripcion = $_POST["descripcion"];
    $idUsuario = $_POST["idUsuario"];

    
    if (empty($nombre) || empty($descripcion) || empty($idUsuario)) {
        echo '<script>';
        echo 'alert("¡Por favor, completa todos los campos!");';
        echo 'window.location.href = "../../mainAdmin.php";';
        echo '</script>';
        exit();
    }

    include '../conexion.php'; 

    $consultaRol = "SELECT id_roles FROM roles WHERE nombre_rol = '$nombre' AND id_usuario = '$idUsuario'";
    $stmtRol = $conn->prepare($consultaRol);
    $stmtRol->execute();
    $stmtRol->store_result();

    if ($stmtRol->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡Este usuario ya tiene asignado ese rol!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtRol->close();
        $conn->close();
        exit();
    }


    $sql = "INSERT INTO roles VALUES ('','$nombre', '$descripcion', '$idUsuario')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo '<script>';
    echo 'alert("¡Registro exitoso!");';
    echo 'window.location.href = "../../mainAdmin.php";'; 
    echo '</script>';

    exit();
}
?>
