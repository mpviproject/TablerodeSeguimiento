<?php
$server= "localhost";
$user="root";
$password="";
$db="puebloviejo2";

$conexion = mysqli_connect($server,$user,$password,$db);
if(!$conexion){
    die('Error en la conexion'.mysqli_connect_errno());
}

?>