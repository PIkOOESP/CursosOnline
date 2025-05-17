<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../../login/login.php?admin=0');
    }
    require('../../conexion/conexion.php');
    $consulta_leccion = "SELECT * from lecciones where id=".$_GET['id'];
    $query_leccion = $conexion -> query($consulta_leccion);
    $array_leccion = $query_leccion -> fetch_assoc();
    if($array_leccion==null){
        header('Location:../pag_curso.php?id='.$_GET['curso_id']);
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
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="../../imagenes/index/logoVerde.png">
                    <a href="../../Index.php">Inicio</a>
                    <a href="../cursos.php?curso=1">Cursos activos</a>
                    <a href="../cursos.php">Cursos</a>
                    <a href="../../masterclass/masterclass.php">MasterClass</a>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo $_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href='../../registro/registro.php?admin=<?php echo $_SESSION['admin'] ?>'>Editar perfil</a>
                        <br/><br/>
                        <a href='../../login/cerrar_sesion.php'>Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pag_leccion">


        <div class="descripcion_leccion">
                <h1>Lección <?php echo $array_leccion['num_leccion']." : ". $array_leccion['nombre'] ?></h1>
            </div>
            <div class="contenido_leccion">
                <p><?php echo $array_leccion['descripcion'] ?></p>
            </div>
            </br>
            <div class="contenido_leccion">
                <p>- <?php echo $array_leccion['tiempo']." minutos." ?></p>
            </div>
            </br>
            <video id="video" width="800px" controls>
                <source src="../../imagenes/lecciones/<?php echo $array_leccion['id'].".mp4"; ?>" type="video/mp4">
            </video>


            <?php
                if($_SESSION['admin']==1){
                    echo"
                    <div class='boton_borrar_leccion'>
                        <a href='borrar_leccion.php?id=".$array_leccion['id']."&curso_id='".$_GET['curso_id']."'>Borrar</a>
                    </div>
                    ";
                }
            ?>
        </div>
    </body>
</html>