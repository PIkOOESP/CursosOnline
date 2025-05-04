<!DOCTYPE html>

<?php
    require('conexion/conexion.php');
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/carrusel.css">
        <script src="script/carrusel.js"></script>
        <link rel="icon" type="image/x-icon" href="">
        <title>Inicio</title>
    </head>
    <body> 
        <div class="top_indice">
            <div class="top_indice_enlaces">
                <a href="">Cursos</a>
            </div>

            <div class = "top_indice_login" >
                <a href="login/prelogin.html">Iniciar sesion</a>
            </div>
        </div>    

        <div class="contenedor_carrusel">
            <div class="carrusel" id="carrusel">
                <div class="objeto_carrusel">
                    <a href="https://es.wikipedia.org/wiki/Choeropsis_liberiensis"><img src="imagenes/imagen1.jpeg" alt="imagen_carrusel"></a>
                </div>
                <div class="objeto_carrusel">
                    <a href="https://www.reddit.com/r/Aquariums/comments/1gw7d35/anyone_know_what_kind_of_fish_this_is/?tl=es-es"><img src="imagenes/imagen2.jpeg" alt="imagen_carrusel"></a>
                </div>
                <div class="objeto_carrusel">
                    <a href="https://es.wikipedia.org/wiki/Bombyx_mori"><img src="imagenes/imagen3.jpeg" alt="imagen_carrusel"></a>
                </div>
                <div class="objeto_carrusel">
                    <a href="https://www.mediotiempo.com/virales/wild-frank-arrollado-avestruz-video-viral-frank-cuesta"><img src="imagenes/imagen4.jpeg" alt="imagen_carrusel"></a>
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
    </body>
</html>