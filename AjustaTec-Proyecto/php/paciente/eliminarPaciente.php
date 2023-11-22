<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPaciente = $_POST["idPaciente"];

    $sql = "DELETE FROM pacientes WHERE id_pacientes = $idPaciente";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $conn->close();

    echo '<script>';
    echo 'alert("Paciente eliminado!");';
    echo 'window.location.href = "../../mainAdmin.php";';
    echo '</script>';
    exit();
} else {
    echo "Acceso no permitido";
    exit();
}
?>