<?php

include('conexion.php');

if(isset($_POST['descripcion'])){
$query =  $_POST['descripcion'];
$fin = "INSERT INTO tipo_paro values(NULL, '$query');";
$result = mysqli_query($conexion,$fin);
mysqli_close($conexion);
}

?>