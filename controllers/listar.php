<?php
require_once "../models/SuperHeroFilter.php";

if(isset($_POST["operacion"])){
  
  $superherofilter = new SuperHeroFilter();

  if($_POST['operacion']== 'listarBandos'){
      $datos= $superherofilter->listarBandosfilter();
      if($datos){
        echo json_encode($datos);
      }
  }

  if($_POST['operacion'] == 'filtrar'){
    $datosObtenidos = $superherofilter->listarSuperHerofilter($_POST['race_id'],$_POST['gender_id'],$_POST['alignment_id']);
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }
}