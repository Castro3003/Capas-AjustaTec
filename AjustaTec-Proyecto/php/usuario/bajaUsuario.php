<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST["idUsuario"];

    $sql = "UPDATE usuarios SET estado = 'inhabilitado' WHERE id_usuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    echo '<script>';
    echo 'alert("¡Usuario inhabilitado!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
} else {
    echo "Acceso no permitido";
    exit();
}
?>
