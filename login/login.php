<!DOCTYPE html>

<?php
    if(isset($_GET['error'])){
        $error = true;
    } else {
        $error = false;
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

        <form action="autenticacion.php" method="post">
            <div class="log_cuerpo">
                <?php
                    if($error){
                        echo "<p>El usuario o la contraseña no son correctos</p>";
                    }
                ?>

                <label for="correo">
                    <img class="log_correo" src="img/log_correo.jpg" >
                </label>
                <input type="mail" name="correo" id="correo" placeholder="Correo electronico" required>

                <br/><br/>

                <label for="password">
                    <img class="log_password" src="img/password.jpg">
                </label>
                <input type="password" name="password" id="password" placeholder="Contraseña" class="" required>
                
                <input type="submit" value="Entrar">
            </div>
        </form>
    </body>
</html>