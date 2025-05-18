<?php
    require("../conexion/conexion.php");
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }
    
    $consulta_dificultades = "SELECT * from dificultades";
    $query = $conexion -> query($consulta_dificultades);

    if(isset($_GET['id'])){
        $editar = true;
        $consulta_curso = "SELECT * from cursos where id=".$_GET['id'];
        $query_cursos = $conexion -> query($consulta_curso);
        $array = $query_cursos -> fetch_assoc();
    } else {
        $editar = false;
    }

    if(isset($_GET['error'])){
        $error = $_GET['error'];
    } else{
        $error = -1;
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../estilo/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../imagenes/logo/netrunners_logo.jpg"/>
        <title>Net Runners</title>
    </head>

    <body>
        <div class="registro_cuerpo">
            <h1 class="registro_titulo"><?php echo $editar? "Editar curso" : "Nuevo curso" ?></h1>

            <form action="guardar_curso.php" method="post" enctype="multipart/form-data">
                <?php echo $editar ? "<input type='hidden' name='id' value='".$_GET['id']."'/>" : "" ; ?>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" <?php echo $editar ? "value='".$array['nombre']."'" : "" ; ?>/>

                <br/><br/>

                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" rows="4" cols="40"><?php echo $editar ? $array['descripcion'] : "" ; ?></textarea>
            
                <br/>

                <label for="horas">Horas lectivas</label>
                <input type="number" name="horas" id="horas" <?php echo $editar ? "value='".$array['horas']."'" : "" ; ?>/>
                
                <br/><br/>

                <label for="dificultad">Dificultad</label>
                <select name="dificultad" id="dificultad">
                    <?php
                        while($fila= $query->fetch_assoc()){
                            if($editar && $array['dificultad_id'] == $fila['id']){
                                echo "<option value='".$fila['id']."' selected>".$fila['nombre']."</option>";
                            } else {
                                echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
                            }
                        }
                    ?>
                </select>

                <br/>

                <?php
                    echo !$editar? "<input type='file' name='foto' id='foto'>" : "";
                ?>

                <br/>

                <?php
                    if($error==0){
                        echo '<p>El curso ya esta registrado</p>';
                    } else if($error==1){
                        echo '<p>Error al subir la imagen</p>';
                    } else if($error==2){
                        echo '<p>Error al editar el curso</p>';
                    }
                ?>

                <input class="boton" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>