<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idUsuario = $_POST["idUsuario"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    
    include '../conexion.php'; 

    $consultaCorreo = "SELECT id_usuario FROM usuarios WHERE correo = '$correo' AND id_usuario != '$idUsuario'";
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

    $consultaTelefono = "SELECT id_usuario FROM usuarios WHERE telefono = '$telefono' AND id_usuario != '$idUsuario'";
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

    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', fechaNac = '$fechaNacimiento', direccion = '$direccion', correo = '$correo', telefono = '$telefono' WHERE id_usuario = '$idUsuario'";
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
