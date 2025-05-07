<?php
    require("../conexion/conexion.php");
    session_start();
    
    $consulta_dificultades ="SELECT * from dificultades";
    $query = $conexion -> query($consulta_dificultades);

    if(isset($_GET['error'])){
        $error=$_GET['error'];
    } else{
        $error=-1;
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="icon" type="image/x-icon" href="">
        <title>Net Runners</title>
    </head>

    <body>
        <div class="registro_cuerpo">
            <h1 class="registro_titulo">Nuevo curso</h1>

            <form action="guardar_curso.php" method="post" id="formulario" enctype="multipart/form-data">
                
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <br/><br/>

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" rows="4" cols="40"></textarea>
            
                <br/>

                <label for="horas">Horas lectivas</label>
                <input type="number" name="horas" id="horas">
                
                <br/><br/>

                <label for="dificultad">Dificultad</label>
                <select name="dificultad" id="dificultad">
                    <?php
                        while($fila= $query->fetch_assoc()){
                            echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
                        }
                    ?>
                </select>

                <br/>
                
                <input type="file" name="foto" id="foto">

                <br/>

                <?php
                    if($error==0){
                        echo '<p>El curso ya esta registrado</p>';
                    } else if($error==1){
                        echo '<p>Error al subir la imagen</p>';
                    }
                ?>

                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>