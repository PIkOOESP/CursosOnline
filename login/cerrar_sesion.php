<?php
    session_start();
    unset($_SESSION['loggedin'],$_SESSION['admin'],$_SESSION['name'],$_SESSION['id']);
    header('Location:../index.php');
?>