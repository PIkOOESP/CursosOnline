<?php
    require('../conexion/conexion.php');

    session_start();

    if($_SESSION['admin']==1){
        echo "<a href='registro_curso.php'>Nuevo curso</a>";
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Net Runner</title>
    </head>
    <body>
        
    </body>
</html>