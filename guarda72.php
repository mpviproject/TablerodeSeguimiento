<?php

include('conexion.php');

if(isset($_POST['query'])){
$query =  $_POST['query'];
$result = mysqli_query($conexion,$query);
$last_id = $conexion->insert_id;
echo $last_id;
mysqli_close($conexion);
}

?>