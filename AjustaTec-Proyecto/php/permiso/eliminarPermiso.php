<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: index.html');
    exit();
}

include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $idRol = $_POST["idRol"];

    
    $consultaEliminarPermisos = "DELETE FROM per_rol WHERE id_roles = $idRol";
    $conn->query($consultaEliminarPermisos);

    
    $conn->close();

    echo '<script>';
    echo 'alert("Permisos eliminados!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
} else {
    echo "Solicitud no válida.";
    exit();
}
?>
