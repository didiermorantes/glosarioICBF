<?php
 require_once 'palabras.php';
 $palabra = new Palabras('prueba termino', 'prueba definicion' , 'prueba area');
 $palabra->guardar();
 echo $palabra->getTermino() . ' se ha guardado correctamente con el id: ' . $palabra->getId();
?>