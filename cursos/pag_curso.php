<?php
    session_start();
    require("../conexion/conexion.php");
    $respuesta = $_GET;

    $consulta_cursos = "SELECT * from cursos where id=" . $respuesta['id'];
    $query_cursos = $conexion -> query($consulta_cursos);
    $array_cursos = $query_cursos -> fetch_assoc();

    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php');
    }
        
    if($_SESSION['admin'] == 0){
        $consulta_alumno="SELECT * from inscripciones where alumno_id=".$_SESSION['id']." and curso_id=".$respuesta['id'];
        $query_alumno = $conexion -> query($consulta_alumno);
        $array_alumno = $query_alumno -> fetch_assoc();

        if($array_alumno == null){
            $inscibirse = true;
        } else {
            $inscibirse = false;
        }
    } else {
        $inscibirse = false;
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
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="../imagenes/index/logoVerde.png">
                    <a href="../Index.php">Inicio</a>
                    <a href="">Cursos activos</a>
                    <a href="cursos.php">Cursos</a>
                    <a href="">MasterClass</a>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo$_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href=''>Editar perfil</a>
                        <br/><br/>
                        <a href='../login/cerrar_sesion.php'>Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pag_curso">
            <img src="../imagenes/cursos/<?php echo $array_cursos['id'] ?>.jpg" >

            <div class="descripcion_curso">
                <p><?php echo $array_cursos['descripcion'] ?></p>
            </div>
        </div>
        <?php
            if($inscibirse){
                echo"
                <div class='boton_inscripcion_curso'>
                    <a href='inscripcion.php?id".$array_cursos['id']."'>Inscribirse</a>
                </div>
                ";
            }
        ?>

        <div class="acordeon">

        </div>
    </body>
</html>