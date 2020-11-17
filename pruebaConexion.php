<?php
 require_once 'conexion.php';
 $conexion = new Conexion();
 if($conexion){
     echo'Conexion exitosa a la bd';
     echo '<br/>';
     var_dump($conexion);
 }

?>