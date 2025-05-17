<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }
    require('../conexion/conexion.php');
    $respuesta=$_GET;

    $consulta_master="SELECT * from clases_maestras where id=".$respuesta['id'];
    $query = $conexion -> query($consulta_master);
    $array = $query -> fetch_assoc();

    if($array == null){
        header('Location:masterclass.php');
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
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="../imagenes/index/logoVerde.png">
                    <a href="../Index.php">Inicio</a>
                    <a href="../cursos/cursos.php?curso=1">Cursos activos</a>
                    <a href="../cursos/cursos.php">Cursos</a>
                    <a href="">MasterClass</a>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo $_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href='../registro/registro.php?admin=<?php echo $_SESSION['admin'] ?>'>Editar perfil</a>
                        <br/><br/>
                        <a href='../login/cerrar_sesion.php'>Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pag_master">
            <video id="video" width="800px" controls>
                <source src="../imagenes/master/videos/<?php echo $array['id'].".mp4"; ?>" type="video/mp4">
            </video>

            <div class="descripcion_master">
                <p><?php echo $array['descripcion'] ?></p>
            </div>

            <?php
                if($_SESSION['admin']==1){
                    echo"
                    <div class='boton_borrar_master'>
                        <a href='borrar_master.php?id=".$array['id']."'>Borrar</a>
                    </div>
                    ";
                }
            ?>
        </div>

        <div class="bottom_indice">
            <div class="bottom_indice_enlaces">

            </div>

            <div class="bottom_indice_informacion">

            </div>

            <div class="bottom_indice_referencias">
                <p>Pablo | Miguel Angel</p>
            </div>
        </div>
    </body>
</html>