<?php
 require_once 'palabras.php';
 $palabra = Palabras::buscarPorTermino('Usuario');
 if($palabra){
    echo 'id: ';
    echo $palabra->getId();
    echo '<br />';
    echo 'Término: ';
    echo $palabra->getTermino();
    echo '<br />';
    echo 'Definición: ';
    echo $palabra->getDefinicion();
    echo '<br />';
    echo 'Área: ';
    echo $palabra->getArea();
 }else{
    echo 'La palabra no ha podido ser encontrada';
 }
?>