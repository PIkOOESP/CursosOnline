<?php
    require('../conexion/conexion.php');
    $respuesta = $_POST;

    session_start();

    if($stmt = $conexion -> prepare("SELECT id, password from alumnos where email = ?")){
        $stmt -> bind_param("s", $respuesta['correo']);
        $stmt -> execute();
    }

    $stmt -> store_result();

    if($stmt -> num_rows > 0){
        $stmt -> bind_result($id, $password);
        $stmt -> fetch();

        if($respuesta['password']=== $password){
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $respuesta['correo'];
            $_SESSION['id'] = $id;

            header('Location:../index.php');
        } else {
            header('Location:login.php?error=0');
        } 
    } else {
        header('Location:login.php?error=0');
    }

    $stmt -> close();
?>