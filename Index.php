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
                            echo '<a href="cursos/cursos.php?curso=1">Cursos activos</a>';
                        }
                    ?>      
                    <a href="cursos/cursos.php">Cursos</a>
                    <a href="masterclass/masterclass.php">MasterClass</a>
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
                                <a href='registro/registro.php?admin=".$_SESSION['admin']."'>Editar perfil</a>
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
                        <a href="cursos/pag_curso.php?id=6"><img src="imagenes/carrusel/imagen3.jpg" alt="imagen_carrusel"></a>
                    </div>
                    <div class="objeto_carrusel">
                        <a href="cursos/pag_curso.php?id=2"><img src="imagenes/carrusel/imagen2.jpg" alt="imagen_carrusel"></a>
                    </div>
                    <div class="objeto_carrusel">
                        <a href="cursos/pag_curso.php?id=1"><img src="imagenes/carrusel/imagen1.jpg" alt="imagen_carrusel"></a>
                    </div>
                    <div class="objeto_carrusel">
                        <a href="cursos/pag_curso.php?id=7"><img src="imagenes/carrusel/imagen4.jpg" alt="imagen_carrusel"></a>
                    </div>
                </div>

                <button class="carrusel_boton carrusel_boton_prev" id="prev_boton">⫷</button>
                <button class="carrusel_boton carrusel_boton_sig" id="sig_boton">⫸</button>

                <div class="content-indicators" id="indicators"></div>
            </div>

            <div class="relleno">
                <div class="mejores">
                    <h1>¿POR QUÉ ELEGIR NETRUNNERS?</h1>
                    <table>
                        <tr>
                            <td>
                                <img src="imagenes/index/clock.png">
                                <h3>Horarios flexibles.</h3>
                                <a>Aprende á tu ritmo.</a>
                            </td>
                            <td>
                                <img class="global" src="imagenes/index/global.png">
                                <h3>Acceso desde 
                                </br>cualguier lugar.</h3 >
                                <a>Alcance global</a>
                            </td>
                            <td>
                                <img src="imagenes/index/PC.png">
                                <h3>Realiza proyectos </br>reales.</h3>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="german">
                    <h2>"Gracias a NetRunners conseguí mi primer trabajo como desarrollador web."</h2>
                    <table>
                        <tr>
                            <td>
                                <img src="imagenes/index/german.png">
                            </td>
                            <td>
                                <h2 class="nombre_german">Germán B. </br> estudiante de Desarrollo Web.</h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="bottom_indice">
                <div class="bottom_indice_enlaces">
                    <a href="rss/rss.php"><img src="imagenes/logo/rss.png"></a>
                </div>

                <div class="bottom_indice_referencias">
                    <p>Pablo | Miguel Angel</p>
                </div>
            </div>
        </div>        
    </body>
</html>