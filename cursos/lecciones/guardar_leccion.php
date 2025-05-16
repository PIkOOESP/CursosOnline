<?php
    require('../../conexion/conexion.php');
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../../login/login.php?admin=0');
    }
    $respuesta=$_POST;

    $ubicacion = "../../imagenes/lecciones/";
    $extension=strtolower(pathinfo($ubicacion.basename($_FILES['video']['name']),PATHINFO_EXTENSION));

    if($extension != "mp4"){
        header("Location:registro_leccion.php?error=2&id=".$respuesta['curso_id']);
    }

    if($stmt=$conexion->prepare("SELECT * from lecciones where num_leccion = ? and curso_id = ?")){
            $stmt->bind_param("si",$respuesta['numero'],$respuesta['curso_id']);
            $stmt->execute();
    }

    if($stmt->num_rows() <= 0){
        $insercion = "INSERT into lecciones (num_leccion,nombre,descripcion,contenido,tiempo,curso_id) values ('".$respuesta['numero']."','".$respuesta['nombre']."','".$respuesta['descripcion']."','".$respuesta['contenido']."',".$respuesta['tiempo'].",".$respuesta['curso_id'].")";
        print_r($insercion);
    } else {
        header('Location:registro_leccion.php?error=0&id='.$respuesta['curso_id']);
    }

    $stmt->close();

    if($query = $conexion->query($insercion)){
            if($stmt=$conexion->prepare("SELECT id from lecciones where num_leccion = ? and curso_id = ?")){
                $stmt->bind_param("si",$respuesta['numero'],$respuesta['curso_id']);
                $stmt->execute();
            }

            $stmt->store_result();

            if($stmt->num_rows() == 1){
                $stmt->bind_result($id);
                $stmt->fetch();
                $video_nombre=$ubicacion.$id.".mp4";
            }

            $stmt->close();

            if (move_uploaded_file($_FILES["video"]["tmp_name"], $video_nombre)) {
                header("Location:../pag_curso.php?id=".$respuesta['curso_id']);
            } else {
                $conexion -> query("DELETE from lecciones where id=".$id);
                header('Location:registro_leccion.php?error=1&id='.$respuesta['curso_id']);
            }
        }
?>