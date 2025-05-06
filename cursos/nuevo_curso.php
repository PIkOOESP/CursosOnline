<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="icon" type="image/x-icon" href="">
        <title>Nuevo curso</title>
    </head>

    <body>
        <div class="registro_cuerpo">
            <h1 class="registro_titulo">Nuevo curso</h1>

            <form action="autenticacion.php" method="post" id="formulario">
                <?php  
                    if($error == 0){ 
                        echo"<p>Correo ya registrado, pruebe otro o <a href='../login/login.php?admin=".$_GET['admin']."'>inicie sesion</a></p>";
                    } else if($error == 1){
                        echo"<p>Error al registrar los datos, pruebe otra vez mas tarde</p>";
                    }    
                ?>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <p id=error_nombre></p>

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" rows="4" cols="40"></textarea>

                <label for="horas">Horas lectivas</label>
                <input type="number" name="horas" id="horas">

                <select name="" id=""></select>

                <button type="button" onclick="verificar()">Enviar</button>
            </form>
        </div>
    </body>
</html>