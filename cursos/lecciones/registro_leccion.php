<?php
    session_start();
    $respuesta=$_GET;
    if(!isset($_SESSION['loggedin'])){
        header('Location:../../login/login.php?admin=0');
    }

    if(isset($_GET['error'])){
        $error = $_GET['error'];
    } else {
        $error=-1;
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../estilo/estilos.css">
        <link rel="icon" type="image/x-icon" href="../../imagenes/logo/netrunners_logo.jpg">
        <title>Net Runners</title>
    </head>
    <body>
        <div class="registro_cuerpo">
            <h1 class="registro_titulo">Nueva leccion</h1>

            <form action="guardar_leccion.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="curso_id" id="curso_id" value="<?php echo $respuesta['id'] ?>">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <br/><br/>

                <label for="descripcion">Descripcion</label>
                <br/>
                <textarea name="descripcion" id="descripcion" rows="3" cols="30"></textarea>

                <br/><br/>

                <label for="tiempo">Tiempo medio</label>
                <input type="number" name="tiempo" id="tiempo">

                <br/>

                <label for="numero">Numero de lección</label>
                <input type="text" name="numero" id="numero">

                <input type="file" name="video" id="video">

                <?php
                    if($error==0){
                        echo '<p>La leccion ya esta registrada</p>';
                    } else if($error==1){
                        echo '<p>Error al subir el video</p>';
                    } else if($error==2){
                        echo '<p>Solo se admiten videos en mp4</p>';
                    }
                ?>

                <input class="boton" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>