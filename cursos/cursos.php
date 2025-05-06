<?php
    session_start();
    if($_SESSION['admin']==1){
        echo "<a href='nuevo_curso.php'>Nuevo curso</a>";
    }
?>