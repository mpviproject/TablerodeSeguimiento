<?php

include('conexion.php');

if(isset($_POST['id_orden'])){
    $operacion= $_POST['id_orden'];
    $query ="SELECT * FROM calidad WHERE id_operacion = $operacion ;";
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