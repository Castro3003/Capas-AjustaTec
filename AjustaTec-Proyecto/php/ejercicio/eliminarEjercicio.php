<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: index.html');
    exit();
}

include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $idRutina = $_POST["idRutina"];

    
    $consultaEliminarEjercicios = "DELETE FROM eje_rut WHERE id_rutina = $idRutina";
    $conn->query($consultaEliminarEjercicios);

    
    $conn->close();

    echo '<script>';
    echo 'alert("Ejercicios eliminados!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
} else {
    echo "Solicitud no válida.";
    exit();
}
?>
