<?php
require('conexion_bd.php');

$respuesta=$_GET;
$resultado=mysqli_query($conexion, $respuesta['consulta']);

while($fila = mysqli_fetch_assoc($resultado)){
    $arrayProductos[$fila['codigo']]=$fila;
}

$jsonProductos = json_encode($arrayProductos);

$nuevoArrayProductos = json_decode($jsonProductos, true);
/*
$array = array('azul', 'blanco', 'verde', 'rojo');

echo in_array('azul', $array)?'existe':'no existe';
echo "<hr/>";
foreach($array as $key=>$elmento){
    echo $key.' - '.$elmento.'<br/>';
}
*/
foreach($arrayProductos as $indentificador=>$producto){
    echo $producto['descripcion'];
    echo "<br/><br/>";
}


?>