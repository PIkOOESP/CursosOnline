<?php
    require('../conexion/conexion.php');
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    if(isset($_GET['error'])){
        $error=$_GET['error'];
    } else {
        $error=-1;
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="icon" type="image/x-icon" href="../imagenes/logo/netrunners_logo.jpg">
        <title>Net Runners</title>
    </head>
    <body>
        <div class="registro_cuerpo">
            <h1 class="registro_titulo">Nueva MasterClass</h1>

            <form action="guardar_master.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <br/><br/>

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" rows="4" cols="40"></textarea>

                <br/><br/>
                
                <label for="foto">Portada</label>

                <br/>

                <input type="file" name="foto" id="foto">

                <br/><br/>

                <label for="video">Video</label>

                <br/>

                <input type="file" name="video" id="video">

                <?php
                    if($error==0){
                        echo '<p>La MasterClass ya esta registrada</p>';
                    } else if($error==1){
                        echo '<p>Error al subir la imagen o el video</p>';
                    } else if($error==2){
                        echo '<p>Solo se permiten videos en MP4</p>';
                    } else if($error==3){
                        echo '<p>Solo se permiten imagenes en jpg, jpeg, png, webp</p>';
                    }
                ?>
                
                <input type="submit" class="boton" value="Enviar">
            </form> 
        </div>
    </body>
</html>