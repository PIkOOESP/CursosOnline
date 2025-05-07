<?php
    require('../conexion/conexion.php');
    $respuesta = $_POST;

    session_start();

    if($respuesta['admin']==0){
        if($stmt = $conexion -> prepare("SELECT id, password, nombre from alumnos where email = ?")){
            $stmt -> bind_param("s", $respuesta['correo']);
            $stmt -> execute();
        }
    } else {
        if($stmt = $conexion -> prepare("SELECT id, password, nombre  from profesores where email = ?")){
            $stmt -> bind_param("s", $respuesta['correo']);
            $stmt -> execute();
        }
    }

    $stmt -> store_result();

    if($stmt -> num_rows > 0){
        $stmt -> bind_result($id, $contra, $nombre);
        $stmt -> fetch();

        if($respuesta['password']=== $contra){
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $nombre;
            $_SESSION['id'] = $id;
            $_SESSION['admin'] = $respuesta['admin'];

            header('Location:../index.php');
        } else {
            header('Location:login.php?error=0&admin='.$respuesta['admin']);
        } 
    } else {
        header('Location:login.php?error=0&admin='.$respuesta['admin']);
    }

    $stmt -> close();
?>