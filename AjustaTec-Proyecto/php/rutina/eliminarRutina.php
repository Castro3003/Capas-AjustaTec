<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: index.html');
    exit();
}

include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idRutina = $_POST["idRutina"];
    
    $consultaEliminarRutinas = "DELETE FROM eje_rut WHERE id_rutina = $idRutina";
    $conn->query($consultaEliminarRutinas);

    
    $consultaEliminarRutinaPacientes = "DELETE FROM rutina WHERE id_rutina = $idRutina";
    $conn->query($consultaEliminarRutinaPacientes);

    $conn->close();
    echo '<script>';
    echo 'alert("Rutina eliminada!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
} else {
    echo "Solicitud no válida.";
    exit();
}
?>
