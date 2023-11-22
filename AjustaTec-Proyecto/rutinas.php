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
    <h2>Registro de rutinas en el sistema</h2>
</header>
<hr>

<div class="usuarios-container">
    <div class="search-container">
        <label for="search">Buscar rutinas:</label>
        <input type="text" id="search" onkeyup="filtrarUsuarios()" placeholder="Ingrese nombre ">
    </div>

    <?php
    include("php/conexion.php");

    $consulta = "SELECT rutina.id_rutina, rutina.nombre_rutina, rutina.descripcion_rutina, eje_rut.repeticiones, eje_rut.duracion,
    pacientes.id_pacientes, pacientes.nombre, pacientes.apellido,
    GROUP_CONCAT(ejercicios.nombre_ejercicio ORDER BY ejercicios.nombre_ejercicio ASC) as ejercicios_asignados
    FROM rutina
    JOIN pacientes ON rutina.id_pacientes = pacientes.id_pacientes
    LEFT JOIN eje_rut ON rutina.id_rutina = eje_rut.id_rutina
    LEFT JOIN ejercicios ON eje_rut.id_ejercicios = ejercicios.id_ejercicios
    GROUP BY rutina.id_rutina;";
    $resultado = $conn->query($consulta);
    
    if (isset($resultado) && $resultado->num_rows > 0) {
        echo '
            
        <table id="myTable">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Repeticiones</th>
                <th>Duracion</th>
                <th>Id Paciente</th>
                <th>Paciente</th>
                <th>Ejercicios</th>
                <th>Acciones</th>
            </tr>';

        while ($fila = $resultado->fetch_assoc()) {
            $idRutina = $fila["id_rutina"];
            echo '<tr>
                    <td>' . $fila["id_rutina"] . '</td>
                    <td>' . $fila["nombre_rutina"] . '</td>
                    <td>' . $fila["descripcion_rutina"] . '</td>
                    <td>' . $fila["repeticiones"] . '</td>
                    <td>' . $fila["duracion"] . '</td>
                    <td>' . $fila["id_pacientes"] . '</td>
                    <td>' . $fila["nombre"] . ' ' . $fila["apellido"] . '</td>
                    <td>' . $fila["ejercicios_asignados"] . '</td>
                    <td>
                        <button onclick="openDetallesRutinasModal(' . $idRutina . ')">Detalles</button>
                        <button onclick="openModificarRutinasModal(' . $idRutina . ')">Modificar</button>
                        <button onclick="openEliminarRutinasModal(' . $idRutina . ')">Eliminar</button>
                        <br>
                        <button onclick="openEliminarEjerciciosModal(' . $idRutina . ')">Eliminar ejercicios</button>
                        <br>
                        <button onclick="openAsignarEjerciciosModal(' . $idRutina . ')">Asignar ejercicios</button>
                    </td>
                </tr>';
        }

        echo '</table>';
    } else {
        echo '<h2 style="text-align=center">No hay rutinas registrados</h2>';
    }
    
    $conn->close();
    ?>
</div>

</body>
</html>
