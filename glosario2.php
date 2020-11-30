<?php
require_once 'palabras.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- Personal CSS -->
        <link rel="stylesheet" href="estilos.css">

    <title>Glosario ICBF</title>
  </head>
  <body>



      <div class="container">
        <div class="row cabecera">
            <div class="col-sm-4 tituloGlosario">
                GLOSARIO
            </div>
            <div class="col-sm-8 tituloComentarios">
                Recopilación de términos y definiciones relacionadas con el lenguaje
                técnico empleado por las áreas misionales  y de apoyo del ICBF.

            </div>
        </div> <!-- fin row linea 23 -->
        <form action="glosario2.php" method="post"> 
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="row recuadroBusqueda">
                        <!--
                        <button type="submit" width="32px" height="32px" name="search" value="Buscar" class="btn"><img src="bootstrap-icons/search.svg" alt="" width="32" height="32" title="Bootstrap" class ="icono"></button>
                        
                        <img src="bootstrap-icons/search.svg" alt="" width="32" height="32" title="Bootstrap" class ="icono">
                        -->

                        <button type="submit" width="32px" height="32px" name="search" value="Buscar" class="btn"><img src="bootstrap-icons/search.svg" alt="" width="32" height="32" title="Bootstrap" class ="icono"></button>
                        <input type="text" id="keywords" name="keywords" class="keywordsBox">
                </div>
            </div>
            <div class="col-sm-2"></div>
            <!--
            <div class="col-sm-3">
                <button type="submit" name="search" value="Buscar" class="btn botonBuscar">Buscar</button>
                <img src="bootstrap-icons/bootstrap.svg" alt="" width="32" height="32" title="Bootstrap">
            </div>
            -->
        </div>  <!-- fin row linea 34 -->       
        <div class="row">     
          <div class="col-sm-9">   
             
                <div class="row">  

                    <!--
                    <div class="row">
                    -->
                    <button type="submit" name="a" value="a" class="btn btn-secondary boton">A</button>

                    <button type="submit" name="b" value="b" class="btn btn-secondary boton">B</button>

                    <button type="submit" name="c" value="c" class="btn btn-secondary boton">C</button>

                    <button type="submit" name="d" value="d" class="btn btn-secondary boton">D</button>

                    <button type="submit" name="e" value="e" class="btn btn-secondary boton">E</button>

                    <button type="submit" name="f" value="f" class="btn btn-secondary boton">F</button>

                    <button type="submit" name="g" value="g" class="btn btn-secondary boton">G</button>

                    <button type="submit" name="h" value="h" class="btn btn-secondary boton">H</button>

                    <button type="submit" name="i" value="i" class="btn btn-secondary boton">I</button>
        
                    <button type="submit" name="j" value="j" class="btn btn-secondary boton">J</button>

                    <button type="submit" name="k" value="k" class="btn btn-secondary boton">K</button>

                    <button type="submit" name="l" value="l" class="btn btn-secondary boton">L</button>

                    <button type="submit" name="m" value="m" class="btn btn-secondary boton">M</button>

                    <button type="submit" name="n" value="n" class="btn btn-secondary boton">N</button>
                    <!--
                    </div>
                    -->
                    

                    <!--
                    <div class="row">
                    -->
                    <button type="submit" name="ñ" value="ñ" class="btn btn-secondary boton">Ñ</button>

                    <button type="submit" name="o" value="o" class="btn btn-secondary boton">O</button>

                    <button type="submit" name="p" value="p" class="btn btn-secondary boton">P</button>

                    <button type="submit" name="q" value="q" class="btn btn-secondary boton">Q</button>

                    <button type="submit" name="r" value="r" class="btn btn-secondary boton">R</button>

                    <button type="submit" name="s" value="s" class="btn btn-secondary boton">S</button>

                    <button type="submit" name="t" value="t" class="btn btn-secondary boton">T</button>

                    <button type="submit" name="u" value="u" class="btn btn-secondary boton">U</button>

                    <button type="submit" name="v" value="v" class="btn btn-secondary boton">V</button>

                    <button type="submit" name="w" value="w" class="btn btn-secondary boton">W</button>

                    <button type="submit" name="x" value="x" class="btn btn-secondary boton">X</button>

                    <button type="submit" name="y" value="y" class="btn btn-secondary boton">Y</button>

                    <button type="submit" name="z" value="z" class="btn btn-secondary boton">Z</button> 
                    <!--
                    </div>
                    -->
                </div> <!-- cierre row linea 42 -->
          
          </div> <!-- cierre col-sm-9 linea 40 -->
          <div class="col-sm-3">
            <button type="submit" name="clear" value="y" class="btn btn-primary limpiar">LIMPIAR</button>
          </div> <!-- cierre col-sm-3 -->        
        </div> <!-- fin row linea 39 -->
        </form>
      </div> <!-- fin container linea 22-->

      <div class="container">
        <div>
          
        <?php
         if(isset($_POST['a'])) { 
            $palabra = Palabras::buscarPorLetra('a');
             } 
        if(isset($_POST['b'])) { 
            $palabra = Palabras::buscarPorLetra('b');
             } 
        if(isset($_POST['c'])) { 
            $palabra = Palabras::buscarPorLetra('c');
            } 

        if(isset($_POST['c'])) { 
            $palabra = Palabras::buscarPorLetra('c');
            } 
        if(isset($_POST['d'])) { 
            $palabra = Palabras::buscarPorLetra('d');
            } 
        if(isset($_POST['e'])) { 
            $palabra = Palabras::buscarPorLetra('e');
            } 
              
        if(isset($_POST['f'])) { 
            $palabra = Palabras::buscarPorLetra('f');
            } 
        if(isset($_POST['g'])) { 
            $palabra = Palabras::buscarPorLetra('g');
             } 
        if(isset($_POST['h'])) { 
            $palabra = Palabras::buscarPorLetra('h');
            } 

        if(isset($_POST['i'])) { 
            $palabra = Palabras::buscarPorLetra('i');
            } 
        if(isset($_POST['j'])) { 
            $palabra = Palabras::buscarPorLetra('j');
            } 
        if(isset($_POST['k'])) { 
            $palabra = Palabras::buscarPorLetra('k');
            } 
        
        if(isset($_POST['l'])) { 
            $palabra = Palabras::buscarPorLetra('l');
            } 
        if(isset($_POST['m'])) { 
            $palabra = Palabras::buscarPorLetra('m');
            } 
        if(isset($_POST['n'])) { 
            $palabra = Palabras::buscarPorLetra('n');
            } 

        if(isset($_POST['ñ'])) { 
            $palabra = Palabras::buscarPorLetra('ñ');
            } 
        if(isset($_POST['o'])) { 
            $palabra = Palabras::buscarPorLetra('o');
            } 
        if(isset($_POST['p'])) { 
            $palabra = Palabras::buscarPorLetra('p');
            } 

        if(isset($_POST['q'])) { 
            $palabra = Palabras::buscarPorLetra('q');
            } 

        if(isset($_POST['r'])) { 
            $palabra = Palabras::buscarPorLetra('r');
            } 
        if(isset($_POST['s'])) { 
            $palabra = Palabras::buscarPorLetra('s');
            } 
        if(isset($_POST['t'])) { 
            $palabra = Palabras::buscarPorLetra('t');
            } 

        if(isset($_POST['u'])) { 
            $palabra = Palabras::buscarPorLetra('u');
            } 

        if(isset($_POST['v'])) { 
            $palabra = Palabras::buscarPorLetra('v');
            } 
    
        if(isset($_POST['w'])) { 
            $palabra = Palabras::buscarPorLetra('w');
            } 
    
        if(isset($_POST['x'])) { 
            $palabra = Palabras::buscarPorLetra('x');
            } 
        if(isset($_POST['y'])) { 
            $palabra = Palabras::buscarPorLetra('y');
            } 
        if(isset($_POST['z'])) { 
            $palabra = Palabras::buscarPorLetra('z');
            }  
            
        if(isset($_POST['clear'])) { 
                $palabra = Palabras::limpiar();
                }    

        if(isset($_POST['search'])) { 
                $terminoBusqueda = $_POST['keywords'];
                $palabra = Palabras::buscarPorTermino($terminoBusqueda);
                }   
      else{
        echo "";
      }
        ?>
        </div>

        <!--
        <div class="row row-cols-4">
        -->
        <div class ="row cuerpoCards">
                    <?php   
                    if (isset($palabra)){
                    if(!empty($palabra) ){
                        foreach($palabra as $resultado){
                            echo '<div class="col-md-3 padre">';
                            echo '<div class="col-sm">';
                                echo '<div class="card estiloCards">';
                                    echo '<div class="card-body" data-toggle="modal" data-target="#modal'.$resultado['id'].'">';
                                        echo '<h5 class="card-title">'.$resultado['termino'].'</h5>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }//fin foreach
                    }//fin $palabra
                    }//fin isset  
                        
                    ?>
            
        </div>

      </div>


      <!-- Modal -->
<?php   
        if (isset($palabra)){
            if(!empty($palabra) ){
              foreach($palabra as $resultado){
                    echo '<div class="modal fade" id="modal'.$resultado['id'].'" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">';
                        echo '<div class="modal-dialog">';
                        echo '<div class="modal-content contenidoModal">';
                            echo '<div class="modal-header headerModal">';
                            echo '<h5 class="modal-title" id="modalLabel">'.$resultado['termino'].'</h5>';
                            echo '<button type="button" class="close botonCerrar" data-dismiss="modal" aria-label="Close">';
                                echo '<span aria-hidden="true">&times;</span>';
                            echo '</button>';
                            echo '</div>';
                            echo '<div class="modal-body cuerpoModal">';
                                echo $resultado['definicion'];
                            echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    echo '</div>';

            }//fin foreach
          }//fin $palabra
        }//fin isset  

?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>