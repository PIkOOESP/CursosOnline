<!DOCTYPE html>

<?php
    session_start();
    require('conexion/conexion.php');
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

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/carrusel.css">
        <link rel="stylesheet" href="estilo/estilos.css">
        <script src="script/carrusel.js"></script>
        <link rel="icon" type="image/x-icon" href="imagenes/logo/netrunners_logo.jpg">
        <title>Net Runners</title>
    </head>

    <body>
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="imagenes/index/logoVerde.png">
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
                                <img src="imagenes/index/estudiante_icon.png"><a href="login/login.php?admin=0">Alumno</a>
                                <br/><br/>
                                <img src="imagenes/index/profesor_icon.png"><a href="login/login.php?admin=1">Profesor</a>
                            </div>
                        </div>';
                    } else {
                        echo "
                            <div class='menu'>
                            <p>Bienvenido ".$_SESSION['name']."</p>
                            
                            <div class='submenu'>
                                <a href=''>Editar perfil</a>
                                <br/><br/>
                                <a href='login/cerrar_sesion.php'>Cerrar sesion</a>
                            </div>
                        </div>";
                    }
                ?>
            </div>    

            <div class="introduccion_indice">
                    <h1>Aprende habilidades tecnológicas</h1>
                    <br/>
                    <a>Mejora tus habilidades con nuestros cursos online.
                    Aprende a tu propio ritmo con el apoyo de expertos del sector.</a>
            </div>
            <div class="imagen_indice">
                <img src="imagenes/index/payico_indice.png">
            </div>

            <div class="contenedor_carrusel">
                <div class="carrusel" id="carrusel">
                    <div class="objeto_carrusel">
                        <a href="https://es.wikipedia.org/wiki/Choeropsis_liberiensis"><img src="imagenes/carrusel/imagen1.jpeg" alt="imagen_carrusel"></a>
                    </div>
                    <div class="objeto_carrusel">
                        <a href="https://www.reddit.com/r/Aquariums/comments/1gw7d35/anyone_know_what_kind_of_fish_this_is/?tl=es-es"><img src="imagenes/carrusel/imagen2.jpeg" alt="imagen_carrusel"></a>
                    </div>
                    <div class="objeto_carrusel">
                        <a href="https://es.wikipedia.org/wiki/Bombyx_mori"><img src="imagenes/carrusel/imagen3.jpeg" alt="imagen_carrusel"></a>
                    </div>
                    <div class="objeto_carrusel">
                        <a href="https://www.mediotiempo.com/virales/wild-frank-arrollado-avestruz-video-viral-frank-cuesta"><img src="imagenes/carrusel/imagen4.jpeg" alt="imagen_carrusel"></a>
                    </div>
                </div>

                <button class="carrusel_boton carrusel_boton_prev" id="prev_boton">⫷</button>
                <button class="carrusel_boton carrusel_boton_sig" id="sig_boton">⫸</button>

                <div class="content-indicators" id="indicators"></div>
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
        </div>        
    </body>
</html>