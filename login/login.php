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
            
       
        <div class="log_cuerpo">
        <h1 class="log_titulo">Iniciar sesion</h1>
            <form action="autenticacion.php" method="post">
                <input type="hidden" name="admin" value ="<?php echo $_GET['admin'] ?>">

                <?php
                    if($error){
                        echo "<p>El usuario o la contraseña no son correctos</p>";
                    }
                ?>

                <label for="correo">
                    <img class="log_correo" src="img/log_correo.jpg" >
                </label>
                <input type="email" name="correo" id="correo" placeholder="Correo electronico" required>

                <br/><br/>

                <label for="password">
                    <img class="log_password" src="../imagenes/password.jpg">
                </label>
                <input type="password" name="password" id="password" placeholder="Contraseña" class="" required>
                
                <input class="boton" type="submit" value="Entrar">
                
                <p>¿Aun no tienes cuenta? <a href="../registro/registro.php?admin=<?php echo $_GET['admin']; ?>">Registrate aqui</a></p>
            </form>
        </div>
    </body>
</html>