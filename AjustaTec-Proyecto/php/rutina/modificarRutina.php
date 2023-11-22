<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idRutina = $_POST["idRutina"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    
    
    include '../conexion.php'; 

    $consultaCorreo = "SELECT nombre_rutina FROM rutina WHERE nombre_rutina = '$nombre' AND id_rutina != '$idRutina'";
    $stmtCorreo = $conn->prepare($consultaCorreo);
    $stmtCorreo->execute();
    $stmtCorreo->store_result();

    if ($stmtCorreo->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡La rutina ya existe!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtCorreo->close();
        $conn->close();
        exit();
    }


    $sql = "UPDATE rutina SET nombre_rutina = '$nombre', descripcion_rutina = '$descripcion' WHERE id_rutina = '$idRutina'";
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
