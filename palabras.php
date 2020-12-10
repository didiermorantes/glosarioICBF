<?php
if(!isset($_SESSION)){
   session_start();
}
 require_once 'conexion.php';
 class Palabras {
   private $id;
   private $termino;
   private $definicion;
   private $area;
   const TABLA = 'palabras';
   const CREDENCIALES = 'usuarios';
   public function getId() {
      return $this->id;
   }
   public function getTermino() {
      return $this->termino;
   }
   public function getDefinicion() {
      return $this->definicion;
   }

   public function getArea() {
    return $this->area;
 }
   public function setTermino($termino) {
      $this->termino = $termino;
   }
   public function setDefinicion($definicion) {
      $this->definicion = $definicion;
   }

   public function setArea($area) {
    $this->area = $area;
 }
   public function __construct($termino, $definicion, $area, $id=null) {
      $this->termino = $termino;
      $this->definicion = $definicion;
      $this->area = $area;
      $this->id = $id;
   }
   public function guardar(){
      $conexion = new Conexion();
      if($this->id) /*Modifica*/ {
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET termino = :termino, definicion = :definicion, area = :area WHERE id = :id');
         $consulta->bindParam(':termino', $this->termino);
         $consulta->bindParam(':definicion', $this->definicion);
         $consulta->bindParam(':area', $this->area);
         $consulta->bindParam(':id', $this->id);
         $consulta->execute();
      }else /*Inserta*/ {
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (termino, definicion, area) VALUES(:termino, :definicion, :area)');
         $consulta->bindParam(':termino', $this->termino);
         $consulta->bindParam(':definicion', $this->definicion);
         $consulta->bindParam(':area', $this->area);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }
      $conexion = null;
   }

   public static function buscarPorId($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT termino, definicion, area FROM ' . self::TABLA . ' WHERE id = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    if($registro){
       return new self($registro['termino'], $registro['definicion'], $registro['area'], $id);
    }else{
       return false;
    }
 }

 public static function buscarTodo(){
   $conexion = new Conexion();
   $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . '');
   $consulta->execute();
   $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
   // var_dump($registro);
   if($registro){
       return $registro;
    }else{
       return false;
    }

    
}

 /*
 public static function buscarPorTermino($termino){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT id, definicion, area FROM ' . self::TABLA . ' WHERE termino = :termino');
    $consulta->bindParam(':termino', $termino);
    $consulta->execute();
    $registro = $consulta->fetch();
    if($registro){
       return new self($termino, $registro['definicion'], $registro['area'], $registro['id']);
    }else{
       return false;
    }
 }
 */

 public static function buscarPorTermino($termino){
   $conexion = new Conexion();

   $termino = $termino."%";

   // $consulta = $conexion->prepare('SELECT id, termino, definicion, area FROM ' . self::TABLA . ' WHERE termino = :termino');
   $consulta = $conexion->prepare('SELECT id, termino, definicion, area FROM ' . self::TABLA . ' WHERE termino LIKE :termino');
   $consulta->bindParam(':termino', $termino);
   $consulta->execute();
   $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
   // var_dump($registro);
   if($registro){   
      return $registro;
   }else{
      return false;
   }
}


 public static function buscarPorLetra($letra){
    $conexion = new Conexion();
    $letraConcatenada = $letra.'%';
    // var_dump($letraConcatenada);
    $consulta = $conexion->prepare('SELECT id, termino, definicion, area FROM ' . self::TABLA . ' WHERE termino LIKE :letraConcatenada');
    $consulta->bindParam(':letraConcatenada', $letraConcatenada);
    $consulta->execute();
    $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($registro);
    if($registro){
        return $registro;
     }else{
        return false;
     }


 }

 public static function limpiar(){
   $conexion = new Conexion();
   $letra='clear';
   $letraConcatenada = $letra.'%';
   // var_dump($letraConcatenada);
   $consulta = $conexion->prepare('SELECT id, termino, definicion, area FROM ' . self::TABLA . ' WHERE termino LIKE :letraConcatenada');
   $consulta->bindParam(':letraConcatenada', $letraConcatenada);
   $consulta->execute();
   $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
   // var_dump($registro);
   if($registro){
       return $registro;
    }else{
       return false;
    }

}


public static function validarCredenciales($user, $pass){
   $conexion = new Conexion();
   $mensaje ="";
   // var_dump($letraConcatenada);
   // $result = mysql_query("SELECT * from usuarios where Username='" . $usuario . "'");
   $consulta = $conexion->prepare('SELECT * FROM ' . self::CREDENCIALES . ' WHERE user = :user');
   $consulta->bindParam(':user', $user);
   $consulta->execute();
   $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
   // var_dump($registro);
   if($registro){
      foreach($registro as $resultado){
         $usuario = $resultado['user'];
         $contrasena = $resultado['password'];
      }

         if($usuario){
                     if($contrasena == $pass){
                           
                           $_SESSION['usuario'] = $usuario;
                           $mensaje= '<br/>Usuario y Contraseña Correctos <br/>';
                           echo $mensaje;
                           $status = "correcto";
                          
                           // header("Location: CRUD.php");

                     }else{
                           // header("Location: index.html");
                           $mensaje= '<br/>Credenciales Invalidas. No coincide contrasena <br/>';
                           echo $mensaje;
                           $status = "no valido";
                           // exit();
                           }
         }else{
            // header("Location: index.html");
            $mensaje= '<br/> Credenciales Invalidas. No hay usuario <br/>';
            echo $mensaje;
            $status = "no valido";
            // exit();
         }


    }else{
       $mensaje = "<br/> Credenciales Invalidas. No coinciden ni usuario ni contraseña <br/>";
       echo $mensaje;
       $status = "no valido";
       // exit();
    }

    return $status;

}

public static function insertarDatos($terminoInsertar, $definicionInsertar, $areaInsertar){
   $conexion = new Conexion();
   $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (termino,definicion,area) VALUES  (:termino, :definicion, :area)');
   $consulta->bindParam(':termino', $terminoInsertar);
   $consulta->bindParam(':definicion', $definicionInsertar);
   $consulta->bindParam(':area', $areaInsertar);
   $insercion = $consulta->execute();
   //$registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
   // var_dump($insercion);
   if($insercion){
       return true;
    }else{
       return false;
    }


}


 }
?>