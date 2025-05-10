<?php
    require('../conexion/conexion.php');

    session_start();
    $consulta_cursos="SELECT id, nombre from cursos";
    $query = $conexion->query($consulta_cursos);
    $br=0;

    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin']){
            $sesion=true;
        } else {
            $sesion=false;
        }
    } else {
        $sesion=false;
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="stylesheet" href="../estilo/carrusel.css">
        <link rel="icon" href="../imagenes/logo/netrunners_logo.jpg">
        <title>Net Runner</title>
    </head>
    <body>
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="../imagenes/index/logoVerde.png">
                    <a href="">Inicio</a>
                    <?php
                        if($sesion){
                            echo '<a href="">Cursos activos</a>';
                        }
                    ?>      
                    <a href="cursos/cursos.php">Cursos</a>
                    <a href="">MasterClass</a>
                </div>
                <?php  
                    if(!$sesion){
                        echo '
                        <div class="menu">
                            <a href="" class="main-link">Iniciar sesión</a>

                            <div class="submenu">
                                <img src="../imagenes/index/estudiante_icon.png"><a href="../login/login.php?admin=0">Alumno</a>
                                <br/><br/>
                                <img src="../imagenes/index/profesor_icon.png"><a href="../login/login.php?admin=1">Profesor</a>
                            </div>
                        </div>
                        ';
                    } else {
                        echo "
                            <div class='menu'>
                            <p>Bienvenido<a href='login/cerrar_sesion.php'>".$_SESSION['name']."</a></p>
                            
                            <div class='submenu'>
                                <img src=''><a href=''>Editar perfil</a>
                                <br/><br/>
                                <img src=''><a href='../login/cerrar_sesion.php'>Cerrar sesion</a>
                            </div>
                        </div>
                        ";
                    }
                ?>
            </div>
        </div>
        <?php
            if(isset($_SESSION['loggedin'])){
                if($_SESSION['admin']==1){
                    echo "<a href='registro_curso.php'>Nuevo curso</a>
                    ";
                }
            }

            while($fila=$query->fetch_assoc()){
                $br++;
                echo"
                <div class='curso'>
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