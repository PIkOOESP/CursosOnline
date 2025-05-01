<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
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
                <p id="error"></p>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <p id=error_nombre></p>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos">

                <p id=error_apellidos></p>

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