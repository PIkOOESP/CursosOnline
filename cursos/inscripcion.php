<?php
    
    require('../Conexion/conexion.php');
    $respuesta=$_GET;
    if(isset($_SESSION['loggedin'])){
        header('Location../Index.php');
    }

    $insercion="INSERT into";

?>