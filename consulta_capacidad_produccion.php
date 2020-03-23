<?php

include('conexion.php');

if(isset($_POST['mesconsulta'])){
    $operacion= $_POST['mesconsulta'];
    $query ="SELECT id_productivos FROM dias_productivos WHERE month(fecha_cambio) = $operacion;";
    $result = mysqli_query($conexion,$query);
    if (mysqli_num_rows($result) >= 1) {
       echo "REGISTRADO";
      } else {
        echo "NO REGISTRADO";
      }
    mysqli_free_result($result);
    mysqli_close($conexion);
    
}
?>