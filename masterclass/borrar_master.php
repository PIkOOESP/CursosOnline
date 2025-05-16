<?php
    require('../conexion/conexion.php');
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    $insercion = "DELETE from clases_maestras where id=".$_GET['id'];
    if($query = $conexion -> query($insercion) && unlink('../imagenes/master/portadas/'.$_GET['id'].'.jpg') && unlink('../imagenes/master/videos/'.$_GET['id'].'.mp4')){
        header('Location:masterclass.php');
    } else{
        header('Location:../index.php');
    }
?>