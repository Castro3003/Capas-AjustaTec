<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST["idUsuario"];

    $sql = "DELETE FROM usuarios WHERE id_usuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    echo '<script>';
    echo 'alert("¡Usuario eliminado!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
} else {
    echo "Acceso no permitido";
    exit();
}
?>