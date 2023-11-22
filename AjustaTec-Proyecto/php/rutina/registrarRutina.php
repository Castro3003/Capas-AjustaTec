<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $idPaciente = $_POST["idPaciente"];

    
    if (empty($nombre) || empty($descripcion) || empty($idPaciente)) {
        echo '<script>';
        echo 'alert("¡Por favor, completa todos los campos!");';
        echo 'window.location.href = "../../mainAdmin.php";';
        echo '</script>';
        exit();
    }

    include '../conexion.php'; 

    $consultaRol = "SELECT id_rutina FROM rutina WHERE nombre_rutina = '$nombre' AND id_pacientes = '$idPaciente'";
    $stmtRol = $conn->prepare($consultaRol);
    $stmtRol->execute();
    $stmtRol->store_result();

    if ($stmtRol->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡Este paciente ya tiene asignado esa rutina!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtRol->close();
        $conn->close();
        exit();
    }


    $sql = "INSERT INTO rutina VALUES ('','$nombre', '$descripcion', '$idPaciente')";
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
