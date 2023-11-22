<?php
include("conexion.php");

session_start();
$_SESSION['login'] = false;

$correo = $_POST["correo"];
$password = $_GET["password"];

$consulta = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conn, $consulta);
$usuario = mysqli_fetch_array($resultado);

if ($usuario) {
    if ($usuario['estado'] == 'habilitado' && password_verify($password, $usuario['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];

        echo '<script>';
        echo 'sessionStorage.setItem("login", "true");';
        echo 'sessionStorage.setItem("nombre", "' . $usuario['nombre'] . '");';
        echo 'sessionStorage.setItem("apellido", "' . $usuario['apellido'] . '");';
        echo 'window.location.href = "../mainAdmin.php";';
        echo '</script>';
        exit();
    } elseif ($usuario['estado'] == 'inhabilitado') {
        echo '<script>';
        echo 'alert("¡El usuario está inhabilitado!");';
        echo 'window.location.href = "../index.html";';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("¡Contraseña incorrecta!");';
        echo 'window.location.href = "../index.html";';
        echo '</script>';
    }
} else {
    echo '<script>';
    echo 'alert("El usuario no existe!");';
    echo 'window.location.href = "../index.html";';
    echo '</script>';
}

mysqli_close($conn);
?>
