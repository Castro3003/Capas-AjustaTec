<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    
        <link rel="stylesheet" href="css/tabla.css">
        <link rel="stylesheet" href="css/mainA2.css">
        
</head>
<body>
<header>
<h2>Registro de ejercicios en el sistema</h2>
</header>
<hr>

<div class="usuarios-container">
 <div class="search-container">
         <label for="search">Buscar ejercicios:</label>
         <input type="text" id="search" onkeyup="filtrarUsuarios()" placeholder="Ingrese nombre ">
 </div>

<?php
include("php/conexion.php");

 $consulta = "SELECT * FROM ejercicios";
 $resultado = $conn->query($consulta);
 
 if (isset($resultado) && $resultado->num_rows > 0) {
echo '
    
        <table id="myTable">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipo</th>
              
                <th>Acciones</th>
            </tr>';

            while ($fila = $resultado->fetch_assoc()) {
                $idEjercicio = $fila["id_ejercicios"];
            
    echo '<tr>
            <td>' . $fila["id_ejercicios"] . '</td>
            <td>' . $fila["nombre_ejercicio"] . '</td>
            <td>' . $fila["descripcion_ejercicio"] . '</td>
            <td>' . $fila["tipo"] . '</td>
            <td>
                      <button onclick="openDetallesEjerciciosModal(' . $idEjercicio . ')">Detalles</button>
            
            </td></tr>';
        }
    
        echo '</table>';
    } else {
        echo '<h2 style="text-align=center">No hay ejercicios registrados</h2>';
    }
    
 $conn->close();
?>
</div>

</body>
</html>
