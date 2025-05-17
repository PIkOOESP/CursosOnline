<?php
    $respuesta=$_POST;
    require('../conexion/conexion.php');
    
    if(isset($respuesta['id'])){
        session_start();
        if($_SESSION['admin']==0){
            $insercion = "UPDATE alumnos set nombre='".$respuesta['nombre']."',apellido='".$respuesta['apellido']."',email='".$respuesta['correo']."',password='".$respuesta['password']."'where id=".$respuesta['id'];
        }

        if($_SESSION['admin']==1){
            $insercion ="UPDATE profesores set nombre='".$respuesta['nombre']."',apellido='".$respuesta['apellido']."',email='".$respuesta['correo']."',password='".$respuesta['password']."where id=".$respuesta['id'];
        }
        print_r($insercion);
        if($conexion -> query($insercion)){
            header('Location:../');
        } else {
            header('Location:registro.php?error=2&admin='.$respuesta['admin']);
        }
    } else {
        if($respuesta['admin']==0){
            if($stmt = $conexion -> prepare("SELECT id, password from alumnos where email = ?")){
                $stmt -> bind_param("s", $respuesta['correo']);
                $stmt -> execute();
            }
        } else {
            if($stmt = $conexion -> prepare("SELECT id, password from profesores where email = ?")){
                $stmt -> bind_param("s", $respuesta['correo']);
                $stmt -> execute();
            }
        }

        $stmt -> store_result();

        if($stmt -> num_rows > 0){
            header('Location:registro.php?error=0&admin='.$respuesta['admin']);
        } else{
            if($respuesta['admin']==0){
                $insercion = "INSERT into alumnos (nombre,apellido,email,password) value ('".$respuesta['nombre']."','".$respuesta['apellido']."','".$respuesta['correo']."','".$respuesta['password']."')";
            } else {
                $insercion = "INSERT into profesores (nombre,apellido,email,password) value ('".$respuesta['nombre']."','".$respuesta['apellido']."','".$respuesta['correo']."','".$respuesta['password']."')";
            }

            if($conexion -> query($insercion) === true){
                header('Location:../login/login.php?admin='.$respuesta['admin']);
            } else{
                header('Location:registro.php?error=1&admin='.$respuesta['admin']);
            }
        } 
    }
?>