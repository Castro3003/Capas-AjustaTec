<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../conexion.php';

    if (isset($_POST["idRutina"]) && isset($_POST["ejercicio"])){
        $idRutina = $_POST["idRutina"];
        $idEjercicio = $_POST["ejercicio"];
        $Repeticiones = $_POST["repetiones"];
        $Duracion = $_POST["duracion"];
        

        $sql = "INSERT INTO eje_rut VALUES ('','$idEjercicio', '$idRutina', '$Repeticiones','$Duracion')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->close();

        $conn->close();

        echo '<script>';
        echo 'alert("!Ejercicio asignado exitosamente!");';
        echo 'window.location.href = "../../mainAdmin.php";';
        echo '</script>';

        exit();
    } else {
        echo '<script>';
        echo 'alert("¡Faltan datos para asignar el ejercicio!");';
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
