<?php

include('conexion.php');

if(isset($_POST['query'])){
$query =  $_POST['query'];
$fin = "DELETE FROM tipo_paro WHERE id_tipo = $query";
$result = mysqli_query($conexion,$fin);
mysqli_close($conexion);
}

?>