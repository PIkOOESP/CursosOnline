<?php
    require('../conexion/conexion.php');
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    $consulta_lecciones ="SELECT id from lecciones where curso_id=".$_GET['id'];
    $query = $conexion -> query($consulta_lecciones);
    while($fila = $query -> fetch_assoc()){
        $conexion -> query("DELETE from lecciones where id=".$fila['id']);
        unlink('../imagenes/lecciones/'.$fila['id'].".mp4");
    }

    $insercion="DELETE from cursos where id=".$_GET['id'];

    if($query = $conexion -> query($insercion) && unlink('../imagenes/cursos/'.$_GET['id'].'.jpg') ){
        header('Location:cursos.php');
    }else{
        header('Location:../index.php');
    }
?>