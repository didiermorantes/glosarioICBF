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

    <title>Hello, world!</title>
  </head>
  <body>



      <div class="container">
        <div class="row">
            <div class="col-sm-4">
                GLOSARIO
            </div>
            <div class="col-sm-8">
                Recopilación de términos y definiciones relacionadas con el lenguaje
                técnico empleado por las áreas misionales  y de apoyo del ICBF.

            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                BÚSQUEDA
            </div>
        </div>
        <div class="row">       
          <div class="col-sm-9">
          <form action="glosario.php" method="post">
            <button type="submit" name="a" value="a" class="btn btn-secondary">A</button>
            <button type="submit" name="b" value="b" class="btn btn-secondary">B</button>
            <button type="button" class="btn btn-secondary">C</button>
            <button type="button" class="btn btn-secondary">D</button>
            <button type="button" class="btn btn-secondary">E</button>
            <button type="button" class="btn btn-secondary">F</button>
            <button type="button" class="btn btn-secondary">G</button>
            <button type="button" class="btn btn-secondary">H</button>
            <button type="button" class="btn btn-secondary">I</button>
            <button type="button" class="btn btn-secondary">J</button>
            <button type="button" class="btn btn-secondary">K</button>
            <button type="button" class="btn btn-secondary">L</button>
            <button type="button" class="btn btn-secondary">M</button>
            <button type="button" class="btn btn-secondary">N</button>
            <button type="button" class="btn btn-secondary">Ñ</button>
            <button type="button" class="btn btn-secondary">O</button>
            <button type="button" class="btn btn-secondary">P</button>
            <button type="button" class="btn btn-secondary">Q</button>
            <button type="button" class="btn btn-secondary">R</button>
            <button type="button" class="btn btn-secondary">S</button>
            <button type="button" class="btn btn-secondary">T</button>
            <button type="submit" name="u" value="u" class="btn btn-secondary">U</button>
            <button type="button" class="btn btn-secondary">V</button>
            <button type="button" class="btn btn-secondary">W</button>
            <button type="button" class="btn btn-secondary">X</button>
            <button type="button" class="btn btn-secondary">Y</button>
            <button type="button" class="btn btn-secondary">Z</button>
          </form>
          </div>
          <div class="col-sm-3">
            <button type="button" class="btn btn-primary">LIMPIAR</button>
          </div>
        </div>
      </div>

      <div class="container">
        <div>
          Mensaje:
        <?php
      if(isset($_POST['a'])) { 
          echo "Presionó a"; 
          } 
      if(isset($_POST['b'])) { 
              echo "Presionó b"; 
          } 
      if(isset($_POST['u'])) { 
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
        } 
      else{
        echo "";
      }
        ?>
        </div>

        <div class="row row-cols-4">
          <div class="col">
            <div class="card">
                <div class="card-body" data-toggle="modal" data-target="#modal1">
                  <h5 class="card-title">Card title</h5>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
          </div>
          <div class="col">Column</div>
          <div class="col">Column</div>
          <div class="col">Column</div>
          <div class="col">Column</div>
        </div>

      </div>


      <!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">MODAL TITLE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          MODAL BODY
        </div>
      </div>
    </div>
  </div>




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