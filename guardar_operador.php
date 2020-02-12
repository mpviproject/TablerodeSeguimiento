<?php
include('conexion.php');

$nombre =$_POST['nombre_operador'];
$apellido = $_POST['apellido_operador'];
$turno = $_POST['turno'];

if(! $nombre== "" and ! $apellido== "" and ! $turno== "" ){

$query= "INSERT INTO operadores VALUES (NULL,'$nombre','$apellido','$turno');";
$result = mysqli_query($conexion,$query);
if(!$result){
    die("Error!");
}
mysqli_close($conexion);
}else{
}

?>