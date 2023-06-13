<?php
require "Conexion.php";

Class SuperHerofilter extends Conexion{
  private $conexion;
  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }
  public function listarSuperHerofilter($race_id, $gender_id,$alignment_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_superheroplus_list(?,?,?)");
      $consulta->execute(array($race_id,$gender_id,$alignment_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage);
    }
  }

  public function listarBandosfilter(){
    try{
      $consulta= $this->conexion->prepare("CALL spu_list_bandos() ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage);
    }
  }
}