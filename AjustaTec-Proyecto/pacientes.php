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
<h2>Registro de pacientes en el sistema</h2>
</header>
<hr>

<div class="usuarios-container">
 <div class="search-container">
         <label for="search">Buscar pacientes:</label>
         <input type="text" id="search" onkeyup="filtrarUsuarios()" placeholder="Ingrese nombre o apellido">
         <a href="#" class="btn-link" onclick="openRegistroPacientesModal()">Registrar Nuevo Paciente</a> 
 </div>

<?php
include("php/conexion.php");

 $consulta = "SELECT 
 p.id_pacientes,
 p.nombre,
 p.apellido,
 p.fechaNac,
 p.direccion,
 p.correo,
 p.telefono,
 p.enfermedad,
 p.estado,
 r.nombre_rutina
FROM pacientes p
LEFT JOIN rutina r ON p.id_pacientes = r.id_pacientes;
";
 $resultado = $conn->query($consulta);
 
 if (isset($resultado) && $resultado->num_rows > 0) {
echo '
    
        <table id="myTable">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Enfermedad</th>
                <th>Rutina</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>';

            while ($fila = $resultado->fetch_assoc()) {
                $idPaciente = $fila["id_pacientes"];
                $estadoPaciente = $fila["estado"];
                $nombreRutina = $fila["nombre_rutina"];
    echo '<tr>
            <td>' . $fila["id_pacientes"] . '</td>
            <td>' . $fila["nombre"] . '</td>
            <td>' . $fila["apellido"] . '</td>
            <td>' . $fila["fechaNac"] . '</td>
            <td>' . $fila["direccion"] . '</td>
            <td>' . $fila["correo"] . '</td>
            <td>' . $fila["telefono"] . '</td>
            <td>' . $fila["enfermedad"] . '</td>
            <td>' . ($nombreRutina ? $nombreRutina : '<button onclick="openAsignarRutinasModal(' . $idPaciente . ')">Asignar Rutina</button>') . '</td>
            <td>' . $fila["estado"] . '</td>
            
            <td>';
            if ($estadoPaciente == 'habilitado') {
                echo '<button onclick="openDetallesPacientesModal(' . $idPaciente . ')">Detalles</button>
                      <button onclick="openModificarPacientesModal(' . $idPaciente . ')">Modificar</button>
                      <button onclick="openEliminarPacientesModal(' . $idPaciente . ')">Eliminar</button>
                      <button onclick="openBajaPacientesModal(' . $idPaciente . ')">Inhabilitar</button>';
            } else {
                echo '<button onclick="openDetallesPacientesModal(' . $idPaciente . ')">Detalles</button>
                      <button onclick="openAltaPacientesModal(' . $idPaciente . ')">Habilitar</button>';
            }
    
            echo '</td></tr>';
        }
    
        echo '</table>';
    } else {
        echo '<h2 style="text-align=center">No hay Pacientes registrados</h2>';
    }
    
 $conn->close();
?>
</div>

</body>
</html>
