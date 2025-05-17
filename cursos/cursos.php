<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location:../login/login.php?admin=0');
    }

    require('../conexion/conexion.php');
    $respuesta = $_GET;

    $consulta_cursos="SELECT c.id as id, c.nombre as nombre, d.nombre as dificultad from cursos c join dificultades d on d.id=c.dificultad_id";
    if(isset($respuesta['curso'])){
        if($_SESSION['admin'] == 0){
            $consulta_cursos = "SELECT c.nombre as nombre, c.id as id, d.nombre as dificultad from inscripciones i join cursos c on c.id=i.curso_id join dificultades d on d.id=c.dificultad_id where i.alumno_id=".$_SESSION['id'];
        }

        if($_SESSION['admin'] == 1){
            $consulta_cursos = "SELECT c.nombre as nombre, c.id as id, d.nombre as dificultad from cursos_profesores p join cursos c on c.id=p.curso_id join dificultades d on d.id=c.dificultad_id where p.profesor_id=".$_SESSION['id'];
        }
    }
    $query = $conexion->query($consulta_cursos);
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
                    <a href="cursos.php?curso=1">Cursos activos</a>
                    <a href="cursos.php">Cursos</a>
                    <a href="../masterclass/masterclass.php">MasterClass</a>
                    <?php
                        if($_SESSION['admin']==1){
                            echo "<a href='registro_curso.php'>Nuevo curso</a>
                            ";
                        }
                    ?>
                </div>
                
                <div class='menu'>
                    <p>Bienvenido <?php echo $_SESSION['name']?></a></p>
                    
                    <div class='submenu'>
                        <a href='../registro/registro.php?admin=<?php echo $_SESSION['admin'] ?>'>Editar perfil</a>
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
                    <a href='pag_curso.php?id=".$fila['id']."'>
                        <div class='curso_imagen'>
                            <img src='../imagenes/cursos/".$fila['id'].".jpg'>
                        </div>
                        <div class='curso_nombre'>
                        <p>".$fila['nombre']."</p>
                        <p>-".$fila['dificultad']."-</p>
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