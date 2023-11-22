<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../conexion.php';

    if (isset($_POST["idRol"]) && isset($_POST["permiso"])){
        $idRol = $_POST["idRol"];
        $idPermiso = $_POST["permiso"];
        
        $consultaExistenciaRol = "SELECT * FROM roles WHERE id_roles = $idRol";
        $stmtExistenciaRol = $conn->prepare($consultaExistenciaRol);
        $stmtExistenciaRol->execute();
        $resultExistenciaRol = $stmtExistenciaRol->get_result();

        if ($resultExistenciaRol->num_rows == 0) {
            echo '<script>';
            echo 'alert("¡El rol especificado no existe!");';
            echo 'window.location.href = "../../mainAdmin.php";';
            echo '</script>';
            $stmtExistenciaRol->close();
            $conn->close();
            exit();
        }

        $stmtExistenciaRol->close();

        $consultaExistenciaPermiso = "SELECT * FROM per_rol WHERE id_roles = $idRol AND id_permisos = $idPermiso";
        $stmtExistenciaPermiso = $conn->prepare($consultaExistenciaPermiso);
        $stmtExistenciaPermiso->execute();
        $resultExistenciaPermiso = $stmtExistenciaPermiso->get_result();

        if ($resultExistenciaPermiso->num_rows > 0) {
            echo '<script>';
            echo 'alert("¡El permiso ya está asignado a este rol!");';
            echo 'window.location.href = "../../mainAdmin.php";';
            echo '</script>';
            $stmtExistenciaPermiso->close();
            $conn->close();
            exit();
        }

        $stmtExistenciaPermiso->close();

        $sql = "INSERT INTO per_rol VALUES ('','$idPermiso', '$idRol')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->close();

        $conn->close();

        echo '<script>';
        echo 'alert("¡Permiso asignado exitosamente!");';
        echo 'window.location.href = "../../mainAdmin.php";';
        echo '</script>';

        exit();
    } else {
        echo '<script>';
        echo 'alert("¡Faltan datos para asignar el permiso!");';
        echo 'window.location.href = "../../mainAdmin.php";';
        echo '</script>';
        exit();
    }
} else {
    echo '<script>';
    echo 'alert("¡Solicitud no válida!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
}
?>
