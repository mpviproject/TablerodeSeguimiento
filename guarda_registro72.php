<?php

include('conexion.php');

if(isset($_POST['query'])){
$query =  $_POST['query'];
$result = mysqli_query($conexion,$query);
mysqli_close($conexion);
}

?>