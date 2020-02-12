<?php
include('conexion.php');

$id_maquina =$_POST['id_operador'];

if(! $id_maquina== ""  ){



$query= "DELETE FROM operadores WHERE id_operador = '$id_maquina';";

mysqli_query($conexion,$query);

mysqli_close($conexion);
}

?>