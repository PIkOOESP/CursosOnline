<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['loggedin'])){
        require('../conexion/conexion.php');
        $editar = true;
        if($_SESSION['admin']==1){
            $consulta = "SELECT * from profesores where id=".$_SESSION['id'];
            $query = $conexion -> query($consulta);
            $array = $query -> fetch_assoc();
        }
        if($_SESSION['admin']==0){
            $consulta = "SELECT * from alumnos where id=".$_SESSION['id'];
            $query = $conexion -> query($consulta);
            $array = $query -> fetch_assoc();
        }
    } else {
        $editar = false;
    }

    if(isset($_GET['error'])){
        $error=$_GET['error'];
    } else {
        $error =-1;
    }
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="icon" type="image/x-icon" href="../imagenes/logo/netrunners_logo.jpg">
        <script src="../script/registro.js"></script>
        <title>Net Runners</title>
    </head>

    <body>
        <div class="registro_cuerpo">
            <h1 class="registro_titulo"><?php echo $editar? "Editar perfil" : "Registro" ?></h1>

            <form action="autenticacion.php" method="post" id="formulario">
                <input type="hidden" name="admin" value="<?php echo $_GET['admin']; ?>">

                <?php echo $editar? "<input type='hidden' name='id' value='".$_SESSION['id']."'>" : "" ?>

                <?php  

                    if($error == 0){ 
                        echo"<p>Correo ya registrado, pruebe otro o <a href='../login/login.php?admin=".$_GET['admin']."'>inicie sesion</a></p>";
                    } else if($error == 1){
                        echo"<p>Error al registrar los datos, pruebe otra vez mas tarde</p>";
                    } else if($error == 2){
                        echo"<p>Error al editar el perfil</p>";
                    }
                        
                ?>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" <?php echo $editar? "value='".$array['nombre']."'" : "" ?>>

                <p id=error_nombre></p>

                <label for="apellido">Apellidos</label>
                <input type="text" name="apellido" id="apellido" <?php echo $editar? "value='".$array['apellido']."'" : "" ?>>

                <p id=error_apellido></p>

                <label for="correo">Correo electronico</label>
                <input type="email" name="correo" id="correo" <?php echo $editar? "value='".$array['email']."'" : "" ?>>

                <p id=error_correo></p>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" <?php echo $editar? "value='".$array['password']."'" : "" ?>>

                <p id=error_password></p>

                <input class="boton" type="button" onclick="verificar()" value="Entrar">
            </form>
        </div>
    </body>
</html>