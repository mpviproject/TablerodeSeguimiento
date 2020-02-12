<?php
include('conexion.php');

$id_operador =$_POST['id_operador1'];
$nombre_operador =$_POST['nombre_operador1'];
$apellido_operador = $_POST['apellido_operador1'];
$turno= $_POST['turno1'];
if(! $id_operador== "" and ! $nombre_operador== "" and ! $apellido_operador== "" and ! $turno== "" ){

$query= "UPDATE operadores SET nombre_operador='$nombre_operador',apellido_operador='$apellido_operador',turno='$turno' WHERE id_operador='$id_operador' ;";

$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_close($conexion);
}

?>