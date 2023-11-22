<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $password = $_GET["password"] ?? NULL; 

    
    $passwordH = password_hash($password, PASSWORD_DEFAULT); 
    
    include '../conexion.php'; 

    $consultaCorreo = "SELECT correo FROM usuarios WHERE correo = '$correo'";
    $stmtCorreo = $conn->prepare($consultaCorreo);
    $stmtCorreo->execute();
    $stmtCorreo->store_result();

    if ($stmtCorreo->num_rows > 0) {
        echo '<script>';
    echo 'alert("¡El correo ya esta registrado!");';
    echo 'window.location.href = "../../mainAdmin.php";'; 
    echo '</script>';
        $stmtCorreo->close();
        $conn->close();
        exit();
    }

    $consultaTelefono = "SELECT telefono FROM usuarios WHERE telefono = '$telefono'";
    $stmtTelefono = $conn->prepare($consultaTelefono);
    $stmtTelefono->execute();
    $stmtTelefono->store_result();

    if ($stmtTelefono->num_rows > 0) {
        echo '<script>';
        echo 'alert("¡El telefono ya esta registrado!");';
        echo 'window.location.href = "../../mainAdmin.php";'; 
        echo '</script>';
        $stmtTelefono->close();
        $conn->close();
        exit();
    }

    $sql = "INSERT INTO usuarios VALUES('','$nombre', '$apellido', '$fechaNacimiento', '$direccion', '$correo', '$telefono', '$passwordH','habilitado')";

    
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();

    $stmt->close();

    $conn->close();


    echo '<script>';
    echo 'alert("¡Registro exitoso! ");';
    echo 'window.location.href = "../../mainAdmin.php";'; 
    echo '</script>';

exit();
   }
?>
