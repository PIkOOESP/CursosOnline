<!DOCTYPE html>
<?php
    if(isset($_GET['error'])){
        if($_GET['error']==0){
            $error = 0;
        } else if ($_GET['error']==1){
            $error =1;
        }
    } else {
        $error =-1;
    }
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/estilos.css">
        <link rel="icon" type="image/x-icon" href="">
        <script src="registro.js"></script>
        <title>Registro</title>
    </head>

    <body>
        <div class="registro_titulo">
            <h1>Registrar</h1>
        </div>    

        <div class="registro_cuerpo">
            <form action="autenticacion.php" method="post" id="formulario">
                <input type="hidden" name="admin" value="<?php echo $_GET['admin']; ?>">

                <?php  
                    if($error == 0){ 
                        echo"<p>Correo ya registrado, pruebe otro o <a href='../login/login.php?admin=".$_GET['admin']."'>inicie sesion</a></p>";
                    } else if($error == 1){
                        echo"<p>Error al registrar los datos, pruebe otra vez mas tarde</p>";
                    }
                         
                ?>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <p id=error_nombre></p>

                <label for="apellido">Apellidos</label>
                <input type="text" name="apellido" id="apellido">

                <p id=error_apellido></p>

                <label for="correo">Correo electronico</label>
                <input type="email" name="correo" id="correo">

                <p id=error_correo></p>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">

                <p id=error_password></p>

                <button type="button" onclick="verificar()">Enviar</button>
            </form>
        </div>
    </body>
</html>