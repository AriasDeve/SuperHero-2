<?php
require "Conexion.php";

class Ejercicio extends Conexion{
  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion  = parent::getConexion();
  }


  public function listGodandBad($publisher_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_ejercicio_01(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listAlignmnet(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_ejercicio_02()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exceptio $e){
      die($e->getMessage());
    }
  }

  public function listPublisher(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_ejercicio_03()");
      $consulta->execute();
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}