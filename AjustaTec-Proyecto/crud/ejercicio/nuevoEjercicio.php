<?php
include("../../php/conexion.php");

$idRutina = $_GET['idRutina'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Ejercicios</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalAsignarEjercicios_<?php echo $idRutina; ?>" class="modal">

    <div class="modal-content">
        
    <h2>Asignar Permisos</h2>
        <form action="../../AjustaTec/php/ejercicio/registrarEjercicio.php" method="post">
            <input type="hidden" name="idRutina" value="<?php echo $idRutina; ?>">
            
            <?php
            $sql = "SELECT id_ejercicios, nombre_ejercicio FROM ejercicios";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<label for="ejercicio">Seleccionar Ejercicio:</label>';
                echo '<select id="ejercicio" name="ejercicio" required>';
                
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila["id_ejercicios"] . '">' . $fila["nombre_ejercicio"] . '</option>';
                }

                echo '</select>';
            } else {
                echo "No hay ejercicios disponibles.";
            }
            ?>
            
            <label for="repeticiones">Repeticiones:</label>
            <input type="text" id="repeticiones" name="repeticiones" required>
                
            <label for="duracion">Duracion:</label>
            <input type="text" id="duracion" name="duracion" required>

            <button type="submit" >Asignar ejercicio</button>
        </form>

    </div>
</div>

<?php
// Cerrar la conexión a la base de datos al final del script
$conn->close();
?>

</body>
</html>
