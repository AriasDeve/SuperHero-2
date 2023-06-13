<?php

require_once "../models/Ejercicio.php";

if(isset($_POST['operacion'])){
  $ejercicio = new Ejercicio();

  if($_POST['operacion'] == 'listar'){
    $datos = $ejercicio->listGodandBad($_POST["publisher_id"]);
    if ($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion']== 'listarAlignment'){
    $datos = $ejercicio->listAlignmnet();
    if($datos){
      echo json_encode($datos);
    }
  }

  if($_POST['operacion']== 'listarPublisher'){
    $datos = $ejercicio->listPublisher();
    if($datos){
      echo json_encode($datos);
    }
  }
}