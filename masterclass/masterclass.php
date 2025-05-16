<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    require('../conexion/conexion.php');
    $consulta="SELECT id, nombre from clases_maestras";
    $query = $conexion->query($consulta);
    $tr=0;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilo/estilos.css">
        <link rel="icon" href="../imagenes/logo/netrunners_logo.jpg">
        <title>Net Runner</title>
    </head>
    <body>
        <div class="principal_indice">
            <div class="top_indice">
                <div class="top_indice_enlaces">
                    <img class="indice_logo" src="../imagenes/index/logoVerde.png">
                    <a href="../Index.php">Inicio</a>
                    <a href="../cursos/cursos.php?curso=1">Cursos activos</a>
                    <a href="../cursos/cursos.php">Cursos</a>
                    <a href="">MasterClass</a>
                    <?php
                        if($_SESSION['admin']==1){
                            echo "<a href='registro_master.php'>Nuevo MasterClass</a>
                            ";
                        }
                    ?>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo $_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href=''>Editar perfil</a>
                        <br/><br/>
                        <a href='../login/cerrar_sesion.php'>Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <table>
            <tr>
                <?php
                    while($fila=$query->fetch_assoc()){
                        $tr++;
                        echo"
                        <td>
                        <div class='curso'>
                            <a href='pag_master.php?id=".$fila['id']."'>
                                <div class='master_imagen'>
                                    <img src='../imagenes/master/portadas/".$fila['id'].".jpg'>
                                </div>
                                <div class='master_nombre'>
                                <p>".$fila['nombre']."</p>
                                </div>
                            </a>
                        </div>
                        </td>";
                        if($tr%3==0){
                            echo "</tr><tr>";
                        }
                    }
                ?>
            </tr>
        </table>
        
        <div class="bottom_indice">
            <div class="bottom_indice_enlaces">

            </div>

            <div class="bottom_indice_informacion">

            </div>

            <div class="bottom_indice_referencias">
                <p>Pablo | Miguel Angel</p>
            </div>
        </div>
    </body>
</html>