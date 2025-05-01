<!DOCTYPE html>

<?php
    if($_GET['error']){
        
    }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../estilo/estilos.css">
    <link rel="icon" type="image/x-icon" href="">
</head>
    <body>
        <div class="log_titulo">
            <h1>Iniciar sesion</h1>
        </div>

        <div class="log_cuerpo">
            <label for="usuario">
                <img class="log_usuario" src="img/log_usuario.jpg" >
            </label>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>

            <br/><br/>

            <label for="password">
                <img class="log_password" src="img/password.jpg">
            </label>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>    
        </div>
    </body>
</html>