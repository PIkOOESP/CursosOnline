<?php
    require('../conexion/conexion.php');

    session_start();
    $consulta_cursos="SELECT id, nombre from cursos";
    $query = $conexion->query($consulta_cursos);
    $br=0;

    if(isset($_SESSION['loggedin'])){
        $sesion=true;
    } else {
        header('Location:../login/login.php?admin=0');
    }
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
                    <a href="">Cursos activos</a>
                    <a href="cursos.php">Cursos</a>
                    <a href="">MasterClass</a>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo$_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href=''>Editar perfil</a>
                        <br/><br/>
                        <a href='../login/cerrar_sesion.php'>Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($_SESSION['loggedin'])){
                if($_SESSION['admin']==1){
                    echo "<a href='registro_curso.php'>Nuevo curso</a>
                    ";
                }
            }
        ?>

        <table>
            <tr>
        <?php
            while($fila=$query->fetch_assoc()){
                $br++;
                echo $br;
                echo"
                <td>
                <div class='curso'>
                    <a href='pag_curso.php?id=".$fila['id']."'>
                        <div class='curso_imagen'>
                            <img src='../imagenes/cursos/".$fila['id'].".jpg'>
                        </div>
                        <div class='curso_nombre'>
                        <p>".$fila['nombre']."</p>
                        </div>
                    </a>
                </div>
                </td>";
                if($br%3==0){
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