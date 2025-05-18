<?php
    require('../conexion/conexion.php');
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }
    $respuesta=$_POST;

    $ubicacion_foto = "../imagenes/master/portadas/";
    $ubicacion_video = "../imagenes/master/videos/";
    $extension_foto=strtolower(pathinfo($ubicacion_foto.basename($_FILES['foto']['name']),PATHINFO_EXTENSION));
    $extension_video=strtolower(pathinfo($ubicacion_video.basename($_FILES['video']['name']),PATHINFO_EXTENSION));

    if($extension_video != "mp4"){
        header("Location:registro_master.php?error=2");
    }

    if($extension_foto != "jpg" && $extension_foto != "png" && $extension_foto != "jpeg" && $extension_foto != "webp"){
        header("Location:registro_master.php?error=3");
    }

    if($stmt=$conexion->prepare("SELECT * from clases_maestras where nombre = ? ")){
        $stmt->bind_param("s",$respuesta['nombre']);
        $stmt->execute();
    }

    if($stmt->num_rows() <= 0){
        $insercion = "INSERT into clases_maestras (nombre,descripcion) values ('".$respuesta['nombre']."','".$respuesta['descripcion']."')";
    } else {
        header('Location:registro_master.php?error=0');
    }

    $stmt -> close();

    if($query = $conexion -> query($insercion)){
         if($stmt=$conexion->prepare("SELECT id from clases_maestras where nombre = ?")){
            $stmt->bind_param("s",$respuesta['nombre']);
            $stmt->execute();
        }

        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->bind_result($id);
            $stmt->fetch();
            $video_nombre=$ubicacion_video.$id.".mp4";
            $foto_nombre=$ubicacion_foto.$id.".jpg";
        }
        
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $video_nombre) && move_uploaded_file($_FILES['foto']['tmp_name'],$foto_nombre)) {
            header("Location:masterclass.php");
        } else {
            $conexion -> query("DELETE from clases_maestras where id=".$id);
            header('Location:registro_master.php?error=1');
        }
    }
?>