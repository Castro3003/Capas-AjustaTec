<?php
include("../../php/conexion.php");
$idPaciente = $_GET['idPaciente'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja paciente</title>

    <link rel="stylesheet" href="css/estiloForm.css">
</head>
<body>

<div id="myModalBajaPacientes_<?php echo $idPaciente; ?>" class="modal">

        <div class="modal-content">
            
            <h2>Inhabilitar usuario</h2>
            
            <form action="../../AjustaTec/php/paciente/bajaPaciente.php" method="post">

            <input type="hidden" name="idPaciente" value="<?php echo $idPaciente; ?>">
        
            <label>¿Seguro que quieres Inhabilitar este paciente?</label>
                
                <button type="submit" >Inhabilitar</button>
            </form>

          
        </div>
    </div>
    
</body>
</html>
