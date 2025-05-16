<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../../login/login.php?admin=0');
    }
    require('../../conexion/conexion.php');

    $insercion = "DELETE from lecciones where id=".$_GET['id'];

    if($conexion -> query($insercion) && unlink('../../imagenes/lecciones/'.$_GET['id'].'.mp4')){
        header('Location:../pag_cursos.php?id='.$_GET['curso_id']);
    } else {
        header('Location:../../index.php');
    }
?>