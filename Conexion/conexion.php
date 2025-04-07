<?php
    $usuario="root";
    $password="root";
    $servidor="localhost";
    $basededatos="cursosonline";
    $conexion =mysqli_connect($usuario,$password,$servidor);
    $db=mysqli_select_db($conexion,$basededatos);
?>