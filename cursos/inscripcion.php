<?php
    session_start();
    require('../conexion/conexion.php');
    $respuesta=$_GET;
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    if($_SESSION['admin'] == 0){    
        $insercion="INSERT into inscripciones (alumno_id,curso_id,create_at) values (".$_SESSION['id'].",".$respuesta['id'].",'".date('Y-m-d')."')";
    }

    if($_SESSION['admin'] == 1){
        $insercion="INSERT into cursos_profesores (profesor_id,curso_id) values (".$_SESSION['id'].",".$respuesta['id'].")";
    }
    
    if($query=$conexion->query($insercion)){
        header('Location:pag_curso.php?id='.$respuesta['id']);
    }
?>