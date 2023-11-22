<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idPaciente = $_POST["idPaciente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $enfermedad = $_POST["enfermedad"];
    
    include '../conexion.php'; 

    $consultaCorreo = "SELECT id_pacientes FROM pacientes WHERE correo = '$correo' AND id_pacientes != '$idPaciente'";
    $stmtCorreo = $conn->prepare($consultaCorreo);
    $stmtCorreo->execute();
    $stmtCorreo->store_result();

    if ($stmtCorreo->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡El correo ya está registrado!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtCorreo->close();
        $conn->close();
        exit();
    }

    $consultaTelefono = "SELECT id_pacientes FROM pacientes WHERE telefono = '$telefono' AND id_pacientes != '$idPaciente'";
    $stmtTelefono = $conn->prepare($consultaTelefono);
    $stmtTelefono->execute();
    $stmtTelefono->store_result();

    if ($stmtTelefono->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡El teléfono ya está registrado!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtTelefono->close();
        $conn->close();
        exit();
    }

    $sql = "UPDATE pacientes SET nombre = '$nombre', apellido = '$apellido', fechaNac = '$fechaNacimiento', direccion = '$direccion', correo = '$correo', telefono = '$telefono', enfermedad = '$enfermedad' WHERE id_pacientes = '$idPaciente'";
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
