<?php
    session_start();
    require("../conexion/conexion.php");
    $respuesta = $_GET;
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    $consulta_cursos = "SELECT * from cursos where id=" . $respuesta['id'];
    $query_cursos = $conexion -> query($consulta_cursos);
    $array_cursos = $query_cursos -> fetch_assoc();

    if($array_cursos == null){
        header('Location:cursos.php');
    }

    $consulta_lecciones="SELECT nombre, id, num_leccion from lecciones where curso_id=".$respuesta['id']." order by num_leccion asc";
    $query_lecciones = $conexion -> query($consulta_lecciones);
    

    if($_SESSION['admin'] == 0){
        $editar=false;
        $consulta_alumno="SELECT * from inscripciones where alumno_id=".$_SESSION['id']." and curso_id=".$respuesta['id'];
        $query_alumno = $conexion -> query($consulta_alumno);
        $array_alumno = $query_alumno -> fetch_assoc();

        if($array_alumno == null){
            $inscibirse = true;
        } else {
            $inscibirse = false;
        }
    } 

    if($_SESSION['admin'] == 1){
        $editar=true;
        $consulta_profesor="SELECT * from cursos_profesores where profesor_id=".$_SESSION['id']." and curso_id=".$respuesta['id'];
        $query_profesor = $conexion -> query($consulta_profesor);
        $array_profesor = $query_profesor -> fetch_assoc();

        if($array_profesor == null){
            $asignar = true;
        } else {
            $asignar = false;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
        <link rel="icon" type="image/x-icon" href="../imagenes/logo/netrunners_logo.jpg">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( "#accordion" ).accordion({
                    collapsible: true,
                    heightStyle: "content"
                });
            } );
        </script>
        <link rel="stylesheet" href="../estilo/estilos.css">
        <title>Net Runners</title>
    </head>
    <body>
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="../imagenes/index/logoVerde.png">
                    <a href="../Index.php">Inicio</a>
                    <a href="cursos.php?curso=1">Cursos activos</a>
                    <a href="cursos.php">Cursos</a>
                    <a href="../masterclass/masterclass.php">MasterClass</a>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo$_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href='../registro/registro.php?admin=<?php echo $_SESSION['admin'] ?>'>Editar perfil</a>
                        <br/><br/>
                        <a href='../login/cerrar_sesion.php'>Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pag_curso">
            <img src="../imagenes/cursos/<?php echo $array_cursos['id'] ?>.jpg" >

            <div class="descripcion_curso">
                <h1><?php echo $array_cursos['nombre'] ?></h1>
                </br>
                <p><?php echo $array_cursos['descripcion'] ?></p>
                <div class="horas">
                    <p>- <?php echo$array_cursos['horas'] ?> horas lectivas</p>
                </div>
                <div class="botones_curso">
                    <table class="botones_curso_tabla">
                    <?php
                        if($editar){
                            echo"
                            <td>
                            <div class='boton_editar_curso'>
                                <a href='registro_curso.php?id=".$array_cursos['id']."'>Editar</a>
                            </div>
                            </td>
                            <td>
                            <div class='boton_borrar_curso'>
                                <a href='borrar_curso.php?id=".$array_cursos['id']."'>Borrar</a>
                            </div>
                            </td>
                            <td>
                            <div class='boton_nueva_leccion'>
                                <a href='lecciones/registro_leccion.php?id=".$array_cursos['id']."'>Nueva leccion</a>
                            </div>
                            </td>
                            ";
                        }
                        if(isset($inscibirse)){
                            if($inscibirse){
                                echo"
                                <td>
                                <div class='boton_inscripcion_curso'>
                                    <a href='inscripcion.php?id=".$array_cursos['id']."'>Inscribirse</a>
                                </div>
                                </td>
                                ";
                            } else {
                                echo"
                                <td>
                                <div class='boton_baja_curso'>
                                    <a href='baja.php?id=".$array_cursos['id']."'>Dar de baja</a>
                                </div>
                                </td>
                                ";
                            }
                        }

                        if(isset($asignar)){
                            if($asignar){
                                echo"
                                <td>
                                <div class='boton_inscripcion_curso'>
                                    <a href='inscripcion.php?id=".$array_cursos['id']."'>Asignar</a>
                                </div>
                                </td>
                                ";
                            } else {
                                echo"
                                <td>
                                <div class='boton_baja_curso'>
                                    <a href='baja.php?id=".$array_cursos['id']."'>Dar de baja</a>
                                </div>
                                </td>
                                ";
                            }
                        }
                    ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="acordeon">
            <div id="accordion">
                <?php
                    while($fila= $query_lecciones -> fetch_assoc()){
                        echo"
                        <h3>".$fila['num_leccion']."º Leccion</h3>";
                        if($fila['nombre']=="Proximamente"){
                            echo "<div> <a>".$fila['nombre']."</a></div>";
                        } else {
                            echo "<div><a href='lecciones/pag_leccion.php?id=".$fila['id']."&curso_id=".$array_cursos['id']."'>".$fila['nombre']."</a></div>  
                            ";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>