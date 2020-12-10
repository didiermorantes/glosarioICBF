<?php

if(!isset($_SESSION)){
    session_start();
}
require_once 'palabras.php';

if(isset($_SESSION['usuario'])){

    
    if(isset($_POST['searchCrud'])) { 
        $terminoBusqueda = $_POST['keywordsCrud'];
        $consulta = Palabras::buscarPorTermino($terminoBusqueda);
        }
    else{
        $consulta = Palabras::buscarTodo();
    }
    
    if (isset($_POST["guardarCrud"]) ) {  
        $terminoInsertar = $_POST['termino'];
        $definicionInsertar = $_POST['definicion'];
        $areaInsertar  = $_POST['area'];

        $insertar = Palabras::insertarDatos($terminoInsertar, $definicionInsertar, $areaInsertar);

        // echo $insertar;

        if($insertar){
                $mensajeInsercion ="Inserción éxitosa del término: <strong>".$terminoInsertar."</strong>, en la base de datos del glosario del ICBF";

                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        '.$mensajeInsercion.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                ';

        }
        else{
            $mensajeInsercion ="<strong>Error insertando datos. Intente de nuevo.</strong>";

            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    '.$mensajeInsercion.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            ';

        }

    }

    if (isset($_POST["salir"]) ) { 

        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy(); 

        header("Location: editar.php");
    }
    
    // var_dump($consulta);


    $upper = '
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

      <div class="table-responsive">
        <table class="table table-striped">  
        <thead>          
        <tr>
            <th>TERMINO</th>
            <th>DEFINICION</th>
            <th>AREA</th>
            <th>ACCIONES</th>

        </tr>
        </thead>
        <tbody>
        <form role="form" name="formRead" method="post" action="CRUD.php">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 tituloCrud"><br/>Buscar</div>
            <div class="col-sm-8 recuadroBusqueda">        
                <button type="submit" width="32px" height="32px" name="searchCrud" value="Buscar" class="btn"><img src="bootstrap-icons/search.svg" alt="" width="32" height="32" title="buscar" class ="icono"></button>
                <input type="text" id="keywordsCrud" name="keywordsCrud" class="keywordsBoxCrud">
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2 tituloCrud"> <br/>Nuevo Término</div>
                <div class="col-sm-8">
                        <!-- Añadimos un botón para el diálogo modal -->
                        <button type="button"
                            class="btn btn-lg btn-primary nuevo"
                            data-toggle="modal"
                            data-target="#myModalNuevo">
                            NUEVO
                        </button> 
                </div>
                <div class="col-sm-1"></div>
        </div>
      ';

      $middle='<div class="row">';
/*
GENERACION DINAMICA DE RESULTADOS 
*/
      if(!empty($consulta) ){
        foreach($consulta as $resultado){
            $middle =$middle.'
            <tr>
                <td>'.$resultado['termino'].'</td>
                <td>'.$resultado['definicion'].'</td>
                <td>'.$resultado['area'].'</td>
                <td>
                    BOTONES
                </td>
            </tr>
            ';
        }
    } 
   


    $lower = ' 
                        </div><!-- cierre div row linea 85 -->
                    </form> 
             </tbody>      
        </table> 
    </div>


<!-- Modal -->
<div class="modal fade" id="myModalNuevo" tabindex="-1" aria-labelledby="myModalNuevoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalNuevoLabel">Nuevo Termino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>

      <form role="form" name="formCreate" method="post" action="CRUD.php">
      <div class="modal-body">
        <div class="input-group">
            <span class="input-group-text"><b>T&eacute;rmino&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
            <input type="text" class="form-control" id="termino" name="termino" placeholder="Digite Término" >
        </div>

        <div class="input-group">
            <span class="input-group-text"><b>Definici&oacute;n</b></span>
            <textarea class="form-control" id="definicion" name="definicion" rows="5" placeholder="Digite Definición"></textarea>
        </div>

         <div class="input-group">
            <span class="input-group-text"><b>&Aacute;rea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
            <input type="text" class="form-control" id="area" name="area" placeholder="Digite Área" >
        </div>

      </div> <!-- cierre modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="guardarCrud" name="guardarCrud" >Guardar</button>
      </div> <!-- cierre modal footer -->
      </form>
    </div> <!-- cierre modal content -->
  </div> <!-- cierre modal dialog -->
</div> <!-- cierre modal -->

      
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

    ';
    echo "<div class='row containerResultadoCrud'>
                    <div class='col-sm-9'></div>
                    <div class='col-sm-3 userActive'>
                        <div class='row'>
                            <div class='col-sm-8'>
         ";
    echo "Hola " . $_SESSION['usuario'];
    echo " 
                            </div>
                            <div class='col-sm-4'>
                            <form role='form' name='formRead' method='post' action='CRUD.php'>
                                <button type='submit' class='btn btn-danger btn-sm' name='salir'>
                                    Salir
                                </button> 
                            </form>
                            </div> 
                    </div> 
               </div>
          </div>";



    echo "<div class='row containerResultadoCrud'>
                    <div class='col-sm-1'></div>
                <div class='col-sm-10'>
        ";
    echo $upper.$middle.$lower;
    echo "       </div> 
                    <div class='col-sm-1'></div>
          </div>";
}
else{

    echo "<div class='row containerResultadoCrud'>
             <div>
        ";
    echo "DEBE AUTENTICARSE PARA REALIZAR OPERACIONES";
    echo "       </div> 
        </div>";


                        // remove all session variables
                        session_unset();

                        // destroy the session
                        session_destroy(); 
}

 
?>