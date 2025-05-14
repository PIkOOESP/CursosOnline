<?php
    require("../conexion/conexion.php");
    session_start();
    $respuesta = $_POST;
    $ubicacion = "../imagenes/cursos/";
    $extension=strtolower(pathinfo($ubicacion.basename($_FILES['foto']['name']),PATHINFO_EXTENSION));

    if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "webp"){
        header("Location:registro_curso.php?error=1");
    }

    if($stmt=$conexion->prepare("SELECT * from cursos where nombre = ? and dificultad_id = ?")){
        $stmt->bind_param("si",$respuesta['nombre'],$respuesta['dificultad']);
        $stmt->execute();
    }

    if($stmt->num_rows() <= 0){
        $insercion = "INSERT into cursos(nombre,descripcion,horas,dificultad_id) values ('".$respuesta['nombre']."','".$respuesta['descripcion']."',".$respuesta['horas'].",".$respuesta['dificultad'].");";
        print_r($insercion);
    } else {
        header('Location:registro_curso.php?error=0');
    }

    $stmt->close();

    if($error = $conexion->query($insercion)){
        if($stmt=$conexion->prepare("SELECT id from cursos where nombre = ? and dificultad_id = ?")){
            $stmt->bind_param("si",$respuesta['nombre'],$respuesta['dificultad']);
            $stmt->execute();
        }

        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->bind_result($id);
            $stmt->fetch();
            $foto_nombre=$ubicacion.$id.".jpg";
        }

        $stmt->close();

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_nombre)) {
            header("Location:cursos.php");
        }
    }
?>

