<?php
 require_once 'palabras.php';
 $palabra = Palabras::buscarPorLetra('u');
 if($palabra){
     echo '<b><br/>var_dump</b><br/>';
    var_dump($palabra);
    echo '<b><br/>Exploración de salida</b><br/>';
    foreach($palabra as $resultado){
        echo '<b>resultado:</b>'.' '.$resultado['id'].' '.'<b>termino:</b>'.$resultado['termino'].' '.'<b>definicion:</b>'.$resultado['definicion'].' '.'<b>area:</b>'.$resultado['area'].PHP_EOL;
        echo '<br/>';
    }
 }else{
    echo 'La palabra no ha podido ser encontrada';
 }
?>