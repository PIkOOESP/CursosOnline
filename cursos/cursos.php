<?php
    require('../conexion/conexion.php');

    session_start();
    $consulta_cursos="SELECT id, nombre from cursos";
    $query = $conexion->query($consulta_cursos);
    $br=0;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="icon" href="../imagenes/logo/netrunners_logo.jpg">
        <title>Net Runner</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['loggedin'])){
                if($_SESSION['admin']==1){
                    echo "<a href='registro_curso.php'>Nuevo curso</a>";
                }
            }

            while($fila=$query->fetch_assoc()){
                $br++;
                echo"<div class='curso'>
                    <a href='pag_curso.php?id=".$fila['id']."'>
                        <div class='curso_imagen'>
                            <img src='../imagenes/cursos/".$fila['id'].".jpg'>
                        </div>
                        <div class='curso_nombre'>
                        <p>".$fila['nombre']."</p>
                        </div>
                    </a>
                </div>";
                if($br/3==0){
                    echo "<br/>";
                }
            }
        ?>

        
    </body>
</html>