<?php
    require('../conexion/conexion.php');
    $respuesta = $_POST;

    session_start();

    if($stmt = $conexion -> prepare("SELECT id, password where correo = ?")){
        $stmt -> bind_param("s", $respuesta['usuario']);
        $stmt -> execute();
    }

?>