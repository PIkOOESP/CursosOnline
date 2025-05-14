<?php
    session_start();
    require('../conexion/conexion.php');
    $respuesta = $_GET;
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    if($_SESSION['admin'] == 0){
        $insercion = "DELETE from inscripciones where alumno_id=".$_SESSION['id']." and curso_id=".$respuesta['id'];
    }

    if($_SESSION['admin'] == 1){
        $insercion = "DELETE from cursos_profesores where profesor_id=".$_SESSION['id']." and curso_id=".$respuesta['id'];
    }

    if($query = $conexion->query($insercion)){
        header('Location:pag_curso.php?id='.$respuesta['id']);
    }
?>